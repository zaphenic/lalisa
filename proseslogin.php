<?php
session_start();


if (!isset($_POST['username']))
{
	header("location:login.php");
}else
{
	$username = $_POST['username'];
}

if (!empty($username))
{
	$_SESSION['username'] = $username;
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login . . .</title>
</head>
<body>
	<h1>Selamat anda berhasil login</h1>
	<h1><?php echo  $_SESSION['username']; ?><h1>

	<script>
		self.location="HomePage.php";
	</script>

</body>
</html>
