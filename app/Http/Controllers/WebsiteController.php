<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use UiStacks\Activities\Models\Activity;
use UiStacks\Countries\Models\Country;
use UiStacks\Countries\Models\CountryTrans;
use UiStacks\Countries\Models\Area;
use UiStacks\Countries\Models\AreaTrans;
use UiStacks\Users\Models\User;
use UiStacks\Users\Models\UserRole;
use UiStacks\Media\Models\Media;
use UiStacks\Banners\Models\Banner;
use UiStacks\Settings\Controllers\SmsController;
use UiStacks\Emailtemplates\Models\EmailTemplate;
use UiStacks\Emailtemplates\Models\EmailTemplateTrans;
use UiStacks\Stores\Models\Store as webStore;
use UiStacks\Stores\Controllers\StoresApiController as StoreApi;
use UiStacks\Stores\Models\StoreTrans;
use Auth;
use Lang;
use UiStacks\Media\Controllers\MediaApiController as MediaAPI;
use UiStacks\Users\Controllers\UsersApiController as API;
use UiStacks\Settings\Models\Setting;
use Config;
use Mail;
use Validator;
use UiStacks\Pages\Models\Page;
use Socialite;
//use Illuminate\Support\Facades\Validator;
//seotool
//use SEOMeta;
//use OpenGraph;
//use Twitter;
## or
use SEO;

class WebsiteController extends Controller {

