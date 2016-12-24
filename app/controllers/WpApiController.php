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

	const CUSTOMER_KEY = 'ck_4a6bee38c3147cc043ad20cb3016734a00cb1007'; // Add your own Consumer Key here
	const CUSTOMER_SECRET = 'cs_5176afcd440cbf082f3d2f45c29f489d05ede56d'; // Add your own Consumer Secret here
	const STORE_URL = 'http://zlatnazora.hr/webshop/'; // Add the home URL to the store you want to connect to here

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

		// Initialize the class
		$wc_api = new WC_API_Client( self::CUSTOMER_KEY, self::CUSTOMER_SECRET, self::STORE_URL );

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

		// Initialize the class
		$wc_api = new WC_API_Client( self::CUSTOMER_KEY, self::CUSTOMER_SECRET, self::STORE_URL );
 
		$response = $wc_api->get_products( array( 'filter[limit]' => '-1'));

		$products = $response->products;

		foreach($products as $product)
		{
			$existingproduct = ProductService::checkUpdate($product->id);

			$updatecheck = substr_replace(preg_replace("/[^0-9,:,-]/", "", $product->updated_at), ' ', 10, -8);

			$updateverify = $updatecheck;

			$oldproduct = false;

			if(!is_null($existingproduct['entry'])){
				if(substr_replace(preg_replace("/[^0-9,:,-]/", "", $existingproduct['entry']->updated_at), ' ', 10, -8) != $updateverify){
					$updateverify = $existingproduct['entry']->updated_at;
					$oldproduct = true;
				}
			} 


			if(!is_null($existingproduct['entry']) && $updatecheck == $updateverify){
				continue;
			}

			else {

				$created_at = $product->created_at;
				$updated_at = $product->updated_at;

				$created_at = substr_replace(preg_replace("/[^0-9,:,-]/", "", $created_at), ' ', 10, -8);
				$updated_at = substr_replace(preg_replace("/[^0-9,:,-]/", "", $updated_at), ' ', 10, -8);

				$dimensions = get_object_vars($product->dimensions);

				if($oldproduct == true){
					$store = $this->productsrepo->importupdate(
						$product->id,
						$product->title,
						$product->short_description,
						$product->permalink,
						$product->sku,
						$product->regular_price,
						$product->sale_price,
						$product->stock_quantity,
						$product->total_sales,
						$product->in_stock, 	//	stock status
						$product->sold_individually,
						$product->weight,
						$dimensions['length'],	//	length
						$dimensions['width'],	//	width
						$dimensions['height'],	//	height
						$product->status,
						1,	//	product type
						$product->description,
						$product->visible,
						$product->downloadable,
						$product->featured,
						$product->virtual,
						1,
						$product->managing_stock,
						$product->backorders_allowed,
						null,
						null,
						null,
						null,
						$created_at,
						$updated_at
						);
 
				} 

				else {


					$store = $this->productsrepo->import(
							$product->id,
							$product->title,
							$product->short_description,
							$product->permalink,
							$product->sku,
							$product->regular_price,
							$product->sale_price,
							$product->stock_quantity,
							$product->total_sales,
							$product->in_stock, 	//	stock status
							$product->sold_individually,
							$product->weight,
							$dimensions['length'],	//	length
							$dimensions['width'],	//	width
							$dimensions['height'],	//	height
							$product->status,
							1,	//	product type
							$product->description,
							$product->visible,
							$product->downloadable,
							$product->featured,
							$product->virtual,
							1,
							$product->managing_stock,
							$product->backorders_allowed,
							null,
							null,
							null,
							null,
							$created_at,
							$updated_at

						);
 
				}
				

			}

			
		}


		$this->layout->title = 'WpApi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.wp-api.products', array('entries' => $products));
	}
 
	/**
	 * Display a listing of the orders.
	 *
	 * @return Response
	 */
	public function orders()
	{ 
		// Initialize the class
		$wc_api = new WC_API_Client( self::CUSTOMER_KEY, self::CUSTOMER_SECRET, self::STORE_URL );
 
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

		// Initialize the class
		$wc_api = new WC_API_Client( self::CUSTOMER_KEY, self::CUSTOMER_SECRET, self::STORE_URL );
 
		$response = $wc_api->get_customers(array( 'filter[limit]' => '-1' ));

		$customers = $response->customers; 
 

		foreach($customers as $customer)
		{

			$existinguser = User::checkExisting($customer->id);

			if(!is_null($existinguser['entry'])){
				continue;
			}


			$store = $this->customersrepo->store(
				'asdf',			//	naziv kompanije
				1,			//	tip djelatnosti
				1,			//	oib
				$customer->first_name,
				$customer->last_name,
				'asdf',			//	adresa
				14,			//	mjesto
				31000,		//	zip
				14,			//	grad			
				987654321,		//	broj telefona
				0987123456,		//	fax
				123098456,		//	broj mobitela
				$customer->email,
				'http://mojawebstranica.com',	//	web stranica
				'iban',					//	iban
				'Podaci iz WordPress stranice'			//	note

			);  
		}

		$this->layout->title = 'WpApi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.wp-api.customers', array('customers' => $customers));
	}

}

