@extends('layouts.app')

@section('title', 'Scan QR')
@section('backPage', route('rs-appointment-list'))

@section('content')
<div class="container text-center">
    <h2>Arahkan kode QR ke kamera untuk check-in.</h2>
    <video class="webcam-preview w-100" id="webcam-preview"></video>
    <h2 class="text-danger" id="errorMessage"></h2>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        const errorMessage = document.getElementById("errorMessage");
        let scanner = new Instascan.Scanner({ video: document.getElementById('webcam-preview') });

        scanner.addListener('scan', function (content) {
            let args = content.split("/");
            let valid = args.length == 3 && args[0] == "donordarah";

            if (valid)
            {
                let mode = args[1];
                let id = parseInt(args[2]);

                switch (mode)
                {
                    case "appointments":
                        viewAppointment(id);
                        break;
                    default:
                        console.log("Unknown mode " + mode);
                        errorMessage.innerText = "Kode QR tidak valid.";
                }
            }
            else
            {
                console.log("Invalid QR code " + content);
                errorMessage.innerText = "Kode QR tidak valid.";
            }
        });

        function viewAppointment(id)
        {
            // window.open(`http://localhost:8000/hospital/appointments/detail/${id}`, '_blank');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                    url: "{{ route('rs-appointment-checkin') }}",
                    type:'POST',
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Sukses',
                            'Anda telah berhasil check-in',
                            'success'
                        )
                    },
                    error: function (data) {
                        console.log(data);
                        errorMessage.innerText = "Terdapat kesalahan dalam memproses data.";
                    }
                });
        }

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
                errorMessage.innerText = "Tidak dapat menemukan kamera.";
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
@endsection
