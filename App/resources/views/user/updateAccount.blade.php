@extends('layouts.app')

@section('title', 'Ubah Data Diri')
@section('backPage', route('user-account-index'))

@section('content')
<div class="container">
    <form action="{{ route('user-profile-update') }}" method="post" class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
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
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" id="nik" value="{{ Auth::user()->nik }}" class="form-control @error('nik') is-invalid @enderror"/>

            @error('nik')
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
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select type="gender" name="gender" id="gender" class="form-control">
                <option>-- Pilih Gender --</option>
                <option value="m" @if (Auth::user()->gender == 'm') selected @endif>Laki-laki (Male)</option>
                <option value="f" @if (Auth::user()->gender == 'f') selected @endif>Perempuan (Female)</option>
                <option value="o" @if (Auth::user()->gender == 'o') selected @endif>Lainnya (Others)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="birthDate" class="form-label">Tanggal Lahir</label>
            <input type="date" name="birthDate" id="birthDate" value="{{ Auth::user()->tanggal_lahir }}" class="form-control @error('birthDate') is-invalid @enderror"/>

            @error('birthDate')
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
        <button class="btn btn-primary col-12 col-md-4 col-lg-3" type="submit">Ubah Data</button>
    </form>
</div>
@endsection
