<?php
require_once 'lms/models/Lesson.php';


class LessonController{
    public function index()
    {
        $lessons = Lesson::getAll();
        // echo "<pre>";
        // print_r($lessons);
        // echo "</pre>";
        
        require 'lms/views/lesson/index.php';
    }

    // Display the lesson creation form
    public function create()
    {
        require 'lms/views/lesson/create.php';
    }

    // Store a newly created lesson in the database
    public function store()
    {
        $course_id = $_POST['course_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $lesson = new Lesson();
        $lesson->setCourse_Id($course_id);
        $lesson->setTitle($title);
        $lesson->setDescription($description);
        $lesson->save();

        header('Location: index.php?controller=lesson&action=index');
    }

    // Display the lesson editing form
    public function edit()
    {
        $id = $_GET['id'];
        $lesson = lesson::getById($id);
        $cour_id = $lesson->getCourse_Id();
        $tit = $lesson->getTitle();
        $des = $lesson->getDescription();
        require 'lms/views/lesson/edit.php';
    }

    // Update the specified lesson in the database
    public function update()
    {
        $id = $_POST['id'];
        $course_id = $_POST['course_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $lesson = lesson::getById($id);
        $lesson->setCourse_Id($course_id);
        $lesson->setTitle($title);
        $lesson->setdescription($description);
        //$lesson->save();
        // if($lesson){
        //     $cour = new lesson();
        //     $cour->setTitle ($title);
        //     $cour->setDescription ($description);
        //     $cour->save();
        // }  
        $lesson->update();
        header('Location: index.php?controller=lesson&action=index');
        
    }

    // Delete the specified lesson from the database
    public function delete()
    {
        $id = $_GET['id'];
        $lesson = Lesson::getById($id);

        $lesson->delete();
        header('Location: index.php?controller=lesson&action=index');
    }
}
?>