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
            window.open(`http://localhost:8000/hospital/appointments/detail/${id}`, '_blank');
            // ohhh ato ga ditampilin dimana mana pas di accepted 
            // baru pas mo tes darah baru ubah status jadi ongoing 
            // yang di list admin rs nya baru bisa lakukan input form itu kalo statusnya ongoing 
            // yakan jadi ya kek km blg jd smcam auth gt
            // buakn on going ini biar bisa  dilakukan input data darahnya
            // jadi kalo dia datang blum scan ya g muncul datanya di list 
            // jadi admin rs g isa buka datanya (melakukan input)
            // kalo ga datang bikin stu tombol yang ubah status accepted jd canceled
            // kalo hari itu g dntgkan brrt masi berstatus accepted
            // kalo yang ketinggalan ini, petugas adminnya aja yang sediaiin laptopkah ato apa
            // yaaaa mo gmau , sama kek kartu vaksin lah km ketinggalan hp or fisik mo gimana 
            // oh ato ga gini , 
            // jadi form incoming setelah acc ato dec, jadi acceptedkan 
            // masalanya data yang accepted kalo dipencet detilnya itu form input hasil donor wkkwkwkw

            // sebelum ambil darah
            // ato petugas bisa input nama / nik / hmm
            // trus orangnya harus datang baru bisa 
            
            // kalo ketinggalan hp gmn
            // ppega
            // benar lah scan / search by name / nik
            // scan bikin optional aja

            // nanti aja lah bahas status
            // buat page dulu

            // dibikin ndaisa isi sebelum hari H nya

            // blum confirm orangnya emang ada di tempat
            // ato petugas korupsi
            // etu
            // ganti hari jadi away

            // ongoing ndapenting
            // kecuali tesnya makan waktu
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
