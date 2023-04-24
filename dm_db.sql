-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 10:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `phone`, `email`, `interest`, `location`, `message`) VALUES
('John Smith', '', 'armtechinsurance@hotmail.com', 'Buying', 'Andrews', 'house'),
('James Simons', '', 'wowip62944@teknowa.com', 'Commercial', 'Odessa', 'I need me a condo'),
('John Smith', '', 'armtechinsurance@hotmail.com', 'Buying', 'Andrews', 'ghjk'),
('James Simons', '', 'zarmah@ttu.edu', 'Buying', 'Andrews', 'ghjkloiu'),
('James Simons', '', 'ababelrmah@gmail.com', 'Buying', 'Andrews', 'ghjkl'),
('John Smith', '', 'zarmah@ttu.edu', 'Buying', 'Midland', 'I want to sell'),
('John Smith', '', 'zarmah@ttu.edu', 'Selling', 'Odessa', 'ghone'),
('Zerubabel Armah', '', 'zarmah@ttu.edu', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'armtechinsurance@hotmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'armtechinsurance@hotmail.com', 'Selling', 'Midland', 'go there'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling a house'),
('John Smith', '', 'ababelrmah@gmail.com', 'Commercial', 'Midland', 'sell a house'),
('John Smith', '', 'ababelrmah@gmail.com', 'Commercial', 'Midland', 'sell a house'),
('John Smith', '', 'ababelrmah@gmail.com', 'Commercial', 'Midland', 'sell a house'),
('John Smith', '', 'ababelrmah@gmail.com', 'Commercial', 'Midland', 'sell a house'),
('John Smith', '', 'ababelrmah@gmail.com', 'Commercial', 'Midland', 'sell a house'),
('John Smith', '', 'ababelrmah@gmail.com', 'Commercial', 'Midland', 'sella house'),
('John Smith', '', 'armtechinsurance@hotmail.com', 'Buying', 'Andrews', 'gh one'),
('John Smith', '', 'zarmah@ttu.edu', 'Selling', 'Midland', 'gh one'),
('Zerubabel Armah', '', 'zarmah@ttu.edu', 'Selling', 'Midland', 'gh one'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'selling'),
('John Smith', '', 'zarmah@ttu.edu', 'Selling', 'Midland', 'sell am'),
('John Smith', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'seell am'),
('John Smith', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'sell am'),
('John Smith', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'sell am'),
('John Smith', '', 'zarmah@ttu.edu', 'Buying', 'Midland', 'sell am'),
('John Smith', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'sell'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'New Construction', 'Odessa', 'selling at odessa'),
('John Smith', '', 'ababelrmah@gmail.com', 'Selling', 'Midland', 'sell am'),
('James Simons', '', 'ababelrmah@gmail.com', 'Commercial', 'Odessa', 'msg'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Greenwood', 'msg'),
('John Smith', '', 'zarmah@ttu.edu', 'Selling', 'Greenwood', 'msg'),
('John Smith', '', 'zarmah@ttu.edu', 'Commercial', 'Midland', 'msg'),
('Zerubabel Armah', '', 'zarmah@ttu.edu', 'Commercial', 'Odessa', 'msg'),
('James Simons', '', 'zarmah@ttu.edu', 'Commercial', 'Odessa', 'msghhj'),
('John Smith', '', 'ababelrmah@gmail.com', 'Commercial', 'Odessa', 'date sent'),
('John Smith', '', 'zarmah@ttu.edu', 'Commercial', 'Midland', 'after change'),
('John Smith', '', 'armtechinsurance@hotmail.com', 'Selling', 'Midland', 'ey there'),
('John Smith', '', 'ababelrmah@gmail.com', 'Selling', 'Odessa', 'be there'),
('Zerubabel Armah', '', 'zarmah@ttu.edu', 'Selling', 'Odessa', 'trials'),
('Zerubabel Armah', '', 'ababelrmah@gmail.com', 'Selling', 'Odessa', 'selling shoes'),
('John Smith', '', 'zarmah@ttu.edu', 'Commercial', 'Odessa', 'shelling'),
('James Simons', '', 'zarmah@ttu.edu', 'Commercial', 'Greenwood', 'free me'),
('g', '', 'zarmah@ttu.edu', 'Buying', 'Midland', 'ey there'),
('g', '', 'zarmah@ttu.edu', 'Selling', 'Odessa', 'hey gey'),
('go there', '', 'ababelrmah@gmail.com', 'Buying', 'Midland', 'be there'),
('John Smith', '', 'ababelrmah@gmail.com', 'Commercial', 'Odessa', 'send am'),
('John Smith', '', 'armtechinsurance@hotmail.com', 'Selling', 'Midland', 'test 1221'),
('John Smith', '', 'armtechinsurance@hotmail.com', 'Commercial', 'Greenwood', 'without email'),
('Zerubabel Armah', '', 'armtechinsurance@hotmail.com', 'Commercial', 'Odessa', 'good number'),
('John Smith', '', 'armtechinsurance@hotmail.com', 'Commercial', 'Odessa', 'another good number'),
('John Smith', '', 'armtechinsurance@hotmail.com', 'Commercial', 'Odessa', 'yet another good number'),
('John Smith', '8888888888', 'zarmah@ttu.edu', 'New Construction', 'Odessa', 'tired of the numbers'),
('g', '8888888888', 'zarmah@ttu.edu', 'Commercial', 'Greenwood', 'test full name'),
('John Smith', '8888888888', 'armtechinsurance@hotmail.com', 'New Construction', 'Others', 'test email again'),
('John Smith', '8888888888', 'ghjk', 'Commercial', 'Greenwood', 'test email again'),
('John Smith', '9999999999', 'ababelrmah@gmail.com', 'Selling', 'Greenwood', 'bad phone'),
('John Smith', '8888888888', 'ababelrmah@gmail.com', 'Commercial', 'Midland', 'redirect'),
('John Smith', '8888888888', 'ababelrmah@gmail.com', 'Commercial', 'Midland', 'redirect');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `description` varchar(510) NOT NULL,
  `valuation` varchar(255) NOT NULL,
  `bed` int(11) NOT NULL,
  `bath` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`description`, `valuation`, `bed`, `bath`, `address`, `city`, `state`, `zipcode`, `name`, `email`) VALUES
('hjk', '', 0, 0, '707 Avenue T', 'Lubbock', 'Alabama', 20030, 'ZERUBABEL ARMAH', 'armtechinsurance@hotmail.com'),
('ghj', 'Single Family', 1, 1, '707 Avenue T', 'Lubbock', 'Alabama', 20030, 'ZERUBABEL ARMAH', 'armtechinsurance@hotmail.com'),
('want val', 'Single Family', 2, 1, '707 Avenue T', 'Lubbock', 'Alabama', 20030, 'ZERUBABEL ARMAH', 'armtechinsurance@hotmail.com'),
('valuate', 'Multi Family', 3, 3, '707 kanda estate', 'Lubbock', 'Arizona', 20030, 'Zerubabel Armah', 'armtechinsurance@hotmail.com'),
('val', 'Multi Family', 3, 3, '707 Avenue T', 'Lubbock', 'Alaska', 20030, 'Jo', 'armtechinsurance@hotmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
