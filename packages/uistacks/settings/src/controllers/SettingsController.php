<?php

namespace UiStacks\Settings\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laracasts\Flash\Flash;
use UiStacks\Settings\Models\Setting;

use DB;
use Lang;

class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function editInformation()
    {
        $name = Setting::find(1)->value;
        $address = Setting::find(2)->value;
        $email = Setting::find(3)->value;
        $phone = Setting::find(4)->value;
        $telephone = Setting::find(31)->value;
        $zipcode = Setting::find(32)->value;

        return view('Settings::info', compact('name', 'address', 'email', 'phone','telephone','zipcode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInformation(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $email = $request->email;
        $phone = $request->phone;
        $telephone = $request->telephone;
        $zipcode = $request->zipcode;

        $nameSetting = Setting::find(1);
        $addressSetting = Setting::find(2);
        $emailSetting = Setting::find(3);
        $phoneSetting = Setting::find(4);
        $telephoneSetting = Setting::find(31);
        $zipcodeSetting = Setting::find(32);

        $nameSetting->value = $name;
        $addressSetting->value = $address;
        $emailSetting->value = $email;
        $phoneSetting->value = $phone;
        $telephoneSetting->value = $telephone;
        $zipcodeSetting->value = $zipcode;

        $nameSetting->save();
        $addressSetting->save();
        $emailSetting->save();
        $phoneSetting->save();
        $telephoneSetting->save();
        $zipcodeSetting->save();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Settings::settings.updated_successfully'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function editSmtp()
    {
        $driver = Setting::find(5)->value;
        $host = Setting::find(6)->value;
        $port = Setting::find(7)->value;
        $username = Setting::find(8)->value;
        $password = Setting::find(9)->value;
        $address = Setting::find(10)->value;
        $name = Setting::find(11)->value;
        $encryption = Setting::find(12)->value;
        return view('Settings::smtp', compact('driver', 'host', 'port', 'username', 'password', 'address', 'name', 'encryption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSmtp(Request $request)
    {
        $driver = $request->driver;
        $host = $request->host;
        $port = $request->port;
        $username = $request->username;
        $password = $request->password;
        $address = $request->address;
        $name = $request->name;
        $encryption = $request->encryption;

        $driverSetting = Setting::find(5);
        $hostSetting = Setting::find(6);
        $portSetting = Setting::find(7);
        $usernameSetting = Setting::find(8);
        $passwordSetting = Setting::find(9);
        $addressSetting = Setting::find(10);
        $nameSetting = Setting::find(11);
        $encryptionSetting = Setting::find(12);

        $driverSetting->value = $driver;
        $hostSetting->value = $host;
        $portSetting->value = $port;
        $usernameSetting->value = $username;
        $passwordSetting->value = $password;
        $addressSetting->value = $address;
        $nameSetting->value = $name;
        $encryptionSetting->value = $encryption;

        $driverSetting->save();
        $hostSetting->save();
        $portSetting->save();
        $usernameSetting->save();
        $passwordSetting->save();
        $addressSetting->save();
        $nameSetting->save();
        $encryptionSetting->save();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Settings::settings.updated_successfully'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function editSocialAccounts()
    {
        $facebook = Setting::find(13)->value;
        $twitter = Setting::find(14)->value;
        $gplus = Setting::find(15)->value;
        $instagram = Setting::find(16)->value;
        $youtube = Setting::where('name', 'social_accounts')->where('key', 'youtube')->first();
        $youtube = $youtube->value;
        return view('Settings::social_accounts', compact('facebook', 'twitter', 'gplus', 'instagram', 'youtube'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSocialAccounts(Request $request)
    {
        $facebookSetting = Setting::find(13);
        $twitterSetting = Setting::find(14);
        $gplusSetting = Setting::find(15);
        $instagramSetting = Setting::find(16);
        $youtubeSetting = Setting::where('name', 'social_accounts')->where('key', 'youtube')->first();
        
        $facebookSetting->value = $request->facebook;
        $twitterSetting->value = $request->twitter;
        $gplusSetting->value = $request->gplus;
        $instagramSetting->value = $request->instagram;
        $youtubeSetting->value = $request->youtube;

        $facebookSetting->save();
        $twitterSetting->save();
        $gplusSetting->save();
        $instagramSetting->save();
        $youtubeSetting->save();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Settings::settings.updated_successfully'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function editAppLinks()
    {
        $apple = Setting::find(17)->value;
        $google = Setting::find(18)->value;
        return view('Settings::app_links', compact('apple', 'google'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAppLinks(Request $request)
    {
        $apple = $request->apple;
        $google = $request->google;

        $appleSetting = Setting::find(17);
        $googleSetting = Setting::find(18);

        $appleSetting->value = $apple;
        $googleSetting->value = $google;

        $appleSetting->save();
        $googleSetting->save();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Settings::settings.updated_successfully'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function editSeo()
    {
        $keywords = Setting::find(19)->value;
        $description = Setting::find(20)->value;

        return view('Settings::seo', compact('keywords', 'description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSeo(Request $request)
    {
        $keywords = $request->keywords;
        $description = $request->description;

        $keywordsSetting = Setting::find(19);
        $descriptionSetting = Setting::find(20);

        $keywordsSetting->value = $keywords;
        $descriptionSetting->value = $description;

        $keywordsSetting->save();
        $descriptionSetting->save();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Settings::settings.updated_successfully'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function editFcm()
    {
        if(!Gate::allows('hasPermission', ['fcm', 'settings'])){
            return view('errors.403');
        }

        $serverKey = Setting::find(21)->value;

        return view('Settings::fcm', compact('serverKey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFcm(Request $request)
    {
        $serverKey = $request->server_key;

        $serverKeySetting = Setting::find(21);

        $serverKeySetting->value = $serverKey;

        $serverKeySetting->save();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Settings::settings.updated_successfully'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function editSms()
    {
        $url = Setting::find(22)->value;
        $username = Setting::find(23)->value;
        $password = Setting::find(24)->value;
        $sender = Setting::find(25)->value;

        return view('Settings::sms', compact('url', 'username', 'password', 'sender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSms(Request $request)
    {
        $url = $request->url;
        $username = $request->username;
        $password = $request->password;
        $sender = $request->sender;

        $urlSetting = Setting::find(22);
        $usernameSetting = Setting::find(23);
        $passwordSetting = Setting::find(24);
        $senderSetting = Setting::find(25);

        $urlSetting->value = $url;
        $usernameSetting->value = $username;
        $passwordSetting->value = $password;
        $senderSetting->value = $sender;

        $urlSetting->save();
        $usernameSetting->save();
        $passwordSetting->save();
        $senderSetting->save();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Settings::settings.updated_successfully'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function editMaintenanceMode()
    {
        $mode = Setting::find(26)->value;
        return view('Settings::maintenance_mode', compact('mode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMaintenanceMode(Request $request)
    {
        $mode = $request->mode;
        $modeSetting = Setting::find(26);
        $modeSetting->value = $mode;
        $modeSetting->save();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Settings::settings.updated_successfully'));
        return back();
    }
}