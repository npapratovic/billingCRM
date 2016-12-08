<?php

/*
*	DispatchRepository
*
*	Handles backend functions
*/



class DispatchRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created invoice(s) in storage.
	 *
	 * @return Response
	 */
	public function store($dispatch_number, $taxable, $hide_amount, $client_id, $employee_id, $client_address, $client_oib, $product, $measurement, $amount, $price, $discount, $taxpercent, $stock_label, $dispatch_employee, $dispatch_date_ship, $dispatch_note, $dispatch_language, $valute)
	{
		//try {


		

		DB::beginTransaction();

			$entry = new Dispatch;
			$entry->dispatch_number = $dispatch_number;
			$entry->taxable = $taxable;
			$entry->hide_amount = $hide_amount;
			$entry->client_id = $client_id;
			$entry->employee_id = $employee_id;
			$entry->client_address = $client_address;
			$entry->client_oib = $client_oib;
			$entry->stock_label = $stock_label;
			$entry->dispatch_employee = $dispatch_employee;
			$entry->dispatch_date_ship = $dispatch_date_ship;
			$entry->dispatch_note = $dispatch_note;
			$entry->dispatch_language = $dispatch_language;
			$entry->valute = $valute;

			$entry->save();

			


			$dispatch = DB::table('dispatches')->orderBy('created_at', 'desc')->first();



			$i = 0;
			$ilen = count($product); 

			if ($product != null)
			{

				foreach ($product as $key=>$value)
				{
					if(++$i == $ilen) break;
					$dispatchproduct = new DispatchesProducts;
					$dispatchproduct->dispatch_id = $dispatch->id;
					$dispatchproduct->product_id = $value;
					$dispatchproduct->measurement = $measurement[$key];
					$dispatchproduct->amount = $amount[$key];
					$dispatchproduct->price = $price[$key];
					$dispatchproduct->discount = $discount[$key];
					$dispatchproduct->taxpercent = $taxpercent[$key];
					$dispatchproduct->save();
				}
			}

			DB::commit();
	

			return array('status' => 1);
		//}

		/*catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	}

	/**
	 * Update the specified invoice(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $dispatch_number, $taxable, $hide_amount, $client_id, $client_address, $client_oib, $product, $measurement, $amount, $price, $discount, $taxpercent, $stock_label, $dispatch_employee, $dispatch_date_ship, $dispatch_note, $dispatch_language, $valute)
	{



     
		
    	    
    		try {

            DB::beginTransaction();

			$entry = Dispatch::find($id);
			$entry->dispatch_number = $dispatch_number;
			$entry->taxable = $taxable;
			$entry->hide_amount = $hide_amount;
			$entry->client_id = $client_id;
			$entry->client_address = $client_address;
			$entry->client_oib = $client_oib;
			$entry->stock_label = $stock_label;
			$entry->dispatch_employee = $dispatch_employee;
			$entry->dispatch_date_ship = $dispatch_date_ship;
			$entry->dispatch_note = $dispatch_note;
			$entry->dispatch_language = $dispatch_language;
			$entry->valute = $valute;
           
			$entry->save();
           
            $dispatch = DB::table('dispatches')->orderBy('created_at', 'desc')->first();


			$i = 0;
			$ilen = count($product); 

			if ($product != null)
			{
				DB::table('dispatches_products')->where('dispatch_id', '=', $id)->delete();

				foreach ($product as $key=>$value)
				{
					if(++$i == $ilen) break;
					$dispatchproduct = new DispatchesProducts;
					$dispatchproduct->dispatch_id = $dispatch->id;
					$dispatchproduct->product_id = $value;
					$dispatchproduct->measurement = $measurement[$key];
					$dispatchproduct->amount = $amount[$key];
					$dispatchproduct->price = $price[$key];
					$dispatchproduct->discount = $discount[$key];
					$dispatchproduct->taxpercent = $taxpercent[$key];
					$dispatchproduct->save();
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
	 * Remove the specified invoice(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{

			DB::table('dispatches_products')->where('dispatch_id', '=', $id)->delete();

			$entry = Dispatch::find($id);

			$entry->delete();
			

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
