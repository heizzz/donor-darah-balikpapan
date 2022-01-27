@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <h1 class="row justify-content-center text-center">
        <small class="text-muted">Selamat Pagi</small>
        <strong>{{ Auth::user()->name }}</strong>
    </h1>

    <div class="d-flex flex-md-row flex-column flex-md-wrap justify-content-center gap-3 mt-5">
        <div class="col-lg-3 col-xl-2 home-button">
            <a class="btn btn-primary w-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" href="{{ route('rs-stock-index') }}">
                <img src="{{ asset('img/stok.svg') }}" class="home-icon">
                Ubah Stok Darah
            </a>
        </div>
        <div class="col-lg-3 col-xl-2 home-button">
            <a class="btn btn-primary w-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" href="{{ route('rs-appointment-incoming') }}">
                <img src="{{ asset('img/riwayat.svg') }}" class="home-icon">
                Lihat Permintaan Masuk
            </a>
        </div>
        <div class="col-lg-3 col-xl-2 home-button">
            <a class="btn btn-primary w-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" href="{{ route('rs-appointment-list') }}">
                <img src="{{ asset('img/riwayat.svg') }}" class="home-icon">
                Lihat Pertemuan
            </a>
        </div>
    </div>

</div>
@endsection
