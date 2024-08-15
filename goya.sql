-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2024 at 07:19 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'admin',
  `role` enum('admin','super_admin','moderator') DEFAULT 'admin',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_code` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sub_items` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_code` (`short_code`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `short_code`, `created_at`, `updated_at`, `sub_items`) VALUES
(1, 'Mug', 'mug', '2024-08-11 11:53:37', '2024-08-11 14:43:29', '[\"Magic Mug\",\"Mini Mug\",\"Personalized Mug\",\"Polymer Mug\"]'),
(2, '3D Crystal Gifts', '3d_cryst_gift', '2024-08-11 11:53:37', '2024-08-11 14:43:47', '[\"Cube Shape Crystal\",\"Heart Shape Crystal\"]'),
(3, 'Key Chains', 'keychain', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"MDF KeyChain\", \"Plastic with Metal Sheet (Double Side)\", \"Wooden KeyChain\"]'),
(4, 'Fridge Magnet', 'fridge_magnet', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Fridge Magnet - Circle\", \"Fridge Magnet - Rectangle\"]'),
(5, 'Pillows', 'pillow', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"LED Pillow - Heart\", \"LED Pillow - Square\", \"FUR Pillow - Heart\", \"FUR Pillow - Square\", \"Mini FUR Pillow\"]'),
(6, 'Photo Frame', 'frame', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Photo Frame\", \"Digital Art Frame\", \"Mosaic Frame\"]'),
(7, 'Art', 'art', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Art Digital\", \"Art Imaginary\"]'),
(8, 'Polaroid', 'polaroid', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(9, 'Puzzle', 'puzzle', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(10, 'Sipper Bottle', 'sip_bottle', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(11, 'Polyester T-Shit', 'ploy_t_short', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(12, 'Clock', 'clock', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(13, 'Digital Clock', 'digit_clock', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(14, 'Pop Socket', 'pop_socket', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(15, 'Rotating Lamp', 'rot_lamp', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(16, 'Mouse Pad', 'mouse_pad', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[]'),
(17, 'MDF Lamp', 'mdf_lamp', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Couple Lamp\", \"Alphabet Lamp\"]'),
(18, 'MDF Table Frame', 'mdf_tbl_lamp', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Anniversary Table Frame\", \"Couple Table Frame\", \"Birthday Frame\"]'),
(19, 'MDF Collage Wall Frame', 'mdf_clg_wal_lamp', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Couple Collage\", \"Moon Collage\"]'),
(20, 'MDF Clock', 'mdf_clock', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Heart Clock\", \"8 Photos Round Clock\", \"12 Photos Round Clock\"]'),
(21, 'Caricature (Acrylic)', 'caricature_acrylic', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Birthday Boy Caricature\", \"Birthday Girl Caricature\", \"Wedding Caricature\", \"Couple Caricature\", \"Couple Cycling Caricature\"]'),
(22, 'Magic Mirror', 'magic_mirror', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Heart Magic Mirror\", \"Round with Clock Magic Mirror\", \"Round Magic Mirror\"]'),
(23, 'Wallet', 'wallet', '2024-08-11 11:55:29', '2024-08-11 11:55:29', '[\"Women\'s Wallet\", \"Men\'s Wallet\"]');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullName`, `address`, `email`, `phone`, `password`) VALUES
(1, 'Test User 3', NULL, 'test3@gmail.com', NULL, '$2y$10$Ay7NVYbCccQVb4vkF8MpZ.hDZixKr7/LXxNDQ0aHqz3FAN807tx6O'),
(2, 'Test User 3', NULL, 'test3@gmail.com', NULL, '$2y$10$i1EgqFQhBQeBYPFVbxpbCekATynF566oGROCVmN/Q7sNSAMVA5SbO'),
(3, 'Test User 3', NULL, 'test3@gmail.com', NULL, '$2y$10$mPgf.085eh9G3/qvzFyxIOGi9/PLh8kar.ekuHAc7Iv5G7dO2Rmoy'),
(4, 'Test User 3', NULL, 'test3@gmail.com', NULL, '$2y$10$Teve8cWuoKx54MbbPmvjteapoTjTW3DF5JBxUiFQUiDdZzB1BrrV2'),
(5, 'Test User 3', NULL, 'test3@gmail.com', NULL, '$2y$10$20us1if0Oq.8S8a5/JQ.HOJ4eYb8P39kYwuUSrTMw66WRQFiWcP6a'),
(6, 'Test User 1', NULL, 'test1@gmail.com', NULL, '$2y$10$Qip0FbXMj741XmbuY461qe0BlPhJkNnki.IIIeNiM.Fkm7ZgBM6pm'),
(7, 'Test User 4', NULL, 'test4@gmail.com', NULL, '$2y$10$hXIHRQL0JkSDRH26HD5hmusmXNyAxJ6YEU8Hu4mwTJvrhKgWj9aXW'),
(8, 'Yasar', NULL, 'test2@gmail.com', NULL, '$2y$10$36hbz5y/rT1q.gy3XGv19.e0PFesAng8TXRLAGAE0PHFCGYu3Z0sy'),
(9, 'Test User 5', NULL, 'test5@gmail.com', NULL, '$2y$10$wz5YDE3pt3fpeCuS8Eu8zuhHuQLdJAOcLK7Tjpx.qin.KbSOqigFW'),
(10, 'SSS', NULL, 'yasar.mohideen@demo.co', NULL, '$2y$10$3Qb/Fk3PU1fvdKWFtvYJiun7HJr/wl.01Y1fVOA6tpZRyg3SlsIXC');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `status` enum('delivered','received','processing') DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `price` double DEFAULT '399',
  `make_time` int DEFAULT '1',
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `made` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'readymade',
  `quantity` int DEFAULT '10',
  `specialisation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_code`, `category_id`, `price`, `make_time`, `size`, `made`, `quantity`, `specialisation`, `description`) VALUES
