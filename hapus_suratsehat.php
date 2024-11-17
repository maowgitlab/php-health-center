<?php
	include 'koneksi.php';
	
	$id_surat	= $_GET['id_surat'];
	$query = mysqli_query($koneksi, "DELETE from tb_ketsehat WHERE id_surat = '$id_surat'");
	
	if($query){
		echo "<script>alert('Data Berhasil Dihapus!!!');window.location='tampil_suratsehat.php';</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus');window.location='tampil_suratsehat.php';</script>";
	}
?>