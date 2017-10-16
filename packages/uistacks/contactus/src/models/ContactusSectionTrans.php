<?php

namespace UiStacks\Contactus\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class ContactusSectionTrans extends Model
{
    protected $table = 'contactus_sections_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    
    public function contactus()
	{
		return $this->hasMany('\UiStacks\Contactus\Models\ContactusTrans','contact_section_id','section_id')->where('lang', Lang::getlocale())->select("*");
	}
    
    public function section()
    {   
        return $this->belongsTo('UiStacks\Contactus\Models\ContactusSection', 'section_id');
    
    }

}
