<?php

/*
*	OrderRepository
*
*	Handles backend functions
*/



class OrderRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created products post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($order_id, $user_id, $employee_id, $order_date, $products_array, $quantity, $shipping_way, $payment_way, $payment_status, $billing_address, $shipping_address, $note) //, $singleprice, $totalprice
	{
	/*	try {*/
			DB::beginTransaction();

			$entry = new Order;
			$entry->order_id = $order_id;
			$entry->user_id = $user_id;
			$entry->employee_id = $employee_id;
			//$entry->price = $totalprice;
			$entry->shipping_way = $shipping_way;
			$entry->payment_way = $payment_way;
			$entry->payment_status = $payment_status;
			$entry->billing_address = $billing_address;
			$entry->shipping_address = $shipping_address;
			$entry->note = $note;
			$entry->order_date = $order_date;

			$id = $entry->id;
			$entry->save();

			$orderprice = 0;

			$singleprices = ProductService::getPrices();

			$order = DB::table('orders')->where('order_id', $order_id)->first();

			$order = $order->id;

			$i = 0;
			$ilen = count($products_array); 

			if ($products_array != null)
			{

				foreach ($products_array as $key=>$value)
				{
					if(++$i == $ilen) break;
					$singleprice = ProductService::getPrices($value);
					$orderproduct = new OrdersProducts;
					$orderproduct->order_id = $order;
					$orderproduct->product_id = $value;
					$orderproduct->quantity = $quantity[$key];
					$orderproduct->price = $singleprice['entry']->price;
					$orderprice = $orderprice + ($singleprice['entry']->price * $quantity[$key]);
					$orderproduct->save();
				}
			}


			$order = DB::table('orders')->orderBy('created_at', 'desc')->first();
		        	
		        	$order_id  = $order->id;

		           $order = Order::find($order_id);

		           $order->price = $orderprice;

		           $order->save();

			DB::commit();

			return array('status' => 1);
	 /*	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}*/
	}

	/**
	 * Update the specified products post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $order_id, $user_id, $order_date, $products_array, $quantity, $shipping_way, $payment_way, $payment_status, $billing_address, $shipping_address, $note)
	{
    /*	try {*/

			DB::beginTransaction();

			$entry = Order::find($id);
			$entry->order_id = $order_id;
			$entry->user_id = $user_id;
			$entry->shipping_way = $shipping_way;
			$entry->payment_way = $payment_way;
			$entry->payment_status = $payment_status;
			$entry->billing_address =$billing_address;
			$entry->shipping_address = $shipping_address;
			$entry->note = $note;
			$entry->order_date = $order_date;

			$entry->save();

			$orderprice = 0;

			$order = Order::find($id);

			$order = $order->id;

			$i = 0;
			$ilen = count($products_array); 

			if ($products_array != null)
			{
				DB::table('orders_products')->where('order_id', '=', $id)->delete();
				foreach ($products_array as $key=>$value)
				{
					if(++$i == $ilen) break;
					$singleprice = ProductService::getPrices($value);
					$orderproduct = new OrdersProducts;
					$orderproduct->order_id = $order;
					$orderproduct->product_id = $value;
					$orderproduct->quantity = $quantity[$key];
					$orderproduct->price = $singleprice['entry']->price;
					$orderprice = $orderprice + ($singleprice['entry']->price * $quantity[$key]);
					$orderproduct->save();
				}
			}

			$order = DB::table('orders')->orderBy('created_at', 'desc')->first();
		        	
		        	$order_id  = $order->id;

		           $order = Order::find($order_id);

		           $order->price = $orderprice;

		           $order->save();

			DB::commit();

			return array('status' => 1);
	/*	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}*/
	}


	/**
	 * Store a newly created products post(s) in storage.
	 *
	 * @return Response
	 */
	public function import($order_id, $user_id, $employee_id, $order_date, $products_array, $quantity, $shipping_way, $payment_way, $payment_status, $billing_address, $shipping_address, $note, $created_at, $updated_at) 
	{
	/*	try {*/
			DB::beginTransaction();

			$entry = new ImportOrder;
			$entry->order_id = $order_id;
			$entry->user_id = $user_id;
			$entry->employee_id = $employee_id;
			//$entry->price = $totalprice;
			$entry->shipping_way = $shipping_way;
			$entry->payment_way = $payment_way;
			$entry->payment_status = $payment_status;
			$entry->billing_address = $billing_address;
			$entry->shipping_address = $shipping_address;
			$entry->note = $note;
			$entry->order_date = $order_date;
			$entry->created_at = $created_at;
			$entry->updated_at = $updated_at;

			$id = $entry->id;
			$entry->save();

			$orderprice = 0;

			$singleprices = ProductService::getPrices();

			$order = DB::table('orders')->where('order_id', $order_id)->first();

			$order = $order->id;

			$i = 0;
			$ilen = count($products_array); 

			if ($products_array != null)
			{

				foreach ($products_array as $key=>$value)
				{
					$singleprice = ProductService::getPrices($value);
					$orderproduct = new OrdersProducts;
					$orderproduct->order_id = $order;
					$orderproduct->product_id = $value;
					$orderproduct->quantity = $quantity[$key];
					$orderproduct->price = $singleprice['entry']->price;
					$orderprice = $orderprice + ($singleprice['entry']->price * $quantity[$key]);
					$orderproduct->save();
				}
			}


			$order = DB::table('orders')->orderBy('created_at', 'desc')->first();
		        	
		        	$order_id  = $order->id;

		           $order = ImportOrder::find($order_id);

		           $order->price = $orderprice;

		           $order->save();

			DB::commit();

			return array('status' => 1);
	 /*	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}*/
	}


	/**
	 * Remove the specified products post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{

			$entry = Order::find($id);

			$entry->delete();


			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
