<?php

namespace UiStacks\Countries\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Countries\Models\Area;
use UiStacks\Countries\Models\AreaTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class AreasApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Areas API Controller
      |--------------------------------------------------------------------------
      |
     */

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function validatation($request) {

        $languages = config('uistacks.locales');

        $rules['language'] = 'required';
        $rules['country'] = 'required|numeric';

        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['name_' . $code . ''] = 'required|max:255';
                    }
                }
            }
        }

        if ($request->segment(2) === 'api') {
            $rules['author'] = 'required|integer';
        }

        return \Validator::make($request->all(), $rules);
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function listItems(Request $request) {
        $areas = Area::FilterName()->FilterCountry()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $areas->appends(Input::except('page'));
        return $areas;
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function storeArea(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cn = AreaTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', 'لا يسمح بالدخول المكرر');
            $store = "Duplicate Entry Present";
            return $store;
        }

        $area = new Area;
        $area->country_id = $request->country;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $area->created_by = $author;
        $area->updated_by = $author;

        $area->active = false;
        if ($request->active) {
            $area->active = true;
        }
        $area->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $areaTrans = new AreaTrans;
            $areaTrans->area_id = $area->id;
            $areaTrans->name = ucfirst(strtolower($request->$name));
            $areaTrans->lang = $langCode;
            $areaTrans->save();
        }

        $response = ['message' => trans('Countries::countries.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function updateArea(Request $request, $apiKey = '', $id) {
//        $validator = $this->validatation($request);
//        if ($validator->fails()) {
//            return response()->json(['errors' => $validator->errors()], 422);
//        }

        $area = Area::find($id);


        /*$cn = AreaTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name) && !($cn->id == $area->id)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', 'لا يسمح بالدخول المكرر');
            $store = "Duplicate Entry Present";
            return $store;
        }*/
        
        $area->country_id = $request->country;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $area->updated_by = $author;

        $area->active = false;
        if ($request->active) {
            $area->active = true;
        }
        $area->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $areaTrans = AreaTrans::where('area_id', $area->id)->where('lang', $langCode)->first();
            if (empty($areaTrans)) {
                $areaTrans = new AreaTrans;
                $areaTrans->area_id = $area->id;
                $areaTrans->lang = $langCode;
            }
            $areaTrans->name = ucfirst(strtolower($request->$name));
            $areaTrans->save();
        }

        $response = ['message' => trans('Countries::countries.updated_successfully')];
        return response()->json($response, 201);
    }

}
