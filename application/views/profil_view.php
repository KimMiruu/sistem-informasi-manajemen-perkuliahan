<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-top: 20px;
        }

        .profile-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .profile-header img {
            border-radius: 50%;
            border: 4px solid white;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .profile-body {
            padding: 20px;
        }

        .profile-body h3 {
            color: #007bff;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .btn-upload {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            width: 100%;
        }

        .btn-upload:hover {
            background-color: #0056b3;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .alert {
            margin-top: 10px;
        }

        .card-footer {
            background-color: #f8f9fa;
            padding: 5px 10px;
            text-align: center;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="profile-card">
                <div class="profile-header">
                    <h4>Profil Pengguna</h4>
                    <?php if (!empty($profil['foto'])): ?>
                        <img src="<?= base_url('assets/Gambar/' . $profil['foto']); ?>" alt="Foto Profil">
                        <br>
                    <?php else: ?>
                        <p>Foto belum diunggah.</p>
                    <?php endif; ?>
                </div>
                <div class="profile-body">
                    <!-- Notifikasi -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>
                    
                    <form action="<?= site_url('profil/upload_foto'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="file" name="foto" class="form-control mb-3" required>
                        <button type="submit" class="btn-upload btn-sm">Upload Foto</button>
                    </form>

                    <div class="mt-4">
                        <h3>Detail Profil</h3>
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th>Nama</th>
                                <td><?= $profil['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $profil['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?= $profil['telepon']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <small>&copy; 2025 Profil Pengguna</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

 