(1, 'Personalized Mug', 'mug_white', 1, 300, 24, '0', 'customized', 10, 'Material: Ceramic material, Glossy finish. Size: Can hold 11Oz / 325 ML of liquid. Style: Customizable. Shape: Round. Country of origin: India. Dishwasher and Microwave safe.', 'Occasion: Gifting printed mug. Gift these printed, customized & personalized text, quotes, printed photo mug to your loved one and surprise them. You can gift these Photo Factory personalized printed mugs to your friend, sister, brother, mother, father, job mate, classmate, school mate or your loved person with printing their favourite thing on it. At Photo Factory, we pour love & care to create the best design\r\npersonalized coffee mug can perfectly illustrate your feelings for your loved ones.\r\nCeramic Material with Best Printing Quality, White Glossy Finished Mug\r\nBirthday gift for husband, birthday gift for wife, anniversary gift, wedding gift, birthday gift, marriage gift for friend'),
(2, 'Magic Mug', 'mug_magic', 1, 499, 24, '0', 'customized', 10, 'Material: Ceramic material, Glossy finish. Size: Can hold 11Oz / 325 ML of liquid. Style: Customizable. Shape: Round. Country of origin: India.', 'Occasion: Gifting printed mug. Gift these printed, customized & personalized text, quotes, printed photo mug to your loved one and surprise them. You can gift these Photo Factory personalized printed mugs to your friend, sister, brother, mother, father, job mate, classmate, school mate or your loved person with printing their favourite thing on it. At Photo Factory, we pour love & care to create the best design\r\npersonalized coffee mug can perfectly illustrate your feelings for your loved ones.\r\nCeramic Material with Best Printing Quality, White Glossy Finished Mug\r\nBirthday gift for husband, birthday gift for wife, anniversary gift, wedding gift, birthday gift, marriage gift for friend'),
(3, 'Polymer Mug', 'mug_plolymer', 1, 449, 24, '0', 'customized', 10, 'Material: Ceramic material, Glossy finish. Size: Can hold 11Oz / 325 ML of liquid. Style: Customizable. Shape: Round. Country of origin: India.', 'Practical and Stylish: Combining functionality with aesthetic appeal, this mug adds a personal touch to your daily routine while complementing any kitchen or office decor.\r\nEasy Maintenance: Microwave and dishwasher safe, this mug offers convenience in heating beverages and effortless cleanup, allowing you to enjoy its personalized features without hassle.\r\nUnique Personalization: With the ability to personalize every detail, from photos to text, this mug becomes a meaningful representation of your sentiment and affection for the recipient.\r\nReliable Performance: Experience the reliability and functionality of a mug that enhances daily rituals with its personalized touch, making each moment more special and enjoyable.\r\nReliable Performance: Experience the reliability and functionality of a mug that enhances daily rituals with its personalized touch, making each moment more special and enjoyable.'),
(4, 'Mini Mug', 'mug_mini', 1, 299, 24, '0', 'customized', 10, 'Material: Ceramic material, Glossy finish. Size: Can hold 11Oz / 325 ML of liquid. Style: Customizable. Shape: Round. Country of origin: India. Dishwasher and Microwave safe.', 'Occasion: Gifting printed mug. Gift these printed, customized & personalized text, quotes, printed photo mug to your loved one and surprise them. You can gift these Photo Factory personalized printed mugs to your friend, sister, brother, mother, father, job mate, classmate, school mate or your loved person with printing their favourite thing on it. At Photo Factory, we pour love & care to create the best design\r\npersonalized coffee mug can perfectly illustrate your feelings for your loved ones.\r\nCeramic Material with Best Printing Quality, White Glossy Finished Mug\r\nBirthday gift for husband, birthday gift for wife, anniversary gift, wedding gift, birthday gift, marriage gift for friend'),
(5, 'MDF Keychain', 'mdf_keychain', 3, 100, 1, '0', 'customized', 10, 'Material: Wooden MDF Printing Photo Key Chain One Side Printing Picture\r\nConvenient For Use And Carry, Reducing The Risk Of Keys Being Lost', 'A Keychain Is An Essential Daily Use Accessory That Safely Holds Your Keys. Keychains Are Usually Made Of Wood Printed✔\r\n\r\n★A Personalised Photo Keychain Not Only Keeps Your Keys Safe & Protected But Also Reflects Your Love & Interest. You Can Simply Upload Your Image And We\'ll Print It On Keychain For You✔\r\n\r\n★Create Your Keychain By Decorating It With Photo Name Of Your Choice. A Wonderful Gift For Any Occasion✔'),
(6, 'Plastic with Metal Sheet (Double Side)', 'plas_metal_sheet_double_keychain', 3, 200, 1, '0', 'customized', 10, '', 'Personalized Memories: Turn your favorite photos into a unique keepsake.\nExceptional Print Quality: Vibrant, sharp, and lifelike images on a durable keychain.\nVersatile Use: Perfect for bikes, cars, homes, and offices—customize any space.\nThoughtful Gift: Ideal for all occasions, suitable for girls, boys, women, men, and couples.\nCarry Your Memories: Keep special moments close, wherever you go.'),
(7, 'Wooden Keychain', 'wood_keychain', 3, 200, 1, '0', 'customized', 10, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `firstname`, `lastname`, `gender`, `email`, `password`) VALUES
(1, 'admin', 'Admin', 'Admin', 'male', 'admin@gmail.com', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `reviews_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
