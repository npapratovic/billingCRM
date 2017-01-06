<?php

/*
*	CompanyController
*
*	Handles backend functions
*/

class CompanyController extends \BaseController {
 

	/**
	 * Show the form for editing the specified company post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function index()
	{ 
		// Get data
  
	  	$id = Auth::user()->id; 
 
      	$company = Company::where('user_id', $id)->first(); 
  
		$this->layout->title = 'Moja tvrtka | BillingCRM';

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);
 
       	if(!empty($company)) {

        	$this->layout->content = View::make('backend.company.edit', compact('company'));
 
      	} else {

        	$this->layout->content = View::make('backend.company.create');
 
      	}

	}


	/**
	 * Store a newly created company in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

      $company = Request::all(); 

      $entryValidator = Validator::make(Input::all(), Company::$store_rules); 

      if ($entryValidator->fails())
      {
        return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
      } 

      //Image processing
      $destinationPath = public_path() . "/uploads/backend/company/"; // upload path
      $extension = $company['image']->getClientOriginalExtension(); // getting image extension
      $image = rand(11111,99999).'.'.$extension; // renameing image
      Image::make($company['image']->getRealPath())
                        ->orientate()
                        ->fit(500, 500)
                        ->crop(500, 500)
                        ->resize(150, 150)
                        ->save($destinationPath . $image)
                        ->destroy(); // uploading file to given path
                            
      //add extra fields to array for model 
      $company['image'] = $image;
      $company['user_id'] = Auth::user()->id;

      Company::create($company);   
  
      return Redirect::back()->with('success_message', Lang::get('core.msg_success_entry_added'));

	}


	/**
	 * Display the specified company.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) { 
	 
 
	}


	/**
	 * Update the specified company post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

      $company = Request::all(); 

      $entryValidator = Validator::make(Input::all(), Company::$update_rules); 

      if ($entryValidator->fails())
      {
        return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
      } 

      $data = Company::find($id);

      //Get old image value, this is fallback

      if (!is_object($company['image'])) { 
        $company['image'] = $data->image;
      }

      //Check if image is updated
      if (is_object($company['image'])) { 

        //Image processing
        $destinationPath = public_path() . "/uploads/backend/company/"; // upload path
        $extension = $company['image']->getClientOriginalExtension(); // getting image extension
        $image = rand(11111,99999).'.'.$extension; // renameing image
        Image::make($company['image']->getRealPath())
                          ->orientate()
                          ->fit(500, 500)
                          ->crop(500, 500)
                          ->resize(150, 150)
                          ->save($destinationPath . $image)
                          ->destroy(); // uploading file to given path
                              
        //add extra fields to array for model
        $company['image'] = $image;

      } 

	  $data->update($company);

      return Redirect::back()->with('success_message', Lang::get('core.msg_success_entry_edited')); 

	}


	/**
	 * Remove the specified company post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{ 
		/*	*/
	}


}

