<?php

class OrdersProducts extends Eloquent
{
	protected $table = 'orders_products';
	

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('orders_products')
				->join('products_services', 'products_services.id', '=', 'orders_products.product_id')  
 				->select(
 					'orders_products.id AS id',
 					'orders_products.product_id AS product_id',
					'orders_products.order_id AS order_id',
					'orders_products.quantity AS quantity',
					'orders_products.price AS productprice',
					'products_services.title AS title',
					'products_services.existing AS existing'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('orders_products.order_id', '=', $id)->get();
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

	 	public static function getOrderByCustomer($order_id)
	{

		try
		{
			$orderbycustomer = DB::table('orders_products')
				->leftjoin('orders', 'orders.id', '=', 'orders_products.order_id')
				->join('products_services', 'products_services.id', '=', 'orders_products.product_id')  
 				->select(
 					'orders_products.id AS id',
 					'orders_products.product_id AS product_id',
					'orders_products.order_id AS order_id',
					'orders_products.quantity AS quantity',
					'orders_products.price AS price',
					'products_services.title AS productname',
					'products_services.existing AS existing'
 				)
 				->where('orders_products.order_id', '=', $order_id)
				->get();

			return array('status' => 1, 'orderbycustomer' => $orderbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

		 	public static function getImportedOrderByCustomer($order_id)
		{

			try
			{
				$orderbycustomer = DB::table('orders_products')
					->join('orders', 'orders.id', '=', 'orders_products.order_id')
					->join('imported_order_products', 'imported_order_products.id', '=', 'orders_products.product_id')  
	 				->select(
	 					'orders_products.id AS id',
	 					'orders_products.product_id AS product_id',
						'orders_products.order_id AS order_id',
						'orders_products.quantity AS quantity',
						'orders_products.price AS price',
						'imported_order_products.name AS productname',
						'imported_order_products.existing AS existing'
	 				)
	 				->where('orders_products.order_id', '=', $order_id)
					->get();

				return array('status' => 1, 'orderbycustomer' => $orderbycustomer);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}


		}

}