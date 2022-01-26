<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
                        ->select('users.name', 'users.address', 'users.id')
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
                        ->whereIn('status', ["cancelled", "completed"])
                        ->where('id_user', '=', Auth::user()->id)
                        ->get();
        return view('user.history');
    }

    public function donorDetail($id)
    {
        $detail = DB::table('appointments')
                    ->join('blood_details', 'blood_details.id', 'appointments.id_blood_detail')
                    ->where('appointments.id', '=', $id)
                    ->first();
        return view('user.detailHistory', compact('detail'));
    }

    public function appointmentDetail($id)
    {
        $appointment = DB::table('appointments')
                ->where('appointments.id', '=', $id)
                ->first();
        return view('user.detailAppointment', compact('appointment'));
    }
}
