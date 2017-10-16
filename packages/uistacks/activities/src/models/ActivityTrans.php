<?php

namespace UiStacks\Activities\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class ActivityTrans extends Model
{
    protected $table = 'activities_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['activity_id'];
}
