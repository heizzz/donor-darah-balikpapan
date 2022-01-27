@extends('layouts.app')

@section('title', 'Daftar Rumah Sakit')
@section('backPage', route('home'))

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">Name</th>
                    <th scope="row">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $key => $hospital)
                <tr>
                    <th scope="col">{{ $key+1 }}</td>
                    <td>{{ $hospital->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin-hospital-detail', $hospital->id) }}">Detail
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
