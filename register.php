<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
            body {
                background-image: url('img/hero-bg.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: #fff; 
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }

            .card {
                background-color: rgba(255, 255, 255, 0.7); 
                max-width: 400px;
                margin-top: 20px; 
                color: #343a40; 
            }
        </style>
        <script>
            function showAlert(message) {
                alert(message);
            }
        </script>
        <title>Register</title>
    </head>
    <body>
        <?php
            require_once 'koneksi.php';

            $email = $password = $name = ""; // Inisialisasi variabel

            if (isset($_SESSION['is_login']) || isset($_COOKIE['_logged'])) {
                header('location: login.php');
            }

            if (isset($_POST['submit'])) {
                $email    = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);
                $name     = strip_tags($_POST['name']);
                
                if (empty($email) || empty($password) || empty($name)) {
                    $warning_message = '<div class="alert alert-danger"><b>Warning!</b> Silahkan isi data yang diperlukan.</div>'; // Tanda validasi
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $warning_message = '<div class="alert alert-danger"><b>Warning!</b> Format email tidak valid. tambahkan @ untuk penanda</div>'; // Tanda validasi
                } elseif (strlen($password) < 8) {
                    $warning_message = '<div class="alert alert-danger"><b>Warning!</b> Password harus minimal 8 karakter.</div>'; // Tanda validasi
                } elseif (count((array)$connect->query('SELECT email FROM pelanggan WHERE email = "'.$email.'"')->fetch_array()) > 1) {
                    $warning_message = '<div class="alert alert-danger"><b>Warning!</b> Email telah terdaftar.</div>'; // Tanda validasi
                } else {
                    $insert = $connect->query('INSERT INTO `pelanggan`(`email`, `password`, `nama_lengkap`) VALUES("'.$email.'", "'.password_hash($password, PASSWORD_BCRYPT).'", "'.$name.'")');
                    if ($insert) {
                        echo '<script>showAlert("Pendaftaran berhasil! Silahkan login.");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=login.php" />';
                    } else {
                        $warning_message = '<div class="alert alert-danger">Pendaftaran gagal!</div>'; // Tanda validasi
                    }
                }
            }
        ?>
    </body>
    <body>
        <div class="container mt-5">
            <div class="card mx-auto">
                <div class="card-body">
                    <h2 class="text-center mb-4">Register</h2>
                    <?php
                    if (isset($warning_message)) {
                        echo $warning_message;
                    }
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="" autocomplete="off" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" value="" autocomplete="off"
                                placeholder="Kata sandi">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" value="" autocomplete="off"
                                placeholder="Nama lengkap">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>


