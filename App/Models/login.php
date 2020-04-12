<?php

namespace App\Models;

// import class Student
use App\Models\Student;
use App\Connection;

class Login extends Student {

	private $id;
	private $email;
	private $password;
	public $db;

	public function __construct() {
		$this->db = Connection::getDb();
	}

	public function __get($attribute) {
		return $this->$attribute;
	}

	public function __set($attribute, $value) {
		$this->$attribute = $value;
	}

	// SAVE
	public function save() {

		$query = "insert into tb_login(name,email,password)
					values(:name,:email,:password)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':name', $this->__get('name'));
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':password', $this->__get('password'));
		$stmt->execute();
		return $this;
	}

	// VALID
	public function validLogin() {
		
		$valid = true;

		if(strlen($this->__get('name')) < 3){
			$valid = false;
		}

		if(strlen($this->__get('email')) < 3){
			$valid = false;
		}

		if(strlen($this->__get('password')) < 3){
			$valid = false;
		}

		return $valid;
	}

	// SELECT Email e Password
	public function auth() {
		
		$query = "select id,name,email
				  from tb_login 
				  where email=:email and password=:password";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':password', $this->__get('password'));
		$stmt->execute();		
		$student = $stmt->fetch(\PDO::FETCH_ASSOC);

		if($student['id']!='' && $student['name']!='') {

			$this->__set('id', $student['id']);
			$this->__set('name', $student['name']);
		}

		return $this;
	}

	// SELECT for id
	public function getLoginForId() {
		
		$query = "select id,name,email
				  from tb_login 
				  where email=:email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->execute();		
		
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);;
	}

}

?>