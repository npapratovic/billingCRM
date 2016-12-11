<?php

/*
*	ClientController
*
*	Handles backend functions
*/

class ClientController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new ClientRepository;
	}
	/**
	 * Display a listing of the client.
	 *
	 * @return Response
	 */
	public function index()
	{ 
		// Get data

		$entries = User::getUserByUserGroup('client');


		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$this->layout->title = 'Klijenti | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.client.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new client.
	 *
	 * @return Response
	 */
	public function create()
	{
		 
		$entries = User::getUserByUserGroup('client');

		$this->layout->title = 'Unos novog klijenta | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/datatables.js'
		);

		$this->layout->content = View::make('backend.client.create', array('postRoute' => 'ClientStore', 'entries' => $entries));
	}


	/**
	 * Store a newly created client in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), User::$store_rules_client);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->store(
			Input::get('company_name'),
			Input::get('client_type'),
			Input::get('oib'),
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('address'),
			Input::get('mjesto'),
			Input::get('zip'),
			Input::get('country'),
			Input::get('phone'),
			Input::get('fax'),
			Input::get('mobile'),
			Input::get('email'),
			Input::get('web'),
			Input::get('iban'),
			Input::get('note')

		);
		

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('ClientIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
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

		$entry = User::getUserInfos($id);
		
		$entries = User::getUserByUserGroup('client');

		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Uređivanje korisnika | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/datatables.js'
		);

		$this->layout->content = View::make('backend.client.edit', array('entry' => $entry['user'], 'postRoute' => 'ClientUpdate', 'entries' => $entries));
	}


	/**
	 * Update the specified client post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), User::$update_rules_client);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
		    Input::get('id'),
			Input::get('company_name'),
			Input::get('client_type'),
			Input::get('oib'),
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('address'),
			Input::get('mjesto'),
			Input::get('zip'),
			Input::get('country'),
			Input::get('phone'),
			Input::get('fax'),
			Input::get('mobile'),
			Input::get('email'),
			Input::get('web'),
			Input::get('iban'),
			Input::get('note')
		);
		
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('ClientIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Remove the specified client post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{ 
		if ($id == null)
		{
			return Redirect::route('ClientIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('ClientIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('ClientIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}

