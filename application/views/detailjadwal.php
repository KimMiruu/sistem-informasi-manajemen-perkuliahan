<section class="schedule-detail">
    <div class="container">
        <h1>Detail Jadwal Kuliah</h1>
        <table class="table table-bordered">
            <tr>
                <th>Kode Makul</th>
                <td><?= $jadwal->kode_makul ?></td>
            </tr>
            <tr>
                <th>Hari</th>
                <td><?= $jadwal->hari ?></td>
            </tr>
            <tr>
                <th>Jam</th>
                <td><?= $jadwal->jam ?></td>
            </tr>
            <tr>
                <th>Mata Kuliah</th>
                <td><?= $jadwal->mata_kuliah ?></td>
            </tr>
            <tr>
                <th>SKS</th>
                <td><?= $jadwal->sks ?></td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td><?= $jadwal->kelas ?></td>
            </tr>
            <tr>
                <th>Dosen</th>
                <td><?= $jadwal->dosen ?></td>
            </tr>
            <tr>
                <th>Ruang</th>
                <td><?= $jadwal->ruang ?></td>
            </tr>
            <tr>
                <th>Semester</th>
                <td><?= $jadwal->semester ?></td>
            </tr>
        </table>
        <!-- Tombol Kembali -->
        <a href="<?php echo site_url('dashboard/jadwal'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
</section>

<style>
    .schedule-detail {
        padding: 20px;
        font-family: 'Arial', sans-serif;
        background-color: #f8fafc;
    }

    .schedule-detail h1 {
        text-align: center;
        font-size: 28px;
        color: #333;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .table th {
        background-color: grey;
        color: #fff;
    }

    .btn-primary {
        display: block;
        margin: 20px auto;
        text-align: center;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
