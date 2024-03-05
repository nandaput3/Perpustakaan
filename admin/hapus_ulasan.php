<?php
// Pastikan hanya request POST yang diterima
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah ID ulasan dikirim melalui permintaan
    if (isset($_POST['id'])) {
        // Sertakan file koneksi
        include "koneksi.php";

        // Escape input untuk menghindari SQL injection
        $ulasan_id = mysqli_real_escape_string($koneksi, $_POST['id']);

        // Query untuk menghapus ulasan berdasarkan ID
        $query = "DELETE FROM buku_ulasan WHERE ulasan_id = '$ulasan_id'";
        
        // Jalankan query
        if (mysqli_query($koneksi, $query)) {
            // Jika penghapusan berhasil
            echo "Ulasan berhasil dihapus.";
        } else {
            // Jika terjadi kesalahan saat menghapus
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    } else {
        // Jika ID ulasan tidak dikirimkan melalui permintaan
        echo "ID ulasan tidak tersedia.";
    }
} else {
    // Jika bukan request POST
    echo "Metode request yang diperbolehkan hanya POST.";
}
?>