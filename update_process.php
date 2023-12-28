<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $tgl_pesan = $_POST['tgl_pesan'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $tujuan = $_POST['tujuan'];
    $jumlah_penumpang = $_POST['jumlah_penumpang'];
    $kelas = $_POST['kelas'];

    // Query untuk melakukan update data
    $sql = "UPDATE pemesanan SET nama='$nama', alamat='$alamat', no_telp='$no_telp', tgl_pesan='$tgl_pesan', tgl_berangkat='$tgl_berangkat', tujuan='$tujuan', jumlah_penumpang=$jumlah_penumpang, kelas='$kelas' WHERE id=$id";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui');";
        echo "window.location.href = 'display_data.php?id=$id';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
    
}

$connect->close();
?>
