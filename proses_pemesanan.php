<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$tgl_pesan = $_POST['tgl_pesan'];
$tgl_berangkat = $_POST['tgl_berangkat'];
$tujuan = $_POST['tujuan'];
$jumlah_penumpang = $_POST['jumlah_penumpang'];
$kelas = $_POST['kelas'];

$sql = "INSERT INTO pemesanan (nama, alamat, no_telp, tgl_pesan, tgl_berangkat, tujuan, jumlah_penumpang, kelas)
        VALUES ('$nama', '$alamat', '$no_telp', '$tgl_pesan', '$tgl_berangkat', '$tujuan', '$jumlah_penumpang', '$kelas')";

if ($connect->query($sql) === TRUE) {
    // Mendapatkan ID pemesanan yang baru saja dimasukkan
    $last_id = $connect->insert_id;
    
    echo "<script>alert('Pemesanan tiket berhasil. Silahkan cetak bukti pemesanan anda.');";
    // mengarahkan ke halaman display_data untuk hasilnya
    echo "window.location.href = 'display_data.php?id=$last_id';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>
