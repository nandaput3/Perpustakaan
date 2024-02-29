-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 10:05 AM
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
  `sinopsis` varchar(1000) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `pdf_path` varchar(255) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `perpus_id`, `judul`, `sinopsis`, `cover`, `pdf_path`, `penulis`, `penerbit`, `tahun_terbit`, `kategori_id`, `stok`, `created_at`) VALUES
(92, 1, 'Laut Bercerita', 'Buku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua dikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan keluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap kerabat mereka yang tak pernah kembali.\nBuku ini ditulis sebagai bentuk tribute bagi para aktivis yang diculik, yang kembali, dan yang tak kembali dan keluarga yang terus menerus sampai sekarang mencari-cari jawaban', '../asset/laut bercerita.png', '', 'Leila S. Chudori', 'tersedia', '2024-02-18', 3, 'tersedia', '2024-02-18 17:44:44'),
(94, 1, 'Friendzone', 'Di mata Abel, David adalah cowok sempurna. Dia ganteng, populer, meski tengil tetapi baik, dan selalu berada di sisi Abel. Tiap David memandangnya, Abel selalu berharap rona merah di pipinya tidak ketahuan oleh David. Apalagi saat David menyentuhnya, mengacak rambutnya, seolah seluruh partikel di dalam tubuh Abel siap memelesat tinggi menembus langit. Hanya satu kekurangan David, ia adalah sahabat Abel.  Di mata David, Abel adalah cewek tomboi yang sejak kecil berada di orbit kehidupannya. Ia merasa sangat nyaman bersama Abel. David nggak perlu jaga image di depan cewek itu. Sayangnya, kenyamanan yang berlebihan ini membuatnya lupa, bahkan nggak peka. Tanpa sadar janji David untuk selalu menjadi sahabat Abel selamanya, justru melukai perasaan gadis itu.', '../asset/friendzone.jpg', '', 'Vanessha ', 'Bentang Belia', '2024-02-18', 1, '', '2024-02-18 16:00:15'),
(101, 1, 'rindu', 'KIsah berawal dari perjalan ibadah haji yang dilakukan oleh Keluarga Daeng Andipati dan istri beserta kedua putrinya, Ana dan Elsa pada tahun 1938. Tepatnya, mereka melakukan perjalanan itu pada 1 Desember 1098 dengan  menggunakan kapal Blitar Holland. Ana digambarkan  sebagai gadis kecil berusia 9 tahun yang periang, baik hati, senang berceloteh, selalu ingin tahu. Sedangkan Elsa digambarkan sebagai gadis 15 tahun yang pendiam, baik hati dan sering berdebat dengan adiknya bila Ia sedang membuat ulah. Mereka berdua adalah anak-anak yang patuh pada orang tuanya.  Artikel ini telah tayang di Katadata.co.id dengan judul \"Sinopsis Novel Rindu, Perjalanan Panjang Sebuah Kerinduan\" , https://katadata.co.id/berita/lifestyle/632d530331499/sinopsis-novel-rindu-perjalanan-panjang-sebuah-kerinduan Penulis: Destiara Anggita Putri Editor: Intan', '../asset/rindu.jpg', '', 'tereliye', 'gramedia', '2024-02-21', 3, '', '2024-02-21 16:27:17');

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
(1, 'Fiksi', '2024-02-18 16:59:04'),
(2, 'Sastra', '2024-02-18 16:59:21'),
(3, 'Romance', '2024-02-18 16:58:43'),
(4, 'Horor', '2024-02-18 16:58:43');

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
(67, 87, 94, '2024-02-21 13:16:26'),
(70, 87, 101, '2024-02-21 16:43:33'),
(73, 128, 92, '2024-02-22 04:42:24'),
(74, 129, 93, '2024-02-23 12:24:12'),
(75, 129, 93, '2024-02-23 12:24:27'),
(76, 54, 93, '2024-02-24 05:07:25');

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
(545, 93, '2024-02-21', 87, '0000-00-00', 'dipinjam', '2024-02-21 13:09:00'),
(546, 94, '2024-02-21', 87, '0000-00-00', 'dipinjam', '2024-02-21 13:17:05'),
(547, 92, '2024-02-21', 87, '0000-00-00', 'dipinjam', '2024-02-21 16:00:44');

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
(54, 12, 'penguasa', '$2a$12$BWQU3mSbzq/yYvegEjnKr.lCSGoteWQWkZ0jfsqLfD/ENp3ucE7/y', 'admin@gmail.com', 'Admin', '081572095780', 'korut', 'admin', '2024-02-25 08:32:59'),
(87, 34, 'bawahan', '$2a$12$oNAhQAOusgKxjVXZSccunuiGVBCf.pxcQfCbDd/qgEVSulO7eOKDO', 'petugas@gmail.com', 'Petugas', '081999435123', 'thailand', 'petugas', '2024-02-25 08:33:18'),
(133, 1, 'reand', '$2y$10$rm1uzlCorzOD2mRH5TPDAO2osTSPzH0DT0Oa/ok.ME4rZkE8SsoOC', 'reandra@gmail.com', 'Reandra Nakula Adhiyaksa ', '082543765123', 'Masalalu', 'user', '2024-02-25 08:54:22'),
(134, 1, 'ana', '$2y$10$I9ABgwaYdymseWop2MBbcuVc2LbMrN1kOgSPfa3CSqMHHI6flCIje', 'awana@gmail.com', 'Awana Pricilla Fernando', '08765421389', 'Afrika', 'user', '2024-02-25 08:54:14');

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
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `koleksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
