<?php

/*
*	ClientController
*
*	Handles backend functions
*/

class ClientController extends \BaseController {
	
	public function index()
	{ 
		// Get data

		$entries = User::where('user_group', 'client')->paginate(10);

		$this->layout->title = 'Klijenti | BillingCRM';

		$this->layout->content = View::make('backend.client.index', compact('entries'));
	}


	/**
	 * Show the form for creating a new client.
	 *
	 * @return Response
	 */
	public function create()
	{
		 
		$entries = User::where('user_group','client')->paginate(5);

		$this->layout->title = 'Unos novog klijenta | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		
		);

		$this->layout->content = View::make('backend.client.create', compact('entries'));
	}


	/**
	 * Store a newly created client in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$client = Request::all();

		$entryValidator = Validator::make(Input::all(), User::$store_rules_client);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$client['city'] = '1';
		$client['region'] = '14';
		$client['user_group'] = 'client';

		User::create($client); 

		return Redirect::route('admin.clients.index')->with('success_message', Lang::get('core.msg_success_entry_added'));
	}


	/**
	 * Display the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{  
		$this->layout->title = 'Korisnici | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.client.view');
	}


	/**
	 * Show the form for editing the specified client post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{ 
		// Get data

		$entries = User::where('user_group','client')->paginate(5);

		$client = User::find($id);

		$this->layout->title = 'Uređivanje korisnika | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
			
		);

		$this->layout->content = View::make('backend.client.edit', compact('client', 'entries'));
	}


	/**
	 * Update the specified client post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$client = Request::all(); 

		$entryValidator = Validator::make(Input::all(), User::$update_rules_client);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$data = User::find($id);

		$data->update($client);
		
		return Redirect::route('admin.clients.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));
	}


	/**
	 * Remove the specified client post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{ 
		User::find($id)->delete();
      	return Redirect::route('admin.clients.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
	}


}

