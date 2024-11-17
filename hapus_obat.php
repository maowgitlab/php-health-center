<?php
	include 'koneksi.php';
	
	$id_obat = $_GET['id_obat'];
	$query = mysqli_query($koneksi, "DELETE from tb_obat WHERE id_obat = '$id_obat'");
	
	if($query){
		echo "<script>alert('Data Berhasil Dihapus!!!');window.location='tampil_obat.php';</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus');window.location='tampil_obat.php';</script>";
	}
?>