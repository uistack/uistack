<?php

namespace UiStacks\Users\Controllers;

use Illuminate\Http\Request;
use UiStacks\Users\Controllers\UsersApiController as API;
use UiStacks\Users\Models\User;
use UiStacks\Roles\Models\Role;
use UiStacks\Roles\Models\RoleTrans;
use Auth;
use UiStacks\Countries\Models\Country;
use UiStacks\Countries\Models\Area;
use UiStacks\Users\Models\Permission;
use UiStacks\Users\Models\PermissionRole;
use UiStacks\Users\Models\PermissionTrans;
use UiStacks\Users\Models\PermissionUser;
use Illuminate\Support\Facades\Lang;

class UsersController extends UsersApiController {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Users Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Users for the application.
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
    public function index(Request $request, $role) {
        if ($role == 'supervisors') {
            $roleId = 4;
//            $request->request->add(['paginate' => 20]);
            $request->request->add(['role_id' => $roleId, 'paginate' => 20]);
        } elseif ($role == 'members') {
            $roleId = 5;
            $request->request->add(['role_id' => $roleId, 'paginate' => 20]);
        }

        $items = $this->api->listUsers($request);
        return view('Users::users.index', compact('items'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create(Request $request, $role) {
        $countries = Country::where('active', 1)->get();
        $areas = Area::where('active', 1)->get();
        $roles = Role::where('id' , '!=', 5)->get();
//        dd($countries->trans->name);
        return view('Users::users.create-edit', compact('items','countries', 'areas','roles'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request, $role) {
        if ($role == 'supervisors') {
            $roleId = 4;
        } elseif ($role == 'members') {
            $roleId = 5;
        }

//        if (!((strlen($request->phone) == 12 && substr($request->phone, 0, 4) == "9665" ) || (strlen($request->phone) == 10 && substr($request->phone, 0, 2) == "05") || (strlen($request->phone) == 9 && substr($request->phone, 0, 1) == "5"))) {
//            \Session::flash('alert-class', 'alert-danger');
//            \Session::flash('message', trans('project.phone_number_must_between'));
//            return back();
//        }
        $request->request->add(['role_id' => $roleId]);
        $store = $this->api->storeUser($request);
        $store = $store->getData();



        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Users\Controllers\UsersController@index', $role));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($role, $id) {
        $item = User::findOrFail($id);
        $countries = Country::where('active', 1)->get();
        $areas = Area::where('country_id', $item->country_id)->get();
        $roles = Role::where('id' , '!=', 5)->get();
        $edit = 1;
//        dd($areas);
        return view('Users::users.create-edit', compact('item', 'countries', 'areas', 'edit','roles'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $role, $id) {
        if ($role == 'supervisors') {
            $roleId = 4;
        } elseif ($role == 'members') {
            $roleId = 5;
        }
        $request->request->add(['role_id' => $roleId]);

//        dd($request);
        $update = $this->api->updateUser($request, $id);
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Users\Controllers\UsersController@index', $role));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($role, $id) {
        $item = User::findOrFail($id);
        return view('Users::users.confirm-delete', compact('item'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function bulkOperations(Request $request) {
        if ($request->ids) {
            $items = User::whereIn('id', $request->ids)->get();
//            dd($items);
            if ($items->count()) {
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if ($request->operation && $request->operation === 'activate') {
                        $item->active = true;
                        $item->updated_by = Auth::user()->id;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    } elseif ($request->operation && $request->operation === 'deactivate') {
                        $item->active = false;
                        $item->updated_by = Auth::user()->id;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }
                }
            }

            \Session::flash('alert-class', 'alert-success');
        } else {
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }

    //change member status
    public function changeStatus(Request $request) {
        if ($request->user_id != "") {
            /* updating the user status. */
            $arr_to_update = array("active" => $request->user_status,'confirmed'=>1);
            /* updating the user status  value into database */
            User::where('id', $request->user_id)->update($arr_to_update);
            echo json_encode(array("error" => "0"));
        } else {
            /* if something going wrong providing error message.  */
            echo json_encode(array("error" => "1"));
        }
    }

    public function givePermission(Request $request, $role_id = "", $user_id = "") {
//        dd($request);
        if ($role_id == 'supervisors') {
            $user = User::where('id', $user_id)->first();
            if (isset($user)) {
                $user_permission = $user->hasPermission;
                foreach ($user_permission as $key => $value) {
                    $arr_user_permission[] = $user_permission{$key}->getPermission->id;
                }
                $permissions = Permission::where('active','1')->orderBy('id','Desc')->get();
                if ($request->method() == "GET") {
                    return view('Users::users.permission', compact('user', 'permissions', 'user_permission', 'arr_user_permission'));
                } else {
                    $users_all_permissions = PermissionUser::where('user_id', $user_id)->get();
                    if (isset($users_all_permissions) && count($users_all_permissions) > 0) {
                        foreach ($users_all_permissions as $del) {
                            $del->delete();
                        }
                    }
                    $permission_ids = $request->permission_id;
                    if (isset($permission_ids) && count($permission_ids) > 0) {
                        foreach ($permission_ids as $new_per) {
                            $new_permission = new PermissionUser;
                            $new_permission->user_id = $user_id;
                            $new_permission->permission_id = $new_per;
                            $new_permission->save();
                        }
                    }
                    \Session::flash('alert-class', 'alert-success');
                    \Session::flash('message', trans("Users::users.permission_set_successfully"));
                    return redirect(url('/').'/'.Lang::getLocale().'/admin/users/supervisors');
                }
            }
        } else {
            return redirect('/');
        }
    }

}
