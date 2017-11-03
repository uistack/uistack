<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Lang;

class Quiz extends Model
{
    use SoftDeletes;

    protected $table = 'quizes';

    protected $fillable = ['user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['slug', 'options', 'created_by', 'updated_by'];
//
//    protected $with = ['trans', 'author', 'lastUpdateBy','topic','options'];

    public function user()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'user_id')->select(['id', 'name']);
    }

}