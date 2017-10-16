<?php

namespace UiStacks\Widgets\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Widgets\Models\Widgets;
use UiStacks\Widgets\Models\WidgetTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class WidgetsApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Ads API Controller
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

//        $rules['name'] = 'unique:ads_trans';
        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['name_' . $code . ''] = 'required|max:255';
                        $rules['position'] = 'required';
                        $rules['scripts'] = 'required';
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
        $ads = Widgets::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $ads->appends(Input::except('page'));
        return $ads;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function storeAd(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cn = WidgetTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_ad_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }


        $ad = new Widgets;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $ad->created_by = $author;
        $ad->updated_by = $author;

        $ad->active = false;
        if ($request->active) {
            $ad->active = true;
        }
        $ad->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $adTrans = new WidgetTrans;
            $adTrans->position = false;
            if ($request->position) {
                $adTrans->position = $request->position;
            }
            $adTrans->widget_id = $ad->id;
            $adTrans->name = ucfirst(strtolower($request->$name));
            $adTrans->scripts = $request->scripts;
            $adTrans->start_at = date("Y-m-d H:i:s", strtotime($request->start_at));
            $adTrans->end_at = date("Y-m-d H:i:s", strtotime($request->end_at));
            $adTrans->lang = $langCode;
            $adTrans->save();
        }

        $response = ['message' => trans('Widgets::widgets.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateAd(Request $request, $apiKey = '', $id) {
        $ad = Widgets::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $ad->updated_by = $author;

        $ad->active = false;
        if ($request->active) {
            $ad->active = true;
        }
        $ad->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $adTrans = WidgetTras::where('ad_id', $ad->id)->where('lang', $langCode)->first();
            if (empty($adTrans)) {
                $adTrans = new WidgetTras;
                $adTrans->widget_id = $ad->id;
                $adTrans->lang = $langCode;
            }
            $adTrans->name = ucfirst(strtolower($request->$name));
            $adTrans->scripts = $request->scripts;
            $adTrans->start_at = date("Y-m-d H:i:s", strtotime($request->start_at));
            $adTrans->end_at = date("Y-m-d H:i:s", strtotime($request->end_at));
            $adTrans->save();
        }

        $response = ['message' => trans('Widgets::widgets.updated_successfully')];
        return response()->json($response, 201);
    }

}
