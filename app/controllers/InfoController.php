<?php

class InfoController extends \BaseController {

	public function getAddress($id)
	{
	  $address = DB::table('users')->where('id', '=', $id)->pluck('address');
	  $zip = DB::table('users')->where('id', $id)->pluck('zip');
	  $city = DB::table('city')->join('users', 'users.city', '=', 'city.id')->where('users.id', $id)->pluck('name');

	  return Response::json(['success'=>true, 'info'=>$address . ', ' . $zip . ' ' . $city]);
	}

}