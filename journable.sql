-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 01:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journable`
--

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `published_date` year(4) NOT NULL,
  `issn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `journal_cover`
--

CREATE TABLE `journal_cover` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_journal` int(10) UNSIGNED NOT NULL,
  `filename` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_cover`
--

INSERT INTO `journal_cover` (`id`, `id_journal`, `filename`) VALUES
(15, 21, ''),
(16, 22, 'uploads/Acta_Biochimica_Polonica_cover.jpg'),
(17, 23, 'uploads/Indian_Journal_of_Anaesthesia_cover.jpeg'),
(18, 24, 'uploads/Indian_Journal_of_Psychiatry_cover.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `journal_publisher`
--

CREATE TABLE `journal_publisher` (
  `id_journal` int(10) UNSIGNED NOT NULL,
  `id_publisher` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `url_site` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `url_site`, `email`, `password`) VALUES
(1, 'Universitas Mulawarman', '', '', ''),
(4, 'Pustaka', '', '', ''),
(25, 'dafdsefe', 'fads.dfd.fe', 'example@god.com', '$2y$10$Hq2mAMC2xXgxS9WBROuMBOzR1DL3Qcgeq.qZc77k9AvGxl0rmUVR.'),
(26, 'Wolters Kluwer Medknow Publications', 'wolterspublishing.in', 'humas@wolterspublishing.in', '$2y$10$4cf8mHN.9MdcrX/H50K.neqIujqLZzhIjNvs2NlwCnstneUKH.TGC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_cover`
--
ALTER TABLE `journal_cover`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_id_journal` (`id_journal`);

--
-- Indexes for table `journal_publisher`
--
ALTER TABLE `journal_publisher`
  ADD KEY `journal_id_foreign_key` (`id_journal`),
  ADD KEY `publisher_id_foreign_key` (`id_publisher`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `journal_cover`
--
ALTER TABLE `journal_cover`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journal_publisher`
--
ALTER TABLE `journal_publisher`
  ADD CONSTRAINT `journal_id_foreign_key` FOREIGN KEY (`id_journal`) REFERENCES `journal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publisher_id_foreign_key` FOREIGN KEY (`id_publisher`) REFERENCES `publisher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
