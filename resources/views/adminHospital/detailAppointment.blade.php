@extends('layouts.app')

@section('title', 'Detail Janji Donor Darah')
@section('backPage', route('rs-appointment-list'))

@section('content')

<div class="container">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <div class="row">
            NIK: {{ $data['detail']->nikUser }}
        </div>
        <div class="row">
            Nama Donor: {{ $data['detail']->namaUser }}
        </div>
        <div class="row">
            Tanggal / Waktu: {{ date('l, d F Y', strtotime($data['detail']->tanggal)) }}. {{ date('H:i', strtotime($data['detail']->waktu)) }}
        </div>
        <div class="row">
            Jenis Kelamin:
            @php
                switch ($data['detail']->gender) {
                    case "m":
                        echo "Laki-laki (Male)";
                        break;
                    case "f":
                        echo "Perempuan (Female)";
                        break;
                    case "o":
                        echo "Lainnya (Others)";
                        break;
                }
            @endphp
        </div>
        <div class="row">
            Tanggal Lahir:
            @php
                if ($data['detail']->tanggal_lahir !== null) {
                    $bdTime = strtotime($data['detail']->tanggal_lahir);

                    // Dicuri dari https://stackoverflow.com/questions/3776682/php-calculate-age
                    $birthDate = explode('-', $data['detail']->tanggal_lahir);
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                        ? ((date("Y") - $birthDate[0]) - 1)
                        : (date("Y") - $birthDate[0]));

                    echo date('d F Y', $bdTime) . " (" . $age . " tahun)";
                }
            @endphp
        </div>
        <hr>
        <form action="{{ route('rs-appointment-store') }}" method="post">
            @csrf
            <input type="hidden" name="id_appointment" value="{{ $data['detail']->id }}" />

            <div class="row mb-3">
                <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                <input type="number" name="berat_badan" id="berat_badan" class="form-control @error('berat_badan') is-invalid @enderror"/>

                @error('berat_badan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control @error('tinggi_badan') is-invalid @enderror"/>

                @error('tinggi_badan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="id_blood_type" class="form-label">Golongan Darah</label>
                <select name="id_blood_type" id="id_blood_type" class="form-select form-select-large">
                    @foreach($data['bloodTypes'] as $bloodType)
                        <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <label for="id_blood_component" class="form-label">Komponen Darah</label>
                <select name="id_blood_component" id="id_blood_component" class="form-select form-select-large">
                    @foreach($data['bloodComponents'] as $bloodComponents)
                        <option value="{{ $bloodComponents->id }}">{{ $bloodComponents->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <label for="kadar_hb" class="form-label">Kadar HB</label>
                <input type="number" name="kadar_hb" id="kadar_hb" class="form-control @error('kadar_hb') is-invalid @enderror"/>

                @error('kadar_hb')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="tekanan_sistol" class="form-label">Tekanan Sistol</label>
                <input type="number" name="tekanan_sistol" id="tekanan_sistol" class="form-control @error('tekanan_sistol') is-invalid @enderror"/>

                @error('tekanan_sistol')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="tekanan_diastol" class="form-label">Tekanan Diastol</label>
                <input type="number" name="tekanan_diastol" id="tekanan_diastol" class="form-control @error('tekanan_diastol') is-invalid @enderror"/>

                @error('tekanan_diastol')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Kirim Data</button>
        </form>
    </div>
</div>

@endsection
