<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login');window.location='tampil_login.php';</script>";
	}
?>
<html>
<head><title>Puskesmas</title></head>
<div class ='container'>
<link rel="stylesheet" type="text/css" href="style.css">
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
$id_pasien = $_GET['id_pasien'];
$sql = "SELECT * FROM tb_pasien WHERE id_pasien = '$id_pasien'";
$ambil_data = mysqli_query($koneksi, $sql);		
$hasil = mysqli_fetch_array($ambil_data);
?>

	<h1>Ubah Data Pasien</h1>
	<div class="form-input">

<form method="post">
	<label for="">ID Pasien </label>
			<br>
			<input type="text" name="id_pasien" id="" placeholder='Masukan ID Pasien'  value="<?php echo $id_pasien ?>" readonly>
			<br>
			<label for="">Nama Pasien </label>
			<br>
			<input type="text" name="nama_pasien" id="" placeholder='Masukan Nama Pasien' value="<?= $hasil['nama_pasien']; ?>">
			<br>
			<label for="">Tanggal Lahir </label>
			<br>
			<input type="date" name="ttl_pasien" required placeholder="Masukan Tanggal Lahir Pasien" value="<?= $hasil['ttl_paisen']; ?>">
			<br>
			<label for="">umur </label>
			<br>
			<input type="text" name="umur" required placeholder="Masukan Umur" value="<?= $hasil['umur']; ?>">
			<br>
			<label for="">Penyakit </label>
			<br>
			<input type="text" name="nama_penyakit" required placeholder="Masukan Penyakit" value="<?= $hasil['nama_penyakit']; ?>">
			<br>
			<label for="">Dokter yang Memeriksa </label>
			<br>
			<input type="text" name="nama_dokter" required placeholder="Masukan Dokter" value="<?= $hasil['nama_dokter']; ?>">
			<br>
			<label for="">Alamat </label>
			<br>
			<input type="text" name="alamat_pasien" id="" placeholder='Masukan Alamat' value="<?= $hasil['alamat_pasien']; ?>">
			<br>
			<label for="">Id Obat </label>
			<br>
			<input type="text" name="id_obat" id="" placeholder='Masukan Obat' value="<?= $hasil['id_obat']; ?>">
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
		$id_pasien = $_POST['id_pasien'];
		$nama_pasien = $_POST['nama_pasien'];
		$ttl_pasien = $_POST['ttl_pasien'];
		$umur = $_POST['umur'];
		$nama_penyakit = $_POST['nama_penyakit'];
		$nama_dokter = $_POST['nama_dokter'];
		$alamat_pasien = $_POST['alamat_pasien'];
		$id_obat = $_POST['id_obat'];
		$query = "update tb_pasien set nama_pasien='$nama_pasien', ttl_pasien='$ttl_pasien', umur='$umur', nama_penyakit='$nama_penyakit', nama_dokter='$nama_dokter', alamat_pasien='$alamat_pasien', id_obat='$id_obat' where id_pasien='$id_pasien'";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Di Ubah');window.location='tampil_pasien.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Di Ubah');</script>";
		}
	}
?>