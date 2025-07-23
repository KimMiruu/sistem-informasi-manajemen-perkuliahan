<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-5">
    <h2 class="mb-4">Grafik Jumlah Mahasiswa Per Jurusan</h2>

    <canvas id="mahasiswaChart"></canvas>
    
    <script>
        // Ambil data dari PHP yang sudah dikirim ke view
        var labels = <?php echo $labels; ?>;
        var counts = <?php echo $counts; ?>;

        var ctx = document.getElementById('mahasiswaChart').getContext('2d');
        var mahasiswaChart = new Chart(ctx, {
            type: 'bar', // Jenis grafik (bar chart)
            data: {
                labels: labels, // Label untuk sumbu X
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: counts, // Data untuk sumbu Y
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna background bar
                    borderColor: 'rgba(54, 162, 235, 1)', // Warna border bar
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true // Mulai dari nol
                    }
                }
            }
        });
    </script>
</div>