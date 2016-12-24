<?php

/*
*	NarudzbeniceController
*
*	Handles backend functions
*/

class NarudzbeniceController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new NarudzbeniceRepository;
	}
	/**
	 * Display a listing of the narudzbenica.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Narudzbenice::with('client')->paginate(10);

		$this->layout->title = 'Narudžbenice | BillingCRM';

		$this->layout->content = View::make('backend.narudzbenice.index', compact('entries'));
	}


	/**
	 * Show the form for creating a new narudzbenica.
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

		$newnarudzbenicanumber = 0;

		if(DB::table('narudzbenice')->count() > 0){
			$lastnarudzbenicanumber = Narudzbenice::orderBy('id', 'desc')->first()->id;
			$newnarudzbenicanumber = $lastnarudzbenicanumber + 1;
		} 

		$this->layout->title = 'Unos nove narudžbenice | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.narudzbenice.create', compact('clientlist', 'productlist', 'newnarudzbenicanumber'));
	}


	/**
	 * Store a newly created narudzbenica in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$narudzbenica = Request::all();

		$entryValidator = Validator::make(Input::all(), Narudzbenice::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('narudzbenica_number', 'tax', 'hide_amount', 'client_id', 'client_address', 'client_oib', 'payment_way', 'narudzbenica_start', 'narudzbenica_end', 'narudzbenica_note', 'narudzbenica_language', 'valute'));
		}

		$narudzbenica['employee_id'] = Auth::id();

		Narudzbenice::create($narudzbenica);

	 	$narudzbenica_id = Narudzbenice::orderBy('id', 'desc')->first()->id;
	 	$product = $narudzbenica['product'];
	 
		$i = 0;
		$ilen = count($product); 

		if ($product != null)
		{
			foreach ($product as $key=>$value)
			{
				if(++$i == $ilen) break;
		
				$product_narudzbenica['product_id'] = $value;
				$product_narudzbenica['narudzbenica_id'] = $narudzbenica_id;
			   	$product_narudzbenica['measurement'] = $narudzbenica['measurement'][$key];
				$product_narudzbenica['amount'] = $narudzbenica['amount'][$key];
				$product_narudzbenica['price'] = $narudzbenica['price'][$key];
				$product_narudzbenica['discount'] = $narudzbenica['discount'][$key];
				$product_narudzbenica['taxpercent'] = $narudzbenica['taxpercent'][$key];
				NarudzbeniceProducts::create($product_narudzbenica);

			}
		}

		return Redirect::route('NarudzbeniceIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));

	}


	/**
	 * Display the specified narudzbenica.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$this->layout->title = 'Narudžbenice | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.narudzbenice.view');
	}


	/**
	 * Show the form for editing the specified narudzbenica post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$narudzbenica = Narudzbenice::find($id);

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

		$narudzbenicacustomer = NarudzbeniceProducts::with(['products'])->where('narudzbenica_id', $id)->get();

		$this->layout->title = 'Uređivanje narudžbenice | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'
		);

		$this->layout->content = View::make('backend.narudzbenice.edit', compact('clientlist', 'productlist', 'narudzbenica', 'narudzbenicacustomer'));

	}


	/**
	 * Update the specified narudzbenica post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$narudzbenica = Request::all();

		$entryValidator = Validator::make(Input::all(), Narudzbenice::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$data = Narudzbenice::find($id);

		$data->update($narudzbenica);

	 	$narudzbenica_id = Narudzbenice::find($id)->id;

	 	$product = $narudzbenica['product'];
	 
		$i = 0;
		$ilen = count($product); 

		if ($product != null)
		{
			NarudzbeniceProducts::where('narudzbenica_id', $narudzbenica_id)->delete();
			foreach ($product as $key=>$value)
			{
				if(++$i == $ilen) break;
		
				$product_narudzbenica['product_id'] = $value;
				$product_narudzbenica['narudzbenica_id'] = $narudzbenica_id;
			   	$product_narudzbenica['measurement'] = $narudzbenica['measurement'][$key];
				$product_narudzbenica['amount'] = $narudzbenica['amount'][$key];
				$product_narudzbenica['price'] = $narudzbenica['price'][$key];
				$product_narudzbenica['discount'] = $narudzbenica['discount'][$key];
				$product_narudzbenica['taxpercent'] = $narudzbenica['taxpercent'][$key];
				NarudzbeniceProducts::create($product_narudzbenica);

			}
		}

		return Redirect::route('NarudzbeniceIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));

	}

	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$narudzbenice = Narudzbenice::with('client')->where('id', $id)->first();

			$productspernarudzbenice = NarudzbeniceProducts::with(['products'])->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($narudzbenice->employee_id);

			$totalprice = 0;

			foreach($productspernarudzbenice as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$narudzbeniceData[] = compact('narudzbenice', 'employeeinfo', 'productspernarudzbenice', 'totalprice');


			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'narudzbenica_obrazac_' . $narudzbenice->narudzbenica_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/narudzbenice/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.narudzbenice.narudzbenicepdf', compact('narudzbeniceData', 'productspernarudzbenice', 'currdate'))->save( $pdfreportfullpath );
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

			$narudzbenice = Narudzbenice::with('client')->where('id', $id)->first();

			$productspernarudzbenice = NarudzbeniceProducts::with(['products'])->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($narudzbenice->employee_id);

			$totalprice = 0;

			foreach($productspernarudzbenice as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$narudzbeniceData[] = compact('narudzbenice', 'employeeinfo', 'productspernarudzbenice', 'totalprice');


			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'narudzbenica_obrazac_' . $narudzbenice->narudzbenica_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/narudzbenice/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.narudzbenice.narudzbenicepdf', array('narudzbenicedata' => $narudzbeniceData, 'productspernarudzbenice' => $productspernarudzbenice, 'currdate' => $currdate));


			Mail::send('backend.email.narudzbenicamail', array( 'comment' => Input::get('narudzbenice_comment'), 'first_name' => $narudzbenice['entry']->first_name, 'last_name' => $narudzbenice['entry']->last_name, 'number' => $narudzbenice['entry']->narudzbenica_number), function($message) use($pdf, $narudzbenice, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($narudzbenice['entry']->email)->subject('Narudžbenica ' . $narudzbenice['entry']->narudzbenica_number);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('NarudzbeniceIndex')->with('success_message', Lang::get('core.msg_success_entry_edited'));

		}

		catch (Exception $exp)
		{
			return Redirect::route('NarudzbeniceIndex')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		}
	  
	}


	/**
	 * Remove the specified narudzbenica post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		if ($id == null)
		{
			return Redirect::route('NarudzbeniceIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Narudzbenice::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('NarudzbeniceIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('NarudzbeniceIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('NarudzbeniceIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}

