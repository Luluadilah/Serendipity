<?php
//mengaktifkan session
session_start();

//menghubungkan koneksi database
include 'config.php';

//menangkap data
$username=$_POST['username'];
$password=md5($_POST['password']);

//menyeleksi data tamu
$data=mysqli_query($koneksi,"select * from tb_tamu where username='$username' and password='$password'");

//menghitung jumlah data yang ditemukan
$cek=mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status']="login";
	header("location:tampilan_tamu.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>