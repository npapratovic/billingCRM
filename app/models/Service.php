<?php

class Service extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	protected $table = 'products_services';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
	);	

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
				);
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