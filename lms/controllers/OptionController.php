<?php
require_once 'lms/models/Option.php';

class OptionController
{
    public function index()
    {
        $options = Option :: getAll();
        require_once 'lms/views/option/index.php';
    }

    public function create()
    {
        require_once 'lms/views/option/create.php';
    }

    public function store()
    {
        $question_id = $_POST['question_id'];
        $option = $_POST['option'];
        $is_correct = $_POST['is_correct'];

        $option = new Option();
        $option->setQuestion_id($question_id)
        $option->setOption($option);
        $option->setIs_correct($is_correct);
        $option->save();

        header('Location: index.php?controller=option&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $option = Option::getById($id);
        require 'lms/views/option/edit.php';
    }

    // Update the specified option in the database
    public function update()
    {
        $id = $_POST['id'];
        $question_id = $_POST['question_id'];
        $option = $_POST['option'];
        $is_correct = $_POST['is_correct'];

        $option = Option::getById($id);
        $option->setQuestion_id($question_id)
        $option->setOption($option);
        $option->setIs_correct($is_correct);
        $option->update();

        header('Location: index.php?controller=option&action=index');
    }

    // Delete the specified option from the database
    public function delete()
    {
        $id = $_GET['id'];
        $option = Option::getById($id);
        $option->delete();

        header('Location: index.php?controller=option&action=index');
    }
}
