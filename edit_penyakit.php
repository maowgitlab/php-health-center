<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login');window.location='tampil_login.php';</script>";
	}
?>
<html>
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

<?php
require_once 'koneksi.php';
$id_penyakit = $_GET['id_penyakit'];
$sql = "SELECT * FROM tb_penyakit WHERE id_penyakit = '$id_penyakit'";
$ambil_data = mysqli_query($koneksi, $sql);
$hasil = mysqli_fetch_array($ambil_data);
?>

<div class="container">
	<h1>Ubah Data Penyakit</h1>
	<div class="form-input">

<form method="post">
	<label for="">Id Penyakit </label>
	<input type="text" name="id_penyakit" id="" placeholder='Masukan Id Penyakit' value="<?php echo $id_penyakit ?>" readonly>
	<br>
	<label for="">Nama Penyakit </label>
	<input type="text" name="nama_penyakit" id="" placeholder='Masukan Nama Penyakit' value="<?= $hasil['nama_penyakit']; ?>">
	<br>
	<label for="">Dekripsi </label>
	<textarea name="deskripsi" id="" cols="30" rows="10" ><?= $hasil['deskripsi']; ?></textarea>
	<br>
	<input type="submit" value="Edit" name="edit">
</form>   
	</div>
</body>
</div>	
</html>

<?php
	include("koneksi.php");
	if(isset($_POST["edit"])){
		$id_penyakit = $_POST['id_penyakit'];
		$nama_penyakit = $_POST['nama_penyakit'];
		$deskripsi = $_POST['deskripsi'];
		$query = "update tb_penyakit set nama_penyakit='$nama_penyakit', deskripsi='$deskripsi' where id_penyakit='$id_penyakit'";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Di Ubah');window.location='tampil_penyakit.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Di Ubah');</script>";
		}
	}
?>