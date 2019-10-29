<?php

use Illuminate\Database\Eloquent\Model as Eloquent; 

class User extends Eloquent
{
	public $name;

	// not forget to add created_at and updated_at columns in db! 
	// if not
	public $timestamps = [];

	protected $fillable = ['username','email'];

}