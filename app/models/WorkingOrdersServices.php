<?php

class WorkingOrdersServices extends Eloquent
{
	protected $table = 'workingorders_services';
	
	protected $fillable = array('workingorder_id', 'service_id', 'measurement', 'amount', 'price', 'discount', 'taxpercent');

	public function services(){
		return $this->belongsTo('ProductService', 'service_id', 'id');
	}

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('workingorders_services')
				->join('products_services', 'products_services.id', '=', 'workingorders_services.service_id')  
 				->select(
 					'workingorders_services.id AS id',
 					'workingorders_services.workingorder_id AS workingorder_id',
 					'workingorders_services.service_id AS service_id',
 					'workingorders_services.measurement AS measurement',
 					'workingorders_services.amount AS amount',
 					'workingorders_services.price AS price',
 					'workingorders_services.discount AS discount',
 					'workingorders_services.taxpercent AS taxpercent',
					'products_services.title AS title'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('workingorders_services.workingorder_id', '=', $id)->get();
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

	public static function getWorkingOrderByCustomer($workingorder_id)
	{

		try
		{
			$workingorderbycustomer = DB::table('workingorders_services')
				->leftjoin('workingorders', 'workingorders.id', '=', 'workingorders_services.workingorder_id')
				->join('products_services', 'products_services.id', '=', 'workingorders_services.service_id')  
 				->select(
 					'workingorders_services.id AS id',
 					'workingorders_services.service_id AS service_id',
					'workingorders_services.workingorder_id AS workingorder_id',
					'workingorders_services.measurement AS measurement',
					'workingorders_services.amount AS amount',
					'workingorders_services.price',
					'workingorders_services.discount AS discount',
					'workingorders_services.taxpercent AS taxpercent',
					'products_services.title AS productname'
 				)
 				->where('workingorders_services.workingorder_id', '=', $workingorder_id)
				->get();

			return array('status' => 1, 'workingorderbycustomer' => $workingorderbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}
}