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
            Alamat: {{ Auth::user()->alamat }}
        </div>
        <br/>
        <a class="btn btn-primary col-12 col-md-4 col-lg-3 mb-3" href="{{ route('rs-profile-edit') }}" role="button">
            Ubah Data Diri
        </a>
        <a class="btn btn-secondary col-12 col-md-4 col-lg-3 mb-3" href="{{ route('rs-password-edit') }}" role="button">
            Ubah Password
        </a>
    </div>
</div>
@endsection
