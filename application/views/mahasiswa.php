<section class="content">
    <div class="container mt-5">
        <h2 class="mb-4">Data Mahasiswa</h2>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS for Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>

                <a class="btn btn-danger" href="<?php echo site_url('dashboard/print'); ?>" style="display: inline-flex; align-items: center;">
                    <i class="fa fa-print" style="margin-right: 5px;"></i> Print
                </a>
            </div>

            <div class="dropdown d-inline">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-download" style="margin-right: 5px;"></i> Export
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a class="dropdown-item" href="<?php echo site_url('dashboard/generate_pdf'); ?>">PDF</a></li>
                <li><a class="dropdown-item" href="<?php echo site_url('dashboard/exportExcel'); ?>">EXCEL</a></li>
                </ul>
            </div>

            <a class="btn btn-info" href="<?= site_url('dashboard/tampil_grafik') ?>">
                <i class="fa fa-chart-area"></i> Tampilkan Grafik
            </a>

            <div class="navbar-form">
                <?php echo form_open('dashboard/search'); ?>
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search" required aria-label="Search">
                    <button type="submit" class="btn btn-success">Cari</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIM</th>
                    <th>ALAMAT</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JURUSAN</th>
                    <th>NO. TELEPON</th>
                    <th>EMAIL</th>
                    <th>FOTO</th>
                    <th colspan="3">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($mahasiswa)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $mhs['nama_mhs']; ?></td>
                            <td><?php echo $mhs['nim']; ?></td>
                            <td><?php echo $mhs['alamat']; ?></td>
                            <td><?php echo $mhs['tgl_lahir']; ?></td>
                            <td><?php echo $mhs['jurusan']; ?></td>
                            <td><?php echo $mhs['no_telp']; ?></td>
                            <td><?php echo $mhs['email']; ?></td>
                            <td>
                                <?php if (!empty($mhs['foto'])): ?>
                                    <img src="<?php echo base_url('assets/Gambar/' . $mhs['foto']); ?>" width="50" height="50" alt="Foto Mahasiswa">
                                <?php else: ?>
                                    <span>No Image</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo anchor('dashboard/detail/' . $mhs['id_mhs'], '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>'); ?>
                            </td>
                            <td onclick="javascript: return confirm('Anda yakin ingin Hapus?')">
                                <a href="<?php echo site_url('dashboard/hapus/' . $mhs['id_mhs']); ?>" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo site_url('dashboard/edit/' . $mhs['id_mhs']); ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11" class="text-center">Tidak ada data mahasiswa.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


     <!-- Pagination Links -->
     <div class="pagination-links">
   <?php if (isset($pagination_links) && !empty($pagination_links)) : ?>
      <?php echo $pagination_links; ?>
   <?php endif; ?>
</div>

        <!-- Modal for Adding Data -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="<?php echo site_url('dashboard/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_mhs" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama_mhs" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="number" class="form-control" name="nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" name="no_telp" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
