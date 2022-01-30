@extends('layouts.app')

@section('title', 'Detail Rumah Sakit')
@section('backPage', route('admin-hospital-index'))

@section('content')
<div class="container">
    <form action="{{ route('admin-hospital-update', $hospital->id) }}" method="post"
            class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Rumah Sakit</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $hospital->name }}"/>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $hospital->email }}"/>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $hospital->alamat }}"/>

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 mb-3">
                <button class="btn btn-primary w-100" type="submit">Ubah</button>
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <a class="btn btn-warning w-100" href="{{ route('admin-hospital-delete', $hospital->id) }}">Hapus</a>
            </div>
        </div>
    </form>
</div>
@endsection
