<?php
include('koneksi.php');
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION["user_id"])) {
    // Jika belum, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Tangkap data buku_id dari parameter URL
if (isset($_GET["buku_id"])) {
    // Ambil user_id dari sesi
    $user_id = $_SESSION["user_id"];
    $buku_id = $_GET["buku_id"];

    // Sambungkan ke database
    include 'koneksi.php';

    // Periksa koneksi database
    if ($koneksi === false) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Query untuk menambahkan buku ke koleksi pribadi pengguna
    $query = "INSERT INTO koleksi_pribadi (user_id, buku_id) VALUES (?, ?)";

    // Persiapkan pernyataan
    if ($stmt = mysqli_prepare($koneksi, $query)) {
        // Ikat parameter ke pernyataan
        mysqli_stmt_bind_param($stmt, "ii", $user_id, $buku_id);

        // Eksekusi pernyataan
        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil ditambahkan, tampilkan notifikasi dan refresh bagian halaman tertentu
            echo '<script>alert("Berhasil menambahkan koleksi."); window.location.href = "data_koleksi.php";</script>';
            exit(); // Pastikan keluar dari skrip setelah menampilkan notifikasi dan memperbarui halaman
        } else {
            // Jika gagal, tampilkan pesan error eksekusi pernyataan
            echo "Error: " . mysqli_error($koneksi);
        }

        // Tutup pernyataan
        mysqli_stmt_close($stmt);
    } else {
        // Jika gagal mempersiapkan pernyataan, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
} else {
    echo "Buku ID tidak ditemukan.";
}
?>