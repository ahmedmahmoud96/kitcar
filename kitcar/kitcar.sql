-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 12:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `mange` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `Date`, `mange`) VALUES
(1, 'أحمد', 'ahmed@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-11-09', 5);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `Date` date NOT NULL,
  `lastSeen` date NOT NULL,
  `accept` int(11) NOT NULL DEFAULT 0,
  `countsell` int(11) NOT NULL DEFAULT 0,
  `countcomment` int(255) NOT NULL DEFAULT 0,
  `phone_client` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `email`, `password`, `gender`, `Date`, `lastSeen`, `accept`, `countsell`, `countcomment`, `phone_client`) VALUES
(1, 'مسعود', 'masoud@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-08', 0, 0, 0, '0'),
(2, 'فراس', 'Firas@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-09', 1, 1, 0, '780385935'),
(3, 'صهيب', 'suhib@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-08', 0, 0, 0, '0'),
(4, 'عبدالفتاح', 'abedalftah@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-08', 1, 1, 0, '780385935'),
(5, 'عبدالله', 'abedallah@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-08', 0, 0, 0, '0'),
(6, 'عمران', 'emran@gamil.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-09', 1, 1, 0, '7847627374'),
(7, 'حازم', 'hazem@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-08', 0, 0, 0, '0'),
(8, 'باسل ', 'basil@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-08', 0, 0, 0, '0'),
(9, 'سامر', 'samer@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-08', 0, 0, 0, '0'),
(10, 'محمد', 'mohmmad@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ذكر', '2022-01-08', '2022-01-08', 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `commentvendor`
--

CREATE TABLE `commentvendor` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(10) NOT NULL,
  `license_file` varchar(100) NOT NULL,
  `id_vendor` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `license_file`, `id_vendor`) VALUES
(1, '674877_العبيدي لقطع الغيار.pdf', 1),
(2, '102723_العبهري لقطع الغيار.pdf', 2),
(3, '112835_الكيلاني لقطع الغيار.pdf', 3),
(4, '743840_الجبالي لقطع الغيار.pdf', 4),
(5, '327882_النعاجي لقطع الغيار.pdf', 5),
(6, '322330_المرعي لقطع الغيار.pdf', 6),
(7, '975316_البيروتي لقطع الغيار.pdf', 7),
(8, '216945_البريجي لقطع السيارات.pdf', 8);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `num` varchar(11) NOT NULL DEFAULT '0',
  `price` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `country_made` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subsection_id` int(11) NOT NULL,
  `sell` int(11) NOT NULL DEFAULT 0,
  `sellclient` int(11) NOT NULL DEFAULT 0,
  `countsell` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `num`, `price`, `date`, `country_made`, `image`, `status`, `vendor_id`, `section_id`, `subsection_id`, `sell`, `sellclient`, `countsell`) VALUES
(1, 'ارضيات 3D ', 'ارضيات 3D هونداي توسان', '9', '7', '2022-01-08', 'الصين', '581207_ارضيات.jpg', 'جديد', 1, 1, 5, 1, 2, 1),
(2, 'منفاخ عجل 2 سلندر', 'منفاخ 2 سلندر مع عدة لإطارات السيارات يعمل على بطارية السيارة والولاعة ويوجد به ساعة قياس الضغط', '1', '25', '2022-01-08', 'الصين', '225261_منفاخ.jpg', 'جديد', 1, 1, 5, 0, 0, 0),
(3, 'شاشة', 'شاشه (T3L smart plus ) المتطوره فل اندرويد لأغلب أنواع السيارات  ', '10', '120', '2022-01-08', 'اليابان', '376710_شاشه.jpg', 'مستعمل', 1, 1, 5, 0, 0, 0),
(4, 'ضوء خلفي Bmw520', 'ضوء خلفي Bmw520 بحالة ممتاز جداً ', '1', '50', '2022-01-08', 'اليابان', '611719_ضوء بي.jpg', 'مستعمل', 2, 1, 6, 0, 0, 0),
(5, 'مسجل كينوود', 'مسجل كينوود للسيارة - سي دي - منافذ USB و AUX - اسود - KDC-U263B', '1', '50', '2022-01-08', 'الصين', '582730_كينود.jpeg', 'جديد', 2, 1, 5, 0, 0, 0),
(6, 'طمبون', 'طمبون خلفي فورد فيوجن 2013', '0', '50', '2022-01-08', 'كوريا ', '7763_خلفي فورد.jpg', 'جديد', 2, 1, 6, 1, 4, 1),
(7, 'بطارية لكزس ', 'بطارية هايبرد  تويوتا لكزس ES300H مكفوله كفالة استبدال سنتين', '1', '2000', '2022-01-08', 'أمريكيا', '957955_بطارية لكزس.jpg', 'جديد', 2, 1, 8, 1, 6, 1),
(8, 'جير اتوماتيك', 'يوجد لدينا جير اوتوماتيك ميتسوبيشي لانسر مكفول وبحالة الوكالة', '10', '150', '2022-01-08', 'كوريا ', '407152_جير اتو.jpg', 'مستعمل', 2, 1, 7, 0, 0, 0),
(9, 'مرشات', 'مرشات باصات H100 ', '5', '7', '2022-01-08', 'الصين', '20972_مرشات.jpg', 'جديد', 3, 2, 10, 0, 0, 0),
(10, 'جهاز انذار', 'جهاز انذار للباصات PLC موديل W76، فتح واغلاق عن بعد مناسب لجميع انواع الباصات', '20', '28', '2022-01-08', 'الصين', '474448_انذار.jpg', 'جديد', 3, 2, 10, 0, 0, 0),
(11, 'سلف', 'سلف  بيجو 306', '3', '17', '2022-01-08', 'كوريا ', '796978_سلف.jpeg', 'جديد', 3, 1, 7, 0, 0, 0),
(12, 'زيت توتاشي 10/40', 'زيت توتاشي 10/40 متوفر ايضاً خدمة غيار الزيت داخل المحل ', '20', '6', '2022-01-08', 'الصين', '198655_زيت.jpg', 'جديد', 3, 1, 9, 0, 0, 0),
(13, 'صدام امامي', 'صدام امامي باص نيسان NV350 أورفان ٢٠٢٠', '7', '170', '2022-01-09', 'تايلندا', '467178_صدام امامي.jpeg', 'جديد', 5, 2, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `visibilite` tinyint(4) NOT NULL DEFAULT 0,
  `parents` int(11) NOT NULL,
  `allow_comment` tinyint(4) NOT NULL DEFAULT 0,
  `allow_ads` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `description`, `visibilite`, `parents`, `allow_comment`, `allow_ads`) VALUES
(1, 'سيارات', 'قسم خاص بالسيارات', 0, 0, 0, 0),
(2, 'باصات', 'قسم يحتوي على كل ما يتعلق بالباصات', 0, 0, 0, 0),
(3, 'معدات ثقيلة', 'قسم خاص بالمعدات ثقيلة', 0, 0, 0, 0),
(4, 'قطع متنوعة', 'قسم يحتوي على القطع المتنوعة', 0, 0, 0, 0),
(5, 'إكسسورات', 'قسم يحتوي على كل ما يتعلق بإكسسوارات السيارات', 0, 1, 0, 0),
(6, 'هيكل', '', 0, 1, 0, 0),
(7, 'ميكانيك', '', 0, 1, 0, 0),
(8, 'بطاريات', '', 0, 1, 0, 0),
(9, 'أُخرى', '', 0, 1, 0, 0),
(10, 'إكسسورات', '', 0, 2, 0, 0),
(11, 'هيكل', '', 0, 2, 0, 0),
(12, 'ميكانيك', '', 0, 2, 0, 0),
(13, 'بطاريات', '', 0, 2, 0, 0),
(14, 'أُخرى', '', 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `id_client`, `id_product`, `id_vendor`, `date`) VALUES
(1, 4, 6, 2, '2022-01-08'),
(2, 2, 1, 1, '2022-01-09'),
(3, 6, 7, 2, '2022-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` varchar(10) NOT NULL,
  `RegStatus` int(11) NOT NULL DEFAULT 0,
  `Date` date NOT NULL,
  `lastSeen` date NOT NULL,
  `countsell` int(11) NOT NULL DEFAULT 0,
  `countproduct` int(11) NOT NULL DEFAULT 0,
  `countcomment` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `email`, `password`, `phone`, `address`, `RegStatus`, `Date`, `lastSeen`, `countsell`, `countproduct`, `countcomment`) VALUES