    public function __construct() {
        //$pages    =   Page::all();
        $this->api = new API;
        $this->storeApi = new StoreApi;
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
     * Home page
     *
     * @var view
     */
    public function home(Request $request) {
        SEO::setTitle('Home');
        SEO::setDescription('This is my page description');
        SEO::opengraph()->setUrl('http://current.url.com');
        SEO::setCanonical('https://codecasts.com.br/lesson');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@LuizVinicius73');

        $request->request->add(['paginate' => 20]);
        $items = $this->storeApi->listItemsFront($request);

        $pages = Page::all();
        $activities = Activity::where('active', 1)->get();
        $countries = Country::where('active', 1)->get();
        if(isset($request->country)){
            $areas = Area::where(array('country_id'=> $request->country,'active'=> 1))->get();
        }else{
            $areas = [];
        }

        $stores = webStore::where('active', 1)->get();
        $banners = Banner::where('active', '1')->whereDate('start_date', '<=', date('Y-m-d'))->whereDate('end_date', '>=', date('Y-m-d'))->get();
        return view('website.home.index', compact('pages','activities', 'countries', 'areas', 'stores', 'banners','items'));
        /*
        if(\Request::segment(1) ==""){
            $lang = 'en';
        }else{
            $lang = \Request::segment(1);
        }
        if(\Request::segment(2)==""){
            $cur_page = "home";
        }else{
            $cur_page = \Request::segment(2);
        }
        return redirect('/'.$lang.'/'.$cur_page);
        */
    }

    public function index(Request $request) {
        SEO::setTitle('Home');
        SEO::setDescription('This is my page description');
        SEO::opengraph()->setUrl('http://current.url.com');
        SEO::setCanonical('https://codecasts.com.br/lesson');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@LuizVinicius73');

        $request->request->add(['paginate' => 20]);
        $items = $this->storeApi->listItemsFront($request);

        $pages = Page::all();
        $activities = Activity::where('active', 1)->get();
        $countries = Country::where('active', 1)->get();
        if(isset($request->country)){
            $areas = Area::where(array('country_id'=> $request->country,'active'=> 1))->get();
        }else{
            $areas = [];
        }

        $stores = webStore::where('active', 1)->get();
        $banners = Banner::where('active', '1')->whereDate('start_date', '<=', date('Y-m-d'))->whereDate('end_date', '>=', date('Y-m-d'))->get();
        return view('website.home.index', compact('pages','activities', 'countries', 'areas', 'stores', 'banners','items'));
    }

    /**
     * Auth login
     *
     * @var view
     */
    public function login() {
        return view('website.auth.login');
    }

    /*
     * Login Action
     */

    public function postLogin(Request $request) {
        $this->validate($request, [
            'user_email' => 'required|email',
            'user_password' => 'required'
        ]);
        $credentials = [
            'email' => $request->user_email,
            'password' => $request->user_password,
            'confirmed' => 1,
            'active' => 1
        ];
//                dd($credentials);
        if (Auth::attempt($credentials, $request->has('remember'))) {
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('project.login_successfully'));
            if (Auth::user()->userRole->role_id < 4) {
                return redirect('/' . Lang::getlocale() . '/admin');
            }
            $user = Auth::user();
            return redirect(action('WebsiteController@dashboard', [$user->id, $user->phone, 'confirm_account']));
        } else {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('project.invalid_login_data'));
            return back()->withInput();
        }
    }

    public function checkEmailAvailability(Request $request){
        $email = $request->get('email');
        $username = User::where('email', '=', $email)->first();
        if(!$username){
//            return ['valid'=>true];
            echo 'true';
        } else {
//            return ['valid'=>false];
            echo 'false';
        }
    }
    /**
     * Auth register
     *
     * @var view
     */
    public function register() {
        $countries = Country::where('active', 1)->get();
        return view('website.auth.register', compact('countries'));
    }

    /**
     * Auth register
     *
     * @var view
     */
    public function postRegister(Request $request) {
//        dd($request);
        Validator::extend('phone_number_must_between', function($attribute, $value, $parameters, $validator) {
            if (!((strlen($value) == 12 && substr($value, 0, 4) == "9665" ) || (strlen($value) == 10 && substr($value, 0, 2) == "05") || (strlen($value) == 9 && substr($value, 0, 1) == "5"))) {
                return false;
            } else {
                return true;
            }
        });
        $messages = array(
            'phone_number_must_between' => trans('Users::users.phone_number_must_between')
        );

        $this->validate($request, [
            'name' => 'required|unique:users|max:255',
            //            'country' => 'required',
            //            'area' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|confirmed|min:6|max:20',
        ], $messages);
        $emaiUsername = explode('@',$request->email);
        $user = new User;
        $user->name = $request->name;
        $user->username = $emaiUsername[0];
//        $user->country_id = $request->country;
//        $user->area_id = $request->area;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->password = bcrypt($request->password);
        if ($request->phone_show) {
            $user->phone_show = true;
        }
        if ($request->email_show) {
            $user->email_show = true;
        }
        $user->confirmation_code = rand(pow(10, 4 - 1), pow(10, 4) - 1);
        $user->email_code = rand(pow(10, 4 - 1), pow(10, 4) - 1);

        $user->save();

        $user_id = $user->id;

        if ($request->avatar) {
            // $request->avatar = $request->avatar->storeAs('avatars', $request->phone.'-'.date('Y-m-d-h:i:sa').'.jpg');
            $request->request->add(['files' => $request->avatar]);
            $media = new MediaAPI;
            $media = $media->uploadFiles($request, $user_id);
            $options['media']['main_image_id'] = $media[0]->id;
            $user->options = $options;
            $user->save();
        }

        // User role
        $userRole = new UserRole;
        $userRole->user_id = $user->id;
        $userRole->role_id = 5; // member
        $userRole->save();

        /*
        // Send sms validation
        $this->sendConfirmationCode($user->phone, $user->confirmation_code);

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('project.registerd_successfuly_and_sms_sent'));

        // redirect to sms validation code
        return redirect(action('WebsiteController@confirmCode', [$user->id, $user->phone, 'confirm_account']));*/

        //send email
        // Send email

        //Assign values to all macros
        $arr_keyword_values['username'] = $request->name;
        $arr_keyword_values['activationKey'] = $user->email_code;
//        $arr_keyword_values['contactDate'] = date("jS F Y h:i:s A");

        $name = Setting::find(1)->value;
        $email = Setting::find(3)->value;
        $this->setMailSettings();
//                    dd($message);
        //user mail setting
        $emailtemplateUser = EmailTemplateTrans::where(array('template_key'=> 'active-user', 'lang'=>Lang::getlocale()))->first();
//        $emailtemplateAdmin = EmailTemplateTrans::where(array('template_key'=> 'admin-contacted', 'lang'=>Lang::getlocale()))->first();
//        $admin_user = User::where('id',1)->first();
        try {
            Mail::send('emails.active-user'.'-'.Lang::getlocale(), $arr_keyword_values, function ($message) use ($request, $email, $name, $emailtemplateUser) {
//                    $message->from($email, $name);
                $message->from($email, $name);
                $message->to($request->email);
                $message->subject($emailtemplateUser->subject);
            });
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect(action('WebsiteController@verifyUserAccount', [$user->id, $user->username, 'confirm_account']));
    }
    /**
     * Confirm email
     */
    public function verifyUserAccount($userId, $userName, $confirmationType) {
        $user = User::where('id', $userId)->where('phone', $userName)->first();
        if (!$user) {
            alert(404);
        } elseif (!$user->confirmation_code) {
            return redirect('/');
        }
        return view('website.auth.confirm-email', compact('userId', 'confirmationType'));
    }
    /**
     * Confirm user account by email.
     *
     * @var redirect
     */
    public function postVerifyAccount(Request $request, $userId) {
        $this->validate($request, [
            'code' => 'required'
        ]);
        $user = User::find($userId);
        if ($request->code != $user->confirmation_code) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('project.confirmation_code_doesnt_match'));
            return back();
        }
        $user->confirmation_code = '';
        $user->phone_confirmed = true;
        $user->confirmed = true;
        $user->active = true;
        $user->save();

        Auth::loginUsingId($user->id);

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('project.account_confirmed_successfully'));
        // redirect home page
        return redirect('/');
    }

    public function editProfile() {
        $this->redirectWhenInactive();
        if (isset(Auth::user()->id)) {
            $item = User::findOrFail(Auth::user()->id);
            $countries = Country::where('active', 1)->get();
            $areas = Area::where('country_id', Auth::user()->country_id)->get();
            //           dd($areas);
            $edit = 1;
            $webmeta['title'] = "Edit Profile";
            $webmeta['keywords'] = "Edit Profile";
            $webmeta['description'] = "Edit Profile";
            return view('website.auth.edit', compact('webmeta','item', 'countries', 'areas', 'edit'));
        } else {
            return redirect('/');
        }
    }

    public function emailChange($userId = "", $confirmationCode = "") {
        //$this->redirectWhenInactive();
        $user = User::where('id', $userId)->where('email_code', $confirmationCode)->first();
        if (isset($user->id)) {
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('project.email_change_success'));
            $user->email_code = NULL;
            $user->confirmed = 1;
            $user->save();
        } else {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('project.wrong_url'));
        }
        return redirect('/');
    }

    /**
     * Send sms to user phone
     *
     * @var void
     */
    public function sendConfirmationCode($phone, $confirmationCode) {
        // Send Confirmation SMS
        $message = trans('project.activation_code_msg') . $confirmationCode;
        try {
            $sms = new SmsController;
            $send_sms = $sms->SendSMS($phone, $message);
        } catch (\Exception $e) {

        }
    }

    public function getSelectedCities(Request $request) {
        if (isset($_POST['selectedValues'])) {
            $selectedValues = $_POST['selectedValues'];
            if (count($selectedValues) > 0) {
                $options = "";
                foreach ($selectedValues as $country_id) {

                    $area = Area::where('active', 1)->where('country_id', $country_id)->get();
                    if (count($area) > 0) {
                        foreach ($area as $ar) {
                            $options.= "<option value='" . $ar->trans->area_id . "'>" . $ar->trans->name . "</option>";
                        }
                    }
                }
            }
            echo $options;
        }
    }

    /**
     * Confirm phone
     *
     * @var view
     */
    public function confirmCode($userId, $userPhone, $confirmationType) {
        $user = User::where('id', $userId)->where('phone', $userPhone)->first();
        if (!$user) {
            alert(404);
        } elseif (!$user->confirmation_code) {
            return redirect('/');
        }
        return view('website.auth.confirm_phone', compact('userId', 'confirmationType'));
    }

    /**
     * Confirm user account by phone number.
     *
     * @var redirect
     */
    public function postConfirmCode(Request $request, $userId) {
        $this->validate($request, [
            'code' => 'required'
        ]);
        $user = User::find($userId);
        if ($request->code != $user->confirmation_code) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('project.confirmation_code_doesnt_match'));
            return back();
        }
        $user->confirmation_code = '';
        $user->phone_confirmed = true;
        $user->confirmed = true;
        $user->active = true;
        $user->save();

        Auth::loginUsingId($user->id);

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('project.account_confirmed_successfully'));
        // redirect home page
        return redirect('/');
    }

    /**
     * Auth register country areas
     *
     * @var view
     */
    public function countryAreas($countryId) {
        $areas = Area::where('country_id', $countryId)->where('active', 1)->get();
        $response = ['areas' => $areas];
        return response()->json($response, 201);
    }

    /*
     * Logout Action
     */

    public function logout() {
        Auth::logout();
        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('project.logout_successfully'));
        return redirect('/');
    }

    /**
     * Forgot password
     *
     * @var view
     */
    public function forgotPassword() {
        return view('website.auth.forgot_password');
    }

    /**
     * Forgot password user validation.
     *
     * @var view
     */
    public function forgotPasswordUserValidation(Request $request) {

        if (!$request->phone && !$request->email) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('project.phone_or_email_shouldnt_empty'));
            return back();
        }
        if ($request->phone) {
            $this->validate($request, [
                'phone' => 'required|numeric'
            ]);


            if (!((strlen($request->phone) == 12 && substr($request->phone, 0, 4) == "9665" ) || (strlen($request->phone) == 10 && substr($request->phone, 0, 2) == "05") || (strlen($request->phone) == 9 && substr($request->phone, 0, 1) == "5"))) {

                \Session::flash('alert-class', 'alert-danger');
                \Session::flash('message', trans('project.phone_number_must_between'));
                return redirect(Lang::getlocale() . "/" . 'forgot-password');
            }

            $user = User::where('phone', $request->phone)->first();
            if (!$user) {
                \Session::flash('alert-class', 'alert-danger');
                \Session::flash('message', trans('project.user_dosnt_match'));
                return back();
            }
            $user->confirmation_code = rand(pow(10, 4 - 1), pow(10, 4) - 1);
            $user->save();
            // Send sms validation
            $this->sendConfirmationCode($user->phone, $user->confirmation_code);

            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('project.confirmation_code_sent_successfully'));
            return redirect(action('WebsiteController@confirmCode', [$user->id, $user->phone, 'retrieve_password']));
        } elseif ($request->email) {
            $this->validate($request, [
                'email' => 'email'
            ]);

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                \Session::flash('alert-class', 'alert-danger');
                \Session::flash('message', trans('project.user_dosnt_match'));
                return back();
            }

            $user->confirmation_code = str_random(40);
            $user->save();
            // Send email
            $name = Setting::find(1)->value;
            $email = Setting::find(3)->value;

            $this->setMailSettings();
            try {
                Mail::send('emails.reset_password', ['userId' => $user->id, 'confirmationCode' => $user->confirmation_code], function ($msg) use($user, $name, $email) {
                    $msg->from($email, $name);
                    $msg->to($user->email);
                    $msg->subject(trans('project.reset_password'));
                });
            } catch (\Exception $e) {

            }

            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('project.check_your_email'));
            return redirect('/');
        }
    }

    /**
     * Retrieve password.
     *
     * @var redirect
     */
    public function postConfirmCodeRetrievePassword(Request $request, $userId) {
        $this->validate($request, [
            'code' => 'required'
        ]);
        $user = User::find($userId);
        if ($request->code != $user->confirmation_code) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('project.confirmation_code_doesnt_match'));
            return back();
        }
        $user->confirmation_code = str_random(40);
        $user->phone_confirmed = true;
        $user->save();
        // redirect
        return redirect(action('WebsiteController@resetPassword', [$user->id, $user->confirmation_code, 'phone']));
    }

    /**
     * Reset password
     *
     * @var view
     */
    public function resetPassword($userId, $confirmationCode, $method) {
        $user = User::where('id', $userId)->where('confirmation_code', $confirmationCode)->first();
        if (!$user) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('project.wrong_url'));
            return redirect('/');
        }
        return view('website.auth.reset_password', compact('userId', 'method'));
    }

    /**
     * Reset password
     *
     * return redirect
     */
    public function postResetPassword(Request $request, $userId, $method) {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6|max:20'
        ]);

        $user = User::findOrFail($userId);
        $user->password = bcrypt($request->password);
        if ($method == 'phone') {
            $user->phone_confirmed = true;
        } elseif ($method == 'email') {
            $user->email_confirmed = true;
        }
        $user->confirmation_code = '';
        $user->save();

        Auth::loginUsingId($userId);

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('project.password_reset_success'));
        // redirect home page
        return redirect('/');
    }
    /**
     * User profile
     *
     * @var view
     */
    public function dashboard() {
        $this->redirectWhenInactive();
        if (isset(Auth::user()->id)) {
            $item = User::findOrFail(Auth::user()->id);
            $webmeta['title'] = "Dashboard";
            $webmeta['keywords'] = "Dashboard";
            $webmeta['description'] = "Dashboard";
            return view('website.profile.dashboard', compact('ads_count', 'favourite_count', 'comment_count', 'user_fav', 'item', 'ad', 'comment', 'user_comments'));
        } else {
            return redirect('/');
        }
    }
    /**
     * User profile
     *
     * @var view
     */
    public function profile() {
        $this->redirectWhenInactive();

        if (isset(Auth::user()->id)) {
            $item = User::findOrFail(Auth::user()->id);

            $ad = Ad::where('created_by', Auth::user()->id)->orderBy('id', 'Desc')->limit(4)->get();
            $ads_count = Ad::where('created_by', Auth::user()->id)->get();
            $favourite = Favourite::where('user_id', Auth::user()->id)->limit(4)->get();
            $favourite_count = Favourite::where('user_id', Auth::user()->id)->get();
            $comment = Comment::where('user_id', Auth::user()->id)->where('active', 1)->limit(4)->get();
            $comment_count = Comment::where('user_id', Auth::user()->id)->where('active', 1)->get();


            if (isset($comment)) {
                foreach ($comment as $key => $value) {
                    $user_comments[$key]['comment'] = $comment[$key]->comment;
                    $user_comments[$key]['id'] = $comment[$key]->id;
                    $user_comments[$key]['ad_id'] = $comment[$key]->ad_id;
                    $user_comments[$key]['section'] = $comment[$key]->section;
                    $user_comments[$key]['commentUser'] = isset($comment[$key]->commentUser->trans->name) ? $comment[$key]->commentUser->trans->name : "";
                    $user_comments[$key]['thumbnail'] = isset($comment[$key]->commentUser->media->main_image->styles['thumbnail']) ? $comment[$key]->commentUser->media->main_image->styles['thumbnail'] : "uploads/fournotfour.jpeg";
                    $user_comments[$key]['created_at'] = $comment[$key]->created_at;
                }
            }
            if (isset($favourite)) {
                foreach ($favourite as $key => $value) {
                    $user_fav[$key]['ad_id'] = $favourite[$key]->ad_id;
                    $user_fav[$key]['section'] = $favourite[$key]->section;
                    $user_fav[$key]['commentUser'] = isset($favourite[$key]->favUser->trans->name) ? $favourite[$key]->favUser->trans->name : "";
                    $user_fav[$key]['thumbnail'] = isset($favourite[$key]->favUser->media->main_image->styles['thumbnail']) ? $favourite[$key]->favUser->media->main_image->styles['thumbnail'] : "uploads/fournotfour.jpeg";
                    $user_fav[$key]['created_at'] = $favourite[$key]->created_at;
                }
            }
            $webmeta['title'] = "Profile";
            $webmeta['keywords'] = "Profile";
            $webmeta['description'] = "Profile";
            return view('website.profile.profile', compact('ads_count', 'favourite_count', 'comment_count', 'user_fav', 'item', 'ad', 'comment', 'user_comments'));
        } else {
            return redirect('/');
        }
    }

    /**
     * User reset mobile number
     *
     * @var view
     */
    public function resetMobile() {
        return view('website.profile.reset_mobile');
    }

    /**
     * Show page
     *
     * @var view
     */
    public function showPage() {
        return view('website.pages.show');
    }

    public function changeShowStatus(Request $request) {

        $this->redirectWhenInactive();

        if ($request->key == "phone") {
            $user = User::where('id', Auth::user()->id)->first();
            if ($request->status == 1) {
                $user->phone_show = 0;
            } else {
                $user->phone_show = 1;
            }
            $user->save();
            echo "1";
        }
        if ($request->key == "email") {
            $user = User::where('id', Auth::user()->id)->first();
            if ($request->status == 1) {
                $user->email_show = 0;
            } else {
                $user->email_show = 1;
            }
            $user->save();
            echo "1";
        }
    }

    /**
     * Contact us
     *
     * @var
     */
    public function createContact(Request $request) {
        if ($request->method() == 'GET') {
//            ContactusSection
            $sections = \UiStacks\Contactus\Models\ContactusSection::where(array('active'=> "1"))->get();
            $webmeta['title'] = "Contact Us";
            $webmeta['keywords'] = "Ask your problem";
            $webmeta['description'] = "Find solution of your problem.";
            return view('website.contact-us.index', compact('webmeta','sections'));
        } elseif ($request->method() == 'POST') {
            Validator::extend('phone_number_must_between', function($attribute, $value, $parameters, $validator) {
                if (!((strlen($value) == 12 && substr($value, 0, 4) == "9665" ) || (strlen($value) == 10 && substr($value, 0, 2) == "05") || (strlen($value) == 9 && substr($value, 0, 1) == "5"))) {
                    return false;
                } else {
                    return true;
                }
            });
            $messages = array(
                'phone_number_must_between' => 'Please enter a valid number.'
            );

            $rules = $request->all();
            $this->validate($request, [
//                'section' => 'required',
                'store_name' => 'required',
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
//            $contact_data->section_id = "";
            if ($request->section) {
//                $contact_data->section_id = $request->section;
            }
            $contact_data->active = "1";
            $contact_data->save();

//            $contact_data = \UiStacks\Contactus\Models\Contactus::create();
            $obj = new \UiStacks\Contactus\Models\ContactusTrans();
            $obj->lang = Lang::getlocale();
            $obj->contact_id = $contact_data->id;
//            $obj->section_id = $contact_data->section_id;
            $obj->contact_email = $request->contact_email;
            $obj->store_name = $request->store_name;
            $obj->store_url = $request->store_url;
            $obj->other_info = $request->other_info;
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

    /**
     * Contact us
     *
     * @var
     *
     *
     *
     *
     */
    public function validateContact($request) {
        $rules['name'] = 'required';
        $rules['email'] = 'required|email';
        $rules['mobile'] = 'required|numeric|phone_number_must_between';
        $rules['subject'] = 'required';
        $rules['message'] = 'required';
        Validator::extend('phone_number_must_between', function($attribute, $value, $parameters, $validator) {

            if (!((strlen($value) == 12 && substr($value, 0, 4) == "9665" ) || (strlen($value) == 10 && substr($value, 0, 2) == "05") || (strlen($value) == 9 && substr($value, 0, 1) == "5"))) {
                return false;
            } else {
                return true;
            }
        });
        $messages = array(
            'phone_number_must_between' => 'الرجاء إدخال رقم الهاتف الصحيح 9665XXXXXXXX، 05XXXXXXXX، 5XXXXXXXX'
        );
        return \Validator::make($request->all(), $rules, $messages);
    }

    public function storeContact(Request $request) {

        \Session::flash('alert-class', 'alert-success');
        $succes_msg = "Thanks for contacting us! We will get back to you shortly!";
        \Session::flash('message', trans('project.contactus_success'));
        return back();
    }

    /**
     * Public profile
     *
     * @var
     */
    public function publicProfile($userName) {

        $user = User::where('id', $userName)->where('active', 1)->first();

        if ($user == NULL) {
            return redirect(Lang::getlocale() . "/" . 'home');
        }

        $latest_ads = Ad::where('active', 1)->where('created_by', $userName)->orderBy('id', 'DESC')->limit(15)->get();

        $ads = Ad::where('active', 1)->where('created_by', $userName)->get();

        $ads_count = count($ads);
        return view('website.profile.public_profile', compact('user', 'latest_ads', 'ads_count'));
    }

    public function redirectWhenInactive() {
        if (Auth::user()) {
            if (Auth::user()->active == 0) {
                Auth::logout();
                \Session::flash('alert-class', 'alert-danger');
                \Session::flash('message', trans("Core::operations.account_inactive_msg"));
                return redirect('/');
            } else {
                return 0;
            }
        } else {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans("Core::operations.signin_alert"));
            return redirect('/');
        }
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
//        return redirect($this->redirectTo);
        return redirect('/');
    }

    public function findOrCreateUser($user, $provider)
    {
//        dd($user->user);
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        if($user->user['gender'] == "female"){
            $gender = "2";
        }else{
            $gender = "1";
        }
        $user_password = $this->randomNum(6);
        $password = bcrypt($user_password);
        $confirmation_code = rand(pow(10, 4 - 1), pow(10, 4) - 1);
        return User::create([
                                'name'     => $user->name,
                                'email'    => $user->email,
                                'password' => $password,
                                'gender'   => $gender,
                                'active'   => "1",
                                'confirmed'   => "1",
                                'provider' => $provider,
                                'provider_id' => $user->id,
                                'confirmation_code'=>$confirmation_code
                            ]);
    }

    function randomNum($size) {
        $alpha_key = '';
        $keys = range('A', 'Z');
        for ($i = 0; $i < 2; $i++) {
            $alpha_key .= $keys[array_rand($keys)];
        }
        $length = $size - 2;
        $key = '';
        $keys = range(0, 9);
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $alpha_key . $key;
    }

}
