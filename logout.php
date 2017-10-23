<?php 
session_start();
echo "iyaaa";

if (empty($_SESSION['username'])) {
	echo("Anda Belum Login ! ");
	header('location:login.php');
	return true;
}else
{
	echo "selamat anda berhasil logout" ;
	session_destroy();
	//header('location:login.html');
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Logout . . .</title>
 </head>
 <body>
 	<h1>Selamat Anda Berhasil Logout . . .</h1>
 	<script>self.location="login.php";</script>
 </body>
 </html>

