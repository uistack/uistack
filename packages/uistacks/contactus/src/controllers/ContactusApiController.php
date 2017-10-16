<?php
namespace UiStacks\Contactus\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Contactus\Models\Contactus;
use UiStacks\Contactus\Models\ContactusSection;
use UiStacks\Contactus\Models\ContactusSectionTrans;
use UiStacks\Contactus\Models\ContactusTrans;
use UiStacks\Emailtemplates\Models\EmailTemplateTrans;
use UiStacks\Contactus\Models\ContactusReplyTrans;
use Illuminate\Support\Facades\Input;
use Auth;
use Lang;
use UiStacks\Settings\Models\Setting;
use Validator;
use Illuminate\Support\Facades\URL;
use Config;
use Illuminate\Support\Facades\Mail;

class ContactusApiController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | UiStacks Pages API Controller
   |--------------------------------------------------------------------------
   |
   */

    /**
     *
     *
     * @param
     * @return
     */
    public function validatation($request)
    {
        $languages = config('uistacks.locales');
        $rules['page_url'] = 'unique:pages';
        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['name_'.$code.''] = 'required|max:40';
                    }
                }
            }
        }
        return \Validator::make($request->all(), $rules);
    }

    /**
     *list section item
     */
    public function listSectionItems(Request $request)
    {
        $contactrequest = ContactusSection::FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        return $contactrequest;
    }
    /**
     *list item
     */
    public function listItems(Request $request)
    {
        $contactrequest = Contactus::FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        return $contactrequest;
    }

    public function postReply(Request $request, $id) {
        $contact_request = ContactusTrans::where('contact_id', $id)->first();
        if ($contact_request) {
            // validate request
            $data = $request->all();
            $validate_response = Validator::make($data, array(
                'email' => 'required|email',
                //                        'subject' => 'required',
                'message' => 'required',
            ));

            if ($validate_response->fails()) {
                return redirect(URL::previous())->withErrors($validate_response)->withInput();
            } else {
                $arr_request_data = array();

                ContactusTrans::where('contact_id', $id)->update(array('is_reply'=>'1'));

                $obj=new ContactusReplyTrans();
                $obj->reply_email = $request->email;

                $obj->reply_subject = '';
                $obj->from_user_id = Auth::user()->id;
                $obj->reply_message = $request->message;
                $obj->contact_request_id = $id;
                $obj->lang= Lang::getlocale();
                $obj->save();

                // Send email
                $name = Setting::find(1)->value;
                $email = Setting::find(3)->value;

                $this->setMailSettings();
                $arr_keyword_values = array();
                $arr_keyword_values['userName'] = $contact_request->store_name;
                $arr_keyword_values['messageContent'] = $request->message;
//                dd($arr_keyword_values);
                /*try {
                    Mail::send('emails.contact-request-reply', $arr_keyword_values, function ($msg) use ($request,  $contact_request,$name,$email) {
                        $msg->from($email, $name);
                        $msg->to($contact_request->contact_email);
                        $msg->subject(trans('Contactus::contactus.admin_reply'));
                    });
                } catch (\Exception $e) {
                    dd($e);
                }*/
                $emailtemplateAdmin = EmailTemplateTrans::where(array('template_key'=> 'admin-contacted', 'lang'=>Lang::getlocale()))->first();
                try {
                    Mail::send('emails.admin-contacted'.'-'.Lang::getlocale(), $arr_keyword_values, function ($msg) use ($request, $contact_request, $name,$email, $emailtemplateAdmin) {
                        $msg->from($email, $name);
                        $msg->to($contact_request->contact_email);
                        $msg->subject($emailtemplateAdmin->subject);
                    });
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
                \Session::flash('alert-class', 'alert-success');
                \Session::flash('message', trans('Contactus::contactus.reply_post_msg'));
                return redirect(URL::previous())->with('status', 'Reply posted successfully!');
            }
        } else {
            return redirect(URL::previous());
        }
    }
    /**
     *
     *
     * @param
     * @return
     */
    public function storeSection(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $ar_name = ContactusSectionTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();
        $en_name = ContactusSectionTrans::where('name', ucfirst(strtolower($request->name_en)))->first();

        if (isset($ar_name->name) || isset($en_name->name)) {
            $response = ['alert-class'=>'alert-danger','message' => trans('Contactus::contactus.duplicate_section_msg')];
            return response()->json($response, 201);
        }

        $contactus_section = new ContactusSection();
        $contactus_section->active = false;
        if ($request->active) {
            $contactus_section->active = true;
        }
        $contactus_section->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $contactus_trans_section = new ContactusSectionTrans;
            $contactus_trans_section->section_id = $contactus_section->id;
            $contactus_trans_section->name = ucfirst(strtolower($request->$name));
            $contactus_trans_section->email = $request->email;
            $contactus_trans_section->lang = $langCode;
            $contactus_trans_section->save();
        }

        $response = ['message' => trans('Contactus::contactus.saved_successfully')];
        return response()->json($response, 201);
    }

    public function updateContactSection(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contactus_section = ContactusSection::find($id);

        $contactus_section->active = false;
        if ($request->active) {
            $contactus_section->active = true;
        }
        $contactus_section->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $contactus_trans_section = ContactusSectionTrans::where('section_id', $contactus_section->id)->where('lang', $langCode)->first();
            if (empty($contactus_trans_section)) {
                $contactus_trans_section = new ContactusSectionTrans;
                $contactus_trans_section->section_id = $contactus_section->id;
                $contactus_trans_section->lang = $langCode;
            }
            $contactus_trans_section->name = ucfirst(strtolower($request->$name));
            $contactus_trans_section->email = $request->email;
            $contactus_trans_section->save();
        }

        $response = ['message' => trans('Contactus::contactus.updated_successfully')];
        return response()->json($response, 201);
    }

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

}