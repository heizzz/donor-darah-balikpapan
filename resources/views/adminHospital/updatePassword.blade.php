@extends('layouts.app')

@section('title', 'Ubah Password')
@section('backPage', route('rs-account-index'))

@section('content')
<div class="container">
    <form action="{{ route('rs-password-update') }}" method="post" class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        @csrf

        <div class="mb-3">
            <label for="oldPassword" class="form-label">Password Lama</label>
            <input type="password" name="oldPassword" id="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror"/>

            @error('oldPassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="newPassword" class="form-label">Password Baru</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control @error('newPassword') is-invalid @enderror"/>

            @error('newPassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror"/>

            @error('confirmPassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button class="btn btn-primary col-12 col-md-4 col-lg-3" type="submit">Ubah Password</button>
    </form>
</div>
@endsection
