<?php
require('fpdf/fpdf.php'); // Include the FPDF library
include("config.php");    // Include database configuration

// Create a new PDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Daftar Siswa Baru', 0, 1, 'C');

// Add a line break
$pdf->Ln(10);

// Table header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 10, 'Alamat', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(30, 10, 'Agama', 1, 0, 'C');
$pdf->Cell(40, 10, 'Sekolah Asal', 1, 1, 'C');

// Fetch data from the database
$sql = "SELECT * FROM calon_siswa";
$query = mysqli_query($db, $sql);
$no = 1;

// Table body
$pdf->SetFont('Arial', '', 12);
while ($siswa = mysqli_fetch_array($query)) {
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(40, 10, $siswa['nama'], 1, 0);
    $pdf->Cell(40, 10, $siswa['alamat'], 1, 0);
    $pdf->Cell(30, 10, $siswa['jenis_kelamin'], 1, 0);
    $pdf->Cell(30, 10, $siswa['agama'], 1, 0);
    $pdf->Cell(40, 10, $siswa['sekolah_asal'], 1, 1);
}

// Output the PDF
$pdf->Output('I', 'daftar_siswa_baru.pdf');
?>