(1, 'العبيدي', 'alobadie@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 780676555, 'Aqaba', 1, '2022-01-08', '2022-01-08', 1, 3, 0),
(2, 'العبهري', 'alabhrie@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 780385935, 'Zarqa', 1, '2022-01-08', '2022-01-08', 2, 5, 0),
(3, 'الكيلاني', 'alkilane@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 775858858, 'Al-Balqa', 1, '2022-01-08', '2022-01-08', 0, 4, 0),
(4, 'الجبالي', 'aljbale@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 797555677, 'Al-Balqa', 1, '2022-01-08', '2022-01-09', 0, 0, 0),
(5, 'النعاجي', 'alnaje@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 789599955, 'Karak', 1, '2022-01-08', '2022-01-08', 0, 1, 0),
(6, 'المرعي', 'almarie@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 777454665, 'Amman', 1, '2022-01-08', '2022-01-08', 0, 0, 0),
(7, 'البيروتي', 'albaerote@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 788787878, 'Tafilah', 1, '2022-01-08', '2022-01-08', 0, 0, 0),
(8, 'البريجي', 'albraje@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 796955432, 'Zarqa', 1, '2022-01-08', '2022-01-08', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `commentvendor`
--
ALTER TABLE `commentvendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c-v` (`id_vendor`),
  ADD KEY `c-p` (`id_product`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `E-C` (`client_id`),
  ADD KEY `E-P` (`product_id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`),
  ADD KEY `V_L` (`id_vendor`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `P-S` (`section_id`),
  ADD KEY `P-V` (`vendor_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `VL` (`id_client`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `commentvendor`
--
ALTER TABLE `commentvendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentvendor`
--
ALTER TABLE `commentvendor`
  ADD CONSTRAINT `c-p` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c-v` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `E-C` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `E-P` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `V_L` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `P-S` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `P-V` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
