<?php

class WorkingOrder extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'workingorders';

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
			$entry = DB::table('workingorders')
				->join('users', 'users.id', '=', 'workingorders.client_id')
				->join('city', 'city.id', '=', 'users.city')
				->select(
					'workingorders.id AS id',
					'workingorders.workingorder_number AS workingorder_number',
					'workingorders.taxable AS taxable',
					'workingorders.hide_amount AS hide_amount',
					'workingorders.client_id AS client_id',
					'workingorders.employee_id AS employee_id',
					'workingorders.client_address AS client_address',
					'workingorders.client_oib AS client_oib',
					'workingorders.workingorder_employee AS workingorder_employee',
					'workingorders.workingorder_date_ship AS workingorder_date_ship',
					'workingorders.workingorder_note AS workingorder_note',
					'workingorders.workingorder_description AS workingorder_description',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.address AS address',
					'users.zip AS zip',
					'users.phone AS phone',
					'users.email AS email',
					'city.name AS cityname'

 				)->whereNull('workingorders.deleted_at');

             
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('workingorders.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->paginate();
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->paginate();
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


public static function getWorkingOrderEntries()
	{
		try
		{
			$entry = DB::table('workingorders')
				->join('users', 'users.id', '=', 'workingorders.client_id')
				->select(
					'workingorders.id AS id',
					'workingorders.workingorder_number AS workingorder_number',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
 				)->whereNull('workingorders.deleted_at');


		
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



	public static function countWorkingOrders()
    {
        try
        {
            $workingorders['total'] = WorkingOrder::whereNull('deleted_at')->count();
            return array('status' => 1, 'number' => $workingorders);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

    public static function getLastWorkingOrder()
    {
     	try 
    	{  
    		$entry = DB::table('workingorders')
    			->select(
    				'workingorders.workingorder_number AS workingorder_number'
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