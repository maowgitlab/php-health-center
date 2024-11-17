<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login');window.location='tampil_login.php';</script>";
	}
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="container">
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
<h1>Membuat Surat Keterangan Tidak Buta Warna</h1>
	<div class="form-input">
		<form method="post">
		<tr>
		<td>
			<label for="">Id Surat</label>
			<br>
			<input type="text" name="id_surat" id="" placeholder='Masukan ID Surat'>
			<br>
			<label for="">Nama Dokter </label>
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
			<label for="">Nama </label>
			<br>
			<input type="text" name="nama" id="" placeholder='Masukan Nama '>
			<br>
			<label for="">Tanggal Lahir </label>
			<br>
			<input type="date" name="ttl" required placeholder="Masukan Tanggal Lahir">
			<br>
			<label for="">Alamat </label>
			<br>
			<input type="text" name="alamat" id="" placeholder='Masukan Alamat'>
			<br>
			<label for="">Hasil </label>
			<br>
			<select name="hasil">
				<option value="Tidak Buta Warna">Tidak Buta Warna</option>
				<option value="Buta Warna">Buta Warna</option>
			</select>
			<br>
			<label for="">Keperluan </label>
			<br>
			<select name="keperluan">
				<option value="Melamar Pekerjaan">Melamar Pekerjaan</option>
				<option value="Mendaftar Sekolah">Mendaftar Sekolah</option>
				<option value="Mengikuti Lomba">Mengikuti Lomba</option>
			</select>
			<br>
			<label for="">Tanggal Pembuatan </label>
			<br>
			<input type="date" name="tanggal_pembuatan" required placeholder="Masukan Tanggal Pembuatan">
			<br>
			<input type="submit" value="Simpan" name="tambah">
			</td>
			</tr>
		</form>
			<a href="logout.php">Logout??</a>
	</div>
</body>
</div>
</html>

<?php
	include("koneksi.php");
	if(isset($_POST["tambah"])){
		$id_surat = $_POST['id_surat'];
		$nama_dokter = $_POST['nama_dokter'];
		$nama = $_POST['nama'];
		$ttl = $_POST['ttl'];
		$alamat = $_POST['alamat'];
		$hasil = $_POST['hasil'];
		$keperluan = $_POST['keperluan'];
		$tanggal_pembuatan = $_POST['tanggal_pembuatan'];
		$query = "INSERT INTO tb_butawarna VALUES ('$id_surat','$nama_dokter', '$nama', '$ttl' , '$alamat', '$hasil', '$keperluan', '$tanggal_pembuatan')";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Ditambahkan');window.location='tampil_butawarna.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Ditambahkan');</script>";
		}
	}
?>