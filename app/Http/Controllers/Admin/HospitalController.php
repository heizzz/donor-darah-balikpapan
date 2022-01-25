<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
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
        $hospitals = DB::table('users')
                        ->where('id_role', '=', 2)
                        ->get();
        return view('adminApp.listHospitals', compact('hospitals'));
    }

    public function create()
    {
        $hospitals = DB::table('users')
                        ->where('id_role', '=', 2)
                        ->get();
        return view('adminApp.detailHospital', compact('hospitals'));
    }

    public function store()
    {
        $hospitals = DB::table('users')
                        ->where('id_role', '=', 2)
                        ->get();
        return view('adminApp.detailHospital', compact('hospitals'));
    }

    public function detail()
    {
        $hospitals = DB::table('users')
                        ->where('id_role', '=', 2)
                        ->get();
        return view('adminApp.detailHospital', compact('hospitals'));
    }

    public function update(Request $request) 
    {

    }

    public function delete(Request $request) 
    {

    }
}
