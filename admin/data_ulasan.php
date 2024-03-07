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

    <title>Data Ulasan</title>

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
        background-color: #fff;
    }

    tr:hover {
        background-color: #ddd;
    }

    /* Style for delete button */
    .hapus-btn {
        background-color: #dc3545;
        /* Warna latar merah */
        color: white;
        /* Warna teks putih */
        border: none;
        /* Tanpa border */
        padding: 8px 16px;
        /* Padding untuk memperbesar tombol */
        cursor: pointer;
        /* Pointer saat dihover */
        border-radius: 4px;
        /* Border radius untuk sudut tombol */
        transition: background-color 0.3s;
        /* Transisi efek hover */
    }

    /* Style for delete button on hover */
    .hapus-btn:hover {
        background-color: #c82333;
        /* Warna latar merah yang lebih gelap saat dihover */
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
                <div class="sidebar-brand-text mx-3">MACA <sup>
                    </sup>
                </div>
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









            <!-- Heading -->







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
                    <i class="fas fa-fw fa-file"></i> <span>Data Peminjaman </span></a>
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



                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- Content Row -->

                    <div class="row">
                        <h1>Data Ulasan</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Judul Buku</th>
                                    <th>Ulasan</th>
                                    <th>Rating</th>
                                    <th>Tanggal Ulasan</th>
                                    <th>Aksi</th> <!-- Tambahkan kolom untuk tombol hapus -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "koneksi.php";

                                    // Query untuk mengambil data ulasan buku dari database dengan judul buku
                                    $sql = "SELECT buku_ulasan.ulasan_id, buku.judul AS judul_buku, buku_ulasan.ulasan, buku_ulasan.rating, buku_ulasan.created_at, user.username
                                    FROM buku_ulasan
                                    INNER JOIN buku ON buku_ulasan.buku_id = buku.buku_id
                                    INNER JOIN user ON buku_ulasan.user_id = user.user_id";


                                    $result = mysqli_query($koneksi, $sql);

                                    // Tampilkan data ulasan dalam tabel
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['username'] . "</td>"; // Menampilkan judul buku

                                        echo "<td>" . $row['judul_buku'] . "</td>"; // Menampilkan judul buku
                                        echo "<td>" . $row['ulasan'] . "</td>"; // Menampilkan ulasan
                                        echo "<td>" . $row['rating'] . "</td>"; // Menampilkan rating
                                        echo "<td>" . $row['created_at'] . "</td>"; // Menampilkan tanggal ulasan
                                        echo "<td><button class='hapus-btn' data-id='" . $row['ulasan_id'] . "' onclick='konfirmasiHapus()'>Hapus</button></td>";

                                        echo "</tr>";
                                                 }
                                    ?>

                            </tbody>
                        </table>



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
    <!-- JavaScript untuk menghapus data saat tombol diklik -->

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
    <script>
    // Function to handle delete confirmation and action
    function konfirmasiHapus(elem) {
        if (confirm('Apakah Anda yakin ingin menghapus ulasan ini?')) {
            var ulasan_id = $(elem).data('id');
            $.ajax({
                url: 'hapus_ulasan.php',
                type: 'post',
                data: {
                    id: ulasan_id
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    }
    </script>


</body>

</html>