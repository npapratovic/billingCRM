<?php

/*
*	ProfileController
*
*	Handles backend functions
*/

class ProfileController extends \BaseController {
 
	/**
	 * Show the form for editing the specified profile post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function index()
	{
	 
	  $id = Auth::user()->id;

      $profile = Profile::find($id); 

      $cities = City::lists('name', 'id');

      $regions = Region::lists('name', 'id'); 

      $this->layout->title = 'Uređivanje profila | BillingCRM';
 
      $this->layout->content = View::make('backend.profile.edit', compact('profile', 'cities', 'regions'));
  
 	}


	/**
	 * Store a newly created profile in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/* */
	}


	/**
	 * Display the specified profile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		/* */
	}


	/**
	 * Update the specified profile post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
          $profile = Request::all(); 

	      $entryValidator = Validator::make(Input::all(), Profile::$update_rules); 

	      if ($entryValidator->fails())
	      {
	        return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
	      } 
	 
	      $data = Profile::find($id);

	      //Get old image value, this is fallback

	      if (!is_object($profile['image'])) { 
	        $profile['image'] = $data->image;
	      }

	      //Check if image is updated
	      if (is_object($profile['image'])) { 

	        //Image processing
	        $destinationPath = public_path() . "/uploads/backend/profile/"; // upload path
	        $extension = $profile['image']->getClientOriginalExtension(); // getting image extension
	        $image = rand(11111,99999).'.'.$extension; // renameing image
	        Image::make($profile['image']->getRealPath())
	                          ->orientate()
	                          ->fit(500, 500)
	                          ->crop(500, 500)
	                          ->resize(150, 150)
	                          ->save($destinationPath . $image)
	                          ->destroy(); // uploading file to given path
	                              
	        //add extra fields to array for model
	        $profile['image'] = $image;

	      } 
	   
	      $data->update($profile);

	      return Redirect::route('admin.profile.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));
	}


	/**
	 * Remove the specified profile post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		/*	*/
	}


}

