<?php

class Company extends Eloquent
{
	protected $table = 'company';

	protected $fillable = array('user_id', 'title', 'oib', 'address', 'city', 'post_number', 'country', 'phone_number', 'email', 'iban', 'company_note', 'tax_percentage', 'first_name', 'last_name', 'mobile_phone_number', 'website', 'swift', 'pdv_id', 'free_input', 'show_text', 'tax_base', 'image', 'created_at', 'updated_at');
  
	// New entry validation
	public static $store_rules = array( 
		'title'						=>	'required', 
		'image'						=>	'required',
		'oib'						=>	'required', 
		'city'						=>	'required', 
		'post_number'				=>	'required',
		'country'					=>	'required', 
		'address'					=>	'required'
	);

	// Edit entry validation
	public static $update_rules = array( 
		'title'						=>	'required',
		'oib'						=>	'required', 
		'city'						=>	'required', 
		'post_number'				=>	'required',
		'country'					=>	'required', 
		'address'					=>	'required'
	);	
 

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null)
	{
		try
		{
			$entry = DB::table('company')
				->join('users', 'users.id', '=', 'company.user_id')
				->select(
					'company.id AS id',
					'company.user_id AS user_id',
					'company.title AS title',
					'company.oib AS oib',
					'company.address AS address',
					'company.city AS city',
					'company.post_number AS post_number',
					'company.country AS country',
					'company.phone_number AS phone_number',
					'company.email AS email',
					'company.iban AS iban',
					'company.company_note AS company_note',
					'company.tax_percentage AS tax_percentage',
					'company.first_name AS first_name',
					'company.last_name AS last_name',
					'company.mobile_phone_number AS mobile_phone_number',
					'company.website AS website',
					'company.swift AS swift',
					'company.pdv_id AS pdv_id',
					'company.free_input AS free_input',
					'company.show_text AS show_text',
					'company.tax_base AS tax_base',
					'company.image AS image'
 				);
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('company.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	public static function getMode($id = null)
	{
		try
		{
			$entry = DB::table('company')
				->join('users', 'users.id', '=', 'company.user_id')
				->select(
					'company.user_id AS user_id'
 				);

			$mode = 'edit';

			$postRoute = 'CompanyUpdate';

			if('user_id' == null)
			{
				$mode = 'add';

				$postRoute = 'CompanyStore';
			}

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('company.id', '=', $id)->first();
				return array('status' => 1, 'mode' => $mode, 'postRoute' => $postRoute);
			}

		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}



	public static function countCompanies()
    {
        try
        {
            $company['total'] = Company::count();
            return array('status' => 1, 'number' => $company);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }


}