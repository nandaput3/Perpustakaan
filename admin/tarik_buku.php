<?php
// Sisipkan koneksi ke database atau file konfigurasi lainnya
include 'koneksi.php';

// Pastikan pinjam_id telah diset dan memiliki nilai
if(isset($_POST['peminjaman_id'])) {
    // Ambil ID peminjaman dari form
    $peminjaman_id = $_POST['peminjaman_id'];

    // Update status peminjaman menjadi "ditarik" dengan prepared statement
    $sql = "UPDATE peminjaman SET status_pinjam = 'ditarik' WHERE peminjaman_id = ?";
    
    // Persiapkan prepared statement
    $stmt = mysqli_prepare($koneksi, $sql);
    
    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "i", $peminjaman_id);
    
    // Eksekusi prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Pemberitahuan sukses
        echo "Status peminjaman berhasil diperbarui.";
        // Lakukan pengiriman pemberitahuan ke pengguna jika diperlukan
        // Misalnya: email, pesan di aplikasi, dll.
    } else {
        // Pemberitahuan gagal
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    // Jika pinjam_id tidak diset, berikan pesan kesalahan
    echo "Error: pinjam_id tidak ditemukan.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>