<?php

namespace App\Models;

abstract class Student {

	private $name;

	public function __get($attribute) {
		return $this->$attribute;
	}

	public function __set($attribute, $value) {
		$this->$attribute = $value;
	}
}

?>