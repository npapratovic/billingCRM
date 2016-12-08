<?php

/*
*	WorkingOrderController
*
*	Handles backend functions
*/

class WorkingOrderController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new WorkingOrderRepository;
	}
	/**
	 * Display a listing of the workingorder.
	 *
	 * @return Response
	 */
	public function index()
	{
		 
		// Get data

		$entries = WorkingOrder::getWorkingOrderEntries();

		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Radni nalozi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.workingorder.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new workingorder.
	 *
	 * @return Response
	 */
	public function create()
	{
	 


		$entries = WorkingOrder::getEntries(null, null);

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

		$servicelist = array();

	 	$services = ProductService::getListedServices(null, null);
	 	
	 	if ($services['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($services['entries'] as $services)
		{
			$servicelist[$services->id] = $services->title;
		}

		$lastworkingordernumber = WorkingOrder::getLastWorkingOrder();
		$newworkingordernumber = 0;
		if(DB::table('workingorders')->count() > 0){
			$newworkingordernumber = $lastworkingordernumber['entry']->workingorder_number + 1;
		} 

		$this->layout->title = 'Unos novog radnog naloga | BillingCRM';

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

		$this->layout->content = View::make('backend.workingorder.create', array('postRoute' => 'WorkingOrderStore', 'entries' => $entries, 'clientlist' => $clientlist, 'servicelist' => $servicelist, 'newworkingordernumber' => $newworkingordernumber));
	}


	/**
	 * Store a newly created workingorder in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        

		Input::merge(array_map('trim', Input::except('service', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));
     
		$entryValidator = Validator::make(Input::all(), WorkingOrder::$store_rules);

		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('workingorder_number', 'taxable', 'hide_amount', 'client_id', 'client_address', 'client_oib', 'workingorder_employee', 'workingorder_date_ship', 'workingorder_date_ship', 'workingorder_note', 'workingorder_description'));
		}

		$store = $this->repo->store(
			Input::get('workingorder_number'),
			Input::get('taxable'),
			Input::get('hide_amount'),
			Input::get('client_id'),
			Auth::id(),
			Input::get('client_address'),
			Input::get('client_oib'),
			Input::get('service'),
			Input::get('measurement'),
			Input::get('amount'),
			Input::get('price'),
			Input::get('discount'),
			Input::get('taxpercent'),
			Input::get('workingorder_employee'),
			Input::get('workingorder_date_ship'),
			Input::get('workingorder_note'),
			Input::get('workingorder_description')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('WorkingOrderIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified workingorder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 

		$this->layout->title = 'Radni nalozi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.workingorder.view');
	}


	/**
	 * Show the form for editing the specified workingorder post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	 

		// Get data

		$entry = WorkingOrder::getEntries($id, null);

       


		$entries = WorkingOrder::getEntries(null, null);

		$workingorderservices = WorkingOrdersServices::getEntries($id);

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

		$servicelist = array();

	 	$services = ProductService::getListedServices(null, null);
	 	
	 	if ($services['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($services['entries'] as $services)
		{
			$servicelist[$services->id] = $services->title;
		}

		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Uređivanje radnog naloga | BillingCRM';

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

		$this->layout->content = View::make('backend.workingorder.edit', array('entry' => $entry['entry'], 'postRoute' => 'WorkingOrderUpdate', 'entries' => $entries, 'clientlist' => $clientlist, 'servicelist' => $servicelist, 'workingorderservices' => $workingorderservices['entry']));
	}


	/**
	 * Update the specified workingorder post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        
		Input::merge(array_map('trim', Input::except('service', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));
     
		$entryValidator = Validator::make(Input::all(), WorkingOrder::$store_rules);

		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
		    Input::get('id'),
			Input::get('workingorder_number'),
			Input::get('taxable'),
			Input::get('hide_amount'),
			Input::get('client_id'),
			Input::get('client_address'),
			Input::get('client_oib'),
			Input::get('service'),
			Input::get('measurement'),
			Input::get('amount'),
			Input::get('price'),
			Input::get('discount'),
			Input::get('taxpercent'),
			Input::get('workingorder_employee'),
			Input::get('workingorder_date_ship'),
			Input::get('workingorder_note'),
			Input::get('workingorder_description')
		);
		
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('WorkingOrderIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	} 

	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$workingorder = WorkingOrder::getEntries($id);

			$productsperworkingorder = WorkingOrdersServices::getWorkingOrderByCustomer($workingorder['entry']->id);

			$employeeinfo = User::getEntries($workingorder['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperworkingorder['workingorderbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$workingordersData[] = array('workingorder' => $workingorder, 'employeeinfo' => $employeeinfo['entry'], 'productsperworkingorder' => $productsperworkingorder['workingorderbycustomer'], 'totalprice' => $totalprice);
			

			
			if ($workingorder['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'ponuda_obrazac_' . $workingorder['entry']->workingorder_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/workingorders/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.workingorder.workingorderspdf', array('workingordersdata' => $workingordersData, 'productsperworkingorder' => $productsperworkingorder, 'currdate' => $currdate))->save( $pdfreportfullpath );
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

			$workingorder = WorkingOrder::getEntries($id);

			$productsperworkingorder = WorkingOrdersServices::getWorkingOrderByCustomer($workingorder['entry']->id);

			$employeeinfo = User::getEntries($workingorder['entry']->employee_id);

			$totalprice = 0;
goDie($workingorder);
			foreach($productsperworkingorder['workingorderbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$workingordersData[] = array('workingorder' => $workingorder, 'employeeinfo' => $employeeinfo['entry'], 'productsperworkingorder' => $productsperworkingorder['workingorderbycustomer'], 'totalprice' => $totalprice);
			

			
			if ($workingorder['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'radni_nalog_' . $workingorder['entry']->workingorder_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/workingorders/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.workingorder.workingorderspdf', array('workingordersdata' => $workingordersData, 'productsperworkingorder' => $productsperworkingorder, 'currdate' => $currdate));


			Mail::send('backend.email.workingordermail', array( 'comment' => Input::get('workingorder_comment'), 'first_name' => $workingorder['entry']->first_name, 'last_name' => $workingorder['entry']->last_name, 'number' => $workingorder['entry']->workingorder_number), function($message) use($pdf, $workingorder, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($workingorder['entry']->email)->subject('Radni nalog ' . $workingorder['entry']->workingorder_number);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('WorkingOrderIndex')->with('success_message', Lang::get('core.msg_success_entry_edited'));

		}

		catch (Exception $exp)
		{
			return Redirect::route('WorkingOrderIndex')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		}
	  
	}


	/**
	 * Remove the specified workingorder post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 

		if ($id == null)
		{
			return Redirect::route('WorkingOrderIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = WorkingOrder::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('WorkingOrderIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('WorkingOrderIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('WorkingOrderIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}

