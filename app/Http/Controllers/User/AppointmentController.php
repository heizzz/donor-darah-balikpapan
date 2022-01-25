<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
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
    public function create()
    {
        return view('home');
    }

    public function store(Request $request) 
    {

    }
    
    public function history()
    {
        return view('home');
    }

    public function donorDetail(Request $request) 
    {

    }

    public function appointmentDetail(Request $request) 
    {

    }
}
