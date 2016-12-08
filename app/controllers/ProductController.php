<?php

/*
*	ProductController
*
*	Handles backend functions
*/

class ProductController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new ProductRepository;
	}
	/**
	 * Display a listing of the product.
	 *
	 * @return Response
	 */
	public function index()
	{
		 

		// Get data

		$entries = ProductService::getEntriesProducts(null, null);
		
		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Proizvodi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(

		);
		$this->layout->content = View::make('backend.product.index', array('entries' => $entries));
	}


	/**
	 * Show the form for creating a new product.
	 *
	 * @return Response
	 */
	public function create()
	{
	 
		$entry = ProductService::getEntriesProducts(null, null);
		//goDie($entry);
		$entries = ProductService::getEntriesProducts (null, null);

		
		$attributelist = array();

	 	$attributes = Attribute::getList(null, null);

	 	if ($attributes['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($attributes['entries'] as $attributes)
		{
			$attributelist[$attributes->id] = $attributes->title;
		}

		$categorylist = array();

	 	$categories = Category::getList(null, null);

	 	if ($categories['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($categories['entries'] as $categories)
		{
			$categorylist[$categories->id] = $categories->title;
		}


		$taglist = array();

	 	$tags = Tag::getList(null, null);

	 	if ($tags['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($tags['entries'] as $tags)
		{
			$taglist[$tags->id] = $tags->title;
		}



		$this->layout->title = 'Unos novog proizvoda | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/trumbowyg.min.css',
			'css/backend/trumbowyg.colors.min.css',

			'css/backend/select2.css'	
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/trumbowyg.js',
 
			'js/backend/trumbowyg.base64.min.js',
			'js/backend/trumbowyg.colors.min.js',
			'js/backend/trumbowyg.noembed.min.js',
			'js/backend/trumbowyg.pasteimage.min.js',
			'js/backend/trumbowyg.preformatted.min.js',
			'js/backend/trumbowyg.upload.js',

			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/select2.full.js',
			'js/backend/datatables.js'
		);

		$this->layout->content = View::make('backend.product.create', array('postRoute' => 'ProductStore', 'entries' => $entries, 'entry' => $entry, 'attributelist' => $attributelist, 'categorylist' => $categorylist, 'taglist' => $taglist));
	}


	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::except('product_attribute', 'product_tag', 'product_category')));

		$entryValidator = Validator::make(Input::all(), Product::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->store(
			Input::get('title'),
			Input::get('intro'),
			Input::get('permalink'),
			Input::get('sku'),
			Input::get('price'),
			Input::get('sale_price'),
			Input::get('stock'),
			Input::get('total_sales'),
			Input::get('stock_status'),
			Input::get('sold_individually'),
			Input::get('weight'),
			Input::get('length'),
			Input::get('width'),
			Input::get('height'),
			Input::get('status'),
			Input::get('product_type'),
			Input::get('content'),
			Input::get('visibility'),
			Input::get('downloadable'),
			Input::get('featured'),
			Input::get('virtual'),
			Input::get('purchase_note'),
			Input::get('manage_stock'),
			Input::get('backorders'),
			Input::get('product_attribute'),
			Input::get('product_category'),
			Input::get('product_tag'),
			Input::file('image')

		);

		
		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('ProductIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{ 
		$this->layout->title = 'Proizvodi | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.product.view');
	}


	/**
	 * Show the form for editing the specified product post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 
		// Get data


		$attributelist = array();

	 	$attributes = Attribute::getEntries(null, null);

	 	if ($attributes['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($attributes['entries'] as $attributes)
		{
			$attributelist[$attributes->id] = $attributes->title;
		}

		$categorylist = array();

	 	$categories = Category::getEntries(null, null);

	 	if ($categories['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($categories['entries'] as $categories)
		{
			$categorylist[$categories->id] = $categories->title;
		}


		$taglist = array();

	 	$tags = Tag::getEntries(null, null);

	 	if ($tags['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($tags['entries'] as $tags)
		{
			$taglist[$tags->id] = $tags->title;
		}


		$entry = ProductService::getEntriesProducts($id, null);
		
		$entries = ProductService::getEntriesProducts(null, null);

		$productattributes = ProductsAttributes::getAttributesByProduct($id);
		$productcategories = ProductsCategories::getCategoriesByProduct($id);
		$producttags = ProductsTags::getTagsByProduct($id);

		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Uređivanje proizvoda | BillingCRM';

		$this->layout->css_files = array(
			'css/backend/trumbowyg.min.css',
			'css/backend/trumbowyg.colors.min.css',

			'css/backend/select2.css'	
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/trumbowyg.js',
 
			'js/backend/trumbowyg.base64.min.js',
			'js/backend/trumbowyg.colors.min.js',
			'js/backend/trumbowyg.noembed.min.js',
			'js/backend/trumbowyg.pasteimage.min.js',
			'js/backend/trumbowyg.preformatted.min.js',
			'js/backend/trumbowyg.upload.js',

			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/select2.full.js',
			'js/backend/datatables.js'
		);

		$this->layout->content = View::make('backend.product.edit', array('entry' => $entry['entry'], 'postRoute' => 'ProductUpdate', 'entries' => $entries, 'attributelist' => $attributelist, 'categorylist' => $categorylist, 'taglist' => $taglist, 'productattributes' => $productattributes, 'productcategories' => $productcategories, 'producttags' => $producttags));
	}


	/**
	 * Update the specified product post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::except('product_attribute', 'product_tags', 'product_category')));

		$entryValidator = Validator::make(Input::all(), Product::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
		    Input::get('id'),
			Input::get('title'),
			Input::get('intro'),
			Input::get('permalink'),
			Input::get('sku'),
			Input::get('price'),
			Input::get('sale_price'),
			Input::get('stock'),
			Input::get('total_sales'),
			Input::get('stock_status'),
			Input::get('sold_individually'),
			Input::get('weight'),
			Input::get('length'),
			Input::get('width'),
			Input::get('height'),
			Input::get('status'),
			Input::get('product_type'),
			Input::get('content'),
			Input::get('visibility'),
			Input::get('downloadable'),
			Input::get('featured'),
			Input::get('virtual'),
			Input::get('purchase_note'),
			Input::get('manage_stock'),
			Input::get('backorders'),
			Input::get('product_attribute'),
			Input::get('product_category'),
			Input::get('product_tags'),
			Input::file('image')

		);
		
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('ProductIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Remove the specified product post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 

		if ($id == null)
		{
			return Redirect::route('ProductIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Product::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('ProductIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('ProductIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('ProductIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}

