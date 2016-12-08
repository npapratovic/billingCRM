<?php

/*
*	ProductRepository
*
*	Handles backend functions
*/



class CategoryRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created category(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $description, $image = null)
	{
		try {

			$entry = new Category;
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->description = $description;

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/category/";
				$thumbImagePath = public_path() . "/uploads/frontend/category/thumbs/";

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

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	/**
	 * Update the specified category(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink, $description, $image = null)
	{
    	
    		try {

			$entry = Category::find($id);
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->description = $description;

 			$oldImage = $entry->image;

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/category/";
				$thumbImagePath = public_path() . "/uploads/frontend/category/thumbs/";

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
					$largeOldImagePath = public_path() . "/uploads/frontend/category/" . $oldImage;
					$thumbOldImagePath = public_path() . "/uploads/frontend/category/thumbs"  . $oldImage;

					if (File::exists($largeOldImagePath))
					{
						File::delete($largeOldImagePath);
					}
					if (File::exists($thumbOldImagePath))
					{
						File::delete($thumbOldImagePath);
					}

					$entry->image = $imagename;
				}
			}

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}


	/**
	 * Remove the specified category(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = Category::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
