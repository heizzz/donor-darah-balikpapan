<?php

namespace App\Http\Controllers\Hospital;

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
        // get data
        $data = DB::table('blood_stocks')
            ->join('blood_types', 'blood_types.id', 'blood_stocks.id_blood_type')
            ->join('blood_components', 'blood_types.id', 'blood_stocks.id_blood_components')
            ->where('id_user', Auth::user()->id)
            ->get();

        return view('adminHospital.bloodStock', compact('data'));
    }

    public function update(Request $request)
    {
        // get data
        // $total = DB::table('blood_stocks')
        //     ->where('id', $request->input('id'))
        //     ->value('jumlah');
        $newTotal = $request->input('total');
        // $mode = $request->input('mode');

        // if ($mode === 'increment') {
        //     $total++;
        // } else if ($mode === 'decrement') {
        //     $total--;
        // }

        // update db
        DB::table('blood_stocks')
            ->where('id', $request->input('id'))
            ->update([
                'jumlah' => $newTotal,
                "updated_at" => Carbon::now()
            ]);

        return redirect()->route('rs-stock-index');
    }
}
