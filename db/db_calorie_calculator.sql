-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 02:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_calorie_calculator`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kalori`
--

CREATE TABLE `detail_kalori` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah_kalori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kalori`
--

INSERT INTO `detail_kalori` (`id`, `id_user`, `id_makanan`, `tgl`, `jumlah_kalori`) VALUES
(4, 1, 3, '2021-01-25', 120),
(5, 1, 4, '2021-01-25', 300),
(6, 1, 4, '2021-01-26', 120),
(7, 3, 4, '2021-01-25', 120),
(8, 3, 3, '2021-01-25', 120),
(9, 3, 4, '2021-01-25', 300),
(10, 3, 4, '2021-01-26', 120),
(11, 3, 5, '2021-01-26', 300);

-- --------------------------------------------------------

--
-- Table structure for table `detail_olahraga`
--

CREATE TABLE `detail_olahraga` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_olahraga` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah_kalori` int(11) NOT NULL,
  `jumlah_menit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_olahraga`
--

INSERT INTO `detail_olahraga` (`id`, `id_user`, `id_olahraga`, `tgl`, `jumlah_kalori`, `jumlah_menit`) VALUES
(2, 1, 1, '2021-01-25', 360, 15),
(3, 1, 3, '2021-01-25', 150, 15),
(4, 3, 1, '2021-01-25', 360, 15),
(5, 3, 3, '2021-01-26', 300, 30),
(6, 3, 1, '2021-01-26', 720, 30);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_olahraga`
--

CREATE TABLE `jenis_olahraga` (
  `id` int(11) NOT NULL,
  `nama_olahraga` varchar(225) NOT NULL,
  `kalori_per_menit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_olahraga`
--

INSERT INTO `jenis_olahraga` (`id`, `nama_olahraga`, `kalori_per_menit`) VALUES
(1, 'Lari', 24),
(3, 'Senam', 10);

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `nama_makanan` varchar(225) NOT NULL,
  `jumlah_kalori` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id`, `nama_makanan`, `jumlah_kalori`, `foto`) VALUES
(3, 'Pizzax', 120, 'seller-6-200x200.png'),
(4, 'Pasta', 300, 'pasta-1-300x300.png'),
(5, 'Jeruk', 200, 'sidebar-5-200x200.jpg'),
(6, 'Lagi', 300, 'menu-7-120x120.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `role` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'raihan', 'raihan', 'Raihan Rizqi Fauzan', '1'),
(2, 'admin', 'pa55word', 'Administrator', '0'),
(3, 'ujang', 'ujang', 'Ujang Ahmad', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kalori`
--
ALTER TABLE `detail_kalori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_olahraga`
--
ALTER TABLE `detail_olahraga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_olahraga`
--
ALTER TABLE `jenis_olahraga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kalori`
--
ALTER TABLE `detail_kalori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_olahraga`
--
ALTER TABLE `detail_olahraga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_olahraga`
--
ALTER TABLE `jenis_olahraga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
