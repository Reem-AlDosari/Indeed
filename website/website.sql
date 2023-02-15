-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 10:37 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `company_name` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `company_scope` text NOT NULL,
  `description_of_company` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`company_name`, `email`, `password`, `phone_number`, `Address`, `company_scope`, `description_of_company`, `mission`, `vision`, `id`) VALUES
('Jisr', 'Jisr@gmail.com', '098', 55555555, 'Riyadh', 'Jisr is the easiest HR Management software in Saudi Arabia, built to be locally compliant with Labour Law, seamlessly efficient, and easy-to-use.| Riyadh', 'Jisr is the easiest HR Management software in Saudi Arabia, built to be locally compliant with Labour Law, seamlessly efficient, and easy-to-use.| Riyadh', 'Jisr is the easiest HR Management software in Saudi Arabia, built to be locally compliant with Labour Law, seamlessly efficient, and easy-to-use.| Riyadh', 'Jisr is the easiest HR Management software in Saudi Arabia, built to be locally compliant with Labour Law, seamlessly efficient, and easy-to-use.| Riyadh', 4),
('kacst', 'kacst@gmail.com', '098', 555055505, '', 'We believe that scientific research and technological developments are key components to further economic growth and national development in the Kingdom of Saudi Arabia', 'Supporting the National Research, Development and Innovation Strategy\r\n', 'We invest in scientific research and technological advancements to serve national development in the Kingdom', 'To be a pioneer organization in science and technology by supporting innovation and fostering scientific research to promote the industrial development in the Kingdom of Saudi Arabia.', 5),
('SDAIA', 'sdaia@gmail.com', 'sdaia', 505050505, 'Riyadh', 'living in a time of scientific innovation, unprecedented technology, and unlimited growth prospects. These new technologies such as Artificial Intelligence and the Internet of Things, if used optimally, can spare the world from many disadvantages and can bring to the world enormous benefits.', 'SDAIA’s transformation strategy was approved in 2019. The strategy gives SDAIA a core mandate to drive and own the national data and AI agenda to help achieve Vision 2030’s goals and our Kingdom’s highest potential.', 'Unlock the value of data as a national asset to realize Vision 2030’s aspirations by setting the national data and AI strategy and overseeing its execution through harmonized data policies.', 'Positioning the Kingdom as a global leader in the elite league of data-driven economies.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(100) NOT NULL,
  `title` varchar(30) NOT NULL,
  `major` varchar(30) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `location` varchar(25) NOT NULL,
  `full time/part time` varchar(10) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `salary` double NOT NULL,
  `emoloyer_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `major`, `position`, `description`, `skills`, `qualifications`, `location`, `full time/part time`, `gender`, `salary`, `emoloyer_id`) VALUES
(5, 'Comupter Hardware Technician.', 'IT', 'Head of Comupter Hardware Tech', 'Jisr is the easiest HR Management software in Saud', 'Hardware Technician.', 'Bachelor\'s ', 'Riyadh', 'Full', 1, 8000, 4),
(252, 'kacst', 'Swe', 'Head of swe', 'analyist', 'analysis', 'computer skills ', 'riyadh', 'full', 0, 12000, 4),
(254, 'Learning and Development ', 'HR', 'team leader', 'responsible of leadership and the making of learning and development activates.', 'Fluent English', 'Saudi nationality, Experience of at least 2 years', 'Riyadh', 'full', 0, 13000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `id` int(100) NOT NULL,
  `Id_job_seeker` int(100) NOT NULL,
  `id_job` int(100) NOT NULL,
  `decision` varchar(11) NOT NULL,
  `suggested_interview_1` date DEFAULT NULL,
  `suggested_interview_2` date DEFAULT NULL,
  `suggested_interview_3` date DEFAULT NULL,
  `date_selected` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`id`, `Id_job_seeker`, `id_job`, `decision`, `suggested_interview_1`, `suggested_interview_2`, `suggested_interview_3`, `date_selected`) VALUES
(32, 7, 252, 'accepted', '2021-04-01', '2021-04-02', '2021-04-03', '0000-00-00'),
(34, 7, 5, 'accepted', '2021-04-15', '2021-04-02', '2021-04-10', '0000-00-00'),
(36, 1, 252, 'rejected', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(38, 8, 254, 'accepted', '2021-04-01', '2021-04-02', '2021-04-03', '2021-04-02'),
(39, 8, 252, 'accepted', '2021-04-10', '2021-04-23', '2021-04-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `current_job` varchar(30) NOT NULL,
  `major` varchar(40) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `skills` varchar(40) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`first_name`, `last_name`, `email`, `password`, `birth_date`, `gender`, `nationality`, `city`, `phone_number`, `current_job`, `major`, `experience`, `skills`, `id`) VALUES
('reem', 'aldosari', 'reem@gmail.com', '123', '2021-04-01', 1, 'Saudi Arabia', 'erer', 555555555, 'nothing', 'bac', 'good', 'computer', 1),
('Lujain', 'Abdul', 'lujain@gmail.com', '098', '2021-04-15', 0, '', '', 555444432, 'none', 'Swe', '', '', 7),
('Sara', 'Ahmed', 'sara@gmail.com', 'sara', '2021-04-30', 0, 'algerian', 'Riyadh', 505050505, 'unemployed', 'HR', 'experience of 4 years in learning and development ', 'basic computer skills, 3 languages Arabi', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emoloyer_id` (`emoloyer_id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Id_job_seeker_2` (`Id_job_seeker`,`id_job`),
  ADD KEY `Id_job_seeker` (`Id_job_seeker`),
  ADD KEY `id_job` (`id_job`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`emoloyer_id`) REFERENCES `employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_application`
--
ALTER TABLE `job_application`
  ADD CONSTRAINT `job_application_ibfk_1` FOREIGN KEY (`Id_job_seeker`) REFERENCES `job_seeker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_application_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
