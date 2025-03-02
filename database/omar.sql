-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 02:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omar`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `all_students`
--

CREATE TABLE `all_students` (
  `id` int(11) NOT NULL,
  `assno` varchar(50) NOT NULL,
  `admno` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stream` enum('7R','7B','8B','8R','9B','9R') NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_students`
--

INSERT INTO `all_students` (`id`, `assno`, `admno`, `name`, `stream`, `gender`) VALUES
(1, '', 'BOWA/17/12/2024', 'ABDALLAH HAMIS MASUD', '9B', 'Male'),
(2, '', 'BOWA/18/12/2024', 'ABDALLAH JUMA CHANGU', '9B', 'Male'),
(3, '', 'BOWA/19/12/2024', 'AHMED SAID OMAR', '9B', 'Male'),
(4, '', '', 'ALI MBWANA YUSUF', '9B', 'Male'),
(5, '', '', 'AYUB KHAMIS LIBONDO', '9B', 'Male'),
(6, '', '', 'CHRISPUS MZENGE', '9B', 'Male'),
(7, '', '', 'FAUZI ABDUL', '9B', 'Male'),
(8, '', '', 'HAKIKA ALI SIGOMBA', '9B', 'Male'),
(9, '', '', 'HAMADI KASSIM LUNGO', '9B', 'Male'),
(10, '', '', 'HAMISI ABDALLAH SHEBA', '9B', 'Male'),
(11, '', '', 'HASSAN IDD MWIRU', '9B', 'Male'),
(12, '', '', 'IBRAHIM ABUBAKA OMAR', '9B', 'Male'),
(13, '', '', 'IDDI ABDALLAH B.', '9B', 'Male'),
(14, '', '', 'ISMAIL CHANGU', '9B', 'Male'),
(15, '', '', 'ISSA ALI CHAPA', '9B', 'Male'),
(16, '', '', 'JUMA ALI VISETI', '9B', 'Male'),
(17, '', '', 'JUMA MOHAMED MBETO', '9B', 'Male'),
(18, '', '', 'JUMA MWINYIKOMBO', '9B', 'Male'),
(19, '', '', 'JUMA OMAR MAZIMA', '9B', 'Male'),
(20, '', '', 'JUMA SAID PANDE', '9B', 'Male'),
(21, '', '', 'JUMAPILI MSHINDO', '9B', 'Male'),
(22, '', '', 'MWBWANA ABDALLAH N', '9B', 'Male'),
(23, '', '', 'MWIJAKA RASHID', '9B', 'Male'),
(24, '', '', 'NASSIR MOHAMED', '9B', 'Male'),
(25, '', '', 'NASSORO MOHAMMED', '9B', 'Male'),
(26, '', '', 'OMAR ALI MWAKUSANYA', '9B', 'Male'),
(27, '', '', 'RAMA HAMISI M', '9B', 'Male'),
(28, '', '', 'SAID JUMA DARI', '9B', 'Male'),
(29, '', '', 'SAID JUMA GODZA', '9B', 'Male'),
(30, '', '', 'SAID JUMA MWAHANJE', '9B', 'Male'),
(31, '', '', 'SAID OMAR BADI', '9B', 'Male'),
(32, '', '', 'SAID OMAR DUGA', '9B', 'Male'),
(33, '', '', 'STEVEN ONYANGO', '9B', 'Male'),
(34, '', '', 'SULEIMAN JUMA', '9B', 'Male'),
(35, '', '', 'SWALE JUMA RAAPHU', '9B', 'Male'),
(36, '', '', 'SWALE SAID SHIBE', '9B', 'Male'),
(37, '', '', 'BINTI ALI MWANDARO', '9B', 'Female'),
(38, '', '', 'BINTI MWACHIRIMIRA', '9B', 'Female'),
(39, '', '', 'FATUMA ADAM MWACHINDIRI', '9B', 'Female'),
(40, '', '', 'FATUMA GANZALA', '9B', 'Female'),
(41, '', '', 'FATUMA RASHID CHANO', '9B', 'Female'),
(42, '', '', 'FATUMA S. MWACHIMWAGA', '9B', 'Female'),
(43, '', '', 'FATUMA SHABANI', '9B', 'Female'),
(44, '', '', 'KHADIJA NASSIR CHOYO', '9B', 'Female'),
(45, '', '', 'LAYALI SAID MPAJI', '9B', 'Female'),
(46, '', '', 'MARIAM KASSIM ZITO', '9B', 'Female'),
(47, '', '', 'MARIAM MWASAA MKUU', '9B', 'Female'),
(48, '', '', 'MEJUMAA ATHMAN', '9B', 'Female'),
(49, '', '', 'MESAIDI BAKARI', '9B', 'Female'),
(50, '', '', 'MESAIDI BAKARI MWARUNDU', '9B', 'Female'),
(51, '', '', 'MWANAIDI B. MWARUNDU', '9B', 'Female'),
(52, '', '', 'MWANAIDI MARIDADI', '9B', 'Female'),
(53, '', '', 'MWANAJUMA MOHAMMED', '9B', 'Female'),
(54, '', '', 'MWANAMISI K. VUNGA', '9B', 'Female'),
(55, '', '', 'MWANASHA JUMA JABU', '9B', 'Female'),
(56, '', '', 'MWANASITI NYUKI', '9B', 'Female'),
(57, '', '', 'MWANATUMU NYALA', '9B', 'Female'),
(58, '', '', 'NASHMA RAMADHAN', '9B', 'Female'),
(59, '', '', 'NUSURA HAMISI MWASERA', '9B', 'Female'),
(60, '', '', 'RAMLA JUMA', '9B', 'Female'),
(61, '', '', 'RAMLA SEIF MWASIKU', '9B', 'Female'),
(62, '', '', 'REHEMA M. MASHUA', '9B', 'Female'),
(63, '', '', 'SALAMA OMAR', '9B', 'Female'),
(64, '', '', 'SAUMU SWALE JUMANNE', '9B', 'Female'),
(65, '', '', 'SIDI SAID KWICHA', '9B', 'Female'),
(66, '', '', 'YUSRA SWALEH HINDI', '9B', 'Female'),
(67, '', '', 'ZUENA ALI ZUZU', '9B', 'Female'),
(68, '', '', 'ZUHURA JUMA', '9B', 'Female'),
(69, '', '', 'ADAM MOHAMED', '9R', 'Male'),
(70, '', '', 'ALI BOKO MOHAMMED', '9R', 'Male'),
(71, '', '', 'ALI NYANGE', '9R', 'Male'),
(72, '', '', 'ALI SAID KIRUWA', '9R', 'Male'),
(73, '', '', 'ARKELI ASIBABI OKUTO', '9R', 'Male'),
(74, '', '', 'BAHATI SAID MWACHANJE', '9R', 'Male'),
(75, '', '', 'BAKARI NGWILU', '9R', 'Male'),
(76, '', '', 'BAKARI SALIM NDUGU', '9R', 'Male'),
(77, '', '', 'HAMADI MWAKARAMU', '9R', 'Male'),
(78, '', '', 'HAMDI TENGEZA', '9R', 'Male'),
(79, '', '', 'HAMISI BAKARI KIBAO', '9R', 'Male'),
(80, '', '', 'HAMISI IBRAHIM KUHENDA', '9R', 'Male'),
(81, '', '', 'HASSAN GWARU', '9R', 'Male'),
(82, '', '', 'IDRIS HEMED MWAKAMOLE', '9R', 'Male'),
(83, '', '', 'JOSEPH OCHIENG', '9R', 'Male'),
(84, '', '', 'JUMA CHIMETSE', '9R', 'Male'),
(85, '', '', 'JUMA SALIM MALUKI', '9R', 'Male'),
(86, '', '', 'MOHAMED MWASERA', '9R', 'Male'),
(87, '', '', 'MOHAMMED MWAPAKIA', '9R', 'Male'),
(88, '', '', 'MOHAMMED ZARUME ABDALLAH', '9R', 'Male'),
(89, '', '', 'MWINYI GANZALA', '9R', 'Male'),
(90, '', '', 'NOOR HAI NOOR', '9R', 'Male'),
(91, '', '', 'OMARI MBWA', '9R', 'Male'),
(92, '', '', 'RAJAB SEIF', '9R', 'Male'),
(93, '', '', 'RIADHA MBWANA SHERIA', '9R', 'Male'),
(94, '', '', 'RIZIKI RAGUDE', '9R', 'Male'),
(95, '', '', 'SADIKI JUMA MOYO', '9R', 'Male'),
(96, '', '', 'SAID MWIRU', '9R', 'Male'),
(97, '', '', 'SALIM ABDALLAH', '9R', 'Male'),
(98, '', '', 'SALIM RASHID', '9R', 'Male'),
(99, '', '', 'SULEIMAN HAMISI', '9R', 'Male'),
(100, '', '', 'SWABRI SAID', '9R', 'Male'),
(101, '', '', 'YUSUF ATHMAN CHARO', '9R', 'Male'),
(102, '', '', 'FATUMA MZEE ANGORE', '9R', 'Female'),
(103, '', '', 'MWANAJUMA OMAR CHANGU', '9R', 'Female'),
(104, '', '', 'MESALIM HAMISI SHEBA', '9R', 'Female'),
(105, '', '', 'SWABRINA SALIM CHIMETSE', '9R', 'Female'),
(106, '', '', 'FATUMA ATHMAN', '9R', 'Female'),
(107, '', '', 'BABY SWALEH NIMAREZI', '9R', 'Female'),
(108, '', '', 'MEJUMAA MALEZI MANGENYA', '9R', 'Female'),
(109, '', '', 'MISHI MWALIMU', '9R', 'Female'),
(110, '', '', 'MESALIM JUMA BANDA', '9R', 'Female'),
(111, '', '', 'FATUMA IDD MTAWAZO', '9R', 'Female'),
(112, '', '', 'SINANGOWA MARIAM MUSA', '9R', 'Female'),
(113, '', '', 'ZAWADI SALIM', '9R', 'Female'),
(114, '', '', 'FATUMA HAMADI BWATA', '9R', 'Female'),
(115, '', '', 'SOFIA ABDALLAH', '9R', 'Female'),
(116, '', '', 'BINTI JABIR SHAKI', '9R', 'Female'),
(117, '', '', 'IPTISAM SALIM KAZUNGU', '9R', 'Female'),
(118, '', '', 'ZAINAB HAMID OMAR', '9R', 'Female'),
(119, '', '', 'BINTI OMAR MBETO', '9R', 'Female'),
(120, '', '', 'MWANAMISI BAHATI', '9R', 'Female'),
(121, '', '', 'FATUMA HAMISI ALI', '9R', 'Female'),
(122, '', '', 'FATUMA NASSORO', '9R', 'Female'),
(123, '', '', 'FATIME HAMISI', '9R', 'Female'),
(124, '', '', 'NURU HAMISI MBWANA', '9R', 'Female'),
(125, '', '', 'MWANATUMU NGENYA', '9R', 'Female'),
(126, '', '', 'UMMI JUMA', '9R', 'Female'),
(127, '', '', 'FATUMA SALMIN', '9R', 'Female'),
(128, '', '', 'MWANAISHA OMAR DUGA', '9R', 'Female'),
(129, '', '', 'MWANARUSI NASSORO', '9R', 'Female'),
(130, '', '', 'MWANAISHA SULEIMAN', '9R', 'Female'),
(131, '', '', 'SHARIFA JUMA', '9R', 'Female'),
(132, '', '', 'FATUMA MOHAMMED MALAWI', '9R', 'Female'),
(133, '', '', 'ABDALLAH M. MWAIWE', '8B', 'Male'),
(134, '', '', 'ABDALLAH M. MWALIMU', '8B', 'Male'),
(135, '', '', 'ABDULRAHMAN MWIRU', '8B', 'Male'),
(136, '', '', 'ABDULRAHMAN TAFAKI', '8B', 'Male'),
(137, '', '', 'ABUISLAM R. CHAPU', '8B', 'Male'),
(138, '', '', 'ALI HAMISI MSUKUMWA', '8B', 'Male'),
(139, '', '', 'ALI OMAR SHIKELI', '8B', 'Male'),
(140, '', '', 'ATHMAN H. HAMISI', '8B', 'Male'),
(141, '', '', 'BAKARI A. MWARICHA', '8B', 'Male'),
(142, '', '', 'BAKARI J. MWINYIHAJI', '8B', 'Male'),
(143, '', '', 'BARAZA SAID FORO', '8B', 'Male'),
(144, '', '', 'BILALI O. MWAGARI', '8B', 'Male'),
(145, '', '', 'FARAJ H. MWACHIRIMIRA', '8B', 'Male'),
(146, '', '', 'HAJI ODDO HIRIBAE', '8B', 'Male'),
(147, '', '', 'HAMISI F. HAMISI', '8B', 'Male'),
(148, '', '', 'HAMISI S. MWAKUGULA', '8B', 'Male'),
(149, '', '', 'HASSAN C. NYAWA', '8B', 'Male'),
(150, '', '', 'HUSSEIN ALI MWAMTUKU', '8B', 'Male'),
(151, '', '', 'IDD AMIN MWAWADI', '8B', 'Male'),
(152, '', '', 'IDD JUMA BULUSHI', '8B', 'Male'),
(153, '', '', 'ISMAIL JUMA MWADIMA', '8B', 'Male'),
(154, '', '', 'KASSIM B. MWAMTINDI', '8B', 'Male'),
(155, '', '', 'MATANO M. MAGODA', '8B', 'Male'),
(156, '', '', 'MATANO N. CHIMERA', '8B', 'Male'),
(157, '', '', 'MBARAKA S. MWIRU', '8B', 'Male'),
(158, '', '', 'OMAR HAMISI MWARICHA', '8B', 'Male'),
(159, '', '', 'SIFA KWICHA SAID', '8B', 'Male'),
(160, '', '', 'SULEIMAN S. HARRY', '8B', 'Male'),
(161, '', '', 'SWALEH H. MWANDEKA', '8B', 'Male'),
(162, '', '', 'AMINA C. MWERO', '8B', 'Female'),
(163, '', '', 'ASHA MUNGA DAUDI', '8B', 'Female'),
(164, '', '', 'ASHA S. MWAGANDANI', '8B', 'Female'),
(165, '', '', 'ESHA M. MWAISHA', '8B', 'Female'),
(166, '', '', 'FAIZA A. CHINANDI', '8B', 'Female'),
(167, '', '', 'FARIDA S. MOHAMED', '8B', 'Female'),
(168, '', '', 'FATUMA A. MWAKUCHENGWA', '8B', 'Female'),
(169, '', '', 'FATUMA H. ALI', '8B', 'Female'),
(170, '', '', 'FATUMA JUMA BANDA', '8B', 'Female'),
(171, '', '', 'FATUMA N. SAID', '8B', 'Female'),
(172, '', '', 'FATUMA S. NDUGU', '8B', 'Female'),
(173, '', '', 'HALIMA M. JUMA', '8B', 'Female'),
(174, '', '', 'HUSNA A. MWAKINDIRI', '8B', 'Female'),
(175, '', '', 'KADZO A. CHARO', '8B', 'Female'),
(176, '', '', 'MEJUMAA B. MWAKURIWA', '8B', 'Female'),
(177, '', '', 'MESALIMU K. NYALE', '8B', 'Female'),
(178, '', '', 'MTAMA J. MWABAKO', '8B', 'Female'),
(179, '', '', 'MWANAKOMBO ABDALLA', '8B', 'Female'),
(180, '', '', 'MWANAMISI MACHESO', '8B', 'Female'),
(181, '', '', 'MWANASHA K. SALIM', '8B', 'Female'),
(182, '', '', 'RAHMA OMAR KALAMU', '8B', 'Female'),
(183, '', '', 'RUKIA SALIM KENGA', '8B', 'Female'),
(184, '', '', 'SALOME MJENI CHARO', '8B', 'Female'),
(185, '', '', 'SAUDA SAID NJAMA', '8B', 'Female'),
(186, '', '', 'SAUMU KESI MUNGA', '8B', 'Female'),
(187, '', '', 'ZAWADI M. CHIDONGO', '8B', 'Female'),
(188, '', '', 'ZUHURA J. ABDALLAH', '8B', 'Female'),
(189, '', '', 'ZUHURA M. MWAKOSA', '8B', 'Female'),
(190, '', '', 'ABUBAKAR J. MWAMAIKA', '8R', 'Female'),
(191, '', '', 'ADAM H. MWAKAMOLE', '8R', 'Female'),
(192, '', '', 'ALI HAMISI RAMBO', '8R', 'Female'),
(193, '', '', 'ALI M. JARUMANI', '8R', 'Female'),
(194, '', '', 'ALIAS O. MWAGAMBO', '8R', 'Female'),
(195, '', '', 'AMIR AMOS DZUYA', '8R', 'Female'),
(196, '', '', 'HAMISI M. MWANDARO', '8R', 'Female'),
(197, '', '', 'HAMISI M. ALI', '8R', 'Female'),
(198, '', '', 'HAMISI M. BILO', '8R', 'Female'),
(199, '', '', 'HAMISI RASHID ALI', '8R', 'Female'),
(200, '', '', 'HAMISI R. JARUMANI', '8R', 'Female'),
(201, '', '', 'HASSAN S. MWAMTAPA', '8R', 'Female'),
(202, '', '', 'JABALI M. DENDECHE', '8R', 'Female'),
(203, '', '', 'JAMAL S. KIBWAGO', '8R', 'Female'),
(204, '', '', 'MOHAMED H. ZIMBWE', '8R', 'Female'),
(205, '', '', 'MUSA MWACHILETA', '8R', 'Female'),
(206, '', '', 'MWINYI A. MSHINDO', '8R', 'Female'),
(207, '', '', 'MWISHAME J.MWASARIA', '8R', 'Female'),
(208, '', '', 'MWISHAME O. MWAGAMBO', '8R', 'Female'),
(209, '', '', 'OMAR M. MWAISHA', '8R', 'Female'),
(210, '', '', 'OMAR R. USHANGA', '8R', 'Female'),
(211, '', '', 'RAJAB ALEX NYAMBU', '8R', 'Female'),
(212, '', '', 'RAMA O. MWABENGOME', '8R', 'Female'),
(213, '', '', 'SAID H. MWACHIVUMBA', '8R', 'Female'),
(214, '', '', 'SALIM ALI MWARAHIRI', '8R', 'Female'),
(215, '', '', 'SULEIMAN M. SAID', '8R', 'Female'),
(216, '', '', 'SWALEH SALIM MBOVOKO', '8R', 'Female'),
(217, '', '', 'AISHA JUMA GWARU', '8R', 'Female'),
(218, '', '', 'AISHA N. SULEIMAN', '8R', 'Female'),
(219, '', '', 'AISHA RASHID', '8R', 'Female'),
(220, '', '', 'AMINA ALFAN', '8R', 'Female'),
(221, '', '', 'AMINA ALI JEZA', '8R', 'Female'),
(222, '', '', 'AMINA A. CHARO', '8R', 'Female'),
(223, '', '', 'AMINA MWAKUTENGENEZA', '8R', 'Female'),
(224, '', '', 'ASIA A. TAMBWE', '8R', 'Female'),
(225, '', '', 'BIASHA A. MWABOMA', '8R', 'Female'),
(226, '', '', 'BINTI O. NDUNGO', '8R', 'Female'),
(227, '', '', 'CYNTHIA E. KANINI', '8R', 'Female'),
(228, '', '', 'FATUMA O. GAWALU', '8R', 'Female'),
(229, '', '', 'HABIBA M. GARASHI', '8R', 'Female'),
(230, '', '', 'HALIMA ISSA CHINDA', '8R', 'Female'),
(231, '', '', 'HALIMA CHAUGENGE', '8R', 'Female'),
(232, '', '', 'MAYASA S. MAGODA', '8R', 'Female'),
(233, '', '', 'MEJUMAA MOHAMED', '8R', 'Female'),
(234, '', '', 'MWANAIDI MWABITI', '8R', 'Female'),
(235, '', '', 'MWANALIMA MWAMWEYE', '8R', 'Female'),
(236, '', '', 'MWANAISHA MWAKUJIBU', '8R', 'Female'),
(237, '', '', 'MWANASHA K. ALI', '8R', 'Female'),
(238, '', '', 'MWANASITI H. KOJA', '8R', 'Female'),
(239, '', '', 'MWANASITI M. NYAA', '8R', 'Female'),
(240, '', '', 'PURITY NDANU KIOKO', '8R', 'Female'),
(241, '', '', 'OMAR AISHA ABDALLAH', '8R', 'Female'),
(242, '', '', 'SALAMA J. MAMBONGWA', '8R', 'Female'),
(243, '', '', 'SHAMSA M. HUSSEIN', '8R', 'Female'),
(244, '', '', 'SIKUKUU J. SALIM', '8R', 'Female'),
(245, '', '', 'ZENA S. MANJEWA', '8R', 'Female'),
(246, '', '', 'ANNE T. NYAGA', '8R', 'Female'),
(247, '', '', 'NASIB HAMADI', '7B', 'Male'),
(248, '', '', 'HAKIMU ALI', '7B', 'Male'),
(249, '', '', 'HAMZA JUMA', '7B', 'Male'),
(250, '', '', 'SAID YUSUF', '7B', 'Male'),
(251, '', '', 'RAMADHAN SUDI', '7B', 'Male'),
(252, '', '', 'MAULID RASHID', '7B', 'Male'),
(253, '', '', 'MASUD HUSAIN', '7B', 'Male'),
(254, '', '', 'ABUBAKAR HAFIDH', '7B', 'Male'),
(255, '', '', 'OMAR MWINYI', '7B', 'Male'),
(256, '', '', 'IDRIS SAID', '7B', 'Male'),
(257, '', '', 'CHRISTOPHER RAJAB', '7B', 'Male'),
(258, '', '', 'NGWARUTO RAMA', '7B', 'Male'),
(259, '', '', 'ISMAIL ALI', '7B', 'Male'),
(260, '', '', 'RAMA SWALEH', '7B', 'Male'),
(261, '', '', 'SIDIK MWINYI', '7B', 'Male'),
(262, '', '', 'BAHATI JUMA', '7B', 'Male'),
(263, '', '', 'ISMAIL JUMA', '7B', 'Male'),
(264, '', '', 'SALIM OMAR', '7B', 'Male'),
(265, '', '', 'JUMA MWARANDANI', '7B', 'Male'),
(266, '', '', 'OMAR SALIM CHANGU', '7B', 'Male'),
(267, '', '', 'MALIK ALI NYOKA', '7B', 'Male'),
(268, '', '', 'OMAR MWAKUWEKA', '7B', 'Male'),
(269, '', '', 'MWINYIKOMBO BAKARI', '7B', 'Male'),
(270, '', '', 'MBARAK OMAR', '7B', 'Male'),
(271, '', '', 'BRITON OMONDI', '7B', 'Male'),
(272, '', '', 'SEIF MOHAMED', '7B', 'Male'),
(273, '', '', 'OMAR MOHAMED', '7B', 'Male'),
(274, '', '', 'MOHAMED ABDALLAH', '7B', 'Male'),
(275, '', '', 'MOHAMED MUSA', '7B', 'Male'),
(276, '', '', 'HAMISI MAULA HIMA', '7B', 'Male'),
(277, '', '', 'SAID MOHAMED', '7B', 'Male'),
(278, '', '', 'OMAR SAID SHIBE', '7B', 'Male'),
(311, '', '', 'ATTAN DAHLAN', '7R', 'Male'),
(312, '', '', 'HAMISI BAKARI', '7R', 'Male'),
(313, '', '', 'BILAL MASHUA', '7R', 'Male'),
(314, '', '', 'LUCKY PETER', '7R', 'Male'),
(315, '', '', 'ALI MASHUA', '7R', 'Male'),
(316, '', '', 'ALI MWAKUWANIA', '7R', 'Male'),
(317, '', '', 'MWISHAME RAMADHAM', '7R', 'Male'),
(318, '', '', 'KENNETH EVANS', '7R', 'Male'),
(319, '', '', 'JUMA JUMA NGWILI', '7R', 'Male'),
(320, '', '', 'HASSAN SALIM', '7R', 'Male'),
(321, '', '', 'HAMADI ALPHAN', '7R', 'Male'),
(322, '', '', 'MBARAKA CHAMBAZA', '7R', 'Male'),
(323, '', '', 'ABDALLAH MWABOMA', '7R', 'Male'),
(324, '', '', 'ALI RASHID', '7R', 'Male'),
(325, '', '', 'BAKARI AYUB', '7R', 'Male'),
(326, '', '', 'MOHAMMED MKUBWA', '7R', 'Male'),
(327, '', '', 'HAMISI SALIM MPEMBA', '7R', 'Male'),
(328, '', '', 'ALPHAN MWIRU', '7R', 'Male'),
(329, '', '', 'IDRIS MWAGAMBIRWA', '7R', 'Male'),
(330, '', '', 'ABDALLAH MWIDADI', '7R', 'Male'),
(331, '', '', 'ABDULMALIK BANDA', '7R', 'Male'),
(332, '', '', 'MOHAMED CHAUNGENGE', '7R', 'Male'),
(333, '', '', 'SWALEH MWARANDANI', '7R', 'Male'),
(334, '', '', 'HAMISI MWASIKU', '7R', 'Male'),
(335, '', '', 'MWALIMU KUHENDA', '7R', 'Male'),
(336, '', '', 'SAAD JUMA', '7R', 'Male'),
(337, '', '', 'ABDALLAH KIDIWA', '7R', 'Male'),
(338, '', '', 'YAQUB HAMISI', '7R', 'Male'),
(339, '', '', 'HAMISI MWINYIHAJJI', '7R', 'Male'),
(340, '', '', 'BAKARI SAID KAYA', '7R', 'Male'),
(341, '', '', 'MOHAMED ALI NAZI', '7R', 'Male'),
(342, '', '', 'FARAJ ABDALLAH', '7R', 'Male'),
(343, '', '', 'FATUMA GANDARO', '7R', 'Female'),
(344, '', '', 'MITCHEL NTHEGA', '7R', 'Female'),
(345, '', '', 'AISHA GANZO', '7R', 'Female'),
(346, '', '', 'SUMAYYAH ABDALLAH', '7R', 'Female'),
(347, '', '', 'KIDODO MWAVADU', '7R', 'Female'),
(348, '', '', 'ZUHURA SULEIMAN', '7R', 'Female'),
(349, '', '', 'MAMSA MIPANGO', '7R', 'Female'),
(350, '', '', 'FATUMA HINDI', '7R', 'Female'),
(351, '', '', 'JESCAH MAYUGO', '7R', 'Female'),
(352, '', '', 'HALIMAH ADAM', '7R', 'Female'),
(353, '', '', 'MESALIM CHAMBAO', '7R', 'Female'),
(354, '', '', 'MESALIM MWAMTUA', '7R', 'Female'),
(355, '', '', 'MWANAKOMBO SHEE', '7R', 'Female'),
(356, '', '', 'MWANAMISI MASHUA', '7R', 'Female'),
(357, '', '', 'MESAIDI RAMA', '7R', 'Female'),
(358, '', '', 'FATUMA JARUMANI', '7R', 'Female'),
(359, '', '', 'MWANALIMA JUMA', '7R', 'Female'),
(360, '', '', 'FATUMA FAKI', '7R', 'Female'),
(361, '', '', 'HALIMA CHEI', '7R', 'Female'),
(362, '', '', 'ASHA CHANGU', '7R', 'Female'),
(363, '', '', 'MEJUMAA MZEE', '7R', 'Female'),
(364, '', '', 'REHEMA CHANGO', '7R', 'Female'),
(365, '', '', 'KHADIJA MWANCHA', '7R', 'Female'),
(366, '', '', 'MISHI MWAWEMA', '7R', 'Female'),
(367, '', '', 'JAMILA MWAKUJIBU', '7R', 'Female'),
(368, '', '', 'AMINA MWAKARAMU', '7R', 'Female'),
(369, '', '', 'MWANAMVUA JUMA', '7R', 'Female'),
(370, '', '', 'SOPHIA MWAKUUZA', '7R', 'Female'),
(371, '', '', 'BINTI JUMA HAIRENI', '7R', 'Female'),
(372, '', '', 'MABIBI MWINYI', '7R', 'Female'),
(373, '', '', 'MESALIM ALI', '7R', 'Female'),
(374, '', '', 'SHANI HAMISI', '7R', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `sAdmno` varchar(50) NOT NULL,
  `year` enum('2024','2025','2026','2027','2028') NOT NULL,
  `exam` enum('Midterm','Endterm') NOT NULL,
  `term` enum('I','II','III') NOT NULL,
  `class` enum('7R','7B','8B','8R','9B','9R') NOT NULL,
  `sName` enum('MAT','ENG','KISW','INT-SCI','PRE-TECH','AGRI','SST','RE','CAS') NOT NULL,
  `score` int(50) NOT NULL,
  `comment` enum('EXCELLENT','GOOD','AVERAGE','POOR') NOT NULL,
  `grade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `sAdmno`, `year`, `exam`, `term`, `class`, `sName`, `score`, `comment`, `grade`) VALUES
