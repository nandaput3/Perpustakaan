-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 04:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `sinopsis` varchar(1000) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `perpus_id`, `judul`, `rating`, `sinopsis`, `cover`, `penulis`, `penerbit`, `tahun_terbit`, `kategori_id`, `created_at`) VALUES
(92, 1, 'Laut Bercerita', 0, 'Buku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua dikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan keluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap kerabat mereka yang tak pernah kembali.\nBuku ini ditulis sebagai bentuk tribute bagi para aktivis yang diculik, yang kembali, dan yang tak kembali dan keluarga yang terus menerus sampai sekarang mencari-cari jawaban', '../asset/laut bercerita.png', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', '2024-02-18', 1, '2024-02-18 02:20:45'),
(93, 1, 'my ice boy', 0, 'Miracle:Hidupmu terlalu datar. Misi kali ini akan sangat menarik untukmu. Buktikan seberapa hebat kamu bisa mencairkan gunung es yang ada di dekatmu.  Sudah bertahun-tahun Salsa menerima pesan penuh misi dari sosok misterius Miracle yang selalu membantunya saat kesulitan. Namun, pesan kali ini beda! Imbalannya sungguh membuat adrenalin Salsa memuncak. Jika misi berhasil, Miracle akan menampakkan diri!  Masalahnya, siapa gunung es itu? Apa benar Galen, cowok super duper dingin seantero sekolah? Salsa terus terngiang pesan sahabatnya, “Kalau si Kutub Es itu natap lo lebih dari lima detik, cuma ada dua kemungkinan. Yang pertama, dia marah besar sama lo. Dan yang kedua, dia jatuh cinta sama lo.” Gereget!  Namun, demi mengungkap sosok Miracle dan semua teka-teki dalam hidupnya, menaklukkan gunung es pun Salsa pantang mundur.', '../asset/my ice boy.jpeg', 'Pit Sansi', 'Bentang Pustaka', '2024-02-17', 1, '2024-02-18 09:53:13'),
(94, 1, 'Friendzone', 0, 'Di mata Abel, David adalah cowok sempurna. Dia ganteng, populer, meski tengil tetapi baik, dan selalu berada di sisi Abel. Tiap David memandangnya, Abel selalu berharap rona merah di pipinya tidak ketahuan oleh David. Apalagi saat David menyentuhnya, mengacak rambutnya, seolah seluruh partikel di dalam tubuh Abel siap memelesat tinggi menembus langit. Hanya satu kekurangan David, ia adalah sahabat Abel.  Di mata David, Abel adalah cewek tomboi yang sejak kecil berada di orbit kehidupannya. Ia merasa sangat nyaman bersama Abel. David nggak perlu jaga image di depan cewek itu. Sayangnya, kenyamanan yang berlebihan ini membuatnya lupa, bahkan nggak peka. Tanpa sadar janji David untuk selalu menjadi sahabat Abel selamanya, justru melukai perasaan gadis itu.', '../asset/friendzone.jpg', 'Vanessha ', 'Bentang Belia', '2024-02-18', 1, '2024-02-18 09:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `buku_kategori`
--

CREATE TABLE `buku_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_kategori`
--

INSERT INTO `buku_kategori` (`kategori_id`, `nama_kategori`, `created_at`) VALUES
(1, 'fiksi', '2024-02-07 02:15:27'),
(2, 'non fiksi', '2024-02-07 02:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `buku_ulasan`
--

CREATE TABLE `buku_ulasan` (
  `ulasan_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ulasan` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koleksi_pribadi`
--

CREATE TABLE `koleksi_pribadi` (
  `koleksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koleksi_pribadi`
--

INSERT INTO `koleksi_pribadi` (`koleksi_id`, `user_id`, `buku_id`, `created_at`) VALUES
(25, 118, 0, '2024-02-18 14:43:18'),
(30, 118, 0, '2024-02-18 15:19:18'),
(31, 118, 0, '2024-02-18 15:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pinjam` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `buku_id`, `tgl_pinjam`, `user_id`, `tgl_kembali`, `status_pinjam`, `created_at`) VALUES
(528, 93, '2024-02-18', 118, '0000-00-00', 'dipinjam', '2024-02-18 14:13:50'),
(529, 92, '2024-02-18', 118, '0000-00-00', 'dipinjam', '2024-02-18 14:14:47'),
(530, 94, '2024-02-18', 118, '0000-00-00', 'dipinjam', '2024-02-18 14:16:46'),
(531, 92, '2024-02-18', 118, '0000-00-00', 'dipinjam', '2024-02-18 14:30:54'),
(532, 94, '2024-02-18', 118, '0000-00-00', 'dipinjam', '2024-02-18 14:39:37'),
(533, 93, '2024-02-18', 118, '0000-00-00', 'dipinjam', '2024-02-18 15:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `pinjam_detail_id` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_detail`
--

INSERT INTO `peminjaman_detail` (`pinjam_detail_id`, `peminjaman_id`, `buku_id`, `created_at`) VALUES
(1, 1, 70, '2024-02-08 10:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `perpus`
--

CREATE TABLE `perpus` (
  `perpus_id` int(11) NOT NULL,
  `nama_perpus` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp_hp` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perpus`
--

INSERT INTO `perpus` (`perpus_id`, `nama_perpus`, `alamat`, `tlp_hp`, `created_at`) VALUES
(12, 'READING ME', 'BANJAR', '098765', '2024-02-13 02:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `perpus_id`, `username`, `password`, `email`, `nama_lengkap`, `no_hp`, `alamat`, `role`, `created_at`) VALUES
(54, 12, 'admin', '$2a$12$BWQU3mSbzq/yYvegEjnKr.lCSGoteWQWkZ0jfsqLfD/ENp3ucE7/y', 'admin@gmail.com', 'rahmatullah', '098765', 'korut', 'admin', '2024-02-12 06:34:49'),
(87, 34, 'petugas', '$2a$12$oNAhQAOusgKxjVXZSccunuiGVBCf.pxcQfCbDd/qgEVSulO7eOKDO', 'petugas@gmail.com', 'jahitullah', '026472', 'thailand', 'petugas', '2024-02-12 06:35:16'),
(118, 1, 'nanaree', '$2y$10$5g3XnU508MX7RRxxhR6SbumsmuKtE3xGistcFBUDHGs913zhUpgC2', 'nawrrex@gmail.com', 'narendra', '87745642324', 'banjar', 'user', '2024-02-18 01:52:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  ADD PRIMARY KEY (`ulasan_id`);

--
-- Indexes for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD PRIMARY KEY (`koleksi_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`);

--
-- Indexes for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD PRIMARY KEY (`pinjam_detail_id`);

--
-- Indexes for table `perpus`
--
ALTER TABLE `perpus`
  ADD PRIMARY KEY (`perpus_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `koleksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  MODIFY `pinjam_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perpus`
--
ALTER TABLE `perpus`
  MODIFY `perpus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
