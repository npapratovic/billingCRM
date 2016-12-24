<?php

class Client extends Eloquent
{
	protected $table = 'users';

	public $timestamps = false;

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