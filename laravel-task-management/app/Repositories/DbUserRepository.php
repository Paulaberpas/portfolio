<?php

namespace App\Repositories;


class DbUserRepository implements UserRepository

{

	// implementation of UserRepository

	public function create($attributes)
	{
		dd('creating the user');
	}

}