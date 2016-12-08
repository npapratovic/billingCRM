<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';
 

    /**
     * Grant the given permission to a role.
     *
     * @param  Permission $permission
     * @return mixed
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }


	// Retrieve role informations
	public static function getRoleInformations($id = null)
	{
		if ($id != null)
		{
			// Return specific role
			try
			{
				$role = DB::table('roles')
					->select('roles.id AS id', 'roles.name AS name')
					->where('roles.id', '=', $id)
					->first();

				return array('status' => 1, 'role' => $role);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}
		else
		{
			// Return all roles
			try
			{
				$roles = DB::table('roles')
					->select('roles.id AS id', 'roles.name AS name')
					->orderBy('id', 'ASC')
					->get();

				return array('status' => 1, 'roles' => $roles);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}
	}

}
