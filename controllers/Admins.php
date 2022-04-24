<?php

class Admins extends Controller
{
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    public function login()
    {


        /*    if (isLoggedIn())
        {
            header('location: ' . URLROOT . 'Pages/home');
        } */

        $data = [
            'loginError' => "",
        ];

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'loginError' => ""
            ];
            $user = $this->adminModel->login($data['username'], $data['password']);

             if (!$user)
            {
                $data['loginError'] = 'Credentials is not correct';
            }
            else
            {
                $this->createAdminSession($user);
                header('location: ' . URLROOT . 'Panels/');
            } 
        } 
        $this->view('admin', $data);
    }

    public function createAdminSession($user)
    {
        $_SESSION['adminloggedin'] = true;
        $_SESSION['username'] = $user->username;
    }
    public function logout() {
        unset($_SESSION['adminloggedin']);
        unset($_SESSION['username']);
        header('location:' . URLROOT . 'users/login/');
    }
}
