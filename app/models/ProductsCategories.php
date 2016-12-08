<?php

class ProductsCategories extends Eloquent
{
	protected $table = 'products_categories';

 	public static function getCategoriesByProduct($id)
	{

		try
		{
			$productcategories = DB::table('products_categories')
				->join('categories', 'categories.id', '=', 'products_categories.category_id')
 				->select(
 					'products_categories.id AS id',
 					'products_categories.category_id AS category_id',
					'products_categories.product_id AS product_id',
					'categories.title AS categorytitle'
 				)
 				->where('products_categories.product_id', '=', $id)
				->get();

			return array('status' => 1, 'productcategories' => $productcategories);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}