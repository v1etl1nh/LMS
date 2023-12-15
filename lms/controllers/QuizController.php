<?php
require_once 'lms/models/Quiz.php';
require_once 'lms/models/Lesson.php';


class QuizController
{
    public function index()
    {
        $quizzes = Quiz :: getAll();
        require_once 'lms/views/quiz/index.php';
    }

    public function create()
    {
        $lessons = Lesson :: getAll();
        require_once 'lms/views/quiz/create.php';
    }

    public function store()
    {
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];

        $quiz = new Quiz();
        $quiz->setLesson_id($lesson_id);
        $quiz->setTitle($title);
        $quiz->save();

        header('Location: index.php?controller=quiz&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $quiz = Quiz::getById($id);
        require 'lms/views/quiz/edit.php';
    }

    // Update the specified quiz in the database
    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];

        $quiz = Quiz::getById($id);
        $quiz->setTitle($title);
        $quiz->setLesson_id($lesson_id);
        $quiz->update();

        header('Location: index.php?controller=quiz&action=index');
    }

    // Delete the specified quiz from the database
    public function delete()
    {
        $id = $_GET['id'];
        $quiz = Quiz::getById($id);
        $quiz->delete();

        header('Location: index.php?controller=quiz&action=index');
    }
}
