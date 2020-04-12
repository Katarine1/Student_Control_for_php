<?php

namespace App\Controllers;

// import class Action
use MF\Controller\Action;

use App\Models\Discipline;
use App\Models\TestJob;

class AppController extends Action {	

	// page discipline
	public function discipline() {

		session_start();

		$this->view->saveDiscipline = isset($_GET['save']) ? $_GET['save'] : '';

		$this->view->discipline = array(
			'name' => '',
			'teacher' => '',
			'hour' => ''
		);

		if($_SESSION['id']!='' && $_SESSION['name']!='') {

			$this->render('app', 'discipline');

		} else {

			header('location:/login?login=error');
		}
	}

	// action register_discipline
	public function register_discipline() {

		session_start();

		$discipline = new Discipline();	
	
		$discipline->__set('name', $_POST['name']);
		$discipline->__set('teacher', $_POST['teacher']);
		$discipline->__set('hour', $_POST['hour']);
		$discipline->__set('id_login', $_SESSION['id']);

		if($discipline->validDiscipline()) {
				
			$discipline->save();	
			header('location:/testjob');

		} else {	

			$this->view->discipline = array(
				'name' => $_POST['name'],
				'teacher' => $_POST['teacher'],
				'hour' => $_POST['hour']
			);
					
			header('location:/discipline?save=error');
		}
	}

	// page testjob
	public function testjob() {

		session_start();

		$discipline = new Discipline();
		$this->view->disciplines = $discipline->getAll();

		$this->view->saveTestJob = isset($_GET['save']) ? $_GET['save'] : '';

		$this->view->testJobs = array(
			'dateEvent' => '',
			'id_discipline' => '',
			'content' => '',
			'note' => ''
		);		
			
		$this->render('app', 'testjob');
	}

	// action register_testjob
	public function register_testjob() {
		session_start();
		$testJob = new TestJob();

		$testJob->__set('dateEvent', $_POST['dateEvent']);
		$testJob->__set('id_login', $_SESSION['id']);
		$testJob->__set('id_discipline', $_POST['id_discipline']);				
		$testJob->__set('content', $_POST['content']);
		$testJob->__set('note', $_POST['note']);		

		if($testJob->save()) {
			
			header('location:/list_disciplines');

		} else {
				
			$this->view->testJobs = array(
				'dateEvent' => $_POST['dateEvent'],
				'id_discipline' => $_POST['id_discipline'],
				'content' => $_POST['content'],
				'note' => $_POST['note']
			);

			header('location:testjob?save=error');
		}		
	}	

	// page list_disciplines
	public function list_disciplines() {

		session_start();
		
		$discipline = new Discipline();
		$this->view->disciplines = $discipline->getAll();

		$testJob = new TestJob();
		$this->view->testJobs = $testJob->getAll();

		$this->render('app', 'list_disciplines');
	}

	// action delete_testjob
	public function delete_testjob() {
		
		session_start();

		$testJob = new TestJob();

		$testJob->remove($_GET['id_test']);
		header('location:/list_disciplines');
		
		$this->render('app', 'delete_testjob');		
	}	

	// action delete_discipline
	public function delete_discipline() {
		
		session_start();

		$discipline = new Discipline();	
		
		$discipline->remove($_GET['id_dis']);
		header('location:/list_disciplines');		

		$this->render('app', 'delete_discipline');
	}

	
}


?>