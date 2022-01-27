<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nik' => ['required', 'min:16', 'numeric'], 
            'tanggal_lahir' => ['required', 'date'], 
            'alamat' => ['required'], 
        ], [
            'required'=> 'Inputan tidak boleh kosong', 
            'string'=> 'Inputan tidak boleh mengandung angka', 
            'email'=> 'Inputan harus berisikan alamat email', 
            'password.min'=> 'Inputan minimal 8 karakter', 
            'nik.min'=> 'Inputan minimal 16 karakter', 
            'numeric' => 'Inputan harus berisikan angka'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'id_role' => 1,
            'password' => Hash::make($data['password']),
            'nik' => $data['nik'],
            'alamat' => $data['alamat'],
            'gender' => $data['gender'],
            'tanggal_lahir' => $data['tanggal_lahir'],  
        ]);
    }
}
