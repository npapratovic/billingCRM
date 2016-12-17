<?php

class AssignedRoles extends Eloquent
{
	protected $table = 'assigned_roles';

	protected $fillable = array('user_id','role_id');

	public $timestamps = false;
}