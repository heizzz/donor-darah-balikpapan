@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @php
        $hasAppointment = $appointment !== null;
    @endphp

    @if ($hasAppointment)
        <h1 class="row justify-content-center text-center">
            <small class="text-muted">Jadwal Donor Darah Berikutnya:</small>
            <strong>{{ date('l, d F Y', strtotime($appointment->tanggal)) }}. {{ date('H:i', strtotime($appointment->waktu)) }} WITA.</strong>
            <strong>{{ $appointment->namaRs }}</strong>
        </h1>
    @else
        <h1 class="row justify-content-center text-center">
            <small class="text-muted">Selamat Pagi</small>
            <strong>{{ Auth::user()->name }}</strong>
            <small class="text-muted">Mari kita Donor Darah!</small>
        </h1>
    @endif

    <div class="d-flex flex-md-row flex-column flex-md-wrap justify-content-center gap-3 mt-5">
        <div class="col-lg-3 col-xl-2 home-button">
            <a class="btn btn-primary w-100 h-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" href="{{ route('user-stock-index') }}">
                <img src="{{ asset('img/stok.svg') }}" class="home-icon">
                Lihat Stok Darah
            </a>
        </div>

        @if ($hasAppointment)
        <div class="col-lg-3 col-xl-2 home-button">
            <a class="btn btn-primary w-100 h-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" href="{{ route('user-appointment-detail', $appointment->id) }}">
                <img src="{{ asset('img/suntik.svg') }}" class="home-icon">
                Detail Pertemuan
            </a>
        </div>
        @else
        <div class="col-lg-3 col-xl-2 home-button">
            <a class="btn btn-primary w-100 h-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" href="{{ route('user-appointment-create') }}">
                <img src="{{ asset('img/suntik.svg') }}" class="home-icon">
                Janjian Donor
            </a>
        </div>
        @endif

        <div class="col-lg-3 col-xl-2 home-button">
            <a class="btn btn-primary w-100 h-100 d-flex flex-md-column flex-nowrap align-items-center justify-content-center" href="{{ route('user-appointment-history') }}">
                <img src="{{ asset('img/riwayat.svg') }}" class="home-icon">
                Lihat Riwayat
            </a>
        </div>
    </div>
</div>
@endsection
