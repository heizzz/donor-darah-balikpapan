<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
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
        return view('adminApp.home');
    }

    public function listHospitals()
    {
        $hospitals = DB::table('users')
                        ->where('id_role', '=', 2)
                        ->get();
        return view('adminApp.listHospitals', compact('hospitals'));
    }

    public function detailHospital()
    {
        $hospitals = DB::table('users')
                        ->where('id_role', '=', 2)
                        ->where('id', '=', 2)
                        ->get();
        return view('adminApp.detailHospital', compact('hospitals'));
    }

    public function register(Request $request) 
    {

    }
}
