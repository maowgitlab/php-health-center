<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login Sebagai Admin');window.location='index.php';</script>";
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
<h1> Tampil Data Surat Keterangan Sehat</h1>
<a href=tambah_suratsehat.php class=link>Buat Surat</a> 
	<table> 
				<tr>
					<th>No</th>
					<th>ID Surat</th>
					<th>Nama Dokter</th>
					<th>Nama</th>
					<th>Ttl</th>
					<th>Alamat</th>
					<th>Tinggi Badan</th>
					<th>Berat Badan</th>
					<th>Hasil</th>
					<th>Keperluan</th>
					<th>Tanggal Pembuatan</th>
					<th>Aksi</th>
				</tr>
				<?php
				require_once 'koneksi.php';
						
				if(isset($_POST['cari2'])){
					$cari = $_POST['cari'];
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"select * from tb_ketsehat where id_surat like '%$cari%' or nama like '%$cari%'");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query = mysqli_query($koneksi,"select * from tb_ketsehat where id_surat like '%$cari%' or nama like '%$cari%' LIMIT $mulai, $halaman");
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
							<td><?= $hasil['id_surat']; ?></td>
							<td><?= $hasil['nama_dokter']; ?></td>
							<td><?= $hasil['nama']; ?></td>
							<td><?= $hasil['ttl']; ?></td>
							<td><?= $hasil['alamat']; ?></td>
							<td><?= $hasil['tinggi_badan']; ?></td>
							<td><?= $hasil['berat_badan']; ?></td>
							<td><?= $hasil['hasil']; ?></td>
							<td><?= $hasil['keperluan']; ?></td>
							<td><?= $hasil['tanggal_pembuatan']; ?></td>
							<td>
								<a href="edit_suratsehat.php?id_surat=<?= $hasil['id_surat'];?>"class="link">Edit</a>
								<a href="cetak_suratsehat.php?id_surat=<?= $hasil['id_surat'];?>" class="link">Cetak</a>
								<a href="hapus_suratsehat.php?id_surat=<?= $hasil['id_surat'];?>" onclick="return confirm('Yakin Hapus Data Surat Ini?')" class="link">Hapus</a>
							</td>
						</tr>
					<?php
						$no++;}}
				}else {
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"SELECT * FROM tb_ketsehat");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query=	mysqli_query($koneksi,"select * from tb_ketsehat LIMIT $mulai, $halaman");
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
							<td><?= $hasil['id_surat']; ?></td>
							<td><?= $hasil['nama_dokter']; ?></td>
							<td><?= $hasil['nama']; ?></td>
							<td><?= $hasil['ttl']; ?></td>
							<td><?= $hasil['alamat']; ?></td>
							<td><?= $hasil['tinggi_badan']; ?></td>
							<td><?= $hasil['berat_badan']; ?></td>
							<td><?= $hasil['hasil']; ?></td>
							<td><?= $hasil['keperluan']; ?></td>
							<td><?= $hasil['tanggal_pembuatan']; ?></td>
							<td>
								<a href="edit_suratsehat.php?id_surat=<?= $hasil['id_surat'];?>"class="link">Edit</a>
								<a href="cetak_suratsehat.php?id_surat=<?= $hasil['id_surat'];?>" class="link">Cetak</a>
								<a href="hapus_suratsehat.php?id_surat=<?= $hasil['id_surat'];?>" onclick="return confirm('Yakin Hapus Data Surat Ini?')" class="link">Hapus</a>
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
	</div>
	</html>