<?php
<<<<<<< HEAD

class Lesson
{
    private $db;
=======
class Lesson{
>>>>>>> 89887b34f4cea26e1d7527d08b85e739ca1fc36a
    private $id;
    private $course_id;
    private $title;
    private $description;
<<<<<<< HEAD


    public function __construct()
    {
=======
	private $db;

    public function __construct(){
>>>>>>> 89887b34f4cea26e1d7527d08b85e739ca1fc36a
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

<<<<<<< HEAD
=======
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

    public function getCourse_Id() {
		return $this->id;
	}

	public function setCourse_Id($course_id) {
		$this->course_id = $course_id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

>>>>>>> 89887b34f4cea26e1d7527d08b85e739ca1fc36a
    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM lessons');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

<<<<<<< HEAD
    public static function getById($id)
=======
	public static function getById($id)
>>>>>>> 89887b34f4cea26e1d7527d08b85e739ca1fc36a
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM lessons WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

<<<<<<< HEAD
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setCourse_id($course_id)
    {
        $this->course_id = $course_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO lessons (course_id, title, description) VALUES (:course_id, :title, :description)');
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_INT);
=======
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $lesson = new Lesson();
        $lesson->setId($id);
        $lesson->setCourse_Id($result['course_id']);
        $lesson->setTitle($result['title']);
        $lesson->setDescription($result['description']);

        return $lesson;
    }

	public function save()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $this->db->prepare('INSERT INTO lessons (`course_id`, `title`, `description`) VALUES (:course_id, :title, '.':description'.')');
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
>>>>>>> 89887b34f4cea26e1d7527d08b85e739ca1fc36a
        $query->execute();
    }

    public function update()
    {
<<<<<<< HEAD
        $query = $this->db->prepare('UPDATE lessons SET title = :title, course_id = :course_id, description=:description WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_INT);
=======
        $query = $this->db->prepare('UPDATE lessons SET `course_id` = :course_id, `title` = :title, `description` = '.':description'.' WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
>>>>>>> 89887b34f4cea26e1d7527d08b85e739ca1fc36a
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
<<<<<<< HEAD
        $queryCount = $this->db->query('SELECT COUNT(*) FROM lessons');
        $rowCount = $queryCount->fetchColumn();

        $query = $this->db->prepare('DELETE FROM lessons WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();

        $nextAutoIncrement = $rowCount;
        $queryResetAutoIncrement = $this->db->prepare('ALTER TABLE lessons AUTO_INCREMENT = :nextAutoIncrement');
        $queryResetAutoIncrement->bindParam(':nextAutoIncrement', $nextAutoIncrement, PDO::PARAM_INT);
        $queryResetAutoIncrement->execute();
    }
}
=======
        $query = $this->db->prepare('DELETE FROM lessons WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }
}
?>
>>>>>>> 89887b34f4cea26e1d7527d08b85e739ca1fc36a
