<?php

namespace UiStacks\Users\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permission_user';


    public function getPermission()
    {
        return $this->belongsTo('UiStacks\Users\Models\Permission','permission_id');
    }

}
