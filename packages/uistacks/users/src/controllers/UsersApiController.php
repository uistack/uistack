<?php

namespace UiStacks\Users\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use UiStacks\Users\Models\User;
use UiStacks\Users\Models\UserRole;
use Auth;
use Response;
use Illuminate\Support\Facades\Lang;
use Validator;

class UsersApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Users API Controller
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
        $rules['name'] = 'required|unique:users';
        $rules['country'] = 'required';
        $rules['area'] = 'required';
        $rules['role'] = 'required';
        $rules['email'] = 'required|email|unique:users';   // Unique

//        $rules['phone'] = 'required|numeric|phone_number_must_between|unique:users';
        $rules['phone'] = 'required|numeric|unique:users';
        $rules['password'] = 'required|min:6|confirmed';
        $rules['password_confirmation'] = 'required';


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


        if ($request->segment(2) === 'api') {
            $rules['author'] = 'required|integer';
        }

        return \Validator::make($request->all(), $rules, $messages);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateValidatation($request,$old_email="",$old_phone="",$old_name="")
    {

        $languages = config('uistacks.locales');
        $rules[ 'name' ] = 'required';
        $rules[ 'country' ] = 'required';
        $rules[ 'area' ] = 'required';
        $rules['role'] = 'required';
        if ($old_email == $request->email)
            $rules[ 'email' ] = 'required|email';
        else
            $rules[ 'email' ] = 'required|email|unique:users';


//        if($old_phone==$request->phone)
//            $rules['phone'] = 'required|numeric|phone_number_must_between';
//        else
//            $rules['phone'] = 'required|numeric|phone_number_must_between|unique:users';

        if ($old_phone == $request->phone){
            $rules[ 'phone' ] = 'required';
        }else {
//            $rules[ 'phone' ] = 'required|numeric|unique:users';
            $rules[ 'phone' ] = 'required|unique:users';
        }


        if($old_name==$request->name)
            $rules['name'] = 'required';
        else
            $rules['name'] = 'required|unique:users';



        if ($request->segment(2) === 'api') {
            $rules['updatedBy'] = 'required|integer';
        }

        $rules['password'] = 'min:6|confirmed';
//        $rules['password_confirmation'] = 'required';

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


        return \Validator::make($request->all(), $rules,$messages);
    }

    /**
     * Login Validation
     *
     * @param $request
     *
     * @return $validator
     */
    public function loginValidatation($request) {
        $rules['user_email'] = 'required';
        $rules['user_password'] = 'required';
        return \Validator::make($request->all(), $rules);
    }

    /**
     * Login Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        $loginValidator = $this->loginValidatation($request);
        if ($loginValidator->fails()) {
            return response()->json(['status' => '2', 'response' => $loginValidator->errors()->all()[0], 'errors' => $loginValidator->errors()], 422);
        }
        $user = false;
        $username = $request->get('user_email');
        $password = $request->get('user_password');
        $credentials = [
            'email' => $username,
            'password' => $password,
            'confirmed' => 1,
            'active' => 1
        ];
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = User::where('email', $username)
                ->where('active', 1)
                ->where('confirmed', 1)
                ->first();
        } else {
            $user = User::where('email', $username)->first();
            if ($user && $user->active != '1') {
                $result = array('status' => '4', 'user_id' => $user->id, 'response' => trans('Users::users.invalid_login_data'));
            } else {
                $result = array('status' => '3', 'response' => trans('Users::users.invalid_login_data'));
            }
            return Response::json($result, 422);
        }
        if (!$user) {
            $result = array('status' => '3', 'response' => trans('Users::users.invalid_login_data'), 'errors' => array('msg' => trans('Users::users.invalid_login_data')));
            return response()->json($result, 422);
        } else {
            $result = array('status' => '1', 'user' => $user->id);
        }
        return response()->json($result, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function listUsers(Request $request) {
        $users = User::where('id','!=', 1)->FilterName()->FilterRole($request->get('role_id'))->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $users->appends(Input::except('page'));
        return $users;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function storeUser(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User;
        $user->name = $request->name;
        $user->country_id = $request->country;
        $user->area_id = $request->area;
        $user->email = $request->email;
        if ($request->email_show) {
            $user->email_show = true;
        }
        $user->iso2 = $request->iso2;
        $user->phone = $request->phone;
        if ($request->phone_show) {
            $user->phone_show = true;
        }

        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $user->created_by = $author;
        $user->password = bcrypt($request->password);
        $user->active = false;
        if ($request->active) {
            $user->active = true;
            $user->confirmed = true;
        }

//        echo $user->active;die;
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;

        $user->options = $options;
        $user->save();
        if(\Request::segment(4) == "supervisors") {
            // User role
            $userRole = new UserRole;
            $userRole->user_id = $user->id;
//        $userRole->role_id = $request->get('role_id');
            $userRole->role_id = $request->role;
            $userRole->save();
        }else{
            // User role
            $userRole = new UserRole;
            $userRole->user_id = $user->id;
//        $userRole->role_id = $request->get('role_id');
            $userRole->role_id = 5;
            $userRole->save();
        }
        $response = ['message' => trans('Core::operations.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateUser(Request $request, $id) {
//        dd($request->old_user_email);
        $validator = $this->updateValidatation($request,$request->old_user_email,$request->old_user_phone,$request->old_user_name);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }



        $user = User::find($id);
        $user->name = $request->name;
        $user->country_id = $request->country;
        $user->area_id = $request->area;
        $user->email = $request->email;
        $user->email_show = false;
        if ($request->email_show) {
            $user->email_show = true;
        }
        $user->iso2 = $request->iso2;
        $user->phone = $request->phone;
        $user->phone_show = false;
        if ($request->phone_show) {
            $user->phone_show = true;
        }

        if ($request->updatedBy) {
            $updatedBy = $request->updatedBy;
        } else {
            $updatedBy = Auth::user()->id;
        }

        $user->updated_by = $updatedBy;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->active = false;
        if ($request->active) {
            $user->active = true;
        }

        // Media
        $options['media']['main_image_id'] = $request->main_image_id;

        $user->options = $options;
        $user->save();
        if(\Request::segment(4) == "supervisors") {
            // User role
            $userRole = UserRole::where('user_id', $user->id)->first();
            $userRole->user_id = $user->id;
//        $userRole->role_id = $request->get('role_id');
            $userRole->role_id = $request->role;
            $userRole->save();
        }else{
            // User role
            $userRole = UserRole::where('user_id', $user->id)->first();
            $userRole->user_id = $user->id;
//        $userRole->role_id = $request->get('role_id');
            $userRole->role_id = 5;
            $userRole->save();
        }
        $response = ['message' => trans('Core::operations.updated_successfully')];
        return response()->json($response, 201);
    }

}
