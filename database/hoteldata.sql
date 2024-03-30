-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 03:40 PM
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
-- Database: `hoteldata`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(400) DEFAULT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'published',
  `author_id` int(11) NOT NULL,
  `author_type` varchar(255) NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `icon` varchar(60) DEFAULT NULL,
  `order` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `is_default` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `status`, `author_id`, `author_type`, `icon`, `order`, `is_featured`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Single Room', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 1, '2020-09-03 09:24:14', '2020-09-04 06:56:38'),
(2, 'Double  Room', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2020-09-04 06:55:24', '2020-09-04 06:56:38'),
(3, 'Triple Room', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2020-09-04 06:55:49', '2020-09-04 06:56:38'),
(5, 'Single BedRoom', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 0, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, NULL, NULL),
(6, 'Double Bedroom', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 0, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, NULL, NULL),
(7, 'Joint Room', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 0, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, NULL, NULL),
(8, 'Villa', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 0, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, NULL, NULL),
(9, 'Penthouse', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 0, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, NULL, NULL),
(10, 'Triple Bedroom\r\n', 0, ' welcomes you in a real cosmopolitan, pulsing milieu, at the same time offering peace and intimate retirement, just in the heart of the city centre. Timeless elegance tailored for the demands of our time; exceptional combination of magnificent architecture and divine cuisine, in perfect harmony. A Michelin-starred restaurant and a beautifully restored town palace joined forces for you!', 'published', 0, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(8) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Image` varchar(40) NOT NULL,
  `category_id` int(5) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `Name`, `Image`, `category_id`, `price`) VALUES
(1, 'Burger King', 'rest1.jpeg', 5, 100),
(2, 'Best Kulai Food', 'rest2.jpeg', 5, 233),
(3, 'Jimmy John\'s', 'rest3.jpeg', 5, 224),
(4, 'Lazeez ', 'rest4.jpeg', 5, 242),
(5, 'Mc Donald\'s', 'rest5.jpeg', 5, 323),
(6, 'Zoe\'s Kitchen', 'rest6.jpeg', 5, 533),
(7, 'KFC', 'rest7.jpeg', 5, 224),
(8, 'SWAMY RESTAURENT', 'rest8.jpeg', 5, 244),
(9, 'HOOTERS', 'rest9.jpeg', 5, 433),
(10, 'ALL AMERICAN\'S FOOD', 'rest10.jpeg', 5, 78),
(11, 'America\'s Diner', 'rest11.jpeg', 6, 234),
(12, 'Chinese Food', 'rest12.jpeg', 6, 444),
(13, 'Simple', 'rest13.jpeg', 6, 334),
(14, 'Ruby Tushar', 'rest14.jpeg', 6, 234),
(15, 'IN-N-OUT Burger', 'rest15.jpeg', 10, 333),
(16, 'Night-out-Hotel', 'rest16.jpeg', 10, 342),
(17, 'Bharavan Da Dhaba', 'rest17.jpeg', 10, 458),
(18, 'RED ROBIIN', 'rest18.jpeg', 10, 376),
(19, 'Japanese Dinners', 'rest19.jpeg', 10, 262),
(20, 'Tekken Restaurent', 'rest20.jpeg', 10, 287),
(47, 'Regency Hotel', 'vill1.jpg', 8, 0),
(48, 'Marriott', 'jr1.jpg', 7, 0),
(49, 'El Rancho Casino', 'jr2.jpg', 7, 0),
(50, 'Ritz Plaza Hotel', 'jr3.jpeg', 7, 0),
(51, 'W Hotel', 'dr1.webp', 2, 0),
(52, 'St Regis Hotels', 'dr2.jpg', 2, 0),
(53, 'Wilderness Lodge', 'pen1.jpg', 9, 0),
(54, 'Regency Hotel', 'pen2.jpg', 9, 0),
(55, 'Walt Disney World', 'pen3.jpeg', 9, 0),
(56, 'The Stanley Hotel', 'pen4.webp', 9, 0),
(57, 'MarriottMarriott', 'pen5.jpg', 9, 0),
(58, 'Hotel Bond', 'sr1.jpg', 1, 0),
(59, 'Marriott', 'sr2.jpg', 1, 0),
(60, 'Ahwahnee Hotel', 'sr3.webp', 1, 0),
(61, 'Belmond', 'sr4.webp', 1, 0),
(62, 'Peninsula Chicago', 'sr5.webp', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `Name`, `Image`, `price`) VALUES
(1, 'Burger and Fries', 'f4.jpeg', 170),
(2, 'Mutton Biryani', 'f2.png', 260),
(3, 'Chilli Chicken', 'f3.jpeg', 255),
(4, 'Burger and Fries', 'f4.jpeg', 232),
(5, 'Idli Vada', 'f5.jpeg', 12),
(6, 'Pizza', 'f6.jpeg', 100),
(7, 'Sweet Egg', 'f7.jpeg', 80),
(8, 'Triple Bar Icecream', 'f8.jpeg', 300),
(9, 'Full Fried Chicken', 'f9.jpeg', 567),
(10, 'Bread', 'f10.jpeg', 120),
(11, 'Full fried Prawns Rice', 'f11.jpeg', 340),
(12, 'Donuts(9)', 'f12.jpeg', 300),
(13, 'Paneer Curry', 'f13.jpeg', 230),
(14, 'Dosa', 'f14.jpeg', 320),
(15, 'Rice Rolls', 'f15.jpeg', 210),
(16, 'Fruit Groups', 'f16.jpeg', 400),
(17, 'Full Fish Fry(2 pcs)', 'f17.jpeg', 300),
(18, 'Momos', 'f18.jpeg', 240),
(19, 'Puri', 'f19.jpg', 120),
(20, 'Pesarettu', 'f20.jpg', 135),
(21, 'Butter Naan', 'f21.jpg', 80),
(22, 'Burger and Fries', 'f22.jpeg', 417),
(23, 'Fish Fries', 'f23.jpeg', 567),
(24, 'Curd Noodles', 'f24.jpeg', 120),
(25, 'Corn Chicken', 'f25.jpeg', 340),
(26, 'Fry Mashup', 'f26.jpeg', 300),
(27, 'Royal Feast', 'f27.jpeg', 230),
(28, 'Fish Lollipop', 'f28.jpeg', 320),
(29, 'Chicken Noodles', 'f29.jpeg', 210),
(30, 'Sea Mashup', 'f30.jpeg', 400),
(31, 'Chocolate Cherry', 'f31.jpeg', 300),
(32, 'Bread Omlette', 'f32.jpeg', 240),
(33, 'Leafy Chicken', 'f33.jpeg', 120),
(34, 'Sea Mix Large', 'f34.jpeg', 135),
(35, 'Meat Dosa', 'f35.jpeg', 170),
(35, 'Meat Dosa', 'f35.jpeg', 170),
(36, 'Ramen Naan', 'f36.jpeg', 1070),
(37, 'Ramen Naan Large', 'f37.jpeg', 1700),
(38, 'Bascolima', 'f38.jpeg', 150),
(39, 'Fine Mosangila', 'f39.jpeg', 270),
(40, 'Jelly Cake', 'f40.jpeg', 380),
(41, 'Spiral Cake', 'f41.jpeg', 195),
(42, 'Sea Mashup x-large', 'f42.jpeg', 1706),
(43, 'Nasomada', 'f43.jpeg', 140),
(44, 'Vannlia Ice cream', 'f44.jpeg', 60),
(45, 'Chicken Samosa', 'f45.jpeg', 90),
(46, 'Fried Boneless Meat', 'f46.jpeg', 1200),
(47, 'Guntur Kaaram', 'f47.jpeg', 192),
(48, 'Crab Fried(large)', 'f48.jpeg', 1000),
(49, 'Meals Remix', 'f49.jpeg', 180),
(50, 'Eat Clean Cashew Salad', 'f50.jpeg', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(40) NOT NULL,
  `id` int(6) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Join_date` date NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
