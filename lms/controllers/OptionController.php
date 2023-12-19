<?php
require_once 'lms/models/Option.php';
require_once 'lms/models/Question.php';

class OptionController
{
    public function index()
    {
        $options = Option :: getAll();
        require_once 'lms/views/option/index.php';
    }

    public function create()
    {
        $questions = Question :: getAll();
        require_once 'lms/views/option/create.php';
    }

    public function store()
    {
        $question_id = explode('-', $_POST['question_id'])[0];
        $optionLetters = ['A', 'B', 'C', 'D'];
    
        foreach ($optionLetters as $letter) {
            $optionText = $_POST['option_' . $letter];
            $is_correct = isset($_POST['is_correct_' . $letter]) ? 1 : 0;
    
            $option = new Option();
            $option->setQuestion_id($question_id);
            $option->setOption($optionText);
            $option->setIs_correct($is_correct);
            $option->save();
        }
    
        header('Location: index.php?controller=option&action=index');
    }
    
    public function edit()
    {
        $id = $_GET['id'];
        $option = Option::getById($id);
        $question = Question :: getById($option['question_id']);
        $optionswithquestion = Option::getByQuestion_Id($option['question_id']);
        require 'lms/views/option/edit.php';
    }

    public function update()
    {
        $question_id = explode('-', $_POST['question_id'])[0];
        $optionLetters = ['A', 'B', 'C', 'D'];
    
        foreach ($optionLetters as $letter) {
            $id = $_POST['id_' . $letter];
            $optionText = $_POST['option_' . $letter];
            $is_correct = isset($_POST['is_correct_' . $letter]) ? 1 : 0;
    
            $option = new Option();
            $option->setId($id);
            $option->setQuestion_id($question_id);
            $option->setOption($optionText);
            $option->setIs_correct($is_correct);
            $option->update();
        }

        header('Location: index.php?controller=option&action=index');
    }
    

    public function delete()
    {
        $id = $_GET['id'];
        $question_id = Option::getById($id);
        $question_id = $question_id['question_id'];
        $option = new Option();
        $option->setQuestion_Id($question_id);
        $option->delete();

        header('Location: index.php?controller=option&action=index');
    }
}
