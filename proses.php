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
			require_once('koneksi.php');

			$koneksiObj = new Koneksi();
			$koneksi = $koneksiObj->getKoneksi();

			if($koneksi->connect_error){
				echo "Gagal Koneksi : ". $koneksi->connect_error;
			}
			$id    = $_POST['id'];
			$nama 	= $_POST['nama'];
			$username   = $_POST['username'];
			$password   = $_POST['password'];
			$email = $_POST['email'];

			if($nama=='' || $username=='' || $password=='' || $email==''){
				echo " isi form dengan lengkap<br>";
				echo '<a class="btn btn-warning" href="input.php">Kembali</a>';
			return;
			}

			$query = "insert into data values('$id','$nama','$username','$password','$email')";

			//echo "<br>".$query;

			if($koneksi->query($query) === true) {
				echo "Data Dengan Nama".$_POST["nama"]. " Berhasil Disimpan";
			}else{
				$koneksi->error;
				echo "Data Dengan Nama".$_POST["nama"]." Gagal Disimpan";
			}

			$koneksi->close();
		?>
		<br>
		<a class="btn btn-success" href="input.php"> kembali</a>
		<a class="btn btn-primary" href="index.php">Lihat Data</a>
	</div>
	
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
