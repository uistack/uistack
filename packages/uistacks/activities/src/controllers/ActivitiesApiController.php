<?php

namespace UiStacks\Activities\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Activities\Models\Activity;
use UiStacks\Activities\Models\ActivityTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class ActivitiesApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Activities API Controller
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

//        $rules['name'] = 'unique:activities_trans';
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
        $activities = Activity::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $activities->appends(Input::except('page'));
        return $activities;
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function storeActivity(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cn = ActivityTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_activity_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }


        $activity = new Activity;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $activity->created_by = $author;
        $activity->updated_by = $author;

        $activity->active = false;
        if ($request->active) {
            $activity->active = true;
        }
        $activity->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $activityTrans = new ActivityTrans;
            $activityTrans->is_featured = false;
            if ($request->is_featured) {
                $activityTrans->is_featured = true;
            }
            $activityTrans->active = false;
            if ($request->active) {
                $activityTrans->active = true;
            }
            $activityTrans->activity_id = $activity->id;
            $activityTrans->name = ucfirst(strtolower($request->$name));
            $activityTrans->lang = $langCode;
            $activityTrans->save();
            $activityTrans->order_id = $activityTrans->id;
            $activityTrans->save();
        }

        $response = ['message' => trans('Activities::activities.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function updateActivity(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
//        $activity = Activity::find($id);
//        $cn = ActivityTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();
//
//        if (isset($cn->name) && !($cn->id == $activity->id)) {
//            \Session::flash('alert-class', 'alert-danger');
//            \Session::flash('message', 'لا يسمح بالدخول المكرر');
//            $store = "Duplicate Entry Present";
//            return $store;
//        }


        $activity = Activity::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $activity->updated_by = $author;

        $activity->active = false;
        if ($request->active) {
            $activity->active = true;
        }
        $activity->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $activityTrans = ActivityTrans::where('activity_id', $activity->id)->where('lang', $langCode)->first();
            if (empty($activityTrans)) {
                $activityTrans = new ActivityTrans;
                $activityTrans->activity_id = $activity->id;
                $activityTrans->lang = $langCode;
            }
            $activityTrans->is_featured = false;
            if ($request->is_featured) {
                $activityTrans->is_featured = true;
            }
            $activityTrans->active = false;
            if ($request->active) {
                $activityTrans->active = true;
            }
            $activityTrans->name = ucfirst(strtolower($request->$name));
            $activityTrans->save();
        }

        $response = ['message' => trans('Activities::activities.updated_successfully')];
        return response()->json($response, 201);
    }

}
