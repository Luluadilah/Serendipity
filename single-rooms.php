<!DOCTYPE HTML>
<html>
<style>
    .pik{
      font-weight: bold;
    }
    .fas{
      line-height: 2;
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
                        <li class="active"><a href="tampilan_tamu.php">Home</a></li>
                        <li><a href="rooms.php">Rooms</a></li>
                        <li><a href="reservation.php">Reservation</a></li>
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
            <h1 class="heading mb-3">Detail Rooms</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Detail Rooms</li>
            </ul>
          </div>
        </div>
      </div>

      
    </section>
    <!-- END section -->

    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Great Offers</h2>
            <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
        <?php
         
          include "config.php";
          $data = mysqli_query($koneksi,"select * from tb_tipekamar");
        
        // $row = mysqli_fetch_array($data);
        while($row=mysqli_fetch_array($data)){
        //    echo $row['no']; die();
        //   ?>
        <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
          <a href="#" class="image d-block bg-image-2" style="background-image: url('bahan/50.jpg');"></a>
          <div class="text">
            <span class="d-block mb-3"><span class="display-3 text-primary"><?php echo $row['harga_kamar']?></span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4"><?php echo $row['tipe_kamar']?></h2>
            <div class="row mb-3">
            <div class="col-md-3 mb-4">
                <ul class="list-unstyled link">
                    <li><p data-aos="fade" class="pik">Facilities</p></li>
                  </ul>
                </div>
              <div class="col-md-3 mb-4">
                <ul class="list-unstyled link">
                <li><p data-aos="fade" class="fas"><?php echo $row['Fasilitas']?></p></li>
                  </ul>
                </div>
              <div class="col-md-2 mb-4">
                <ul class="list-unstyled link">
                    <li><p data-aos="fade" class="pik">Size</p></li>
                    <li><p data-aos="" class="pik">Beds</p></li>
                   <li><p data-aos="" class="pik">View</p></li>
                  </ul>
                </div>
                <div class="col-md-4 mb-4">
                  <ul class="list-unstyled link">
                    <li><p data-aos="fade">30 - 40 sq.m</p></li>
                    <li><p data-aos="fade">1 Queen Bed</p></li>
                    <li><p data-aos="fade">Sea</p></li>
                  </ul>
              </div>
            </div>
            <p><a class="btn btn-primary text-white" href="reservation.php?id_kamar=<?=$row['id_kamar']?>">Book Now</a></p>
</div>
 </div>
        </br></br></br></br>
            <?php
        }
        ?>
     
          
       
          </section>

    <section class="section bg-image overlay" style="background-image: url('bahan/33.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">Reserve Now!</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="single-rooms.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
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
              <li><a href="rooms.php">Standard Room</a></li>
                <li><a href="rooms.php">Deluxe Room</a></li>
                <li><a href="rooms.php">Suite Room</a></li>
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