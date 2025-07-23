<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perkuliahan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <style>
        .card-title, .card-text {
            text-align: center;
        }
        #calendar {
            margin-top: 20px;
            max-width: 100%;
            height: 350px; /* Menentukan tinggi kalender agar lebih kecil */
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard Perkuliahan</h1>
                    </div>
                    <div class="col-sm-6 text-end"> <!-- Posisi breadcrumb di kanan -->
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <!-- Statistik Kartu -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-primary text-white text-center p-3">
                            <h4 class="card-title">Mahasiswa</h4>
                            <p class="card-text">Total: <?= $total_mahasiswa ?></p>
                            <a href="<?= site_url('mahasiswa'); ?>" class="btn btn-outline-light btn-sm"><i class="fas fa-cog"></i> Kelola</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-success text-white text-center p-3">
                            <h4 class="card-title">Dosen</h4>
                            <p class="card-text">Total: <?= $total_dosen ?></p>
                            <a href="<?= site_url('dosen'); ?>" class="btn btn-outline-light btn-sm"><i class="fas fa-cog"></i> Kelola</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-warning text-white text-center p-3">
                            <h4 class="card-title">Jadwal Kuliah</h4>
                            <p class="card-text">Total: <?= $total_jadwal ?></p>
                            <a href="<?= site_url('jadwal'); ?>" class="btn btn-outline-light btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                        </div>
                    </div>
                </div>

                <!-- Grafik Section -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Grafik Mahasiswa</h5>
                                <canvas id="mahasiswaChart" width="300" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Grafik Dosen</h5>
                                <canvas id="dosenChart" width="300" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Grafik Jadwal Kuliah</h5>
                                <canvas id="jadwalChart" width="300" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kalender Section -->
                <div class="row">
                    <div class="col-md-12 mb-3"> <!-- Kalender mengisi seluruh lebar -->
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Bootstrap JS, Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        window.onload = function() {
            // Data langsung dari PHP
            const mahasiswaData = {
                labels: ['Total Mahasiswa'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [<?= $total_mahasiswa ?>],
                    backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            };

            const dosenData = {
                labels: ['Total Dosen'],
                datasets: [{
                    label: 'Jumlah Dosen',
                    data: [<?= $total_dosen ?>],
                    backgroundColor: ['rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            };

            const jadwalData = {
                labels: ['Total Jadwal Kuliah'],
                datasets: [{
                    label: 'Jumlah Jadwal Kuliah',
                    data: [<?= $total_jadwal ?>],
                    backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)'],
                    borderWidth: 1
                }]
            };

            // Render Grafik Mahasiswa
            const ctx1 = document.getElementById('mahasiswaChart').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: mahasiswaData
            });

            // Render Grafik Dosen
            const ctx2 = document.getElementById('dosenChart').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: dosenData
            });

            // Render Grafik Jadwal Kuliah
            const ctx3 = document.getElementById('jadwalChart').getContext('2d');
            new Chart(ctx3, {
                type: 'bar',
                data: jadwalData
            });

            // Render Kalender
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    { title: 'pengambilan nilai UAS ', start: '2025-01-14' },
                    { title: 'Libur Semester', start: '2025-01-20' }
                ]
            });
            calendar.render();
        }
    </script>
</body>
</html>
