
<style>
    img.gambar{
        width:25% ;
        height:25%;
	}
</style>
<html>
	<div class="container">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<head>
		<title>Puskesmas</title>
	</head>
	<body>
    <?php
require_once 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM tb_alat WHERE id = '$id'";
$ambil_data = mysqli_query($koneksi, $sql);
$hasil = mysqli_fetch_array($ambil_data);
?>
<div align='center'>
<h2><?= $hasil['nama_alat']; ?></h2><br>
<img src="../puskesmas/foto/<?= $hasil['gambar']; ?>"class="gambar"><br>
<p><?= $hasil['deskripsi']; ?></p>

</div>
	</body>
	</div>
</html>