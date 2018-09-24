<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>           
    <div class="row">
        <div class="container">
		<br>
            <h2>Aplikasi Data Mahasiswa</h2>
            <hr>
            <a href="input.php" class="btn btn-success">Tambah Data</a>
            <br><br>
			<table class="table table-striped table-bordered table-hover" id="tb-mahasiswa">
<?
//tabel yang terdiri dari kolom Nama, Username, Password, Email, Pilihan
?>			
				<thead>
					<tr>
						<th class="text-center">NAMA</th>
						<th class="text-center">USERNAME</th>
						<th class="text-center">PASSWORD</th>
						<th class="text-center">EMAIL</th>
						<th class="text-center">PILIHAN</th>
					</tr>
				</thead>
				<tbody>
<?
// include file koneksi.php dan melakukan query select ke tabel user
?>
					<?php
						include "./koneksi.php";

						$koneksiObj = new Koneksi();
						$koneksi = $koneksiObj->getKoneksi();

						if($koneksi->connect_error) {
							echo "<tr><td>";
							echo "Gagal koneksi : ". $koneksi->connect_error;
							echo "</td></tr>";
						}

						$query = "select * from data order by nama";
						$data = $koneksi->query($query);

// mengecek apakah ada data atau tidak dengan mengakses num_rows dari hasil return query select sebelumnya, dan hasilnya true maka data akan ditampilkan
// baris kode while($row = $data->fetch_assoc()) berguna untuk perulangan untuk menampilkan data berdasarkan banyaknya data. Kemudian data
// ditampilkan ke dalam tabel dengan menampilkan masing-masing field dengan cara mengakses array pada variabel $row[‘nama_field’]. Kode di atas
//terdapat kode untuk menampilkan tombol edit dan hapus
						
						if($data->num_rows <= 0) {
							echo "<tr><td colspan='5'>";
							echo "<p align='center'>Tidak ada data</p>";
							echo "</td></tr>";
						}else {
							while ($row = $data->fetch_assoc()) {
								echo "<tr>";
								echo "<td>" . $row["nama"]. "</td>"; 
								echo "<td>" . $row["username"]. "</td>";
								echo "<td>" . $row["password"]. "</td>";
								echo "<td>" . $row["email"] . "</td>";
								echo '<td class="text-center"><a href="edit.php?id='. $row["id"] .'"><button type="button" class="btn btn-warning">Edit</button></a> 
								<a href="hapus.php?id='. $row["id"] .'"><button type="button" class="btn btn-danger">Hapus</button></a></td>';
								echo "</tr>";
							}
						}
						
						$koneksi->close();
					?>
			</table>
		</div>
    </div>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>