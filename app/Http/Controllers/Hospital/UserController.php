<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ConfirmPassword;

class UserController extends Controller
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
        return view('adminHospital.account');
    }

    public function editProfile()
    {
        return view('adminHospital.updateAccount');
    }

    public function updateProfile(Request $request)
    {
        // validation
        Validator::make($request->all(), [
            'name' => 'required|alpha',
            'email' => 'required|email:rfc,dns',
            'alamat' => 'required',
        ], [
            'required' => 'Inputan tidak boleh kosong',
            'alpha' => 'Inputan hanya boleh mengandung huruf',
            'email' => 'Inputan harus berisikan email',
        ])->validate();

        // update db
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'alamat' => $request->input('address'),
                "updated_at" => Carbon::now()
            ]);

        // return data notif berhasil (?)

        return view('adminHospital.account');
    }

    public function changePassword()
    {
        return view('adminHospital.updatePassword');
    }

    public function updatePassword(Request $request)
    {
        // validation
        Validator::make($request->all(), [
            'password' => 'required|gt:8',
            'confirmPassword' => ['required', 'gt:8', new ConfirmPassword],
        ], [
            'required' => 'Inputan tidak boleh kosong',
            'gt' => 'Harus lebih dari 8 karakter',
        ])->validate();

        // update db
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'password' => $request->input('password'),
                "updated_at" => Carbon::now()
            ]);

        // return data notif berhasil (?)

        return view('adminHospital.account');
    }
}
