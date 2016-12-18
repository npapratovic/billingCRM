<?php

class Employees extends Eloquent {

	protected $table = 'users';

	protected $fillable = array('first_name','last_name','email','password', 'user_group', 'image', 'created_at','updated_at');

	// New employee validation
	public static $store_rules = array(
		'first_name'				=>	'required',
		'last_name'					=>	'required',
		'email'						=>	'required|unique:users',
		'image'						=>	'required',
		'password'					=>	'required',
		'repeat_password'			=>	'required|same:password'
	);

	// Edit employee validation
	public static $update_rules = array(
		'first_name'				=>	'required',
		'last_name'					=>	'required',
		'email'						=>	'required' 
	);
}