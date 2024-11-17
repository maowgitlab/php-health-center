<?php
	include 'koneksi.php';
	
	$id_penyakit = $_GET['id_penyakit'];
	$query = mysqli_query($koneksi, "DELETE from tb_penyakit WHERE id_penyakit = '$id_penyakit'");
	
	if($query){
		echo "<script>alert('Data Berhasil Dihapus!!!');window.location='tampil_penyakit.php';</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus');window.location='tampil_penyakit.php';</script>";
	}
?>