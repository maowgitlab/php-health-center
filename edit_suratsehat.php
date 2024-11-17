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
$id_surat = $_GET['id_surat'];
$sql = "SELECT * FROM tb_ketsehat WHERE id_surat = '$id_surat'";
$ambil_data = mysqli_query($koneksi, $sql);		
$hasil = mysqli_fetch_array($ambil_data);
?>

	<h1>Ubah Data Surat Keterangan Sehat</h1>
	<div class="form-input">

<form method="post">
	<label for="">Id Surat</label>
			<br>
			<input type="text" name="id_surat" id="" placeholder='Masukan ID Surat' value="<?php echo $id_surat ?>" readonly>
			<br>
			<label for="">Nama Dokter </label>
			<br>
			<input type="text" name="nama_dokter" id="" placeholder='Masukan Nama Dokter' value="<?= $hasil['nama_dokter']; ?>"readonly >
			<br>
			<label for="">Nama </label>
			<br>
			<input type="text" name="nama" id="" placeholder='Masukan Nama Dokter' value="<?= $hasil['nama']; ?>">
			<br>
			<label for="">Tanggal Lahir </label>
			<br>
			<input type="date" name="ttl" required placeholder="Masukan Tanggal Lahir" value="<?php $hasil['ttl']; ?>" >
			<br>
			<label for="">Alamat </label>
			<br>
			<input type="text" name="alamat" id="" placeholder='Masukan Alamat'  value="<?= $hasil['alamat']; ?>">
			<br>
			<label for="">Tinggi Badan </label>
			<br>
			<input type="text" name="tinggi_badan" id="" placeholder='Masukan Tinggi Badan' value="<?= $hasil['tinggi_badan']; ?>">
			<br>
			<label for="">Berat Badan </label>
			<br>
			<input type="text" name="berat_badan" id="" placeholder='Masukan Berat Badan'  value="<?= $hasil['berat_badan']; ?>">
			<br>
			<label for="">Hasil </label>
			<br>
			<select name="hasil">
				<option value="Sehat" <?php if($hasil['hasil']=='Sehat') echo "selected";?>>Sehat</option>
				<option value="Tidak Sehat" <?php if($hasil['hasil']=='Tidak Sehat') echo "selected";?>>Tidak Sehat</option>
			</select>
			<br>
			<label for="">Keperluan </label>
			<br>
			<select name="keperluan">
				<option value="Melamar Pekerjaan" <?php if($hasil['keperluan']=='Melamar Pekerjaan') echo "selected";?>>Melamar Pekerjaan</option>
				<option value="Mendaftar Sekolah" <?php if($hasil['keperluan']=='Mendaftar Sekolah') echo "selected";?>>Mendaftar Sekolah</option>
				<option value="Mengikuti Lomba" <?php if($hasil['keperluan']=='Mengikuti Lomba') echo "selected";?>>Mengikuti Lomba</option>
			</select>
			<br>
			<label for="">Tanggal Pembuatan </label>
			<br>
			<input type="date" name="tanggal_pembuatan" required placeholder="Masukan Tanggal Pembuatan" value="<?php $hasil['tanggal_pembuatan']; ?>" >
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
		$id_surat = $_POST['id_surat'];
		$nama_dokter = $_POST['nama_dokter'];
		$nama = $_POST['nama'];
		$ttl = $_POST['ttl'];
		$alamat = $_POST['alamat'];
		$tinggi_badan = $_POST['tinggi_badan'];
		$berat_badan = $_POST['berat_badan'];
		$hasil = $_POST['hasil'];
		$keperluan = $_POST['keperluan'];
		$tanggal_pembuatan = $_POST['tanggal_pembuatan'];
		$query = "update tb_ketsehat set nama_dokter='$nama_dokter', ttl='$ttl', alamat='$alamat', tinggi_badan='$tinggi_badan',  berat_badan='$berat_badan', hasil='$hasil', keperluan='$keperluan', tanggal_pembuatan='$tanggal_pembuatan' where id_surat='$id_surat'";
		$exe = mysqli_query($koneksi, $query);
		if($exe){
			echo "<script>alert('Data Berhasil Di Ubah');window.location='tampil_suratsehat.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Di Ubah');</script>";
		}
	}
?>