<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login');window.location='tampil_login.php';</script>";
	}
?>
<html>
<div class="container">
<link rel="stylesheet" type="text/css" href="style.css">
<head><title>Tambah Data Pasien</title></head>
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
	</div>
	</div>	
<h1>Halaman Tambah Data Pasien</h1>
	<div class="form-input">
		<form method="post">
			<label for="">ID Pasien </label>
			<br>
			<input type="text" name="id_pasien" id="" placeholder='Masukan ID Pasien'>
			<br>
			<label for="">Nama Pasien </label>
			<br>
			<input type="text" name="nama_pasien" id="" placeholder='Masukan Nama Pasien'>
			<br>
			<label for="">Tanggal Lahir </label>
			<br>
			<input type="date" name="ttl_pasien" required placeholder="Masukan Tanggal Lahir Pasien">
			<br>
			<label for="">umur </label>
			<br>
			<input type="text" name="umur" required placeholder="Masukan Umur">
			<br>
			<label for="">Penyakit </label>
			<br>
			<select name="nama_penyakit">
			<?php 
			include("koneksi.php");
			$query= mysqli_query($koneksi, "SELECT * FROM tb_penyakit");
			while ($dataa = mysqli_fetch_row($query)) {
			$id_penyakit=$dataa[0];
			$nama_penyakit=$dataa[1];
			?>
				<option value="<?php echo $dataa[1]; ?>"><?php echo "".$dataa[1]; ?></option>
			<?php }?>
			</select>
			<br>
			<label for="">Dokter yang Memeriksa </label>
			<br>
			<select name="nama_dokter">
			<?php 
			include("koneksi.php");
			$query= mysqli_query($koneksi, "SELECT * FROM tb_dokter");
			while ($dataa = mysqli_fetch_row($query)) {
			$id_dokter=$dataa[0];
			$nama_dokter=$dataa[1];
			?>
				<option value="<?php echo $dataa[1]; ?>"><?php echo "".$dataa[1]; ?></option>
			<?php }?>
			</select>
			<br>
			<label for="">Alamat </label>
			<br>
			<input type="text" name="alamat_pasien" id="" placeholder='Masukan Alamat'>
			<br>
			<label for="">Id Obat </label>
			<br>
			<select name="id_obat">
			<?php 
			include("koneksi.php");
			$query= mysqli_query($koneksi, "SELECT * FROM tb_obat");
			while ($dataa = mysqli_fetch_row($query)) {
			$id_obat=$dataa[0];
			$nama_obat=$dataa[1];
			?>
				<option value="<?php echo $dataa[0]; ?>"><?php echo "".$dataa[1]; ?></option>
			<?php }?>
			</select>
			<br>
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
		$id_pasien = $_POST['id_pasien'];
		$nama_pasien = $_POST['nama_pasien'];
		$ttl_pasien = $_POST['ttl_pasien'];
		$umur = $_POST['umur'];
		$nama_penyakit = $_POST['nama_penyakit'];
		$nama_dokter = $_POST['nama_dokter'];
		$alamat_pasien = $_POST['alamat_pasien'];
		$id_obat = $_POST['id_obat'];
		$query = "INSERT INTO tb_pasien VALUES ('$id_pasien', '$nama_pasien', '$ttl_pasien' , '$umur', '$nama_penyakit', '$nama_dokter', '$alamat_pasien', '$id_obat')";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Ditambahkan');window.location='tampil_pasien.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Ditambahkan');</script>";
		}
	}
?>