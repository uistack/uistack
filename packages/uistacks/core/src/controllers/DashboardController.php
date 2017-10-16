<?php 
namespace UiStacks\Core\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

 	/*
    |--------------------------------------------------------------------------
    | UiStacks Products Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Products for the application.
    |
    */

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function index()
    {
//        echo 'here';die;
        return view('Core::dashboard.index');
    }
}