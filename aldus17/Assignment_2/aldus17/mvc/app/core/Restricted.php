<?php

function restricted($controller, $method)
{

	$restricted_urls = array(
		'HomeController' => array('logout'),
		'ApiController' => array(''),
		'UserController' => array('index', 'upload', 'imagefeed', 'userlist')
	);

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		return false;
	} else if (isset($controller) && in_array(strtolower($method), array_map('strtolower', $restricted_urls[$controller]))) {
		return true;
	} else {
		return false;
	}
}
