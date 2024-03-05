<?php 
    include "koneksi.php";

    $sql = "SELECT buku.*, buku_kategori.nama_kategori 
            FROM buku 
            INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id";
    $result = mysqli_query($koneksi, $sql);

    // Check for errors
    if (!$result) {
        die('Error fetching data: ' . mysqli_error($koneksi));
    }

    // Hitung jumlah total slide
    $totalSlides = mysqli_num_rows($result);

    // Tentukan slide saat ini berdasarkan parameter URL
    $currentSlide = isset($_GET['slide']) ? intval($_GET['slide']) : 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Buku</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: grey;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .aksi {
        text-align: right;
    }

    .aksi div {
        display: flex;
        gap: 5px;
    }

    .slide-navigation {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .slide-number-box {
        display: flex;
        align-items: center;
        margin: 0 10px;
    }

    .number-box {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px 10px;
        margin: 0 5px;
    }

    /* Style untuk memastikan hanya ada 3 kotak nomor slide per baris */
    .number-box {
        width: 30px;
        text-align: center;
    }

    /* Tambahkan margin antara tombol */
    .btn-container button {
        margin-right: 5px;
    }

    /* Tambahkan style untuk posisi tombol Tambah */
    .add-button {
        margin-top: 20px;
    }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="anggota.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MACA<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="petugas.php">
                    <span>Dashboard Petugas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="data_buku.php">
                    <i class="fas fa-fw fa-book"></i> <span>Data Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_peminjaman.php">
                    <i class="fas fa-fw fa-file"></i> <span>Data Peminjam </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="laporan.php">
                    <i class="fas fa-fw fa-download"></i> <span>Laporan</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"></nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">

                            <h1 class="h3 mb-4 text-gray-800">Data Buku</h1>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>PDF</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($data = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <td><?= $data['buku_id'] ?></td>
                                            <td><img src="../asset/<?= $data['cover'] ?>" alt="Cover Buku"
                                                    style="max-width:100px; max-height:100px;"></td>
                                            <td><?= $data['judul'] ?></td>
                                            <td><?= basename($data['pdf_path']) ?></td>
                                            <td><?= $data['penulis'] ?></td>
                                            <td><?= $data['penerbit'] ?></td>
                                            <td><?= $data['nama_kategori'] ?></td>
                                            <td><?= $data['stok'] ?></td>
                                            <td class="aksi">
                                                <div>
                                                    <a href="edit_buku.php?id=<?= $data['buku_id'] ?>"
                                                        class="btn btn-primary"><i class='fas fa-pen to-square'></i></a>
                                                    <a href="hapus_buku.php?id=<?= $data['buku_id'] ?>"
                                                        onclick="return confirm('Yakin ingin menghapus buku ini?')"
                                                        class="btn btn-danger"><i class='fas fa-trash'></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Slide Navigation -->
                            <div class="slide-navigation">
                                <a href="?slide=<?= max(1, $currentSlide - 1) ?>" class="btn btn-primary"><i
                                        class="fas fa-arrow-left"></i></a>
                                <div class="slide-number-box">
                                    <div class="number-box"><?= $currentSlide ?></div>
                                </div>
                                <a href="?slide=<?= min($totalSlides, $currentSlide + 1) ?>" class="btn btn-primary"><i
                                        class="fas fa-arrow-right"></i></a>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this page -->
    <script>
    // Fungsi untuk menangani navigasi slide menggunakan tombol panah
    $(document).ready(function() {
        $(document).keydown(function(e) {
            if (e.keyCode == 37 && <?= $currentSlide ?> > 1) {
                window.location.href = "?slide=<?= $currentSlide - 1 ?>";
            } else if (e.keyCode == 39 && <?= $currentSlide ?> < <?= $totalSlides ?>) {
                window.location.href = "?slide=<?= $currentSlide + 1 ?>";
            }
        });
    });
    </script>

</body>

</html>