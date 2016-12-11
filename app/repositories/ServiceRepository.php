<?php

/*
*	ServiceRepository
*
*	Handles backend functions
*/



class ServiceRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created bill(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $content, $measurement, $amount, $price, $discount, $tax)
	{
		try {

			$entry = new ProductService;
			$entry->title = $title;
			$entry->content = $content;
			$entry->measurement = $measurement;
			$entry->amount = $amount;
			$entry->price = $price;
			$entry->discount = $discount;
			$entry->tax = $tax;
			$entry->type = 'service';

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	/**
	 * Update the specified bill(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $content, $measurement, $amount, $price, $discount, $tax)
	{
    	
    		try {

			$entry = ProductService::find($id);
			$entry->title = $title;
			$entry->content = $content;
			$entry->measurement = $measurement;
			$entry->amount = $amount;
			$entry->price = $price;
			$entry->discount = $discount;
			$entry->tax = $tax;
			$entry->type = 'service';

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}


	/**
	 * Remove the specified bill(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = ProductService::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
