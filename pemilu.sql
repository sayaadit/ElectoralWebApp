-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 08:19 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pemilu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `eventkpu`
--

CREATE TABLE IF NOT EXISTS `eventkpu` (
  `id` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `isi` varchar(250) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventkpu`
--

INSERT INTO `eventkpu` (`id`, `nama`, `tipe`, `isi`, `link`) VALUES
(2, 'Debat1', 'Debat', 'Debat yang pertama akan dilakukan pada Senin, 12 Maret 2018 di gedung Sasana Budaya Ganesha, ITB Bandung. Debat pertama bertemekan politik, hukum, ekonomi, pemerintahan daerah, UMKM dan infrastruktur', 'https://www.youtube.com/embed/lbYD8FOKXCA');

-- --------------------------------------------------------

--
-- Table structure for table `panduanpilih`
--

CREATE TABLE IF NOT EXISTS `panduanpilih` (
  `urutan` int(2) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panduanpilih`
--

INSERT INTO `panduanpilih` (`urutan`, `isi`, `gambar`) VALUES
(1, 'Masuk ke TPS (Tempat Pemungutan Suara). Jangan lupa untuk membawa surat panggilan pemilih sebagai syarat untuk dapat melakukan pemilihan.', '1.gif'),
(2, 'Menyerahkan surat panggilan pemilih kepada petugas pencatat kehadiran pemilih. Kemudian petugas akan memberikan surat suara.', '2.gif'),
(3, 'Sambil menunggu antrian, saudara/i dapat duduk terlebih dahulu pada kursi antrian yang ada. Pada saat giliran sadara/i tiba, maka dipersilahkan masuk ke bilik suara.', '3.gif'),
(4, 'Setelah masuk ke bilik suara, sadara/i bisa membuka surat suara dan memilih salah satu pasangan calon gubernur dengan cara mencoblos pada gambar paslon yang dipilih.', '4.gif'),
(5, 'Setelah Selesai melakukan pencoblosan, saudara/i membawa surat suara menuju kotak suara untuk dimasukkan kedalamnya. Setalah itu saudara/i mencuplupkan jari kelingking pada tinta yang sudah disediakan sebagai tanda sudah malakukan pemungutan suara. Setelah ini saudara/i dapat keluar dari TPS (Tempat Pemungutan Suara)', '5.gif');

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE IF NOT EXISTS `pemilih` (
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`no_ktp`, `nama`, `jk`, `alamat`, `agama`, `pekerjaan`) VALUES
('3275061007970011', 'Adi Wibowo', 'Laki - Laki', 'Jakarta Barat Blok B 251', 'Islam', 'Karyawan Swasta'),
('3275062710980010', 'Malik Anhar Maulana', 'Laki - Laki', 'Pejuang Jaya Blok C 383', 'Islam', 'Mahasiswaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `profilcalon`
--

CREATE TABLE IF NOT EXISTS `profilcalon` (
  `urutan` int(100) NOT NULL,
  `calon_gb` varchar(100) NOT NULL,
  `usia_calon_gb` varchar(100) NOT NULL,
  `jabatan_gb` varchar(100) NOT NULL,
  `calon_wgb` varchar(100) NOT NULL,
  `usia_calon_wgb` varchar(100) NOT NULL,
  `jabatan_wgb` varchar(100) NOT NULL,
  `partai_pengusung` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilcalon`
--

INSERT INTO `profilcalon` (`urutan`, `calon_gb`, `usia_calon_gb`, `jabatan_gb`, `calon_wgb`, `usia_calon_wgb`, `jabatan_wgb`, `partai_pengusung`, `image`) VALUES
(1, 'Ridwal Kamil', '62 tahun ', 'Wali Kota Bandung', 'Uu Ruzhanul Ulum ', '48 tahun', 'Bupati Tasikmalaya', 'Partai pengusung pasangan yakni, PPP dengan 9 kursi, PKB dengan tujuh kursi, Partai NasDem dengan li', 'asset\\img\\calon1.jpg'),
(2, 'Mayor Jenderal (Purnawirawan) Sudrajat', '68 tahun', 'Direktur Jenderal Strategi Pertahanan Departemen Pertahanan', 'Ahmad Syaikhu', '52 tahun', 'Wakil Wali Kota Bekasi', 'Partai pengusung pasangan ini adalah, Partai Gerindra dengan 11 kursi, PKS dengan 12 kursi, dan PAN ', 'asset\\img\\calon2.jpg'),
(3, 'Mayor Jenderal (Purnawirawan) Tubagus Hasanuddin', '65 tahun', 'Wakil Ketua Komisi Pertahanan dan Luar Negeri DPR', 'Anton Charliyan', '57 tahun', 'Wakil Kepala Lembaga Pendidikan Polri', 'Partai pengusung pasangan ini hanya PDIP dengan 20 kursi. Dengan 20 kursi yang dimiliki PDIP, partai', 'asset\\img\\calon3.jpg'),
(4, 'Deddy Mizwar', '62 tahun', 'Wakil Gubernur Jawa Barat', 'Dedi Mulyadi', '46 tahun', 'Bupati Purwakarta', 'Partai pengusung pasangan ini yakni, Partai Demokrat dengan 12 kursi dan Partai Golkar dengan 17 kur', 'asset\\img\\calon4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `idx` int(11) NOT NULL,
  `tgl_mulai` varchar(20) NOT NULL,
  `tgl_selesai` varchar(20) NOT NULL,
  `kegiatan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`idx`, `tgl_mulai`, `tgl_selesai`, `kegiatan`) VALUES
(1, '8 Jan 2018', '13 feb 2018', 'Pendaftaran Pasangan Calon Gubernur dan Wakil Gubernur Jawa Barat 2018'),
(2, '15 Feb 2018', '26 Jun 2018', 'Kampanye & Debat Publik'),
(3, '24 Jun 2018', '26 Jun 2018', 'Masa Tenang & Pembersihan Alat Peraga'),
(4, '27 Jun 2018', '27 Jun 2018', 'Pemungutan & Penghitungan Surat Suara di TPS'),
(8, '28 Jun 2018', '9 Jul 2018', 'Rekapitulasi Hasil Penghitungan Suara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `eventkpu`
--
ALTER TABLE `eventkpu`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nama` (`nama`), ADD UNIQUE KEY `nama_2` (`nama`);

--
-- Indexes for table `panduanpilih`
--
ALTER TABLE `panduanpilih`
  ADD PRIMARY KEY (`urutan`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventkpu`
--
ALTER TABLE `eventkpu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `panduanpilih`
--
ALTER TABLE `panduanpilih`
  MODIFY `urutan` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
