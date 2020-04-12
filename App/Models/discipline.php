<?php

namespace App\Models;

use App\Connection;

class Discipline {

	private $id;
	private $name;
	private $teacher;
	private $hour;
	private $id_login;
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

		$query = "insert into tb_discipline(name,teacher,hour,id_login)
					values(:name,:teacher,:hour,:id_login)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':name', $this->__get('name'));
		$stmt->bindValue(':teacher', $this->__get('teacher'));
		$stmt->bindValue(':hour', $this->__get('hour'));
		$stmt->bindValue(':id_login', $this->__get('id_login'));
		$stmt->execute();
		return $this;
	}

	// SELECT
	public function getAll() {

		$query = "select 
					dis.id as id_dis,
					dis.name,
					dis.teacher,
					dis.hour,
					dis.id_login									
				  from 
				  	tb_discipline as dis";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	// VALID
	public function validDiscipline() {
		
		$valid = true;

		if(strlen($this->__get('name')) < 4){
			$valid = false;
		}

		if(strlen($this->__get('teacher')) < 4){
			$valid = false;
		}

		if(strlen($this->__get('hour')) < 4){
			$valid = false;
		}

		return $valid;
	}

	// DELETE
	public function remove($id) {

		$this->getAll();

		$query = "delete from tb_discipline where id= :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();		

		return $this;
	}	
}

?>