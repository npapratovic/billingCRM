<?php

/*
*	WorkingOrderRepository
*
*	Handles backend functions
*/



class WorkingOrderRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created working order(s) in storage.
	 *
	 * @return Response
	 */
	public function store($workingorder_number, $taxable, $hide_amount, $client_id, $employee_id, $client_address, $client_oib, $service, $measurement, $amount, $price, $discount, $taxpercent, $workingorder_employee, $workingorder_date_ship, $workingorder_note, $workingorder_description)
	{
		//try {


		DB::beginTransaction();

			$entry = new WorkingOrder;
			$entry->workingorder_number = $workingorder_number;
			$entry->taxable = $taxable;
			$entry->hide_amount = $hide_amount;
			$entry->client_id = $client_id;
			$entry->employee_id = $employee_id;
			$entry->client_address = $client_address;
			$entry->client_oib = $client_oib;
			$entry->workingorder_employee = $workingorder_employee;
			$entry->workingorder_date_ship = date("Y-m-d", strtotime($workingorder_date_ship));
			$entry->workingorder_note = $workingorder_note;
			$entry->workingorder_description = $workingorder_description;
           
			$entry->save();


			$workingorder = DB::table('workingorders')->orderBy('created_at', 'desc')->first();



			$i = 0;
			$ilen = count($service); 

			if ($service != null)
			{

				foreach ($service as $key=>$value)
				{
					if(++$i == $ilen) break;
					$dispatchproduct = new WorkingOrdersServices;
					$dispatchproduct->workingorder_id = $workingorder->id;
					$dispatchproduct->service_id = $value;
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
	 * Update the specified working order(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $workingorder_number, $taxable, $hide_amount, $client_id, $client_address, $client_oib, $service, $measurement, $amount, $price, $discount, $taxpercent, $workingorder_employee, $workingorder_date_ship, $workingorder_note, $workingorder_description)
	{
    	
    		try {

    		DB::beginTransaction();
            
			$entry = WorkingOrder::find($id);
			$entry->workingorder_number = $workingorder_number;
			$entry->taxable = $taxable;
			$entry->hide_amount = $hide_amount;
			$entry->client_id = $client_id;
			$entry->client_address = $client_address;
			$entry->client_oib = $client_oib;
			$entry->workingorder_employee = $workingorder_employee;
			$entry->workingorder_date_ship = date("Y-m-d", strtotime($workingorder_date_ship));
			$entry->workingorder_note = $workingorder_note;
			$entry->workingorder_description = $workingorder_description;

           
           
			$entry->save();


			$workingorder = DB::table('workingorders')->orderBy('created_at', 'desc')->first();

       
			$i = 0;
			$ilen = count($service); 
             
			if ($service != null)
			{
				DB::table('workingorders_services')->where('workingorder_id', '=', $id)->delete();

				foreach ($service as $key=>$value)
				{
					if(++$i == $ilen) break;
					$workingorders = new WorkingOrdersServices;
					$workingorders->workingorder_id = $workingorder->id;
					$workingorders->service_id = $value;
					$workingorders->measurement = $measurement[$key];
					$workingorders->amount = $amount[$key];
					$workingorders->price = $price[$key];
					$workingorders->discount = $discount[$key];
					$workingorders->taxpercent = $taxpercent[$key];
					$workingorders->save();
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
	 * Remove the specified working order(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{

            DB::table('workingorders_services')->where('workingorder_id', '=', $id)->delete();

			$entry = WorkingOrder::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
