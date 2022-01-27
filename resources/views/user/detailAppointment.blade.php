@extends('layouts.app')

@section('title', 'Detail Pertemuan')
@section('backPage', route('user-appointment-history'))

@section('content')
<div class="container">
    <div class="text-center">
        <h1>
            Nama Donor:
            {{ Auth::user()->name }}
        </h1>
        <h1>
            Tanggal:
            {{ date('l, d F Y', strtotime($appointment['data']->tanggal)) }}.
        </h1>
        <h1>
            Waktu:
            {{ date('H:i', strtotime($appointment['data']->waktu)) }}
        </h1>
        <h1>
            Lokasi:
            {{ $appointment['data']->namaRs }}
        </h1>
        @php
        $status = $appointment['data']->status;
        switch ($status)
        {
            case 'pending':
                @endphp
                <form action="{{ route('user-appointment-cancel') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $appointment['data']->id }}"/>
                    <button type="submit" class="btn btn-primary col-md-3"
                            href="{{ route('user-appointment-cancel') }}">Batalkan Pertemuan
                    </button>
                </form>
                <div class="row mt-5">
                    {{ $appointment['qrcode'] }}
                </div>
                @php
                break;
            case 'accepted':
                @endphp
                <div class="row mt-5">
                    {{ $appointment['qrcode'] }}
                </div>
                @php
                break;
        }
        @endphp
    </div>
</div>
@endsection
