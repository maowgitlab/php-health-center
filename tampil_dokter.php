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
		<li><a href='tampil_butawarna.php'>Surat Buta Warna</a></li>
		<li><a href="tampil_alat.php">Alat</a></li>
		<li><a href="logout.php">Logout?</a></li>
		</ul>
	</div>
	</div>	
<div class="cari">
<form action="tampil_dokter.php" method="post">
	<input type="text" name="cari" placeholder="Search">
	<input type="submit" name="cari2" value="Cari">
</form>
</div>
<h1>Data Dokter</h1>
<a href=tambah_dokter.php class=link >Tambah</a>
	<table>
				<tr>
					<th>No</th>
					<th>ID Dokter</th>
					<th>Nama Dokter</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Spesialis</th>
					<th>Aksi</th>
				</tr>
				<?php
				require_once 'koneksi.php';
						
				if(isset($_POST['cari2'])){
					$cari = $_POST['cari'];
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"select * from tb_dokter where id_dokter like '%$cari%' or nama_dokter like '%$cari%'");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query = mysqli_query($koneksi,"select * from tb_dokter where id_dokter like '%$cari%' or nama_dokter like '%$cari%' LIMIT $mulai, $halaman");
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
							<td><?= $hasil['id_dokter']; ?></td>
							<td><?= $hasil['nama_dokter']; ?></td>
							<td><?= $hasil['ttl_dokter']; ?></td>
							<td><?= $hasil['jenkel_dokter']; ?></td>
							<td><?= $hasil['alamat_dokter']; ?></td>
							<td><?= $hasil['spesialis_dokter']; ?></td>
							<td>
								<a href="edit_dokter.php?id_dokter=<?= $hasil['id_dokter']; ?>" class="link">Edit</a>|
								<a href="hapus_dokter.php?id_dokter=<?= $hasil['id_dokter']; ?> "onclick="return confirm('Yakin Hapus Data Dokter Ini?')" class="link">Hapus</a>
							</td>
						</tr>
					<?php
						$no++;}}
				}else {
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"SELECT * FROM tb_dokter");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query=	mysqli_query($koneksi,"select * from tb_dokter LIMIT $mulai, $halaman");
					$no =$mulai+1;
					$jlhData = mysqli_num_rows($query);
					if($jlhData == 0){
						echo "<tr>
							<td colspan = 6>Data Tidak Ada!!!</td>
						</tr>";
					}else{
						while($hasil = mysqli_fetch_array($query)) :?>							
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $hasil['id_dokter']; ?></td>
							<td><?= $hasil['nama_dokter']; ?></td>
							<td><?= $hasil['ttl_dokter']; ?></td>
							<td><?= $hasil['jenkel_dokter']; ?></td>
							<td><?= $hasil['alamat_dokter']; ?></td>
							<td><?= $hasil['spesialis_dokter']; ?></td>
							<td>
								<a href="edit_dokter.php?id_dokter=<?= $hasil['id_dokter'];?>" class="link">Edit</a>|
								<a href="hapus_dokter.php?id_dokter=<?= $hasil['id_dokter'];?>" onclick="return confirm('Yakin Hapus Data Dokter Ini?')" class="link">Hapus</a>
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