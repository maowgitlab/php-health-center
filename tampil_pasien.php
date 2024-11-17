<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login Sebagai Admin');window.location='t_dokter.php';</script>";
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
		<li><a href="logout.php">Logout?</a></li>
	</ul>
	</div>
	</div>	
<div class="cari">
<form action="tampil_penyakit.php" method="post">
	<input type="text" name="cari" placeholder="Search">
	<input type="submit" name="cari2" value="Cari">
</form>
</div>
<h1>Data Pasien</h1>
	<a href=tambah_pasien.php class=link >Tambah</a>
	<table>
				<tr>
					<th>No</th>
					<th>ID Pasien</th>
					<th>Nama Pasien</th>
					<th>Tanggal Lahir</th>
					<th>Umur</th>
					<th>Penyakit</th>
					<th>Dokter</th>
					<th>Alamat</th>
					<th>Id Obat</th>
					<th>Aksi</th>
				</tr>
				<?php
				require_once 'koneksi.php';
						
				if(isset($_POST['cari2'])){
					$cari = $_POST['cari'];
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"select * from tb_pasien where id_pasien like '%$cari%' or nama_pasien like '%$cari%'");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query = mysqli_query($koneksi,"select * from tb_pasien where id_pasien like '%$cari%' or nama_pasien like '%$cari%' LIMIT $mulai, $halaman");
					$no =$mulai+1;
					$jlhData = mysqli_num_rows($query);
					if($jlhData == 0){
						echo "<tr>
							<td colspan = 6>Data Tidak Ada!!!</td>
						</tr>";
					}else{
						while ($hasil = mysqli_fetch_array($query)){ ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $hasil['id_pasien']; ?></td>
							<td><?= $hasil['nama_pasien']; ?></td>
							<td><?= $hasil['ttl_pasien']; ?></td>
							<td><?= $hasil['umur']; ?></td>
							<td><?= $hasil['nama_penyakit']; ?></td>
							<td><?= $hasil['nama_dokter']; ?></td>
							<td><?= $hasil['alamat_pasien']; ?></td>
							<td><?= $hasil['id_obat']; ?></td>
							<td>
								<a href="edit_pasien.php?id_pasien=<?= $hasil['id_pasien'];?>"class="link">Edit</a>|
								<a href="hapus_pasien.php?id_pasien=<?= $hasil['id_pasien'];?>" onclick="return confirm('Yakin Hapus Data Pasien Ini?')" class="link">Hapus</a>
							</td>
						</tr>
					<?php
						$no++;}}
				}else {
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"SELECT * FROM tb_pasien");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query=	mysqli_query($koneksi,"select * from tb_pasien LIMIT $mulai, $halaman");
					$no =$mulai+1;
					$jlhData = mysqli_num_rows($query);
					if($jlhData == 0){
						echo "<tr>
							<td colspan = 6>Data Tidak Ada!!!</td>
						</tr>";
					}else{
						while($hasil = mysqli_fetch_array($query)) :?>							
						<tr>
							<td width=35><?= $no++ ?></td>
							<td><?= $hasil['id_pasien']; ?></td>
							<td><?= $hasil['nama_pasien']; ?></td>
							<td><?= $hasil['ttl_pasien']; ?></td>
							<td><?= $hasil['umur']; ?></td>
							<td><?= $hasil['nama_penyakit']; ?></td>
							<td><?= $hasil['nama_dokter']; ?></td>
							<td><?= $hasil['alamat_pasien']; ?></td>
							<td><?= $hasil['id_obat']; ?></td>
							<td>
								<a href="edit_pasien.php?id_pasien=<?= $hasil['id_pasien'];?>" class="link">Edit</a>|
								<a href="hapus_pasien.php?id_pasien=<?= $hasil['id_pasien'];?>"  onclick="return confirm('Yakin Hapus Data Pasien Ini?')" class="link">Hapus</a>
							</td>
						</tr>
				<?php endwhile; }}?>
			</table>
			<center>		
			<?php for ($i=1; $i<=$pages ; $i++){ ?>
				<a href="?halaman=<?php echo $i; ?>">
				<?php echo $i; ?></a>
			<?php } ?>
			</center>
</div>			
	</body>
	</html>