<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Lang;

class Answer extends Model
{
    use SoftDeletes;

    protected $table = 'answers';

    protected $fillable = ['user_id', 'quize_id', 'question_id', 'option_id', 'correct'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['slug', 'options', 'created_by', 'updated_by'];
//
//    protected $with = ['trans', 'author', 'lastUpdateBy','topic','options'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

}