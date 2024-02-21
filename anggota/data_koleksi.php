<?php 
include 'koneksi.php';

// Aktifkan laporan kesalahan
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Memulai sesi
session_start();

// Ganti dengan ID pengguna yang sebenarnya
if(isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"]; // Misalnya ID pengguna adalah 112

    // Query untuk mengambil data buku dari koleksi pribadi pengguna
    $sql = "SELECT buku.*, buku_kategori.nama_kategori FROM buku INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id INNER JOIN koleksi_pribadi ON buku.buku_id = koleksi_pribadi.buku_id WHERE koleksi_pribadi.user_id = '$user_id'";
    $result = mysqli_query($koneksi, $sql);

    // Cek apakah query berhasil dieksekusi
    if (!$result) {
        die("Terjadi kesalahan: " . mysqli_error($koneksi));
    }
} else {
    echo "Sesi user tidak ditemukan.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<style>
.book-container-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.book-container {
    width: 250px;
    margin: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.book-container:hover {
    transform: translateY(-5px);
}

.book-cover {
    width: 100%;
    height: 200px;
    background-size: cover;
    background-position: center;
    border-radius: 5px;
    margin-bottom: 10px;
}

.book-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}

.book-details p {
    margin: 5px 0;
}

.action-buttons {
    display: flex;
    justify-content: space-between;
}

.action-buttons button {
    margin-right: 5px;
}
</style>

<body>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">



                    <!-- Nav Item - Alerts -->


                    <!-- Nav Item - Messages -->



                    <!-- Nav Item - User Information -->


                </ul>

            </nav>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col">

                        <h4 class="float-left ml-3">Koleksi Buku</h4>
                    </div>
                </div>
                <hr>
                <div class="book-container-wrapper">
                    <?php while($data = mysqli_fetch_assoc($result)): ?>

                    <div class="book-container">
                        <div class="book-cover" style="background-image: url('<?= $data['cover']?>')"></div>
                        <div class="book-title"><?= $data['judul']?></div>
                        <div class="book-details">
                            <p>Penulis: <?= $data['penulis']?></p>
                            <p>Tahun Terbit: <?= $data['tahun_terbit']?></p>
                            <p>Kategori: <?= $data['nama_kategori']?></p>
                        </div>
                        <div class="action-buttons">



                            <!-- Tambahkan parameter action=add dan buku_id untuk menambahkan buku ke koleksi -->
                            <button type="button" class="btn btn-success pinjam-btn" data-id="<?= $data['buku_id'] ?>"
                                data-judul="<?= $data['judul'] ?>" onclick="disableButton(this)">
                                <i class="fas fa-plus"></i>
                            </button>
                            <a href="ulasan.php?id=<?= $data['buku_id'] ?>&judul=<?= $data['judul'] ?>"><button
                                    type="button" class="btn btn-warning"><i class="fas fa-comment"></i></button></a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    function disableButton(button) {
        // Mendapatkan data ID buku dari atribut data
        var bukuId = button.getAttribute('data-id');

        // Kirim AJAX request untuk memeriksa apakah buku sudah dipinjam
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_peminjaman.php?buku_id=' + bukuId, true);

        // Ketika respons dari server diterima
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Jika buku sudah dipinjam, nonaktifkan tombol
                if (xhr.responseText === 'dipinjam') {
                    button.disabled = true;
                    alert('Buku ini sudah dipinjam.');
                }
            }
        };

        // Mengirim request
        xhr.send();
    }
    </script>

    <script>
    $(document).ready(function() {
        var buku_id;

        // Event listener for clicking pinjam button
        $('.pinjam-btn').click(function() {
            buku_id = $(this).data('id'); // Get book ID
            $('#confirmModal').modal('show'); // Show confirmation modal
        });

        // Event listener for clicking 'Ya' on confirmation modal
        $('#confirmPinjam').click(function() {
            // Redirect to pinjam_buku.php with book ID as parameter
            window.location.href = 'data_peminjaman_buku.php ? id = ' + buku_id;
        });
    });
    </script>
</body>

</html>