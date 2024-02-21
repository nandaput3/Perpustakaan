<?php
include 'koneksi.php';

$query = "SELECT * FROM perpus";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">


            <div class="col-xl-6 col-lg-6 col-md-15">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akunmu!</h1>
                                    </div>

                                    <!-- ... -->
                                    <form method="post" action="proses-register.php" class="user">
                                        <div class="form-group row">
                                            <div class="form-grup">
                                                <?php if($result) : ?>
                                                <div name="perpustakaan">
                                                    <?php while ($row= mysqli_fetch_assoc($result)) : ?>
                                                    <span><?= $row['nama_perpus'] ?></span>
                                                    <?php endwhile; ?>
                                                </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <!-- ... -->
                                        <div class=" form-group row">
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control form-control-user"
                                                    id="emailInput" name="email" placeholder="Email"
                                                    onchange="checkDuplicateEmail()" required="">
                                                <span id="emailError" style="color: red; display: none;">Email sudah
                                                    ada!</span>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <!-- ... -->
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                    name="nama lengkap" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    name="username" placeholder="Username">
                                            </div>
                                        </div>
                                        <!-- ... -->
                                        <div class="form-group">
                                            <label for="alamat">No Handphone :</label>
                                            <input type="text" class="form-control form-control-user" name="no_hp"
                                                id="phoneInput" placeholder="Masukkan nomor telepon">
                                            <span id="phoneError" style="color: red; display: none;">Nomor telepon harus
                                                berupa 11 atau 12 digit dan hanya angka yang diperbolehkan!</span>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat :</label>
                                            <input type="text" class="form-control form-control-user" name="alamat"
                                                id="exampleInputEmail">
                                        </div>



                                        <!-- ... -->
                                        <!-- ... -->


                                        <hr>
                                        <div class="form-group mt-3">
                                            <button type="submit"
                                                class="btn btn-primary btn-user btn-block">Registrasi</button>
                                        </div>

                                        <hr>

                                        <div class="text-center">
                                            <a class="small" href="login.php">Sudah Punya Akun? Login!</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <script>
            function checkDuplicateEmail() {
                var inputEmail = document.getElementById('emailInput').value;
                var emailError = document.getElementById('emailError');

                // Validasi hanya dilakukan jika email diisi
                if (inputEmail.trim() !== '') {
                    // Periksa apakah email sudah digunakan
                    <?php
            // Mengonversi array PHP existingEmails menjadi array JavaScript
            echo "var existingEmails = " . json_encode($existingEmails) . ";";
            ?>

                    if (existingEmails.includes(inputEmail)) {
                        emailError.style.display = 'block'; // Tampilkan pesan error
                        return false; // Berhenti eksekusi form jika email duplikat
                    } else {
                        emailError.style.display = 'none'; // Sembunyikan pesan error jika email tidak duplikat
                        return true; // Lanjutkan eksekusi form jika email tidak duplikat
                    }
                }
            }

            // Tambahkan event listener untuk memanggil fungsi validasi saat nilai input berubah
            document.getElementById('emailInput').addEventListener('input', checkDuplicateEmail);
            </script>


            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>

</html>