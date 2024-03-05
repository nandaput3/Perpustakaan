<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include('koneksi.php');

    // Ambil nilai kategori baru dari form jika tersedia
// Ambil nilai kategori baru dari form jika tersedia
$kategori_baru = isset($_POST['namaKategori']) ? $_POST['namaKategori'] : '';

    // Lakukan pengecekan jika kategori baru tidak kosong
    if (!empty($kategori_baru)) {
        // Simpan kategori baru ke dalam tabel buku_kategori
        $insert_kategori_sql = "INSERT INTO buku_kategori (nama_kategori) VALUES ('$kategori_baru')";
        if ($koneksi->query($insert_kategori_sql) === TRUE) {
            // Ambil id kategori baru yang telah disimpan
            $buku_kategori = $conn->insert_id;
            echo "Kategori baru berhasil ditambahkan.";
            header("Location: create_kategori.php");
        } else {
            echo "Error: " . $insert_kategori_sql . "<br>" . $conn->error;
        }
    } else {
        echo "Nama kategori tidak boleh kosong.";
    }

    // Close database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the form page
    exit();
}
?>