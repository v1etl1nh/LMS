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
                header('Location:index.php?controller=user&action=index');
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
            if (password_verify($password, $user['password'])) {
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

    public function index()
    {
        require_once 'lms/views/auth/index.php';
    }

    public function dk()
    {
        require_once 'lms/views/auth/register.php';
    }
    
    private function validateRecaptcha()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kiểm tra reCAPTCHA
            $recaptchaSecretKey = '6LcxqjApAAAAAAGYAqqOQosc3_LKNVbQBuyifX1s';
            $recaptchaResponse = $_POST['g-recaptcha-response'];

            $recaptchaVerifyUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}";
            $recaptchaResponseData = json_decode(file_get_contents($recaptchaVerifyUrl));

            if (!$recaptchaResponseData->success) {
                // reCAPTCHA không hợp lệ, trả về thông báo lỗi
                return "reCAPTCHA verification failed.";
            }
            return true;
        }

     
        return false;
    }

    public function register()
    {
        $message6 = "";

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recaptchaMessage = $this->validateRecaptcha();
            if ($recaptchaMessage !== true) {
                // reCAPTCHA không hợp lệ, xử lý lỗi ở đây
                $message6 = $recaptchaMessage;
                require_once 'lms/views/auth/register.php';
                return;
            }
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
                 if ($username== ''|| $email == '' || $password == ''){
                        $message6  = "Vui lòng nhập đầy đủ thông tin";
                         require_once 'lms/views/auth/register.php';
                                }
                                if (Auth::isEmailExists($email)) {
                                    $message6  = "Email đã tồn tại";
                                    require_once 'lms/views/auth/register.php';
                                } else {
                                    $auth = new User();
                                    $auth->setName($username);
                                    $auth->setEmail($email);
                                    $auth->setPassword($password);
                                    $auth->save();
                            
                                    header("Location: index.php?controller=auth&action=login");
                                }
        }
    }
}
?>
