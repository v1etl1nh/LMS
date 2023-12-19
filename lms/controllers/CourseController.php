<?php
require_once 'lms/models/Course.php';


class CourseController{
    public function index()
    {
        $courses = Course::getAll();
        // echo "<pre>";
        // print_r($courses);
        // echo "</pre>";
        
        require 'lms/views/course/index.php';
    }

    // Display the course creation form
    public function create()
    {
        require 'lms/views/course/create.php';
    }

    // Store a newly created course in the database
    public function store()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $course = new Course();
        $course->setTitle($title);
        $course->setDescription($description);
        $course->save();

        header('Location: index.php?controller=course&action=index');
    }

    // Display the course editing form
    public function edit()
    {
        $id = $_GET['id'];
        $course = Course::getById($id);
        $tit = $course->getTitle();
        $des = $course->getDescription();
        require 'lms/views/course/edit.php';
    }

    // Update the specified course in the database
    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $course = Course::getById($id);
        print_r($course);
        $course->setTitle($title);
        $course->setdescription($description);
        //$course->save();
        // if($course){
        //     $cour = new Course();
        //     $cour->setTitle ($title);
        //     $cour->setDescription ($description);
        //     $cour->save();
        // }  
        $course->update();
        header('Location: index.php?controller=course&action=index');
        
    }

    // Delete the specified course from the database
    public function delete()
    {
        $id = $_GET['id'];
        $course = Course::getById($id);

        $course->delete();
        header('Location: index.php?controller=course&action=index');
    }
}
?>