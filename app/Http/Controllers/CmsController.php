<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UiStacks\Countries\Models\Country;
use UiStacks\Countries\Models\CountryTrans;
use UiStacks\Countries\Models\Area;
use UiStacks\Countries\Models\AreaTrans;
use UiStacks\Ads\Models\CarCompany;
use UiStacks\Ads\Models\CarCompanyTrans;
use UiStacks\Ads\Models\CarType;
use UiStacks\Ads\Models\CarTypeTrans;
use UiStacks\Ads\Models\CarModel;
use UiStacks\Users\Models\User;
use UiStacks\Users\Models\UserRole;
use UiStacks\Media\Models\Media;
use UiStacks\Pages\Models\Page;
use UiStacks\Pages\Models\PageTrans;
use UiStacks\Settings\Controllers\SmsController;
use Auth;
use Lang;
use UiStacks\Media\Controllers\MediaApiController as MediaAPI;
use UiStacks\Users\Controllers\UsersApiController as API;
use UiStacks\Settings\Models\Setting;
use Config;
use Mail;
use UiStacks\Ads\Models\Section;
use UiStacks\Ads\Controllers\AdsApiController as AdsAPI;
use UiStacks\Ads\Models\Ad;
use Validator;

class CmsController extends Controller {

    public function __construct() {
        $this->api = new API;
    }

    /**
     * Overide Defualt Mail Settings.
     *
     * @return Response
     */
    public function setMailSettings() {
        Config::set('mail.driver', Setting::find(5)->value);
        Config::set('mail.host', Setting::find(6)->value);
        Config::set('mail.port', Setting::find(7)->value);
        Config::set('mail.username', Setting::find(8)->value);
        Config::set('mail.password', Setting::find(9)->value);
        Config::set('mail.from.address', Setting::find(10)->value);
        Config::set('mail.from.name', Setting::find(11)->value);
        Config::set('mail.encryption', Setting::find(12)->value);
    }

    /**
     * Show page
     *
     * @var view
     */
    public function showPage(Request $request, $page) {
//        $item = Page::findOrFail($page);
//        $item = Page::where(array('page_url'=> $page, 'published'=>'1'))->first();
        $item = Page::where(array('page_url'=> $page, 'published'=>'1'))->first();
        if(count($item) == null){
            return redirect('/');
        }
        $trans = PageTrans::where('page_id', $item->id)->get()->keyBy('lang')->toArray();
        $webmeta['title'] = $item->trans->title;
        $webmeta['keywords'] = $item->trans->title;
        $webmeta['description'] = $item->trans->title;
        return view('website.pages.show', compact('webmeta','item', 'trans'));
//        return view('website.pages.show');
    }

}
