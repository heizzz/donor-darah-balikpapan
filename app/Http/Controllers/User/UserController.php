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
        return view('user.account');
    }

    public function editProfile()
    {
        return view('user.updateAccount');
    }

    public function updateProfile(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|alpha',
            'email' => 'required|email',
            'address' => 'required',
            'birthDate' => 'required',
            'nik' => 'required',
            'gender' => 'required'
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
                'tanggal_lahir' => $request->input('birthDate'),
                'nik' => $request->input('nik'),
                'gender' => $request->input('gender'),
                "updated_at" => Carbon::now()
            ]);

        return redirect()->route('user-account-index');
    }

    public function changePassword()
    {
        return view('user.updatePassword');
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

        return redirect()->route('user-account-index');
    }
}
