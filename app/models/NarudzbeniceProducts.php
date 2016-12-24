<?php

class NarudzbeniceProducts extends Eloquent
{
	protected $table = 'narudzbenice_products';
	
	protected $fillable = array('product_id', 'narudzbenica_id', 'measurement', 'amount', 'price', 'discount', 'taxpercent');
	

	public function products(){
		return $this->belongsTo('ProductService', 'product_id', 'id');
	}

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('narudzbenice_products')
				->join('products_services', 'products_services.id', '=', 'narudzbenice_products.product_id')  
 				->select(
 					'narudzbenice_products.id AS id',
 					'narudzbenice_products.product_id AS product_id',
					'narudzbenice_products.narudzbenica_id AS narudzbenica_id',
					'narudzbenice_products.quantity AS quantity',
					'narudzbenice_products.price AS productprice',
					'products_services.title AS title'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('narudzbenice_products.narudzbenica_id', '=', $id)->get();
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

	 	public static function getNarudzbeniceByCustomer($narudzbenica_id)
	{

		try
		{
			$narudzbenicabycustomer = DB::table('narudzbenice_products')
				->leftjoin('narudzbenice', 'narudzbenice.id', '=', 'narudzbenice_products.narudzbenica_id')
				->join('products_services', 'products_services.id', '=', 'narudzbenice_products.product_id')  
 				->select(
 					'narudzbenice_products.id AS id',
 					'narudzbenice_products.product_id AS product_id',
					'narudzbenice_products.narudzbenica_id AS narudzbenica_id',
					'narudzbenice_products.measurement AS measurement',
					'narudzbenice_products.amount AS amount',
					'narudzbenice_products.price',
					'narudzbenice_products.discount AS discount',
					'narudzbenice_products.taxpercent AS taxpercent',
					'products_services.title AS productname'
 				)
 				->where('narudzbenice_products.narudzbenica_id', '=', $narudzbenica_id)
				->get();

			return array('status' => 1, 'narudzbenicabycustomer' => $narudzbenicabycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}