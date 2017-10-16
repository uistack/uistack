<?php

namespace UiStacks\Contactus\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class ContactusSection extends Model
{
    protected $table = 'contactus_sections';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['category', 'section', 'options', 'created_by', 'updated_by'];
//
//    protected $with = ['trans', 'author', 'lastUpdateBy', 'itemSection'];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Translation relation.
     *
     * 
     */
    public function trans()
    {
        return $this->hasOne('\UiStacks\Contactus\Models\ContactusSectionTrans', 'section_id')->where('lang', Lang::getlocale())->select("*");
    }

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