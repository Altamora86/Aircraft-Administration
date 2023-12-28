<?php
require('fpdf/fpdf.php');
include 'koneksi.php';

$id = $_POST['id'];

if (!is_numeric($id) || $id <= 0) {
    echo "Invalid ID";
    exit;
}

$sql = "SELECT * FROM pemesanan WHERE id = $id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Create PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // Add title
    $pdf->Cell(160, 10, 'SKYHUB INDONESIA', 0, 1, 'C');
    $pdf->Ln(10); // Add space below title
    $pdf->Cell(160, 10, 'Detail Pemesan', 0, 1, 'C');

    // Create a table-like structure
    $pdf->Cell(80, 10, 'Nama:', 1);
    $pdf->Cell(80, 10, $row['nama'], 1);
    $pdf->Ln();
    
    $pdf->Cell(80, 10, 'Alamat:', 1);
    $pdf->Cell(80, 10, $row['alamat'], 1);
    $pdf->Ln();
    
    $pdf->Cell(80, 10, 'No. Telp:', 1);
    $pdf->Cell(80, 10, $row['no_telp'], 1);
    $pdf->Ln();
    
    $pdf->Cell(80, 10, 'Tanggal Pesan:', 1);
    $pdf->Cell(80, 10, $row['tgl_pesan'], 1);
    $pdf->Ln();
    
    $pdf->Cell(80, 10, 'Tanggal Berangkat:', 1);
    $pdf->Cell(80, 10, $row['tgl_berangkat'], 1);
    $pdf->Ln();
    
    $pdf->Cell(80, 10, 'Tujuan:', 1);
    $pdf->Cell(80, 10, $row['tujuan'], 1);
    $pdf->Ln();
    
    $pdf->Cell(80, 10, 'Jumlah Penumpang:', 1);
    $pdf->Cell(80, 10, $row['jumlah_penumpang'], 1);
    $pdf->Ln();
    
    $pdf->Cell(80, 10, 'Kelas:', 1);
    $pdf->Cell(80, 10, $row['kelas'], 1);
    $pdf->Ln();

    $pdfFileName = 'Pemesanan_SKYHUB_ID_' . $id . '.pdf';
    $pdf->Output('F', $pdfFileName);

    echo '  <script>
            alert("Data berhasil dicetak!");
            window.open("' . $pdfFileName . '", "_blank");
            window.location.href = "display_data.php?id=' . $id . '";
            </script>';

} else {
    echo "Data not found";
}

$connect->close();
?>