(1, 'BOWA/17/12/2024', '2024', 'Midterm', 'I', '7B', 'MAT', 70, 'EXCELLENT', 'B+'),
(2, 'BOWA/17/12/2024', '2024', 'Midterm', 'II', '7R', 'ENG', 90, 'EXCELLENT', 'A'),
(3, '', '2024', 'Midterm', 'I', '8B', '', 0, 'EXCELLENT', ''),
(4, '', '2024', 'Midterm', 'I', '8R', '', 0, 'EXCELLENT', ''),
(5, '', '2024', 'Midterm', 'I', '9B', '', 0, 'EXCELLENT', ''),
(6, '', '2024', 'Midterm', 'I', '9R', '', 0, 'EXCELLENT', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subjectCode` varchar(10) NOT NULL,
  `subjectName` enum('MAT','ENG','KISW','INT-SCI','PRE-TECH','AGRI','SST','RE','CAS') DEFAULT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjectCode`, `subjectName`, `dateCreated`) VALUES
(1, '001', 'MAT', '2025-03-02'),
(2, '002', 'ENG', '2025-03-02'),
(3, '003', 'KISW', '2025-03-02'),
(4, '004', 'INT-SCI', '2025-03-02'),
(5, '005', 'PRE-TECH', '2025-03-02'),
(6, '006', 'AGRI', '2025-03-02'),
(7, '007', 'SST', '2025-03-02'),
(8, '008', 'RE', '2025-03-02'),
(9, '009', 'CAS', '2025-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `unit_code` varchar(30) NOT NULL,
  `hire_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file_name`, `file_path`, `file_type`, `upload_time`) VALUES
