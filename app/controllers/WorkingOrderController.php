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
		 
		$entries = WorkingOrder::with('client')->paginate(10);

		$this->layout->title = 'Radni nalozi | BillingCRM';
		
		$this->layout->content = View::make('backend.workingorder.index', compact('entries'));
	}


	/**
	 * Show the form for creating a new workingorder.
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

		$servicelist = array();

	 	$services = ProductService::where('type', 'service')->get();

		foreach ($services as $service)
		{
			$servicelist[$service->id] = $service->title;
		}

		$newworkingordernumber = 0;

		if(DB::table('workingorders')->count() > 0){
			$lastworkingordernumber = WorkingOrder::orderBy('id', 'desc')->first()->id;
			$newworkingordernumber = $lastworkingordernumber + 1;
		} 

		$this->layout->title = 'Unos novog radnog naloga | BillingCRM';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.workingorder.create', compact('clientlist', 'servicelist', 'servicelist', 'newworkingordernumber'));
	}


	/**
	 * Store a newly created workingorder in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$workingorder = Request::all();
     
		$entryValidator = Validator::make(Input::all(), WorkingOrder::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('workingorder_number', 'taxable', 'hide_amount', 'client_id', 'client_address', 'client_oib', 'workingorder_employee', 'workingorder_date_ship', 'workingorder_date_ship', 'workingorder_note', 'workingorder_description'));
		}

		$workingorder['employee_id'] = Auth::id();

		WorkingOrder::create($workingorder);

	 	$workingorder_id = WorkingOrder::orderBy('id', 'desc')->first()->id;
	 	$service = $workingorder['service'];
	 
		$i = 0;
		$ilen = count($service); 

		if ($service != null)
		{
			foreach ($service as $key=>$value)
			{
				if(++$i == $ilen) break;
		
				$service_workingorder['service_id'] = $value;
				$service_workingorder['workingorder_id'] = $workingorder_id;
			   	$service_workingorder['measurement'] = $workingorder['measurement'][$key];
				$service_workingorder['amount'] = $workingorder['amount'][$key];
				$service_workingorder['price'] = $workingorder['price'][$key];
				$service_workingorder['discount'] = $workingorder['discount'][$key];
				$service_workingorder['taxpercent'] = $workingorder['taxpercent'][$key];
				WorkingOrdersServices::create($service_workingorder);

			}
		}

		return Redirect::route('WorkingOrderIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));

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

		$workingorder = WorkingOrder::find($id);

		$workingorderservices = WorkingOrdersServices::with(['services'])->where('workingorder_id', $id)->get();

		$clientlist = array();

	 	$clients = User::where('user_group', 'client')->get();

		foreach ($clients as $client)
		{
			$clientlist[$client->id] = $client->first_name . ' ' . $client->last_name;
		}

		$servicelist = array();

	 	$services = ProductService::where('type', 'service')->get();

		foreach ($services as $service)
		{
			$servicelist[$service->id] = $service->title;
		}

		$this->layout->title = 'Uređivanje radnog naloga | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.workingorder.edit', compact('clientlist', 'servicelist', 'workingorder', 'workingorderservices'));

	}


	/**
	 * Update the specified workingorder post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$workingorder = Request::all();
     
		$entryValidator = Validator::make(Input::all(), WorkingOrder::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$data = WorkingOrder::find($id);

		$data->update($workingorder);

	 	$workingorder_id = WorkingOrder::find($id)->id;

	 	$service = $workingorder['service'];
	 
		$i = 0;
		$ilen = count($service); 

		if ($service != null)
		{
			WorkingOrdersServices::where('workingorder_id', $workingorder_id)->delete();
			foreach ($service as $key=>$value)
			{
				if(++$i == $ilen) break;
		
				$service_workingorder['service_id'] = $value;
				$service_workingorder['workingorder_id'] = $workingorder_id;
			   	$service_workingorder['measurement'] = $workingorder['measurement'][$key];
				$service_workingorder['amount'] = $workingorder['amount'][$key];
				$service_workingorder['price'] = $workingorder['price'][$key];
				$service_workingorder['discount'] = $workingorder['discount'][$key];
				$service_workingorder['taxpercent'] = $workingorder['taxpercent'][$key];
				WorkingOrdersServices::create($service_workingorder);

			}
		}

		return Redirect::route('WorkingOrderIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
	} 

	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$workingorder = WorkingOrder::with('client')->where('id', $id)->first();

			$productsperworkingorder = WorkingOrdersServices::with(['services'])->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($workingorder->employee_id);

			$totalprice = 0;

			foreach($productsperworkingorder as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$workingordersData[] = compact('workingorder', 'employeeinfo', 'productsperworkingorder', 'totalprice');

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'ponuda_obrazac_' . $workingorder->workingorder_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/workingorders/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.workingorder.workingorderspdf', compact('workingordersData', 'productsperworkingorder', 'currdate'))->save( $pdfreportfullpath );
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
			$workingorder = WorkingOrder::with('client')->where('id', $id)->first();

			$productsperworkingorder = WorkingOrdersServices::with(['services'])->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($workingorder->employee_id);

			$totalprice = 0;

			foreach($productsperworkingorder as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$workingordersData[] = compact('workingorder', 'employeeinfo', 'productsperworkingorder', 'totalprice');

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'ponuda_obrazac_' . $workingorder->workingorder_number . '-' . $datetitle;

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

