<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array( //page index
			'route' => '/',
			'controller' => 'IndexController',
			'action' => 'index'
		);

		$routes['register'] = array( // page register
			'route' => '/register',
			'controller' => 'LoginController',
			'action' => 'register'
		);

		$routes['login'] = array( // page login
			'route' => '/login',
			'controller' => 'LoginController',
			'action' => 'login'
		);

		$routes['discipline'] = array( // page discipline
			'route' => '/discipline',
			'controller' => 'AppController',
			'action' => 'discipline'
		);

		$routes['testjob'] = array( // page testjob
			'route' => '/testjob',
			'controller' => 'AppController',
			'action' => 'testjob'
		);

		$routes['register_login'] = array( // action register_login
			'route' => '/register_login',
			'controller' => 'LoginController',
			'action' => 'register_login'
		);	

		$routes['success'] = array( // action register_login
			'route' => '/success',
			'controller' => 'LoginController',
			'action' => 'success'
		);	

		$routes['register_discipline'] = array( // action register_disciplinen
			'route' => '/register_discipline',
			'controller' => 'AppController',
			'action' => 'register_discipline'
		);

		$routes['auth_login'] = array( // action auth_login
			'route' => '/auth_login',
			'controller' => 'AuthController',
			'action' => 'auth_login'
		);	

		$routes['register_testjob'] = array( // register testjob
			'route' => '/register_testjob',
			'controller' => 'AppController',
			'action' => 'register_testjob'
		);

		$routes['list_disciplines'] = array( // action list_disciplines
			'route' => '/list_disciplines',
			'controller' => 'AppController',
			'action' => 'list_disciplines'
		);

		$routes['delete_discipline'] = array( // action delete_discipline
			'route' => '/delete_discipline',
			'controller' => 'AppController',
			'action' => 'delete_discipline'
		);

		$routes['delete_testjob'] = array( // action delete_testjob
			'route' => '/delete_testjob',
			'controller' => 'AppController',
			'action' => 'delete_testjob'
		);		

		$routes['exit'] = array( // action auth_login
			'route' => '/exit',
			'controller' => 'AuthController',
			'action' => 'exit'
		);

		$this->setRoutes($routes);
	}

}

?>