<?php

class Auth extends Controller
{
    public function index()
    {
        $this->loginView('auth/index');
    }

    public function login()
    {
        $users = $this->model('UserModel');
        $user = $users->getUserByEmailAndPassword($_POST['email'], $_POST['password']);
        if ($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'id_level' => $user['id_level'],
                'nama' => $user['nama']
            ];
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASEURL . '/auth');
    }
}
