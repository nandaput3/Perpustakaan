<?php
// Include file koneksi ke database
include 'koneksi.php';

// Pastikan parameter peminjaman_id terdefinisi
if(isset($_GET['peminjaman_id'])) {
    // Tangkap peminjaman_id dari URL
    $peminjaman_id = $_GET['peminjaman_id'];

    // Query untuk mengupdate tanggal kembali ke tanggal saat ini
    $tgl_kembali = date('Y-m-d'); // Ambil tanggal saat ini
    $sql_update = "UPDATE peminjaman SET tgl_kembali = '$tgl_kembali', status_pinjam = 'Dikembalikan' WHERE peminjaman_id = $peminjaman_id";
    
    // Eksekusi query update
    if(mysqli_query($koneksi, $sql_update)) {
        echo "Buku telah berhasil dikembalikan.";
    } else {
        echo "Gagal mengembalikan buku: " . mysqli_error($koneksi);
    }
} else {
    echo "Parameter peminjaman_id tidak terdefinisi.";
}
?>