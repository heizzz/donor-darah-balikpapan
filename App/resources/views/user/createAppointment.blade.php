@extends('layouts.app')

@section('title', 'Buat Janji Donor Darah')
@section('backPage', route('home'))

@section('content')
<div class="container">
    <form action="{{ route('user-appointment-store') }}" method="post" class="col-md-8 offset-md-2">
        @csrf

        <div class="row mb-3">
            <label for="id" class="form-label">Lokasi</label>
            <select class="form-select form-select-large" name="id" id="id">
                @foreach ($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control"/>
        </div>

        <div class="row mb-3">
            <label for="time" class="form-label">Waktu (WITA)</label>
            <input type="time" id="time" name="time" class="form-control"/>
        </div>

        <div class="row mb-3 d-flex flex-column">
            <h1><strong>PERHATIAN</strong></h1>

            <h2>
                JANGAN MENYUMBANGKAN DARAH JIKA :
                <ol>
                    <li>Mempunyai penyakit jantung dan paru paru</li>
                    <li>Menderita kanker</li>
                    <li>Menderita tekanan dara tinggi (hipertensi)</li>
                    <li>Menderita kencing manis (diabetes militus)</li>
                    <li>Memiliki kecenderungan perdarahan abnormal atau kelainan darah lainnya.</li>
                    <li>Menderita epilepsi dan sering kejang</li>
                    <li>Menderita atau pernah menderita Hepatitis B atau C.</li>
                    <li>Mengidap sifilis</li>
                    <li>Ketergantungan Narkoba.</li>
                    <li>Kecanduan Minuman Beralkohol</li>
                    <li>Mengidap atau beresiko tinggi terhadap HIV/AIDS</li>
                    <li>Dokter menyarankan untuk tidak menyumbangkan darah karena alasan kesehatan.</li>
                </ol>
            </h2>

            <div>
                <input type="checkbox" name="confirm" id="confirm"/>
                <label for="confirm">Saya setuju dengan pernyataan di atas.</label>
            </div>
        </div>

        <button class="btn btn-primary" type="submit" id="submit" disabled>Buat Janji Donor</button>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    const submitButton = $("#submit")[0];
    const checkbox = $("#confirm")[0];
    checkbox.checked = false;
    submitButton.setAttribute("disabled", "");
    checkbox.addEventListener("change", function(e) { updateConfirm(); });

    function updateConfirm()
    {
        if (checkbox.checked)
        {
            submitButton.removeAttribute("disabled");
        }
        else
        {
            submitButton.setAttribute("disabled", "");
        }
    }
</script>
@endsection
