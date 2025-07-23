<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Form Login</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css'); ?>">

    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient background */
            font-family: 'Source Sans Pro', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .login-logo a {
            font-size: 36px;
            font-weight: bold;
            color: #2575fc;
            text-decoration: none;
            text-align: center;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #2575fc;
            border-color: #2575fc;
            border-radius: 5px;
            font-size: 18px;
            padding: 12px;
        }

        .btn-primary:hover {
            background-color: #1e66d0;
            border-color: #1e66d0;
        }

        .alert {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .login-box-msg {
            font-size: 20px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-register {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-register:hover {
            background-color: #c82333;
        }

        .btn-forgot-password {
            background-color: #ffc107;
            color: black;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-forgot-password:hover {
            background-color: #e0a800;
        }

        /* Flexbox container for buttons */
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Add spacing between buttons */
            margin-top: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-box {
                padding: 20px;
            }

            .login-logo a {
                font-size: 28px;
            }

            .btn-primary {
                font-size: 16px;
                padding: 10px;
            }

            .btn-forgot-password, .btn-register {
                font-size: 14px;
                padding: 10px;
            }

            .form-control {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .login-logo a {
                font-size: 24px;
            }

            .btn-primary {
                font-size: 14px;
                padding: 8px;
            }

            .btn-forgot-password, .btn-register {
                font-size: 12px;
                padding: 8px;
            }

            .form-control {
                font-size: 14px;
                padding: 8px;
            }

            .login-box {
                padding: 15px;
            }
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Login</b> Form</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Masuk untuk Mulai</p>

                <!-- Pesan Error -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form method="post" action="<?= site_url('auth/login_process'); ?>">
                    <div class="form-group">
                        <label for="username">Nama Pengguna</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Kunci</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Kata Kunci" required>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Ingat Saya</label>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol-Tombol -->
                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                        <a href="<?= site_url('auth/register'); ?>" class="btn btn-register">Register</a>
                        <a href="<?= site_url('auth/forgot_password'); ?>" class="btn btn-forgot-password">Lupa Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
