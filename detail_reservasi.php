<!DOCTYPE HTML>
<html>
    <style>
        .bubu {
      background:  #ffba5a;
    border: 2px solid transparent; 
  color: white;
    margin-left: 70%;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-right: 20px;
  padding-left: 20px;
  border-radius: 40px; 
cursor: pointer;}
    .bubu:hover {
      border: 2px solid transparent;
      background: #da8b1d;
      color: #fff; }
  .bubu:focus{
    border: 2px #da8b1d;
      background: #da8b1d;
      color: #fff;
  }
    </style>
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
    header("location:index.php?pesan=belum_login");
 
  }
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
            <h1 class="heading mb-3">Detail Reservation</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="tampilan_awal.php">Home</a></li>
              <li>&bullet;</li>
              <li>Detail Reservation</li>
            </ul>
          </div>
        </div>
      </div>

      
    </section>

    <?php
  include "config.php";
 
$username = $_SESSION['username'];
$kd_reservasi = $_GET['kd_reservasi'];
$data = mysqli_query($koneksi,"SELECT * FROM tb_reservasi JOIN tb_tamu ON tb_reservasi.id_user=tb_tamu.id_user JOIN tb_tipekamar ON tb_reservasi.id_kamar=tb_tipekamar.id_kamar WHERE kd_reservasi='$kd_reservasi'");
  $row = mysqli_fetch_array($data);
// echo "$kd_reservasi"; die();
?>

    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
         <form action="bayar.php" method="POST" class="bg-white">
            <div class="row">
             <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">   
              <div class="col-md-12 ml-center contact-info">
                <p align="center"><span class="text-black"> DETAILS RESERVATION</span></p>
                <p align="center"><span class="d-block">Re-Check Your Identity</span></p>
              </div>
            </div>
          </div>
          <div class="col-md-7 order-md-last">
        <ul class="list-group mb-8">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">BCA</h6>
              <small class="text-muted">0202022921093404</small>
            </div>
           
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Mandiri</h6>
              <small class="text-muted">839483974389743890</small>
            </div>
            
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Batas Waktu Pembayaran</h6>
              <small class="text-muted">839483974389743890</small>
            </div>
            
          </li>
        </ul>

      
      </div>

      <div class="col-md-7 col-lg-8">
       <h4 class="text-black font-weight-bold">Nomor Reservasi   : </h4><h4><br>#<?php echo $row['kd_reservasi'];?></h4>
       <h4 class="text-black font-weight-bold">Tanggal Reservasi : </h4><br><h4><?php echo $row['tgl_dipesan'];?></h4>
           <hr class="my-4">
               <label class="text-black font-weight-bold" for="credit">Nama Pemesan    : </label><br><?php echo $row['id_user'];?><br>
               <label class="text-black font-weight-bold" for="credit">Email           : </label><br><?php echo $row['email'];?><br>
               <label class="text-black font-weight-bold" for="credit">Waktu Check In :  </label><br><?php echo $row['check_in'];?> / Pukul: 23.00 WIB<br>
               <label class="text-black font-weight-bold" for="credit">Waktu Check Out : </label><br><?php echo $row['check_out'];?> / Pukul: 12.00 WIB<br>
               <label class="text-black font-weight-bold" for="credit">Lama Menginap : </label><br><?php echo $row['jml_hari'];?> Malam<br>
               <label class="text-black font-weight-bold" for="credit">Tipe Kamar  : </label><br><?php echo $row['tipe_kamar'];?><br>
               <label class="text-black font-weight-bold" for="credit">Jumlah Kamar : </label><br><?php echo $row['jml_kamar'];?><br>
               <label class="text-black font-weight-bold" for="credit">Total Bayar : </label><br><?php echo $row['total'];?><br>
</hr>
          </div>
          <div class="col-md-7 col-lg-8">
          <button class="bubu" type="submit"><a style="color: white;" href="bayar.php?kd_reservasi=<?=$row['kd_reservasi'];?>">Pembayaran</a></button>
          </div>
          <br>
          
          <div class="col-md-7 col-lg-8">
          <a class="bubu" href="cetak.php?kd_reservasi=<?=$row['kd_reservasi'];?>">Save/Print</a></div>
        </form>
          
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