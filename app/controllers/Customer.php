<?php

class Customer extends Controller
{
    public function index()
    {
        $customer = $this->model('CustomerModel')->getAllCustomer();
        $this->dashboardView('contents/customer', $customer);
    }

    public function delete($id)
    {

        $customer = $this->model('CustomerModel')->getCustomerById($id);
        if ($this->model('CustomerModel')->deleteCustomer($id) > 0) {
            $message = 'Customer data with ID: ' . $customer['id'] . ', Customer: ' . $customer['customer_name'] . ', Phone: ' . $customer['phone'] . ', Address: ' . $customer['address'] . ' has been successfully ';
            Notification::setNotif($message, DELETED, 'success');
            header('Location: ' . BASEURL . '/customer');
            exit;
        } else {
            Notification::setNotif('Customer data failed to be', DELETED, 'error');
            header('Location: ' . BASEURL . '/customer');
            exit;
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model('CustomerModel')->addCustomer($_POST) > 0) {
                Notification::setNotif('Data customer has been ', ADDED, 'success');
                header('Location: ' . BASEURL . '/customer');
                exit;
            } else {
                Notification::setNotif('Customer data failed to be', ADDED, 'error');
                header('Location: ' . BASEURL . '/customer');
                exit;
            }
        }

        $this->dashboardView('contents/manage-customer');
    }

    public function edit($id)
    {
        $customer = $this->model('CustomerModel')->getCustomerById($id);
        $data = [
            'customer' => $customer
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['id'] = $id;
            if ($this->model('CustomerModel')->editCustomer($_POST) > 0) {
                Notification::setNotif('Data customer has been ', UPDATED, 'success');
                header('Location: ' . BASEURL . '/customer');
                exit;
            } else {
                Notification::setNotif('Customer data failed to be', UPDATED, 'error');
                header('Location: ' . BASEURL . '/customer');
                exit;
            }
        }


        $this->dashboardView('contents/manage-customer', $data);
    }
}
