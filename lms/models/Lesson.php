<?php

class Lesson
{
    private $db;
    private $id;
    private $course_id;
    private $title;
    private $description;


    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM lessons');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM lessons WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setCourse_id($course_id)
    {
        $this->course_id = $course_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO lessons (course_id, title, description) VALUES (:course_id, :title, :description)');
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_INT);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE lessons SET title = :title, course_id = :course_id, description=:description WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_INT);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $queryCount = $this->db->query('SELECT COUNT(*) FROM lessons');
        $rowCount = $queryCount->fetchColumn();

        $query = $this->db->prepare('DELETE FROM lessons WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();

        $nextAutoIncrement = $rowCount;
        $queryResetAutoIncrement = $this->db->prepare('ALTER TABLE lessons AUTO_INCREMENT = :nextAutoIncrement');
        $queryResetAutoIncrement->bindParam(':nextAutoIncrement', $nextAutoIncrement, PDO::PARAM_INT);
        $queryResetAutoIncrement->execute();
    }
}
