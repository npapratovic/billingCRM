<?php

/*
*	InvoiceRepository
*
*	Handles backend functions
*/



class InvoiceRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created invoice(s) in storage.
	 *
	 * @return Response
	 */
	public function store($invoice_number, $invoice_type, $tax, $client_id, $employee_id, $product, $measurement, $amount, $price, $discount, $taxpercent, $payment_way, $invoice_date, $invoice_date_deadline, $invoice_date_ship, $invoice_note, $intern_note, $repeat_invoice, $invoice_language, $valute)
	{
		//try {
			DB::beginTransaction();

			$entry = new Invoice;
			$entry->invoice_number = $invoice_number;
			$entry->invoice_type = $invoice_type;
			$entry->tax = $tax;
			$entry->client_id = $client_id;
			$entry->employee_id = $employee_id;
			$entry->payment_way = $payment_way;
			$entry->invoice_date = $invoice_date;
			$entry->invoice_date_deadline = $invoice_date_deadline;
			$entry->invoice_date_ship = $invoice_date_ship;
			$entry->invoice_note = $invoice_note;
			$entry->intern_note = $intern_note;
			$entry->repeat_invoice = $repeat_invoice;
			$entry->invoice_language = $invoice_language;
			$entry->valute = $valute;

			$entry->save();

			$invoice = DB::table('invoices')->orderBy('created_at', 'desc')->first();


			$i = 0;
			$ilen = count($product); 

			if ($product != null)
			{
				foreach ($product as $key=>$value)
				{
					if(++$i == $ilen) break;
					$orderproduct = new InvoicesProducts;
					$orderproduct->invoice_id = $invoice->id;
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
	public function update($id, $invoice_number, $invoice_type, $tax, $client_id, $product, $measurement, $amount, $price, $discount, $taxpercent, $payment_way, $invoice_date, $invoice_date_deadline, $invoice_date_ship, $invoice_note, $intern_note, $repeat_invoice, $invoice_language, $valute, $imported_products)
	{
    	
    		//try {

    			DB::beginTransaction();

			$entry = Invoice::find($id);
			$entry->invoice_number = $invoice_number;
			$entry->invoice_type = $invoice_type;
			$entry->tax = $tax;
			$entry->client_id = $client_id;
			$entry->payment_way = $payment_way;
			$entry->invoice_date = $invoice_date;
			$entry->invoice_date_deadline = $invoice_date_deadline;
			$entry->invoice_date_ship = $invoice_date_ship;
			$entry->invoice_note = $invoice_note;
			$entry->intern_note = $intern_note;
			$entry->repeat_invoice = $repeat_invoice;
			$entry->invoice_language = $invoice_language;
			$entry->valute = $valute;

			$entry->save();


			$invoice = DB::table('invoices')->where('id', $id)->first();

			$i = 0;
			$ilen = count($product); 

			if ($product != null)
			{
				DB::table('invoices_products')->where('invoice_id', '=', $id)->delete();
				foreach ($product as $key=>$value)
				{
					if(++$i == $ilen) break;
					$orderproduct = new InvoicesProducts;
					$orderproduct->invoice_id = $invoice->id;
					$orderproduct->product_id = $value;
					$orderproduct->measurement = $measurement[$key];
					$orderproduct->amount = $amount[$key];
					$orderproduct->price = $price[$key];
					$orderproduct->discount = $discount[$key];
					$orderproduct->taxpercent = $taxpercent[$key];
					$orderproduct->save();
				}
			}

			foreach($imported_products as $imported_product){
				$imported_item = ImportedOrderProduct::getEntry($imported_product);
				$orderproduct = new InvoicesProducts;
				$orderproduct->invoice_id = $invoice->id;
				$orderproduct->product_id = $imported_item['entry']['0']->id;
				$orderproduct->measurement = '0';
				$orderproduct->amount = $imported_item['entry']['0']->quantity;
				$orderproduct->price = $imported_item['entry']['0']->price;
				$orderproduct->discount = '0';
				$orderproduct->taxpercent = $imported_item['entry']['0']->total_tax;
				$orderproduct->save();
			}

			DB::commit();
			return array('status' => 1);
		}

		/*catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}*/


	public function convertToInvoice($invoice_number, $invoice_type, $tax, $client_id, $employee_id, $product, $measurement, $amount, $price, $discount, $taxpercent, $payment_way, $invoice_date, $invoice_date_deadline, $invoice_date_ship, $invoice_note, $intern_note, $repeat_invoice, $invoice_language, $valute)
	{
		//try {
			DB::beginTransaction();

			$entry = new Invoice;
			$entry->invoice_number = $invoice_number;
			$entry->invoice_type = $invoice_type;
			$entry->tax = $tax;
			$entry->client_id = $client_id;
			$entry->employee_id = $employee_id;
			$entry->payment_way = $payment_way;
			$entry->invoice_date = $invoice_date;
			$entry->invoice_date_deadline = $invoice_date_deadline;
			$entry->invoice_date_ship = $invoice_date_ship;
			$entry->invoice_note = $invoice_note;
			$entry->intern_note = $intern_note;
			$entry->repeat_invoice = $repeat_invoice;
			$entry->invoice_language = $invoice_language;
			$entry->valute = $valute;
			$entry->from_order = '1';

			$entry->save();

			$invoice = DB::table('invoices')->orderBy('created_at', 'desc')->first();

			if ($product != null)
			{
				foreach ($product as $key=>$value)
				{
					$orderproduct = new InvoicesProducts;
					$orderproduct->invoice_id = $invoice->id;
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
		//}

		/*catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
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
			$entry = Invoice::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
