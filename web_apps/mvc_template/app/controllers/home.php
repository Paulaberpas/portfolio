<?php

class Home extends Controller
{
	
	public function index($name = '')
	{
		// directory path to the view file
		$this->view('home/index', ['name' => $name]);
	}

	public function create($username = '', $email = '')
	{
		User::create([
			'username' => $username,
			'email' => $email
		]);
	}
}