<?php

/*
*	CompanyController
*
*	Handles backend functions
*/

class CompanyController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new CompanyRepository;
	}

	/**
	 * Show the form for editing the specified company post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function index()
	{ 
		// Get data

		$entry = Company::getEntries(Auth::user()->id);

		$mode = 'edit';

		$postRoute = 'CompanyUpdate';

		if (!is_object($entry['entry'])){
			$mode = 'add';
			$postRoute = 'CompanyStore';
		}

		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Moja tvrtka | BillingCRM';

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

		$this->layout->content = View::make('backend.company.index', array('entry' => $entry['entry'], 'postRoute' => $postRoute, 'mode' => $mode));
	}


	/**
	 * Store a newly created company in storage.
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
			Auth::user()->id,
			Input::get('title'),
			Input::get('oib'),
			Input::get('address'),
			Input::get('city'),
			Input::get('post_number'),
			Input::get('country'),
			Input::get('phone_number'),
			Input::get('email'),
			Input::get('iban'),
			Input::get('company_note'),
			Input::get('tax_percentage'),
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('mobile_phone_number'),
			Input::get('website'),
			Input::get('swift'),
			Input::get('pdv_id'),
			Input::get('free_input'),
			Input::get('show_text'),
			Input::get('tax_base'),
			Input::file('image')

		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('CompanyIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified company.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	 
		$this->layout->title = 'Korisnici | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.company.view');
	}


	/**
	 * Update the specified company post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), User::$store_rules_client);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
		    Input::get('id'),
			Input::get('title'),
			Input::get('oib'),
			Input::get('address'),
			Input::get('city'),
			Input::get('post_number'),
			Input::get('country'),
			Input::get('phone_number'),
			Input::get('email'),
			Input::get('iban'),
			Input::get('company_note'),
			Input::get('tax_percentage'),
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('mobile_phone_number'),
			Input::get('website'),
			Input::get('swift'),
			Input::get('pdv_id'),
			Input::get('free_input'),
			Input::get('show_text'),
			Input::get('tax_base'),
			Input::file('image')
		);
		
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('CompanyIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Remove the specified company post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{ 
		if ($id == null)
		{
			return Redirect::route('CompanyIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('CompanyIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('CompanyIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}

