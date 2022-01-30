<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd("pepeg");
        if (is_null(Auth::user()))
        {
            return view('home');
        }
        $idRole = Auth::user()->id_role;
        if ($idRole == 1) {
            return redirect()->route('user-home');
        }
        else if ($idRole == 2) {
            return redirect()->route('rs-home');
        }
        else if ($idRole == 3) {
            return redirect()->route('admin-home');
        }
        return view('home');
    }
}
