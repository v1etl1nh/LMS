<?php
require_once 'lms/models/Course_User.php';

class Course_UserController{
    public function index()
    {
        $course_user = Course_User::getByUserId($_SESSION['UID']);
        // echo "<pre>";
        // print_r($courses);
        // echo "</pre>";
        require 'lms/views/course_user/index.php';
    }

    // Display the course creation form
    public function create()
    {
        require 'lms/views/course_user/create.php';
    }

    // Store a newly created course in the database
    public function store()
    {
        $courseId = $_POST['courseId'];
        $userId = $_POST['userId'];

        $course_user = new Course_User();
        $course_user->setCourseId($courseId);
        $course_user->setUserId($userId);
        $course_user->save();

        header('Location: index.php?controller=course_user&action=index');
    }

    // Display the course editing form
    // public function edit()
    // {
    //     $userId = $_GET['userId'];
    //     $course_user = Course_User::getByUserId($userId);
    //     $cour = $course_user->getCourseId();
    //     $user = $course_user->getUserId();
    //     require 'lms/views/course_user/edit.php';
    // }

    // Update the specified course in the database
    // public function update()
    // {
    //     $id = $_POST['id'];
    //     $courseId = $_POST['courseId'];
    //     $userId = $_POST['userId'];

    //     $course = Course::getById($id);
    //     print_r($course);
    //     $course->setcourseId($courseId);
    //     $course->setuserId($userId);
    //     //$course->save();
    //     // if($course){
    //     //     $cour = new Course();
    //     //     $cour->setcourseId ($courseId);
    //     //     $cour->setuserId ($userId);
    //     //     $cour->save();
    //     // }  
    //     $course->update();
    //     header('Location: index.php?controller=course&action=index');
        
    // }

    // Delete the specified course from the database
    // public function delete()
    // {
    //     $userId = $_GET['userId'];
    //     $courseId = Course_User::getById($id);

    //     $course->delete();
    //     header('Location: index.php?controller=course&action=index');
    // }
}
?>