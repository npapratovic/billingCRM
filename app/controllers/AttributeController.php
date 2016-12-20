<?php

/*
*	AttributeController
*
*	Handles backend functions
*/

class AttributeController extends \BaseController {
	/**
	 * Display a listing of the attribute.
	 *
	 * @return Response
	 */
	public function index()
	{
		 
		// Get data

		$entries = Attribute::paginate(10);

		$this->layout->title = 'Atributi | BillingCRM';

		$this->layout->content = View::make('backend.attribute.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new attribute.
	 *
	 * @return Response
	 */
	public function create()
	{ 

		$entries = Attribute::paginate(5);

		$this->layout->js_footer_files = array(
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->title = 'Kreiranje novog atributa | BillingCRM';
		
		$this->layout->content = View::make('backend.attribute.create', compact('entries'));
	}


	/**
	 * Store a newly created attribute in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$attribute = Request::all(); 
		
		$entryValidator = Validator::make(Input::all(), Attribute::$store_rules); 

		if ($entryValidator->fails())
		{
		  return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		} 

		Attribute::create($attribute);  
		
		return Redirect::route('admin.attributes.index')->with('success_message', Lang::get('core.msg_success_entry_added'));
	}


	/**
	 * Display the specified attribute.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$this->layout->title = 'Atributi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.attribute.view');
	}


	/**
	 * Show the form for editing the specified attribute post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	
		$entries = Attribute::paginate(5);

		$attribute = Attribute::find($id);
		
		$this->layout->js_footer_files = array(
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->title = 'Uređivanje korisnika | BillingCRM';
		
		$this->layout->content = View::make('backend.attribute.edit', compact('attribute', 'entries'));
	}


	/**
	 * Update the specified attribute post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$attribute = Request::all(); 

		$entryValidator = Validator::make(Input::all(), Attribute::$update_rules); 

		if ($entryValidator->fails())
		{
		  return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		} 
		
		$data = Attribute::find($id);
		
		$data->update($attribute);

		return Redirect::route('admin.attributes.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));
	}


	/**
	 * Remove the specified attribute post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Attribute::find($id)->delete();
		return Redirect::route('admin.attribute.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
	}


}

