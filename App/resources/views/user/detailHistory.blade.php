@extends('layouts.app')

@section('title', 'Detail Pertemuan')
@section('backPage', route('user-appointment-history'))

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="col text-right">Tanggal / Waktu</th>
                    <td>{{ date('l, d F Y', strtotime($detail->tanggal)) }} {{ date('H:i', strtotime($detail->waktu)) }}</td>
                </tr>
                <tr>
                    <th scope="col text-right">Lokasi</th>
                    <td>{{ $detail->namaRs }}</td>
                </tr>
                <tr>
                    <th scope="col text-right">Berat Badan</th>
                    <td>{{ $detail->berat_badan }} kg</td>
                </tr>
                <tr>
                    <th scope="col text-right">Tinggi Badan</th>
                    <td>{{ $detail->tinggi_badan }} cm</td>
                </tr>
                <tr>
                    <th scope="col text-right">Tipe Darah</th>
                    <td>{{ $detail->namaTipeDarah }}</td>
                </tr>
                <tr>
                    <th scope="col text-right">Komponen Darah</th>
                    <td>{{ $detail->namaKomponen }}</td>
                </tr>
                <tr>
                    <th scope="col text-end">Kadar HB</th>
                    <td>{{ $detail->kadar_hb }}</td>
                </tr>
                <tr>
                    <th scope="col text-end">Tekanan Darah</th>
                    <td>{{ $detail->tekanan_sistol }}/{{ $detail->tekanan_diastol }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
