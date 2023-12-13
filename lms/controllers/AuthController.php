<?php
require_once 'models/User.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->validateLogin($username, $password)) {
                header('Location: index.php');
            } else {
                $error = "Invalid username or password.";
                require 'views/auth/login.php';
            }
        } else {
            require 'views/auth/login.php';
        }
    }

    private function validateLogin($username, $password)
    {
        $user = User::getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }

        return false;
    }
}
