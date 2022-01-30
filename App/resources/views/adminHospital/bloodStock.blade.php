@extends('layouts.app')

@section('title', 'Stok Darah')
@section('backPage', route('home'))

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('rs-stock-update') }}" method="post" class="col-md-8 offset-md-2">
        @csrf

        <table class="table">
            <thead>
                <tr>
                    <th class="col">Golongan Darah</th>
                    <th class="col">Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $stock)
                <tr>
                    <td>{{ $stock->namaGolDar }}</td>
                    <td>
                        <input type="number" name="stock-{{ $stock->id }}" class="form-control" value="{{ $stock->jumlah }}" min="0"/>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary" type="submit">Ubah Stok Darah</button>
    </form>
</div>
@endsection
