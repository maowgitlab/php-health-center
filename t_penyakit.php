<?php
	session_start();	
?>
<html>
	<div class ='container'>
<link rel="stylesheet" type="text/css" href="style.css">
	<head><title>Puskesmas</title></head>
		<body>
			<div class="navigasi">
			<div class="content">
            <ul>
		<li><a href="t_dokter.php">Dokter</a></li>
		<li><a href="t_penyakit.php">Penyakit</a></li>
		<li><a href="t_obat.php">Obat</a></li>
		<li><a href="t_alat.php">Alat</a></li>
		<li><a href="tampil_login.php">Admin</a></li>
	</ul>
			</div>
			</div>

<div class="cari">
	<form action="tampil_penyakit.php" method="post">
		<input type="text" name="cari" placeholder="Search">
		<input type="submit" name="cari2" value="Cari">
	</form>
</div>

	<h1>Data Penyakit</h1>
		<table>
			<tr>
				<th>No</th>
				<th>Id Penyakit</th>
				<th>Nama Penyakit</th>
				<th>Deskripsi</th>
			</tr>
			<?php
				require_once 'koneksi.php';
						
				if(isset($_POST['cari2'])){
					$cari = $_POST['cari'];
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"select * from tb_penyakit where id_penyakit like '%$cari%' or nama_penyakit like '%$cari%'");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query = mysqli_query($koneksi,"select * from tb_penyakit where id_penyakit like '%$cari%' or nama_penyakit like '%$cari%' LIMIT $mulai, $halaman");
					$no =$mulai+1;
					$jlhData = mysqli_num_rows($query);
					if($jlhData == 0){
						echo "<tr>
							<td colspan = 6>Data Tidak Ada!!!</td>
						</tr>";
					}else{
						while ($hasil = mysqli_fetch_array($query)){ ?>
						<tr>
							<td<?= $no++ ?></td>
							<td><?= $hasil['id_penyakit']; ?></td>
							<td><?= $hasil['nama_penyakit']; ?></td>
							<td><?= $hasil['deskripsi']; ?></td>
						</tr>
						<?php
							$no++;}}
					}else {
						$halaman = 10;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($koneksi,"SELECT * FROM tb_penyakit");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);            
						$query=	mysqli_query($koneksi,"select * from tb_penyakit LIMIT $mulai, $halaman");
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
										<td><?= $hasil['id_penyakit']; ?></td>
										<td><?= $hasil['nama_penyakit']; ?></td>
										<td><?= $hasil['deskripsi']; ?></td>
										
									</tr>
				<?php endwhile; }}?>
			</table>
			
</div>
	</body>	
	</div>		
			<?php for ($i=1; $i<=$pages ; $i++){ ?>
				<a href="?halaman=<?php echo $i; ?>" >
				<?php echo $i; ?></a>
			<?php } ?>
</html>