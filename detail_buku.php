<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        width: 80%;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    h1 {
        font-size: 24px;
        color: #333;
    }

    p {
        font-size: 16px;
        color: #666;
        margin-bottom: 15px;
    }

    strong {
        font-weight: bold;
    }

    img {
        max-width: 200px;
        height: auto;
        margin-right: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
        color: #999;
    }
    </style>
</head>

<body>'
    <div class="container">
        <span class="close-btn" onclick="redirectToMainPage('index.php')">x</span>
        <?php
        // Hubungkan ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "perpustakaan";

        $koneksi = new mysqli($servername, $username, $password, $database);

        // Periksa koneksi
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        // Ambil id buku dari parameter URL
        if (isset($_GET['id'])) {
            $buku_id = $_GET['id'];

            // Query untuk mendapatkan detail buku berdasarkan id
            $sql = "SELECT * FROM buku WHERE buku_id = $buku_id";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                // Output data dari setiap baris hasil query
                while ($row = $result->fetch_assoc()) {
                    echo "<img src='asset/" . $row['cover'] . "' alt='Cover Buku'>";
                    echo "<h1>" . $row['judul'] . "</h1>";
                    echo "<p><strong>Penerbit:</strong> " . $row['penerbit'] . "</p>";
                    echo "<p><strong>Sinopsis:</strong> " . $row['sinopsis'] . "</p>";
                }
            } else {
                echo "Buku tidak ditemukan.";
            }
        } else {
            echo "Parameter id buku tidak ditemukan.";
        }

        $koneksi->close();
        ?>
    </div>

    <script>
    function closeWindow() {
        window.close('index.php');
    }
    </script>
</body>

</html>