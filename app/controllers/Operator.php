<?php

class Operator extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header('Location:' . BASEURL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $customer = $this->model('CustomerModel')->getAllCustomer();
        $service = $this->model('ServiceModel')->getAllService();
        $data = [
            "customer" => $customer,
            "service" => $service
        ];
        $this->viewOnly('contents/operator-pos', $data);
    }
}
