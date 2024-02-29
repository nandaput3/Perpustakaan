<?php
include 'koneksi.php';

// Set nilai perpustakaan secara langsung
$perpustakaan = 1; // Ubah nilai ID perpustakaan sesuai kebutuhan Anda

// Cek apakah form registrasi telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $role = 'user';

    // Cek apakah email yang dimasukkan sudah ada dalam database
    $query_check_email = "SELECT COUNT(*) FROM user WHERE email = ?";
    $stmt_check_email = mysqli_prepare($koneksi, $query_check_email);
    mysqli_stmt_bind_param($stmt_check_email, "s", $email);
    mysqli_stmt_execute($stmt_check_email);
    mysqli_stmt_bind_result($stmt_check_email, $email_count);
    mysqli_stmt_fetch($stmt_check_email);
    mysqli_stmt_close($stmt_check_email);

    if ($email_count > 0) {
        // Email sudah digunakan, beri peringatan
        echo "<script>alert('Email sudah digunakan');</script>";
    } else {
        // Email belum digunakan, lanjutkan proses registrasi
        // Siapkan query untuk memasukkan data ke database
        $query = "INSERT INTO user (perpus_id, username, password, email, nama_lengkap, no_hp, alamat, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Siapkan prepared statement
        if ($stmt = mysqli_prepare($koneksi, $query)) {
            // Bind variabel ke prepared statement sebagai parameter
            mysqli_stmt_bind_param($stmt, "issssiss", $perpustakaan, $username, $password, $email, $nama_lengkap, $no_hp, $alamat, $role);

            // Eksekusi prepared statement
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>
                    alert('Registrasi berhasil')
                    window.location.href='data_user.php'
                </script>";
            } else {
                echo "Terjadi kesalahan: " . mysqli_stmt_error($stmt);
            }

            // Tutup statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
        }
    }
}
?>