-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 02:02 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alat`
--

CREATE TABLE `tb_alat` (
  `id` int(50) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `gambar` mediumtext NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alat`
--

INSERT INTO `tb_alat` (`id`, `nama_alat`, `gambar`, `deskripsi`) VALUES
(1001, 'Termometer', '4.jpg', 'Keberadaan termometer hampir selalu dibutuhkan dalam segala situasi medis. Alat ini berfungsi untuk mengukur suhu tubuh dan memiliki beberapa jenis, seperti termometer air raksa (merkuri), termometer digital, dan yang terbaru termometer inframerah.\r\n\r\nTermometer air raksa relatif murah, tetapi kurang akurat, lambat, dan bisa berbahaya jika pecah. Meskipun lebih mahal, termometer digital menampilkan suhu berupa angka hanya dalam beberapa detik. Termometer inframerah juga menggunakan sistem digital, tetapi dipakai tanpa menyentuh tubuh.'),
(1002, 'Stetoskop', '3.jpg', 'Stetoskop adalah alat kesehatan yang paling sering dijumpai. Stetoskop merupakan alat akustik yang fungsinya memeriksa suara di dalam tubuh, seperti detak jantung, suara pergerakan usus dan lambung, dan lainnya. Suara tidak normal yang terdengar lewat stetoskop berguna untuk mendiagnosis penyakit.\r\n\r\nAlat ini bisa memberi informasi suara tertentu sekaligus menghilangkan suara lainnya. Dengan menerjemahkan suara yang didengar melalui alat ini, dokter bisa mengambil tindakan pengobatan yang tepat untuk pasien.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_butawarna`
--

CREATE TABLE `tb_butawarna` (
  `id_surat` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` text NOT NULL,
  `hasil` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_butawarna`
--

INSERT INTO `tb_butawarna` (`id_surat`, `nama_dokter`, `nama`, `ttl`, `alamat`, `hasil`, `keperluan`, `tanggal_pembuatan`) VALUES
(1112, 'Meilani', 'Harry Styles', '2019-07-03', 'Jl. Market Cmden', 'Tidak Buta Warna', 'Melamar Pekerjaan', '2020-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(12) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `ttl_dokter` date NOT NULL,
  `jenkel_dokter` set('L','P') NOT NULL,
  `alamat_dokter` text NOT NULL,
  `spesialis_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `ttl_dokter`, `jenkel_dokter`, `alamat_dokter`, `spesialis_dokter`) VALUES
(112, 'Meilani', '2019-12-30', 'P', 'Jl. Alalak Utara no.32', 'Gigi'),
(113, 'Lenny', '2018-02-07', 'P', 'Sungai Miai', 'Kulit'),
(1190, 'Syofa Rahmina', '2002-07-26', 'P', 'Jl. Sungai Miai Dalam ', 'Jantung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketsehat`
--

CREATE TABLE `tb_ketsehat` (
  `id_surat` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` text NOT NULL,
  `tinggi_badan` varchar(8) NOT NULL,
  `berat_badan` varchar(8) NOT NULL,
  `hasil` varchar(15) NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `tanggal_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ketsehat`
--

INSERT INTO `tb_ketsehat` (`id_surat`, `nama_dokter`, `nama`, `ttl`, `alamat`, `tinggi_badan`, `berat_badan`, `hasil`, `keperluan`, `tanggal_pembuatan`) VALUES
(1239, 'Lenny', 'Syofa Rahmina', '2018-01-15', 'jl. sungai miai dalam', '155', '48', 'Sehat', 'Mengikuti Lomba', '2017-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `gambar` mediumtext NOT NULL,
  `jenis_obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `gambar`, `jenis_obat`) VALUES
(1002, 'Neozep', '2.jpg', 'Tablet'),
(10001, 'Antibiotik', '1.jpg', 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `ttl_pasien` date NOT NULL,
  `umur` int(2) NOT NULL,
  `nama_penyakit` varchar(40) NOT NULL,
  `nama_dokter` varchar(40) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `ttl_pasien`, `umur`, `nama_penyakit`, `nama_dokter`, `alamat_pasien`, `id_obat`) VALUES
(111, 'Chris Evans', '2020-01-03', 48, 'Asma', 'Syofa Rahmina', 'Jl. Massachusset', 2),
(112, 'Jake Benjamin Gyllenhaal', '2020-01-05', 49, 'Tipes', 'Syofa Rahmina', 'Jl. Clifronia', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi`) VALUES
(1, 'Tipes', 'dalah penyakit yang bisa menyebar melalui makanan, air, atau ditularkan dari orang yang terinfeksi (melalui fesesnya). Tipes disebabkan oleh bakteri Salmonella typhi. Bakteri ini biasanya ada dalam air yang terkontaminasi dengan feses dan bisa menempel pada makanan atau minuman yang Kamu konsumsi.'),
(2, 'Asma', 'is a common long-term inflammatory disease of the airways of the lungs.[3] It is characterized by variable and recurring symptoms, reversible airflow obstruction, and easily triggered bronchospasms. Symptoms include episodes of wheezing, coughing, chest tightness, and shortness of breath.These may occur a few times a day or a few times per week.Depending on the person, asthma symptoms may become worse at night or with exercise.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `status`, `password`) VALUES
('admin', 'admin', 'admin'),
('guest', 'guest', 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_butawarna`
--
ALTER TABLE `tb_butawarna`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_ketsehat`
--
ALTER TABLE `tb_ketsehat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alat`
--
ALTER TABLE `tb_alat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT for table `tb_butawarna`
--
ALTER TABLE `tb_butawarna`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;
--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1191;
--
-- AUTO_INCREMENT for table `tb_ketsehat`
--
ALTER TABLE `tb_ketsehat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1240;
--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
