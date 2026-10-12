-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 07:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nama_dosen` varchar(40) NOT NULL,
  `nik_nidn` int(30) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nama_dosen`, `nik_nidn`, `prodi`, `email`, `no_telp`) VALUES
('Dr. Andi Setiawan', 123456789, 'Informatika', 'andi.setiawan@univ.ac.id', '081234567890'),
('Ir. Citra Wulan', 234567890, 'Teknik Sipil', 'citra.wulan@univ.ac.id', '083456789012'),
('Dr. Dimas Pratama', 345678901, 'Sistem Informasi', 'dimas.pratama@univ.ac.id', '084567890123'),
('Prof. Eka Widodo', 456789012, 'Manajemen', 'eka.widodo@univ.ac.id', '085678901234'),
('Dr. Fitri Hidayat', 567890123, 'Akuntansi', 'fitri.hidayat@univ.ac.id', '086789012345'),
('Ir. Galuh Prasetyo', 678901234, 'Teknik Kimia', 'galuh.prasetyo@univ.ac.id', '087890123456'),
('Dr. Hani Setiadi', 789012345, 'Arsitektur', 'hani.setiadi@univ.ac.id', '088901234567'),
('Prof. Indra Kusuma', 890123456, 'Teknik Mesin', 'indra.kusuma@univ.ac.id', '089012345678'),
('Ir. Joko Widodo', 901234567, 'Teknik Industri', 'joko.widodo@univ.ac.id', '081012345679'),
('Prof. Budi Santoso', 987654321, 'Teknik Elektro', 'budi.santoso@univ.ac.id', '082345678901');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `kode_makul` varchar(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `mata_kuliah` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `konsentrasi` varchar(50) DEFAULT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `kode_makul`, `hari`, `jam`, `mata_kuliah`, `sks`, `kelas`, `dosen`, `ruang`, `semester`, `periode`, `prodi`, `konsentrasi`, `kapasitas`) VALUES
(1, 'TEI124', 'Senin', '07:15:00', 'kalkulus', 3, 'B', 'ANS', 'E2 (25) - Gedung DTETI', '4', '4,2', 'TETI', NULL, 25),
(2, 'TEE210', 'Rabu', '07:15:00', 'Bahasa indonesia', 3, 'A', 'ANW', 'E3 (70) - Gedung TE', '4', '4', 'TE', NULL, 70),
(3, 'TIF223', 'Rabu', '10:15:00', 'Web Enterprise', 3, 'A', 'SLO', 'E5 (60) - Gedung TI', '4', '4', 'TI', NULL, 50),
(4, 'TKU312', 'Kamis', '07:15:00', 'Bahasa inggris', 3, 'A', 'SBG', 'E6 (150) - Gedung TETI', '4', '4', 'TETI', NULL, 131),
(5, 'TIF221', 'Jumat', '07:15:00', 'Anti korupsi', 3, 'B', 'RDH', 'E7 (50) - Gedung DTETI', '4', '4', 'TIF', NULL, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(10) NOT NULL,
  `nim` int(6) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mhs`, `nama_mhs`, `nim`, `jurusan`, `tgl_lahir`, `alamat`, `email`, `no_telp`, `foto`) VALUES
(436548, 'michael ', 41593078, 'teknik ninja', '2024-11-14', 'Jl. ngawi timur', 'irfing@gmail.com', 2147483647, 0x657a6769662d322d33653263336537396639323131312e706e67),
(436553, 'adriansyah', 23253, 'bisnis', '2024-12-17', 'jl kudus', 'dshjwehj@gmail', 98543, 0x7474642e706e67),
(436557, 'juki', 23253, 'bisnis', '2024-12-10', 'Jl. Kalianyar No.6 RT.015', 'Youwant@d', 2147483647, 0x53637265656e73686f745f2831292e706e67),
(436558, 'hoyoverse', 456484, 'Gacha', '2024-12-28', 'Jl.kikir', 'kikir@gmail.com', 5567378, 0x53637265656e73686f745f323032342d31322d32345f3136353731322e706e67),
(436559, 'wewew', 352526, 'bisnis', '2024-12-19', 'Jl kodok', 'gdy@gmail.com', 43466, 0x53637265656e73686f745f2835292e706e67),
(436562, 'goo', 23253, 'manajemen', '2024-12-06', 'Jl. Kalianyar No.6 RT.015', 'wawa@gmail.com', 2147483647, 0x53637265656e73686f745f323032342d30362d32385f3232323530352e706e67),
(436565, 'gulid', 2147483647, 'manajemen', '2024-12-11', 'Jl. Kalianyar No.6 RT.015', 'dshjwehj@gmail', 2147483647, 0x53637265656e73686f745f323032342d30362d32325f313333363330312e706e67),
(436566, 'ligma', 23253, 'manajemen', '2024-12-06', 'Jl. Kalianyar No.6 RT.015', 'Youwant@d', 2147483647, 0x53637265656e73686f745f323032342d30372d32305f3136313733372e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin', '2024-12-17 02:57:37'),
(2, 'admin', '0192023a7bbd73250516f069df18b500', 'admin', '2024-12-17 07:11:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nik_nidn`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436567;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
