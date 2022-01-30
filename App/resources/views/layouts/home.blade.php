@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @yield

    @php
        $hasAppointment = $appointment !== null;
    @endphp

    @guest
        <h1 class="row justify-content-center text-center">
            Harap login terlebih dahulu untuk mengakses fitur lainnya.
        </h1>
    @elseif ($hasAppointment)
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
    @endguest

    <div class="d-flex flex-md-row flex-column flex-md-wrap justify-content-center gap-3 mt-5">
        <div class="col-md-3 col-lg-2">
            <a class="btn btn-primary w-100 d-flex flex-md-column flex-nowrap align-items-center" href="{{ route('user-stock-index') }}">
                <img src="{{ url('img/LihatStok.png') }}" class="home-icon">
                Lihat Stok Darah
            </a>
        </div>

        @if ($hasAppointment)
        <div class="col-md-3 col-lg-2">
            <a class="btn btn-primary w-100 d-flex flex-md-column flex-nowrap align-items-center" href="{{ route('user-appointment-detail', $appointment->id) }}">
                <img src="{{ url('img/LihatStok.png') }}" class="home-icon">
                Detail Janji Temu
            </a>
        </div>
        @else
        <div class="col-md-3 col-lg-2">
            <a class="btn btn-primary w-100 d-flex flex-md-column flex-nowrap align-items-center" href="{{ route('user-appointment-create') }}">
                <img src="{{ url('img/LihatStok.png') }}" class="home-icon">
                Janjian Donor
            </a>
        </div>
        @endif

        <div class="col-md-3 col-lg-2">
            <a class="btn btn-primary w-100 d-flex flex-md-column flex-nowrap align-items-center" href="{{ route('user-appointment-history') }}">
                <img src="{{ url('img/LihatStok.png') }}" class="home-icon">
                Lihat Riwayat
            </a>
        </div>
    </div>
</div>
@endsection
