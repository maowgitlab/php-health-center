<?php
	include 'koneksi.php';
	
	$id_dokter	= $_GET['id_dokter'];
	$query = mysqli_query($koneksi, "DELETE from tb_dokter WHERE id_dokter = '$id_dokter'");
	
	if($query){
		echo "<script>alert('Data Berhasil Dihapus!!!');window.location='tampil_dokter.php';</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus');window.location='tampil_dokter.php';</script>";
	}
?>