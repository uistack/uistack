<?php

namespace UiStacks\Countries\Controllers;

use Illuminate\Http\Request;
use UiStacks\Countries\Controllers\AreasApiController as API;
use UiStacks\Countries\Models\Area;
use UiStacks\Countries\Models\AreaTrans;
use UiStacks\Countries\Models\Country;

class AreasController extends AreasApiController {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Areas Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Areas for the application.
      |
     */

    public function __construct() {
        $this->api = new API;
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function index(Request $request) {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listItems($request);
        $countries = Country::where('active', 1)->get();
        return view('Countries::areas.index', compact('items', 'countries'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create() {
        $countries = Country::where('active', 1)->get();
        return view('Countries::areas.create-edit', compact('countries'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request) {
        $store = $this->api->storeArea($request);

        if ($store == "Duplicate Entry Present")
            return back();
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Countries\Controllers\AreasController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id) {
        $item = Area::findOrFail($id);
        $trans = AreaTrans::where('area_id', $id)->get()->keyBy('lang')->toArray();
        $countries = Country::where('active', 1)->get();
        return view('Countries::areas.create-edit', compact('item', 'trans', 'countries'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateArea($request, '', $id);
        
         if($update == "Duplicate Entry Present")
         return back();  
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Countries\Controllers\AreasController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id) {
        $item = Area::findOrFail($id);
        return view('Areas::countries.confirm-delete', compact('item'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function bulkOperations(Request $request) {
        if ($request->ids) {
            $items = Area::whereIn('id', $request->ids)->get();
            if ($items->count()) {
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if ($request->operation && $request->operation === 'activate') {
                        $item->active = true;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    } elseif ($request->operation && $request->operation === 'deactivate') {
                        $item->active = false;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }
                }
            }

            \Session::flash('alert-class', 'alert-success');
        } else {
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }

}
