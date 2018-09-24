<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<br>
<h2>Edit Data </h2>
	<hr>
	<?php
		include('koneksi.php');

		if($_GET['id']!=null){
			$nama = $_GET['id'];

			$koneksiObj = new Koneksi();
			$koneksi = $koneksiObj->getKoneksi();

			if($koneksi->connect_error){
				echo "Gagal Koneksi : ". $koneksi->connect_error;
			}

			$query = "select * from data";
			$data = $koneksi->query($query);

		}
	?>

	<?php
        if($data->num_rows <= 0){
            echo "Data tidak ditemukan";
        } else{
            while($row = $data->fetch_assoc()){
			$id    = $row['id'];
			$nama 	= $row['nama'];
			$username   = $row['username'];
			$password   = $row['password'];
			$email = $row['email'];
            }
        }
    ?>
	
    <div class="panel-body">
		<form action = "update.php" method="post">
			<input type="hidden" id="id" name="id" value=""/>
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">NAMA</label>
				<div class="col-3">
					<input class="form-control" type="text" name="nama" id="nama" value="<?php echo $nama;?>" onkeydown="return testInput(event);" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">USERNAME</label>
				<div class="col-3">
					<input class="form-control" type="text" name="username" id="username" value="<?php echo $username;?>">
				</div>
			</div>
						
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">PASSWORD</label>
				<div class="col-3">
					<input class="form-control" type="password" name="password" id="password"  value="<?php echo $password;?>">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">EMAIL</label>
				<div class="col-3">
					<input class="form-control" type="email" name="email" id="email" value="<?php echo $email;?>">
				</div>
			</div>
			
			<input class="btn btn-primary" type="submit" value="Simpan">
		</form>
	</div>

	<script type="text/javascript">
		function testInput(event) {
			var value = String.fromCharCode(event.which);
			var pattern = new RegExp("[a-zA-Z \b]");
			return pattern.test(value);
		}
		function nospecial(event) {
			var value = String.fromCharCode(event.which);
			var pattern = new RegExp("[a-zA-Z0-9\b]");
			return pattern.test(value);
		}
	</script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>