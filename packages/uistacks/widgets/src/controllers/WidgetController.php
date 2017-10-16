<?php
namespace UiStacks\Widgets\Controllers;

use Illuminate\Http\Request;
use UiStacks\Widgets\Controllers\WidgetsApiController as API;
use UiStacks\Widgets\Models\Widgets;
use UiStacks\Widgets\Models\WidgetsTrans;

class WidgetController extends WidgetsApiController
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
        return view('widgets::widgets.index', compact('items'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create()
    {
        return view('widgets::widgets.create-edit');
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
        return redirect(action('\UiStacks\Widgets\Controllers\WidgetController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Widgets::findOrFail($id);
        $trans = \UiStacks\Widgets\Models\WidgetTrans::where('widget_id', $id)->get()->keyBy('lang')->toArray();
//        dd($item->trans);
        return view('widgets::widgets.create-edit', compact('item', 'trans'));
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
        return redirect(action('\UiStacks\Widgets\Controllers\WidgetController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Widgets::findOrFail($id);
        return view('widgets::widgets.confirm-delete', compact('item'));
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
            $items = Widgets::whereIn('id', $request->ids)->get();
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
        return redirect(action('\UiStacks\Widgets\Controllers\WidgetController@index'));
//        return back();
    }
}