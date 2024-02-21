<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Buku</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <style>
    .container {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php
                    include "koneksi.php";

                    // Periksa apakah ID buku sudah disediakan melalui parameter URL
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        // Query untuk mendapatkan data buku berdasarkan ID
                        $sql = "SELECT * FROM buku WHERE buku_id = $id";
                        $result = mysqli_query($koneksi, $sql);

                        // Periksa apakah data buku ditemukan
                        if (mysqli_num_rows($result) > 0) {
                            $data = mysqli_fetch_assoc($result);
                    ?>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Edit Buku
                                </div>
                                <div class="card-body">
                                    <form action="proses_edit_buku.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $data['buku_id'] ?>">
                                        <div class="form-group">
                                            <label for="judul">Judul:</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                value="<?= $data['judul'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="penulis">Penulis:</label>
                                            <input type="text" class="form-control" id="penulis" name="penulis"
                                                value="<?= $data['penulis'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="penerbit">Penerbit:</label>
                                            <input type="text" class="form-control" id="penerbit" name="penerbit"
                                                value="<?= $data['penerbit'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun_terbit">Tahun Terbit:</label>
                                            <input type="text" class="form-control" id="tahun_terbit"
                                                name="tahun_terbit" value="<?= $data['tahun_terbit'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="stok">stok:</label>
                                            <select class="form-control" id="stok" name="stok">
                                                <option value="Tersedia"
                                                    <?= ($data['stok'] == 'Tersedia') ? 'selected' : '' ?>>
                                                    5</option>
                                                <option value="Dipinjam"
                                                    <?= ($data['stok'] == 'Dipinjam') ? 'selected' : '' ?>>
                                                    10</option>
                                                <option value="Hilang"
                                                    <?= ($data['stok'] == 'Hilang') ? 'selected' : '' ?>>15
                                                </option>
                                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="kategori">Kategori:</label>
                                            <select class="form-control" id="kategori" name="kategori">
                                                <?php
                                                        // Query untuk mendapatkan semua kategori buku
                                                        $sql_kategori = "SELECT * FROM buku_kategori";
                                                        $result_kategori = mysqli_query($koneksi, $sql_kategori);

                                                        // Tampilkan pilihan kategori
                                                        while ($kategori = mysqli_fetch_assoc($result_kategori)) {
                                                            $selected = ($kategori['kategori_id'] == $data['kategori_id']) ? "selected" : "";
                                                            echo "<option value='{$kategori['kategori_id']}' $selected>{$kategori['nama_kategori']}</option>";
                                                        }
                                                        ?>
                                            </select>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="data_buku.php" class="btn btn-secondary">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        } else {
                            echo "<p>Data buku tidak ditemukan.</p>";
                        }
                    } else {
                        echo "<p>ID buku tidak disediakan.</p>";
                    }
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/vendor/js/sb-admin-2.min.js"></script>

</body>

</html>