-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2018 at 10:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makao`
--

-- --------------------------------------------------------

--
-- Table structure for table `baths`
--

CREATE TABLE `baths` (
  `baths_id` int(3) NOT NULL,
  `no_of_baths` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baths`
--

INSERT INTO `baths` (`baths_id`, `no_of_baths`) VALUES
(1, 0),
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bed_id` int(3) NOT NULL,
  `no of beds` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`bed_id`, `no of beds`) VALUES
(1, 0),
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Unfurnished Apartment'),
(2, 'Furnished Apartment'),
(3, 'Maisonate'),
(4, 'Commercial Bulding'),
(5, 'land'),
(6, 'Holiday Home'),
(7, 'Hotel'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(100) NOT NULL,
  `client_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_title`) VALUES
(1, 'Tenant'),
(2, 'LandLord');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `customer_idno` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_gender` varchar(255) NOT NULL,
  `customer_contacts` bigint(100) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_type` int(100) NOT NULL,
  `customer_balance` int(100) NOT NULL DEFAULT '0',
  `customer_propic` text,
  `customer_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_idno`, `customer_name`, `customer_gender`, `customer_contacts`, `customer_email`, `customer_type`, `customer_balance`, `customer_propic`, `customer_password`) VALUES
(2, 31253665, 'Noel Kipchumba', 'male', 718783814, 'samodhis@gmail.com', 1, 425000, '', 'kakoli ore'),
(3, 31817072, 'Stella Ireri', 'female', 715560738, 'ireristella@gmail.com', 1, 270000, '', 'stella123'),
(4, 32715487, 'Brenda Adhiambo', 'female', 708007207, 'brendaoluoch@gmail.com', 2, 25500, 'Lighthouse.jpg', 'maseno2017'),
(5, 31685313, 'musili muthui', 'male', 725330643, 'jsphmuthui@gmail.com', 1, 20000, 'mm.jpg', 'maseno2017'),
(6, 31535860, 'stanley masika', 'male', 707160495, 'stano@gmail.com', 2, 34000, '851575_501183263335085_1902887179_n.png', 'maseno2017'),
(7, 31021260, 'raphael Mbaru', 'male', 712724258, 'mbaruraphael@gmail.com', 1, 0, 'IMG_20160420_180843.jpg', 'mkali2012'),
(8, 30303030, 'Noel Kipchumba', 'male', 792962001, 'solutionmouse@yahoo.com', 2, 425000, 'IMG_20161007_101630.jpg', 'maseno'),
(9, 32510575, 'Alex Gikaru', 'male', 725079933, 'agmbugua@gmail.com', 2, 0, 'Penguins.jpg', 'maseno2017'),
(11, 31685313, 'kaka musili', 'male', 725330643, 'kaka@gmail.com', 1, 0, '', 'kaka@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(100) NOT NULL,
  `location_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_title`) VALUES
(1, 'Nairobi'),
(2, 'Mombasa'),
(3, 'Kisumu');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` tinyint(3) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_idno` int(100) NOT NULL,
  `customer_contacts` bigint(100) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_type` int(100) NOT NULL,
  `property_cat` int(100) NOT NULL,
  `property_type` int(100) NOT NULL,
  `property_title` text NOT NULL,
  `property_owner` varchar(255) NOT NULL,
  `property_price` int(100) NOT NULL,
  `amount_paid` int(100) NOT NULL,
  `agent_amount` int(100) NOT NULL DEFAULT '0',
  `landlord_amount` int(11) NOT NULL DEFAULT '0',
  `transaction_code` varchar(255) NOT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `customer_idno`, `customer_contacts`, `customer_email`, `customer_type`, `property_cat`, `property_type`, `property_title`, `property_owner`, `property_price`, `amount_paid`, `agent_amount`, `landlord_amount`, `transaction_code`, `date_of_transaction`) VALUES
