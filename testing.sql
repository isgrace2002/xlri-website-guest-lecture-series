-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 08:37 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL,
  `batch` longtext NOT NULL,
  `title` longtext NOT NULL,
  `intro` longtext NOT NULL,
  `subhead` longtext DEFAULT NULL,
  `points` longtext DEFAULT NULL,
  `linkedin` varchar(512) DEFAULT NULL,
  `youtube` varchar(512) DEFAULT NULL,
  `image` varchar(512) DEFAULT NULL,
  `gname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `batch`, `title`, `intro`, `subhead`, `points`, `linkedin`, `youtube`, `image`, `gname`) VALUES
(1, 'Batch 2022-2023', 'Creating Successful Startups', 'Dr Dhruv Nath is an Angel Investor and a Director with Lead Angels Network. As part of this journey, he has invested in twelve start-ups, and has mentored over a hundred others.\r\nEarlier he was a Professor at MDI, Gurgaon, and a Senior Vice President at NIIT Ltd.\r\nHe has been a consultant to the Top Management for companies such as Glaxo, Gillette, Nestle and Air India etc amongst many others. He has also been a consultant to the Prime Minister of Namibia and the Chief Minister of Delhi. He has written four books so far, the latest being Funding Your Start-up: And Other Nightmares.', 'Key Learnings', 'Analysing and Evaluating start-ups using the PERSISTENT framework\r\nAn investor’s point of view on start-ups and the basics of angel Investing and Venture Capital investing\r\nConcepts of Risk and Entry Barriers to creating successful start-ups', 'https://www.linkedin.com/in/dhruvnathprof/', 'https://www.youtube.com/watch?v=5KTuoOUGd7U', 'https://xlri.ac.in/images/recruiters/dr-dhruv-nath.jpg', 'Dr. Dhruv Nath'),
(2, 'Batch 2021-2022', 'Test Title', 'Enter Guest IntroductionEnter Guest IntroductionEnter Guest IntroductionEnter Guest IntroductionEnter Guest Introduction Enter Guest IntroductionEnter Guest IntroductionEnter Guest Introduction', 'Hi\r\nHello', '<ul><li>Hi</li><li>Hello</li></ul>', 'https://www.linkedin.com/in/aswathdamodaran/', 'http://localhost/Internship/create.php', 'https://xlri.ac.in/images/recruiters/dr-dhruv-nath.jpg', 'Dr. Test'),
(3, 'Batch 2021-2022', 'Test Title', 'Enter Guest IntroductionEnter Guest IntroductionEnter Guest IntroductionEnter Guest IntroductionEnter Guest Introduction Enter Guest IntroductionEnter Guest IntroductionEnter Guest Introduction', 'Key Points', '<ul><li>a</li><li>b</li><li>c</li></ul>', 'https://www.linkedin.com/in/aswathdamodaran/', 'http://localhost/Internship/create.php', 'https://xlri.ac.in/images/recruiters/dr-dhruv-nath.jpg', 'Dr. Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
