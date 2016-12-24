<?php

class DispatchesProducts extends Eloquent
{
	protected $table = 'dispatches_products';
	
	protected $fillable = array('dispatch_id', 'product_id', 'measurement', 'amount', 'price', 'discount', 'taxpercent');


	public function products(){
		return $this->belongsTo('ProductService', 'product_id', 'id');
	}

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('dispatches_products')
				->join('products_services', 'products_services.id', '=', 'dispatches_products.product_id')  
 				->select(
 					'dispatches_products.id AS id',
 					'dispatches_products.product_id AS product_id',
					'dispatches_products.workingorder_id AS workingorder_id',
					'dispatches_products.amount AS amount',
					'dispatches_products.price AS productprice',
					'products_services.title AS title'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('dispatches_products.workingorder_id', '=', $id)->get();
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

	 	public static function getDispatchByCustomer($dispatch_id)
	{

		try
		{
			$dispatchbycustomer = DB::table('dispatches_products')
				->leftjoin('dispatches', 'dispatches.id', '=', 'dispatches_products.dispatch_id')
				->join('products_services', 'products_services.id', '=', 'dispatches_products.product_id')  
 				->select(
 					'dispatches_products.id AS id',
 					'dispatches_products.product_id AS product_id',
					'dispatches_products.dispatch_id AS dispatch_id',
					'dispatches_products.measurement AS measurement',
					'dispatches_products.amount AS amount',
					'dispatches_products.price',
					'dispatches_products.discount AS discount',
					'dispatches_products.taxpercent AS taxpercent',
					'products_services.title AS productname'
 				)
 				->where('dispatches_products.dispatch_id', '=', $dispatch_id)
				->get();

			return array('status' => 1, 'dispatchbycustomer' => $dispatchbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}