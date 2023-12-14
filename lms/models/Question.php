<?php
class Question
{
    private $id;
    private $quizId;
    private $question;
    private $createdAt;
    private $updatedAt;

    public function __construct($quizId, $question)
    {
        $this->quizId = $quizId;
        $this->question = $question;
        $this->createdAt = date('Y-m-d H:i:s');
        $this->updatedAt = date('Y-m-d H:i:s');
    }

    // Add getter and setter methods as needed
}
