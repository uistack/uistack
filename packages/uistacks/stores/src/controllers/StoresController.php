<?php
namespace UiStacks\Stores\Controllers;

use Illuminate\Http\Request;
use UiStacks\Activities\Models\Activity;
use UiStacks\Stores\Controllers\StoresApiController as API;
use UiStacks\Stores\Models\Store;
use UiStacks\Stores\Models\StoreTrans;
use UiStacks\Stores\Models\StoreImage;
use UiStacks\Countries\Models\Country;
use UiStacks\Countries\Models\Area;
use UiStacks\Media\Models\Media;

class StoresController extends StoresApiController
{

    /*
   |--------------------------------------------------------------------------
   | UiStacks Stores Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles Stores for the application.
   |
   */
    public function __construct()
    {
        $this->api = new API;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function index(Request $request)
    {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listItems($request);

        return view('Stores::stores.index', compact('items'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function create()
    {
        $activities = Activity::where('active', 1)->get();
        $countries = Country::where('active', 1)->get();
        $areas = Area::where('active', 1)->get();
        return view('Stores::stores.create-edit', compact('items', 'activities', 'countries','areas'));
    }


    /**
     *
     *
     * @param
     * @return
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:stores_trans'
//        ]);
//        dd($request);
        $store = $this->api->createStore($request);

        if($store == "Duplicate Entry Present")
            return back();


        $store = $store->getData();

        if(isset($store->errors)){
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if($request->back){
            return back();
        }
        return redirect(action('\UiStacks\Stores\Controllers\StoresController@index'));
    }

    /**
     *
     *
     * @param
     * @return
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
//dd($item);
        return view('Stores::stores.create-edit', compact('item', 'trans', 'activities','countries','areas', 'edit','gallery_images'));
    }

    /**
     *
     *
     * @param
     * @return
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

        if($request->back){
            return back();
        }
        return redirect(action('\UiStacks\Stores\Controllers\StoresController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id)
    {
        $item = Store::findOrFail($id);
        return view('Stores::stores.confirm-delete', compact('item'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function bulkOperations(Request $request)
    {
        if($request->ids){
            $items = Store::whereIn('id', $request->ids)->get();
            if($items->count()){
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if($request->operation && $request->operation === 'activate'){
                        $item->active = true;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    }elseif($request->operation && $request->operation === 'deactivate'){
                        $item->active = false;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }

                }
            }

            \Session::flash('alert-class', 'alert-success');

        }else{
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }

    /*
     * delete gallery images
     */
    public function deleteStoreGalleryImages(Request $request) {
        \UiStacks\Stores\Models\StoreImage::where('id', $request->id)->delete();
        echo "1";
    }

}