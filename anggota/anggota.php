<?php
include 'koneksi.php';
session_start();
// Query untuk mengambil data kategori buku
$query = "SELECT * FROM buku_kategori";
$result = mysqli_query($koneksi, $query);

// Periksa apakah ada pesan notifikasi yang disimpan dalam session
if (isset($_SESSION['notification'])) {
// Tampilkan pesan notifikasi
echo '<div class="notification">' . $_SESSION['notification'] . '</div>';
// Hapus pesan notifikasi dari session agar tidak ditampilkan lagi setelah refresh
unset($_SESSION['notification']);
}

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION["user_id"])) {
// Jika belum, arahkan ke halaman login
header("Location: login.php");
exit();
}

// Mendapatkan bagian nama pengguna dari alamat email
function getUsernameFromEmail($email) {
return strstr($email, '@', true); // Mengambil bagian sebelum '@'
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

    <title>MACA</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-abc123==" crossorigin="anonymous" />

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

                    <!-- Topbar Search -->
                    <!-- Topbar Search -->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <!-- Logo -->
                        <img src="../smk1.png" alt="SMK1 Logo" style="height: 40px; margin-right: 10px;">

                        <!-- Kotak Pencarian -->
                        <form class="form-inline mr-auto navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form action="proses_pencarian.php" class="form-inline mr-auto w-100 navbar-search">
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

                        <!-- Dropdown untuk kategori buku -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kategori</span>
                            </a>
                            <div class="dropdown">
                                <ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
                                    <?php
                                // Loop through each category
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $kategori_id = $row['kategori_id'];
                                    $nama_kategori = $row['nama_kategori'];
                                    // Link pointing to the page or action corresponding to the selected category
                                    echo "<li><a class='dropdown-item' id='dropdown-item' href='kategori.php?kategori_id=$kategori_id'>$nama_kategori</a></li>";
                                }
                                // Reset the result pointer back to the first row
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
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="anggota.php">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Home
                                </a>
                                <a class="dropdown-item" href="data_koleksi.php">
                                    <i class="fas fa-heart fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Koleksi
                                </a>
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



                    <!-- Content Row -->
                    <div class="row">

                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Dashboard Pengguna</title>
                            <style>
                            .floating-notification {
                                position: fixed;
                                top: 20px;
                                /* Sesuaikan dengan posisi yang diinginkan */
                                right: 20px;
                                /* Sesuaikan dengan posisi yang diinginkan */
                                background-color: #ffffff;
                                border: 1px solid #cccccc;
                                padding: 10px;
                                border-radius: 5px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                z-index: 9999;
                            }

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
                                font-size: 20px;
                                margin-bottom: 5px;
                                color: black;
                            }

                            /* Detail buku */
                            .book-details {
                                font-size: 14px;
                                color: #666;
                            }

                            /* Tombol aksi */
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



                            /* Tombol Pinjam */
                            </style>
                        </head>

                        <body>

                            <?php
include 'koneksi.php';

// Ubah query untuk mengambil buku yang belum ditambahkan ke koleksi
$sql = "SELECT buku.*, buku_kategori.nama_kategori 
        FROM buku 
        INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id
        ";
$result = mysqli_query($koneksi, $sql);
?>

                            <div class="book-container-wrapper">
                                <?php while($data = mysqli_fetch_assoc($result)): ?>
                                <div class="book-container">
                                    <a href="detail_baca.php?id=<?= $data['buku_id'] ?>">
                                        <!-- Tambahkan tautan ke halaman detail_buku.php dengan ID buku sebagai parameter -->
                                        <div class="book-cover" style="background-image: url('<?= $data['cover']?>')">
                                        </div>
                                    </a>

                                    <div class="book-title"><?= $data['judul']?></div>

                                    <div class="book-details">
                                        <p> <?= $data['penulis']?></p>
                                        <p>Kategori: <?= $data['nama_kategori']?></p>
                                        <p>Stok: <?= $data['stok'] ?></p>


                                    </div>

                                    <?php 
                                        $queryselectedbookmark = mysqli_query($koneksi,"SELECT * FROM koleksi_pribadi WHERE buku_id ='{$data['buku_id']}'");
                                        if(mysqli_num_rows($queryselectedbookmark) === 0):
                                    ?>
                                    <div class="action-buttons">
                                        <a href="data_koleksi.php" class="btn btn-info btn-bookmark"
                                            data-buku-id="<?= $data['buku_id'] ?>"
                                            onclick="bookmarkBuku(<?= $data['buku_id'] ?>)"
                                            id="bookmark_button_<?= $data['buku_id'] ?>">
                                            <i class="fas fa-regular fa-heart"></i>
                                        </a>

                                    </div>
                                    <?php endif ?>
                                </div>
                                <?php endwhile; ?>
                            </div>


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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Tambahkan script jQuery untuk menangani permintaan AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        // Tangani klik pada tautan kategori
        $('#dropdown-item').click(function(e) {
            e.preventDefault(); // Mencegah tindakan default dari tautan

            // Ambil URL kategori dari tautan yang diklik
            var url = $(this).attr('href');

            // Lakukan permintaan AJAX untuk mendapatkan konten kategori
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Ganti konten buku dengan konten kategori yang baru
                    $('.book-container-wrapper').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    </script>

    <script>
    function bookmarkBuku(buku_id) {
        $.ajax({
            type: "POST",
            url: "proses_koleksi.php",
            data: {
                buku_id: buku_id
            },
            success: function(response) {
                alert(response); // Tampilkan pesan dari server
                // Setelah buku berhasil difavoritkan, perbarui daftar koleksi tanpa memuat ulang halaman
                $.ajax({
                    url: "anggota.php",
                    type: "GET",
                    success: function(response) {
                        // Ganti konten dengan daftar koleksi yang baru
                        $('.book-container-wrapper').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    }
    </script>


    <!-- jQuery -->

    <script>
    $(document).ready(function() {
        console.log("Script is running"); // Menambahkan pesan log untuk memeriksa apakah skrip dijalankan
        $(".btn-primary").click(function() {
            var searchValue = $(".form-control").val(); // Mengambil nilai pencarian dari input
            console.log("Search value: " +
                searchValue); // Menambahkan pesan log untuk memeriksa nilai pencarian
            $.ajax({
                url: "proses_pencarian.php", // Lokasi file PHP yang menangani pencarian
                method: "POST",
                data: {
                    search: searchValue
                }, // Mengirim data pencarian ke PHP
                success: function(response) {
                    $(".book-container-wrapper").html(
                        response); // Mengganti konten dengan hasil pencarian
                }
            });
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