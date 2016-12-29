<?php

class Client extends Eloquent
{
	protected $table = 'users';

	public $timestamps = false;

 	protected $fillable = array('client_id', 'first_name', 'last_name', 'email', 'username', 'user_group', 'note', 'address', 'mjesto', 'zip', 'country', 'city', 'zupanija', 'company_name', 'region', 'phone', 'image');

	public function narudzbenice(){
		return $this->hasMany('Narudzbenice');
	}

	public function workingorder(){
		return $this->hasMany('WorkingOrder');
	}

	public function dispatch(){
		return $this->hasMany('Dispatch');
	}

}