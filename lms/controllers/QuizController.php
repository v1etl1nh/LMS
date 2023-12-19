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
        $lessons = Lesson :: getAll();
        $quiz = Quiz::getById($id);
        require 'lms/views/quiz/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];

        $quiz = new Quiz();
        $quiz->setId($id);
        $quiz->setTitle($title);
        $quiz->setLesson_id($lesson_id);
        $quiz->update();

        header('Location: index.php?controller=quiz&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $quiz = new Quiz();
        $quiz->setId($id);
        $quiz->delete();

        header('Location: index.php?controller=quiz&action=index');
    }
}
