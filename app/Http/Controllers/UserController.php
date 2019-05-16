<?php

namespace App\Http\Controllers;

use DummyFullModelClass;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }
        return view('pages.user.home');
    }


}
