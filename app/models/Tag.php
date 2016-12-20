<?php

class Tag extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'tags';

	protected $fillable = array('title', 'permalink', 'description', 'created_at', 'updated_at');

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'permalink'				=>	'required',
		'description'				=>	'required'
	);

	// Edit entry validation
	public static $update_rules = array(
		'title'					=>	'required',
		'permalink'				=>	'required',
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
			$entry = DB::table('tags')
				->select(
					'tags.id AS id',
					'tags.title AS title',
					'tags.permalink AS permalink',
					'tags.description AS description'
				)->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('tags.id', '=', $id)->first();
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
			$entry = DB::table('tags')
				->select(
					'tags.id AS id',
					'tags.title AS title',
					'tags.permalink AS permalink',
					'tags.description AS description'
				)->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('tags.id', '=', $id)->first();
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