<?php

namespace UiStacks\Contactus\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class ContactusReply extends Model
{
    protected $table = 'contact_request_replies';

    /**
     * Translation relation.
     *
     * 
     */
 public function trans()
    {
        return $this->hasOne('\UiStacks\Contactus\Models\ContactusReplyTrans', 'reply_id')->where('lang', Lang::getlocale())->select("*");
    }

}