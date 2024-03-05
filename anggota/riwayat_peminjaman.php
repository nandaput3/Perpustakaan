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
    /* Style untuk tabel */
    table {
        width: 100%;
        max-width: 800px;
        /* Membatasi lebar maksimum tabel */
        margin: 0 auto;
        /* Pusatkan tabel di tengah layar */
        border-collapse: collapse;
        border: 1px solid #ddd;
        border-radius: 8px;
        /* Menambahkan sudut bulat pada tabel */
        overflow: hidden;
        /* Mengatasi bayangan yang mungkin muncul di luar tabel */
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 2px solid #ddd;
        border-right: 1px solid #ddd;
        position: relative;
        /* Mengatur posisi relatif untuk efek bayangan */
    }

    th {
        background-color: grey;
        color: #ffff;
    }

    /* Hover effect pada baris tabel */
    tr:hover {
        background-color: #f5f5f5;
    }

    /* Warna latar belakang bergantian untuk baris tabel */
    tr:nth-child(even) {
        background: linear-gradient(to right, #ffffff, #f9f9f9);
        /* Gradasi warna latar belakang */
    }

    /* Efek bayangan pada sel */
    th:before,
    td:before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 4px;
        /* Lebar bayangan */
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0));
        /* Gradasi warna bayangan */
        transition: width 0.3s;
        /* Animasi perubahan lebar */
        z-index: 1;
        /* Menempatkan bayangan di atas konten */
    }

    /* Efek bayangan pada hover */
    tr:hover td:before {
        width: 100%;
        /* Lebar bayangan saat hover */
    }

    /* Tampilan responsif untuk tabel */
    @media screen and (max-width: 600px) {
        table {
            width: 100%;
            max-width: 100%;
            /* Lebar maksimum untuk tampilan responsif */
        }

        th,
        td {
            padding: 8px;
        }
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
                <div class="row">
                    <div class="col">
                        <h4 class="mb-4">Riwayat Peminjaman</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query untuk mendapatkan riwayat peminjaman buku oleh pengguna
                                    $sql_riwayat = "SELECT buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.status_pinjam
                                                    FROM peminjaman
                                                    INNER JOIN buku ON peminjaman.buku_id = buku.buku_id
                                                    WHERE peminjaman.user_id = {$_SESSION['user_id']}";
                                    $result_riwayat = mysqli_query($koneksi, $sql_riwayat);
                                    $no = 1;
                                    while ($row_riwayat = mysqli_fetch_assoc($result_riwayat)) {
                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $row_riwayat['judul'] . "</td>";
                                        echo "<td>" . $row_riwayat['tgl_pinjam'] . "</td>";
                                        echo "<td>" . $row_riwayat['tgl_kembali'] . "</td>";
                                        echo "<td>" . $row_riwayat['status_pinjam'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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