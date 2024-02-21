<?php 
    include "koneksi.php";

    // Ambil data admin dari tabel user yang memiliki role 'admin'
    $sql_admin = "SELECT * FROM user WHERE role = 'admin'";
    $result_admin = mysqli_query($koneksi, $sql_admin);

    // Loop untuk menyimpan data admin ke tabel petugas
    if (mysqli_num_rows($result_admin) > 0) {
        while ($row_admin = mysqli_fetch_assoc($result_admin)) {
            // Insert data admin ke tabel petugas
            $username = $row_admin['username'];
            $email = $row_admin['email'];
            $nama_lengkap = $row_admin['nama_lengkap'];
            $no_hp = $row_admin['no_hp'];
            $alamat = $row_admin['alamat'];
            $role = 'petugas'; // Atur role sebagai 'petugas'

            $insert_sql = "INSERT INTO petugas (username, email, nama_lengkap, no_hp, alamat, role) 
                           VALUES ('$username', '$email', '$nama_lengkap', '$no_hp', '$alamat', '$role')";
            mysqli_query($koneksi, $insert_sql);
        }
    }
?>