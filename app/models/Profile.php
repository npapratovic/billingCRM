<?php

class Profile extends Eloquent {

	protected $table = 'users';

	protected $fillable = array('first_name','last_name','email', 'username', 'phone', 'password', 'user_group', 'image', 'city', 'region', 'consumer_key', 'consumer_secret', 'store_url', 'created_at','updated_at');

	// New employee validation
	public static $store_rules = array(
		'first_name'				=>	'required',
		'last_name'					=>	'required',
		'email'						=>	'required|unique:users'
	);

	// Edit employee validation
	public static $update_rules = array(
		'first_name'				=>	'required',
		'last_name'					=>	'required',
		'email'						=>	'required' 
	);
}