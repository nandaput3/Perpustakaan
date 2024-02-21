<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $judul = $_POST["judul"];
    $rating = $_POST["rating"];
    $ketersediaan = $_POST["ketersediaan"];
    $sinopsis = $_POST["sinopsis"]; // Perhatikan bahwa ini sudah diperbaiki menjadi "sinopsis"
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $kategori_id = $_POST["kategori_id"];
    $upload_dir = "../asset/";

    // Mengatur direktori untuk menyimpan file cover
    if (isset($_FILES["image"]["name"])) {
        $cover_path = $upload_dir.basename($_FILES["image"]["name"]);
    } else {
        echo "Error: Cover file not uploaded.";
        // Berhenti eksekusi lebih lanjut jika file cover tidak diunggah
        exit;
    }

    // Pindahkan file cover yang diunggah ke direktori upload
    if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $cover_path)) {
            echo "File has been uploaded successfully.";

            // Query untuk menyimpan data ke dalam tabel
            $sql = "INSERT INTO buku (perpus_id, judul, rating, ketersediaan, sinopsis, penulis, penerbit, tahun_terbit, kategori_id, cover) 
                    VALUES (1, '$judul', '$rating', '$ketersediaan', '$sinopsis', '$penulis', '$penerbit', '$tahun_terbit', '$kategori_id', '$cover_path')";

            if ($koneksi->query($sql)) {
                echo "Data buku berhasil ditambahkan!";
                header("Location:../admin/data_buku.php");
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        } else {
            echo "Error uploading file: " . $_FILES["image"]["error"];
        }
    } else {
        echo "Error: File not uploaded.";
    }

    // Tutup koneksi
    $koneksi->close();
}
?>