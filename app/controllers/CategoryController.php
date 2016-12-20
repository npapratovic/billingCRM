<?php

/*
*	CategoryController
*
*	Handles backend functions
*/

class CategoryController extends \BaseController {
 
	/**
	 * Display a listing of the category.
	 *
	 * @return Response
	 */

	public function index()
	{
	    $entries = Category::paginate(10);  

		$this->layout->title = 'Kategorije | BillingCRM';
	 
	    $this->layout->content = View::make('backend.category.index', compact('entries')); 
  
	}


	/**
	 * Show the form for creating a new category.
	 *
	 * @return Response
	 */

	public function create()
	{
		$entries = Category::paginate(5);  

		$this->layout->title = 'Unos nove kategorije | BillingCRM';

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);
	 
	    $this->layout->content = View::make('backend.category.create', compact('entries'));
	}


	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */

	public function store()
	{

      $category = Request::all(); 

      $entryValidator = Validator::make(Input::all(), Category::$store_rules); 

      if ($entryValidator->fails())
      {
        return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
      } 

      //Image processing
      $destinationPath = public_path() . "/uploads/backend/category/"; // upload path
      $extension = $category['image']->getClientOriginalExtension(); // getting image extension
      $image = rand(11111,99999).'.'.$extension; // renameing image
      Image::make($category['image']->getRealPath())
                        ->orientate()
                        ->fit(500, 500)
                        ->crop(500, 500)
                        ->resize(150, 150)
                        ->save($destinationPath . $image)
                        ->destroy(); // uploading file to given path
                            
      //add extra fields to array for model 
      $category['image'] = $image;

      Category::create($category);   
  
      return Redirect::route('admin.categories.index')->with('success_message', Lang::get('core.msg_success_entry_added'));
 
	}


	/**
	 * Display the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{ 
		//
	}


	/**
	 * Show the form for editing the specified category post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	 $entries = Category::paginate(5);  
      
     	 $category = Category::find($id);
      
	  $this->layout->title = 'Uređivanje kategorije | BillingCRM';

	  $this->layout->js_footer_files = array(
		'js/backend/bootstrap-filestyle.min.js',
		'js/backend/jquery.stringtoslug.min.js',
		'js/backend/speakingurl.min.js'
	  );

      $this->layout->content = View::make('backend.tag.edit', compact('category', 'entries'));
 
	}


	/**
	 * Update the specified category post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function update($id)
	{
      $category = Request::all(); 

      $entryValidator = Validator::make(Input::all(), Category::$update_rules); 

      if ($entryValidator->fails())
      {
        return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
      } 
 
      $data = Category::find($id);

      //Get old image value, this is fallback

      if (!is_object($category['image'])) { 
        $category['image'] = $data->image;
      }

      //Check if image is updated
      if (is_object($category['image'])) { 

        //Image processing
        $destinationPath = public_path() . "/uploads/backend/category/"; // upload path
        $extension = $category['image']->getClientOriginalExtension(); // getting image extension
        $image = rand(11111,99999).'.'.$extension; // renameing image
        Image::make($category['image']->getRealPath())
                          ->orientate()
                          ->fit(500, 500)
                          ->crop(500, 500)
                          ->resize(150, 150)
                          ->save($destinationPath . $image)
                          ->destroy(); // uploading file to given path
                              
        //add extra fields to array for model
        $category['image'] = $image;

      } 
   
      $data->update($category);

      return Redirect::route('admin.categories.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));
	}


	/**
	 * Remove the specified category post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

      Category::find($id)->delete();
      return Redirect::route('admin.categories.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
	}


}

