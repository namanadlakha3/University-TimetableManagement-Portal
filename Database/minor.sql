-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 08:15 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `Name` varchar(60) COLLATE utf8_bin NOT NULL,
  `Username` varchar(60) COLLATE utf8_bin NOT NULL,
  `Password` varchar(60) COLLATE utf8_bin NOT NULL,
  `Token` varchar(20) COLLATE utf8_bin NOT NULL,
  `Designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `Contact` varchar(10) COLLATE utf8_bin NOT NULL,
  `Email` varchar(80) COLLATE utf8_bin NOT NULL,
  `Img` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `Subject1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Subject2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `c1` int(10) DEFAULT NULL,
  `c2` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `flag` int(11) NOT NULL,
  `counter` int(10) DEFAULT NULL,
  `counter2` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `Name`, `Username`, `Password`, `Token`, `Designation`, `Contact`, `Email`, `Img`, `Subject1`, `Subject2`, `c1`, `c2`, `status`, `flag`, `counter`, `counter2`) VALUES
(1, 'Avita', 'avita', 'katal', '32656794', 'Assoc. Professor', '7404324414', 'avita@gmail.com', 'images (1).png', 'Mathematics-1', 'Database-Management-Systems', 0, 0, 1, 1, 30, 30),
(3, 'Sandeep Pratap Singh', 'sandeep', 'pratap', '42544674', 'Assoc. Professor', '9468317039', 'sandeep@gmail.com', 'images (1).png', 'Mathematics-1', 'Database-Management-Systems', 4, 4, 0, 1, 30, 30),
(4, 'Saurabh Shanu', 'saurabh', 'shanu', '67632545', 'Professor', '7404324414', 'saurabh@gmail.com', 'images (1).png', 'Basic-Electronics', 'Programming-and-Data-Structures', 0, 0, 1, 1, 30, 30),
(5, 'Shamik Tiwari', 'shamik', 'tiwari', '92478763', 'Professor', '9468317039', 'fgh@gmail.com', 'images (1).png', 'discrete_mathematics', 'operating system', 4, 4, 0, 1, 30, 30),
(6, 'Nilima Salankar', 'nilima', 'salankar', '69627393', 'Assoc. Professor', '8756297868', 'sshriya713@gmail.com', 'business+costume+male+man+office+user+icon-1320196264882354682.p', 'operating system', 'computer_system_architecture', 4, 4, 0, 1, 30, 30),
(7, 'GL Prakash', 'gl', 'prakash', '92478763', 'Professor', '7404324414', 'fgh@gmail.com', 'business+costume+male+man+office+user+icon-1320196264882354682.p', 'computer_system_architecture', 'design_and_analysis_of_algorithm', 4, 4, 0, 1, 30, 30),
(8, 'Neha', 'neha', 'agrawal', '69627393', 'Assoc. Professor', '9468317039', 'sshriya713@gmail.com', 'business+costume+male+man+office+user+icon-1320196264882354682.p', 'design_and_analysis_of_algorithm', 'storage_technology_foundation', 4, 4, 0, 1, 30, 30),
(9, 'Neeraj Kumar', 'neeraj', 'kumar', '74755612', 'Assoc. Professor', '8756297868', '500060879@stu.upes.ac.in', 'business+costume+male+man+office+user+icon-1320196264882354682.p', 'storage_technology_foundation', 'artificial_intelligence', 4, 4, 0, 1, 30, 30),
(10, 'Pravin Dagdee', 'pravin', 'dagdee', '49539488', 'Professor', '8756297868', 'tonystark4214@gmail.com', 'business+costume+male+man+office+user+icon-1320196264882354682.p', 'artificial_intelligence', 'computer_graphics', 4, 4, 0, 1, 30, 30),
(11, 'Anushree Sah', 'anushree', 'sah', '19644721', 'Assoc. Professor', '8756297868', 'a@gmail.com', 'business+costume+male+man+office+user+icon-1320196264882354682.p', 'design_and_analysis_of_algorithm', 'storage_technology_foundation', 4, 4, 0, 1, 30, 30),
(12, 'Anshu Paliwal', 'anshu', 'paliwal', '69627393', 'Assoc. Professor', '9468317039', 'sshriya713@gmail.com', '', 'storage_technology_foundation', 'computer_graphics', 4, 4, 0, 1, 30, 30),
(13, 'Manish Prateek', 'manish', 'prateek', '83393174', 'Professor', '7404324414', 'divyaratra1999@gmail.com', '', 'xml', 'cloud_deployment_model', 4, 4, 0, 1, 30, 30),
(14, 'Adesh Kumar', 'adesh', 'kumar', '78856124', 'Assoc. Professor', '9846281670', 'adesh@gmail.com', '', 'cloud_deployment_model', 'Microprocessors', 4, 4, 0, 1, 29, 30),
(15, 'Silky Goel', 'silky', 'goel', '51458886', 'Assoc. Professor', '9846281670', 'silky@gmail.com', '', 'xml', 'cryptography_and_network_security', 4, 4, 0, 1, 30, 30),
(16, 'Rajiv Tiwari', 'rajiv', 'tiwari', '59655572', 'Professor', '9468317039', 'rajiv@gmail.com', '', 'storage_technology_foundation', 'cloud_deployment_model', 4, 4, 0, 1, 30, 30),
(17, 'Amar Shukla', 'amar', 'shukla', '31349864', 'Assoc. Professor', '8756297868', 'amar@gmail.com', '', 'Physics', 'Chemistry', 4, 4, 0, 1, 30, 30),
(18, 'Ravindra Singh', 'ravindra', 'singh', '53564977', 'Assoc. Professor', '8756297868', 'r@gmail.com', '', 'Programming-and-Data-Structures', 'Mathematics-1', 4, 4, 0, 1, 30, 30),
(19, 'Faculy', 'faculty', '123', '35252416', 'Professor', '987256302', 'faculty@example.com', '', 'Physics', '', 4, 0, 0, 1, 30, NULL),
(20, 'try', 'try', '123', '11185817', 'Professor', '989573282', 'try@gmail.com', '', 'Chemistry', 'Mathematics-1', 4, 4, 0, 1, 30, NULL),
(21, 'Faculty1', 'faculty1', '123', '68454949', 'Professor', '9876543210', 'faculty@gmail.com', '73048.jpg', 'Database-Management-Systems', '', 0, 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `img` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`img`) VALUES
('2 (2).jpg'),
('uploads/2 (2).jpg'),
('uploads/1.png'),
('uploads/1.png'),
('uploads/Screenshot (9).png'),
('uploads/Screenshot (9).png'),
('uploads/Screenshot (9).png'),
('uploads/Screenshot (9).png'),
('Screenshot (9).png'),
('Screenshot (7).png'),
('Screenshot (7).png'),
('Screenshot (7).png'),
('Screenshot (13).png'),
('Screenshot (13).png'),
('25_tomb_raider.jpg'),
('583061.jpg'),
('402959183-half-life-wallpapers.jpg'),
('111da44b1184d2fb273262c990cb6d13--gamer-quotes-girl-gamer.jpg'),
('25_tomb_raider.jpg'),
('62-539839.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Sap` int(11) NOT NULL,
  `FirstName` varchar(50) COLLATE utf8_bin NOT NULL,
  `LastName` varchar(50) COLLATE utf8_bin NOT NULL,
  `Rollno` int(11) NOT NULL,
  `Branch` varchar(50) COLLATE utf8_bin NOT NULL,
  `Year` int(11) NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `Phoneno` bigint(10) NOT NULL,
  `Image` varchar(200) COLLATE utf8_bin NOT NULL,
  `Password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Sap`, `FirstName`, `LastName`, `Rollno`, `Branch`, `Year`, `Email`, `Phoneno`, `Image`, `Password`) VALUES
