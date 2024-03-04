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

    <title>Data Peminjam</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
.pagination button {
    background-color: #4CAF50;
    /* Warna latar belakang */
    border: none;
    /* Tanpa border */
    color: white;
    /* Warna teks */
    padding: 8px 16px;
    /* Padding tombol */
    text-align: center;
    /* Posisi teks di tengah tombol */
    text-decoration: none;
    /* Tanpa dekorasi teks */
    display: inline-block;
    /* Menjadikan tombol sebagai blok inline */
    margin: 4px 2px;
    /* Margin antara tombol */
    cursor: pointer;
    /* Ubah kursor saat mengarah ke tombol */
    border-radius: 4px;
    /* Bulatan sudut tombol */
}

.pagination button:hover {
    background-color: #45a049;
    /* Warna latar belakang saat tombol dihover */
}

.pagination button.active {
    background-color: #007bff;
    /* Warna latar belakang untuk halaman aktif */
}
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
                <div class="sidebar-brand-text mx-3">MACA<sup></sup></div>
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
                    <i class="fas fa-fw fa-file"></i> <span>Data Peminjam </span></a>
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



                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- Content Row -->
                    <div class="row">

                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Data Peminjaman</title>

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
                            </style>
                        </head>

                        <body>
                            <h1>Data Peminjaman</h1>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th> Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Status Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
            // Query untuk mengambil data peminjaman dari database dengan nama lengkap pengguna
            $sql = "SELECT peminjaman.*, user.nama_lengkap AS nama_lengkap, buku.judul AS judul_buku
                    FROM peminjaman 
                    INNER JOIN buku ON peminjaman.buku_id = buku.buku_id 
                    INNER JOIN user ON peminjaman.user_id = user.user_id";

            $result = mysqli_query($koneksi, $sql);

            // Tampilkan data peminjaman dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nama_lengkap'] . "</td>"; // Menampilkan nama lengkap pengguna
                echo "<td>" . $row['judul_buku'] . "</td>"; // Menampilkan judul buku
                echo "<td>" . $row['tgl_pinjam'] . "</td>";
                echo "<td>" . $row['status_pinjam'] . "</td>";
                echo "<td>" . $row['tgl_kembali'] . "</td>";
                echo "<td>";
                // Tambahkan tombol "Tarik" dengan link ke file PHP yang menangani operasi tarik buku
                echo "<form action='tarik_buku.php' method='post'>";
                echo "<input type='hidden' name='peminjaman_id' value='" . $row['peminjaman_id'] . "'>";
                echo "<button type='submit' class='btn-tarik'>Kembalikan</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
                                </tbody>

                            </table>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault(); // Menghentikan pengiriman formulir default

            // Kirim data formulir menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: 'tarik_buku.php', // Ganti dengan URL ke file pemrosesan Anda
                data: $(this).serialize(),
                success: function(response) {
                    // Tampilkan notifikasi menggunakan alert atau elemen HTML lainnya
                    alert(response); // Tampilkan notifikasi sebagai alert

                    // Atau Anda juga bisa menampilkan notifikasi di elemen HTML tertentu
                    // Misalnya, jika Anda memiliki elemen dengan id "notification":
                    // $('#notification').html(response); // Menampilkan notifikasi di elemen dengan id "notification"
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error(error); // Tampilkan pesan kesalahan dalam konsol browser
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
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const tables = document.querySelectorAll("table"); // Pilih semua tabel

        tables.forEach(function(table) {
            const rows = table.querySelectorAll("tbody tr"); // Pilih semua baris dalam tabel
            const rowsPerPage = 10; // Tentukan jumlah baris per halaman
            const numPages = Math.ceil(rows.length / rowsPerPage); // Hitung jumlah halaman

            let currentPage = 1; // Halaman saat ini

            // Fungsi untuk menampilkan baris sesuai dengan halaman yang dipilih
            function showPage(page) {
                // Sembunyikan semua baris
                rows.forEach(function(row) {
                    row.style.display = "none";
                });

                // Tampilkan baris yang sesuai dengan halaman yang dipilih
                const startIndex = (page - 1) * rowsPerPage;
                const endIndex = startIndex + rowsPerPage;
                for (let i = startIndex; i < endIndex && i < rows.length; i++) {
                    rows[i].style.display = "table-row";
                }
            }

            // Inisialisasi tampilan untuk halaman pertama
            showPage(currentPage);

            // Fungsi untuk menampilkan navigasi current slide
            function renderPagination() {
                const paginationContainer = document.createElement("div");
                paginationContainer.classList.add("pagination");

                // Tambahkan tombol prev
                const prevButton = document.createElement("button");
                prevButton.textContent = "Prev";
                prevButton.addEventListener("click", function() {
                    if (currentPage > 1) {
                        currentPage--;
                        showPage(currentPage);
                        renderPagination();
                    }
                });
                paginationContainer.appendChild(prevButton);

                // Tambahkan nomor halaman
                for (let i = 1; i <= numPages; i++) {
                    const pageButton = document.createElement("button");
                    pageButton.textContent = i;
                    pageButton.addEventListener("click", function() {
                        currentPage = i;
                        showPage(currentPage);
                        renderPagination();
                    });
                    paginationContainer.appendChild(pageButton);
                    if (i !== currentPage) {
                        pageButton.style.display = "none"; // Sembunyikan nomor halaman yang tidak aktif
                    }
                }

                // Tambahkan tombol next
                const nextButton = document.createElement("button");
                nextButton.textContent = "Next";
                nextButton.addEventListener("click", function() {
                    if (currentPage < numPages) {
                        currentPage++;
                        showPage(currentPage);
                        renderPagination();
                    }
                });
                paginationContainer.appendChild(nextButton);

                // Sisipkan navigasi ke dalam dokumen
                const parent = table.parentNode;
                parent.insertBefore(paginationContainer, table.nextSibling);
                paginationContainer.style.textAlign = "center"; // Posisikan di tengah tabel
                paginationContainer.style.marginTop = "10px"; // Beri margin atas
            }

            // Render navigasi current slide
            renderPagination();
        });
    });
    </script>

</body>

</html>