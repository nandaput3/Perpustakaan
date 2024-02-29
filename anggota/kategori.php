<?php
// Lakukan koneksi ke database di sini
include 'koneksi.php'; // Sesuaikan dengan nama file koneksi Anda

// Periksa apakah parameter kategori telah diterima dari URL
if(isset($_GET['kategori_id'])) {
    $kategori_id = $_GET['kategori_id'];
    
    // Query untuk mendapatkan buku berdasarkan kategori yang dipilih
    $query = "SELECT buku.*, buku_kategori.nama_kategori 
              FROM buku 
              INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id
              WHERE buku.kategori_id = $kategori_id";
    $result = mysqli_query($koneksi, $query);
    
    // Jika tidak ada buku yang ditemukan
    if(mysqli_num_rows($result) == 0) {
        echo "Tidak ada buku dalam kategori ini.";
    } else {
        // Tampilkan daftar buku dalam bentuk container
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='book-container'>";
            echo "<a href='detail_baca.php?id=".$row['buku_id']."'>";
            
            // Periksa apakah cover buku tersedia
            if(!empty($row['cover']) && file_exists($row['cover'])) {
                echo "<div class='book-cover' style='background-image: url(".$row['cover'].")'></div>";
            } else {
                // Tampilkan placeholder jika cover buku tidak tersedia
                echo "<div class='book-cover-placeholder'>Cover tidak tersedia</div>";
            }
            
            echo "</a>";
            echo "<div class='book-title'>".$row['judul']."</div>";
            echo "<div class='book-details'>";
            echo "<p>".$row['penulis']."</p>";
            echo "<p>Kategori: ".$row['nama_kategori']."</p>";
            echo "</div>";
            echo "<div class='action-buttons'>";
            echo "<a href='proses_koleksi.php?buku_id=".$row['buku_id']."' id='tambahKoleksi'><button type='button' class='btn btn-info'><i class='fas fa-regular fa-heart'></i></button></a>";
            echo "</div>";
            echo "</div>";
        }
    }
} else {
    echo "Kategori tidak valid.";
}
?>