<?php

/*
*	OfferRepository
*
*	Handles backend functions
*/



class OfferRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created invoice(s) in storage.
	 *
	 * @return Response
	 */
	public function store($offer_number, $tax, $hide_amount, $client_id, $employee_id, $client_address, $client_oib, $product, $measurement, $amount, $price, $discount, $taxpercent, $payment_way, $offer_start, $offer_end, $offer_note, $offer_language, $valute)
	{
		try {

			DB::beginTransaction();

			$entry = new Offer;
			$entry->offer_number = $offer_number;
			$entry->tax = $tax;
			$entry->hide_amount = $hide_amount;
			$entry->client_id = $client_id;
			$entry->employee_id = $employee_id;
			$entry->client_address = $client_address;
			$entry->client_oib = $client_oib;
			$entry->payment_way = $payment_way;
			$entry->offer_start = $offer_start;
			$entry->offer_end = $offer_end;
			$entry->offer_note = $offer_note;
			$entry->offer_language = $offer_language;
			$entry->valute = $valute;

			$entry->save();


			$offer = DB::table('offers')->orderBy('created_at', 'desc')->first();


			$i = 0;
			$ilen = count($product); 

			if ($product != null)
			{

				foreach ($product as $key=>$value)
				{
					if(++$i == $ilen) break;
					$orderproduct = new OffersProducts;
					$orderproduct->offer_id = $offer->id;
					$orderproduct->product_id = $value;
					$orderproduct->measurement = $measurement[$key];
					$orderproduct->amount = $amount[$key];
					$orderproduct->price = $price[$key];
					$orderproduct->discount = $discount[$key];
					$orderproduct->taxpercent = $taxpercent[$key];
					$orderproduct->save();
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
	 * Update the specified invoice(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $offer_number, $tax, $hide_amount, $client_id, $client_address, $client_oib, $product, $measurement, $amount, $price, $discount, $taxpercent, $payment_way, $offer_start, $offer_end, $offer_note, $offer_language, $valute)
	{
    	
    		try {
			DB::beginTransaction();

			$entry = Offer::find($id);
			$entry->offer_number = $offer_number;
			$entry->tax = $tax;
			$entry->hide_amount = $hide_amount;
			$entry->client_id = $client_id;
			$entry->client_address = $client_address;
			$entry->client_oib = $client_oib;
			$entry->payment_way = $payment_way;
			$entry->offer_start = $offer_start;
			$entry->offer_end = $offer_end;
			$entry->offer_note = $offer_note;
			$entry->offer_language = $offer_language;
			$entry->valute = $valute;

			$entry->save();


			$offer = DB::table('offers')->orderBy('created_at', 'desc')->first();


			$i = 0;
			$ilen = count($product); 

			if ($product != null)
			{
				DB::table('offers_products')->where('offer_id', '=', $id)->delete();
				foreach ($product as $key=>$value)
				{
					if(++$i == $ilen) break;
					$orderproduct = new OffersProducts;
					$orderproduct->offer_id = $offer->id;
					$orderproduct->product_id = $value;
					$orderproduct->measurement = $measurement[$key];
					$orderproduct->amount = $amount[$key];
					$orderproduct->price = $price[$key];
					$orderproduct->discount = $discount[$key];
					$orderproduct->taxpercent = $taxpercent[$key];
					$orderproduct->save();
				}
			}

			DB::commit();

			return array('status' => 1);

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}


	/**
	 * Remove the specified invoice(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = Offer::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
