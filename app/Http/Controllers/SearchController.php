<?php
/**
 * Created by PhpStorm.
 * User: ramesh
 * Date: 30/5/17
 * Time: 6:41 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UiStacks\Activities\Models\Activity;
use UiStacks\Countries\Models\Country;
use UiStacks\Countries\Models\CountryTrans;
use UiStacks\Countries\Models\Area;
use UiStacks\Countries\Models\AreaTrans;
use UiStacks\Stores\Models\Store as webStore;
use UiStacks\Stores\Controllers\StoresApiController as StoreApi;
use UiStacks\Stores\Models\StoreTrans;
use UiStacks\Users\Models\User;
use UiStacks\Users\Models\UserRole;
use UiStacks\Settings\Controllers\SmsController;
use Auth;
use Lang;
use UiStacks\Media\Controllers\MediaApiController as MediaAPI;
use UiStacks\Users\Controllers\UsersApiController as API;
use UiStacks\Settings\Models\Setting;
use UiStacks\Media\Models\Media;
use Config;
use Mail;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->api = new API;
        $this->storeApi = new StoreApi;
    }

    /**
     * Search Result Page
     **/
    public function searchResult(Request $request){
        $request->request->add(['paginate' => 20]);
        $items = $this->storeApi->listItemsFront($request);

        $activities = Activity::where('active', 1)->get();
        $countries = Country::where('active', 1)->get();
        if(isset($request->country)){
            $areas = Area::where(array('country_id'=> $request->country,'active'=> 1))->get();
        }else{
            $areas = [];
        }

        $stores = webStore::where('active', 1)->get();
        return view('website.stores.search-result', compact('pages','activities', 'countries', 'areas', 'stores', 'banners','items'));
    }
    /**
     * Search Result Page
     **/
    public function storeDetail($id){
        $item = webStore::findOrFail($id);
        $itemTrans = StoreTrans::where(array('store_id' => $id, 'lang'=> Lang::getlocale()))->first();
        if (isset(Auth::user()->id)) {
            if(Auth::user()->id != $item->created_by){
                $itemTrans->search_count = $itemTrans->search_count+1;
                $itemTrans->view_count = $itemTrans->view_count+1;
                $itemTrans->save();
            }
        }else{
            $itemTrans->search_count = $itemTrans->search_count+1;
            $itemTrans->view_count = $itemTrans->view_count+1;
            $itemTrans->save();
        }
        $item = webStore::findOrFail($id);
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
//        dd($item->images);
        return view('website.stores.store-detail', compact('item','gallery_images'));
    }

}
?>