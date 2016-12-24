<?php

class WpApi extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'tags';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
	);	

 




}