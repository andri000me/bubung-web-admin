-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 04:04 AM
-- Server version: 8.0.13
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_bubung`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `absensi_id` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `keterangan` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`absensi_id`, `tanggal`, `bulan`, `tahun`, `siswa_id`, `keterangan`, `kelas_id`) VALUES
(4, 12, 7, 2020, 1, 'I', 2),
(5, 12, 7, 2020, 2, 'S', 2),
(6, 6, 7, 2020, 1, 'H', 2),
(7, 6, 7, 2020, 2, 'A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `username`, `password`) VALUES
(1, 'Admin Sistem', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `nama`, `email`, `password`, `no_hp`, `alamat`, `kelas_id`) VALUES
(1, 'Suganda', 'suganda@gmail.com', 'suganda123', '+6282288327135', 'suganda123', 2),
(2, 'Taufik Hidayat', 'taufik.y2t@gmail.com', '123', '082284499305', 'Dumai', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
(2, '1A'),
(3, '1B'),
(4, '2A'),
(5, '2B'),
(6, '3A'),
(7, '3B'),
(8, '4A'),
(9, '4B'),
(10, '5A'),
(11, '5B'),
(12, '6A'),
(13, '6B');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(11) NOT NULL,
  `mapel_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `mapel_nama`) VALUES
(0, '- Istirahat -'),
(1, 'Pendidikan Jasmani'),
(2, 'Bahasa Indonesia'),
(3, 'Matematika'),
(4, 'IPA'),
(5, 'IPS'),
(6, 'Pendidikan Agama');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_kelas`
--

CREATE TABLE `mapel_kelas` (
  `mapel_kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `jam` varchar(110) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hari` varchar(110) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_kelas`
--

INSERT INTO `mapel_kelas` (`mapel_kelas_id`, `mapel_id`, `jam`, `hari`, `kelas_id`) VALUES
(1, 2, '08:00 - 09:30', 'Senin', 2),
(2, 4, '10:30 - 12:00', 'Senin', 2),
(3, 0, '12:00 - 13:00', 'Senin', 2),
(4, 3, '13:00 - 14:00', 'Senin', 2),
(5, 1, '08:00 - 09:30', 'Selasa', 2),
(6, 4, '10:30 - 12:00', 'Selasa', 2),
(7, 0, '12:00 - 13:00', 'Selasa', 2),
(8, 6, '13:00 - 14:00', 'Selasa', 2),
(9, 3, '08:00 - 09:30', 'Rabu', 2),
(10, 6, '10:30 - 12:00', 'Rabu', 2),
(11, 0, '12:00 - 13:00', 'Rabu', 2),
(12, 5, '13:00 - 14:00', 'Rabu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `masukan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `mapel_id`, `siswa_id`, `nilai`, `masukan`) VALUES
(1, 2, 2, 70, 'Lumayan lah'),
(4, 2, 1, 65, 'Jangan bahasa jawa juga lagi kalau di kelas'),
(6, 3, 1, 50, 'Mtk dy kurang paham');

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `orangtua_id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`orangtua_id`, `nama`, `email`, `password`, `no_hp`, `alamat`) VALUES
(1, 'Heri Maulana', 'herimaulana85@gmail.com', 'heri123', '+6282288327124', 'Bengkalis, Riau'),
(2, 'Budiman', 'budiman@gmail.com', 'budiman123', '+6282233445566', 'Bengkalis, Riau');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `judul`, `deskripsi`, `tanggal`, `waktu`, `kelas_id`) VALUES
(16, 'Pembagian Raport Siswa', 'Pembagian raport dimulai tangal 10-07-2020 trims.', '2020-07-10', '14:11:08', 2),
(18, 'Test lagi', 'Isi test ya', '2020-07-10', '19:39:05', 2),
(19, 'Oiiii ', 'Haaaweofdsf', '2020-07-10', '22:23:09', 2),
(20, 'bfsado', 'dsfjijfd', '2020-07-10', '22:34:22', 2),
(21, 'Ini pengumuman yang masuk ke kelas 2A', 'Sesuai dengan gurunya', '2020-07-10', '22:35:45', 4);

-- --------------------------------------------------------

--
-- Table structure for table `percakapan`
--

CREATE TABLE `percakapan` (
  `percakapan_id` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `dari_user_id` int(11) NOT NULL,
  `dari_jenis_user` varchar(1) NOT NULL,
  `ke_user_id` int(11) NOT NULL,
  `ke_jenis_user` varchar(1) NOT NULL,
  `nama_penerima` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `text_user_terakhir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percakapan`
--

INSERT INTO `percakapan` (`percakapan_id`, `tanggal`, `waktu`, `pesan`, `dari_user_id`, `dari_jenis_user`, `ke_user_id`, `ke_jenis_user`, `nama_penerima`, `nama_pengirim`, `text_user_terakhir`) VALUES
(7, '2020-07-13', '11:02:48', 'Assalamu\'alaikum pak..', 1, 'G', 1, 'O', 'Heri Maulana [Ortu: Pramudia]', 'Suganda', 'Assalamu\'alaikum pak..'),
(8, '2020-07-13', '11:03:30', 'Selamat atas keberhasilan anak bapak..', 1, 'G', 2, 'O', 'Budiman [Ortu: Sutrisno]', 'Suganda', 'Selamat atas keberhasilan anak bapak..');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `orangtua_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `nama`, `kelas_id`, `orangtua_id`) VALUES
(1, 'Pramudia', 2, 1),
(2, 'Sutrisno', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD PRIMARY KEY (`mapel_kelas_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`orangtua_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indexes for table `percakapan`
--
ALTER TABLE `percakapan`
  ADD PRIMARY KEY (`percakapan_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `absensi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  MODIFY `mapel_kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `orangtua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `percakapan`
--
ALTER TABLE `percakapan`
  MODIFY `percakapan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
