<?php
include "koneksi.php";

// Pastikan ada data ID buku yang dikirimkan melalui AJAX
if (isset($_GET['buku_id'])) {
    // Tangkap data ID buku dari AJAX
    $bukuId = $_GET['buku_id'];

    // Lakukan query untuk memeriksa apakah buku sudah dipinjam
    $sql = "SELECT * FROM peminjaman WHERE buku_id = $bukuId";
    $result = mysqli_query($koneksi, $sql);

    // Jika buku sudah dipinjam, kirim respons 'dipinjam'
    if (mysqli_num_rows($result) > 0) {
        echo 'dipinjam';
    }
}
?>