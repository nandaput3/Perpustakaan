<?php
include 'koneksi.php';

if(isset($_POST['pinjam_id']) && isset($_POST['tanggal_pengembalian'])) {
    $pinjam_id = $_POST['pinjam_id'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    // Update tanggal pengembalian dan status pinjam di database
    $sql_update = "UPDATE peminjaman SET tgl_kembali = '$tanggal_pengembalian', status_pinjam = 'dikembalikan' WHERE peminjaman_id = $pinjam_id";

    if(mysqli_query($koneksi, $sql_update)) {
        echo "Pengembalian buku berhasil disimpan.";
    } else {
        echo "Error: " . $sql_update . "<br>" . mysqli_error($koneksi);
    }
}
?>