<?php
include 'koneksi.php';

// Ambil ID buku dari parameter URL
$buku_id = $_GET['id'];

// Prepare a statement with a parameter placeholder
$sql = "SELECT buku.*, buku_kategori.nama_kategori FROM buku 
        INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id 
        WHERE buku.buku_id = ?";
        
// Prepare the statement
$stmt = mysqli_prepare($koneksi, $sql);

// Bind the parameter
mysqli_stmt_bind_param($stmt, "i", $buku_id);

// Execute the statement
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch data buku
$data = mysqli_fetch_assoc($result);

// Query untuk mendapatkan ulasan buku
$query_ulasan = "SELECT * FROM buku_ulasan WHERE buku_id = ?";
$stmt_ulasan = mysqli_prepare($koneksi, $query_ulasan);
mysqli_stmt_bind_param($stmt_ulasan, "i", $buku_id);
mysqli_stmt_execute($stmt_ulasan);
$result_ulasan = mysqli_stmt_get_result($stmt_ulasan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku: <?= htmlspecialchars($data['judul']) ?></title>
    <!-- Your CSS files here -->
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        display: flex;
    }

    .book-cover {
        width: 40%;
        margin-right: 20px;
    }

    .book-cover img {
        width: 100%;
        display: block;
    }

    .book-details {
        width: 60%;
    }

    .book-details h1 {
        font-size: 24px;
        margin-top: 0;
    }

    .book-details p {
        font-size: 16px;
        line-height: 1.5;
        margin: 5px 0;
    }

    .btn-back {
        background-color: #ccc;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        color: #000;
        font-weight: bold;
        display: inline-block;
        margin-right: 10px;
    }

    .btn-warning {
        background-color: #ff9933;
        border-color: #ff9933;
        color: #fff;
        font-weight: bold;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
    }

    .ul {
        list-style-type: none;
        padding: 0;
    }
    </style>
</head>


<body>
    <div class="container">
        <div class="book-cover">
            <img src="<?= htmlspecialchars($data['cover']) ?>" alt="<?= htmlspecialchars($data['judul']) ?>">
        </div>
        <div class="book-details">
            <h1><?= htmlspecialchars($data['judul']) ?></h1>
            <p><strong>Penulis:</strong> <?= htmlspecialchars($data['penulis']) ?></p>
            <p><strong>Tahun Terbit:</strong> <?= htmlspecialchars($data['tahun_terbit']) ?></p>
            <p><strong>Kategori:</strong> <?= htmlspecialchars($data['nama_kategori']) ?></p>
            <p><strong>Sinopsis:</strong> <?= htmlspecialchars($data['sinopsis']) ?></p>
            <br><br>
            <a href="anggota.php" class="btn-back">
                Kembali
            </a>


        </div>
    </div>
    <div class="container">
        <h2>Ulasan Pengguna:</h2>
        <ul>
            <?php if(mysqli_num_rows($result_ulasan) > 0) {
            while ($ulasan = mysqli_fetch_assoc($result_ulasan)): ?>
            <li>
                <p><strong>Rating:</strong> <?= $ulasan['rating'] ?>/5</p>
                <p><?= $ulasan['ulasan'] ?></p>
            </li>
            <?php endwhile;
        } else { ?>
            <li>Belum ada ulasan untuk buku ini.</li>
            <?php } ?>
        </ul>
    </div>

</body>

</html>