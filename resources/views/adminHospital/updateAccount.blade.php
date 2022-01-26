@extends('layouts.app')

@section('title', 'Ubah Data Rumah Sakit')

@section('content')
<div class="container">
    <form action="{{ route('rs-profile-update') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" id="address" value="{{ Auth::user()->alamat }}" class="form-control"/>
        </div>

        <button class="btn btn-primary" type="submit">Ubah Data</button>
    </form>
</div>
@endsection
