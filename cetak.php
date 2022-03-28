<!DOCTYPE HTML>
<html>
    <style>
        .bubu {
      background:  #f0971c;
    border: 2px solid transparent; 
  color: white;
    margin-left: 70%;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-right: 15px;
  padding-left: 15px;
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

<?php
  include "config.php";
 
$username = $_SESSION['username'];
$kd_reservasi = $_GET['kd_reservasi'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_reservasi JOIN tb_tamu ON tb_reservasi.id_user=tb_tamu.id_user JOIN tb_tipekamar ON tb_reservasi.id_kamar=tb_tipekamar.id_kamar WHERE kd_reservasi='$kd_reservasi'");
  $row = mysqli_fetch_array($data);
// echo "$kd_reservasi"; die();
?>
 <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
         <form action="bayar.php" method="POST" class="bg-white p-md-10 p-8 mb-10">
            <div class="row">
             <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">   
              <div class="col-md-12  contact-info">
                <p align="center"><span class="text-black"> DETAILS RESERVATION</span></p>
                <p align="center"><span class="d-block">Print or Save Details Reservation For archieve</span></p>
              </div>
            </div>
          </div>
<br>      <div class="col-md-7 col-lg-8">
           <hr class="my-4">
               <label class="text-black font-weight-bold" for="credit">Nama Pemesan    : </label><br><?php echo $row['id_user'];?><br><br>
               <label class="text-black font-weight-bold" for="credit">Email           : </label><br><?php echo $row['email'];?><br><br>
               <label class="text-black font-weight-bold" for="credit">Waktu Check In :  </label><br><?php echo $row['check_in'];?> / Pukul: 23.00 WIB<br><br>
               <label class="text-black font-weight-bold" for="credit">Waktu Check Out : </label><br><?php echo $row['check_out'];?> / Pukul: 12.00 WIB<br><br>
               <label class="text-black font-weight-bold" for="credit">Lama Menginap : </label><br><?php echo $row['jml_hari'];?> Malam<br><br>
               <label class="text-black font-weight-bold" for="credit">Tipe Kamar  : </label><br><?php echo $row['tipe_kamar'];?><br><br>
               <label class="text-black font-weight-bold" for="credit">Jumlah Kamar : </label><br><?php echo $row['jml_kamar'];?><br><br>
               <label class="text-black font-weight-bold" for="credit">Total Bayar : </label><br><?php echo $row['total'];?><br><br>
</hr>

<button class="bubu" type="submit"><a style="color: white;" href="bayar.php?kd_reservasi=<?=$row['kd_reservasi'];?>">Pembayaran</a></button>

          </div>
          </form>
        </div>
      </div>
    </section>
<script>
  window.print();
</script>
        
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