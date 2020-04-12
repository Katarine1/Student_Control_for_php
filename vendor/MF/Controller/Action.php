<?php

namespace MF\Controller;

abstract class Action {

	protected $view;

	public function __construct() {
		$this->view = new \stdClass(); // create class
	}

	// method open page
	protected function render($path, $view) {
		$this->view->page = $view;
		require_once "../App/Views/".$path."/".$view.".phtml";
	}	
}

?>