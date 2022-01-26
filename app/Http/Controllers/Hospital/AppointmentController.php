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
        // get incoming data
        $data = DB::table('appointments')
            ->where('id_rumah_sakit', Auth::user()->id)
            ->where('status', 'pending')
            ->get();

        return view('adminHospital.incomingAppointment', compact('data'));
    }


    public function list(Request $request)
    {
        // get list data
        $data = DB::table('appointments')
            ->where('id_rumah_sakit', Auth::user()->id)
            ->where('status', 'ongoing')
            ->whereDate('created_at', '=', $request->input('date'))
            ->get();

        return view('adminHospital.listAppointment', compact('data'));
    }

    public function changeStatus($id)
    {
        // update db
        DB::table('appointments')
            ->where('id', $id)
            ->update([
                'status' => 'ongoing',
                "updated_at" => Carbon::now()
            ]);

        return redirect()->route('rs-appointment-list');
    }

    public function detail($id)
    {
        // get detail data
        $data = DB::table('appointments')
            ->join('blood_details', 'blood_details.id', 'appointments.id_blood_detail')
            ->join('blood_components', 'blood_components.id', 'appointments.id_blood_component')
            ->where('appointments.id', '=', $id)
            ->first();

        return view('adminHospital.detailAppointment', compact('data'));
    }

    public function store(Request $request)
    {
        $data = [
            'id_blood_type' => $request->input('id_blood_type'),
            'id_appointment' => $request->input('id_appointment'),
            'id_blood_component' => $request->input('id_blood_component'),
            'berat_badan' => $request->input('berat_badan'),
            'tinggi_badan' => $request->input('tinggi_badan'),
            'tekanan_sistol' => $request->input('tekanan_sistol'),
            'tekanan_diastol' => $request->input('tekanan_diastol'),
            'kadar_hb' => $request->input('kadar_hb'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ];
        DB::table('blood_details')
            ->insert($data);

        return redirect()->route('');
    }

    public function scan()
    {
        return view('adminHospital.QRScan', compact('data'));
    }
}
