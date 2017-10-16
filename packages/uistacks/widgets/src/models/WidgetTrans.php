<?php

namespace UiStacks\Widgets\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class WidgetTrans extends Model
{
    protected $table = 'widgets_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['widget_id'];
}
