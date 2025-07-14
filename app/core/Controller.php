<?php

class Controller
{
    public function dashboardView($view, $data = [])
    {
        if ($_SESSION['user']['id_level'] === 2) {
            header('Location: ' . BASEURL . '/operator');
        } else {
            require_once '../app/views/home/index.php';
        }
    }

    public function loginView($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function viewOnly($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}
