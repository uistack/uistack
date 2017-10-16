<?php

namespace UiStacks\Ratings\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Rating extends Model
{
    protected $table = 'ratings';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_by', 'updated_by'];

    protected $with = ['store','trans', 'author', 'lastUpdateBy'];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    /**
     * Translation relation.
     *
     * 
     */
    public function store()
    {
        return $this->belongsTo('\UiStacks\Stores\Models\Store', 'id')->select(['id', 'created_by','activity_id']);
//        return $this->belongsTo('\UiStacks\Stores\Models\StoreTrans', 'store_id')->where('lang', Lang::getlocale())->select(['id', 'name','location']);
    }

    public function trans()
    {
        return $this->hasOne('\UiStacks\Ratings\Models\RatingTrans', 'rating_id')->where('lang', Lang::getlocale());
    }

	/**
     * Author relation.
     */
    public function author()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'created_by')->select(['id', 'name']);
    }

    /**
     * Get author attribute
     */
 //    public function getlastUpdateByAttribute()
	// {
	//     return $this->lastUpdateBy();
	// }

	/**
     * lastUpdateBy relation.
     */
    public function lastUpdateBy()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'updated_by')->select(['id', 'name']);
    }


    /**
     * Scope a query to only include filterd ratings name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterName($query)
    {
        $getName = '';
        if(isset($_GET['name']) && !empty($_GET['name'])){
            $getName = $_GET['name'];
            return $query->whereHas('trans', function($q) use ($getName){
                $q->where('rating', 'LIKE', '%'.$getName.'%');
            });
        }
    }

    /**
     * Scope a query to only include filterd ratings status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterStatus($query)
    {
        $getStatus = '';
        //dd($_GET['status']);
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $getStatus = $_GET['status'];
            if($getStatus == 2){
                $getStatus = false;
            }
            return $query->where('active', $getStatus);
        }
    }
}