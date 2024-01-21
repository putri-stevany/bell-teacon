<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title> Bell Beacon </title>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

        <!-- Nucleo Icons -->
        <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />

        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Marko+One&display=swap" rel="stylesheet">
        
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

        <!-- CSS Files -->
        <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
    </head>

    <body class="g-sidenav-show  bg-gray-100">
        @include('partials.sidebar')
        @yield('container')
    </body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/popper.min.js')}}" ></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}" ></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}" ></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}" ></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Include Toastr from CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script type="text/javascript">
    // Notifikasi Tambah Data
    $('.add_data').click(function (event) {
        event.preventDefault();

        var form = $(this).closest("form");

        // Tampilkan notifikasi setelah 500ms (setengah detik)
        setTimeout(function () {
            Swal.fire({
                icon: "success",
                title: "Data berhasil ditambahkan",
                text: "Klik OK untuk melanjutkan",
                showConfirmButton: true,
            }).then(() => {
                // Kirim formulir
                form.submit();
                Swal.close();
            });
        }, 200);
    });


    $('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    event.preventDefault();
    Swal.fire({
        title: "Anda Yakin?",
        text: "Data ini akan dihapus lohh",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, saya yakin !",
        cancelButtonText: "Tidak, batalkan!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Data Berhasil Di Hapus",
            icon: "success"
        }).then(() => {
            form.submit();
            Swal.close(); // Menutup SweetAlert
        });
        }
    });
  });
</script>

<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var day = now.toLocaleDateString('en-US', { weekday: 'long' });
        var date = now.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        var timeString = day + ', ' + date + ' ' + hours + ':' + minutes + ':' + seconds;
        document.getElementById("digitalClock").innerHTML = timeString;

        fetch('/get-audio-schedule')
            .then(response => response.json())
            .then(data => {
                if (data.audio_normal) {
                    document.getElementById('audioPlayer').src = data.audio_normal;
                    document.getElementById('audioPlayer').play();
                }
            })
            .catch(error => console.error('Error fetching audio schedule:', error));
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>



{{-- <script>
    function previewAudio() {
        var input = document.getElementById('audio-add');
        var audioPreview = document.getElementById('audioPreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                audioPreview.src = e.target.result;
                audioPreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            audioPreview.src = '#';
            audioPreview.style.display = 'none';
        }
    }
</script> --}}
<script>
    function previewAudio() {
        var input = document.getElementById('audio-add');
        var audioPreview = document.getElementById('audioPreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                audioPreview.src = e.target.result;
                audioPreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            var audioPathInput = document.getElementById('audioPath');
            var audioPath = audioPathInput.value;

            audioPreview.src = audioPath;
            audioPreview.style.display = 'block';
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Menangani klik pada card-warning
        document.querySelector('.card-warning').addEventListener('click', function () {
            // Fungsi yang dijalankan saat card-warning diklik
            window.location.href = '{{ route("normal") }}';
            // Anda dapat menambahkan logika atau fungsi lainnya di sini
        });

        // Menangani klik pada card-success
        document.querySelector('.card-success').addEventListener('click', function () {
            // Fungsi yang dijalankan saat card-success diklik
            window.location.href = '{{ route("ujian") }}';
            // Anda dapat menambahkan logika atau fungsi lainnya di sini
        });

        // Menangani klik pada card-danger
        document.querySelector('.card-danger').addEventListener('click', function () {
            // Fungsi yang dijalankan saat card-danger diklik
            window.location.href = '{{ route("sesi2") }}';
            // Anda dapat menambahkan logika atau fungsi lainnya di sini
        });

        // Menangani klik pada card-primary
        document.querySelector('.card-primary').addEventListener('click', function () {
            // Fungsi yang dijalankan saat card-primary diklik
            window.location.href = '{{ route("balik") }}';
            // Anda dapat menambahkan logika atau fungsi lainnya di sini
        });
    });
</script>
