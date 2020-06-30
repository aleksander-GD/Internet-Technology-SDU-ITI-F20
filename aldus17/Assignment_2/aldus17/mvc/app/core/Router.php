<?php
class Router
{
	protected $controller = 'HomeController';
	protected $method = 'index';
	protected $params = [];

	function __construct()
	{
		$url = $this->parseUrl();

		// Make first char uppercase i.e. home -> Home
		if (isset($url[0])) {
			$url[0] = ucfirst($url[0]);
		}

		// If the controller exist set controller to the name of controller and unset the empty string in url array
		if (file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
			$this->controller = $url[0] . 'Controller';
			unset($url[0]);
		}

		// load controller
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		// Check if class method exist, if it does, set method to that method name, and unset empty string in url array
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		// Check if there are any parameters
		$this->params = $url ? array_values($url) : [];

		// Load restricted
		require_once 'Restricted.php';

		// If session logged in is false, return false. Else redirect and inform that it is restricted. 
		if (restricted(get_class($this->controller), $this->method)) {
			header('Location: /aldus17/mvc/public/home/restricted');
		} else {
			call_user_func_array([$this->controller, $this->method], $this->params);
		}
	}

	public function parseUrl()
	{
		// Get url "/aldus17/mvc/public/home/"
		$url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
		if (substr($url, -1) !== "/") {
			$url = $url . "/";
		}
		// get array where each part is split
		$url = explode('/', $url);
		// Return from array index 4 i.e. home
		return array_slice($url, 4);
	}
}
