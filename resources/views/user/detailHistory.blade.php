@extends('layouts.app')

@section('title', 'Detail Janji Donor Darah')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Tanggal: {{ $appointment['data']->tanggal }}</h1>
        <h1>Waktu: {{ $appointment['data']->waktu }}</h1>
        <h1>Lokasi: {{ $appointment['data']->namaRs }}</h1>
        {{ $appointment['data'] }}
    </div>
</div>
@endsection
