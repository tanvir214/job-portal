-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 03:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `jobseeker_user_name` varchar(20) NOT NULL,
  `job_job_id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `coverlatter` mediumtext NOT NULL,
  `cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`jobseeker_user_name`, `job_job_id`, `fullname`, `email`, `coverlatter`, `cv`) VALUES
('aurnab', 10, 'aurnab', 'ar@mail.com', 'hjdrfij', '365-project-report.docx'),
('sabbir', 9, 'tees', 'hvh2@bj.com', 'vyuvv', 'report 411.docx'),
('sabbir', 11, 'jnin', 'u@k.com', 'hiuh', '365-project-report.docx');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(20) NOT NULL,
  `category_des` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`, `category_des`) VALUES
('Designs', 'Designs'),
('Development', 'Development'),
('Finance', 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phn` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`user_name`, `user_pass`, `fullname`, `address`, `phn`, `email`) VALUES
('atik', '123', 'Atiqur', 'Aftabnagar,Dhaka', '4596', 'atik@gmil.com'),
('tanvir', '123', 'tanvir', 'rampura,dhaka', '1576', 'ok@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `jobtitle` varchar(120) NOT NULL,
  `jobdes` mediumtext NOT NULL,
  `jobreq` mediumtext NOT NULL,
  `jobcity` varchar(30) NOT NULL,
  `jobcat` varchar(20) NOT NULL,
  `jobtype` varchar(50) NOT NULL,
  `employee_user_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `jobtitle`, `jobdes`, `jobreq`, `jobcity`, `jobcat`, `jobtype`, `employee_user_name`) VALUES
(9, 'IT Help Desk Technician', ' We are looking for a competent Help desk technician to provide fast and useful technical assistance on computer systems. You will answer queries on basic technical issues and offer advice to solve them.\r\n\r\nAn excellent Help desk technician must have good technical knowledge and be able to communicate effectively to understand the problem and explain its solution. They must also be customer-oriented and patient to deal with difficult customers.\r\n\r\nThe goal is to create value for clients that will help preserve the company’s reputation and business.  ', 'Proven experience as a help desk technician or other customer support role\r\nTech savvy with working knowledge of office automation products, databases and remote control\r\nGood understanding of computer systems, mobile devices and other tech products\r\nAbility to diagnose and resolve basic technical issues\r\nProficiency in English\r\nExcellent communication skills\r\nCustomer-oriented and cool-tempered\r\nBSc/BA in IT, Computer Science or relevant field', 'Dhaka', 'Development', 'Full time', 'tanvir'),
(10, 'Software Security Engineer', ' We are looking for a skilled Security Engineer to analyze software designs and implementations from a security perspective, and identify and resolve security issues. You will include the appropriate security analysis, defences and countermeasures at each phase of the software development lifecycle, to result in robust and reliable software. ', 'Proven work experience as a software security engineer\r\nDetailed technical knowledge of techniques, standards and state-of-the art capabilities for authentication and authorization, applied cryptography, security vulnerabilities and remediation\r\nSoftware development experience in one of the following core languages: Ruby on Rails, Java, Javascript and .NET\r\nAdequate knowledge of web related technologies (Web applications, Web Services and Service Oriented Architectures) and of network/web related protocols\r\nInterest in all aspects of security research and development\r\nBS degree in Computer Science or related field', 'Dhaka', 'Development', 'Full time', 'atik'),
(11, 'Mobile Developer', '   We are looking for a qualified Mobile developer to join our Engineering team. You will be working with our engineers to develop and maintain high quality mobile applications.\r\n\r\nIf you’re passionate about mobile platforms and translating code into user-friendly apps, we would like to meet you. As a Mobile developer, you’ll collaborate with internal teams to develop functional mobile applications, while working in a fast-paced environment.\r\n\r\nUltimately, you should be able to design and build the next generation of our mobile applications.   ', 'Proven work experience as a Mobile developer\r\nDemonstrable portfolio of released applications on the App store or the Android market\r\nIn-depth knowledge of at least one programming language like Swift and Java\r\nExperience with third-party libraries and APIs\r\nFamiliarity with OOP design principles\r\nExcellent analytical skills with a good problem-solving attitude\r\nAbility to perform in a team environment\r\nBSc degree in Computer Science or relevant field', 'Rajshahi', 'Development', 'Full time', 'tanvir'),
(12, 'DevOps Engineer', 'We are looking for a DevOps Engineer to help us build functional systems that improve customer experience.\r\n\r\nDevOps Engineer responsibilities include deploying product updates, identifying production issues and implementing integrations that meet customer needs. If you have a solid background in software engineering and are familiar with Ruby or Python, we’d like to meet you.\r\n\r\nUltimately, you will execute and automate operational processes fast, accurately and securely.', 'Implement integrations requested by customers\r\nDeploy updates and fixes\r\nProvide Level 2 technical support\r\nBuild tools to reduce occurrences of errors and improve customer experience\r\nDevelop software to integrate with internal back-end systems\r\nPerform root cause analysis for production errors\r\nInvestigate and resolve technical issues\r\nDevelop scripts to automate visualization\r\nDesign procedures for system troubleshooting and maintenance', 'Dhaka', 'Development', 'Full time', 'tanvir');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phn` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`user_name`, `user_pass`, `fullname`, `address`, `phn`, `email`) VALUES
('aurnab', '123', 'aurnab', 'Dhaka', '1969', 'ar@mail.com'),
('sabbir', '1234', 'Sabbir Khan', 'Dhaka', '0123654987', 'sk@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `city` varchar(30) NOT NULL,
  `country` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`city`, `country`) VALUES
('', ''),
('Bogra', ''),
('Dhaka', 'Bangladesh'),
('Naogaon', ''),
('Rajshahi', 'Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`jobseeker_user_name`,`job_job_id`),
  ADD KEY `application_job_fk` (`job_job_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `job_category_fk` (`jobcat`),
  ADD KEY `job_employee_fk` (`employee_user_name`),
  ADD KEY `job_location_fk` (`jobcity`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`city`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_job_fk` FOREIGN KEY (`job_job_id`) REFERENCES `job` (`job_id`),
  ADD CONSTRAINT `application_jobseeker_fk` FOREIGN KEY (`jobseeker_user_name`) REFERENCES `jobseeker` (`user_name`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_category_fk` FOREIGN KEY (`jobcat`) REFERENCES `category` (`category_name`),
  ADD CONSTRAINT `job_employee_fk` FOREIGN KEY (`employee_user_name`) REFERENCES `employee` (`user_name`),
  ADD CONSTRAINT `job_location_fk` FOREIGN KEY (`jobcity`) REFERENCES `location` (`city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