(500060696, 'Avani', 'Jindal', 37, 'GG', 2, 'avani@gmail.com', 9468316037, '', '555'),
(500060879, 'Divya', 'Ratra', 51, 'CCVT', 3, 'div@gmail.com', 7404324414, '', '123'),
(500061037, 'Janhvi', 'Joshi', 66, 'CCVT', 4, 'janhvi@gmail.com', 9468316037, '', '78090'),
(500061140, 'Ridhima', 'Khurana', 123, 'GG', 1, 'rid@gmail.com', 7404324414, '', '123'),
(500061639, 'Naman', 'Adlakha', 92, 'ccvt', 3, 'n@gmail.com', 9468317879, '', 'naaan');

-- --------------------------------------------------------

--
-- Table structure for table `student_timetable`
--

CREATE TABLE `student_timetable` (
  `sap` varchar(15) NOT NULL,
  `tid` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_timetable`
--

INSERT INTO `student_timetable` (`sap`, `tid`, `day`, `time`, `room`, `subject`) VALUES
('500060879', 'nilima', 'monday', '9:30', 9003, 'computer_system_architecture'),
('500060879', 'nilima', 'tuesday', '11:30', 9003, 'computer_system_architecture'),
('500060879', 'nilima', 'thursday', '11:30', 3105, 'computer_system_architecture'),
('500060879', 'nilima', 'friday', '11:30', 4003, 'computer_system_architecture'),
('500060879', 'pravin', 'monday', '9:30', 1102, 'artificial_intelligence'),
('500060879', 'pravin', 'tuesday', '12:30', 4001, 'artificial_intelligence'),
('500060879', 'pravin', 'thursday', '11:30', 1102, 'artificial_intelligence'),
('500060879', 'pravin', 'friday', '9:30', 4001, 'artificial_intelligence'),
('500060879', 'pravin', 'monday', '10:30', 1102, 'computer_graphics'),
('500060879', 'pravin', 'wednesday', '9:30', 3105, 'computer_graphics'),
('500060879', 'pravin', 'thursday', '9:30', 1102, 'computer_graphics'),
('500060879', 'pravin', 'friday', '11:30', 1002, 'computer_graphics'),
('500060879', 'adesh', 'monday', '9:30', 1002, 'cloud_deployment_model'),
('500060879', 'adesh', 'wednesday', '10:30', 3105, 'cloud_deployment_model'),
('500060879', 'adesh', 'tuesday', '10:30', 10006, 'cloud_deployment_model'),
('500060879', 'adesh', 'thursday', '9:30', 4003, 'cloud_deployment_model');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject` varchar(100) COLLATE utf8_bin NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject`, `year`) VALUES
('Mathematics1', 1),
('discrete_mathematics', 2),
('operating system', 2),
('computer_system_architecture', 3),
('design_and_analysis_of_algorithm', 2),
('storage_technology_foundation', 2),
('artificial_intelligence', 3),
('computer_graphics', 3),
('xml', 3),
('cloud_deployment_model', 3),
('cryptography_and_network_security', 4),
('Basic-Electronics', 1),
('Programming-and-Data-Structures', 1),
('Physics', 1),
('Chemistry', 1),
('Database-Management-Systems', 2),
('Microprocessors', 4);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `tid` varchar(50) COLLATE utf8_bin NOT NULL,
  `room` varchar(8) COLLATE utf8_bin NOT NULL,
  `subject` varchar(64) COLLATE utf8_bin NOT NULL,
  `day` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` varchar(20) COLLATE utf8_bin NOT NULL,
  `flag` varchar(2) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`tid`, `room`, `subject`, `day`, `time`, `flag`) VALUES
