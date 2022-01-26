@extends('layouts.app')

@section('title', 'Buat Janji Donor Darah')

@section('content')
<div class="container">
    <form action="{{ route('user-appointment-store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">Lokasi</label>
            <select class="form-select form-select-large mb-3" name="id" id="id">
                @foreach ($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control"/>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Waktu (WITA)</label>
            <input type="time" id="time" name="time" class="form-control"/>
        </div>

        <button class="btn btn-primary" type="submit">Buat Janji Donor</button>
    </form>
</div>
@endsection
