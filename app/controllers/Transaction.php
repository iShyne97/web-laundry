<?php

class Transaction extends Controller
{

    public function index()
    {
        $this->dashboardView('contents/transaction', $this->model('TransactionModel')->getAllTransaction());
    }

    public function add($id_customer)
    {
        $data = [
            'customer' =>  $this->model('CustomerModel')->getCustomerById($id_customer),
            'services' => $this->model('ServiceModel')->getAllService()
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['id_customer'] = $id_customer;

            if ($this->model('TransactionModel')->addTransaction($_POST) > 0) {
                if ($this->model('TransactionDetailModel')->addDetailTransaction($_POST) > 0) {
                    Notification::setNotif('Transaction has been ', ADDED, 'success');
                    header('Location: ' . BASEURL . '/transaction');
                    exit;
                } else {
                    Notification::setNotif('Detail Transaction failed to be', ADDED, 'error');
                    header('Location: ' . BASEURL . '/transaction');
                    exit;
                }
            } else {
                Notification::setNotif('Transaction failed to be', ADDED, 'error');
                header('Location: ' . BASEURL . '/transaction');
                exit;
            }
        }

        $this->dashboardView('contents/manage-transaction', $data);
    }

    public function delete($id)
    {

        $transaction = $this->model('TransactionModel')->getTransactionById($id);
        if ($this->model('TransactionModel')->deleteTransaction($id) > 0) {
            $message = 'Transaction data with ID: ' . $transaction['id'] . ', Customer: ' . $transaction['cust_name'] . ' has been successfully ';
            Notification::setNotif($message, DELETED, 'success');
            header('Location: ' . BASEURL . '/transaction');
            exit;
        } else {
            Notification::setNotif('Transaction data failed to be', DELETED, 'error');
            header('Location: ' . BASEURL . '/transaction');
            exit;
        }
    }

    public function detail($id)
    {
        $transaction = $this->model('TransactionModel')->getTransactionById($id);
        $detail = $this->model('TransactionDetailModel')->getDetailTransactionByOrderCode(isset($transaction['order_code']) ? $transaction['order_code'] : 'null');
        $data = [
            'transaction' => $transaction,
            'details_transaction' => $detail
        ];
        $this->dashboardView('contents/details-transaction', $data);
    }

    public function printReceipt($id)
    {
        $transaction = $this->model('TransactionModel')->getTransactionById($id);
        $detail = $this->model('TransactionDetailModel')->getDetailTransactionByOrderCode($transaction['order_code']);

        $data = [
            'transaction' => $transaction,
            'detail_transaction' => $detail
        ];

        // print_r($data);
        // exit;

        $this->viewOnly('reports/receipt', $data);
    }

    public function reportTransaction($print = false)
    {
        $filter = [];

        if ($print && isset($_GET['start'], $_GET['end']) && $_GET['start'] && $_GET['end']) {
            $filter = [
                'start' => $_GET['start'],
                'end'   => $_GET['end']
            ];
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['start']) && !empty($_POST['end'])) {
            $filter = [
                'start' => $_POST['start'],
                'end'   => $_POST['end']
            ];
        }

        $data = [
            "total" => $this->model('TransactionModel')->getTotalTransaction($filter),
            "transactions" => $this->model('TransactionModel')->getTransactionByStatusAndDate($filter)
        ];

        if ($print) {
            $this->viewOnly('reports/transactions', $data);
        } else {
            $this->dashboardView('contents/report-transaction', $data);
        }
    }

    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $status = $_POST['status'];

            if ($this->model('TransactionModel')->updateStatus($id, $status) > 0) {
                Notification::setNotif('Status berhasil diperbarui', UPDATED, 'success');
            } else {
                Notification::setNotif('Status gagal diperbarui', UPDATED, 'error');
            }

            header('Location: ' . BASEURL . '/transaction');
            exit;
        }
        $this->dashboardView('contents/transaction', $this->model('TransactionModel')->getAllTransaction());
    }

    public function addOperatorTransaction()
    {
        header('Content-Type: application/json'); // WAJIB

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!$data) {
            echo json_encode([
                'success' => false,
                'message' => 'Data tidak valid!',
            ]);
            return;
        }

        $data['order_code'] = 'TR-' . date('dmYHis');

        $model = $this->model('TransactionModel');
        $saved = $model->addOperatorTransaction($data);

        if ($saved > 0) {
            $id_order = $data['order_code'];
            $detailModel = $this->model('TransactionDetailModel');
            $detailModel->addOperatorDetailTransaction($id_order, $data['items']);

            echo json_encode([
                'success' => true,
                'message' => 'Transaksi berhasil disimpan!',
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Gagal menyimpan transaksi utama!',
            ]);
        }
    }

    public function getRecentTransactions()
    {
        header('Content-Type: application/json');

        $model = $this->model('TransactionModel');
        $transactions = $model->getAllTransactions();

        // Ambil hanya 5 transaksi terakhir
        $recent = array_slice(array_reverse($transactions), 0, 5);

        echo json_encode($recent);
    }

    public function getAllTransactions()
    {
        header('Content-Type: application/json');

        $model = $this->model('TransactionModel');
        $transactions = $model->getAllTransaction();

        echo json_encode($transactions);
    }

    public function getReportData()
    {
        header('Content-Type: application/json');

        $month = date('m');
        $year = date('Y');

        $model = $this->model('TransactionModel');
        $summary = $model->getTransactionSummary($month, $year);
        $services = $model->getMonthlyReport($month, $year);

        echo json_encode([
            'summary' => $summary,
            'services' => $services
        ]);
    }

    public function updatePayment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $_POST['id'],
                'order_pay' => $_POST['order_pay'],
                'order_change' => $_POST['order_change']
            ];

            if ($this->model('TransactionModel')->updatePayment($data) > 0) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Payment berhasil disimpan!',
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Gagal menyimpan payment!',
                ]);
            }
        }
    }

    public function getDailyStats()
    {
        header('Content-Type: application/json');
        $model = $this->model('TransactionModel');
        $stats = $model->getTodayStats();
        echo json_encode($stats);
    }
}
