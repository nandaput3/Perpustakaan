<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buku_id = $_POST['buku_id'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    // Lakukan validasi jika diperlukan

    $query = "INSERT INTO buku_ulasan (buku_id, ulasan, rating) VALUES ('$buku_id', '$ulasan', '$rating')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect atau tampilkan pesan sukses
        header("Location: detail_baca.php?id=$buku_id");
        exit;
    } else {
        // Tampilkan pesan error jika penyimpanan gagal
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>