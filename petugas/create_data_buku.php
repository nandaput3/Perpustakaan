<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create data buku</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/vendor/datables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fc;
    margin: 0;
}

h2 {
    color: #4e73df;
}

form {
    width: 50%;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: calc(100% - 16px);
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

button {
    background-color: #4e73df;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

select {
    width: calc(100% - 16px);
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

a.add-button {
    background-color: #28a745;
    display: inline-block;
    margin: 5px;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

a.add-button:hover {
    background-color: #218838;
}
</style>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">reading <sup>me</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin/admin.php">
                    <span>Dashboard Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->





            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href=create_data_buku.php"> <i class="fas fa-fw fa-book"></i> <span>Data
                        Buku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_penerbit.php">
                    <i class="fas fa-fw fa-pencil-alt"></i> <span>Data Penerbit</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_peminjaman.php">
                    <i class="fas fa-fw fa-users"></i> <span>Data Peminjam </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="create_regis.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Regis Anggota </span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href=".../logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->


            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="overflow-y:hidden">

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

                        </li>


                        <!-- Nav Item - Messages -->



                        <!-- Nav Item - User Information -->


                    </ul>

                </nav>



                <div class="container" style='width:100em'>
                    <form class="form" action="proses_pendataan_buku.php" method="post" enctype="multipart/form-data">
                        <h2>Data Buku</h2>



                        <label for="judul">Judul:</label>
                        <input type="text" name="judul" required>

                        <label for="penulis">Penulis:</label>
                        <input type="text" name="penulis" required>

                        <label for="penerbit">Penerbit:</label>
                        <input type="text" name="penerbit" required>
                        <label for="sinopsis">Sinopsis:</label>
                        <input type="text" name="sinopsis" required>

                        <label for="tahun_terbit">Tahun Terbit:</label>
                        <input type="date" name="tahun_terbit" required>

                        <label for="foto">Pilih foto:</label>
                        <input type="file" name="image" id="foto">

                        <label for="kategori_id">Kategori:</label>
                        <select name="kategori_id" required>
                            <option value="1">fiksi</option>
                            <option value="2">non fiksi</option>
                            <!-- Add more categories as needed -->
                        </select>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>

        </div>
        <!-- Approach -->

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