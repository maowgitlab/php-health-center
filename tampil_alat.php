<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo"<script>alert('Anda Tidak Login Sebagai Admin');window.location='index.php';</script>";
	}
?>
<style>
	div.box{
        width: 20%;
        height: 30%;
        background-color: 	#32CD32;
        margin: 20px 30px;
        padding: 10px;
        position: relative;
        text-align: center;
        box-shadow: 0px 0px 15px 6px rgba(152, 251, 153);
        border-radius: 20px;
        float: left;
        cursor: pointer;
	}
	div.box:hover{
        box-shadow: 2px 4px 12px 9px rgba(62, 250, 153);
        /* margin: 19px 28px; */
    }
 img.gambar{
        width:80% ;
        height: 80%;
	}
	div.tengah{
		text-align:center;
		
	}
</style>
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
		<li><a href='tampil_suratsehat.php'>Surat Sehat</a></li>
		<li><a href='tampil_butawarna.php'>Surat Buta Warna</a></li>
		<li><a href="tampil_alat.php">Alat</a></li>
		<li><a href="logout.php">Logout?</a></li>
		</ul>
	</div>
</div>

<div class="cari">
<form action="tampil_alat.php" method="post">
	<input type="text" name="cari" placeholder="Search">
	<input type="submit" name="cari2" value="Cari">
</form>
</div>

	<h1>Data Alat</h1>
	<a href=tambah_alat.php class=link>Tambah</a><br>
			<table>
				
			<?php
				require_once 'koneksi.php';
						
				if(isset($_POST['cari2'])){
					$cari = $_POST['cari'];
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"select * from tb_alat where id like '%$cari%' or nama_alat like '%$cari%'");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query = mysqli_query($koneksi,"select * from tb_alat where id like '%$cari%' or nama_alat like '%$cari%' LIMIT $mulai, $halaman");
				
					$jlhData = mysqli_num_rows($query);
					if($jlhData == 0){
						echo "<tr>
							<td colspan = 6>Data Tidak Ada!!!</td>
						</tr>";
					}else{
						while ($hasil = mysqli_fetch_array($query)){ ?>
						<div class="box" onClick=" window.location='../puskesmas/des_alat.php?id=<?php echo $hasil['id'];?>';">
							<img src="../puskesmas/foto/<?= $hasil['gambar']; ?>"class="gambar">
							<?= $hasil['nama_alat']; ?>
							
								<a href="edit_alat.php?id=<?= $hasil['id'];?>" class="link">Edit</a>|
								<a href="hapus_alat.php?id=<?= $hasil['id'];?>" onclick="return confirm('Yakin Hapus Data Penyakit Ini?')" class="link">Hapus</a>
							
						</div>
						<?php 
			 echo"
						

				";
		
		?>
					<?php
						$no++;}}
				}else {
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"SELECT * FROM tb_alat");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);            
					$query=	mysqli_query($koneksi,"select * from tb_alat LIMIT $mulai, $halaman");
					
					$jlhData = mysqli_num_rows($query);
					if($jlhData == 0){
						echo "<tr>
							<td colspan = 6>Data Tidak Ada!!!</td>
						</tr>";
					}else{
						while($hasil = mysqli_fetch_array($query)) :?>							
						<div class="box" onClick=" window.location='../puskesmas/des_alat.php?id=<?php echo $hasil['id'];?>';">
							<img src="../puskesmas/foto/<?= $hasil['gambar']; ?>"class="gambar">
							<?= $hasil['nama_alat']; ?><br>
							
								<a href="edit_alat.php?id=<?= $hasil['id'];?>" class="link">Edit</a>|
								<a href="hapus_alat.php?id=<?= $hasil['id'];?>" onclick="return confirm('Yakin Hapus Data Penyakit Ini?')" class="link">Hapus</a>
							
						</div>
						<?php 
			 echo"
						

				";
		
		?>
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