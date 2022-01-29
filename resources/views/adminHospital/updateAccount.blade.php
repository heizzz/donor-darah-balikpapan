@extends('layouts.app')

@section('title', 'Ubah Data Rumah Sakit')
@section('backPage', route('rs-account-index'))

@section('content')
<div class="container">
    <form action="{{ route('rs-profile-update') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror"/>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror"/>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" id="address" value="{{ Auth::user()->alamat }}" class="form-control @error('address') is-invalid @enderror"/>

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Ubah Data</button>
    </form>
</div>
@endsection
