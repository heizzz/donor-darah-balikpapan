<?php

namespace App\Http\Controllers\Hospital;

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
    public function incoming()
    {
        return view('home');
    }
     

    public function list(Request $request) 
    {

    }

    public function changeStatus(Request $request) 
    {

    }

    public function detail(Request $request) 
    {

    }

    public function store(Request $request) 
    {

    }

    public function scan() 
    {

    }
}
