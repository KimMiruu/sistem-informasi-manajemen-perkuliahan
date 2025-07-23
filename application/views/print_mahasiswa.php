<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Mahasiswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact; /* Ensures colors are printed accurately */
            }
            .no-print {
                display: none; /* Hides elements with this class during printing */
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid black; /* Adds a border for print clarity */
                padding: 8px;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Mahasiswa</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Tanggal Lahir</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?php echo htmlspecialchars($mhs['nama_mhs']); ?></td>
                    <td><?php echo htmlspecialchars($mhs['nim']); ?></td>
                    <td><?php echo htmlspecialchars($mhs['tgl_lahir']); ?></td>
                    <td><?php echo htmlspecialchars($mhs['jurusan']); ?></td>
                    <td><?php echo htmlspecialchars($mhs['alamat']); ?></td>
                    <td><?php echo htmlspecialchars($mhs['email']); ?></td>
                    <td><?php echo htmlspecialchars($mhs['no_telp']); ?></td>
                    <td>
                        <?php if (!empty($mhs['foto'])): ?>
                            <img src="<?php echo base_url('assets/Gambar/' . $mhs['foto']); ?>" width="50" height="50" alt="Foto">
                        <?php else: ?>
                            <span>No Image</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print(); // Automatically trigger the print dialog
    </script>
</body>
</html>
