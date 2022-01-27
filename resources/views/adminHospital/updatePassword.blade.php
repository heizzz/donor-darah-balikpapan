@extends('layouts.app')

@section('title', 'Ubah Password')
@section('backPage', route('rs-account-index'))

@section('content')
<div class="container">
    <form action="{{ route('rs-password-update') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="oldPassword" class="form-label">Password Lama</label>
            <input type="password" name="oldPassword" id="oldPassword" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="newPassword" class="form-label">Password Baru</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"/>
        </div>

        <button class="btn btn-primary" type="submit">Ubah Password</button>
    </form>
</div>
@endsection
