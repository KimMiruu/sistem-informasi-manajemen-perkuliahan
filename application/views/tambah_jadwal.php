<section class="add-schedule-section">
    <div class="container">
        <!-- Header -->
        <div class="schedule-header">
            <h1>Tambah Jadwal Kuliah</h1>
        </div>

        <!-- Form -->
        <div class="schedule-form">
            <form action="<?= site_url('jadwalkuliah/simpan') ?>" method="POST" class="form-container">
                <div class="form-group">
                    <label for="kode_makul">Kode Makul</label>
                    <input type="text" id="kode_makul" name="kode_makul" class="form-control" placeholder="Kode Makul" required>
                </div>
                <div class="form-group">
                    <label for="hari">Hari</label>
                    <input type="text" id="hari" name="hari" class="form-control" placeholder="Hari" required>
                </div>
                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="text" id="jam" name="jam" class="form-control" placeholder="Jam" required>
                </div>
                <div class="form-group">
                    <label for="mata_kuliah">Mata Kuliah</label>
                    <input type="text" id="mata_kuliah" name="mata_kuliah" class="form-control" placeholder="Mata Kuliah" required>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" required>
                </div>
                <div class="form-group">
                    <label for="dosen">Dosen</label>
                    <input type="text" id="dosen" name="dosen" class="form-control" placeholder="Dosen" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= site_url('jadwalkuliah'); ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
    .add-schedule-section {
        padding: 20px;
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .schedule-header h1 {
        text-align: center;
        color: #343a40;
        margin-bottom: 20px;
    }

    .form-container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .form-control:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-success {
        background-color: #28a745;
        color: #ffffff;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #ffffff;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>
