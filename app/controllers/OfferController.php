<?php

/*
*	OfferController
*
*	Handles backend functions
*/

class OfferController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new OfferRepository;
	}
	/**
	 * Display a listing of the offer.
	 *
	 * @return Response
	 */
	public function index()
	{
	
		// Get data

		$entries = Offer::getEntries(null, null);

		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Ponude | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.offer.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new offer.
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

	 	$products = ProductService::getEntries(null, null);

	 	if ($products['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title;
		}

		$entries = Offer::getEntries(null, null);

 		$lastoffernumber = Offer::getLastOffer();
 		$newoffernumber = 0;
 		if(DB::table('offers')->count() > 0){
 			$newoffernumber = $lastoffernumber['entry']->offer_number + 1;
 		} else {
 			$newoffernumber = 0;
 		}

		$this->layout->title = 'Unos nove ponude | BillingCRM';

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

		$this->layout->content = View::make('backend.offer.create', array('postRoute' => 'OfferStore', 'entries' => $entries, 'clientlist' => $clientlist, 'productlist' => $productlist, 'newoffernumber' => $newoffernumber));
	}


	/**
	 * Store a newly created offer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		Input::merge(array_map('trim', Input::except('product', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));

		$entryValidator = Validator::make(Input::all(), Offer::$store_rules);
		
		if ($entryValidator->fails())
		{

			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('offer_number', 'tax', 'hide_amount', 'client_id', 'client_address', 'client_oib', 'payment_way', 'offer_start', 'offer_end', 'offer_note', 'offer_language', 'valute'));
		}

		$store = $this->repo->store(
			Input::get('offer_number'),
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
			Input::get('offer_start'),
			Input::get('offer_end'),
			Input::get('offer_note'),
			Input::get('offer_language'),
			Input::get('valute')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('OfferIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified offer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->layout->title = 'Ponude | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.offer.view');
	}


	/**
	 * Show the form for editing the specified offer post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		// Get data

		$entry = Offer::getEntries($id, null);

		$entries = Offer::getEntries(null, null);

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

		$offercustomer = OffersProducts::getOfferByCustomer($id);
//goDie($offercustomer['offerbycustomer']);
		$this->layout->title = 'Uređivanje ponude | BillingCRM';

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

		$this->layout->content = View::make('backend.offer.edit', array('entry' => $entry['entry'], 'postRoute' => 'OfferUpdate', 'entries' => $entries, 'clientlist' => $clientlist, 'productlist' => $productlist, 'offercustomer' => $offercustomer['offerbycustomer']));
	}


	/**
	 * Update the specified offer post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
//goDie(Input::all());
		Input::merge(array_map('trim', Input::except('product', 'measurement', 'amount', 'price', 'discount', 'taxpercent')));

		$entryValidator = Validator::make(Input::all(), Offer::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
		    Input::get('id'),
			Input::get('offer_number'),
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
			Input::get('offer_start'),
			Input::get('offer_end'),
			Input::get('offer_note'),
			Input::get('offer_language'),
			Input::get('valute')
		);
		//goDie($update);
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('OfferIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}

	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$offer = Offer::getEntries($id);

			$productsperoffer = OffersProducts::getOfferByCustomer($offer['entry']->id);

			$employeeinfo = User::getEntries($offer['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperoffer['offerbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$offersData[] = array('offer' => $offer, 'employeeinfo' => $employeeinfo['entry'], 'productsperoffer' => $productsperoffer['offerbycustomer'], 'totalprice' => $totalprice);
			

			
			if ($offer['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'ponuda_obrazac_' . $offer['entry']->offer_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/offers/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.offer.offerspdf', array('offersdata' => $offersData, 'productsperoffer' => $productsperoffer, 'currdate' => $currdate))->save( $pdfreportfullpath );
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
			$offer = Offer::getEntries($id);

			$productsperoffer = OffersProducts::getOfferByCustomer($offer['entry']->id);

			$employeeinfo = User::getEntries($offer['entry']->employee_id);

			$totalprice = 0;

			foreach($productsperoffer['offerbycustomer'] as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}


			$offersData[] = array('offer' => $offer, 'employeeinfo' => $employeeinfo['entry'], 'productsperoffer' => $productsperoffer['offerbycustomer'], 'totalprice' => $totalprice);
			

			
			if ($offer['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_getting_entry'));
			}

			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'ponuda_' . $offer['entry']->offer_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/offers/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.offer.offerspdf', array('offersdata' => $offersData, 'productsperoffer' => $productsperoffer, 'currdate' => $currdate));


			Mail::send('backend.email.offermail', array( 'comment' => Input::get('offer_comment'), 'first_name' => $offer['entry']->first_name, 'last_name' => $offer['entry']->last_name, 'number' => $offer['entry']->offer_number), function($message) use($pdf, $offer, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($offer['entry']->email)->subject('Ponuda ' . $offer['entry']->offer_number);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('OfferIndex')->with('success_message', Lang::get('core.msg_success_entry_edited'));

		}

		catch (Exception $exp)
		{
			return Redirect::route('OfferIndex')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
		}
	  
	}


	/**
	 * Remove the specified offer post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		if ($id == null)
		{
			return Redirect::route('OfferIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Offer::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('OfferIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('OfferIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('OfferIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}

