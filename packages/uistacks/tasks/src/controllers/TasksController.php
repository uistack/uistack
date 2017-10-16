<?php
namespace UiStacks\Tasks\Controllers;

use Illuminate\Http\Request;
use UiStacks\Activities\Models\Activity;
use UiStacks\Tasks\Controllers\TasksApiController as API;
use UiStacks\Tasks\Models\Task;
use UiStacks\Tasks\Models\TaskTrans;
use UiStacks\Tasks\Models\TaskImage;
use UiStacks\Countries\Models\Country;
use UiStacks\Countries\Models\Area;
use UiStacks\Media\Models\Media;

class TasksController extends TasksApiController
{

    /*
   |--------------------------------------------------------------------------
   | UiStacks Tasks Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles Tasks for the application.
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

        return view('Tasks::tasks.index', compact('items'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function create()
    {
        $activities = Activity::where('active', 1)->get();
        $countries = Country::where('active', 1)->get();
        $areas = Area::where('active', 1)->get();
        return view('Tasks::tasks.create-edit', compact('items', 'activities', 'countries','areas'));
    }


    /**
     *
     *
     * @param
     * @return
     */
    public function task(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:tasks_trans'
//        ]);
//        dd($request);
        $task = $this->api->createTask($request);

        if($task == "Duplicate Entry Present")
            return back();


        $task = $task->getData();

        if(isset($task->errors)){
            return back()->withInput()->withErrors($task->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $task->message);

        if($request->back){
            return back();
        }
        return redirect(action('\UiStacks\Tasks\Controllers\TasksController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function edit($id)
    {
        $item = Task::findOrFail($id);
        $activities = Activity::where('active', 1)->get();
        $trans = TaskTrans::where('task_id', $id)->get()->keyBy('lang')->toArray();
        $countries = Country::where('active', 1)->get();
        $areas = Area::where(array('country_id'=>$item->trans->country,'active'=> 1))->get();
        $edit = 1;

        $gallery_count = \UiStacks\Tasks\Models\TaskImage::where('task_id', $id)->get();
        if (isset($gallery_count)) {
            for ($i = 0; $i < count($gallery_count); $i++) {
                $media_id = ($item->images{$i}->options['media']['gallery_images']);
                $temp_image = Media::where('id', $media_id)->first();
                $gallery_images[$i]['media_id'] = $gallery_count[$i]->id;
                $gallery_images[$i]['file'] = $temp_image->file;
            }
        } else {
            $gallery_images = "";
        }
//dd($item);
        return view('Tasks::tasks.create-edit', compact('item', 'trans', 'activities','countries','areas', 'edit','gallery_images'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateTask($request, '', $id);

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
        return redirect(action('\UiStacks\Tasks\Controllers\TasksController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id)
    {
        $item = Task::findOrFail($id);
        return view('Tasks::tasks.confirm-delete', compact('item'));
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
            $items = Task::whereIn('id', $request->ids)->get();
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

    /*
     * delete gallery images
     */
    public function deleteTaskGalleryImages(Request $request) {
        \UiStacks\Tasks\Models\TaskImage::where('id', $request->id)->delete();
        echo "1";
    }

}