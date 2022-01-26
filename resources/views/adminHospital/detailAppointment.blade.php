@extends('layouts.app')

@section('title', 'Detail Janji Donor Darah')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Nama Donor: {{ Auth::user()->name }}</h2>
        <h1>Tanggal: {{ $data['detail']->tanggal }}</h2>
        <h1>Waktu: {{ $data['detail']->waktu }}</h2>
        <h1>Lokasi: {{ $data['detail']->namaRs }}</h2>
    </div>
</div>

acc pencet tombol

scan untuk isi form

@endsection
