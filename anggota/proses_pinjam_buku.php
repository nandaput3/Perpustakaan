<?php
include 'koneksi.php';
session_start();

// Pastikan ada data yang dikirimkan melalui URL
if(isset($_GET['id'])) {
    // Tangkap data ID buku dari URL
    $buku_id = $_GET['id'];

    // Variabel $user_id bisa diganti sesuai dengan user yang sedang aktif
    $user_id = $_SESSION['user_id']; // Ganti dengan user_id yang sesuai

    // Tanggal pinjam, dapat menggunakan tanggal saat ini
    $tgl_pinjam = date('Y-m-d');

    // Tanggal kembali, bisa diatur sesuai kebutuhan, contoh: 7 hari setelah tanggal pinjam
    $tgl_kembali = "0000-00-00";

    // Status pinjam awal, bisa disesuaikan dengan kebutuhan
    $status_pinjam = 'dipinjam';

    // Query SQL untuk memasukkan data pinjaman buku ke dalam database
    $sql = "INSERT INTO peminjaman (user_id, buku_id, tgl_pinjam, tgl_kembali, status_pinjam) VALUES ('$user_id', '$buku_id', '$tgl_pinjam', '$tgl_kembali', '$status_pinjam')";
    $result = mysqli_query($koneksi,$sql);

    // Eksekusi query dan periksa apakah berhasil
    if($result) {
        echo "<script>alert('Data pinjaman buku berhasil ditambahkan.'); window.location.href = 'data_peminjaman_buku.php?pinjam_id;
</script>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
} else {
echo "ID buku tidak ditemukan.";
}
?>