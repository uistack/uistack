<?php

namespace UiStacks\Tasks\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Task extends Model
{
    protected $table = 'stores';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['options', 'created_by', 'updated_by','activity_id'];

    protected $with = ['trans','images', 'author', 'lastUpdateBy','activity','rating'];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
//    protected $casts = [
//        'options' => 'array',
//    ];

    /**
     * Translation relation.
     *
     * 
     */

    public function trans()
    {
//        return $this->hasOne('\UiStacks\Tasks\Models\TaskTrans', 'store_id')->where('lang', Lang::getlocale())->select(['store_id', 'name']);
        return $this->hasOne('\UiStacks\Tasks\Models\TaskTrans', 'store_id')->where('lang', Lang::getlocale());
    }

    public function images()
    {
//        return $this->hasMany('\UiStacks\Tasks\Models\TaskImage', 'store_id')->select(['store_id', 'options']);
        return $this->hasMany('\UiStacks\Tasks\Models\TaskImage', 'store_id')->select(['store_id', 'options']);
    }
    //ratings
    public function rating()
    {
//        return $this->hasMany('\UiStacks\Tasks\Models\TaskImage', 'store_id')->select(['store_id', 'options']);
        return $this->hasMany('\UiStacks\Ratings\Models\Rating', 'store_id');
    }
    /**
     * Activity relation.
     */
    public function activity()
    {
//        return $this->belongsTo('UiStacks\Activities\Models\ActivityTrans', 'activity_id')->where('lang', Lang::getlocale())->select(['id', 'name']);
        return $this->belongsTo('UiStacks\Activities\Models\Activity', 'activity_id')->select(['id']);
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
     * Scope a query to only include filterd stores name.
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
                $q->where('name', 'LIKE', '%'.$getName.'%');
            });
        }
    }

    /**
     * Scope a query to only include filterd stores status.
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

    /*
     * frontend filters
     */
    //store name
    public function scopeTaskName($query)
    {
        $getName = '';
        if(isset($_GET['store_name']) && !empty($_GET['store_name'])){
            $getName = $_GET['store_name'];
            return $query->whereHas('trans', function($q) use ($getName){
//                $q->where('name', $getName);
                $q->where('store_id', $getName);
            });
        }
    }
    //store country name
    public function scopeActivitiesName($query)
    {
        $getStatus = '';
        if(isset($_GET['activity']) && !empty($_GET['activity'])){
            $getStatus = $_GET['activity'];
            return $query->where('activity_id', $getStatus);
        }
    }
    //store country name
    public function scopeCountryName($query)
    {
        $getName = '';
        if(isset($_GET['country']) && !empty($_GET['country'])){
            $getName = $_GET['country'];
            return $query->whereHas('trans', function($q) use ($getName){
                $q->where('country', $getName);
            });
        }
    }
    //store country name
    public function scopeCityName($query)
    {
        $getName = '';
        if(isset($_GET['area']) && !empty($_GET['area'])){
            $getName = $_GET['area'];
            return $query->whereHas('trans', function($q) use ($getName){
                $q->where('area', $getName);
            });
        }
    }
}