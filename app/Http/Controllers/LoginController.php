<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task\Task as Task;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        dd('Email: Shaun@laratasks.co.uk');
        //    return view('pages/admin')->withTask('task');


    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }
}
