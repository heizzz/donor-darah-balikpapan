@extends('layouts.app')

@section('title', 'Riwayat')

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 d-flex flex-column justify-content-center">
        @foreach($appointments as $appointment)
            @php
                $bgColor = 'bg-light';
                if ($appointment->status == 'cancelled')
                    $bgColor = 'bg-secondary';
            @endphp

            <div class="row">
                <a class="card {{ $bgColor }} text-dark mb-3 p-3 w-100 text-decoration-none" href="{{ route('user-appointment-detail', $appointment->id) }}">
                    <h2>{{ $appointment->namaRs }}</h2>
                    {{ $appointment->tanggal }}, {{ $appointment->waktu }}
                    <h4 class="mt-2">Status: {{ $appointment->status }}</h4>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
