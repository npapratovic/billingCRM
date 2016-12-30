<?php

/*
*	OrderController
*
*	Handles backend functions
*/


class OrderController extends \BaseController {

 

	/**
	 * Display a listing of the client post(s).
	 *
	 * @return Response
	 */



	public function index()
	{
		// Get data
		$entries = Order::with('client')->with('orderProducts')->paginate(10); 
 
		$this->layout->title = 'Narudžbe | BillingCRM';

		$this->layout->content = View::make('backend.order.index', compact('entries'));
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

		$clients = User::where('user_group', 'client')->get();

		foreach ($clients as $client)
		{
			$clientslist[$client->id] = $client->first_name . '  ' . $client->last_name;
		}

		// Getting all products
		$productlist = array();
		
	 	$products = ProductService::get();

		foreach ($products as $product)
		{
			$productlist[$product->id] = $product->title . ' (' . $product->price . ' kn)';

		}

		$singleprices = ProductService::get();
 		$lastordernumber = Order::orderBy('created_at', 'desc')->first();
 		$newordernumber = 0;

 		if(DB::table('orders')->count() > 0){
 			$newordernumber = $lastordernumber->order_id + 1;
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

		$this->layout->content = View::make('backend.order.create', compact('clientslist', 'productlist', 'singleprices', 
			'newordernumber'));
	}


	/**
	 * Store a newly created client post(s) in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$order = Request::all();

		$entryValidator = Validator::make(Input::all(), Order::$store_rules); 

		if ($entryValidator->fails())
		{
		return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		} 

        Order::create($order);

        $orderprice = 0;

    	$order_id = Order::orderBy('id', 'desc')->first()->id;

	 	$product = $order['products_array'];

        $i = 0;
		$ilen = count($product); 

		if ($product != null)
		{
			foreach ($product as $key=>$value)
			{
				if(++$i == $ilen) break;
				$singleprice = ProductService::where('id', $value)->first();
				$product_order['order_id'] = $order_id;
				$product_order['product_id'] = $value;
			   	$product_order['quantity'] = $order['quantity'][$key];
			   	$product_order['price'] = $singleprice->price;
				$orderprice = $orderprice + ($singleprice->price * $order['quantity'][$key]);
				OrdersProducts::create($product_order);

			}
		}

		$data = Order::find($order_id);
		$update_price['price'] = $orderprice;
		$data->update($update_price);

		return Redirect::route('admin.orders.index')->with('success_message', Lang::get('core.msg_success_entry_added'));

	}


	/**
	 * Display the specified client post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		 
		$entry = Order::with(['client'])->find($id);

		// Getting all clients
		$clientslist = array();

		$clients = User::where('user_group', 'client')->get();

		foreach ($clients as $client)
		{
			$clientslist[$client->id] = $client->first_name . '  ' . $client->last_name;
		}
			
		// Getting all products
		$productlist = array();

		$products = ImportedOrderProduct::get();

		foreach ($products as $product)
		{
			$productlist[$product->id] = $product->title . ' (' . $product->price . ' kn)';

		}

		$orderbycustomer = OrdersProducts::with(['orders', 'importedOrderProducts'])->where('order_id', $id)->get();


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

		$this->layout->content = View::make('backend.order.show', compact('entry', 'clientslist', 'productlist', 'orderbycustomer'));
	}


	/**
	 * Show the form for editing the specified client post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 
		$entry = Order::with(['client'])->find($id);
		
		$entry->order_date = date("Y-m-d",strtotime($entry->order_date));

		// Getting all clients
		$clientslist = array();

		$clients = User::where('user_group', 'client')->get();

		foreach ($clients as $client)
		{
			$clientslist[$client->id] = $client->first_name . '  ' . $client->last_name;
		}
 		
		// Getting all products
		$productlist = array();

		$products = ProductService::get();

		foreach ($products as $product)
		{
			$productlist[$product->id] = $product->title . ' (' . $product->price . ' kn)';

		}

		$orderbycustomer = OrdersProducts::with(['orders', 'productServices'])->where('order_id', $id)->get();

		

		
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

		$this->layout->content = View::make('backend.order.edit', compact('entry', 'clientslist', 'productlist', 'orderbycustomer'));
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
		$order = Request::all(); 

		$entryValidator = Validator::make(Input::all(), Order::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('order_id', 'user_id', 'order_date', 'shipping_way', 'payment_way', 'payment_status', 'newaddress', 'address', 'note'));
		}

		$data = Order::find($id);
		$data->update($order);

        $orderprice = 0;

	 	$product = $order['products_array'];

        $i = 0;
		$ilen = count($product); 

		if ($product != null)
		{	
			OrdersProducts::where('order_id', $id)->delete();
			foreach ($product as $key=>$value)
			{
				if(++$i == $ilen) break;
				$singleprice = ProductService::where('id', $value)->first();
				$product_order['order_id'] = $id;
				$product_order['product_id'] = $value;
			   	$product_order['quantity'] = $order['quantity'][$key];
			   	$product_order['price'] = $singleprice->price;
				$orderprice = $orderprice + ($singleprice->price * $order['quantity'][$key]);
				OrdersProducts::create($product_order);

			}
		}

		$data = Order::find($id);
		$update_price['price'] = $orderprice;
		$data->update($update_price);
		 
		return Redirect::route('admin.orders.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));
		
	}

	public function createInvoice($id)
	{
		// try{
			$order = Order::with('client')->find($id);

			if($order->show_only == '1')
			{
				$productsperorder = OrdersProducts::with('importedOrderProducts')->where('order_id', $order->id)->get();
				
			}
			else {
				$productsperorder = OrdersProducts::with('productServices')->where('order_id', $order->id)->get();

			}

			
			$invoice['invoice_number'] = $order->order_id;
			$invoice['client_id'] = $order->user_id;
			$invoice['employee_id'] = '0';
			$invoice['invoice_type'] = 'N';
			$invoice['tax'] = '0';
			$invoice['payment_way'] = $order->payment_way;
			$invoice['invoice_date'] = $order->order_date;
			$invoice['invoice_note'] = $order->note;
			$invoice['repeat_invoice'] = '0';
			$invoice['invoice_language'] = 'croatian';
			$invoice['valute'] = '0';
			$invoice['from_order'] = '1';
			Invoice::create($invoice);

			$invoice_id = Invoice::orderBy('created_at', 'desc')->pluck('id');


			if($order->show_only == '1')
			{
				foreach($productsperorder as $singleproduct){
				$product_invoice['product_id'] = $singleproduct->product_id;
				$product_invoice['invoice_id'] = $invoice_id;
			   	$product_invoice['measurement'] = '0';
				$product_invoice['amount'] =  $singleproduct->quantity;
				$product_invoice['price'] = $singleproduct->price;
				$product_invoice['discount'] = '0';
				$product_invoice['taxpercent'] = '0';
				$product_invoice['imported'] = '1';
				InvoicesProducts::create($product_invoice);
			}
				
			}
			else {
				foreach($productsperorder as $singleproduct){
				$product_invoice['product_id'] = $singleproduct->product_id;
				$product_invoice['invoice_id'] = $invoice_id;
			   	$product_invoice['measurement'] = '0';
				$product_invoice['amount'] =  $singleproduct->quantity;
				$product_invoice['price'] = $singleproduct->price;
				$product_invoice['discount'] = '0';
				$product_invoice['taxpercent'] = '0';
				$product_invoice['imported'] = '0';
				InvoicesProducts::create($product_invoice);
			}

			}

			

			

			return Redirect::route('admin.orders.index')->with('success_message', Lang::get('core.msg_success_invoice_created'));
		//}


		// catch (Exception $exp)
		// {
		// 	return Redirect::route('admin.orders.index')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		// }


	}


	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$order = Order::with('client')->find($id);

			if($order->show_only == '1'){
				$productsperorder = OrdersProducts::with('importedOrderProducts')->where('order_id', $order->id)->get();
			}
			else{
				$productsperorder = OrdersProducts::with('productServices')->where('order_id', $order->id)->get();
			}


			$employeeinfo = User::with(['userCity', 'userRegion'])->find($order['client'][0]->id);

			$totalprice = 0;

			foreach($productsperorder as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->quantity;
			}

			$ordersdata[] = compact('order', 'employeeinfo', 'productsperinvoice', 'totalprice');

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'narudzba_obrazac_' . $order->order_id . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/orders/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.order.orderspdf', compact('ordersdata', 'imported', 'productsperorder', 'currdate'))->save( $pdfreportfullpath );
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
		// try{

			$id = Input::get('id');
			$order = Order::with('client')->find($id);

			$productsperorder = OrdersProducts::with('productServices')->where('order_id', $order->id)->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($order['client'][0]->id);

			$totalprice = 0;

			foreach($productsperorder as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->quantity;
			}


			$ordersdata[] = compact('order', 'employeeinfo', 'productsperorder', 'totalprice');
			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'narudzba_' . $order->order_id . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/orders/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.order.orderspdf', compact('ordersdata', 'productsperorder', 'currdate'));

			Mail::send('backend.email.ordermail', array( 'comment' => Input::get('order_comment'), 'first_name' => $order->first_name, 'last_name' => $order->last_name, 'number' => $order->order_id), function($message) use($pdf, $order, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($order->email)->subject('Narudžba ' . $order->order_id);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('admin.orders.index')->with('success_message', Lang::get('core.msg_success_email_sent'));

		// }

		// catch (Exception $exp)
		// {
		// 	return Redirect::route('admin.orders.index')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		// }
	  
	}


	/**
	 * Remove the specified client post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 
		Order::find($id)->delete();
      	return Redirect::route('admin.orders.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
	}


}
