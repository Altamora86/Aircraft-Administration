<?php
include 'koneksi.php';

// mengambil kriteria pencarian dari from inputan search
$tgl_berangkat = isset($_GET['tgl_berangkat']) ? $_GET['tgl_berangkat'] : '';
$tujuan = isset($_GET['tujuan']) ? $_GET['tujuan'] : '';

// Query untuk kriteria pencarian
$sql = "SELECT * FROM pemesanan WHERE 
        tgl_berangkat = '$tgl_berangkat' AND
        tujuan = '$tujuan'";

$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="img/fav.png">
        <meta name="author" content="colorlib">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="UTF-8">

        <title>SKYHUB</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 

        <!-- CSS -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">				
        <link rel="stylesheet" href="css/nice-select.css">							
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">				
        <link rel="stylesheet" href="css/main.css">
        <style>
            #logo p {
                color: #fff; 
                font-weight: bold; 
                font-size: 24px; 
                margin: 0; 
            }
            #pemesanan-title {
                color: #333;
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 20px;
            }
            
        </style>
    </head>
    <body>	
        <header id="header">
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <p>SKYHUB INDONESIA</p>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="service.php">Service</a></li>                                       
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="search.php">Search</a></li>
                            <?php
                                // menampilkan tombol logout jika pengguna sudah login
                                if (isset($_SESSION['is_login']) || isset($_COOKIE['_logged'])) {
                                    echo '<li><a href="logout.php">Logout</a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
            
        <!-- mulai banner Area -->
        <section class="about-banner relative">
            <div class="overlay overlay-bg"></div>
            <div class="container">				
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Search		
                        </h1>	
                        <p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="search.php"> Search</a></p>
                    </div>	
                </div>
            </div>
        </section>
        <!-- akhir banner Area -->	

        <!-- mulai searching -->
        <section class="price-area section-gap">
            <div class="container">
                <div class="section-top-border">
                    <h3 class="mb-30" id="pemesanan-title">Mencari Perjalanan Keberangkatan</h3>
                    <form method="GET" action="search.php" class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" placeholder="Tanggal Berangkat">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>

                    <!-- Hasil Result -->
                    <?php if ($result->num_rows > 0): ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Keberangkatan</th>
                                                <th>Jumlah Penumpang</th>
                                                <th>Kelas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <tr>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td><?php echo $row['tgl_berangkat']; ?></td>
                                                    <td><?php echo $row['jumlah_penumpang']; ?></td>
                                                    <td><?php echo $row['kelas']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>No matching records found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- akhir searching -->

        <!-- mulai footer Area -->		
        <footer class="footer-area section-gap">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Tentang Kami</h6>
                            <p>
                                SkyHub adalah layanan administrasi pesawat terdepan. Dengan kombinasi inovasi, teknologi canggih, dan fokus kami pada efisiensi, kami berkomitmen untuk menghadirkan pelayanan yang optimal. Sebagai ahli dalam navigasi efisien, perawatan pesawat, manajemen logistik udara, dan pusat komando terpadu, kami menjembatani kesenjangan antara kemewahan penerbangan dan operasional yang mulus. Bersama-sama, kita membentuk langit yang lebih aman dan efisien.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Kepedulian Kami</h6>
                            <div class="row">
                                <div class="col">
                                    <p>Inovasi Pesawat</p>
                                    <p>Teknologi Terdepan</p>
                                    <p>Optimalkan Kinerja</p>
                                    <p>Pemantauan Pesawat</p>
                                </div>
                                <div class="col">
                                    <p>Navigasi Efisien</p>
                                    <p>Perawatan Pesawat</p>
                                    <p>Manajemen Logistik</p>
                                    <p>Pusat Komando</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Hubungi Kami</h6>
                            <p>
                                Jl. Penerbangan No. 123<br>
                                Kota Jakarta<br>
                                Indonesia
                            </p>
                            <p>Email: info@skyhub.co.id</p>
                        </div>
                    </div>	
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Layanan Unggulan</h6>
                            <p>
                                Nikmati layanan eksklusif kami:<br>
                                - Check-in online<br>
                                - Pemesanan makanan khusus<br>
                                - Hiburan di pesawat
                            </p>
                        </div>
                    </div>										
                </div>

                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> SKYHUB INDONESIA | Website with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">SKYHUB</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- akhir footer Area -->	

        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>			
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
         <script src="js/jquery-ui.js"></script>					
          <script src="js/easing.min.js"></script>			
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.min.js"></script>	
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>						
        <script src="js/jquery.nice-select.min.js"></script>					
        <script src="js/owl.carousel.min.js"></script>							
        <script src="js/mail-script.js"></script>	
        <script src="js/main.js"></script>	
    </body>
</html>