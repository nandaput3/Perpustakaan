<!-- Mulai sesi -->
<?php
include 'koneksi.php';
session_start();

// Buat koneksi ke database
$host = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "perpustakaan"; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* Style untuk tabel */
    table {
        width: 100%;
        max-width: 800px;
        /* Membatasi lebar maksimum tabel */
        margin: 0 auto;
        /* Pusatkan tabel di tengah layar */
        border-collapse: collapse;
        border: 1px solid #ddd;
        border-radius: 8px;
        /* Menambahkan sudut bulat pada tabel */
        overflow: hidden;
        /* Mengatasi bayangan yang mungkin muncul di luar tabel */
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 2px solid #ddd;
        border-right: 1px solid #ddd;
        position: relative;
        /* Mengatur posisi relatif untuk efek bayangan */
    }

    th {
        background-color: grey;
        color: #ffff;
    }

    /* Hover effect pada baris tabel */
    tr:hover {
        background-color: #f5f5f5;
    }

    /* Warna latar belakang bergantian untuk baris tabel */
    tr:nth-child(even) {
        background: linear-gradient(to right, #ffffff, #f9f9f9);
        /* Gradasi warna latar belakang */
    }

    /* Efek bayangan pada sel */
    th:before,
    td:before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 4px;
        /* Lebar bayangan */
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0));
        /* Gradasi warna bayangan */
        transition: width 0.3s;
        /* Animasi perubahan lebar */
        z-index: 1;
        /* Menempatkan bayangan di atas konten */
    }

    /* Efek bayangan pada hover */
    tr:hover td:before {
        width: 100%;
        /* Lebar bayangan saat hover */
    }

    /* Tampilan responsif untuk tabel */
    @media screen and (max-width: 600px) {
        table {
            width: 100%;
            max-width: 100%;
            /* Lebar maksimum untuk tampilan responsif */
        }

        th,
        td {
            padding: 8px;
        }
    }
    </style>


</head>

<body>


    <!-- Tabel Riwayat Peminjaman -->
    <div class="row">
        <div class="col">
            <h4 class="mb-4">Riwayat Peminjaman</h4>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    // Query untuk mendapatkan riwayat peminjaman buku oleh pengguna
                    $sql_riwayat = "SELECT buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.status_pinjam
                                    FROM peminjaman
                                    INNER JOIN buku ON peminjaman.buku_id = buku.buku_id
                                    WHERE peminjaman.user_id = {$_SESSION['user_id']}";
                    $result_riwayat = mysqli_query($koneksi, $sql_riwayat);
                    $no = 1;
                    while ($row_riwayat = mysqli_fetch_assoc($result_riwayat)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row_riwayat['judul'] . "</td>";
                        echo "<td>" . $row_riwayat['tgl_pinjam'] . "</td>";
                        echo "<td>" . $row_riwayat['tgl_kembali'] . "</td>";
                        echo "<td>" . $row_riwayat['status_pinjam'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>