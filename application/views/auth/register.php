<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Form Pendaftaran</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins|Roboto&display=fallback" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Background dengan gradient */
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-box {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .register-logo a {
            font-size: 36px;
            font-weight: bold;
            color: #2575fc;
            text-align: center;
            text-decoration: none;
        }

        .form-label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            font-size: 16px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #2575fc;
            border-color: #2575fc;
            border-radius: 5px;
            font-size: 16px;
            padding: 12px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1e66d0;
            border-color: #1e66d0;
        }

        .alert {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #2575fc;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            color: #1e66d0;
        }

        /* Mobile Responsive */
        @media (max-width: 576px) {
            .register-box {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Daftar</b> Sekarang</a>
        </div>

        <!-- Notifikasi -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form action="<?= site_url('auth/register_process'); ?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Kunci</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>

            <div class="login-link">
                <p>Sudah Punya Akun? <a href="<?= site_url('auth/login'); ?>">Masuk</a></p>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
