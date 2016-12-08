<?php

class Offer extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'offers';

	// New entry validation
	public static $store_rules = array(
		'offer_number'					=>	'required',
		'client_id'						=>	'required',
		'client_address'					=>	'required'
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
		'offer_number'			=>	'required',
		'client_id'				=>	'required',
		'client_address'			=>	'required'
	);	

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('offers')
				->join('users', 'users.id', '=', 'offers.client_id')
				->join('city', 'city.id', '=', 'users.city')
				->select(
					'offers.id AS id',
					'offers.offer_number AS offer_number',
					'offers.client_id AS client_id',
					'offers.employee_id AS employee_id',
					'offers.tax AS tax',
					'offers.hide_amount AS hide_amount',
					'offers.client_id AS client_id',
					'offers.client_address AS client_address',
					'offers.client_oib AS client_oib',
					'offers.payment_way AS payment_way',
					'offers.offer_start AS offer_start',
					'offers.offer_end AS offer_end',
					'offers.offer_note AS offer_note',
					'offers.offer_language AS offer_language',
					'offers.valute AS valute',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.address AS address',
					'users.zip AS zip',
					'users.phone AS phone',
					'users.email AS email',
					'city.name AS cityname'
					)->whereNull('offers.deleted_at');
				
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('offers.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->paginate(10);
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->paginate(10);
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	public static function countOffers()
    {
        try
        {
            $offers['total'] = Offer::whereNull('deleted_at')->count();
            return array('status' => 1, 'number' => $offers);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

    public static function getLastOffer()
    {
     	try 
    	{  
    		$entry = DB::table('offers')
    			->select(
    				'offers.offer_number AS offer_number'
    			);
    
    		// Default return
    		$entry = $entry->orderBy('created_at', 'desc')->first();
    		return array('status' => 1, 'entry' => $entry);
     	}
    	catch (Exception $exp)
    	{
    		return array('status' => 0, 'reason' => $exp->getMessage());
    	}    
    } 

}