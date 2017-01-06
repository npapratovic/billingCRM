<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index() {

		//Check if company data is populated:

		$company = Company::where('user_id', Auth::user()->id)->first(); 
   
       	if(!empty($company)) {

      		$companynotice = false; 
 
      	} else {

      		$companynotice = true;
 
      	}

		// Get last 10 of each data 

		$productsentries = ProductService::where('type','product')->get()->take(10); 
		$productscount = ProductService::count();
 
		$invoicesentries = Invoice::get()->take(10); 
		$invoicescount = Invoice::count();
		
		$ordersentries = Order::get()->take(10);
		$orderscount = Order::count();

		$offersentries = Offer::get()->take(10);
		$offerscount = Offer::count();	

		$dispatchentries = Dispatch::get()->take(10);
		$dispatchcount = Dispatch::count();	

		$workingorderentries = WorkingOrder::get()->take(10);
		$workingordercount = WorkingOrder::count();	
 	  
		$narudzbeniceentries = Narudzbenice::get()->take(10);
		$narudzbenicecount = Narudzbenice::count();	

		$cliententries = User::where('user_group','customer')->get()->take(10);
		$clientcount = User::where('user_group','customer')->count();	

		$this->layout->title = 'Admin';

		$this->layout->css_files = array(
			'css/backend/animate.css',
		);

		$this->layout->js_footer_files = array( 
			'js/backend/wow.min.js'
		); 

		$this->layout->content = View::make('backend.dashboard', compact('companynotice','productsentries', 'productscount', 'invoicesentries', 'invoicescount', 'ordersentries', 'orderscount', 'offersentries', 'offerscount', 'dispatchentries', 'dispatchcount', 'workingorderentries', 'workingordercount', 'narudzbeniceentries', 'narudzbenicecount', 'cliententries',  'clientcount'));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
