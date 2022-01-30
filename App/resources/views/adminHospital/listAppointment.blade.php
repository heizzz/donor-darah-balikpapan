@extends('layouts.app')

@section('title', 'Daftar Pertemuan')
@section('backPage', route('home'))

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 d-flex flex-column justify-content-center">
        <div class="row">
            <a type="button" class="btn btn-primary w-100 mb-3"
                href="{{ route('rs-appointment-scan') }}">
                Scan QR
            </a>
        </div>
        <br>
        <div class="row">
            <label for="date">Tanggal:</label>
            <input type="date" name="date" id="date"/>
        </div>

        <?php $i = 0 ?>
        @foreach($appointments as $appointment)
            @php
                $i++;
                $bgColor = 'bg-light';
                if ($appointment->status == 'cancelled')
                    $bgColor = 'bg-secondary';
            @endphp

            <div class="row mt-3">
                <a class="card {{ $bgColor }} text-dark p-2 w-100 text-decoration-none d-flex flex-row align-items-end"
                    href="{{ route('rs-appointment-detail', $appointment->id) }}">
                    <h2 class="flex-grow-1">
                        {{ $i }}. {{ $appointment->namaUser }}
                    </h2>

                    <h5>
                        {{ date('d F Y', strtotime($appointment->tanggal)) }}, {{ date('H:i', strtotime($appointment->waktu)) }}
                    </h5>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$("#date")[0].value = "{{ $date }}";
$("#date").on("input", function(e) {
    location.href = "{{ route('rs-appointment-list') }}/" + e.target.value;
});
</script>
@endsection
