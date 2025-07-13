<?php

class Pickup extends Controller
{
    public function add($id_transaction)
    {
        // var_dump($_POST);
        // exit;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['id'] = $id_transaction;
            $payment = [
                "id" => $id_transaction,
                "order_pay" => $_POST['order_pay'],
                "order_change" => $_POST['order_change']
            ];

            $getPayment = $this->model('TransactionModel')->getTransactionById($id_transaction);

            if (is_null($getPayment['order_pay']) and is_null($getPayment['order_change'])) {
                // var_dump($payment);
                // exit;
                $this->model('TransactionModel')->updatePayment($payment);
            }

            if ($this->model('PickupModel')->addPickup($_POST) > 0) {
                // if ($this->model('TransactionModel')->updateStatus($id_transaction) > 0) {
                Notification::setNotif('Pickup has been ', ADDED, 'success');
                header('Location: ' . BASEURL . '/transaction');
                exit;
                // } else {
                //     Notification::setNotif('Update status transaction failed to be', UPDATED, 'error');
                //     header('Location: ' . BASEURL . '/transaction');
                //     exit;
                // }
            } else {
                Notification::setNotif('Pickup failed to be', ADDED, 'error');
                header('Location: ' . BASEURL . '/transaction');
                exit;
            }
        }

        $this->dashboardView('contents/transaction');
    }
}
