<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // $bloodStocks = DB::table('blood_stocks')
        //                 ->join('blood_types', 'blood_stocks.id_blood_type', 'blood_types.id')
        //                 ->groupBy('id_blood_type')
        //                 ->selectRaw('rumah.blok, count(pembayaran.total) as jumlah_pembayaran, max(tanggal_bayar) as pembayaran_terakhir');
        return view('user.bloodStock');
    }

    public function detail(Request $request)
    {

    }
}
