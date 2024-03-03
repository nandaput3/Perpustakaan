<?php
// Sisipkan file koneksi.php
include 'koneksi.php';

// Ambil tanggal hari ini
$currentDate = date("Y-m-d");

// Perbarui status peminjaman yang melewati tenggat waktu
$sql_expired = "SELECT * FROM peminjaman WHERE tgl_kembali < '$currentDate' AND status_pinjam = 'dipinjam'";
$result_expired = mysqli_query($koneksi, $sql_expired);

// Loop melalui peminjaman yang melewati tenggat waktu dan perbarui statusnya
while($row_expired = mysqli_fetch_assoc($result_expired)) {
    $pinjam_id = $row_expired['peminjaman_id'];
    
    // Perbarui status peminjaman menjadi 'telat'
    $updateSql1 = "UPDATE peminjaman SET status_pinjam = 'telat' WHERE peminjaman_id = $pinjam_id";
    $updateResult1 = mysqli_query($koneksi, $updateSql1);
    
    // Jika gagal melakukan pembaruan, tangani kesalahan di sini

    // Mengembalikan stok buku yang terkait
    $buku_id = $row_expired['buku_id'];
    $updateStokSql = "UPDATE buku SET stok = stok + 1 WHERE buku_id = $buku_id";
    $updateStokResult = mysqli_query($koneksi, $updateStokSql);
    
    // Jika gagal melakukan pembaruan, tangani kesalahan di sini
    
    // Menambahkan informasi tentang keterlambatan pengembalian ke dalam log atau melaporkannya
    $keterangan = "Pengembalian terlambat dari peminjaman ID: $pinjam_id";
    $insertLogSql = "INSERT INTO log_pengembalian (peminjaman_id, keterangan, tanggal) VALUES ($pinjam_id, '$keterangan', '$currentDate')";
    $insertLogResult = mysqli_query($koneksi, $insertLogSql);
    
    // Jika gagal melakukan penyisipan log, tangani kesalahan di sini
}

// Tutup koneksi database
mysqli_close($koneksi);
?>