<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	use UserTrait, RemindableTrait;
	use HasRole;

    protected $fillable = array('first_name','last_name','email','password','created_at','updated_at');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
    * Get the unique identifier for the user.
    *
    * @return mixed
    */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
    * Get the password for the user.
    *
    * @return string
    */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
    * Get the e-mail address where password reminders are sent.
    *
    * @return string
    */
    public function getReminderEmail()
    {
        return $this->email;
    }

	// Edit user rules (admin)
	public static function edit_user_rules_admin($id)
	{
		return array(
			'id'					=>	'required|integer',
			'email'					=>	'required|email|unique:users,email,'. $id .'|email',
			'first_name'			=>	'required',
			'last_name'				=>	'required',
			'language'				=>	'required|integer',
			'role'					=>	'required|integer'
		);
	}
	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'intro'					=>	'required',
		'content'				=>	'required',
		'image'					=>	'required'
	);

	// New client validation
	public static $store_rules_client = array(
		'first_name'				=>	'required',
		'last_name'					=>	'required',
		'email'					=>	'required|unique:users'
	);

	// Update client validation
	public static $update_rules_client = array(
		'id'					=>	'required|integer',
		'first_name'				=>	'required',
		'last_name'					=>	'required',
		'email'					=>	'required'
	);

	// Register_rules for new user
	public static $register_rules = array(
			'email'					=>	'required|email|unique:users',
			'first_name'			=>	'required',
			'last_name'				=>	'required',
			'password'				=>	'required',
			'repeat_password'		=>	'required|same:password'
	);


	// Forgotten password rules
	public static $forgotten_password_rules = array(
		'email'		=>	'required|email|exists:users,email'
	);

	 

	/*
	*	Retrieve user's informations
	*
	*	Uses:
	*	$id			-	null for all, integer for user
 	*/
	public static function getUserInfos($id = null)
	{
		if ($id != null)
		{
			// Retrieve specific user informations
			try
			{
				$user = DB::table('assigned_roles')
					->join('users', 'users.id', '=', 'assigned_roles.user_id')
					->join('roles', 'roles.id', '=', 'assigned_roles.role_id')
 					->select(
						'users.id AS id',
						'users.username AS username',
						'users.email AS email',
						'users.first_name AS first_name',
						'users.last_name AS last_name',
						'users.address AS address',
						'users.city AS city',
						'users.phone AS phone',
						'users.region AS region', 
						'users.image AS image',
						'users.remember_token AS remember_token',
						'users.verify_code AS verify_code',
						'users.company_name AS company_name',
						'users.client_type AS client_type',
						'users.oib AS oib',
						'users.mjesto AS mjesto',
						'users.zip AS zip',
						'users.country AS country',
						'users.phone AS phone',
						'users.fax AS fax',
						'users.mobile AS mobile',
						'users.web AS web',
						'users.iban AS iban',
						'users.note AS note',
						'roles.id AS role_id',
						'roles.name AS role_name',
						'users.created_at AS created_at',
						'users.updated_at AS updated_at'
						)
 					->orderBy('id', 'DESC')
					->where('users.id', '=', $id)
					->first();

				return array('status' => 1, 'user' => $user);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}

	}
 
	public static function getEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('users')
				->join('city', 'city.id', '=', 'users.city')
		        		->join('region', 'region.id', '=', 'users.region')
				->select(
						'users.id AS id',
						'users.username AS username',
						'users.email AS email',
						'users.first_name AS first_name',
						'users.last_name AS last_name',
						'users.address AS address',
						'users.city AS city',
						'users.phone AS phone',
						'users.region AS region', 
						'users.image AS image',
						'users.remember_token AS remember_token',
						'users.verify_code AS verify_code',
						'users.company_name AS company_name',
						'users.client_type AS client_type',
						'users.oib AS oib',
						'users.mjesto AS mjesto',
						'users.zip AS zip',
						'users.country AS country',
						'users.phone AS phone',
						'users.fax AS fax',
						'users.mobile AS mobile',
						'users.web AS web',
						'users.iban AS iban',
						'users.note AS note',
						'users.created_at AS created_at',
						'users.updated_at AS updated_at',
						'city.name AS cityname'
				)->whereNull('deleted_at')
				->orderBy('id', 'ASC');

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('users.id', '=', $id)->first();
					return array('status' => 1, 'entry' => $entry);
				}
	 	
				// Default return
				$entries = $entry;

				if ($items == null)
				{
					// Return all entries
					$entries = $entries->paginate(10);
				}
				else
				{
					// Return specific number of entries
					$entries = $entries->take($items)->paginate(10);
				}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}

	}

	public static function getListEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('users')
				->join('city', 'city.id', '=', 'users.city')
		        		//->join('region', 'region.id', '=', 'users.region')
				->select(
						'users.id AS id',
						'users.username AS username',
						'users.email AS email',
						'users.first_name AS first_name',
						'users.last_name AS last_name',
						'users.address AS address',
						'users.city AS city',
						'users.phone AS phone',
						'users.region AS region', 
						'users.image AS image',
						'users.remember_token AS remember_token',
						'users.verify_code AS verify_code',
						'users.company_name AS company_name',
						'users.client_type AS client_type',
						'users.oib AS oib',
						'users.mjesto AS mjesto',
						'users.zip AS zip',
						'users.country AS country',
						'users.phone AS phone',
						'users.fax AS fax',
						'users.mobile AS mobile',
						'users.web AS web',
						'users.iban AS iban',
						'users.note AS note',
						'users.created_at AS created_at',
						'users.updated_at AS updated_at',
						'city.name AS cityname'
				)->whereNull('deleted_at')
				->where('user_group', '=', 'client')
				->orderBy('id', 'ASC')->get();
	 	
				// Default return
				$entries = $entry;


			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}

	}

	// Get user by e-mail
	public static function getUserByEmail($email = null)
	{
		if ($email != null)
		{
			// Retrieve specific user informations
			try
			{
				$user = DB::table('users')
					->select(
						'users.id AS id',
						'users.email AS email',
						'users.first_name AS first_name',
						'users.last_name AS last_name',
						'users.address AS address',
						'users.city AS city',
						'users.phone AS phone',
						'users.created_at AS created_at',
						'users.updated_at AS updated_at'
						)
					->where('users.email', '=', $email)
					->first();

				return array('status' => 1, 'user' => $user);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}
		else
		{
			return array('status' => 0, 'reason' => 'No e-mail entered.');
		}
	}



	// Get user by user group
	public static function getUserByUserGroup($user_group = null)
	{
		if ($user_group != null)
		{
			// Retrieve specific user informations
			try
			{
				$entries = DB::table('users')
					->select(
						'users.id AS id',
						'users.username AS username',
						'users.first_name AS first_name',
						'users.last_name AS last_name',
						'users.email AS email',
						'users.address AS address',
						'users.oib AS oib'
						)
					->whereNull('deleted_at')
					->where('users.user_group', '=', $user_group)
					->paginate(10);

				return array('status' => 1, 'entries' => $entries);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}
		else
		{
			return array('status' => 0, 'reason' => 'No e-mail entered.');
		}
	}


	public static function countUsers($user_group)
    {
        try
        {
            $users['total'] = User::where('user_group','=', $user_group)->whereNull('deleted_at')->count();
            return array('status' => 1, 'number' => $users);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

    public static function checkExisting($id)
    {
    	try 
    	{ 
    		$entry = DB::table('users')->where('id', $id)->first();

    		return array('status' => 1, 'entry' => $entry);
    	}
    	catch (Exception $exp)
    	{
    		return array('status' => 0, 'reason' => $exp->getMessage());
    	}   
    } 


}
