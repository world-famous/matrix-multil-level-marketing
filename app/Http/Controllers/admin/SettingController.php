<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Adminsetting;

class SettingController extends Controller
{
    //
    public function index()
    {
    	return view('pages.admin.configurable.configurable');
    }

    public function setting(Request $request)
    {
    	$adminsetting=new Adminsetting;

    	$adminsetting->width=$request['width'];
    	$adminsetting->depth=$request['depth'];
    	$adminsetting->percent_value=serialize($request['percent']);
    	$adminsetting->account_email=$request['paypal_account'];
    	$adminsetting->membership_budget=$request['budget'];

    	$adminsetting->save();

    	return view('pages.admin.configurable.configurable');
    }

    public function show()
    {
        // $adminsetting=Adminsetting::all()->last();

        return view('pages.admin.configurable.show');
    }
}
