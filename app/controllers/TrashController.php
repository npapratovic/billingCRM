<?php

/*
*	BlogController
*
*	Handles backend functions
*/


class TrashController extends \BaseController {

	// Enviroment variables
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();
	}

	/**
	 * Display a listing of the blog post(s).
	 *
	 * @return Response
	 */
	public function index($trashed)
	{

		$entries;

		// Get data
		switch ($trashed) {
			case 'products':

				$entries = Product::onlyTrashed()->select(
					'products.id AS id',
					'products.title AS title',
					'products.image AS image',
					'products.deleted_at AS deleted_at')->paginate(10);
				$items = array("Naziv produkta", "Slika produkta", "Obrisano", "Obnovi");
				$indexes = array("title", "image", "deleted_at", "button");
				$folder = "product";
			break;
			case 'productcategories':
				$entries = Category::onlyTrashed()->select(
					'categories.id AS id',
					'categories.title AS title',
					'categories.image AS image',
					'categories.deleted_at AS deleted_at')->paginate(10);
				$items = array("Naziv kategorije", "Slika kategorije", "Obrisano", "Obnovi");
				$indexes = array("title", "image", "deleted_at", "button");
				$folder = "category";
			break;
			case 'producttags':
				$entries = Tag::onlyTrashed()->select(
					'tags.id AS id',
					'tags.title AS title',
					'tags.description AS description',
					'tags.deleted_at AS deleted_at')->paginate(10);
				$items = array("Naslov oznake", "Opis oznake", "Obrisano", "Obnovi");
				$indexes = array("title", "description", "deleted_at", "button");
				$folder = "";
			break;
			case 'productattributes':
				$entries = Attribute::onlyTrashed()->select(
					'attributes.id AS id',
					'attributes.title AS title',
					'attributes.deleted_at AS deleted_at')->paginate(10);
				$items = array("Naziv atributa", "Obrisano", "Obnovi");
				$indexes = array("title", "deleted_at", "button");
				$folder = "";
			break;
			case 'services':
				$entries = Service::onlyTrashed()->select(
					'services.id AS id',
					'services.title AS title',
					'services.description AS description',
					'services.deleted_at AS deleted_at')->paginate(10);
				$items = array("Naziv usluge", "Opis usluge", "Obrisano", "Obnovi");
				$indexes = array("title", "description", "deleted_at", "button");
				$folder = "";
			break;
			case 'clients':
				$entries = User::onlyTrashed()->select(
					'users.id AS id',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.email AS email',
					'users.deleted_at AS deleted_at')->where('users.user_group', '=', 'client')->paginate(10);
				$items = array("Ime klijenta", "Email", "Obrisano", "Obnovi");
				$indexes = array("full_name", "email", "deleted_at", "button");
				$folder = "";
			break;
			case 'orders':
				$entries = Order::onlyTrashed()
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'orders.deleted_at AS deleted_at')->paginate(10);
				$items = array("Broj narudžbe", "Ime kupca", "Obrisano", "Obnovi");
				$indexes = array("order_id", "full_name", "deleted_at", "button");
				$folder = "";
			break;
			case 'offers':
				$entries = Offer::onlyTrashed()
				->join('users', 'users.id', '=', 'offers.client_id')
				->select(
					'offers.id AS id',
					'offers.offer_number AS offer_number',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'offers.deleted_at AS deleted_at')->paginate(10);
				$items = array("Broj ponude", "Ime kupca", "Obrisano", "Obnovi");
				$indexes = array("offer_number", "full_name", "deleted_at", "button");
				$folder = "";
			break;
			case 'invoices':
				$entries = Invoice::onlyTrashed()
				->join('users', 'users.id', '=', 'invoices.client_id')
				->select(
					'invoices.id AS id',
					'invoices.invoice_number AS invoice_number',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'invoices.deleted_at AS deleted_at')->paginate(10);
				$items = array("Broj računa", "Ime kupca", "Obrisano", "Obnovi");
				$indexes = array("invoice_number", "full_name", "deleted_at", "button");
				$folder = "";
			break;
			case 'dispatches':
				$entries = Dispatch::onlyTrashed()
				->join('users', 'users.id', '=', 'dispatches.client_id')
				->select(
					'dispatches.id AS id',
					'dispatches.dispatch_number AS dispatch_number',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'dispatches.deleted_at AS deleted_at')->paginate(10);
				$items = array("Broj otpremnice", "Ime kupca", "Obnovi");
				$indexes = array("dispatch_number", "full_name", "deleted_at", "button");
				$folder = "";
			break;
			case 'workingorders':
				$entries = WorkingOrder::onlyTrashed()
				->join('users', 'users.id', '=', 'workingorders.client_id')
				->select(
					'workingorders.id AS id',
					'workingorders.workingorder_number AS workingorder_number',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'workingorders.deleted_at AS deleted_at')->paginate(10);
				$items = array("Broj radnog naloga", "Ime kupca", "Obnovi");
				$indexes = array("workingorder_number", "full_name", "deleted_at", "button");
				$folder = "";
			break;
			case 'narudzbenice':
				$entries = Narudzbenice::onlyTrashed()
				->join('users', 'users.id', '=', 'narudzbenice.client_id')
				->select(
					'narudzbenice.id AS id',
					'narudzbenice.narudzbenica_number AS narudzbenica_number',
					'users.first_name AS first_name',
					'users.last_name AS last_name')->paginate(10);
				$items = array("Broj narudžbenice", "Ime kupca", "Obnovi");
				$indexes = array("narudzbenica_number", "full_name", "deleted_at", "button");
				$folder = "";
			break;
			default:
				return Redirect::route('getDashboard')->with('error_trash', Lang::get('core.msg_success_entry_restored'));
			break;
		}


      		//goDie($entries);

		$this->layout->title = 'Smeće | BillingCRM';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
		
		);
		$this->layout->content = View::make('backend.trash.index', array('entries' => $entries, 'trashed' => $trashed, 'items' => $items, 'indexes' => $indexes, 'folder' => $folder));
	}



	/**
	 * Update the specified blog post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function restore($id, $trashed)
	{
		
		
		switch ($trashed) {
			case 'products':
			            Product::withTrashed()->where('id', $id)->restore();
			            return Redirect::route('ProductIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'productcategories':
			    	Category::withTrashed()->where('id', $id)->restore();
	            		return Redirect::route('CategoryIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'producttags':
				Tag::withTrashed()->where('id', $id)->restore();
		            	return Redirect::route('TagIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'productattributes':
				Attribute::withTrashed()->where('id', $id)->restore();
		            	return Redirect::route('AttributeIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'services':
				Service::withTrashed()->where('id', $id)->restore();
		            	return Redirect::route('ServiceIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'clients':
				User::withTrashed()->where('id', $id)->restore();
		            	return Redirect::route('ClientIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'orders':
				Order::withTrashed()->where('id', $id)->restore();
	            		return Redirect::route('OrderIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'offers':
				Offer::withTrashed()->where('id', $id)->restore();
	            		return Redirect::route('OfferIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'invoices':
				Invoice::withTrashed()->where('id', $id)->restore();
	            		return Redirect::route('InvoiceIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'dispatches':
				Dispatch::withTrashed()->where('id', $id)->restore();
	            		return Redirect::route('DispatchIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'workingorders':
				WorkingOrder::withTrashed()->where('id', $id)->restore();
	            		return Redirect::route('WorkingOrderIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'narudzbenice':
				Narudzbenice::withTrashed()->where('id', $id)->restore();
	            		return Redirect::route('NarudzbeniceIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			default:
				
			break;
		}
	}


	
}
