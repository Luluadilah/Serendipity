<!doctype html>
<html lang="en">
<style>
body{
	overflow-x: hidden;
	display: flex;
	justify-content: left;
	align-items: center;
	height: 100vh;
	background-color: #fff;
}

p{
	justify-content: center;
	align-items: center;
	font-size: 1em;
	padding: 0;
	margin: 0;
}
.cntnr{
width: 100%;
overflow: hidden;
}
.cntnr-left{
justify-content: left;
align-items: left;
flex-direction: column;
background-color: white;
}
.cntnr-left img{
width: 100%;
}
.cntnr-right{
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
padding-left: 50px;
padding-right: 60px;
}
.cntnr-right. input{
justify-content: center;
flex-direction: column;
}
  td{
	  padding: 5px;
  }
  .bubu {
      background: white;
    border: 2px solid rgb(209, 209, 209); 
	color: rgb(165, 165, 165);
    margin-left: 25%;
  padding-left: 30px;
  padding-right: 30px;
  padding-top: 5px;
  padding-bottom: 5px;
  border-radius: 40px; 
cursor: pointer;}
    .bubu:hover {
      border: 2px solid transparent;
      background: #f0971c;
      color: #fff; }
	.bubu:focus{
		border: 2px #f0971c;
      background: #f0971c;
      color: #fff;
	}

.reg{
    color: #f0971c;
	cursor: pointer;
}
.reg:hover{
      background: #f0971c;
      color: #fff;
	  border: none;
}
.alert{
	background: #e44e4e;
	color: white;
	padding: 10px;
	text-align: center;
	border:1px solid #b32929;
}



</style>
 <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Serendipity Hotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
		<link rel="icon" href="../bahan/logo4.png">
    </head>
    <body>
		
		<div class="cntnr-left img">
		<img src="bahan/37.jpg">
		</div>
	
		<div class="cntnr-right">
		</br></br></br>
		<h2>Welcome!</h2>
		<p class="mb-4">Login or signup for better experience</p>
		<form method="post" action="aksilogin.php">
			<div class="input">
			<table border=0>
			<tr>
				<td><label for="Username">Username</label></td>
				<td><input type="text" class="form-control" name="username"></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" class="form-control" name="password"></td></tr><br>
				<tr>
				<td></td>
				<tr>
				<td></td></tr>
				<tr>
					<td></td>
					<tr>
					<td></td></tr>
				<tr>
				<td></td>
				<td><button type="submit" class="bubu">Login</button></td></tr>
				<tr>
					<td></td>
					<tr>
					<td></td></tr></div>
			</table></form>
				<p class="mb-4" align="center">Don't Have Account?<a href="daftar.php" class="reg"> Create Account</a></p>
				<br><br>
				
				<p class="mb-4" align="center">You Just Wanna See? <br><a href="index.php" type="submit" class="reg">Guest Mode</a></p>
			</div>
			<br>
			<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
	</div></div>
	</div>
	
	</html>