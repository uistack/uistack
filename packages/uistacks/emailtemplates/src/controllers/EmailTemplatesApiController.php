<?php

namespace UiStacks\Emailtemplates\Controllers;

use Illuminate\Http\Request;
use UiStacks\Emailtemplates\Models\EmailTemplate;
use UiStacks\Emailtemplates\Models\EmailTemplateTrans;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Lang;

class EmailTemplatesApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | uistacks Activities API Controller
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

        $languages = config('innoflame.locales');

        $rules['language'] = 'required';

//        $rules['name'] = 'unique:activities_trans';
        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['subject_' . $code . ''] = 'required|max:255';
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
        $emailtemplates = EmailTemplate::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $emailtemplates->appends(Input::except('page'));
        return $emailtemplates;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function storeTemplate(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cn = EmailTemplateTrans::where('subject', ucfirst(strtolower($request->subject_ar)))->first();

        if (isset($cn->subject)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_activity_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }


        $emailtemplate = new EmailTemplate;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $emailtemplate->created_by = $author;
        $emailtemplate->updated_by = $author;

        $emailtemplate->active = false;
        if ($request->active) {
            $emailtemplate->active = true;
        }
        $emailtemplate->save();
        // Translation
        foreach ($request->language as $langCode) {
            $name = 'subject_' . $langCode;
            $message = 'html_content_' . $langCode;
            $template_key = $this->seoUrl($request->$name);
            $emailtemplateTrans = new EmailTemplateTrans;
            $emailtemplateTrans->status = false;
            if ($request->active) {
                $emailtemplateTrans->status = true;
            }

            $emailtemplateTrans->etemplate_id = $emailtemplate->id;
            $emailtemplateTrans->subject = ucwords($request->$name);
            $emailtemplateTrans->html_content = $request->$message;
            $emailtemplateTrans->template_key = $template_key;
            $emailtemplateTrans->lang = $langCode;
            $emailtemplateTrans->save();

            $path = public_path();
            $loc = substr($path,0,strripos(public_path(), "/"));
            $view_location = $loc . "/resources/views/emails/" . $emailtemplateTrans->template_key . '-' . $langCode . ".blade.php";
            $view_resource = fopen($view_location, "w+");
            fwrite($view_resource, $emailtemplateTrans->html_content);
            fclose($view_resource);
        }

        $response = ['message' => trans('Activities::activities.saved_successfully')];
        return response()->json($response, 201);
    }

    // Get SEO URL function here
    function seoUrl($string) {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
    /**
     *
     *
     * @param
     * @return
     */
    public function updateEmailTemplate(Request $request, $apiKey = '', $id) {
//dd($request);
        $emailtemplate = EmailTemplate::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $emailtemplate->updated_by = $author;
        $emailtemplate->active = false;
        if ($request->active) {
            $emailtemplate->active = true;
        }
        $emailtemplate->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'subject_' . $langCode;
            $message = 'html_content_' . $langCode;
            $emailtemplateTrans = EmailTemplateTrans::where('etemplate_id', $emailtemplate->id)->where('lang', $langCode)->first();
            if (empty($emailtemplateTrans)) {
                $emailtemplateTrans = new EmailTemplateTrans;
                $emailtemplateTrans->etemplate_id = $emailtemplate->id;
                $emailtemplateTrans->lang = $langCode;
            }

//            $template_key = $this->seoUrl($request->$name);
            $emailtemplateTrans->status = false;
            if ($request->active) {
                $emailtemplateTrans->status = true;
            }
            $emailtemplateTrans->subject = ucwords($request->$name);
            $emailtemplateTrans->html_content = $request->$message;
//            $emailtemplateTrans->template_key = $template_key;
            $emailtemplateTrans->save();
            if ($emailtemplateTrans->template_key != "active-user"){
                $path = public_path();
                $loc = substr($path, 0, strripos(public_path(), "/"));
                $view_location = $loc . "/resources/views/emails/" . $emailtemplateTrans->template_key . '-' . $langCode . ".blade.php";
                $view_resource = fopen($view_location, "w+");
                fwrite($view_resource, $emailtemplateTrans->html_content);
                fclose($view_resource);
            }
        }

        $response = ['message' => trans('Activities::activities.updated_successfully')];
        return response()->json($response, 201);
    }

}
