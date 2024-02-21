<?php
include 'koneksi.php';

// Cek apakah form login telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Siapkan query untuk mengambil data dari database berdasarkan username
    $query = "SELECT user_id, email, password, role FROM user WHERE email = ?";

    // Siapkan prepared statement
    if ($stmt = mysqli_prepare($koneksi, $query)) {
        // Bind variabel ke prepared statement sebagai parameter
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Eksekusi prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Ambil hasil query
            mysqli_stmt_store_result($stmt);

            // Periksa apakah pengguna dengan username tersebut ditemukan
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Bind hasil query ke variabel
                mysqli_stmt_bind_result($stmt, $user_id, $db_email, $db_password, $user_role);

                // Fetch hasil
                mysqli_stmt_fetch($stmt);

                // Verifikasi password
                if (password_hash($password, PASSWORD_DEFAULT)) {
                    // Password valid, masukkan ke sesi
                    session_start();
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['email'] = $db_email;
                    $_SESSION['role'] = $user_role;

                    if($user_role === "admin"){
                        header("Location:admin/admin.php");
                    }
                    else if($user_role === "petugas"){
                        header("Location:petugas/petugas.php"); // <---- Ganti ke halaman khusus petugass
                    }
                    else if($user_role === "user"){
                        header("Location:anggota/anggota.php"); // <---- Ganti ke halaman peminjam
                    }


                    // Redirect ke halaman setelah login sukses
                    exit();
                } else {
                    echo "Username atau password salah.";
                }
            } else {
                echo "Username atau password salah.";
            }
        } else {
            echo "Terjadi kesalahan: " . mysqli_stmt_error($stmt);
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }

    // Tutup koneksi
    mysqli_close($koneksi);
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

    <title>Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">


                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if (isset($error_message)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error_message ?>
                                    </div>
                                    <?php endif; ?>
                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="email" aria-describedby="email" placeholder="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>


                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="registrasi.php">Buat Akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>