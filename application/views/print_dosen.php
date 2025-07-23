<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Dosen</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
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
        <h2 class="text-center">Data Dosen</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
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
            <?php if (!empty($dosen)): ?>
        <?php foreach ($dosen as $index => $item): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= isset($item->nama_dosen) ? htmlspecialchars($item->nama_dosen) : 'Data tidak tersedia' ?></td>
                <td><?= isset($item->nik_nidn) ? htmlspecialchars($item->nik_nidn) : 'Data tidak tersedia' ?></td>
                <td><?= isset($item->prodi) ? htmlspecialchars($item->prodi) : 'Data tidak tersedia' ?></td>
                <td><?= isset($item->email) ? htmlspecialchars($item->email) : 'Data tidak tersedia' ?></td>
                <td><?= isset($item->no_telepon) ? htmlspecialchars($item->no_telepon) : 'Data tidak tersedia' ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" style="text-align: center;">Tidak ada data dosen.</td>
        </tr>
    <?php endif; ?>
</table>
    </div>
    <script type="text/javascript">
        window.print(); // Automatically trigger the print dialog
    </script>
</body>
</html>
