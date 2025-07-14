<?php

class Home extends Controller
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
        if ($_SESSION['user']['id_level'] === 2) {
            $this->viewOnly('contents/operator-pos');
        } else {
            $data = [
                "dashboard" => true
            ];
            $this->dashboardView('home/index', $data);
        }
    }
}
