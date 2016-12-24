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

		$entries = Offer::with(['client', 'offersProducts'])->paginate(10);


		foreach($entries as $entry){
			$product_price = 0;

			foreach ($entry['offersProducts'] as $product) {
				$product_price += ($product->price * ( 1 - ($product->discount / 100)) * $product->amount) * ( 1 + ($product->taxpercent / 100));

			}

			$entry['offersProducts']['totalprice'] = $product_price;
			
		}
		



		$this->layout->title = 'Ponude | BillingCRM';

		$this->layout->content = View::make('backend.offer.index', compact('entries'));
	}


	/**
	 * Show the form for creating a new offer.
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

		$entries = Offer::with(['client'])->get();

 		$lastoffernumber = Offer::orderBy('created_at', 'desc')->first();
 		$newoffernumber = 0;

 		if(DB::table('offers')->count() > 0){
 			$newoffernumber = $lastoffernumber->offer_number + 1;
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



		$this->layout->content = View::make('backend.offer.create', compact('entries', 'clientlist', 'productlist', 'newoffernumber'));
	}


	/**
	 * Store a newly created offer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	

        $offer = Request::all();

		$entryValidator = Validator::make(Input::all(), Offer::$store_rules);
		
		if ($entryValidator->fails())
		{

			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput(Input::only('offer_number', 'tax', 'hide_amount', 'client_id', 'client_address', 'client_oib', 'payment_way', 'offer_start', 'offer_end', 'offer_note', 'offer_language', 'valute'));
		}


        Offer::create($offer);

        $offer_id = Offer::orderBy('id', 'desc')->first()->id;
        $product = $offer['product'];

        $i = 0;
        $ilen = count($product); 

        if ($product != null)
        {
            foreach ($product as $key=>$value)
            {
                if(++$i == $ilen) break;
        
                $product_offer['product_id'] = $value;
                $product_offer['offer_id'] = $offer_id;
                $product_offer['measurement'] = $offer['measurement'][$key];
                $product_offer['amount'] = $offer['amount'][$key];
                $product_offer['price'] = $offer['price'][$key];
                $product_offer['discount'] = $offer['discount'][$key];
                $product_offer['taxpercent'] = $offer['taxpercent'][$key];
                OffersProducts::create($product_offer);

            }
        }

        return Redirect::route('admin.offers.index')->with('success_message', Lang::get('core.msg_success_entry_added'));
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


		$entry = Offer::with(['client'])->find($id);

		$entries = Offer::with(['client'])->get();

		$clientlist = array();

	 	$clients = User::where('user_group', '=', 'client')->get();
	
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


		$offercustomer = OffersProducts::with('productServices')->where('offer_id', $id)->get();

		
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


		$this->layout->content = View::make('backend.offer.edit', compact('entry', 'entries', 'clientlist', 'productlist', 'offercustomer','offercustomer'));
	}


	/**
	 * Update the specified offer post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$offer = Request::all(); 

		$entryValidator = Validator::make(Input::all(), Offer::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$data = Offer::find($id);
		$data->update($offer);

        $product = $offer['product'];

        $i = 0;
        $ilen = count($product); 

        if ($product != null)
        {
            OffersProducts::where('offer_id', $id)->delete();
            foreach ($product as $key=>$value)
            {
                if(++$i == $ilen) break;
        
                $product_offer['product_id'] = $value;
                $product_offer['offer_id'] = $id;
                $product_offer['measurement'] = $offer['measurement'][$key];
                $product_offer['amount'] = $offer['amount'][$key];
                $product_offer['price'] = $offer['price'][$key];
                $product_offer['discount'] = $offer['discount'][$key];
                $product_offer['taxpercent'] = $offer['taxpercent'][$key];
                OffersProducts::create($product_offer);

            }
        }
        
        return Redirect::route('admin.offers.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));

	
	}

	public function createPdf($id)
	{
		//check report id
		if (isset($id))
		{

			$offer = Offer::with(['client'])->find($id);

			$productsperoffer = OffersProducts::with('productServices')->where('offer_id', $offer->id)->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($offer['client'][0]->id);

			$totalprice = 0;

			foreach($productsperoffer as $singleproduct){
                
				$totalprice += ($singleproduct->price * ( 1 - ($singleproduct->discount / 100)) * $singleproduct->amount) * ( 1 + ($singleproduct->taxpercent / 100));

			}


			$offersdata[] = compact('offer', 'employeeinfo', 'productsperinvoice', 'totalprice');
			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'ponuda_obrazac_' . $offer->offer_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/offers/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.offer.offerspdf',compact('offersdata', 'productsperoffer', 'currdate'))->save( $pdfreportfullpath );
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
			$offer = Offer::with(['client'])->find($id);

			$productsperoffer = OffersProducts::with('productServices')->where('offer_id', $offer->id)->get();

			$employeeinfo = User::with(['userCity', 'userRegion'])->find($offer['client'][0]->id);

			$totalprice = 0;

			foreach($productsperoffer as $singleproduct){

				$totalprice += $singleproduct->price * $singleproduct->amount;
			}

			$offersData[] = compact('offer', 'employeeinfo', 'productsperinvoice', 'totalprice');
			
			$datetitle = date('d-m-Y');

			$currdate = date('d. m. Y');

			$pdfname = 'ponuda_' . $offer->offer_number . '-' . $datetitle;

			$pdfreportfullpath = public_path() . "/uploads/backend/offers/" . $pdfname . '.pdf';

			//call createPdf method to create pdf


			$pdf = PDF::loadView('backend.offer.offerspdf', compact('offersdata', 'productsperoffer', 'currdate'));


			Mail::send('backend.email.offermail', array( 'comment' => Input::get('offer_comment'), 'first_name' => $offer->first_name, 'last_name' => $offer->last_name, 'number' => $offer->offer_number), function($message) use($pdf, $offer, $pdfname)
			{
			    $message->from('info@crm.go.hr', 'info@crm.go.hr');

			    $message->to($offer->email)->subject('Ponuda ' . $offer->offer_number);

			    $message->attachData($pdf->output(), $pdfname . '.pdf');
			});
			//goDie($pdf);

			return Redirect::route('admin.offers.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));

		}

		catch (Exception $exp)
		{
			return Redirect::route('admin.offers.index')->with('error_message', Lang::get('messages.msg_error_getting_entry'));
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
		
		Offer::find($id)->delete();
        return Redirect::route('admin.offers.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
	}


}

