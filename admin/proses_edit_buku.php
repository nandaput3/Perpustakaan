<?php
    // Include file koneksi.php untuk menghubungkan ke database
    include "koneksi.php";

    // Periksa apakah data dari formulir telah dikirim
    if(isset($_POST['id'])) {
        // Ambil data dari formulir
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $stok = $_POST['stok']; // Ambil data stok dari formulir
        $kategori_id = $_POST['kategori'];

        // Query untuk mengupdate data buku di database
        $query = "UPDATE buku SET 
                    judul = '$judul', 
                    penulis = '$penulis', 
                    penerbit = '$penerbit', 
                    tahun_terbit = '$tahun_terbit', 
                    stok = '$stok', 
                    kategori_id = '$kategori_id' 
                  WHERE buku_id = $id";
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah proses query berhasil
        if($result) {
            // Redirect kembali ke halaman data_buku.php setelah data berhasil diubah
            header("Location: data_buku.php");
            exit();
        } else {
            echo "Gagal mengubah data buku.";
        }
    } else {
        echo "Data buku tidak ditemukan.";
    }
?>