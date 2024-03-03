<?php
include 'koneksi.php';

$currentDate = date("Y-m-d");

// Perbarui status peminjaman terlebih dahulu
$buku_id = $_POST["buku_id"]; // tambahkan ini untuk mendapatkan id buku yang dikembalikan

$pinjamid = $_POST['pinjam_id'];
$updateSql1 = "UPDATE peminjaman SET status_pinjam = 'dikembalikan', tgl_kembali = '$currentDate' WHERE peminjaman_id = $pinjamid";
$updateResult1 = mysqli_query($koneksi, $updateSql1);

if (!$updateResult1) {
    die("Error: " . mysqli_error($koneksi));
}

// Mengembalikan stok buku yang terkait
$sql = "SELECT * FROM peminjaman WHERE peminjaman_id = $pinjamid";
$result = mysqli_query($koneksi, $sql);
if (!$result) {
    die("Error: " . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);
$buku_id = $row['buku_id'];
// Mengembalikan stok buku yang terkait
$updateStokSql = "UPDATE buku SET stok = stok + 1 WHERE buku_id = $buku_id";
$updateStokResult = mysqli_query($koneksi, $updateStokSql);

if (!$updateStokResult) {
    die("Error: " . mysqli_error($koneksi));
}



// Menambahkan informasi tentang keterlambatan pengembalian ke dalam sistem atau melaporkannya
$keterangan = "Pengembalian terlambat dari peminjaman ID: $pinjamid";
$insertLogSql = "INSERT INTO log_pengembalian (peminjaman_id, keterangan, tanggal) VALUES ($pinjamid, '$keterangan', '$currentDate')";
$insertLogResult = mysqli_query($koneksi, $insertLogSql);

if (!$insertLogResult) {
    die("Error: " . mysqli_error($koneksi));
}

echo "Pemeriksaan dan pengembalian otomatis selesai.";
?>