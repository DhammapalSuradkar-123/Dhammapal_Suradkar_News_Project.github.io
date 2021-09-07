-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 01:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `post` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(2, 'New-Politics', '0'),
(4, 'Educational', '1'),
(15, 'Traveling', '3'),
(16, 'memes', '1'),
(17, 'jocks', '2'),
(18, 'movies', '4'),
(19, 'international news', '0'),
(20, 'crime', '0'),
(21, 'olimpic', '0');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `tital` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `post_date` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `tital`, `description`, `category`, `post_date`, `author`, `images`) VALUES
(21, 'just create a post.', 'the main written part of a book, newspaper, etc. (not the pictures, notes, index, etc.)\r\nकिसी पुस्‍तक, अख़बार का मुख्‍य लिखित भाग (जिसमें चित्र, टिप्‍पणियाँ, अनुक्रमणिका आदि शामिल नहीं); मूल पाठ\r\n2.\r\nthe written form of a speech, interview, etc.\r\nकिसी भाषण, साक्षात्‍कार आदि का लिखित रूप', '15', '30 Mar, 2021', '19', '1616951276-facebook-logo.jpg'),
(22, 'maruti suziki', 'Wikipedia (/ˌwɪkɪˈpiːdiə/ (About this soundlisten) wik-ih-PEE-dee-ə or /ˌwɪki-/ (About this soundlisten) wik-ee-) is a free, multilingual open-collaborative online encyclopedia created and maintained by a community of volunteer contributors using a wiki-based editing system. Wikipedia is the largest', '15', '29 Mar, 2021', '11', '1616972088-avast.png'),
(23, 'google crome', 'Wikipedia was launched on January 15, 2001, by Jimmy Wales and Larry Sanger; Sanger coined its name as a portmanteau of \"wiki\" and \"encyclopedia\".[7][8] Initially available only in English, versions in other languages were quickly developed.', '16', '29 Mar, 2021', '14', '1616972123-avast_logo.png'),
(26, 'my new movie in 2022', 'Wikipedia gained early contributors from Nupedia, Slashdot postings, and web search engine indexing. Language editions were also created, with a total of 161 by the end of 2004.[27] Nupedia and Wikipedia coexisted until the former\'s servers were taken down permanently in 2003, and its text was incor', '18', '29 Mar, 2021', '15', '1616972577-comp-name2.png'),
(28, 'google hiring freshers in 2021.', 'In November 2009, a researcher at the Rey Juan Carlos University in Madrid found that the English Wikipedia had lost 49,000 editors during the first three months of 2009; in comparison, the project lost only 4,900 editors during the same period in 2008.[38][39] The Wall Street Journal cited the arra', '18', '29 Mar, 2021', '17', '1616972670-google-logo.jpg'),
(29, 'thalapathy new movie in hindi', 'Openness\r\nNumber of English Wikipedia articles[58]\r\nEnglish Wikipedia editors with >100 edits per month[59]\r\nDifferences between versions of an article are highlighted\r\n\r\nUnlike traditional encyclopedias, Wikipedia follows the procrastination principle[note 4] regarding the security of its content.[', '18', '29 Mar, 2021', '19', '1616972745-mountains.jpg'),
(31, 'let\'s create some new today.', 'Traditionally, a text is understood to be a piece of written or spoken material in its primary form (as opposed to a paraphrase or summary). A text is any stretch of language that can be understood in context. ... Any sequence of sentences that belong together can be considered a text', '4', '30 Mar, 2021', '9', '1617121122-my-logo.PNG'),
(32, 'just', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum reprehenderit excepturi quia delectus error ad similique labore itaque, dolorum ab, tenetur illum aliquam veniam voluptate recusandae ducimus? Veritatis deleniti similique eos, commodi reprehenderit nemo ab iste minus pariatur a tempore', '17', '30 Mar, 2021', '19', '1617131699-USA.png'),
(34, 'read and write.', 'dent eligendi voluptates quia enim quas veniam. Recusandae, ratione vero expedita repellat adipisquos deserunt molestiae est magnam, ratione aliquam, sit beatae at itaque quod consequuntur fuga reiciendis nihil cumque inventore', '17', '30 Mar, 2021', '12', '1617132670-boxes.jpg'),
(36, 'in the usa.', 'dent eligendi voluptarem et eum perferendis, dicta accusamus ad nulla quas natus. Ut quos deserunt molestiae est magnam, ratione aliquam, sit beatae at itaque quod consequuntur fuga reiciendis nihil cumque inventore', '18', '30 Mar, 2021', '15', '1617132801-avast-img3.jpg'),
(37, 'something new', 'dent eligendi voluptates quia enim quas veniam. Recusandae, ratione vero expedita repellat adipisc beatae at itaque quod consequuntur fuga reiciendis nihil cumque inventore', '15', '30 Mar, 2021', '13', '1617132873-bulb-off.png');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_logo` varchar(255) NOT NULL,
  `FooterDesc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `website_name`, `website_logo`, `FooterDesc`) VALUES
(1, '@rchitect..', '1617212932-chatbot-3.png', '@Next is facebook.com | By Dhammapal Suradkar | -2021-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `FirstName`, `LastName`, `Username`, `password`, `Role`, `bio`, `address`, `img`) VALUES
(9, 'sanu', 'Dilli', 'Dilli', '202cb962ac59075b964b07152d234b70', '', 'B.E', 'mumbai', '1617228861-boxes.jpg'),
(11, 'a', 'b', 'ab', '187ef4436122d1cc2f40dc2b92f0eba0', '1', 'B.TECH', 'manali', ''),
(12, 'me', 'you', 'you&me', '202cb962ac59075b964b07152d234b70', '0', 'MCA', 'pune', ''),
(13, 'Mehesh_', 'Patel', 'M_mahesh', '900150983cd24fb0d6963f7d28e17f72', '1', 'BCOM', 'dhule', ''),
(14, 'salman', 'khan', 'salman', '202cb962ac59075b964b07152d234b70', '1', 'MCOM', 'sikkim', ''),
(15, 'akshay', 'kumar', 'ak11', '202cb962ac59075b964b07152d234b70', '0', 'MCA', 'laddakh', ''),
(16, 'sunil', 'shetty', 's-shetty', '202cb962ac59075b964b07152d234b70', '0', 'M.E', 'nashik', ''),
(17, 'tiget', 'shroff', 'jakky', '202cb962ac59075b964b07152d234b70', '1', 'BSC', 'agra', ''),
(18, 'vijay', 'thalapathy', 'thalapathy', '202cb962ac59075b964b07152d234b70', '1', 'ITI', 'chennai', ''),
(19, 'allu', 'arjun', 'aa-ss', '202cb962ac59075b964b07152d234b70', '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'akola', '1617231749-mobile-1.png'),
(20, 'radha', 'bai', 'rbai', '202cb962ac59075b964b07152d234b70', '1', 'teacher', 'khamgav', '1617231366-mobile-1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
