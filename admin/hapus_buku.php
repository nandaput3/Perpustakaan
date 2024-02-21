<?php
include "koneksi.php";

// Periksa apakah parameter ID buku tersedia dalam URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query SQL untuk menghapus buku berdasarkan ID
    $sql = "DELETE FROM buku WHERE buku_id = $id";

    // Eksekusi query
    if(mysqli_query($koneksi, $sql)) {
        // Redirect kembali ke halaman data_buku.php setelah menghapus
        header("Location: data_buku.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "ID buku tidak tersedia.";
}
?>