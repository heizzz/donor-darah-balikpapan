@extends('layouts.app')

@section('title', 'Detail Pertemuan')
@section('backPage', route('user-appointment-history'))

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="col">Nama Donor</th>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <th scope="col text-right">Tanggal / Waktu</th>
                    <td>{{ date('l, d F Y', strtotime($appointment['data']->tanggal)) }} {{ date('H:i', strtotime($appointment['data']->waktu)) }}</td>
                </tr>
                <tr>
                    <th scope="col text-right">Lokasi</th>
                    <td>{{ $appointment['data']->namaRs }}</td>
                </tr>
                @php $status = $appointment['data']->status; @endphp
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($status == "pending")
                            Menunggu
                        @elseif($status == "accepted")
                            Diterima
                        @elseif($status == "ongoing")
                            Sedang Berjalan
                        @elseif($status == "completed")
                            Selesai
                        @elseif($status == "cancelled")
                            Dibatalkan
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        @php
        switch ($status)
        {
            case 'pending':
                @endphp
                <form action="{{ route('user-appointment-cancel') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $appointment['data']->id }}"/>
                    <button type="submit" class="btn btn-primary col-12 col-md-4 col-lg-3 mb-3"
                            href="{{ route('user-appointment-cancel') }}">Batalkan Pertemuan
                    </button>
                </form>
                @php
                break;
            case 'accepted':
                @endphp
                <div class="row mt-5">
                    {{ $appointment['qrcode'] }}
                </div>
                <h4 class="mt-5 text-center">
                    Silahkan menunjukkan kode QR di rumah sakit untuk<br/>check-in pada waktu yang dijanjikan.
                </h4>
                @php
                break;
        }
        @endphp
    </div>
</div>
@endsection
