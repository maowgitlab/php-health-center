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
			<label for="">Id Alat </label>
			<br>
			<input type="text" name="id" id="" placeholder='Masukan Kode Alat'>
			<br>
			<label for="">Nama Alat </label>
			<br>
			<input type="text" name="nama_alat" id="" placeholder='Masukan Nama Alat'>
			<br>
			<label for="">Masukan Gambar </label>
			<br>
			<input type="file" name="gambar">
			<br>
			<label for="">Deskripsi </label>
			<br>
			<textarea name="deskripsi" id="" cols="30" rows="10"></textarea>
			<br>
			<input type="submit" value="Simpan" name="tambah">
		</form>
	</div>
<?php
    include('koneksi.php');
    if (isset($_POST['tambah'])) {
        $id = $_POST['id'];
        $nama_alat = $_POST['nama_alat'];
        $nama_file = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $deskripsi = $_POST['deskripsi'];
        $explode = explode('.',$nama_file);
        $jenis_file = array('png','jpg','gif','mp4','jpeg');
        $ekstensi = strtolower(end($explode));

        if (in_array($ekstensi, $jenis_file)===true) {
            if ($ukuran < 999999999999999999999999999999999999999999) {
                move_uploaded_file($tmp_file,'foto/'.$nama_file);
                $tambah = mysqli_query($koneksi,"INSERT INTO tb_alat VALUES ('$id','$nama_alat','$nama_file','$deskripsi')");
                if ($tambah) {
                    echo "<script>
                        alert('Berhasil upload');
                        window.location='tampil_alat.php';
                    </script>";
                }else {
                    echo "<script>
                        alert('Gagal upload');
                        window.location='tampil_alat.php';
                    </script>";
                }
            }else {
                echo "<script>
                    alert('Gambar terlalu besar');
                    window.location='tampil_alat.php';
                </script>";
            }
        }else {
            echo "<script>
                alert('Ekstensi tidak benar');
                window.location='tampil_alat.php';
            </script>";
        }
    }
?>