<?php

class WorkingOrdersProducts extends Eloquent
{
	protected $table = 'workingorders_products';
	

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('workingorders_products')
				->join('products', 'products.id', '=', 'workingorders_products.product_id')  
 				->select(
 					'workingorders_products.id AS id',
 					'workingorders_products.product_id AS product_id',
					'workingorders_products.workingorder_id AS workingorder_id',
					'workingorders_products.quantity AS quantity',
					'workingorders_products.price AS productprice',
					'products.title AS title'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('workingorders_products.workingorder_id', '=', $id)->get();
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
			$workingorderbycustomer = DB::table('workingorders_products')
				->leftjoin('workingorders', 'workingorders.id', '=', 'workingorders_products.workingorder_id')
				->join('products', 'products.id', '=', 'workingorders_products.product_id')  
 				->select(
 					'workingorders_products.id AS id',
 					'workingorders_products.product_id AS product_id',
					'workingorders_products.workingorder_id AS workingorder_id',
					'workingorders_products.measurement AS measurement',
					'workingorders_products.quantity AS quantity',
					'workingorders_products.price',
					'workingorders_products.discount AS discount',
					'workingorders_products.taxpercent AS taxpercent',
					'products.title AS productname'
 				)
 				->where('workingorders_products.workingorder_id', '=', $workingorder_id)
				->get();

			return array('status' => 1, 'workingorderbycustomer' => $workingorderbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}