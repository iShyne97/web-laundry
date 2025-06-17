<?php

class App
{

    //Routing
    protected $controller = 'Home',
        $method = 'index',
        $params = [];

    public function __construct()
    {
        $url = $this->parseURL() ?? [];

        //cek apakah url ada di file
        if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller; // instansiasi controller

        //cek apakah ada method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        //cek apakah ada paramnya
        $this->params = !empty($url) ? array_values($url) : [];

        //jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {

        /*
        Didalam URL nantinya ada 4 :
        1. Controller
        2. Method
        3 & 4 . Parameter yang dikirim ke controller
        */

        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //menghapus slash (/) terakhir di URL
            $url = filter_var($url, FILTER_SANITIZE_URL); //memfilter url dari karakter terlarang/aneh
            $url = explode('/', $url); //ubah jadi array
            return $url;
        }
    }
}
