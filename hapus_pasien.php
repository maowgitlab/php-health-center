<?php
	include 'koneksi.php';
	
	$id_pasien	= $_GET['id_pasien'];
	$query = mysqli_query($koneksi, "DELETE from tb_pasien WHERE id_pasien = '$id_pasien'");
	
	if($query){
		echo "<script>alert('Data Berhasil Dihapus!!!');window.location='tampil_pasien.php';</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus');window.location='tampil_pasien.php';</script>";
	}
?>