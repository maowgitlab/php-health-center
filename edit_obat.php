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
$id_obat = $_GET['id_obat'];
$sql = "SELECT * FROM tb_obat WHERE id_obat = '$id_obat'";
$ambil_data = mysqli_query($koneksi, $sql);
$hasil = mysqli_fetch_array($ambil_data);
?>

	<h1>Ubah Data Obat</h1>
	<div class="form-input">

<form method="post">
	<label for="">Id Obat </label>
	<input type="text" name="id_obat" id="" placeholder='Masukan Id Obat' value="<?php echo $id_obat ?>" readonly>
	<br>
	<label for="">Nama Obat </label>
	<input type="text" name="nama_obat" id="" placeholder='Masukan Nama Obat' value="<?= $hasil['nama_obat']; ?>">
	<br>
	<label for="">Jenis Obat </label>
	<select name="jenis_obat">
				<option value="Tablet" <?php if($hasil['jenis_obat']=='Tablet') echo "selected";?>>Tablet</option>
				<option value="Pill" <?php if($hasil['jenis_obat']=='Pill') echo "selected";?>>Pill</option>
				<option value="Kapsul" <?php if($hasil['jenis_obat']=='Kapsul') echo "selected";?>>Kapsul</option>
				<option value="Bubuk" <?php if($hasil['jenis_obat']=='Bubuk') echo "selected";?>>Bubuk</option>
			</select>
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
		$id_obat = $_POST['id_obat'];
		$nama_obat = $_POST['nama_obat'];
		$jenis_obat = $_POST['jenis_obat'];
		$query = "update tb_obat set nama_obat='$nama_obat', jenis_obat='$jenis_obat' where id_obat='$id_obat'";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Di Ubah');window.location='tampil_obat.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Di Ubah');</script>";
		}
	}
?>