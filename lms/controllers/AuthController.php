<?php
require_once 'lms/models/Auth.php';
require_once 'lms/models/User.php';



class AuthController
{
    public function login()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['email'];
        $password = $_POST['password'];

        $message = $this->validateLogin($username, $password);
        if ($message === true) {
            header('Location: lms/views/auth/index.php');
        } else {
            require 'lms/views/auth/login.php';
            
        }
    } else { 
        require 'lms/views/auth/login.php';
    }
}

private function validateLogin($username, $password)
{
    if (empty($username) || empty($password)) {
        return "Nhập đầy đủ thông tin";
    }

    $user = Auth::getUserByEmail($username);

    if ($user) {
        if ($password === $user['password'] || password_verify($password, $user['password']) || $password === $user['plain_password']) {
            // Đăng nhập thành công
            $_SESSION['username'] = $user['username'];
            $role = $user['role'];
            $_SESSION['role'] = $role;
            return true;
        } else {
            // Thông tin đăng nhập không chính xác
            return "Thông tin đăng nhập không chính xác.";
        }
    } else {
        return "Người dùng không tồn tại.";
    }
}
public function index(){
    require_once 'lms/views/auth/index.php';
}
public function dk(){
    require_once 'lms/views/auth/register.php';
}

public function register() {
    // Xử lý yêu cầu đăng ký ở đây
    // Gọi hàm đăng ký từ lớp User
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Thực hiện đăng ký
        $auth = new User();
        $auth->setName($username);
        $auth->setEmail($email);
        $auth->setPassword($password);
        $auth->save();
            header("Location: index.php?controller=auth&action=index");
    }
}





}
?>