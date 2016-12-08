<?php

class ProductsAttributes extends Eloquent
{
	protected $table = 'products_attributes';

 	public static function getAttributesByProduct($id)
	{

		try
		{
			$productattributes = DB::table('products_attributes')
				->join('attributes', 'attributes.id', '=', 'products_attributes.attribute_id')
 				->select(
 					'products_attributes.id AS id',
 					'products_attributes.attribute_id AS attribute_id',
					'products_attributes.product_id AS product_id',
					'attributes.title AS attributetitle'
 				)
 				->where('products_attributes.product_id', '=', $id)
				->get();

			return array('status' => 1, 'productattributes' => $productattributes);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}