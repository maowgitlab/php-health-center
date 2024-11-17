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
		<li><a href="login/Logout.php">Logout</a></li>	
		</ul>
	</div>
</div>

<?php
require_once 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM tb_alat WHERE id = '$id'";
$ambil_data = mysqli_query($koneksi, $sql);
$hasil = mysqli_fetch_array($ambil_data);
?>

<div class="container">
	<h1>Ubah Data Alat</h1>
	<div class="form-input">

<form method="post">
	<label for="">Id Alat </label>
	<input type="text" name="id" id="" placeholder='Masukan Id 	Alat' value="<?php echo $id ?>" readonly>
	<br>
	<label for="">Nama Alat </label>
	<input type="text" name="nama_alat" id="" placeholder='Masukan Nama Alat' value="<?= $hasil['nama_alat']; ?>">
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
		$id = $_POST['id'];
		$nama_alat = $_POST['nama_alat'];
		$deskripsi = $_POST['deskripsi'];
		$query = "update tb_alat set nama_alat='$nama_alat', deskripsi='$deskripsi' where id='$id'";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Di Ubah');window.location='tampil_alat.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Di Ubah');</script>";
		}
	}
?>