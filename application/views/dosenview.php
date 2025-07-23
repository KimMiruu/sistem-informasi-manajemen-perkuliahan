<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Dosen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Dosen</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Tombol Print dan Export PDF -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Dosen</h3>
                            <div class="float-right">
                            <a href="<?= site_url('dosen/print'); ?>" class="btn btn-success">Print dosen</a>
                                <a href="<?php echo site_url('dosen/export_pdf'); ?>" class="btn btn-danger">Export PDF</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="dataDosen" class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dosen</th>
                                        <th>NIK/NIDN</th>
                                        <th>Prodi</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($dosen as $dsn): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $dsn->nama_dosen; ?></td>
                                            <td><?= $dsn->nik_nidn; ?></td>
                                            <td><?= $dsn->prodi; ?></td>
                                            <td><?= $dsn->email; ?></td>
                                            <td><?= $dsn->no_telp; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Tampilkan Link Pagination Jika Ada -->
<div class="pagination-links">
    <?php echo isset($pagination_links) ? $pagination_links : ''; ?>
</div>

<!-- Include DataTables CSS dan JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Konfigurasi DataTables -->
<script>
    $(document).ready(function() {
        $('#dataDosen').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<!-- CSS Custom untuk Print -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .content-wrapper, .content-wrapper * {
            visibility: visible;
        }
        .content-wrapper {
            position: absolute;
            left: 0;
            top: 0;
        }
        .btn, .dataTables_filter {
            display: none;
        }
    }
</style>
