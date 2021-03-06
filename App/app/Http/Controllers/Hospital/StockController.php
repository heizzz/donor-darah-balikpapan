<?php

namespace App\Http\Controllers\Hospital;

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
        // get data
        $data = DB::table('blood_stocks')
            ->join('blood_types', 'blood_types.id', 'blood_stocks.id_blood_type')
            ->leftJoin('blood_components', 'blood_components.id', 'blood_stocks.id_blood_component')
            ->select('blood_types.name as namaGolDar', 'blood_components.name as namaKomDar', 'blood_stocks.*')
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
        // $newTotal = $request->input('total');
        // $mode = $request->input('mode');

        // if ($mode === 'increment') {
        //     $total++;
        // } else if ($mode === 'decrement') {
        //     $total--;
        // }

        // update db
        // DB::table('blood_stocks')
        //     ->where('id', $request->input('id'))
        //     ->update([
        //         'jumlah' => $newTotal,
        //         "updated_at" => Carbon::now()
        //     ]);


        $secretKey = 'stock-';
        $data = $request->all();
        foreach ($data as $key => $value) {
            if (str_contains($key, $secretKey) == true) {
                $temp = str_replace($secretKey, '', $key);
                
                DB::table('blood_stocks')
                    ->where('id', '=', $temp)
                    ->update([
                        'jumlah' => $value,
                        'updated_at' => Carbon::now()
                    ]);
            }
        }

        return redirect()->route('rs-stock-index');
    }
}
