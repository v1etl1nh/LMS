<?php

class User
{
    private $db;
    private $id;
    private $name;
    private $email;
    private $password;


    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM users');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function save()
    {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $query = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $query->execute();
    }
    
    public static function update($id, $name, $email, $password)
{
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = $db->prepare('UPDATE users SET name = :name, email = :email, password=:password WHERE id = :id');
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password',$hashedPassword, PDO::PARAM_STR);
    $query->execute();
}


    public function delete()
    {
        $queryCount = $this->db->query('SELECT COUNT(*) FROM users');
        $rowCount = $queryCount->fetchColumn();

        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);

        $query->execute();

        $nextAutoIncrement = $rowCount;
        $queryResetAutoIncrement = $this->db->prepare('ALTER TABLE users AUTO_INCREMENT = $nextAutoIncrement');
        $queryResetAutoIncrement->execute();
    }
    public static function isEmailExists($email)
{
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchColumn() > 0;
    } catch (PDOException $e) {
        // Handle the exception (log, display an error message, etc.)
        echo "Error: " . $e->getMessage();
        return false; // Indicate failure
    }
}

}
