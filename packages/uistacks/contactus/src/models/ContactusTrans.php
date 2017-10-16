<?php

namespace UiStacks\Contactus\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class ContactusTrans extends Model
{
    protected $table = 'contact_request_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    
    public function replies()
	{
		return $this->hasMany('\UiStacks\Contactus\Models\ContactusReplyTrans','contact_request_id','contact_id')->where('lang', Lang::getlocale())->select("*");
	}
    
    public function section()
    {   
        return $this->belongsTo('UiStacks\Contactus\Models\ContactusSection', 'section_id');//->select(['id', 'name']);
    
    }

}
