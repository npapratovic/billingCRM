<?php

/*
*	NarudzbeniceRepository
*
*	Handles backend functions
*/



class NarudzbeniceRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created invoice(s) in storage.
	 *
	 * @return Response
	 */
	public function store($narudzbenica_number, $tax, $hide_amount, $client_id, $employee_id, $client_address, $client_oib, $product, $measurement, $amount, $price, $discount, $taxpercent, $payment_way, $narudzbenica_start, $narudzbenica_end, $narudzbenica_note, $narudzbenica_language, $valute)
	{
		try {

			DB::beginTransaction();

			$entry = new Narudzbenice;
			$entry->narudzbenica_number = $narudzbenica_number;
			$entry->tax = $tax;
			$entry->hide_amount = $hide_amount;
			$entry->client_id = $client_id;
			$entry->employee_id = $employee_id;
			$entry->client_address = $client_address;
			$entry->client_oib = $client_oib;
			$entry->payment_way = $payment_way;
			$entry->narudzbenica_start = $narudzbenica_start;
			$entry->narudzbenica_end = $narudzbenica_end;
			$entry->narudzbenica_note = $narudzbenica_note;
			$entry->narudzbenica_language = $narudzbenica_language;
			$entry->valute = $valute;

			$entry->save();


			$narudzbenica = DB::table('narudzbenice')->orderBy('created_at', 'desc')->first();


			$i = 0;
			$ilen = count($product); 

			if ($product != null)
			{

				foreach ($product as $key=>$value)
				{
					if(++$i == $ilen) break;
					$orderproduct = new NarudzbeniceProducts;
					$orderproduct->narudzbenica_id = $narudzbenica->id;
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
	public function update($id, $narudzbenica_number, $tax, $hide_amount, $client_id, $client_address, $client_oib, $product, $measurement, $amount, $price, $discount, $taxpercent, $payment_way, $narudzbenica_start, $narudzbenica_end, $narudzbenica_note, $narudzbenica_language, $valute)
	{
    	
    		try {
			DB::beginTransaction();

			$entry = Narudzbenice::find($id);
			$entry->narudzbenica_number = $narudzbenica_number;
			$entry->tax = $tax;
			$entry->hide_amount = $hide_amount;
			$entry->client_id = $client_id;
			$entry->client_address = $client_address;
			$entry->client_oib = $client_oib;
			$entry->payment_way = $payment_way;
			$entry->narudzbenica_start = $narudzbenica_start;
			$entry->narudzbenica_end = $narudzbenica_end;
			$entry->narudzbenica_note = $narudzbenica_note;
			$entry->narudzbenica_language = $narudzbenica_language;
			$entry->valute = $valute;

			$entry->save();


			$narudzbenica = DB::table('narudzbenice')->where('id', $id)->first();


			$i = 0;
			$ilen = count($product); 

			if ($product != null)
			{
				DB::table('narudzbenice_products')->where('narudzbenica_id', '=', $id)->delete();
				foreach ($product as $key=>$value)
				{
					if(++$i == $ilen) break;
					$orderproduct = new NarudzbeniceProducts;
					$orderproduct->narudzbenica_id = $narudzbenica->id;
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
			$entry = Narudzbenice::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}
}
