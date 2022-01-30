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
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required',
        ], [
            'required' => 'Input tidak boleh kosong',
            'string' => 'Input hanya boleh mengandung huruf',
            'email' => 'Input harus berisikan email',
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

        return redirect()->route('rs-account-index');
    }

    public function changePassword()
    {
        return view('adminHospital.updatePassword');
    }

    public function updatePassword(Request $request)
    {
        // validation
        Validator::make($request->all(), [
            'oldPassword' => 'required|gt:8',
            'newPassword' => 'required|gt:8',
            'confirmPassword' => 'required|gt:8|same:newPassword',
        ], [
            'required' => 'Inputan tidak boleh kosong',
            'gt' => 'Harus lebih dari 8 karakter',
        ])->validate();

        // update db
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'password' => Hash::make($request->input('newPassword')),
                "updated_at" => Carbon::now()
            ]);

        $currentPassword = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first()->password;

        if (Hash::check($request->input('oldPassword'), $currentPassword))  {
            DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'password' => Hash::make($request->input('newPassword')),
                "updated_at" => Carbon::now()
            ]);
        }

        return redirect()->route('rs-account-index');
    }
}
