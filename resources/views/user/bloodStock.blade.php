@extends('layouts.app')

@section('title', 'Stok Darah')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        Lokasi:
        <select class="form-select form-select-large mb-3" name="index" id="index">
            <option value="1">
                RSUD. Dr. H. Soemarno Sosroatmodjo
            </option>
        </select>
    </div>

    <div class="row h-100">
        {{ $bloodStocks }}
    </div>
</div>
@endsection
