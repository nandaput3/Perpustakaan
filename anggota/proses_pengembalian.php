<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Terima data dari permintaan POST
    $pinjam_id = $_POST['pinjam_id'];
    $tanggal_pengembalian = date('Y-m-d'); // Atur tanggal pengembalian sesuai dengan tanggal saat ini

    // Perbarui tanggal pengembalian di database
    $query = "UPDATE peminjaman SET tgl_kembali='$tanggal_pengembalian' WHERE pinjam_id=$pinjam_id";
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil memperbarui tanggal pengembalian, kirim respon berhasil
        echo "success";
    } else {
        // Jika terjadi kesalahan, kirim respon dengan pesan error
        echo "error";
    }
}
?>