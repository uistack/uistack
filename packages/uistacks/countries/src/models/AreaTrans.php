<?php

namespace UiStacks\Countries\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class AreaTrans extends Model
{
    protected $table = 'areas_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['area_id'];
}
