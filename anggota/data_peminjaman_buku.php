<?php
    include "koneksi.php";
    session_start();
    // Query untuk mendapatkan data kategori buku
$sql_kategori = "SELECT * FROM buku_kategori";
$result = mysqli_query($koneksi, $sql_kategori);
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

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Content Row -->
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
            <!-- Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col">

                        <h4 class="float-left ml-3">Daftar Buku yang Dipinjam</h4>
                    </div>
                </div>






                <?php
                        include 'koneksi.php';

                        if(isset($_GET['pinjam_id'])) {
                            $pinjam_id = $_GET['pinjam_id'];

                            $sql_pinjam = "SELECT peminjaman.*, buku.* 
                            FROM peminjaman 
                            INNER JOIN buku ON peminjaman.buku_id = buku.buku_id 
                            WHERE peminjaman_id = $pinjam_id  AND peminjaman.user_id = {$_SESSION['user_id']}"  ;

                            $result_pinjam = mysqli_query($koneksi, $sql_pinjam);

                            if(mysqli_num_rows($result_pinjam) == 0) {
                                echo "Data tidak ditemukan.";
                            } else {
                                $row_pinjam = mysqli_fetch_assoc($result_pinjam);

                                echo "<p>Tanggal Peminjaman: " . $row_pinjam['tgl_pinjam'] . "</p>";
                                echo "<p>Tanggal Pengembalian: " . $row_pinjam['tgl_kembali'] . "</p>";

                                if($row_pinjam['status_pinjam'] == 'dipinjam') {
                                    echo "<a href='proses_pengembalian.php?pinjam_id=$pinjam_id' class='btn btn-success'>Kembalikan Buku</a>";
                                } else {
                                    echo "<p>Buku telah dikembalikan pada tanggal: " . $row_pinjam['tanggal_pengembalian'] . "</p>";
                                }
                            }
                        }

                        ?>
                <?php
    // Fetch data only if $_GET['pinjam_id'] is set
    $sql_pinjam = "SELECT peminjaman.*, buku.* 
    FROM peminjaman 
    INNER JOIN buku ON peminjaman.buku_id = buku.buku_id 
    INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id 
    WHERE peminjaman.status_pinjam = 'dipinjam' AND peminjaman.user_id = {$_SESSION['user_id']}"; // Hanya menampilkan buku yang masih dipinjam

    $result_pinjam = mysqli_query($koneksi, $sql_pinjam);

    // Check if there are borrowed books
    if(mysqli_num_rows($result_pinjam) > 0) {
?>

                <div class="row">
                    <div class="book-container-wrapper">
                        <?php 
            while($data_pinjam = mysqli_fetch_assoc($result_pinjam)) {
        ?>
                        <div class="book-container">
                            <div class="book-cover" style="background-image: url('<?= $data_pinjam['cover']?>')"></div>
                            <div class="book-title"><?= $data_pinjam['judul']?></div>
                            <div class="book-details">
                                <p>Tanggal Pinjam: <?= $data_pinjam['tgl_pinjam']?></p>
                                <p>Tanggal Kembali: <?= $data_pinjam['tgl_kembali']?></p>
                                <?php 
                    // Check if the book is already borrowed or not
                    $buku_id = $data_pinjam['buku_id'];
                    $peminjaman_id = $data_pinjam['peminjaman_id'];
                    $query_pinjam = "SELECT * FROM peminjaman WHERE buku_id = $buku_id AND status_pinjam = 'dipinjam'";
                    $result_borrowed = mysqli_query($koneksi, $query_pinjam);
                    
                    if(mysqli_num_rows($result_borrowed) > 0):
                        echo "<button onclick='kembalikanBuku($peminjaman_id); redirectToBeranda();' class='btn btn-danger'>Kembalikan</button>";
                        echo "<script>
                                function redirectToBeranda() {
                                    window.location.href = 'anggota.php'; 
                                }
                              </script>";
                        echo "<a href='pdf.php?buku_id=$buku_id' class='btn btn-primary'>Baca</a>";
                    else:
                        echo "<a href='data_peminjaman_buku.php?buku_id=$buku_id' class='btn btn-primary'>Pinjam</a>";
                    endif;
                ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <?php
    } else {
        // Jika tidak ada buku yang dipinjam, maka tampilkan pesan
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Belum ada buku yang dipinjam!</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    }
?>

            </div>


        </div>
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
                url: 'proses_pengembalian.php',
                type: 'POST',
                data: {
                    pinjam_id: pinjam_id,
                    tanggal_pengembalian: tanggal_pengembalian
                },
                success: function(response) {
                    // Jika berhasil, lakukan sesuatu (misalnya, tampilkan pesan sukses)
                    alert('Buku telah berhasil dikembalikan.');
                    console.log(pinjam_id)

                    // Temukan tombol kembalikan buku yang sesuai
                    var button = $('div data-pinjam_id=["' + pinjam_id + '"] button.btn-danger');

                    // Ubah warna atau gaya tombol menjadi tidak aktif
                    button.removeClass('btn-danger').addClass('btn-secondary').text(
                            'Telah Dikembalikan')
                        .prop('disabled', true);

                    // Kemudian, redirect ke halaman tampilkan tanggal pengembalian
                    //window.location.href = 'anggota.php?pinjam_id=' + pinjam_id;
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


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