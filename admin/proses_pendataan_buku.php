<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $judul = $_POST["judul"];
    $stok = $_POST["stok"];
    $sinopsis = $_POST["sinopsis"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $kategori_id = $_POST["kategori_id"];
    $upload_dir = "../asset";

    // Mengatur direktori untuk menyimpan file cover
    if (isset($_FILES["cover"]) && $_FILES["cover"]["error"] == UPLOAD_ERR_OK) {
        $cover_path = $upload_dir .  "../asset/" . basename($_FILES["cover"]["name"]);
    } else {
        echo "Error: Cover file not uploaded.";
        // Berhenti eksekusi lebih lanjut jika file cover tidak diunggah
        exit;
    }

    // Mengatur direktori untuk menyimpan file PDF
    if (isset($_FILES["pdf"]) && $_FILES["pdf"]["error"] == UPLOAD_ERR_OK) {
        $pdf_path = $upload_dir .  "../pdf/" . basename($_FILES["pdf"]["name"]);
    } else {
        echo "Error: PDF file not uploaded.";
        // Berhenti eksekusi lebih lanjut jika file PDF tidak diunggah
        exit;
    }

    // Pindahkan file cover yang diunggah ke direktori upload
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $cover_path)) {
        echo "Cover file has been uploaded successfully.";
    } else {
        echo "Error uploading cover file: " . $_FILES["cover"]["error"];
        exit;
    }

    // Pindahkan file PDF yang diunggah ke direktori upload
    if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $pdf_path)) {
        echo "PDF file has been uploaded successfully.";

        // Query untuk menyimpan data ke dalam tabel
        $sql = "INSERT INTO buku (perpus_id, judul, stok, sinopsis, penulis, penerbit, tahun_terbit, kategori_id, cover, pdf_path) 
                VALUES (1, '$judul', '$stok', '$sinopsis', '$penulis', '$penerbit', '$tahun_terbit', '$kategori_id', '$cover_path', '$pdf_path')";

        if ($koneksi->query($sql)) {
            // Update stok buku
            $sql_update_stok = "UPDATE buku SET stok = $stok WHERE judul = '$judul'";
            if ($koneksi->query($sql_update_stok)) {
                echo "Data buku berhasil ditambahkan!";
                header("Location: data_buku.php");
                exit;
            } else {
                echo "Error updating book stock: " . $koneksi->error;
                exit;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
            exit;
        }
    } else {
        echo "Error uploading PDF file: " . $_FILES["pdf"]["error"];
        exit;
    }
}
?>