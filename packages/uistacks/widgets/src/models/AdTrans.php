<?php

namespace UiStacks\Ads\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class AdTrans extends Model
{
    protected $table = 'ads_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['ad_id'];
}
