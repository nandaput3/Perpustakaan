<?php
// Tentukan lokasi penyimpanan file PDF di server
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
$uploadOk = 1;
$pdfFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// Periksa apakah file PDF yang diunggah adalah file PDF yang valid
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pdfFile"]["tmp_name"]);
    if($check !== false) {
        echo "File is a PDF - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a PDF.";
        $uploadOk = 0;
    }
}

// Periksa apakah file PDF sudah ada di server
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Batasi ukuran file PDF yang diunggah
if ($_FILES["pdfFile"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Izinkan hanya beberapa format file PDF tertentu
if($pdfFileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}

// Periksa apakah $uploadOk bernilai 0 karena adanya kesalahan
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// Jika semua persyaratan terpenuhi, coba unggah file
} else {
    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["pdfFile"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>