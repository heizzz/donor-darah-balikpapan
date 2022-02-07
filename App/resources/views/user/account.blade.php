@extends('layouts.app')

@section('title', 'Akun Saya')
@section('backPage', route('home'))

@section('content')
<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
        <h1>
            {{ Auth::user()->name }}
        </h1>
        <h4>
            {{ Auth::user()->email }}
        </h4>
        <hr/>
        @if(Auth::user()->id_role == 1)
        <table class="table text-start">
            <tbody>
                <tr>
                    <th scope="col">
                        NIK
                    </th>
                    <td>
                        {{ Auth::user()->nik }}
                    </td>
                </tr>
                <tr>
                    <th scope="col">
                        Jenis Kelamin
                    </th>
                    <td>
                        @php
                        switch (Auth::user()->gender)
                        {
                            case "m":
                                echo "Laki-laki (Male)";
                                break;
                            case "f":
                                echo "Perempuan (Female)";
                                break;
                            case "o":
                                echo "Lainnya (Others)";
                                break;
                            default:
                                echo "-";
                                break;
                        }
                        @endphp
                    </td>
                </tr>
                <tr>
                    <th scope="col">
                        Tanggal Lahir
                    </th>
                    <td>
                        {{ Auth::user()->tanggal_lahir }}
                    </td>
                </tr>
                <tr>
                    <th scope="col">
                        Alamat
                    </th>
                    <td>
                        {{ Auth::user()->alamat }}
                    </td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-primary col-12 col-md-4 col-lg-3 mb-3" href="{{ route('user-profile-edit') }}" role="button">
            Ubah Data Diri
        </a>
        @endif
        <a class="btn btn-primary col-12 col-md-4 col-lg-3 mb-3" href="{{ route('user-password-edit') }}" role="button">
            Ubah Password
        </a>
    </div>
</div>
@endsection
