<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<br>
<h2>Tambah Data </h2>
<hr>
   <div class="panel-body">

		<form method="post" action="proses.php">
			<input type="hidden" id="id" name="id" value=""/>
			<div class="form-group row">
				<label for="nim" class="col-sm-2 control-label">NAMA</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="nama" id="nama" placeholder="nama" onkeydown="return testInput(event);" required oninvalid="this.setCustomValidity('Nama tidak Boleh Kosong')" oninput="setCustomValidity('')" >
				</div> <p style="color:red">*<strong>Nama</strong> Hanya boleh menggunakan huruf dan spasi</p>
			</div>
			
			<div class="form-group row">
				<label for="nama" class="col-sm-2 control-label">USERNAME</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="username" id="username" placeholder="username" onkeydown="return nospecial(event);" required oninvalid="this.setCustomValidity('Username tidak Boleh Kosong')" oninput="setCustomValidity('')" >
				</div> <p style="color:red">*<strong>Username</strong> tidak boleh menggunakan spasi</p>
			</div>
			
			<div class="form-group row">
				<label for="alamat" class="col-sm-2 control-label">PASSWORD</label>
				<div class="col-sm-4">
					<input class="form-control" type="password" name="password" id="password" placeholder="password" required oninvalid="this.setCustomValidity('Password tidak Boleh Kosong')" oninput="setCustomValidity('')" >
				</div>
			</div>	
			
			<div class="form-group row">
				<label for="alamat" class="col-sm-2 control-label">EMAIL</label>
				<div class="col-sm-4">
					<input class="form-control" type="email" name="email" id="email" placeholder="example@mail.com" required oninvalid="this.setCustomValidity('format email salah')" oninput="setCustomValidity('')" >
				</div>
			</div>
		
			<input class="btn btn-danger" type="submit" value="Simpan">
			<input class="btn btn-warning" type="reset" value="Batal">
			<a href="index.php"> <button class="btn btn-success" type="button" value="Kembali">Kembali</button></a>
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