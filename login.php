<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="./jquery/jquery.mobile-1.4.5.css">
	<script type="text/javascript" src="./jquery/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./jquery/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<div data-role="page" id="login" data-theme="a">

		<!-- awal header -->
		<div data-role="header">
			<h1>Login Page</h1>
		</div>
		<!-- akhir heeader -->

		<!-- awal content -->
		<div data-role="main" class="ui-content">
			<form id="frmLogin" method="POST" action="proseslogin.php">
				<div class="ui-field-contain">
					<label>
						Masukan Username anda
					</label>
						<input type="text" name="username" placeholder="username..." minlength="3" required data-clear-btn="true">
					<label data-rel="popup">
						I Agree to the Terms and Conditions
						<input type="checkbox" name="persetujuan" value="setuju" required>
					</label>
					<input data-role="button" type="submit" value="Login">
					
				</div>
			</form>
			
			<script>
				function validasi(form)
				{
					if (!form.persetujuan.checked)
					{
						console.log("lewat sini kok");
						alert("‘I Agree to the Terms and Conditions’ Must be checked");					
						return false;
					}
					console.log("lewat");
					return true;
				}		
			</script>
	
		</div>
		<!-- akhir content -->

		<!-- awal footer -->
		<div data-role="footer">
			<h1>By Briant</h1>
		</div>
		<!-- akhir footer -->

	</div>


	
</body>
</html>





<!-- var form = $('#frmLogin');
		form.submit(function(event){
			var username = this.username.value;

			if (username == '') {
				alert('dorrr')
			}else{
				return true;
			}

			return false;
		}); -->