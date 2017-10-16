<?php

namespace UiStacks\Ratings\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class RatingTrans extends Model
{
    protected $table = 'ratings_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['rating_id'];
}
