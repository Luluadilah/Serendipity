<?php
            $username=$_POST['username'];
            $no_telp=$_POST['no_telp'];
            $email=$_POST['email'];
            $check_in=$_POST['check_in'];
            $check_out=$_POST['check_out'];
            $id_kamar=$_POST['id_kamar'];
            $jml_kamar=$_POST['jml_kamar'];
            session_start();
             if($_SESSION['status_reservasi']!="reservasi"){
                echo"Bukti Reservasi";
                echo "</br>" ;
                echo"Pengguna dengan nama ".$username;
                echo" telah melakukan pemesanan hotel pada tanggal hari ini untuk tanggal ".$check_in;
                echo" sampai tanggal ".$check_out;
            }
	?>
