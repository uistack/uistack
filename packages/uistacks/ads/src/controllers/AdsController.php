<?php
namespace UiStacks\Ads\Controllers;

use Illuminate\Http\Request;
use UiStacks\Ads\Controllers\AdsApiController as API;
use UiStacks\Ads\Models\Ad;
use UiStacks\Ads\Models\AdTrans;

class AdsController extends AdsApiController
{

 	/*
    |--------------------------------------------------------------------------
    | UiStacks Ads Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Ads for the application.
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
//        dd($request);
        return view('Ads::ads.index', compact('items'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create()
    {
        return view('Ads::ads.create-edit');
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
//            'name' => 'required|unique:ads_trans'
//        ]);
        $store = $this->api->storeAd($request);
        
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
        return redirect(action('\UiStacks\Ads\Controllers\AdsController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Ad::findOrFail($id);
        $trans = AdTrans::where('ad_id', $id)->get()->keyBy('lang')->toArray();
//        dd($item->trans);
        return view('Ads::ads.create-edit', compact('item', 'trans'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateAd($request, '', $id);
        
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
        return redirect(action('\UiStacks\Ads\Controllers\AdsController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Ad::findOrFail($id);
        return view('Ads::ads.confirm-delete', compact('item'));
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
            $items = Ad::whereIn('id', $request->ids)->get();
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
        return redirect(action('\UiStacks\Ads\Controllers\AdsController@index'));
//        return back();
    }
}