@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @guest
        <h1 class="row justify-content-center text-center">
            Harap login terlebih dahulu untuk mengakses fitur lainnya.
        </h1>
    @else
        <h1 class="row justify-content-center text-center">
            <small class="text-muted">Selamat Pagi</small>
            <strong>{{ Auth::user()->name }}</strong>
            <small class="text-muted">Mari kita Donor Darah!</small>
        </h1>
    @endguest

    <div class="row justify-content-center">
        <div class="col-2">
            <a class="btn btn-primary w-100" href="{{ route('user-stock-index') }}">
                <img src="{{ url('img/LihatStok.png') }}" alt="">
                Lihat Stok Darah
            </a>
        </div>
        <div class="col-2">
            <a class="btn btn-primary w-100" href="{{ route('user-appointment-create') }}">
                <img src="{{ url('img/LihatStok.png') }}" alt="">
                Janjian Donor
            </a>
        </div>
        <div class="col-2">
            <a class="btn btn-primary w-100" href="{{ route('user-appointment-history') }}">
                <img src="{{ url('img/LihatStok.png') }}" alt="">
                Lihat Riwayat
            </a>
        </div>
    </div>
</div>
@endsection
