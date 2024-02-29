<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

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

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit Data Pengguna
                    </div>
                    <div class="card-body">
                        <?php
                        // Sertakan file koneksi.php untuk mendapatkan koneksi ke database
                        include 'koneksi.php';

                        // Ambil ID pengguna dari URL
                        $user_id = $_GET['id'];

                        // Lakukan query untuk mendapatkan data pengguna berdasarkan ID
                        $query = "SELECT * FROM user WHERE user_id = $user_id";

                        // Lakukan kueri dengan menggunakan variabel $koneksi
                        $result = mysqli_query($koneksi, $query);

                        // Periksa apakah data ditemukan
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_assoc($result);
                            // Tampilkan form untuk mengedit data pengguna
                        ?>
                        <form action="proses_edit_user.php" method="POST">
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="<?php echo $row['username']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $row['email']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    value="<?php echo $row['nama_lengkap']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="no_hp">Nomor HP:</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    value="<?php echo $row['no_hp']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea class="form-control" id="alamat"
                                    name="alamat"><?php echo $row['alamat']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin
                                    </option>
                                    <option value="petugas" <?php if ($row['role'] == 'petugas') echo 'selected'; ?>>
                                        Petugas</option>
                                    <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>User
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                        <?php
                        } else {
                            echo "Data pengguna tidak ditemukan.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>