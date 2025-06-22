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
        $detail = $this->model('TransactionDetailModel')->getDetailTransactionByOrderCode($transaction['order_code']);
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
        $data = [
            "total" => $this->model('TransactionModel')->getTotalTransaction($_POST),
            "transactions" => $this->model('TransactionModel')->getTransactionByStatusAndDate($_POST)
        ];
        if ($print) {
            $this->viewOnly('reports/transactions', $data);
        } else {
            $this->dashboardView('contents/report-transaction', $data);
        }
    }
}
