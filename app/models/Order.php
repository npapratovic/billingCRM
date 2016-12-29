<?php

class Order extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'orders';

	// New entry validation
	public static $store_rules = array( 
		'order_id'				=>	'required|integer'

	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer' 
	);

	protected $fillable = array('order_id', 'client_id', 'employee_id', 'price', 'shipping_way', 'payment_way', 'payment_status', 'billing_address', 'shipping_address', 'note', 'order_date', 'show_only', 'deleted_at', 'updated_at');


  	public function client()
    {
        return $this->hasMany('User', 'id', 'client_id');
    }

    public function orderProducts()
    {
        return $this->hasMany('OrdersProducts');
    }




	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null)
	{
	 	try 
		{  
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'orders.employee_id AS employee_id',
					'orders.price AS orderprice',
					'orders.shipping_way AS shipping_way',
					'orders.payment_way AS payment_way',
					'orders.payment_status AS payment_status',
					'orders.cityname AS cityname',
					'orders.billing_address AS billing_address',
					'orders.shipping_address AS shipping_address',
					'orders.note AS note',
					'orders.order_date AS order_date',
					'orders.show_only AS show_only',
					'users.id AS user_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.address AS address',
					'users.zip AS zip',
					'users.phone AS phone',
					'users.email AS email'
				)->whereNull('orders.deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('orders.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}
 
			// Default return
			$entries = $entry;

 
			$entries = $entries->paginate(10);
 

			return array('status' => 1, 'entries' => $entries);
	 	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}    
	} 

	public static function getLastOrder()
	{
	 	try 
		{  
			$entry = DB::table('orders')
				->select(
					'orders.order_id AS order_id'
				);
 
			// Default return

 
			$entry = $entry->orderBy('created_at', 'desc')->first();
			
 

			return array('status' => 1, 'entry' => $entry);
	 	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}    
	} 

	public static function countOrders()
    {
        try
        {
            $products['total'] = Order::whereNull('deleted_at')->count();
            return array('status' => 1, 'number' => $products);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

	public static function getOrdersEntries($id = null)
	{
	 	try 
		{  
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'orders.price AS orderprice',
					'orders.shipping_address AS shipping_address',
					'orders.order_date AS order_date',
					'orders.show_only AS show_only',
					'users.id AS user_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.address AS address'
				)->whereNull('orders.deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('orders.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}
 
			// Default return
			$entries = $entry;

 
			$entries = $entries->paginate(10);
 

			return array('status' => 1, 'entries' => $entries);
	 	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}    
	} 

	public static function checkExisting($order_number){
		try{
			$entry = DB::table('orders')->where('orders.order_id', $order_number)->first();

			return array('status' => 1, 'entry' => $entry);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}    
	}

		public static function checkUpdate($order_number){
		try{
			$entry = DB::table('orders')->where('orders.order_id', $order_number)->first();

			return array('status' => 1, 'entry' => $entry);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}    
	}

}
