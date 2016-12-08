<?php

class DispatchesServices extends Eloquent
{
	protected $table = 'dispatches_services';
	

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('dispatches_services')
				->join('services', 'services.id', '=', 'dispatches_services.service_id')  
 				->select(
 					'dispatches_services.id AS id',
 					'dispatches_services.dispatch_id AS dispatch_id',
 					'dispatches_services.service_id AS service_id',
 					'dispatches_services.measurement AS measurement',
 					'dispatches_services.amount AS amount',
 					'dispatches_services.price AS price',
 					'dispatches_services.discount AS discount',
 					'dispatches_services.taxpercent AS taxpercent',
					'services.title AS title'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('dispatches_services.dispatch_id', '=', $id)->get();
					return array('status' => 1, 'entry' => $entry);
				}
				else
				{
					$entry = $entry->get();
					return array('status' => 1, 'entry' => $entry);
				}

				// Default return
				$entries = $entry;
 
				$entries = $entry->get();
 
		
			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}


	 

}