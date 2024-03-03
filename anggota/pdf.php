<?php
include 'koneksi.php';

// Pastikan buku_id tersedia dalam parameter GET
if(isset($_GET['buku_id'])) {
    $buku_id = $_GET['buku_id'];

    // Ambil path file PDF dari database berdasarkan buku_id
    $sql = "SELECT pdf_path FROM buku WHERE buku_id = $buku_id";
    $result = mysqli_query($koneksi, $sql);

    // Periksa apakah data buku ditemukan
    if(mysqli_num_rows($result) > 0) {
        $data_buku = mysqli_fetch_assoc($result);
        $pdfPath = $data_buku['pdf_path'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MACA</title>
    <!-- Load PDF.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <!-- Load Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        overflow: hidden;
        /* Hindari scrollbar */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #pdf-container {
        max-width: 80%;
        max-height: 80vh;
        position: relative;
        overflow-y: auto;
        /* Mengaktifkan pengguliran vertikal jika konten terpotong */
    }

    .pdf-page {
        margin: 0 auto;
        display: block;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        margin-bottom: 20px;
        /* Menambahkan ruang antara halaman */
    }

    canvas {
        display: block;
        margin: 0 auto;
    }

    /* Gaya untuk tombol panah */
    .arrow-btn {
        position: fixed;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid #ccc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        z-index: 999;
    }

    .arrow-btn i {
        font-size: 24px;
        color: #333;
    }

    .arrow-left {
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    .arrow-right {
        right: 10px;
        bottom: 20px;
    }
    </style>
</head>

<body>
    <div id="pdf-container">
        <!-- Tombol panah kiri -->
        <div class="arrow-btn arrow-left" onclick="scrollToNextPage('up')">
            <i class="fas fa-arrow-up"></i>
        </div>

        <!-- Tombol panah kanan -->
        <div class="arrow-btn arrow-right" onclick="scrollToNextPage('down')">
            <i class="fas fa-arrow-down"></i>
        </div>
    </div>

    <script>
    // Path ke PDF
    var pdfPath = "<?php echo $pdfPath; ?>";

    // Memuat PDF
    var loadingTask = pdfjsLib.getDocument(pdfPath);
    loadingTask.promise.then(function(pdf) {
        // Loop untuk memuat setiap halaman PDF
        for (var pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
            pdf.getPage(pageNum).then(function(page) {
                var scale = 1.5;
                var viewport = page.getViewport({
                    scale: scale
                });

                // Membuat elemen canvas untuk menampilkan halaman PDF
                var canvas = document.createElement("canvas");
                var context = canvas.getContext("2d");
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Membuat elemen div untuk menampung canvas
                var pdfContainer = document.getElementById("pdf-container");
                var pdfPage = document.createElement("div");
                pdfPage.classList.add("pdf-page");
                pdfPage.appendChild(canvas);
                pdfContainer.appendChild(pdfPage);

                // Render halaman PDF ke dalam elemen canvas
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }
    });

    // Fungsi untuk menggulir halaman ke atas atau ke bawah
    function scrollToNextPage(direction) {
        var container = document.getElementById("pdf-container");
        if (direction === 'up') {
            container.scrollBy(0, -150); // Menggulir ke atas
        } else if (direction === 'down') {
            container.scrollBy(0, 150); // Menggulir ke bawah
        }
    }
    </script>
</body>

</html>


<?php
    } else {
        echo "Buku tidak ditemukan.";
    }
} else {
    echo "Parameter buku_id tidak tersedia.";
}
?>