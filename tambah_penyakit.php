<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login');window.location='tampil_login.php';</script>";
	}
?>
<html>
<div class ='container'>
<link rel="stylesheet" type="text/css" href="style.css">
<head><title>Puskesmas</title></head>
<body>
<div class="navigasi">
	<div class="content">
		<ul>
		<li><a href="tampil_dokter.php">Dokter</a></li>
		<li><a href="tampil_pasien.php">Pasien</a></li>
		<li><a href="tampil_penyakit.php">Penyakit</a></li>
		<li><a href="tampil_obat.php">Obat</a></li>
		<li><a href="tampil_suratsehat.php">Surat Sehat</a></li>
		<li><a href="tampil_butawarna.php">Surat Buta Warna</a></li>
		<li><a href="tampil_alat.php">Alat</a></li>
		</ul>
	</div>
</div>

<div class="container">
	<h1>Tambah Data Penyakit</h1>
	<div class="form-input">
		<form method="post">
			<label for="">Id Penyakit </label>
			<br>
			<input type="text" name="id_penyakit" id="" placeholder='Masukan Kode Penyakit'>
			<br>
			<label for="">Nama Penyakit </label>
			<br>
			<input type="text" name="nama_penyakit" id="" placeholder='Masukan Nama Penyakit'>
			<br>
			<label for="">Deskripsi </label>
			<br>
			<textarea name="deskripsi" id="" cols="30" rows="10"></textarea>
			<br>
			<input type="submit" value="Simpan" name="tambah">
		</form>
	</div>
</body>
</div>
</div>
</html>

<?php
	include("koneksi.php");
	if(isset($_POST["tambah"])){
		$id_penyakit = $_POST['id_penyakit'];
		$nama_penyakit = $_POST['nama_penyakit'];
		$deskripsi = $_POST['deskripsi'];
		$query = "INSERT INTO tb_penyakit VALUES ('$id_penyakit', '$nama_penyakit', '$deskripsi')";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Ditambahkan');window.location='tampil_penyakit.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Ditambahkan');</script>";
		}
	}
?>