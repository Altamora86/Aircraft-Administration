<?php
require_once 'koneksi.php'; 

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <meta charset="UTF-8">

        <title><?php echo (isset($_SESSION['is_login']) || isset($_COOKIE['_logged']) ? 'Beranda | '.$_SESSION['is_login'] : 'Beranda'); ?></title>

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
        </header><!-- #header -->
			
			<!-- mulai banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h6 class="text-white">Pesan Tiket Pesawat Sekarang</h6>
							<h1 class="text-white">SKYHUB INDONESIA</h1>
							<p class="text-white">
								Untuk sementara kami hanya melayani keberangkatan menuju Kota Surabaya dari Kota Jakarta atau sebaliknya. Mohon maaf atas keterbatasannya.
							</p>
							<a href="service.php" class="primary-btn text-uppercase">Pesan Sekarang</a>
						</div>
						<div class="col-lg-4 col-md-6 banner-right">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="ekonomi-tab" data-toggle="tab" href="#ekonomi" role="tab" aria-controls="ekonomi" aria-selected="true">Ekonomi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bisnis-tab" data-toggle="tab" href="#bisnis" role="tab" aria-controls="bisnis" aria-selected="false">Bisnis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="first-class-tab" data-toggle="tab" href="#first-class" role="tab" aria-controls="first-class" aria-selected="false">First Class</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="ekonomi" role="tabpanel" aria-labelledby="ekonomi-tab">
                                    <form class="form-wrap">
                                        <p>Kelas Ekonomi merupakan opsi perjalanan yang terjangkau dan sesuai untuk penumpang yang mengutamakan efisiensi biaya. Dalam kelas ini, penumpang dapat menikmati perjalanan dengan kenyamanan yang memadai, meskipun dengan fasilitas yang lebih sederhana dibandingkan kelas-kelas yang lebih tinggi. Biasanya, kelas Ekonomi menawarkan pilihan kursi yang lebih padat dengan ruang kaki yang standar, tetapi tetap memberikan pengalaman perjalanan udara yang aman dan efisien.</p>
                                        <!-- Include your flight search inputs here -->
                                        <a href="about.php#ekonomi-section" class="primary-btn text-uppercase">Search Ekonomi Class</a>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="bisnis" role="tabpanel" aria-labelledby="bisnis-tab">
                                    <form class="form-wrap">
                                        <p>Kelas Bisnis memberikan tingkat kenyamanan yang lebih tinggi dengan fasilitas yang lebih mewah. Penumpang kelas Bisnis dapat menikmati kursi yang lebih lebar, ruang kaki yang lebih besar, serta layanan makanan dan minuman yang lebih baik. Beberapa maskapai juga menyediakan fasilitas tambahan, seperti akses ke ruang tunggu bandara eksklusif dan prioritas saat check-in, memberikan pengalaman perjalanan yang lebih santai dan berkelas.</p>
                                        <!-- Include your hotel search inputs here -->
                                        <a href="about.php#bisnis-section" class="primary-btn text-uppercase">Search Bisnis Class</a>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="first-class" role="tabpanel" aria-labelledby="first-class-tab">
                                    <form class="form-wrap">
                                        <p>Kelas First Class adalah pilihan teratas yang menawarkan pengalaman perjalanan yang sangat mewah dan eksklusif. Penumpang kelas ini dapat menikmati kursi yang dapat diubah menjadi tempat tidur, layanan makanan kelas atas, dan fasilitas lainnya yang dirancang untuk memberikan kenyamanan tertinggi. Akses ke ruang tunggu VIP, prioritas dalam proses boarding, dan pelayanan khusus membuat perjalanan dengan kelas First Class menjadi pengalaman yang tak terlupakan, sesuai bagi mereka yang mencari kemewahan dan layanan prima dalam perjalanan udara.</p>
                                        <!-- Include your holiday search inputs here -->
                                        <a href="about.php#firstclass-section" class="primary-btn text-uppercase">Search First Class</a>
                                    </form>
                                </div>
                            </div>
                        </div>

					</div>
				</div>					
			</section>
			<!-- akhir banner Area -->
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