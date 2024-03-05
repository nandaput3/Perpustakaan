<?php
include 'koneksi.php';

if(isset($_POST['search'])) {
    $search = $_POST['search'];
    // Query untuk mencari buku berdasarkan judul atau kategori
    $sql = "SELECT buku.*, buku_kategori.nama_kategori FROM buku INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id WHERE buku.judul LIKE '%$search%' OR buku_kategori.nama_kategori LIKE '%$search%'";
    $result = mysqli_query($koneksi, $sql);

    $output = '';
    while($data = mysqli_fetch_assoc($result)) {
        // Generate HTML untuk setiap buku yang cocok dengan pencarian
        $output .= '<div class="book-container">';
        $output .= '<a href="detail_baca.php?id=' . $data['buku_id'] . '">';
        $output .= '<div class="book-cover" style="background-image: url(\'' . $data['cover'] . '\')"></div>';
        $output .= '</a>';
        $output .= '<div class="book-title">' . $data['judul'] . '</div>';
        $output .= '<div class="book-details">';
        $output .= '<p> ' . $data['penulis'] . '</p>';
        $output .= '<p>Kategori: ' . $data['nama_kategori'] . '</p>';
        $output .= '</div>';
        $output .= '<div class="action-buttons">';
        $output .= '<a href="proses_koleksi.php?buku_id=' . $data['buku_id'] . '" id="tambahKoleksi"><button type="button" class="btn btn-info"><i class="fas fa-heart"></i></button></a>';
        $output .= '</div>';
        $output .= '</div>';
    }
    echo $output;
}
?>