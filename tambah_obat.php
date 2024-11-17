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
		</ul>
	</div>
</div>
</head>
<body>
<div class="container">
	<h2>Tambah Data Alat</h2><br><br>
    <div class="form-input">
	<form method="post" enctype="multipart/form-data">
			<label for="">Id Obat </label>
			<br>
			<input type="text" name="id_obat" id="" placeholder='Masukan Id Obat'>
			<br>
			<label for="">Nama Obat </label>
			<br>
			<input type="text" name="nama_obat" id="" placeholder='Masukan Nama Obat'>
			<br>
			<label for="">Masukan Gambar </label>
			<br>
			<input type="file" name="gambar">
			<br>
			<br>
			<label for="">Jenis Obat </label>
			<br>
			<select name="jenis_obat">
				<option value="Tablet">Tablet</option>
				<option value="Pill">Pill</option>
				<option value="Kapsul">Kapsul</option>
				<option value="Bubuk">Bubuk</option>
			</select>
			<br>
			<input type="submit" value="Simpan" name="tambah">
		</form>
	</div>
<?php
    include('koneksi.php');
    if (isset($_POST['tambah'])) {
        $id_obat = $_POST['id_obat'];
        $nama_obat = $_POST['nama_obat'];
        $nama_file = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
		$tmp_file = $_FILES['gambar']['tmp_name'];
		$jenis_obat = $_POST['jenis_obat'];
        $explode = explode('.',$nama_file);
        $jenis_file = array('png','jpg','gif','mp4','jpeg');
        $ekstensi = strtolower(end($explode));

        if (in_array($ekstensi, $jenis_file)===true) {
            if ($ukuran < 999999999999999999999999999999999999999999) {
                move_uploaded_file($tmp_file,'foto/'.$nama_file);
                $tambah = mysqli_query($koneksi,"INSERT INTO tb_obat VALUES ('$id_obat','$nama_obat','$nama_file','$jenis_obat')");
                if ($tambah) {
                    echo "<script>
                        alert('Berhasil upload');
                        window.location='tampil_obat.php';
                    </script>";
                }else {
                    echo "<script>
                        alert('Gagal upload');
                        window.location='tambah_obat.php';
                    </script>";
                }
            }else {
                echo "<script>
                    alert('Gambar terlalu besar');
                    window.location='tambah_obat.php';
                </script>";
            }
        }else {
            echo "<script>
                alert('Ekstensi tidak benar');
                window.location='tambah_obat.php';
            </script>";
        }
    }
?>