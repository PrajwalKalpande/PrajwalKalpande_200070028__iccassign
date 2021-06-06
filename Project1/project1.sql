-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 08:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `approval` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `full_name`, `comment`, `approval`, `created_at`) VALUES
(84, 'Prajwal Kalpande', 'This  is my first comment', 1, '2021-06-06 08:05:04'),
(85, 'Prajwal Kalpande', 'This  is my first comment', 1, '2021-06-06 08:05:11'),
(86, 'Prajwal Kalpande', 'ugcikghvghbh', 1, '2021-06-06 08:05:16'),
(87, 'Prajwalhbkhb vugbhivhkm  hh hk ', 'ugcikghvghbh', 1, '2021-06-06 08:13:48'),
(88, 'Prajwalhbkhb vugbhivhkm  hh hk ygvhikbkblj', 'ugcikghvghbhhbhb jjlnlkmnk', 1, '2021-06-06 08:13:56'),
(89, 'Prajwalhbkhb vugbhivhkm  hh hk ygvhikbkblj', 'ugcikghvghbhhbhb jjlnlkmnk', 1, '2021-06-06 08:14:07'),
(90, 'Prajwalhbkhb vugbhivhkm  hh hk ygvhikbkblj', 'ugcikghvghbhhbhb jjlnlkmnk', 1, '2021-06-06 08:24:55'),
(91, 'Prajwalhbkhb vugbhivhkm  hh hk ygvhikbkblj', 'ugcikghvghbhhbhb jjlnlkmnk', 1, '2021-06-06 08:25:03'),
(92, 'dvdv', 'vdcvsd', 1, '2021-06-06 13:35:44'),
(93, 'Prjwal', 'vdcvsd paha==gal hai\'', 1, '2021-06-06 13:35:55'),
(94, 'csc', 'd', 1, '2021-06-06 15:34:05'),
(95, 'csc', 'd', 1, '2021-06-06 15:34:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
