@extends('layouts.app')

@section('title', 'Riwayat')
@section('backPage', route('home'))

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 d-flex flex-column justify-content-center">
        @foreach($appointments as $appointment)
            @php
                $bgColor = 'bg-light';
                $textColor = 'text-dark';

                switch ($appointment->status) {
                    case 'cancelled':
                    case 'declined':
                        $bgColor = 'bg-secondary';
                        break;
                    case 'accepted':
                    case 'ongoing':
                        $bgColor = 'bg-primary';
                        $textColor = 'text-light';
                        break;
                }
            @endphp

            <div class="row">
                <a class="card {{ $bgColor }} {{ $textColor }} mb-3 p-3 w-100 text-decoration-none" href="@php
                if ($appointment->status == "completed") {
                    echo route('user-appointment-blood-detail', $appointment->id);
                }
                else {
                    echo route('user-appointment-detail', $appointment->id);
                }
                @endphp ">
                    <h2>{{ $appointment->namaRs }}</h2>
                    {{ $appointment->tanggal }}, {{ $appointment->waktu }}
                    <h4 class="mt-2">Status: @if ($appointment->status == "pending")
                        Menunggu
                    @elseif($appointment->status == "accepted")
                        Diterima
                    @elseif($appointment->status == "ongoing")
                        Sedang Berjalan
                    @elseif($appointment->status == "completed")
                        Selesai
                    @elseif($appointment->status == "cancelled")
                        Dibatalkan
                    @endif</h4>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
