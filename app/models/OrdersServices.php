<?php

class OrdersServices extends Eloquent
{
	protected $table = 'invoices_services';
	

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('invoices_services')
				->join('services', 'services.id', '=', 'invoices_services.service_id')  
 				->select(
 					'invoices_services.id AS id',
 					'invoices_services.invoice_id AS invoice_id',
 					'invoices_services.client_id AS client_id',
 					'invoices_services.service_id AS service_id',
 					'invoices_services.measurement AS measurement',
 					'invoices_services.amount AS amount',
 					'invoices_services.price AS price',
 					'invoices_services.discount AS discount',
 					'invoices_services.taxpercent AS taxpercent',
					'invoices_services.quantity AS quantity',
					'invoices_services.price AS productprice',
					'services.title AS title'
 				);
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('invoices_services.invoice_id', '=', $id)->get();
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
			$orderbycustomer = DB::table('invoices_services')
				->leftjoin('orders', 'orders.id', '=', 'invoices_services.order_id')
 				->select(
 					'invoices_services.id AS id',
 					'invoices_services.service_id AS service_id',
					'invoices_services.order_id AS order_id',
					'invoices_services.amount AS amount'
 				)
 				->where('invoices_services.order_id', '=', $order_id)
				->get();

			return array('status' => 1, 'orderbycustomer' => $orderbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}