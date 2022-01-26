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
        if(is_null($date)) {
            $date = Carbon::today()->toDateString();
        }
        
        // get list data
        $appointments = DB::table('appointments')
            ->select('appointments.*', 'users.name as namaUser')
            ->join('users', 'appointments.id_user', 'users.id')
            ->where('id_rumah_sakit', Auth::user()->id)
            ->where('status', 'ongoing')
            ->whereDate('created_at', '=', $date)
            ->get();

        return view('adminHospital.listAppointment', compact('data'));
    }

    public function confirmationAppointment($mode, $id)
    {
        // update db 
        if ($mode == 'accept') {
            DB::table('appointments')
                ->where('id', $id)
                ->update([
                    'status' => 'accepted',
                    'updated_at' => Carbon::now()
                ]);
        } else if($mode == 'decline') {
            DB::table('appointments')
                ->where('id', $id)
                ->update([
                    'status' => 'declined',
                    'updated_at' => Carbon::now()
                ]);
        }

        return redirect()->route('rs-appointment-incoming');
    }

    public function detail($id)
    {
        // get detail data
        $data['detail'] = DB::table('appointments')
                        ->join('blood_details', 'blood_details.id', 'appointments.id_blood_detail')
                        ->join('blood_components', 'blood_components.id', 'appointments.id_blood_component')
                        ->where('appointments.id', '=', $id)
                        ->first();

        // get  blood types
        $data['blood_types'] = DB::table('blood_types')
                            ->get();

        // get  blood components
        $data['blood_components'] = DB::table('blood_components')
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
        DB::table('blood_details')
            ->insert($data);

            // update db 
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
}
