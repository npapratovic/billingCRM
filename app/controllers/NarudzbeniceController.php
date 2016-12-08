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
		// Get data

		$entries = Narudzbenice::getEntries(null, null);

		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Narudžbenice | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.narudzbenice.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new narudzbenica.
	 *
	 * @return Response
	 */
	public function create()
	{
		
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

	 	$products = ProductService::getEntriesProducts(null, null);
	 	
	 	if ($products['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title;
		}

		$entries = Narudzbenice::getEntries(null, null);

		$lastnarudzbenicanumber = Narudzbenice::getLastNarudzbenica();
		$newnarudzbenicanumber = 0;
		if(DB::table('narudzbenice')->count() > 0){
			$newnarudzbenicanumber = $lastnarudzbenicanumber['entry']->narudzbenica_number + 1;
		} 

		$this->layout->title = 'Unos nove narudžbenice | BillingCRM';

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

		$this->layout->content = View::make('backend.narudzbenice.create', array('postRoute' => 'NarudzbeniceStore', 'entries' => $entries, 'clientlist' => $clientlist, 'productlist' => $productlist, 'newnarudzbenicanumber' => $newnarudzbenicanumber));
	}


	/**
	 * Store a newly created narudzbenica in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::except('product', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));

		$entryValidator = Validator::make(Input::all(), Narudzbenice::$store_rules);
		//goDie(Input::all());
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('narudzbenica_number', 'tax', 'hide_amount', 'client_id', 'client_address', 'client_oib', 'payment_way', 'narudzbenica_start', 'narudzbenica_end', 'narudzbenica_note', 'narudzbenica_language', 'valute'));
		}

		$store = $this->repo->store(
			Input::get('narudzbenica_number'),
			Input::get('tax'),
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
			Input::get('payment_way'),
			Input::get('narudzbenica_start'),
			Input::get('narudzbenica_end'),
			Input::get('narudzbenica_note'),
			Input::get('narudzbenica_language'),
			Input::get('valute')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('NarudzbeniceIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
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
	
		// Get data

		$entry = Narudzbenice::getEntries($id, null);

		$entries = Narudzbenice::getEntries(null, null);

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

	 	$products = ProductService::getEntriesProducts(null, null);
	 	
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

		$narudzbenicacustomer = NarudzbeniceProducts::getNarudzbeniceByCustomer($id);

		$this->layout->title = 'Uređivanje narudžbenice | BillingCRM';

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

		$this->layout->content = View::make('backend.narudzbenice.edit', array('entry' => $entry['entry'], 'postRoute' => 'NarudzbeniceUpdate', 'entries' => $entries, 'clientlist' => $clientlist, 'productlist' => $productlist, 'narudzbenicacustomer' => $narudzbenicacustomer['narudzbenicabycustomer']));
	}


	/**
	 * Update the specified narudzbenica post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
//goDie(Input::all());
		Input::merge(array_map('trim', Input::except('product', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));

		$entryValidator = Validator::make(Input::all(), Narudzbenice::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
		    Input::get('id'),
			Input::get('narudzbenica_number'),
			Input::get('tax'),
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
			Input::get('payment_way'),
			Input::get('narudzbenica_start'),
			Input::get('narudzbenica_end'),
			Input::get('narudzbenica_note'),
			Input::get('narudzbenica_language'),
			Input::get('valute')
		);
		//goDie($update);
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('NarudzbeniceIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}

	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$narudzbenice = Narudzbenice::getEntries($id);

			$productspernarudzbenice = NarudzbeniceProducts::getNarudzbeniceByCustomer($narudzbenice['entry']->id);

			$employeeinfo = User::getEntries($narudzbenice['entry']->employee_id);

			$totalprice = 0;

			foreach($productspernarudzbenice['narudzbenicabycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$narudzbeniceData[] = array('narudzbenice' => $narudzbenice, 'employeeinfo' => $employeeinfo['entry'], 'productspernarudzbenice' => $productspernarudzbenice['narudzbenicabycustomer'], 'totalprice' => $totalprice);
			

			
			if ($narudzbenice['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'narudzbenica_obrazac_' . $narudzbenice['entry']->narudzbenica_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/narudzbenice/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.narudzbenice.narudzbenicepdf', array('narudzbenicedata' => $narudzbeniceData, 'productspernarudzbenice' => $productspernarudzbenice, 'currdate' => $currdate))->save( $pdfreportfullpath );
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
			$narudzbenice = Narudzbenice::getEntries($id);

			$productspernarudzbenice = NarudzbeniceProducts::getNarudzbeniceByCustomer($narudzbenice['entry']->id);

			$employeeinfo = User::getEntries($narudzbenice['entry']->employee_id);

			$totalprice = 0;

			foreach($productspernarudzbenice['narudzbenicabycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$narudzbeniceData[] = array('narudzbenice' => $narudzbenice, 'employeeinfo' => $employeeinfo['entry'], 'productspernarudzbenice' => $productspernarudzbenice['narudzbenicabycustomer'], 'totalprice' => $totalprice);
			

			
			if ($narudzbenice['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'narudzbenica_' . $narudzbenice['entry']->narudzbenica_number . '-' . $datetitle;

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

