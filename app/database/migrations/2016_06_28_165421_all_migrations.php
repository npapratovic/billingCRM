<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllMigrations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{ 

		Schema::create('city', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->string('permalink', 255); 
			$table->timestamps();
		});

		Schema::create('region', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->string('permalink', 255);
			$table->timestamps();
		});
		// Create languages
		Schema::create('languages', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('iso_tag')->unique();
			$table->string('language');
			$table->string('local_name')->nullable();

			$table->timestamps();
		});

		// Create users
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('client_id',30); 
			$table->string('username', 30);
			$table->string('user_group');
			$table->string('email', 50);
			$table->string('password', 100);
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('address', 50);
			$table->integer('city')->unsigned();
			$table->string('mjesto', 30)->nullable();
			$table->string('zupanija', 50)->nullable();
			$table->string('zip', 8)->nullable();
			$table->string('country', 30)->nullable();
			$table->string('fax', 50);
			$table->string('mobile', 50);
			$table->string('phone', 50);
			$table->string('web', 50);
			$table->string('iban', 50);
			$table->text('note')->nullable();
			$table->integer('region')->unsigned();
			$table->string('image', 255);
			$table->string('oib', 11)->nullable();
			$table->string('company_name', 255)->nullable();
			$table->string('client_type', 20)->nullable();
			$table->string('remember_token')->nullable();
			$table->string('verify_code')->nullable();
			$table->integer('language')->unsigned()->default(1);
			$table->string('consumer_key');
			$table->string('consumer_secret');
			$table->string('store_url');
			$table->foreign('language')->references('id')->on('languages');
			$table->foreign('city')->references('id')->on('city');
			$table->foreign('region')->references('id')->on('region');

			$table->softDeletes();

			$table->timestamps();
		});


		Schema::create('products_services', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id');
			$table->string('title', 255);
			$table->string('permalink', 255);
			$table->string('product_type', 255)->nullable();
			$table->string('image', 255)->nullable();
			$table->text('intro', 255)->nullable();
			$table->text('content', 255)->nullable();
			$table->string('visibility')->nullable();
			$table->integer('stock_status')->nullable();
			$table->integer('total_sales')->nullable();
			$table->integer('downloadable')->nullable();
			$table->integer('virtual')->nullable();
			$table->integer('regular_price')->nullable();
			$table->integer('sale_price')->nullable();
			$table->string('purchase_note')->nullable();
			$table->integer('featured')->nullable();
			$table->float('weight')->nullable();
			$table->float('length')->nullable();
			$table->float('width')->nullable();
			$table->float('height')->nullable();
			$table->string('status')->nullable();
			$table->integer('sku')->nullable();
			/*$table->timestamp('sale_price_dates_from')->nullable();
			$table->timestamp('sale_price_dates_to')->nullable();*/
			$table->float('price')->nullable();
			$table->integer('sold_individually')->nullable();
			$table->integer('manage_stock')->nullable();
			$table->integer('backorders')->nullable();
			$table->integer('stock')->nullable();
			$table->integer('existing')->nullable();
  
			$table->float('tax')->nullable();

			$table->string('type')->nullable();

			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes();
		});

		Schema::create('attributes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->string('permalink', 255);
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes();
		});



		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->string('permalink', 255);
			$table->string('description');
			$table->string('image')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes();
		});

		Schema::create('tags', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 255);
			$table->string('permalink', 255);
			$table->string('description');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes();
		});



		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('invoice_number');
			$table->integer('client_id')->unsigned();
			$table->integer('employee_id')->unsigned();
			$table->string('invoice_type');
			$table->integer('tax');
			$table->string('address');
			$table->string('cityname');
			$table->string('payment_way')->nullable();
			$table->date('invoice_date')->nullable();
			$table->date('invoice_date_deadline')->nullable();
			$table->date('invoice_date_ship')->nullable();
			$table->string('invoice_note')->nullable();
			$table->string('intern_note')->nullable();
			$table->integer('repeat_invoice');
			$table->string('invoice_language');
			$table->string('valute');
			$table->integer('from_order')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes();

			$table->foreign('client_id')->references('id')->on('users');
		});


		Schema::create('offers', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('offer_number', 255); 
			$table->integer('client_id');
			$table->integer('employee_id');
			$table->integer('tax');
			$table->integer('hide_amount');
			$table->string('client_address');
			$table->integer('client_oib');
			$table->string('payment_way');
			$table->date('offer_start');
			$table->date('offer_end');
			$table->string('offer_note');
			$table->string('offer_language');
			$table->integer('valute');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes();
		});

		Schema::create('offers_products', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('offer_id');
			$table->integer('product_id');
			$table->string('measurement');
			$table->integer('amount');
			$table->float('price');
			$table->float('discount');
			$table->float('taxpercent');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});


		// Password reminders
		Schema::create('password_reminders', function(Blueprint $table)
		{
			$table->string('email')->index();
			$table->string('token')->index();
			$table->timestamp('created_at');
		});
 
 
 		// Creates the products_attributes (Many-to-Many relation) table
		Schema::create('products_attributes', function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('attribute_id')->unsigned();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();


			$table->foreign('product_id')->references('id')->on('products_services');
			$table->foreign('attribute_id')->references('id')->on('attributes');
		});


		// Creates the products_categories (Many-to-Many relation) table
		Schema::create('products_categories', function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();


			$table->foreign('product_id')->references('id')->on('products_services');
			$table->foreign('category_id')->references('id')->on('categories');
		});


		// Creates the products_tags (Many-to-Many relation) table
		Schema::create('products_tags', function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();


			$table->foreign('product_id')->references('id')->on('products_services');
			$table->foreign('tag_id')->references('id')->on('tags');
		});
		

		// Creates the invoices_products (Many-to-Many relation) table
		Schema::create('invoices_products', function ($table) {
			$table->increments('id');
			$table->integer('invoice_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('measurement');
			$table->integer('amount');
			$table->float('price');
			$table->float('discount');
			$table->float('taxpercent');
			$table->integer('imported')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();

			$table->foreign('invoice_id')->references('id')->on('invoices');
			$table->foreign('product_id')->references('id')->on('products_services');
		});
 
		Schema::create('company', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('title', 255)->nullable();
			$table->string('oib')->nullable();
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->integer('post_number')->nullable();
			$table->string('country')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('email')->nullable();
			$table->string('iban')->nullable();
			$table->string('company_note')->nullable();
			$table->float('tax_percentage')->nullable();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('mobile_phone_number')->nullable();
			$table->string('website')->nullable();
			$table->string('swift')->nullable();
			$table->string('pdv_id')->nullable();
			$table->string('free_input')->nullable();
			$table->integer('show_text')->nullable();
			$table->integer('tax_base')->nullable();
			$table->string('image')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});

		Schema::create('dispatches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('dispatch_number');
			$table->integer('taxable');
			$table->integer('hide_amount');
			$table->integer('client_id')->unsigned();
			$table->integer('employee_id');
			$table->string('client_address');
			$table->integer('client_oib');
			$table->string('stock_label')->nullable();
			$table->string('dispatch_employee');
			$table->date('dispatch_date_ship')->nullable();
			$table->string('dispatch_note')->nullable();
			$table->string('dispatch_language');
			$table->string('valute');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes(); 
		}); 

		Schema::table('dispatches', function($table) {
		  	$table->foreign('client_id')->references('id')->on('users');
		});

		// Create dispatches_services
		Schema::create('dispatches_services', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('dispatch_id')->unsigned();
			$table->integer('service_id')->unsigned();
			$table->string('measurement');
			$table->integer('amount');
			$table->float('price');
			$table->float('discount');
			$table->float('taxpercent');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});

		Schema::table('dispatches_services', function($table) {
			$table->foreign('dispatch_id')->references('id')->on('dispatches');
			$table->foreign('service_id')->references('id')->on('products_services');
		});

		Schema::create('dispatches_products', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('dispatch_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('measurement');
			$table->integer('amount');
			$table->float('price');
			$table->float('discount');
			$table->float('taxpercent');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
 
		});

		Schema::table('dispatches_products', function($table) {
			$table->foreign('dispatch_id')->references('id')->on('dispatches');
			$table->foreign('product_id')->references('id')->on('products_services');
		});
 
		Schema::create('narudzbenice', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('narudzbenica_number');
			$table->integer('client_id')->unsigned();
			$table->integer('employee_id');
			$table->integer('tax');
			$table->integer('hide_amount');
			$table->string('client_address');
			$table->integer('client_oib');
			$table->string('payment_way');
			$table->date('narudzbenica_start');
			$table->date('narudzbenica_end');
			$table->string('narudzbenica_note');
			$table->string('narudzbenica_language');
			$table->integer('valute');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes(); 
		});

		Schema::table('narudzbenice', function($table) { 
			$table->foreign('client_id')->references('id')->on('users');
		});

		// Creates the narudzbenice_products (Many-to-Many relation) table
		Schema::create('narudzbenice_products', function ($table) {
			$table->increments('id');
			$table->integer('narudzbenica_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('measurement');
			$table->integer('amount');
			$table->float('price');
			$table->float('discount');
			$table->float('taxpercent');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
 
		});

		Schema::table('narudzbenice_products', function($table) { 
			$table->foreign('narudzbenica_id')->references('id')->on('narudzbenice');
			$table->foreign('product_id')->references('id')->on('products_services');
		});

		// Create orders
		Schema::create('orders', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('order_id');
			$table->integer('client_id')->unsigned();
			$table->integer('employee_id');
			$table->float('price');
			$table->string('shipping_way');
			$table->string('payment_way');
			$table->string('payment_status');
			$table->string('billing_address');
			$table->string('shipping_address');
			$table->text('note');
			$table->dateTime('order_date');
			$table->integer('show_only');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});

		Schema::table('orders', function($table) { 
			$table->foreign('client_id')->references('id')->on('users'); 
		});

		// Create orders_products
		Schema::create('orders_products', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('order_id');
			$table->integer('product_id')->nullable();
			$table->integer('quantity');
			$table->float('price');
			$table->string('product_name');
			$table->string('type');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});


		Schema::create('workingorders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('workingorder_number', 255);
			$table->integer('taxable');
			$table->integer('hide_amount');
			$table->integer('client_id')->unsigned();
			$table->integer('employee_id');
			$table->string('client_address');
			$table->integer('client_oib');
			$table->string('workingorder_employee');
			$table->date('workingorder_date_ship')->nullable();
			$table->string('workingorder_note')->nullable();
			$table->string('workingorder_description')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->softDeletes();


		});
 
		Schema::table('workingorders', function($table) { 
			$table->foreign('client_id')->references('id')->on('users');
		});
		
		// Create workingorders_services
		Schema::create('workingorders_services', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('workingorder_id')->unsigned();
			$table->integer('service_id')->unsigned();
			$table->string('measurement');
			$table->integer('amount');
			$table->float('price');
			$table->float('discount');
			$table->float('taxpercent');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
 
		});

		Schema::table('workingorders_services', function($table) {
			$table->foreign('workingorder_id')->references('id')->on('workingorders');
			$table->foreign('service_id')->references('id')->on('products_services');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
 
		Schema::drop('city');
		Schema::drop('region');
		Schema::drop('languages');
		Schema::drop('users');
		Schema::drop('products_services');
		Schema::drop('attributes');
		Schema::drop('categories');
		Schema::drop('tags');
		Schema::drop('invoices');
		Schema::drop('offers');
		Schema::drop('offers_products');
		Schema::drop('password_reminders');
		Schema::drop('products_attributes');
		Schema::drop('products_categories');
		Schema::drop('products_tags');
		Schema::drop('invoices_products'); 
		Schema::drop('company');
		Schema::drop('dispatches');
		Schema::drop('dispatches_services');
		Schema::drop('dispatches_products');
		Schema::drop('narudzbenice');
		Schema::drop('narudzbenice_products');
		Schema::drop('orders');
		Schema::drop('orders_products');
		Schema::drop('workingorders');
		Schema::drop('workingorders_services');

	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
