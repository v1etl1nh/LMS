<?php

class Option
{
    private $db;
    private $id;
    private $question_id;
    private $option;
    private $is_correct;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM `options`');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM `options` WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setQuestion_id($question_id)
    {
        $this->question_id = $question_id;
    }

    public function setOption($option)
    {
        $this->option = $option;
    }

    public function setIs_correct($is_correct)
    {
        $this->is_correct = $is_correct;
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO `options` (question_id, option, is_correct) VALUES (:question_id, :option, :is_correct)');
        $query->bindParam(':question_id', $this->question_id, PDO::PARAM_INT);
        $query->bindParam(':option', $this->option, PDO::PARAM_STR);
        $query->bindParam(':is_correct', $this->is_correct, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE `options` SET question_id = :question_id, option = :option ,is_correct = :is_correct WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':question_id', $this->question_id, PDO::PARAM_INT);
        $query->bindParam(':option', $this->option, PDO::PARAM_STR);
        $query->bindParam(':is_correct', $this->is_correct, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $queryCount = $this->db->query('SELECT COUNT(*) FROM `options`');
        $rowCount = $queryCount->fetchColumn();

        $query = $this->db->prepare('DELETE FROM `options` WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();

        $nextAutoIncrement = $rowCount;
        $queryResetAutoIncrement = $this->db->prepare('ALTER TABLE `options` AUTO_INCREMENT = :nextAutoIncrement');
        $queryResetAutoIncrement->bindParam(':nextAutoIncrement', $nextAutoIncrement, PDO::PARAM_INT);
        $queryResetAutoIncrement->execute();
    }
}
