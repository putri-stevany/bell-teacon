<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('assets/img/Techno_Bell.png')}}">
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

{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
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

            // Mendapatkan hari dalam bentuk angka (0 = Minggu, 1 = Senin, dst.)
            const dayOfWeek = now.getDay();

            // Mendapatkan data jadwal berdasarkan hari
            const scheduleData = getScheduleData(dayOfWeek);

            if (scheduleData) {
                const audioPath = scheduleData.audio;
                playAudio(audioPath);
            } else {
                // Tambahkan logika jika tidak ada jadwal pada hari tersebut
                // Sebagai contoh, menyembunyikan audio player jika tidak ada jadwal
                hideAudioPlayer();
            }
        }

        function getScheduleData(dayOfWeek, currentHour) {
        // Gantilah dengan logika atau pemanggilan API untuk mendapatkan data jadwal dari tabel database
        // Misalnya, jika Anda memiliki array schedules sebagai data placeholder:
        const schedules = [
            // Index 0: Minggu, Index 1: Senin, dst.
            { day: 0, schedule: [] }, // Minggu
            { day: 1, schedule: [
                { hour: 8, audio: 'path/audio-senin-pagi.mp3' },
                { hour: 12, audio: 'path/audio-senin-siang.mp3' },
                { hour: 17, audio: 'path/audio-senin-sore.mp3' },
            ] }, // Senin
            // ... dan seterusnya
        ];

        // Temukan jadwal untuk hari dan jam saat ini
        const daySchedule = schedules.find(schedule => schedule.day === dayOfWeek);

        if (daySchedule) {
            // Temukan jadwal berdasarkan jam saat ini
            const currentSchedule = daySchedule.schedule.find(entry => currentHour >= entry.hour && currentHour < entry.hour + 1);

            if (currentSchedule) {
                return currentSchedule;
            }
        }

        return null; // Jadwal tidak ditemukan
    }

        function playAudio(audioPath) {
            const audioPlayer = document.getElementById('audioPlayer');
            audioPlayer.src = audioPath;
            audioPlayer.play();
            audioPlayer.style.display = 'block';  // Menampilkan audio player
        }

        function hideAudioPlayer() {
            const audioPlayer = document.getElementById('audioPlayer');
            audioPlayer.style.display = 'none';  // Menyembunyikan audio player
        }

        setInterval(updateClock, 1000);
        updateClock();
    });
</script> --}}


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
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>

<script>
    function updateAudio(jadwal, model) {
        // Ambil data dari server berdasarkan jadwal dan model yang diteruskan
        fetch(`/get-audio-schedule?jadwal=${jadwal}&model=${model}`)
            .then(response => response.json())
            .then(data => {
                // Dapatkan waktu saat ini
                const currentTime = new Date();
                const currentDay = currentTime.toLocaleDateString('en-US', { weekday: 'long' });
                const currentHour = currentTime.getHours();
                const currentMinute = currentTime.getMinutes();

                // Cari audio yang sesuai dengan waktu, hari, dan menit saat ini
                const matchingAudio = data.find(entry =>
                    entry.hari === currentDay && entry.jam == currentHour && entry.menit == currentMinute
                );

                // Jika audio ditemukan, atur src elemen audio dan mainkan
                if (matchingAudio && matchingAudio.audio) {
                    const hiddenAudio = document.getElementById('hiddenAudio');
                    hiddenAudio.src = matchingAudio.audio;
                    hiddenAudio.play();
                } else {
                    console.error('Audio not found for the current time and day.');
                }
            })
            .catch(error => console.error('Error fetching audio schedule:', error));
    }

    // Atur interval untuk memperbarui audio setiap detik
    setInterval(() => updateAudio('default'), 1000);
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
    var activeScheduleType = '';  // Variabel untuk menyimpan jenis jadwal yang aktif

    function loadScheduleData(route) {
        fetch(route)
            .then(response => response.json())
            .then(data => {
                // Menghapus konten yang ada di dalam tbody
                document.getElementById('jadwalContainer').innerHTML = '';

                // Mengisi tbody dengan data baru
                data.forEach(schedule => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${schedule.id}</td>
                        <td>${schedule.hari}</td>
                        <td class="align-middle text-center text-sm">${schedule.jam}</td>
                        <td class="align-middle text-center">${schedule.jadwal}</td>
                        <td class="align-middle">${schedule.audio}</td>
                        <td class="text-secondary opacity-7"></td>
                    `;
                    document.getElementById('jadwalContainer').appendChild(row);
                });
            })
            .catch(error => console.error('Error fetching schedule data:', error));
    }

    function handleClick(card) {
        activeScheduleType = card.getAttribute('data-target');  // Menyimpan jenis jadwal yang aktif
        const route = `/${activeScheduleType}`;  // Menggunakan jenis jadwal yang aktif saat memanggil route
        loadScheduleData(route);

        // Mengarahkan pengguna ke halaman baru
        window.location.href = route;
    }

    // Menangani klik pada card-warning
    document.querySelector('.card-warning').addEventListener('click', function () {
        handleClick(this);
        updateAudio('default', 'Schedule'); // Pastikan 'Schedule' sesuai dengan model yang benar
    });

    // Menangani klik pada card-success
    document.querySelector('.card-success').addEventListener('click', function () {
        handleClick(this);
        updateAudio('default', 'Ujian'); // Pastikan 'Ujian' sesuai dengan model yang benar
    });

    // Menangani klik pada card-danger
    document.querySelector('.card-danger').addEventListener('click', function () {
        handleClick(this);
        updateAudio('default', 'Sesi2'); // Pastikan 'Sesi2' sesuai dengan model yang benar
    });

    // Menangani klik pada card-primary
    document.querySelector('.card-primary').addEventListener('click', function () {
        handleClick(this);
        updateAudio('default', 'Balik'); // Pastikan 'Balik' sesuai dengan model yang benar
    });

});
</script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var dayOfWeek = now.getDay();

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            var timeString = dayOfWeekToString(dayOfWeek) + ', ' + hours + ':' + minutes + ':' + seconds;
            document.getElementById("digitalClock").innerHTML = timeString;

            // Menggunakan AJAX untuk mendapatkan data audio dari server
            fetch('/get-audio-schedule')
                .then(response => response.json())
                .then(data => {
                    if (data.audio) {
                        const audioPath = data.audio;
                        playAudio(audioPath);
                    } else {
                        hideAudioPlayer();
                    }
                })
                .catch(error => console.error('Error fetching audio schedule:', error));
        }

        function dayOfWeekToString(dayOfWeek) {
            const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            return daysOfWeek[dayOfWeek];
        }

        function playAudio(audioPath) {
            const audioPlayer = new Audio(audioPath);

            audioPlayer.addEventListener('ended', function () {
                hideAudioPlayer();
                updateClock(); // Memperbarui jam setelah audio selesai
            });

            audioPlayer.play();
            audioPlayer.style.display = 'block';
        }

        function hideAudioPlayer() {
            const audioPlayer = document.getElementById('audioPlayer');
            audioPlayer.style.display = 'none';
        }

        setInterval(updateClock, 1000);
        updateClock();
    });
</script> --}}


{{-- <script>
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
</script> --}}
