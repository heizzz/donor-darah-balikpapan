<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
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
            ->get();

        return view('adminSystem.listHospitals', compact('hospitals'));
    }

    public function create()
    {
        return view('adminSystem.registerHospital');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8|same:password',
        ], [
            'required' => 'Inputan tidak boleh kosong',
            'string' => 'Inputan hanya boleh mengandung kata',
            'email' => 'Inputan harus berisikan email',
            'min' => 'Harus lebih dari 8 karakter',
            'same' => 'Password dan konfirmasi password harus sama'
        ])->validate();

        $name = $request->input('name');
        $address = $request->input('address');
        $email = $request->input('email');
        $password = $request->input('password');
        $data = [
            "name"  => $name,
            "id_role" => 2,
            "alamat" => $address,
            "email" => $email,
            "password" => Hash::make($password),
            "updated_at" => Carbon::now(),
            "created_at" => Carbon::now()
        ];

        $rsId = DB::table('users')
            ->insertGetId($data);

        $bloodTypes = DB::table('blood_types')
            ->select('id')
            ->get();

        foreach ($bloodTypes as $bloodType) {
            DB::table('blood_stocks')
                ->insert([
                    'id_user' => $rsId,
                    'id_blood_type' => $bloodType->id,
                    'jumlah' => 0,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
        }

        return redirect()->route('admin-hospital-index');
    }

    public function detail($id)
    {
        $hospital = DB::table('users')
            ->where('id', '=', $id)
            ->first();
        return view('adminSystem.detailHospital', compact('hospital'));
    }

    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required'
        ], [
            'required' => 'Inputan tidak boleh kosong',
            'string' => 'Inputan hanya boleh mengandung huruf',
            'email' => 'Inputan harus berisikan email',
        ])->validate();

        $name = $request->input('name');
        $address = $request->input('address');
        $email = $request->input('email');
        $data = [
            "name"  => $name,
            "alamat" => $address,
            "email" => $email,
            "updated_at" => Carbon::now()
        ];

        DB::table('users')
            ->where('id', '=', $id)
            ->update($data);

        return redirect()->route('admin-hospital-index');
    }

    public function delete($id)
    {
        $data = [
            "deleted_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ];

        DB::table('users')
            ->where('id', '=', $id)
            ->update($data);

        return redirect()->route('admin-hospital-index');
    }
}
