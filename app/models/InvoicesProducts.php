<?php

class InvoicesProducts extends Eloquent
{
	protected $table = 'invoices_products';
	

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('invoices_products')
				->join('products_services', 'products_services.id', '=', 'invoices_products.product_id')  
 				->select(
 					'invoices_products.id AS id',
 					'invoices_products.invoice_id AS invoice_id',
 					'invoices_products.client_id AS client_id',
 					'invoices_products.product_id AS product_id',
 					'invoices_products.measurement AS measurement',
 					'invoices_products.amount AS amount',
 					'invoices_products.price AS price',
 					'invoices_products.discount AS discount',
 					'invoices_products.taxpercent AS taxpercent',
					'invoices_products.quantity AS quantity',
					'invoices_products.price AS productprice',
					'products_services.title AS title'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('invoices_products.invoice_id', '=', $id)->get();
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

	 	public static function getOrderByCustomer($invoice_id)
	{

		try
		{
			$orderbycustomer = DB::table('invoices_products')
				->join('products_services', 'products_services.id', '=', 'invoices_products.product_id')
 				->select(
 					'invoices_products.id AS id',
 					'invoices_products.product_id AS product_id',
					'invoices_products.invoice_id AS invoice_id',
					'invoices_products.measurement AS measurement',
					'invoices_products.amount AS amount',
					'invoices_products.price',
					'invoices_products.discount AS discount',
					'invoices_products.taxpercent AS taxpercent',
					'products_services.title AS productname',
					'products_services.price AS price'
 				)
 				->where('invoices_products.invoice_id', '=', $invoice_id)
 				->where('invoices_products.imported', '!=', '1')
				->get();

			return array('status' => 1, 'orderbycustomer' => $orderbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}


	public static function getImportedByCustomer($invoice_id)
	{

		try
		{
			$orderbycustomer = DB::table('invoices_products')
				->leftjoin('orders', 'orders.id', '=', 'invoices_products.invoice_id')
				->join('imported_order_products', 'imported_order_products.id', '=', 'invoices_products.product_id')
 				->select(
 					'invoices_products.id AS id',
 					'invoices_products.product_id AS product_id',
					'invoices_products.invoice_id AS invoice_id',
					'invoices_products.measurement AS measurement',
					'invoices_products.amount AS amount',
					'invoices_products.price',
					'invoices_products.discount AS discount',
					'invoices_products.taxpercent AS taxpercent',
					'imported_order_products.name AS productname',
					'imported_order_products.price AS price'
 				)
 				->where('invoices_products.invoice_id', '=', $invoice_id)
 				->where('invoices_products.imported', '1')
				->get();

			return array('status' => 1, 'orderbycustomer' => $orderbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}