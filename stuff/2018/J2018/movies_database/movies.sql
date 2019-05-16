-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 02:52 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jovanbosman`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `year` smallint(6) NOT NULL,
  `classification` varchar(5) NOT NULL,
  `rating` decimal(5,2) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL,
  `profit` int(11) NOT NULL,
  `poster` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `classification`, `rating`, `genre`, `director`, `profit`, `poster`) VALUES
(2, 'Freedom Writers', 2007, 'PG-13', '7.50', 'Biography, Crime, Dr', 'Richard LaGravenese', 36605602, ''),
(3, 'Unbroken', 2014, 'PG-13', '7.20', 'Biography, Drama, Sp', 'Angelina Jolie', 115637895, ''),
(4, 'Deadpool 2', 2018, 'R', '8.10', 'Action, Adventure, Comedy', 'David Leitch', 282940975, ''),
(6, 'Cool Cat Saves the Kids', 2015, 'UR', '5.30', 'Comedy, Crime, Family', 'Derek Savage', 0, ''),
(7, 'Paddington', 2014, 'PG', '7.20', 'Animation, Adventure, Comedy', 'Paul King ', 76223578, ''),
(8, 'Solo: A Star Wars Story', 2018, 'PG-13', '7.20', 'Action, Adventure, Fantasy', 'Ron Howard ', 180768711, ''),
(9, 'Mr. Bean\'s Holiday', 2007, 'G', '6.40', 'Comedy, Family', 'Steve Bendelack', 33302167, ''),
(10, 'Johnny English', 2003, 'PG', '6.20', 'Action, Adventure, Comedy', 'Peter Howitt', 28082366, 'jenglish.jpg'),
(11, 'Despicable Me', 2010, 'PG', '7.70', 'Animation, Adventure, Comedy', 'Pierre Coffin, Chris Renaud', 251513985, ''),
(12, 'Shrek', 2001, 'PG', '7.90', 'Action, Adventure, Comedy', 'Andrew Adamson, Vicky Jenson', 267665011, ''),
(13, 'Jurassic Park', 1993, 'PG-13', '8.10', 'Adventure, Sci-Fi, Thriller', 'Steven Spielberg', 402453882, ''),
(14, 'The Lost World: Jurassic Park', 1997, 'PG-13', '6.50', 'Action, Adventure, Sci-Fi', 'Steven Spielberg', 229086679, ''),
(15, 'Jurassic Park III', 2001, 'PG-13', '5.90', 'Action, Adventure, Sci-Fi', 'Joe Johnston', 181171875, ''),
(16, 'Jurassic World', 2015, 'PG-13', '7.00', 'Action, Adventure, Sci-Fi', 'Colin Trevorrow', 1670400637, ''),
(17, 'Jurassic World: Fallen Kingdom', 2018, 'PG-13', '6.70', 'Action, Adventure, Sci-Fi', 'J.A. Bayona', 0, ''),
(18, 'Deadpool', 2016, 'R', '8.00', 'Action, Adventure, Comedy', 'Tim Miller', 363070709, ''),
(19, 'The Simpsons Movie', 2007, 'PG-13', '7.40', 'Animation, Adventure, Comedy', 'David Silverman', 183135014, ''),
(20, 'WALL·E', 2008, 'G', '8.40', 'Animation, Adventure, Family', 'Andrew Stanton', 223808164, ''),
(21, 'The Shape of the Water', 2017, 'R', '7.40', 'Drama', 'Guillermo del Toro', 63859435, 'sotw.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
