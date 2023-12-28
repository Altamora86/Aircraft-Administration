<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-image: url('img/hero-bg.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            form {
                background-color: rgba(255, 255, 255, 0.7);
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 400px; 
                width: 100%;
            }

            input {
                margin: 10px 0;
                padding: 10px;
                width: 100%;
                box-sizing: border-box;
            }

            input[type="submit"] {
                display: block;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                padding: 10px;
                margin-top: 10px;
                border-radius: 5px;
                transition: color 0.3s, text-decoration 0.3s;
            }

            input[type="submit"]:hover {
                color: #0056b3; 
                text-decoration: underline; 
            }

            .remember-me {
                text-align: center; 
            }

            label {
                display: block;
                text-align: left;
                color: #333; 
                margin-bottom: 5px;
            }

            .register-button {
                display: block;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                padding: 10px;
                margin-top: 10px;
                border-radius: 5px;
            }

            .register-button:hover {
                color: #0056b3; 
                text-decoration: underline; 
            }

            .warning-message {
                position: fixed;
                top: 10px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #f44336;
                color: #fff;
                padding: 15px;
                text-align: center;
                display: none;
                z-index: 999;
            }
            
        </style>

        <title>Login</title>

    </head>
    <body>
        <?php
            require_once 'koneksi.php'; // Sambungkan ke database.

            if (isset($_SESSION['is_login']) || isset($_COOKIE['_logged'])) {
                header('location: index.php'); // Arahkan ke halaman beranda jika sudah login
                exit();
            }

            if (isset($_POST['submit'])) {
                $email = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);
                $remember = (!empty($_POST['remember_me']) ? $_POST['remember_me'] : '');

                // Inisialisasi koneksi ke database
                $koneksi = mysqli_connect("localhost", "root", "", "pesawat");

                // Periksa koneksi
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }

                // Ambil data pengguna dari database berdasarkan email
                $query = "SELECT * FROM pelanggan WHERE email = '$email'";
                $result = mysqli_query($koneksi, $query);
                $pelanggan = mysqli_fetch_assoc($result);

                if ($pelanggan && password_verify($password, $pelanggan['password'])) {
                    $_SESSION['is_login'] = $pelanggan['nama_lengkap'];

                    if ($remember) {
                        if (!isset($_COOKIE['_logged'])) {
                            setcookie('_logged', substr(md5($email), 0, 10), time() + (60 * 60 * 24), '/');
                        }
                    }

                    header('location: index.php');
                    exit();
                } else {
                    echo '<div class="warning-message">Peringatan! Email atau password salah.</div>';
                }

                // Tutup koneksi setelah digunakan
                mysqli_close($koneksi);
            }
        ?>



        <form method="POST">
            <h2>Login</h2>
            <label for="email">Email</label>
            <input type="email" name="email" value="" autocomplete="off" placeholder="Email" required>
            <br/>

            <label for="password">Password</label>
            <input type="password" name="password" value="" autocomplete="off" placeholder="Password" required>
            <br/>

            <div class="form-check remember-me">
                <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                <label class="form-check-label" for="remember_me">Remember Me</label>
            </div>
            <br/>

            <input type="submit" name="submit" value="Login" class="btn btn-primary">
            <a class="register-button" href="register.php">Register</a>
        </form>

        <script>
        // Display warning message
        setTimeout(function(){
            document.querySelector('.warning-message').style.display = 'block';
        }, 500);
        </script>
    </body>
</html>
