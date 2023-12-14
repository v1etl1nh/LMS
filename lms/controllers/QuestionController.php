<?php
require_once 'lms/models/Question.php';

class QuestionController
{
    public function index()
    {
        $questions = Question :: getAll();
        require_once 'lms/views/question/index.php';
    }

    public function create()
    {
        require_once 'lms/views/question/create.php';
    }

    public function store()
    {
        $quiz_id = $_POST['quiz_id'];
        $question = $_POST['question'];

        $question = new Question();
        $question->setQuiz_id($quiz_id)
        $question->setQuestion($question);
        $question->save();

        header('Location: index.php?controller=question&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $question = Question::getById($id);
        require 'lms/views/question/edit.php';
    }

    // Update the specified question in the database
    public function update()
    {
        $id = $_POST['id'];
        $quiz_id = $_POST['quiz_id'];
        $question = $_POST['question'];

        $question = Question::getById($id);
        $question->setQuiz_id($quiz_id)
        $question->setQuestion($question);
        $question->update();

        header('Location: index.php?controller=question&action=index');
    }

    // Delete the specified question from the database
    public function delete()
    {
        $id = $_GET['id'];
        $question = Question::getById($id);
        $question->delete();

        header('Location: index.php?controller=question&action=index');
    }
}
