<?php

namespace MF\Init;

abstract class Bootstrap {
	private $routes;

	abstract protected function initRoutes(); 

	public function __construct() {
		$this->initRoutes();  // init page or action
		$this->run($this->getUrl()); // url
	}

	public function getRoutes() {
		return $this->routes;
	}

	public function setRoutes(array $routes) {
		$this->routes = $routes;
	}

	protected function run($url) {
		foreach ($this->getRoutes() as $key => $route) {
			if($url == $route['route']) {

				// create class
				$class = "App\\Controllers\\".ucfirst($route['controller']);

				// object
				$controller = new $class;
				
				// create action 
				$action = $route['action'];

				// execute action
				$controller->$action();
			}
		}
	}

	protected function getUrl() { // url
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}

?>