<?php
include 'koneksi.php'; // Sertakan file koneksi database

$buku_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$result_ulasan = null; // Inisialisasi variabel $result_ulasan

// Periksa apakah $buku_id lebih besar dari 0
if ($buku_id > 0) {
    // Siapkan dan eksekusi query
    $query_ulasan = "SELECT * FROM buku_ulasan WHERE buku_id = ?";
    $stmt = mysqli_prepare($koneksi, $query_ulasan);
    mysqli_stmt_bind_param($stmt, 'i', $buku_id);
    mysqli_stmt_execute($stmt);
    $result_ulasan = mysqli_stmt_get_result($stmt);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Buku</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f3f3f3;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        /* Untuk membuat posisi relatif agar ikon tanda silang bisa ditempatkan di atasnya */
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        color: #aaa;
        text-decoration: none;
    }

    h2 {
        margin-top: 0;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin-bottom: 15px;
        border-left: 3px solid #007bff;
        padding-left: 10px;
    }

    textarea {
        width: calc(100% - 22px);
        /* Adjusted width to accommodate border and padding */
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        resize: vertical;
    }

    select {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .submit-button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <div class="container">
        <a href="detail_baca.php?id=<?= $buku_id ?>" class="close-button">&times;</a>

        <h2>Ulasan Pengguna:</h2>
        <ul>
            <!-- Daftar ulasan yang sudah ada -->
            <?php if ($result_ulasan !== null && mysqli_num_rows($result_ulasan) > 0) : ?>
            <?php while ($ulasan = mysqli_fetch_assoc($result_ulasan)) : ?>
            <li>
                <p><strong>Rating:</strong> <?= $ulasan['rating'] ?>/5</p>
                <p><?= $ulasan['ulasan'] ?></p>
            </li>
            <?php endwhile; ?>
            <?php else : ?>
            <li>Belum ada ulasan untuk buku ini.</li>
            <?php endif; ?>
        </ul>

        <h2>Tambah Ulasan:</h2>
        <!-- Formulir untuk menambah ulasan -->
        <form action="proses_ulasan.php" method="post">
            <input type="hidden" name="buku_id" value="<?= $buku_id ?>">
            <textarea name="ulasan" rows="4" placeholder="Masukkan ulasan Anda" required></textarea><br><br>
            <select name="rating" id="rating" required>
                <option value="">Pilih Rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br><br>
            <button type="submit" class="submit-button">Kirim Ulasan</button>
        </form>
    </div>

</body>


</html>