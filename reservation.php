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

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">
    <link href="../assets/css/form-validation.css" rel="stylesheet">

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
  include 'config.php';
 
$username = $_SESSION['username'];
$id_kamar= $_GET['id_kamar'];
//mengambil data kamar
$data_kamar = mysqli_query($koneksi,"SELECT * FROM tb_tipekamar WHERE id_kamar='$id_kamar'");
	$kamar = mysqli_fetch_array($data_kamar);
  // echo "$k";

$data = mysqli_query($koneksi,"SELECT * FROM tb_tamu WHERE username='$username'");
	$row = mysqli_fetch_array($data);

 //$query = mysqli_query($koneksi,"select * from tb_reservasi JOIN tb_tamu ON tb_reservasi.id_user=tb_tamu.id_user JOIN tb_tipekamar ON tb_reservasi.id_kamar=tb_tipekamar.id_kamar where username='$username'");
 //$reservasi = mysqli_fetch_array($query);

	// mengambil data tamu dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT max(kd_reservasi) as kd_reservasi FROM tb_reservasi");
	$data = mysqli_fetch_array($query);
	$kd_reservasi = $data['kd_reservasi'];
 
	$urutan = (int) substr($kd_reservasi, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode reservsi baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "RSV";
	$kd_reservasi = $huruf . sprintf("%03s", $urutan);
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
            <h1 class="heading mb-3">Reservation Form</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="tampilan_awal.php">Home</a></li>
              <li>&bullet;</li>
              <li>Reservation</li>
            </ul>
          </div>
        </div>
      </div>

      
    </section>
    <!-- END section -->



    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="aksirsvp.php" method="post" class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-6 form-group">
                <label for="firstName" class="text-black font-weight-bold">Nama Lengkap</label>
              <input type="text" class="form-control" id="firstName" value="<?php echo $row['username'];?>" name="username" readonly>
              <input type="hidden" class="form-control"  name="kd_reservasi" value="<?php echo $kd_reservasi;?>">
              <input type="hidden" class="form-control"  name="id_user" value="<?php echo $row['id_user'];?>">
              <input type="hidden" class="form-control"  name="tgl_dipesan" value="<?php echo date("Y-m-d"); ?>">
              <input type="hidden" class="form-control"  name="id_kamar" value="<?php echo $kamar['id_kamar'];?>">
                </div>              
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="address">Address</label>
                  <textarea type="text" id="address" name="alamat" class="form-control" value="<?php echo $row['alamat']?>" readonly><?php echo $row['alamat']?></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="country">Date Check In</label>
                  <input type="date" name="check_in" class="form-control" id="countrymin="<?php echo date("Y-m-d"); ?>" required>
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="country">Date Check Out</label>
                  <input type="date" name="check_out" class="form-control" id="country" min="<?php echo date("Y-m-d"); ?>" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="room" class="font-weight-bold text-black">Room Type</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control" value="<?php echo $kamar['tipe_kamar'];?>" readonly>
                  </div>
                </div>

              <div class="col-md-6 form-group">
              <label for="username" class="text-black font-weight-bold">Harga Kamar</label>
              <div class="input-group has-validation">
              <input type="text" class="form-control" id="harga_kamar" name="harga_kamar" onkeyup="total()" value="<?php echo $kamar['harga_kamar'];?>" readonly>
              </div>
            </div>

                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="kamar">Jumlah Kamar</label>
                  <input type="number" name="jml_kamar" id="jml_kamar" class="form-control" min=1 max="<?php echo $kamar['jml_kamar'];?>"required>
              <div class="invalid-feedback">
                </div>
              </div>

              <div class="col-md-6 form-group">
              <label for="username" class="text-black font-weight-bold">Lama Menginap</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="jml_hari" name="jml_hari" onkeyup="total()" min=1 required>
              </div>
            </div>
              
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="zip">Total Cost</label>
                  <input type="text" class="form-control"  id="total" name="total">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Reserve Now" name="reservasi"class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                </div>
              </div>
            </form>

          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span> <span class="text-black"> Oia, Santorino 84702 Greece</span></p>
                <p><span class="d-block">Phone:</span> <span class="text-black"> (+62) 8953 5236 7400</span></p>
                <p><span class="d-block">Email:</span> <span class="text-black"> Serendipity@gmail.com</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

 <!--  -->

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

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/form-validation.js"></script>

    <script src="js/main.js"></script>
     <script>
function total() {
      var txtFirstNumberValue = document.getElementById('harga_kamar').value;
      var txtSecondNumberValue = document.getElementById('jml_hari').value;
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
</script>
  </body>
 
</html>