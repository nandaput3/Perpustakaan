<?php
include 'koneksi.php';
session_start(); // Mulai sesi

// Ambil ID buku dari parameter URL
$buku_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Siapkan dan eksekusi query untuk mendapatkan ulasan buku
$query_ulasan = "SELECT buku_ulasan.*, user.username 
                 FROM buku_ulasan 
                 INNER JOIN user ON buku_ulasan.user_id = user.user_id 
                 WHERE buku_ulasan.buku_id = $buku_id";
$result_ulasan = mysqli_query($koneksi, $query_ulasan);


// Pastikan ID buku valid
if ($buku_id > 0) {
    // Siapkan dan eksekusi query untuk mendapatkan data buku
    $query = "SELECT buku.*, buku_kategori.nama_kategori FROM buku 
              INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id 
              WHERE buku.buku_id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $buku_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Periksa apakah ada hasil dari query
    if ($result && mysqli_num_rows($result) > 0) {
        // Ambil data buku
        $data = mysqli_fetch_assoc($result);
    } else {
        // Tampilkan pesan error jika data buku tidak ditemukan
        echo "Error: Book not found.";
        exit;
    }
} else {
    // Tampilkan pesan error jika ID buku tidak valid
    echo "Error: Invalid book ID.";
    exit;
}
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
        background-color: #f8f8f8;
    }

    .container {
        width: 80%;
        margin: 20px auto;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card img {
        max-width: 300px;
        display: block;
        border-radius: 5px;
        margin: 0 auto;
        margin-bottom: 10px;
    }

    .card h1 {
        font-size: 24px;
        margin-top: 0;
        color: #333;
        text-align: center;
        /* Mengatur judul ke tengah */
    }

    .card p {
        font-size: 16px;
        line-height: 1.6;
        margin: 5px 0;
        color: #666;
        text-align: center;
        /* Mengatur teks deskripsi ke tengah */
    }

    .card p.author {
        font-size: 18px;
        color: #888;
    }

    .username-bold {
        font-weight: bold;
        font-size: 25px;

    }

    .btn-back {
        background-color: blue;
        padding: 10px 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        /* Ubah warna teks menjadi biru */
        font-weight: bold;
        display: inline-block;
        margin-right: 10px;
        transition: background-color 0.3s ease;
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
        transition: background-color 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #cc7a00;
        border-color: #cc7a00;
    }

    .ul {
        list-style-type: none;
        padding: 0;
    }

    /* Warna bintang emas */
    .gold-star {
        color: #FFB000;
    }

    .button-container {
        position: relative;
        /* Make the container relative for absolute positioning */
        justify-content: flex-end;
        /* Move the buttons to the end (right side) of the container */
        align-items: flex-end;
        /* Align the buttons to the bottom of the container */
        margin-bottom: 20px;
        /* Add margin for spacing */
    }


    .button-pinjam {
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 30px;
        border: none;
        cursor: pointer;
    }

    .button-ulas {
        background-color: #007bff;
        border: 1px solid #ccc;
        border-radius: 30px;
        width: 40px;
        height: 40px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        position: absolute;
        top: 20px;
        /* Menggunakan posisi absolut */
        /* Menempatkan tombol tepat di sisi kanan tombol "Mulai Membaca" */
        /* Menyentralkan vertikal */
        transform: translateY(-50%);
        /* Menyentralkan vertikal */
    }

    .button-ulas:hover {
        background-color: #f3f3f3;
    }

    .button-pinjam,
    .button-ulas {
        margin: 5px;
        /* Atur margin jika diperlukan */
    }

    .icon {
        display: flex;
        justify-content: center;
        /* Posisikan secara horizontal di tengah */
        align-items: center;
        /* Posisikan secara vertikal di tengah */
    }
    </style>
</head>

<body>
    <div class="container">
        <?php if (!empty($data)) : ?>
        <div class="card">
            <!-- X button -->
            <div style="position: absolute; top: 10px; right: 10px;">
                <a href="anggota.php" style="text-decoration: none; color: red;">X</a>
            </div>

            <img src="<?= isset($data['cover']) ? htmlspecialchars($data['cover']) : '' ?>"
                alt="<?= isset($data['judul']) ? htmlspecialchars($data['judul']) : '' ?>">
            <h1><?= isset($data['judul']) ? htmlspecialchars($data['judul']) : '' ?></h1>
            <p class="author"><strong></strong>
                <?= isset($data['penulis']) ? htmlspecialchars($data['penulis']) : '' ?></p>
            <p><strong>Kategori:</strong>
                <?= isset($data['nama_kategori']) ? htmlspecialchars($data['nama_kategori']) : '' ?></p>
            <p><strong>Tahun Terbit:</strong>
                <?= isset($data['tahun_terbit']) ? htmlspecialchars($data['tahun_terbit']) : '' ?></p>
            <p><strong></strong> <?= isset($data['sinopsis']) ? htmlspecialchars($data['sinopsis']) : '' ?></p>
            <div class="button-container">
                <?php if ($data['stok'] === 'dipinjam') : ?>
                <button class="button-pinjam" disabled style="background-color: gray; pointer-events: none;">Sudah
                    Dipinjam</button>
                <?php else : ?>
                <div class="icon">
                    <form id="pinjamForm" method="post" action="proses_pinjam_buku.php">
                        <input type="hidden" name="buku_id" value="<?= $buku_id ?>">
                        <button id="pinjamButton" type="submit" class="button-pinjam">Pinjam</button>
                        <button class="button-ulas"
                            onclick="window.location.href = 'ulasan.php?id=<?= $_GET['id'] ?>';">💭</button>
                    </form>
                </div>
                <script>
                document.getElementById("pinjamForm").addEventListener("submit", function() {
                    document.getElementById("pinjamButton").disabled = true;
                });
                </script>
                <?php endif; ?>



            </div>

        </div>
        <?php else : ?>



    </div>
    <!-- Tampilkan pesan jika data buku tidak ditemukan -->
    <p>Data buku tidak ditemukan.</p>
    <?php endif; ?>
    </div>



    <div class=" container">
        <h2>Ulasan</h2>
        <?php if ( mysqli_num_rows($result_ulasan) > 0) : ?>
        <?php while ($ulasan = mysqli_fetch_assoc($result_ulasan)) : ?>
        <div class="card">
            <p class="username-bold"><strong></strong> <?= $ulasan['username'] ?></p>
            <p><strong></strong> <?= generateStarRating($ulasan['rating']) ?></p>
            <p><?= $ulasan['ulasan'] ?></p>
        </div>
        <?php endwhile; ?>
        <?php else : ?>
        <p>Belum ada ulasan untuk buku ini.</p>
        <?php endif; ?>
    </div>

    <?php
function generateStarRating($rating) {
    $stars = '';
    for ($i = 1; $i <= $rating; $i++) {
        if ($i <= $rating) {
            $stars .= '<span class="gold-star">★</span>'; // menggunakan tag span dengan kelas gold-star
        } else {
            $stars .= '<span>☆</span>'; // menggunakan tag span biasa untuk bintang kosong
        }
    }
    return $stars;
}

?>


</body>

</html>