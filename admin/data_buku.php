<?php 
    include "koneksi.php";

    $sql = "SELECT buku.*, buku_kategori.nama_kategori FROM buku INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id";
    $result = mysqli_query($koneksi, $sql);

    
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>

</style>


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
                <div class="sidebar-brand-text mx-3">READING <sup>ME</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <span>Dashboard Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">




            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="data_buku.php"> <i class="fas fa-fw fa-book"></i> <span>Data
                        Buku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_user.php">
                    <i class="fas fa-fw fa-users"></i> <span>Data Pengguna</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_peminjaman.php">
                    <i class="fas fa-fw fa-file"></i> <span>Data Peminjam </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create_regis.php">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Laporan </span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="create_regis.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Regis Anggota </span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->


            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->




        </ul>
        <!-- End of Sidebar -->

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

                    <!-- Topbar Search -->

                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - Messages -->



                        <!-- Nav Item - User Information -->

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- Content Row -->
                    <div class="row">
                        <?php
    include "koneksi.php";

    // Mendapatkan total baris data dari query
    $result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM buku");
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['total'];

    // Jumlah baris per slide
    $rowsPerSlide = 5;

    // Mendapatkan total slide yang diperlukan
    $totalSlides = ceil($totalRows / $rowsPerSlide);

    // Mendapatkan nomor slide dari parameter GET
    $currentSlide = isset($_GET['slide']) ? $_GET['slide'] : 1;
    if ($currentSlide < 1) $currentSlide = 1;
    if ($currentSlide > $totalSlides) $currentSlide = $totalSlides;

    // Mendapatkan indeks baris untuk slide saat ini
    $start = ($currentSlide - 1) * $rowsPerSlide;

    // Query untuk mendapatkan data untuk slide saat ini
    $sql = "SELECT buku.*, buku_kategori.nama_kategori 
            FROM buku 
            INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id 
            LIMIT $start, $rowsPerSlide";
    $result = mysqli_query($koneksi, $sql);
?>

                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Document</title>

                            <style>
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                                margin-right: 20px;
                            }

                            tr,
                            th {
                                border: 1px solid;
                                padding: 8px;
                                text-align: center;
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

                            .separator {
                                margin: 0 5px;
                            }

                            /* Style untuk memastikan hanya ada 3 kotak nomor slide per baris */
                            .number-box {
                                width: 30px;
                                /* Atur lebar sesuai kebutuhan */
                                text-align: center;
                            }
                            </style>

                            </style>
                        </head>

                        <body>
                            <form class="form" action="proses/proses_pendataan_buku.php" method="post">
                                <h1>Data Buku</h1>
                                <a href="create_data_buku.php"><button type="button"
                                        class="btn btn-dark">Tambah</button>
                                </a>
                                <form action="pendataan.php" method="post">
                                    <table border='1'>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>cover</th>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Kategori</th>
                                                <th>Stok</th>

                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari database -->
                                            <?php while($data = mysqli_fetch_assoc($result)): ?>
                                            <tr>
                                                <th><?= $data['buku_id']?></th>
                                                <th><img src='../asset/<?= $data['cover']?>' alt='Cover Buku'
                                                        style='max-width:100px; max-height:100px;'> </th>
                                                <th><?= $data['judul']?></th>
                                                <th><?= $data['penulis']?></th>
                                                <th><?= $data['penerbit']?></th>
                                                <th><?= $data['tahun_terbit']?></th>
                                                <th><?= $data['nama_kategori']?></th>
                                                <th><?= $data['stok']?></th>

                                                <th>
                                                    <a href="edit_buku.php?id=<?= $data['buku_id'] ?>"
                                                        onclick=""><button type="button"
                                                            class="btn btn-primary">Edit</button></a>
                                                    <!-- Edit link -->
                                                    <a href="hapus_buku.php?id=<?= $data['buku_id'] ?>"
                                                        onclick="return confirm(' Yakin ingin menhapus buku ini?')"><button
                                                            type="button" class="btn btn-danger">Hapus</button></a>
                                                    <!-- Delete link with confirmation -->
                                                </th>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                        <?php if ($currentSlide > 1): ?>

                                        <?php endif; ?>
                                    </table>
                                    <!-- Tambahkan di bagian setelah tabel -->
                                    <div class="slide-navigation">
                                        <a href="?slide=<?= max(1, $currentSlide - 1) ?>" class="btn btn-primary"><i
                                                class="fas fa-arrow-left"></i></a>
                                        <div class="slide-number-box">
                                            <div class="number-box"><?= $currentSlide ?></div>
                                        </div>
                                        <a href="?slide=<?= min($totalSlides, $currentSlide + 1) ?>"
                                            class="btn btn-primary"> <i class="fas fa-arrow-right"></i></a>
                                    </div>





                                </form>
                            </form>

                        </body>

                        </html>

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->


                        <!-- Pie Chart -->

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->


                            <!-- Color System -->


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
            // Periksa jika tombol panah kiri ditekan dan tidak dalam slide pertama
            if (e.keyCode == 37 && <?= $currentSlide ?> > 1) {
                window.location.href = "?slide=<?= $currentSlide - 1 ?>";
            }
            // Periksa jika tombol panah kanan ditekan dan tidak dalam slide terakhir
            else if (e.keyCode == 39 && <?= $currentSlide ?> < <?= $totalSlides ?>) {
                window.location.href = "?slide=<?= $currentSlide + 1 ?>";
            }
        });
    });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/vendor/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/vendor/js/demo/chart-area-demo.js"></script>
    <script src="assets/vendor/js/demo/chart-pie-demo.js"></script>

</body>

</html>