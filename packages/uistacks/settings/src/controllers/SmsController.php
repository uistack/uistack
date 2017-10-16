<?php

namespace UiStacks\Settings\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use UiStacks\Settings\Controllers\WesalController;
use UiStacks\Settings\Models\Setting;

class SmsController extends Controller
{
    function SendSMS($numbers, $msg)
    {
        $url = Setting::find(22)->value;
        $username = Setting::find(23)->value;
        $password = Setting::find(24)->value;
        $sender = Setting::find(25)->value;
        $send = new WesalController($url, $username, $password, $sender);
        return $send->sendSMS($numbers , $msg);
    }
}
