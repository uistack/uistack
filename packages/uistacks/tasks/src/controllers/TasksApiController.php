<?php

namespace UiStacks\Tasks\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Tasks\Models\Task;
use UiStacks\Tasks\Models\TaskTrans;
//use UiStacks\Tasks\Models\TaskImage;
use UiStacks\Tasks\Models\TaskImage as Gallery;
use Illuminate\Support\Facades\Input;
use Auth;

class TasksApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Tasks API Controller
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

//        $rules['name'] = 'unique:tasks_trans';
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
        $tasks = Task::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $tasks->appends(Input::except('page'));
        return $tasks;
    }

    public function listItemsFront(Request $request) {
        $tasks = Task::TaskName()->ActivitiesName()->CountryName()->CityName()->where(array('created_by'=> $request->get('author')))->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $tasks->appends(Input::except('page'));
        return $tasks;
    }
    public function listItemsFrontSearch(Request $request) {
        $tasks = Task::TaskName()->ActivitiesName()->CountryName()->CityName()->where(array('active'=> true))->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $tasks->appends(Input::except('page'));
        return $tasks;
    }
    /**
     *
     *
     * @param
     * @return
     */
    public function createTask(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
//dd($request);
        $cn = TaskTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_task_msg'));
            $task = "Duplicate Entry Present";
            return $task;
        }

//        $options['media']['main_image_id'] = $request->main_image_id;
//        dd($options);
//        echo ($options); die;

        $task = new Task;
        $author = Auth::user()->id;

        $task->created_by = $author;
        $task->updated_by = $author;
        $task->activity_id = $request->activity_id;

//        $task->active = false;
//        if ($request->active) {
            $task->active = true;
//        }
        $task->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $taskTrans = new TaskTrans;
            $taskTrans->task_id = $task->id;
            $taskTrans->name = ucfirst(strtolower($request->$name));
            $taskTrans->country = $request->country;
            $taskTrans->area = $request->area;
            $taskTrans->location = $request->location;
            $taskTrans->task_lat = $request->task_lat;
            $taskTrans->task_lng = $request->task_lng;
            // Media
//            $taskTrans->main_image = $request->main_image_id;
            $options['media']['main_image_id'] = $request->main_image_id;
            $taskTrans->options = $options;

            $taskTrans->is_instagram = false;
            if ($request->is_instagram) {
                $taskTrans->is_instagram = true;
            }
            $taskTrans->instagram_media = $request->instagram_media;
            $taskTrans->is_additional_media = false;
            if ($request->is_additional_media) {
                $taskTrans->is_additional_media = true;
            }
            $taskTrans->facebook_media = $request->facebook_media;
            $taskTrans->google_media = $request->google_media;
            $taskTrans->youtube_media = $request->youtube_media;
            $taskTrans->twitter_media = $request->twitter_media;
            $taskTrans->snapchat_media = $request->snapchat_media;
            $taskTrans->googleplus_media = $request->googleplus_media;
            $taskTrans->website_url = $request->website_url;
            $taskTrans->email = $request->email;
            $taskTrans->active = false;
            if ($request->active) {
                $taskTrans->active = true;
            }
            $taskTrans->is_approved = false;
            if ($request->is_approved) {
                $taskTrans->is_approved = true;
            }
            $taskTrans->is_featured = false;
            if ($request->is_featured) {
                $taskTrans->is_featured = true;
            }
            $taskTrans->is_social = false;
            if ($request->is_social) {
                $taskTrans->is_social = true;
            }
            $taskTrans->provider = false;
            if ($request->provider) {
                $taskTrans->provider = $request->provider;
            }
            $taskTrans->lang = $langCode;
            $taskTrans->save();
            $taskTrans->order_id = $taskTrans->id;
            $taskTrans->save();
        }
        $options = array();
        if ($request->gallery_images) {
            $gallery_images = $request->gallery_images;
            foreach ($gallery_images as $key => $value) {
                $gal = new Gallery;
                $gal->task_id = $task->id;
                $options["media"]["gallery_images"] = $value;
                $gal->options = $options;
                $gal->save();
            }
        }

        $response = ['message' => trans('Tasks::tasks.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateTask(Request $request, $apiKey = '', $id) {
        $task = Task::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $task->updated_by = $author;
        $task->activity_id = $request->activity_id;

        $task->active = false;
        if ($request->active) {
            $task->active = true;
        }
        $task->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $taskTrans = TaskTrans::where('task_id', $task->id)->where('lang', $langCode)->first();
            if (empty($taskTrans)) {
                $taskTrans = new TaskTrans;
                $taskTrans->task_id = $task->id;
                $taskTrans->lang = $langCode;
            }
            $taskTrans->name = ucfirst(strtolower($request->$name));
            $taskTrans->country = $request->country;
            $taskTrans->area = $request->area;
            $taskTrans->location = $request->location;
            $taskTrans->task_lat = $request->task_lat;
            $taskTrans->task_lng = $request->task_lng;
            // Media
//            $taskTrans->main_image = $request->main_image_id;
            $options['media']['main_image_id'] = $request->main_image_id;
            $taskTrans->options = $options;

            $taskTrans->is_instagram = false;
            if ($request->is_instagram) {
                $taskTrans->is_instagram = true;
            }
            $taskTrans->instagram_media = $request->instagram_media;
            $taskTrans->is_additional_media = false;
            if ($request->is_additional_media) {
                $taskTrans->is_additional_media = true;
            }
            $taskTrans->facebook_media = $request->facebook_media;
            $taskTrans->google_media = $request->google_media;
            $taskTrans->youtube_media = $request->youtube_media;
            $taskTrans->twitter_media = $request->twitter_media;
            $taskTrans->snapchat_media = $request->snapchat_media;
            $taskTrans->googleplus_media = $request->googleplus_media;
            $taskTrans->website_url = $request->website_url;
            $taskTrans->email = $request->email;
            $taskTrans->active = false;
            if ($request->active) {
                $taskTrans->active = true;
            }
            $taskTrans->is_approved = false;
            if ($request->is_approved) {
                $taskTrans->is_approved = true;
            }
            $taskTrans->is_featured = false;
            if ($request->is_featured) {
                $taskTrans->is_featured = true;
            }
            $taskTrans->is_social = false;
            if ($request->is_social) {
                $taskTrans->is_social = true;
            }
            $taskTrans->provider = false;
            if ($request->provider) {
                $taskTrans->provider = $request->provider;
            }
            $taskTrans->save();
        }
        $options = array();
        if ($request->gallery_images) {
            $gallery_images = $request->gallery_images;
            foreach ($gallery_images as $key => $value) {
                $gal = new Gallery;
                $gal->task_id = $task->id;
                $options["media"]["gallery_images"] = $value;
                $gal->options = $options;
                $gal->save();
            }
        }
        $response = ['message' => trans('Tasks::tasks.updated_successfully')];
        return response()->json($response, 201);
    }

}
