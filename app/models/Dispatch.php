<?php

class Dispatch extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'dispatches';

	// New entry validation
	public static $store_rules = array(
		'client_id'					=>	'required',
	);

	// Edit entry validation
	public static $update_rules = array(
		'client_id'					=>	'required|integer',
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
			$entry = DB::table('dispatches')
				->join('users', 'users.id', '=', 'dispatches.client_id')
				->join('city', 'city.id', '=', 'users.city')
				->select(
					'dispatches.id AS id',
					'dispatches.dispatch_number AS dispatch_number',
					'dispatches.taxable AS taxable',
					'dispatches.hide_amount AS hide_amount',
					'dispatches.client_id AS client_id',
					'dispatches.employee_id AS employee_id',
					'dispatches.client_address AS client_address',
					'dispatches.client_oib AS client_oib',
					'dispatches.stock_label AS stock_label',
					'dispatches.dispatch_employee AS dispatch_employee',
					'dispatches.dispatch_date_ship AS dispatch_date_ship',
					'dispatches.dispatch_note AS dispatch_note',
					'dispatches.dispatch_language AS dispatch_language',
					'dispatches.valute AS valute',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.address AS address',
					'users.zip AS zip',
					'users.phone AS phone',
					'users.email AS email',
					'city.name AS cityname'

 				)->whereNull('dispatches.deleted_at');


			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('dispatches.id', '=', $id)->first();
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


public static function getDispatchEntries()
	{
		try
		{
			$entry = DB::table('dispatches')
				->join('users', 'users.id', '=', 'dispatches.client_id')
				->select(
					'dispatches.id AS id',
					'dispatches.dispatch_number AS dispatch_number',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
 				)->whereNull('dispatches.deleted_at');;


		
			// Default return
			$entries = $entry;

			
				// Return all entries
				$entries = $entries->paginate(10);
			

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}



	public static function countDispatches()
    {
        try
        {
            $dispatches['total'] = Dispatch::whereNull('deleted_at')->count();
            return array('status' => 1, 'number' => $dispatches);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

    public static function getLastDispatch()
    {
     	try 
    	{  
    		$entry = DB::table('dispatches')
    			->select(
    				'dispatches.dispatch_number AS dispatch_number'
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