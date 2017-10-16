<?php

namespace UiStacks\Emailtemplates\Controllers;

use Illuminate\Http\Request;
use UiStacks\Emailtemplates\Controllers\EmailTemplatesApiController as API;
use UiStacks\Emailtemplates\Models\EmailTemplate;
use UiStacks\Emailtemplates\Models\EmailTemplateTrans;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EmailTemplatesController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | uistacks Reports Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Reports for the application.
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
        $items = EmailTemplate::all();
//        dd($items);
        return view('Emailtemplates::templates.index', compact('items'));
    }

    public function create()
    {
        return view('Emailtemplates::templates.create-edit');
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
//        dd($request);
        $store = $this->api->storeTemplate($request);

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
        return redirect(action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@index'));
    }

    public function edit($id) {
        $item = EmailTemplate::findOrFail($id);
        $trans = EmailTemplateTrans::where('etemplate_id', $id)->get()->keyBy('lang')->toArray();
//                dd($trans);
        return view('Emailtemplates::templates.create-edit', compact('item','trans'));
    }

    public function update(Request $request, $id)
    {
        $update = $this->api->updateEmailTemplate($request, '', $id);

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
        return redirect(action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@index'));
    }

}