(1, 'musili muthui', 0, 725330643, 'jsphmuthui@gmail.com', 1, 5, 1, 'Mkulima Land', 'stanley masika', 40000, 40000, 6000, 34000, 'um8ossa0', '2017-07-28 03:43:28'),
(2, 'musili muthui', 31685313, 725330643, 'jsphmuthui@gmail.com', 1, 1, 2, 'PK House', 'Noel Kipchumba', 500000, 500000, 75000, 425000, '22qvdijy', '2017-07-29 01:40:30'),
(3, 'musili muthui', 31685313, 725330643, 'jsphmuthui@gmail.com', 1, 5, 1, 'Beach Plot', 'Brenda Adhiambo', 20000, 20000, 3000, 17000, 'xsw8jx83', '2017-08-03 08:03:24'),
(4, 'musili muthui', 31685313, 725330643, 'jsphmuthui@gmail.com', 1, 5, 1, 'Beach Plot', 'Brenda Adhiambo', 20000, 20000, 3000, 17000, 'e2mzc7mi', '2017-08-03 08:03:49'),
(5, 'musili muthui', 31685313, 725330643, 'jsphmuthui@gmail.com', 1, 5, 1, 'Beach Plot', 'Brenda Adhiambo', 20000, 20000, 3000, 17000, 'aergnonw', '2017-08-03 08:05:17'),
(6, 'musili muthui', 31685313, 725330643, 'jsphmuthui@gmail.com', 1, 5, 1, 'Beach Plot', 'Brenda Adhiambo', 20000, 20000, 3000, 17000, 'eopqtn3u', '2017-08-03 08:08:59'),
(7, 'musili muthui', 31685313, 725330643, 'jsphmuthui@gmail.com', 1, 5, 1, 'Beach Plot', 'Brenda Adhiambo', 20000, 20000, 3000, 17000, 'tbqzjmay', '2017-08-03 08:24:05'),
(8, 'musili muthui', 31685313, 725330643, 'jsphmuthui@gmail.com', 1, 2, 1, 'Bush Baby', 'Brenda Adhiambo', 30000, 30000, 4500, 25500, 'o7emcvi4', '2018-12-06 08:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` int(3) NOT NULL,
  `prices` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `prices`) VALUES
(1, 2000),
(2, 4000),
(3, 6000),
(4, 8000),
(5, 10000),
(6, 12000),
(7, 14000),
(8, 16000),
(9, 18000),
(10, 20000),
(11, 22000),
(12, 24000),
(13, 26000),
(14, 28000),
(15, 30000),
(16, 32000),
(17, 34000),
(18, 36000),
(19, 40000),
(20, 45000),
(21, 50000),
(22, 60000),
(23, 70000),
(24, 80000),
(25, 90000),
(26, 100000),
(27, 150000),
(28, 200000),
(29, 300000),
(30, 400000),
(31, 500000),
(32, 600000),
(33, 700000),
(34, 800000),
(35, 900000),
(36, 1000000),
(37, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_cat` int(100) NOT NULL,
  `property_type` int(100) NOT NULL,
  `property_title` text NOT NULL,
  `property_owner` varchar(255) NOT NULL,
  `property_image` text NOT NULL,
  `property_price` int(100) DEFAULT NULL,
  `property_desc` text NOT NULL,
  `bed` int(100) DEFAULT NULL,
  `bath` int(100) DEFAULT NULL,
  `property_loc` int(100) NOT NULL,
  `property_keywords` text NOT NULL,
  `property_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_cat`, `property_type`, `property_title`, `property_owner`, `property_image`, `property_price`, `property_desc`, `bed`, `bath`, `property_loc`, `property_keywords`, `property_status`) VALUES
(13, 2, 1, 'Bush Baby', 'Brenda Adhiambo', 'P1080834.JPG', 30000, 'A 3 bedroom fully furnished and self contained house, with 2 rooms upstairs and 2 rooms downstairs sharing swimming pool and garden with other houses.ïƒ¼	Have a kitchen, living room and a dining room \r\nïƒ¼	50 mtrs to the beach and 10 metres to the Mama Ngina-Mombasa road.\r\n', 4, 4, 2, 'rental', 1),
(15, 5, 1, 'Beach Plot', 'Brenda Adhiambo', 'P1080889.JPG', 20000, '1/2 An Acre Beach plot for sale in Diani, South Coast. Ukunda, Msambweni.\r\nprice is slightly negotiable', 1, 1, 2, 'land', 1),
(16, 1, 1, 'Bubbles Resort', 'Brenda Adhiambo', 'P1090023.JPG', 40000, 'Have 12 apartments of 2 bedrooms each, fully furnished with a kitchen, dining area and TV area\r\n4 apartments with AC and the 8 with fan only\r\n', 3, 3, 1, 'rent', 0);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(3) NOT NULL,
  `type_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_title`) VALUES
(1, 'For Rent'),
(2, 'For Sale');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baths`
--
ALTER TABLE `baths`
  ADD PRIMARY KEY (`baths_id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baths`
--
ALTER TABLE `baths`
  MODIFY `baths_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `bed_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
