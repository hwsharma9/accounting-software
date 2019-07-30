-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2019 at 10:45 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `type` int(1) DEFAULT NULL COMMENT '1=>member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `userid`, `address`, `state`, `city`, `zipcode`, `type`) VALUES
(1, 1, '14985-746, R. Agostinho Uchoa, 882\r\nVila Norma do Norte - MS', 12, 306, 452363, 1),
(2, 2, '23958-404, Travessa Mateus Delgado, 95. Apto 010\nPorto Daniel - MS', 29, 734, 452846, 1),
(3, 3, '17178-509, Av. Alessandra Aranda, 8625\nCampos do Sul - RS', 29, 734, 452614, 1),
(4, 4, '35772-521, Travessa Quintana, 3. Bloco A\nCarolina do Norte - RO', 9, 274, 452401, 1),
(5, 5, '70798-106, Travessa Kevin Matias, 6677\nSanta Everton do Sul - MA', 6, 262, 452436, 1),
(6, 6, '74796-105, Rua Franco Meireles, 2\nPorto Luciano - RR', 6, 262, 452390, 1),
(7, 7, '61329-087, Av. Matias Rangel, 5856. Apto 5357\nSão Mário do Norte - SP', 12, 306, 452101, 1),
(8, 8, '87096-384, Travessa Emília, 478. Apto 8\nJosefina do Sul - MA', 12, 306, 452409, 1),
(9, 9, '04883-272, Rua Regina Sanches, 476. Apto 465\nDuarte do Sul - GO', 12, 306, 452945, 1),
(10, 10, '27223-783, Travessa Galhardo, 4970\nFranco do Norte - PR', 23, 524, 452242, 1),
(11, 11, '65039-385, R. Domingues, 729. Apto 284\nSanta Alexandre - SC', 9, 274, 452550, 1),
(12, 12, '74891-230, R. Vitória Sandoval, 82. Bc. 87 Ap. 48\nPorto Luna d\'Oeste - GO', 6, 262, 452688, 1),
(13, 13, '27388-050, Av. Valência, 613. 74º Andar\nSanta Diego d\'Oeste - RR', 12, 306, 452511, 1),
(14, 14, '12764-592, Travessa Meireles, 94. Apto 21\nFidalgo do Leste - AM', 9, 274, 452201, 1),
(15, 15, '46465-130, R. Regina, 03843. Bloco B\nMedina do Norte - RJ', 9, 274, 452717, 1),
(16, 16, '87620-496, Largo Christopher Quintana, 84354\nSanta Camila - AL', 29, 734, 452803, 1),
(17, 17, '79522-684, Avenida Ferraz, 90. 24º Andar\nPadilha do Sul - SC', 23, 524, 452858, 1),
(18, 18, '72683-376, Avenida Gil, 712\nSanta Madalena d\'Oeste - MT', 6, 262, 452599, 1),
(19, 19, '20003-474, Av. Campos, 72098. 667º Andar\nSão Isadora do Norte - SP', 29, 734, 452431, 1),
(20, 20, '93996-715, Travessa Jácomo Ferraz, 15. Bc. 5 Ap. 42\nValência do Sul - PB', 23, 524, 452705, 1),
(21, 21, '87335-537, Travessa Flores, 56\nQuintana do Sul - AL', 9, 274, 452292, 1),
(22, 22, '90187-072, Av. Franco, 00. Apto 3799\nVila Hernani do Leste - GO', 29, 734, 452640, 1),
(23, 23, '56766-821, Travessa Teobaldo, 74\nSanta Isaac - RO', 12, 306, 452262, 1),
(24, 24, '54185-570, Av. Constância, 32\nAdriano d\'Oeste - PE', 12, 306, 452119, 1),
(25, 25, '86748-791, R. Alexandre Vasques, 61392. Fundos\nSanta Gustavo - MT', 12, 306, 452008, 1),
(26, 26, '94382-735, Avenida Lucas Balestero, 540\nAssunção do Leste - AM', 9, 274, 452923, 1),
(27, 27, '41803-562, Avenida Elias Delgado, 744\nGodói d\'Oeste - MA', 23, 524, 452368, 1),
(28, 28, '94209-360, R. Michele, 2. Bloco C\nPorto Vicente do Sul - RR', 6, 262, 452284, 1),
(29, 29, '16356-430, Travessa Renata, 72. F\nGomes do Norte - AC', 9, 274, 452505, 1),
(30, 30, '45378-343, Av. Pedro, 75\nSão Gian do Leste - PR', 6, 262, 452414, 1),
(31, 31, '62890-139, R. Madeira, 49. Bc. 22 Ap. 60\nPereira do Sul - GO', 29, 734, 452946, 1),
(32, 32, '15757-047, Rua Grego, 22258. 6º Andar\nAlonso do Leste - RS', 9, 274, 452162, 1),
(33, 33, '04379-286, R. Constância Vasques, 97758\nVila Paulina d\'Oeste - RN', 9, 274, 452669, 1),
(34, 34, '99607-232, Av. Tessália Ramires, 49478\nSamanta do Leste - SE', 29, 734, 452104, 1),
(35, 35, '74132-348, R. Allison, 502. F\nCarolina do Leste - PI', 6, 262, 452007, 1),
(36, 36, '43606-334, Avenida Giovane, 59969\nVila Sérgio do Sul - SP', 12, 306, 452764, 1),
(37, 37, '83407-659, Travessa Norma Fernandes, 253\nSanta Christian do Leste - MA', 9, 274, 452137, 1),
(38, 38, '18814-032, R. Felipe, 55716. Bc. 89 Ap. 03\nPorto Julieta do Norte - GO', 23, 524, 452593, 1),
(39, 39, '83344-071, Largo Noelí Ortega, 5993\nPena do Norte - PB', 9, 274, 452843, 1),
(40, 40, '41954-582, Av. D\'ávila, 123\nHortência do Norte - CE', 23, 524, 452048, 1),
(41, 41, '71746-989, Avenida Simão, 76885. Apto 0308\nIvan d\'Oeste - DF', 6, 262, 452749, 1),
(42, 42, '32530-313, Travessa Gonçalves, 4\nRezende do Norte - AP', 29, 734, 452113, 1),
(43, 43, '05903-090, Largo Evandro, 171. Bc. 14 Ap. 26\nVila Santiago do Norte - SP', 23, 524, 452398, 1),
(44, 44, '84888-145, Largo de Aguiar, 1152. Anexo\nRivera do Leste - BA', 9, 274, 452234, 1),
(45, 45, '12132-164, Rua Queirós, 79589. Bc. 1 Ap. 46\r\nCordeiro do Sul - MG', 12, 306, 452176, 1),
(46, 46, '71790-690, Travessa Soares, 1499. 1º Andar\nMateus d\'Oeste - RR', 29, 734, 452840, 1),
(47, 47, '58709-721, Avenida Valentina, 50. 55º Andar\r\nLovato do Norte - RR', 12, 306, 452741, 1),
(48, 48, '50431-285, Rua Serrano, 4681. F\r\nThales do Leste - SP', 29, 734, 452548, 1),
(49, 49, '01070-100, Largo Isabel, 934\r\nMaitê do Sul - AM', 23, 524, 452940, 1),
(50, 50, '47318-559, Largo Fábio, 44678\r\nCarla do Norte - GO', 12, 306, 452852, 1),
(51, 51, 'PTC Musakhedi MP indore', 23, 544, 452001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `text_password` varchar(150) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `group` varchar(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userid`, `name`, `email`, `password`, `text_password`, `user_type`, `group`, `profile_pic`, `created_at`) VALUES
(1, 1551941692, 'Harshwardhan Sharma', 'harshwardhan@ignisitsolutions.com', '6d52ce4580af9607dcfa938f53d7150e', 'harsh@123', '1', '[\"1\"]', 'assets/admin/admin_profile_pic/0/1/profile_pic_girl.png', '2019-03-07 10:45:00'),
(2, 1551941912, 'New Admin', 'hw.sharma9@gmail.com', 'ceb6c970658f31504a901b89dcd3e461', 'test@123', '2', '[\"2\"]', '', '2019-03-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(5) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `state_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `latitude`, `longitude`, `state_id`) VALUES
(1, 'Port Blair', '11.67 N', '92.76 E', 1),
(2, 'Adilabad', '19.68 N', '78.53 E', 2),
(3, 'Adoni', '15.63 N', '77.28 E', 2),
(4, 'Alwal', '17.50 N', '78.54 E', 2),
(5, 'Anakapalle', '17.69 N', '83.00 E', 2),
(6, 'Anantapur', '14.70 N', '77.59 E', 2),
(7, 'Bapatla', '15.91 N', '80.47 E', 2),
(8, 'Belampalli', '19.06 N', '79.49 E', 2),
(9, 'Bhimavaram', '16.55 N', '81.53 E', 2),
(10, 'Bhongir', '17.52 N', '78.88 E', 2),
(11, 'Bobbili', '18.57 N', '83.37 E', 2),
(12, 'Bodhan', '18.66 N', '77.88 E', 2),
(13, 'Chilakalurupet', '16.10 N', '80.16 E', 2),
(14, 'Chinna Chawk', '14.47 N', '78.83 E', 2),
(15, 'Chirala', '15.84 N', '80.35 E', 2),
(16, 'Chittur', '13.22 N', '79.10 E', 2),
(17, 'Cuddapah', '14.48 N', '78.81 E', 2),
(18, 'Dharmavaram', '14.42 N', '77.71 E', 2),
(19, 'Dhone', '15.42 N', '77.88 E', 2),
(20, 'Eluru', '16.72 N', '81.11 E', 2),
(21, 'Gaddiannaram', '17.36 N', '78.52 E', 2),
(22, 'Gadwal', '16.23 N', '77.80 E', 2),
(23, 'Gajuwaka', '17.70 N', '83.21 E', 2),
(24, 'Gudivada', '16.44 N', '81.00 E', 2),
(25, 'Gudur', '14.15 N', '79.84 E', 2),
(26, 'Guntakal', '15.18 N', '77.37 E', 2),
(27, 'Guntur', '16.31 N', '80.44 E', 2),
(28, 'Hindupur', '13.83 N', '77.48 E', 2),
(29, 'Hyderabad', '17.40 N', '78.48 E', 2),
(30, 'Jagtial', '18.80 N', '78.91 E', 2),
(31, 'Kadiri', '14.12 N', '78.16 E', 2),
(32, 'Kagaznagar', '19.34 N', '79.48 E', 2),
(33, 'Kakinada', '16.96 N', '82.24 E', 2),
(34, 'Kallur', '15.69 N', '77.77 E', 2),
(35, 'Kamareddi', '18.32 N', '78.35 E', 2),
(36, 'Kapra', '17.37 N', '78.48 E', 2),
(37, 'Karimnagar', '18.45 N', '79.13 E', 2),
(38, 'Karnul', '15.83 N', '78.03 E', 2),
(39, 'Kavali', '14.92 N', '79.99 E', 2),
(40, 'Khammam', '17.25 N', '80.15 E', 2),
(41, 'Kodar', '16.98 N', '79.97 E', 2),
(42, 'Kondukur', '15.22 N', '79.91 E', 2),
(43, 'Koratla', '18.82 N', '78.72 E', 2),
(44, 'Kottagudem', '17.56 N', '80.64 E', 2),
(45, 'Kukatpalle', '17.49 N', '78.41 E', 2),
(46, 'Lalbahadur Nagar', '17.43 N', '78.50 E', 2),
(47, 'Machilipatnam', '16.19 N', '81.14 E', 2),
(48, 'Mahbubnagar', '16.74 N', '77.98 E', 2),
(49, 'Malkajgiri', '17.55 N', '78.59 E', 2),
(50, 'Mancheral', '18.88 N', '79.45 E', 2),
(51, 'Mandamarri', '18.97 N', '79.47 E', 2),
(52, 'Mangalagiri', '16.44 N', '80.56 E', 2),
(53, 'Markapur', '15.73 N', '79.28 E', 2),
(54, 'Miryalaguda', '16.87 N', '79.57 E', 2),
(55, 'Nalgonda', '17.06 N', '79.26 E', 2),
(56, 'Nandyal', '15.49 N', '78.48 E', 2),
(57, 'Narasapur', '16.45 N', '81.70 E', 2),
(58, 'Narasaraopet', '16.24 N', '80.04 E', 2),
(59, 'Nellur', '14.46 N', '79.98 E', 2),
(60, 'Nirmal', '19.12 N', '78.35 E', 2),
(61, 'Nizamabad', '18.68 N', '78.10 E', 2),
(62, 'Nuzvid', '16.78 N', '80.85 E', 2),
(63, 'Ongole', '15.50 N', '80.05 E', 2),
(64, 'Palakollu', '16.52 N', '81.75 E', 2),
(65, 'Palasa', '18.77 N', '84.42 E', 2),
(66, 'Palwancha', '17.60 N', '80.68 E', 2),
(67, 'Patancheru', '17.53 N', '78.27 E', 2),
(68, 'Piduguralla', '16.48 N', '79.90 E', 2),
(69, 'Ponnur', '16.07 N', '80.56 E', 2),
(70, 'Proddatur', '14.73 N', '78.55 E', 2),
(71, 'Qutubullapur', '17.43 N', '78.47 E', 2),
(72, 'Rajamahendri', '17.02 N', '81.79 E', 2),
(73, 'Rajampet', '14.18 N', '79.17 E', 2),
(74, 'Rajendranagar', '17.29 N', '78.39 E', 2),
(75, 'Ramachandrapuram', '17.56 N', '78.04 E', 2),
(76, 'Ramagundam', '18.80 N', '79.45 E', 2),
(77, 'Rayachoti', '14.05 N', '78.75 E', 2),
(78, 'Rayadrug', '14.70 N', '76.87 E', 2),
(79, 'Samalkot', '17.06 N', '82.18 E', 2),
(80, 'Sangareddi', '17.63 N', '78.08 E', 2),
(81, 'Sattenapalle', '16.40 N', '80.18 E', 2),
(82, 'Serilungampalle', '17.48 N', '78.33 E', 2),
(83, 'Siddipet', '18.11 N', '78.84 E', 2),
(84, 'Sikandarabad', '17.47 N', '78.52 E', 2),
(85, 'Sirsilla', '18.40 N', '78.81 E', 2),
(86, 'Srikakulam', '18.30 N', '83.90 E', 2),
(87, 'Srikalahasti', '13.76 N', '79.70 E', 2),
(88, 'Suriapet', '17.15 N', '79.62 E', 2),
(89, 'Tadepalle', '16.48 N', '80.60 E', 2),
(90, 'Tadepallegudem', '16.82 N', '81.52 E', 2),
(91, 'Tadpatri', '14.91 N', '78.00 E', 2),
(92, 'Tandur', '17.25 N', '77.58 E', 2),
(93, 'Tanuku', '16.75 N', '81.69 E', 2),
(94, 'Tenali', '16.24 N', '80.65 E', 2),
(95, 'Tirupati', '13.63 N', '79.41 E', 2),
(96, 'Tuni', '17.35 N', '82.55 E', 2),
(97, 'Uppal Kalan', '17.38 N', '78.55 E', 2),
(98, 'Vijayawada', '16.52 N', '80.63 E', 2),
(99, 'Vinukonda', '16.05 N', '79.75 E', 2),
(100, 'Visakhapatnam', '17.73 N', '83.30 E', 2),
(101, 'Vizianagaram', '18.12 N', '83.40 E', 2),
(102, 'Vuyyuru', '16.37 N', '80.85 E', 2),
(103, 'Wanparti', '16.37 N', '78.07 E', 2),
(104, 'Warangal', '18.01 N', '79.58 E', 2),
(105, 'Yemmiganur', '15.73 N', '77.48 E', 2),
(106, 'Itanagar', '27.14 N', '93.61 E', 3),
(107, 'Barpeta', '26.32 N', '91.00 E', 4),
(108, 'Bongaigaon', '26.48 N', '90.54 E', 4),
(109, 'Dhuburi', '26.03 N', '89.97 E', 4),
(110, 'Dibrugarh', '27.49 N', '94.91 E', 4),
(111, 'Diphu', '25.84 N', '93.43 E', 4),
(112, 'Guwahati', '26.19 N', '91.75 E', 4),
(113, 'Jorhat', '26.76 N', '94.20 E', 4),
(114, 'Karimganj', '24.85 N', '92.36 E', 4),
(115, 'Lakhimpur', '27.24 N', '94.10 E', 4),
(116, 'Lanka', '25.93 N', '92.95 E', 4),
(117, 'Nagaon', '26.35 N', '92.68 E', 4),
(118, 'Sibsagar', '26.99 N', '94.63 E', 4),
(119, 'Silchar', '24.83 N', '92.77 E', 4),
(120, 'Tezpur', '26.63 N', '92.79 E', 4),
(121, 'Tinsukia', '27.50 N', '95.36 E', 4),
(122, 'Alipur Duar', '26.50 N', '89.53 E', 35),
(123, 'Arambagh', '22.88 N', '87.78 E', 35),
(124, 'Asansol', '23.69 N', '86.98 E', 35),
(125, 'Ashoknagar Kalyangarh', '22.84 N', '88.63 E', 35),
(126, 'Baharampur', '24.10 N', '88.24 E', 35),
(127, 'Baidyabati', '22.79 N', '88.33 E', 35),
(128, 'Baj Baj', '22.48 N', '88.17 E', 35),
(129, 'Bally', '22.65 N', '88.35 E', 35),
(130, 'Bally Cantonment', '22.65 N', '88.36 E', 35),
(131, 'Balurghat', '25.23 N', '88.77 E', 35),
(132, 'Bangaon', '23.05 N', '88.83 E', 35),
(133, 'Bankra', '22.58 N', '88.31 E', 35),
(134, 'Bankura', '23.24 N', '87.07 E', 35),
(135, 'Bansbaria', '22.95 N', '88.40 E', 35),
(136, 'Baranagar', '22.64 N', '88.37 E', 35),
(137, 'Barddhaman', '23.24 N', '87.86 E', 35),
(138, 'Basirhat', '22.66 N', '88.86 E', 35),
(139, 'Bhadreswar', '22.84 N', '88.35 E', 35),
(140, 'Bhatpara', '22.89 N', '88.42 E', 35),
(141, 'Bidhannagar', '22.57 N', '88.42 E', 35),
(142, 'Binnaguri', '26.74 N', '89.037 E', 35),
(143, 'Bishnupur', '23.08 N', '87.33 E', 35),
(144, 'Bolpur', '23.67 N', '87.70 E', 35),
(145, 'Calcutta', '22.57 N', '88.36 E', 35),
(146, 'Chakdaha', '22.48 N', '88.35 E', 35),
(147, 'Champdani', '22.81 N', '88.34 E', 35),
(148, 'Chandannagar', '22.89 N', '88.37 E', 35),
(149, 'Contai', '21.79 N', '87.75 E', 35),
(150, 'Dabgram', '', '', 35),
(151, 'Darjiling', '27.05 N', '88.26 E', 35),
(152, 'Dhulian', '24.68 N', '87.97 E', 35),
(153, 'Dinhata', '26.13 N', '89.47 E', 35),
(154, 'Dum Dum', '22.63 N', '88.42 E', 35),
(155, 'Durgapur', '23.50 N', '87.31 E', 35),
(156, 'Gangarampur', '25.40 N', '88.52 E', 35),
(157, 'Garulia', '22.83 N', '88.37 E', 35),
(158, 'Gayespur', '22.98 N', '88.51 E', 35),
(159, 'Ghatal', '22.67 N', '87.72 E', 35),
(160, 'Gopalpur', '', '', 35),
(161, 'Habra', '22.84 N', '88.62 E', 35),
(162, 'Halisahar', '22.95 N', '88.42 E', 35),
(163, 'Haora', '22.58 N', '88.33 E', 35),
(164, 'HugliChunchura', '22.91 N', '88.40 E', 35),
(165, 'Ingraj Bazar', '25.01 N', '88.14 E', 35),
(166, 'Islampur', '26.27 N', '88.20 E', 35),
(167, 'Jalpaiguri', '26.53 N', '88.71 E', 35),
(168, 'Jamuria', '23.70 N', '87.08 E', 35),
(169, 'Jangipur', '24.47 N', '88.07 E', 35),
(170, 'Jhargram', '22.45 N', '86.98 E', 35),
(171, 'Kaliyaganj', '25.63 N', '88.32 E', 35),
(172, 'Kalna', '23.22 N', '88.37 E', 35),
(173, 'Kalyani', '22.98 N', '88.48 E', 35),
(174, 'Kamarhati', '22.67 N', '88.37 E', 35),
(175, 'Kanchrapara', '22.95 N', '88.45 E', 35),
(176, 'Kandi', '23.95 N', '88.03 E', 35),
(177, 'Karsiyang', '26.88 N', '88.28 E', 35),
(178, 'Katwa', '23.65 N', '88.13 E', 35),
(179, 'Kharagpur', '22.34 N', '87.31 E', 35),
(180, 'Kharagpur Railway Settlement', '22.34 N', '87.26 E', 35),
(181, 'Khardaha', '22.73 N', '88.38 E', 35),
(182, 'Kharia', '', '', 35),
(183, 'Koch Bihar', '26.33 N', '89.46 E', 35),
(184, 'Konnagar', '22.70 N', '88.36 E', 35),
(185, 'Krishnanagar', '23.41 N', '88.51 E', 35),
(186, 'Kulti', '23.72 N', '86.89 E', 35),
(187, 'Madhyamgram', '22.70 N', '88.45 E', 35),
(188, 'Maheshtala', '22.51 N', '88.23 E', 35),
(189, 'Memari', '23.20 N', '88.12 E', 35),
(190, 'Midnapur', '22.33 N', '87.15 E', 35),
(191, 'Naihati', '22.91 N', '88.43 E', 35),
(192, 'Navadwip', '23.42 N', '88.37 E', 35),
(193, 'Ni Barakpur', '22.77 N', '88.36 E', 35),
(194, 'North Barakpur', '22.78 N', '88.37 E', 35),
(195, 'North Dum Dum', '22.64 N', '88.41 E', 35),
(196, 'Old Maldah', '', '', 35),
(197, 'Panihati', '22.69 N', '88.37 E', 35),
(198, 'Phulia', '23.24 N', '88.50 E', 35),
(199, 'Pujali', '22.47 N', '88.15 E', 35),
(200, 'Puruliya', '23.34 N', '86.36 E', 35),
(201, 'Raiganj', '25.62 N', '88.12 E', 35),
(202, 'Rajpur', '22.44 N', '88.44 E', 35),
(203, 'Rampur Hat', '24.17 N', '87.78 E', 35),
(204, 'Ranaghat', '23.19 N', '88.58 E', 35),
(205, 'Raniganj', '23.62 N', '87.11 E', 35),
(206, 'Rishra', '22.71 N', '88.36 E', 35),
(207, 'Shantipur', '23.26 N', '88.44 E', 35),
(208, 'Shiliguri', '26.73 N', '88.42 E', 35),
(209, 'Shrirampur', '22.74 N', '88.35 E', 35),
(210, 'Siuri', '23.91 N', '87.53 E', 35),
(211, 'South Dum Dum', '22.61 N', '88.41 E', 35),
(212, 'Titagarh', '22.74 N', '88.38 E', 35),
(213, 'Ulubaria', '22.47 N', '88.11 E', 35),
(214, 'UttarparaKotrung', '22.66 N', '88.35 E', 35),
(215, 'Araria', '26.15 N', '87.52 E', 5),
(216, 'Arrah', '25.56 N', '84.66 E', 5),
(217, 'Aurangabad', '24.75 N', '84.37 E', 5),
(218, 'Bagaha', '27.10 N', '84.09 E', 5),
(219, 'Begusarai', '25.42 N', '86.12 E', 5),
(220, 'Bettiah', '26.81 N', '84.50 E', 5),
(221, 'Bhabua', '25.05 N', '83.62 E', 5),
(222, 'Bhagalpur', '25.26 N', '86.98 E', 5),
(223, '5', '25.21 N', '85.52 E', 5),
(224, 'Buxar', '25.58 N', '83.98 E', 5),
(225, 'Chhapra', '25.78 N', '84.72 E', 5),
(226, 'Darbhanga', '26.16 N', '85.88 E', 5),
(227, 'Dehri', '24.91 N', '84.18 E', 5),
(228, 'DighaMainpura', '', '', 5),
(229, 'Dinapur', '25.64 N', '85.04 E', 5),
(230, 'Dumraon', '25.55 N', '84.15 E', 5),
(231, 'Gaya', '24.81 N', '85.00 E', 5),
(232, 'Gopalganj', '26.47 N', '84.43 E', 5),
(233, 'Goura', '', '', 5),
(234, 'Hajipur', '', '', 5),
(235, 'Jahanabad', '25.22 N', '84.98 E', 5),
(236, 'Jamalpur', '25.32 N', '86.48 E', 5),
(237, 'Jamui', '24.92 N', '86.22 E', 5),
(238, 'Katihar', '25.55 N', '87.57 E', 5),
(239, 'Khagaria', '25.50 N', '86.48 E', 5),
(240, 'Khagaul', '25.58 N', '85.05 E', 5),
(241, 'Kishanganj', '26.11 N', '87.95 E', 5),
(242, 'Lakhisarai', '25.18 N', '86.09 E', 5),
(243, 'Madhipura', '25.92 N', '86.78 E', 5),
(244, 'Madhubani', '26.37 N', '86.06 E', 5),
(245, 'Masaurhi', '25.35 N', '85.03 E', 5),
(246, 'Mokama', '25.40 N', '85.92 E', 5),
(247, 'Motihari', '26.66 N', '84.91 E', 5),
(248, 'Munger', '25.39 N', '86.47 E', 5),
(249, 'Muzaffarpur', '26.13 N', '85.38 E', 5),
(250, 'Nawada', '24.88 N', '85.54 E', 5),
(251, 'Patna', '25.62 N', '85.13 E', 5),
(252, 'Phulwari', '25.60 N', '85.13 E', 5),
(253, 'Purnia', '25.78 N', '87.47 E', 5),
(254, 'Raxaul', '26.98 N', '84.85 E', 5),
(255, 'Saharsa', '25.88 N', '86.59 E', 5),
(256, 'Samastipur', '25.85 N', '85.78 E', 5),
(257, 'Sasaram', '24.96 N', '84.01 E', 5),
(258, 'Sitamarhi', '26.61 N', '85.48 E', 5),
(259, 'Siwan', '26.23 N', '84.35 E', 5),
(260, 'Supaul', '26.12 N', '86.60 E', 5),
(261, 'Chandigarh', '30.75 N', '76.78 E', 7),
(262, 'Ambikapur', '23.13 N', '83.20 E', 6),
(263, 'Bhilai', '21.21 N', '81.38 E', 6),
(264, 'Bilaspur', '22.09 N', '82.15 E', 6),
(265, 'Charoda', '21.23 N', '81.50 E', 6),
(266, 'Chirmiri', '23.21 N', '82.41 E', 6),
(267, 'Dhamtari', '20.71 N', '81.55 E', 6),
(268, 'Durg', '21.20 N', '81.28 E', 6),
(269, 'Jagdalpur', '19.09 N', '82.03 E', 6),
(270, 'Korba', '22.35 N', '82.69 E', 6),
(271, 'Raigarh', '21.90 N', '83.39 E', 6),
(272, 'Raipur', '21.24 N', '81.63 E', 6),
(273, 'Rajnandgaon', '21.10 N', '81.04 E', 6),
(274, 'Bhalswa Jahangirpur', '28.74 N', '77.17 E', 9),
(275, 'Burari', '', '', 9),
(276, 'Chilla Saroda Bangar', '', '', 9),
(277, 'Dallo Pura', '', '', 9),
(278, 'Delhi', '28.67 N', '77.21 E', 9),
(279, 'Deoli', '28.49 N', '77.22 E', 9),
(280, 'Dilli Cantonment', '28.57 N', '77.16 E', 9),
(281, 'Gharoli', '', '', 9),
(282, 'Gokalpur', '28.71 N', '77.28 E', 9),
(283, 'Hastsal', '', '', 9),
(284, 'Jaffrabad', '', '', 9),
(285, 'Karawal Nagar', '', '', 9),
(286, 'Khajuri Khas', '', '', 9),
(287, 'Kirari Suleman Nagar', '', '', 9),
(288, 'Mandoli', '', '', 9),
(289, 'Mithe Pur', '', '', 9),
(290, 'Molarband', '', '', 9),
(291, 'Mundka', '', '', 9),
(292, 'Mustafabad', '', '', 9),
(293, 'Nangloi Jat', '28.68 N', '77.07 E', 9),
(294, 'Ni Dilli', '28.60 N', '77.22 E', 9),
(295, 'Pul Pehlad', '', '', 9),
(296, 'Puth Kalan', '', '', 9),
(297, 'Roshan Pura', '28.60 N', '76.99 E', 9),
(298, 'Sadat Pur Gujran', '', '', 9),
(299, 'Sultanpur Majra', '28.76 N', '77.06 E', 9),
(300, 'Tajpul', '', '', 9),
(301, 'Tigri', '28.50 N', '77.22 E', 9),
(302, 'Ziauddin Pur', '', '', 9),
(303, 'Madgaon', '15.28 N', '73.94 E', 11),
(304, 'Mormugao', '15.42 N', '73.78 E', 11),
(305, 'Panaji', '15.50 N', '73.81 E', 11),
(306, 'Ahmadabad', '23.03 N', '72.58 E', 12),
(307, 'Amreli', '21.61 N', '71.22 E', 12),
(308, 'Anand', '22.56 N', '72.95 E', 12),
(309, 'Anjar', '23.12 N', '70.02 E', 12),
(310, 'Bardoli', '21.12 N', '73.12 E', 12),
(311, 'Bharuch', '21.71 N', '72.97 E', 12),
(312, 'Bhavnagar', '21.79 N', '72.13 E', 12),
(313, 'Bhuj', '23.26 N', '69.66 E', 12),
(314, 'Borsad', '22.42 N', '72.90 E', 12),
(315, 'Botad', '22.18 N', '71.66 E', 12),
(316, 'Chandkheda', '23.15 N', '72.61 E', 12),
(317, 'Chandlodiya', '23.10 N', '72.56 E', 12),
(318, 'Dabhoi', '22.13 N', '73.41 E', 12),
(319, 'Dahod', '22.84 N', '74.25 E', 12),
(320, 'Dholka', '22.74 N', '72.44 E', 12),
(321, 'Dhoraji', '21.74 N', '70.44 E', 12),
(322, 'Dhrangadhra', '23.00 N', '71.46 E', 12),
(323, 'Disa', '24.26 N', '72.18 E', 12),
(324, 'Gandhidham', '23.07 N', '70.13 E', 12),
(325, 'Gandhinagar', '23.30 N', '72.63 E', 12),
(326, 'Ghatlodiya', '23.05 N', '72.55 E', 12),
(327, 'Godhra', '22.77 N', '73.60 E', 12),
(328, 'Gondal', '21.97 N', '70.80 E', 12),
(329, 'Himatnagar', '23.60 N', '72.96 E', 12),
(330, 'Jamnagar', '22.47 N', '70.07 E', 12),
(331, 'Jamnagar', '', '', 12),
(332, 'Jetpur', '21.75 N', '70.61 E', 12),
(333, 'Junagadh', '21.52 N', '70.45 E', 12),
(334, 'Kalol', '23.25 N', '72.49 E', 12),
(335, 'Keshod', '21.31 N', '70.23 E', 12),
(336, 'Khambhat', '22.32 N', '72.61 E', 12),
(337, 'Kundla', '21.35 N', '71.30 E', 12),
(338, 'Mahuva', '21.10 N', '71.75 E', 12),
(339, 'Mangrol', '21.12 N', '70.12 E', 12),
(340, 'Modasa', '23.47 N', '73.30 E', 12),
(341, 'Morvi', '22.82 N', '70.83 E', 12),
(342, 'Nadiad', '22.70 N', '72.85 E', 12),
(343, 'Navagam Ghed', '', '', 12),
(344, 'Navsari', '20.96 N', '72.92 E', 12),
(345, 'Palitana', '21.52 N', '71.83 E', 12),
(346, 'Patan', '23.86 N', '72.11 E', 12),
(347, 'Porbandar', '21.65 N', '69.60 E', 12),
(348, 'Puna', '', '', 12),
(349, 'Rajkot', '22.31 N', '70.79 E', 12),
(350, 'Ramod', '', '', 12),
(351, 'Ranip', '23.03 N', '72.54 E', 12),
(352, 'Siddhapur', '23.92 N', '72.37 E', 12),
(353, 'Sihor', '21.70 N', '71.97 E', 12),
(354, 'Surat', '21.20 N', '72.82 E', 12),
(355, 'Surendranagar', '22.71 N', '71.67 E', 12),
(356, 'Thaltej', '', '', 12),
(357, 'Una', '20.82 N', '71.03 E', 12),
(358, 'Unjha', '23.81 N', '72.38 E', 12),
(359, 'Upleta', '21.75 N', '70.27 E', 12),
(360, 'Vadodara', '22.31 N', '73.18 E', 12),
(361, 'Valsad', '20.62 N', '72.92 E', 12),
(362, 'Vapi', '20.37 N', '72.90 E', 12),
(363, 'Vastral', '', '', 12),
(364, 'Vejalpur', '', '', 12),
(365, 'Veraval', '20.92 N', '70.34 E', 12),
(366, 'Vijalpor', '', '', 12),
(367, 'Visnagar', '23.71 N', '72.54 E', 12),
(368, 'Wadhwan', '22.73 N', '71.72 E', 12),
(369, 'Ambala', '30.38 N', '76.77 E', 14),
(370, 'Ambala Cantonment', '30.39 N', '76.86 E', 14),
(371, 'Ambala Sadar', '30.35 N', '76.84 E', 14),
(372, 'Bahadurgarh', '28.69 N', '76.92 E', 14),
(373, 'Bhiwani', '28.81 N', '76.12 E', 14),
(374, 'Charkhi Dadri', '28.60 N', '76.27 E', 14),
(375, 'Dabwali', '29.95 N', '74.73 E', 14),
(376, 'Faridabad', '28.38 N', '77.30 E', 14),
(377, 'Gohana', '29.13 N', '76.70 E', 14),
(378, 'Hisar', '29.17 N', '75.72 E', 14),
(379, 'Jagadhri', '30.18 N', '77.29 E', 14),
(380, 'Jind', '29.31 N', '76.30 E', 14),
(381, 'Kaithal', '29.81 N', '76.40 E', 14),
(382, 'Karnal', '29.69 N', '76.97 E', 14),
(383, 'Narnaul', '28.04 N', '76.10 E', 14),
(384, 'Narwana', '29.62 N', '76.12 E', 14),
(385, 'Palwal', '28.15 N', '77.32 E', 14),
(386, 'Panchkula', '30.70 N', '76.88 E', 14),
(387, 'Panipat', '29.39 N', '76.96 E', 14),
(388, 'Rewari', '28.19 N', '76.60 E', 14),
(389, 'Rohtak', '28.90 N', '76.58 E', 14),
(390, 'Sirsa', '29.53 N', '75.03 E', 14),
(391, 'Sonipat', '28.99 N', '77.01 E', 14),
(392, 'Thanesar', '29.98 N', '76.82 E', 14),
(393, 'Tohana', '29.70 N', '75.90 E', 14),
(394, 'Yamunanagar', '30.14 N', '77.28 E', 14),
(395, 'Shimla', '31.11 N', '77.16 E', 13),
(396, 'Anantnag', '33.73 N', '75.15 E', 15),
(397, 'Baramula', '34.20 N', '74.35 E', 15),
(398, 'Bari Brahmana', '', '', 15),
(399, 'Jammu', '32.71 N', '74.85 E', 15),
(400, 'Kathua', '32.37 N', '75.52 E', 15),
(401, 'Sopur', '34.30 N', '74.47 E', 15),
(402, 'Srinagar', '34.09 N', '74.79 E', 15),
(403, 'Udhampur', '32.93 N', '75.13 E', 15),
(404, 'Adityapur', '22.80 N', '86.04 E', 16),
(405, 'Bagbahra', '22.82 N', '86.20 E', 16),
(406, 'Bhuli', '23.79 N', '86.38 E', 16),
(407, 'Bokaro', '23.78 N', '85.96 E', 16),
(408, 'Chaibasa', '22.56 N', '85.80 E', 16),
(409, 'Chas', '23.65 N', '86.17 E', 16),
(410, 'Daltenganj', '24.05 N', '84.06 E', 16),
(411, 'Devghar', '24.49 N', '86.69 E', 16),
(412, 'Dhanbad', '23.80 N', '86.42 E', 16),
(413, 'Hazaribag', '24.01 N', '85.36 E', 16),
(414, 'Jamshedpur', '22.79 N', '86.20 E', 16),
(415, 'Jharia', '23.76 N', '86.42 E', 16),
(416, 'Jhumri Tilaiya', '24.43 N', '85.52 E', 16),
(417, 'Jorapokhar', '23.79 N', '86.36 E', 16),
(418, 'Katras', '23.80 N', '86.28 E', 16),
(419, 'Lohardaga', '23.43 N', '84.68 E', 16),
(420, 'Mango', '22.85 N', '86.21 E', 16),
(421, 'Phusro', '23.68 N', '85.86 E', 16),
(422, 'Ramgarh', '23.63 N', '85.51 E', 16),
(423, 'Ranchi', '23.36 N', '85.33 E', 16),
(424, 'Sahibganj', '25.25 N', '87.62 E', 16),
(425, 'Saunda', '23.64 N', '85.37 E', 16),
(426, 'Sindari', '23.68 N', '86.49 E', 16),
(427, 'Bagalkot', '16.19 N', '75.69 E', 18),
(428, 'Bangalore', '12.97 N', '77.56 E', 18),
(429, 'Basavakalyan', '17.87 N', '76.95 E', 18),
(430, 'Belgaum', '15.86 N', '74.50 E', 18),
(431, 'Bellary', '15.14 N', '76.91 E', 18),
(432, 'Bhadravati', '13.84 N', '75.69 E', 18),
(433, 'Bidar', '17.92 N', '77.52 E', 18),
(434, 'Bijapur', '16.83 N', '75.71 E', 18),
(435, 'Bommanahalli', '13.01 N', '77.63 E', 18),
(436, 'Byatarayanapura', '', '', 18),
(437, 'Challakere', '14.32 N', '76.65 E', 18),
(438, 'Chamrajnagar', '11.92 N', '76.95 E', 18),
(439, 'Channapatna', '12.66 N', '77.19 E', 18),
(440, 'Chik Ballapur', '13.47 N', '77.73 E', 18),
(441, 'Chikmagalur', '13.32 N', '75.76 E', 18),
(442, 'Chintamani', '13.40 N', '78.05 E', 18),
(443, 'Chitradurga', '14.23 N', '76.39 E', 18),
(444, 'Dasarahalli', '13.01 N', '77.49 E', 18),
(445, 'Davanagere', '14.46 N', '75.92 E', 18),
(446, 'Dod Ballapur', '13.30 N', '77.52 E', 18),
(447, 'Gadag', '15.44 N', '75.63 E', 18),
(448, 'Gangawati', '15.44 N', '76.52 E', 18),
(449, 'Gokak', '16.18 N', '74.81 E', 18),
(450, 'Gulbarga', '17.34 N', '76.82 E', 18),
(451, 'Harihar', '14.52 N', '75.80 E', 18),
(452, 'Hassan', '13.01 N', '76.08 E', 18),
(453, 'Haveri', '14.80 N', '75.40 E', 18),
(454, 'Hiriyur', '13.97 N', '76.60 E', 18),
(455, 'Hosakote', '', '', 18),
(456, 'Hospet', '15.28 N', '76.37 E', 18),
(457, 'Hubli', '15.36 N', '75.13 E', 18),
(458, 'Ilkal', '15.97 N', '76.13 E', 18),
(459, 'Jamkhandi', '16.51 N', '75.28 E', 18),
(460, 'Kanakapura', '12.54 N', '77.42 E', 18),
(461, 'Karwar', '14.82 N', '74.12 E', 18),
(462, 'Kolar', '13.14 N', '78.13 E', 18),
(463, 'Kollegal', '12.15 N', '77.12 E', 18),
(464, 'Koppal', '15.35 N', '76.15 E', 18),
(465, 'Krishnarajapura', '12.97 N', '77.74 E', 18),
(466, 'Mahadevapura', '', '', 18),
(467, 'Maisuru', '12.31 N', '76.65 E', 18),
(468, 'Mandya', '12.54 N', '76.89 E', 18),
(469, 'Mangaluru', '12.88 N', '74.84 E', 18),
(470, 'Nipani', '16.41 N', '74.38 E', 18),
(471, 'Pattanagere', '', '', 18),
(472, 'Puttur', '12.77 N', '75.22 E', 18),
(473, 'Rabkavi', '16.47 N', '75.11 E', 18),
(474, 'Raichur', '16.21 N', '77.35 E', 18),
(475, 'Ramanagaram', '12.72 N', '77.27 E', 18),
(476, 'Ranibennur', '14.62 N', '75.61 E', 18),
(477, 'Robertsonpet', '12.97 N', '78.28 E', 18),
(478, 'Sagar', '14.17 N', '75.03 E', 18),
(479, 'Shahabad', '17.13 N', '76.93 E', 18),
(480, 'Shahpur', '16.70 N', '76.83 E', 18),
(481, 'Shimoga', '13.93 N', '75.57 E', 18),
(482, 'Shorapur', '16.52 N', '76.75 E', 18),
(483, 'Sidlaghatta', '13.38 N', '77.87 E', 18),
(484, 'Sira', '13.75 N', '76.90 E', 18),
(485, 'Sirsi', '14.62 N', '74.85 E', 18),
(486, 'Tiptur', '13.27 N', '76.48 E', 18),
(487, 'Tumkur', '13.34 N', '77.10 E', 18),
(488, 'Udupi', '13.35 N', '74.75 E', 18),
(489, 'Ullal', '12.80 N', '74.85 E', 18),
(490, 'Yadgir', '16.77 N', '77.13 E', 18),
(491, 'Yelahanka', '13.10 N', '77.60 E', 18),
(492, 'Alappuzha', '9.50 N', '76.33 E', 17),
(493, 'Beypur', '11.18 N', '75.82 E', 17),
(494, 'Cheruvannur', '11.21 N', '75.84 E', 17),
(495, 'Edakkara', '', '', 17),
(496, 'Edathala', '10.03 N', '76.32 E', 17),
(497, 'Kalamassery', '10.05 N', '76.27 E', 17),
(498, 'Kannan Devan Hills', '', '', 17),
(499, 'Kannangad', '12.34 N', '75.09 E', 17),
(500, 'Kannur', '11.86 N', '75.35 E', 17),
(501, 'Kayankulam', '9.17 N', '76.49 E', 17),
(502, 'Kochi', '10.02 N', '76.22 E', 17),
(503, 'Kollam', '8.89 N', '76.58 E', 17),
(504, 'Kottayam', '9.60 N', '76.52 E', 17),
(505, 'Koyilandi', '11.43 N', '75.70 E', 17),
(506, 'Kozhikkod', '11.26 N', '75.78 E', 17),
(507, 'Kunnamkulam', '10.65 N', '76.08 E', 17),
(508, 'Malappuram', '11.07 N', '76.06 E', 17),
(509, 'Manjeri', '11.12 N', '76.11 E', 17),
(510, 'Nedumangad', '8.61 N', '77.00 E', 17),
(511, 'Neyyattinkara', '8.40 N', '77.08 E', 17),
(512, 'Palakkad', '10.78 N', '76.65 E', 17),
(513, 'Pallichal', '', '', 17),
(514, 'Payyannur', '12.10 N', '75.19 E', 17),
(515, 'Ponnani', '10.78 N', '75.92 E', 17),
(516, 'Talipparamba', '12.03 N', '75.36 E', 17),
(517, 'Thalassery', '11.75 N', '75.49 E', 17),
(518, 'Thiruvananthapuram', '8.51 N', '76.95 E', 17),
(519, 'Thrippunithura', '9.94 N', '76.35 E', 17),
(520, 'Thrissur', '10.52 N', '76.21 E', 17),
(521, 'Tirur', '10.91 N', '75.92 E', 17),
(522, 'Tiruvalla', '9.39 N', '76.57 E', 17),
(523, 'Vadakara', '11.61 N', '75.58 E', 17),
(524, 'Ashoknagar', '24.57 N', '77.72 E', 23),
(525, 'Balaghat', '21.80 N', '80.18 E', 23),
(526, 'Basoda', '23.85 N', '77.93 E', 23),
(527, 'Betul', '21.92 N', '77.90 E', 23),
(528, 'Bhind', '26.57 N', '78.77 E', 23),
(529, 'Bhopal', '23.24 N', '77.40 E', 23),
(530, 'BinaEtawa', '24.20 N', '78.20 E', 23),
(531, 'Burhanpur', '21.33 N', '76.22 E', 23),
(532, 'Chhatarpur', '24.92 N', '79.58 E', 23),
(533, 'Chhindwara', '22.07 N', '78.94 E', 23),
(534, 'Dabra', '25.90 N', '78.33 E', 23),
(535, 'Damoh', '23.85 N', '79.44 E', 23),
(536, 'Datia', '25.67 N', '78.45 E', 23),
(537, 'Dewas', '22.97 N', '76.05 E', 23),
(538, 'Dhar', '22.60 N', '75.29 E', 23),
(539, 'Gohad', '26.43 N', '78.45 E', 23),
(540, 'Guna', '24.65 N', '77.30 E', 23),
(541, 'Gwalior', '26.23 N', '78.17 E', 23),
(542, 'Harda', '22.33 N', '77.11 E', 23),
(543, 'Hoshangabad', '22.75 N', '77.71 E', 23),
(544, 'Indore', '22.72 N', '75.86 E', 23),
(545, 'Itarsi', '22.62 N', '77.76 E', 23),
(546, 'Jabalpur', '23.17 N', '79.94 E', 23),
(547, 'Jabalpur Cantonment', '23.16 N', '79.95 E', 23),
(548, 'Jaora', '23.64 N', '75.11 E', 23),
(549, 'Khandwa', '21.83 N', '76.35 E', 23),
(550, 'Khargone', '21.83 N', '75.60 E', 23),
(551, 'Mandidip', '23.10 N', '77.52 E', 23),
(552, 'Mandsaur', '24.07 N', '75.07 E', 23),
(553, 'Mau', '22.56 N', '75.75 E', 23),
(554, 'Morena', '26.51 N', '77.99 E', 23),
(555, 'Murwara', '23.85 N', '80.39 E', 23),
(556, 'Nagda', '23.46 N', '75.42 E', 23),
(557, 'Nimach', '24.47 N', '74.87 E', 23),
(558, 'Pithampur', '', '', 23),
(559, 'Raghogarh', '24.45 N', '77.20 E', 23),
(560, 'Ratlam', '23.35 N', '75.03 E', 23),
(561, 'Rewa', '24.53 N', '81.29 E', 23),
(562, 'Sagar', '23.85 N', '78.75 E', 23),
(563, 'Sarni', '22.04 N', '78.27 E', 23),
(564, 'Satna', '24.58 N', '80.83 E', 23),
(565, 'Sehore', '23.20 N', '77.08 E', 23),
(566, 'Sendhwa', '21.68 N', '75.10 E', 23),
(567, 'Seoni', '22.10 N', '79.55 E', 23),
(568, 'Shahdol', '23.30 N', '81.36 E', 23),
(569, 'Shajapur', '23.43 N', '76.27 E', 23),
(570, 'Sheopur', '25.67 N', '76.70 E', 23),
(571, 'Shivapuri', '25.43 N', '77.65 E', 23),
(572, 'Sidhi', '24.42 N', '81.88 E', 23),
(573, 'Singrauli', '23.84 N', '82.27 E', 23),
(574, 'Tikamgarh', '24.74 N', '78.83 E', 23),
(575, 'Ujjain', '23.19 N', '75.78 E', 23),
(576, 'Vidisha', '23.53 N', '77.80 E', 23),
(577, 'Achalpur', '21.26 N', '77.50 E', 21),
(578, 'Ahmadnagar', '19.10 N', '74.74 E', 21),
(579, 'Akola', '20.71 N', '77.00 E', 21),
(580, 'Akot', '21.10 N', '77.05 E', 21),
(581, 'Amalner', '21.05 N', '75.06 E', 21),
(582, 'Ambajogai', '18.73 N', '76.38 E', 21),
(583, 'Amravati', '20.95 N', '77.76 E', 21),
(584, 'Anjangaon', '21.16 N', '77.31 E', 21),
(585, 'Aurangabad', '19.89 N', '75.32 E', 21),
(586, 'Badlapur', '19.15 N', '73.27 E', 21),
(587, 'Ballarpur', '19.85 N', '79.35 E', 21),
(588, 'Baramati', '18.15 N', '74.58 E', 21),
(589, 'Barsi', '18.24 N', '75.69 E', 21),
(590, 'Basmat', '19.32 N', '77.17 E', 21),
(591, 'Bhadravati', '20.11 N', '79.12 E', 21),
(592, 'Bhandara', '21.18 N', '79.65 E', 21),
(593, 'Bhiwandi', '19.30 N', '73.05 E', 21),
(594, 'Bhusawal', '21.05 N', '75.78 E', 21),
(595, 'Bid', '18.99 N', '75.76 E', 21),
(596, 'Mumbai', '18.96 N', '72.82 E', 21),
(597, 'Buldana', '20.54 N', '76.18 E', 21),
(598, 'Chalisgaon', '20.46 N', '74.99 E', 21),
(599, 'Chandrapur', '19.96 N', '79.30 E', 21),
(600, 'Chikhli', '20.35 N', '76.25 E', 21),
(601, 'Chiplun', '17.53 N', '73.52 E', 21),
(602, 'Chopda', '21.25 N', '75.28 E', 21),
(603, 'Dahanu', '19.97 N', '72.73 E', 21),
(604, 'Deolali', '19.95 N', '73.84 E', 21),
(605, 'Dhule', '20.90 N', '74.77 E', 21),
(606, 'Digdoh', '', '', 21),
(607, 'Diglur', '18.55 N', '77.60 E', 21),
(608, 'Gadchiroli', '20.17 N', '80.00 E', 21),
(609, 'Gondiya', '21.47 N', '80.20 E', 21),
(610, 'Hinganghat', '20.56 N', '78.83 E', 21),
(611, 'Hingoli', '19.72 N', '77.14 E', 21),
(612, 'Ichalkaranji', '16.69 N', '74.46 E', 21),
(613, 'Jalgaon', '21.01 N', '75.56 E', 21),
(614, 'Jalna', '19.85 N', '75.88 E', 21),
(615, 'Kalyan', '19.25 N', '73.16 E', 21),
(616, 'Kamthi', '21.23 N', '79.20 E', 21),
(617, 'Karanja', '20.48 N', '77.48 E', 21),
(618, 'Khadki', '18.57 N', '73.83 E', 21),
(619, 'Khamgaon', '20.70 N', '76.56 E', 21),
(620, 'Khopoli', '18.78 N', '73.33 E', 21),
(621, 'Kolhapur', '16.70 N', '74.22 E', 21),
(622, 'Kopargaon', '19.88 N', '74.48 E', 21),
(623, 'Latur', '18.41 N', '76.58 E', 21),
(624, 'Lonavale', '18.75 N', '73.42 E', 21),
(625, 'Malegaon', '20.56 N', '74.52 E', 21),
(626, 'Malkapur', '20.90 N', '76.19 E', 21),
(627, 'Manmad', '20.26 N', '74.43 E', 21),
(628, 'Mira Bhayandar', '19.29 N', '72.85 E', 21),
(629, 'Nagpur', '21.16 N', '79.08 E', 21),
(630, 'Nalasopara', '19.43 N', '72.78 E', 21),
(631, 'Nanded', '19.17 N', '77.29 E', 21),
(632, 'Nandurbar', '21.38 N', '74.23 E', 21),
(633, 'Nashik', '20.01 N', '73.78 E', 21),
(634, 'Navghar', '19.34 N', '72.90 E', 21),
(636, 'Navi Mumbai', '19.00 N', '73.10 E', 21),
(637, 'Osmanabad', '18.17 N', '76.03 E', 21),
(638, 'Palghar', '19.68 N', '72.75 E', 21),
(639, 'Pandharpur', '17.68 N', '75.31 E', 21),
(640, 'Parbhani', '19.27 N', '76.76 E', 21),
(641, 'Phaltan', '17.98 N', '74.43 E', 21),
(642, 'Pimpri', '18.62 N', '73.80 E', 21),
(643, 'Pune', '18.53 N', '73.84 E', 21),
(644, 'Pune Cantonment', '18.50 N', '73.88 E', 21),
(645, 'Pusad', '19.91 N', '77.57 E', 21),
(646, 'Ratnagiri', '17.00 N', '73.29 E', 21),
(647, 'SangliMiraj', '16.86 N', '74.57 E', 21),
(648, 'Satara', '17.70 N', '74.00 E', 21),
(649, 'Shahada', '21.55 N', '74.47 E', 21),
(650, 'Shegaon', '20.78 N', '76.68 E', 21),
(651, 'Shirpur', '21.35 N', '74.88 E', 21),
(652, 'Sholapur', '17.67 N', '75.89 E', 21),
(653, 'Shrirampur', '19.63 N', '74.64 E', 21),
(654, 'Sillod', '20.30 N', '75.65 E', 21),
(655, 'Thana', '19.20 N', '72.97 E', 21),
(656, 'Udgir', '18.40 N', '77.11 E', 21),
(657, 'Ulhasnagar', '19.23 N', '73.15 E', 21),
(658, 'Uran Islampur', '17.05 N', '74.27 E', 21),
(659, 'Vasai', '19.36 N', '72.80 E', 21),
(660, 'Virar', '19.47 N', '72.79 E', 21),
(661, 'Wadi', '', '', 21),
(662, 'Wani', '20.07 N', '78.95 E', 21),
(663, 'Wardha', '20.75 N', '78.60 E', 21),
(664, 'Warud', '21.47 N', '78.27 E', 21),
(665, 'Washim', '20.10 N', '77.13 E', 21),
(666, 'Yavatmal', '20.41 N', '78.13 E', 21),
(667, 'Imphal', '24.79 N', '93.94 E', 22),
(668, 'Shillong', '25.57 N', '91.87 E', 22),
(669, 'Tura', '25.52 N', '90.22 E', 22),
(670, 'Aizawl', '23.71 N', '92.71 E', 24),
(671, 'Lunglei', '22.88 N', '92.73 E', 24),
(672, 'Dimapur', '25.92 N', '93.73 E', 25),
(673, 'Kohima', '25.67 N', '94.11 E', 25),
(674, 'Wokha', '26.10 N', '94.27 E', 25),
(675, 'Balangir', '20.71 N', '83.50 E', 26),
(676, 'Baleshwar', '21.49 N', '86.95 E', 26),
(677, 'Barbil', '22.12 N', '85.40 E', 26),
(678, 'Bargarh', '21.34 N', '83.61 E', 26),
(679, 'Baripada', '21.95 N', '86.73 E', 26),
(680, 'Bhadrak', '21.06 N', '86.52 E', 26),
(681, 'Bhawanipatna', '19.91 N', '83.17 E', 26),
(682, 'Bhubaneswar', '20.27 N', '85.84 E', 26),
(683, 'Brahmapur', '19.32 N', '84.80 E', 26),
(684, 'Brajrajnagar', '21.82 N', '83.91 E', 26),
(685, 'Dhenkanal', '20.67 N', '85.60 E', 26),
(686, 'Jaypur', '18.86 N', '82.56 E', 26),
(687, 'Jharsuguda', '21.87 N', '84.01 E', 26),
(688, 'Kataka', '20.47 N', '85.88 E', 26),
(689, 'Kendujhar', '21.63 N', '85.58 E', 26),
(690, 'Paradwip', '20.32 N', '86.62 E', 26),
(691, 'Puri', '19.81 N', '85.83 E', 26),
(692, 'Raurkela', '22.24 N', '84.81 E', 26),
(693, 'Raurkela Industrial Township', '', '', 26),
(694, 'Rayagada', '19.18 N', '83.41 E', 26),
(695, 'Sambalpur', '21.47 N', '83.97 E', 26),
(696, 'Sunabeda', '18.69 N', '82.86 E', 26),
(697, 'Karaikal', '10.93 N', '79.83 E', 28),
(698, 'Ozhukarai', '11.94 N', '79.77 E', 28),
(699, 'Pondicherry', '11.94 N', '79.83 E', 28),
(700, 'Abohar', '30.14 N', '74.20 E', 27),
(701, 'Amritsar', '31.64 N', '74.87 E', 27),
(702, 'Barnala', '30.39 N', '75.54 E', 27),
(703, 'Batala', '31.82 N', '75.21 E', 27),
(704, 'Bathinda', '30.17 N', '74.97 E', 27),
(705, 'Dhuri', '30.37 N', '75.87 E', 27),
(706, 'Faridkot', '30.68 N', '74.74 E', 27),
(707, 'Fazilka', '30.41 N', '74.02 E', 27),
(708, 'Firozpur', '30.92 N', '74.61 E', 27),
(709, 'Firozpur Cantonment', '30.95 N', '74.60 E', 27),
(710, 'Gobindgarh', '30.66 N', '76.31 E', 27),
(711, 'Gurdaspur', '32.04 N', '75.40 E', 27),
(712, 'Hoshiarpur', '31.53 N', '75.91 E', 27),
(713, 'Jagraon', '30.78 N', '75.48 E', 27),
(714, 'Jalandhar', '31.33 N', '75.57 E', 27),
(715, 'Kapurthala', '31.38 N', '75.38 E', 27),
(716, 'Khanna', '30.71 N', '76.21 E', 27),
(717, 'Kot Kapura', '30.59 N', '74.80 E', 27),
(718, 'Ludhiana', '30.91 N', '75.84 E', 27),
(719, 'Malaut', '30.23 N', '74.48 E', 27),
(720, 'Maler Kotla', '30.54 N', '75.87 E', 27),
(721, 'Mansa', '29.98 N', '75.39 E', 27),
(722, 'Moga', '30.82 N', '75.17 E', 27),
(723, 'Mohali', '30.78 N', '76.69 E', 27),
(724, 'Pathankot', '32.27 N', '75.64 E', 27),
(725, 'Patiala', '30.32 N', '76.39 E', 27),
(726, 'Phagwara', '31.22 N', '75.76 E', 27),
(727, 'Rajpura', '30.48 N', '76.59 E', 27),
(728, 'Rupnagar', '30.98 N', '76.52 E', 27),
(729, 'Samana', '30.15 N', '76.20 E', 27),
(730, 'Sangrur', '30.25 N', '75.84 E', 27),
(731, 'Sirhind', '30.65 N', '76.38 E', 27),
(732, 'Sunam', '30.13 N', '75.80 E', 27),
(733, 'Tarn Taran', '31.45 N', '74.92 E', 27),
(734, 'Ajmer', '26.45 N', '74.64 E', 29),
(735, 'Alwar', '27.56 N', '76.60 E', 29),
(736, 'Balotra', '25.83 N', '72.23 E', 29),
(737, 'Banswara', '23.54 N', '74.44 E', 29),
(738, 'Baran', '25.10 N', '76.51 E', 29),
(739, 'Bari', '26.65 N', '77.60 E', 29),
(740, 'Barmer', '25.75 N', '71.39 E', 29),
(741, 'Beawar', '26.10 N', '74.30 E', 29),
(742, 'Bharatpur', '27.23 N', '77.49 E', 29),
(743, 'Bhilwara', '25.35 N', '74.63 E', 29),
(744, 'Bhiwadi', '', '', 29),
(745, 'Bikaner', '28.03 N', '73.32 E', 29),
(746, 'Bundi', '25.45 N', '75.63 E', 29),
(747, 'Chittaurgarh', '24.89 N', '74.63 E', 29),
(748, 'Chomun', '27.17 N', '75.72 E', 29),
(749, 'Churu', '28.31 N', '74.96 E', 29),
(750, 'Daosa', '26.88 N', '76.33 E', 29),
(751, 'Dhaulpur', '26.70 N', '77.87 E', 29),
(752, 'Didwana', '27.39 N', '74.57 E', 29),
(753, 'Fatehpur', '27.99 N', '74.95 E', 29),
(754, 'Ganganagar', '29.93 N', '73.86 E', 29),
(755, 'Gangapur', '26.47 N', '76.72 E', 29),
(756, 'Hanumangarh', '29.62 N', '74.29 E', 29),
(757, 'Hindaun', '26.74 N', '77.02 E', 29),
(758, 'Jaipur', '26.92 N', '75.80 E', 29),
(759, 'Jaisalmer', '26.92 N', '70.90 E', 29),
(760, 'Jalor', '25.35 N', '72.62 E', 29),
(761, 'Jhalawar', '24.60 N', '76.15 E', 29),
(762, 'Jhunjhunun', '28.13 N', '75.39 E', 29),
(763, 'Jodhpur', '26.29 N', '73.02 E', 29),
(764, 'Karauli', '26.50 N', '77.02 E', 29),
(765, 'Kishangarh', '26.58 N', '74.86 E', 29),
(766, 'Kota', '25.18 N', '75.83 E', 29),
(767, 'Kuchaman', '27.15 N', '74.85 E', 29),
(768, 'Ladnun', '27.64 N', '74.38 E', 29),
(769, 'Makrana', '27.05 N', '74.72 E', 29),
(770, 'Nagaur', '27.21 N', '73.73 E', 29),
(771, 'Nawalgarh', '27.85 N', '75.27 E', 29),
(772, 'Nimbahera', '24.62 N', '74.68 E', 29),
(773, 'Nokha', '27.60 N', '73.42 E', 29),
(774, 'Pali', '25.79 N', '73.32 E', 29),
(775, 'Rajsamand', '25.07 N', '73.88 E', 29),
(776, 'Ratangarh', '28.09 N', '74.60 E', 29),
(777, 'Sardarshahr', '28.45 N', '74.48 E', 29),
(778, 'Sawai Madhopur', '26.03 N', '76.34 E', 29),
(779, 'Sikar', '27.61 N', '75.13 E', 29),
(780, 'Sujangarh', '27.70 N', '74.46 E', 29),
(781, 'Suratgarh', '29.32 N', '73.90 E', 29),
(782, 'Tonk', '26.17 N', '75.78 E', 29),
(783, 'Udaipur', '24.58 N', '73.69 E', 29),
(784, 'Alandur', '13.03 N', '80.23 E', 31),
(785, 'Ambattur', '13.11 N', '80.17 E', 31),
(786, 'Ambur', '12.80 N', '78.72 E', 31),
(787, 'Arakonam', '13.08 N', '79.67 E', 31),
(788, 'Arani', '12.68 N', '79.28 E', 31),
(789, 'Aruppukkottai', '9.51 N', '78.09 E', 31),
(790, 'Attur', '11.60 N', '78.60 E', 31),
(791, 'Avadi', '13.12 N', '80.11 E', 31),
(792, 'Avaniapuram', '9.86 N', '78.12 E', 31),
(793, 'Bodinayakkanur', '10.01 N', '77.35 E', 31),
(794, 'Chengalpattu', '12.70 N', '79.97 E', 31),
(795, 'Dharapuram', '10.74 N', '77.52 E', 31),
(796, 'Dharmapuri', '12.13 N', '78.16 E', 31),
(797, 'Dindigul', '10.36 N', '77.97 E', 31),
(798, 'Erode', '11.35 N', '77.73 E', 31),
(799, 'Gopichettipalaiyam', '11.46 N', '77.43 E', 31),
(800, 'Gudalur', '11.76 N', '79.75 E', 31),
(801, 'Gudiyattam', '12.95 N', '78.86 E', 31),
(802, 'Hosur', '12.72 N', '77.82 E', 31),
(803, 'Idappadi', '11.58 N', '77.85 E', 31),
(804, 'Kadayanallur', '9.08 N', '77.35 E', 31),
(805, 'Kambam', '9.74 N', '77.28 E', 31),
(806, 'Kanchipuram', '12.84 N', '79.70 E', 31),
(807, 'Karur', '10.96 N', '78.07 E', 31),
(808, 'Kavundampalaiyam', '11.05 N', '76.92 E', 31),
(809, 'Kovilpatti', '9.19 N', '77.86 E', 31),
(810, 'Koyampattur', '11.01 N', '76.96 E', 31),
(811, 'Krishnagiri', '12.54 N', '78.21 E', 31),
(812, 'Kumarapalaiyam', '11.44 N', '77.73 E', 31),
(813, 'Kumbakonam', '10.97 N', '79.38 E', 31),
(814, 'Kuniyamuthur', '10.98 N', '76.95 E', 31),
(815, 'Kurichi', '10.92 N', '76.96 E', 31),
(816, 'Madhavaram', '13.02 N', '80.26 E', 31),
(817, 'Madras', '13.09 N', '80.27 E', 31),
(818, 'Madurai', '9.92 N', '78.12 E', 31),
(819, 'Maduravoyal', '', '', 31),
(820, 'Mannargudi', '10.67 N', '79.45 E', 31),
(821, 'Mayiladuthurai', '11.11 N', '79.65 E', 31),
(822, 'Mettupalayam', '11.30 N', '76.94 E', 31),
(823, 'Mettur', '11.80 N', '77.80 E', 31),
(824, 'Nagapattinam', '10.80 N', '79.84 E', 31),
(825, 'Nagercoil', '8.18 N', '77.43 E', 31),
(826, 'Namakkal', '11.23 N', '78.17 E', 31),
(827, 'Nerkunram', '13.04 N', '80.26 E', 31),
(828, 'Neyveli', '11.62 N', '79.48 E', 31),
(829, 'Pallavaram', '12.99 N', '80.16 E', 31),
(830, 'Pammal', '12.97 N', '80.11 E', 31),
(831, 'Pannuratti', '11.78 N', '79.55 E', 31),
(832, 'Paramakkudi', '9.54 N', '78.59 E', 31),
(833, 'Pattukkottai', '10.43 N', '79.31 E', 31),
(834, 'Pollachi', '10.67 N', '77.00 E', 31),
(835, 'Pudukkottai', '10.39 N', '78.82 E', 31),
(836, 'Puliyankudi', '9.18 N', '77.40 E', 31),
(837, 'Punamalli', '13.05 N', '80.11 E', 31),
(838, 'Rajapalaiyam', '9.46 N', '77.55 E', 31),
(839, 'Ramanathapuram', '9.37 N', '78.83 E', 31),
(840, 'Salem', '11.67 N', '78.16 E', 31),
(841, 'Sankarankoil', '9.17 N', '77.54 E', 31),
(842, 'Sivakasi', '9.46 N', '77.79 E', 31),
(843, 'Srivilliputtur', '9.52 N', '77.63 E', 31),
(844, 'Tambaram', '12.93 N', '80.12 E', 31),
(845, 'Tenkasi', '8.96 N', '77.31 E', 31),
(846, 'Thanjavur', '10.79 N', '79.13 E', 31),
(847, 'Theni Allinagaram', '10.02 N', '77.48 E', 31),
(848, 'Thiruthangal', '9.48 N', '77.83 E', 31),
(849, 'Thiruvarur', '10.78 N', '79.64 E', 31),
(850, 'Thuthukkudi', '8.81 N', '78.14 E', 31),
(851, 'Tindivanam', '12.24 N', '79.65 E', 31),
(852, 'Tiruchchirappalli', '10.81 N', '78.69 E', 31),
(853, 'Tiruchengode', '11.38 N', '77.90 E', 31),
(854, 'Tirunelveli', '8.73 N', '77.69 E', 31),
(855, 'Tirupathur', '12.50 N', '78.57 E', 31),
(856, 'Tiruppur', '11.09 N', '77.35 E', 31),
(857, 'Tiruvannamalai', '12.24 N', '79.07 E', 31),
(858, 'Tiruvottiyur', '13.16 N', '80.29 E', 31),
(859, 'Udagamandalam', '11.42 N', '76.69 E', 31),
(860, 'Udumalaipettai', '10.58 N', '77.24 E', 31),
(861, 'Valparai', '10.38 N', '76.99 E', 31),
(862, 'Vaniyambadi', '12.69 N', '78.60 E', 31),
(863, 'Velampalaiyam', '', '', 31),
(864, 'Velluru', '12.92 N', '79.13 E', 31),
(865, 'Viluppuram', '11.95 N', '79.49 E', 31),
(866, 'Virappanchatram', '11.40 N', '77.70 E', 31),
(867, 'Virudhachalam', '11.51 N', '79.32 E', 31),
(868, 'Virudunagar', '9.59 N', '77.95 E', 31),
(869, 'Agartala', '23.84 N', '91.27 E', 32),
(870, 'Agartala MCl', '', '', 32),
(871, 'Badharghat', '', '', 32),
(872, 'Agra', '27.19 N', '78.01 E', 34),
(873, 'Aligarh', '27.89 N', '78.06 E', 34),
(874, 'Allahabad', '25.45 N', '81.84 E', 34),
(875, 'Amroha', '28.91 N', '78.46 E', 34),
(876, 'Aonla', '28.28 N', '79.15 E', 34),
(877, 'Auraiya', '26.47 N', '79.50 E', 34),
(878, 'Ayodhya', '26.80 N', '82.20 E', 34),
(879, 'Azamgarh', '26.07 N', '83.18 E', 34),
(880, 'Baheri', '28.78 N', '79.50 E', 34),
(881, 'Bahraich', '27.58 N', '81.59 E', 34),
(882, 'Ballia', '25.76 N', '84.15 E', 34),
(883, 'Balrampur', '27.43 N', '82.18 E', 34),
(884, 'Banda', '25.48 N', '80.33 E', 34),
(885, 'Baraut', '29.10 N', '77.26 E', 34),
(886, 'Bareli', '28.36 N', '79.41 E', 34),
(887, 'Basti', '26.80 N', '82.74 E', 34),
(888, 'Behta Hajipur', '', '', 34),
(889, 'Bela', '25.92 N', '81.99 E', 34),
(890, 'Bhadohi', '25.40 N', '82.56 E', 34),
(891, 'Bijnor', '29.38 N', '78.13 E', 34),
(892, 'Bisalpur', '28.30 N', '79.80 E', 34),
(893, 'Biswan', '27.50 N', '81.00 E', 34),
(894, 'Budaun', '28.04 N', '79.12 E', 34),
(895, 'Bulandshahr', '28.41 N', '77.85 E', 34),
(896, 'Chandausi', '28.46 N', '78.78 E', 34),
(897, 'Chandpur', '29.14 N', '78.27 E', 34),
(898, 'Chhibramau', '27.15 N', '79.52 E', 34),
(899, 'Chitrakut Dham', '25.20 N', '80.84 E', 34),
(900, 'Dadri', '28.57 N', '77.55 E', 34),
(901, 'Deoband', '29.70 N', '77.67 E', 34),
(902, 'Deoria', '26.51 N', '83.78 E', 34),
(903, 'Etah', '27.57 N', '78.64 E', 34),
(904, 'Etawah', '26.78 N', '79.01 E', 34),
(905, 'Faizabad', '26.78 N', '82.14 E', 34),
(906, 'Faridpur', '28.22 N', '79.53 E', 34),
(907, 'Farrukhabad', '27.40 N', '79.57 E', 34),
(908, 'Fatehpur', '25.93 N', '80.81 E', 34),
(909, 'Firozabad', '27.15 N', '78.39 E', 34),
(910, 'Gajraula', '28.85 N', '78.23 E', 34),
(911, 'Ganga Ghat', '26.52 N', '80.45 E', 34),
(912, 'Gangoh', '29.77 N', '77.25 E', 34),
(913, 'Ghaziabad', '28.66 N', '77.41 E', 34),
(914, 'Ghazipur', '25.59 N', '83.59 E', 34),
(915, 'Gola Gokarannath', '28.08 N', '80.47 E', 34),
(916, 'Gonda', '27.14 N', '81.95 E', 34),
(917, 'Gorakhpur', '26.76 N', '83.36 E', 34),
(918, 'Hapur', '28.73 N', '77.77 E', 34),
(919, 'Hardoi', '27.42 N', '80.12 E', 34),
(920, 'Hasanpur', '28.72 N', '78.28 E', 34),
(921, 'Hathras', '27.60 N', '78.04 E', 34),
(922, 'Jahangirabad', '28.42 N', '78.10 E', 34),
(923, 'Jalaun', '26.15 N', '79.35 E', 34),
(924, 'Jaunpur', '25.76 N', '82.69 E', 34),
(925, 'Jhansi', '25.45 N', '78.56 E', 34),
(926, 'Kadi', '23.31 N', '72.33 E', 34),
(927, 'Kairana', '29.40 N', '77.20 E', 34),
(928, 'Kannauj', '27.06 N', '79.91 E', 34),
(929, 'Kanpur', '26.47 N', '80.33 E', 34),
(930, 'Kanpur Cantonment', '26.50 N', '80.28 E', 34),
(931, 'Kasganj', '27.81 N', '78.63 E', 34),
(932, 'Khatauli', '29.28 N', '77.72 E', 34),
(933, 'Khora', '', '', 34),
(934, 'Khurja', '28.26 N', '77.85 E', 34),
(935, 'Kiratpur', '29.52 N', '78.20 E', 34),
(936, 'Kosi Kalan', '27.80 N', '77.44 E', 34),
(937, 'Laharpur', '27.72 N', '80.90 E', 34),
(938, 'Lakhimpur', '27.95 N', '80.78 E', 34),
(939, 'Lakhnau', '26.85 N', '80.92 E', 34),
(940, 'Lakhnau Cantonment', '26.81 N', '80.97 E', 34),
(941, 'Lalitpur', '24.70 N', '78.41 E', 34),
(942, 'Loni', '28.75 N', '77.28 E', 34),
(943, 'Mahoba', '25.30 N', '79.87 E', 34),
(944, 'Mainpuri', '27.24 N', '79.02 E', 34),
(945, 'Mathura', '27.50 N', '77.68 E', 34),
(946, 'Mau', '25.96 N', '83.56 E', 34),
(947, 'Mauranipur', '25.24 N', '79.13 E', 34),
(948, 'Mawana', '29.11 N', '77.91 E', 34),
(949, 'Mirat', '28.99 N', '77.70 E', 34),
(950, 'Mirat Cantonment', '29.02 N', '77.67 E', 34),
(951, 'Mirzapur', '25.16 N', '82.56 E', 34),
(952, 'Modinagar', '28.92 N', '77.62 E', 34),
(953, 'Moradabad', '28.84 N', '78.76 E', 34),
(954, 'Mubarakpur', '26.09 N', '83.28 E', 34),
(955, 'Mughal Sarai', '25.30 N', '83.12 E', 34),
(956, 'Muradnagar', '28.78 N', '77.50 E', 34),
(957, 'Muzaffarnagar', '29.48 N', '77.69 E', 34),
(958, 'Nagina', '29.45 N', '78.43 E', 34),
(959, 'Najibabad', '29.62 N', '78.33 E', 34),
(960, 'Nawabganj', '26.94 N', '81.19 E', 34),
(961, 'Noida', '28.58 N', '77.33 E', 34),
(962, 'Obra', '24.42 N', '82.98 E', 34),
(963, 'Orai', '25.99 N', '79.45 E', 34),
(964, 'Pilibhit', '28.64 N', '79.81 E', 34),
(965, 'Pilkhuwa', '28.72 N', '77.65 E', 34),
(966, 'Rae Bareli', '26.23 N', '81.23 E', 34),
(967, 'Ramgarh Nagla Kothi', '', '', 34),
(968, 'Rampur', '28.82 N', '79.02 E', 34),
(969, 'Rath', '25.58 N', '79.57 E', 34),
(970, 'Renukut', '24.20 N', '83.03 E', 34),
(971, 'Saharanpur', '29.97 N', '77.54 E', 34),
(972, 'Sahaswan', '28.08 N', '78.74 E', 34),
(973, 'Sambhal', '28.59 N', '78.56 E', 34),
(974, 'Sandila', '27.08 N', '80.52 E', 34),
(975, 'Shahabad', '27.65 N', '79.95 E', 34),
(976, 'Shahjahanpur', '27.88 N', '79.90 E', 34),
(977, 'Shamli', '29.46 N', '77.31 E', 34),
(978, 'Sherkot', '29.35 N', '78.58 E', 34),
(979, 'Shikohabad', '27.12 N', '78.58 E', 34),
(980, 'Sikandarabad', '28.44 N', '77.69 E', 34),
(981, 'Sitapur', '27.57 N', '80.69 E', 34),
(982, 'Sukhmalpur Nizamabad', '', '', 34),
(983, 'Sultanpur', '26.26 N', '82.06 E', 34),
(984, 'Tanda', '26.55 N', '82.65 E', 34),
(985, 'Tilhar', '27.98 N', '79.73 E', 34),
(986, 'Tundla', '27.20 N', '78.28 E', 34),
(987, 'Ujhani', '28.02 N', '79.02 E', 34),
(988, 'Unnao', '26.55 N', '80.49 E', 34),
(989, 'Varanasi', '25.32 N', '83.01 E', 34),
(990, 'Vrindavan', '27.58 N', '77.70 E', 34),
(991, 'Dehra Dun', '30.34 N', '78.05 E', 33),
(992, 'Dehra Dun Cantonment', '30.34 N', '77.97 E', 33),
(993, 'Gola Range', '', '', 33),
(994, 'Haldwani', '29.23 N', '79.52 E', 33),
(995, 'Haridwar', '29.98 N', '78.16 E', 33),
(996, 'Kashipur', '29.22 N', '78.96 E', 33),
(997, 'Pithoragarh', '29.58 N', '80.22 E', 33),
(998, 'Rishikesh', '30.12 N', '78.29 E', 33),
(999, 'Rudrapur', '', '', 33),
(1000, 'Rurki', '29.87 N', '77.89 E', 33);

-- --------------------------------------------------------

--
-- Table structure for table `education_details`
--

CREATE TABLE `education_details` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `education_type` int(2) NOT NULL,
  `edu_cource` varchar(255) NOT NULL,
  `institute_name` varchar(500) NOT NULL,
  `passing_year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_details`
--

INSERT INTO `education_details` (`id`, `member_id`, `education_type`, `edu_cource`, `institute_name`, `passing_year`) VALUES
(1, 51, 1, '10', 'test', 2005),
(2, 51, 2, '12', 'kotilya', 2005);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Superadmin', '{\"0\":\"1\",\"0_0\":\"1\",\"0_1\":\"1\",\"0_1_0\":\"1\",\"0_1_1\":\"1\",\"0_1_2\":\"1\",\"1\":\"1\",\"1_0\":\"1\",\"1_1\":\"1\",\"1_2\":\"1\",\"1_3\":\"1\",\"1_4\":\"1\",\"1_5\":\"1\",\"1_6\":\"1\",\"1_7\":\"1\",\"1_8\":\"1\",\"2\":\"1\",\"2_0\":\"1\",\"3\":\"1\",\"3_0\":\"0\",\"3_1\":\"0\"}'),
(2, 'admin', '{\"0\":\"1\",\"0_0\":\"1\",\"0_1\":\"1\",\"0_1_0\":\"0\",\"0_1_1\":\"0\",\"0_1_2\":\"1\",\"1\":\"1\",\"1_0\":\"1\",\"1_1\":\"1\",\"1_2\":\"0\",\"1_3\":\"1\",\"1_4\":\"1\",\"1_5\":\"1\",\"1_6\":\"1\",\"1_7\":\"1\",\"1_8\":\"1\",\"2\":\"0\",\"2_0\":\"0\",\"3\":\"0\",\"3_0\":\"0\"}'),
(3, 'test', '{\"0\":\"0\",\"0_0\":\"0\",\"0_1\":\"0\",\"0_1_0\":\"0\",\"0_1_1\":\"0\",\"0_1_2\":\"0\",\"1\":\"0\",\"1_0\":\"0\",\"1_1\":\"0\",\"1_2\":\"0\",\"1_3\":\"0\",\"1_4\":\"0\",\"1_5\":\"0\",\"1_6\":\"0\",\"2\":\"0\",\"2_0\":\"0\",\"3\":\"1\",\"3_0\":\"1\"}'),
(4, 'manager', '{\"0\":\"0\",\"0_0\":\"0\",\"0_1\":\"0\",\"0_1_0\":\"0\",\"0_1_1\":\"0\",\"0_1_2\":\"0\",\"1\":\"1\",\"1_0\":\"1\",\"1_1\":\"1\",\"1_2\":\"1\",\"1_3\":\"0\",\"1_4\":\"0\",\"1_5\":\"1\",\"1_6\":\"0\",\"1_7\":\"0\",\"1_8\":\"1\",\"2\":\"1\",\"2_0\":\"1\",\"3\":\"0\",\"3_0\":\"0\"}'),
(5, 'test_core', '{\"0\":\"1\",\"0_0\":\"1\",\"0_1\":\"1\",\"0_1_0\":\"1\",\"0_1_1\":\"1\",\"0_1_2\":\"1\",\"1\":\"1\",\"1_0\":\"1\",\"1_1\":\"1\",\"1_2\":\"1\",\"1_3\":\"1\",\"1_4\":\"1\",\"1_5\":\"1\",\"1_6\":\"0\",\"1_7\":\"1\",\"1_8\":\"1\",\"2\":\"1\",\"2_0\":\"1\",\"3\":\"1\",\"3_0\":\"1\"}');

-- --------------------------------------------------------

--
-- Stand-in structure for view `installments_notification`
-- (See below for the actual view)
--
CREATE TABLE `installments_notification` (
`id` int(11)
,`loan_id` int(11)
,`loan_amount` double(10,2)
,`interest` double(10,2)
,`payment_date` date
,`payment_end_date` date
,`paid_date` date
,`penalty` double(10,2)
,`payment_status` int(2)
,`member_id` int(11)
,`member_name` varchar(307)
);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `branch` varchar(150) NOT NULL,
  `existing_loans_detail` text NOT NULL,
  `credit_card_detail` text NOT NULL,
  `bank_account_detail` text NOT NULL,
  `insurance_detail` text NOT NULL,
  `loan_purpose` int(11) NOT NULL,
  `amount_of_loan` double NOT NULL,
  `loan_for_months` int(11) DEFAULT NULL,
  `finance_charge` double DEFAULT NULL,
  `amount_financed` double DEFAULT NULL,
  `percentage_rate` double DEFAULT NULL,
  `installment_per_month` double DEFAULT NULL,
  `total_payment` double DEFAULT NULL,
  `agreement_start` date DEFAULT NULL,
  `agreement_end` date DEFAULT NULL,
  `loan_approve_date` datetime DEFAULT NULL,
  `loan_complete_date` datetime NOT NULL,
  `loan_status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `member_id`, `branch`, `existing_loans_detail`, `credit_card_detail`, `bank_account_detail`, `insurance_detail`, `loan_purpose`, `amount_of_loan`, `loan_for_months`, `finance_charge`, `amount_financed`, `percentage_rate`, `installment_per_month`, `total_payment`, `agreement_start`, `agreement_end`, `loan_approve_date`, `loan_complete_date`, `loan_status`, `date`) VALUES
(1, 50, 'Samaj Name', '[]', '[]', '[]', '[]', 5, 300000, 6, 100, 1200, 15, 212, 1272, '2019-04-30', '2019-09-30', '2019-04-25 16:05:28', '2019-04-25 14:50:53', 2, '2019-04-20 17:42:53'),
(2, 48, 'Samaj Name', '[]', '[]', '[]', '[]', 4, 500000, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, '2019-04-25 15:13:48', '2019-04-25 15:22:52', 3, '2019-04-25 14:55:54'),
(3, 41, 'Samaj Name', '[]', '[]', '[]', '[]', 10, 20000, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, '2019-05-13 12:04:34', '2019-04-25 15:08:18', 2, '2019-04-25 15:02:35'),
(5, 42, 'Samaj Name', '[]', '[]', '[]', '[]', 8, 450000, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 1, '2019-05-15 16:22:28'),
(6, 43, 'Samaj Name', '[]', '[]', '[]', '[]', 4, 370000, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 1, '2019-05-15 16:22:28'),
(7, 44, 'Samaj Name', '[]', '[]', '[]', '[]', 10, 1000, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, '2019-05-20 14:20:55', '2019-05-20 17:02:50', 3, '2019-05-15 16:22:28'),
(8, 45, 'Samaj Name', '[]', '[]', '[]', '[]', 4, 450000, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, '2019-05-20 14:19:30', '0000-00-00 00:00:00', 2, '2019-05-15 16:22:28'),
(9, 46, 'Samaj Name', '[]', '[]', '[]', '[]', 10, 420000, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, '2019-05-15 19:35:19', '0000-00-00 00:00:00', 2, '2019-05-15 16:22:28'),
(10, 47, 'Samaj Name', '[]', '[]', '[]', '[]', 10, 390000, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, '2019-05-15 16:23:18', '0000-00-00 00:00:00', 2, '2019-05-15 16:22:28'),
(11, 51, 'Samaj Name', '[]', '[]', '[]', '[]', 1, 24000, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, '2019-05-22 19:31:05', '0000-00-00 00:00:00', 2, '2019-05-22 19:30:48');

--
-- Triggers `loans`
--
DELIMITER $$
CREATE TRIGGER `delete_loans_after` AFTER DELETE ON `loans` FOR EACH ROW BEGIN
	DELETE FROM loan_applicant WHERE loan_id = old.id;
	DELETE FROM loan_installments WHERE loan_id = old.id;
    DELETE FROM loan_assets WHERE loan_id = old.id;
    DELETE FROM loan_guarantor WHERE loan_id = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_applicant`
--

CREATE TABLE `loan_applicant` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `borrower_name` varchar(255) NOT NULL,
  `sod_name` varchar(255) NOT NULL,
  `current_address` text NOT NULL,
  `current_state` int(11) NOT NULL,
  `current_city` int(11) NOT NULL,
  `permanent_address` text NOT NULL,
  `permanent_state` int(11) NOT NULL,
  `permanent_city` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `mobile_no` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rent_paid` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` int(1) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `dependent_child` int(2) NOT NULL,
  `dependent_others` int(2) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `passport_no` varchar(50) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `qualification` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `retirement_age` int(11) NOT NULL,
  `monthly_income` double NOT NULL,
  `other_income` double NOT NULL,
  `other_income_source` varchar(255) NOT NULL,
  `emp_business_name` varchar(255) NOT NULL,
  `emp_business_state` int(11) NOT NULL,
  `emp_business_city` int(11) NOT NULL,
  `emp_business_pin` int(11) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `witness_name` varchar(255) NOT NULL,
  `witness_email` varchar(255) NOT NULL,
  `witness_mobile_no` bigint(20) NOT NULL,
  `witness_address` varchar(255) NOT NULL,
  `witness_state` int(11) NOT NULL,
  `witness_city` int(11) NOT NULL,
  `witness_zipcode` int(11) NOT NULL,
  `occupation_others` varchar(255) NOT NULL,
  `organisation_others` varchar(255) NOT NULL,
  `industry_others` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_applicant`
--

INSERT INTO `loan_applicant` (`id`, `userid`, `loan_id`, `borrower_name`, `sod_name`, `current_address`, `current_state`, `current_city`, `permanent_address`, `permanent_state`, `permanent_city`, `zipcode`, `phone_no`, `mobile_no`, `email`, `rent_paid`, `date_of_birth`, `gender`, `marital_status`, `dependent_child`, `dependent_others`, `pan_no`, `passport_no`, `occupation`, `qualification`, `designation`, `retirement_age`, `monthly_income`, `other_income`, `other_income_source`, `emp_business_name`, `emp_business_state`, `emp_business_city`, `emp_business_pin`, `organisation`, `industry`, `category`, `witness_name`, `witness_email`, `witness_mobile_no`, `witness_address`, `witness_state`, `witness_city`, `witness_zipcode`, `occupation_others`, `organisation_others`, `industry_others`) VALUES
(1, 50, 1, 'Mr. Alexa Fonseca', 'father name', '47318-559, Largo Fábio, 44678\r\nCarla do Norte - GO', 12, 306, '47318-559, Largo Fábio, 44678\r\nCarla do Norte - GO', 12, 306, 452852, 2147483647, 4826130389, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'Manufacturing', 'OBC', '', '', 0, '', 0, 0, 0, '', '', ''),
(2, 48, 2, 'Mr. Ashley Galhardo', 'father name', '50431-285, Rua Serrano, 4681. F\r\nThales do Leste - SP', 29, 734, '50431-285, Rua Serrano, 4681. F\r\nThales do Leste - SP', 29, 734, 452548, 2147483647, 5439715428, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'Trading', 'ST', '', '', 0, '', 0, 0, 0, '', '', ''),
(3, 41, 3, 'Dr. Luis Flores', 'father name', '71746-989, Avenida Simão, 76885. Apto 0308\r\nIvan d&#039;Oeste - DF', 6, 262, '71746-989, Avenida Simão, 76885. Apto 0308\r\nIvan d&#039;Oeste - DF', 6, 262, 452749, 2147483647, 1623215334, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'Manufacturing', 'ST', '', '', 0, '', 0, 0, 0, '', '', ''),
(4, 42, 5, 'Ms. Henrique Fonseca', 'Deviis Society', '32530-313, Travessa Gonçalves, 4\nRezende do Norte - AP', 29, 734, '32530-313, Travessa Gonçalves, 4\nRezende do Norte - AP', 29, 734, 452113, 2147483647, 5521342934, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'others', 'SC', '', '', 0, '', 0, 0, 0, '', '', 'Other Industry Name'),
(5, 43, 6, 'Mr. Samuel Ortega', 'Deviis Society', '05903-090, Largo Evandro, 171. Bc. 14 Ap. 26\nVila Santiago do Norte - SP', 23, 524, '05903-090, Largo Evandro, 171. Bc. 14 Ap. 26\nVila Santiago do Norte - SP', 23, 524, 452398, 2147483647, 8728370122, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'others', 'General', '', '', 0, '', 0, 0, 0, '', '', 'Other Industry Name'),
(6, 44, 7, 'Mr. Taís Benites', 'Deviis Society', '84888-145, Largo de Aguiar, 1152. Anexo\nRivera do Leste - BA', 9, 274, '84888-145, Largo de Aguiar, 1152. Anexo\nRivera do Leste - BA', 9, 274, 452234, 1144460173, 1320687250, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'Services', 'General', '', '', 0, '', 0, 0, 0, '', '', ''),
(7, 45, 8, 'Mr. Fabio Leon', 'Deviis Society', '12132-164, Rua Queirós, 79589. Bc. 1 Ap. 46\r\nCordeiro do Sul - MG', 12, 306, '12132-164, Rua Queirós, 79589. Bc. 1 Ap. 46\r\nCordeiro do Sul - MG', 12, 306, 452176, 2147483647, 1446789961, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'others', 'ST', '', '', 0, '', 0, 0, 0, '', '', 'Other Industry Name'),
(8, 46, 9, 'Dr. Ariadna Lozano', 'Deviis Society', '71790-690, Travessa Soares, 1499. 1º Andar\nMateus d\'Oeste - RR', 29, 734, '71790-690, Travessa Soares, 1499. 1º Andar\nMateus d\'Oeste - RR', 29, 734, 452840, 2147483647, 1436523625, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'others', 'General', '', '', 0, '', 0, 0, 0, '', '', 'Other Industry Name'),
(9, 47, 10, 'Mr. Emiliano Santiago', 'Deviis Society', '58709-721, Avenida Valentina, 50. 55º Andar\r\nLovato do Norte - RR', 12, 306, '58709-721, Avenida Valentina, 50. 55º Andar\r\nLovato do Norte - RR', 12, 306, 452741, 2147483647, 6636922083, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'Services', 'SC', '', '', 0, '', 0, 0, 0, '', '', ''),
(10, 51, 11, 'Mr. test member', 'father name', 'PTC Musakhedi MP indore', 23, 544, 'PTC Musakhedi MP indore', 23, 544, 452001, 2147483647, 7879651193, '', 0, '0000-00-00', 0, '', 0, 0, '', '', '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 'Services', 'ST', '', '', 0, '', 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `loan_assets`
--

CREATE TABLE `loan_assets` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `assets_name` varchar(255) NOT NULL,
  `assets_description` text NOT NULL,
  `assets_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_assets`
--

INSERT INTO `loan_assets` (`id`, `loan_id`, `assets_name`, `assets_description`, `assets_price`) VALUES
(1, 1, 'Asset 1', 'askdj faksd ksadlfk', 785100.00),
(2, 1, 'asset 2', 'asd fasd fsadf sdf sdf', 2000.00),
(3, 2, 'Asset 1', 'Asset 1 price is 25000', 25000.00),
(4, 2, 'Asset 2', 'Asset 2 price is 25000', 475000.00),
(5, 3, 'asset 2', 'test', 2500.00);

-- --------------------------------------------------------

--
-- Table structure for table `loan_guarantor`
--

CREATE TABLE `loan_guarantor` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `guarantor_name` varchar(255) NOT NULL,
  `guarantor_member_id` int(11) NOT NULL,
  `guarantor_bail_money` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_guarantor`
--

INSERT INTO `loan_guarantor` (`id`, `loan_id`, `guarantor_name`, `guarantor_member_id`, `guarantor_bail_money`) VALUES
(1, 1, 'Mrs. Gustavo Zamana', 33, 50000.00),
(2, 1, 'Miss Santiago Guerra', 22, 50000.00),
(3, 2, 'Ms. Luciano Ortiz', 11, 50000.00),
(4, 2, 'Mr. Teobaldo Escobar', 23, 50000.00),
(5, 3, 'Mr. Ashley Azevedo', 12, 20000.00),
(6, 5, 'Dr. Ariadna Lozano', 46, 280000.00),
(7, 5, 'Mrs. Gustavo Zamana', 33, 290000.00),
(8, 6, 'Mrs. Benjamin Benites', 31, 500000.00),
(9, 6, 'Mr. Ashley Galhardo', 48, 290000.00),
(10, 7, 'Mrs. Gustavo Zamana', 33, 450000.00),
(11, 7, 'Miss Tomás Brito', 27, 340000.00),
(12, 8, 'Miss Simon D\'ávila', 15, 240000.00),
(13, 8, 'Ms. Daniel Rodrigues', 9, 190000.00),
(14, 9, 'Dr. Dante Molina', 28, 310000.00),
(15, 9, 'Dr. Sofia Quintana', 14, 220000.00),
(16, 10, 'Dr. Mia Marques', 17, 200000.00),
(17, 10, 'Mr. Felipe Vale', 29, 350000.00),
(18, 11, 'Mr. Teobaldo Escobar', 23, 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `loan_installments`
--

CREATE TABLE `loan_installments` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `loan_amount` double(10,2) NOT NULL,
  `interest` double(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_end_date` date NOT NULL,
  `paid_date` date NOT NULL,
  `penalty` double(10,2) NOT NULL,
  `maid` int(11) NOT NULL COMMENT 'foraign key of member_account',
  `payment_status` int(2) NOT NULL COMMENT '0=live,1=payment pending,2=payment done'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_installments`
--

INSERT INTO `loan_installments` (`id`, `loan_id`, `loan_amount`, `interest`, `payment_date`, `payment_end_date`, `paid_date`, `penalty`, `maid`, `payment_status`) VALUES
(1, 2, 20000.00, 0.00, '0000-00-00', '0000-00-00', '0000-00-00', 0.00, 0, 0),
(2, 2, 4000.00, 200.00, '2019-04-30', '2019-05-07', '2019-04-25', 0.00, 0, 2),
(3, 2, 4000.00, 160.00, '2019-05-31', '2019-06-07', '2019-04-25', 0.00, 0, 2),
(4, 2, 4000.00, 120.00, '2019-06-30', '2019-07-07', '2019-04-25', 0.00, 0, 2),
(5, 2, 4000.00, 80.00, '2019-07-31', '2019-08-07', '2019-04-25', 0.00, 0, 2),
(6, 2, 4000.00, 40.00, '2019-08-31', '2019-09-07', '2019-04-25', 0.00, 0, 2),
(12, 1, 300000.00, 0.00, '0000-00-00', '0000-00-00', '0000-00-00', 0.00, 0, 0),
(13, 1, 4000.00, 3750.00, '2019-04-30', '2019-05-07', '2019-04-25', 0.00, 0, 2),
(14, 1, 8000.00, 3700.00, '2019-05-31', '2019-06-07', '2019-05-15', 0.00, 0, 2),
(15, 3, 20000.00, 0.00, '0000-00-00', '0000-00-00', '0000-00-00', 0.00, 0, 0),
(16, 3, 3000.00, 200.00, '2019-05-31', '2019-06-07', '2019-05-13', 0.00, 0, 2),
(17, 3, 0.00, 170.00, '2019-06-30', '2019-07-07', '0000-00-00', 0.00, 0, 1),
(18, 10, 390000.00, 0.00, '0000-00-00', '0000-00-00', '0000-00-00', 0.00, 0, 0),
(19, 10, 5000.00, 3900.00, '2019-05-31', '2019-06-07', '2019-05-15', 0.00, 0, 2),
(20, 10, 6000.00, 3850.00, '2019-06-30', '2019-07-07', '2019-05-15', 0.00, 0, 2),
(21, 10, 6000.00, 3790.00, '2019-07-31', '2019-08-07', '2019-05-22', 0.00, 0, 2),
(22, 9, 420000.00, 0.00, '0000-00-00', '0000-00-00', '0000-00-00', 0.00, 0, 0),
(23, 9, 10000.00, 4200.00, '2019-05-31', '2019-06-07', '2019-05-15', 0.00, 0, 2),
(24, 9, 0.00, 4100.00, '2019-06-30', '2019-07-07', '0000-00-00', 0.00, 0, 1),
(25, 1, 0.00, 3600.00, '2019-06-30', '2019-07-07', '0000-00-00', 0.00, 0, 1),
(26, 8, 450000.00, 0.00, '0000-00-00', '0000-00-00', '0000-00-00', 0.00, 0, 0),
(27, 8, 0.00, 4500.00, '2019-05-31', '2019-06-07', '0000-00-00', 0.00, 0, 1),
(28, 7, 1000.00, 0.00, '0000-00-00', '0000-00-00', '0000-00-00', 0.00, 0, 0),
(29, 7, 100.00, 10.00, '2019-05-31', '2019-06-07', '2019-05-20', 0.00, 0, 2),
(30, 7, 100.00, 9.00, '2019-06-30', '2019-07-07', '2019-05-20', 0.00, 0, 2),
(31, 7, 100.00, 8.00, '2019-07-31', '2019-08-07', '2019-05-20', 0.00, 0, 2),
(32, 7, 100.00, 7.00, '2019-08-31', '2019-09-07', '2019-05-20', 0.00, 0, 2),
(33, 7, 100.00, 6.00, '2019-09-30', '2019-10-07', '2019-05-20', 0.00, 0, 2),
(34, 7, 100.00, 5.00, '2019-10-31', '2019-11-07', '2019-05-20', 0.00, 0, 2),
(35, 7, 100.00, 4.00, '2019-11-30', '2019-12-07', '2019-05-20', 0.00, 0, 2),
(36, 7, 100.00, 3.00, '2019-12-31', '2020-01-07', '2019-05-20', 0.00, 0, 2),
(37, 7, 100.00, 2.00, '2020-01-31', '2020-02-07', '2019-05-20', 0.00, 0, 2),
(38, 7, 100.00, 1.00, '2020-02-29', '2020-03-07', '2019-05-20', 0.00, 0, 2),
(39, 10, 6000.00, 3730.00, '2019-08-31', '2019-09-07', '2019-05-23', 0.00, 115, 2),
(40, 11, 24000.00, 0.00, '0000-00-00', '0000-00-00', '0000-00-00', 0.00, 0, 0),
(41, 11, 4000.00, 300.00, '2019-05-31', '2019-06-07', '2019-05-22', 0.00, 0, 2),
(42, 11, 0.00, 250.00, '2019-06-30', '2019-07-07', '0000-00-00', 0.00, 0, 1),
(43, 10, 6000.00, 3670.00, '2019-09-30', '2019-10-07', '2019-05-23', 0.00, 116, 2),
(44, 10, 0.00, 3610.00, '2019-10-31', '2019-11-07', '2019-05-23', 0.00, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan_status`
--

CREATE TABLE `loan_status` (
  `id` int(11) NOT NULL,
  `loan_status_code` int(11) NOT NULL,
  `loan_status_description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_status`
--

INSERT INTO `loan_status` (`id`, `loan_status_code`, `loan_status_description`) VALUES
(1, 1, 'Request Pending'),
(2, 2, 'Approved'),
(3, 3, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `title` varchar(5) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `text_password` varchar(150) NOT NULL,
  `website` varchar(255) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `joining_fees` int(11) NOT NULL,
  `member_status` int(2) NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member_id`, `title`, `first_name`, `last_name`, `date_of_birth`, `gender`, `phone_no`, `mobile_no`, `email`, `password`, `text_password`, `website`, `occupation`, `religion`, `blood_group`, `joining_fees`, `member_status`, `parent`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mr.', 'Valentina', 'Paes', '1989-09-17', 'male', '9835245012', 7879651192, 'serrano.dante@yahoo.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Maid', 'Inter Religion', 'B+', 200, 0, 0, '2019-03-28 15:51:28', '2019-03-28 15:51:46'),
(2, 2, 'Miss', 'Matias', 'Quintana', '1993-05-30', 'male', '1122992355', 8828037635, 'horacio88@ramos.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Design Engineer', 'Buddhist', 'B-', 200, 0, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(3, 3, 'Miss', 'Dante', 'Uchoa', '2003-07-09', 'male', '4534723002', 1234155388, 'usandoval@cruz.org', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Safety engineer', 'Christian - Others', 'AB+', 200, 0, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(4, 4, 'Ms.', 'Ivana', 'Cruz', '2016-12-11', 'female', '3339395321', 8337184934, 'rafael06@uol.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Judge', 'Jain - Others', 'B+', 200, 0, 2, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(5, 5, 'Miss', 'Sophie', 'Mascarenhas', '2017-07-09', 'male', '7746348605', 8620086039, 'xmaldonado@pontes.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Businessperson', 'Muslim - Shia', 'AB+', 200, 0, 4, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(6, 6, 'Dr.', 'Carlos', 'Ortiz', '1979-04-19', 'female', '8238017742', 2844417830, 'feliciano.hugo@uol.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Psychologist', 'Jain - Shvetambar', 'B+', 200, 0, 5, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(7, 7, 'Dr.', 'Josué', 'Ferraz', '1970-06-23', 'male', '9534714510', 6437953992, 'adriano.delvalle@hotmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Detective', 'Christian - Catholic', 'AB-', 200, 0, 2, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(8, 8, 'Mrs.', 'Benjamin', 'Uchoa', '1977-05-16', 'female', '7348163387', 5542151741, 'barreto.rafaela@escobar.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Detective', 'Inter Religion', 'B-', 200, 0, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(9, 9, 'Ms.', 'Daniel', 'Rodrigues', '2010-01-02', 'male', '8341315339', 7333747416, 'zaragoca.fabio@fidalgo.net', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Soldier', 'Spiritual - Not Religious', 'B+', 200, 0, 5, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(10, 10, 'Ms.', 'Regina', 'Gonçalves', '2001-12-01', 'male', '9528334757', 9937526743, 'vitoria68@rios.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Patent attorney', 'Jewish', 'B+', 200, 0, 9, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(11, 11, 'Ms.', 'Luciano', 'Ortiz', '2003-03-02', 'male', '3528461713', 6533876205, 'vicente52@rezende.net.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Maid', 'Jewish', 'A-', 200, 0, 2, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(12, 12, 'Mr.', 'Ashley', 'Azevedo', '2003-07-05', 'male', '8637329596', 5431029692, 'alan95@terra.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Psychologist', 'Spiritual - Not Religious', 'AB+', 200, 0, 9, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(13, 13, 'Ms.', 'Laura', 'Brito', '1979-06-16', 'female', '5324708594', 8132154765, 'frangel@yahoo.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Safety engineer', 'Hindu', 'O+', 200, 1, 5, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(14, 14, 'Dr.', 'Sofia', 'Quintana', '1980-03-31', 'female', '3326577798', 4945230152, 'rebeca63@flores.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Railroad engineer', 'Spiritual - Not Religious', 'B-', 200, 0, 8, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(15, 15, 'Miss', 'Simon', 'D\'ávila', '2003-05-04', 'male', '2827830688', 3827162021, 'fcruz@uol.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Safety engineer', 'Christian - Orthodox', 'AB-', 200, 0, 7, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(16, 16, 'Mr.', 'Matias', 'Galindo', '1989-06-20', 'female', '3836306600', 3138209256, 'alma27@yahoo.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Aviator', 'Christian - Others', 'B+', 200, 0, 8, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(17, 17, 'Dr.', 'Mia', 'Marques', '1988-10-10', 'female', '8630749797', 3332646371, 'everton.reis@saraiva.org', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Aviator', 'Christian - Orthodox', 'B+', 200, 1, 5, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(18, 18, 'Mrs.', 'Ariana', 'Faria', '2001-07-19', 'female', '6325137603', 7537292062, 'constancia90@r7.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Farmer', 'Christian - Orthodox', 'O-', 200, 0, 5, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(19, 19, 'Dr.', 'Fábio', 'Marinho', '1993-05-10', 'male', '4341138717', 9835248057, 'oliveira.allison@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Journalist', 'Hindu', 'AB+', 200, 0, 6, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(20, 20, 'Mr.', 'Elias', 'Marin', '2003-02-28', 'male', '1530671217', 4131843154, 'luna24@verdugo.net.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Farmer', 'Sikh', 'O+', 200, 0, 5, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(21, 21, 'Miss', 'Ketlin', 'Montenegro', '2003-04-12', 'female', '4641080110', 7434447185, 'zgalhardo@corona.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Pharmacist', 'Parsi', 'AB-', 200, 0, 4, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(22, 22, 'Miss', 'Santiago', 'Guerra', '1984-07-18', 'female', '1220140917', 9121800590, 'martinho.delatorre@ferreira.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Scientist', 'Inter Religion', 'O-', 200, 1, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(23, 23, 'Mr.', 'Teobaldo', 'Escobar', '1996-07-26', 'female', '2830905912', 2135782827, 'alexandre70@hotmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Geologist', 'Hindu', 'O+', 200, 0, 8, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(24, 24, 'Mr.', 'Alan', 'Quintana', '2008-03-31', 'female', '9841909095', 7745494757, 'tomas39@romero.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Pharmacist', 'Muslim - Shia', 'B-', 200, 0, 7, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(25, 25, 'Ms.', 'Sabrina', 'da Silva', '1998-07-11', 'female', '8230846609', 4538287370, 'marin.andrea@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Actor', 'Christian - Protestant', 'AB+', 200, 0, 6, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(26, 26, 'Dr.', 'Fátima', 'Pacheco', '2014-10-30', 'male', '3139342584', 7420758468, 'esteves.mateus@yahoo.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Patent attorney', 'Jain - Shvetambar', 'AB+', 200, 0, 2, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(27, 27, 'Miss', 'Tomás', 'Brito', '2014-09-02', 'female', '9929986918', 6632857095, 'sbeltrao@feliciano.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Psychologist', 'Christian - Others', 'O-', 200, 0, 7, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(28, 28, 'Dr.', 'Dante', 'Molina', '1997-10-17', 'male', '6425235734', 3725039006, 'qserra@fidalgo.net.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Engineer', 'Muslim - Sunni', 'A+', 200, 0, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(29, 29, 'Mr.', 'Felipe', 'Vale', '2007-07-19', 'female', '7920944132', 1221883238, 'acolaco@ig.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Journalist', 'Spiritual - Not Religious', 'AB-', 200, 0, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(30, 30, 'Mrs.', 'Sérgio', 'Cruz', '1986-03-19', 'female', '3120475140', 2242386207, 'dverdara@hotmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Teacher', 'Buddhist', 'O-', 200, 0, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(31, 31, 'Mrs.', 'Benjamin', 'Benites', '1994-07-31', 'female', '1835296540', 1635360998, 'horacio62@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Businessperson', 'Jain - Others', 'O-', 200, 0, 6, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(32, 32, 'Mr.', 'Sara', 'Gomes', '1978-11-02', 'male', '9424474912', 9547841663, 'felipe56@caldeira.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Mathematician', 'Buddhist', 'AB-', 200, 1, 2, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(33, 33, 'Mrs.', 'Gustavo', 'Zamana', '1983-04-25', 'male', '4322580799', 1123076202, 'sebastiao.feliciano@verdara.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Judge', 'Jain - Others', 'O+', 200, 0, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(34, 34, 'Mrs.', 'Alonso', 'Padrão', '2001-07-10', 'female', '3247905675', 4248976561, 'daniel20@ig.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Courier', 'Jewish', 'B+', 200, 0, 6, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(35, 35, 'Mrs.', 'Ketlin', 'Aragão', '2017-01-03', 'male', '1936627785', 6620006063, 'bsolano@r7.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Courier', 'Spiritual - Not Religious', 'O+', 200, 0, 2, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(36, 36, 'Ms.', 'Luis', 'Ávila', '2001-12-02', 'female', '8529390826', 4423531797, 'hescobar@uol.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Hotel Manager', 'Jain - Digambar', 'O+', 200, 0, 6, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(37, 37, 'Miss', 'Estêvão', 'Mendes', '2000-07-19', 'male', '4344200256', 9231370431, 'agustina60@aragao.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Housekeeper', 'Christian - Others', 'O+', 200, 0, 6, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(38, 38, 'Dr.', 'Andres', 'Mendes', '2003-03-17', 'male', '6546545277', 7738450107, 'brito.inacio@yahoo.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Chef', 'Christian - Orthodox', 'O+', 200, 0, 4, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(39, 39, 'Ms.', 'Rebeca', 'Ramos', '1982-09-15', 'female', '9729347289', 3227117014, 'noeli99@terra.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Scientist', 'Jewish', 'AB-', 200, 0, 1, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(40, 40, 'Mr.', 'Bruno', 'Verdugo', '2007-03-20', 'male', '3128460946', 4345536174, 'joao.teles@hotmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Farmer', 'Jain - Shvetambar', 'A-', 200, 0, 4, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(41, 41, 'Dr.', 'Luis', 'Flores', '2006-10-03', 'male', '8627999949', 1623215334, 'dgusmao@verdugo.com.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Secretary', 'Christian - Protestant', 'AB-', 200, 0, 4, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(42, 42, 'Ms.', 'Henrique', 'Fonseca', '1987-07-25', 'male', '5534244798', 5521342934, 'david.esteves@ramos.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Judge', 'Muslim - Shia', 'O-', 200, 0, 5, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(43, 43, 'Mr.', 'Samuel', 'Ortega', '1972-03-08', 'male', '8642313036', 8728370122, 'dvalencia@tamoio.net.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Maid', 'Jain - Digambar', 'AB+', 200, 0, 10, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(44, 44, 'Mr.', 'Taís', 'Benites', '2008-02-16', 'male', '1144460173', 1320687250, 'tais.sales@yahoo.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Customs officer', 'Muslim - Shia', 'A-', 200, 0, 2, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(45, 45, 'Mr.', 'Fabio', 'Leon', '2010-12-08', 'male', '7922480044', 1446789961, 'vicente.deoliveira@soto.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Teacher', 'Spiritual - Not Religious', 'A+', 200, 0, 4, '2019-03-28 15:51:28', '2019-03-28 16:28:58'),
(46, 46, 'Dr.', 'Ariadna', 'Lozano', '1994-11-07', 'male', '7737147927', 1436523625, 'sebastiao.abreu@meireles.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Railroad engineer', 'Spiritual - Not Religious', 'A+', 200, 0, 2, '2019-03-28 15:51:28', '2019-03-28 15:51:28'),
(47, 47, 'Mr.', 'Emiliano', 'Santiago', '1992-11-29', 'male', '5521337727', 6636922083, 'verdugo.micaela@hotmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Sales management', 'Buddhist', 'O-', 200, 0, 6, '2019-03-28 15:51:28', '2019-03-28 16:28:40'),
(48, 48, 'Mr.', 'Ashley', 'Galhardo', '1993-06-26', 'female', '5421074712', 5439715428, 'tessalia87@yahoo.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Courier', 'Muslim - Others', 'B-', 200, 0, 8, '2019-03-28 15:51:28', '2019-03-28 15:52:47'),
(49, 49, 'Mr.', 'Bianca', 'Paz', '1988-11-30', 'female', '9823934202', 5435796898, 'dvieira@r7.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Army officer', 'Buddhist', 'B+', 200, 1, 4, '2019-03-28 15:51:28', '2019-03-28 15:52:22'),
(50, 50, 'Mr.', 'Alexa', 'Fonseca', '2013-05-23', 'male', '6420288677', 4826130389, 'pamela82@bittencourt.net.br', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Customs officer', 'Jain - Shvetambar', 'AB-', 200, 0, 0, '2019-03-28 15:51:28', '2019-03-29 19:56:11'),
(51, 51, 'Mr.', 'test', 'member', '2019-05-01', 'male', '7879651192', 7879651193, 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', 'Pharmacist', 'Jewish', 'B-', 200, 0, 0, '2019-05-22 19:20:56', '2019-05-22 19:28:57');

--
-- Triggers `members`
--
DELIMITER $$
CREATE TRIGGER `delete_members_after` AFTER DELETE ON `members` FOR EACH ROW BEGIN
	DELETE FROM member_family_info WHERE member_id = old.member_id;
    DELETE FROM education_details WHERE member_id = old.member_id;
    DELETE FROM loans WHERE member_id = old.member_id;
    DELETE FROM profile_image WHERE userid = old.member_id;
    DELETE FROM addresses WHERE userid = old.member_id;
    DELETE FROM sibling_children_details WHERE member_id = old.member_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_members_after` AFTER INSERT ON `members` FOR EACH ROW BEGIN
	INSERT into member_family_info(member_id) VALUES(new.member_id);
    INSERT into addresses(userid) VALUES(new.member_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `member_account`
--

CREATE TABLE `member_account` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `fee_submission_type` int(2) NOT NULL,
  `description` text NOT NULL,
  `transection_type` int(1) NOT NULL DEFAULT '1' COMMENT '1=Deposit,2=withdrawal',
  `paid_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_account`
--

INSERT INTO `member_account` (`id`, `member_id`, `amount`, `fee_submission_type`, `description`, `transection_type`, `paid_date`) VALUES
(1, 1, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(2, 2, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(3, 3, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(4, 4, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(5, 5, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(6, 6, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(7, 7, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(8, 8, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(9, 9, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(10, 10, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(11, 11, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(12, 12, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(13, 13, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(14, 14, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(15, 15, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(16, 16, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(17, 17, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(18, 18, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(19, 19, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(20, 20, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(21, 21, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(22, 22, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(23, 23, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(24, 24, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(25, 25, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(26, 26, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(27, 27, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(28, 28, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(29, 29, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(30, 30, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(31, 31, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(32, 32, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(33, 33, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(34, 34, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(35, 35, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(36, 36, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(37, 37, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(38, 38, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(39, 39, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(40, 40, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(41, 41, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(42, 42, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(43, 43, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(44, 44, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(45, 45, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(46, 46, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(47, 47, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(48, 48, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(49, 49, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(50, 50, 200.00, 1, '', 1, '2019-03-28 15:51:28'),
(51, 50, 15000.00, 2, '', 1, '2019-05-02 10:49:44'),
(52, 50, 1000.00, 3, '', 1, '2019-05-02 10:49:50'),
(53, 50, 1000.00, 3, '', 1, '2019-05-02 10:49:55'),
(54, 50, 1000.00, 3, '', 1, '2019-05-02 10:49:59'),
(55, 50, 1500.00, 4, '', 1, '2019-05-02 10:50:40'),
(56, 50, 1500.00, 4, '', 1, '2019-05-02 10:50:44'),
(57, 50, 1500.00, 4, '', 1, '2019-05-02 10:50:49'),
(58, 50, 50000.00, 6, '', 1, '2019-05-02 10:50:57'),
(59, 49, 25000.00, 2, '', 1, '2019-05-02 10:51:16'),
(60, 49, 20000.00, 3, '', 1, '2019-05-02 10:52:20'),
(61, 49, 1500.00, 4, '', 1, '2019-05-02 10:52:28'),
(62, 49, 1500.00, 4, '', 1, '2019-05-02 10:52:32'),
(63, 49, 1500.00, 4, '', 1, '2019-05-02 10:52:36'),
(64, 49, 1500.00, 4, '', 1, '2019-05-02 10:52:39'),
(65, 48, 15000.00, 2, '', 1, '2019-05-02 10:52:56'),
(66, 48, 2000.00, 3, '', 1, '2019-05-02 10:53:02'),
(67, 48, 1500.00, 4, '', 1, '2019-05-02 10:53:08'),
(68, 48, 1500.00, 4, '', 1, '2019-05-02 10:53:12'),
(69, 48, 1500.00, 4, '', 1, '2019-05-02 10:53:16'),
(70, 48, 21000.00, 6, '', 1, '2019-05-02 10:53:26'),
(71, 46, 15000.00, 2, '', 1, '2019-05-02 10:53:41'),
(72, 46, 1000.00, 3, '', 1, '2019-05-02 10:53:56'),
(73, 46, 1200.00, 4, '', 1, '2019-05-02 10:54:06'),
(74, 46, 1200.00, 4, '', 1, '2019-05-02 10:54:14'),
(75, 46, 1200.00, 4, '', 1, '2019-05-02 10:54:20'),
(76, 46, 10000.00, 6, '', 1, '2019-05-02 10:54:38'),
(77, 38, 15000.00, 2, '', 1, '2019-05-02 10:55:04'),
(78, 38, 1500.00, 3, '', 1, '2019-05-02 10:55:09'),
(79, 38, 1500.00, 3, '', 1, '2019-05-02 10:55:13'),
(80, 38, 1500.00, 3, '', 1, '2019-05-02 10:55:16'),
(81, 38, 1000.00, 4, '', 1, '2019-05-02 10:55:21'),
(82, 38, 1000.00, 4, '', 1, '2019-05-02 10:55:26'),
(83, 38, 1000.00, 4, '', 1, '2019-05-02 10:55:31'),
(84, 38, 15000.00, 6, '', 1, '2019-05-02 10:55:42'),
(85, 38, 50000.00, 5, '', 1, '2019-05-02 10:55:46'),
(86, 28, 40000.00, 2, '', 1, '2019-05-02 10:56:14'),
(87, 28, 50000.00, 6, '', 1, '2019-05-02 10:56:26'),
(88, 1, 15000.00, 2, '', 1, '2019-05-02 10:56:47'),
(89, 1, 1500.00, 3, '', 1, '2019-05-02 10:56:53'),
(90, 1, 1500.00, 3, '', 1, '2019-05-02 10:56:59'),
(91, 1, 1500.00, 3, '', 1, '2019-05-02 10:57:03'),
(92, 1, 1000.00, 4, '', 1, '2019-05-02 10:57:10'),
(93, 1, 1000.00, 4, '', 1, '2019-05-02 10:57:14'),
(94, 1, 1000.00, 4, '', 1, '2019-05-02 10:57:17'),
(95, 1, 25000.00, 6, '', 1, '2019-05-02 10:57:23'),
(96, 18, 15000.00, 2, '', 1, '2019-05-02 10:59:54'),
(97, 18, 25000.00, 2, '', 1, '2019-05-02 11:00:00'),
(98, 18, 1500.00, 3, '', 1, '2019-05-02 11:00:08'),
(99, 18, 1500.00, 3, '', 1, '2019-05-02 11:00:11'),
(100, 18, 1500.00, 3, '', 1, '2019-05-02 11:00:14'),
(101, 18, 51000.00, 6, '', 1, '2019-05-02 11:00:28'),
(102, 47, 15000.00, 2, '', 1, '2019-05-18 19:22:49'),
(103, 47, 25000.00, 2, '', 1, '2019-05-18 19:22:54'),
(104, 47, 50000.00, 3, '', 1, '2019-05-18 19:23:01'),
(105, 47, 1500.00, 4, '', 1, '2019-05-18 19:23:07'),
(106, 47, 1500.00, 4, '', 1, '2019-05-18 19:23:11'),
(107, 47, 1500.00, 4, '', 1, '2019-05-18 19:23:15'),
(108, 47, 1500.00, 4, '', 1, '2019-05-18 19:23:18'),
(109, 47, 50000.00, 6, '', 1, '2019-05-18 19:23:24'),
(110, 50, -1000.00, 4, 'Withdrawal 1000 Rs. for personal work', 2, '2019-05-22 17:14:00'),
(111, 49, -1000.00, 4, '', 2, '2019-05-22 17:16:40'),
(112, 51, 200.00, 1, '', 1, '2019-05-22 19:20:56'),
(113, 21, 15000.00, 2, '', 1, '2019-05-22 19:36:31'),
(114, 47, -6000.00, 4, 'Loan Instalment paid from Aniwary Sanchay on 2019-05-23 11:35:32', 2, '2019-05-23 12:25:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `member_details`
-- (See below for the actual view)
--
CREATE TABLE `member_details` (
`id` int(11)
,`member_id` int(11)
,`title` varchar(5)
,`first_name` varchar(150)
,`last_name` varchar(150)
,`member_name` varchar(307)
,`date_of_birth` date
,`age` int(5)
,`gender` varchar(10)
,`address` varchar(255)
,`state` int(11)
,`city` int(11)
,`zipcode` int(11)
,`phone_no` varchar(20)
,`mobile_no` bigint(20)
,`email` varchar(255)
,`password` varchar(100)
,`text_password` varchar(150)
,`website` varchar(255)
,`occupation` varchar(100)
,`religion` varchar(50)
,`blood_group` varchar(5)
,`member_status` int(2)
,`parent` int(11)
,`created_at` datetime
,`updated_at` datetime
,`no_family_members` int(2)
,`head_family_name` varchar(255)
,`fathers_name` varchar(255)
,`mothers_name` varchar(255)
,`marital_status` varchar(10)
,`spouse_name` varchar(150)
,`siblings` text
,`childrens` text
,`employement_status` varchar(50)
,`annual_income` int(11)
,`work_place_info` text
,`star_sign` varchar(50)
,`zodiac_sign` varchar(50)
,`swami_dosh` varchar(5)
,`gotra` varchar(150)
,`mother_toung` varchar(50)
,`your_diet` varchar(150)
,`smoke` int(1)
,`drink` int(1)
,`height` varchar(10)
,`body_type` varchar(50)
,`skin_tone` varchar(50)
,`disability` varchar(5)
,`city_name` varchar(50)
,`state_name` varchar(50)
,`image_path` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `member_family_info`
--

CREATE TABLE `member_family_info` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `no_family_members` int(2) DEFAULT NULL,
  `head_family_name` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `spouse_name` varchar(150) DEFAULT NULL,
  `siblings` text,
  `childrens` text,
  `employement_status` varchar(50) DEFAULT NULL,
  `annual_income` int(11) DEFAULT NULL,
  `work_place_info` text,
  `star_sign` varchar(50) DEFAULT NULL,
  `zodiac_sign` varchar(50) DEFAULT NULL,
  `swami_dosh` varchar(5) DEFAULT NULL,
  `gotra` varchar(150) DEFAULT NULL,
  `mother_toung` varchar(50) DEFAULT NULL,
  `your_diet` varchar(150) DEFAULT NULL,
  `smoke` int(1) DEFAULT NULL COMMENT '1=>YES,2=>NO',
  `drink` int(1) DEFAULT NULL COMMENT '1=>YES,2=>NO',
  `height` varchar(10) DEFAULT NULL,
  `body_type` varchar(50) DEFAULT NULL,
  `skin_tone` varchar(50) DEFAULT NULL,
  `disability` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_family_info`
--

INSERT INTO `member_family_info` (`id`, `member_id`, `no_family_members`, `head_family_name`, `fathers_name`, `mothers_name`, `marital_status`, `spouse_name`, `siblings`, `childrens`, `employement_status`, `annual_income`, `work_place_info`, `star_sign`, `zodiac_sign`, `swami_dosh`, `gotra`, `mother_toung`, `your_diet`, `smoke`, `drink`, `height`, `body_type`, `skin_tone`, `disability`) VALUES
(1, 1, 3, 'Santiago Balestero', 'Santiago Balestero', 'Joana Maldonado', 'widowed', '', '[]', '[]', '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', NULL),
(2, 2, 3, 'Ziraldo Carmona', 'Ziraldo Carmona', 'Constância Tamoio', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 3, 'Demian Toledo', 'Demian Toledo', 'Amélia Ortega', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, 7, 'Francisco Pena', 'Francisco Pena', 'Ariadna Santacruz', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, 2, 'Mateus Padilha', 'Mateus Padilha', 'Elizabeth Rosa', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, 6, 'Adriano Toledo', 'Adriano Toledo', 'Violeta Guerra', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, 8, 'Ian Dias', 'Ian Dias', 'Irene Zamana', 'widowed', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, 6, 'Estêvão Duarte', 'Estêvão Duarte', 'Paulina Vale', 'married', 'Mateus Branco', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, 1, 'Noel Perez', 'Noel Perez', 'Silvana Furtado', 'married', 'Tessália Feliciano', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10, 2, 'Felipe Martines', 'Felipe Martines', 'Constância Galvão', 'widowed', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11, 9, 'Lucas Bonilha', 'Lucas Bonilha', 'Antonieta Aranda', 'married', 'Michele Solano', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, 1, 'Franco Rosa', 'Franco Rosa', 'Vitória Vale', 'married', 'Sophie Sepúlveda', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 13, 7, 'Matias Leon', 'Matias Leon', 'Juliana Casanova', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 14, 2, 'Thales Lovato', 'Thales Lovato', 'Laura Paes', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 15, 8, 'Leonardo Verdugo', 'Leonardo Verdugo', 'Taís Dominato', 'married', 'Salomé Ferraz', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 16, 5, 'Antônio Perez', 'Antônio Perez', 'Allison Ortiz', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 17, 4, 'Demian Zambrano', 'Demian Zambrano', 'Luana Sanches', 'widowed', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 18, 8, 'Tomás Torres', 'Tomás Torres', 'Julieta Martines', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 19, 7, 'Pablo Verdugo', 'Pablo Verdugo', 'Maitê Lozano', 'widowed', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 20, 4, 'Daniel Maia', 'Daniel Maia', 'Noelí Ferminiano', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 21, 6, 'Pablo Mendonça', 'Pablo Mendonça', 'Violeta de Souza', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 22, 0, 'Henrique Vila', 'Henrique Vila', 'Bianca Paes', 'widowed', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 23, 1, 'Mateus Soto', 'Mateus Soto', 'Carolina Saraiva', 'married', 'Hugo Valdez', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 24, 3, 'Henrique Reis', 'Henrique Reis', 'Silvana Meireles', 'married', 'Diego Pena', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 25, 8, 'Demian Estrada', 'Demian Estrada', 'Valéria Valência', 'widowed', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 26, 3, 'Adriano Aragão', 'Adriano Aragão', 'Camila Romero', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 27, 2, 'Felipe Ferreira', 'Felipe Ferreira', 'Maitê de Aguiar', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 28, 0, 'Evandro Barros', 'Evandro Barros', 'Thalissa Velasques', 'widowed', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 29, 7, 'Francisco da Rosa', 'Francisco da Rosa', 'Miranda Queirós', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 30, 1, 'Agostinho Bezerra', 'Agostinho Bezerra', 'Giovana Flores', 'married', 'Thiago Gonçalves', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 31, 7, 'Everton Vasques', 'Everton Vasques', 'Alma Ferraz', 'married', 'Joaquin Cervantes', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 32, 2, 'Benjamin Serna', 'Benjamin Serna', 'Juliana Lovato', 'married', 'Violeta Saraiva', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 33, 5, 'Josué Bonilha', 'Josué Bonilha', 'Mariana Queirós', 'married', 'Samanta Delgado', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 34, 0, 'Alexandre Mascarenhas', 'Alexandre Mascarenhas', 'Natália Pena', 'married', 'Inácio Leon', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 35, 9, 'Noel Balestero', 'Noel Balestero', 'Natália Galindo', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 36, 9, 'Miguel Tamoio', 'Miguel Tamoio', 'Natália Urias', 'widowed', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 37, 3, 'Cristóvão Padilha', 'Cristóvão Padilha', 'Norma Queirós', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 38, 7, 'Pedro Oliveira', 'Pedro Oliveira', 'Luciana Cortês', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 39, 2, 'Lucas Azevedo', 'Lucas Azevedo', 'Amanda Maldonado', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 40, 5, 'Agostinho Verdara', 'Agostinho Verdara', 'Vitória Aragão', 'married', 'Catarina Pedrosa', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 41, 5, 'Miguel de Aguiar', 'Miguel de Aguiar', 'Abril das Neves', 'married', 'Luciana Delatorre', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 42, 5, 'Anderson Solano', 'Anderson Solano', 'Sara Feliciano', 'divorced', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 43, 7, 'Ivan Sanches', 'Ivan Sanches', 'Thalissa Camacho', 'married', 'Sara Galhardo', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 44, 8, 'Evandro Beltrão', 'Evandro Beltrão', 'Ashley Grego', 'married', 'Daniela Correia', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 45, 7, 'Gabriel Camacho', 'Gabriel Camacho', 'Ariadna Fernandes', 'divorced', '', '[]', '[]', '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', NULL),
(46, 46, 0, 'Isaac Rosa', 'Isaac Rosa', 'Samanta Cervantes', 'single', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 47, 2, 'Maximiano Furtado', 'Maximiano Furtado', 'Micaela da Silva', 'single', '', '[]', '[]', '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', NULL),
(48, 48, 9, 'Andres Molina', 'Andres Molina', 'Salome das Neves', 'divorced', '', '[]', '[]', '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', NULL),
(49, 49, 2, 'Miguel Rodrigues', 'Miguel Rodrigues', 'Isabel Matos', 'widowed', '', '[]', '[]', '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', NULL),
(50, 50, 9, 'Francisco Perez', 'Francisco Perez', 'Samanta Serna', 'single', '', '[]', '[]', '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', NULL),
(51, 51, 10, 'Father Name', 'Father Name', 'Mother Name', 'married', 'wife name', NULL, NULL, '1', 300000, 'test', '', '', '', '', '', '', 0, 0, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pending_installments_notification`
-- (See below for the actual view)
--
CREATE TABLE `pending_installments_notification` (
`id` int(11)
,`loan_id` int(11)
,`loan_amount` double(10,2)
,`interest` double(10,2)
,`payment_date` date
,`payment_end_date` date
,`paid_date` date
,`penalty` double(10,2)
,`payment_status` int(2)
,`member_id` int(11)
,`member_name` varchar(307)
);

-- --------------------------------------------------------

--
-- Table structure for table `profile_image`
--

CREATE TABLE `profile_image` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_image`
--

INSERT INTO `profile_image` (`id`, `userid`, `image_path`, `type`) VALUES
(1, 1, 'assets/admin/member_profile_pic/0/1/avatar.png', 1),
(2, 50, 'assets/admin/member_profile_pic/0/50/avatar3.png', 1),
(3, 49, 'assets/admin/member_profile_pic/0/49/avatar5.png', 1),
(4, 48, 'assets/admin/member_profile_pic/0/48/avatar.png', 1),
(5, 47, 'assets/admin/member_profile_pic/0/47/avatar3.png', 1),
(6, 45, 'assets/admin/member_profile_pic/0/45/avatar5.png', 1),
(7, 51, 'assets/admin/member_profile_pic/0/51/avatar04.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `sibling_children_details`
--

CREATE TABLE `sibling_children_details` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sibling_children_details`
--

INSERT INTO `sibling_children_details` (`id`, `member_id`, `name`, `dob`, `gender`, `qualification`, `type`) VALUES
(1, 51, 'brother name', '2019-04-30', 'male', 'bca', 'sibling');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

-- --------------------------------------------------------

--
-- Structure for view `installments_notification`
--
DROP TABLE IF EXISTS `installments_notification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `installments_notification`  AS  select `L`.`id` AS `id`,`LI`.`loan_id` AS `loan_id`,`LI`.`loan_amount` AS `loan_amount`,`LI`.`interest` AS `interest`,`LI`.`payment_date` AS `payment_date`,`LI`.`payment_end_date` AS `payment_end_date`,`LI`.`paid_date` AS `paid_date`,`LI`.`penalty` AS `penalty`,`LI`.`payment_status` AS `payment_status`,`L`.`member_id` AS `member_id`,`MD`.`member_name` AS `member_name` from ((`loan_installments` `LI` left join `loans` `L` on((`LI`.`loan_id` = `L`.`id`))) left join `member_details` `MD` on((`L`.`member_id` = `MD`.`member_id`))) where ((`LI`.`payment_status` = 1) and ((`LI`.`payment_date` - interval 7 day) <= curdate()) and (curdate() <= `LI`.`payment_date`)) ;

-- --------------------------------------------------------

--
-- Structure for view `member_details`
--
DROP TABLE IF EXISTS `member_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `member_details`  AS  select `M`.`id` AS `id`,`M`.`member_id` AS `member_id`,`M`.`title` AS `title`,`M`.`first_name` AS `first_name`,`M`.`last_name` AS `last_name`,concat(`M`.`title`,' ',`M`.`first_name`,' ',`M`.`last_name`) AS `member_name`,`M`.`date_of_birth` AS `date_of_birth`,(year(curdate()) - year(`M`.`date_of_birth`)) AS `age`,`M`.`gender` AS `gender`,`A`.`address` AS `address`,`A`.`state` AS `state`,`A`.`city` AS `city`,`A`.`zipcode` AS `zipcode`,`M`.`phone_no` AS `phone_no`,`M`.`mobile_no` AS `mobile_no`,`M`.`email` AS `email`,`M`.`password` AS `password`,`M`.`text_password` AS `text_password`,`M`.`website` AS `website`,`M`.`occupation` AS `occupation`,`M`.`religion` AS `religion`,`M`.`blood_group` AS `blood_group`,`M`.`member_status` AS `member_status`,`M`.`parent` AS `parent`,`M`.`created_at` AS `created_at`,`M`.`updated_at` AS `updated_at`,`MFI`.`no_family_members` AS `no_family_members`,`MFI`.`head_family_name` AS `head_family_name`,`MFI`.`fathers_name` AS `fathers_name`,`MFI`.`mothers_name` AS `mothers_name`,`MFI`.`marital_status` AS `marital_status`,`MFI`.`spouse_name` AS `spouse_name`,`MFI`.`siblings` AS `siblings`,`MFI`.`childrens` AS `childrens`,`MFI`.`employement_status` AS `employement_status`,`MFI`.`annual_income` AS `annual_income`,`MFI`.`work_place_info` AS `work_place_info`,`MFI`.`star_sign` AS `star_sign`,`MFI`.`zodiac_sign` AS `zodiac_sign`,`MFI`.`swami_dosh` AS `swami_dosh`,`MFI`.`gotra` AS `gotra`,`MFI`.`mother_toung` AS `mother_toung`,`MFI`.`your_diet` AS `your_diet`,`MFI`.`smoke` AS `smoke`,`MFI`.`drink` AS `drink`,`MFI`.`height` AS `height`,`MFI`.`body_type` AS `body_type`,`MFI`.`skin_tone` AS `skin_tone`,`MFI`.`disability` AS `disability`,`C`.`city_name` AS `city_name`,`S`.`state_name` AS `state_name`,`PI`.`image_path` AS `image_path` from (((((`members` `M` left join `member_family_info` `MFI` on((`M`.`member_id` = `MFI`.`member_id`))) left join `addresses` `A` on(((`M`.`member_id` = `A`.`userid`) and (`A`.`type` = '1')))) left join `profile_image` `PI` on(((`M`.`member_id` = `PI`.`userid`) and (`PI`.`type` = '1')))) left join `cities` `C` on((`A`.`city` = `C`.`city_id`))) left join `states` `S` on((`A`.`state` = `S`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `pending_installments_notification`
--
DROP TABLE IF EXISTS `pending_installments_notification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pending_installments_notification`  AS  select `L`.`id` AS `id`,`LI`.`loan_id` AS `loan_id`,`LI`.`loan_amount` AS `loan_amount`,`LI`.`interest` AS `interest`,`LI`.`payment_date` AS `payment_date`,`LI`.`payment_end_date` AS `payment_end_date`,`LI`.`paid_date` AS `paid_date`,`LI`.`penalty` AS `penalty`,`LI`.`payment_status` AS `payment_status`,`L`.`member_id` AS `member_id`,`MD`.`member_name` AS `member_name` from ((`loan_installments` `LI` left join `loans` `L` on((`LI`.`loan_id` = `L`.`id`))) left join `member_details` `MD` on((`L`.`member_id` = `MD`.`member_id`))) where ((`LI`.`payment_status` = 1) and (`LI`.`payment_end_date` <= curdate())) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`,`type`),
  ADD KEY `state` (`state`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `education_details`
--
ALTER TABLE `education_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `loan_applicant`
--
ALTER TABLE `loan_applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_assets`
--
ALTER TABLE `loan_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_guarantor`
--
ALTER TABLE `loan_guarantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_installments`
--
ALTER TABLE `loan_installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_id` (`loan_id`);

--
-- Indexes for table `loan_status`
--
ALTER TABLE `loan_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indexes for table `member_account`
--
ALTER TABLE `member_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`member_id`),
  ADD KEY `fee_submission_type` (`fee_submission_type`);

--
-- Indexes for table `member_family_info`
--
ALTER TABLE `member_family_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indexes for table `profile_image`
--
ALTER TABLE `profile_image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`,`type`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sibling_children_details`
--
ALTER TABLE `sibling_children_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_details`
--
ALTER TABLE `education_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loan_applicant`
--
ALTER TABLE `loan_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `loan_assets`
--
ALTER TABLE `loan_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loan_guarantor`
--
ALTER TABLE `loan_guarantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `loan_installments`
--
ALTER TABLE `loan_installments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `loan_status`
--
ALTER TABLE `loan_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `member_account`
--
ALTER TABLE `member_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `member_family_info`
--
ALTER TABLE `member_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `profile_image`
--
ALTER TABLE `profile_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sibling_children_details`
--
ALTER TABLE `sibling_children_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
