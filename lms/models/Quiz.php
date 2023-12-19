<?php

class Quiz
{
    private $db;
    private $id;
    private $lesson_id;
    private $title;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM quizzes');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM quizzes WHERE id = :id');
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

    public function setLesson_id($lesson_id)
    {
        $this->lesson_id = $lesson_id;
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO quizzes (lesson_id, title) VALUES (:lesson_id, :title)');
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':lesson_id', $this->lesson_id, PDO::PARAM_INT);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE quizzes SET title = :title, lesson_id = :lesson_id WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':lesson_id', $this->lesson_id, PDO::PARAM_INT);
        $query->execute();
    }

    public function delete()
    {
        $queryCount = $this->db->query('SELECT COUNT(*) FROM quizzes');
        $rowCount = $queryCount->fetchColumn();

        $query = $this->db->prepare('DELETE FROM quizzes WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();

        $nextAutoIncrement = $rowCount;
        $queryResetAutoIncrement = $this->db->prepare('ALTER TABLE quizzes AUTO_INCREMENT = :nextAutoIncrement');
        $queryResetAutoIncrement->bindParam(':nextAutoIncrement', $nextAutoIncrement, PDO::PARAM_INT);
        $queryResetAutoIncrement->execute();
    }
}
