<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UiStacks\Faqs\Models\Faq;
use UiStacks\Faqs\Models\FaqTrans;
use UiStacks\Pages\Models\Page;
use UiStacks\Pages\Models\PageTrans;
use Auth;
use Lang;
use UiStacks\Users\Controllers\UsersApiController as API;
use UiStacks\Settings\Models\Setting;
use Config;
use Mail;
use UiStacks\Ads\Models\Section;
use Validator;

class FaqController extends Controller {

    public function __construct() {
        $this->api = new API;
    }

    /**
     * Overide Defualt Mail Settings.
     *
     * @return Response
     */
    public function setMailSettings() {
        Config::set('mail.driver', Setting::find(5)->value);
        Config::set('mail.host', Setting::find(6)->value);
        Config::set('mail.port', Setting::find(7)->value);
        Config::set('mail.username', Setting::find(8)->value);
        Config::set('mail.password', Setting::find(9)->value);
        Config::set('mail.from.address', Setting::find(10)->value);
        Config::set('mail.from.name', Setting::find(11)->value);
        Config::set('mail.encryption', Setting::find(12)->value);
    }

    /**
     * Show page
     *
     * @var view
     */
    public function faqs(Request $request) {
        $item = Faq::where(array('active'=>'1'))->get();
        if(count($item) == null){
            return redirect('/');
        }
        $webmeta['title'] = "FAQ's";
        $webmeta['keywords'] = "FAQ, frequently ask your question";
        $webmeta['description'] = "frequently ask your question and find solution";
        return view('website.faqs.index', compact('webmeta','item', 'trans'));
    }
    /**
     * faq Contact
     *
     * @var
     */
    public function faqContact(Request $request) {
            $messages = array(
                'phone_number_must_between' => 'Please enter a valid number.'
            );

            $rules = $request->all();
            $this->validate($request, [
                'name' => 'required',
                'contact_email' => 'required|email',
                'contact_phone' => 'required|numeric',
                'contact_subject' => 'required',
                'contact_message' => 'required',
            ], $messages);

            // Send email

            //Assign values to all macros
            $arr_keyword_values['userName'] = $request->store_name;
            $arr_keyword_values['message'] = $request->contact_message;
            $arr_keyword_values['contactDate'] = date("jS F Y h:i:s A");

            $name = Setting::find(1)->value;
            $email = Setting::find(3)->value;
            $this->setMailSettings();
//                    dd($message);
            //user mail setting
            $emailtemplateUser = EmailTemplateTrans::where(array('template_key'=> 'user-contacted', 'lang'=>Lang::getlocale()))->first();
            $emailtemplateAdmin = EmailTemplateTrans::where(array('template_key'=> 'admin-contacted', 'lang'=>Lang::getlocale()))->first();
            $admin_user = User::where('id',1)->first();
            try {
                Mail::send('emails.user-contacted'.'-'.Lang::getlocale(), $arr_keyword_values, function ($message) use ($request, $admin_user, $emailtemplateUser) {
//                    $message->from($email, $name);
                    $message->from($request->contact_email, $request->store_name);
                    $message->to($admin_user->email);
                    $message->subject($emailtemplateUser->subject);
                });
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
            /*$admin_user = User::where('id',1)->first();
            try {
                Mail::send('emails.user-contacted'.'-'.Lang::getlocale(), $arr_keyword_values, function ($message) use ($admin_user,$request, $name,$email, $emailtemplateAdmin) {
                    $message->from($email, $name);
                    $message->to($admin_user->email);
                    $message->subject($emailtemplateAdmin->subject);
                });
            } catch (\Exception $e) {
                dd($e->getMessage());
            }*/
            $contact_data = new \UiStacks\Contactus\Models\Contactus();
            $contact_data->section_id = "";
            if ($request->section) {
                $contact_data->section_id = $request->section;
                $contact_data->active = "1";
            }
            $contact_data->save();

//            $contact_data = \UiStacks\Contactus\Models\Contactus::create();
            $obj = new \UiStacks\Contactus\Models\ContactusTrans();
            $obj->lang = Lang::getlocale();
            $obj->contact_id = $contact_data->id;
            $obj->section_id = 1;
            $obj->contact_email = $request->contact_email;
            $obj->store_name = $request->store_name;
            $obj->is_read = "0";
            $obj->is_reply = "0";
            $obj->contact_subject = $request->contact_subject;
            $obj->contact_message = $request->contact_message;
            $obj->contact_phone = $request->contact_phone;
            $obj->reference_no = time();
            $obj->save();

            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('project.contactus_success'));
            return back();
    }
}
