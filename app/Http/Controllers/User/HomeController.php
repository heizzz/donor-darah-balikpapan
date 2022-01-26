<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appointment = DB::table('appointments')
                        ->where('id_user', '=', Auth::user()->id)
                        ->whereIn('status', ["pending", "ongoing"])
                        ->first();
        return view('user.home');
    }
}