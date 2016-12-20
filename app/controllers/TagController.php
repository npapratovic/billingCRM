<?php

/*
*	TagController
*
*	Handles backend functions
*/

class TagController extends \BaseController {
	/**
	 * Display a listing of the tag.
	 *
	 * @return Response
	 */
	public function index()
	{
		 
		// Get data

		$entries = Tag::paginate(10);

		$this->layout->title = 'Oznake | BillingCRM';

		$this->layout->content = View::make('backend.tag.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new tag.
	 *
	 * @return Response
	 */
	public function create()
	{

		$entries = Tag::paginate(5);

		$this->layout->js_footer_files = array(
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->title = 'Kreiranje nove oznake | BillingCRM';
		
		$this->layout->content = View::make('backend.tag.create', compact('entries'));
	}


	/**
	 * Store a newly created tag in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$tag = Request::all(); 
		
		$entryValidator = Validator::make(Input::all(), Tag::$store_rules); 

		if ($entryValidator->fails())
		{
		  return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		} 

		Tag::create($tag);  
		
		return Redirect::route('admin.tags.index')->with('success_message', Lang::get('core.msg_success_entry_added'));
	}


	/**
	 * Display the specified tag.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 


		$this->layout->title = 'Oznake | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.tag.view');
	}


	/**
	 * Show the form for editing the specified tag post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$entries = Tag::paginate(5);

		$tag = Tag::find($id);
		
		$this->layout->js_footer_files = array(
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->title = 'Uređivanje korisnika | BillingCRM';
		
		$this->layout->content = View::make('backend.tag.edit', compact('tag', 'entries'));
	}


	/**
	 * Update the specified tag post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tag = Request::all(); 

		$entryValidator = Validator::make(Input::all(), Tag::$update_rules); 

		if ($entryValidator->fails())
		{
		  return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		} 
		
		$data = Tag::find($id);
		
		$data->update($tag);

		return Redirect::route('admin.tags.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));
	}


	/**
	 * Remove the specified tag post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tag::find($id)->delete();
		return Redirect::route('admin.tags.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
	}


}

