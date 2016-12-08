<?php

/*
*	DispatchController
*
*	Handles backend functions
*/

class DispatchController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new DispatchRepository;
	}
	/**
	 * Display a listing of the dispatch.
	 *
	 * @return Response
	 */
	public function index()
	{

		// Get data

		$entries = Dispatch::getDispatchEntries();
 		
		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$this->layout->title = 'Otpremnice | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.dispatch.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new dispatch.
	 *
	 * @return Response
	 */
	public function create()
	{
		$entries = Dispatch::getEntries(null, null);

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

	 	$products = ProductService::getEntries();
	 	
	 	if ($products['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title;
		}

 		$lastdispatchnumber = Dispatch::getLastDispatch();
 		$newdispatchnumber = 0;
 		if(DB::table('dispatches')->count() > 0){
 			$newdispatchnumber = $lastdispatchnumber['entry']->dispatch_number + 1;
 		} else {
 			$newdispatchnumber = 0;
 		}

		$this->layout->title = 'Unos nove otpremnice | BillingCRM';

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

		$this->layout->content = View::make('backend.dispatch.create', array('postRoute' => 'DispatchStore', 'entries' => $entries, 'clientlist' => $clientlist, 'productlist' => $productlist, 'newdispatchnumber' => $newdispatchnumber));
	}


	/**
	 * Store a newly created dispatch in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		
		Input::merge(array_map('trim', Input::except('product', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));
     
		$entryValidator = Validator::make(Input::all(), Dispatch::$store_rules);

		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('dispatch_number', 'taxable', 'hide_amount', 'client_id', 'client_address', 'client_oib', 'stock_label', 'dispatch_employee', 'dispatch_date_ship', 'dispatch_note', 'dispatch_language', 'valute'));
		}

		
		$store = $this->repo->store(
			Input::get('dispatch_number'),
			Input::get('taxable'),
			Input::get('hide_amount'),
			Input::get('client_id'),
			Auth::id(),
			Input::get('client_address'),
			Input::get('client_oib'),
			Input::get('product'),
			Input::get('measurement'),
			Input::get('amount'),
			Input::get('price'),
			Input::get('discount'),
			Input::get('taxpercent'),
			Input::get('stock_label'),
			Input::get('dispatch_employee'),
			Input::get('dispatch_date_ship'),
			Input::get('dispatch_note'),
			Input::get('dispatch_language'),
			Input::get('valute')
		);



		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('DispatchIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified dispatch.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$this->layout->title = 'Otpremnice | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.dispatch.view');
	}


	/**
	 * Show the form for editing the specified dispatch post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		// Get data

		$entry = Dispatch::getEntries($id, null);

        		$dispatchproducts = DispatchesProducts::getDispatchByCustomer($id);

		$entries = Dispatch::getEntries(null, null);

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

	 	$products = ProductService::getEntries();
	 	
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
		$this->layout->title = 'Uređivanje otpremnice | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/datatables.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.dispatch.edit', array('entry' => $entry['entry'], 'postRoute' => 'DispatchUpdate', 'entries' => $entries, 'clientlist' => $clientlist, 'productlist' => $productlist, 'dispatchproducts' => $dispatchproducts['dispatchbycustomer']));
	}


	/**
	 * Update the specified dispatch post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::except('product', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));
      
		$entryValidator = Validator::make(Input::all(), Dispatch::$store_rules);

		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}


		$update = $this->repo->update(
		    Input::get('id'),
			Input::get('dispatch_number'),
			Input::get('taxable'),
			Input::get('hide_amount'),
			Input::get('client_id'),
			Input::get('client_address'),
			Input::get('client_oib'),
			Input::get('product'),
			Input::get('measurement'),
			Input::get('amount'),
			Input::get('price'),
			Input::get('discount'),
			Input::get('taxpercent'),
			Input::get('stock_label'),
			Input::get('dispatch_employee'),
			Input::get('dispatch_date_ship'),
			Input::get('dispatch_note'),
			Input::get('dispatch_language'),
			Input::get('valute')
		);


		
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('DispatchIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}

	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$dispatch = Dispatch::getEntries($id);

			$productsperdispatch = DispatchesProducts::getDispatchByCustomer($dispatch['entry']->id);

			$employeeinfo = User::getEntries($dispatch['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperdispatch['dispatchbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$dispatchesData[] = array('dispatch' => $dispatch, 'employeeinfo' => $employeeinfo['entry'], 'productsperdispatch' => $productsperdispatch['dispatchbycustomer'], 'totalprice' => $totalprice);
			

			
			if ($dispatch['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'otpremnica_obrazac_' . $dispatch['entry']->dispatch_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/dispatches/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.dispatch.dispatchpdf', array('dispatchdata' => $dispatchesData, 'productsperdispatch' => $productsperdispatch, 'currdate' => $currdate))->save( $pdfreportfullpath );
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
			$dispatch = Dispatch::getEntries($id);

			$productsperdispatch = DispatchesProducts::getDispatchByCustomer($dispatch['entry']->id);

			$employeeinfo = User::getEntries($dispatch['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperdispatch['dispatchbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$dispatchesData[] = array('dispatch' => $dispatch, 'employeeinfo' => $employeeinfo['entry'], 'productsperdispatch' => $productsperdispatch['dispatchbycustomer'], 'totalprice' => $totalprice);
			

			
			if ($dispatch['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}


			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'otpremnica_' . $dispatch['entry']->dispatch_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/dispatches/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.dispatch.dispatchpdf', array('dispatchdata' => $dispatchesData, 'productsperdispatch' => $productsperdispatch, 'currdate' => $currdate));


			Mail::send('backend.email.dispatchmail', array( 'comment' => Input::get('dispatch_comment'), 'first_name' => $dispatch['entry']->first_name, 'last_name' => $dispatch['entry']->last_name, 'number' => $dispatch['entry']->dispatch_number), function($message) use($pdf, $dispatch, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($dispatch['entry']->email)->subject('Otpremnica ' . $dispatch['entry']->dispatch_number);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('DispatchIndex')->with('success_message', Lang::get('core.msg_success_entry_edited'));

		}

		catch (Exception $exp)
		{
			return Redirect::route('DispatchIndex')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		}
	  
	}


	/**
	 * Remove the specified dispatch post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		if ($id == null)
		{
			return Redirect::route('DispatchIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Dispatch::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('DispatchIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('DispatchIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('DispatchIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}

