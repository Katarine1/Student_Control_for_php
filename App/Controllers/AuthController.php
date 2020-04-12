<?php

namespace App\Controllers;

use App\Models\Login;
use App\Models\Discipline;

use MF\Controller\Action;

class AuthController extends Action {

	// auth_login
	public function auth_login(){

		$student = new Login();
		$student->__set('email', $_POST['email']);
		$student->__set('password', md5($_POST['password']));
		$student->auth();

		if($student->__get('id')!='' && $student->__get('name')!='') {

			session_start(); // init session
			$_SESSION['id'] = $student->__get('id'); 
			$_SESSION['name'] = $student->__get('name');
			
			header('location:/list_disciplines');

		} else {

			header('location:/login?login=error');
		}
	}

	// exit (log off)
	public function exit() {
		session_start();
		session_destroy();
		header('location:/');
	}
}

?>