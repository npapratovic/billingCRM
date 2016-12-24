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

		$entries = Dispatch::with('client')->paginate(10);

		$this->layout->title = 'Korisnici | BillingCRM';
		
		$this->layout->content = View::make('backend.dispatch.index', compact('entries'));
	}


	/**
	 * Show the form for creating a new dispatch.
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

		/*$lastdispatchnumber = Dispatch::orderBy('id', 'desc')->first()->id;

		$newdispatchnumber = 0;

		if(DB::table('narudzbenice')->count() > 0){
			$newdispatchnumber = $lastdispatchnumber + 1;
		} */

		$this->layout->title = 'Unos nove otpremnice | BillingCRM';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.dispatch.create', compact('clientlist', 'productlist', 'newdispatchnumber'));
	}


	/**
	 * Store a newly created dispatch in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$dispatch = Request::all();
     
		$entryValidator = Validator::make(Input::all(), Dispatch::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('dispatch_number', 'taxable', 'hide_amount', 'client_id', 'client_address', 'client_oib', 'stock_label', 'dispatch_employee', 'dispatch_date_ship', 'dispatch_note', 'dispatch_language', 'valute'));
		}

		$dispatch['employee_id'] = Auth::id();

		Dispatch::create($dispatch);
		
	 	$dispatch_id = Dispatch::orderBy('id', 'desc')->first()->id;
	 	$product = $dispatch['product'];
	 
		$i = 0;
		$ilen = count($product); 

		if ($product != null)
		{
			foreach ($product as $key=>$value)
			{
				if(++$i == $ilen) break;
		
				$product_dispatch['product_id'] = $value;
				$product_dispatch['dispatch_id'] = $dispatch_id;
			   	$product_dispatch['measurement'] = $dispatch['measurement'][$key];
				$product_dispatch['amount'] = $dispatch['amount'][$key];
				$product_dispatch['price'] = $dispatch['price'][$key];
				$product_dispatch['discount'] = $dispatch['discount'][$key];
				$product_dispatch['taxpercent'] = $dispatch['taxpercent'][$key];
				DispatchesProducts::create($product_dispatch);

			}
		}


		return Redirect::route('DispatchIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
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

		$dispatch = Dispatch::find($id);

        		$dispatchproducts = DispatchesProducts::with(['products'])->where('dispatch_id', $id)->get();

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

		$postRoute = 'DispatchUpdate';

		$this->layout->title = 'Uređivanje otpremnice | BillingCRM';

		$this->layout->css_files = array(
		
		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.dispatch.edit', compact('postRoute', 'clientlist', 'productlist', 'dispatch', 'dispatchproducts'));
	}


	/**
	 * Update the specified dispatch post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$dispatch = Request::all();
      
		$entryValidator = Validator::make(Input::all(), Dispatch::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$data = Dispatch::find($id);

		$data->update($dispatch);

	 	$dispatch_id = Dispatch::find($id)->id;

	 	$product = $dispatch['product'];
	 
		$i = 0;
		$ilen = count($product); 

		if ($product != null)
		{
			DispatchesProducts::where('dispatch_id', $dispatch_id)->delete();
			foreach ($product as $key=>$value)
			{
				if(++$i == $ilen) break;
		
				$product_dispatch['product_id'] = $value;
				$product_dispatch['dispatch_id'] = $dispatch_id;
			   	$product_dispatch['measurement'] = $dispatch['measurement'][$key];
				$product_dispatch['amount'] = $dispatch['amount'][$key];
				$product_dispatch['price'] = $dispatch['price'][$key];
				$product_dispatch['discount'] = $dispatch['discount'][$key];
				$product_dispatch['taxpercent'] = $dispatch['taxpercent'][$key];
				DispatchesProducts::create($product_dispatch);

			}
		}

		return Redirect::route('DispatchIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
	}

	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$dispatch = Dispatch::with('client')->where('id', $id)->first();

			$productsperdispatch = DispatchesProducts::with(['products'])->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($dispatch->employee_id);

			$totalprice = 0;

			foreach($productsperdispatch as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$dispatchesData[] = compact('dispatch', 'employeeinfo', 'productsperdispatch', 'totalprice');

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'otpremnica_obrazac_' . $dispatch->dispatch_number . '-' . $datetitle;

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

