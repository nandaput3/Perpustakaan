<?php
include 'koneksi.php';
session_start();

// Query untuk mendapatkan data kategori buku
$sql_kategori = "SELECT * FROM buku_kategori";
$result = mysqli_query($koneksi, $sql_kategori);

function getUsernameFromEmail($email) {
    // Contoh implementasi: Mengambil bagian username dari alamat email
    $parts = explode('@', $email);
    return $parts[0];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Data Koleksi</title>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .floating-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 9999;
    }

    .book-container-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 2em;
        max-width: 1200px;
    }

    .book-container {
        width: 200px;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 5px;
        color: black;
    }

    .book-details {
        font-size: 14px;
        color: #666;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        margin-top: 5px;
    }

    .action-buttons button {
        padding: 5px 10px;
        margin-right: 5px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .action-buttons button.read {
        background-color: #007bff;
        color: #fff;
    }

    .action-buttons button.read:hover {
        background-color: #0056b3;
    }
    </style>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <div style="display: flex; align-items: center; justify-content: center;">
                    <!-- Logo -->
                    <img src="../smk1.png" alt="SMK1 Logo" style="height: 40px; margin-right: 10px;">
                    <!-- Kotak Pencarian -->
                    <form class="form-inline mr-auto navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Dropdown untuk kategori buku -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kategori</span>
                        </a>
                        <div class="dropdown">
                            <ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
                                <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $kategori_id = $row['kategori_id'];
                                        $nama_kategori = $row['nama_kategori'];
                                        echo "<li><a class='dropdown-item' id='dropdown-item' href='kategori.php?kategori_id=$kategori_id'>$nama_kategori</a></li>";
                                    }
                                    mysqli_data_seek($result, 0);
                                    ?>
                            </ul>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo getUsernameFromEmail($_SESSION["email"]); ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="anggota.php">
                                <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                Home
                            </a>
                            <a class="dropdown-item" href="data_koleksi.php">
                                <i class="fas fa-heart fa-sm fa-fw mr-2 text-gray-400"></i>
                                Favorit </a>
                            <a class="dropdown-item" href="data_peminjaman_buku.php">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Peminjaman
                            </a>
                            <a class="dropdown-item" href="riwayat_peminjaman.php">
                                <i class="fas fa-clock fa-sm fa-fw mr-2 text-gray-400"></i>
                                Riwayat Buku
                            </a>

                            <a class="dropdown-item" href="../logout.php" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class=" row justify-content-center mb-4">
                    <div class=" col-md-3 text-center">

                        <h4 class="float-left ml-3">Daftar Buku yang difavoritkan</h4>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="row">

                    <div class="book-container-wrapper">
                        <?php
                            // Ambil data koleksi pribadi pengguna
                            $user_id = $_SESSION['user_id'];
                            $sql_koleksi = "SELECT buku.*, buku_kategori.nama_kategori 
                                            FROM koleksi_pribadi 
                                            INNER JOIN buku ON koleksi_pribadi.buku_id = buku.buku_id 
                                            INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id 
                                            WHERE koleksi_pribadi.user_id = $user_id";
                            $result_koleksi = mysqli_query($koneksi, $sql_koleksi);
                            if(mysqli_num_rows($result_koleksi) > 0) {
                                while($data = mysqli_fetch_assoc($result_koleksi)) {
                            ?>
                        <div class="book-container" id="book_<?= $data['buku_id'] ?>">
                            <div class="book-cover" style="background-image: url('<?= $data['cover']?>')"></div>
                            <div class="book-title"><?= $data['judul']?></div>
                            <div class="book-details">
                                <p><?= $data['penulis']?></p>
                                <p>Kategori: <?= $data['nama_kategori']?></p>
                            </div>
                            <div class="action-buttons">
                                <button class="btn btn-info btn-bookmark"
                                    onclick="toggleKoleksi(<?= $data['buku_id'] ?>)">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <?php 
                                }
                            } else { 
                            ?>
                        <div class="alert alert-warning" role="alert">
                            Belum ada buku favorit
                        </div>
                        <?php 
                            } 
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->
    <script>
    function toggleKoleksi(buku_id) {
        $.ajax({
            url: 'hapus_koleksi.php',
            type: 'POST',
            data: {
                action: 'hapus_koleksi',
                buku_id: buku_id
            },
            success: function(response) {
                alert(response);
                $('#book_' + buku_id).hide();
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Terjadi kesalahan saat memproses permintaan.');
            }
        });
    }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/vendor/js/sb-admin-2.min.js"></script>

</body>

</html>