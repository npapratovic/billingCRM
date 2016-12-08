<?php

/*
*	CompanyRepository
*
*	Handles backend functions
*/



class CompanyRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created companies(s) in storage.
	 *
	 * @return Response
	 */
	public function store($user_id, $title, $oib, $address, $city, $post_number, $country, $phone_number, $email, $iban, $company_note, $tax_percentage, $first_name, $last_name, $mobile_phone_number, $website, $swift, $pdv_id, $free_input, $show_text, $tax_base, $image)
	{
		try {
			$entry = new Company;
			$entry->user_id = $user_id; 
			$entry->title = $title; 
			$entry->oib = $oib;
			$entry->address = $address;
			$entry->city = $city;
			$entry->post_number = $post_number;
			$entry->country = $country;
			$entry->phone_number = $phone_number;
			$entry->email = $email;
			$entry->iban = $iban;
			$entry->company_note = $company_note;
			$entry->tax_percentage = $tax_percentage;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->mobile_phone_number = $mobile_phone_number;
			$entry->website = $website;
			$entry->swift = $swift;
			$entry->pdv_id = $pdv_id;
			$entry->free_input = $free_input;
			$entry->show_text = $show_text;
			$entry->tax_base = $tax_base;

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/company/";
				$thumbImagePath = public_path() . "/uploads/frontend/company/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $title . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

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
	 * Update the specified companies(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $oib, $address, $city, $post_number, $country, $phone_number, $email, $iban, $company_note, $tax_percentage, $first_name, $last_name, $mobile_phone_number, $website, $swift, $pdv_id, $free_input, $show_text, $tax_base, $image)
	{
    	
    		try {
			$entry = Company::find($id);
			$entry->title = $title; 
			$entry->oib = $oib;
			$entry->address = $address;
			$entry->city = $city;
			$entry->post_number = $post_number;
			$entry->email = $email;
			$entry->iban = $iban;
			$entry->company_note = $company_note;
			$entry->tax_percentage = $tax_percentage;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->mobile_phone_number = $mobile_phone_number;
			$entry->website = $website;
			$entry->swift = $swift;
			$entry->pdv_id = $pdv_id;
			$entry->free_input = $free_input;
			$entry->show_text = $show_text;
			$entry->tax_base = $tax_base;

 			$oldImage = $entry->image;

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/company/";
				$thumbImagePath = public_path() . "/uploads/frontend/company/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $title . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

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
					$largeOldImagePath = public_path() . "/uploads/frontend/company/" . $oldImage;
					$thumbOldImagePath = public_path() . "/uploads/frontend/company/thumbs"  . $oldImage;

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
	 * Remove the specified companies(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = User::find($id);

			$entry->delete();

			DB::table('assigned_roles')->where('assigned_roles.user_id', '=', $id)->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
