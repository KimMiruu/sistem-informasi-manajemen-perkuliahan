<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Jadwal Kuliah</title>
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
        <h2 class="text-center">Jadwal Kuliah</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Kode Makul</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Mata Kuliah</th>
                    <th>Kelas</th>
                    <th>Dosen</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jadwal)): ?>
                    <?php foreach ($jadwal as $index => $item): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($item['kode_makul']); ?></td>
                        <td><?php echo htmlspecialchars($item['hari']); ?></td>
                        <td><?php echo htmlspecialchars($item['jam']); ?></td>
                        <td><?php echo htmlspecialchars($item['mata_kuliah']); ?></td>
                        <td><?php echo htmlspecialchars($item['kelas']); ?></td>
                        <td><?php echo htmlspecialchars($item['dosen']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data jadwal kuliah.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print(); // Automatically trigger the print dialog
    </script>
</body>
</html>
