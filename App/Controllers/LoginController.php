<?php

namespace App\Controllers;

// import class Action
use MF\Controller\Action;
use App\Models\Login;

class LoginController extends Action {

	// page register
	public function register() {

		$this->view->student = array(
			'name' => '',
			'email' => '',
			'password' => ''
		);

		$this->view->errorRegister = false; // error message

		$this->render('login', 'register');
	}

	// page login
	public function login() { 

		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('login', 'login');
	}

	// action register_login
	public function register_login() { // action register Login

		$student = new Login(); 

		$student->__set('name', $_POST['name']);
		$student->__set('email', $_POST['email']);
		$student->__set('password', md5($_POST['password']));

		if($student->validLogin() &&  count($student->getLoginForId())==0) {
			
			$student->save(); // save
			header('location:/success');

		}else {			

			$this->view->student = array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'password' => $_POST['password']
			);

			$this->render('login', 'register'); // path, view
		}
	}

	// page success
	public function success() {
		$this->render('login', 'success');
	}
}

?>