<?php
class Option
{
    private $id;
    private $questionId;
    private $option;
    private $isCorrect;
    private $createdAt;
    private $updatedAt;

    public function __construct($questionId, $option, $isCorrect)
    {
        $this->questionId = $questionId;
        $this->option = $option;
        $this->isCorrect = $isCorrect;
        $this->createdAt = date('Y-m-d H:i:s');
        $this->updatedAt = date('Y-m-d H:i:s');
    }

    // Add getter and setter methods as needed
}
