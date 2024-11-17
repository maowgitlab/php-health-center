<?php
	include 'koneksi.php';
	
	$id_surat	= $_GET['id_surat'];
	$query = mysqli_query($koneksi, "DELETE from tb_butawarna WHERE id_surat = '$id_surat'");
	
	if($query){
		echo "<script>alert('Data Berhasil Dihapus!!!');window.location='tampil_butawarna.php';</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus');window.location='tampil_butawarna.php';</script>";
	}
?>