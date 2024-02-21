<?php
?>

<?php
// Periksa apakah ada pesan notifikasi yang disimpan dalam session
if (isset($_SESSION['notification'])) {
    // Tampilkan pesan notifikasi
    echo '<div class="notification">' . $_SESSION['notification'] . '</div>';
    // Hapus pesan notifikasi dari session agar tidak ditampilkan lagi setelah refresh
    unset($_SESSION['notification']);
}
?>
<?php

session_start();

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

    <title>Reading Me</title>

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

                    <form class="form-inline mr-auto w-100 navbar-search">
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

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->


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
                                <a class="dropdown-item" href="data_koleksi.php">
                                    <i class="fas fa-bookmark fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Koleksi
                                </a>
                                <a class="dropdown-item" href="data_peminjaman_buku.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Peminjaman
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Buku</h1>

                    </div>

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
        include "koneksi.php";

        $sql = "SELECT buku.*, buku_kategori.nama_kategori FROM buku INNER JOIN buku_kategori ON buku.kategori_id = buku_kategori.kategori_id";
        $result = mysqli_query($koneksi, $sql);
        
    ?>

                            <div class="book-container-wrapper">
                                <?php while($data = mysqli_fetch_assoc($result)): ?>
                                <div class="book-container">
                                    <div class="book-cover" style="background-image: url('<?= $data['cover']?>')">
                                    </div>
                                    <div class="book-title"><?= $data['judul']?></div>

                                    <div class="book-details">
                                        <p>Rating: <?= $data['rating']?></p>
                                        <p>Penulis: <?= $data['penulis']?></p>
                                        <p>Tahun Terbit: <?= $data['tahun_terbit']?></p>
                                        <p>Kategori: <?= $data['nama_kategori']?></p>

                                    </div>
                                    <div class="action-buttons">
                                        <a href="detail_baca.php?id=<?= $data['buku_id'] ?> <?= $data['judul']  ?>"><button
                                                type="button" class="btn btn-primary"><i
                                                    class="fas fa-book-open"></i></button></a>



                                        <a href="proses_koleksi.php?buku_id=<?php echo $data["buku_id"] ?>"
                                            id="tambahKoleksi">
                                            <button type="button" class="btn btn-danger"><i
                                                    class="fas fa-bookmark"></i></button>
                                        </a>

                                        <a href="ulasan.php?id=<?= $data['buku_id'] ?>&judul=<?= $data['judul'] ?>"><button
                                                type="button" class="btn btn-warning"><i
                                                    class="fas fa-comment"></i></button></a>

                                        <button type="button" class="btn btn-success pinjam-btn"
                                            data-id="<?= $data['buku_id'] ?>" data-judul="<?= $data['judul'] ?>"
                                            onclick="disableButton(this)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
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
    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel"> Yakin ingin meminjam buku ini?
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" id="confirmPinjam">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cari tombol dengan ID "tambahKoleksi"
        var tombolTambahKoleksi = document.getElementById('tambahKoleksi');

        // Tambahkan event listener untuk menangani klik tombol
        tombolTambahKoleksi.addEventListener('click', function() {
            // Menonaktifkan tombol setelah diklik
            tombolTambahKoleksi.disabled = true;
        });
    });
    </script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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



    <script>
    document.getElementById("tambahKoleksi").addEventListener("click", function(event) {
        event.preventDefault(); // Menghentikan perilaku default dari link

        // Memeriksa apakah tombol sudah dinonaktifkan
        if (this.getAttribute('data-disabled') === 'true') {
            return; // Jika sudah dinonaktifkan, hentikan fungsi
        }

        var btn = this.querySelector('button');
        btn.disabled = true; // Menonaktifkan tombol
        this.setAttribute('data-disabled', 'true'); // Menandai tombol sebagai dinonaktifkan

        // Membuat elemen notifikasi
        var notifElement = document.createElement('div');
        notifElement.className = 'floating-notification';
        notifElement.innerHTML = 'Koleksi ditambahkan';

        // Memasukkan elemen notifikasi ke dalam dokumen
        document.body.appendChild(notifElement);

        // Mengatur waktu penghapusan notifikasi (misal: 3 detik)
        setTimeout(function() {
            notifElement.remove(); // Menghapus elemen notifikasi dari dokumen
        }, 3000);

        // Mengirimkan permintaan HTTP ke proses_koleksi.php
        var xhr = new XMLHttpRequest();
        xhr.open("GET", this.href, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Memuat data koleksi
                var dataKoleksi = xhr.responseText;
                document.getElementById("dataKoleksi").innerHTML = dataKoleksi;
            }
        };
        xhr.send();
    });
    </script>


    <script>
    function disableButton(button) {
        // Mendapatkan data ID buku dari atribut data
        var bukuId = button.getAttribute('data-id');

        // Kirim AJAX request untuk memeriksa apakah buku sudah dipinjam
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_peminjaman.php?buku_id=' + bukuId, true);

        // Ketika respons dari server diterima
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Jika buku sudah dipinjam, nonaktifkan tombol
                if (xhr.responseText === 'dipinjam') {
                    button.disabled = true;
                    alert('Buku ini sudah dipinjam.');
                }
            }
        };

        // Mengirim request
        xhr.send();
    }
    </script>

    <script>
    $(document).ready(function() {
        var buku_id;

        // Event listener for clicking pinjam button
        $('.pinjam-btn').click(function() {
            buku_id = $(this).data('id'); // Get book ID
            $('#confirmModal').modal('show'); // Show confirmation modal
        });

        // Event listener for clicking 'Ya' on confirmation modal
        $('#confirmPinjam').click(function() {
            // Redirect to pinjam_buku.php with book ID as parameter
            window.location.href = 'data_peminjaman_buku.php ? id = ' + buku_id;
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