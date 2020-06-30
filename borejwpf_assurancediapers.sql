-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2020 at 07:06 AM
-- Server version: 10.1.44-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borejwpf_assurancediapers`
--

-- --------------------------------------------------------

--
-- Table structure for table `IMAGES`
--

CREATE TABLE `IMAGES` (
  `ID` varchar(255) NOT NULL,
  `PRODUCT_ID` varchar(255) DEFAULT NULL,
  `IMAGE_NAME` int(11) DEFAULT NULL,
  `IMAGE_LOCATION_STRING` varchar(255) DEFAULT NULL,
  `PRODUCT_THUMBNAIL` tinyint(1) AS (IMAGE_NAME = 0) VIRTUAL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IMAGES`
--

INSERT INTO `IMAGES` (`ID`, `PRODUCT_ID`, `IMAGE_NAME`, `IMAGE_LOCATION_STRING`) VALUES
('be090384a3f2bc70b89cee1acf45cdbc', '23b58def11b45727d3351702515f86af', 0, 'assurance-infant-unisex-diapers.png'),
('0615dbb2372f0768b268f067ba237305', '23b58def11b45727d3351702515f86af', 0, 'assurance-newborn-unisex-diapers.png'),
('9158ab9360832299e89e17bab589df9a', '23b58def11b45727d3351702515f86af', 0, 'assurance-toddler-unisex-diapers.png'),
('96bae6aa0a6e91bd1638dd99a75fd967', '95165f097db8ce4f5faa8ecdf71160d9', 0, 'assurance_infant_unisex_diapers_0.png'),
('3c3883bff580ce4063e6b0b3e287b9fc', '95165f097db8ce4f5faa8ecdf71160d9', 1, 'assurance_infant_unisex_diapers_1.png'),
('2e6f0ed4813f40e736ec831d97a6172c', '3513e8bb9b203602f2cfaeb4e753d714', 0, 'assurance_newborn_unisex_diapers_0.png'),
('7d0373e7472282eb99faff5ab7e53ed0', '3513e8bb9b203602f2cfaeb4e753d714', 1, 'assurance_newborn_unisex_diapers_1.png'),
('a38820f6fc0cf2f85b7d1979489fda6c', '6d1c16791c15976617e8c1e2ef094d66', 0, 'assurance_toddler_unisex_diapers_0.png'),
('e68ed02531825a9162bcb2585199ba34', '6d1c16791c15976617e8c1e2ef094d66', 1, 'assurance_toddler_unisex_diapers_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE `ORDERS` (
  `ID` int(11) NOT NULL,
  `USER` varchar(255) DEFAULT NULL,
  `PRODUCT_ID` varchar(255) DEFAULT NULL,
  `CHECKOUT_ID` varchar(255) AS (ID) VIRTUAL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCTS`
--

CREATE TABLE `PRODUCTS` (
  `ID` varchar(255) NOT NULL,
  `PRODUCT_NAME` varchar(255) DEFAULT NULL,
  `PRODUCT_PRICE` int(11) DEFAULT NULL,
  `PRODUCT_DESC` varchar(999) DEFAULT NULL,
  `PRODUCT_QTY` int(11) DEFAULT NULL,
  `PRODUCT_AVAILABILITY` tinyint(1) AS (PRODUCT_QTY > 0) VIRTUAL,
  `PRODUCT_CATEGORY` varchar(255) DEFAULT NULL,
  `PRODUCT_BRAND` varchar(255) DEFAULT NULL,
  `PRODUCT_ADDED_DATE` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRODUCTS`
--

INSERT INTO `PRODUCTS` (`ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_DESC`, `PRODUCT_QTY`, `PRODUCT_CATEGORY`, `PRODUCT_BRAND`, `PRODUCT_ADDED_DATE`) VALUES
('3513e8bb9b203602f2cfaeb4e753d714', 'Newborn Unisex Diapers', 2000, 'Assurance Unisex Diapers for newborn babies offers a softer feel against your baby\'s delicate skin as it gently wraps your baby in the best blanket-like softness obtainable and offers protection for your baby\'s delicate belly and umbilical cord, with a perfectly contoured fit and soft grip, so your baby is always comfortable and protected. The soft, stretchy sides help the diaper stay in place with your baby\'s every move and the absorbent feature pulls wetness and mess away from your baby\'s skin to help keep your baby clean, safe and happy. Our breathable dryness diaper feature helps to keep your baby comfortable', 2, 'a:2:{i:0;s:7:\"Diapers\";i:1;s:12:\"Baby Diapers\";}', 'Assurance', NULL),
('95165f097db8ce4f5faa8ecdf71160d9', 'Infant Unisex Diapers', 3000, 'Assurance Unisex Diapers for infants feature a stretchy waistband that makes it easy to wear and easy to remove. It is also easy, very hygienic and easy to dispose of, by simply rolling up the sides. This infant diaper is specially made to adapt to your babyâ€™s every wild move and offers an easy grip on your baby\'s skin, to ensure it feels comfortable on your babyâ€™s skin during playtime. It is carefully designed to prevent leaks during your babyâ€™s movements and is also breathable to keep your babyâ€™s skin feeling fresh', 3, 'a:2:{i:0;s:7:\"Diapers\";i:1;s:12:\"Baby Diapers\";}', 'Assurance', NULL),
('6d1c16791c15976617e8c1e2ef094d66', 'Toddler Unisex Diapers', 4000, 'Assurance Unisex Diapers for toddlers are perfect for all-night protection. It is designed to handle even the heaviest of nights for up to 12hours, it also offers a softer feel against your baby\'s delicate skin as it gently wraps your baby in the best blanket-like softness. It pulls wetness and messes away from your babyâ€™s skin to keep your baby comfortable always. Our toddler diapers are also breathable, stretchy and comfortable to keep your baby safe, clean and happy', 4, 'a:2:{i:0;s:7:\"Diapers\";i:1;s:12:\"Baby Diapers\";}', 'Assurance', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `RATINGS`
--

CREATE TABLE `RATINGS` (
  `ID` int(11) NOT NULL,
  `USER` varchar(255) DEFAULT NULL,
  `PRODUCT_ID` varchar(255) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `REVIEWS`
--

CREATE TABLE `REVIEWS` (
  `ID` int(11) NOT NULL,
  `USER` varchar(255) DEFAULT NULL,
  `PRODUCT_ID` varchar(255) DEFAULT NULL,
  `REVIEW` varchar(999) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `IMAGES`
--
ALTER TABLE `IMAGES`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PRODUCT_NAME` (`PRODUCT_NAME`);

--
-- Indexes for table `RATINGS`
--
ALTER TABLE `RATINGS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `REVIEWS`
--
ALTER TABLE `REVIEWS`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `RATINGS`
--
ALTER TABLE `RATINGS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `REVIEWS`
--
ALTER TABLE `REVIEWS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
