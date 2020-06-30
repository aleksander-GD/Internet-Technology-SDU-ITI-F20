<?php
class Controller
{

	public function model($model)
	{
		require_once dirname(__FILE__) . '\\..\\..\\app\\models\\' . $model . '.php';
		return new $model();
	}

	public function view($view, $viewbag = [])
	{
		require_once dirname(__FILE__) . '\\..\\..\\app\\views\\' . $view . '.php';
	}

	public function post()
	{
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	public function get()
	{
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}
}
