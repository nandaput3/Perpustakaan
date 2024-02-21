<?php
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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

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
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-secondary btn-sm float-left mb-3" href="javascript:history.go(-1)">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h4 class="float-left ml-3">Daftar Buku yang Dipinjam</h4>
                        </div>
                    </div>
                    <hr>

                    <!-- Content Row -->
                    <div class="row">
                        <style>
                        /* Container untuk buku */
                        .book-container-wrapper {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;
                            /* Untuk menjajar ke pinggir */
                            gap: 2em;
                            /* Untuk membuatnya berada di tengah */
                            max-width: 1200px;
                            /* Maksimum lebar container */
                        }

                        .book-container {
                            width: 200px;
                            margin-bottom: 20px;
                            /* Spasi antar kotak buku */
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 8px;
                            background-color: #f9f9f9;
                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                        }

                        /* Cover buku */
                        .book-cover {
                            width: 100%;
                            height: 200px;
                            background-size: cover;
                            background-position: center;
                            border-radius: 5px;
                            margin-bottom: 10px;
                        }

                        /* Judul buku */
                        .book-title {
                            font-weight: bold;
                            font-size: 16px;
                            margin-bottom: 5px;
                        }

                        /* Detail buku */
                        .book-details {
                            font-size: 14px;
                            color: #666;
                        }

                        .book-actions button {
                            margin-top: auto;
                            /* Mendorong tombol ke bawah */
                        }


                        /* Tombol aksi */
                        .action-buttons {
                            display: flex;
                            /* Menyelaraskan tombol-tombol secara horizontal */
                            align-items: center;
                            /* Menyelaraskan tombol-tombol secara vertikal */
                            margin-top: 5px;
                        }

                        .action-buttons button {
                            padding: 5px 10px;
                            margin-right: 5px;
                            border: none;
                            border-radius: 3px;
                            cursor: pointer;
                            display: flex;
                            /* Membuat tombol menggunakan flexbox */
                            justify-content: center;
                            /* Menyelaraskan isi tombol di tengah secara horizontal */
                            align-items: center;
                            /* Menyelaraskan isi tombol di tengah secara vertikal */
                        }

                        /* Tombol Baca */
                        .action-buttons button.read {
                            background-color: #007bff;
                            color: #fff;
                        }

                        .action-buttons button.read:hover {
                            background-color: #0056b3;
                        }
                        </style>

                        </head>

                        <?php
include 'koneksi.php';

// Pastikan $pinjam_id terdefinisi dengan benar
if (isset($_GET['pinjam_id'])) {
    $pinjam_id = $_GET['pinjam_id'];

    // Query untuk mengambil data peminjaman buku berdasarkan pinjam_id
    $sql_pinjam = "SELECT peminjaman.*, buku.judul, buku.penulis, buku.tahun_terbit, buku_kategori.nama_kategori, buku.cover 
                    FROM peminjaman 
                    INNER JOIN buku ON peminjaman.buku_id = buku.buku_id 
                    INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id 
                    WHERE peminjaman.pinjam_id = $pinjam_id";

    // Lakukan kueri SQL
    $result_pinjam = mysqli_query($koneksi, $sql_pinjam);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result_pinjam) == 0) {
        echo "Data tidak ditemukan.";
    } else {
        // Tambahkan tombol untuk pengembalian buku
        echo "<a href='proses_pengembalian.php?pinjam_id=$pinjam_id' class='btn btn-success'>Kembalikan Buku</a>";

        // Proses menyimpan tanggal peminjaman (jika belum disimpan sebelumnya)
        $row_pinjam = mysqli_fetch_assoc($result_pinjam);
        if (empty($row_pinjam['tgl_pinjam'])) {
            $tanggal_peminjaman = date('Y-m-d');
            mysqli_query($koneksi, "UPDATE peminjaman SET tgl_pinjam='$tanggal_peminjaman' WHERE pinjam_id=$pinjam_id");
        }

        // Menampilkan data peminjaman dengan tanggal peminjaman
        echo "<p>Tanggal Peminjaman: " . $row_pinjam['tgl_pinjam'] . "</p>";
        echo "<p>Tanggal Pengembalian Otomatis: " . $tanggal_pengembalian_otomatis . "</p>";
    }
}

// Tambahkan logika untuk mengisi tanggal pengembalian secara otomatis
$today = date('Y-m-d');
$tanggal_pengembalian_otomatis = date('Y-m-d', strtotime($today . ' + 1 days'));
?>


                        <div class="book-container-wrapper">
                            <?php
    $result_pinjam = []; // Initialize $result_pinjam as an empty array

    // Fetch data only if $_GET['pinjam_id'] is set
        $sql_pinjam = "SELECT peminjaman.*, buku.* 
                        FROM peminjaman 
                        INNER JOIN buku ON peminjaman.buku_id = buku.buku_id 
                        INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id 
                        ";

        $result_pinjam = mysqli_query($koneksi, $sql_pinjam);

    
    ?>

                            <?php 
                           
                            while($data_pinjam = mysqli_fetch_assoc($result_pinjam)){
                            
                            ?>
                            <div class="book-container">
                                <div class="book-cover" style="background-image: url('<?= $data_pinjam['cover']?>')">
                                </div>
                                <div class="book-title"><?= $data_pinjam['judul']?></div>
                                <div class="book-details">
                                    <p>Tanggal Peminjaman: <?= $data_pinjam['tgl_pinjam']?></p>
                                    <p>Tanggal Pengembalian: <?= $data_pinjam['tgl_kembali']?></p>

                                    <?php 
                // Check if the book is already borrowed or not
                $buku_id = $data_pinjam['buku_id'];
                $query_pinjam = "SELECT * FROM peminjaman WHERE buku_id = $buku_id AND status_pinjam = 'dipinjam'";
                $result_borrowed = mysqli_query($koneksi, $query_pinjam);
                
                if(mysqli_num_rows($result_borrowed) > 0):
                    echo "<p>Status: Sedang Dipinjam</p>";
                    echo "<button onclick='kembalikanBuku($buku_id)' class='btn btn-danger'>Kembalikan</button>";
                else:
                    echo "<a href='pinjam_buku.php?buku_id=$buku_id' class='btn btn-primary'>Pinjam</a>";

                endif;
                ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <!-- Content Row -->



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
                    <div class="modal-body">yakin ingin keluar?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
        function kembalikanBuku(pinjam_id) {
            if (confirm('Apakah Anda yakin ingin mengembalikan buku ini?')) {
                // Mengatur tanggal pengembalian otomatis
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                var tanggal_pengembalian = yyyy + '-' + mm + '-' + dd;

                // Mengirim permintaan AJAX untuk memperbarui tanggal pengembalian di database
                $.ajax({
                    url: 'proses_pengembalian_buku.php',
                    type: 'POST',
                    data: {
                        pinjam_id: pinjam_id,
                        tanggal_pengembalian: tanggal_pengembalian
                    },
                    success: function(response) {
                        // Jika berhasil, lakukan sesuatu (misalnya, tampilkan pesan sukses)
                        alert('Buku telah berhasil dikembalikan.');
                        // Kemudian, reload halaman atau lakukan tindakan lain yang sesuai
                    },
                    error: function(xhr, status, error) {
                        // Jika terjadi kesalahan, tampilkan pesan error
                        console.error(error);
                        alert('Terjadi kesalahan saat mengembalikan buku.');
                    }
                });
            }
        }
        </script>


        <script>
        function hapusPeminjaman(peminjamanId) {
            if (confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')) {
                window.location.href = 'hapus_peminjaman.php?peminjaman_id=' + peminjamanId;
            }
        }
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