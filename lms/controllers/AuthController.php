<?php
require_once 'lms/models/Auth.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->validateLogin($username, $password)) {
                header('Location: lms/views/auth/index.php');
            } else {
                $error = "Invalid username or password.";
                require 'lms/views/auth/login.php';
            }
        } else {
            require 'lms/views/auth/login.php';
        }
    }

    private function validateLogin($username, $password)
    {
        $user = Auth::getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }

        return false;
    }
}
