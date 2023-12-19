<?php
require_once 'config.php';

class Auth
{
    private static $db;

    public function __construct()
    {
        self::$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getUserByEmail($email)
    {
        try {
            $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $kiemTra = "SELECT * FROM users WHERE `email`=?";
            $stmt = $conn->prepare($kiemTra);
    
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }


    public function registerUser($username, $email, $password)
    {
        try {
            $existingUser = $this->getUserByEmail($email);
    
            if ($existingUser) {
                return false;
            }
    
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $stmt = self::$db->prepare("INSERT INTO users (name, email, password) VALUES (:username, :email,)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            error_log("Error when trying to register user: " . $e->getMessage());
            return false;
        }
    }
    
    
    public static function isEmailExists($email)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchColumn() > 0;
    }
}
?>
