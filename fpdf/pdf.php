<?php
    require('fpdf.php');
    $pdf = new FPDF('p','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUAN NEGERI 4 BANJARMASN',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR SISWA SMKN 4 BANJARMASIN',0,1,'C');
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'NIS',1,0,'C');
    $pdf->Cell(50,6,'NAMA SISWA',1,0,'C');
    $pdf->Cell(30,6,'JENIS KELAMIN',1,0,'C');
    $pdf->Cell(60,6,'ALAMAT',1,0,'C');
    $pdf->Cell(24,6,'NO TELP',1,1,'C');
    $pdf->SetFont('Arial','',10);

    include'../koneksi.php';
    $siswa=mysqli_query($koneksi,"select*from tb_siswa");
    while ($row = mysqli_fetch_array($siswa)){
            if($row[2]=="L"){
                $jenkel = "laki-laki";
            }else{
                $jenkel = "Perempuan";            
            }
        $pdf->Cell(20,6,$row['nis'],1,0);
        $pdf->Cell(50,6,$row['nama'],1,0);
        $pdf->Cell(30,6,$jenkel,1,0);
        $pdf->Cell(60,6,$row['alamat'],1,0);
        $pdf->Cell(24,6,$row['no_telp'],1,1);
    }
    $pdf->Output();

?>