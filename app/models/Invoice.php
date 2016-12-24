<?php

class Invoice extends Eloquent
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	protected $table = 'invoices';

	// New entry validation
	public static $store_rules = array(
		'client_id'					=>	'required',
		'invoice_number'				=>	'required|integer'
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required',
		'client_id'					=>	'required',
		'invoice_number'				=>	'required|integer'
	);	

	protected $fillable = array('invoice_number', 'client_id', 'employee_id', 'invoice_type', 'tax', 'address', 'cityname', 'payment_way',
		'invoice_date', 'invoice_date_deadline', 'invoice_date_ship', 'invoice_note', 'intern_note', 'repeat_invoice', 'invoice_language',
		'valute', 'from_order', 'deleted_at');
	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/


	  public function client()
    {
        return $this->belongsTo('User');
    }

     public function invoicesProducts()
    {
        return $this->hasMany('InvoicesProducts', 'invoice_id', 'id');
    }




	public static function getEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('invoices')
				->join('users', 'users.id', '=', 'invoices.client_id')
				->select(
					'invoices.id AS id',
					'invoices.invoice_number AS invoice_number',
					'invoices.tax AS tax',
					'invoices.client_id AS client_id',
					'invoices.employee_id AS employee_id',
					'invoices.invoice_type AS invoice_type',
					'invoices.address AS address',
					'invoices.cityname AS cityname',
					'invoices.payment_way AS payment_way',
					'invoices.invoice_date AS invoice_date',
					'invoices.invoice_date_deadline AS invoice_date_deadline',
					'invoices.invoice_date_ship AS invoice_date_ship',
					'invoices.invoice_note AS invoice_note',
					'invoices.intern_note AS intern_note',
					'invoices.repeat_invoice AS repeat_invoice',
					'invoices.invoice_language AS invoice_language',
					'invoices.valute AS valute',
					'invoices.from_order AS from_order',
					'users.id AS userid',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.address AS address',
					'users.zip AS zip',
					'users.phone AS phone',
					'users.email AS email'
					
 				)->whereNull('invoices.deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('invoices.id', '=', $id)->first();
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


	public static function countInvoices()
    {
        try
        {
            $invoices['total'] = Invoice::whereNull('deleted_at')->count();
            return array('status' => 1, 'number' => $invoices);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

    public static function getLastInvoice()
    {
     	try 
    	{  
    		$entry = DB::table('invoices')
    			->select(
    				'invoices.invoice_number AS invoice_number'
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
