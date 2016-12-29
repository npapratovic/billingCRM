<?php


/*
*	WpApiController
*
*	Handles backend functions for WpApi
*/

class WpApiController extends \BaseController {


	// Enviroment variables
	protected $repo;
	protected $moduleInfo;
	
	protected $productsrepo;
	protected $ordersrepo;
	protected $customersrepo;   
 
	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new WpApiRepository;

		//Repos access
		$this->productsrepo = new ProductRepository;
		$this->customersrepo = new ClientRepository;
		$this->ordersrepo = new OrderRepository; 


	}
	/**
	 * Display a listing of the tag.
	 *
	 * @return Response
	 */
	public function index()
	{ 
 		// Get data

		$entries = LaravelWpApi::products();  

		$consumer_key = Auth::user()->consumer_key;
		$consumer_secret = Auth::user()->consumer_secret;
		$store_url = Auth::user()->store_url;
		 
		// Initialize the class
		$wc_api = new WC_API_Client( $consumer_key, $consumer_secret, $store_url);

		$orders = $wc_api->get_orders( array( 'status' => 'completed' ) );

		$products = $wc_api->get_products();
		$products = $products->products;
 
		// Get Index
		//print_r( $wc_api->get_index() );
		// Get all orders
		// print_r( $wc_api->get_orders( array( 'status' => 'completed' ) ) );
		// Get a single order by id
		//print_r( $wc_api->get_order( 166 ) );
		// Get orders count
		//print_r( $wc_api->get_orders_count() );
		// Get order notes for a specific order
		//print_r( $wc_api->get_order_notes( 166 ) );
		// Update order status
		//print_r( $wc_api->update_order( 166, $data = array( 'status' => 'failed' ) ) );
		// Get all coupons
		//print_r( $wc_api->get_coupons() );
		// Get coupon by id
		//print_r( $wc_api->get_coupon( 173 ) );
		// Get coupon by code
		//print_r( $wc_api->get_coupon_by_code( 'test coupon' ) );
		// Get coupons count
		//print_r( $wc_api->get_coupons_count() );
		// Get customers
		//print_r( $wc_api->get_customers() );
		// Get customer by id
		//print_r( $wc_api->get_customer( 2 ) );
		// Get customer count
		//print_r( $wc_api->get_customers_count() );
		// Get customer orders
		//print_r( $wc_api->get_customer_orders( 2 ) );
		// Get all products
		//print_r( $wc_api->get_products() );
		// Get a single product by id
		//print_r( $wc_api->get_product( 167 ) );
		// Get products count
		//print_r( $wc_api->get_products_count() );
		// Get product reviews
		//print_r( $wc_api->get_product_reviews( 167 ) );
		// Get reports
		//print_r( $wc_api->get_reports() );
		// Get sales report
		//print_r( $wc_api->get_sales_report() );
		// Get top sellers report
		// print_r( $wc_api->get_top_sellers_report() );

		$this->layout->title = 'WpApi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.wp-api.products', array('entries' => $products));
	}

	/**
	 * Display a listing of the products.
	 *
	 * @return Response
	 */
	public function products()
	{ 
		$consumer_key = Auth::user()->consumer_key;
		$consumer_secret = Auth::user()->consumer_secret;
		$store_url = Auth::user()->store_url;

		// Initialize the class
		$wc_api = new WC_API_Client( $consumer_key, $consumer_secret, $store_url);
 
		$response = $wc_api->get_products( array( 'filter[limit]' => '-1')); 

		$products = $response->products;  

		foreach($products as $product)
		{
			/** 
			 Switch (product_exists) 
			 Case 1: product exists in billingCRM
					1a => product from WordPress has updated_at newer than one in billingCRM => UPDATE product
					1b => product from WordPress doesen't have updated_at newer than one in billingCRM => do nothing 
			 Case 2: product doesen't exist in billingCRM => CREATE product


			**/


			if ($productdata = ProductService::where('product_id', '=', $product->id)->exists()) {

			    // Case 1: product found 

		        $data = ProductService::where('product_id', '=', $product->id)->first();

		        // Now we check if product is updated

		        $product_updated_at = $product->updated_at; 

		        // Lets reformat from atom to normal datetime
		        $product_updated_at = date('Y-m-d H:i:s', strtotime($product_updated_at));

				$imported_product_updated_at = $data->updated_at; 
		   
 				if($product_updated_at > $imported_product_updated_at) {

 					//1a => product from WordPress has updated_at newer than one in billingCRM => UPDATE product

 					//convert stdClass object to array		        
					$result = (array)($product);   

					//Lets create array with product details
					$product = array();  
	 
	  				//Lets fill the newly created array 
					foreach($result as $key => $value) {
					 	$product[$key] = $value;
					}

					//Grab the product image, and save locally 
	      			$destinationPath = public_path() . "/uploads/backend/product/"; // upload path
					$content = file_get_contents($result['featured_src']);
					$imagename = rand(11111,9999999) . '.jpg';
					file_put_contents($destinationPath . $imagename, $content);

					//we will populate additional data in array
					$product['product_id'] = $result['id']; 
					$product['intro'] = $result['short_description']; 
					$product['content'] = $result['description']; 
					$product['visibility'] = $result['catalog_visibility']; 
					$product['stock_status'] = $result['in_stock']; 
					$product['length'] = $result['dimensions']->length; 
					$product['width'] = $result['dimensions']->width;	 
					$product['height'] = $result['dimensions']->height;
					$product['manage_stock'] = $result['managing_stock'];
					$product['backorders'] = $result['backorders_allowed'];
					$product['stock'] = $result['stock_quantity'];   
					$product['product_type'] = $result['type']; 
					$product['type'] = 'product'; 
					$product['image'] = $imagename; 
					$product['updated_at'] = $product_updated_at; 

 					$data->update($product);
 				
 				} 

			}  

			$productdata = ProductService::where('product_id', '=', $product->id)->first();

			if ($productdata === null) {
			   	// Case 1: product doesn't exist

				//convert stdClass object to array		        
				$result = (array)($product);  

		        $product_updated_at = $product->updated_at; 

		        // Lets reformat from atom to normal datetime
		        $product_updated_at = date('Y-m-d H:i:s', strtotime($product_updated_at));

				//Lets create array with product details
				$product = array();  
 
  				//Lets fill the newly created array 
				foreach($result as $key => $value) {
				 	$product[$key] = $value;
				}

				//Grab the product image, and save locally 
      			$destinationPath = public_path() . "/uploads/backend/product/"; // upload path
				$content = file_get_contents($result['featured_src']);
				$imagename = rand(11111,9999999) . '.jpg';
				file_put_contents($destinationPath . $imagename, $content);

				//we will populate additional data in array
				$product['product_id'] = $result['id']; 
				$product['intro'] = $result['short_description']; 
				$product['content'] = $result['description']; 
				$product['visibility'] = $result['catalog_visibility']; 
				$product['stock_status'] = $result['in_stock']; 
				$product['length'] = $result['dimensions']->length; 
				$product['width'] = $result['dimensions']->width;	 
				$product['height'] = $result['dimensions']->height;
				$product['manage_stock'] = $result['managing_stock'];
				$product['backorders'] = $result['backorders_allowed'];
				$product['stock'] = $result['stock_quantity'];   
				$product['product_type'] = $result['type']; 
				$product['type'] = 'product'; 
				$product['image'] = $imagename; 
				$product['updated_at'] = $product_updated_at; 

				//Now, lets create new product
		      	ProductService::create($product);   

			}   
 			
		}


		$this->layout->title = 'WpApi | BillingCRM';
  
		$this->layout->content = View::make('backend.wp-api.products', array('entries' => $products));

	}
 
	/**
	 * Display a listing of the orders.
	 *
	 * @return Response
	 */
	public function orders()
	{ 
		$consumer_key = Auth::user()->consumer_key;
		$consumer_secret = Auth::user()->consumer_secret;
		$store_url = Auth::user()->store_url;
		 
		// Initialize the class
		$wc_api = new WC_API_Client( $consumer_key, $consumer_secret, $store_url);
 
		$response = $wc_api->get_orders(array( 'filter[limit]' => '-1' ));

		$orders = $response->orders;  

		foreach($orders as $order)
		{    

			$existingorder = Order::checkExisting($order->order_number);
			
			$updatecheck = substr_replace(preg_replace("/[^0-9,:,-]/", "", $order->updated_at), ' ', 10, -8);

			$updateverify = $updatecheck;

			$oldorder = false;

			if(!is_null($existingorder['entry'])){
				if(substr_replace(preg_replace("/[^0-9,:,-]/", "", $existingorder['entry']->updated_at), ' ', 10, -8) != $updateverify){
					$updateverify = $existingorder['entry']->updated_at;
					$oldorder = true;
				}
			} 


 
			if(!is_null($existingorder['entry']) && $updatecheck == $updateverify){
				continue;
			}

			else {

				if($oldorder == true){
					DB::table('orders')->where('order_id', '=', $existingorder['entry']->order_id)->delete();
					DB::table('orders_products')->where('order_id', '=', $existingorder['entry']->id)->delete();
				}


				$order = get_object_vars($order); 

				$userexists = User::getUserByEmail($order['customer']->email);

				if(empty($userexists['user']))
				{
					$store = $this->customersrepo->import(
						'asdf',			//	naziv kompanije
						1,			//	tip djelatnosti
						1,			//	oib
						$order['customer']->first_name,
						$order['customer']->last_name,
						'asdf',			//	adresa
						14,			//	mjesto
						31000,		//	zip
						14,			//	grad			
						987654321,		//	broj telefona
						0987123456,		//	fax
						123098456,		//	broj mobitela
						$order['customer']->email,
						'http://mojawebstranica.com',	//	web stranica
						'iban',					//	iban
						'Podaci iz WordPress stranice'			//	note

					); 

				}

				else{

					$store = $this->customersrepo->importupdate(
						$order['customer']->id,
						'asdf',			//	naziv kompanije
						1,			//	tip djelatnosti
						1,			//	oib
						$order['customer']->first_name,
						$order['customer']->last_name,
						'asdf',			//	adresa
						14,			//	mjesto
						31000,		//	zip
						14,			//	grad			
						987654321,		//	broj telefona
						0987123456,		//	fax
						123098456,		//	broj mobitela
						$order['customer']->email,
						'http://mojawebstranica.com',	//	web stranica
						'iban',					//	iban
						'Podaci iz WordPress stranice'			//	note

					);

				}
 
	 			$product = array(); 
				$quantity = array(); 

				foreach($order['line_items'] as $singleorder) { 

					$store = $this->productsrepo->productfromorder(
						$singleorder->subtotal,
						$singleorder->subtotal_tax,
						$singleorder->total,
						$singleorder->total_tax,
						$singleorder->price,
						$singleorder->quantity, 
						$singleorder->tax_class,
						$singleorder->name, 
						$singleorder->product_id
					);

					array_push($product, $singleorder->product_id);
					array_push($quantity, $singleorder->quantity); 

				}
 
				$user = User::where('email', $order['customer']->email)->first();
				 

				$created_at = $order['created_at'];
				$updated_at = $order['updated_at'];

				$created_at = substr_replace(preg_replace("/[^0-9,:,-]/", "", $created_at), ' ', 10, -8);
				$updated_at = substr_replace(preg_replace("/[^0-9,:,-]/", "", $updated_at), ' ', 10, -8);

				$store = $this->ordersrepo->import(
					$order['order_number'],
					$user->id,			//	user id
					Auth::id(),			//	employee_id
					$order['created_at'],
					$product,			//	products 	 
					$quantity,			//	quantities	
					$order['shipping_methods'],
					$order['payment_details']->method_id,		//	payment_way
					$order['status'],
					$order['billing_address']->city,
					$order['billing_address']->address_1,	//	adresa racuna
					$order['shipping_address']->address_1,		//	adresa dostave
					$order['note'],
					$created_at,
					$updated_at
				);
				 
			}
 
		}

		$this->layout->title = 'WpApi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);

		$this->layout->content = View::make('backend.wp-api.orders', array('orders' => $orders));
		
	}

	/**
	 * Display a listing of the customers.
	 *
	 * @return Response
	 */
	public function customers()
	{ 

		$consumer_key = Auth::user()->consumer_key;
		$consumer_secret = Auth::user()->consumer_secret;
		$store_url = Auth::user()->store_url;
		 
		// Initialize the class
		$wc_api = new WC_API_Client( $consumer_key, $consumer_secret, $store_url);
 
		$response = $wc_api->get_customers(array( 'filter[limit]' => '-1' ));

		$customers = $response->customers; 
 
		foreach($customers as $customer)
		{ 
			 
			/** 

			 Switch (customer_exists) 
			 Case 1: customer exists in billingCRM
					1a => customer found from WordPress in billingCRM => UPDATE customer 
			 Case 2: customer doesen't exist in billingCRM => CREATE customer


			**/
 
			if ($customerdata = Client::where('client_id', '=', $customer->id)->exists()) {

			    // Case 1a: customer found 

		        $data = Client::where('client_id', '=', $customer->id)->first();  

				//convert stdClass object to array	

				$result = (array)($customer);   
 
				//Lets create array with customer details
				$customer = array();  
 
  				//Lets fill the newly created array 
				foreach($result as $key => $value) {
				 	$customer[$key] = $value;
				}

				//Grab the customer image, and save locally 
      			$destinationPath = public_path() . "/uploads/backend/client/"; // upload path
				$content = file_get_contents($result['avatar_url']);
				$imagename = rand(11111,9999999) . '.jpg';
				file_put_contents($destinationPath . $imagename, $content);
 

				//we will populate additional data in array
				$customer['client_id'] = $result['id'];  
				$customer['user_group'] = $result['role'];
				$customer['username'] = $result['username'];
				$customer['first_name'] = $result['billing_address']->first_name; 
				$customer['last_name'] = $result['billing_address']->last_name;
				$customer['email'] = $result['billing_address']->email; 
				$customer['company_name'] = $result['billing_address']->company; 
				$customer['address'] = $result['billing_address']->address_1 . $result['billing_address']->address_2; 
				$customer['zip'] = $result['billing_address']->postcode; 
 				$customer['mjesto'] = $result['billing_address']->city; 
 				$customer['zupanija'] = $result['billing_address']->state;
 				$customer['country'] = $result['billing_address']->country; 
 				$customer['phone'] = $result['billing_address']->phone; 
				$customer['note'] = 'Podaci iz WordPress stranice';
				// Lets default city & region to 1, because of foreign_keys
				$customer['city'] = '1';
				$customer['region'] = '1';

				$customer['image'] = $imagename;  
 
				$data->update($customer);
 				 
			} else { 

			   	// Case 2: customer doesn't exist

				//convert stdClass object to array		        
				$result = (array)($customer);   
 
				//Lets create array with product details
				$customer = array();  
 
  				//Lets fill the newly created array 
				foreach($customer as $key => $value) {
				 	$customer[$key] = $value;
				}

				//Grab the customer image, and save locally 
      			$destinationPath = public_path() . "/uploads/backend/client/"; // upload path
				$content = file_get_contents($result['avatar_url']);
				$imagename = rand(11111,9999999) . '.jpg';
				file_put_contents($destinationPath . $imagename, $content);
 

				//we will populate additional data in array
				$customer['client_id'] = $result['id'];  
				$customer['user_group'] = $result['role'];
				$customer['username'] = $result['username'];
				$customer['first_name'] = $result['billing_address']->first_name; 
				$customer['last_name'] = $result['billing_address']->last_name;
				$customer['email'] = $result['billing_address']->email; 
				$customer['company_name'] = $result['billing_address']->company; 
				$customer['address'] = $result['billing_address']->address_1 . $result['billing_address']->address_2; 
				$customer['zip'] = $result['billing_address']->postcode; 
 				$customer['mjesto'] = $result['billing_address']->city; 
 				$customer['zupanija'] = $result['billing_address']->state;
 				$customer['country'] = $result['billing_address']->country; 
 				$customer['phone'] = $result['billing_address']->phone; 
				$customer['note'] = 'Podaci iz WordPress stranice';
				// Lets default city & region to 1, because of foreign_keys
				$customer['city'] = '1';
				$customer['region'] = '1';

				$customer['image'] = $imagename; 

				//Now, lets create new customer
		      	Client::create($customer);   

			}   
 
		}

		$this->layout->title = 'Klijenti | BillingCRM';
 
		$this->layout->content = View::make('backend.wp-api.customers', array('customers' => $customers));

	}

}

