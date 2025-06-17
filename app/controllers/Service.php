<?php

class Service extends Controller
{
    public function index()
    {
        $service = $this->model('ServiceModel')->getAllService();
        $this->dashboardView('contents/service', $service);
    }

    public function delete($id)
    {

        $service = $this->model('ServiceModel')->getServiceById($id);
        if ($this->model('ServiceModel')->deleteService($id) > 0) {
            $message = 'Service data with ID: ' . $service['id'] . ', Service: ' . $service['service_name'] . ', Price: ' . $service['price'] . ', Description: ' . $service['description'] . ' has been successfully ';
            Notification::setNotif($message, DELETED, 'success');
            header('Location: ' . BASEURL . '/service');
            exit;
        } else {
            Notification::setNotif('Service data failed to be', DELETED, 'error');
            header('Location: ' . BASEURL . '/service');
            exit;
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model('ServiceModel')->addService($_POST) > 0) {
                Notification::setNotif('Data service has been ', ADDED, 'success');
                header('Location: ' . BASEURL . '/service');
                exit;
            } else {
                Notification::setNotif('Service data failed to be', ADDED, 'error');
                header('Location: ' . BASEURL . '/service');
                exit;
            }
        }

        $this->dashboardView('contents/manage-service');
    }

    public function edit($id)
    {
        $service = $this->model('ServiceModel')->getServiceById($id);
        $data = [
            'service' => $service
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['id'] = $id;
            if ($this->model('ServiceModel')->editService($_POST) > 0) {
                Notification::setNotif('Data service has been ', UPDATED, 'success');
                header('Location: ' . BASEURL . '/service');
                exit;
            } else {
                Notification::setNotif('Service data failed to be', UPDATED, 'error');
                header('Location: ' . BASEURL . '/service');
                exit;
            }
        }


        $this->dashboardView('contents/manage-service', $data);
    }
}
