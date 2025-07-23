<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal kuliah</h1>
                </div>
            </div>
            <div class="action-buttons">
                <div class="button-group">
                    <a href="<?= site_url('jadwalkuliah/tambah'); ?>" class="btn btn-success">Tambah Jadwal</a>
                    <a href="<?= site_url('jadwal/print'); ?>" class="btn btn-danger">Print Jadwal</a>
                </div>
                <form action="<?= site_url('jadwalkuliah/search') ?>" method="POST" class="search-form">
                    <input 
                        type="text" 
                        name="keyword" 
                        class="form-control search-input" 
                        placeholder="Cari Mata Kuliah, Dosen, dll" 
                        value="<?= $this->input->post('keyword') ?>">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="schedule-table">
            <div class="table-grid table-header">
                <div>No.</div>
                <div>Kode Makul</div>
                <div>Hari</div>
                <div>Jam</div>
                <div>Mata Kuliah</div>
                <div>Kelas</div>
                <div>Dosen</div>
                <div>Aksi</div>
            </div>
            <div class="table-body">
                <?php if (!empty($jadwal)): ?>
                    <?php foreach ($jadwal as $index => $item): ?>
                        <div class="table-grid table-row">
                            <div><?= $index + 1 ?></div>
                            <div><?= $item->kode_makul ?></div>
                            <div><?= $item->hari ?></div>
                            <div><?= $item->jam ?></div>
                            <div><?= $item->mata_kuliah ?></div>
                            <div><?= $item->kelas ?></div>
                            <div><?= $item->dosen ?></div>
                            <div class="action-buttons">
                                <a href="<?= site_url('jadwalkuliah/detail/' . $item->id) ?>" class="btn btn-info btn-sm">Detail</a>
                                <a href="<?= site_url('jadwalkuliah/edit/' . $item->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('jadwalkuliah/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="table-row">
                        <div class="no-data" colspan="8">Tidak ada data jadwal kuliah.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?= $this->pagination->create_links(); ?>
        </div>
    </section>
</div>

<style>
    .content-wrapper {
        background-color: #f8f9fa;
        padding: 20px;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-bottom: 20px;
    }

    .search-form {
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: flex-end; /* Align search form to the right */
    }

    .search-input {
        width: 250px;
        padding: 8px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .button-group {
        display: flex;
        gap: 10px;
        justify-content: flex-start; /* Align buttons to the left */
    }

    .btn {
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
    }

    .btn-primary {
        background-color: #007bff;
        color: #ffffff;
    }

    .btn-success {
        background-color: #28a745;
        color: #ffffff;
    }

    .btn-primary:hover,
    .btn-success:hover {
        opacity: 0.8;
    }

    .schedule-table {
        margin-top: 20px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    .table-grid {
        display: grid;
        grid-template-columns: 50px 150px 100px 100px 200px 100px 200px 120px;
        text-align: center;
        padding: 10px;
        border-bottom: 1px solid #dee2e6;
    }

    .table-header {
        background-color: #343a40;
        color: #fff;
        font-weight: bold;
        padding: 10px;
    }

    .table-row {
        padding: 10px;
        background-color: #f8f9fa;
    }

    .table-row:hover {
        background-color: #e9ecef;
    }

    .action-buttons .btn-sm {
        padding: 5px 10px;
        margin-right: 5px; /* Added margin to create space between buttons */
    }

    .no-data {
        text-align: center;
        padding: 20px;
        font-size: 16px;
        color: #6c757d;
        grid-column: span 8;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        margin: 0 5px;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-decoration: none;
        color: #007bff;
    }

    .pagination a:hover {
        background-color: #f1f5f9;
    }
</style>
