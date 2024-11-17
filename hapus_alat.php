<?php
	include 'koneksi.php';
	
	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "DELETE from tb_alat WHERE id = '$id'");
	
	if($query){
		echo "<script>alert('Data Berhasil Dihapus!!!');window.location='tampil_alat.php';</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus');window.location='tampil_alat.php';</script>";
	}
?>