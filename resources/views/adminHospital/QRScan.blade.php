@extends('layouts.app')

@section('title', 'Scan QR')
<style>

</style>
@section('content')
<div class="container">
    <video class="webcam-preview" id="webcam-preview"></video>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('webcam-preview') });

        scanner.addListener('scan', function (content) {
            console.log(content);

            // Verifikasi dulu dari aplikasi kita
            // Cek depannya donordarah/appointments/

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
                }
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
                    url: "http://localhost:8000/hospital/appointments/checkin",
                    type:'POST',
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        console.log(data)
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
        }

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
@endsection
