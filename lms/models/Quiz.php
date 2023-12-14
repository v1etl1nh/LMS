<?php
class Quiz
{
    private $id;
    private $lessonId;
    private $title;
    private $createdAt;
    private $updatedAt;

    public function __construct($lessonId, $title)
    {
        $this->lessonId = $lessonId;
        $this->title = $title;
        $this->createdAt = date('Y-m-d H:i:s');
        $this->updatedAt = date('Y-m-d H:i:s');
    }

    // Add getter and setter methods as needed
}
