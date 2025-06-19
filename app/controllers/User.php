<?php

class User extends Controller
{
    public function index()
    {
        $users = $this->model('UserModel')->getAllUser();
        $this->dashboardView('contents/user', $users);
    }

    public function delete($id)
    {

        $user = $this->model('UserModel')->getUserById($id);
        if ($this->model('UserModel')->deleteUser($id) > 0) {
            $message = 'User data with ID: ' . $user['id'] . ', Name: ' . $user['name'] . ', Email: ' . $user['email'] . ' has been successfully ';
            Notification::setNotif($message, DELETED, 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Notification::setNotif('User data failed to be', DELETED, 'error');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function add()
    {
        $levels = $this->model('LevelModel')->getAllLevel();
        $data['levels'] = $levels;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model('UserModel')->addUser($_POST) > 0) {
                Notification::setNotif('Data user has been ', ADDED, 'success');
                header('Location: ' . BASEURL . '/user');
                exit;
            } else {
                Notification::setNotif('User data failed to be', ADDED, 'error');
                header('Location: ' . BASEURL . '/user');
                exit;
            }
        }

        $this->dashboardView('contents/manage-user', $data);
    }

    public function edit($id)
    {
        $levels = $this->model('LevelModel')->getAllLevel();
        $user = $this->model('UserModel')->getUserById($id);
        $data = [
            'levels' => $levels,
            'user' => $user
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['id'] = $id;

            if (empty($_POST['password'])) {
                $_POST['password'] = $user['password'];
            } else {
                sha1($_POST['password']);
            }

            if ($this->model('UserModel')->editUser($_POST) > 0) {
                Notification::setNotif('Data user has been ', UPDATED, 'success');
                header('Location: ' . BASEURL . '/user');
                exit;
            } else {
                Notification::setNotif('User data failed to be', UPDATED, 'error');
                header('Location: ' . BASEURL . '/user');
                exit;
            }
        }


        $this->dashboardView('contents/manage-user', $data);
    }
}
