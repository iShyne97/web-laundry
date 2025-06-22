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
        $data = [
            "dashboard" => true
        ];
        $this->dashboardView('home/index', $data);
    }
}
