<?php
// Sertakan file koneksi ke database
include 'koneksi.php';

// Ambil data koleksi dari database
$sql = "SELECT buku.*, buku_kategori.nama_kategori FROM buku INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id";
$result = mysqli_query($koneksi, $sql);

// Periksa apakah ada data koleksi
if (mysqli_num_rows($result) > 0) {
    // Mulai membangun konten HTML
    $output = '<table>';
    $output .= '<tr><th>Judul</th><th>Penulis</th><th>Tahun Terbit</th><th>Kategori</th><th>Aksi</th></tr>';
    
    // Loop untuk setiap data koleksi
    while ($data = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        $output .= '<td>' . $data['judul'] . '</td>';
        $output .= '<td>' . $data['penulis'] . '</td>';
        $output .= '<td>' . $data['tahun_terbit'] . '</td>';
        $output .= '<td>' . ($data['kategori_id'] == 1 ? 'Fiksi' : 'Non-Fiksi') . '</td>'; // Asumsikan kategori_id 1 adalah untuk buku Fiksi
        $output .= '<td class="aksi">';
        $output .= '<button onclick="pinjamBuku(' . $data['buku_id'] . ')">Pinjam</button>'; // Tombol untuk meminjam buku
        $output .= '<button onclick="hapusBuku(' . $data['buku_id'] . ')">Hapus</button>'; // Tombol untuk menghapus buku
        $output .= '</td>';
        $output .= '</tr>';
    }
    
    $output .= '</table>';
    
    // Tampilkan konten HTML
    echo $output;
} else {
    // Jika tidak ada data koleksi
    echo '<p>Tidak ada buku dalam koleksi.</p>';
}
?>