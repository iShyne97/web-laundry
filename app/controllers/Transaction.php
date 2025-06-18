<?php

class Transaction extends Controller
{

    public function index()
    {
        $transaction = $this->model('TransactionModel')->getAllUser();
        $this->dashboardView('contents/transaction', $transaction);
    }

    public function add($id_customer)
    {
        $customer = $this->model('CustomerModel')->getCustomerById($id_customer);
        $services = $this->model('ServiceModel')->getAllService();
        $data = [
            'customer' => $customer,
            'services' => $services
        ];


        $this->dashboardView('contents/manage-transaction', $data);
    }
}
