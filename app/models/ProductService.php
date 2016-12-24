<?php

class ProductService extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'products_services';

	protected $fillable = array('title', 'intro', 'measurement','amount','price', 'type', 'discount', 'tax', 'created_at','updated_at');

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
	);

	 public function invoices_products()
    {
        return $this->belongsTo('InvoicesProducts');
    }

    public function orderProducts()
    {
        return $this->hasMany('OrdersProducts');
    }	

    	public function narudzbeniceProducts(){
    		return $this->belongsTo('NarudzbeniceProducts');
    	}

	public static function getEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('products_services')
				->select(
					'products_services.id AS id',
					'products_services.title AS title',
					'products_services.permalink AS permalink',
					'products_services.product_type AS product_type',
					'products_services.image AS image',
					'products_services.intro AS intro',
					'products_services.content AS content',
					'products_services.visibility AS visibility',
					'products_services.stock_status AS stock_status',
					'products_services.total_sales AS total_sales',
					'products_services.downloadable AS downloadable',
					'products_services.virtual AS virtual',
					'products_services.regular_price AS regular_price',
					'products_services.sale_price AS sale_price',
					'products_services.purchase_note AS purchase_note',
					'products_services.featured AS featured',
					'products_services.weight AS weight',
					'products_services.length AS length',
					'products_services.width AS width',
					'products_services.height AS height',
					'products_services.sku AS sku',
					'products_services.status AS status',
					'products_services.visibility AS visibility',
					/*'products_services.sale_price_dates_from AS sale_price_dates_from',
					'products_services.sale_price_dates_to AS sale_price_dates_to',*/
					'products_services.price AS price',
					'products_services.sold_individually AS sold_individually',
					'products_services.manage_stock AS manage_stock',
					'products_services.backorders AS backorders',
					'products_services.stock AS stock',
					'products_services.existing AS existing'
					)->whereNull('deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products_services.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->get();
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	public static function getEntry($id)
	{
		try
		{
			$entry = DB::table('products_services')
				->select(
					'products_services.id AS id',
					'products_services.title AS title',
					'products_services.permalink AS permalink',
					'products_services.product_type AS product_type',
					'products_services.image AS image',
					'products_services.intro AS intro',
					'products_services.content AS content',
					'products_services.visibility AS visibility',
					'products_services.stock_status AS stock_status',
					'products_services.total_sales AS total_sales',
					'products_services.downloadable AS downloadable',
					'products_services.virtual AS virtual',
					'products_services.regular_price AS regular_price',
					'products_services.sale_price AS sale_price',
					'products_services.existing AS existing',
					'products_services.type AS type'
					)->whereNull('deleted_at');

			// Retrieve specific entry
			$entry = $entry->where('products_services.id', '=', $id)->get();
			return array('status' => 1, 'entry' => $entry);

		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	//-----------------------------------------Products--------------------------------------------------------//
	public static function getEntriesProducts($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('products_services')
				->select(
					'products_services.id AS id',
					'products_services.title AS title',
					'products_services.permalink AS permalink',
					'products_services.product_type AS product_type',
					'products_services.image AS image',
					'products_services.intro AS intro',
					'products_services.content AS content',
					'products_services.visibility AS visibility',
					'products_services.stock_status AS stock_status',
					'products_services.total_sales AS total_sales',
					'products_services.downloadable AS downloadable',
					'products_services.virtual AS virtual',
					'products_services.regular_price AS regular_price',
					'products_services.sale_price AS sale_price',
					'products_services.purchase_note AS purchase_note',
					'products_services.featured AS featured',
					'products_services.weight AS weight',
					'products_services.length AS length',
					'products_services.width AS width',
					'products_services.height AS height',
					'products_services.sku AS sku',
					'products_services.status AS status',
					'products_services.visibility AS visibility',
					/*'products_services.sale_price_dates_from AS sale_price_dates_from',
					'products_services.sale_price_dates_to AS sale_price_dates_to',*/
					'products_services.price AS price',
					'products_services.sold_individually AS sold_individually',
					'products_services.manage_stock AS manage_stock',
					'products_services.backorders AS backorders',
					'products_services.stock AS stock',
					'products_services.existing AS existing'


					)
				->where('type', 'product')
				->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products_services.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->paginate(10);
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->paginate(10);
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}
 
	public static function getListedProducts($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('products_services')
				->select(
					'products_services.id AS id',
					'products_services.title AS title',
					'products_services.permalink AS permalink',
					'products_services.product_type AS product_type',
					'products_services.image AS image',
					'products_services.intro AS intro',
					'products_services.content AS content',
					'products_services.visibility AS visibility',
					'products_services.stock_status AS stock_status',
					'products_services.total_sales AS total_sales',
					'products_services.downloadable AS downloadable',
					'products_services.virtual AS virtual',
					'products_services.regular_price AS regular_price',
					'products_services.sale_price AS sale_price',
					'products_services.purchase_note AS purchase_note',
					'products_services.featured AS featured',
					'products_services.weight AS weight',
					'products_services.length AS length',
					'products_services.width AS width',
					'products_services.height AS height',
					'products_services.sku AS sku',
					'products_services.status AS status',
					'products_services.visibility AS visibility',
					/*'products_services.sale_price_dates_from AS sale_price_dates_from',
					'products_services.sale_price_dates_to AS sale_price_dates_to',*/
					'products_services.price AS price',
					'products_services.sold_individually AS sold_individually',
					'products_services.manage_stock AS manage_stock',
					'products_services.backorders AS backorders',
					'products_services.stock AS stock'


					)
				->where('type', 'product')
				->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products_services.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->get();
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	public static function countProducts()
    {
        try
        {
            $products_services['total'] = ProductService::whereNull('deleted_at')->where('type', 'product')->count();
            return array('status' => 1, 'number' => $products_services);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

	public static function getPrices($id = null)
	{
	/*	try 
		{ */
			$entry = DB::table('products_services')
				->select(
					'products_services.id AS id',
					'products_services.price AS price'
				);

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products_services.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			} else {
				$entry->get();
			}
			// Default return
			$entries = $entry;

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	} 


	public static function checkProduct($title)
	{
		try 
		{ 
			$entry = DB::table('products_services')->where('title', $title)->where('type', 'product')->first();

			return array('status' => 1, 'entry' => $entry);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	} 

	public static function checkUpdate($id)
	{
		try 
		{ 
			$entry = DB::table('products_services')->where('id', $id)->where('type', 'product')->first();

			return array('status' => 1, 'entry' => $entry);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	} 

	//---------------------------------------Services------------------------------------------//

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntriesServices($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('products_services')
				->select(
					'products_services.id AS id',
					'products_services.title AS title',
					'products_services.intro AS intro',
					'products_services.measurement AS measurement',
					'products_services.amount AS amount',
					'products_services.price AS price',
					'products_services.discount AS discount',
					'products_services.tax AS tax'
				)
				->where('type', 'service')
				->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products_services.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->paginate(10);
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->paginate(10);
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	public static function getListedServices($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('products_services')
				->select(
					'products_services.id AS id',
					'products_services.title AS title',
					'products_services.intro AS intro',
					'products_services.measurement AS measurement',
					'products_services.amount AS amount',
					'products_services.price AS price',
					'products_services.discount AS discount',
					'products_services.tax AS tax'
				)
				->where('type', 'service')
				->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products_services.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->get();
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	public static function getPaginatedServices($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('products_services')
				->select(
					'products_services.id AS id',
					'products_services.title AS title',
					'products_services.intro AS intro',
					'products_services.measurement AS measurement',
					'products_services.amount AS amount',
					'products_services.price AS price',
					'products_services.discount AS discount',
					'products_services.tax AS tax'
				)->where('type', 'service');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products_services.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->paginate(10);
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->paginate(10);
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
