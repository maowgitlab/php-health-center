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
		<li><a href="login/Logout.php">Logout</a></li>	
		</ul>
	</div>
	</div>	
<?php
require_once 'koneksi.php';
$id_dokter = $_GET['id_dokter'];
$sql = "SELECT * FROM tb_dokter WHERE id_dokter = '$id_dokter'";
$ambil_data = mysqli_query($koneksi, $sql);		
$hasil = mysqli_fetch_array($ambil_data);
?>

	<h1>Ubah Data Dokter</h1>
	<div class="form-input">

<form method="post">
	<label for="">ID Dokter </label>
	<br>
	<input type="text" name="id_dokter" id="" placeholder='Masukan Id Dokter' value="<?php echo $id_dokter ?>" readonly>
	<br>
	<label for="">Nama Dokter </label>
	<br>
	<input type="text" name="nama_dokter" id="" placeholder='Masukan Nama Dokter' value="<?= $hasil['nama_dokter']; ?>">
	<br>
	<label for="">Tanggal Lahir </label>
	<br>
	<input type="date" name="ttl_dokter" required placeholder="Masukan Tanggal Lahir Dokter" value="<?= $hasil['ttl_dokter']?>">
	<br>
	<label for="">Jenis Kelamin </label>
	<br>
	<select name="jenkel_dokter">
		<option value="L" <?php if($hasil['jenkel_dokter']=='L') echo "selected";?>>Laki-Laki</option>
		<option value="P" <?php if($hasil['jenkel_dokter']=='P') echo "selected";?>>Perempuan</option>
	</select>
	<br>
	<label for="">Alamat </label>
	<br>
	<textarea name="alamat_dokter" id="" cols="30" rows="10" ><?= $hasil['alamat_dokter']; ?></textarea>
	<br>
	<label for="">Spesialis </label>
	<br>
	<input type="text" name="spesialis_dokter" id="" placeholder='Masukan Spesialisasi' value="<?= $hasil['spesialis_dokter']; ?>">
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
		$id_dokter = $_POST['id_dokter'];
		$nama_dokter = $_POST['nama_dokter'];
		$ttl_dokter = $_POST['ttl_dokter'];
		$jenkel_dokter = $_POST['jenkel_dokter'];
		$alamat_dokter = $_POST['alamat_dokter'];
		$spesialis_dokter = $_POST['spesialis_dokter'];
		$query = "update tb_dokter set nama_dokter='$nama_dokter', ttl_dokter='$ttl_dokter', jenkel_dokter='$jenkel_dokter', alamat_dokter='$alamat_dokter',  spesialis_dokter='$spesialis_dokter' where id_dokter='$id_dokter'";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Di Ubah');window.location='tampil_dokter.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Di Ubah');</script>";
		}
	}
?>