<?php
include 'koneksi.php';

$id = $_GET['id'];

// memastikan ID adalah bilangan bulat positif
if (!is_numeric($id) || $id <= 0) {
    echo "Invalid ID";
    exit;
}

// mengambil data pemesanan dari query berdasarkan ID
$sql = "SELECT * FROM pemesanan WHERE id = $id";
$result = $connect->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $no_telp = $row['no_telp'];
    $tgl_pesan = $row['tgl_pesan'];
    $tgl_berangkat = $row['tgl_berangkat'];
    $tujuan = $row['tujuan'];
    $jumlah_penumpang = $row['jumlah_penumpang'];
    $kelas = $row['kelas'];
} else {
    echo "Data not found";
}

$connect->close();
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
        <!--CSS-->
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
                  </nav><!-- #nav-menu-container -->					      		  
                </div>
            </div>
        </header><!-- #header -->
        
          
        <!-- mulai banner Area -->
        <section class="about-banner relative">
            <div class="overlay overlay-bg"></div>
            <div class="container">				
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Display Data Pemesan			
                        </h1>	
                        <p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="display_data.php"> Display</a></p>
                    </div>	
                </div>
            </div>
        </section>
        <!-- akhir banner Area -->	
        
        <!-- mulai Detail Pemesan -->
        <section class="price-area section-gap">
            <div class="container">
                <div class="section-top-border">
                    <h3 class="mb-30" id="pemesanan-title">Detail Pemesanan</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <blockquote class="generic-blockquote">
                                <p>Nama: <?php echo $nama; ?></p>
                                <p>Alamat: <?php echo $alamat; ?></p>
                                <p>No. Telp: <?php echo $no_telp; ?></p>
                                <p>Tanggal Pesan: <?php echo $tgl_pesan; ?></p>
                                <p>Tanggal Berangkat: <?php echo $tgl_berangkat; ?></p>
                                <p>Tujuan: <?php echo $tujuan; ?></p>
                                <p>Jumlah Penumpang: <?php echo $jumlah_penumpang; ?></p>
                                <p>Kelas: <?php echo $kelas; ?></p>
                                
                                <!-- Add Delete Button -->
                                <form method="post" action="delete_process.php">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <br>
                                <!-- Add Cetak Button -->
                                <form method="post" action="cetak.php">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-danger">Cetak</button>
                                </form>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- akhir Detail Pemesan -->

        <!-- mulai Update Form -->
        <section class="price-area section-gap">
            <div class="container">
                <div class="section-top-border">
                    <h3 class="mb-30" id="pemesanan-title">Update Detail Pemesanan</h3>
                    <form method="post" action="update_process.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No. Telp:</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $no_telp; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_pesan">Tanggal Pesan:</label>
                                    <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" value="<?php echo $tgl_pesan; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_berangkat">Tanggal Berangkat:</label>
                                    <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" value="<?php echo $tgl_berangkat; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan">Tujuan:</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_penumpang">Jumlah Penumpang:</label>
                                    <input type="number" class="form-control" id="jumlah_penumpang" name="jumlah_penumpang" value="<?php echo $jumlah_penumpang; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas:</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $kelas; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- akhir Update Form -->

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