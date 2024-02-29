<?php
// Sambungkan ke database
$koneksi = new mysqli("localhost", "username", "password", "nama_database");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil ID buku dari parameter URL
$buku_id = $_GET['buku_id'];

// Query untuk mengambil lokasi PDF dari database
$sql = "SELECT lokasi_pdf FROM buku WHERE id = $buku_id";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    // Jika data ditemukan
    $row = $result->fetch_assoc();
    
    // Tentukan lokasi file PDF
    $lokasi_pdf = $row['lokasi_pdf'];
    
    // Pastikan file PDF ada
    if (file_exists($lokasi_pdf)) {
        // Tentukan header sebagai PDF
        header('Content-type: application/pdf');
        
        // Baca dan tampilkan file PDF
        readfile($lokasi_pdf);
    } else {
        echo "File PDF tidak ditemukan.";
    }
} else {
    echo "Data buku tidak ditemukan.";
}

// Tutup koneksi
$koneksi->close();
?>