('saurabh', '4003', 'Basic-Electronics', 'monday', '9:30', '0'),
('saurabh', '4003', 'Basic-Electronics', 'tuesday', '9:30', '0'),
('saurabh', '3105', 'Basic-Electronics', 'wednesday', '11:30', '0'),
('saurabh', '4003', 'Basic-Electronics', 'thursday', '12:30', '0'),
('saurabh', '1002', 'Programming-and-Data-Structures', 'wednesday', '10:30', '0'),
('saurabh', '3105', 'Programming-and-Data-Structures', 'friday', '11:30', '0'),
('saurabh', '1102', 'Programming-and-Data-Structures', 'monday', '2:30', '0'),
('saurabh', '1002', 'Programming-and-Data-Structures', 'thursday', '9:30', '0'),
('adesh', '1002', 'cloud_deployment_model', 'monday', '9:30', '0'),
('adesh', '9003', 'Microprocessors', 'wednesday', '12:30', '0'),
('adesh', '5002', 'Microprocessors', 'monday', '10:30', '0'),
('adesh', '3105', 'Microprocessors', 'monday', '2:30', '0'),
('adesh', '3105', 'cloud_deployment_model', 'wednesday', '10:30', '0'),
('adesh', '10006', 'cloud_deployment_model', 'tuesday', '10:30', '0'),
('adesh', '3005', 'Microprocessors', 'wednesday', '9:30', '0'),
('adesh', '4003', 'cloud_deployment_model', 'thursday', '9:30', '0'),
('amar', '4003', 'Chemistry', 'monday', '10:30', '0'),
('amar', '3105', 'Physics', 'monday', '12:30', '0'),
('amar', '3105', 'Physics', 'tuesday', '9:30', '0'),
('amar', '1002', 'Chemistry', 'tuesday', '10:30', '0'),
('amar', '4003', 'Physics', 'wednesday', '1:30', '0'),
('amar', '1002', 'Chemistry', 'wednesday', '12:30', '0'),
('amar', '1002', 'Physics', 'thursday', '3:30', '0'),
('amar', '1002', 'Chemistry', 'friday', '10:30', '0'),
('sandeep', '3105', 'Mathematics-1', 'monday', '9:30', '0'),
('sandeep', '9003', 'Database-Management-Systems', 'monday', '10:30', '0'),
('sandeep', '4003', 'Mathematics-1', 'tuesday', '4:30', '0'),
('sandeep', '1002', 'Mathematics-1', 'wednesday', '11:30', '0'),
('sandeep', '9003', 'Mathematics-1', 'thursday', '9:30', '0'),
('sandeep', '1102', 'Database-Management-Systems', 'friday', '9:30', '0'),
('sandeep', '1002', 'Database-Management-Systems', 'tuesday', '3:30', '0'),
('sandeep', '9003', 'Database-Management-Systems', 'wednesday', '9:30', '0'),
('neha', '1003', 'design_and_analysis_of_algorithm', 'monday', '11:30', '0'),
('neha', '1002', 'design_and_analysis_of_algorithm', 'monday', '12:30', '0'),
('neha', '5003', 'design_and_analysis_of_algorithm', 'tuesday', '9:30', '0'),
('neha', '1102', 'storage_technology_foundation', 'tuesday', '10:30', '0'),
('neha', '3105', 'storage_technology_foundation', 'wednesday', '3:30', '0'),
('neha', '3105', 'storage_technology_foundation', 'thursday', '1:30', '0'),
('neha', '9003', 'storage_technology_foundation', 'thursday', '10:30', '0'),
('neha', '4003', 'design_and_analysis_of_algorithm', 'friday', '10:30', '0'),
('shamik', '3104', 'discrete_mathematics', 'monday', '12:30', '0'),
('shamik', '4103', 'discrete_mathematics', 'tuesday', '9:30', '0'),
('shamik', '1102', 'discrete_mathematics', 'wednesday', '9:30', '0'),
('shamik', '3105', 'operating', 'thursday', '9:30', '0'),
('shamik', '1002', 'operating', 'friday', '9:30', '0'),
('shamik', '3105', 'operating', 'tuesday', '11:30', '0'),
('shamik', '1102', 'operating', 'wednesday', '11:30', '0'),
('nilima', '1002', 'operating', 'monday', '2:30', '0'),
('nilima', '9003', 'computer_system_architecture', 'monday', '9:30', '0'),
('nilima', '3105', 'operating', 'tuesday', '10:30', '0'),
('nilima', '9003', 'computer_system_architecture', 'tuesday', '11:30', '0'),
('nilima', '3105', 'computer_system_architecture', 'thursday', '11:30', '0'),
('nilima', '4003', 'computer_system_architecture', 'friday', '11:30', '0'),
('nilima', '9003', 'operating', 'thursday', '2:30', '0'),
('nilima', '4003', 'operating', 'friday', '1:30', '0'),
('pravin', '1102', 'artificial_intelligence', 'monday', '9:30', '0'),
('pravin', '1102', 'computer_graphics', 'monday', '10:30', '0'),
('pravin', '4001', 'artificial_intelligence', 'tuesday', '12:30', '0'),
('pravin', '3105', 'computer_graphics', 'wednesday', '9:30', '0'),
('pravin', '1102', 'computer_graphics', 'thursday', '9:30', '0'),
('pravin', '1002', 'computer_graphics', 'friday', '11:30', '0'),
('pravin', '1102', 'artificial_intelligence', 'thursday', '11:30', '0'),
('pravin', '4001', 'artificial_intelligence', 'friday', '9:30', '0'),
('manish', '9003', 'xml', 'tuesday', '1:30', '0'),
('manish', '3105', 'xml', 'thursday', '12:30', '0'),
('manish', '4003', 'xml', 'wednesday', '4:30', '0'),
('manish', '3105', 'xml', 'monday', '3:30', '0'),
('manish', '4003', 'cloud_deployment_model', 'wednesday', '3:30', '0'),
('manish', '9003', 'cloud_deployment_model', 'thursday', '11:30', '0'),
('manish', '9003', 'cloud_deployment_model', 'friday', '2:30', '0'),
('manish', '4001', 'cloud_deployment_model', 'monday', '12:30', '0'),
('rajiv', '9102', 'storage_technology_foundation', 'monday', '11:30', '0'),
('rajiv', '9102', 'storage_technology_foundation', 'tuesday', '9:30', '0'),
('rajiv', '3105', 'storage_technology_foundation', 'wednesday', '12:30', '0'),
('faculty1', '10104', 'Database-Management-Systems', 'monday', '9:30', '0'),
('faculty1', '10104', 'Database-Management-Systems', 'wednesday', '9:30', '0'),
('faculty1', '2003', 'Database-Management-Systems', 'friday', '9:30', '0'),
('faculty1', '100201', 'Database-Management-Systems', 'tuesday', '9:30', '0'),
('faculty1', '10103', 'Database-Management-Systems', 'thursday', '9:30', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Sap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
