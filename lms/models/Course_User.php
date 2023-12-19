<?php
//include_once __DIR__ . '/../../config.php';

class Course_User{
    private $courseId;
    private $userId;
	private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

	public function getCourseId() {
		return $this->courseId;
	}

	public function setCourseId($courseId) {
		$this->courseId = $courseId;
	}

	public function getUserId() {
		return $this->userId;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}

    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM course_user');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

	public static function getByUserId($userId)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT title FROM course_user, courses WHERE course_user.course_id=courses.id AND user_id = :userId');
        $query->bindParam(':userId',$userId, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        // $course_user = new Course_User();
        // $course_user->setCourseId($result['course_id']);
        // $course_user->setUserId($userId);
        // return $course_user;
    }

	public function save()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $this->db->prepare('INSERT INTO course_user (`course_id`, `user_id`) VALUES (:courseId, '.':userId'.')');
        $query->bindParam(':courseId', $this->courseId, PDO::PARAM_STR);
        $query->bindParam(':userId', $this->userId, PDO::PARAM_STR);
        $query->execute();
    }

    // public function update()
    // {
    //     $query = $this->db->prepare('UPDATE course_user SET `course_id` = :courseId, `user_id` = :userId WHERE course_id = :courseId AND user_id = :userId');
    //     $query->bindParam(':courseId', $this->courseId, PDO::PARAM_INT);
    //     $query->bindParam(':userId', $this->userId, PDO::PARAM_STR);
    //     $query->execute();
    // }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM course_user WHERE course_id = :courseId AND user_id = :userId');
        $query->bindParam(':courseId', $this->courseId, PDO::PARAM_INT);
        $query->bindParam(':userId', $this->userId, PDO::PARAM_INT);
        $query->execute();
    }
}
?>