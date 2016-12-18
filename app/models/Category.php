<?php

class Category extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'categories';

	protected $fillable = array('title','permalink','description','image', 'created_at','updated_at');

	// New category validation
	public static $store_rules = array(
		'title'						=>	'required',
		'permalink'					=>	'required',
		'description'				=>	'required',
		'image'						=>	'required'
	);

	// Edit category validation
	public static $update_rules = array(
		'title'						=>	'required',
		'permalink'					=>	'required',
		'description'				=>	'required'
	);
   

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('categories')
				->select(
					'categories.id AS id',
					'categories.title AS title',
					'categories.permalink AS permalink',
					'categories.description AS description',
					'categories.image AS image'
				)->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('categories.id', '=', $id)->first();
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


	public static function getList($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('categories')
				->select(
					'categories.id AS id',
					'categories.title AS title',
					'categories.permalink AS permalink',
					'categories.description AS description',
					'categories.image AS image'
				)->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('categories.id', '=', $id)->first();
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


}