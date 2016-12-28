<?php
/*
 *
 */

header("Access-Control-Allow-Origin: *");

// Test route
Route::get('test', array('as' => 'getTest', 'uses' => 'CoreController@getTest'));


   Route::get('/updateapp', function()
{
\Artisan::call('dump-autoload');
echo 'dump-autoload complete';
});



// Sign in / Sign out / Register / Post register page

Route::get('sign-in', array('before' => 'guest', 'as' => 'signin', 'uses' => 'CoreController@signin'));

// Sign in processing --- 'before' => 'guest|csrf',
Route::post('sign-in', array('before' => 'guest', 'as' => 'login', 'uses' => 'CoreController@login'));

// Sign out
Route::get('sign-out', array('before' => 'auth', 'as' => 'signout', 'uses' => 'CoreController@signout'));

// Register page
Route::get('registracija', array('before' => 'guest', 'as' => 'getRegister', 'uses' => 'FrontendController@register'));

// Post register page
Route::post('registracija-korisnika', array('before' => 'csrf', 'as' => 'postRegister', 'uses' => 'FrontendController@storeregistration'));

// Forgot password page
Route::get('zaboravljena-lozinka', array('as' => 'forgotPassword', 'uses' => 'RemindersController@getRemind'));

// Forgot password processing
Route::post('refresh-password', array('before' => 'csrf', 'as' => 'postRemind', 'uses' => 'RemindersController@postRemind'));

// Reset password page
Route::get('reset-password/{token}', array('as' => 'getResetPassword', 'uses' => 'RemindersController@getReset'));;

// Post reset password
Route::post('new-password', array('before' => 'csrf', 'as' => 'postReset', 'uses' => 'RemindersController@postReset'));




/*
* Frontend routes
*/

// Home / landing
Route::get('/', array('as' => 'getlanding', 'uses' => 'FrontendController@index'));
  

 /*
 * 	Backend routes
 */
 // Route::group(array('before' => 'admin', 'prefix' => 'admin'), function()

