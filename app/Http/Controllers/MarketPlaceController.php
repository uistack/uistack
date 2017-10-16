<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UiStacks\Activities\Models\Activity;
use UiStacks\Countries\Models\Country;
use UiStacks\Countries\Models\Area;
use UiStacks\Media\Models\Media;
use UiStacks\Stores\Models\Store;
use UiStacks\Stores\Models\StoreTrans;
use Auth;
use Lang;
use UiStacks\Stores\Controllers\StoresApiController as API;
use UiStacks\Settings\Models\Setting;
use Config;
use Mail;
use Validator;
use App\Libraries\FlipkartApi;

class MarketPlaceController extends Controller {

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

    public function index(Request $request)
    {
        // $request->request->add(['paginate' => 20]);
        // $items = $this->api->listItemsFront($request);
        
        $flipkart = new FlipkartApi("uistacks", "f9d92a741b994a4ab0f9e7ab18b66c28", "json");
        
        //home page categories
        //Query the API
$home = $flipkart->api_home();
//Make sure there is a response.
if($home==false){
	echo 'Error: Could not retrieve API homepage';
	exit();
}
//Convert into associative arrays.
$home = json_decode($home, TRUE);
$categories = $home['apiGroups']['affiliate']['apiListings'];
    //  dd($categories);
    //To view category pages, API URL is passed as query string.
$url = isset($_GET['url'])?$_GET['url']:false;
if($url){
	//URL is base64 encoded to prevent errors in some server setups.
	$url = base64_decode($url);
	//This parameter lets users allow out-of-stock items to be displayed.
	$hidden = isset($_GET['hidden'])?false:true;
	//Call the API using the URL.
	$details = $flipkart->call_url($url);
	if(!$details){
		echo 'Error: Could not retrieve products list.';
		exit();
	}
	//The response is expected to be JSON. Decode it into associative arrays.
	$details = json_decode($details, TRUE);
	//The response is expected to contain these values.
	$nextUrl = $details['nextUrl'];
	$validTill = $details['validTill'];
	$products = $details['productInfoList'];
// 	dd($products);
}
//offers
        
        $dotd_url = 'https://affiliate-api.flipkart.net/affiliate/offers/v1/dotd/json';
//Deal of the Day DOTD and Tops offers\
                //Call the API using the URL.
                $details = $flipkart->call_url($dotd_url);
                if(!$details){
                    echo 'Error: Could not retrieve DOTD.';
                    exit();
                }
                //The response is expected to be JSON. Decode it into associative arrays.
                $details = json_decode($details, TRUE);
                $list = $details['dotdList'];
                //The navigation buttons.
//dd($list);

        $webmeta['title'] = "Your Online Shopping Store";
        $webmeta['keywords'] = "Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,Flipkart";
        $webmeta['description'] = "India's biggest online store for Mobiles,Fashion(Cloths/Shoes),Electronics,Home Appliances,Books,Jewelry,Home,Furniture,Sporting goods,Beauty &amp; personal care and more! Largest selection from all brands at lowest price.Payment options - COD,EMI,Credit card,Debit card &amp; more. Buy Now!";

        return view('website.marketplace.index', compact('webmeta','items','categories','list','products','hidden'));
    }

    /**
     * Store page
     *
     * @var view
     */
    public function addStore() {
        if (!isset(Auth::user()->id)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans("Core::operations.signin_alert"));
            return redirect(Lang::getlocale() . "/" . 'home');
        }
        $activities = Activity::where('active', 1)->get();
        $countries = Country::where('active', 1)->get();
        $areas = Area::where('active', 1)->get();
        return view('website.stores.add-store', compact('activities', 'countries','areas'));
    }

    //save store page
    public function saveStore(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:stores_trans'
//        ]);
        if (isset(Auth::user()->id)) {
            $store = $this->api->createStore($request);
            $store = $store->getData();
            if (isset($store->errors)) {
                return back()->withInput()->withErrors($store->errors);
            }
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', $store->message);
            return redirect(Lang::getlocale() . "/" . 'user/stores');
        }else{
            return redirect(Lang::getlocale() . "/" . 'home');
        }
    }

    /*
     * edit store
     */

    public function edit($id)
    {
        $item = Store::findOrFail($id);
        $activities = Activity::where('active', 1)->get();
        $trans = StoreTrans::where('store_id', $id)->get()->keyBy('lang')->toArray();
        $countries = Country::where('active', 1)->get();
        $areas = Area::where(array('country_id'=>$item->trans->country,'active'=> 1))->get();
        $edit = 1;

        $gallery_count = \UiStacks\Stores\Models\StoreImage::where('store_id', $id)->get();
        if (isset($gallery_count)) {
            for ($i = 0; $i < count($gallery_count); $i++) {
                $media_id = ($item->images{$i}->options['media']['gallery_images']);
                $temp_image = Media::where('id', $media_id)->first();
                $gallery_images[$i]['media_id'] = $gallery_count[$i]->id;
                $gallery_images[$i]['file'] = $temp_image->file;
            }
        } else {
            $gallery_images = "";
        }
        return view('website.stores.add-store', compact('item', 'trans', 'activities','countries','areas', 'edit','gallery_images'));
//        return view('Stores::stores.create-edit', compact('item', 'trans', 'activities','countries','areas', 'edit','gallery_images'));
    }

    /**
     *update store
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateStore($request, '', $id);
        if($update == "Duplicate Entry Present")
            return back();
        $update = $update->getData();
        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }
        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);
        return redirect(Lang::getlocale() . "/" . 'user/stores');
    }


}
