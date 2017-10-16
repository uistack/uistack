<?php
namespace UiStacks\Activities\Controllers;

use Illuminate\Http\Request;
use UiStacks\Activities\Controllers\ActivitiesApiController as API;
use UiStacks\Activities\Models\Activity;
use UiStacks\Activities\Models\ActivityTrans;

class ActivitiesController extends ActivitiesApiController
{

 	/*
    |--------------------------------------------------------------------------
    | UiStacks Activities Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Activities for the application.
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
        return view('Activities::activities.index', compact('items'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create()
    {
        return view('Activities::activities.create-edit');
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
//            'name' => 'required|unique:activities_trans'
//        ]);
        $store = $this->api->storeActivity($request);
        
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
        return redirect(action('\UiStacks\Activities\Controllers\ActivitiesController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Activity::findOrFail($id);
        $trans = ActivityTrans::where('activity_id', $id)->get()->keyBy('lang')->toArray();
        return view('Activities::activities.create-edit', compact('item', 'trans'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateActivity($request, '', $id);
        
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
        return redirect(action('\UiStacks\Activities\Controllers\ActivitiesController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Activity::findOrFail($id);
        return view('Activities::activities.confirm-delete', compact('item'));
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
            $items = Activity::whereIn('id', $request->ids)->get();
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
}