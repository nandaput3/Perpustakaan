<?php
// Sertakan file koneksi.php untuk mendapatkan koneksi ke database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    // Query untuk melakukan update data pengguna berdasarkan ID
    $query = "UPDATE user SET username='$username', email='$email', nama_lengkap='$nama_lengkap', no_hp='$no_hp', alamat='$alamat', role='$role' WHERE user_id='$user_id'";

    // Jalankan query
    if (mysqli_query($koneksi, $query)) {
        // Jika update berhasil, redirect ke halaman data_user.php
        header("Location: data_user.php");
        exit;
    } else {
        // Jika update gagal, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>