<?php
?>
<?php
include 'koneksi.php';
session_start();
?>
<?php
// Skrip ini harus disertakan di atas tag </html>

if(isset($_GET['action']) && $_GET['action'] == 'hapus_koleksi') {
    $buku_id = $_GET['buku_id'];
    $user_id = $_SESSION['user_id']; // Sesuaikan dengan session user_id Anda

    // Query untuk menghapus buku dari koleksi
    $sql_hapus = "DELETE FROM koleksi_pribadi WHERE user_id = $user_id AND buku_id = $buku_id";
    if(mysqli_query($koneksi, $sql_hapus)) {
        echo "Buku telah dihapus dari koleksi.";
    } else {
        echo "Terjadi kesalahan saat menghapus buku dari koleksi: " . mysqli_error($koneksi);
    }
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

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-secondary btn-sm float-left mb-3" href="javascript:history.go(-2)">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h4 class="float-left ml-3">Daftar Koleksi Buku</h4>
                        </div>
                    </div>
                    <hr>

                    <!-- Content Row -->
                    <div class="row">
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

                        <?php
// Ambil data koleksi pribadi pengguna
$user_id = $_SESSION['user_id']; // Anda perlu mengatur session user_id setelah pengguna login
$sql_koleksi = "SELECT buku.*, buku_kategori.nama_kategori 
                FROM koleksi_pribadi 
                INNER JOIN buku ON koleksi_pribadi.buku_id = buku.buku_id 
                INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id 
                WHERE koleksi_pribadi.user_id = $user_id";

$result_koleksi = mysqli_query($koneksi, $sql_koleksi);

// Tampilkan koleksi pribadi
if(mysqli_num_rows($result_koleksi) > 0) {
    while($data = mysqli_fetch_assoc($result_koleksi)) { ?>
                        <!-- echo "<div class='koleksi-item'>";
        echo "<img src='" . $row_koleksi['cover'] . "' alt='" . $row_koleksi['judul'] . "' />";
        echo "<h3>" . $row_koleksi['judul'] . "</h3>";
        // Tambahkan informasi lain yang ingin Anda tampilkan
        echo "</div>"; -->
                        <div class="book-container">
                            <div class="book-cover" style="background-image: url('<?= $data['cover']?>')">
                            </div>
                            <div class="book-title"><?= $data['judul']?></div>
                            <div class="book-details">
                                <p> <?= $data['penulis']?></p>
                                <p>Kategori: <?= $data['nama_kategori']?></p>

                            </div>
                            <div class="action-buttons">

                                <a href="#" class="btn btn-info btn-bookmark"
                                    onclick="toggleKoleksi(<?= $data['buku_id'] ?>)">
                                    <i class="fas fa-bookmark"></i>
                                </a>


                            </div>
                        </div>
                        <?php }} else { ?>
                        Belum ada koleksi
                        <?php } ?>



                        <hr>
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col">
                                <div class="book-container-wrapper">
                                    <?php while($data = mysqli_fetch_assoc($result_koleksi)): ?>
                                    <div class="book-container" id="book_<?= $data['buku_id'] ?>">
                                        <a href="detail_baca.php?id=<?= $data['buku_id'] ?>">
                                            <!-- Tambahkan tautan ke halaman detail_buku.php dengan ID buku sebagai parameter -->
                                            <div class="book-cover"
                                                style="background-image: url('<?= $data['cover']?>')">
                                            </div>
                                        </a>
                                        <div class="book-title"><?= $data['judul']?></div>
                                        <div class="book-details">
                                            <p><?= $data['penulis']?></p>
                                            <p>Kategori: <?= $data['nama_kategori']?></p>
                                        </div>
                                        <div class="action-buttons">

                                            <a href="#" onclick="toggleKoleksi(<?= $data['buku_id'] ?>)">
                                                <button type="button" class="btn btn-danger"><i
                                                        class="fas fa-bookmark"></i></button>
                                            </a>



                                            </a>


                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
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
        function toggleKoleksi(buku_id) {
            // Kirim permintaan AJAX untuk menambah atau menghapus buku dari koleksi
            $.ajax({
                url: 'toggle_koleksi.php',
                type: 'GET', // Mengubah menjadi GET karena Anda mengirim data melalui URL
                data: {
                    action: 'hapus_koleksi',
                    buku_id: buku_id
                },
                success: function(response) {
                    alert(response); // Tampilkan pesan dari server
                    // Jika berhasil, hapus buku dari tampilan halaman
                    $('#book_' + buku_id).remove();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat memproses permintaan.');
                }
            });
        }
        </script>


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
        function kembalikanBuku(pinjam_id) {
            if (confirm('Apakah Anda yakin ingin mengembalikan buku ini?')) {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();
                var tanggal_pengembalian = yyyy + '-' + mm + '-' + dd;

                // Kirim permintaan AJAX
                $.ajax({
                    url: 'proses_pengembalian.php', // Sesuaikan dengan nama skrip PHP Anda
                    type: 'POST',
                    data: {
                        pinjam_id: pinjam_id,
                        tanggal_pengembalian: tanggal_pengembalian
                    },
                    success: function(response) {
                        alert('Buku telah berhasil dikembalikan.');
                        // Lakukan tindakan lain yang sesuai
                    },
                    error: function(xhr, status, error) {
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