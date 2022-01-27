<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
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
                        ->whereNull('deleted_at')
                        ->select('users.name', 'users.alamat', 'users.id')
                        ->get();
        
        $bloodStocks = DB::table('blood_stocks')
                        ->leftJoin('blood_types', 'blood_stocks.id_blood_type', 'blood_types.id')
                        ->groupBy('id_blood_type', 'blood_types.name')
                        ->selectRaw('blood_stocks.id_blood_type, blood_types.name, sum(blood_stocks.jumlah) as totalBlood')
                        ->get();
        
        return view('user.bloodStock', compact('hospitals', 'bloodStocks'));
    }

    public function detail($id)
    {
        $bloodStocks = DB::table('blood_stocks')
        ->where('blood_stocks.id_user', '=', $id)
        ->leftJoin('blood_types', 'blood_stocks.id_blood_type', 'blood_types.id')
        ->select('blood_stocks.jumlah as totalBlood', 'blood_types.name')
        ->get();

        $hospitals = DB::table('users')
        ->where('id_role', '=', 2)
        ->whereNull('deleted_at')
        ->select('users.name', 'users.alamat', 'users.id')
        ->get();

        $rsName = DB::table('users')
            ->where('id', '=', $id)
            ->first()->name;
        
        return view('user.bloodStock', compact('hospitals', 'bloodStocks', 'id', 'rsName'));
    }
}
