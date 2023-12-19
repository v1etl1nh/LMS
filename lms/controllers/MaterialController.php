<?php
require_once 'lms/models/Material.php';
require_once 'lms/models/Lesson.php';


class MaterialController
{
    public function index()
    {
        $materials = Material :: getAll();
        require_once 'lms/views/material/index.php';
    }

    public function create()
    {
        $lessons = Lesson :: getAll();
        require_once 'lms/views/material/create.php';
    }

    public function store()
    {
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];
        $file_path = $_POST['file_path'];

        $material = new Material();
        $material->setLesson_id($lesson_id);
        $material->setTitle($title);
        $material->setFile_path($file_path);
        $material->save();

        header('Location: index.php?controller=material&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $lessons = Lesson :: getAll();
        $material = Material :: getById($id);
        require 'lms/views/material/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];
        $file_path = $_POST['file_path'];

        $material = new Material();
        $material->setId($id);
        $material->setTitle($title);
        $material->setLesson_id($lesson_id);
        $material->setFile_path($file_path);
        $material->update();

        header('Location: index.php?controller=material&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $material = new Material();
        $material->setId($id);
        $material->delete();

        header('Location: index.php?controller=material&action=index');
    }
}
