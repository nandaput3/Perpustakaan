-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 12:30 AM
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
(113, 1, 'Ubur Ubur Lembur', 'Hal kedua yang gue nggak sempat kasih tahu Iman: jadi orang yang dikenal publik harus tahan dengan asumsi-asumsi orang. Misalnya, orang-orang penuh dengan asumsi yang salah. Gue kurusan dikit, dikomentarin orang yang baru ketemu, ‘Bang Radit, kurusan, deh. Buat film baru, ya?’ Gue geleng, ‘Enggak.’ Gue bilang, ‘Emang lagi diet aja.’ Dia malah balas bilang, ‘Ah, bohong! Paling abis putus cinta, kan?’  Giliran gue potong rambut botak, ada orang yang ketemu gue di mall nanya, ‘Wah botak sekarang? Lagi shooting Tuyul dan Mbak Yul Reborn, ya, Bang?’ Kalau udah gitu gue cuma terkekeh sambil jawab, ‘Enggak, lagi cosplay jadi kacang Sukro, nih.’', '../asset/WhatsApp Image 2024-02-28 at 19.21.30.jpeg', '../pdf/Ubur-Ubur Lembur (Raditya Dika) (Z-Library).pdf', 'Raditya Dika', 'Gramedia', '2018-02-07', 3, '5', '2024-03-05 17:06:44'),
(115, 1, 'Kambing Jantan', 'Setelah lulus SMU, Dika dilanda kebimbangan soal jurusan kuliah dan kampus yang akan dipilihnya. Ayahnya ingin Dika kuliah kedokteran di Kampus Indonesia, sedangkan ibunya ingin ia kuliah jurusan finance di Australia.   Setelah melewati berbagai pertimbangan, diperoleh hasil kalau Dika harus kuliah finance di Australia. Sebenarnya, keputusan ini sangat tidak sesuai dengan minat Dika. Terlebih, hijrah ke Australia membuatnya harus berpisah jarak dan waktu dengan pacarnya, Kebo. Baik Dika mapun Kebo, keduanya sama-sama tidak siap untuk LDR. Dan benar saja, hubungan jarak jauh membuat pengeluaran keduanya menjadi lebih besar, komunikasi terganggu, dan perbedaan pemikiran di antara mereka.   Masalah tak hanya sampai di situ, Dika yang terpaksa kuliah di jurusan finance juga merasa sulit untuk mencerna pelajaran. Untungnya, ia memiliki teman yang juga berasal dari Indonesia tepatnya Kediri yaitu Hariyanto (Edric Tjandra), yang menjadi tempat curhat sekaligus membantunya menjalani hari-hari ', '../asset/WhatsApp Image 2024-02-28 at 19.21.31.jpeg', '../pdf/Kambing Jantan by Raditya Dika (z-lib.org).pdf', 'Raditya Dika', 'Gramedia', '2005-02-08', 1, '4', '2024-03-06 20:50:38'),
(117, 1, 'Koala Kumal', 'Dika (Raditya Dika) baru saja batal menikah, karena pacarnya, Andrea (Acha Septriasa), selingkuh dengan James (Nino Fernandez). Patah hatinya membuat Dika kesulitan menulis bab terakhir bukunya. Suatu hari, Dika bertemu dengan Trisna (Sheryl Sheinafia), cewek unik yang menolong Dika dari perjodohan kacau sang Mama Dika (Cut Mini Theo) dan yang akan membuat pandangan Dika terhadap dunia menjadi berbeda.  Dika pun pergi bersama Trisna. Mereka menjadi semakin akrab. Trisna yang berniat membantu Dika menyelesaikan bab terakhir bukunya, menemukan alasannya: Dika masih patah hati. Trisna mencoba membuat Dika berhenti patah hati. Trisna menyuruh Dika melakukan balas dendam kepada Andrea', '../asset/WhatsApp Image 2024-02-28 at 19.21.30 (2).jpeg', '../pdf/Koala Kumal by Raditya Dika (z-lib.org).pdf', 'Raditya Dika', 'Gramedia', '2024-03-04', 1, '4', '2024-03-06 22:10:42'),
(119, 1, 'Danur', 'Risa (Prilly Latuconsina) adalah seorang gadis indigo — dia memiliki kemampuan untuk melihat makhluk gaib. Sejak kecil, Risa menjalani hidup kesepian: ayahnya bekerja di luar negeri dan hanya berkunjung enam bulan sekali, sementara ibunya, Elly (Kinaryosih), bekerja sebagai seorang guru. Ketika Risa (Asha Kenyeri Bermudez) genap usia delapan tahun, dia berharap dikaruniai teman. Tak disangka, tiga bocah laki-laki sebayanya: Janshen, Peter, dan William hadir secara tiba-tiba. Anehnya, hanya Risa yang dapat melihat mereka. Mereka akhirnya mengungkapkan bahwa mereka adalah hantu orang Indo yang mati saat masa pendudukan Jepang di Hindia Belanda. Muak dengan keanehan yang dialami Risa, Elly memanggil Asep, seorang dukun yang juga memiliki indra indigo. Dia menjelaskan bahwa Risa dapat melihat makhluk gaib karena dia dapat mencium bau danur, atau mayat. Asep memperlihatkan wujud asli Janshen (Kevin Bzezovski Taroreh), Peter (Gama Haritz), dan William (Emiliano Fernando Cortizo) kepada Risa ', '../asset/WhatsApp Image 2024-03-04 at 11.21.13.jpeg', '../pdf/danur.pdf', 'Risa Rasaswati', 'Bukune', '2017-03-30', 4, '4', '2024-03-05 17:07:57'),
(121, 1, 'Breaking Dawn', 'Setelah ia berhasil meneguhkan pilihan antara Edward dan Jacob, Bella akhirnya menyetujui persyaratan yang diajukan Edward apabila ia ingin menjadi mahluk immortal seperti Edward dan keluarga Cullen lainnya, yaitu menikah dengan Edward. Hanya berselang beberapa bulan setelah upacara kelulusan, Edward dan Bella pun menikah. Seluruh persiapan pra-pernikahan disiapkan dan diatur sedemikian rupa oleh Alice, seluruh keluarga Cullen berbahagia untuk Edward dan Bella, bahkan Rosalie yang dulu membenci Bella kini sudah bisa menerima Bella dengan tangan terbuka.', '../asset/WhatsApp Image 2024-02-28 at 19.21.32.jpeg', '../pdf/assetBreaking Dawn (Awal yang Baru) (Stephenie Meyer) (Z-Library).pdf', 'Stephenie Meyer', 'Little, Brown and Company', '2008-03-08', 3, '5', '2024-03-05 17:13:27'),
(122, 1, 'Grey dan Jingga', '\"Cinta itu seperti panggung teater... Di sana kita akan berperan menjadi karakter yang mengisi satu sama lain. Kita biarkan segenap emosi mengalir bersama kisahnya... Dan ketika panggung berakhir, kita akan sadar bahwa kita sendirilah sutradara yang sesungguhnya; yang pandai mendramatisasi dan terbuai sendiri di dalam emosi, sementara kenyataan tetap wajar apa adanya.\" Grey & Jingga adalah sebuah komik yang berawal di Facebook penulisnya dan menerbitkan satu halaman comic strip setiap hari Senin dan Kamis. Komik ini berkisah tentang Grey dan Jingga; sepasang teman masa kecil yang bertemu kembali di kampus lewat Klub Teater. Tak butuh lama bagi keduanya untuk kembali akrab seperti waktu mereka masih kecil dulu. Akan tetapi meskipun Grey dan Jingga memiliki perasaan yang sama, namun perasaan itu tidak mudah untuk diungkapkan - dan malah membuat segalanya menjadi lebih rumit dari yang seharusnya.  \"Kau sering membicarakanku di hadapannya, itu berarti aku masih mendapat tempat di hatimu, t', '../asset/assetWhatsApp Image 2024-03-05 at 23.19.44.jpeg', '../pdf/asset2. Grey dan Jingga - Days of The Violet (Sweta Kartika) (z-lib.org).pdf', ' Sweta Kartika', 'M&C (MNC)', '2017-08-08', 2, '4', '2024-03-05 17:12:52'),
(123, 1, 'New Moon', 'Cerita dimulai saat Bella berulang tahun yang ke 18, yang artinya dia lebih tua 1 tahun secara kronologis dibandingkan Edward yang selamanya berusia 17 tahun. Dalam perayaan ulang tahunnya yang diadakan di rumah keluarga Cullen, Bela membuat sebuah kecerobohan. Jarinya teriris kertas pembungkus kado saat akan membuka sebuah kado. Akibatnya tangan Bella mengeluarkan setetes darah yang mengundang rasa lapar Jasper terhadap darah manusia (dalam hal ini Jasperlah yang belum terlalu terbiasa untuk melakukan diet darah).  Saat Jasper akan menerjang Bella, Edward menghalanginya dengan terlebih dulu mendorong Bella. Hal itu membuat lengan Bella terluka semakin parah dan mengeluarkan banyak darah. Emmet dan Rossalie (kakak-kakak Edward) mencoba mengendalikan Jasper yang kalap dan membawanya pergi dari kediaman mereka. Esme yang keibuan pun merasa malu pada dirinya sendiri. Dia meminta maaf pada bella sambil menahan nafasnya lalu meninggalkan rumah juga, karena merasa tidak tahan terhadap aroma ', '../asset/assetWhatsApp Image 2024-03-05 at 23.23.48.jpeg', '../pdf/assetNew Moon (Dua Cinta) (Stephenie Meyer) (Z-Library).pdf', 'Stephenie Meyer', 'Little, Brown ', '2006-09-06', 3, '5', '2024-03-05 17:13:18'),
(124, 1, 'Eclipse', 'Perasaan Edward pada Bella semakin besar, namun seperti yang sudah-sudah, semakin besar cintanya pada Bella, semakin besar pula masalah yang harus Edward tanggung bersama dengan kekasihnya itu. Merasa sudah cukup untuk memutuskan masa depannya sendiri, Bella dan Edward pun mulai membicarakan tentang pernikahan mereka.  Inilah jalan cerita dalam film Twilight kali ini yang berjudul Eclipse. Sang sutradara, David Slade, lagi-lagi sukses membuat film yang diangkat dari novel karya Stephenie Meyer ini. Tak tanggung-tanggung meski selisih sedikit dari film Twilight sebelumnya yang New Moon; keuntungan film ini menembus angka lebih dari setengah miliar dolar!', '../asset/assetWhatsApp Image 2024-02-28 at 19.21.33.jpeg', '../pdf/assetEclipse (Gerhana) (Stephenie Meyer) (Z-Library).pdf', 'Stephenie Meyer', 'Little, Brown ', '2020-10-27', 4, '5', '2024-03-05 17:13:36'),
(125, 1, 'Midnight Sun', 'Pada tanggal 28 Agustus 2008, Meyer menghentikan penulisan Midnight Sun sebagai tanggapan atas bocornya dua belas bab naskah yang belum selesai di Internet. Dia menyatakan, \"Jika saya mencoba menulis Midnight Sun sekarang, dalam kerangka berpikir saya saat ini, James mungkin akan menang dan semua keluarga Cullen akan mati, yang tidak akan cocok dengan cerita aslinya. Bagaimanapun, saya merasa juga sedih tentang apa yang terjadi karena terus mengerjakan Midnight Sun , sehingga ditunda tanpa batas waktu.\" [2] Dia menyediakan draf dua belas bab di situs webnya dengan adil bagi pembacanya, karena novel tersebut dikompromikan sebelum tanggal penerbitan yang dimaksudkan. [9] Meyer juga menyatakan bahwa dia tidak percaya naskah itu dibocorkan dengan maksud jahat, dan tidak akan menyebutkan nama apa pun. [2]  Dalam sebuah wawancara di bulan November 2008, Meyer mengatakan bahwa, \"Ini benar-benar rumit, karena semua orang sekarang berada di kursi pengemudi, di mana mereka dapat membuat keputusa', '../asset/assetWhatsApp Image 2024-03-05 at 23.37.04.jpeg', '../pdf/assetMidnight Sun (Matahari Tengah Malam) (Stephenie Meyer) (Z-Library).pdf', 'Stephenie Meyer', 'Gramedia', '2020-08-04', 2, '5', '2024-03-05 17:13:47'),
(126, 1, 'Twilight', 'Bella Swan, gadis cantik yang memiliki masalah dalam kepercayaan diri dan koordinasi tubuhnya sendiri, baru saja pindah dari Phoenix, Arizona yang mayoritas bercuaca panas ke Forks, Washington yang mayoritas cuacanya hujan untuk tinggal bersama ayahnya, Charlie, setelah ibunya, Renée, menikah dan tinggal bersama suami barunya, Phil, seorang pemain bisbol. Setelah pindah ke Forks,Bella bertemu dengan anak angkat keluaga Cullen. Emmet, Rossalie, Jasper, Alice dan Edward. walaupun mereka tidak memiliki hubungan darah, tetapi mereka sangat mirip. empat saudara dengan ketampanan dan kecantikan yang luar biasa, berkulit pucat,memiliki keanggunan yang tidak tertandingi, dan kemisteriusan.  Dalam kelas biologi, Bella tidak memiliki pilihan kecuali harus duduk dengan Edward Cullen. respon Edward yang amat sangat tidak ramah, membuat Bella merasa kalau Edward membencinya. selain itu pada hari pertama, Edward selalu menjaga jarak dengannya, menahan napas dan selalu memandangi Bella dengan tatapan', '../asset/assetWhatsApp Image 2024-03-05 at 23.45.43.jpeg', '../pdf/assetTwilight (Stephenie Meyer) (Z-Library).pdf', 'Stephenie Meyer', 'Gramedia', '2007-09-27', 2, '4', '2024-03-05 17:11:05');

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
(1, 'Komedi', '2024-03-04 02:44:03'),
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

--
-- Dumping data for table `buku_ulasan`
--

INSERT INTO `buku_ulasan` (`ulasan_id`, `buku_id`, `user_id`, `ulasan`, `rating`, `created_at`) VALUES
(27, 119, 136, 'BAGUS BANGET', 4, '2024-03-05 16:33:01'),
(28, 119, 133, 'REKOMEN BANGET BUAT DIBACA', 5, '2024-03-06 17:32:33');

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
(652, 117, '2024-03-06', 133, '2024-03-07', 'dikembalikan', '2024-03-06 22:10:42');

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
(136, 1, 'awana', '$2y$10$cEW2y8diAbRk3I6C0/1gUeohy.CjPeZxfsvyx0IR4TW6gGx3R1uEe', 'awana@gmail.com', 'Awana Pricilla Fernando', '82543765123', 'Afrika', 'user', '2024-02-29 04:46:56');

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
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `koleksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
