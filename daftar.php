<!doctype html>
<html lang="en">
<style>
body{
	overflow-x: hidden;
	display: grid;
	justify-content: center;
	align-items: center;
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
.cntnr-right{
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
padding-left: 20px;
padding-right: 20px;
}
.cntnr-right. input{
justify-content: center;
flex-direction: column;
}
  td{
	  padding: 5px;
  }
  .bubu {
      background:  #f0971c;
    border: 2px solid transparent; 
	color: white;
    margin-left: 70%;
  padding-top: 5px;
  padding-bottom: 5px;
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

.reg{
    color: #f0971c;
}
.reg:hover{
      background: #f0971c;
      color: #fff;
	  border: none;
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
        <link rel="icon" href="bahan/logo4.png">
    </head>
    <?php

	// menghubungkan dengan koneksi database
	include 'config.php';
 
	// mengambil data tamu dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT  max(id_user) as id_user FROM tb_tamu");
	$data = mysqli_fetch_array($query);
	$id_user = $data['id_user'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id_user, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "TM";
	$id_user = $huruf . sprintf("%03s", $urutan);
	?>

<body>
	<?php 
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "gagal"){
		echo "Data tidak tersimpan dan tidak terdaftar";
	}
}
?>
	</br>
		<div class="cntnr-right">
		<h2>Hello!</h2>
		<p class="mb-12">Login or signup for better experience</p>
		<form method="post" action="aksidaftar.php">
        <div class="input">
			<table border=0>
			<tr>
				<td><input type="hidden" name="id_user" required="required" value="<?php echo $id_user ?>" readonly></td>
</tr>
			<tr>	
			<td><label for="Username">Username</label></td>
			<td><label for="no_telp">No Telp</label></td>
		</tr>
			<tr>	
				<td><input type="text" class="form-control" name="username" required></td>
			
				<td><input type="tel" class="form-control" name="no_telp" required></td>
			</tr>
			<tr>
			<td><label for="Email">Email</label></td>	
			<td><label for="password">Password</label></td>
		</tr>
			<tr>
			<td><input type="email" class="form-control" name="email" required></td>
				<td><input type="password" class="form-control" name="password" required></td>
			</tr>
			
			<tr>
				<td><label for="address">Alamat</label></td>
				<td><label for="provinsi">Provinsi</label></td>
			</tr>
			<tr>
				<td><textarea type="text" class="form-control" name="alamat" required></textarea></td>
				<td><select name="provinsi" class="form-control">
					<option value="P00"></option>
                      <option value="Jawa Barat">Jawa Barat</option>
                      <option value="Jawa Tengah">Jawa Tengah</option>
                      <option value="Jawa Timur">Jawa Timur</option>
                    </select></td>
			</tr>
			<tr>
				<td><label for="kabkot">Kota/Kabupaten</label></td>
				<td><label for="kec">Kecamatan</label></td>
			</tr>
			<tr>
				<td><select name="kabkot" class="form-control">
					<option value="KK00"></option>
                      <option value="Cimahi">Cimahi</option>
                      <option value="Bandung Barat">Bandung Barat</option>
                      <option value="Bogor">Bogor</option>
                    </select></td>
				<td><select name="kec" class="form-control">
					 <option value="K00"></option>
                      <option value="Cihampelas">Cihampelas</option>
                      <option value="Batujajar">Batujajar</option>
                      <option value="Saguling">Saguling</option>
                    </select></td>
			</tr>
			<br>
				<tr>
				<td></td>
				<tr>
				<td></td></tr>
				<tr>
					<td></td>
					<tr>
					<td></td></tr>
				<tr>
				<td><button type="submit" class="bubu text-white px-5">Create</button></td>
            </tr>
				<tr>
					<td></td>
					<tr>
					<td></td></tr>
			</table></form></div>
				<p class="mb-4" align="center">Have Account?<a href="login.php" class="reg">Login</a></p>
			</div>
			<br>
		
	</div></div>
	</div>
</body>
	</html>