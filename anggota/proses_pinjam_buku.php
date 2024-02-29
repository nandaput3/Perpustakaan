<?php
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa jika pengguna sudah login
    if (!isset($_SESSION["user_id"])) {
        // Alihkan pengguna ke halaman login jika belum login
        header("Location: login.php");
        exit();
    }
    
    // Ambil ID buku dari pengiriman formulir
    $buku_id = isset($_POST['buku_id']) ? intval($_POST['buku_id']) : 0;

    // Ambil ID pengguna dari sesi
    $user_id = $_SESSION["user_id"];

    // Masukkan ke dalam tabel peminjaman
    $tgl_pinjam = date("Y-m-d");
    $tgl_kembali = date("Y-m-d", strtotime("+1 days")); // Contoh: 7 hari dari sekarang
    $status_pinjam = 'dipinjam';

    $query = "INSERT INTO peminjaman (buku_id, tgl_pinjam, user_id, tgl_kembali, status_pinjam) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "isiss", $buku_id, $tgl_pinjam, $user_id, $tgl_kembali, $status_pinjam);
    
    if (mysqli_stmt_execute($stmt)) {
        // Alihkan pengguna ke halaman sukses atau lakukan proses lebih lanjut
        header("Location: data_peminjaman_buku.php");
        exit();
    } else {
        // Tangani kesalahan
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
}
?>