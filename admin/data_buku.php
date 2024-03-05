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

    .btn-container button {
        margin-right: 5px;
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

    /* Tambahkan margin antara tombol */
    .btn-container button {
        margin-right: 5px;
    }

    /* Tambahkan style untuk posisi tombol Tambah */
    .add-button {
        margin-top: 20px;
    }

    /* Tambahkan CSS berikut ke dalam tag <style> atau file CSS Anda */


    .aksi div {
        display: flex;
        gap: 5px;
        /* Tambahkan jarak antara tombol */
    }

    .add-button {
        display: flex;
        align-items: center;
    }

    /* Tambahkan margin kiri agar tombol "Tambah Kategori" berjajar ke pinggir */
    .add-button .btn-primary {
        margin-left: auto;
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
                <div class="sidebar-brand-text mx-3">MACA <sup></sup></div>
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
                <a class="nav-link" href="data_ulasan.php">
                    <i class="fas fa-fw fa-comments"></i> <span>Ulasan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="laporan.php">
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


                    <!-- Topbar Navbar -->

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->


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





                        <div class="container-fluid">
                            <h1>Data Buku</h1>
                            <!-- Pindahkan tombol tambah ke bawah tulisan "Data Buku" -->
                            <div class="add-button">
                                <form class="form" action="proses/proses_pendataan_buku.php" method="post">
                                    <a href="create_data_buku.php"><button type="button"
                                            class="btn btn-dark">Tambah</button></a>
                                </form>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#tambahKategoriModal">
                                    Tambah Kategori
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="tambahKategoriModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formTambahKategori">
                                                    <div class="form-group">
                                                        <label for="namaKategori">Nama Kategori</label>
                                                        <input type="text" class="form-control" id="namaKategori"
                                                            name="namaKategori">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="button" id="simpanKategori" class="btn btn-primary"
                                                    onclick="prosesKategori()">Simpan</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>pdf</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi tabel dengan data dari database -->
                                    <?php while($data = mysqli_fetch_assoc($result)): ?>
                                    <!-- Di dalam loop while untuk menampilkan data buku -->
                                    <tr>
                                        <td><?= $data['buku_id']?></td>
                                        <td><img src='../asset/<?= $data['cover']?>' alt='Cover Buku'
                                                style='max-width:100px; max-height:100px;'></td>
                                        <td><?= $data['judul']?></td>
                                        <td><?= basename($data['pdf_path']) ?></td>
                                        <td><?= $data['penulis']?></td>
                                        <td><?= $data['penerbit']?></td>
                                        <td><?= $data['nama_kategori']?></td>
                                        <td><?= $data['stok']?></td>
                                        <td class="aksi">
                                            <div>
                                                <a href="edit_buku.php?id=<?= $data['buku_id'] ?>"><button
                                                        class="btn btn-primary"><i
                                                            class='fas fa-pen to-square'></i></button></a>
                                                <a href="hapus_buku.php?id=<?= $data['buku_id'] ?>"
                                                    onclick="return confirm('Yakin ingin menghapus buku ini?')"><button
                                                        class="btn btn-danger"><i class='fas fa-trash'></i></button></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <!-- Tempatkan navigasi slide di tengah-tengah tabel -->
                            <div class="slide-navigation">
                                <a href="?slide=<?= max(1, $currentSlide - 1) ?>" class="btn btn-primary"><i
                                        class="fas fa-arrow-left"></i></a>
                                <div class="slide-number-box">
                                    <div class="number-box"><?= $currentSlide ?></div>
                                </div>
                                <a href="?slide=<?= min($totalSlides, $currentSlide + 1) ?>" class="btn btn-primary"> <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
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
                        <span>Copyright &copy; Your Website 2024</span>
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
    <script>
    function prosesKategori() {
        // Ambil nilai input kategori
        var namaKategori = document.getElementById('namaKategori').value;

        // Kirim data ke proses_kategori.php menggunakan AJAX
        $.ajax({
            type: 'POST',
            url: 'proses_simpan_kategori.php',
            data: {
                namaKategori: namaKategori
            },
            success: function(response) {
                // Tampilkan pesan balasan dari proses kategori
                alert(response);
                // Refresh halaman setelah menambah kategori
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
            }
        });
    }
    </script>


    <script>
    $(document).ready(function() {
        // Tangkap klik tombol "Tambah Kategori" dan tampilkan modal
        $('#tombolTambahKategori').click(function() {
            $('#tambahKategoriModal').modal('show');
        });
    });
    </script>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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