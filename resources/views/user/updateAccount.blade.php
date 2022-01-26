@extends('layouts.app')

@section('title', 'Ubah Data Diri')

@section('content')
<div class="container">
    <form action="{{ route('user-profile-update') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" id="nik" value="{{ Auth::user()->nik }}" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select type="gender" name="gender" id="gender" value="{{ Auth::user()->gender }}" class="form-control">
                <option>-- Pilih Gender --</option>
                <option value="m">Laki-laki (Male)</option>
                <option value="f">Perempuan (Female)</option>
                <option value="o">Lainnya (Others)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="birthDate" class="form-label">Tanggal Lahir</label>
            <input type="date" name="birthDate" id="birthDate" value="{{ Auth::user()->tanggal_lahir }}" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" id="address" value="{{ Auth::user()->alamat }}" class="form-control"/>
        </div>
        <button class="btn btn-primary" type="submit">Ubah Data</button>
    </form>
</div>
@endsection
