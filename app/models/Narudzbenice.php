<?php

class Narudzbenice extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'narudzbenice';

	protected $fillable = array('narudzbenica_number', 'client_id', 'employee_id', 'tax', 'hide_amount', 'client_address', 'client_oib', 'payment_way', 'narudzbenica_start', 'narudzbenica_end', 'narudzbenica_note', 'narudzbenica_language', 'valute');

	// New entry validation
	public static $store_rules = array(
		'narudzbenica_number'					=>	'required',
	);

	// Edit entry validation
	public static $update_rules = array(
		'narudzbenica_number'					=>	'required',
	);
	

	public function client()
	{
		return $this->belongsTo('Client', 'client_id', 'id');
	}

	public function products()
	{
		return $this->hasMany('NarudzbeniceProduct');
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
			$entry = DB::table('narudzbenice')
				->join('users', 'users.id', '=', 'narudzbenice.client_id')
				->join('city', 'city.id', '=', 'users.city')
				->select(
					'narudzbenice.id AS id',
					'narudzbenice.narudzbenica_number AS narudzbenica_number',
					'narudzbenice.client_id AS client_id',
					'narudzbenice.employee_id AS employee_id',
					'narudzbenice.tax AS tax',
					'narudzbenice.hide_amount AS hide_amount',
					'narudzbenice.client_id AS client_id',
					'narudzbenice.client_address AS client_address',
					'narudzbenice.client_oib AS client_oib',
					'narudzbenice.payment_way AS payment_way',
					'narudzbenice.narudzbenica_start AS narudzbenica_start',
					'narudzbenice.narudzbenica_end AS narudzbenica_end',
					'narudzbenice.narudzbenica_note AS narudzbenica_note',
					'narudzbenice.narudzbenica_language AS narudzbenica_language',
					'narudzbenice.valute AS valute',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.address AS address',
					'users.zip AS zip',
					'users.phone AS phone',
					'users.email AS email',
					'city.name AS cityname'
					)->whereNull('narudzbenice.deleted_at');
				
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('narudzbenice.id', '=', $id)->first();
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


	public static function countNarudzbenice()
    {
        try
        {
            $narudzbenice['total'] = Narudzbenice::whereNull('deleted_at')->count();
            return array('status' => 1, 'number' => $narudzbenice);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

    public static function getLastNarudzbenica()
    {
     	try 
    	{  
    		$entry = DB::table('narudzbenice')
    			->select(
    				'narudzbenice.narudzbenica_number AS narudzbenica_number'
    			);
    
    		// Default return
    		$entry = $entry->orderBy('created_at', 'desc')->first();
    		return array('status' => 1, 'entry' => $entry);
     	}
    	catch (Exception $exp)
    	{
    		return array('status' => 0, 'reason' => $exp->getMessage());
    	}    
    } 

}