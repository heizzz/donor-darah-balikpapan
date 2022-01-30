@extends('layouts.app')

@section('title', 'Akun Saya')
@section('backPage', route('home'))

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
        <h1>
            {{ Auth::user()->name }}
        </h1>
        <h4>
            {{ Auth::user()->email }}
        </h4>
        <hr/>
        <div>
            NIK: {{ Auth::user()->nik }}
        </div>
        <div>
            Jenis Kelamin:
            @php
            switch (Auth::user()->gender)
            {
                case "m":
                    echo "Laki-laki (Male)";
                    break;
                case "f":
                    echo "Perempuan (Female)";
                    break;
                case "o":
                    echo "Lainnya (Others)";
                    break;
                default:
                    echo "-";
                    break;
            }
            @endphp
        </div>
        <div>
            Tanggal Lahir: {{ Auth::user()->tanggal_lahir }}
        </div>
        <div>
            Alamat: {{ Auth::user()->alamat }}
        </div>
        <br/>
        <a class="btn btn-primary col-12 col-md-4 col-lg-3 mb-3" href="{{ route('user-profile-edit') }}" role="button">
            Ubah Data Diri
        </a>
        <a class="btn btn-primary col-12 col-md-4 col-lg-3 mb-3" href="{{ route('user-password-edit') }}" role="button">
            Ubah Password
        </a>
    </div>
</div>
@endsection
