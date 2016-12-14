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

		$entries = Invoice::getEntries(null, null);


		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Računi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.invoice.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new invoice.
	 *
	 * @return Response
	 */
	public function create()
	{
 
		$entries = Invoice::getEntries(null, null);

		$clientlist = array();

	 	$clients = User::getListEntries(null, null);
	 	
	 	if ($clients['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($clients['entries'] as $clients)
		{
			$clientlist[$clients->id] = $clients->first_name . ' ' . $clients->last_name;
		}

		$productlist = array();

	 	$products = ProductService::getEntries(null, null);
	 	
	 	if ($products['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title;
		}

		$lastinvoicenumber = Invoice::getLastInvoice();

		$newinvoicenumber = 0;

		if(DB::table('invoices')->count() > 0){
			$newinvoicenumber = $lastinvoicenumber['entry']->invoice_number + 1;
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
			'js/backend/datatables.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.invoice.create', array('postRoute' => 'InvoiceStore', 'entries' => $entries, 'clientlist' => $clientlist, 'productlist' => $productlist, 'newinvoicenumber' => $newinvoicenumber));
	}


	/**
	 * Store a newly created invoice in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//goDie(Input::all());
		Input::merge(array_map('trim', Input::except('product', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));

		$entryValidator = Validator::make(Input::all(), Invoice::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('invoice_number', 'invoice_type', 'tax', 'client_id', 'payment_way', 'invoice_date', 'invoice_date_deadline', 'invoice_date_ship', 'invoice_note', 'intern_note', 'repeat_invoice', 'invoice_language', 'valute'));
		}

		$store = $this->repo->store(
			Input::get('invoice_number'),
			Input::get('invoice_type'),
			Input::get('tax'),
			Input::get('client_id'),
			Auth::id(),
			Input::get('product'),
			Input::get('measurement'),
			Input::get('amount'),
			Input::get('price'),
			Input::get('discount'),
			Input::get('taxpercent'),
			Input::get('payment_way'),
			Input::get('invoice_date'),
			Input::get('invoice_date_deadline'),
			Input::get('invoice_date_ship'),
			Input::get('invoice_note'),
			Input::get('intern_note'),
			Input::get('repeat_invoice'),
			Input::get('invoice_language'),
			Input::get('valute')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('InvoiceIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
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

		$entry = Invoice::getEntries($id, null);

		$entries = Invoice::getEntries(null, null);

		$clientlist = array();

	 	$clients = User::getListEntries(null, null);
	 	
	 	if ($clients['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($clients['entries'] as $clients)
		{
			$clientlist[$clients->id] = $clients->first_name . ' ' . $clients->last_name;
		}

		$productlist = array();

	 	$products = ProductService::getEntries(null, null);
	 	
	 	if ($products['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title;
		}

		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if($entry['entry']->from_order == '1'){
			$imported = InvoicesProducts::getImportedByCustomer($id);
			$invoicecustomer = InvoicesProducts::getOrderByCustomer($id);
		}
		else{
			$imported = 0;
			$invoicecustomer = InvoicesProducts::getOrderByCustomer($id);
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

		$this->layout->content = View::make('backend.invoice.edit', array('entry' => $entry['entry'], 'postRoute' => 'InvoiceUpdate', 'entries' => $entries, 'clientlist' => $clientlist, 'productlist' => $productlist, 'imported' => $imported, 'invoicecustomer' => $invoicecustomer['orderbycustomer']));
	}


	/**
	 * Update the specified invoice post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		Input::merge(array_map('trim', Input::except('product', 'measurement', 'amount', 'price', 'discount', 'taxpercent', 'imported_products')));

		$entryValidator = Validator::make(Input::all(), Invoice::$update_rules);
//dd($entryValidator);
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator);
		}

		$update = $this->repo->update(
		    Input::get('id'),
			Input::get('invoice_number'),
			Input::get('invoice_type'),
			Input::get('tax'),
			Input::get('client_id'),
			Input::get('product'),
			Input::get('measurement'),
			Input::get('amount'),
			Input::get('price'),
			Input::get('discount'),
			Input::get('taxpercent'),
			Input::get('payment_way'),
			Input::get('invoice_date'),
			Input::get('invoice_date_deadline'),
			Input::get('invoice_date_ship'),
			Input::get('invoice_note'),
			Input::get('intern_note'),
			Input::get('repeat_invoice'),
			Input::get('invoice_language'),
			Input::get('valute'),
			Input::get('imported_products')
		);
		
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('InvoiceIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}


	//create pdf
	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$invoice = Invoice::getEntries($id);

			$productsperinvoice = InvoicesProducts::getOrderByCustomer($invoice['entry']->id);

			$employeeinfo = User::getEntries($invoice['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperinvoice['orderbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$invoicesData[] = array('invoice' => $invoice, 'employeeinfo' => $employeeinfo['entry'], 'productsperinvoice' => $productsperinvoice['orderbycustomer'], 'totalprice' => $totalprice);
			
			
			if ($invoice['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'racun_obrazac_' . $invoice['entry']->invoice_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/invoices/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.invoice.invoicespdf', array('invoicesdata' => $invoicesData, 'productsperinvoice' => $productsperinvoice, 'currdate' => $currdate))->save( $pdfreportfullpath );
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
			$invoice = Invoice::getEntries($id);

			$productsperinvoice = InvoicesProducts::getOrderByCustomer($invoice['entry']->id);

			$employeeinfo = User::getEntries($invoice['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperinvoice['orderbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$invoicesData[] = array('invoice' => $invoice, 'employeeinfo' => $employeeinfo['entry'], 'productsperinvoice' => $productsperinvoice['orderbycustomer'], 'totalprice' => $totalprice);
			
			
			if ($invoice['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'racun_' . $invoice['entry']->invoice_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/invoices/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.invoice.invoicespdf', array('invoicesdata' => $invoicesData, 'productsperinvoice' => $productsperinvoice, 'currdate' => $currdate));

			Mail::send('backend.email.invoicemail', array( 'comment' => Input::get('invoice_comment'), 'first_name' => $invoice['entry']->first_name, 'last_name' => $invoice['entry']->last_name, 'number' => $invoice['entry']->invoice_number), function($message) use($pdf, $invoice, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($invoice['entry']->email)->subject('Račun ' . $invoice['entry']->invoice_number);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('InvoiceIndex')->with('success_message', Lang::get('core.msg_success_entry_edited'));

		}

		catch (Exception $exp)
		{
			return Redirect::route('InvoiceIndex')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		}
	  
	}



	/**
	 * Remove the specified invoice post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{ 
		if ($id == null)
		{
			return Redirect::route('InvoiceIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Invoice::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('InvoiceIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('InvoiceIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('InvoiceIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}

