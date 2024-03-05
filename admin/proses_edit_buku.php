<?php
include 'koneksi.php';

// Pastikan nilai-nilai variabel telah diisi dengan nilai yang benar
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$stok = $_POST['stok'];
$kategori_id = $_POST['kategori']; // Ubah menjadi 'kategori'
$id = $_POST['id']; // Ubah menjadi 'id'

// Update data buku
$query = "UPDATE buku SET 
            judul = ?, 
            penulis = ?, 
            penerbit = ?, 
            tahun_terbit = ?, 
            stok = ?, 
            kategori_id = ?
          WHERE buku_id = ?";

// Prepare statement
$stmt = mysqli_prepare($koneksi, $query);

// Periksa kesiapan statement
if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssiii", $judul, $penulis, $penerbit, $tahun_terbit, $stok, $kategori_id, $id);
    
    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Periksa apakah proses query berhasil
    if($result) {
        // Redirect kembali ke halaman data_buku.php setelah data berhasil diubah
        header("Location: data_buku.php");
        exit();
    } else {
        echo "Gagal mengubah data buku: " . mysqli_error($koneksi); // Tampilkan pesan kesalahan SQL
    }
} else {
    echo "Gagal menyiapkan statement: " . mysqli_error($koneksi); // Tampilkan pesan kesalahan SQL
}
?>