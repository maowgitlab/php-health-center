<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login');window.location='tampil_login.php';</script>";
	}
?>
<html>
<div class="container">
<link rel="stylesheet" type="text/css" href="style.css">
<head><title>Tambah Data Dokter</title></head>
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
<h1>Halaman Tambah Data Dokter</h1>
	<div class="form-input">
		<form method="post">
			<label for="">ID Dokter </label>
			<br>
			<input type="text" name="id_dokter" id="" placeholder='Masukan ID Dokter'>
			<br>
			<label for="">Nama Dokter </label>
			<br>
			<input type="text" name="nama_dokter" id="" placeholder='Masukan Nama Dokter'>
			<br>
			<label for="">Tanggal Lahir </label>
			<br>
			<input type="date" name="ttl_dokter" required placeholder="Masukan Tanggal Lahir Dokter">
			<br>
			<label for="">Jenis Kelamin </label>
			<br>
			<select name="jenkel_dokter">
				<option value="L">Laki-Laki</option>
				<option value="P">Perempuan</option>
			</select>
			<br>
			<label for="">Alamat </label>
			<br>
			<input type="text" name="alamat_dokter" id="" placeholder='Masukan Alamat'>
			<br>
			<label for="">Spesialis </label>
			<br>
			<input type="text" name="spesialis_dokter" id="" placeholder='Masukan Spesialisasi'>
			<br>
			<input type="submit" value="Simpan" name="tambah">
		</form>
	</div>
</body>
</div>
</html>

<?php
	include("koneksi.php");
	if(isset($_POST["tambah"])){
		$id_dokter = $_POST['id_dokter'];
		$nama_dokter = $_POST['nama_dokter'];
		$ttl_dokter = $_POST['ttl_dokter'];
		$jenkel_dokter = $_POST['jenkel_dokter'];
		$alamat_dokter = $_POST['alamat_dokter'];
		$spesialis_dokter = $_POST['spesialis_dokter'];
		$query = "INSERT INTO tb_dokter VALUES ('$id_dokter', '$nama_dokter', '$ttl_dokter' , '$jenkel_dokter', '$alamat_dokter', '$spesialis_dokter')";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Ditambahkan');window.location='tampil_dokter.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Ditambahkan');</script>";
		}
	}
?>