<?php
include 'koneksi.php'; // Sertakan file koneksi database
session_start();
// Pastikan metode yang digunakan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui formulir
    $buku_id = $_POST['buku_id'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    // Siapkan dan eksekusi query untuk menyimpan ulasan ke dalam database
    $query = "INSERT INTO buku_ulasan (buku_id, user_id, ulasan, rating, created_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt = mysqli_prepare($koneksi, $query);

    // Untuk sementara, user_id diisi statis dengan angka 1. Anda bisa menyesuaikan dengan sesuai dengan struktur autentikasi di aplikasi Anda.
    $user_id = $_SESSION['user_id'];

    mysqli_stmt_bind_param($stmt, 'iisi', $buku_id, $user_id, $ulasan, $rating);
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // Jika berhasil disimpan, arahkan kembali ke halaman detail buku
        header("Location: detail_baca.php?id=$buku_id");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>