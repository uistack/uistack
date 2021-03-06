<?php

namespace UiStacks\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Permission extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * Translation relation.
     *
     * 
     */
    public function trans()
    {
        return $this->hasOne('UiStacks\Users\Models\PermissionTrans', 'permission_id')->where('lang', Lang::getlocale());
    }

    /**
     * Roles relation.
     * 
     */
    public function users()
    {
        return $this->belongsToMany('UiStacks\Users\Models\User');
    }


    /**
     * Permissions relation.
     * 
     */
    public function ownedBy($role_id)
    {
        $role_permission = \UiStacks\Users\Models\PermissionRole::where('role_id', $role_id)->where('permission_id', $this->id)->first();
        if($role_permission){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Users Permissions relation.
     * 
     */
    public function ownedByUser($user_id)
    {
//        dd($user_id);
        $userPermission = \UiStacks\Users\Models\PermissionUser::where('user_id', $user_id)->where('permission_id', $this->id)->first();
        if($userPermission){
            return true;
        } else {
            return false;
        }
    }
}
