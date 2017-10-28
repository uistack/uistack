<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Lang;

class QuestionsOption extends Model
{
    use SoftDeletes;

    protected $table = 'questions_options';

    protected $fillable = ['question_id'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['slug', 'options', 'created_by', 'updated_by'];
//
//    protected $with = ['trans', 'author', 'lastUpdateBy','question'];


    /**
     * Translation relation.
     *
     *
     */
    public function trans()
    {
        return $this->hasOne('\UiStacks\Uiquiz\Models\QuestionsOptionTrans', 'questions_option_id')->where('lang', Lang::getlocale())->select("*");
//        return $this->hasOne('\UiStacks\Uiquiz\Models\SectionTrans', 'section_id')->select("*");
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id')->select(['id','created_by','updated_by','active','slug']);
    }
    
    /**
     * Scope a query to only include filterd question option status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterStatus($query)
    {
        $getStatus = '';
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $getStatus = $_GET['status'];
            if($getStatus == 2){
                $getStatus = false;
            }
            return $query->where('active', $getStatus);
        }
    }

}