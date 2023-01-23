-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 08:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siteweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `prezente`
--

CREATE TABLE `prezente` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_proiect` int(11) NOT NULL,
  `DataP` date NOT NULL,
  `Ora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prezente`
--

INSERT INTO `prezente` (`ID`, `ID_user`, `ID_proiect`, `DataP`, `Ora`) VALUES
(1, 1, 1, '2023-01-24', '13:15'),
(2, 2, 1, '2023-01-16', '03:20'),
(3, 1, 2, '2023-01-22', '15:18');

-- --------------------------------------------------------

--
-- Table structure for table `proiecte`
--

CREATE TABLE `proiecte` (
  `ID` int(11) NOT NULL,
  `Nume` varchar(200) NOT NULL,
  `DataCreare` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proiecte`
--

INSERT INTO `proiecte` (`ID`, `Nume`, `DataCreare`) VALUES
(1, 'Proiect test', '2023-01-21'),
(2, 'Proiect 2', '2023-01-21'),
(3, 'Proiect 3', '2023-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `ID` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Parola` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`ID`, `Username`, `Parola`, `Email`) VALUES
(1, 'user1', 'User123', 'user@yahoo.com'),
(2, 'User2', 'User123', 'user2@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prezente`
--
ALTER TABLE `prezente`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `index` (`ID_user`,`ID_proiect`),
  ADD KEY `ID_proiect` (`ID_proiect`);

--
-- Indexes for table `proiecte`
--
ALTER TABLE `proiecte`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prezente`
--
ALTER TABLE `prezente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proiecte`
--
ALTER TABLE `proiecte`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prezente`
--
ALTER TABLE `prezente`
  ADD CONSTRAINT `prezente_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `utilizatori` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prezente_ibfk_2` FOREIGN KEY (`ID_proiect`) REFERENCES `proiecte` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
