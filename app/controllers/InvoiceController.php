<?php

/*
*	InvoiceController
*
*	Handles backend functions
*/

class InvoiceController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new InvoiceRepository;
	}
	/**
	 * Display a listing of the invoice.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		// Get data
		$entries = Invoice::with(['client', 'invoicesProducts'])->paginate(10);

		foreach($entries as $entry){
			$product_price = 0;

			foreach ($entry['invoicesProducts'] as $product) {
				$product_price += ($product->price * ( 1 - ($product->discount / 100)) * $product->amount) * ( 1 + ($product->taxpercent / 100));
			}

			$entry['invoicesProducts']['totalprice'] = $product_price;
			
		}


		$this->layout->title = 'Računi | BillingCRM';

		$this->layout->content = View::make('backend.invoice.index', compact('entries'));
	}


	/**
	 * Show the form for creating a new invoice.
	 *
	 * @return Response
	 */
	public function create()
	{
 
		$clientlist = array();

	 	$clients = User::where('user_group', 'client')->get();
	 	
		foreach ($clients as $client)
		{
			$clientlist[$client->id] = $client->first_name . ' ' . $client->last_name;
		}

		$productlist = array();

	 	$products = ProductService::get();
	 
		foreach ($products as $product)
		{
			$productlist[$product->id] = $product->title;
		}

		$lastinvoicenumber = Invoice::orderBy('created_at', 'desc')->first();

		$newinvoicenumber = 0;

		if(DB::table('invoices')->count() > 0){
			$newinvoicenumber = $lastinvoicenumber->invoice_number + 1;
		}

		$this->layout->title = 'Unos novog računa | BillingCRM';

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

		$this->layout->content = View::make('backend.invoice.create', compact('clientlist', 'productlist', 'newinvoicenumber'));
	}


	/**
	 * Store a newly created invoice in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $invoice = Request::all();

		$entryValidator = Validator::make(Input::all(), Invoice::$store_rules); 

		if ($entryValidator->fails())
		{
		return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		} 

        Invoice::create($invoice);  
 
	 	$invoice_id = Invoice::orderBy('id', 'desc')->first()->id;
	 	$product = $invoice['product'];
  
		$i = 0;
		$ilen = count($product); 

		if ($product != null)
		{
			foreach ($product as $key=>$value)
			{
				if(++$i == $ilen) break;
		
				$product_invoice['product_id'] = $value;
				$product_invoice['invoice_id'] = $invoice_id;
			   	$product_invoice['measurement'] = $invoice['measurement'][$key];
				$product_invoice['amount'] = $invoice['amount'][$key];
				$product_invoice['price'] = $invoice['price'][$key];
				$product_invoice['discount'] = $invoice['discount'][$key];
				$product_invoice['taxpercent'] = $invoice['taxpercent'][$key];
				$product_invoice['imported'] = '0';
				InvoicesProducts::create($product_invoice);

			}
		}


   		return Redirect::route('admin.invoices.index')->with('success_message', Lang::get('core.msg_success_entry_added'));

	}


	/**
	 * Display the specified invoice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{ 
 
		$this->layout->title = 'Računi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.invoice.view');
	}


	/**
	 * Show the form for editing the specified invoice post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		  
		// Get data
		$entry = Invoice::with('client')->find($id);

		$entries = Invoice::with('client')->get();
		
		$clientlist = array();

	 	$clients = User::where('user_group', '=', 'client')->get();

	 
		foreach ($clients as $client)
		{
			$clientlist[$client->id] = $client->first_name . ' ' . $client->last_name;
		}

		$productlist = array();

	 	$products = ProductService::get();

		foreach ($products as $products)
		{
			$productlist[$products->id] = $products->title;
		}

		if($entry->from_order == '1'){
			$imported = InvoicesProducts::with(['importedOrders'])->where('invoices_products.invoice_id', '=', $id)
 				->where('invoices_products.imported', '1')->get();
			$invoicecustomer = InvoicesProducts::with(['productServices'])
				->where('invoice_id', '=', $id)->where('imported', '0')->get();
		}
		else{
			$imported = 0;
			$invoicecustomer = InvoicesProducts::with(['productServices'])
				->where('invoice_id', '=', $id)->where('imported', '0')->get();
		}

		$this->layout->title = 'Uređivanje računa | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'		
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/datatables.js',
			'js/backend/bootstrap-datepicker.min.js'
		);


		$this->layout->content = View::make('backend.invoice.edit', compact('entry', 'entries', 'clientlist', 'productlist', 'imported', 'invoicecustomer'));
	}


	/**
	 * Update the specified invoice post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$invoice = Request::all(); 

		$entryValidator = Validator::make(Input::all(), Invoice::$update_rules);
//dd($entryValidator);
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator);
		}
		$data = Invoice::find($id);

		$data->update($invoice);

	 	$product = $invoice['product'];
  
		$i = 0;
		$ilen = count($product); 

		if ($product != null)
		{
			InvoicesProducts::where('invoice_id', $id)->delete();
			foreach ($product as $key=>$value)
			{
				if(++$i == $ilen) break;
		
				$product_invoice['product_id'] = $value;
				$product_invoice['invoice_id'] = $id;
			   	$product_invoice['measurement'] = $invoice['measurement'][$key];
				$product_invoice['amount'] = $invoice['amount'][$key];
				$product_invoice['price'] = $invoice['price'][$key];
				$product_invoice['discount'] = $invoice['discount'][$key];
				$product_invoice['taxpercent'] = $invoice['taxpercent'][$key];
				$product_invoice['imported'] = '0';
				InvoicesProducts::create($product_invoice);

			}
		}
		
		return Redirect::route('admin.invoices.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));
	}


	//create pdf
	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$invoice = Invoice::with(['client'])->where('invoices.id', '=', $id)->first();
			$totalprice = 0;

			if($invoice->from_order == '1'){
				$imported = InvoicesProducts::with(['importedOrders'])->where('invoices_products.invoice_id', '=', $id)
 				->where('invoices_products.imported', '1')->get();


				$productsperinvoice = InvoicesProducts::with(['productServices'])
				->where('invoice_id', '=', $id)->where('imported', '0')->get();


				foreach($imported as $singleproduct){

				$totalprice += ($singleproduct->price * ( 1 - ($singleproduct->discount / 100)) * $singleproduct->amount) * ( 1 + ($singleproduct->taxpercent / 100));
				}

				if($totalprice <= 0){
					foreach($productsperinvoice as $singleproduct){

					$totalprice += ($singleproduct->price * ( 1 - ($singleproduct->discount / 100)) * $singleproduct->amount) * ( 1 + ($singleproduct->taxpercent / 100));
					}
				}



			}
			else{
				$imported = 0;
				$productsperinvoice = InvoicesProducts::with(['productServices'])
				->where('invoice_id', '=', $id)->where('imported', '0')->get();

				foreach($productsperinvoice as $singleproduct){

				$totalprice += ($singleproduct->price * ( 1 - ($singleproduct->discount / 100)) * $singleproduct->amount) * ( 1 + ($singleproduct->taxpercent / 100));
				}

			}


			
			$employeeinfo = User::with(['userCity', 'userRegion'])->find($invoice['client']->id);

			$invoicesdata[] = compact('invoice', 'employeeinfo', 'productsperinvoice', 'totalprice');

			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'racun_obrazac_' . $invoice->invoice_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/invoices/" . $pdfname . '.pdf';

			//call createPdf method to create pdf
			$pdf = PDF::loadView('backend.invoice.invoicespdf', compact('invoicesdata', 'imported', 'productsperinvoice', 'currdate'))->save( $pdfreportfullpath );
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
			$invoice = Invoice::with(['client'])->find($id);

			$productsperinvoice = InvoicesProducts::with(['productServices'])
				->where('invoice_id', '=', $id)->where('imported', '0')->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($invoice['client']->id);

			$totalprice = 0;
			$imported = 0;

			foreach($productsperinvoice as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}

			$invoicesdata[] = compact('invoice', 'employeeinfo', 'productsperinvoice', 'totalprice');
		
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'racun_' . $invoice->invoice_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/invoices/" . $pdfname . '.pdf';


			//call createPdf method to create pdf

			$pdf = PDF::loadView('backend.invoice.invoicespdf', compact('invoicesdata', 'imported', 'productsperinvoice', 'currdate'));

			Mail::send('backend.email.invoicemail', array( 'comment' => Input::get('invoice_comment'), 'first_name' => $invoice->first_name, 'last_name' => $invoice->last_name, 'number' => $invoice->invoice_number), function($message) use($pdf, $invoice, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($invoice->email)->subject('Račun ' . $invoice->invoice_number);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('admin.invoices.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));

		// }

		// catch (Exception $exp)
		// {
		// 	return Redirect::route('admin.invoices.index')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		// }
	  
	}



	/**
	 * Remove the specified invoice post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{ 
		Invoice::find($id)->delete();
      	return Redirect::route('admin.invoices.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
	}


}

