<?php

/*
*	ClientRepository
*
*	Handles backend functions
*/



class ClientRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created tag(s) in storage.
	 *
	 * @return Response
	 */
	public function store($company_name, $client_type, $oib, $first_name, $last_name, $address, $mjesto, $zip, $country, $phone, $fax, $mobile, $email, $web, $iban, $note)
	{
		try {

			DB::beginTransaction();

			$entry = new User;
			$entry->company_name = $company_name; 
			$entry->client_type = $client_type; 
			$entry->oib = $oib;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->address = $address;
			$entry->mjesto = $mjesto;
			$entry->city = '1';
			$entry->zip = $zip;
			$entry->country = $country;
			$entry->phone = $phone;
			$entry->fax = $fax;
			$entry->mobile = $mobile;
			$entry->email = $email;
			$entry->web = $web;
			$entry->iban = $iban;
			$entry->note = $note;


			$entry->user_group = 'client';
			
			$entry->save();


			$client = DB::table('users')->orderBy('created_at', 'desc')->first();

			$newclient = $client->id;

			$newclientrole = new AssignedRoles;

			$newclientrole->user_id = $newclient;
			$newclientrole->role_id = 5;

			$newclientrole->save();

			DB::commit();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	/**
	 * Update the specified tag(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $company_name, $client_type, $oib, $first_name, $last_name, $address, $mjesto, $zip, $country, $phone, $fax, $mobile, $email, $web, $iban, $note)
	{
    	
    		try {
    			DB::beginTransaction();


			$entry = User::find($id);
			$entry->company_name = $company_name; 
			$entry->client_type = $client_type; 
			$entry->oib = $oib;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->address = $address;
			$entry->mjesto = $mjesto;
			$entry->zip = $zip;
			$entry->city = '1';
			$entry->country = $country;
			$entry->phone = $phone;
			$entry->fax = $fax;
			$entry->mobile = $mobile;
			$entry->email = $email;
			$entry->web = $web;
			$entry->iban = $iban;
			$entry->note = $note;

			$entry->save();

			$client = DB::table('users')->orderBy('updated_at', 'desc')->first();

			$assignedrole = AssignedRoles::where('user_id', 'like', $id)->delete();

			$newclient = $client->id;

			$newclientrole = new AssignedRoles;

			$newclientrole->user_id = $newclient;
			$newclientrole->role_id = 5;

			$newclientrole->save();

			DB::commit();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}

	/**
	 * Store a newly created tag(s) in storage.
	 *
	 * @return Response
	 */
	public function import($company_name, $client_type, $oib, $first_name, $last_name, $address, $mjesto, $zip, $country, $phone, $fax, $mobile, $email, $web, $iban, $note)
	{
		try {

			DB::beginTransaction();

			$entry = new User;
			$entry->company_name = $company_name; 
			$entry->client_type = $client_type; 
			$entry->oib = $oib;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->address = $address;
			$entry->mjesto = $mjesto;
			$entry->zip = $zip;
			$entry->city = '1';
			$entry->country = $country;
			$entry->phone = $phone;
			$entry->fax = $fax;
			$entry->mobile = $mobile;
			$entry->email = $email;
			$entry->web = $web;
			$entry->iban = $iban;
			$entry->note = $note;


			$entry->user_group = 'client';
			
			$entry->save();


			$client = DB::table('users')->orderBy('created_at', 'desc')->first();

			$newclient = $client->id;

			$newclientrole = new AssignedRoles;

			$newclientrole->user_id = $newclient;
			$newclientrole->role_id = 5;

			$newclientrole->save();

			DB::commit();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	/**
	 * Store a newly created tag(s) in storage.
	 *
	 * @return Response
	 */
	public function importupdate($company_name, $client_type, $oib, $first_name, $last_name, $address, $mjesto, $zip, $country, $phone, $fax, $mobile, $email, $web, $iban, $note)
	{
		try {

			DB::beginTransaction();

			$entry = User::find($id);
			$entry->company_name = $company_name; 
			$entry->client_type = $client_type; 
			$entry->oib = $oib;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->address = $address;
			$entry->mjesto = $mjesto;
			$entry->zip = $zip;
			$entry->city = '1';
			$entry->country = $country;
			$entry->phone = $phone;
			$entry->fax = $fax;
			$entry->mobile = $mobile;
			$entry->email = $email;
			$entry->web = $web;
			$entry->iban = $iban;
			$entry->note = $note;


			$entry->user_group = 'client';
			
			$entry->save();


			$client = DB::table('users')->orderBy('created_at', 'desc')->first();

			$newclient = $client->id;

			$newclientrole = new AssignedRoles;

			$newclientrole->user_id = $newclient;
			$newclientrole->role_id = 5;

			$newclientrole->save();

			DB::commit();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


	/**
	 * Remove the specified tag(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = User::find($id);

			$entry->delete();

			DB::table('assigned_roles')->where('assigned_roles.user_id', '=', $id)->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
