<?php 
session_start();
if (empty($_SESSION['username'])) {
	header("location:login.php");
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="./jquery/jquery.mobile-1.4.5.css">
	<script type="text/javascript" src="./jquery/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./jquery/jquery.mobile-1.4.5.min.js"></script>

</head>

<body>
<!-- HALAMAN UTAMA -->
	<div data-role="page" data-theme="a" id="halaman-utama">
		<!-- mulai header -->
		<div align="center">
			<p>Selamat datang <?php echo $_SESSION['username'];?></p>
		</div>
		<div data-role="header">
			<a href="#halaman-cari" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Find Book</a>
			<h2>Hompage</h2>
			<a href="logout.php" class="ui-btn ui-corner-all ui-shadow ui-icon-star ui-btn-icon-left">Logout</a>

		</div>
		<!-- akhri header -->

		<!-- awal content -->
		<div data-role="main" class="ui-content">
			<!-- ambil table -->
			<table border="100" data-role="table" class="ui-responsive ui-shadow">
				<thead id="th_hompage"></thead>
				<tbody id="data_homepage"></tbody>
			</table>
			<!-- akhir table -->
		</div>
		<!-- akhir Content -->

		<div data-role="footer">
			<h2>By 2001584401 - MAT 2020</h2>
		</div>

	</div>
<!-- AKHIR HALAMAN UTAMA -->


<!-- AWAL HALAMAN CARI -->
	<div data-role="page" data-theme="a" id="halaman-cari">
		<!-- mulai header -->
		<div align="center">
			<p>Selamat datang <?php echo $_SESSION['username'];?></p>
		</div>
		<div data-role="header">
			<a href="homepage.php#halaman-utama" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Home</a>
			<h2>Find Book</h2>

			<a href="homepage.php#halaman-peminjaman" class="ui-btn ui-corner-all ui-shadow ui-icon-star ui-btn-icon-left">Peminjaman</a>
		</div>
		<!-- akhri header -->

		<!-- awal content -->
		<div data-role="main" class="ui-content" id="cari-judul">
			<p>Cari Buku By Title</p>
			<form id="frmCari">
				<input id="search" data-type="search" placeholder="Cari Buku...">
				<button>cari</button>
			</form>
			<table id="tablecari"></table>
			<table data-role="table" class="ui-responsive ui-shadow" border="5">
				<thead>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Author</th>
						<th>Genre</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody id="data_findpage">
				</tbody>
			</table>
		</div>
		<!-- akhir Content -->

		<div data-role="footer">
			<h1>By 2001584401 - MAT 2020</h1>
		</div>

	</div>
<!-- AKIR HALAMAN CARI -->


<!-- HALAMAN PEMINJAMAN -->
	<div data-role="page" data-theme="a" id="halaman-peminjaman">
		<!-- mulai header -->
		<div align="center">
			<p>Selamat datang <?php echo $_SESSION['username'];?></p>
		</div>
		<div data-role="header">
			<a href="#halaman-cari" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Find Book</a>
			<h2>Peminjaman</h2>
			<a href="homepage.php#halaman-utama" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Home</a>

		</div>
		<!-- akhri header -->

		<!-- awal content -->
		<div data-role="main" class="ui-content" align="center">
			<h2 style="color: blue;">Peminjaman Buku</h2>
			<h3>Tidak ada buku yang dipinjam</h3>
		</div>
		<!-- akhir Content -->

		<div data-role="footer">
			<h2>By 2001584401 - MAT 2020</h2>
		</div>

	</div>
<!-- AKHIR HALAMAN UTAMA -->

</body>
</html>

<script>

	$.get('api.php')
	.then (function(result)
	{
		var th_hompage = $('#th_hompage')
		var data_homepage = $('#data_homepage');
		th_hompage.append(`
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Author</th>
						<th>Genre</th>
						<th>Borrow</th>
					</tr>
			`)

		for (var i in result.books)
		{
			var buku = result.books[i];
			var no = ++i;

			data_homepage.append(`
				<tr>
					<td>${(no)}</td>
					<td>${buku.title}</td>
					<td>${buku.author}</td>
					<td>${buku.genre}</td>
					<td><button>Borrow</button></td>
				</tr>`);
		}
	});
</script>

<script>
	var hasil_findpage = $('#data_findpage');

	$.get('api.php')
	.then (function(result)
	{
		for (var i in result.books)
		{
			var buku = result.books[i];
			var no = ++i;

			// jauh +="<tr>";
			// jauh +=		"<td>"+no+"</td>";
			// jauh +=		"<td>"+buku.title+"</td>";
			// jauh +=		"<td>"+buku.author+"</td>";
			// jauh +=		"<td>"+buku.genre+"</td>";
			// jauh +="<tr>";

			hasil_findpage.append(`
				<tr>
					<td>${(no)}</td>
					<td>${buku.title}</td>
					<td>${buku.author}</td>
					<td>${buku.genre}</td>
					<td><button>Borrow</button></td>
				</tr>`);
		}
		// document.getElementById("jauh").innerHTML = jauh;
	});

			var formSearch = $('#frmCari');

		formSearch.submit(function(event) {
			//hasil_findpage.remove();
			hasil_findpage.html("");
			event.preventDefault();
			$.get('prosesfind.php?q=' + event.target.search.value)
			.then(function(result) {
				for (var i in result.books)
		{
			var buku = result.books[i];
			var no = ++i;

			hasil_findpage.append(`
				<tr>
					<td>${(no)}</td>
					<td>${buku.title}</td>
					<td>${buku.author}</td>
					<td>${buku.genre}</td>
					<td><button>Borrow</button></td>
				</tr>`);
		}
			});
		});


			// .then(function(result) {
			// 	for (var i = 0; i < result.length; i++)

			// 	{
			// 		var buku = result.books[i];
			// 		$('#table').append(`<tr>
			// 		<td>${buku.title}</td>
			// 		<td>${buku.author}</td>
			// 		<td>${buku.genre}</td>
			// 		<td><button>Borrow</button></td>
			// 	</tr>`);
			// 	}
			// });
	
</script>