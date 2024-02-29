<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $judul = $_POST["judul"];
    $rating = $_POST["rating"];
    // Ambil data lainnya sesuai dengan input dari formulir

    // Pastikan variabel $upload_dir sesuai dengan direktori yang diinginkan
    $upload_dir = "../asset/";

    if (isset($_FILES["image"]["name"])) {
        $cover_path = $upload_dir . basename($_FILES["image"]["name"]);
    } else {
        echo "Error: Cover file not uploaded.";
        exit;
    }

    if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $cover_path)) {
            // Query untuk menyimpan data ke dalam tabel
            $sql = "INSERT INTO buku (perpus_id, judul, rating, ketersediaan, sinopsis, penulis, penerbit, tahun_terbit, kategori_id, cover) 
                    VALUES (1, '$judul', '$rating', '$ketersediaan', '$sinopsis', '$penulis', '$penerbit', '$tahun_terbit', '$kategori_id', '$cover_path')";

            if ($koneksi->query($sql)) {
                echo "Data buku berhasil ditambahkan!";
                header("Location:../admin/data_buku.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        } else {
            echo "Error uploading file: " . $_FILES["image"]["error"];
        }
    } else {
        echo "Error: File not uploaded.";
    }
}
?>