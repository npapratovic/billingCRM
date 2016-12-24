<?php

class City extends Eloquent
{
	protected $table = 'city';

	  public function client()
    {

        return $this->hasMany('User', 'city', 'id');
    }

	  public function offers()
    {
        return $this->hasMany('Offer');
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
			$entry = DB::table('city')
				->select(
					'city.id AS id',
					'city.name AS name',
					'city.permalink AS permalink'
				);

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('city.id', '=', $id)->first();
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
