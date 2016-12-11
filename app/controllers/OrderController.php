<?php

/*
*	OrderController
*
*	Handles backend functions
*/


class OrderController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;

	protected $invoicerepo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new OrderRepository;
		$this->invoicerepo = new InvoiceRepository;

	}

	/**
	 * Display a listing of the client post(s).
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get data
		$entries = Order::getOrdersEntries(null); 


		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$allproducts = array();
		foreach ($entries['entries'] as $order)
		{
			$productsperorder = array();
	 		$productdata = OrdersProducts::getEntries($order->id);
		 		foreach($productdata['entry'] as $product)
				{
					$singleproduct = ProductService::getEntry($product->product_id);

					array_push($productsperorder, $singleproduct);
				}

				$allproducts[] = $productsperorder;

		}

		$this->layout->title = 'Narudžbe | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);

		$this->layout->content = View::make('backend.order.index', array('entries' => $entries['entries'], 'allproducts' => $allproducts));
	}


	/**
	 * Show the form for creating a new client post(s).
	 *
	 * @return Response
	 */
	public function create()
	{
		// Get data
		// Getting all clients
		$clientslist = array();

		$clients = User::getListEntries(null, null);

		if ($clients['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($clients['entries'] as $clients)
		{
			$clientslist[$clients->id] = $clients->first_name . '  ' . $clients->last_name;
		}

		// Getting all products
		$productlist = array();

		$products = ProductService::getEntries(null, null);

		if ($products['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title . ' (' . $products->price . ' kn)';

		}

		$singleprices = ProductService::getPrices();
		//goDie($singleprices);
 		$lastordernumber = Order::getLastOrder();
 		$newordernumber = 0;
 		if(DB::table('orders')->count() > 0){
 			$newordernumber = $lastordernumber['entry']->order_id + 1;
 		}
 		
		$this->layout->title = 'Unos nove narudžbe | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.order.create', array('postRoute' => 'OrderStore', 'clientslist' => $clientslist, 'productlist' => $productlist, 'singleprices' => $singleprices, 'newordernumber' => $newordernumber));
	}


	/**
	 * Store a newly created client post(s) in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		 Input::merge(array_map('trim', Input::except('products_array', 'quantity', 'singleprice')));

		 $entryValidator = Validator::make(Input::all(), Order::$store_rules);
		 
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('order_id', 'user_id', 'order_date', 'shipping_way', 'payment_way', 'payment_status', 'newaddress', 'address', 'note'));
		}

		$store = $this->repo->store(
			Input::get('order_id'),
			Input::get('user_id'),
			Auth::id(),
			Input::get('order_date'),
			Input::get('products_array'),
			Input::get('quantity'),
			Input::get('shipping_way'),
			Input::get('payment_way'),
			Input::get('payment_status'),
			Input::get('billing_address'),
			Input::get('shipping_address'),
			Input::get('note')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('OrderIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified client post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		 
		$entry = Order::getEntries($id);

		// Getting all clients
		$clientslist = array();

		$clients = User::getListEntries(null, null);

		if ($clients['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($clients['entries'] as $clients)
		{
			$clientslist[$clients->id] = $clients->first_name . '  ' . $clients->last_name;
		}
			
		// Getting all products
		$productlist = array();

		$products = ProductService::getListedProducts(null, null);

		if ($products['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title . ' (' . $products->price . ' kn)';

		}


		$orderbycustomer = OrdersProducts::getOrderByCustomer($id);
		
		$this->layout->title = 'Pregled narudžbe | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'

		);

		$this->layout->content = View::make('backend.order.show', array('entry' => $entry['entry'], 'postRoute' => 'OrderUpdate', 'clientslist' => $clientslist, 'productlist' => $productlist, 'orderbycustomer' => $orderbycustomer['orderbycustomer']));
	}


	/**
	 * Show the form for editing the specified client post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 
		$entry = Order::getEntries($id);

		// Getting all clients
		$clientslist = array();

		$clients = User::getListEntries(null, null);

		if ($clients['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($clients['entries'] as $clients)
		{
			$clientslist[$clients->id] = $clients->first_name . '  ' . $clients->last_name;
		}
 		
		// Getting all products
		$productlist = array();

		$products = ProductService::getListedProducts(null, null);

		if ($products['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title . ' (' . $products->price . ' kn)';

		}


		$orderbycustomer = OrdersProducts::getOrderByCustomer($id);
		
		$this->layout->title = 'Uređivanje narudžbe | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'

		);

		$this->layout->content = View::make('backend.order.edit', array('entry' => $entry['entry'], 'postRoute' => 'OrderUpdate', 'clientslist' => $clientslist, 'productlist' => $productlist, 'orderbycustomer' => $orderbycustomer['orderbycustomer']));
	}


	/**
	 * Update the specified client post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//goDie(Input::all());
		Input::merge(array_map('trim', Input::except('products_array', 'quantity', 'singleprice')));
		$entryValidator = Validator::make(Input::all(), Order::$store_rules);



		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('order_id', 'user_id', 'order_date', 'shipping_way', 'payment_way', 'payment_status', 'newaddress', 'address', 'note'));
		}
		 
		$update = $this->repo->update(
			Input::get('id'),
			Input::get('order_id'),
			Input::get('user_id'),
			Input::get('order_date'),
			Input::get('products_array'),
			Input::get('quantity'),
			Input::get('shipping_way'),
			Input::get('payment_way'),
			Input::get('payment_status'),
			Input::get('billing_address'),
			Input::get('shipping_address'),
			Input::get('note')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('OrderIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}

	public function createInvoice($id)
	{
		try{
			$order = Order::getEntries($id);

			$productsperorder = OrdersProducts::getOrderByCustomer($order['entry']->id);

			$product = array();
			$measurement = array();
			$quantity = array();
			$price = array(); 
			$discount = array();
			$taxpercent = array();

			foreach($productsperorder['orderbycustomer'] as $singleproduct){
				array_push($product, $singleproduct->product_id);
				array_push($quantity, $singleproduct->quantity);

				array_push($measurement, 0);
				array_push($price, 0);
				array_push($discount, 0);
				array_push($taxpercent, 0);
			}

				$store = $this->invoicerepo->store(
				$order['entry']->order_id,
				'N',					//	order_id
				0,					//	tax
				$order['entry']->user_id,			//	user
				$order['entry']->employee_id,		//	employee_id
				$product,
				$measurement,
				$quantity,
				$price,
				$discount,
				$taxpercent,
				$order['entry']->payment_way,
				$order['entry']->order_date,
				'0',					//	invoice_date_deadline
				'0',					//	invoice_date_ship
				$order['entry']->note,
				'',					//	intern_note
				0,					//	repeat_invoice
				'croatian',				//	invoice_language
				0					//	valute
		);

			return Redirect::route('OrderIndex')->with('success_message', Lang::get('core.msg_success_invoice_created'));
		}


		catch (Exception $exp)
		{
			return Redirect::route('OrderIndex')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		}


	}


	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$order = Order::getEntries($id);

			$productsperorder = OrdersProducts::getOrderByCustomer($order['entry']->id);

			$employeeinfo = User::getEntries($order['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperorder['orderbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->quantity;
			}


			$ordersData[] = array('order' => $order, 'employeeinfo' => $employeeinfo['entry'], 'productsperorder' => $productsperorder['orderbycustomer'], 'totalprice' => $totalprice);
			
			
			if ($order['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'narudzba_obrazac_' . $order['entry']->order_id . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/orders/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.order.orderspdf', array('ordersdata' => $ordersData, 'productsperorder' => $productsperorder, 'currdate' => $currdate))->save( $pdfreportfullpath );
			return $pdf->stream();

		}

		else
		{
			$this->layout->content = View::make('general.errors.error');
		}
	}


	// Send PDF in email
	public function sendEmail($id)
	{
		try{

			$id = Input::get('id');
			$order = Order::getEntries($id);

			$productsperorder = OrdersProducts::getOrderByCustomer($order['entry']->id);

			$employeeinfo = User::getEntries($order['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperorder['orderbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->quantity;
			}

			$ordersData[] = array('order' => $order, 'employeeinfo' => $employeeinfo['entry'], 'productsperorder' => $productsperorder['orderbycustomer'], 'totalprice' => $totalprice);
			
			
			if ($order['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'narudzba_' . $order['entry']->order_id . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/orders/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.order.orderspdf', array('ordersdata' => $ordersData, 'productsperorder' => $productsperorder, 'currdate' => $currdate));

			Mail::send('backend.email.ordermail', array( 'comment' => Input::get('order_comment'), 'first_name' => $order['entry']->first_name, 'last_name' => $order['entry']->last_name, 'number' => $order['entry']->order_id), function($message) use($pdf, $order, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($order['entry']->email)->subject('Narudžba ' . $order['entry']->order_id);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('OrderIndex')->with('success_message', Lang::get('core.msg_success_email_sent'));

		}

		catch (Exception $exp)
		{
			return Redirect::route('OrderIndex')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		}
	  
	}


	/**
	 * Remove the specified client post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 

		if ($id == null)
		{
			return Redirect::route('OrderIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Order::getEntries($id, null, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('OrderIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('OrderIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('OrderIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}
