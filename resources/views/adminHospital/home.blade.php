@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-2">
            <a class="btn btn-primary w-100" href="{{ route('rs-stock-index') }}">
                <img src="{{ url('img/LihatStok.png') }}" alt="">
                Lihat Stok Darah
            </a>
        </div>
        <div class="col-2">
            <a class="btn btn-primary w-100" href="{{ route('rs-appointment-incoming') }}">
                <img src="{{ url('img/LihatStok.png') }}" alt="">
                Lihat Permintaan Temu
            </a>
        </div>
        <div class="col-2">
            <a class="btn btn-primary w-100" href="{{ route('rs-appointment-list') }}">
                <img src="{{ url('img/LihatStok.png') }}" alt="">
                Lihat Janji Temu
            </a>
        </div>
    </div>
</div>
@endsection
