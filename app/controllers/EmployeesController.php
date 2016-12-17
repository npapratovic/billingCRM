<?php 

class EmployeesController extends \BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $entries = Employees::paginate();  

    $this->layout->title = 'Korisnici | BillingCRM';
 
    $this->layout->content = View::make('backend.employees.index', compact('entries'));
  } 


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */

  public function create()
  {
    $this->layout->title = 'Kreiranje novog korisnika | BillingCRM';
 
    $this->layout->content = View::make('backend.employees.create');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {

      $employee = Request::all(); 
 
      $entryValidator = Validator::make(Input::all(), Employees::$store_rules_employee); 

      if ($entryValidator->fails())
      {
        return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
      } 

      //Image processing
      $destinationPath = 'public_html/uploads/backend/employee/'; // upload path
      $extension = $employee['image']->getClientOriginalExtension(); // getting image extension
      $image = rand(11111,99999).'.'.$extension; // renameing image
      Image::make($employee['image']->getRealPath())
                        ->orientate()
                        ->fit(500, 500)
                        ->crop(500, 500)
                        ->resize(150, 150)
                        ->save($destinationPath . $image)
                        ->destroy(); // uploading file to given path
                            
      //add extra fields to array for model
      $employee['user_group'] = 'employee'; 
      $employee['password'] = Hash::make($employee['password']);
      $employee['image'] = $image;

      Employees::create($employee);  

      //We need to assign 'employee' role to this user
      $user_id = Employees::orderBy('id', 'desc')->first()->id;
      $role_id = DB::table('roles')->where('name','employee')->first()->id; 

      $employeerole = array($user_id, $role_id);

      //rename fields in array
      $employeerole['user_id'] = $user_id;
      $employeerole['role_id'] = $role_id;

      AssignedRoles::create($employeerole);
  
      return Redirect::route('admin.employees.index')->with('success_message', Lang::get('core.msg_success_entry_added'));

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
      $employee = Employees::find($id);
      
      $this->layout->title = 'Uređivanje korisnika | BillingCRM';
 
      $this->layout->content = View::make('backend.employees.edit', compact('employee'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
      $employee = Request::all(); 

      $entryValidator = Validator::make(Input::all(), Employees::$edit_rules_employee); 

      if ($entryValidator->fails())
      {
        return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
      } 
 
      $data = Employees::find($id);

      //Get old image value, this is fallback

      if (!is_object($employee['image'])) { 
        $employee['image'] = $data->image;
      }

      //Check if image is updated
      if (is_object($employee['image'])) { 

        //Image processing
        $destinationPath = 'public_html/uploads/backend/employee/'; // upload path
        $extension = $employee['image']->getClientOriginalExtension(); // getting image extension
        $image = rand(11111,99999).'.'.$extension; // renameing image
        Image::make($employee['image']->getRealPath())
                          ->orientate()
                          ->fit(500, 500)
                          ->crop(500, 500)
                          ->resize(150, 150)
                          ->save($destinationPath . $image)
                          ->destroy(); // uploading file to given path
                              
        //add extra fields to array for model
        $employee['image'] = $image;
        
      } 
   
      $data->update($employee);

      return Redirect::route('admin.employees.index')->with('success_message', Lang::get('core.msg_success_entry_edited'));

  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      Employees::find($id)->delete();
      return Redirect::route('admin.employees.index')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
  }


}
