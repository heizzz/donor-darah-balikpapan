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
        $appointments = DB::table('appointments')
            ->where('id_rumah_sakit', Auth::user()->id)
            ->where('status', 'pending')
            ->join('users', 'appointments.id_user', 'users.id')
            ->select('appointments.*', 'users.name as namaUser')
            ->get();

        return view('adminHospital.incomingAppointment', compact('appointments'));
    }

    public function list($date = null)
    {
        if (empty($date)) {
            $date = Carbon::today()->toDateString();
        }

        // get list data
        $appointments = DB::table('appointments')
            ->join('users', 'appointments.id_user', 'users.id')
            ->where('id_rumah_sakit', Auth::user()->id)
            ->where('status', 'accepted')
            ->whereDate('appointments.created_at', '=', $date)
            ->select('appointments.*', 'users.name as namaUser')
            ->get();

        return view('adminHospital.listAppointment', compact('appointments', 'date'));
    }

    public function changeStatus(Request $request)
    {
        $mode = $request->input('mode');
        
        // update db
        switch ($mode) {
            case 'accept':
                DB::table('appointments')
                    ->where('id', $request->input('id'))
                    ->update([
                        'status' => 'accepted',
                        'updated_at' => Carbon::now()
                    ]);
                break;
            case 'decline':
                DB::table('appointments')
                    ->where('id', $request->input('id'))
                    ->update([
                        'status' => 'declined',
                        'updated_at' => Carbon::now()
                    ]);
                break;
        }

        return redirect()->route('rs-appointment-incoming');
    }

    public function detail($id)
    {
        // get detail data
        $data['detail'] = DB::table('appointments')
            ->where('appointments.id', '=', $id)
            // ->leftJoin('blood_details', 'blood_details.id', 'appointments.id_blood_detail')
            ->join('users', 'appointments.id_user', 'users.id')
            ->select('users.name as namaUser', 'users.nik as nikUser', 'users.tanggal_lahir as tanggal_lahir', 'users.gender as gender', 'appointments.*')
            // ->join('blood_components', 'blood_components.id', 'appointments.id_blood_component')
            ->first();
            
        // get blood types
        $data['bloodTypes'] = DB::table('blood_types')
            ->get();

        // get blood components
        $data['bloodComponents'] = DB::table('blood_components')
            ->get();

        return view('adminHospital.detailAppointment', compact('data'));
    }

    public function store(Request $request)
    {
        // validation
        Validator::make($request->all(), [
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'tekanan_sistol' => 'required|numeric',
            'tekanan_diastol' => 'required|numeric',
            'kadar_hb' => 'required|numeric',
            'id_blood' => 'required',            
            'id_appointment' => 'required',
            'id_blood_component' => 'required'
        ], [
            'required' => 'Inputan tidak boleh kosong',
            'numeric' => 'Inputan harus berupa angka',
        ])->validate();

        $data = [
            'id_blood_type' => $request->input('id_blood_type'),
            'id_appointment' => $request->input('id_appointment'),
            'id_blood_component' => $request->input('id_blood_component'),
            'berat_badan' => $request->input('berat_badan'),
            'tinggi_badan' => $request->input('tinggi_badan'),
            'tekanan_sistol' => $request->input('tekanan_sistol'),
            'tekanan_diastol' => $request->input('tekanan_diastol'),
            'kadar_hb' => $request->input('kadar_hb'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        // update db
        DB::table('blood_details')
            ->insert($data);

        DB::table('appointments')
            ->where('id', $request->input('id_appointment'))
            ->update([
                'status' => 'completed',
                'updated_at' => Carbon::now()
            ]);

        return redirect()->route('rs-appointment-list');
    }

    public function scan()
    {
        return view('adminHospital.QRScan');
    }

    public function checkin(Request $request)
    {
        // update db
        DB::table('appointments')
            ->where('id', $request->input('id'))
            ->update([
                'status' => 'ongoing',
                'updated_at' => Carbon::now()
            ]);

        return redirect()->route('rs-appointment-list');
    }
}
