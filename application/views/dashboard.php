<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* General styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Navbar styles */
        .navbar {
            background-color: #d32f5f;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .title {
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .user {
            font-size: 16px;
        }

        /* Container styles */
        .container {
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        /* Alert styles */
        .alert {
            background-color: #f44336;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Cards styles */
        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            flex: 1;
            padding: 20px;
            border-radius: 5px;
            color: white;
            text-align: center;
        }

        .card h3 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .card a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .card.blue {
            background-color: #42a5f5;
        }

        .card.orange {
            background-color: #ffa726;
        }

        .card.green {
            background-color: #66bb6a;
        }

        /* Footer styles */
        footer {
            margin-top: 20px;
            font-size: 14px;
            color: gray;
            text-align: right;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="navbar-left">
            <span class="menu-icon">&#9776;</span>
            <span class="title">Dashboard</span>
        </div>
        <div class="navbar-right">
            <span class="user">Masuk Web</span>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container">
            <h2>Quick Links</h2>
            <div class="alert">
                Hai admin<br>
                Selamat datang di halaman Admin. Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website.
            </div>
            <div class="cards">
                <div class="card blue">
                    <h3>3</h3>
                    <p>Dosen</p>
                    <a href="#">Klik disini</a>
                </div>
                <div class="card orange">
                    <h3>1</h3>
                    <p>Mata Kuliah</p>
                    <a href="#">More info</a>
                </div>
                <div class="card green">
                    <h3>9</h3>
                    <p>Kriteria</p>
                    <a href="#">Klik Disini</a>
                </div>
            </div>
            <footer>
                <p>Login: Minggu,</p>
            </footer>
        </div>
    </main>
</body>
</html>
