<?php
// Sisipkan koneksi ke database atau file konfigurasi lainnya
include 'koneksi.php';

// Pastikan tanggal mulai dan tanggal selesai telah dipilih
if(isset($_GET['tgl_pinjam']) && isset($_GET['tgl_kembali'])) {
    // Ambil nilai tanggal mulai dan tanggal selesai dari form
    $tgl_pinjam = $_GET['tgl_pinjam'];
    $tgl_kembali = $_GET['tgl_kembali'];

    // Buat query untuk memfilter data berdasarkan rentang tanggal
    $sql = "SELECT * FROM peminjaman WHERE tgl_pinjam BETWEEN ? AND ?";
    
    // Persiapkan prepared statement untuk menjalankan query
    $stmt = mysqli_prepare($koneksi, $sql);
    
    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $tgl_pinjam, $tgl_kembali);
    
    // Eksekusi prepared statement
    mysqli_stmt_execute($stmt);
    
    // Ambil hasil query
    $result = mysqli_stmt_get_result($stmt);
    
    // Tampilkan data peminjaman yang sudah difilter
    echo "<h2>Daftar Peminjaman</h2>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>Nama: " . $row['nama_lengkap'] . ", tgl_pinjam: " . $row['tgl_pinjam'] . "</li>";
    }
    echo "</ul>";

    // Tutup statement dan koneksi
    mysqli_stmt_close($stmt);
} else {
    // Jika tanggal mulai atau tanggal selesai tidak dipilih, tampilkan pesan
    echo "Pilih rentang tanggal untuk melakukan filter.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>