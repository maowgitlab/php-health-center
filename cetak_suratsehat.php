<?php
    require('fpdf/fpdf.php');
    $pdf = new FPDF('p','mm','A4');
    $pdf->AddPage();
	$pdf->image('logo3.png',20,50,180,150);
	$pdf->image('logo5.png',18,5,25,34);
	$pdf->image('logo2.png',155,2,50,38);
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'PEMERITAH KOTA BANJARMASIN',0,1,'C');
	$pdf->Cell(190,7,'DINAS KESEHATAN',0,1,'C');
	$pdf->SetFont('Arial','B',18);
	$pdf->Cell(190,7,'PUSKESMAS 1989 TOUR TS',0,1,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,7,'Jalan Market Camden Rt.12 No.55 Telp.(011)1234356 Milkyway',0,1,'C');
    $pdf->Cell(190,0,'',1,1,'C');
    $pdf->ln(5);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'SURAT KETERANGAN PEMERIKSAAN SEHAT',0,1,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(190,7,'Yang bertanda tangan dibawah ini:',0,1);
	$pdf->Cell(30,7,'Nama Lengkap',0,0);
	$pdf->Cell(2,7,':',0,0);
	$pdf->Cell(25,7,'dr. Taylor Swift',0,1);
	$pdf->Cell(30,7,'NIP',0,0);
	$pdf->Cell(2,7,':',0,0);
	$pdf->Cell(25,7,'74745647567438283',0,1);
	$pdf->Cell(30,7,'Jabatan',0,0);
	$pdf->Cell(2,7,':',0,0);
	$pdf->Cell(25,7,'Kepala Puskesmas',0,1);
	$pdf->ln(5);
	$pdf->Cell(25,7,'Telah memberikan tugas kepada :',0,1);
    include'koneksi.php';
	$id_surat = $_GET['id_surat'];
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_ketsehat WHERE id_surat = '$id_surat'");
	while($hasil = mysqli_fetch_array($sql)){
			$pdf->Cell(30,7,'Nama Lengkap',0,0);
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(25,7,$hasil['nama_dokter'],0,1);
			$pdf->Cell(30,7,'Jabatan',0,0);
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(25,7,'Dokter Umum',0,1);
			$pdf->ln(5);
			$pdf->Cell(25,7,'Untuk memeriksa kesehatan dengan teliti menerangkan bahwa :',0,1);
			$pdf->Cell(30,7,'Nama Lengkap',0,0);
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(25,7,$hasil['nama'],0,1);
			$pdf->Cell(30,7,'Tanggal Lahir',0,0);
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(25,7,$hasil['ttl'],0,1);
			$pdf->Cell(30,7,'Alamat',0,0);
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(25,7,$hasil['alamat'],0,1);
			$pdf->Cell(30,7,'Tinggi Badan',0,0);
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(5,7,$hasil['tinggi_badan'],0,0);
			$pdf->Cell(26,7,'M',0,1);
			$pdf->Cell(30,7,'Berat Badan',0,0);
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(5,7,$hasil['berat_badan'],0,0);
			$pdf->Cell(26,7,'Kg',0,1);
			$pdf->ln(5);
			$pdf->Cell(25,7,'Atas permintaan sendiri dengan berpendapat bahwa yang diperiksa tersebut pada pemeriksaan di nyatakan :',0,1);
			$pdf->SetFont('Arial','B',15);
			$pdf->Cell(190,7,$hasil['hasil'],0,1,'C');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(60,7,'Surat keterangan ini diperlukan untuk ',0,0);
			$pdf->Cell(3,7,':',0,0);
			$pdf->SetFont('Arial','',13);
			$pdf->Cell(5,7,$hasil['keperluan'],0,1);
			$pdf->ln(5);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(60,7,'Hanya berlaku 3(tiga) bulan sejak tanggal dikeluarkan ',0,1);
			$pdf->ln(5);
			$pdf->Cell(160,7,'Dikeluarkan di',70,0,'R');
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(2,7,'Milkyway',0,1);
			$pdf->Cell(160,7,'Pada Tanggal',70,0,'R');
			$pdf->Cell(2,7,':',0,0);
			$pdf->Cell(2,7,$hasil['tanggal_pembuatan'],0,1);
			$pdf->Cell(178,7,'Puskesmas 1989 Tour TS',70,1,'R');
			$pdf->ln(10);
			$pdf->Cell(170,7,'dr. Taylor Swift',90,1,'R');
			$pdf->Cell(178,7,'874884835745745674538',70,0,'R');
			
	}
	$pdf->Output();
	
?>