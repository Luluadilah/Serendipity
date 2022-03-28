<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Serendipity Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="bahan/logo4.png">
  </head>
  <body>

  <?php 
	session_start();
    
	if($_SESSION['status']!="login"){
		header("location:login.php?pesan=belum_login");
 
	}
?>

  <?php
  include "config.php";
 
$username = $_SESSION['username'];
$kd_reservasi = $_GET['kd_reservasi'];
$data = mysqli_query($koneksi,"SELECT * FROM tb_reservasi JOIN tb_tamu ON tb_reservasi.id_user=tb_tamu.id_user JOIN tb_tipekamar ON tb_reservasi.id_kamar=tb_tipekamar.id_kamar WHERE kd_reservasi='$kd_reservasi'");
	$row = mysqli_fetch_array($data);


    	// mengambil data tamu dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT max(kd_bayar) as kd_bayar FROM tb_pembayaran");
	$data_bayar = mysqli_fetch_array($query);
	$kd_bayar = $data_bayar['kd_bayar'];
 
	$urutan = (int) substr($kd_bayar, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "BYR";
	$kd_bayar = $huruf . sprintf("%03s", $urutan);
?>

    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="tampilan_tamu.php">Serendipity Hotel</a></div>
          <div class="col-6 col-lg-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li><a href="tampilan_tamu.php">Home</a></li>
                        <li><a href="rooms.php">Rooms</a></li>
                        <li class="active"><a href="reservation.php">Reservation</a></li>
                        <li><a href="logout.php">Logout</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(bahan/33.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Payment</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="tampilan_awal.php">Home</a></li>
              <li>&bullet;</li>
              <li>Payment</li>
            </ul>
          </div>
        </div>
      </div>

      
    </section>
    <!-- END section -->

    <section class="section contact-section" id="next">

      <div class="container">
        <div class="row">
        <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-12 ml-center contact-info">
                <p align="center"><span class="text-black"> PAYMENT</span></p>
                <p align="center"><span class="d-block">Upload your payment proof to check in the room</span></p>
              </div>
            </div>
          </div>

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
          

            <form action="aksibayar.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="kd_reservasi">Reservation Code</label>
                  <input type="text" class="form-control" id="cc-name" name="kd_reservasi" value="<?=$row['kd_reservasi'];?>" readonly>
              <input type="hidden" class="form-control"  name="tanggal_bayar" value="<?php echo date("Y-m-d"); ?>">
              <input type="hidden" class="form-control"  name="kd_bayar" value="<?php echo $kd_bayar;?>">
                </div>
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="username">Name</label>
                  <input type="text" class="form-control" id="cc-name" name="username" value="<?=$row['username'];?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="nama_rekening">Bank Account Name</label>
                  <input type="text" class="form-control" id="cc-number" name="nama_rekening" required>
                </div>
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="nomor_rekening">Bank Account Number</label>
                  <input type="text" class="form-control" id="cc-expiration" name="nomor_rekening"  required>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="bukti_bayar">Payment Proof</label>
                  <input type="file" class="form-control bubu" id="cc-cvv" name="bukti_bayar" required>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-12 md-12 ml-center form-group">
                  <input type="submit" value="Finish" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                  
                </div>
              </div>
            </form>

          </div>
          
        </div>
      </div>
    </section>

    
    <section class="section bg-image overlay" style="background-image: url('bahan/33.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">Reserve Now!</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="reservation.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
            </div>
          </div>
        </div>
      </section>

      <footer class="section footer-section">
        <div class="container">
          <div class="row mb-4">
            <div class="col-md-3 mb-5">
              <ul class="list-unstyled link">
                <li><img src="bahan/map.png" width="150px"></li>
                <li><a href="tampilan_tamu.php">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
               <li><a href="reservation.php">Reservation</a></li>
              </ul>
            </div>
            <div class="col-md-3 mb-5">
              <ul class="list-unstyled link">
                <li><img src="bahan/our.png" width="150px"></li>
              <li><a href="single-rooms.php">Standard Room</a></li>
                <li><a href="single-rooms.php">Deluxe Room</a></li>
                <li><a href="single-rooms.php">Suite Room</a></li>
              </ul>
            </div>
            <div class="col-md-3 mb-5 pr-md-5 contact-info">
              <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
              <p><span class="d-block"></span><img src="bahan/contact.png" width="150px">
              <p><span class="d-block"></span> <span> Oia, Santorino 84702<br> Greece</span></p>
              <p><span class="d-block"></span> <span> +62 895 352 367 400</span></p>
              <p><span class="d-block"></span> <span> Serendipity@gmail.com</span></p>
            </div>
            <div class="col-md-3 mb-5 pr-md-5 contact-info">
             <img src="bahan/logo3.png" width="250px">
             </div>
            <p class="col-md-6 text-right social">
              <a href="#"><span class="fa fa-facebook"></span></a>
              <a href="#"><span class="fa fa-twitter"></span></a>
              <a href="#"><span class="fa fa-instagram"></span></a>
            </p>
          </div>
        </div>
      </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
  </body>
</html>