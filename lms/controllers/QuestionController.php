<?php
require_once 'lms/models/Question.php';
require_once 'lms/models/Quiz.php';

class QuestionController
{
    public function index()
    {
        $questions = Question :: getAll();
        require_once 'lms/views/question/index.php';
    }

    public function create()
    {
        $quizzes = Quiz :: getAll();
        require_once 'lms/views/question/create.php';
    }

    public function store()
    {
        $quiz_id = $_POST['quiz_id'];
        $questionText = $_POST['question'];

        $question = new Question();
        $question->setQuiz_id($quiz_id);
        $question->setQuestion($questionText);
        $question->save();

        header('Location: index.php?controller=question&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $quizzes = Quiz :: getAll();
        $question = Question::getById($id);
        require 'lms/views/question/edit.php';
    }

    // Update the specified question in the database
    public function update()
    {
        $id = $_POST['id'];
        $quiz_id = $_POST['quiz_id'];
        $questionText = $_POST['question'];

        $question = new Question();
        $question->setId($id);
        $question->setQuiz_id($quiz_id);
        $question->setQuestion($questionText);
        $question->update();

        header('Location: index.php?controller=question&action=index');
    }

    // Delete the specified question from the database
    public function delete()
    {
        $id = $_GET['id'];
        $question = new Question();
        $question->setId($id);
        $question->delete();

        header('Location: index.php?controller=question&action=index');
    }
}
