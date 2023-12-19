<?php
//include_once __DIR__ . '/../../config.php';

class Course{
    private $id;
    private $title;
    private $description;
	private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
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

    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM courses');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

	public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM courses WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);
        $course = new Course();
        $course->setId($id);
        $course->setTitle($result['title']);
        $course->setDescription($result['description']);

        return $course;
    }

	public function save()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $this->db->prepare('INSERT INTO courses (`title`, `description`) VALUES (:title, '.':description'.')');
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE courses SET `title` = :title, `description` = '.':description'.' WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM courses WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }
}
?>