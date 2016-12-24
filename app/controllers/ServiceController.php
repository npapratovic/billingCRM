<?php

/*
*	ServiceController
*
*	Handles backend functions
*/

class ServiceController extends \BaseController {

	public function index()
	{
		 
		// Get data
		$entries = ProductService::where('type', 'service')->paginate(10);

		$this->layout->title = 'Usluge | BillingCRM';

		$this->layout->content = View::make('backend.service.index', compact('entries'));
	}


	/**
	 * Show the form for creating a new service.
	 *
	 * @return Response
	 */
	public function create()
	{
		 

		$entries = ProductService::where('type', 'service')->paginate(5);

		$this->layout->title = 'Unos nove usluge | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->content = View::make('backend.service.create', compact('entries'));
	}


	/**
	 * Store a newly created service in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$service = Request::all();

		$entryValidator = Validator::make(Input::all(), ProductService::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$service['type'] = 'service';


		ProductService::create($service); 

		return Redirect::route('admin.services.index')->with('success_message', Lang::get('core.msg_success_entry_added'));
		
	}


	/**
	 * Display the specified service.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{ 
    	//
	}


	/**
	 * Show the form for editing the specified service post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 

		// Get data
		$entries = ProductService::where('type', 'service')->paginate(5);

		$service = ProductService::find($id);



		
		$this->layout->title = 'Uređivanje usluge | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/datatables.js'
		);

		$this->layout->content = View::make('backend.service.edit', compact('service', 'entries'));
	}


	/**
	 * Update the specified service post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$service = Request::all(); 

		$entryValidator = Validator::make(Input::all(), ProductService::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$data = ProductService::find($id);

		$data->update($service);
		
		return Redirect::route('admin.services.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));
		
	}


	/**
	 * Remove the specified service post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 
	  ProductService::find($id)->delete();
      return Redirect::route('admin.services.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
	}


}

