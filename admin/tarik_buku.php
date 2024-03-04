<?php
// Sisipkan koneksi ke database atau file konfigurasi lainnya
include 'koneksi.php';

// Pastikan pinjam_id telah diset dan memiliki nilai
if(isset($_POST['peminjaman_id'])) {
    // Ambil ID peminjaman dari form
    $peminjaman_id = $_POST['peminjaman_id'];

    // Update status peminjaman menjadi "dikembalikan" dengan prepared statement
    $sql_update_peminjaman = "UPDATE peminjaman SET status_pinjam = 'dikembalikan' WHERE peminjaman_id = ?";
    
    // Persiapkan prepared statement untuk update status peminjaman
    $stmt_update_peminjaman = mysqli_prepare($koneksi, $sql_update_peminjaman);
    
    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt_update_peminjaman, "i", $peminjaman_id);
    
    // Eksekusi prepared statement untuk update status peminjaman
    if (mysqli_stmt_execute($stmt_update_peminjaman)) {
        // Pemberitahuan sukses
        echo "Status peminjaman berhasil diperbarui.";
        
        // Lakukan pembaruan stok buku setelah status peminjaman diubah
        // Ambil buku_id terkait dari tabel peminjaman
        $sql_get_buku_id = "SELECT buku_id FROM peminjaman WHERE peminjaman_id = ?";
        $stmt_get_buku_id = mysqli_prepare($koneksi, $sql_get_buku_id);
        mysqli_stmt_bind_param($stmt_get_buku_id, "i", $peminjaman_id);
        mysqli_stmt_execute($stmt_get_buku_id);
        mysqli_stmt_store_result($stmt_get_buku_id);
        mysqli_stmt_bind_result($stmt_get_buku_id, $buku_id);
        mysqli_stmt_fetch($stmt_get_buku_id);
        
        // Update stok buku dengan menambah 1
        $sql_update_stok = "UPDATE buku SET stok = stok + 1 WHERE buku_id = ?";
        $stmt_update_stok = mysqli_prepare($koneksi, $sql_update_stok);
        mysqli_stmt_bind_param($stmt_update_stok, "i", $buku_id);
        mysqli_stmt_execute($stmt_update_stok);
        
        // Menambahkan informasi tentang proses pengembalian ke dalam log
       // $keterangan = "Pengembalian dari peminjaman ID: $peminjaman_id";
        //$insertLogSql = "INSERT INTO log_pengembalian (peminjaman_id, keterangan, tanggal) VALUES (?, ?, ?)";
        //$stmt_insert_log = mysqli_prepare($koneksi, $insertLogSql);
        //$currentDate = date("Y-m-d");
        //mysqli_stmt_bind_param($stmt_insert_log, "iss", $peminjaman_id, $keterangan, $currentDate);
        //mysqli_stmt_execute($stmt_insert_log);
        
        // Tutup statement untuk mengambil buku_id
       // mysqli_stmt_close($stmt_get_buku_id);
       // mysqli_stmt_close($stmt_insert_log);
        
        // Lakukan pengiriman pemberitahuan ke pengguna jika diperlukan
        // Misalnya: email, pesan di aplikasi, dll.
    } else {
        // Pemberitahuan gagal
        echo "Error: " . $sql_update_peminjaman . "<br>" . mysqli_error($koneksi);
    }

    // Tutup statement untuk update status peminjaman
    mysqli_stmt_close($stmt_update_peminjaman);
} else {
    // Jika pinjam_id tidak diset, berikan pesan kesalahan
    echo "Error: pinjam_id tidak ditemukan.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>