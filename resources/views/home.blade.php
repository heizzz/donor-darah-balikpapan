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
        Harap login terlebih dahulu untuk mengakses fitur lainnya.
    </h1>

    <div class="d-flex flex-row flex-wrap justify-content-center">
        <div class="col-lg-3 col-xl-2 home-button">
            <a class="btn btn-primary w-100 h-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" href="{{ route('user-stock-index') }}">
                <img src="{{ asset('img/stok.svg') }}" class="home-icon">
                Lihat Stok Darah
            </a>
        </div>
        <div class="col-lg-3 col-xl-2 home-button">
            <button class="btn btn-primary w-100 h-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" disabled>
                <img src="{{ asset('img/stok.svg') }}" class="home-icon">
                Janjian Donor
            </button>
        </div>
        <div class="col-lg-3 col-xl-2 home-button">
            <button class="btn btn-primary w-100 h-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" disabled>
                <img src="{{ asset('img/stok.svg') }}" class="home-icon">
                Lihat Riwayat
            </button>
        </div>
    </div>
</div>
@endsection
