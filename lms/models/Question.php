<?php

class Question
{
    private $db;
    private $id;
    private $quiz_id;
    private $question;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM questions');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM questions WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function setQuiz_id($quiz_id)
    {
        $this->quiz_id = $quiz_id;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO questions (quiz_id, question) VALUES (:quiz_id, :question)');
        $query->bindParam(':quiz_id', $this->quiz_id, PDO::PARAM_INT);
        $query->bindParam(':question', $this->question, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE questions SET quiz_id = :quiz_id, question = :question WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':quiz_id', $this->quiz_id, PDO::PARAM_INT);
        $query->bindParam(':question', $this->question, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $queryCount = $this->db->query('SELECT COUNT(*) FROM questions');
        $rowCount = $queryCount->fetchColumn();

        $query = $this->db->prepare('DELETE FROM questions WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();

        $nextAutoIncrement = $rowCount;
        $queryResetAutoIncrement = $this->db->prepare('ALTER TABLE questions AUTO_INCREMENT = $nextAutoIncrement');
        $queryResetAutoIncrement->execute();
    }
}
