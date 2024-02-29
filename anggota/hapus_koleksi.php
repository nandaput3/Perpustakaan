<?php
// Include file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// Cek apakah parameter buku_id telah dikirim melalui permintaan POST
if(isset($_POST['buku_id'])) {
    // Tangkap nilai buku_id dari permintaan POST
    $buku_id = $_POST['buku_id'];

    // Lakukan query untuk menghapus bookmark berdasarkan buku_id
    $sql_delete = "DELETE FROM koleksi_pribadi WHERE buku_id = $buku_id";

    // Jalankan query
    if(mysqli_query($koneksi, $sql_delete)) {
        // Jika query berhasil dijalankan, kirim respons berhasil
        echo "success";
    } else {
        // Jika terjadi kesalahan saat menjalankan query, kirim respons error
        echo "error";
    }
} else {
    // Jika parameter buku_id tidak dikirim, kirim respons error
    echo "error";
}
?>