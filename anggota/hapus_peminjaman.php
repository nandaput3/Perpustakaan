<?php
include 'koneksi.php';

// Pastikan ada data peminjaman ID yang dikirimkan
if (isset($_GET['peminjaman_id'])) {
    // Tangkap peminjaman ID dari URL
    $peminjamanId = $_GET['peminjaman_id'];

    // Lakukan query untuk menghapus data peminjaman
    $sql = "DELETE FROM peminjaman WHERE peminjaman_id = $peminjamanId";
    $result = mysqli_query($koneksi, $sql);

    // Periksa apakah penghapusan berhasil
    if ($result) {
        // Redirect ke halaman data peminjaman setelah berhasil menghapus
        header('Location: data_peminjaman_buku.php');
        exit();
    } else {
        echo 'Gagal menghapus data peminjaman.';
    }
}
?>