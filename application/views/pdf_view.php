<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #ffffff;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($mhs['nama_mhs']) ?></td>
                    <td><?= htmlspecialchars($mhs['nim']) ?></td>
                    <td><?= htmlspecialchars($mhs['tgl_lahir']) ?></td>
                    <td><?= htmlspecialchars($mhs['jurusan']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <footer>
        Dicetak pada: <?= date('d-m-Y') ?>
    </footer>
</body>
</html>
