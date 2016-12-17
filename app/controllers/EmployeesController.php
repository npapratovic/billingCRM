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
    } else {

      //add extra fields to array
      $employee['user_group'] = 'employee'; 

      Employees::create($employee);  

      $user_id = Employees::orderBy('id', 'desc')->first()->id;
      $role_id = DB::table('roles')->where('name','employee')->first()->id; 

      $employeerole = array($user_id, $role_id);

      //rename fields in array
      $employeerole['user_id'] = $user_id;
      $employeerole['role_id'] = $role_id;

      AssignedRoles::create($employeerole);

    }

      return Redirect::route('getDashboard')->with('success_message', Lang::get('core.msg_success_entry_added'));

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
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }


}
