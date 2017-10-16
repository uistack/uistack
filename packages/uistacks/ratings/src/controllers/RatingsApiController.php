<?php

namespace UiStacks\Ratings\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Ratings\Models\Rating;
use UiStacks\Ratings\Models\RatingTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class RatingsApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Ratings API Controller
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

//        $rules['name'] = 'unique:ratings_trans';
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
        $ratings = Rating::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $ratings->appends(Input::except('page'));
        return $ratings;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function storeRating(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cn = RatingTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_rating_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }


        $rating = new Rating;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $rating->created_by = $author;
        $rating->updated_by = $author;

        $rating->active = false;
        if ($request->active) {
            $rating->active = true;
        }
        $rating->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $ratingTrans = new RatingTrans;
            $ratingTrans->position = false;
            if ($request->position) {
                $ratingTrans->position = $request->position;
            }
            $ratingTrans->rating_id = $rating->id;
            $ratingTrans->name = ucfirst(strtolower($request->$name));
            $ratingTrans->scripts = $request->scripts;
            $ratingTrans->start_at = date("Y-m-d H:i:s", strtotime($request->start_at));
            $ratingTrans->end_at = date("Y-m-d H:i:s", strtotime($request->end_at));
            $ratingTrans->lang = $langCode;
            $ratingTrans->save();
        }

        $response = ['message' => trans('Ratings::ratings.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateRating(Request $request, $apiKey = '', $id) {
        $rating = Rating::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $rating->updated_by = $author;

        $rating->active = false;
        if ($request->active) {
            $rating->active = true;
        }
        $rating->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $ratingTrans = RatingTrans::where('rating_id', $rating->id)->where('lang', $langCode)->first();
            if (empty($ratingTrans)) {
                $ratingTrans = new RatingTrans;
                $ratingTrans->rating_id = $rating->id;
                $ratingTrans->lang = $langCode;
            }
            $ratingTrans->name = ucfirst(strtolower($request->$name));
            $ratingTrans->scripts = $request->scripts;
            $ratingTrans->start_at = date("Y-m-d H:i:s", strtotime($request->start_at));
            $ratingTrans->end_at = date("Y-m-d H:i:s", strtotime($request->end_at));
            $ratingTrans->save();
        }

        $response = ['message' => trans('Ratings::ratings.updated_successfully')];
        return response()->json($response, 201);
    }

}
