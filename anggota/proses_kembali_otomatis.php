<?php
include "koneksi.php";

// Mendapatkan tanggal sekarang
$currentDate = date("Y-m-d");

// Query untuk mengambil data peminjaman yang masih berstatus "dipinjam" dan melebihi tanggal kembali
$sql = "SELECT * FROM peminjaman WHERE status_pinjam = 'dipinjam' AND tgl_kembali < '$currentDate'";
$result = mysqli_query($koneksi, $sql);

// Perbarui status peminjaman yang sudah lewat tanggal kembali menjadi "dikembalikan"
while ($row = mysqli_fetch_assoc($result)) {
    $peminjaman_id = $row['peminjaman_id'];
    
    // Perbarui status menjadi "dikembalikan" di database
    $updateSql = "UPDATE peminjaman SET status_pinjam = 'dikembalikan' WHERE peminjaman_id = $peminjaman_id";
    mysqli_query($koneksi, $updateSql);
    
    // Mengembalikan stok buku yang terkait
    $buku_id = $row['buku_id'];
    $updateStokSql = "UPDATE buku SET stok = stok + 1 WHERE buku_id = $buku_id";
    mysqli_query($koneksi, $updateStokSql);
    
    // Anda juga dapat melakukan pemberitahuan atau logging di sini sesuai kebutuhan
    
    // Contoh: Logging keterlambatan pengembalian
    $keterangan = "Peminjaman terlambat dikembalikan otomatis";
    $logSql = "INSERT INTO log_pengembalian (peminjaman_id, keterangan, tanggal) VALUES ($peminjaman_id, '$keterangan', '$currentDate')";
    mysqli_query($koneksi, $logSql);
}

// Notifikasi pengembalian otomatis selesai
echo "Pengembalian otomatis selesai.";
?>