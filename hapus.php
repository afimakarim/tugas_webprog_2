<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<br>
	<div class="container">
		<?php
			include "koneksi.php";

			$koneksiObj = new koneksi();
			$koneksi = $koneksiObj->getKoneksi();
			


			if($koneksi->connect_error) {
				echo "gagal koneksi : ".$koneksi->connect_error;
			}else {
				echo "";
			}

			$qry = "delete from data where id=" . $_GET["id"];

			if($koneksi->query($qry) === true) {
				echo "<h5 class='text-secondary text-uppercase mb-0'>Data  Berhasil Dihapus</h5>";
			}else {
				echo "<h5 class='text-secondary text-uppercase mb-0'> Data Gagal Dihapus</h5>";
			}

			$koneksi->close();
		?>
		<br>
		<a class="btn btn-success" href="index.php"> Lihat Data </a>
	</div>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
