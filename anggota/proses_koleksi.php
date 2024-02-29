<?php
include 'koneksi.php';
// Periksa apakah pengguna sudah login dan memiliki sesi
session_start();
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, kembalikan respons untuk login atau sesi kadaluwarsa
    echo "Unauthorized";
    exit;
}

// Peroleh ID buku dari permintaan POST
$buku_id = $_POST['buku_id'];

// Masukkan data buku ke dalam tabel koleksi_pribadi
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO koleksi_pribadi (user_id, buku_id, created_at) VALUES ($user_id, $buku_id, NOW())";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "Buku berhasil difavoritkan";
} else {
    echo "Gagal menambahkan bookmark";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>