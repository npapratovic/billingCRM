<?php

class OffersProducts extends Eloquent
{
	protected $table = 'offers_products';

	protected $fillable = array('offer_id', 'product_id', 'measurement', 'amount', 'price', 'discount', 'taxpercent');

	  public function productServices()
    {
        return $this->hasMany('ProductService', 'id', 'product_id');
    }
	

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('offers_products')
				->join('products_services', 'products_services.id', '=', 'offers_products.product_id')  
 				->select(
 					'offers_products.id AS id',
 					'offers_products.product_id AS product_id',
					'offers_products.offer_id AS offer_id',
					'offers_products.quantity AS quantity',
					'offers_products.price AS productprice',
					'products_services.title AS title'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('offers_products.offer_id', '=', $id)->get();
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

	 	public static function getOfferByCustomer($offer_id)
	{

		try
		{
			$offerbycustomer = DB::table('offers_products')
				->leftjoin('offers', 'offers.id', '=', 'offers_products.offer_id')
				->join('products_services', 'products_services.id', '=', 'offers_products.product_id')  
 				->select(
 					'offers_products.id AS id',
 					'offers_products.product_id AS product_id',
					'offers_products.offer_id AS offer_id',
					'offers_products.measurement AS measurement',
					'offers_products.amount AS amount',
					'offers_products.price',
					'offers_products.discount AS discount',
					'offers_products.taxpercent AS taxpercent',
					'products_services.title AS productname'
 				)
 				->where('offers_products.offer_id', '=', $offer_id)
				->get();

			return array('status' => 1, 'offerbycustomer' => $offerbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}
