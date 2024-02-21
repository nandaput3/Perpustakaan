<?php
include 'koneksi.php';

// Cek apakah form registrasi telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role']; // Ambil role dari form

    // Siapkan query untuk memasukkan data ke database
    $query = "INSERT INTO user (username, password, email, nama_lengkap, no_hp, alamat, role) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Siapkan prepared statement
    if ($stmt = mysqli_prepare($koneksi, $query)) {
        // Bind variabel ke prepared statement sebagai parameter
        mysqli_stmt_bind_param($stmt, "sssssss", $username, $password, $email, $nama_lengkap, $no_hp, $alamat, $role);

        // Eksekusi prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Registrasi berhasil, lakukan pengalihan
            header("Location: data_user.php");
            exit; // Penting: pastikan untuk keluar dari skrip setelah melakukan pengalihan
        } else {
            echo "Terjadi kesalahan: " . mysqli_stmt_error($stmt);
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
?>