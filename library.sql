-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2022 at 09:33 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorid` int(10) UNSIGNED NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `genre` enum('History','Comics','Fiction','Non-Fiction','Biography','Medical','Fantasy','Education','Sports','Technology','Literature') NOT NULL,
  `publication` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `displaybooks`
--

CREATE TABLE `displaybooks` (
  `BookID` int(10) UNSIGNED NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `author` varchar(80) NOT NULL,
  `genre` enum('History','Comics','Fiction','Non-Fiction','Biography','Medical','Fantasy','Education','Sports','Technology','Literature') NOT NULL,
  `publication` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `displaybooks`
--

INSERT INTO `displaybooks` (`BookID`, `ISBN`, `booktitle`, `author`, `genre`, `publication`) VALUES
(1, '1', 'Goldielocks and the Three Bears', 'Robert Southey', 'Fantasy', '1837'),
(2, '2', 'Little Mouse', 'Riikka Jantti', 'Fantasy', '1990'),
(3, '3', 'The Outside Boy', 'Jeanine Cummins', 'Fiction', '2000'),
(4, '4', 'Gorgeous Lies', 'Martha Mcphee', 'Fiction', '2020'),
(5, '5', 'Before I Go', 'Colleen Oakley', 'Fiction', '1870'),
(6, '6', 'The Exiled', 'Deborah Onoja', 'History', '2022'),
(7, '7', 'GoodNight Moon', 'Wise Brown', 'Literature', '1997'),
(8, '8', 'Where The Wild Things Are', 'Maurice Sendak', 'Education', '1974'),
(9, '9', 'Charlie And The Chocolate Factory', 'Roald Dahl', 'Fantasy', '1964'),
(10, '10', 'Little Woman', 'Louis May Alcott', 'Literature', '1880');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'melini', 'melini.gounder@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-10-22 15:03:28'),
(2, 'kaylash', 'kaylash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-10-22 16:29:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `displaybooks`
--
ALTER TABLE `displaybooks`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `displaybooks`
--
ALTER TABLE `displaybooks`
  MODIFY `BookID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_ibfk_1` FOREIGN KEY (`authorid`) REFERENCES `displaybooks` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