(1, 'Taquc draft.doc', 'uploads/files/Taquc draft.doc', 'doc', '2025-02-11 08:15:06'),
(2, 'ZARIA- script.docx', 'uploads/files/ZARIA- script.docx', 'docx', '2025-02-11 08:30:11'),
(3, 'Radio documentary.docx', 'uploads/files/Radio documentary.docx', 'docx', '2025-02-11 08:37:10'),
(4, 'OMARCOVERL.docx', 'uploads/files/OMARCOVERL.docx', 'docx', '2025-02-11 09:08:25'),
(5, 'INDIVIDUAL SHOW with MWINYI MWIINA.docx', 'uploads/files/INDIVIDUAL SHOW with MWINYI MWIINA.docx', 'docx', '2025-02-17 08:44:24'),
(6, 'code.txt', 'uploads/files/code.txt', 'txt', '2025-02-20 05:27:30'),
(7, 'KIOKO_Media_Project[1].docx', '../uploads/files/KIOKO_Media_Project[1].docx', 'docx', '2025-02-20 17:18:11'),
(8, 'kkk.pdf', '../uploads/files/kkk.pdf', 'pdf', '2025-02-20 17:21:34'),
(9, 'omar dashboard.txt', '../uploads/files/omar dashboard.txt', 'txt', '2025-02-21 15:13:52'),
(10, 'Naibu Rais Rigathi Gachagua anasema hataingizwa katika siasa za pande zote.docx', '../uploads/files/Naibu Rais Rigathi Gachagua anasema hataingizwa katika siasa za pande zote.docx', 'docx', '2025-02-24 13:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('supperAdmin','admin','staff','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'OMAR', 'SUFIANI', 'hommiedelaco@gmail.com', '$2y$10$jatEaonAeK5d.DB44SkZ9u.Oe.kOFg5G79vi46qU67oENW49NtK2m', 'supperAdmin'),
(2, 'ommy', 'sufiani', 'ommy@kpa.co.ke', '$2y$10$MJm3so.qS/IxhtStW81KGeuXEY.Xm7J8KULR6ap8qhPM7dtclUmGG', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_students`
--
ALTER TABLE `all_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `admno` (`admno`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sAdmno` (`sAdmno`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sName` (`subjectName`),
  ADD KEY `subjectName` (`subjectName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_students`
--
ALTER TABLE `all_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`sAdmno`) REFERENCES `all_students` (`admno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
