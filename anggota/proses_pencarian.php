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
        // Menampilkan cover buku dengan alamat URL dari database
        $output .= '<div class="book-cover" style="background-image: url(\'' . $data['cover'] . '\')"></div>';
        $output .= '<div class="book-title">' . $data['judul'] . '</div>';
        $output .= '<div class="book-details">';
        $output .= '<p>Rating: ' . $data['rating'] . '</p>';
        $output .= '<p>Penulis: ' . $data['penulis'] . '</p>';
        $output .= '<p>Tahun Terbit: ' . $data['tahun_terbit'] . '</p>';
        if ($data['kategori_id'] == 1) {
            $output .= '<p>Kategori: Fiksi</p>';
        } else {
            $output .= '<p>Kategori: Non-Fiksi</p>';
        }
        $output .= '</div>';
        $output .= '<div class="action-buttons">';
        $output .= '<a href="detail_baca.php?id=' . $data['buku_id'] . ' ' . $data['judul'] . '"><button type="button" class="btn btn-primary"><i class="fas fa-book-open"></i></button></a>';
        $output .= '<a href="ulasan.php?id=' . $data['buku_id'] . ' ' . $data['judul'] . '"><button type="button" class="btn btn-warning"><i class="fas fa-comment"></i></button></a>';
        $output .= '<a href="proses_koleksi.php?buku_id" id="tambahKoleksi"><button type="button" class="btn btn-danger"><i class="fas fa-bookmark"></i></button></a>';
        $output .= '<button type="button" class="btn btn-success pinjam-btn" data-id="' . $data['buku_id'] . '" data-judul="' . $data['judul'] . '" onclick="disableButton(this)"><i class="fas fa-plus"></i></button>';
        $output .= '</div>';
        $output .= '</div>';
    }
    echo $output;
}
?>