<?php
require_once 'lms/models/User.php';

class UserController
{
    public function index()
    {
        $users = User :: getAll();
        require_once 'lms/views/user/index.php';
    }

    public function create()
    {
        require_once 'lms/views/user/create.php';
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
                 if ($name== ''|| $email == '' || $password == ''){
                        $message6  = "Vui lòng nhập đầy đủ thông tin";
                         require_once 'lms/views/user/create.php';
                                }
                                if (User::isEmailExists($email)) {
                                    $message6  = "Email đã tồn tại";
                                    require_once 'lms/views/user/create.php';
                                } else {
                                    $user = new User();
                                    $user->setName($name);
                                    $user->setEmail($email);
                                    $user->setPassword($password);
                                    $user->save();
                            
                                    header('Location: index.php?controller=user&action=index');
                                }
        }
    }
    

    public function edit()
    {
        $id = $_GET['id'];
        $user = User::getById($id);
        require 'lms/views/user/edit.php';
    }

    // Update the specified ues$user in the database

    public function update()
{
    $id = $_POST['id'];
    $name = isset($_POST['name']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    User::update($id, $name, $email, $password);

    header('Location: index.php?controller=user&action=index');
}


    // Delete the specified ues$user from the database
    public function delete()
    {
        $id = $_GET['id'];
    
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = $db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    
        header('Location: index.php?controller=user&action=index');
    }
    
}
