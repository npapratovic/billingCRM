<?php

class ImportedOrderProduct extends Eloquent
{
	protected $table = 'imported_order_products';


	  public function invoices_products()
    {
        return $this->hasMany('InvoicesProducts');
    }

      public function ordersProducts()
    {
        return $this->hasMany('OrdersProducts');
    }


	public static function getEntry($id)
	{
		try
		{
			$entry = DB::table('imported_order_products')
				->select(
					'imported_order_products.id AS id',
					'imported_order_products.subtotal AS subtotal',
					'imported_order_products.subtotal_tax AS subtotal_tax',
					'imported_order_products.total AS total',
					'imported_order_products.total_tax AS total_tax',
					'imported_order_products.price AS price',
					'imported_order_products.quantity AS quantity',
					'imported_order_products.tax_class AS tax_class',
					'imported_order_products.name AS title',
					'imported_order_products.product_id AS product_id',
					'imported_order_products.existing AS existing',
					'imported_order_products.type AS type'
					)->whereNull('deleted_at');

			// Retrieve specific entry
			$entry = $entry->where('imported_order_products.id', '=', $id)->get();
			return array('status' => 1, 'entry' => $entry);

		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	public static function getProductsByOrder($id)
	{
		try
		{
			$entry = DB::table('imported_order_products')
				->select(
					'imported_order_products.id AS id',
					'imported_order_products.subtotal AS subtotal',
					'imported_order_products.subtotal_tax AS subtotal_tax',
					'imported_order_products.total AS total',
					'imported_order_products.total_tax AS total_tax',
					'imported_order_products.price AS price',
					'imported_order_products.quantity AS quantity',
					'imported_order_products.tax_class AS tax_class',
					'imported_order_products.name AS title',
					'imported_order_products.product_id AS product_id',
					'imported_order_products.existing AS existing'
					)->whereNull('deleted_at');

			// Retrieve specific entry
			$entries = $entry->get();
			return array('status' => 1, 'entries' => $entries);

		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	public static function getPrices($id = null)
	{
	/*	try 
		{ */
			$entry = DB::table('imported_order_products')
				->select(
					'imported_order_products.id AS id',
					'imported_order_products.price AS price'
				);

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('imported_order_products.id', '=', $id)->first();
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
}
