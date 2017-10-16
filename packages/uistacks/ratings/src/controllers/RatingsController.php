<?php
namespace UiStacks\Ratings\Controllers;

use Illuminate\Http\Request;
use UiStacks\Ratings\Controllers\RatingsApiController as API;
use UiStacks\Ratings\Models\Rating;
use UiStacks\Ratings\Models\RatingTrans;

class RatingsController extends RatingsApiController
{

 	/*
    |--------------------------------------------------------------------------
    | UiStacks Ratings Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Ratings for the application.
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
        return view('Ratings::ratings.index', compact('items'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create()
    {
        return view('Ratings::ratings.create-edit');
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
//            'name' => 'required|unique:ratings_trans'
//        ]);
        $store = $this->api->storeRating($request);
        
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
        return redirect(action('\UiStacks\Ratings\Controllers\RatingsController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Rating::findOrFail($id);
        $trans = RatingTrans::where('rating_id', $id)->get()->keyBy('lang')->toArray();
//        dd($item->trans);
        return view('Ratings::ratings.create-edit', compact('item', 'trans'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateRating($request, '', $id);
        
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
        return redirect(action('\UiStacks\Ratings\Controllers\RatingsController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Rating::findOrFail($id);
        return view('Ratings::ratings.confirm-delete', compact('item'));
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
            $items = Rating::whereIn('id', $request->ids)->get();
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
        return redirect(action('\UiStacks\Ratings\Controllers\RatingsController@index'));
//        return back();
    }
}