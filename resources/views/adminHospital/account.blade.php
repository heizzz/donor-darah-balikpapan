@extends('layouts.app')

@section('title', 'Akun Saya')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>
            {{ Auth::user()->name }}
        </h1>
        {{ Auth::user()->email }}
        <hr/>
        Alamat: {{ Auth::user()->alamat }}
        <br/>
    </div>
    <div class="text-center">
        <a class="btn btn-secondary" href="{{ route('rs-profile-edit') }}" role="button">
            Ubah Data Diri
        </a>
        <a class="btn btn-secondary" href="{{ route('rs-password-edit') }}" role="button">
            Ubah Password
        </a>
    </div>
</div>
@endsection
