-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 06:45 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `lang_id` int(30) NOT NULL,
  `article_id` int(30) NOT NULL,
  `langCode` varchar(20) NOT NULL,
  `langTitle` varchar(255) NOT NULL,
  `langDesc` varchar(255) NOT NULL,
  `langContent` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `profileImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`lang_id`, `article_id`, `langCode`, `langTitle`, `langDesc`, `langContent`, `author`, `profileImage`) VALUES
(1, 1, 'en', 'Drupal in COVID-19 Series:', 'Continuing again with our series of articles highlighting ways that the Drupal software and its community are building solutions to help combat the effect of COVID-19', 'The COVID-19 pandemic may be the most sweeping, transformative global event since World War II. Coronavirus has changed the very nature of work for millions of people almost overnight. Organizations have had to virtualize any mass gathering events that we', 'Raiza ', '../assets/uploads/author7.jpg'),
(2, 1, 'hi', 'ड्रुपल इन कोव्डि-19 षेरिएस्:', 'कनोन्तिनुइङ अग्ऐन विथ ओउर सेरिएस ओफ़ अर्तिच्लेस हिघ्लिघ्तिङ वय्स थत थे ड्रुपल सोफ़्त्वरे अन्द इत्स चोम्मुनित्य अरे बुइल्दिङ सोलुतिओन्स तो हेल्प चोम्बत थे एफ़्फ़ेच्त ओफ़ कओवीड्-19,', 'द्वितीय विश्व युद्ध के बाद से COVID-19 महामारी सबसे व्यापक, परिवर्तनकारी वैश्विक घटना हो सकती है। कोरोनावायरस ने लगभग रातोंरात लाखों लोगों के काम की प्रकृति को बदल दिया है। संगठनों को 2020 के लिए योजना बनाई गई किसी भी सामूहिक सभा की घटनाओं को वर्चुअलाइज क', 'रायज़ा', '../assets/uploads/author7.jpg'),
(6, 6, 'en', 'A successful Google Summer of Code - thanks to our students, mentors and the Drupal community!', 'The Drupal Association’s Community Liaison, Rachel Lawson, caught up with those taking part in GSoC on Drupal-related projects this year, to find out how things went, what they learned along the way, and what their future may hold.', '<p>The Drupal Association’s Community Liaison, Rachel Lawson, caught up with those taking part in GSoC on Drupal-related projects this year, to find out how things went, what they learned along the way, and what their future may hold.</p>\r\n', 'Rachel Norfolk', '../assets/uploads/author8.jpg'),
(7, 6, 'hi', 'एक सफल गूगल समर ऑफ कोड - हमारे छात्र, आकाओं और ड्रुपल समुदाय को धन्यवाद!', 'ड्रूपल एसोसिएशन के सामुदायिक संपर्क, राहेल लॉसन ने इस साल ड्रुपल से संबंधित परियोजनाओं पर जीएसओसी में भाग लेने वालों के साथ पकड़ा, यह पता लगाने के लिए कि चीजें कैसे चली गईं, उन्होंने रास्ते में क्या सीखा, और उनका भविष्य क्या हो सकता है।', '<pre>\r\nGoogle समर ऑफ कोड (GSoC) एक वैश्विक कार्यक्रम है जो अधिक छात्र डेवलपर्स को ओपन सोर्स सॉफ्टवेयर विकास में लाने पर केंद्रित है। छात्र स्कूल या कॉलेज से छुट्टी के दौरान 3 महीने के प्रोग्रामिंग प्रोजेक्ट पर एक ओपन सोर्स संगठन के साथ काम करते हैं। कार्य', 'रेचल नॉरफ़ॉक', '../assets/uploads/author8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_path` varchar(255) NOT NULL,
  `banner_order` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_path`, `banner_order`) VALUES
(211, '1632419790.jpg', 0),
(212, '1632419808.jpg', 0),
(213, '1632419821.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `cname` varchar(128) NOT NULL,
  `cdate` date NOT NULL,
  `comment` text NOT NULL,
  `like_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `cname`, `cdate`, `comment`, `like_count`) VALUES
(1, 'Libbna', '2021-08-25', 'First Comment. ', 80),
(2, 'Mathew', '2021-08-25', 'Second comment', 16),
(3, 'Tina', '2021-08-25', 'third comment', 4),
(6, 'Peter', '2021-08-25', 'fourth comment', 5),
(52, 'Sam', '2021-08-26', 'Fifth Comment', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `resetID` int(11) NOT NULL,
  `resetEmail` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `sid` int(11) NOT NULL,
  `semail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`sid`, `semail`) VALUES
(9, 'email@email.com'),
(10, 'seema.mathew69@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(20) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `role`) VALUES
(31, 'admin', '0,6Rbsehdf.9I', 'admin@admin.com', 'admin'),
(42, 'user', '0,LZC4b8jY44k', 'libbna.mathew@gmail.com', 'user'),
(43, 'sapo', '81dc9bdb52d04dc20036dbd8313ed055', 'sapofe3390@tmednews.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`resetID`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `lang_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `resetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
