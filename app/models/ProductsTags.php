<?php

class ProductsTags extends Eloquent
{
	protected $table = 'products_tags';

 	public static function getTagsByProduct($id)
	{

		try
		{
			$producttags = DB::table('products_tags')
				->join('tags', 'tags.id', '=', 'products_tags.tag_id')
 				->select(
 					'products_tags.id AS id',
 					'products_tags.tag_id AS tag_id',
					'products_tags.product_id AS product_id',
					'tags.title AS tagstitle'
 				)
 				->where('products_tags.product_id', '=', $id)
				->get();

			return array('status' => 1, 'producttags' => $producttags);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}