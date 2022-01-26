@extends('layouts.app')

@section('title', 'Stok Darah')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-3">
        <label for="id" class="form-label">Lokasi:</label>   
        <select class="form-select form-select-large mb-3" name="id" id="id">
            @foreach ($hospitals as $hospital)
                <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="row h-100">
        {{ $bloodStocks }}
    </div>
</div>
@endsection
