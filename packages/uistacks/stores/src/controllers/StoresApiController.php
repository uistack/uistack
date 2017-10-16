<?php

namespace UiStacks\Stores\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Stores\Models\Store;
use UiStacks\Stores\Models\StoreTrans;
//use UiStacks\Stores\Models\StoreImage;
use UiStacks\Stores\Models\StoreImage as Gallery;
use Illuminate\Support\Facades\Input;
use Auth;

class StoresApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Stores API Controller
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
        $rules['activity_id'] = 'required';
        $rules['country'] = 'required';
        $rules['area'] = 'required';
        $rules['location'] = 'required';
        $rules['is_instagram'] = 'required';
        $rules['instagram_media'] = 'url';
        $rules['facebook_media'] = 'url';
        $rules['youtube_media'] = 'url';
        $rules['twitter_media'] = 'url';
        $rules['googleplus_media'] = 'url';
        $rules['snapchat_media'] = 'url';
        $rules['website_url'] = 'url';
        $rules['email'] = 'email';

//        $rules['name'] = 'unique:stores_trans';
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
        $messages = [
            'activity_id.required' => 'Please select activity.',
        ];
        return \Validator::make($request->all(), $rules,$messages);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function listItems(Request $request) {
        $stores = Store::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $stores->appends(Input::except('page'));
        return $stores;
    }

    public function listItemsFront(Request $request) {
        $stores = Store::StoreName()->ActivitiesName()->CountryName()->CityName()->where(array('created_by'=> $request->get('author')))->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $stores->appends(Input::except('page'));
        return $stores;
    }
    public function listItemsFrontSearch(Request $request) {
        $stores = Store::StoreName()->ActivitiesName()->CountryName()->CityName()->where(array('active'=> true))->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $stores->appends(Input::except('page'));
        return $stores;
    }
    /**
     *
     *
     * @param
     * @return
     */
    public function createStore(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
//dd($request);
        $cn = StoreTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_store_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }

//        $options['media']['main_image_id'] = $request->main_image_id;
//        dd($options);
//        echo ($options); die;

        $store = new Store;
        $author = Auth::user()->id;

        $store->created_by = $author;
        $store->updated_by = $author;
        $store->activity_id = $request->activity_id;

//        $store->active = false;
//        if ($request->active) {
            $store->active = true;
//        }
        $store->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $storeTrans = new StoreTrans;
            $storeTrans->store_id = $store->id;
            $storeTrans->name = ucfirst(strtolower($request->$name));
            $storeTrans->country = $request->country;
            $storeTrans->area = $request->area;
            $storeTrans->location = $request->location;
            $storeTrans->store_lat = $request->store_lat;
            $storeTrans->store_lng = $request->store_lng;
            // Media
//            $storeTrans->main_image = $request->main_image_id;
            $options['media']['main_image_id'] = $request->main_image_id;
            $storeTrans->options = $options;

            $storeTrans->is_instagram = false;
            if ($request->is_instagram) {
                $storeTrans->is_instagram = true;
            }
            $storeTrans->instagram_media = $request->instagram_media;
            $storeTrans->is_additional_media = false;
            if ($request->is_additional_media) {
                $storeTrans->is_additional_media = true;
            }
            $storeTrans->facebook_media = $request->facebook_media;
            $storeTrans->google_media = $request->google_media;
            $storeTrans->youtube_media = $request->youtube_media;
            $storeTrans->twitter_media = $request->twitter_media;
            $storeTrans->snapchat_media = $request->snapchat_media;
            $storeTrans->googleplus_media = $request->googleplus_media;
            $storeTrans->website_url = $request->website_url;
            $storeTrans->email = $request->email;
            $storeTrans->active = false;
            if ($request->active) {
                $storeTrans->active = true;
            }
            $storeTrans->is_approved = false;
            if ($request->is_approved) {
                $storeTrans->is_approved = true;
            }
            $storeTrans->is_featured = false;
            if ($request->is_featured) {
                $storeTrans->is_featured = true;
            }
            $storeTrans->is_social = false;
            if ($request->is_social) {
                $storeTrans->is_social = true;
            }
            $storeTrans->provider = false;
            if ($request->provider) {
                $storeTrans->provider = $request->provider;
            }
            $storeTrans->lang = $langCode;
            $storeTrans->save();
            $storeTrans->order_id = $storeTrans->id;
            $storeTrans->save();
        }
        $options = array();
        if ($request->gallery_images) {
            $gallery_images = $request->gallery_images;
            foreach ($gallery_images as $key => $value) {
                $gal = new Gallery;
                $gal->store_id = $store->id;
                $options["media"]["gallery_images"] = $value;
                $gal->options = $options;
                $gal->save();
            }
        }

        $response = ['message' => trans('Stores::stores.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateStore(Request $request, $apiKey = '', $id) {
        $store = Store::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $store->updated_by = $author;
        $store->activity_id = $request->activity_id;

        $store->active = false;
        if ($request->active) {
            $store->active = true;
        }
        $store->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $storeTrans = StoreTrans::where('store_id', $store->id)->where('lang', $langCode)->first();
            if (empty($storeTrans)) {
                $storeTrans = new StoreTrans;
                $storeTrans->store_id = $store->id;
                $storeTrans->lang = $langCode;
            }
            $storeTrans->name = ucfirst(strtolower($request->$name));
            $storeTrans->country = $request->country;
            $storeTrans->area = $request->area;
            $storeTrans->location = $request->location;
            $storeTrans->store_lat = $request->store_lat;
            $storeTrans->store_lng = $request->store_lng;
            // Media
//            $storeTrans->main_image = $request->main_image_id;
            $options['media']['main_image_id'] = $request->main_image_id;
            $storeTrans->options = $options;

            $storeTrans->is_instagram = false;
            if ($request->is_instagram) {
                $storeTrans->is_instagram = true;
            }
            $storeTrans->instagram_media = $request->instagram_media;
            $storeTrans->is_additional_media = false;
            if ($request->is_additional_media) {
                $storeTrans->is_additional_media = true;
            }
            $storeTrans->facebook_media = $request->facebook_media;
            $storeTrans->google_media = $request->google_media;
            $storeTrans->youtube_media = $request->youtube_media;
            $storeTrans->twitter_media = $request->twitter_media;
            $storeTrans->snapchat_media = $request->snapchat_media;
            $storeTrans->googleplus_media = $request->googleplus_media;
            $storeTrans->website_url = $request->website_url;
            $storeTrans->email = $request->email;
            $storeTrans->active = false;
            if ($request->active) {
                $storeTrans->active = true;
            }
            $storeTrans->is_approved = false;
            if ($request->is_approved) {
                $storeTrans->is_approved = true;
            }
            $storeTrans->is_featured = false;
            if ($request->is_featured) {
                $storeTrans->is_featured = true;
            }
            $storeTrans->is_social = false;
            if ($request->is_social) {
                $storeTrans->is_social = true;
            }
            $storeTrans->provider = false;
            if ($request->provider) {
                $storeTrans->provider = $request->provider;
            }
            $storeTrans->save();
        }
        $options = array();
        if ($request->gallery_images) {
            $gallery_images = $request->gallery_images;
            foreach ($gallery_images as $key => $value) {
                $gal = new Gallery;
                $gal->store_id = $store->id;
                $options["media"]["gallery_images"] = $value;
                $gal->options = $options;
                $gal->save();
            }
        }
        $response = ['message' => trans('Stores::stores.updated_successfully')];
        return response()->json($response, 201);
    }

}
