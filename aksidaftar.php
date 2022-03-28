<?php
//menghubungkan dengan koneksi database
include'config.php';

//menangkap data yang dikirim 
$id_user=$_POST['id_user'];
$username=$_POST['username'];
$email=$_POST['email'];
$no_telp=$_POST['no_telp'];
$password=md5($_POST['password']);
$alamat=$_POST['alamat'];
$provinsi=$_POST['provinsi'];
$kabkot=$_POST['kabkot'];
$kec=$_POST['kec'];
//menyimpan data tamu ke database
$data_tamu=mysqli_query($koneksi, "INSERT INTO tb_tamu(id_user, username, email, no_telp, password, alamat, provinsi, kabkot, kec)values('$id_user', '$username','$email','$no_telp','$password','$alamat', '$provinsi', '$kabkot', '$kec')");

if ($data_tamu){
	header("location:login.php");
}else{
	header("location:index.php?pesan=gagal");
} 
?>