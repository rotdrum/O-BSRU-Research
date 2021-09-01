-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2021 at 07:54 PM
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
-- Database: `research_bsru`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(4) NOT NULL,
  `iframe` text NOT NULL,
  `name_address` text NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `iframe`, `name_address`, `tel`, `email`) VALUES
(1, ' <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.772522009522!2d100.48810891483022!3d13.732217590360092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e298fe8dcd0d13%3A0x8166225c8081ce3a!2sBansomdejchaopraya%20Rajabhat%20University!5e0!3m2!1sen!2sth!4v1625903682686!5m2!1sen!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe> ', '1016 ซอยอิสรภาพ 15 แขวงหิรัญรูจี เขตธนบุรี กทม 10600', 'Tel (662) 473 7000 | Fax (662) 473 7000', 'ajpeanthip@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `research_id` int(11) DEFAULT NULL,
  `room` text DEFAULT NULL,
  `ex_date` text DEFAULT NULL,
  `ex_time` text DEFAULT NULL,
  `ex_status` text DEFAULT NULL,
  `teacher1` text DEFAULT NULL,
  `teacher2` text DEFAULT NULL,
  `teacher3` text DEFAULT NULL,
  `teacher_id` text DEFAULT NULL,
  `update_time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `research_id`, `room`, `ex_date`, `ex_time`, `ex_status`, `teacher1`, `teacher2`, `teacher3`, `teacher_id`, `update_time`) VALUES
(33, 1, '544', '10/07/2564', '23:24', '4', 'นายเกียรติคุณ เคลือนุตยางกูร', 'นายณัฐเกียรติ ขุนแก้ว', 'นายนทรี ศรีแสง', '5', '2021-07-09 22:23:55'),
(34, 2, NULL, NULL, NULL, '0', NULL, NULL, NULL, '1', NULL),
(35, 3, 'ทดสอบ 1234', '15/07/2564', '16:43', '7', 'นายเกียรติคุณ เคลือนุตยางกูร', 'นายนทรี ศรีแสง', 'นายณัฐเกียรติ ขุนแก้ว', '5', '2021-07-10 14:41:35'),
(36, 1, NULL, NULL, NULL, '0', NULL, NULL, NULL, '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_support`
--

CREATE TABLE `file_support` (
  `support_id` int(5) NOT NULL,
  `title` varchar(300) NOT NULL,
  `address_file` varchar(300) NOT NULL,
  `create_up` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_support`
--

INSERT INTO `file_support` (`support_id`, `title`, `address_file`, `create_up`) VALUES
(1, 'asdasdasdasdasd', 'รายการแก้ไข.pdf', 'Jul 10, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(6) NOT NULL,
  `title` text NOT NULL,
  `comment` text NOT NULL,
  `pic_file` text NOT NULL,
  `create_up` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `comment`, `pic_file`, `create_up`) VALUES
(1, 'TDPK-2403 แก้ไขหน้าเพิ่มแคมเปญสะสมแสตมป์ (Backend)', '<p style=\"box-sizing: inherit; margin-bottom: 1.6em; line-height: 1.5em; word-break: break-word;\">ล่าสุด วันนี้ (10 ก.ค.) <span style=\"box-sizing: inherit; word-break: break-all;\">ไบรท์ พิชญทัฬห์ จันทร์พุฒ ผู้ประกาศ<a href=\"https://www.sanook.com/news/\" title=\"ข่าว\" target=\"_blank\" class=\"keyword\" style=\"box-sizing: inherit; outline: 0px; touch-action: manipulation; word-break: break-all;\">ข่าว</a>ชื่อดัง</span> ได้เล่าข่าวดังกล่าวผ่านรายการเรื่องเล่าเสาร์อาทิตย์ โดยมีการอ่านโพสต์ของลูกที่เขียนถึงแม่ที่เสียชีวิตว่า \"แม่จ๋าหนูรักแม่มากๆ นะ หนูทำดีที่สุดแล้วใช่มั้ย...\"</p><p style=\"box-sizing: inherit; margin-bottom: 1.6em; line-height: 1.5em; word-break: break-word;\">ซึ่งเมื่อมาถึงตรงนี้ ไบรท์ พิชญทัฬห์ ถึงกับเสียงสั่น กลั้นสะอื้นกลางรายการ จนอ่านต่อไม่ไหว ทำให้ <span style=\"box-sizing: inherit; word-break: break-all;\">สรยุทธ สุทัศนะจินดา</span> ต้องอ่านโพสต์ดังกล่าวแทนว่า</p><p style=\"box-sizing: inherit; margin-bottom: 1.6em; line-height: 1.5em; word-break: break-word;\">\"..มันจุกจังเลย มันเหมือนจะขาดใจ มันงง มันคิดอะไรไม่ออกหนูพยายามหารถ หาทุกอย่างจนแม่ได้รถไปโรงพยาบาล หนูบอกให้แม่อดทน บอกให้แม่สู้ เราต้องรอดไปด้วยกัน หนูรู้ว่าแม่อดทนสุดๆๆ แล้ว แต่มันหนักเกินไปใช่มั้ย ตอนนี้แม่ไม่ต้องเหนื่อยแล้วนะ ไปอยู่กับพ่อเป็นนางฟ้าบนสวรรค์นะแม่ ยังไม่ทันได้กอด ยังไม่ทันได้หอม ก็จากไปแล้ว หนูรักแม่มากๆนะ<a href=\"https://www.sanook.com/horoscope/\" title=\"ดวง\" target=\"_blank\" class=\"keyword\" style=\"box-sizing: inherit; outline: 0px; touch-action: manipulation; word-break: break-all;\">ดวง</a>ใจของหนู 09/07/64 04.22\"</p>', 'images.png', 'Jul 10, 2021'),
(2, 'TDPK-2313 Fix URL burn-point give-point', '<p>sdsadsadsa</p>', 'Screen Shot 2564-07-09 at 15.31.08.png', 'Jul 10, 2021'),
(3, 'TDPK-2313 แก้ไข Path Name Transaction', '<p>fdsfds</p>', 'Screen Shot 2564-07-05 at 16.35.13.png', 'Jul 10, 2021'),
(4, '123123123', '<p>123123123</p>', 'images.png', 'Jul 10, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `personal_id` int(5) NOT NULL,
  `tname` varchar(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateofbirth` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `create_up` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`personal_id`, `tname`, `fname`, `lname`, `email`, `tel`, `username`, `password`, `dateofbirth`, `status`, `create_up`) VALUES
(1, 'ผศ.ดร', 'เกียรติคุณ', 'เคลือนุตยางกูร', 'drum.094094@gmail.com', '0123-123-1234', 'kkiatti', '$2y$10$eU7vEEwJNzJwAMksQIQctea87zDmfyMi7vY5S5/.N76r8/vqr79r.', '1998-06-12', 1, 'May 5, 2021'),
(3, 'นาย', 'นทรี', 'ศรีแสง', 'drum_094@hotmail.com', '086-933-7976', 'kk', '$2y$10$0kvQXlExsys3i95kYY7sYujpbGtwni.yYlvSnc/RrnzVNyca/Yc4S', '1998-06-12', 9, '=TODAY()'),
(4, 'นาย', 'เกียรติคุณ', 'dsasda', 'drum.094094@gmail.com', '086-933-7976', 'drumzioo', '$2y$10$JAJvJxgbB.0zgpdZ5XbN/.rZU07TgfXJ9Gt6JRPwowKTYgqXs9mF2', '1998-06-12', 1, 'Jun 28, 2021'),
(5, 'ผศ.ดร.', 'ณัฐเกียรติ', 'ขุนแก้ว', 'aof@hotmail.com', '012-345-6789', 'natthakiat.k', '$2y$10$i9DBVYxigSJ/nm7UP4b2Seui9oZ9TSsLh2MIY3EhdIQ0AVIr8r8Re', '1111-11-11', 1, 'Jul 3, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `research_id` int(6) NOT NULL,
  `name_th` varchar(400) NOT NULL,
  `name_eng` varchar(400) NOT NULL,
  `look` varchar(100) DEFAULT NULL,
  `types` varchar(100) NOT NULL,
  `term` varchar(5) NOT NULL,
  `year` varchar(10) NOT NULL,
  `personal_main` int(6) NOT NULL,
  `personal_sup` int(6) NOT NULL,
  `student_one` varchar(200) NOT NULL,
  `student_two` varchar(200) DEFAULT NULL,
  `abstract` varchar(1000) NOT NULL,
  `file1` varchar(200) DEFAULT NULL,
  `file2` varchar(200) DEFAULT NULL,
  `file3` varchar(200) DEFAULT NULL,
  `file4` varchar(200) DEFAULT NULL,
  `status1` int(1) NOT NULL,
  `status2` int(1) NOT NULL,
  `status3` int(1) NOT NULL,
  `status4` int(1) NOT NULL,
  `create_up` text NOT NULL,
  `update_up` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`research_id`, `name_th`, `name_eng`, `look`, `types`, `term`, `year`, `personal_main`, `personal_sup`, `student_one`, `student_two`, `abstract`, `file1`, `file2`, `file3`, `file4`, `status1`, `status2`, `status3`, `status4`, `create_up`, `update_up`) VALUES
(1, 'addsasad', 'Localhost', NULL, 'เว็บเทคโนโลยี', '2', '2562', 5, 3, 'นายซุปเปอร์ เท็น', '', 'fsdfdsf', 'educationDoc.pdf', NULL, NULL, NULL, 1, 0, 0, 0, 'Jul 11, 2021 - 23:46:07', 'Jul 11, 2021 - 23:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

CREATE TABLE `selection` (
  `selection_id` int(6) NOT NULL,
  `data_select` text NOT NULL,
  `type_select` int(1) NOT NULL,
  `create_up` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selection`
--

INSERT INTO `selection` (`selection_id`, `data_select`, `type_select`, `create_up`) VALUES
(1, 'โมบายแอพลิเคชัน', 1, 'Jun 30, 2021'),
(5, 'เว็บเทคโนโลยี', 1, 'Jun 30, 2021'),
(6, 'ไมโครคอนโทรลเลอร์', 1, 'Jun 30, 2021'),
(7, 'สื่อการเรียนการสอน CAI', 1, 'Jul 1, 2021'),
(8, 'ครุศาสตร์อุตสาหกรรม', 2, 'Jul 1, 2021'),
(10, 'คอมพิวเตอร์ศึกษา', 3, 'Jul 1, 2021'),
(11, 'วิดีเกมเพื่อสื่อการเรียนการสอน', 1, 'Jul 1, 2021'),
(13, 'วิทยาศาสตร์ประยุกต์', 2, 'Jul 1, 2021'),
(14, 'ช่างกลโรงงาน', 3, 'Jul 1, 2021'),
(15, 'อิเล็กทรอนิกส์และไฟฟ้ากำลัง', 3, 'Jul 1, 2021'),
(17, '413', 4, 'Jul 10, 2021'),
(18, '522', 4, 'Jul 10, 2021'),
(19, '542', 4, 'Jul 10, 2021'),
(20, '543', 4, 'Jul 10, 2021'),
(21, '544', 4, 'Jul 10, 2021'),
(22, '545', 4, 'Jul 10, 2021'),
(24, '411', 4, 'Jul 10, 2021'),
(25, 'asdasdasd', 5, 'Jul 10, 2021'),
(26, 'นาย', 5, 'Jul 10, 2021'),
(27, 'นางสาว', 5, 'Jul 10, 2021'),
(28, 'นาย', 5, 'Jul 10, 2021'),
(29, 'ดร.', 5, 'Jul 10, 2021'),
(30, 'ผศ.ดร.', 5, 'Jul 10, 2021'),
(31, 'อาจารย์', 5, 'Jul 10, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `selection_sup`
--

CREATE TABLE `selection_sup` (
  `selection_sup_id` int(4) NOT NULL,
  `selection_id` int(4) NOT NULL,
  `data_select` text NOT NULL,
  `create_up` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `class` varchar(20) DEFAULT NULL,
  `field` varchar(200) DEFAULT NULL,
  `faculty` varchar(200) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `student_card` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateofbirth` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `research_id` int(10) NOT NULL,
  `create_up` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `tname`, `fname`, `lname`, `class`, `field`, `faculty`, `email`, `tel`, `student_card`, `username`, `password`, `dateofbirth`, `status`, `research_id`, `create_up`) VALUES
(6, 'นาย', 'ซุปเปอร์', 'เท็น', NULL, '', '', 'natthakiat.k@gmail.com', '098-765-4321', '5902041620000', '5902041620000', '$2y$10$HChe0OmCXOlsGPIxXkiub.ohG1rLe75NWeks1YB58WYHaDj55nsQW', '1111-11-11', 1, 1, 'Jul 2, 2021'),
(7, 'นาย', 'ณัฐเกียรติ', 'ขุนแก้ว', NULL, '', '', 'drum_094@hotmail.com', '086-933-7976', '5902041620091', '5902041620091', '$2y$10$P20fYAvTz/9dr9M/Q6Xve.mxpw6c0EORFSVh7U32TZAM3bzfaWt7O', '1111-11-11', 1, 0, 'Jul 3, 2021'),
(8, 'นาง', 'เกียรติคุณ', 'เคลือนุตยางกูร', NULL, '', '', 'artemkpubz2@hotmail.com', '012-345-6789', '5902041620067', '5902041620067', '$2y$10$HMfg5g0ljd7dD7uhH7pfYObVjrIfWiHvpt0vZaTfAzksarSjpT6jK', '1111-11-11', 1, 0, 'Jul 3, 2021'),
(9, 'นางสาว', 'ณัฐริกา', 'เจริญ', NULL, '', '', 'aof@hotmail.com', '086-933-7976', '590204160113', '590204160113', '$2y$10$c22Wb5tZ10mZDcFdbu3o1uieR0hJn2ATb5na4HaSsc7O2IMjcYTjK', '1111-11-11', 9, 0, 'Jul 3, 2021'),
(10, 'นางสาว', 'ปัญญา', 'เทือกมูล', NULL, NULL, NULL, 's5902041620091@email.kmutnb.ac.th', '094-123-1231', '5902041620093', '5902041620093', '$2y$10$Wt484iGPYbYGEXFQU.9LYuTA5zF0m1MnpS9ylcjsKGvcAJ34zIarO', '1111-11-11', 1, 0, 'Jul 3, 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_support`
--
ALTER TABLE `file_support`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`research_id`);

--
-- Indexes for table `selection`
--
ALTER TABLE `selection`
  ADD PRIMARY KEY (`selection_id`);

--
-- Indexes for table `selection_sup`
--
ALTER TABLE `selection_sup`
  ADD PRIMARY KEY (`selection_sup_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
