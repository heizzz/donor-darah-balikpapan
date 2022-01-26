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
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    public function create()
    {
        $hospitals = DB::table('users')
                        ->where('id_role', '=', 2)
                        ->whereNull('deleted_at')
                        ->select('users.name', 'users.alamat', 'users.id')
                        ->get();
        return view('user.createAppointment', compact("hospitals"));
    }

    public function store(Request $request)
    {
        $date = $request->input('date');
        $time = $request->input('time');
        $idRs = $request->input('id');
        $idUser = Auth::user()->id;
        $data = [
            "tanggal" => $date,
            "waktu" => $time,
            "id_rumah_sakit" => $idRs,
            "id_user" => $idUser,
            "status" => "pending",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ];
        DB::table('appointments')
                ->insert($data);

        return redirect()->route('user-home');
    }

    public function history()
    {
        $appointments = DB::table('appointments')
                        // ->whereIn('status', ["cancelled", "completed"])
                        ->where('id_user', '=', Auth::user()->id)
                        ->join('users', 'appointments.id_rumah_sakit', 'users.id')
                        ->select('appointments.*', 'users.name as namaRs')
                        ->get();

        return view('user.history', compact('appointments'));
    }

    public function donorDetail($id)
    {
        $detail = DB::table('appointments')
                    ->where('appointments.id', '=', $id)
                    ->join('blood_details', 'blood_details.id', 'appointments.id_blood_detail')
                    ->first();
        return view('user.detailHistory', compact('detail'));
    }

    public function appointmentDetail($id)
    {
        $appointment['data'] = DB::table('appointments')
                ->where('appointments.id', '=', $id)
                ->join('users', 'appointments.id_rumah_sakit', 'users.id')
                ->select('appointments.*', 'users.name as namaRs')
                ->first();

        $appointment['qrcode'] = QrCode::size(240)
                                ->generate('donordarah/appointments/' . $id);

        return view('user.detailAppointment', compact('appointment'));
    }

}
