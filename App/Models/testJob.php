<?php

namespace App\Models;

use App\Connection;

class TestJob {

	private $id;
	private $dateEvent;
	private $id_login;
	private $id_discipline;
	private $content;
	private $note;
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

		$query = "insert into tb_testjob(dateEvent,id_login,id_discipline,content,note)
					values(:dateEvent,:id_login,:id_discipline,:content,:note)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':dateEvent', $this->__get('dateEvent'));
		$stmt->bindValue(':id_login', $this->__get('id_login'));
		$stmt->bindValue(':id_discipline', $this->__get('id_discipline'));
		$stmt->bindValue(':content', $this->__get('content'));
		$stmt->bindValue(':note', $this->__get('note'));
		$stmt->execute();
		return $this;
	}

	// SELECT
	public function getAll() {

		$query = "select
					id as id_test,
					DATE_FORMAT(dateEvent, '%d/%m/%Y') as dateEvent,
					content,
					note,
					id_login,
					id_discipline
				  from
				  	 tb_testjob
				  order by 
				     dateEvent desc";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	// DELETE
	public function remove($id) {

		$query = "delete from tb_testjob where id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $this;
	}
}

?>