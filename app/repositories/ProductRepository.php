<?php

/*
*	ProductRepository
*
*	Handles backend functions
*/



class ProductRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created tag(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $intro, $permalink, $sku, $price, $sale_price, $stock, $total_sales, $stock_status, $sold_individually, $weight, $length, $width, $height, $status, $product_type, $content, $visibility, $downloadable, $featured, $virtual, $purchase_note, $manage_stock, $backorders, $product_attribute, $product_category, $product_tag, $image = null)
	{
		try {

			DB::beginTransaction();


			$entry = new ServiceProduct;
			$entry->title = $title;
			$entry->intro = $intro;
			$entry->permalink = $permalink;
			$entry->sku = $sku;
			$entry->price = $price;
			$entry->sale_price = $sale_price;
			$entry->stock = $stock;
			$entry->total_sales = $total_sales;
			$entry->stock_status = $stock_status;
			$entry->sold_individually = $sold_individually;
			$entry->weight = $weight;
			$entry->length = $length;
			$entry->width = $width;
			$entry->height = $height;
			$entry->status = $status;
			$entry->product_type = $product_type;
			$entry->content = $content;
			$entry->visibility = $visibility;
			$entry->downloadable = $downloadable;
			$entry->featured = $featured;
			$entry->virtual = $virtual;
			$entry->purchase_note = $purchase_note;
			$entry->manage_stock = $manage_stock;
			$entry->backorders = $backorders;
			

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/product/";
				$thumbImagePath = public_path() . "/uploads/frontend/product/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(810, 600)
					->save($largeImagePath . $imagename) // original
					->crop(810, 600)
					->resize(150, 150)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$entry->image = $imagename;
				}
			}

			$entry->save();

			$product = DB::table('products')->orderBy('created_at', 'desc')->first();

			$newproduct = $product->id;

			if ($product_attribute != null)
			{
				foreach ($product_attribute as $key=>$value)
				{
					$productattribute = new ProductsAttributes;
					$productattribute->product_id = $newproduct;
					$productattribute->attribute_id = $value;
					$productattribute->save();
				}
			}

			if ($product_category != null)
			{
				foreach ($product_category as $key=>$value)
				{
					$productcategory = new ProductsCategories;
					$productcategory->product_id = $newproduct;
					$productcategory->category_id = $value;
					$productcategory->save();
				}
			}

			if ($product_tag != null)
			{
				foreach ($product_tag as $key=>$value)
				{
					$producttags = new ProductsTags;
					$producttags->product_id = $newproduct;
					$producttags->tag_id = $value;
					$producttags->save();
				}
			}


			DB::commit();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	/**
	 * Update the specified tag(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $intro, $permalink, $sku, $price, $sale_price, $stock, $total_sales, $stock_status, $sold_individually, $weight, $length, $width, $height, $status, $product_type, $content, $visibility, $downloadable, $featured, $virtual, $purchase_note, $manage_stock, $backorders, $product_attribute, $product_category, $product_tag, $image = null)
	{
    	
    		try {

    			DB::beginTransaction();

			$entry = ServiceProduct::find($id);
			$entry->title = $title;
			$entry->intro = $intro;
			$entry->permalink = $permalink;
			$entry->sku = $sku;
			$entry->price = $price;
			$entry->sale_price = $sale_price;
			$entry->stock = $stock;
			$entry->total_sales = $total_sales;
			$entry->stock_status = $stock_status;
			$entry->sold_individually = $sold_individually;
			$entry->weight = $weight;
			$entry->length = $length;
			$entry->width = $width;
			$entry->height = $height;
			$entry->status = $status;
			$entry->product_type = $product_type;
			$entry->content = $content;
			$entry->visibility = $visibility;
			$entry->downloadable = $downloadable;
			$entry->featured = $featured;
			$entry->virtual = $virtual;
			$entry->purchase_note = $purchase_note;
			$entry->manage_stock = $manage_stock;
			$entry->backorders = $backorders;


			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/product/";
				$thumbImagePath = public_path() . "/uploads/frontend/product/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(810, 600)
					->save($largeImagePath . $imagename) // original
					->crop(810, 600)
					->resize(150, 150)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$entry->image = $imagename;
				}
			}

			$entry->save();

			$product = ProductsAttributes::where('product_id', 'like', $id)->delete();

			if ($product_attribute != null)
			{
				foreach ($product_attribute as $key=>$value)
				{
					$productattribute = new ProductsAttributes;
					$productattribute->product_id = $id;
					$productattribute->attribute_id = $value;
					$productattribute->save();
				}
			}

			$product = ProductsCategories::where('product_id', 'like', $id)->delete();

			if ($product_category != null)
			{
				foreach ($product_category as $key=>$value)
				{
					$productcategory = new ProductsCategories;
					$productcategory->product_id = $id;
					$productcategory->category_id = $value;
					$productcategory->save();
				}
			}

			$product = ProductsTags::where('product_id', 'like', $id)->delete();

			if ($product_tag != null)
			{
				foreach ($product_tag as $key=>$value)
				{
					$producttag = new ProductsTags;
					$producttag->product_id = $id;
					$producttag->tag_id = $value;
					$producttag->save();
				}
			}


			DB::commit();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}

	/**
	 * Store a newly created tag(s) in storage.
	 *
	 * @return Response
	 */
	public function import($id, $title, $intro, $permalink, $sku, $price, $sale_price, $stock, $total_sales, $stock_status, $sold_individually, $weight, $length, $width, $height, $status, $product_type, $content, $visibility, $downloadable, $featured, $virtual, $purchase_note, $manage_stock, $backorders, $product_attribute, $product_category, $product_tag, $image = null, $created_at, $updated_at)
	{
		try {

			DB::beginTransaction();

			$entry = new ImportProduct;
			$entry->id = $id;
			$entry->title = $title;
			$entry->intro = $intro;
			$entry->permalink = $permalink;
			$entry->sku = $sku;
			$entry->price = $price;
			$entry->sale_price = $sale_price;
			$entry->stock = $stock;
			$entry->total_sales = $total_sales;
			$entry->stock_status = $stock_status;
			$entry->sold_individually = $sold_individually;
			$entry->weight = $weight;
			$entry->length = $length;
			$entry->width = $width;
			$entry->height = $height;
			$entry->status = $status;
			$entry->product_type = $product_type;
			$entry->content = $content;
			$entry->visibility = $visibility;
			$entry->downloadable = $downloadable;
			$entry->featured = $featured;
			$entry->virtual = $virtual;
			$entry->purchase_note = $purchase_note;
			$entry->manage_stock = $manage_stock;
			$entry->backorders = $backorders;
			$entry->created_at = $created_at;
			$entry->updated_at = $updated_at;
			

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/product/";
				$thumbImagePath = public_path() . "/uploads/frontend/product/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(810, 600)
					->save($largeImagePath . $imagename) // original
					->crop(810, 600)
					->resize(150, 150)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$entry->image = $imagename;
				}
			}

			$entry->save();

			$product = DB::table('products')->orderBy('created_at', 'desc')->first();

			$newproduct = $product->id;

			if ($product_attribute != null)
			{
				foreach ($product_attribute as $key=>$value)
				{
					$productattribute = new ProductsAttributes;
					$productattribute->product_id = $newproduct;
					$productattribute->attribute_id = $value;
					$productattribute->save();
				}
			}

			if ($product_category != null)
			{
				foreach ($product_category as $key=>$value)
				{
					$productcategory = new ProductsCategories;
					$productcategory->product_id = $newproduct;
					$productcategory->category_id = $value;
					$productcategory->save();
				}
			}

			if ($product_tag != null)
			{
				foreach ($product_tag as $key=>$value)
				{
					$producttags = new ProductsTags;
					$producttags->product_id = $newproduct;
					$producttags->tag_id = $value;
					$producttags->save();
				}
			}


			DB::commit();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


	/**
	 * Store a newly created tag(s) in storage.
	 *
	 * @return Response
	 */
	public function importupdate($id, $title, $intro, $permalink, $sku, $price, $sale_price, $stock, $total_sales, $stock_status, $sold_individually, $weight, $length, $width, $height, $status, $product_type, $content, $visibility, $downloadable, $featured, $virtual, $purchase_note, $manage_stock, $backorders, $product_attribute, $product_category, $product_tag, $image = null, $created_at, $updated_at)
	{
		try {

			DB::beginTransaction();

			$entry = ImportProduct::find($id);
			$entry->title = $title;
			$entry->intro = $intro;
			$entry->permalink = $permalink;
			$entry->sku = $sku;
			$entry->price = $price;
			$entry->sale_price = $sale_price;
			$entry->stock = $stock;
			$entry->total_sales = $total_sales;
			$entry->stock_status = $stock_status;
			$entry->sold_individually = $sold_individually;
			$entry->weight = $weight;
			$entry->length = $length;
			$entry->width = $width;
			$entry->height = $height;
			$entry->status = $status;
			$entry->product_type = $product_type;
			$entry->content = $content;
			$entry->visibility = $visibility;
			$entry->downloadable = $downloadable;
			$entry->featured = $featured;
			$entry->virtual = $virtual;
			$entry->purchase_note = $purchase_note;
			$entry->manage_stock = $manage_stock;
			$entry->backorders = $backorders;
			$entry->created_at = $created_at;
			$entry->updated_at = $updated_at;
			

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/product/";
				$thumbImagePath = public_path() . "/uploads/frontend/product/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(810, 600)
					->save($largeImagePath . $imagename) // original
					->crop(810, 600)
					->resize(150, 150)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$entry->image = $imagename;
				}
			}

			$entry->save();

			$product = DB::table('products')->orderBy('created_at', 'desc')->first();

			$newproduct = $product->id;

			if ($product_attribute != null)
			{
				foreach ($product_attribute as $key=>$value)
				{
					$productattribute = new ProductsAttributes;
					$productattribute->product_id = $newproduct;
					$productattribute->attribute_id = $value;
					$productattribute->save();
				}
			}

			if ($product_category != null)
			{
				foreach ($product_category as $key=>$value)
				{
					$productcategory = new ProductsCategories;
					$productcategory->product_id = $newproduct;
					$productcategory->category_id = $value;
					$productcategory->save();
				}
			}

			if ($product_tag != null)
			{
				foreach ($product_tag as $key=>$value)
				{
					$producttags = new ProductsTags;
					$producttags->product_id = $newproduct;
					$producttags->tag_id = $value;
					$producttags->save();
				}
			}


			DB::commit();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}



	/**
	 * Store a newly created tag(s) in storage.
	 *
	 * @return Response
	 */
	public function errorproduct($product_name, $price)
	{
		try {
			$entry = new Product;
			$entry->title = $product_name;
			$entry->price = $price;
			$entry->existing = '0';
			$entry->save();

			return array('status' => 1, 'product_id' => $entry->id);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


	/**
	 * Remove the specified tag(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = Product::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
