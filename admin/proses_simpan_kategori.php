<?php
// Include file koneksi.php untuk melakukan koneksi database
include "koneksi.php";

// Menerima data yang dikirimkan melalui AJAX
$namaKategori = $_POST['namaKategori'];

// Pastikan nama kategori tidak kosong
if(empty($namaKategori)) {
    // Jika nama kategori kosong, kirimkan respons error
    echo 'Nama kategori wajib diisi.';
} else {
    // Query untuk menyimpan kategori baru ke dalam database
    $query = "INSERT INTO buku_kategori (nama_kategori) VALUES ('$namaKategori')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika query berhasil dieksekusi, kirimkan respons berhasil
        echo 'Kategori berhasil disimpan.';
    } else {
        // Jika query gagal dieksekusi, kirimkan respons gagal beserta pesan kesalahan
        echo 'Gagal menyimpan kategori: ' . mysqli_error($koneksi);
    }
}

// Tutup koneksi database
mysqli_close($koneksi);
?>