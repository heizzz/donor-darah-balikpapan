@extends('layouts.app')

@section('title', 'Janji Masuk')
@section('backPage', route('home'))

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 d-flex flex-column justify-content-center">
        <?php $i = 0 ?>
        @foreach($appointments as $appointment)
            @php
                $i++;
                $bgColor = 'bg-light';
                if ($appointment->status == 'cancelled')
                    $bgColor = 'bg-secondary';
            @endphp

            <div class="row">
                <div class="card {{ $bgColor }} text-dark mb-3 p-2 w-100 text-decoration-none d-flex flex-row align-items-end">
                    <h2 class="flex-grow-1">
                        {{ $i }}. {{ $appointment->namaUser }}
                    </h2>

                    <h5>
                        {{ date('d F Y', strtotime($appointment->tanggal)) }}, {{ date('H:i', strtotime($appointment->waktu)) }}
                    </h5>
                    
                    <form action="{{ route('rs-appointment-change-status') }}" method="POST" class="ms-3">
                        @csrf
                        <input type="hidden" name="id" value="{{ $appointment->id }}"/>
                        <button type="submit" name="mode" class="btn btn-secondary btn-lg" value="decline">Tolak</button>
                        <button type="submit" name="mode" class="btn btn-primary btn-lg" value="accept">Terima</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
