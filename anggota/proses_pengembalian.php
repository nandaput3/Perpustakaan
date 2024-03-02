<?php
include 'koneksi.php';

// Mendapatkan tanggal sekarang dengan format yang sesuai dengan MySQL
$currentDate = date("Y-m-d");

// Query untuk mengambil data peminjaman yang masih berstatus "dipinjam" dan melebihi tanggal kembali
$sql = "SELECT * FROM peminjaman WHERE status_pinjam = 'dipinjam' AND tgl_kembali < '$currentDate'";
$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Error: " . mysqli_error($koneksi)); // Tambahkan penanganan kesalahan
}

// Perbarui status peminjaman yang sudah lewat tanggal kembali menjadi "dikembalikan"
while ($row = mysqli_fetch_assoc($result)) {
    $peminjaman_id = $row['peminjaman_id'];
    
    // Perbarui status menjadi "dikembalikan"
    $updateSql = "UPDATE peminjaman SET status_pinjam = 'dikembalikan', tgl_kembali = '$currentDate' WHERE peminjaman_id = $peminjaman_id";
    $updateResult = mysqli_query($koneksi, $updateSql);

    if (!$updateResult) {
        die("Error: " . mysqli_error($koneksi)); // Tambahkan penanganan kesalahan
    }
    
    // Mengembalikan stok buku yang terkait
    $buku_id = $row['buku_id'];
    $updateStokSql = "UPDATE buku SET stok = stok + 1 WHERE buku_id = $buku_id";
    $updateStokResult = mysqli_query($koneksi, $updateStokSql);

    if (!$updateStokResult) {
        die("Error: " . mysqli_error($koneksi)); // Tambahkan penanganan kesalahan
    }
    
    // Menambahkan informasi tentang keterlambatan pengembalian ke dalam sistem atau melaporkannya
    // Contoh: mencatat keterlambatan pengembalian ke dalam tabel log
    $keterangan = "Pengembalian terlambat dari peminjaman ID: $peminjaman_id";
    $insertLogSql = "INSERT INTO log_pengembalian (peminjaman_id, keterangan, tanggal) VALUES ($peminjaman_id, '$keterangan', '$currentDate')";
    $insertLogResult = mysqli_query($koneksi, $insertLogSql);

    if (!$insertLogResult) {
        die("Error: " . mysqli_error($koneksi)); // Tambahkan penanganan kesalahan
    }
}

// Setelah semua proses selesai, hapus entri peminjaman yang sudah dikembalikan dari tampilan peminjaman
$deleteSql = "DELETE FROM peminjaman WHERE status_pinjam = 'dikembalikan'";
$deleteResult = mysqli_query($koneksi, $deleteSql);

if (!$deleteResult) {
    die("Error: " . mysqli_error($koneksi)); // Tambahkan penanganan kesalahan
}

echo "Pemeriksaan dan pengembalian otomatis selesai.";
?>