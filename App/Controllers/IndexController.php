<?php

namespace App\Controllers;

use MF\Controller\Action;

class IndexController extends Action {

	// page index
	public function index() {
		
		$this->render('index','index');			
		
	}

}


?>