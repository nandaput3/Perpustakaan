<!DOCTYPE html>
<html lang="en">

<he.mySlides>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-5YaiFvEd5TDkVgdazs6Xuzr3n3Qggn+RZBYFr0TSE7F+nVW6ZO0DIbZBqc2dk/jV" crossorigin="anonymous">
    <title>Perpustakaan Online</title>
    <style>
    /* CSS Anda di sini */

    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    header {
        background-color: #9195F6;
        color: #fff;
        padding: 20px 0;
    }

    #home {
        margin-bottom: 100px;
        margin-top: 20px;
        /* Menambahkan margin bawah di bagian Home */
    }



    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;

    }

    .logo {
        display: flex;
        align-items: center;
    }

    .logo img {
        height: 50px;
        margin-right: 10px;
    }

    .navbar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    .navbar li {
        margin-left: 20px;
    }

    .navbar li a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
    }

    .navbar li a:hover {
        background-color: #B5C0D0;
    }

    .active {
        font-weight: bold;
    }

    main {
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    footer {
        background-color: #9195F6;
        color: #fff;
        text-align: center;
        padding: 10px 0;
    }

    .footer-links {
        display: flex;
        justify-content: space-between;
        padding: 20px 0;
    }

    .footer-column {
        flex: 1;
    }

    .footer-column h3 {
        margin-bottom: 10px;
    }

    .footer-column ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-column ul li {
        margin-bottom: 5px;
    }

    .footer-column ul li a {
        color: #fff;
        text-decoration: none;
    }

    .footer-column ul li a:hover {
        text-decoration: underline;
    }

    .slideshow-container {
        max-width: 800px;
        position: relative;
        margin: auto;
        overflow: hidden;
        /* Menambahkan overflow untuk clear fix */
    }


    .slideshow-container img {
        max-width: 100%;
        /* Menyesuaikan ukuran maksimum gambar */
        height: auto;
    }

    /* Tombol sebelum dan sesudah */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Style the dots */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    .mySlides {
        float: left;
        /* Mengatur gambar-gambar untuk float ke kiri */
        margin-right: 20px;
        /* Memberikan jarak antar gambar */
    }


    .mySlides img {
        width: 200px;
        /* Atur lebar gambar di sini */
        height: auto;
        margin-right: 20px;
    }


    /* Clear fix untuk membersihkan float */
    .slideshow-container::after {
        content: "";
        display: table;
        clear: both;
    }

    .welcome-section {
        display: flex;
        align-items: center;
    }

    .image-column {
        flex: 1;
        margin-right: 20px;
        /* Jarak antara gambar dan teks */
    }

    .image-column img {
        width: 100%;
        /* Agar gambar mengisi lebar kolom */
        max-width: 400px;
        /* Atur lebar maksimum gambar */
        height: auto;
    }

    .text-column {
        flex: 2;
        /* Memberikan ruang yang lebih besar untuk teks */
    }

    .text-column h2 {
        margin-top: 0;
        /* Menghapus margin atas untuk judul */
    }

    .text-column p {
        margin-left: 0;
        /* Menghapus margin kiri untuk paragraf */
    }
    </style>


    <body>
        <header>
            <nav>
                <div class="logo">
                    <img src="smk1.png" alt="Library Logo">
                    <h1>MACA</h1>
                </div>
                <ul class="navbar">
                    <li><a href="#home">Home</a></li>
                    <li><a href="login.php">Login</a></li>

                    <li><a href="registrasi.php" class="active">Signup</a></li>
                </ul>
            </nav>

        </header>
        <main>
            <section id="home">
                <div class="container">
                    <div class="welcome-section">
                        <div class="image-column">
                            <img src="buku2.jpg" alt="Perpustakaan" class="library-image">
                        </div>
                        <div class="text-column">
                            <h1>Selamat datang di Perpustakaan Online</h1>
                            <p>Hai!! bacalah buku di Perpustakaan kami. Kamu bisa membaca tanpa menyentuh buku dan
                                membuka lemabaran kertas tebal!!
                                Perpustakaan menyediakan buku terpopuler yang banyak!!!
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="buku">
                <div class="container">
                    <h2>Buku Terpopuler</h2>
                    <div class="slideshow-container">
                        <?php
                    // Database configuration
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "perpustakaan";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query to fetch books
                    $sql = "SELECT * FROM buku";
                    $result = $conn->query($sql);

                    // Display books
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="mySlides fade">';
                            echo '<img src="asset/' . $row["cover"] . '" alt="' . $row["judul"] . '">';
                            echo '</div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                    </div>
                    <br>
                    <!-- Dots/bullets -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="container">
                <div class="footer-links">
                    <div class="footer-column">
                        <p>&copy; 2024 Perpustakaan Online. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>


        <script src="script.js"></script>

        <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            for (i = slideIndex - 1; i < slideIndex + 2; i++) {
                if (slides[i]) {
                    slides[i].style.display = "block";
                }
            }
            if (dots[slideIndex - 1]) {
                dots[slideIndex - 1].className += " active";
            }
        }
        </script>

    </body>

</html>