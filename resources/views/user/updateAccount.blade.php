@extends('layouts.app')

@section('title', 'Ubah Data Diri')

@section('content')
<div class="container">
    {{ Auth::user() }}
    <div class="text-center">
        <h1>
            {{ Auth::user()->name }}
        </h1>

        <form action="" method="post">

        </form>
        <hr/>
        Alamat: {{ Auth::user()->alamat }}
        <br/>


    </div>
    <div class="text-center">
        <a class="btn btn-secondary" href="{{ route('user-profile-edit') }}" role="button">
            Ubah Data Diri
        </a>
        <a class="btn btn-secondary" href="{{ route('user-password-edit') }}" role="button">
            Ubah Password
        </a>
    </div>
</div>
@endsection