Route::group(array('before' => 'admin', 'prefix' => 'admin'), function()
{

	/*
	 *	Dashboard
	 *
	 *	- available only to logged in users
	 *	- Controller handles the type and file loading depending on user role
	 */

	Route::get('/', array('as' => 'getDashboard', 'uses' => 'DashboardController@index'));

  	// WP API
	Route::group(array('prefix' => 'wp-api'), function()
	{
		Route::get('/', array('as' => 'WpApiIndex', 'uses' => 'WpApiController@index'));

		Route::get('products', array('as' => 'WpApiProducts', 'uses' => 'WpApiController@products'));

		Route::get('orders', array('as' => 'WpApiOrders', 'uses' => 'WpApiController@orders'));

		Route::get('customers', array('as' => 'WpApiCustomers', 'uses' => 'WpApiController@customers'));

	});

	//AJAX route for fetching addresses
	Route::group(array('prefix' => 'ajax'), function()
	{
		Route::get('/getAddress/{id}', 'InfoController@getAddress');

	});
 
 	// CRUD za profile 
 	Route::resource('profile', 'ProfileController');
	// CRUD za employees 
 	Route::resource('employees', 'EmployeesController');
 	// CRUD za categories 
  	Route::resource('categories', 'CategoryController');
  	// CRUD za services 
  	Route::resource('services', 'ServiceController');
  	// CRUD za clients 
  	Route::resource('clients', 'ClientController');
  	// CRUD za invoices 
  	Route::resource('invoices', 'InvoiceController');   	
  	// CRUD za narudzbenice 
  	Route::resource('narudzbenice', 'NarudzbeniceController');
  	// CRUD za orders 
  	Route::resource('orders', 'OrderController'); 
  	// CRUD za offers 
  	Route::resource('offers', 'OfferController');
  	// CRUD za dispatch
  	Route::resource('dispatch', 'DispatchController'); 
  	// CRUD za workingorder
  	Route::resource('workingorder', 'WorkingOrderController');
 	// CRUD za tags 
  	Route::resource('tags', 'TagController'); 
 	// CRUD za attributes 
  	Route::resource('attributes', 'AttributeController');

  	// Create invoice from order:
  	Route::get('createinvoice/{id}', array('as' => 'CreateInvoice', 'uses' => 'OrderController@createInvoice')); 
 
	//PDF routes
	Route::group(array('prefix' => 'pdf'), function()
	{
		Route::get('invoicepdf/{id}', array('before' => 'auth', 'as' => 'InvoiceCreatePdf', 'uses' => 'InvoiceController@createPdf'));

		Route::get('offerpdf/{id}', array('before' => 'auth', 'as' => 'OfferCreatePdf', 'uses' => 'OfferController@createPdf'));

		Route::get('narudzbenicepdf/{id}', array('before' => 'auth', 'as' => 'NarudzbeniceCreatePdf', 'uses' => 'NarudzbeniceController@createPdf'));
	  
		Route::get('dispatchpdf/{id}', array('before' => 'auth', 'as' => 'DispatchCreatePdf', 'uses' => 'DispatchController@createPdf'));

		Route::get('workingorderpdf/{id}', array('before' => 'auth', 'as' => 'WorkingOrderCreatePdf', 'uses' => 'WorkingOrderController@createPdf'));

		Route::get('orderpdf/{id}', array('before' => 'auth', 'as' => 'OrderCreatePdf', 'uses' => 'OrderController@createPdf'));

	});

	//Mail routes
	Route::group(array('prefix' => 'mail'), function()
	{
		Route::post('invoicemail/{id}', array('before' => 'auth', 'as' => 'InvoiceSendMail', 'uses' => 'InvoiceController@sendEmail'));

		Route::post('offermail/{id}', array('before' => 'auth', 'as' => 'OfferSendMail', 'uses' => 'OfferController@sendEmail'));

		Route::post('narudzbenicemail/{id}', array('before' => 'auth', 'as' => 'NarudzbeniceSendMail', 'uses' => 'NarudzbeniceController@sendEmail'));
	  
		Route::post('dispatchmail/{id}', array('before' => 'auth', 'as' => 'DispatchSendMail', 'uses' => 'DispatchController@sendEmail'));

		Route::post('workingordermail/{id}', array('before' => 'auth', 'as' => 'WorkingOrderSendMail', 'uses' => 'WorkingOrderController@sendEmail'));

		Route::post('ordermail/{id}', array('before' => 'auth', 'as' => 'OrderSendMail', 'uses' => 'OrderController@sendEmail'));

	});

 
	Route::group(array('prefix' => 'clients'), function()
	{
		Route::get('/', array('as' => 'ClientIndex', 'uses' => 'ClientController@index'));

		Route::get('create', array('as' => 'ClientCreate', 'uses' => 'ClientController@create'));

		Route::post('store', array('as' => 'ClientStore', 'uses' => 'ClientController@store'));

		Route::get('edit/{id}', array('as' => 'ClientEdit', 'uses' => 'ClientController@edit'));

		Route::post('update/{id}', array('as' => 'ClientUpdate', 'uses' => 'ClientController@update'));

		Route::get('destroy/{id}', array('as' => 'ClientDestroy', 'uses' => 'ClientController@destroy'));

	});

	Route::group(array('prefix' => 'products'), function()
	{
		Route::get('/', array('as' => 'ProductIndex', 'uses' => 'ProductController@index'));

		Route::get('create', array('as' => 'ProductCreate', 'uses' => 'ProductController@create'));

		Route::post('store', array('as' => 'ProductStore', 'uses' => 'ProductController@store'));

		Route::get('edit/{id}', array('as' => 'ProductEdit', 'uses' => 'ProductController@edit'));

		Route::post('update/{id}', array('as' => 'ProductUpdate', 'uses' => 'ProductController@update'));

		Route::get('destroy/{id}', array('as' => 'ProductDestroy', 'uses' => 'ProductController@destroy'));

	});

	Route::group(array('prefix' => 'orders'), function()
	{
		Route::get('/', array('as' => 'OrderIndex', 'uses' => 'OrderController@index'));

		Route::get('create', array('as' => 'OrderCreate', 'uses' => 'OrderController@create'));

		Route::post('store', array('as' => 'OrderStore', 'uses' => 'OrderController@store'));

		Route::get('show/{id}', array('as' => 'OrderShow', 'uses' => 'OrderController@show'));

		Route::get('edit/{id}', array('as' => 'OrderEdit', 'uses' => 'OrderController@edit'));

		Route::post('update/{id}', array('as' => 'OrderUpdate', 'uses' => 'OrderController@update'));

		Route::get('destroy/{id}', array('as' => 'OrderDestroy', 'uses' => 'OrderController@destroy'));

		Route::get('createinvoice/{id}', array('as' => 'CreateInvoice', 'uses' => 'OrderController@createInvoice'));

	});

	Route::group(array('prefix' => 'invoices'), function()
	{
		Route::get('/', array('as' => 'InvoiceIndex', 'uses' => 'InvoiceController@index'));

		Route::get('create', array('as' => 'InvoiceCreate', 'uses' => 'InvoiceController@create'));

		Route::post('store', array('as' => 'InvoiceStore', 'uses' => 'InvoiceController@store'));

		Route::get('edit/{id}', array('as' => 'InvoiceEdit', 'uses' => 'InvoiceController@edit'));

		Route::post('update/{id}', array('as' => 'InvoiceUpdate', 'uses' => 'InvoiceController@update'));

		Route::get('destroy/{id}', array('as' => 'InvoiceDestroy', 'uses' => 'InvoiceController@destroy'));

	});

	Route::group(array('prefix' => 'offers'), function()
	{
		Route::get('/', array('as' => 'OfferIndex', 'uses' => 'OfferController@index'));

		Route::get('create', array('as' => 'OfferCreate', 'uses' => 'OfferController@create'));

		Route::post('store', array('as' => 'OfferStore', 'uses' => 'OfferController@store'));

		Route::get('edit/{id}', array('as' => 'OfferEdit', 'uses' => 'OfferController@edit'));

		Route::post('update/{id}', array('as' => 'OfferUpdate', 'uses' => 'OfferController@update'));

		Route::get('destroy/{id}', array('as' => 'OfferDestroy', 'uses' => 'OfferController@destroy'));

	});

	Route::group(array('prefix' => 'services'), function()
	{
		Route::get('/', array('as' => 'ServiceIndex', 'uses' => 'ServiceController@index'));

		Route::get('create', array('as' => 'ServiceCreate', 'uses' => 'ServiceController@create'));

		Route::post('store', array('as' => 'ServiceStore', 'uses' => 'ServiceController@store'));

		Route::get('edit/{id}', array('as' => 'ServiceEdit', 'uses' => 'ServiceController@edit'));

		Route::post('update/{id}', array('as' => 'ServiceUpdate', 'uses' => 'ServiceController@update'));

		Route::get('destroy/{id}', array('as' => 'ServiceDestroy', 'uses' => 'ServiceController@destroy'));

	});

	Route::group(array('prefix' => 'dispatch'), function()
	{
		Route::get('/', array('as' => 'DispatchIndex', 'uses' => 'DispatchController@index'));

		Route::get('create', array('as' => 'DispatchCreate', 'uses' => 'DispatchController@create'));

		Route::post('store', array('as' => 'DispatchStore', 'uses' => 'DispatchController@store'));

		Route::get('edit/{id}', array('as' => 'DispatchEdit', 'uses' => 'DispatchController@edit'));

		Route::post('update/{id}', array('as' => 'DispatchUpdate', 'uses' => 'DispatchController@update'));

		Route::get('destroy/{id}', array('as' => 'DispatchDestroy', 'uses' => 'DispatchController@destroy'));

	});


	Route::group(array('prefix' => 'workingorder'), function()
	{
		Route::get('/', array('as' => 'WorkingOrderIndex', 'uses' => 'WorkingOrderController@index'));

		Route::get('create', array('as' => 'WorkingOrderCreate', 'uses' => 'WorkingOrderController@create'));

		Route::post('store', array('as' => 'WorkingOrderStore', 'uses' => 'WorkingOrderController@store'));

		Route::get('edit/{id}', array('as' => 'WorkingOrderEdit', 'uses' => 'WorkingOrderController@edit'));

		Route::post('update/{id}', array('as' => 'WorkingOrderUpdate', 'uses' => 'WorkingOrderController@update'));

		Route::get('destroy/{id}', array('as' => 'WorkingOrderDestroy', 'uses' => 'WorkingOrderController@destroy'));

	});

	Route::group(array('prefix' => 'narudzbenice'), function()
	{
		Route::get('/', array('as' => 'NarudzbeniceIndex', 'uses' => 'NarudzbeniceController@index'));

		Route::get('create', array('as' => 'NarudzbeniceCreate', 'uses' => 'NarudzbeniceController@create'));

		Route::post('store', array('as' => 'NarudzbeniceStore', 'uses' => 'NarudzbeniceController@store'));

		Route::get('edit/{id}', array('as' => 'NarudzbeniceEdit', 'uses' => 'NarudzbeniceController@edit'));

		Route::post('update/{id}', array('as' => 'NarudzbeniceUpdate', 'uses' => 'NarudzbeniceController@update'));

		Route::get('destroy/{id}', array('as' => 'NarudzbeniceDestroy', 'uses' => 'NarudzbeniceController@destroy'));

	});

	Route::group(array('prefix' => 'company'), function()
	{
		Route::get('/', array('as' => 'CompanyIndex', 'uses' => 'CompanyController@index'));

		Route::post('store', array('as' => 'CompanyStore', 'uses' => 'CompanyController@store'));

		Route::post('update/{id}', array('as' => 'CompanyUpdate', 'uses' => 'CompanyController@update'));

		Route::get('destroy/{id}', array('as' => 'CompanyDestroy', 'uses' => 'CompanyController@destroy'));

	});


	// Restore trash (Blog, pages, media, widgets, workshops, clients, products)
	Route::group(array('prefix' => 'trash'), function()
	{
		Route::get('/{trashed}', array('as' => 'TrashIndex', 'uses' => 'TrashController@index'));

		Route::get('restore/{id}/{trashed}', array('as' => 'TrashRestore', 'uses' => 'TrashController@restore'));

	});

});

