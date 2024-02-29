<!DOCTYPE html>
<html lang="en">

<he.mySlides>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
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
    </style>


    <body>
        <header>
            <nav>
                <div class="logo">
                    <img src="smk1.png" alt="Library Logo">
                    <h1>Reading Me</h1>
                </div>
                <ul class="navbar">
                    <li><a href="#">Home</a></li>
                    <li><a href="registrasi.php" class="active">Signup</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section id="home">
                <div class="container">
                    <h2>Selamat datang di Perpustakaan Online</h2>
                    <p>Perpustakaan Online menyediakan koleksi buku terbaru dan terpopuler. Temukan dan baca buku
                        favorit
                        Anda secara online.</p>
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
                <p>&copy; 2024 Perpustakaan Online. All rights reserved.</p>
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