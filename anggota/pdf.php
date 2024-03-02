<?php
include 'koneksi.php';

// Pastikan buku_id tersedia dalam parameter GET
if(isset($_GET['buku_id'])) {
    $buku_id = $_GET['buku_id'];

    // Ambil data buku dari database berdasarkan buku_id
    $sql = "SELECT * FROM buku WHERE buku_id = $buku_id";
    $result = mysqli_query($koneksi, $sql);

    // Periksa apakah buku ditemukan
    if(mysqli_num_rows($result) > 0) {
        $data_buku = mysqli_fetch_assoc($result);
        $pdf_path = $data_buku['pdf_path'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MACA</title>
</head>

<body>

    <!-- Embed PDF -->
    <embed src="<?= $pdf_path ?>" type="application/pdf" width="100%" height="600px">

</body>

</html>
<?php
    } else {
        echo "Buku tidak ditemukan.";
    }
} else {
    echo "Parameter buku_id tidak tersedia.";
}
?>