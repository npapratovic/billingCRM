<?php

class Region extends Eloquent
{
	protected $table = 'region';

	  public function client()
    {
        return $this->hasMany('User', 'region', 'id');
    }

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
			$entry = DB::table('region')
				->select(
					'region.id AS id',
					'region.name AS name',
					'region.permalink AS permalink'
				);

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('region.id', '=', $id)->first();
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
