<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index() {
	
		// Get last 10 of each data

		$productsentries = ProductService::getEntriesProducts(null, null);
		$productscount = ProductService::countProducts();

		$invoicesentries = Invoice::getEntries(null, null); 
		$invoicescount = Invoice::countInvoices();
		
		$ordersentries = Order::getEntries(null);
		$orderscount = Order::countOrders();

		$offersentries = Offer::getEntries(null, null);
		$offerscount = Offer::countOffers();	

		$dispatchentries = Dispatch::getEntries(null, null);
		$dispatchcount = Dispatch::countDispatches();	

		$workingorderentries = WorkingOrder::getEntries(null, null);
		$workingordercount = WorkingOrder::countWorkingOrders();	
 	  
		$narudzbeniceentries = Narudzbenice::getEntries(null, null);
		$narudzbenicecount = Narudzbenice::countNarudzbenice();	

		$cliententries = User::getEntries(null, null);
		$clientcount = User::countUsers('client');	

		$this->layout->title = 'Admin';

		$this->layout->css_files = array(
			'css/backend/animate.css',
		);

		$this->layout->js_footer_files = array( 
			'js/backend/wow.min.js'
		);

		$this->layout->content = View::make('backend.dashboard', array('productsentries' => $productsentries['entries'], 'productscount' => $productscount['number'], 'invoicesentries' => $invoicesentries['entries'], 'invoicescount' => $invoicescount['number'], 'ordersentries' => $ordersentries['entries'], 'orderscount' => $orderscount['number'], 'offersentries' => $offersentries['entries'], 'offerscount' => $offerscount['number'], 'dispatchentries' => $dispatchentries['entries'], 'dispatchcount' => $dispatchcount['number'], 'workingorderentries' => $workingorderentries['entries'], 'workingordercount' => $workingordercount['number'], 'narudzbeniceentries' => $narudzbeniceentries['entries'], 'narudzbenicecount' => $narudzbenicecount['number'], 'cliententries' => $cliententries['entries'],  'clientcount' => $clientcount['number']));
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
