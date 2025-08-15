-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2020 at 06:44 PM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n0o5e6r4_danquahprep`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','subadmin') NOT NULL,
  `status` enum('Active','Inactive','Pending') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `email_id`, `password`, `type`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Super', 'Admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6', 'admin', 'Active', '2018-06-22 11:26:06', '2018-06-22 11:26:06'),
(2, 'Sub', 'Admin', 'subadmin@gmail.com', '16d7a4fca7442dda3ad93c9a726597e4', 'subadmin', 'Active', '2018-06-23 07:27:02', '2018-06-23 11:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing_info`
--

CREATE TABLE `tbl_billing_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `addres2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `county` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_billing_info`
--

INSERT INTO `tbl_billing_info` (`id`, `user_id`, `first_name`, `last_name`, `address1`, `addres2`, `city`, `county`, `state`, `zip_code`, `phone_no`, `created_date`, `updated_date`) VALUES
(1, 1, 'Jeff', 'Boskenn', '2922  Vesta Drive', '', 'Park Ridge', 231, 'Illinois', '60068', '773-714-5860', '2018-07-31 06:28:24', '2018-08-20 06:07:01'),
(2, 2, 'alan', 'walker', '123', '123', 'new york', 231, 'NY', '002211', '1231-231-231', '2018-08-02 00:57:20', '2018-08-01 23:57:20'),
(3, 3, 'Aron', 'Smith', '58 E 11th St, New York, NY 10003, USA', '58 E 11th St, New York, NY 10003, USA', 'new york', 231, 'New YORK', '10003', '0014-897-989', '2018-08-02 05:15:21', '2018-08-02 04:15:21'),
(4, 4, 'Aron', 'smith', '8132 Philmont St.  Brooklyn, NY 11206', '8132 Philmont St.  Brooklyn, NY 11206', 'new york', 231, 'new york', '11207', '1547-862-659', '2018-08-06 05:36:15', '2018-08-06 04:36:15'),
(27, 10, 'Michael', 'Danquah', '15941 Harlem Ave, Ste 255', '', 'Tinley Park', 231, 'IL', '60477', '708-497-9728', '2018-12-12 18:40:59', '2018-12-12 18:40:59'),
(26, 9, 'M', 'D', '15941 South Harlem', '15941 South Harlem', 'chicago', 231, 'Illinois', '60477', '708-497-9728', '2018-08-29 13:58:46', '2018-08-29 13:58:46'),
(25, 8, 'Jennifer', 'D', '15941 Harlem Ave, Ste 255', '', 'Tinley park', 231, 'Illinois', '60477', '423-946-8427', '2018-08-18 18:57:26', '2018-08-18 18:57:26'),
(24, 7, 'Ronald', ' Y Green', '723  Pineview Drive', '', 'Marks', 231, 'Mississippi', '38646', '507-976-1545', '2018-08-12 23:45:46', '2018-08-12 23:45:46'),
(23, 6, 'Michael', 'Danquah', '15941 Harlem Ave, Ste 255', '', 'Matteson', 231, 'IL', '60477', '708-497-9728', '2018-08-08 16:38:34', '2019-03-31 07:23:49'),
(22, 5, 'M ', 'D ', '15941 S Harlem Ave', '15941 S Harlem Ave, Suite 255', 'Tinley Park', 231, 'IL', '60477', '7084-979-728', '2018-08-08 15:49:18', '2018-08-08 15:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `parent_id`, `category_name`, `created_by`, `status`, `created_date`, `updated_date`) VALUES
(1, 0, 'COLLEGE PREP', 1, 'Active', '2018-07-31 04:10:22', '2018-07-31 03:13:02'),
(2, 0, 'PHARMACY', 1, 'Active', '2018-07-31 04:13:32', '2018-07-31 03:13:32'),
(3, 0, 'NURSING', 1, 'Active', '2018-07-31 04:13:46', '2018-07-31 03:13:46'),
(4, 0, 'MEDICINE', 1, 'Active', '2018-07-31 04:14:08', '2018-08-31 05:46:12'),
(5, 1, 'ACT', 1, 'Active', '2018-07-31 04:14:42', '2018-07-31 06:49:12'),
(6, 1, 'GRE', 1, 'Active', '2018-07-31 04:14:56', '2018-07-31 06:49:14'),
(7, 1, 'SAT', 1, 'Active', '2018-07-31 04:15:11', '2018-07-31 06:49:16'),
(8, 1, 'MCAT', 1, 'Active', '2018-07-31 04:15:22', '2018-07-31 06:49:22'),
(9, 2, 'Pharmacy Calculations', 1, 'Active', '2018-07-31 04:16:05', '2018-07-31 06:49:25'),
(10, 2, 'PCAT', 1, 'Active', '2018-07-31 04:16:19', '2018-07-31 06:49:27'),
(11, 2, 'PTCE', 1, 'Active', '2018-07-31 04:16:31', '2018-08-10 01:53:07'),
(12, 3, 'NCLEX-RN', 1, 'Active', '2018-07-31 04:18:05', '2018-07-31 06:49:33'),
(13, 2, 'NAPLEX', 1, 'Active', '2018-07-31 04:18:19', '2018-07-31 06:49:35'),
(14, 4, 'USMLE', 1, 'Active', '2018-07-31 04:18:42', '2018-07-31 06:50:00'),
(16, 2, ' ', 1, 'Inactive', '2018-07-31 18:52:49', '2018-07-31 17:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_demouser`
--

CREATE TABLE `tbl_demouser` (
  `id` int(11) NOT NULL,
  `ip_address` double NOT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discounts`
--

CREATE TABLE `tbl_discounts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discounts`
--

INSERT INTO `tbl_discounts` (`id`, `category_id`, `package_id`, `coupon`, `discount`, `expiry_date`, `status`, `created_date`, `updated_date`) VALUES
(1, 5, 1, '9ht5h05ikl', '25', '2018-08-08', 'Active', '2018-07-31 06:29:18', '2018-08-07 00:09:34'),
(2, 9, 13, '5yoyl5smr1', '100', '2019-12-14', 'Active', '2018-12-12 18:36:54', '2019-03-31 07:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE `tbl_options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_value` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`id`, `question_id`, `answer_value`, `status`, `created_by`, `created_date`, `updated_date`) VALUES
(6, 2, '10.5', 'Active', 1, '2018-08-03 09:53:22', '2018-08-03 08:53:22'),
(7, 2, '12', 'Active', 1, '2018-08-03 09:53:22', '2018-08-03 08:53:22'),
(8, 2, '13.5', 'Active', 1, '2018-08-03 09:53:22', '2018-08-03 08:53:22'),
(9, 2, '15', 'Active', 1, '2018-08-03 09:53:22', '2018-08-03 08:53:22'),
(10, 2, '18', 'Active', 1, '2018-08-03 09:53:22', '2018-08-03 08:53:22'),
(11, 3, '-36', 'Active', 1, '2018-08-03 09:54:34', '2018-08-03 08:54:34'),
(12, 3, '-17', 'Active', 1, '2018-08-03 09:54:34', '2018-08-03 08:54:34'),
(13, 3, '17', 'Active', 1, '2018-08-03 09:54:34', '2018-08-03 08:54:34'),
(14, 3, '36', 'Active', 1, '2018-08-03 09:54:34', '2018-08-03 08:54:34'),
(15, 3, '47', 'Active', 1, '2018-08-03 09:54:34', '2018-08-03 08:54:34'),
(16, 4, '64Â°', 'Active', 1, '2018-08-03 09:56:34', '2018-08-03 08:56:34'),
(17, 4, '104Â°', 'Active', 1, '2018-08-03 09:56:34', '2018-08-03 08:56:34'),
(18, 4, '106Â°', 'Active', 1, '2018-08-03 09:56:34', '2018-08-03 08:56:34'),
(19, 4, '108Â°', 'Active', 1, '2018-08-03 09:56:34', '2018-08-03 08:56:34'),
(20, 4, '116Â°', 'Active', 1, '2018-08-03 09:56:34', '2018-08-03 08:56:34'),
(21, 5, '46', 'Active', 1, '2018-08-03 09:57:53', '2018-08-03 08:57:53'),
(22, 5, '56', 'Active', 1, '2018-08-03 09:57:53', '2018-08-03 08:57:53'),
(23, 5, '66', 'Active', 1, '2018-08-03 09:57:53', '2018-08-03 08:57:53'),
(24, 5, '98', 'Active', 1, '2018-08-03 09:57:53', '2018-08-03 08:57:53'),
(25, 5, '114', 'Active', 1, '2018-08-03 09:57:53', '2018-08-03 08:57:53'),
(26, 6, '2', 'Active', 1, '2018-08-03 09:58:30', '2018-08-03 08:58:30'),
(27, 6, '5', 'Active', 1, '2018-08-03 09:58:30', '2018-08-03 08:58:30'),
(28, 6, '6', 'Active', 1, '2018-08-03 09:58:30', '2018-08-03 08:58:30'),
(29, 6, '7', 'Active', 1, '2018-08-03 09:58:30', '2018-08-03 08:58:30'),
(30, 6, '9', 'Active', 1, '2018-08-03 09:58:30', '2018-08-03 08:58:30'),
(31, 7, 'If an object were completely immersed in a liquid denser than it, the resulting buoyant force would exceed the weight of the object. This is because the weight of the liquid displaced by the object is greater than the weight of the object (since the liquid is denser). As a result, the object cannot remain completely submerged and it floats. The scientific name for this phenomenon is the Archimedes Principle. ', 'Active', 1, '2018-08-03 10:00:47', '2018-08-03 10:36:53'),
(32, 8, '60', 'Active', 1, '2018-08-03 10:02:26', '2018-08-03 09:02:26'),
(33, 9, '10 / 104(26)(25)(24)(23)', 'Active', 1, '2018-08-03 10:03:11', '2018-08-03 09:03:11'),
(34, 10, '[6âˆ’1âˆ’89]', 'Active', 1, '2018-08-03 10:03:32', '2018-08-03 09:03:32'),
(35, 11, '12', 'Active', 1, '2018-08-04 09:43:25', '2018-08-04 08:43:25'),
(36, 12, '384', 'Active', 1, '2018-08-05 20:24:31', '2018-08-05 19:24:31'),
(37, 12, '260', 'Active', 1, '2018-08-05 20:24:31', '2018-08-05 19:24:31'),
(38, 12, '150', 'Active', 1, '2018-08-05 20:24:31', '2018-08-05 19:24:31'),
(39, 12, '268', 'Active', 1, '2018-08-05 20:24:31', '2018-08-05 19:24:31'),
(40, 12, '178', 'Active', 1, '2018-08-05 20:24:31', '2018-08-05 19:24:31'),
(41, 13, 'reflecting on the historical usage of an object in art and its various meanings.', 'Active', 1, '2018-08-06 01:54:14', '2018-08-06 00:54:14'),
(42, 13, 'discussing his preferred artistic style from among a variety of representative artists.', 'Active', 1, '2018-08-06 01:54:14', '2018-08-06 00:54:14'),
(43, 13, 'explaining the differences between medieval art and contemporary art.', 'Active', 1, '2018-08-06 01:54:14', '2018-08-06 00:54:14'),
(44, 13, 'debating the ethical questions that arise from using human remains in art.', 'Active', 1, '2018-08-06 01:54:14', '2018-08-06 00:54:14'),
(48, 1, '(60)(70) / 890', 'Active', 1, '2018-08-31 00:45:27', '2018-08-31 00:45:27'),
(49, 1, '(60)(890) / 70', 'Active', 1, '2018-08-31 00:45:27', '2018-08-31 00:45:27'),
(50, 1, '(70)(890) / 60', 'Active', 1, '2018-08-31 00:45:27', '2018-08-31 00:45:27'),
(51, 1, '70 / (60)(890)', 'Active', 1, '2018-08-31 00:45:27', '2018-08-31 00:45:27'),
(52, 1, '890 / (60)(70)', 'Active', 1, '2018-08-31 00:45:27', '2018-08-31 00:45:27'),
(58, 15, '4.4', 'Active', 1, '2018-08-31 00:46:29', '2018-08-31 00:46:29'),
(59, 14, '425', 'Active', 1, '2018-09-01 18:56:28', '2018-09-01 18:56:28'),
(60, 16, '125', 'Active', 1, '2018-09-02 05:48:23', '2018-09-02 05:48:23'),
(61, 17, '425', 'Active', 1, '2018-09-18 06:39:13', '2018-09-18 06:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE `tbl_packages` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `duration` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `type` enum('New','Renewals') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`id`, `category_id`, `price`, `duration`, `description`, `status`, `type`, `created_by`, `created_date`, `updated_date`) VALUES
(1, 5, 39, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:39:57', '2018-07-31 06:52:41'),
(2, 5, 99, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:40:18', '2018-07-31 06:53:01'),
(3, 5, 119, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:40:32', '2018-07-31 06:53:04'),
(4, 6, 39, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:44:40', '2018-07-31 06:53:08'),
(5, 6, 99, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:45:17', '2018-07-31 06:53:10'),
(6, 6, 119, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:45:26', '2018-07-31 06:53:12'),
(7, 7, 39, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:45:53', '2018-07-31 06:53:16'),
(8, 7, 99, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:46:03', '2018-07-31 06:53:18'),
(9, 7, 119, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:46:11', '2018-07-31 06:53:20'),
(10, 8, 69, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:46:41', '2018-07-31 06:53:22'),
(11, 8, 117, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:46:50', '2018-07-31 06:53:24'),
(12, 8, 150, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:47:00', '2018-07-31 06:53:26'),
(13, 9, 69, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:47:21', '2018-07-31 06:53:28'),
(14, 9, 117, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:47:32', '2018-07-31 06:53:32'),
(15, 9, 150, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:47:42', '2018-07-31 06:53:34'),
(16, 10, 39, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:48:11', '2018-07-31 06:53:36'),
(17, 10, 99, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:48:24', '2018-07-31 06:53:39'),
(18, 10, 119, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:48:45', '2018-07-31 06:53:41'),
(19, 11, 39, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:49:18', '2018-07-31 06:53:43'),
(20, 11, 99, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:49:28', '2018-07-31 06:53:46'),
(21, 11, 119, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:49:37', '2018-07-31 06:53:49'),
(22, 12, 69, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:50:11', '2018-07-31 06:53:52'),
(23, 12, 117, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:50:21', '2018-07-31 06:53:54'),
(24, 12, 150, '180 Days', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'Active', 'New', 1, '2018-07-31 05:50:31', '2018-07-31 06:53:57'),
(25, 13, 69, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:50:59', '2018-07-31 06:54:07'),
(26, 13, 117, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:51:12', '2018-07-31 06:54:09'),
(27, 13, 150, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:51:24', '2018-07-31 06:54:12'),
(28, 14, 69, '30 Days', '<p>Risk-free&nbsp;full&nbsp;access.&nbsp;No&nbsp;credit&nbsp;card&nbsp;required.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:51:50', '2018-07-31 06:54:15'),
(29, 14, 117, '90 Days', '<p>Additional&nbsp;time&nbsp;to&nbsp;increase&nbsp;skills&nbsp;and&nbsp;performance.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:52:01', '2018-07-31 06:54:17'),
(30, 14, 150, '180 Days', '<p>Suggested&nbsp;by&nbsp;educational&nbsp;experts&nbsp;to&nbsp;prepare&nbsp;and&nbsp;improve.</p>\r\n', 'Active', 'New', 1, '2018-07-31 05:52:12', '2018-07-31 06:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `id` int(11) NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `paid_amount` double NOT NULL,
  `payment_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `txn_id`, `student_id`, `paid_amount`, `payment_detail`, `status`, `created_date`) VALUES
(1, 'ch_1CwOsLHkceIAAF7vaaqajf1w', 1, 39, 'Customer Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_ZgeJuvBNOydA2B0FZLai2OHo\"},\"\\u0000*\\u0000_values\":{\"id\":\"cus_DN9AwUZ5oJXciZ\",\"object\":\"customer\",\"account_balance\":0,\"created\":1533624060,\"currency\":null,\"default_source\":\"card_1CwOsGHkceIAAF7vrHzlRRoJ\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jeff.boskenn@gmail.com\",\"invoice_prefix\":\"1374BAB\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1CwOsGHkceIAAF7vrHzlRRoJ\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DN9AwUZ5oJXciZ\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_DN9AwUZ5oJXciZ\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_DN9AwUZ5oJXciZ\\/subscriptions\"}},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Tue, 07 Aug 2018 06:41:00 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1469\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_wetIg3SJXHmWln\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"cus_DN9AwUZ5oJXciZ\\\",\\n  \\\"object\\\": \\\"customer\\\",\\n  \\\"account_balance\\\": 0,\\n  \\\"created\\\": 1533624060,\\n  \\\"currency\\\": null,\\n  \\\"default_source\\\": \\\"card_1CwOsGHkceIAAF7vrHzlRRoJ\\\",\\n  \\\"delinquent\\\": false,\\n  \\\"description\\\": null,\\n  \\\"discount\\\": null,\\n  \\\"email\\\": \\\"jeff.boskenn@gmail.com\\\",\\n  \\\"invoice_prefix\\\": \\\"1374BAB\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"shipping\\\": null,\\n  \\\"sources\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n      {\\n        \\\"id\\\": \\\"card_1CwOsGHkceIAAF7vrHzlRRoJ\\\",\\n        \\\"object\\\": \\\"card\\\",\\n        \\\"address_city\\\": null,\\n        \\\"address_country\\\": null,\\n        \\\"address_line1\\\": null,\\n        \\\"address_line1_check\\\": null,\\n        \\\"address_line2\\\": null,\\n        \\\"address_state\\\": null,\\n        \\\"address_zip\\\": null,\\n        \\\"address_zip_check\\\": null,\\n        \\\"brand\\\": \\\"Visa\\\",\\n        \\\"country\\\": \\\"US\\\",\\n        \\\"customer\\\": \\\"cus_DN9AwUZ5oJXciZ\\\",\\n        \\\"cvc_check\\\": \\\"pass\\\",\\n        \\\"dynamic_last4\\\": null,\\n        \\\"exp_month\\\": 12,\\n        \\\"exp_year\\\": 2020,\\n        \\\"fingerprint\\\": \\\"FscI9DzoVRSUyI90\\\",\\n        \\\"funding\\\": \\\"credit\\\",\\n        \\\"last4\\\": \\\"4242\\\",\\n        \\\"metadata\\\": {\\n        },\\n        \\\"name\\\": \\\"jeff.boskenn@gmail.com\\\",\\n        \\\"tokenization_method\\\": null\\n      }\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 1,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_DN9AwUZ5oJXciZ\\/sources\\\"\\n  },\\n  \\\"subscriptions\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_DN9AwUZ5oJXciZ\\/subscriptions\\\"\\n  }\\n}\\n\",\"json\":{\"id\":\"cus_DN9AwUZ5oJXciZ\",\"object\":\"customer\",\"account_balance\":0,\"created\":1533624060,\"currency\":null,\"default_source\":\"card_1CwOsGHkceIAAF7vrHzlRRoJ\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jeff.boskenn@gmail.com\",\"invoice_prefix\":\"1374BAB\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1CwOsGHkceIAAF7vrHzlRRoJ\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DN9AwUZ5oJXciZ\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_DN9AwUZ5oJXciZ\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_DN9AwUZ5oJXciZ\\/subscriptions\"}},\"code\":200}}\n \n Charge Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_ZgeJuvBNOydA2B0FZLai2OHo\"},\"\\u0000*\\u0000_values\":{\"id\":\"ch_1CwOsLHkceIAAF7vaaqajf1w\",\"object\":\"charge\",\"amount\":390000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CwOsLHkceIAAF7vOQFzgQxZ\",\"captured\":true,\"created\":1533624061,\"currency\":\"usd\",\"customer\":\"cus_DN9AwUZ5oJXciZ\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CwOsLHkceIAAF7vaaqajf1w\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CwOsGHkceIAAF7vrHzlRRoJ\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DN9AwUZ5oJXciZ\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Tue, 07 Aug 2018 06:41:01 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1812\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_LIkK8cr2oat2EE\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"ch_1CwOsLHkceIAAF7vaaqajf1w\\\",\\n  \\\"object\\\": \\\"charge\\\",\\n  \\\"amount\\\": 390000,\\n  \\\"amount_refunded\\\": 0,\\n  \\\"application\\\": null,\\n  \\\"application_fee\\\": null,\\n  \\\"balance_transaction\\\": \\\"txn_1CwOsLHkceIAAF7vOQFzgQxZ\\\",\\n  \\\"captured\\\": true,\\n  \\\"created\\\": 1533624061,\\n  \\\"currency\\\": \\\"usd\\\",\\n  \\\"customer\\\": \\\"cus_DN9AwUZ5oJXciZ\\\",\\n  \\\"description\\\": null,\\n  \\\"destination\\\": null,\\n  \\\"dispute\\\": null,\\n  \\\"failure_code\\\": null,\\n  \\\"failure_message\\\": null,\\n  \\\"fraud_details\\\": {\\n  },\\n  \\\"invoice\\\": null,\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"on_behalf_of\\\": null,\\n  \\\"order\\\": null,\\n  \\\"outcome\\\": {\\n    \\\"network_status\\\": \\\"approved_by_network\\\",\\n    \\\"reason\\\": null,\\n    \\\"risk_level\\\": \\\"normal\\\",\\n    \\\"seller_message\\\": \\\"Payment complete.\\\",\\n    \\\"type\\\": \\\"authorized\\\"\\n  },\\n  \\\"paid\\\": true,\\n  \\\"receipt_email\\\": null,\\n  \\\"receipt_number\\\": null,\\n  \\\"refunded\\\": false,\\n  \\\"refunds\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/charges\\/ch_1CwOsLHkceIAAF7vaaqajf1w\\/refunds\\\"\\n  },\\n  \\\"review\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": {\\n    \\\"id\\\": \\\"card_1CwOsGHkceIAAF7vrHzlRRoJ\\\",\\n    \\\"object\\\": \\\"card\\\",\\n    \\\"address_city\\\": null,\\n    \\\"address_country\\\": null,\\n    \\\"address_line1\\\": null,\\n    \\\"address_line1_check\\\": null,\\n    \\\"address_line2\\\": null,\\n    \\\"address_state\\\": null,\\n    \\\"address_zip\\\": null,\\n    \\\"address_zip_check\\\": null,\\n    \\\"brand\\\": \\\"Visa\\\",\\n    \\\"country\\\": \\\"US\\\",\\n    \\\"customer\\\": \\\"cus_DN9AwUZ5oJXciZ\\\",\\n    \\\"cvc_check\\\": \\\"pass\\\",\\n    \\\"dynamic_last4\\\": null,\\n    \\\"exp_month\\\": 12,\\n    \\\"exp_year\\\": 2020,\\n    \\\"fingerprint\\\": \\\"FscI9DzoVRSUyI90\\\",\\n    \\\"funding\\\": \\\"credit\\\",\\n    \\\"last4\\\": \\\"4242\\\",\\n    \\\"metadata\\\": {\\n    },\\n    \\\"name\\\": \\\"jeff.boskenn@gmail.com\\\",\\n    \\\"tokenization_method\\\": null\\n  },\\n  \\\"source_transfer\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_group\\\": null\\n}\\n\",\"json\":{\"id\":\"ch_1CwOsLHkceIAAF7vaaqajf1w\",\"object\":\"charge\",\"amount\":390000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CwOsLHkceIAAF7vOQFzgQxZ\",\"captured\":true,\"created\":1533624061,\"currency\":\"usd\",\"customer\":\"cus_DN9AwUZ5oJXciZ\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CwOsLHkceIAAF7vaaqajf1w\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CwOsGHkceIAAF7vrHzlRRoJ\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DN9AwUZ5oJXciZ\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"code\":200}}', 'succeeded', '2018-08-07 01:41:01'),
(2, 'ch_1CwPQFHkceIAAF7vmjmy6qpz', 1, 99, 'Customer Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_ZgeJuvBNOydA2B0FZLai2OHo\"},\"\\u0000*\\u0000_values\":{\"id\":\"cus_DN9jA3s8dHuySj\",\"object\":\"customer\",\"account_balance\":0,\"created\":1533626162,\"currency\":null,\"default_source\":\"card_1CwPQAHkceIAAF7vy9E4rtOO\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jeff.boskenn@gmail.com\",\"invoice_prefix\":\"E5B1441\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1CwPQAHkceIAAF7vy9E4rtOO\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DN9jA3s8dHuySj\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_DN9jA3s8dHuySj\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_DN9jA3s8dHuySj\\/subscriptions\"}},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Tue, 07 Aug 2018 07:16:02 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1469\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_1nMxJwwKGeQnr9\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"cus_DN9jA3s8dHuySj\\\",\\n  \\\"object\\\": \\\"customer\\\",\\n  \\\"account_balance\\\": 0,\\n  \\\"created\\\": 1533626162,\\n  \\\"currency\\\": null,\\n  \\\"default_source\\\": \\\"card_1CwPQAHkceIAAF7vy9E4rtOO\\\",\\n  \\\"delinquent\\\": false,\\n  \\\"description\\\": null,\\n  \\\"discount\\\": null,\\n  \\\"email\\\": \\\"jeff.boskenn@gmail.com\\\",\\n  \\\"invoice_prefix\\\": \\\"E5B1441\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"shipping\\\": null,\\n  \\\"sources\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n      {\\n        \\\"id\\\": \\\"card_1CwPQAHkceIAAF7vy9E4rtOO\\\",\\n        \\\"object\\\": \\\"card\\\",\\n        \\\"address_city\\\": null,\\n        \\\"address_country\\\": null,\\n        \\\"address_line1\\\": null,\\n        \\\"address_line1_check\\\": null,\\n        \\\"address_line2\\\": null,\\n        \\\"address_state\\\": null,\\n        \\\"address_zip\\\": null,\\n        \\\"address_zip_check\\\": null,\\n        \\\"brand\\\": \\\"Visa\\\",\\n        \\\"country\\\": \\\"US\\\",\\n        \\\"customer\\\": \\\"cus_DN9jA3s8dHuySj\\\",\\n        \\\"cvc_check\\\": \\\"pass\\\",\\n        \\\"dynamic_last4\\\": null,\\n        \\\"exp_month\\\": 12,\\n        \\\"exp_year\\\": 2020,\\n        \\\"fingerprint\\\": \\\"FscI9DzoVRSUyI90\\\",\\n        \\\"funding\\\": \\\"credit\\\",\\n        \\\"last4\\\": \\\"4242\\\",\\n        \\\"metadata\\\": {\\n        },\\n        \\\"name\\\": \\\"jeff.boskenn@gmail.com\\\",\\n        \\\"tokenization_method\\\": null\\n      }\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 1,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_DN9jA3s8dHuySj\\/sources\\\"\\n  },\\n  \\\"subscriptions\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_DN9jA3s8dHuySj\\/subscriptions\\\"\\n  }\\n}\\n\",\"json\":{\"id\":\"cus_DN9jA3s8dHuySj\",\"object\":\"customer\",\"account_balance\":0,\"created\":1533626162,\"currency\":null,\"default_source\":\"card_1CwPQAHkceIAAF7vy9E4rtOO\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jeff.boskenn@gmail.com\",\"invoice_prefix\":\"E5B1441\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1CwPQAHkceIAAF7vy9E4rtOO\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DN9jA3s8dHuySj\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_DN9jA3s8dHuySj\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_DN9jA3s8dHuySj\\/subscriptions\"}},\"code\":200}}\n \n Charge Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_ZgeJuvBNOydA2B0FZLai2OHo\"},\"\\u0000*\\u0000_values\":{\"id\":\"ch_1CwPQFHkceIAAF7vmjmy6qpz\",\"object\":\"charge\",\"amount\":990000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CwPQFHkceIAAF7vKrOud6yR\",\"captured\":true,\"created\":1533626163,\"currency\":\"usd\",\"customer\":\"cus_DN9jA3s8dHuySj\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CwPQFHkceIAAF7vmjmy6qpz\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CwPQAHkceIAAF7vy9E4rtOO\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DN9jA3s8dHuySj\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Tue, 07 Aug 2018 07:16:04 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1812\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_uSqirOQL80m7bo\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"ch_1CwPQFHkceIAAF7vmjmy6qpz\\\",\\n  \\\"object\\\": \\\"charge\\\",\\n  \\\"amount\\\": 990000,\\n  \\\"amount_refunded\\\": 0,\\n  \\\"application\\\": null,\\n  \\\"application_fee\\\": null,\\n  \\\"balance_transaction\\\": \\\"txn_1CwPQFHkceIAAF7vKrOud6yR\\\",\\n  \\\"captured\\\": true,\\n  \\\"created\\\": 1533626163,\\n  \\\"currency\\\": \\\"usd\\\",\\n  \\\"customer\\\": \\\"cus_DN9jA3s8dHuySj\\\",\\n  \\\"description\\\": null,\\n  \\\"destination\\\": null,\\n  \\\"dispute\\\": null,\\n  \\\"failure_code\\\": null,\\n  \\\"failure_message\\\": null,\\n  \\\"fraud_details\\\": {\\n  },\\n  \\\"invoice\\\": null,\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"on_behalf_of\\\": null,\\n  \\\"order\\\": null,\\n  \\\"outcome\\\": {\\n    \\\"network_status\\\": \\\"approved_by_network\\\",\\n    \\\"reason\\\": null,\\n    \\\"risk_level\\\": \\\"normal\\\",\\n    \\\"seller_message\\\": \\\"Payment complete.\\\",\\n    \\\"type\\\": \\\"authorized\\\"\\n  },\\n  \\\"paid\\\": true,\\n  \\\"receipt_email\\\": null,\\n  \\\"receipt_number\\\": null,\\n  \\\"refunded\\\": false,\\n  \\\"refunds\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/charges\\/ch_1CwPQFHkceIAAF7vmjmy6qpz\\/refunds\\\"\\n  },\\n  \\\"review\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": {\\n    \\\"id\\\": \\\"card_1CwPQAHkceIAAF7vy9E4rtOO\\\",\\n    \\\"object\\\": \\\"card\\\",\\n    \\\"address_city\\\": null,\\n    \\\"address_country\\\": null,\\n    \\\"address_line1\\\": null,\\n    \\\"address_line1_check\\\": null,\\n    \\\"address_line2\\\": null,\\n    \\\"address_state\\\": null,\\n    \\\"address_zip\\\": null,\\n    \\\"address_zip_check\\\": null,\\n    \\\"brand\\\": \\\"Visa\\\",\\n    \\\"country\\\": \\\"US\\\",\\n    \\\"customer\\\": \\\"cus_DN9jA3s8dHuySj\\\",\\n    \\\"cvc_check\\\": \\\"pass\\\",\\n    \\\"dynamic_last4\\\": null,\\n    \\\"exp_month\\\": 12,\\n    \\\"exp_year\\\": 2020,\\n    \\\"fingerprint\\\": \\\"FscI9DzoVRSUyI90\\\",\\n    \\\"funding\\\": \\\"credit\\\",\\n    \\\"last4\\\": \\\"4242\\\",\\n    \\\"metadata\\\": {\\n    },\\n    \\\"name\\\": \\\"jeff.boskenn@gmail.com\\\",\\n    \\\"tokenization_method\\\": null\\n  },\\n  \\\"source_transfer\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_group\\\": null\\n}\\n\",\"json\":{\"id\":\"ch_1CwPQFHkceIAAF7vmjmy6qpz\",\"object\":\"charge\",\"amount\":990000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CwPQFHkceIAAF7vKrOud6yR\",\"captured\":true,\"created\":1533626163,\"currency\":\"usd\",\"customer\":\"cus_DN9jA3s8dHuySj\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CwPQFHkceIAAF7vmjmy6qpz\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CwPQAHkceIAAF7vy9E4rtOO\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DN9jA3s8dHuySj\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"code\":200}}', 'succeeded', '2018-08-07 02:16:04'),
(3, 'ch_1CwPreHkceIAAF7vjOEIUQXs', 1, 119, 'Customer Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_ZgeJuvBNOydA2B0FZLai2OHo\"},\"\\u0000*\\u0000_values\":{\"id\":\"cus_DNACabV2Xs46O5\",\"object\":\"customer\",\"account_balance\":0,\"created\":1533627862,\"currency\":null,\"default_source\":\"card_1CwPrXHkceIAAF7v6lqXqLU7\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jeff.boskenn@gmail.com\",\"invoice_prefix\":\"855291B\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1CwPrXHkceIAAF7v6lqXqLU7\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DNACabV2Xs46O5\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_DNACabV2Xs46O5\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_DNACabV2Xs46O5\\/subscriptions\"}},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Tue, 07 Aug 2018 07:44:22 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1469\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_WxILxj6Bw3GWDx\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"cus_DNACabV2Xs46O5\\\",\\n  \\\"object\\\": \\\"customer\\\",\\n  \\\"account_balance\\\": 0,\\n  \\\"created\\\": 1533627862,\\n  \\\"currency\\\": null,\\n  \\\"default_source\\\": \\\"card_1CwPrXHkceIAAF7v6lqXqLU7\\\",\\n  \\\"delinquent\\\": false,\\n  \\\"description\\\": null,\\n  \\\"discount\\\": null,\\n  \\\"email\\\": \\\"jeff.boskenn@gmail.com\\\",\\n  \\\"invoice_prefix\\\": \\\"855291B\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"shipping\\\": null,\\n  \\\"sources\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n      {\\n        \\\"id\\\": \\\"card_1CwPrXHkceIAAF7v6lqXqLU7\\\",\\n        \\\"object\\\": \\\"card\\\",\\n        \\\"address_city\\\": null,\\n        \\\"address_country\\\": null,\\n        \\\"address_line1\\\": null,\\n        \\\"address_line1_check\\\": null,\\n        \\\"address_line2\\\": null,\\n        \\\"address_state\\\": null,\\n        \\\"address_zip\\\": null,\\n        \\\"address_zip_check\\\": null,\\n        \\\"brand\\\": \\\"Visa\\\",\\n        \\\"country\\\": \\\"US\\\",\\n        \\\"customer\\\": \\\"cus_DNACabV2Xs46O5\\\",\\n        \\\"cvc_check\\\": \\\"pass\\\",\\n        \\\"dynamic_last4\\\": null,\\n        \\\"exp_month\\\": 12,\\n        \\\"exp_year\\\": 2020,\\n        \\\"fingerprint\\\": \\\"FscI9DzoVRSUyI90\\\",\\n        \\\"funding\\\": \\\"credit\\\",\\n        \\\"last4\\\": \\\"4242\\\",\\n        \\\"metadata\\\": {\\n        },\\n        \\\"name\\\": \\\"jeff.boskenn@gmail.com\\\",\\n        \\\"tokenization_method\\\": null\\n      }\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 1,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_DNACabV2Xs46O5\\/sources\\\"\\n  },\\n  \\\"subscriptions\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_DNACabV2Xs46O5\\/subscriptions\\\"\\n  }\\n}\\n\",\"json\":{\"id\":\"cus_DNACabV2Xs46O5\",\"object\":\"customer\",\"account_balance\":0,\"created\":1533627862,\"currency\":null,\"default_source\":\"card_1CwPrXHkceIAAF7v6lqXqLU7\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jeff.boskenn@gmail.com\",\"invoice_prefix\":\"855291B\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1CwPrXHkceIAAF7v6lqXqLU7\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DNACabV2Xs46O5\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_DNACabV2Xs46O5\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_DNACabV2Xs46O5\\/subscriptions\"}},\"code\":200}}\n \n Charge Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_ZgeJuvBNOydA2B0FZLai2OHo\"},\"\\u0000*\\u0000_values\":{\"id\":\"ch_1CwPreHkceIAAF7vjOEIUQXs\",\"object\":\"charge\",\"amount\":1190000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CwPrfHkceIAAF7vtzmHkctj\",\"captured\":true,\"created\":1533627862,\"currency\":\"usd\",\"customer\":\"cus_DNACabV2Xs46O5\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CwPreHkceIAAF7vjOEIUQXs\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CwPrXHkceIAAF7v6lqXqLU7\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DNACabV2Xs46O5\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Tue, 07 Aug 2018 07:44:23 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1813\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_W6ftJFC7lMQEVW\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"ch_1CwPreHkceIAAF7vjOEIUQXs\\\",\\n  \\\"object\\\": \\\"charge\\\",\\n  \\\"amount\\\": 1190000,\\n  \\\"amount_refunded\\\": 0,\\n  \\\"application\\\": null,\\n  \\\"application_fee\\\": null,\\n  \\\"balance_transaction\\\": \\\"txn_1CwPrfHkceIAAF7vtzmHkctj\\\",\\n  \\\"captured\\\": true,\\n  \\\"created\\\": 1533627862,\\n  \\\"currency\\\": \\\"usd\\\",\\n  \\\"customer\\\": \\\"cus_DNACabV2Xs46O5\\\",\\n  \\\"description\\\": null,\\n  \\\"destination\\\": null,\\n  \\\"dispute\\\": null,\\n  \\\"failure_code\\\": null,\\n  \\\"failure_message\\\": null,\\n  \\\"fraud_details\\\": {\\n  },\\n  \\\"invoice\\\": null,\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"on_behalf_of\\\": null,\\n  \\\"order\\\": null,\\n  \\\"outcome\\\": {\\n    \\\"network_status\\\": \\\"approved_by_network\\\",\\n    \\\"reason\\\": null,\\n    \\\"risk_level\\\": \\\"normal\\\",\\n    \\\"seller_message\\\": \\\"Payment complete.\\\",\\n    \\\"type\\\": \\\"authorized\\\"\\n  },\\n  \\\"paid\\\": true,\\n  \\\"receipt_email\\\": null,\\n  \\\"receipt_number\\\": null,\\n  \\\"refunded\\\": false,\\n  \\\"refunds\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/charges\\/ch_1CwPreHkceIAAF7vjOEIUQXs\\/refunds\\\"\\n  },\\n  \\\"review\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": {\\n    \\\"id\\\": \\\"card_1CwPrXHkceIAAF7v6lqXqLU7\\\",\\n    \\\"object\\\": \\\"card\\\",\\n    \\\"address_city\\\": null,\\n    \\\"address_country\\\": null,\\n    \\\"address_line1\\\": null,\\n    \\\"address_line1_check\\\": null,\\n    \\\"address_line2\\\": null,\\n    \\\"address_state\\\": null,\\n    \\\"address_zip\\\": null,\\n    \\\"address_zip_check\\\": null,\\n    \\\"brand\\\": \\\"Visa\\\",\\n    \\\"country\\\": \\\"US\\\",\\n    \\\"customer\\\": \\\"cus_DNACabV2Xs46O5\\\",\\n    \\\"cvc_check\\\": \\\"pass\\\",\\n    \\\"dynamic_last4\\\": null,\\n    \\\"exp_month\\\": 12,\\n    \\\"exp_year\\\": 2020,\\n    \\\"fingerprint\\\": \\\"FscI9DzoVRSUyI90\\\",\\n    \\\"funding\\\": \\\"credit\\\",\\n    \\\"last4\\\": \\\"4242\\\",\\n    \\\"metadata\\\": {\\n    },\\n    \\\"name\\\": \\\"jeff.boskenn@gmail.com\\\",\\n    \\\"tokenization_method\\\": null\\n  },\\n  \\\"source_transfer\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_group\\\": null\\n}\\n\",\"json\":{\"id\":\"ch_1CwPreHkceIAAF7vjOEIUQXs\",\"object\":\"charge\",\"amount\":1190000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CwPrfHkceIAAF7vtzmHkctj\",\"captured\":true,\"created\":1533627862,\"currency\":\"usd\",\"customer\":\"cus_DNACabV2Xs46O5\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CwPreHkceIAAF7vjOEIUQXs\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CwPrXHkceIAAF7v6lqXqLU7\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DNACabV2Xs46O5\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"FscI9DzoVRSUyI90\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"code\":200}}', 'succeeded', '2018-08-07 02:44:23'),
(4, 'ch_1D1BEUDeriUoU3nCVFZq4zt3', 1, 39, 'Customer Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_suVHil5M7pfrN2WfpJMAGv6C\"},\"\\u0000*\\u0000_values\":{\"id\":\"cus_DS5PmM5uDZEbJE\",\"object\":\"customer\",\"account_balance\":0,\"created\":1534763258,\"currency\":null,\"default_source\":\"card_1D1BEPDeriUoU3nCFQnQ6sAV\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jeff.boskenn@gmail.com\",\"invoice_prefix\":\"543ED09\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1D1BEPDeriUoU3nCFQnQ6sAV\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DS5PmM5uDZEbJE\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_DS5PmM5uDZEbJE\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_DS5PmM5uDZEbJE\\/subscriptions\"},\"tax_info\":null,\"tax_info_verification\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Mon, 20 Aug 2018 11:07:38 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1522\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_9HhrhMUeS22vD3\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"cus_DS5PmM5uDZEbJE\\\",\\n  \\\"object\\\": \\\"customer\\\",\\n  \\\"account_balance\\\": 0,\\n  \\\"created\\\": 1534763258,\\n  \\\"currency\\\": null,\\n  \\\"default_source\\\": \\\"card_1D1BEPDeriUoU3nCFQnQ6sAV\\\",\\n  \\\"delinquent\\\": false,\\n  \\\"description\\\": null,\\n  \\\"discount\\\": null,\\n  \\\"email\\\": \\\"jeff.boskenn@gmail.com\\\",\\n  \\\"invoice_prefix\\\": \\\"543ED09\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"shipping\\\": null,\\n  \\\"sources\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n      {\\n        \\\"id\\\": \\\"card_1D1BEPDeriUoU3nCFQnQ6sAV\\\",\\n        \\\"object\\\": \\\"card\\\",\\n        \\\"address_city\\\": null,\\n        \\\"address_country\\\": null,\\n        \\\"address_line1\\\": null,\\n        \\\"address_line1_check\\\": null,\\n        \\\"address_line2\\\": null,\\n        \\\"address_state\\\": null,\\n        \\\"address_zip\\\": null,\\n        \\\"address_zip_check\\\": null,\\n        \\\"brand\\\": \\\"Visa\\\",\\n        \\\"country\\\": \\\"US\\\",\\n        \\\"customer\\\": \\\"cus_DS5PmM5uDZEbJE\\\",\\n        \\\"cvc_check\\\": \\\"pass\\\",\\n        \\\"dynamic_last4\\\": null,\\n        \\\"exp_month\\\": 12,\\n        \\\"exp_year\\\": 2020,\\n        \\\"fingerprint\\\": \\\"TF0LpMItW7Bgxt46\\\",\\n        \\\"funding\\\": \\\"credit\\\",\\n        \\\"last4\\\": \\\"4242\\\",\\n        \\\"metadata\\\": {\\n        },\\n        \\\"name\\\": \\\"jeff.boskenn@gmail.com\\\",\\n        \\\"tokenization_method\\\": null\\n      }\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 1,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_DS5PmM5uDZEbJE\\/sources\\\"\\n  },\\n  \\\"subscriptions\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_DS5PmM5uDZEbJE\\/subscriptions\\\"\\n  },\\n  \\\"tax_info\\\": null,\\n  \\\"tax_info_verification\\\": null\\n}\\n\",\"json\":{\"id\":\"cus_DS5PmM5uDZEbJE\",\"object\":\"customer\",\"account_balance\":0,\"created\":1534763258,\"currency\":null,\"default_source\":\"card_1D1BEPDeriUoU3nCFQnQ6sAV\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jeff.boskenn@gmail.com\",\"invoice_prefix\":\"543ED09\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1D1BEPDeriUoU3nCFQnQ6sAV\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DS5PmM5uDZEbJE\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_DS5PmM5uDZEbJE\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_DS5PmM5uDZEbJE\\/subscriptions\"},\"tax_info\":null,\"tax_info_verification\":null},\"code\":200}}\n \n Charge Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_suVHil5M7pfrN2WfpJMAGv6C\"},\"\\u0000*\\u0000_values\":{\"id\":\"ch_1D1BEUDeriUoU3nCVFZq4zt3\",\"object\":\"charge\",\"amount\":390000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1D1BEVDeriUoU3nC1gD4Tc98\",\"captured\":true,\"created\":1534763258,\"currency\":\"usd\",\"customer\":\"cus_DS5PmM5uDZEbJE\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1D1BEUDeriUoU3nCVFZq4zt3\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1D1BEPDeriUoU3nCFQnQ6sAV\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DS5PmM5uDZEbJE\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Mon, 20 Aug 2018 11:07:39 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1812\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_bFFweBXoUHjDtA\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"ch_1D1BEUDeriUoU3nCVFZq4zt3\\\",\\n  \\\"object\\\": \\\"charge\\\",\\n  \\\"amount\\\": 390000,\\n  \\\"amount_refunded\\\": 0,\\n  \\\"application\\\": null,\\n  \\\"application_fee\\\": null,\\n  \\\"balance_transaction\\\": \\\"txn_1D1BEVDeriUoU3nC1gD4Tc98\\\",\\n  \\\"captured\\\": true,\\n  \\\"created\\\": 1534763258,\\n  \\\"currency\\\": \\\"usd\\\",\\n  \\\"customer\\\": \\\"cus_DS5PmM5uDZEbJE\\\",\\n  \\\"description\\\": null,\\n  \\\"destination\\\": null,\\n  \\\"dispute\\\": null,\\n  \\\"failure_code\\\": null,\\n  \\\"failure_message\\\": null,\\n  \\\"fraud_details\\\": {\\n  },\\n  \\\"invoice\\\": null,\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"on_behalf_of\\\": null,\\n  \\\"order\\\": null,\\n  \\\"outcome\\\": {\\n    \\\"network_status\\\": \\\"approved_by_network\\\",\\n    \\\"reason\\\": null,\\n    \\\"risk_level\\\": \\\"normal\\\",\\n    \\\"seller_message\\\": \\\"Payment complete.\\\",\\n    \\\"type\\\": \\\"authorized\\\"\\n  },\\n  \\\"paid\\\": true,\\n  \\\"receipt_email\\\": null,\\n  \\\"receipt_number\\\": null,\\n  \\\"refunded\\\": false,\\n  \\\"refunds\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/charges\\/ch_1D1BEUDeriUoU3nCVFZq4zt3\\/refunds\\\"\\n  },\\n  \\\"review\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": {\\n    \\\"id\\\": \\\"card_1D1BEPDeriUoU3nCFQnQ6sAV\\\",\\n    \\\"object\\\": \\\"card\\\",\\n    \\\"address_city\\\": null,\\n    \\\"address_country\\\": null,\\n    \\\"address_line1\\\": null,\\n    \\\"address_line1_check\\\": null,\\n    \\\"address_line2\\\": null,\\n    \\\"address_state\\\": null,\\n    \\\"address_zip\\\": null,\\n    \\\"address_zip_check\\\": null,\\n    \\\"brand\\\": \\\"Visa\\\",\\n    \\\"country\\\": \\\"US\\\",\\n    \\\"customer\\\": \\\"cus_DS5PmM5uDZEbJE\\\",\\n    \\\"cvc_check\\\": \\\"pass\\\",\\n    \\\"dynamic_last4\\\": null,\\n    \\\"exp_month\\\": 12,\\n    \\\"exp_year\\\": 2020,\\n    \\\"fingerprint\\\": \\\"TF0LpMItW7Bgxt46\\\",\\n    \\\"funding\\\": \\\"credit\\\",\\n    \\\"last4\\\": \\\"4242\\\",\\n    \\\"metadata\\\": {\\n    },\\n    \\\"name\\\": \\\"jeff.boskenn@gmail.com\\\",\\n    \\\"tokenization_method\\\": null\\n  },\\n  \\\"source_transfer\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_group\\\": null\\n}\\n\",\"json\":{\"id\":\"ch_1D1BEUDeriUoU3nCVFZq4zt3\",\"object\":\"charge\",\"amount\":390000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1D1BEVDeriUoU3nC1gD4Tc98\",\"captured\":true,\"created\":1534763258,\"currency\":\"usd\",\"customer\":\"cus_DS5PmM5uDZEbJE\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1D1BEUDeriUoU3nCVFZq4zt3\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1D1BEPDeriUoU3nCFQnQ6sAV\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DS5PmM5uDZEbJE\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"jeff.boskenn@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"code\":200}}', 'succeeded', '2018-08-20 06:07:39');
INSERT INTO `tbl_payments` (`id`, `txn_id`, `student_id`, `paid_amount`, `payment_detail`, `status`, `created_date`) VALUES
(5, 'ch_1DgiV7DeriUoU3nCIvLYpMf7', 10, 69, 'Customer Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_suVHil5M7pfrN2WfpJMAGv6C\"},\"\\u0000*\\u0000_values\":{\"id\":\"cus_E90W50y8f7ssTL\",\"object\":\"customer\",\"account_balance\":0,\"created\":1544662589,\"currency\":null,\"default_source\":\"card_1DgiV3DeriUoU3nCVPkTamP3\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"info@rxcalculations.com\",\"invoice_prefix\":\"CFE8E4B\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1DgiV3DeriUoU3nCVPkTamP3\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_E90W50y8f7ssTL\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"profmdanquah@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_E90W50y8f7ssTL\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_E90W50y8f7ssTL\\/subscriptions\"},\"tax_info\":null,\"tax_info_verification\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Thu, 13 Dec 2018 00:56:29 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1523\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_GPoXptquJt4Gus\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"cus_E90W50y8f7ssTL\\\",\\n  \\\"object\\\": \\\"customer\\\",\\n  \\\"account_balance\\\": 0,\\n  \\\"created\\\": 1544662589,\\n  \\\"currency\\\": null,\\n  \\\"default_source\\\": \\\"card_1DgiV3DeriUoU3nCVPkTamP3\\\",\\n  \\\"delinquent\\\": false,\\n  \\\"description\\\": null,\\n  \\\"discount\\\": null,\\n  \\\"email\\\": \\\"info@rxcalculations.com\\\",\\n  \\\"invoice_prefix\\\": \\\"CFE8E4B\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"shipping\\\": null,\\n  \\\"sources\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n      {\\n        \\\"id\\\": \\\"card_1DgiV3DeriUoU3nCVPkTamP3\\\",\\n        \\\"object\\\": \\\"card\\\",\\n        \\\"address_city\\\": null,\\n        \\\"address_country\\\": null,\\n        \\\"address_line1\\\": null,\\n        \\\"address_line1_check\\\": null,\\n        \\\"address_line2\\\": null,\\n        \\\"address_state\\\": null,\\n        \\\"address_zip\\\": null,\\n        \\\"address_zip_check\\\": null,\\n        \\\"brand\\\": \\\"Visa\\\",\\n        \\\"country\\\": \\\"US\\\",\\n        \\\"customer\\\": \\\"cus_E90W50y8f7ssTL\\\",\\n        \\\"cvc_check\\\": \\\"pass\\\",\\n        \\\"dynamic_last4\\\": null,\\n        \\\"exp_month\\\": 12,\\n        \\\"exp_year\\\": 2021,\\n        \\\"fingerprint\\\": \\\"TF0LpMItW7Bgxt46\\\",\\n        \\\"funding\\\": \\\"credit\\\",\\n        \\\"last4\\\": \\\"4242\\\",\\n        \\\"metadata\\\": {\\n        },\\n        \\\"name\\\": \\\"profmdanquah@gmail.com\\\",\\n        \\\"tokenization_method\\\": null\\n      }\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 1,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_E90W50y8f7ssTL\\/sources\\\"\\n  },\\n  \\\"subscriptions\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_E90W50y8f7ssTL\\/subscriptions\\\"\\n  },\\n  \\\"tax_info\\\": null,\\n  \\\"tax_info_verification\\\": null\\n}\\n\",\"json\":{\"id\":\"cus_E90W50y8f7ssTL\",\"object\":\"customer\",\"account_balance\":0,\"created\":1544662589,\"currency\":null,\"default_source\":\"card_1DgiV3DeriUoU3nCVPkTamP3\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"info@rxcalculations.com\",\"invoice_prefix\":\"CFE8E4B\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1DgiV3DeriUoU3nCVPkTamP3\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_E90W50y8f7ssTL\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"profmdanquah@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_E90W50y8f7ssTL\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_E90W50y8f7ssTL\\/subscriptions\"},\"tax_info\":null,\"tax_info_verification\":null},\"code\":200}}\n \n Charge Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_suVHil5M7pfrN2WfpJMAGv6C\"},\"\\u0000*\\u0000_values\":{\"id\":\"ch_1DgiV7DeriUoU3nCIvLYpMf7\",\"object\":\"charge\",\"amount\":690000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1DgiV7DeriUoU3nCVSWFqngN\",\"captured\":true,\"created\":1544662589,\"currency\":\"usd\",\"customer\":\"cus_E90W50y8f7ssTL\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":10,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1DgiV7DeriUoU3nCIvLYpMf7\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1DgiV3DeriUoU3nCVPkTamP3\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_E90W50y8f7ssTL\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"profmdanquah@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Thu, 13 Dec 2018 00:56:30 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1860\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_P1HOOM9lZy937A\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"ch_1DgiV7DeriUoU3nCIvLYpMf7\\\",\\n  \\\"object\\\": \\\"charge\\\",\\n  \\\"amount\\\": 690000,\\n  \\\"amount_refunded\\\": 0,\\n  \\\"application\\\": null,\\n  \\\"application_fee\\\": null,\\n  \\\"balance_transaction\\\": \\\"txn_1DgiV7DeriUoU3nCVSWFqngN\\\",\\n  \\\"captured\\\": true,\\n  \\\"created\\\": 1544662589,\\n  \\\"currency\\\": \\\"usd\\\",\\n  \\\"customer\\\": \\\"cus_E90W50y8f7ssTL\\\",\\n  \\\"description\\\": null,\\n  \\\"destination\\\": null,\\n  \\\"dispute\\\": null,\\n  \\\"failure_code\\\": null,\\n  \\\"failure_message\\\": null,\\n  \\\"fraud_details\\\": {\\n  },\\n  \\\"invoice\\\": null,\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"on_behalf_of\\\": null,\\n  \\\"order\\\": null,\\n  \\\"outcome\\\": {\\n    \\\"network_status\\\": \\\"approved_by_network\\\",\\n    \\\"reason\\\": null,\\n    \\\"risk_level\\\": \\\"normal\\\",\\n    \\\"risk_score\\\": 10,\\n    \\\"seller_message\\\": \\\"Payment complete.\\\",\\n    \\\"type\\\": \\\"authorized\\\"\\n  },\\n  \\\"paid\\\": true,\\n  \\\"payment_intent\\\": null,\\n  \\\"receipt_email\\\": null,\\n  \\\"receipt_number\\\": null,\\n  \\\"refunded\\\": false,\\n  \\\"refunds\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/charges\\/ch_1DgiV7DeriUoU3nCIvLYpMf7\\/refunds\\\"\\n  },\\n  \\\"review\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": {\\n    \\\"id\\\": \\\"card_1DgiV3DeriUoU3nCVPkTamP3\\\",\\n    \\\"object\\\": \\\"card\\\",\\n    \\\"address_city\\\": null,\\n    \\\"address_country\\\": null,\\n    \\\"address_line1\\\": null,\\n    \\\"address_line1_check\\\": null,\\n    \\\"address_line2\\\": null,\\n    \\\"address_state\\\": null,\\n    \\\"address_zip\\\": null,\\n    \\\"address_zip_check\\\": null,\\n    \\\"brand\\\": \\\"Visa\\\",\\n    \\\"country\\\": \\\"US\\\",\\n    \\\"customer\\\": \\\"cus_E90W50y8f7ssTL\\\",\\n    \\\"cvc_check\\\": \\\"pass\\\",\\n    \\\"dynamic_last4\\\": null,\\n    \\\"exp_month\\\": 12,\\n    \\\"exp_year\\\": 2021,\\n    \\\"fingerprint\\\": \\\"TF0LpMItW7Bgxt46\\\",\\n    \\\"funding\\\": \\\"credit\\\",\\n    \\\"last4\\\": \\\"4242\\\",\\n    \\\"metadata\\\": {\\n    },\\n    \\\"name\\\": \\\"profmdanquah@gmail.com\\\",\\n    \\\"tokenization_method\\\": null\\n  },\\n  \\\"source_transfer\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_group\\\": null\\n}\\n\",\"json\":{\"id\":\"ch_1DgiV7DeriUoU3nCIvLYpMf7\",\"object\":\"charge\",\"amount\":690000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1DgiV7DeriUoU3nCVSWFqngN\",\"captured\":true,\"created\":1544662589,\"currency\":\"usd\",\"customer\":\"cus_E90W50y8f7ssTL\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":10,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1DgiV7DeriUoU3nCIvLYpMf7\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1DgiV3DeriUoU3nCVPkTamP3\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_E90W50y8f7ssTL\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"profmdanquah@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"code\":200}}', 'succeeded', '2018-12-12 18:56:30'),
(6, 'ch_1DgiknDeriUoU3nCijJKx8lK', 10, 39, 'Customer Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_suVHil5M7pfrN2WfpJMAGv6C\"},\"\\u0000*\\u0000_values\":{\"id\":\"cus_E90mPV7zpSrFJ0\",\"object\":\"customer\",\"account_balance\":0,\"created\":1544663561,\"currency\":null,\"default_source\":\"card_1DgikjDeriUoU3nCTGXISYiC\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"info@rxcalculations.com\",\"invoice_prefix\":\"E5D70E1\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1DgikjDeriUoU3nCTGXISYiC\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_E90mPV7zpSrFJ0\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"profmdanquah@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_E90mPV7zpSrFJ0\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_E90mPV7zpSrFJ0\\/subscriptions\"},\"tax_info\":null,\"tax_info_verification\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Thu, 13 Dec 2018 01:12:41 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1523\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_LOZ80gFOcPoVp9\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"cus_E90mPV7zpSrFJ0\\\",\\n  \\\"object\\\": \\\"customer\\\",\\n  \\\"account_balance\\\": 0,\\n  \\\"created\\\": 1544663561,\\n  \\\"currency\\\": null,\\n  \\\"default_source\\\": \\\"card_1DgikjDeriUoU3nCTGXISYiC\\\",\\n  \\\"delinquent\\\": false,\\n  \\\"description\\\": null,\\n  \\\"discount\\\": null,\\n  \\\"email\\\": \\\"info@rxcalculations.com\\\",\\n  \\\"invoice_prefix\\\": \\\"E5D70E1\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"shipping\\\": null,\\n  \\\"sources\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n      {\\n        \\\"id\\\": \\\"card_1DgikjDeriUoU3nCTGXISYiC\\\",\\n        \\\"object\\\": \\\"card\\\",\\n        \\\"address_city\\\": null,\\n        \\\"address_country\\\": null,\\n        \\\"address_line1\\\": null,\\n        \\\"address_line1_check\\\": null,\\n        \\\"address_line2\\\": null,\\n        \\\"address_state\\\": null,\\n        \\\"address_zip\\\": null,\\n        \\\"address_zip_check\\\": null,\\n        \\\"brand\\\": \\\"Visa\\\",\\n        \\\"country\\\": \\\"US\\\",\\n        \\\"customer\\\": \\\"cus_E90mPV7zpSrFJ0\\\",\\n        \\\"cvc_check\\\": \\\"pass\\\",\\n        \\\"dynamic_last4\\\": null,\\n        \\\"exp_month\\\": 12,\\n        \\\"exp_year\\\": 2021,\\n        \\\"fingerprint\\\": \\\"TF0LpMItW7Bgxt46\\\",\\n        \\\"funding\\\": \\\"credit\\\",\\n        \\\"last4\\\": \\\"4242\\\",\\n        \\\"metadata\\\": {\\n        },\\n        \\\"name\\\": \\\"profmdanquah@gmail.com\\\",\\n        \\\"tokenization_method\\\": null\\n      }\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 1,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_E90mPV7zpSrFJ0\\/sources\\\"\\n  },\\n  \\\"subscriptions\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/customers\\/cus_E90mPV7zpSrFJ0\\/subscriptions\\\"\\n  },\\n  \\\"tax_info\\\": null,\\n  \\\"tax_info_verification\\\": null\\n}\\n\",\"json\":{\"id\":\"cus_E90mPV7zpSrFJ0\",\"object\":\"customer\",\"account_balance\":0,\"created\":1544663561,\"currency\":null,\"default_source\":\"card_1DgikjDeriUoU3nCTGXISYiC\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"info@rxcalculations.com\",\"invoice_prefix\":\"E5D70E1\",\"livemode\":false,\"metadata\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1DgikjDeriUoU3nCTGXISYiC\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_E90mPV7zpSrFJ0\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"profmdanquah@gmail.com\",\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_E90mPV7zpSrFJ0\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_E90mPV7zpSrFJ0\\/subscriptions\"},\"tax_info\":null,\"tax_info_verification\":null},\"code\":200}}\n \n Charge Info: \n{\"\\u0000*\\u0000_opts\":{\"headers\":[],\"apiKey\":\"sk_test_suVHil5M7pfrN2WfpJMAGv6C\"},\"\\u0000*\\u0000_values\":{\"id\":\"ch_1DgiknDeriUoU3nCijJKx8lK\",\"object\":\"charge\",\"amount\":390000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1DgikoDeriUoU3nC8tM9DVZ8\",\"captured\":true,\"created\":1544663561,\"currency\":\"usd\",\"customer\":\"cus_E90mPV7zpSrFJ0\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":15,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1DgiknDeriUoU3nCijJKx8lK\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1DgikjDeriUoU3nCTGXISYiC\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_E90mPV7zpSrFJ0\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"profmdanquah@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"\\u0000*\\u0000_unsavedValues\":{},\"\\u0000*\\u0000_transientValues\":{},\"\\u0000*\\u0000_retrieveOptions\":[],\"\\u0000*\\u0000_lastResponse\":{\"headers\":{\"Server\":\"nginx\",\"Date\":\"Thu, 13 Dec 2018 01:12:42 GMT\",\"Content-Type\":\"application\\/json\",\"Content-Length\":\"1860\",\"Connection\":\"keep-alive\",\"Access-Control-Allow-Credentials\":\"true\",\"Access-Control-Allow-Methods\":\"GET, POST, HEAD, OPTIONS, DELETE\",\"Access-Control-Allow-Origin\":\"*\",\"Access-Control-Expose-Headers\":\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\",\"Access-Control-Max-Age\":\"300\",\"Cache-Control\":\"no-cache, no-store\",\"Request-Id\":\"req_V6E1grn0b5wQhn\",\"Stripe-Version\":\"2018-07-27\",\"Strict-Transport-Security\":\"max-age=31556926; includeSubDomains; preload\"},\"body\":\"{\\n  \\\"id\\\": \\\"ch_1DgiknDeriUoU3nCijJKx8lK\\\",\\n  \\\"object\\\": \\\"charge\\\",\\n  \\\"amount\\\": 390000,\\n  \\\"amount_refunded\\\": 0,\\n  \\\"application\\\": null,\\n  \\\"application_fee\\\": null,\\n  \\\"balance_transaction\\\": \\\"txn_1DgikoDeriUoU3nC8tM9DVZ8\\\",\\n  \\\"captured\\\": true,\\n  \\\"created\\\": 1544663561,\\n  \\\"currency\\\": \\\"usd\\\",\\n  \\\"customer\\\": \\\"cus_E90mPV7zpSrFJ0\\\",\\n  \\\"description\\\": null,\\n  \\\"destination\\\": null,\\n  \\\"dispute\\\": null,\\n  \\\"failure_code\\\": null,\\n  \\\"failure_message\\\": null,\\n  \\\"fraud_details\\\": {\\n  },\\n  \\\"invoice\\\": null,\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {\\n  },\\n  \\\"on_behalf_of\\\": null,\\n  \\\"order\\\": null,\\n  \\\"outcome\\\": {\\n    \\\"network_status\\\": \\\"approved_by_network\\\",\\n    \\\"reason\\\": null,\\n    \\\"risk_level\\\": \\\"normal\\\",\\n    \\\"risk_score\\\": 15,\\n    \\\"seller_message\\\": \\\"Payment complete.\\\",\\n    \\\"type\\\": \\\"authorized\\\"\\n  },\\n  \\\"paid\\\": true,\\n  \\\"payment_intent\\\": null,\\n  \\\"receipt_email\\\": null,\\n  \\\"receipt_number\\\": null,\\n  \\\"refunded\\\": false,\\n  \\\"refunds\\\": {\\n    \\\"object\\\": \\\"list\\\",\\n    \\\"data\\\": [\\n\\n    ],\\n    \\\"has_more\\\": false,\\n    \\\"total_count\\\": 0,\\n    \\\"url\\\": \\\"\\/v1\\/charges\\/ch_1DgiknDeriUoU3nCijJKx8lK\\/refunds\\\"\\n  },\\n  \\\"review\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": {\\n    \\\"id\\\": \\\"card_1DgikjDeriUoU3nCTGXISYiC\\\",\\n    \\\"object\\\": \\\"card\\\",\\n    \\\"address_city\\\": null,\\n    \\\"address_country\\\": null,\\n    \\\"address_line1\\\": null,\\n    \\\"address_line1_check\\\": null,\\n    \\\"address_line2\\\": null,\\n    \\\"address_state\\\": null,\\n    \\\"address_zip\\\": null,\\n    \\\"address_zip_check\\\": null,\\n    \\\"brand\\\": \\\"Visa\\\",\\n    \\\"country\\\": \\\"US\\\",\\n    \\\"customer\\\": \\\"cus_E90mPV7zpSrFJ0\\\",\\n    \\\"cvc_check\\\": \\\"pass\\\",\\n    \\\"dynamic_last4\\\": null,\\n    \\\"exp_month\\\": 12,\\n    \\\"exp_year\\\": 2021,\\n    \\\"fingerprint\\\": \\\"TF0LpMItW7Bgxt46\\\",\\n    \\\"funding\\\": \\\"credit\\\",\\n    \\\"last4\\\": \\\"4242\\\",\\n    \\\"metadata\\\": {\\n    },\\n    \\\"name\\\": \\\"profmdanquah@gmail.com\\\",\\n    \\\"tokenization_method\\\": null\\n  },\\n  \\\"source_transfer\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_group\\\": null\\n}\\n\",\"json\":{\"id\":\"ch_1DgiknDeriUoU3nCijJKx8lK\",\"object\":\"charge\",\"amount\":390000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1DgikoDeriUoU3nC8tM9DVZ8\",\"captured\":true,\"created\":1544663561,\"currency\":\"usd\",\"customer\":\"cus_E90mPV7zpSrFJ0\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":15,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1DgiknDeriUoU3nCijJKx8lK\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1DgikjDeriUoU3nCTGXISYiC\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_E90mPV7zpSrFJ0\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"TF0LpMItW7Bgxt46\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"profmdanquah@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null},\"code\":200}}', 'succeeded', '2018-12-12 19:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `answer_type` enum('MCQs','Detail') NOT NULL,
  `option_id` int(11) NOT NULL,
  `explation` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `level` enum('Low','Medium','High') NOT NULL,
  `hint` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `is_block` enum('0','1') NOT NULL,
  `question_type` varchar(10) NOT NULL DEFAULT 'Live',
  `attemped_time` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`id`, `category_id`, `type_id`, `subject_id`, `topic_id`, `title`, `answer_type`, `option_id`, `explation`, `image`, `video`, `level`, `hint`, `status`, `is_deleted`, `is_block`, `question_type`, `attemped_time`, `created_by`, `created_date`, `updated_date`) VALUES
(1, 5, 4, 1, 5, '<p>To&nbsp;determine&nbsp;how&nbsp;much&nbsp;a&nbsp;particular&nbsp;climbing&nbsp;rope&nbsp;stretches,&nbsp;a&nbsp;rock&nbsp;climber&nbsp;uses&nbsp;the&nbsp;formula&nbsp;<em>m</em>=890<em>S</em><em>L</em>,&nbsp;where&nbsp;the&nbsp;rope&nbsp;is&nbsp;<em>L</em>&nbsp;meters&nbsp;long&nbsp;and&nbsp;stretches&nbsp;a&nbsp;length&nbsp;of&nbsp;<em>S</em>&nbsp;meters&nbsp;when&nbsp;it&nbsp;supports&nbsp;a&nbsp;climber&nbsp;with&nbsp;a&nbsp;mass&nbsp;of&nbsp;<em>m</em>&nbsp;kilograms.&nbsp;&nbsp;Which&nbsp;of&nbsp;the&nbsp;following&nbsp;gives&nbsp;the&nbsp;length,&nbsp;in&nbsp;meters,&nbsp;that&nbsp;a&nbsp;60-meter&nbsp;rope&nbsp;will&nbsp;stretch&nbsp;when&nbsp;it&nbsp;supports&nbsp;a&nbsp;climber&nbsp;with&nbsp;a&nbsp;mass&nbsp;of&nbsp;70&nbsp;kilograms?</p>\n', 'MCQs', 48, '<p>To&nbsp;determine&nbsp;which&nbsp;expression&nbsp;gives&nbsp;the&nbsp;length&nbsp;<em>S</em>,&nbsp;in&nbsp;meters,&nbsp;that&nbsp;the&nbsp;rope&nbsp;will&nbsp;stretch,&nbsp;first&nbsp;<strong>isolate</strong>&nbsp;<em><strong>S</strong></em>&nbsp;in&nbsp;the&nbsp;given&nbsp;equation&nbsp;to&nbsp;express&nbsp;the&nbsp;stretch&nbsp;<em><strong>S</strong></em><strong>&nbsp;in&nbsp;terms&nbsp;of</strong>&nbsp;<em><strong>L</strong></em><strong>&nbsp;and</strong>&nbsp;<em><strong>m</strong></em>.</p>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td><em>m</em>=890<em>S</em><em>L</em></td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Given&nbsp;equation</td>\n		</tr>\n		<tr>\n			<td><em>L</em><em>m</em>=890<em>S</em></td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Multiply&nbsp;both&nbsp;sides&nbsp;by&nbsp;<em>L</em></td>\n		</tr>\n		<tr>\n			<td><em>L</em><em>m</em>890=<em>S</em></td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Divide&nbsp;both&nbsp;sides&nbsp;by&nbsp;890</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>This&nbsp;equation&nbsp;has&nbsp;<em><strong>S</strong></em><strong>&nbsp;by&nbsp;itself</strong>&nbsp;on&nbsp;only&nbsp;one&nbsp;side,&nbsp;so&nbsp;it&nbsp;expresses&nbsp;the&nbsp;amount&nbsp;of&nbsp;stretch&nbsp;<em><strong>S</strong></em><strong>&nbsp;in&nbsp;terms&nbsp;of</strong>&nbsp;<em><strong>L</strong></em><strong>&nbsp;and</strong>&nbsp;<em><strong>m</strong></em>&nbsp;(the&nbsp;length&nbsp;of&nbsp;the&nbsp;rope&nbsp;and&nbsp;the&nbsp;mass&nbsp;of&nbsp;the&nbsp;climber).</p>\n\n<p>To&nbsp;find&nbsp;how&nbsp;much&nbsp;a&nbsp;60-meter&nbsp;rope&nbsp;(<em>L</em>&nbsp;=&nbsp;60)&nbsp;stretches&nbsp;when&nbsp;it&nbsp;supports&nbsp;a&nbsp;climber&nbsp;with&nbsp;a&nbsp;mass&nbsp;of&nbsp;70&nbsp;kilograms&nbsp;(<em>m</em>&nbsp;=&nbsp;70),&nbsp;<strong>plug&nbsp;these&nbsp;values&nbsp;into&nbsp;the&nbsp;equation</strong>.</p>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td><em>L</em><em>m</em>890=<em>S</em></td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Equation&nbsp;for&nbsp;the&nbsp;stretch&nbsp;<em>S</em></td>\n		</tr>\n		<tr>\n			<td>(60)(70)890=<em>S</em></td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Plug&nbsp;in&nbsp;<em>L</em>&nbsp;=&nbsp;60&nbsp;and&nbsp;<em>m</em>&nbsp;=&nbsp;70</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>The&nbsp;expression&nbsp;(60)(70)890</p>\n\n<p>gives&nbsp;the&nbsp;length,&nbsp;in&nbsp;meters,&nbsp;that&nbsp;the&nbsp;rope&nbsp;stretches.</p>\n\n<p>(Note:&nbsp;&nbsp;It&nbsp;is&nbsp;also&nbsp;possible&nbsp;to&nbsp;plug&nbsp;in&nbsp;values&nbsp;for&nbsp;<em>L</em>&nbsp;and&nbsp;<em>m</em>&nbsp;as&nbsp;an&nbsp;alternative&nbsp;first&nbsp;step&nbsp;before&nbsp;solving&nbsp;for&nbsp;<em>S</em>.)</p>\n\n<p><strong>(Choice&nbsp;B)</strong>&nbsp;&nbsp;(60)(890)70</p>\n\n<p>may&nbsp;result&nbsp;from&nbsp;plugging&nbsp;<em>m</em>&nbsp;=&nbsp;70&nbsp;kilograms&nbsp;and&nbsp;<em>S</em>&nbsp;=&nbsp;60&nbsp;meters&nbsp;instead&nbsp;of&nbsp;<em>L</em>&nbsp;=&nbsp;60&nbsp;meters&nbsp;into&nbsp;the&nbsp;given&nbsp;equation&nbsp;<em>m</em>=890<em>S</em><em>L</em>&nbsp;as&nbsp;the&nbsp;first&nbsp;step&nbsp;to&nbsp;get&nbsp;70=(890)(60)<em>L</em></p>\n\n<p>and&nbsp;then&nbsp;solving&nbsp;for&nbsp;<em>L</em>.</p>\n\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;(70)(890)60</p>\n\n<p>may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;rearranging&nbsp;<em>m</em>=890<em>S</em><em>L</em>&nbsp;to&nbsp;get&nbsp;890<em>m</em><em>L</em>=<em>S</em></p>\n\n<p>and&nbsp;then&nbsp;plugging&nbsp;in&nbsp;the&nbsp;given&nbsp;values&nbsp;of&nbsp;<em>L</em>&nbsp;and&nbsp;<em>m</em>.</p>\n\n<p><strong>(Choice&nbsp;D)</strong>&nbsp;&nbsp;70(60)(890)</p>\n\n<p>may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;rearranging&nbsp;<em>m</em>=890<em>S</em><em>L</em>&nbsp;to&nbsp;get&nbsp;<em>m</em>890<em>L</em>=<em>S</em></p>\n\n<p>and&nbsp;then&nbsp;plugging&nbsp;in&nbsp;the&nbsp;given&nbsp;values&nbsp;of&nbsp;<em>L</em>&nbsp;and&nbsp;<em>m</em>.</p>\n\n<p><strong>(Choice&nbsp;E)</strong>&nbsp;&nbsp;890(60)(70)</p>\n\n<p>may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;rearranging&nbsp;<em>m</em>=890<em>S</em><em>L</em>&nbsp;to&nbsp;get&nbsp;<em>S</em>=890<em>L</em><em>m</em></p>\n\n<p>and&nbsp;then&nbsp;plugging&nbsp;in&nbsp;the&nbsp;given&nbsp;values&nbsp;of&nbsp;<em>L</em>&nbsp;and&nbsp;<em>m</em>.</p>\n\n<p><strong>Things&nbsp;to&nbsp;remember:</strong></p>\n\n<ul>\n	<li>To&nbsp;express&nbsp;one&nbsp;variable&nbsp;in&nbsp;an&nbsp;equation&nbsp;in&nbsp;terms&nbsp;of&nbsp;the&nbsp;other&nbsp;variables,&nbsp;isolate&nbsp;that&nbsp;variable&nbsp;so&nbsp;that&nbsp;it&nbsp;appears&nbsp;by&nbsp;itself&nbsp;on&nbsp;only&nbsp;one&nbsp;side&nbsp;of&nbsp;the&nbsp;equation.</li>\n	<li>To&nbsp;find&nbsp;the&nbsp;value&nbsp;of&nbsp;an&nbsp;expression&nbsp;containing&nbsp;several&nbsp;variables,&nbsp;plug&nbsp;in&nbsp;the&nbsp;given&nbsp;value&nbsp;of&nbsp;each&nbsp;variable,&nbsp;but&nbsp;do&nbsp;not&nbsp;simplify&nbsp;if&nbsp;the&nbsp;answer&nbsp;choices&nbsp;are&nbsp;not&nbsp;simplified.</li>\n</ul>\n', 'UWorld QBank Demo - Mozilla Firefox_4.jpg', '<iframeiframe>', 'Medium', '<p>To&nbsp;determine&nbsp;which&nbsp;expression&nbsp;gives&nbsp;the&nbsp;length&nbsp;<em>S</em>,&nbsp;in&nbsp;meters,&nbsp;that&nbsp;the&nbsp;rope&nbsp;will&nbsp;stretch,&nbsp;first&nbsp;isolate&nbsp;<em>S</em>&nbsp;in&nbsp;the&nbsp;given&nbsp;equation.</p>\n\n<p><em>m</em>&nbsp;=&nbsp;890<em>S</em><em>L</em></p>\n', 'Active', '0', '0', 'Live', '00:00:25', 1, '2018-07-31 06:35:45', '2018-12-15 13:18:44'),
(2, 5, 4, 1, 6, '<p>The&nbsp;table&nbsp;below&nbsp;shows&nbsp;the&nbsp;number&nbsp;of&nbsp;boxes&nbsp;of&nbsp;each&nbsp;flavor&nbsp;of&nbsp;Junior&nbsp;Scout&nbsp;cookies&nbsp;Harshi&nbsp;sold&nbsp;this&nbsp;year.&nbsp;&nbsp;What&nbsp;is&nbsp;the&nbsp;median&nbsp;of&nbsp;the&nbsp;data&nbsp;in&nbsp;the&nbsp;table?</p>\n', 'MCQs', 8, '<p>For&nbsp;an&nbsp;<strong>ordered</strong>&nbsp;data&nbsp;set&nbsp;with&nbsp;an&nbsp;<strong>even&nbsp;number&nbsp;of&nbsp;values</strong>,&nbsp;the&nbsp;median&nbsp;is&nbsp;the&nbsp;<strong>average&nbsp;of&nbsp;the&nbsp;middle&nbsp;two&nbsp;values</strong>.</p>\n\n<p>The&nbsp;given&nbsp;data&nbsp;set&nbsp;is&nbsp;not&nbsp;in&nbsp;order,&nbsp;so&nbsp;<strong>order&nbsp;the&nbsp;numbers&nbsp;from&nbsp;least&nbsp;to&nbsp;greatest</strong>.</p>\n\n<p>&nbsp;</p>\n\n<p>Then&nbsp;calculate&nbsp;the&nbsp;median&nbsp;as&nbsp;the&nbsp;<strong>average&nbsp;of&nbsp;the&nbsp;middle&nbsp;two&nbsp;values</strong>.</p>\n\n<p>&nbsp;</p>\n\n<p>The&nbsp;median&nbsp;is&nbsp;13.5.</p>\n\n<p><strong>(Choice&nbsp;A)</strong>&nbsp;&nbsp;10.5&nbsp;is&nbsp;a&nbsp;result&nbsp;of&nbsp;incorrectly&nbsp;selecting&nbsp;9&nbsp;and&nbsp;12&nbsp;as&nbsp;the&nbsp;middle&nbsp;two&nbsp;values&nbsp;of&nbsp;the&nbsp;ordered&nbsp;list&nbsp;and&nbsp;calculating&nbsp;their&nbsp;average.</p>\n\n<p><strong>(Choice&nbsp;B)</strong>&nbsp;&nbsp;12&nbsp;may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;identifying&nbsp;the&nbsp;sixth&nbsp;value&nbsp;of&nbsp;the&nbsp;given&nbsp;unordered&nbsp;list&nbsp;as&nbsp;the&nbsp;median.&nbsp;&nbsp;It&nbsp;may&nbsp;also&nbsp;result&nbsp;from&nbsp;finding&nbsp;the&nbsp;range&nbsp;instead&nbsp;of&nbsp;the&nbsp;median.</p>\n\n<p><strong>(Choice&nbsp;D)</strong>&nbsp;&nbsp;15&nbsp;is&nbsp;a&nbsp;result&nbsp;of&nbsp;selecting&nbsp;the&nbsp;middle&nbsp;two&nbsp;values&nbsp;of&nbsp;the&nbsp;given&nbsp;unordered&nbsp;list,&nbsp;12&nbsp;and&nbsp;18,&nbsp;and&nbsp;calculating&nbsp;their&nbsp;average.</p>\n\n<p><strong>(Choice&nbsp;E)</strong>&nbsp;&nbsp;18&nbsp;may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;identifying&nbsp;the&nbsp;seventh&nbsp;value&nbsp;of&nbsp;the&nbsp;given&nbsp;unordered&nbsp;list&nbsp;as&nbsp;the&nbsp;median.&nbsp;&nbsp;It&nbsp;may&nbsp;also&nbsp;result&nbsp;from&nbsp;finding&nbsp;the&nbsp;mode&nbsp;instead&nbsp;of&nbsp;the&nbsp;median.</p>\n\n<p><strong>Things&nbsp;to&nbsp;remember:</strong></p>\n\n<ul>\n	<li>\n	<p>The&nbsp;median&nbsp;is&nbsp;the&nbsp;middle&nbsp;value&nbsp;in&nbsp;a&nbsp;list&nbsp;of&nbsp;numbers&nbsp;arranged&nbsp;in&nbsp;increasing&nbsp;order.</p>\n	</li>\n	<li>\n	<p>For&nbsp;an&nbsp;even&nbsp;number&nbsp;of&nbsp;ordered&nbsp;values,&nbsp;the&nbsp;median&nbsp;is&nbsp;the&nbsp;average&nbsp;of&nbsp;the&nbsp;middle&nbsp;two&nbsp;values.</p>\n	</li>\n</ul>\n', 'UWorld QBank Demo - Mozilla Firefox.jpg', '<iframeiframe>', 'Medium', '<p>To&nbsp;find&nbsp;the&nbsp;median,&nbsp;first&nbsp;order&nbsp;the&nbsp;given&nbsp;list&nbsp;of&nbsp;numbers&nbsp;from&nbsp;least&nbsp;to&nbsp;greatest.</p>\n', 'Active', '0', '0', 'Live', '00:00:25', 1, '2018-07-31 06:37:14', '2018-12-15 13:19:01'),
(3, 5, 4, 1, 7, '<p>|4(&minus;8)&nbsp;+&nbsp;5(3)|&nbsp;=&nbsp;?</p>\n', 'MCQs', 13, '<p>The&nbsp;absolute&nbsp;value&nbsp;of&nbsp;a&nbsp;number&nbsp;is&nbsp;its&nbsp;distance&nbsp;from&nbsp;0,&nbsp;and&nbsp;it&nbsp;must&nbsp;be&nbsp;positive&nbsp;or&nbsp;zero.&nbsp;&nbsp;The&nbsp;given&nbsp;expression&nbsp;is&nbsp;<strong>inside</strong>&nbsp;<strong>absolute&nbsp;value&nbsp;bars</strong>,&nbsp;so&nbsp;it&nbsp;<strong>cannot&nbsp;be&nbsp;negative</strong>.</p>\n\n<table align=\"center\" border=\"1\">\n	<tbody>\n		<tr>\n			<td><strong>(Choice&nbsp;A)</strong></td>\n			<td>|4(&minus;8)&nbsp;+&nbsp;5(3)|&nbsp;&ne;&nbsp;&minus;36</td>\n			<td rowspan=\"2\">&lArr;&nbsp;eliminate&nbsp;negative&nbsp;choices</td>\n		</tr>\n		<tr>\n			<td><strong>(Choice&nbsp;B)</strong></td>\n			<td>|4(&minus;8)&nbsp;+&nbsp;5(3)|&nbsp;&ne;&nbsp;&minus;17</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>To&nbsp;take&nbsp;the&nbsp;absolute&nbsp;value&nbsp;of&nbsp;a&nbsp;<strong>negative</strong>&nbsp;number,&nbsp;<strong>change&nbsp;the&nbsp;sign</strong>&nbsp;to&nbsp;make&nbsp;the&nbsp;number&nbsp;<strong>positive</strong>.&nbsp;&nbsp;For&nbsp;the&nbsp;given&nbsp;expression,&nbsp;simplify&nbsp;inside&nbsp;the&nbsp;absolute&nbsp;value&nbsp;bars&nbsp;first,&nbsp;and&nbsp;then&nbsp;take&nbsp;the&nbsp;absolute&nbsp;value.</p>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>|4(&minus;8)&nbsp;+&nbsp;5(3)|</td>\n			<td>Given&nbsp;expression</td>\n		</tr>\n		<tr>\n			<td>|&minus;32&nbsp;+&nbsp;15|</td>\n			<td>Multiply</td>\n		</tr>\n		<tr>\n			<td>|&minus;17|</td>\n			<td>Add</td>\n		</tr>\n		<tr>\n			<td>17</td>\n			<td>Take&nbsp;the&nbsp;absolute&nbsp;value:&nbsp;&nbsp;|&minus;17|&nbsp;=&nbsp;17</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>The&nbsp;given&nbsp;expression&nbsp;is&nbsp;equal&nbsp;to&nbsp;17.</p>\n\n<p><strong>(Choice&nbsp;A)</strong>&nbsp;&nbsp;&minus;36&nbsp;may&nbsp;result&nbsp;from&nbsp;mistakenly&nbsp;adding&nbsp;before&nbsp;multiplying&nbsp;and&nbsp;not&nbsp;considering&nbsp;the&nbsp;absolute&nbsp;value&nbsp;to&nbsp;get&nbsp;4(&minus;8&nbsp;+&nbsp;5)(3),&nbsp;but&nbsp;&minus;36&nbsp;could&nbsp;have&nbsp;been&nbsp;eliminated&nbsp;because&nbsp;absolute&nbsp;value&nbsp;cannot&nbsp;be&nbsp;negative.</p>\n\n<p><strong>(Choice&nbsp;B)</strong>&nbsp;&nbsp;&minus;17&nbsp;may&nbsp;result&nbsp;from&nbsp;not&nbsp;considering&nbsp;the&nbsp;absolute&nbsp;value&nbsp;and&nbsp;evaluating&nbsp;4(&minus;8)&nbsp;+&nbsp;5(3),&nbsp;but&nbsp;&minus;17&nbsp;could&nbsp;have&nbsp;been&nbsp;eliminated&nbsp;because&nbsp;absolute&nbsp;value&nbsp;cannot&nbsp;be&nbsp;negative.</p>\n\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;36&nbsp;may&nbsp;result&nbsp;from&nbsp;mistakenly&nbsp;adding&nbsp;before&nbsp;multiplying&nbsp;and&nbsp;evaluating&nbsp;|4(&minus;8&nbsp;+&nbsp;5)(3)|&nbsp;instead&nbsp;of&nbsp;the&nbsp;given&nbsp;expression.</p>\n\n<p><strong>(Choice&nbsp;E)</strong>&nbsp;&nbsp;47&nbsp;may&nbsp;result&nbsp;from&nbsp;evaluating&nbsp;|4(&minus;8)&nbsp;&minus;&nbsp;5(3)|&nbsp;or&nbsp;4(8)&nbsp;+&nbsp;5(3)&nbsp;instead&nbsp;of&nbsp;the&nbsp;given&nbsp;expression.</p>\n\n<p><strong>Things&nbsp;to&nbsp;remember:</strong><br />\nThe&nbsp;absolute&nbsp;value&nbsp;of&nbsp;a&nbsp;number&nbsp;is&nbsp;its&nbsp;distance&nbsp;from&nbsp;0,&nbsp;so&nbsp;taking&nbsp;the&nbsp;absolute&nbsp;value:</p>\n\n<ul>\n	<li>\n	<p>of&nbsp;a&nbsp;positive&nbsp;number&nbsp;or&nbsp;0&nbsp;does&nbsp;not&nbsp;change&nbsp;the&nbsp;value&nbsp;(ex.&nbsp;|5|&nbsp;=&nbsp;5&nbsp;and&nbsp;|0|&nbsp;=&nbsp;0).</p>\n	</li>\n	<li>\n	<p>of&nbsp;a&nbsp;negative&nbsp;number&nbsp;changes&nbsp;it&nbsp;from&nbsp;negative&nbsp;to&nbsp;positive&nbsp;(ex.&nbsp;|&minus;6|&nbsp;=&nbsp;6).</p>\n	</li>\n</ul>\n', '', '<iframeiframe>', 'Medium', '<p>The&nbsp;absolute&nbsp;value&nbsp;of&nbsp;a&nbsp;number&nbsp;is&nbsp;its&nbsp;distance&nbsp;from&nbsp;0,&nbsp;and&nbsp;it&nbsp;must&nbsp;be&nbsp;positive&nbsp;or&nbsp;zero.</p>\n\n<p>To&nbsp;take&nbsp;the&nbsp;absolute&nbsp;value&nbsp;of&nbsp;a&nbsp;negative&nbsp;number,&nbsp;change&nbsp;the&nbsp;sign&nbsp;to&nbsp;make&nbsp;the&nbsp;number&nbsp;positive.</p>\n', 'Active', '0', '0', 'Live', '00:00:25', 1, '2018-07-31 06:38:18', '2018-12-15 13:19:16'),
(4, 5, 4, 1, 8, '<p>In&nbsp;the&nbsp;figure&nbsp;below,&nbsp;parallel&nbsp;lines&nbsp;<em>A</em><em>E</em>&larr;&rarr;&nbsp;and&nbsp;<em>B</em><em>D</em>&larr;&rarr;&nbsp;are&nbsp;cut&nbsp;by&nbsp;transversals&nbsp;<em>A</em><em>C</em>&larr;&rarr;&nbsp;and&nbsp;<em>C</em><em>E</em>&larr;&rarr;,&nbsp;and&nbsp;2&nbsp;angle&nbsp;measures&nbsp;are&nbsp;given.&nbsp;&nbsp;What&nbsp;is&nbsp;the&nbsp;measure&nbsp;of&nbsp;&ang;<em>B</em><em>D</em><em>E</em>&nbsp;?</p>\n', 'MCQs', 20, '<p>First&nbsp;label&nbsp;the&nbsp;given&nbsp;information&nbsp;that&nbsp;<em>A</em><em>E</em>&larr;&rarr;âˆ¥<em>B</em><em>D</em>&larr;&rarr;,&nbsp;and&nbsp;let&nbsp;the&nbsp;measure&nbsp;of&nbsp;&ang;<em>B</em><em>D</em><em>E</em></p>\n\n<p>be&nbsp;<em>x</em>&deg;.</p>\n\n<p>&nbsp;</p>\n\n<p>When&nbsp;parallel&nbsp;lines&nbsp;are&nbsp;intersected&nbsp;by&nbsp;a&nbsp;transversal,&nbsp;the&nbsp;pairs&nbsp;of&nbsp;consecutive&nbsp;interior&nbsp;angles&nbsp;that&nbsp;they&nbsp;form&nbsp;are&nbsp;supplementary&nbsp;(measures&nbsp;sum&nbsp;to&nbsp;180&deg;).</p>\n\n<p>It&nbsp;is&nbsp;given&nbsp;that&nbsp;<em>A</em><em>E</em>&larr;&rarr;</p>\n\n<p>and&nbsp;<em>B</em><em>D</em>&larr;&rarr;&nbsp;are&nbsp;parallel,&nbsp;so&nbsp;<strong>consecutive&nbsp;interior&nbsp;angles</strong>&nbsp;&nbsp;<strong>&ang;</strong><em><strong>A</strong></em><em><strong>E</strong></em><em><strong>D</strong></em>&nbsp;&nbsp;<strong>and</strong>&nbsp;&nbsp;<strong>&ang;</strong><em><strong>B</strong></em><em><strong>D</strong></em><em><strong>E</strong></em></p>\n\n<p>&nbsp;<strong>must&nbsp;be&nbsp;supplementary</strong>.</p>\n\n<p>&nbsp;</p>\n\n<p>Set&nbsp;the&nbsp;sum&nbsp;of&nbsp;64&nbsp;and&nbsp;<em>x</em>&nbsp;equal&nbsp;to&nbsp;180,&nbsp;and&nbsp;then&nbsp;solve&nbsp;for&nbsp;<em>x</em>.</p>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>64&nbsp;+&nbsp;<em>x</em>&nbsp;=&nbsp;180</td>\n			<td>When&nbsp;parallel&nbsp;lines&nbsp;are&nbsp;cut&nbsp;by&nbsp;a&nbsp;transversal,&nbsp;pairs&nbsp;of&nbsp;consecutive&nbsp;interior&nbsp;angles&nbsp;are&nbsp;supplementary</td>\n		</tr>\n		<tr>\n			<td><em>x</em>&nbsp;=&nbsp;116</td>\n			<td>Subtract&nbsp;64&nbsp;from&nbsp;both&nbsp;sides</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>The&nbsp;measure&nbsp;of&nbsp;&ang;<em>B</em><em>D</em><em>E</em></p>\n\n<p>is&nbsp;116&deg;.</p>\n\n<p>(Note:&nbsp;&nbsp;Alternatively,&nbsp;the&nbsp;measure&nbsp;of&nbsp;&ang;<em>B</em><em>D</em><em>E</em></p>\n\n<p>can&nbsp;be&nbsp;found&nbsp;with&nbsp;corresponding&nbsp;angles&nbsp;or&nbsp;alternate&nbsp;interior&nbsp;angles.&nbsp;&nbsp;The&nbsp;given&nbsp;80&deg;&nbsp;measure&nbsp;is&nbsp;extra&nbsp;information&nbsp;that&nbsp;is&nbsp;not&nbsp;needed&nbsp;to&nbsp;answer&nbsp;the&nbsp;question.)</p>\n\n<p><strong>(Choice&nbsp;A)</strong>&nbsp;&nbsp;64&deg;&nbsp;is&nbsp;a&nbsp;result&nbsp;of&nbsp;the&nbsp;misconception&nbsp;that&nbsp;when&nbsp;parallel&nbsp;lines&nbsp;are&nbsp;cut&nbsp;by&nbsp;a&nbsp;transversal,&nbsp;pairs&nbsp;of&nbsp;consecutive&nbsp;interior&nbsp;angles&nbsp;are&nbsp;congruent&nbsp;(they&nbsp;are&nbsp;supplementary).</p>\n\n<p><strong>(Choice&nbsp;B)</strong>&nbsp;&nbsp;100&deg;&nbsp;is&nbsp;the&nbsp;measure&nbsp;of&nbsp;&ang;<em>A</em><em>B</em><em>D</em></p>\n\n<p>,&nbsp;but&nbsp;the&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;measure&nbsp;of&nbsp;&ang;<em>B</em><em>D</em><em>E</em></p>\n\n<p>.</p>\n\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;106&deg;&nbsp;may&nbsp;result&nbsp;from&nbsp;a&nbsp;subtraction&nbsp;error:&nbsp;&nbsp;180&nbsp;&minus;&nbsp;64&nbsp;&ne;&nbsp;106.</p>\n\n<p><strong>(Choice&nbsp;D)</strong>&nbsp;&nbsp;108&deg;&nbsp;is&nbsp;supplementary&nbsp;to&nbsp;the&nbsp;average&nbsp;of&nbsp;the&nbsp;two&nbsp;given&nbsp;angles,&nbsp;but&nbsp;&ang;<em>B</em><em>D</em><em>E</em></p>\n\n<p>is&nbsp;supplementary&nbsp;to&nbsp;the&nbsp;64&deg;&nbsp;angle.</p>\n\n<p><strong>Things&nbsp;to&nbsp;remember:</strong><br />\nWhen&nbsp;parallel&nbsp;lines&nbsp;are&nbsp;cut&nbsp;by&nbsp;a&nbsp;transversal,&nbsp;the&nbsp;following&nbsp;pairs&nbsp;of&nbsp;angles&nbsp;are&nbsp;formed:</p>\n\n<p>&nbsp;</p>\n', 'UWorld QBank Demo - Mozilla Firefox_2.jpg', '<iframeiframe>', 'Medium', '<p>When&nbsp;parallel&nbsp;lines&nbsp;are&nbsp;intersected&nbsp;by&nbsp;a&nbsp;transversal,&nbsp;the&nbsp;pairs&nbsp;of&nbsp;consecutive&nbsp;interior&nbsp;angles&nbsp;they&nbsp;form&nbsp;are&nbsp;supplementary&nbsp;(measures&nbsp;sum&nbsp;to&nbsp;180&deg;).</p>\n', 'Active', '0', '0', 'Live', '00:00:25', 1, '2018-07-31 06:39:27', '2018-12-15 13:19:36'),
(5, 5, 4, 1, 5, '<p>The&nbsp;figure&nbsp;below&nbsp;shows&nbsp;an&nbsp;observer&nbsp;in&nbsp;a&nbsp;watchtower&nbsp;looking&nbsp;down&nbsp;at&nbsp;a&nbsp;person&nbsp;on&nbsp;the&nbsp;ground&nbsp;through&nbsp;binoculars.&nbsp;&nbsp;The&nbsp;binoculars&nbsp;are&nbsp;80&nbsp;feet&nbsp;above&nbsp;the&nbsp;ground,&nbsp;and&nbsp;the&nbsp;angle&nbsp;of&nbsp;depression&nbsp;from&nbsp;the&nbsp;binoculars&nbsp;to&nbsp;the&nbsp;point&nbsp;on&nbsp;the&nbsp;ground&nbsp;where&nbsp;the&nbsp;person&nbsp;is&nbsp;standing&nbsp;is&nbsp;55&deg;.&nbsp;&nbsp;Which&nbsp;of&nbsp;the&nbsp;following&nbsp;is&nbsp;closest&nbsp;to&nbsp;the&nbsp;horizontal&nbsp;distance,&nbsp;in&nbsp;feet,&nbsp;between&nbsp;the&nbsp;binoculars&nbsp;and&nbsp;the&nbsp;person&nbsp;on&nbsp;the&nbsp;ground?</p>\n\n<p>(Note:&nbsp;&nbsp;sin<em>&nbsp;</em>55&deg;&asymp;0.82</p>\n\n<p>,&nbsp;cos<em>&nbsp;</em>55&deg;&asymp;0.57,&nbsp;tan<em>&nbsp;</em>55&deg;&asymp;1.43)</p>\n', 'MCQs', 22, '<p>The&nbsp;<strong>angle&nbsp;of&nbsp;depression</strong>&nbsp;is&nbsp;the&nbsp;angle&nbsp;formed&nbsp;by&nbsp;an&nbsp;observer&#39;s&nbsp;line&nbsp;of&nbsp;sight&nbsp;and&nbsp;the&nbsp;horizon&nbsp;when&nbsp;the&nbsp;observer&nbsp;is&nbsp;<strong>looking&nbsp;down</strong>.&nbsp;&nbsp;The&nbsp;horizon&nbsp;line&nbsp;is&nbsp;always&nbsp;parallel&nbsp;to&nbsp;the&nbsp;ground&nbsp;regardless&nbsp;of&nbsp;the&nbsp;observer&#39;s&nbsp;elevation.</p>\n\n<p>If&nbsp;two&nbsp;parallel&nbsp;lines&nbsp;are&nbsp;intersected&nbsp;by&nbsp;a&nbsp;transversal,&nbsp;the&nbsp;pairs&nbsp;of&nbsp;alternate&nbsp;interior&nbsp;angles&nbsp;they&nbsp;form&nbsp;are&nbsp;congruent.&nbsp;&nbsp;The&nbsp;two&nbsp;angles&nbsp;indicated&nbsp;below&nbsp;are&nbsp;alternate&nbsp;interior&nbsp;angles,&nbsp;so&nbsp;they&nbsp;both&nbsp;have&nbsp;a&nbsp;measure&nbsp;of&nbsp;55&deg;.</p>\n\n<p>&nbsp;</p>\n\n<p>The&nbsp;bottom&nbsp;55&deg;&nbsp;angle&nbsp;is&nbsp;an&nbsp;acute&nbsp;angle&nbsp;in&nbsp;a&nbsp;right&nbsp;triangle,&nbsp;for&nbsp;which&nbsp;three&nbsp;main&nbsp;<strong>trigonometric&nbsp;ratios</strong>&nbsp;are&nbsp;defined.&nbsp;&nbsp;Each&nbsp;equals&nbsp;a&nbsp;specific&nbsp;ratio&nbsp;of&nbsp;side&nbsp;lengths.</p>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td><strong>sine&nbsp;(sin)</strong></td>\n			<td><strong>cosine&nbsp;(cos)</strong></td>\n			<td><strong>tangent&nbsp;(tan)</strong></td>\n		</tr>\n		<tr>\n			<td>\n			<p>opposite<em>&nbsp;</em>leghypotenuse</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>\n			<p>adjacent<em>&nbsp;</em>leghypotenuse</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>\n			<p>opposite<em>&nbsp;</em>legadjacent<em>&nbsp;</em>leg</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Let&nbsp;<em>x</em>&nbsp;be&nbsp;the&nbsp;desired&nbsp;length&nbsp;of&nbsp;the&nbsp;horizontal&nbsp;leg&nbsp;of&nbsp;the&nbsp;triangle.</p>\n\n<p>The&nbsp;unknown&nbsp;leg&nbsp;(<em>x</em>)&nbsp;is&nbsp;<strong>adjacent</strong>&nbsp;to&nbsp;the&nbsp;55&deg;&nbsp;angle&nbsp;and&nbsp;the&nbsp;known&nbsp;leg&nbsp;(80&nbsp;feet)&nbsp;is&nbsp;<strong>opposite</strong>&nbsp;the&nbsp;55&deg;&nbsp;angle,&nbsp;so&nbsp;use&nbsp;the&nbsp;<strong>tangent&nbsp;ratio</strong>&nbsp;to&nbsp;relate&nbsp;them.&nbsp;&nbsp;Plug&nbsp;in&nbsp;the&nbsp;given&nbsp;value&nbsp;tan<em>&nbsp;</em>55&deg;&asymp;1.43</p>\n\n<p>,&nbsp;and&nbsp;solve&nbsp;for&nbsp;<em>x</em>.</p>\n\n<p>&nbsp;</p>\n\n<p>The&nbsp;<strong>horizontal&nbsp;distance</strong>&nbsp;between&nbsp;the&nbsp;binoculars&nbsp;and&nbsp;the&nbsp;person&nbsp;on&nbsp;the&nbsp;ground&nbsp;is&nbsp;approximately&nbsp;<strong>56&nbsp;feet</strong>.</p>\n\n<p><strong>(Choice&nbsp;A)</strong>&nbsp;&nbsp;46&nbsp;may&nbsp;be&nbsp;a&nbsp;result&nbsp;of&nbsp;calculating&nbsp;the&nbsp;desired&nbsp;distance&nbsp;with&nbsp;80<em>&nbsp;</em>cos<em>&nbsp;</em>55&deg;</p>\n\n<p>instead&nbsp;of&nbsp;80tan<em>&nbsp;</em>55&deg;</p>\n\n<p>.</p>\n\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;66&nbsp;may&nbsp;be&nbsp;a&nbsp;result&nbsp;of&nbsp;calculating&nbsp;the&nbsp;desired&nbsp;distance&nbsp;with&nbsp;80<em>&nbsp;</em>sin<em>&nbsp;</em>55&deg;</p>\n\n<p>instead&nbsp;of&nbsp;80tan<em>&nbsp;</em>55&deg;</p>\n\n<p>.</p>\n\n<p><strong>(Choice&nbsp;D)</strong>&nbsp;&nbsp;98&nbsp;is&nbsp;the&nbsp;approximate&nbsp;distance&nbsp;of&nbsp;the&nbsp;line&nbsp;of&nbsp;sight&nbsp;between&nbsp;the&nbsp;binoculars&nbsp;and&nbsp;the&nbsp;person&nbsp;on&nbsp;the&nbsp;ground&nbsp;(the&nbsp;hypotenuse&nbsp;of&nbsp;the&nbsp;triangle),&nbsp;but&nbsp;the&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;horizontal&nbsp;distance&nbsp;between&nbsp;them.</p>\n\n<p><strong>(Choice&nbsp;E)</strong>&nbsp;&nbsp;114&nbsp;may&nbsp;be&nbsp;a&nbsp;result&nbsp;of&nbsp;calculating&nbsp;the&nbsp;desired&nbsp;distance&nbsp;with&nbsp;80<em>&nbsp;</em>tan<em>&nbsp;</em>55&deg;</p>\n\n<p>instead&nbsp;of&nbsp;80tan<em>&nbsp;</em>55&deg;</p>\n\n<p>.</p>\n\n<p><strong>Things&nbsp;to&nbsp;remember:</strong></p>\n\n<ul>\n	<li>An&nbsp;angle&nbsp;of&nbsp;depression&nbsp;is&nbsp;the&nbsp;angle&nbsp;formed&nbsp;by&nbsp;an&nbsp;observer&#39;s&nbsp;line&nbsp;of&nbsp;sight&nbsp;and&nbsp;the&nbsp;horizon,&nbsp;when&nbsp;the&nbsp;observer&nbsp;is&nbsp;looking&nbsp;down.</li>\n	<li>If&nbsp;two&nbsp;parallel&nbsp;lines&nbsp;are&nbsp;intersected&nbsp;by&nbsp;a&nbsp;transversal,&nbsp;the&nbsp;pairs&nbsp;of&nbsp;alternate&nbsp;interior&nbsp;angles&nbsp;they&nbsp;form&nbsp;are&nbsp;congruent&nbsp;(have&nbsp;the&nbsp;same&nbsp;measure).</li>\n	<li>Three&nbsp;main&nbsp;trigonometric&nbsp;ratios&nbsp;are&nbsp;defined&nbsp;for&nbsp;an&nbsp;acute&nbsp;angle&nbsp;in&nbsp;a&nbsp;right&nbsp;triangle:&nbsp;&nbsp;sine,&nbsp;cosine,&nbsp;and&nbsp;tangent.&nbsp;&nbsp;Each&nbsp;equals&nbsp;a&nbsp;specific&nbsp;ratio&nbsp;of&nbsp;side&nbsp;lengths.</li>\n</ul>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td><strong>sine&nbsp;(sin)</strong></td>\n			<td><strong>cosine&nbsp;(cos)</strong></td>\n			<td><strong>tangent&nbsp;(tan)</strong></td>\n		</tr>\n		<tr>\n			<td>\n			<p>opposite<em>&nbsp;</em>leghypotenuse</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>\n			<p>adjacent<em>&nbsp;</em>leghypotenuse</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>\n			<p>opposite<em>&nbsp;</em>legadjacent<em>&nbsp;</em>leg</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 'UWorld QBank Demo - Mozilla Firefox_3.jpg', '<iframeiframe>', 'Medium', '<p>The&nbsp;angle&nbsp;of&nbsp;depression&nbsp;is&nbsp;the&nbsp;angle&nbsp;formed&nbsp;by&nbsp;an&nbsp;observer&#39;s&nbsp;line&nbsp;of&nbsp;sight&nbsp;and&nbsp;the&nbsp;horizon,&nbsp;when&nbsp;the&nbsp;observer&nbsp;is&nbsp;looking&nbsp;down.</p>\n\n<p>If&nbsp;two&nbsp;parallel&nbsp;lines&nbsp;are&nbsp;intersected&nbsp;by&nbsp;a&nbsp;transversal,&nbsp;the&nbsp;pairs&nbsp;of&nbsp;alternate&nbsp;interior&nbsp;angles&nbsp;they&nbsp;form&nbsp;are&nbsp;congruent.</p>\n', 'Active', '0', '0', 'Live', '00:00:25', 1, '2018-07-31 06:40:47', '2018-12-15 13:19:51'),
(6, 5, 4, 1, 6, '<p>Given&nbsp;that&nbsp;2<em>x</em>&nbsp;+&nbsp;5<em>y</em>&nbsp;=&nbsp;24&nbsp;and&nbsp;<em>x</em>&nbsp;+&nbsp;4<em>y</em>&nbsp;=&nbsp;15,&nbsp;what&nbsp;is&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>x</em>&nbsp;+&nbsp;<em>y</em>&nbsp;?</p>\r\n', 'MCQs', 30, '<p>If&nbsp;a&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;<strong>value&nbsp;of&nbsp;an&nbsp;expression</strong>&nbsp;(<em>x</em>&nbsp;+&nbsp;<em>y</em>)&nbsp;instead&nbsp;of&nbsp;a&nbsp;single&nbsp;variable&nbsp;(<em>x</em>&nbsp;or&nbsp;<em>y</em>)&nbsp;in&nbsp;a&nbsp;system&nbsp;of&nbsp;two&nbsp;equations,&nbsp;check&nbsp;if&nbsp;it&nbsp;is&nbsp;possible&nbsp;to&nbsp;<strong>solve&nbsp;directly</strong>&nbsp;for&nbsp;the&nbsp;expression&nbsp;by&nbsp;<strong>adding&nbsp;or&nbsp;subtracting</strong>&nbsp;the&nbsp;<strong>equations</strong>.</p>\r\n\r\n<p>For&nbsp;the&nbsp;given&nbsp;system,&nbsp;<strong>subtract</strong>&nbsp;the&nbsp;second&nbsp;equation&nbsp;from&nbsp;the&nbsp;first&nbsp;equation&nbsp;to&nbsp;solve&nbsp;for&nbsp;<em>x</em>&nbsp;+&nbsp;<em>y</em>&nbsp;directly.</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>2<em>x</em>+5<em>y</em>=24</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\n<em>x</em>+4<em>y</em>=15</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>Given&nbsp;system&nbsp;of&nbsp;equations</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2<em>x</em>+5<em>y</em>=24</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\n&minus;(<em>x</em>+4<em>y</em>=15)<br />\r\n<em>x</em>+<em>y</em>=9</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>Subtract&nbsp;the&nbsp;second&nbsp;equation&nbsp;from&nbsp;the&nbsp;first&nbsp;equation</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>The&nbsp;value&nbsp;of&nbsp;<em>x</em>&nbsp;+&nbsp;<em>y</em>&nbsp;is&nbsp;9.</p>\r\n\r\n<p><strong>(Choice&nbsp;A)</strong>&nbsp;&nbsp;2&nbsp;is&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>y</em>&nbsp;(see&nbsp;alternate&nbsp;method),&nbsp;but&nbsp;the&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>x</em>&nbsp;+&nbsp;<em>y</em>.</p>\r\n\r\n<p><strong>(Choice&nbsp;B)</strong>&nbsp;&nbsp;5&nbsp;is&nbsp;a&nbsp;result&nbsp;of&nbsp;correctly&nbsp;finding&nbsp;that&nbsp;<em>x</em>&nbsp;=&nbsp;7&nbsp;and&nbsp;<em>y</em>&nbsp;=&nbsp;2&nbsp;(see&nbsp;alternate&nbsp;method)&nbsp;and&nbsp;then&nbsp;finding&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>x</em>&nbsp;&minus;&nbsp;<em>y</em>,&nbsp;but&nbsp;the&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>x</em>&nbsp;+&nbsp;<em>y</em>.</p>\r\n\r\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;6&nbsp;is&nbsp;a&nbsp;result&nbsp;of&nbsp;correctly&nbsp;finding&nbsp;that&nbsp;<em>y</em>&nbsp;=&nbsp;2&nbsp;but&nbsp;incorrectly&nbsp;plugging&nbsp;2&nbsp;in&nbsp;for&nbsp;<em>x</em>&nbsp;in&nbsp;the&nbsp;first&nbsp;equation&nbsp;2<em>x</em>&nbsp;+&nbsp;5<em>y</em>&nbsp;=&nbsp;24&nbsp;to&nbsp;get&nbsp;<em>y</em>&nbsp;=&nbsp;4&nbsp;and&nbsp;then&nbsp;adding&nbsp;the&nbsp;values&nbsp;to&nbsp;get&nbsp;2&nbsp;+&nbsp;4&nbsp;=&nbsp;6.</p>\r\n\r\n<p><strong>(Choice&nbsp;D)</strong>&nbsp;&nbsp;7&nbsp;is&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>x</em>&nbsp;(see&nbsp;alternate&nbsp;method),&nbsp;but&nbsp;the&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>x</em>&nbsp;+&nbsp;<em>y</em>.</p>\r\n\r\n<p><strong>Things&nbsp;to&nbsp;remember:</strong><br />\r\nIf&nbsp;a&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;value&nbsp;of&nbsp;an&nbsp;expression&nbsp;(<em>x</em>&nbsp;+&nbsp;<em>y</em>)&nbsp;instead&nbsp;of&nbsp;a&nbsp;single&nbsp;variable&nbsp;(<em>x</em>&nbsp;or&nbsp;<em>y</em>)&nbsp;in&nbsp;a&nbsp;system&nbsp;of&nbsp;two&nbsp;equations,&nbsp;check&nbsp;if&nbsp;it&nbsp;is&nbsp;possible&nbsp;to&nbsp;solve&nbsp;for&nbsp;the&nbsp;expression&nbsp;directly&nbsp;by&nbsp;adding&nbsp;or&nbsp;subtracting&nbsp;the&nbsp;equations.</p>\r\n', '', '', 'Medium', '<p>If&nbsp;a&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;value&nbsp;of&nbsp;an&nbsp;expression&nbsp;(<em>x</em>&nbsp;+&nbsp;<em>y</em>)&nbsp;instead&nbsp;of&nbsp;a&nbsp;single&nbsp;variable&nbsp;(<em>x</em>&nbsp;or&nbsp;<em>y</em>)&nbsp;in&nbsp;a&nbsp;system&nbsp;of&nbsp;two&nbsp;equations,&nbsp;check&nbsp;if&nbsp;it&nbsp;is&nbsp;possible&nbsp;to&nbsp;solve&nbsp;for&nbsp;the&nbsp;expression&nbsp;directly&nbsp;by&nbsp;adding&nbsp;or&nbsp;subtracting&nbsp;the&nbsp;equations.</p>\r\n', 'Active', '0', '0', 'Demo', '00:00:25', 1, '2018-07-31 06:41:42', '2018-08-03 08:58:30'),
(7, 5, 4, 1, 7, '<p>Why&nbsp;do&nbsp;objects&nbsp;float&nbsp;in&nbsp;liquids&nbsp;denser&nbsp;than&nbsp;themselves?</p>\n', 'Detail', 31, '<p>An&nbsp;<strong>arithmetic&nbsp;sequence</strong>&nbsp;is&nbsp;a&nbsp;sequence&nbsp;of&nbsp;numbers&nbsp;in&nbsp;which&nbsp;<strong>each&nbsp;term</strong>&nbsp;after&nbsp;the&nbsp;first&nbsp;is&nbsp;equal&nbsp;to&nbsp;the&nbsp;<strong>previous&nbsp;term&nbsp;plus&nbsp;a&nbsp;common&nbsp;difference</strong>.</p>\n\n<p>The&nbsp;two&nbsp;given&nbsp;terms&nbsp;(4th&nbsp;and&nbsp;5th)&nbsp;are&nbsp;consecutive,&nbsp;and&nbsp;the&nbsp;5th&nbsp;term&nbsp;(18)&nbsp;is&nbsp;equal&nbsp;to&nbsp;the&nbsp;<strong>previous&nbsp;term</strong>&nbsp;(14)&nbsp;<strong>plus&nbsp;4</strong>.&nbsp;&nbsp;Therefore,&nbsp;the&nbsp;arithmetic&nbsp;sequence&nbsp;has&nbsp;a&nbsp;<strong>common&nbsp;difference&nbsp;of&nbsp;4</strong>.</p>\n\n<p>&nbsp;</p>\n\n<p>To&nbsp;advance&nbsp;from&nbsp;the&nbsp;5th&nbsp;term&nbsp;(18)&nbsp;to&nbsp;the&nbsp;60th&nbsp;term,&nbsp;<strong>add&nbsp;the&nbsp;common&nbsp;difference&nbsp;(4)</strong>&nbsp;a&nbsp;total&nbsp;of&nbsp;<strong>55&nbsp;times</strong>&nbsp;(60&nbsp;&ndash;&nbsp;5).&nbsp;&nbsp;Then&nbsp;<strong>rewrite&nbsp;repeated&nbsp;addition&nbsp;as&nbsp;multiplication</strong>&nbsp;to&nbsp;simplify&nbsp;the&nbsp;result.</p>\n\n<p>&nbsp;</p>\n\n<p>The&nbsp;60th&nbsp;term&nbsp;of&nbsp;the&nbsp;sequence&nbsp;is&nbsp;238.</p>\n\n<p><strong>(Choice&nbsp;A)</strong>&nbsp;&nbsp;234&nbsp;is&nbsp;the&nbsp;59th&nbsp;term&nbsp;of&nbsp;the&nbsp;sequence,&nbsp;but&nbsp;the&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;60th.</p>\n\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;240&nbsp;is&nbsp;a&nbsp;result&nbsp;of&nbsp;mistakenly&nbsp;multiplying&nbsp;the&nbsp;common&nbsp;difference&nbsp;(4)&nbsp;by&nbsp;60.</p>\n\n<p><strong>(Choice&nbsp;D)</strong>&nbsp;&nbsp;242&nbsp;is&nbsp;the&nbsp;61st&nbsp;term&nbsp;of&nbsp;the&nbsp;sequence,&nbsp;but&nbsp;the&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;60th.</p>\n\n<p><strong>(Choice&nbsp;E)</strong>&nbsp;&nbsp;246&nbsp;is&nbsp;the&nbsp;62nd&nbsp;term&nbsp;of&nbsp;the&nbsp;sequence,&nbsp;but&nbsp;the&nbsp;question&nbsp;asks&nbsp;for&nbsp;the&nbsp;60th.</p>\n\n<p><strong>Things&nbsp;to&nbsp;remember:</strong><br />\nIn&nbsp;an&nbsp;arithmetic&nbsp;sequence,&nbsp;each&nbsp;term&nbsp;after&nbsp;the&nbsp;first&nbsp;is&nbsp;equal&nbsp;to&nbsp;the&nbsp;previous&nbsp;term&nbsp;plus&nbsp;a&nbsp;common&nbsp;difference.</p>\n', '', '<iframeiframe>', 'Medium', '', 'Active', '0', '0', 'Live,Demo', '00:00:25', 1, '2018-07-31 06:42:32', '2018-12-12 19:06:22'),
(8, 5, 4, 1, 8, '<p>Segments&nbsp;<em>A</em><em>D</em>&macr;&macr;&macr;&macr;&macr;,&nbsp;<em>B</em><em>E</em>&macr;&macr;&macr;&macr;&macr;,&nbsp;and&nbsp;<em>C</em><em>F</em>&macr;&macr;&macr;&macr;&macr;&nbsp;intersect&nbsp;at&nbsp;point&nbsp;<em>O</em>,&nbsp;as&nbsp;shown&nbsp;in&nbsp;the&nbsp;figure&nbsp;below.&nbsp;&nbsp;Given&nbsp;that&nbsp;180&deg;&nbsp;&lt;&nbsp;<em>&alpha;</em>&deg;&nbsp;&lt;&nbsp;360&deg;&nbsp;and&nbsp;that&nbsp;<em>&alpha;</em>&nbsp;=&nbsp;5<em>&beta;</em>,&nbsp;what&nbsp;is&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>&beta;</em>&nbsp;?</p>\r\n', 'Detail', 32, '<p>To&nbsp;find&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>&beta;</em>,&nbsp;<strong>first&nbsp;identify&nbsp;vertical&nbsp;angles</strong>&nbsp;to&nbsp;see&nbsp;that&nbsp;<em>&alpha;</em>&nbsp;+&nbsp;<em>&beta;</em>&nbsp;=&nbsp;360&nbsp;and&nbsp;<strong>then&nbsp;plug&nbsp;in&nbsp;the&nbsp;given&nbsp;relationship</strong>&nbsp;<em>a</em>&nbsp;=&nbsp;5<em>&beta;</em>.</p>\r\n\r\n<p>When&nbsp;two&nbsp;segments&nbsp;intersect,&nbsp;the&nbsp;vertical&nbsp;angles&nbsp;they&nbsp;form&nbsp;are&nbsp;congruent&nbsp;so&nbsp;the&nbsp;angle&nbsp;opposite&nbsp;the&nbsp;given&nbsp;<em>&beta;</em>&deg;&nbsp;angle&nbsp;also&nbsp;has&nbsp;measure&nbsp;<em>&beta;</em>&deg;.&nbsp;&nbsp;Notice&nbsp;the&nbsp;<em>&alpha;</em>&deg;&nbsp;angle&nbsp;and&nbsp;this&nbsp;second&nbsp;<em>&beta;</em>&deg;&nbsp;angle&nbsp;form&nbsp;a&nbsp;complete&nbsp;circle&nbsp;(or&nbsp;360&deg;&nbsp;rotation).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>There&nbsp;are&nbsp;360&deg;&nbsp;in&nbsp;a&nbsp;circle</strong>,&nbsp;so&nbsp;it&nbsp;must&nbsp;be&nbsp;true&nbsp;that&nbsp;<strong><em>&alpha;</em>&nbsp;+&nbsp;<em>&beta;</em>&nbsp;=&nbsp;360</strong>.&nbsp;&nbsp;Plug&nbsp;the&nbsp;given&nbsp;relationship&nbsp;<em>&alpha;</em>&nbsp;=&nbsp;5<em>&beta;</em>&nbsp;into&nbsp;this&nbsp;equation&nbsp;and&nbsp;then&nbsp;solve&nbsp;for&nbsp;<em>&beta;</em>.</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><em>&alpha;</em>&nbsp;+&nbsp;<em>&beta;</em>&nbsp;=&nbsp;360</td>\r\n			<td>The&nbsp;measures&nbsp;of&nbsp;angles&nbsp;that&nbsp;form&nbsp;a&nbsp;complete&nbsp;circle&nbsp;sum&nbsp;to&nbsp;360&deg;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5<em>&beta;</em>&nbsp;+&nbsp;<em>&beta;</em>&nbsp;=&nbsp;360</td>\r\n			<td>Plug&nbsp;in&nbsp;<em>&alpha;</em>&nbsp;=&nbsp;5<em>&beta;</em></td>\r\n		</tr>\r\n		<tr>\r\n			<td>6<em>&beta;</em>&nbsp;=&nbsp;360</td>\r\n			<td>Combine&nbsp;<em>&beta;</em>-terms</td>\r\n		</tr>\r\n		<tr>\r\n			<td><em>&beta;</em>&nbsp;=&nbsp;60</td>\r\n			<td>Divide&nbsp;both&nbsp;sides&nbsp;by&nbsp;6</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>The&nbsp;value&nbsp;of&nbsp;<em>&beta;</em>&nbsp;is&nbsp;60.</p>\r\n\r\n<p><strong>(Choice&nbsp;A)</strong>&nbsp;&nbsp;36&nbsp;may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;identifying&nbsp;<em>&alpha;</em>&deg;&nbsp;as&nbsp;180&deg;,&nbsp;but&nbsp;it&nbsp;is&nbsp;given&nbsp;that&nbsp;<em>&alpha;</em>&nbsp;&gt;&nbsp;180&deg;.</p>\r\n\r\n<p><strong>(Choices&nbsp;B&nbsp;and&nbsp;D)</strong>&nbsp;&nbsp;54&nbsp;and&nbsp;64&nbsp;may&nbsp;result&nbsp;from&nbsp;attempting&nbsp;to&nbsp;estimate&nbsp;the&nbsp;value&nbsp;of&nbsp;<em>&beta;</em>&nbsp;from&nbsp;the&nbsp;given&nbsp;figure.</p>\r\n\r\n<p><strong>(Choice&nbsp;E)</strong>&nbsp;&nbsp;72&nbsp;may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;calculating&nbsp;the&nbsp;complete&nbsp;circle&nbsp;to&nbsp;have&nbsp;a&nbsp;measure&nbsp;of&nbsp;<em>&alpha;</em>&nbsp;&minus;&nbsp;<em>&beta;</em>&nbsp;instead&nbsp;of&nbsp;<em>&alpha;</em>&nbsp;+&nbsp;<em>&beta;</em>,&nbsp;or&nbsp;from&nbsp;mistakenly&nbsp;setting&nbsp;5<em>&beta;</em>&nbsp;=&nbsp;360.</p>\r\n\r\n<p><strong>Things&nbsp;to&nbsp;remember:</strong></p>\r\n\r\n<ul>\r\n	<li>When&nbsp;two&nbsp;lines&nbsp;intersect,&nbsp;the&nbsp;vertical&nbsp;angles&nbsp;they&nbsp;form&nbsp;are&nbsp;congruent.</li>\r\n	<li>The&nbsp;measures&nbsp;of&nbsp;angles&nbsp;that&nbsp;form&nbsp;a&nbsp;complete&nbsp;circle&nbsp;sum&nbsp;to&nbsp;360&deg;.</li>\r\n</ul>\r\n', 'UWorld QBank Demo - Mozilla Firefox_4.jpg', '', 'Medium', '<p>When&nbsp;two&nbsp;lines&nbsp;intersect,&nbsp;the&nbsp;vertical&nbsp;angles&nbsp;they&nbsp;form&nbsp;are&nbsp;congruent.&nbsp;&nbsp;Write&nbsp;an&nbsp;equation&nbsp;in&nbsp;terms&nbsp;of&nbsp;<em>&alpha;</em>&nbsp;and&nbsp;<em>&beta;</em>,&nbsp;and&nbsp;then&nbsp;plug&nbsp;in&nbsp;the&nbsp;given&nbsp;relationship&nbsp;<em>&alpha;</em>&nbsp;=&nbsp;5<em>&beta;</em>.</p>\r\n', 'Active', '0', '0', 'Demo', '00:00:30', 1, '2018-07-31 06:43:33', '2018-08-03 09:02:26'),
(9, 5, 4, 1, 5, '<p>The&nbsp;default&nbsp;wireless&nbsp;passwords&nbsp;assigned&nbsp;by&nbsp;an&nbsp;internet&nbsp;company&nbsp;each&nbsp;consist&nbsp;of&nbsp;the&nbsp;following&nbsp;sequence:&nbsp;2&nbsp;digits,&nbsp;4&nbsp;letters,&nbsp;2&nbsp;digits.&nbsp;&nbsp;For&nbsp;each&nbsp;password,&nbsp;any&nbsp;digit&nbsp;(from&nbsp;0&nbsp;to&nbsp;9)&nbsp;can&nbsp;repeat,&nbsp;but&nbsp;the&nbsp;letters&nbsp;(from&nbsp;A&nbsp;to&nbsp;Z)&nbsp;can&nbsp;be&nbsp;used&nbsp;only&nbsp;once.&nbsp;&nbsp;Joan&nbsp;signs&nbsp;up&nbsp;for&nbsp;internet&nbsp;service&nbsp;with&nbsp;the&nbsp;company&nbsp;and&nbsp;is&nbsp;randomly&nbsp;assigned&nbsp;a&nbsp;default&nbsp;password.&nbsp;&nbsp;Which&nbsp;of&nbsp;the&nbsp;following&nbsp;gives&nbsp;the&nbsp;probability&nbsp;that&nbsp;her&nbsp;password&nbsp;contains&nbsp;her&nbsp;name,&nbsp;JOAN?</p>\r\n', 'Detail', 33, '<p>To&nbsp;find&nbsp;the&nbsp;probability&nbsp;<em>P</em>&nbsp;of&nbsp;a&nbsp;desired&nbsp;event,&nbsp;divide&nbsp;the&nbsp;number&nbsp;of&nbsp;desired&nbsp;outcomes&nbsp;by&nbsp;the&nbsp;total&nbsp;number&nbsp;of&nbsp;possible&nbsp;outcomes.</p>\r\n\r\n<p>The&nbsp;<strong>number&nbsp;of&nbsp;desired&nbsp;outcomes</strong>&nbsp;is&nbsp;the&nbsp;number&nbsp;of&nbsp;passwords&nbsp;that&nbsp;contain&nbsp;the&nbsp;sequence&nbsp;of&nbsp;letters&nbsp;JOAN.<br />\r\nThe&nbsp;<strong>number&nbsp;of&nbsp;possible&nbsp;outcomes</strong>&nbsp;is&nbsp;the&nbsp;number&nbsp;of&nbsp;possible&nbsp;passwords&nbsp;that&nbsp;the&nbsp;company&nbsp;can&nbsp;assign.</p>\r\n\r\n<p><em>P</em>=passwords&nbsp;containing&nbsp;JOANtotal&nbsp;possible&nbsp;passwords</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Use&nbsp;the&nbsp;fundamental&nbsp;counting&nbsp;principle&nbsp;to&nbsp;find&nbsp;both&nbsp;the&nbsp;number&nbsp;of&nbsp;desired&nbsp;outcomes&nbsp;and&nbsp;the&nbsp;number&nbsp;of&nbsp;possible&nbsp;outcomes.&nbsp;&nbsp;It&nbsp;is&nbsp;given&nbsp;that&nbsp;the&nbsp;sequence&nbsp;of&nbsp;each&nbsp;password&nbsp;is&nbsp;two&nbsp;digits,&nbsp;then&nbsp;four&nbsp;letters,&nbsp;then&nbsp;two&nbsp;digits.</p>\r\n\r\n<p>Each&nbsp;digit&nbsp;chosen&nbsp;from&nbsp;0&nbsp;through&nbsp;9&nbsp;can&nbsp;repeat,&nbsp;so&nbsp;there&nbsp;are&nbsp;<strong>10&nbsp;ways&nbsp;to&nbsp;choose&nbsp;each&nbsp;digit</strong>.&nbsp;&nbsp;First&nbsp;<strong>set&nbsp;up&nbsp;a&nbsp;product&nbsp;of&nbsp;blanks&nbsp;for&nbsp;the&nbsp;number&nbsp;of&nbsp;ways&nbsp;to&nbsp;choose&nbsp;each&nbsp;digit&nbsp;or&nbsp;letter</strong>,&nbsp;and&nbsp;fill&nbsp;in&nbsp;10&nbsp;ways&nbsp;for&nbsp;each&nbsp;digit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To&nbsp;find&nbsp;the&nbsp;number&nbsp;of&nbsp;<strong>total&nbsp;possible&nbsp;passwords</strong>,&nbsp;consider&nbsp;that&nbsp;each&nbsp;letter&nbsp;chosen&nbsp;from&nbsp;A&nbsp;to&nbsp;Z&nbsp;cannot&nbsp;repeat,&nbsp;so&nbsp;there&nbsp;is&nbsp;1&nbsp;fewer&nbsp;possibility&nbsp;for&nbsp;each&nbsp;successive&nbsp;letter&nbsp;(26,&nbsp;25,&nbsp;24,&nbsp;23).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>(Note:&nbsp;&nbsp;To&nbsp;match&nbsp;the&nbsp;answer&nbsp;choices,&nbsp;combine&nbsp;factors&nbsp;of&nbsp;10&nbsp;but&nbsp;do&nbsp;not&nbsp;evaluate&nbsp;the&nbsp;entire&nbsp;expression.)</p>\r\n\r\n<p>To&nbsp;find&nbsp;the&nbsp;number&nbsp;of&nbsp;<strong>passwords&nbsp;containing&nbsp;JOAN</strong>,&nbsp;now&nbsp;consider&nbsp;that&nbsp;there&nbsp;is&nbsp;only&nbsp;<strong>1&nbsp;way&nbsp;to&nbsp;choose&nbsp;each&nbsp;of&nbsp;the&nbsp;four&nbsp;letters</strong>&nbsp;(J,&nbsp;O,&nbsp;A,&nbsp;N).&nbsp;&nbsp;Fill&nbsp;in&nbsp;each&nbsp;letter&nbsp;blank&nbsp;with&nbsp;a&nbsp;1&nbsp;to&nbsp;find&nbsp;the&nbsp;number&nbsp;of&nbsp;passwords&nbsp;containing&nbsp;JOAN.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The&nbsp;number&nbsp;of&nbsp;desired&nbsp;outcomes&nbsp;is&nbsp;104,&nbsp;and&nbsp;the&nbsp;number&nbsp;of&nbsp;total&nbsp;possible&nbsp;outcomes&nbsp;is&nbsp;104(26)(25)(24)(23).</p>\r\n\r\n<p>Plug&nbsp;these&nbsp;expressions&nbsp;into&nbsp;the&nbsp;probability&nbsp;formula&nbsp;for&nbsp;a&nbsp;password&nbsp;containing&nbsp;JOAN,&nbsp;shown&nbsp;above.</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>passwords&nbsp;containing&nbsp;JOANtotal&nbsp;possible&nbsp;passwords</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>Probability&nbsp;password&nbsp;contains&nbsp;JOAN</td>\r\n		</tr>\r\n		<tr>\r\n			<td>104104(26)(25)(24)(23)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>Plug&nbsp;in&nbsp;expressions</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>(Choices&nbsp;A&nbsp;and&nbsp;B)</strong>&nbsp;104(4)(3)(2)(1)10(26)(25)(24)(23)</p>\r\n\r\n<p>and&nbsp;104(4)(3)(2)(1)104(264)</p>\r\n\r\n<p>may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;assuming&nbsp;that&nbsp;there&nbsp;are&nbsp;4&nbsp;choices&nbsp;for&nbsp;J,&nbsp;3&nbsp;choices&nbsp;for&nbsp;O,&nbsp;2&nbsp;choices&nbsp;for&nbsp;A,&nbsp;and&nbsp;1&nbsp;choice&nbsp;for&nbsp;N&nbsp;in&nbsp;the&nbsp;passwords&nbsp;containing&nbsp;JOAN,&nbsp;but&nbsp;there&nbsp;is&nbsp;only&nbsp;1&nbsp;possible&nbsp;choice&nbsp;for&nbsp;each&nbsp;letter&nbsp;so&nbsp;that&nbsp;together&nbsp;they&nbsp;spell&nbsp;JOAN.</p>\r\n\r\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;10410(9)(8)(7)(26)(25)(24)(23)</p>\r\n\r\n<p>may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;assuming&nbsp;that&nbsp;the&nbsp;digits&nbsp;cannot&nbsp;repeat.</p>\r\n\r\n<p><strong>(Choice&nbsp;E)</strong>&nbsp;&nbsp;104104(264)</p>\r\n\r\n<p>may&nbsp;result&nbsp;from&nbsp;incorrectly&nbsp;assuming&nbsp;that&nbsp;the&nbsp;letters&nbsp;can&nbsp;repeat.</p>\r\n\r\n<p><strong>Things&nbsp;to&nbsp;remember:</strong><br />\r\nTo&nbsp;find&nbsp;the&nbsp;probability&nbsp;<em>P</em>&nbsp;of&nbsp;a&nbsp;desired&nbsp;event,&nbsp;use&nbsp;the&nbsp;following&nbsp;formula:</p>\r\n\r\n<p><em>P</em>=number&nbsp;of&nbsp;desired&nbsp;outcomestotal&nbsp;number&nbsp;of&nbsp;possible&nbsp;outcomes</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The&nbsp;fundamental&nbsp;counting&nbsp;principle&nbsp;states&nbsp;that&nbsp;the&nbsp;number&nbsp;of&nbsp;ways&nbsp;to&nbsp;perform&nbsp;<em>n</em>&nbsp;actions&nbsp;is&nbsp;the&nbsp;product&nbsp;of&nbsp;the&nbsp;number&nbsp;of&nbsp;ways&nbsp;to&nbsp;perform&nbsp;each&nbsp;action.</p>\r\n', '', '', 'Medium', '<p>To&nbsp;find&nbsp;the&nbsp;probability&nbsp;<em>P</em>&nbsp;of&nbsp;a&nbsp;desired&nbsp;event,&nbsp;use&nbsp;the&nbsp;following&nbsp;formula:</p>\r\n\r\n<p><em>P</em>&nbsp;=&nbsp;number&nbsp;of&nbsp;desired&nbsp;outcomes&nbsp;/&nbsp;total&nbsp;number&nbsp;of&nbsp;possible&nbsp;outcomes</p>\r\n', 'Active', '0', '0', 'Demo', '00:00:45', 1, '2018-07-31 06:45:28', '2018-08-03 09:03:11'),
(10, 5, 4, 1, 6, '<p>2[12&minus;34]&nbsp;&minus;&nbsp;[&minus;452&minus;1]&nbsp;=&nbsp;?</p>\n', 'Detail', 34, '<p>The&nbsp;given&nbsp;expression&nbsp;contains&nbsp;two&nbsp;matrices&nbsp;and&nbsp;the&nbsp;first&nbsp;matrix&nbsp;is&nbsp;<strong>multiplied&nbsp;by&nbsp;a&nbsp;number</strong>.&nbsp;&nbsp;To&nbsp;multiply&nbsp;the&nbsp;first&nbsp;matrix&nbsp;by&nbsp;the&nbsp;number&nbsp;in&nbsp;front&nbsp;(2),&nbsp;<strong>multiply&nbsp;each&nbsp;entry</strong>&nbsp;by&nbsp;that&nbsp;number.</p>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>2[12&minus;34]&nbsp;&minus;&nbsp;[&minus;452&minus;1]</td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Given&nbsp;expression</td>\n		</tr>\n		<tr>\n			<td>[2&sdot;12&sdot;22&sdot;&minus;32&sdot;4]&nbsp;&minus;&nbsp;[&minus;452&minus;1]</td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Multiply&nbsp;first&nbsp;matrix&nbsp;by&nbsp;2</td>\n		</tr>\n		<tr>\n			<td>[24&minus;68]&nbsp;&minus;&nbsp;[&minus;452&minus;1]</td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Simplify</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>To&nbsp;subtract&nbsp;the&nbsp;two&nbsp;matrices,&nbsp;<strong>subtract&nbsp;values&nbsp;in&nbsp;corresponding&nbsp;entries</strong>.</p>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>[24&minus;68]&nbsp;&minus;&nbsp;[&minus;452&minus;1]</td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>[2&minus;(&minus;4)4&minus;5&minus;6&minus;28&minus;(&minus;1)]</td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Subtract&nbsp;corresponding&nbsp;entries</td>\n		</tr>\n		<tr>\n			<td>[6&minus;1&minus;89]</td>\n		</tr>\n	</tbody>\n</table>\n\n<table style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>Simplify</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>The&nbsp;given&nbsp;expression&nbsp;is&nbsp;equal&nbsp;to&nbsp;[6&minus;1&minus;89]</p>\n\n<p>.</p>\n\n<p><strong>(Choice&nbsp;A)</strong>&nbsp;&nbsp;[&minus;37&minus;13]</p>\n\n<p>may&nbsp;result&nbsp;from&nbsp;overlooking&nbsp;the&nbsp;2&nbsp;in&nbsp;front&nbsp;of&nbsp;the&nbsp;first&nbsp;matrix&nbsp;2[12&minus;34]</p>\n\n<p>and&nbsp;then&nbsp;adding&nbsp;(instead&nbsp;of&nbsp;subtracting)&nbsp;the&nbsp;matrices.</p>\n\n<p><strong>(Choice&nbsp;B)</strong>&nbsp;&nbsp;[&minus;2&minus;1&minus;87]</p>\n\n<p>may&nbsp;result&nbsp;from&nbsp;a&nbsp;sign&nbsp;error:&nbsp;[2&minus;(&minus;4)4&minus;5&minus;6&minus;28&minus;(&minus;1)]&ne;[2&minus;44&minus;5&minus;6&minus;28&minus;1]</p>\n\n<p>.</p>\n\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;[&minus;29&minus;47]</p>\n\n<p>may&nbsp;result&nbsp;from&nbsp;adding&nbsp;(instead&nbsp;of&nbsp;subtracting)&nbsp;the&nbsp;matrices.</p>\n\n<p><strong>(Choice&nbsp;D)</strong>&nbsp;&nbsp;[5&minus;3&minus;55]</p>\n\n<p>may&nbsp;result&nbsp;from&nbsp;overlooking&nbsp;the&nbsp;2&nbsp;in&nbsp;front&nbsp;of&nbsp;the&nbsp;first&nbsp;matrix&nbsp;2[12&minus;34]</p>\n\n<p>.</p>\n\n<p><strong>Things&nbsp;to&nbsp;remember:</strong></p>\n\n<ul>\n	<li>\n	<p>To&nbsp;multiply&nbsp;a&nbsp;matrix&nbsp;by&nbsp;a&nbsp;number,&nbsp;multiply&nbsp;each&nbsp;entry&nbsp;in&nbsp;the&nbsp;matrix&nbsp;by&nbsp;that&nbsp;number.</p>\n	</li>\n	<li>\n	<p>To&nbsp;subtract&nbsp;matrices,&nbsp;subtract&nbsp;values&nbsp;in&nbsp;corresponding&nbsp;entries.</p>\n	</li>\n</ul>\n', '', '<iframeiframe>', 'Medium', '<p>To&nbsp;multiply&nbsp;a&nbsp;matrix&nbsp;by&nbsp;a&nbsp;number,&nbsp;multiply&nbsp;each&nbsp;entry&nbsp;by&nbsp;that&nbsp;number.</p>\n', 'Active', '0', '0', 'Live,Demo', '00:00:35', 1, '2018-07-31 06:46:34', '2018-12-12 19:06:30'),
(11, 5, 4, 2, 0, '<p>If&nbsp;2x+y=&nbsp;8&nbsp;and&nbsp;x+y=2,&nbsp;what&nbsp;is&nbsp;the&nbsp;product&nbsp;of&nbsp;x&nbsp;and&nbsp;y?&nbsp;Round&nbsp;your&nbsp;answer&nbsp;to&nbsp;the&nbsp;nearest&nbsp;whole&nbsp;number.</p>\r\n', 'Detail', 35, '<p>Solve&nbsp;the&nbsp;system&nbsp;of&nbsp;equation&nbsp;using&nbsp;the&nbsp;method&nbsp;of&nbsp;elimination&nbsp;or&nbsp;substitution&nbsp;to&nbsp;obtain&nbsp;x=6.&nbsp;Substitute&nbsp;this&nbsp;value&nbsp;into&nbsp;one&nbsp;of&nbsp;the&nbsp;equations&nbsp;to&nbsp;obtain&nbsp;y=2.&nbsp;So&nbsp;the&nbsp;product&nbsp;of&nbsp;6&nbsp;and&nbsp;2&nbsp;is&nbsp;12.</p>\r\n', '', '', 'Low', '', 'Active', '0', '0', 'Live,Demo', '00:00:45', 1, '2018-08-04 09:43:25', '2018-08-04 08:43:25'),
(12, 9, 8, 9, 9, '<p>A&nbsp;patient&nbsp;is&nbsp;receiving&nbsp;azithromycin&nbsp;intravenously&nbsp;at&nbsp;a&nbsp;rate&nbsp;of&nbsp;16&nbsp;gtt/min.&nbsp;How&nbsp;much&nbsp;solution&nbsp;is&nbsp;infused&nbsp;in&nbsp;8&nbsp;hours&nbsp;if&nbsp;the&nbsp;infusion&nbsp;set&nbsp;delivers&nbsp;20&nbsp;gtt/mL?</p>\r\n', 'MCQs', 36, '<p>It&nbsp;is&nbsp;better&nbsp;to&nbsp;use&nbsp;dimensional&nbsp;analysis&nbsp;for&nbsp;this&nbsp;question.&nbsp;See&nbsp;solution&nbsp;here.</p>\r\n', '', '', 'Medium', '', 'Active', '1', '0', 'Demo', '00:01:10', 1, '2018-08-05 20:24:31', '2018-08-13 00:01:48');
INSERT INTO `tbl_questions` (`id`, `category_id`, `type_id`, `subject_id`, `topic_id`, `title`, `answer_type`, `option_id`, `explation`, `image`, `video`, `level`, `hint`, `status`, `is_deleted`, `is_block`, `question_type`, `attemped_time`, `created_by`, `created_date`, `updated_date`) VALUES
(13, 5, 5, 10, 0, '<p>Questions&nbsp;1&ndash;10&nbsp;are&nbsp;based&nbsp;on&nbsp;the&nbsp;following&nbsp;passage.</p>\r\n\r\n<p>HUMANITIES:&nbsp;This&nbsp;passage&nbsp;is&nbsp;adapted&nbsp;from&nbsp;the&nbsp;blog&nbsp;post&nbsp;&quot;How&nbsp;the&nbsp;Skull&nbsp;Is&nbsp;an&nbsp;Ally&nbsp;in&nbsp;Art&quot;&nbsp;by&nbsp;Noah&nbsp;Charney&nbsp;(&copy;&nbsp;2016&nbsp;by&nbsp;J.&nbsp;Paul&nbsp;Getty&nbsp;Museum).</p>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Line<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;5&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;10&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;15&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;20&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;25&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;30&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;35&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;40&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;45&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;50&nbsp;<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			<br />\r\n			&nbsp;55&nbsp;<br />\r\n			<br />\r\n			&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>You&nbsp;walk&nbsp;through&nbsp;the&nbsp;darkness&nbsp;of&nbsp;the&nbsp;crypt.&nbsp;&nbsp;All&nbsp;around&nbsp;you,&nbsp;human&nbsp;bones&nbsp;are&nbsp;arranged&nbsp;in&nbsp;patterns,&nbsp;tiling&nbsp;the&nbsp;walls&nbsp;divided&nbsp;by&nbsp;femurs,&nbsp;skulls,&nbsp;and&nbsp;hip&nbsp;bones.&nbsp;&nbsp;Skeletal&nbsp;arms&nbsp;are&nbsp;crossed&nbsp;and&nbsp;nailed&nbsp;into&nbsp;the&nbsp;wall,&nbsp;making&nbsp;the&nbsp;symbol&nbsp;of&nbsp;the&nbsp;Franciscans,&nbsp;normally&nbsp;painted,&nbsp;out&nbsp;of&nbsp;the&nbsp;real&nbsp;thing.&nbsp;&nbsp;The&nbsp;scariest&nbsp;place&nbsp;I&nbsp;have&nbsp;ever&nbsp;been&mdash;that&nbsp;was&nbsp;not&nbsp;intended&nbsp;to&nbsp;be&nbsp;scary&mdash;is&nbsp;this&nbsp;crypt,&nbsp;a&nbsp;small&nbsp;but&nbsp;breathtaking&nbsp;space&nbsp;of&nbsp;several&nbsp;tiny&nbsp;chapels&nbsp;located&nbsp;beneath&nbsp;the&nbsp;church&nbsp;of&nbsp;Santa&nbsp;Maria&nbsp;della&nbsp;Concezione&nbsp;dei&nbsp;Cappuccini&nbsp;in&nbsp;Rome.&nbsp;&nbsp;There&nbsp;lie&nbsp;the&nbsp;bones&nbsp;of&nbsp;some&nbsp;3,700&nbsp;former&nbsp;Italian&nbsp;monks,&nbsp;a&nbsp;haul&nbsp;that&nbsp;began&nbsp;with&nbsp;300&nbsp;cartloads&nbsp;of&nbsp;deceased&nbsp;brethren&nbsp;who&nbsp;accompanied&nbsp;the&nbsp;friars&nbsp;who&nbsp;founded&nbsp;this&nbsp;church&nbsp;in&nbsp;1631&nbsp;and&nbsp;added&nbsp;to&nbsp;it&nbsp;until&nbsp;1870.</p>\r\n\r\n			<p>What&nbsp;to&nbsp;do&nbsp;with&nbsp;this&nbsp;avalanche&nbsp;of&nbsp;human&nbsp;remains?&nbsp;&nbsp;The&nbsp;dead&nbsp;would&nbsp;be&nbsp;buried&nbsp;in&nbsp;the&nbsp;earthen&nbsp;floor&nbsp;for&nbsp;around&nbsp;30&nbsp;years,&nbsp;without&nbsp;a&nbsp;coffin,&nbsp;and&nbsp;then&nbsp;exhumed&nbsp;and&nbsp;transformed&nbsp;into&nbsp;decoration,&nbsp;to&nbsp;make&nbsp;room&nbsp;for&nbsp;the&nbsp;freshly&nbsp;deceased.&nbsp;&nbsp;Friar&nbsp;Michael&nbsp;of&nbsp;Bergamo&nbsp;led&nbsp;the&nbsp;initial&nbsp;arrangement&nbsp;of&nbsp;the&nbsp;crypts&nbsp;and&nbsp;created&nbsp;what&nbsp;many&nbsp;label&nbsp;as&nbsp;one&nbsp;of&nbsp;the&nbsp;most&nbsp;beautiful&nbsp;and&nbsp;haunting&nbsp;art&nbsp;installations&nbsp;ever&nbsp;made.</p>\r\n\r\n			<p>Of&nbsp;course,&nbsp;the&nbsp;skull&nbsp;is&nbsp;a&nbsp;universal&nbsp;symbol,&nbsp;flapping&nbsp;white&nbsp;on&nbsp;black&nbsp;on&nbsp;the&nbsp;skull&nbsp;and&nbsp;crossbones&nbsp;pirate&nbsp;flag,&nbsp;decorating&nbsp;the&nbsp;lapels&nbsp;of&nbsp;Nazi&nbsp;Secret&nbsp;Service&nbsp;agents,&nbsp;and&nbsp;appearing&nbsp;on&nbsp;labels&nbsp;of&nbsp;poisonous&nbsp;materials.&nbsp;&nbsp;Prehistoric&nbsp;cultures&nbsp;displayed&nbsp;severed&nbsp;heads,&nbsp;and&nbsp;then&nbsp;the&nbsp;remaining&nbsp;skulls,&nbsp;of&nbsp;their&nbsp;vanquished&nbsp;opponents.&nbsp;&nbsp;Some&nbsp;Vikings&nbsp;made&nbsp;goblets&nbsp;out&nbsp;of&nbsp;the&nbsp;skulls&nbsp;of&nbsp;their&nbsp;defeated.&nbsp;&nbsp;But&nbsp;these&nbsp;are&nbsp;displays&nbsp;of&nbsp;skulls&nbsp;as&nbsp;symbols&nbsp;and&nbsp;warnings,&nbsp;not&nbsp;artworks&nbsp;in&nbsp;the&nbsp;traditional&nbsp;sense.</p>\r\n\r\n			<p>Vanitas&nbsp;paintings,&nbsp;however,&nbsp;are&nbsp;still&nbsp;lifes&nbsp;from&nbsp;the&nbsp;16th-17th&nbsp;centuries&nbsp;that&nbsp;usually&nbsp;include&nbsp;a&nbsp;skull,&nbsp;among&nbsp;other&nbsp;inanimate&nbsp;objects&nbsp;that&nbsp;symbolize&nbsp;passing&nbsp;time&mdash;an&nbsp;hourglass,&nbsp;a&nbsp;burning&nbsp;candle.&nbsp;&nbsp;They&nbsp;also&nbsp;include&nbsp;objects&nbsp;that&nbsp;are&nbsp;associated&nbsp;with&nbsp;vain&nbsp;youth&nbsp;and&nbsp;that&nbsp;will&nbsp;wrinkle,&nbsp;rot,&nbsp;and&nbsp;crumble&nbsp;in&nbsp;time&mdash;makeup,&nbsp;mirrors,&nbsp;dice.&nbsp;&nbsp;In&nbsp;religious&nbsp;works,&nbsp;the&nbsp;skull&nbsp;is&nbsp;a&nbsp;reminder&nbsp;that&nbsp;death&nbsp;comes&nbsp;to&nbsp;all.&nbsp;&nbsp;It&#39;s&nbsp;hard&nbsp;to&nbsp;find&nbsp;a&nbsp;depiction&nbsp;of&nbsp;Saint&nbsp;Jerome&nbsp;without&nbsp;a&nbsp;skull.&nbsp;&nbsp;Jerome&nbsp;is&nbsp;usually&nbsp;shown&nbsp;in&nbsp;the&nbsp;desert,&nbsp;penitent&nbsp;and&nbsp;chastising&nbsp;his&nbsp;body&nbsp;in&nbsp;prayer.&nbsp;&nbsp;In&nbsp;these&nbsp;scenes,&nbsp;the&nbsp;skull&nbsp;serves&nbsp;as&nbsp;a&nbsp;reminder&nbsp;of&nbsp;Christ&#39;s&nbsp;sacrifice&nbsp;and&nbsp;the&nbsp;need&nbsp;for&nbsp;Jerome&nbsp;to&nbsp;hurry&nbsp;and&nbsp;engage&nbsp;fully&nbsp;in&nbsp;his&nbsp;prayers&nbsp;before&nbsp;he&nbsp;becomes&nbsp;a&nbsp;skeleton&nbsp;himself.&nbsp;&nbsp;Another&nbsp;version&nbsp;of&nbsp;Jerome&nbsp;shows&nbsp;him&nbsp;as&nbsp;a&nbsp;scholar&nbsp;as&nbsp;he&nbsp;writes&nbsp;in&nbsp;his&nbsp;study.&nbsp;&nbsp;In&nbsp;these&nbsp;images,&nbsp;a&nbsp;skull&nbsp;gazes&nbsp;up&nbsp;from&nbsp;his&nbsp;desk,&nbsp;reminding&nbsp;both&nbsp;him&nbsp;and&nbsp;the&nbsp;viewer&nbsp;to&nbsp;live&nbsp;life&nbsp;to&nbsp;the&nbsp;fullest.</p>\r\n\r\n			<p>Even&nbsp;in&nbsp;contemporary&nbsp;art,&nbsp;skulls&nbsp;remain&nbsp;and&nbsp;all&nbsp;the&nbsp;symbolism&nbsp;that&nbsp;they&nbsp;carried&nbsp;in&nbsp;the&nbsp;past&nbsp;reverberates&nbsp;today.&nbsp;&nbsp;Take&nbsp;two&nbsp;of&nbsp;the&nbsp;most&nbsp;recent&nbsp;famous&nbsp;skulls&nbsp;in&nbsp;art&nbsp;with&nbsp;very&nbsp;different&nbsp;approaches:&nbsp;&nbsp;Gabriel&nbsp;Orozco&#39;s&nbsp;<em>Black&nbsp;Kites</em>&nbsp;(1997)&nbsp;and&nbsp;Damien&nbsp;Hirst&#39;s&nbsp;<em>For&nbsp;the&nbsp;Love&nbsp;of&nbsp;God</em>&nbsp;(2007).&nbsp;&nbsp;One&nbsp;might&nbsp;assume&nbsp;that&nbsp;Orozco,&nbsp;who&nbsp;is&nbsp;Mexican,&nbsp;was&nbsp;referencing&nbsp;the&nbsp;Day&nbsp;of&nbsp;the&nbsp;Dead&nbsp;in&nbsp;his&nbsp;work&mdash;a&nbsp;real&nbsp;human&nbsp;skull&nbsp;that&nbsp;he&nbsp;spent&nbsp;months&nbsp;holding&nbsp;and&nbsp;drawing&nbsp;on&nbsp;in&nbsp;pencil,&nbsp;in&nbsp;the&nbsp;shapes&nbsp;of&nbsp;squares,&nbsp;so&nbsp;the&nbsp;skull&nbsp;appears&nbsp;covered&nbsp;in&nbsp;a&nbsp;chess&nbsp;board.&nbsp;&nbsp;But&nbsp;Orozco&nbsp;disagrees:&nbsp;&nbsp;This&nbsp;is&nbsp;&quot;an&nbsp;experiment&nbsp;with&nbsp;graphite&nbsp;on&nbsp;bone.&nbsp;&nbsp;One&nbsp;element&nbsp;is&nbsp;precise&nbsp;and&nbsp;geometric;&nbsp;the&nbsp;other&nbsp;is&nbsp;uneven&nbsp;and&nbsp;organic.&nbsp;&nbsp;The&nbsp;two&nbsp;are&nbsp;not&nbsp;resolved.&quot;&nbsp;&nbsp;It&nbsp;is&nbsp;certainly&nbsp;beautiful&nbsp;and&nbsp;echoes&nbsp;the&nbsp;Italian&nbsp;chapel&nbsp;in&nbsp;the&nbsp;communion&nbsp;of&nbsp;the&nbsp;artist&nbsp;with&nbsp;the&nbsp;skull&nbsp;of&nbsp;someone&nbsp;who&nbsp;once&nbsp;was.</p>\r\n\r\n			<p>On&nbsp;the&nbsp;other&nbsp;hand,&nbsp;Damien&nbsp;Hirst&nbsp;mocks&nbsp;the&nbsp;commodification&nbsp;of&nbsp;art&nbsp;by&nbsp;making&nbsp;what&nbsp;is&nbsp;the&nbsp;most&nbsp;expensive-to-produce&nbsp;artwork&nbsp;known:&nbsp;&nbsp;a&nbsp;$20&nbsp;million&nbsp;platinum&nbsp;skull&nbsp;encrusted&nbsp;with&nbsp;8,601&nbsp;diamonds.&nbsp;&nbsp;Hirst&#39;s&nbsp;skull&nbsp;is&nbsp;not&nbsp;real;&nbsp;there&nbsp;is&nbsp;nothing&nbsp;actively&nbsp;human&nbsp;about&nbsp;<em>For&nbsp;the&nbsp;Love&nbsp;of&nbsp;God</em>,&nbsp;and&nbsp;perhaps&nbsp;that&nbsp;is&nbsp;part&nbsp;of&nbsp;his&nbsp;point.&nbsp;&nbsp;In&nbsp;a&nbsp;2008&nbsp;interview&nbsp;about&nbsp;the&nbsp;skull,&nbsp;Hirst&nbsp;said&nbsp;of&nbsp;death,&nbsp;&quot;You&nbsp;don&#39;t&nbsp;like&nbsp;it,&nbsp;so&nbsp;you&nbsp;disguise&nbsp;it&nbsp;or&nbsp;you&nbsp;decorate&nbsp;it&nbsp;to&nbsp;make&nbsp;it&nbsp;look&nbsp;like&nbsp;something&nbsp;bearable&mdash;to&nbsp;such&nbsp;an&nbsp;extent&nbsp;that&nbsp;it&nbsp;becomes&nbsp;something&nbsp;else.&quot;</p>\r\n\r\n			<p>It&nbsp;is&nbsp;when&nbsp;the&nbsp;skull&nbsp;becomes&nbsp;not&nbsp;only&nbsp;something&nbsp;to&nbsp;fear,&nbsp;but&nbsp;also&nbsp;a&nbsp;friendly&nbsp;warning&nbsp;of&nbsp;life&#39;s&nbsp;fleeting&nbsp;nature,&nbsp;that&nbsp;a&nbsp;universal&nbsp;symbol&nbsp;of&nbsp;death&nbsp;becomes&nbsp;a&nbsp;symbol&nbsp;of&nbsp;life.&nbsp;A&nbsp;skull&nbsp;is&nbsp;then&nbsp;no&nbsp;longer&nbsp;just&nbsp;a&nbsp;lobe&nbsp;of&nbsp;bone,&nbsp;vacant&nbsp;sockets&nbsp;and&nbsp;remnant&nbsp;teeth,&nbsp;but&nbsp;a&nbsp;message:&nbsp;&nbsp;Use&nbsp;the&nbsp;fear&nbsp;of&nbsp;death&nbsp;to&nbsp;inspire&nbsp;yourself&nbsp;to&nbsp;live&nbsp;life&nbsp;to&nbsp;the&nbsp;fullest.&nbsp;&nbsp;We&nbsp;have&nbsp;only&nbsp;so&nbsp;many&nbsp;grains&nbsp;of&nbsp;sand&nbsp;in&nbsp;our&nbsp;hourglass.&nbsp;&nbsp;In&nbsp;art,&nbsp;we&nbsp;can&nbsp;appropriate&nbsp;horror&nbsp;and&nbsp;make&nbsp;it&nbsp;our&nbsp;ally,&nbsp;rallying&nbsp;us&nbsp;to&nbsp;seize&nbsp;the&nbsp;day.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>The&nbsp;passage&nbsp;is&nbsp;best&nbsp;described&nbsp;as&nbsp;being&nbsp;told&nbsp;from&nbsp;the&nbsp;point&nbsp;of&nbsp;view&nbsp;of&nbsp;an&nbsp;art&nbsp;enthusiast&nbsp;who&nbsp;is:</p>\r\n', 'MCQs', 41, '<p>Although&nbsp;this&nbsp;question&nbsp;refers&nbsp;to&nbsp;the&nbsp;author&#39;s&nbsp;point&nbsp;of&nbsp;view,&nbsp;it&nbsp;is&nbsp;really&nbsp;asking&nbsp;what&nbsp;the&nbsp;author&#39;s&nbsp;<strong>central&nbsp;idea</strong>&nbsp;(most&nbsp;important&nbsp;idea)&nbsp;is.&nbsp;&nbsp;To&nbsp;answer&nbsp;this&nbsp;question,&nbsp;read&nbsp;most&nbsp;of&nbsp;the&nbsp;passage&nbsp;to&nbsp;determine&nbsp;which&nbsp;topics&nbsp;are&nbsp;addressed&nbsp;and&nbsp;which&nbsp;are&nbsp;not.&nbsp;&nbsp;Eliminate&nbsp;answer&nbsp;choices&nbsp;that&nbsp;are&nbsp;not&nbsp;addressed&nbsp;at&nbsp;all&nbsp;or&nbsp;mentioned&nbsp;only&nbsp;once.&nbsp;&nbsp;Choose&nbsp;the&nbsp;answer&nbsp;that&nbsp;has&nbsp;the&nbsp;<strong>MOST</strong>&nbsp;<strong>supporting&nbsp;evidence</strong>.</p>\r\n\r\n<p>In&nbsp;this&nbsp;passage,&nbsp;the&nbsp;author&nbsp;focuses&nbsp;on&nbsp;the&nbsp;&quot;historical&nbsp;usage&quot;&nbsp;of&nbsp;skulls&nbsp;in&nbsp;art,&nbsp;from&nbsp;the&nbsp;Italian&nbsp;crypt&nbsp;founded&nbsp;in&nbsp;the&nbsp;17th&nbsp;century&nbsp;to&nbsp;sculpture&nbsp;in&nbsp;the&nbsp;20th&nbsp;century.&nbsp;&nbsp;He&nbsp;also&nbsp;discusses&nbsp;the&nbsp;&quot;various&nbsp;meanings&quot;&nbsp;skulls&nbsp;have&nbsp;had.&nbsp;&nbsp;Artists&nbsp;who&nbsp;painted&nbsp;Saint&nbsp;Jerome&nbsp;communicated&nbsp;a&nbsp;message&nbsp;about&nbsp;how&nbsp;to&nbsp;live&nbsp;life;&nbsp;sculptor&nbsp;Damien&nbsp;Hirst&nbsp;illustrates&nbsp;a&nbsp;desire&nbsp;to&nbsp;make&nbsp;death&nbsp;seem&nbsp;less&nbsp;real.&nbsp;&nbsp;Therefore,&nbsp;the&nbsp;correct&nbsp;answer&nbsp;is&nbsp;that&nbsp;the&nbsp;author&nbsp;is&nbsp;&quot;reflecting&nbsp;on&nbsp;the&nbsp;historical&nbsp;usage&nbsp;of&nbsp;an&nbsp;object&nbsp;in&nbsp;art&nbsp;and&nbsp;its&nbsp;various&nbsp;meanings.&quot;</p>\r\n\r\n<p><strong>(Choice&nbsp;B)</strong>&nbsp;&nbsp;Although&nbsp;the&nbsp;author&nbsp;writes&nbsp;about&nbsp;a&nbsp;number&nbsp;of&nbsp;different&nbsp;artists&nbsp;and&nbsp;works,&nbsp;he&nbsp;does&nbsp;not&nbsp;express&nbsp;a&nbsp;preference&nbsp;for&nbsp;one&nbsp;style&nbsp;over&nbsp;another.</p>\r\n\r\n<p><strong>(Choice&nbsp;C)</strong>&nbsp;&nbsp;Even&nbsp;though&nbsp;the&nbsp;author&nbsp;details&nbsp;the&nbsp;skull&#39;s&nbsp;appearances&nbsp;in&nbsp;medieval&nbsp;art&nbsp;and&nbsp;its&nbsp;uses&nbsp;today,&nbsp;his&nbsp;focus&nbsp;is&nbsp;not&nbsp;on&nbsp;the&nbsp;overall&nbsp;differences&nbsp;between&nbsp;the&nbsp;two&nbsp;periods&nbsp;in&nbsp;art.&nbsp;&nbsp;His&nbsp;focus&nbsp;is&nbsp;on&nbsp;describing&nbsp;a&nbsp;single&nbsp;object&#39;s&nbsp;changing&nbsp;use.</p>\r\n\r\n<p><strong>(Choice&nbsp;D)</strong>&nbsp;&nbsp;The&nbsp;author&nbsp;explains&nbsp;how&nbsp;human&nbsp;remains&nbsp;have&nbsp;been&nbsp;used&nbsp;in&nbsp;art,&nbsp;but&nbsp;he&nbsp;does&nbsp;not&nbsp;debate&nbsp;the&nbsp;&quot;ethical&nbsp;(moral)&nbsp;questions&quot;&nbsp;that&nbsp;arise&nbsp;from&nbsp;this.</p>\r\n\r\n<p><strong>Things&nbsp;to&nbsp;remember:</strong><br />\r\nTo&nbsp;answer&nbsp;questions&nbsp;about&nbsp;purpose,&nbsp;read&nbsp;the&nbsp;passage&nbsp;to&nbsp;determine&nbsp;which&nbsp;answer&nbsp;has&nbsp;the&nbsp;most&nbsp;text&nbsp;evidence&nbsp;to&nbsp;support&nbsp;it.</p>\r\n', '', '', 'Medium', '', 'Active', '0', '0', 'Live,Demo', '00:00:60', 1, '2018-08-06 01:54:14', '2018-08-06 02:15:14'),
(14, 9, 8, 13, 11, '<p>If&nbsp;100&nbsp;capsules&nbsp;contain&nbsp;500&nbsp;mg&nbsp;of&nbsp;an&nbsp;active&nbsp;ingredient,&nbsp;how&nbsp;many&nbsp;milligrams&nbsp;of&nbsp;the&nbsp;active&nbsp;ingredient&nbsp;will&nbsp;85&nbsp;capsules&nbsp;contain?&nbsp;Round&nbsp;to&nbsp;the&nbsp;nearest&nbsp;whole&nbsp;number.&nbsp;Do&nbsp;not&nbsp;include&nbsp;units.</p>\r\n', 'Detail', 59, '<p>The&nbsp;correct&nbsp;answer&nbsp;is&nbsp;425.<iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/lbs3Y6X9bGY\" width=\"560\"></iframe></p>\r\n', '', '<iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/lbs3Y6X9bGY\" width=\"560\"></iframe>', 'Low', '', 'Active', '1', '0', 'Live,Demo', '00:01:30', 1, '2018-08-29 19:07:14', '2018-09-25 11:03:48'),
(15, 9, 8, 13, 11, '<p>A&nbsp;health&nbsp;care&nbsp;provider&nbsp;(HCP)&nbsp;prescribes&nbsp;cefuroxime&nbsp;30&nbsp;mg/kg/day&nbsp;PO&nbsp;divided&nbsp;in&nbsp;equal&nbsp;doses&nbsp;every&nbsp;12&nbsp;hours&nbsp;for&nbsp;a&nbsp;child&nbsp;with&nbsp;a&nbsp;urinary&nbsp;tract&nbsp;infection.&nbsp;&nbsp;The&nbsp;child&nbsp;weighs&nbsp;32&nbsp;lb.&nbsp;Based&nbsp;on&nbsp;the&nbsp;cefuroxime&nbsp;label,&nbsp;how&nbsp;many&nbsp;milliliters&nbsp;would&nbsp;the&nbsp;nurse&nbsp;administer&nbsp;per&nbsp;dose?</p>\r\n', 'Detail', 58, '<p>The&nbsp;steps&nbsp;below&nbsp;should&nbsp;be&nbsp;used&nbsp;to&nbsp;calculate&nbsp;the&nbsp;amount&nbsp;of&nbsp;cefuroxime&nbsp;that&nbsp;needs&nbsp;to&nbsp;be&nbsp;administered&nbsp;per&nbsp;dose:</p>\r\n\r\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:700px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>1.&nbsp;Convert&nbsp;pounds&nbsp;to&nbsp;kilograms&nbsp;(1&nbsp;kg&nbsp;=&nbsp;2.2&nbsp;lb)</td>\r\n			<td>32&nbsp;lb&nbsp;&divide;&nbsp;2.2&nbsp;lb&nbsp;=&nbsp;14.545454&nbsp;kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2.&nbsp;Calculate&nbsp;prescribed&nbsp;amount&nbsp;per&nbsp;day&nbsp;in&nbsp;milligrams</td>\r\n			<td>30&nbsp;mg/kg&nbsp;x&nbsp;14.545454&nbsp;kg&nbsp;=&nbsp;436.36362&nbsp;mg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3.&nbsp;Calculate&nbsp;prescribed&nbsp;amount&nbsp;per&nbsp;dose&nbsp;in&nbsp;milligrams</td>\r\n			<td>436.36362&nbsp;mg&nbsp;&divide;&nbsp;2&nbsp;daily&nbsp;doses&nbsp;=&nbsp;218.1818&nbsp;mg</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:text-top\">4.&nbsp;Convert&nbsp;prescribed&nbsp;dose&nbsp;from&nbsp;milligrams&nbsp;to&nbsp;milliliters:<br />\r\n			&nbsp;\r\n			<p><u>Desired&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;Quantity</u><br />\r\n			Available</p>\r\n			<br />\r\n			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR<br />\r\n			&nbsp;\r\n			<p>Ratio/proportion</p>\r\n			</td>\r\n			<td><br />\r\n			<br />\r\n			&nbsp;\r\n			<p>218.1818&nbsp;mg&nbsp;x&nbsp;5&nbsp;mL&nbsp;&divide;&nbsp;250&nbsp;mg&nbsp;=&nbsp;4.3636&nbsp;mL&nbsp;(round&nbsp;up&nbsp;to&nbsp;4.4&nbsp;mL)</p>\r\n\r\n			<p><br />\r\n			<br />\r\n			<br />\r\n			250&nbsp;mg&nbsp;&divide;&nbsp;5&nbsp;mL&nbsp;=&nbsp;218.1818&nbsp;mg&nbsp;&divide;&nbsp;X&nbsp;mL<br />\r\n			<br />\r\n			X&nbsp;=&nbsp;4.3636&nbsp;mL&nbsp;(round&nbsp;up&nbsp;to&nbsp;4.4&nbsp;mL)</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>Educational&nbsp;objective:</strong><br />\r\nTo&nbsp;calculate&nbsp;pediatric&nbsp;doses&nbsp;that&nbsp;are&nbsp;prescribed&nbsp;in&nbsp;mg/kg/day&nbsp;format,&nbsp;the&nbsp;nurse&nbsp;should&nbsp;convert&nbsp;pounds&nbsp;to&nbsp;kilograms,&nbsp;calculate&nbsp;the&nbsp;prescribed&nbsp;amount&nbsp;per&nbsp;day&nbsp;in&nbsp;milligrams,&nbsp;calculate&nbsp;the&nbsp;prescribed&nbsp;dose&nbsp;in&nbsp;milligrams,&nbsp;and&nbsp;then&nbsp;convert&nbsp;the&nbsp;prescribed&nbsp;dose&nbsp;from&nbsp;milligrams&nbsp;to&nbsp;milliliters.</p>\r\n', '', '', 'Medium', '<p>This&nbsp;question&nbsp;has&nbsp;been&nbsp;deactivated.&nbsp;Please&nbsp;do&nbsp;not&nbsp;rely&nbsp;on&nbsp;the&nbsp;content/concept&nbsp;discussed&nbsp;in&nbsp;this&nbsp;question&nbsp;as&nbsp;it&nbsp;might&nbsp;be&nbsp;outdated&nbsp;or&nbsp;inaccurate.&nbsp;Due&nbsp;to&nbsp;the&nbsp;volume&nbsp;of&nbsp;feedback,&nbsp;it&nbsp;is&nbsp;not&nbsp;possible&nbsp;for&nbsp;us&nbsp;to&nbsp;discuss&nbsp;the&nbsp;reason&nbsp;for&nbsp;deactivation&nbsp;in&nbsp;detail.</p>\r\n', 'Active', '1', '0', 'Live', '00:00:10', 1, '2018-08-31 00:03:05', '2018-09-18 06:49:02'),
(16, 9, 13, 11, 10, '<p>A&nbsp;500&nbsp;mL&nbsp;bag&nbsp;of&nbsp;normal&nbsp;saline&nbsp;is&nbsp;to&nbsp;be&nbsp;infused&nbsp;continuously&nbsp;over&nbsp;2&nbsp;hours&nbsp;using&nbsp;a&nbsp;30&nbsp;gtt/mL&nbsp;administration&nbsp;set.&nbsp;What&nbsp;rate&nbsp;(gtt/min)&nbsp;should&nbsp;the&nbsp;pump&nbsp;be&nbsp;set&nbsp;at?&nbsp;Round&nbsp;your&nbsp;answer&nbsp;to&nbsp;the&nbsp;nearest&nbsp;whole&nbsp;number.&nbsp;Do&nbsp;not&nbsp;include&nbsp;units.</p>\r\n', 'Detail', 60, '<p>The&nbsp;correct&nbsp;answer&nbsp;is&nbsp;125.&nbsp;See&nbsp;<a href=\"https://www.rxcalculations.com/demo1/\" onclick=\"window.open(this.href, \'\', \'resizable=yes,status=yes,location=no,toolbar=yes,menubar=no,fullscreen=yes,scrollbars=no,dependent=no\'); return false;\">solution</a></p>\r\n', '', '', 'Medium', '', 'Active', '1', '0', 'Live,Demo', '00:01:30', 1, '2018-09-02 05:48:23', '2018-09-18 06:49:13'),
(17, 9, 8, 13, 11, '<p>If&nbsp;100&nbsp;capsules&nbsp;contain&nbsp;500&nbsp;mg&nbsp;of&nbsp;an&nbsp;active&nbsp;ingredient,&nbsp;how&nbsp;many&nbsp;milligrams&nbsp;of&nbsp;the&nbsp;active&nbsp;ingredient&nbsp;will&nbsp;85&nbsp;capsules&nbsp;contain?</p>\n', 'Detail', 61, '<p>The&nbsp;correct&nbsp;answer&nbsp;is&nbsp;<strong>425</strong></p>\n\n<p>&nbsp;</p>\n\n<p><strong><iframe frameborder=\"0\" height=\"315\" longdesc=\"https://rxcalculations.cdn.vooplayer.com/publish/MTE5ODM4?\" scrolling=\"no\" src=\"https://www.youtube.com/embed/iSUZk-zT1so?modestbranding=1;rel=0;showinfo=0\" width=\"560\">&quot; width=&quot;560&quot;&gt;</iframe></strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', '', '<iframe frameborder=\"0\" height=\"315\" longdesc=\"https://rxcalculations.cdn.vooplayer.com/publish/MTE5ODM4?\" scrolling=\"no\" src=\"https://www.youtube.com/embed/iSUZk-zT1so?modestbranding=1;rel=0;showinfo=0\" width=\"560\">&quot; width=&quot;560&quot;&gt;</ifram', 'Low', '<p><iframe frameborder=\"0\" height=\"600\" scrolling=\"no\" src=\"https://www.youtube.com/embed/iSUZk-zT1so?modestbranding=1;rel=0;showinfo=0\" width=\"800\"></iframe></p>\n', 'Active', '0', '0', 'Live', '00:01:30', 1, '2018-09-18 06:39:13', '2019-03-31 07:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quick_test`
--

CREATE TABLE `tbl_quick_test` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_type` enum('Demo','Register') NOT NULL,
  `random_id` double NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quick_test`
--

INSERT INTO `tbl_quick_test` (`id`, `user_id`, `ip_address`, `category_id`, `type_id`, `user_type`, `random_id`, `created_date`) VALUES
(1, 1, '101.50.85.224', 5, 4, 'Register', 1436, '2018-08-15 00:53:50'),
(2, 8, '99.27.34.243', 5, 4, 'Demo', 2082, '2018-08-18 19:09:12'),
(3, 9, '209.175.72.4', 5, 4, 'Demo', 6382, '2018-08-29 13:59:24'),
(4, 9, '99.27.34.243', 5, 4, 'Demo', 1553, '2018-08-29 18:11:17'),
(5, 9, '99.27.34.243', 9, 8, 'Demo', 6504, '2018-08-29 19:07:44'),
(6, 9, '99.27.34.243', 9, 8, 'Demo', 1360, '2018-08-29 19:15:03'),
(7, 9, '99.27.34.243', 9, 8, 'Demo', 6335, '2018-09-02 05:30:00'),
(8, 9, '99.27.34.243', 9, 8, 'Demo', 1007, '2018-09-02 05:48:56'),
(9, 9, '99.27.34.243', 9, 13, 'Demo', 1249, '2018-09-02 05:51:46'),
(10, 9, '99.27.34.243', 9, 8, 'Demo', 4690, '2018-09-02 06:03:51'),
(11, 9, '99.27.34.243', 9, 13, 'Demo', 8062, '2018-09-02 10:37:17'),
(12, 9, '99.27.34.243', 9, 13, 'Demo', 2007, '2018-09-02 21:37:03'),
(13, 9, '99.27.34.243', 9, 13, 'Demo', 1240, '2018-09-02 21:57:27'),
(14, 9, '209.175.72.4', 5, 4, 'Demo', 2117, '2018-09-12 15:30:49'),
(15, 9, '99.27.34.243', 9, 8, 'Demo', 3164, '2018-09-18 06:40:18'),
(16, 9, '99.27.34.243', 9, 8, 'Demo', 9083, '2018-09-18 06:48:07'),
(17, 9, '99.27.34.243', 9, 8, 'Demo', 5564, '2018-09-18 18:40:03'),
(18, 0, '99.27.34.243', 9, 8, 'Demo', 3695, '2018-09-19 06:20:05'),
(19, 9, '99.27.34.243', 9, 8, 'Demo', 5480, '2018-09-19 06:20:30'),
(20, 9, '209.175.72.4', 9, 8, 'Demo', 1013, '2018-09-20 14:41:26'),
(21, 1, '101.50.105.150', 9, 8, 'Demo', 5340, '2018-09-25 04:20:02'),
(22, 1, '101.50.105.150', 9, 8, 'Demo', 1721, '2018-09-25 05:43:22'),
(23, 1, '101.50.105.150', 9, 8, 'Demo', 1645, '2018-09-25 05:51:59'),
(24, 1, '101.50.105.150', 9, 8, 'Demo', 4353, '2018-09-25 09:48:29'),
(25, 1, '101.50.105.150', 9, 8, 'Demo', 8127, '2018-09-25 09:58:17'),
(26, 1, '101.50.105.150', 9, 8, 'Demo', 9677, '2018-09-25 10:00:11'),
(27, 9, '99.27.34.243', 9, 8, 'Demo', 8830, '2018-09-26 05:30:09'),
(28, 1, '101.50.105.150', 9, 8, 'Demo', 3799, '2018-09-27 07:17:24'),
(29, 9, '99.27.34.243', 9, 8, 'Demo', 1027, '2018-10-05 18:01:38'),
(30, 9, '99.27.34.243', 9, 8, 'Demo', 1308, '2018-10-06 17:40:40'),
(31, 9, '209.175.72.4', 9, 8, 'Demo', 1522, '2018-10-10 14:12:44'),
(32, 9, '99.27.34.243', 9, 8, 'Demo', 4252, '2018-10-14 10:41:22'),
(33, 9, '99.27.34.243', 9, 8, 'Demo', 1942, '2018-11-07 17:22:01'),
(34, 9, '99.27.34.243', 9, 8, 'Demo', 1686, '2018-12-07 19:16:35'),
(35, 9, '99.27.34.243', 9, 8, 'Demo', 2009, '2018-12-07 19:25:37'),
(36, 10, '99.27.34.243', 9, 8, 'Register', 1255, '2018-12-12 18:57:05'),
(37, 10, '99.27.34.243', 9, 8, 'Register', 7610, '2018-12-12 18:58:00'),
(38, 10, '99.27.34.243', 5, 4, 'Demo', 1925, '2018-12-12 19:07:48'),
(39, 10, '99.27.34.243', 9, 8, 'Register', 1340, '2018-12-12 19:11:36'),
(40, 10, '99.27.34.243', 5, 4, 'Register', 2687, '2018-12-12 19:13:15'),
(41, 10, '99.27.34.243', 5, 4, 'Register', 1903, '2018-12-15 13:16:05'),
(42, 10, '99.27.34.243', 9, 8, 'Register', 3441, '2018-12-15 13:16:54'),
(43, 10, '99.27.34.243', 5, 4, 'Register', 6673, '2018-12-15 13:20:27'),
(44, 10, '99.27.34.243', 5, 4, 'Register', 1004, '2018-12-15 13:20:38'),
(45, 10, '99.27.34.243', 9, 8, 'Register', 2541, '2018-12-15 13:24:05'),
(46, 10, '99.27.34.243', 9, 8, 'Register', 1513, '2018-12-15 13:27:42'),
(47, 10, '99.27.34.243', 9, 8, 'Register', 2012, '2018-12-15 13:27:52'),
(48, 10, '99.27.34.243', 9, 8, 'Register', 1351, '2018-12-15 13:28:08'),
(49, 10, '99.27.34.243', 9, 8, 'Register', 3133, '2018-12-15 13:28:14'),
(50, 10, '99.27.34.243', 9, 8, 'Register', 1087, '2019-03-24 15:48:41'),
(51, 6, '99.27.34.243', 9, 8, 'Demo', 2089, '2019-03-31 07:15:13'),
(52, 6, '99.27.34.243', 9, 8, 'Demo', 2094, '2019-03-31 07:15:44'),
(53, 6, '99.27.34.243', 5, 4, 'Demo', 2914, '2019-03-31 07:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quick_user_test`
--

CREATE TABLE `tbl_quick_user_test` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` enum('Correct','Pending','Wrong') NOT NULL,
  `user_answer` text NOT NULL,
  `solve_time` varchar(50) NOT NULL,
  `is_bookmark` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quick_user_test`
--

INSERT INTO `tbl_quick_user_test` (`id`, `test_id`, `question_id`, `answer`, `user_answer`, `solve_time`, `is_bookmark`) VALUES
(1, 1436, 11, 'Correct', '12', '00:05', 'No'),
(2, 2082, 2, 'Correct', '8', '03:15', 'No'),
(3, 2082, 1, 'Wrong', '4', '04:46', 'No'),
(4, 2082, 6, 'Correct', '30', '02:04', 'No'),
(5, 2082, 5, 'Wrong', '24', '01:52', 'No'),
(6, 2082, 7, 'Wrong', 'they have low density', '00:55', 'No'),
(7, 6382, 8, 'Wrong', '45', '00:09', 'No'),
(8, 6382, 11, 'Correct', '12', '00:05', 'No'),
(9, 6382, 6, 'Correct', '30', '00:09', 'No'),
(10, 6382, 2, 'Correct', '8', '00:04', 'No'),
(11, 6382, 9, 'Wrong', 'xzvzsxfa', '00:02', 'No'),
(12, 1553, 5, 'Correct', '22', '00:05', 'No'),
(13, 1553, 8, 'Wrong', '65', '00:04', 'No'),
(14, 1553, 3, 'Correct', '13', '00:03', 'No'),
(15, 1553, 1, 'Correct', '1', '00:05', 'No'),
(16, 1553, 4, 'Wrong', '17', '00:06', 'No'),
(17, 1553, 11, 'Correct', '12', '00:04', 'No'),
(18, 1553, 7, 'Wrong', 'yhukkj', '00:06', 'No'),
(19, 6504, 14, 'Correct', '45', '00:09', 'No'),
(20, 1360, 14, 'Correct', '45', '00:02', 'No'),
(21, 6335, 14, 'Wrong', '42', '00:08', 'Yes'),
(22, 1007, 14, 'Pending', '', '', 'No'),
(23, 1249, 16, 'Wrong', '125.66', '00:05', 'No'),
(24, 4690, 14, 'Correct', '425', '00:07', 'No'),
(25, 8062, 16, 'Correct', '125', '00:04', 'No'),
(26, 2007, 16, 'Correct', '125', '00:06', 'No'),
(27, 1240, 16, 'Wrong', '25', '00:06', 'No'),
(28, 2117, 10, 'Wrong', '12', '00:05', 'No'),
(29, 2117, 6, 'Wrong', '28', '00:04', 'No'),
(30, 2117, 1, 'Wrong', '51', '00:02', 'No'),
(31, 2117, 8, 'Wrong', '120', '00:03', 'No'),
(32, 2117, 9, 'Wrong', '4521', '00:04', 'No'),
(33, 2117, 7, 'Wrong', '45521', '00:04', 'No'),
(34, 2117, 11, 'Correct', '12', '00:45', 'No'),
(35, 3164, 14, 'Wrong', '250', '00:04', 'No'),
(36, 3164, 17, 'Wrong', '250', '00:03', 'No'),
(37, 9083, 17, 'Wrong', '100', '00:06', 'No'),
(38, 9083, 14, 'Pending', '', '', 'No'),
(39, 5564, 17, 'Wrong', '426', '00:04', 'No'),
(40, 3695, 17, 'Pending', '', '', 'No'),
(41, 5480, 17, 'Wrong', '150', '00:03', 'No'),
(42, 1013, 17, 'Wrong', '150\n', '00:06', 'No'),
(43, 5340, 17, 'Wrong', '', '00:10', 'No'),
(44, 1721, 17, 'Wrong', '', '00:01', 'No'),
(45, 1721, 18, 'Wrong', '', '00:01', 'No'),
(46, 1645, 17, 'Wrong', '', '00:00', 'No'),
(47, 1645, 18, 'Wrong', '', '00:00', 'No'),
(48, 4353, 17, 'Wrong', '', '00:01', 'No'),
(49, 4353, 18, 'Wrong', '', '00:01', 'No'),
(50, 8127, 17, 'Wrong', '', '00:01', 'No'),
(51, 8127, 18, 'Wrong', '', '00:00', 'No'),
(52, 9677, 17, 'Pending', '', '', 'No'),
(53, 9677, 18, 'Wrong', '', '00:02', 'No'),
(54, 8830, 17, 'Correct', '425', '04:49', 'No'),
(55, 3799, 17, 'Wrong', '', '00:02', 'No'),
(56, 3799, 18, 'Wrong', '', '00:01', 'No'),
(57, 1027, 17, 'Wrong', '420\n', '00:04', 'No'),
(58, 1308, 17, 'Wrong', '2522', '00:03', 'No'),
(59, 1522, 17, 'Wrong', '200', '00:03', 'No'),
(60, 4252, 17, 'Correct', '425', '00:04', 'No'),
(61, 1942, 17, 'Wrong', '250', '00:04', 'No'),
(62, 1686, 17, 'Wrong', '205', '00:04', 'No'),
(63, 2009, 17, 'Wrong', '250', '00:04', 'No'),
(64, 1925, 11, 'Pending', '', '', 'No'),
(65, 1925, 2, 'Pending', '', '', 'No'),
(66, 1925, 3, 'Pending', '', '', 'No'),
(67, 1925, 8, 'Pending', '', '', 'No'),
(68, 1925, 9, 'Pending', '', '', 'No'),
(69, 1004, 7, 'Pending', '', '', 'No'),
(70, 1004, 5, 'Pending', '', '', 'No'),
(71, 2914, 6, 'Correct', '30', '00:10', 'No'),
(72, 2914, 8, 'Wrong', '21', '00:05', 'No'),
(73, 2914, 9, 'Wrong', '25', '00:04', 'No'),
(74, 2914, 10, 'Wrong', '12', '00:03', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_text` text NOT NULL,
  `service_title` text NOT NULL,
  `service_description` text NOT NULL,
  `key_feature` text NOT NULL,
  `innovative` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `category_id`, `banner_image`, `banner_text`, `service_title`, `service_description`, `key_feature`, `innovative`, `status`, `created_by`, `created_date`, `updated_date`) VALUES
(1, 5, 'ACT-student.jpg', '<h1><strong>The&nbsp;right&nbsp;ACT&nbsp;preparation&nbsp;</strong></h1>\r\n\r\n<h1><strong>for&nbsp;the&nbsp;best&nbsp;result.&nbsp;</strong></h1>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'Your Success is Our Passion', '<p>Thankfully,&nbsp;there&nbsp;haven&#39;t&nbsp;been&nbsp;many&nbsp;changes&nbsp;to&nbsp;the&nbsp;ACT&nbsp;format&nbsp;in&nbsp;the&nbsp;more&nbsp;recent&nbsp;years.&nbsp;The&nbsp;ACT&nbsp;is&nbsp;a&nbsp;standard&nbsp;college&nbsp;entrance&nbsp;exam&nbsp;that&nbsp;is&nbsp;used&nbsp;to&nbsp;evaluate&nbsp;your<br />\r\nability&nbsp;to&nbsp;take&nbsp;on&nbsp;college-level&nbsp;work.&nbsp;These&nbsp;tests&nbsp;cover&nbsp;math,&nbsp;science,&nbsp;reading,&nbsp;and&nbsp;writing.&nbsp;It&nbsp;also&nbsp;includes&nbsp;an&nbsp;optional&nbsp;essay.&nbsp;We&nbsp;offer&nbsp;over&nbsp;1,400&nbsp;thought-provoking<br />\r\nACT&nbsp;questions&nbsp;that&nbsp;are&nbsp;intended&nbsp;to&nbsp;replicate&nbsp;the&nbsp;actual&nbsp;ACT&nbsp;exam,&nbsp;so&nbsp;you&nbsp;can&nbsp;feel&nbsp;as&nbsp;confident&nbsp;as&nbsp;possible&nbsp;when&nbsp;it&nbsp;comes&nbsp;time&nbsp;to&nbsp;take&nbsp;the&nbsp;actual&nbsp;exam.&nbsp;Our&nbsp;content<br />\r\nis&nbsp;supplied&nbsp;and&nbsp;arranged&nbsp;by&nbsp;only&nbsp;the&nbsp;most&nbsp;qualified&nbsp;educators.&nbsp;Our&nbsp;layout&nbsp;allows&nbsp;you&nbsp;to&nbsp;go&nbsp;through&nbsp;each&nbsp;question&nbsp;step-by-step,&nbsp;which&nbsp;fosters&nbsp;critical&nbsp;thinking.&nbsp;If&nbsp;you<br />\r\nchoose&nbsp;an&nbsp;incorrect&nbsp;answer,&nbsp;detailed&nbsp;explanations&nbsp;and&nbsp;illustrations&nbsp;help&nbsp;you&nbsp;master&nbsp;the&nbsp;content&nbsp;before&nbsp;continuing.&nbsp;Don&#39;t&nbsp;just&nbsp;keep&nbsp;taking&nbsp;the&nbsp;test&nbsp;over&nbsp;and&nbsp;over.&nbsp;To<br />\r\ntruly&nbsp;improve&nbsp;your&nbsp;scores,&nbsp;you&nbsp;need&nbsp;to&nbsp;take&nbsp;the&nbsp;time&nbsp;to&nbsp;comprehend&nbsp;the&nbsp;information.</p>\r\n', '<p><strong>âœ“&nbsp;&nbsp;1400&nbsp;Practice&nbsp;Questions&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Developed&nbsp;and&nbsp;curated&nbsp;by&nbsp;experienced&nbsp;educators</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;&nbsp;Performance&nbsp;Tracker&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Easily&nbsp;view&nbsp;your&nbsp;progress&nbsp;at&nbsp;a&nbsp;glance&nbsp;and&nbsp;compare&nbsp;with<br />\r\nothers.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Test&nbsp;Mode&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Customize&nbsp;your&nbsp;test&nbsp;taking&nbsp;experience.&nbsp;Select&nbsp;tutor&nbsp;or&nbsp;<br />\r\ntest&nbsp;mode&nbsp;to&nbsp;suit&nbsp;your&nbsp;preparation&nbsp;goals.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Personalized&nbsp;Practice&nbsp;Exam&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Focus&nbsp;on&nbsp;pain&nbsp;points.&nbsp;Generate&nbsp;practice&nbsp;questions&nbsp;based<br />\r\non&nbsp;difficulty&nbsp;level,&nbsp;subject&nbsp;area&nbsp;or&nbsp;questions&nbsp;previously<br />\r\nmarked&nbsp;for&nbsp;review.</p>\r\n', 'This section will provide you with high-quality practice ACT questions, as well as thorough explanations.  Your success is our passion.  Choose your difficulty level and begin practicing today. Prep smart with top-quality ACT practice questions accompanied with detailed explanations. Curate your own practice questions based on difficulty level and personalize your exam preparation.', 'Active', 1, '2018-07-31 05:05:06', '2018-08-20 04:52:58'),
(2, 6, 'GRE-student.jpg', '<h1><strong>Secure&nbsp;your&nbsp;dream&nbsp;program&nbsp;through&nbsp;our</strong></h1>\r\n\r\n<h1><strong>extensive&nbsp;GRE&nbsp;question&nbsp;bank.</strong></h1>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'â€‹Your Success is Our Passion', '<p>The&nbsp;GRE&nbsp;(the&nbsp;Graduate&nbsp;Record&nbsp;Examination)&nbsp;is&nbsp;a&nbsp;standardized&nbsp;exam&nbsp;that&nbsp;is&nbsp;often&nbsp;needed&nbsp;for&nbsp;admission&nbsp;to&nbsp;certain&nbsp;graduate&nbsp;programs.&nbsp;Your&nbsp;GRE&nbsp;score&nbsp;is&nbsp;taken&nbsp;into<br />\r\naccount&nbsp;along&nbsp;with&nbsp;your&nbsp;academic&nbsp;record&nbsp;and&nbsp;supporting&nbsp;materials&nbsp;to&nbsp;determine&nbsp;whether&nbsp;or&nbsp;not&nbsp;you&nbsp;are&nbsp;ready&nbsp;for&nbsp;graduate-level&nbsp;academics.&nbsp;Highly-sought&nbsp;after<br />\r\ngraduate&nbsp;programs&nbsp;prefers&nbsp;an&nbsp;average&nbsp;GRE&nbsp;score&nbsp;in&nbsp;the&nbsp;90th&nbsp;percentile.&nbsp;At&nbsp;this&nbsp;point&nbsp;in&nbsp;your&nbsp;career,&nbsp;you&nbsp;certainly&nbsp;already&nbsp;have&nbsp;your&nbsp;time&nbsp;filled&nbsp;with&nbsp;school,&nbsp;some&nbsp;type&nbsp;of<br />\r\npersonal&nbsp;life,&nbsp;and&nbsp;work.&nbsp;Since&nbsp;your&nbsp;time&nbsp;is&nbsp;very&nbsp;limited,&nbsp;the&nbsp;key&nbsp;to&nbsp;a&nbsp;high&nbsp;GRE&nbsp;score&nbsp;is&nbsp;the&nbsp;correct&nbsp;type&nbsp;of&nbsp;preparation&nbsp;and&nbsp;study.&nbsp;The&nbsp;average&nbsp;time&nbsp;it&nbsp;takes&nbsp;to&nbsp;go&nbsp;through<br />\r\na&nbsp;prep&nbsp;book&nbsp;is&nbsp;around&nbsp;350&nbsp;hours.&nbsp;Instead,&nbsp;use&nbsp;DanquahPrep&#39;s&nbsp;test&nbsp;bank&nbsp;to&nbsp;study&nbsp;as&nbsp;often&nbsp;as&nbsp;you&nbsp;are&nbsp;able,&nbsp;wherever&nbsp;you&nbsp;are&nbsp;able.&nbsp;Get&nbsp;more&nbsp;done&nbsp;in&nbsp;the&nbsp;time&nbsp;you&nbsp;have<br />\r\navailable.&nbsp;Our&nbsp;GRE&nbsp;database&nbsp;has&nbsp;over&nbsp;1,400&nbsp;questions.&nbsp;We&nbsp;thoroughly&nbsp;review&nbsp;every&nbsp;subject&nbsp;so&nbsp;you&nbsp;don&#39;t&nbsp;have&nbsp;any&nbsp;surprises&nbsp;on&nbsp;test&nbsp;day.&nbsp;Utilize&nbsp;the&nbsp;tracking&nbsp;abilities&nbsp;to<br />\r\npinpoint&nbsp;your&nbsp;weakness&nbsp;and&nbsp;improve&nbsp;on&nbsp;them,&nbsp;as&nbsp;well&nbsp;as&nbsp;continue&nbsp;to&nbsp;improve&nbsp;on&nbsp;your&nbsp;strengths.&nbsp;You&nbsp;also&nbsp;have&nbsp;access&nbsp;to&nbsp;unlimited&nbsp;practice&nbsp;exams&nbsp;in&nbsp;all&nbsp;the&nbsp;subjects.<br />\r\nOur&nbsp;test&nbsp;bank&nbsp;makes&nbsp;it&nbsp;convenient&nbsp;for&nbsp;you&nbsp;to&nbsp;study&nbsp;and&nbsp;build&nbsp;your&nbsp;confidence&nbsp;for&nbsp;exam&nbsp;day.</p>\r\n', '<p><strong>âœ“&nbsp;&nbsp;1400&nbsp;Practice&nbsp;Questions&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Developed&nbsp;and&nbsp;curated&nbsp;by&nbsp;experienced&nbsp;educators</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;&nbsp;Performance&nbsp;Tracker&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Easily&nbsp;view&nbsp;your&nbsp;progress&nbsp;at&nbsp;a&nbsp;glance&nbsp;and&nbsp;compare&nbsp;with<br />\r\nothers.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Test&nbsp;Mode&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Customize&nbsp;your&nbsp;test&nbsp;taking&nbsp;experience.&nbsp;Select&nbsp;tutor&nbsp;or&nbsp;<br />\r\ntest&nbsp;mode&nbsp;to&nbsp;suit&nbsp;your&nbsp;preparation&nbsp;goals.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Personalized&nbsp;Practice&nbsp;Exam&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Focus&nbsp;on&nbsp;pain&nbsp;points.&nbsp;Generate&nbsp;practice&nbsp;questions&nbsp;based<br />\r\non&nbsp;difficulty&nbsp;level,&nbsp;subject&nbsp;area&nbsp;or&nbsp;questions&nbsp;previously<br />\r\nmarked&nbsp;for&nbsp;review.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Challenge yourself to improve your score by pinpointing your weaknesses and working on them.  Personalize your GRE prep to receive your best possible score now.', 'Active', 1, '2018-07-31 05:08:49', '2018-08-20 04:59:18'),
(3, 7, 'SAT-student.jpg', '<h1><strong>Our&nbsp;SAT&nbsp;preparation&nbsp;expertise&nbsp;guides</strong></h1>\r\n\r\n<h1><strong>you&nbsp;to&nbsp;your&nbsp;success.</strong></h1>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'â€‹Your Success is Our Passion', '<p>Most&nbsp;colleges&nbsp;and&nbsp;universities&nbsp;use&nbsp;the&nbsp;SAT&nbsp;entrance&nbsp;exam&nbsp;to&nbsp;determine&nbsp;your&nbsp;readiness&nbsp;to&nbsp;attend&nbsp;their&nbsp;institution.Schools&nbsp;require&nbsp;a&nbsp;minimum&nbsp;score&nbsp;of&nbsp;400.&nbsp;The&nbsp;perfect<br />\r\nscore&nbsp;is&nbsp;1600,&nbsp;but&nbsp;the&nbsp;average&nbsp;is&nbsp;around&nbsp;1060.&nbsp;The&nbsp;score&nbsp;you&nbsp;need&nbsp;will&nbsp;vary&nbsp;depending&nbsp;on&nbsp;your&nbsp;educational&nbsp;goals&nbsp;and&nbsp;which&nbsp;school&nbsp;you&nbsp;want&nbsp;to&nbsp;attend.Our&nbsp;question<br />\r\nbank&nbsp;contains&nbsp;over&nbsp;1500&nbsp;of&nbsp;challenging&nbsp;questions&nbsp;that&nbsp;are&nbsp;either&nbsp;at&nbsp;or&nbsp;above&nbsp;the&nbsp;standard&nbsp;SAT&nbsp;difficulty&nbsp;level.&nbsp;We&nbsp;use&nbsp;only&nbsp;the&nbsp;most&nbsp;experienced&nbsp;educators&nbsp;to&nbsp;gather<br />\r\nour&nbsp;pool&nbsp;of&nbsp;questions&nbsp;and&nbsp;make&nbsp;sure&nbsp;to&nbsp;provide&nbsp;in-depth&nbsp;explanations&nbsp;for&nbsp;each&nbsp;answer&nbsp;so&nbsp;you&nbsp;completely&nbsp;understand&nbsp;the&nbsp;concepts.</p>\r\n', '<p><strong>âœ“&nbsp;&nbsp;1400&nbsp;Practice&nbsp;Questions&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Developed&nbsp;and&nbsp;curated&nbsp;by&nbsp;experienced&nbsp;educators</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;&nbsp;Performance&nbsp;Tracker&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Easily&nbsp;view&nbsp;your&nbsp;progress&nbsp;at&nbsp;a&nbsp;glance&nbsp;and&nbsp;compare&nbsp;with<br />\r\nothers.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Test&nbsp;Mode&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Customize&nbsp;your&nbsp;test&nbsp;taking&nbsp;experience.&nbsp;Select&nbsp;tutor&nbsp;or&nbsp;<br />\r\ntest&nbsp;mode&nbsp;to&nbsp;suit&nbsp;your&nbsp;preparation&nbsp;goals.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Personalized&nbsp;Practice&nbsp;Exam&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Focus&nbsp;on&nbsp;pain&nbsp;points.&nbsp;Generate&nbsp;practice&nbsp;questions&nbsp;based<br />\r\non&nbsp;difficulty&nbsp;level,&nbsp;subject&nbsp;area&nbsp;or&nbsp;questions&nbsp;previously<br />\r\nmarked&nbsp;for&nbsp;review.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Challenge yourself to improve your score by pinpointing your weaknesses and working on them.  Personalize your SAT prep to receive your best possible score now.', 'Active', 1, '2018-07-31 05:11:57', '2018-08-20 05:03:22'),
(4, 8, 'MCAT-medical-student.jpg', '<h1><strong>Succeed&nbsp;in&nbsp;MCAT&nbsp;with&nbsp;confidence&nbsp;thanks</strong></h1>\r\n\r\n<h1><strong>to&nbsp;our&nbsp;extensive&nbsp;question&nbsp;banks.</strong></h1>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'â€‹Your Success is Our Passion', '<p>The&nbsp;MCAT&nbsp;(the&nbsp;Medical&nbsp;College&nbsp;Admission&nbsp;Test)&nbsp;is&nbsp;the&nbsp;standardized&nbsp;exam&nbsp;that&nbsp;most&nbsp;medical&nbsp;schools&nbsp;use&nbsp;to&nbsp;determine&nbsp;possible&nbsp;applicants&#39;s&nbsp;existing&nbsp;knowledge&nbsp;of&nbsp;and<br />\r\naptitude&nbsp;for&nbsp;studying&nbsp;medicine.&nbsp;There&nbsp;are&nbsp;several&nbsp;way&nbsp;to&nbsp;study&nbsp;for&nbsp;your&nbsp;MCAT.&nbsp;The&nbsp;best&nbsp;way&nbsp;for&nbsp;you&nbsp;depends&nbsp;on&nbsp;what&nbsp;your&nbsp;goals&nbsp;and&nbsp;and&nbsp;what&nbsp;study&nbsp;style&nbsp;and&nbsp;schedule<br />\r\nbest&nbsp;suites&nbsp;you.&nbsp;Whether&nbsp;you&nbsp;prefer&nbsp;a&nbsp;traditional&nbsp;classroom&nbsp;or&nbsp;online&nbsp;courses,&nbsp;be&nbsp;sure&nbsp;that&nbsp;your&nbsp;plan&nbsp;includes&nbsp;plenty&nbsp;of&nbsp;opportunities&nbsp;to&nbsp;review&nbsp;and&nbsp;thoroughly&nbsp;learn&nbsp;the<br />\r\ncontent&nbsp;as&nbsp;well&nbsp;as&nbsp;real-life&nbsp;practice.&nbsp;Our&nbsp;MCAT&nbsp;question&nbsp;banks&nbsp;include&nbsp;over&nbsp;1,600&nbsp;questions.&nbsp;We&nbsp;guarantee&nbsp;that&nbsp;you&nbsp;will&nbsp;cover&nbsp;all&nbsp;information&nbsp;covered&nbsp;on&nbsp;the&nbsp;current<br />\r\nMCAT&nbsp;exam&nbsp;and&nbsp;will&nbsp;feel&nbsp;confident&nbsp;when&nbsp;it&nbsp;comes&nbsp;times&nbsp;to&nbsp;take&nbsp;the&nbsp;exam.</p>\r\n', '<p><strong>âœ“&nbsp;&nbsp;1400&nbsp;Practice&nbsp;Questions&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Developed&nbsp;and&nbsp;curated&nbsp;by&nbsp;experienced&nbsp;educators</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;&nbsp;Performance&nbsp;Tracker&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Easily&nbsp;view&nbsp;your&nbsp;progress&nbsp;at&nbsp;a&nbsp;glance&nbsp;and&nbsp;compare&nbsp;with<br />\r\nothers.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Test&nbsp;Mode&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Customize&nbsp;your&nbsp;test&nbsp;taking&nbsp;experience.&nbsp;Select&nbsp;tutor&nbsp;or&nbsp;<br />\r\ntest&nbsp;mode&nbsp;to&nbsp;suit&nbsp;your&nbsp;preparation&nbsp;goals.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Personalized&nbsp;Practice&nbsp;Exam&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Focus&nbsp;on&nbsp;pain&nbsp;points.&nbsp;Generate&nbsp;practice&nbsp;questions&nbsp;based<br />\r\non&nbsp;difficulty&nbsp;level,&nbsp;subject&nbsp;area&nbsp;or&nbsp;questions&nbsp;previously<br />\r\nmarked&nbsp;for&nbsp;review.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Let&apos;s get you started on your journey to preparing for the medical field.  Start studying for your MCAT now.', 'Active', 1, '2018-07-31 05:15:22', '2018-08-20 05:11:08'),
(5, 9, 'Pharmaceutical-Calculations-pharmacist.jpg', '<h1><strong>Take&nbsp;your&nbsp;Pharmaceutical&nbsp;Calculations</strong></h1>\r\n\r\n<h1><strong>performance&nbsp;to&nbsp;the&nbsp;next&nbsp;level.</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n', 'Your Success is Our Passion', '<p>Learn&nbsp;how&nbsp;to&nbsp;master&nbsp;pharmaceutical&nbsp;calculations&nbsp;with&nbsp;our&nbsp;Calculations&nbsp;Question&nbsp;Bank.&nbsp;Solve&nbsp;calculations&nbsp;questions&nbsp;correctly&nbsp;and&nbsp;quicker&nbsp;than&nbsp;you&nbsp;ever&nbsp;thought&nbsp;you<br />\r\ncould&nbsp;and&nbsp;skyrocket&nbsp;your&nbsp;performance.</p>\r\n', '<p><strong>Up-To-Date&nbsp;Questions</strong></p>\r\n\r\n<p>Over&nbsp;1000&nbsp;NAPLEX&nbsp;type&nbsp;short&nbsp;answer&nbsp;and&nbsp;multiple&nbsp;choice<br />\r\ncalculations&nbsp;questions&nbsp;with&nbsp;answers.</p>\r\n\r\n<p><strong>Personalized&nbsp;Practice</strong></p>\r\n\r\n<p>Designed&nbsp;for&nbsp;self-paced&nbsp;content&nbsp;review&nbsp;and&nbsp;to&nbsp;improve<br />\r\naccuracy.</p>\r\n\r\n<p><strong>Comprehensive</strong></p>\r\n\r\n<p>Covers&nbsp;all&nbsp;pertinent&nbsp;calculations&nbsp;topics&nbsp;described&nbsp;in&nbsp;the<br />\r\nNAPLEX&nbsp;blueprint.</p>\r\n\r\n<p><strong>Time&nbsp;Tracking</strong></p>\r\n\r\n<p>Use&nbsp;different&nbsp;levels&nbsp;of&nbsp;timed&nbsp;test&nbsp;to&nbsp;systematically&nbsp;improve<br />\r\nspeed.</p>\r\n\r\n<p><strong>24/7&nbsp;Access</strong></p>\r\n\r\n<p>Practice&nbsp;on&nbsp;a&nbsp;desktop&nbsp;or&nbsp;mobile&nbsp;phone&nbsp;whenever&nbsp;and<br />\r\nwherever&nbsp;you&nbsp;want.</p>\r\n\r\n<p><strong>Video&nbsp;Solutions</strong></p>\r\n\r\n<p>Gain&nbsp;deeper&nbsp;understanding&nbsp;with&nbsp;our&nbsp;step-by-step&nbsp;video<br />\r\nsolutions&nbsp;including&nbsp;rationale&nbsp;behind&nbsp;solutions.</p>\r\n\r\n<p><strong>Support&nbsp;Included</strong></p>\r\n\r\n<p>Free&nbsp;1&nbsp;hour&nbsp;biweekly&nbsp;question&nbsp;and&nbsp;answer&nbsp;webinar<br />\r\nsessions.</p>\r\n', 'Master pharmaceutical calculations with high-quality practice questions and  detailed step-by-step video explanations.', 'Active', 1, '2018-07-31 05:20:27', '2018-08-20 05:12:18'),
(6, 10, 'PCAT-student.jpg', '<h1><strong>Secure&nbsp;the&nbsp;college&nbsp;you&nbsp;want&nbsp;with&nbsp;our&nbsp;PCAT</strong></h1>\r\n\r\n<h1><strong>preparation&nbsp;program.</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n', 'â€‹Your Success is Our Passion', '<p>The&nbsp;PCAT&nbsp;is&nbsp;the&nbsp;standard&nbsp;Pharmacy&nbsp;College&nbsp;Admission&nbsp;Test&nbsp;required&nbsp;by&nbsp;most&nbsp;pharmacy&nbsp;educational&nbsp;institutions.&nbsp;This&nbsp;exam&nbsp;is&nbsp;considered&nbsp;a&nbsp;step&nbsp;higher&nbsp;than&nbsp;the&nbsp;SAT<br />\r\nor&nbsp;the&nbsp;ACT&nbsp;exams.&nbsp;It&nbsp;focuses&nbsp;more&nbsp;on&nbsp;science&nbsp;and&nbsp;math.&nbsp;The&nbsp;scoring&nbsp;on&nbsp;the&nbsp;PCAT&nbsp;ranges&nbsp;from&nbsp;100-300,&nbsp;with&nbsp;the&nbsp;average&nbsp;being&nbsp;around&nbsp;200.&nbsp;Each&nbsp;institution&nbsp;has&nbsp;a<br />\r\nscore&nbsp;that&nbsp;they&nbsp;deem&nbsp;necessary&nbsp;in&nbsp;order&nbsp;to&nbsp;be&nbsp;accepted&nbsp;at&nbsp;that&nbsp;facility.&nbsp;The&nbsp;exam&nbsp;is&nbsp;generally&nbsp;broken&nbsp;down&nbsp;into&nbsp;a&nbsp;written&nbsp;portion&nbsp;that&nbsp;analyzes&nbsp;your&nbsp;ability&nbsp;to&nbsp;solve<br />\r\nproblems,&nbsp;a&nbsp;verbal&nbsp;portion,&nbsp;general&nbsp;biology,&nbsp;microbiology,&nbsp;human&nbsp;anatomy&nbsp;and&nbsp;physiology,&nbsp;chemistry,&nbsp;algebra,&nbsp;and&nbsp;calculus.</p>\r\n', '<p><strong>âœ“&nbsp;&nbsp;1400&nbsp;Practice&nbsp;Questions&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Developed&nbsp;and&nbsp;curated&nbsp;by&nbsp;experienced&nbsp;educators</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;&nbsp;Performance&nbsp;Tracker&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Easily&nbsp;view&nbsp;your&nbsp;progress&nbsp;at&nbsp;a&nbsp;glance&nbsp;and&nbsp;compare&nbsp;with<br />\r\nothers.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Test&nbsp;Mode&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Customize&nbsp;your&nbsp;test&nbsp;taking&nbsp;experience.&nbsp;Select&nbsp;tutor&nbsp;or&nbsp;<br />\r\ntest&nbsp;mode&nbsp;to&nbsp;suit&nbsp;your&nbsp;preparation&nbsp;goals.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Personalized&nbsp;Practice&nbsp;Exam&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Focus&nbsp;on&nbsp;pain&nbsp;points.&nbsp;Generate&nbsp;practice&nbsp;questions&nbsp;based<br />\r\non&nbsp;difficulty&nbsp;level,&nbsp;subject&nbsp;area&nbsp;or&nbsp;questions&nbsp;previously<br />\r\nmarked&nbsp;for&nbsp;review.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Our test questions will get you confident and ready for your PCAT in no time at all.', 'Active', 1, '2018-07-31 05:22:38', '2018-08-20 05:50:43'),
(7, 11, 'PTCB-student.jpg', '<h1><strong>Secure&nbsp;your&nbsp;future&nbsp;with&nbsp;PTCE&nbsp;success</strong></h1>\r\n\r\n<h1><strong>through&nbsp;our&nbsp;extensive&nbsp;practice&nbsp;exams.</strong></h1>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'Your Success is Our Passion', '<p>PTCB&nbsp;stands&nbsp;for&nbsp;Pharmacy&nbsp;Technician&nbsp;Certification&nbsp;Board.&nbsp;&nbsp;The&nbsp;Board&nbsp;oversees&nbsp;all&nbsp;pharmacy&nbsp;technician&nbsp;certifications&nbsp;exams&nbsp;(PTCE).&nbsp;&nbsp;This&nbsp;is&nbsp;a&nbsp;standardized&nbsp;exam&nbsp;to<br />\r\ndetermine&nbsp;whether&nbsp;or&nbsp;not&nbsp;a&nbsp;person&nbsp;seems&nbsp;capable&nbsp;of&nbsp;the&nbsp;education&nbsp;needed&nbsp;in&nbsp;order&nbsp;to&nbsp;become&nbsp;a&nbsp;pharmacy&nbsp;technician.&nbsp;The&nbsp;PTCE&nbsp;knowledge&nbsp;is&nbsp;divided&nbsp;into&nbsp;nine&nbsp;topics.<br />\r\nOur&nbsp;expertly&nbsp;gathered&nbsp;practice&nbsp;exams&nbsp;will&nbsp;help&nbsp;you&nbsp;with&nbsp;all&nbsp;the&nbsp;topics.&nbsp;&nbsp;Don&rsquo;t&nbsp;worry;&nbsp;we&nbsp;will&nbsp;make&nbsp;sure&nbsp;you&nbsp;are&nbsp;prepared&nbsp;in&nbsp;all&nbsp;the&nbsp;topics&nbsp;necessary</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><strong>Highlights&nbsp;of&nbsp;some&nbsp;of&nbsp;the&nbsp;topics&nbsp;covered</strong></p>\r\n\r\n<p><br />\r\n&rsaquo;&nbsp;&nbsp;Calculations&nbsp;<br />\r\n&rsaquo;&nbsp;&nbsp;Pharmacy&nbsp;Law&nbsp;&nbsp;<br />\r\n&rsaquo;&nbsp;&nbsp;Scheduled&nbsp;Drugs&nbsp;<br />\r\n&rsaquo;&nbsp;&nbsp;Top&nbsp;200&nbsp;drugs<br />\r\n&rsaquo;&nbsp;&nbsp;Equipment&nbsp;<br />\r\n&rsaquo;&nbsp;&nbsp;Routes&nbsp;and&nbsp;Formulations&nbsp;<br />\r\n&rsaquo;&nbsp;&nbsp;Parenteral<br />\r\n&rsaquo;&nbsp;&nbsp;Drug&nbsp;Interactions<br />\r\n&rsaquo;&nbsp;&nbsp;Retail&nbsp;math</p>\r\n', 'Our test questions will get you confident and ready for your PTCE in no time at all.', 'Active', 1, '2018-07-31 05:27:30', '2018-08-20 05:33:11'),
(8, 12, 'NCLEX-RN--Nurse.jpg', '<h1><strong>Pass&nbsp;the&nbsp;NCLEX&nbsp;RN&nbsp;with&nbsp;confidence</strong></h1>\r\n\r\n<h1><strong>with&nbsp;our&nbsp;</strong><strong>world&nbsp;class</strong><strong>&nbsp;preparation.</strong></h1>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'â€‹Your Success is Our Passion', '<p>The&nbsp;NCLEX-RN&nbsp;study&nbsp;exams&nbsp;includes&nbsp;over&nbsp;1,250&nbsp;questions&nbsp;expertly&nbsp;collected&nbsp;and&nbsp;organized&nbsp;by&nbsp;practicing&nbsp;nursing&nbsp;and&nbsp;nurse&nbsp;educators.&nbsp;&nbsp;They&nbsp;use&nbsp;their&nbsp;knowledge&nbsp;and<br />\r\nreal-life&nbsp;clinical&nbsp;practice&nbsp;to&nbsp;make&nbsp;certain&nbsp;you&nbsp;have&nbsp;the&nbsp;most&nbsp;advantageous&nbsp;information&nbsp;available.&nbsp;As&nbsp;you&nbsp;move&nbsp;along&nbsp;through&nbsp;the&nbsp;practice&nbsp;exams,&nbsp;you&nbsp;will&nbsp;receive<br />\r\nin-depth&nbsp;explanations&nbsp;and&nbsp;countless&nbsp;illustrations&nbsp;and&nbsp;images&nbsp;to&nbsp;ensure&nbsp;you&nbsp;completely&nbsp;understand&nbsp;the&nbsp;content.</p>\r\n', '<p><strong>âœ“&nbsp;&nbsp;1400&nbsp;Practice&nbsp;Questions&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Developed&nbsp;and&nbsp;curated&nbsp;by&nbsp;experienced&nbsp;educators</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;&nbsp;Performance&nbsp;Tracker&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Easily&nbsp;view&nbsp;your&nbsp;progress&nbsp;at&nbsp;a&nbsp;glance&nbsp;and&nbsp;compare&nbsp;with<br />\r\nothers.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Test&nbsp;Mode&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Customize&nbsp;your&nbsp;test&nbsp;taking&nbsp;experience.&nbsp;Select&nbsp;tutor&nbsp;or&nbsp;<br />\r\ntest&nbsp;mode&nbsp;to&nbsp;suit&nbsp;your&nbsp;preparation&nbsp;goals.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Personalized&nbsp;Practice&nbsp;Exam&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Focus&nbsp;on&nbsp;pain&nbsp;points.&nbsp;Generate&nbsp;practice&nbsp;questions&nbsp;based<br />\r\non&nbsp;difficulty&nbsp;level,&nbsp;subject&nbsp;area&nbsp;or&nbsp;questions&nbsp;previously<br />\r\nmarked&nbsp;for&nbsp;review.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Our goal is to challenge you and improve your critical thinking skills in order for you to understand the clinical reasoning behind the correct answer.  Let us help you pass your licensing exam with confidence and ease.', 'Active', 1, '2018-07-31 05:30:36', '2018-08-20 05:49:27'),
(9, 13, 'NAPLEX-pharmacist.jpg', '<h1><strong>Kickstart&nbsp;your&nbsp;career,&nbsp;our&nbsp;NAPLEX</strong></h1>\r\n\r\n<h1><strong>preparation&nbsp;primes&nbsp;you&nbsp;for&nbsp;success.</strong></h1>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'â€‹Your Success is Our Passion', '<p>NAPLEX&nbsp;stands&nbsp;for&nbsp;North&nbsp;American&nbsp;Pharmacist&nbsp;Licensure&nbsp;Examination.&nbsp;&nbsp;Our&nbsp;NAPLEX&nbsp;practice&nbsp;tests&nbsp;are&nbsp;based&nbsp;on&nbsp;the&nbsp;current&nbsp;exams,&nbsp;so&nbsp;you&nbsp;can&nbsp;rest&nbsp;assured&nbsp;that&nbsp;you<br />\r\nwill&nbsp;cover&nbsp;all&nbsp;the&nbsp;information&nbsp;you&nbsp;need&nbsp;in&nbsp;order&nbsp;to&nbsp;score&nbsp;high&nbsp;on&nbsp;your&nbsp;final&nbsp;exam.&nbsp;We&nbsp;offer&nbsp;over&nbsp;2,600&nbsp;questions,&nbsp;ensuring&nbsp;that&nbsp;we&nbsp;cover&nbsp;all&nbsp;the&nbsp;pertinent&nbsp;information.<br />\r\nOur&nbsp;team&nbsp;of&nbsp;experienced&nbsp;pharmacists&nbsp;collected&nbsp;and&nbsp;organized&nbsp;the&nbsp;information&nbsp;to&nbsp;make&nbsp;sure&nbsp;all&nbsp;major&nbsp;aspects&nbsp;of&nbsp;the&nbsp;therapeutic&nbsp;study&nbsp;are&nbsp;included.</p>\r\n', '<p><strong>âœ“&nbsp;&nbsp;2600&nbsp;Practice&nbsp;Questions&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Developed&nbsp;and&nbsp;curated&nbsp;by&nbsp;experienced&nbsp;educators</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;&nbsp;Performance&nbsp;Tracker&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Easily&nbsp;view&nbsp;your&nbsp;progress&nbsp;at&nbsp;a&nbsp;glance&nbsp;and&nbsp;compare&nbsp;with<br />\r\nothers.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Test&nbsp;Mode&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Customize&nbsp;your&nbsp;test&nbsp;taking&nbsp;experience.&nbsp;Select&nbsp;tutor&nbsp;or<br />\r\ntest&nbsp;mode&nbsp;to&nbsp;suit&nbsp;your&nbsp;preparation&nbsp;goals</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Personalized&nbsp;Practice&nbsp;Exam&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Focus&nbsp;on&nbsp;pain&nbsp;points.&nbsp;Generate&nbsp;practice&nbsp;questions&nbsp;based<br />\r\non&nbsp;difficulty&nbsp;level,&nbsp;subject&nbsp;area&nbsp;or&nbsp;questions&nbsp;previously<br />\r\nmarked&nbsp;for&nbsp;review.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Use the practice exams to review your strengths and weaknesses and improve on them.  If you get an answer incorrect, we will thoroughly explain the concept to make sure you completely understand the rationale.  We offer many opportunities for you to work on the calculations needed in order for you to feel confident on your actual exam day.', 'Active', 1, '2018-07-31 05:32:08', '2018-08-20 05:52:31'),
(10, 14, 'USLME-Doctor.jpg', '<h1><strong>Take&nbsp;the&nbsp;USMLE&nbsp;tests&nbsp;in&nbsp;your&nbsp;stride&nbsp;with</strong></h1>\r\n\r\n<h1><strong>comprehensive&nbsp;preparation&nbsp;and&nbsp;guidance.</strong></h1>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'â€‹Your Success is Our Passion', '<p>USMLE&nbsp;(the&nbsp;United&nbsp;States&nbsp;Medical&nbsp;Licensing&nbsp;Examination)&nbsp;is&nbsp;a&nbsp;set&nbsp;of&nbsp;four&nbsp;exams&nbsp;taken&nbsp;over&nbsp;different&nbsp;times&nbsp;in&nbsp;your&nbsp;medical&nbsp;career&nbsp;that&nbsp;determine&nbsp;whether&nbsp;or&nbsp;not&nbsp;you&#39;re<br />\r\nready&nbsp;to&nbsp;practice&nbsp;medicine.&nbsp;The&nbsp;prep&nbsp;exam&nbsp;are&nbsp;put&nbsp;together&nbsp;and&nbsp;taught&nbsp;by&nbsp;board-certified&nbsp;medical&nbsp;professionals&nbsp;who&nbsp;know&nbsp;first-hand&nbsp;what&nbsp;you&nbsp;will&nbsp;need&nbsp;to&nbsp;know&nbsp;in<br />\r\norder&nbsp;to&nbsp;start&nbsp;your&nbsp;residency.&nbsp;The&nbsp;first&nbsp;exam&nbsp;is&nbsp;set&nbsp;up&nbsp;to&nbsp;assess&nbsp;your&nbsp;basic&nbsp;scientific&nbsp;knowledge&nbsp;and&nbsp;aptitude&nbsp;towards&nbsp;medicine.&nbsp;The&nbsp;second&nbsp;step&nbsp;of&nbsp;the&nbsp;USMLE&nbsp;exam<br />\r\nincludes&nbsp;a&nbsp;clinical&nbsp;skills&nbsp;portion.&nbsp;Step&nbsp;3&nbsp;of&nbsp;the&nbsp;exam&nbsp;process&nbsp;gives&nbsp;potential&nbsp;institutions&nbsp;a&nbsp;final&nbsp;assessment&nbsp;of&nbsp;a&nbsp;physician&#39;s&nbsp;ability&nbsp;to&nbsp;be&nbsp;independent,&nbsp;responsible,&nbsp;and<br />\r\ncapable&nbsp;of&nbsp;delivering&nbsp;general&nbsp;medical&nbsp;care.</p>\r\n', '<p><strong>âœ“&nbsp;&nbsp;1400&nbsp;Practice&nbsp;Questions&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Developed&nbsp;and&nbsp;curated&nbsp;by&nbsp;experienced&nbsp;educators</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;&nbsp;Performance&nbsp;Tracker&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Easily&nbsp;view&nbsp;your&nbsp;progress&nbsp;at&nbsp;a&nbsp;glance&nbsp;and&nbsp;compare&nbsp;with<br />\r\nothers.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Test&nbsp;Mode&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Customize&nbsp;your&nbsp;test&nbsp;taking&nbsp;experience.&nbsp;Select&nbsp;tutor&nbsp;or&nbsp;<br />\r\ntest&nbsp;mode&nbsp;to&nbsp;suit&nbsp;your&nbsp;preparation&nbsp;goals.</p>\r\n\r\n<p><strong>âœ“&nbsp;&nbsp;Personalized&nbsp;Practice&nbsp;Exam&nbsp;</strong><br />\r\n&rsaquo;&nbsp;&nbsp;&nbsp;Focus&nbsp;on&nbsp;pain&nbsp;points.&nbsp;Generate&nbsp;practice&nbsp;questions&nbsp;based<br />\r\non&nbsp;difficulty&nbsp;level,&nbsp;subject&nbsp;area&nbsp;or&nbsp;questions&nbsp;previously<br />\r\nmarked&nbsp;for&nbsp;review.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'The USMLE exams include over 1,600 expertly written questions.  These questions are developed to improve your step-by-step critical thinking process.  We provide in-depth explanations and excellent illustrations, charts, and images to ensure that you comprehend and understand the content.', 'Active', 1, '2018-07-31 05:33:35', '2018-08-20 05:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`id`, `category_id`, `type_id`, `subject_name`, `created_by`, `status`, `created_date`, `updated_date`) VALUES
(1, 5, 4, 'Geometry', 1, 'Active', '2018-07-31 04:44:26', '2018-07-31 06:55:45'),
(2, 5, 4, 'Algebra and Functions', 1, 'Active', '2018-07-31 04:44:39', '2018-07-31 06:55:48'),
(3, 5, 4, 'Statistics and Probability', 1, 'Active', '2018-07-31 04:44:49', '2018-07-31 06:55:51'),
(4, 5, 4, 'Number and Quantity', 1, 'Active', '2018-07-31 04:45:00', '2018-07-31 06:55:53'),
(5, 7, 1, 'Heart of Algebra', 1, 'Active', '2018-07-31 04:45:19', '2018-07-31 06:55:55'),
(6, 7, 1, 'Passport to Advanced Math', 1, 'Active', '2018-07-31 04:45:29', '2018-07-31 06:55:57'),
(7, 7, 1, 'Problem Solving and Data Analysis', 1, 'Active', '2018-07-31 04:45:39', '2018-07-31 06:55:59'),
(8, 7, 1, 'Additional Topics in Math', 1, 'Active', '2018-07-31 04:45:48', '2018-07-31 06:56:03'),
(9, 9, 8, 'Ways of Expressing Concentration', 1, 'Inactive', '2018-08-01 07:50:54', '2018-08-29 18:38:21'),
(10, 5, 5, 'Humanities', 1, 'Active', '2018-08-06 01:28:47', '2018-08-06 00:28:47'),
(11, 9, 13, 'Rates of Administration', 1, 'Active', '2018-08-29 18:27:44', '2018-08-29 18:30:24'),
(12, 9, 13, 'Flow Rate Calculations', 1, 'Inactive', '2018-08-29 18:30:56', '2018-08-29 18:31:12'),
(13, 9, 8, 'Ratio, Proportion and Dimensional Analysis', 1, 'Active', '2018-08-29 18:35:55', '2018-08-29 18:35:55'),
(14, 9, 8, 'Density', 1, 'Active', '2018-08-29 18:36:29', '2018-08-29 18:36:29'),
(15, 9, 9, 'Total Parenteral Nutrition', 1, 'Active', '2018-08-29 18:39:09', '2018-08-29 18:39:09'),
(16, 9, 10, 'Ways of Expressing Concentration', 1, 'Active', '2018-08-29 18:40:34', '2018-08-29 18:40:34'),
(17, 9, 10, 'Dilution and Concentration', 1, 'Active', '2018-08-29 18:41:33', '2018-08-29 18:41:33'),
(18, 9, 10, 'pH and Buffers', 1, 'Active', '2018-08-29 18:43:10', '2018-08-29 18:43:10'),
(19, 9, 11, 'Dosage Calculations', 1, 'Active', '2018-08-29 18:44:24', '2018-08-29 18:44:24'),
(20, 9, 11, 'Milliequivalents', 1, 'Active', '2018-08-29 18:45:19', '2018-08-29 18:45:19'),
(21, 9, 11, 'Osmolarity', 1, 'Active', '2018-08-29 18:45:56', '2018-08-29 18:45:56'),
(22, 9, 11, 'Isotonicity', 1, 'Active', '2018-08-29 18:46:52', '2018-08-29 18:46:52'),
(23, 9, 11, 'Reconstitution of Powders', 1, 'Active', '2018-08-29 18:47:42', '2018-08-29 18:47:42'),
(24, 9, 11, 'Radiopharmaceutical Calculations', 1, 'Active', '2018-08-29 18:48:29', '2018-08-29 18:48:29'),
(25, 9, 12, 'Reducing and Enlarging Formulas', 1, 'Active', '2018-08-29 18:49:44', '2018-08-29 18:49:44'),
(26, 9, 12, 'Aliquot', 1, 'Active', '2018-08-29 18:50:25', '2018-08-29 18:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe_package`
--

CREATE TABLE `tbl_subscribe_package` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `subscription_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subscription_status` enum('Active','Expired') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_subscribe_package`
--

INSERT INTO `tbl_subscribe_package` (`id`, `student_id`, `category_id`, `package_id`, `subscription_date`, `expiry_date`, `status`, `subscription_status`, `txn_id`, `payment_id`, `created_date`) VALUES
(1, 1, 5, 1, '2018-08-07', '2018-09-06', 'succeeded', 'Active', 'ch_1CwOsLHkceIAAF7vaaqajf1w', 1, '2018-08-07 01:41:01'),
(2, 1, 5, 2, '2018-09-07', '2018-12-06', 'succeeded', 'Active', 'ch_1CwPQFHkceIAAF7vmjmy6qpz', 2, '2018-08-07 02:16:04'),
(3, 1, 5, 3, '2018-12-07', '2019-06-05', 'succeeded', 'Active', 'ch_1CwPreHkceIAAF7vjOEIUQXs', 3, '2018-08-07 02:44:23'),
(4, 1, 5, 1, '2019-06-06', '2019-07-06', 'succeeded', 'Active', 'ch_1D1BEUDeriUoU3nCVFZq4zt3', 4, '2018-08-20 06:07:39'),
(5, 10, 9, 13, '2018-12-12', '2019-01-11', 'succeeded', 'Active', 'ch_1DgiV7DeriUoU3nCIvLYpMf7', 5, '2018-12-12 18:56:30'),
(6, 10, 5, 1, '2018-12-12', '2019-01-11', 'succeeded', 'Active', 'ch_1DgiknDeriUoU3nCijJKx8lK', 6, '2018-12-12 19:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topics`
--

CREATE TABLE `tbl_topics` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_topics`
--

INSERT INTO `tbl_topics` (`id`, `category_id`, `type_id`, `subject_id`, `topic_name`, `created_by`, `status`, `created_date`, `updated_date`) VALUES
(1, 7, 1, 5, 'Linear Equations and Inequalities', 1, 'Active', '2018-07-31 04:46:20', '2018-07-31 06:56:08'),
(2, 7, 1, 5, 'Linear Functions', 1, 'Active', '2018-07-31 04:46:38', '2018-07-31 06:56:11'),
(3, 7, 1, 5, 'Systems of Linear Equations and Inequalities', 1, 'Active', '2018-07-31 04:46:52', '2018-07-31 06:56:13'),
(4, 7, 1, 5, 'Factors and Divisibility', 1, 'Active', '2018-07-31 04:47:13', '2018-07-31 06:56:15'),
(5, 5, 4, 1, 'Factors and Divisibility', 1, 'Active', '2018-07-31 06:49:55', '2018-07-31 06:56:18'),
(6, 5, 4, 1, 'Probability', 1, 'Active', '2018-07-31 06:50:17', '2018-07-31 06:56:20'),
(7, 5, 4, 1, 'Numbers', 1, 'Active', '2018-07-31 06:50:35', '2018-07-31 06:56:22'),
(8, 5, 4, 1, 'Radicals, Rationals, and Exponentials', 1, 'Active', '2018-07-31 06:50:52', '2018-07-31 06:56:25'),
(9, 9, 8, 9, 'Percentage Concentrations', 1, 'Inactive', '2018-08-01 07:51:29', '2018-08-29 18:38:07'),
(10, 9, 13, 11, 'Flow Rate Calculations', 1, 'Active', '2018-08-29 18:31:31', '2018-08-29 18:31:31'),
(11, 9, 8, 13, 'Ratio, Proportion and Dimensional Analysis', 1, 'Active', '2018-08-29 18:36:09', '2018-08-29 18:36:09'),
(12, 9, 8, 14, 'Density', 1, 'Active', '2018-08-29 18:37:01', '2018-08-29 18:37:01'),
(13, 9, 9, 15, 'Total Parenteral Nutrition', 1, 'Active', '2018-08-29 18:39:33', '2018-08-29 18:39:33'),
(14, 9, 10, 16, 'Ways of Expressing Concentration', 1, 'Active', '2018-08-29 18:40:58', '2018-08-29 18:40:58'),
(15, 9, 10, 17, 'Dilution and Concentration', 1, 'Active', '2018-08-29 18:42:06', '2018-08-29 18:42:06'),
(16, 9, 10, 18, 'pH and Buffers', 1, 'Active', '2018-08-29 18:43:27', '2018-08-29 18:43:27'),
(17, 9, 11, 19, 'Dosage Calculations', 1, 'Active', '2018-08-29 18:44:47', '2018-08-29 18:44:47'),
(18, 9, 11, 20, 'Milliequivalents', 1, 'Active', '2018-08-29 18:45:31', '2018-08-29 18:45:31'),
(19, 9, 11, 21, 'Osmolarity', 1, 'Active', '2018-08-29 18:46:13', '2018-08-29 18:46:13'),
(20, 9, 11, 22, 'Isotonicity', 1, 'Active', '2018-08-29 18:47:12', '2018-08-29 18:47:12'),
(21, 9, 11, 23, 'Reconstitution of Powders', 1, 'Active', '2018-08-29 18:47:56', '2018-08-29 18:47:56'),
(22, 9, 11, 24, 'Radiopharmaceutical Calculations', 1, 'Active', '2018-08-29 18:48:45', '2018-08-29 18:48:45'),
(23, 9, 12, 25, 'Reducing and Enlarging Formulas', 1, 'Active', '2018-08-29 18:50:02', '2018-08-29 18:50:02'),
(24, 9, 12, 26, 'Aliquot', 1, 'Active', '2018-08-29 18:50:36', '2018-08-29 18:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_types`
--

CREATE TABLE `tbl_types` (
  `id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_types`
--

INSERT INTO `tbl_types` (`id`, `subcategory_id`, `type_name`, `created_by`, `status`, `created_date`, `updated_date`) VALUES
(1, 7, 'Math', 1, 'Active', '2018-07-31 04:42:55', '2018-07-31 06:56:31'),
(2, 7, 'Reading', 1, 'Active', '2018-07-31 04:43:04', '2018-07-31 06:56:34'),
(3, 7, 'Writing', 1, 'Active', '2018-07-31 04:43:14', '2018-07-31 06:56:36'),
(4, 5, 'Math', 1, 'Active', '2018-07-31 04:43:25', '2018-07-31 06:56:50'),
(5, 5, 'Reading', 1, 'Active', '2018-07-31 04:43:38', '2018-08-06 00:28:28'),
(6, 5, 'English', 1, 'Active', '2018-07-31 04:43:49', '2018-07-31 06:56:54'),
(7, 5, 'Science', 1, 'Active', '2018-07-31 04:44:01', '2018-07-31 06:56:56'),
(8, 9, 'Review of Pharmaceutical Calculations Math Basics', 1, 'Active', '2018-07-31 18:56:17', '2018-08-29 18:22:23'),
(9, 9, 'Patients Nutritional Needs and the Content Nutrient Sources', 1, 'Active', '2018-08-29 18:24:36', '2018-08-29 18:24:36'),
(10, 9, 'Drug Concentrations, Ratio Strengths and/or Extent of Ionization', 1, 'Active', '2018-08-29 18:25:18', '2018-08-29 18:25:18'),
(11, 9, 'Quantities of Medication to be Compounded, Dispensed or Administered', 1, 'Active', '2018-08-29 18:26:19', '2018-08-29 18:26:19'),
(12, 9, 'Quantities of Ingredients Needed to Compound Preparations', 1, 'Active', '2018-08-29 18:26:57', '2018-08-29 18:26:57'),
(13, 9, 'Rates of Administration', 1, 'Active', '2018-08-29 18:27:11', '2018-08-29 18:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `primaryaddress` text NOT NULL,
  `secondaryaddress` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `usertype` enum('1','2','3','4') NOT NULL,
  `usercountry` int(11) NOT NULL,
  `userstate` varchar(255) NOT NULL,
  `graduationyear` varchar(255) NOT NULL,
  `schoolname` varchar(255) NOT NULL,
  `securityquestion1` int(11) NOT NULL,
  `securityanswer1` varchar(255) NOT NULL,
  `securityquestion2` int(11) NOT NULL,
  `securityanswer2` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `reset_password` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `firstname`, `lastname`, `primaryaddress`, `secondaryaddress`, `city`, `country`, `state`, `zipcode`, `phone`, `usertype`, `usercountry`, `userstate`, `graduationyear`, `schoolname`, `securityquestion1`, `securityanswer1`, `securityquestion2`, `securityanswer2`, `status`, `reset_password`, `created_date`, `updated_date`) VALUES
(1, 'jeff.boskenn@gmail.com', '16d7a4fca7442dda3ad93c9a726597e4', 'Jeff', 'Boskenn', '2922  Vesta Drive', '', 'Park Ridge', 231, 'Illinois', '60068', '773-714-5860', '1', 0, '', '', '', 0, '', 0, '', 'Active', 'MB7vre2sCs', '2018-07-31 06:26:38', '2019-01-04 08:27:36'),
(2, '5yr53@zippiex.com', '202cb962ac59075b964b07152d234b70', 'alan', 'walker', '123', '123', 'new york', 231, 'NY', '002211', '1231-231-231', '4', 0, '', '', '', 4, 'NY', 1, 'NY', 'Active', '', '2018-08-02 00:57:20', '2018-08-01 23:57:20'),
(3, 'parkerrosan001@gmail.com', '0192023a7bbd73250516f069df18b500', 'Aron', 'Smith', '58 E 11th St, New York, NY 10003, USA', '58 E 11th St, New York, NY 10003, USA', 'new york', 231, 'New YORK', '10003', '0014-897-989', '1', 0, '', '', '', 4, 'ONATARIO', 1, 'HAHAH', 'Active', '', '2018-08-02 05:15:21', '2018-08-08 02:39:43'),
(4, 'aron.smith@mail.com', '0192023a7bbd73250516f069df18b500', 'Aron', 'Smith', '8132 Philmont St.  Brooklyn, NY 11206', '8132 Philmont St.  Brooklyn, NY 11206', 'new york', 231, 'new york', '11207', '1547-862-659', '1', 0, '', '', '', 0, '', 0, '', 'Active', '', '2018-08-06 05:29:26', '2018-08-06 04:36:15'),
(5, 'prof', '76ab24050a3db9686db0c5bb8a5b123f', 'M ', 'D ', '15941 S Harlem Ave', '15941 S Harlem Ave, Suite 255', 'Tinley Park', 231, 'IL', '60477', '7084-979-728', '4', 0, '', '', '', 2, 'geo', 2, 'uk', 'Active', '', '2018-08-08 15:49:18', '2018-08-08 15:49:18'),
(6, 'profmdanquah@rxcalculations.com', '29ca0d7ba26bcbda9751cac45d5cadb7', 'M', ' DProf', ' ', ' ', ' ', 231, ' ', ' ', '708-497-9738', '2', 231, 'Illinois', '', '', 2, 'prizm', 2, 'ut', 'Active', '', '2018-08-08 16:38:34', '2019-03-31 07:23:49'),
(7, 'lpayk@poly-swarm.com', 'c7e03fcee47ce5bc7db68fd15a4f2f40', 'Ronald', ' Y Green', '723  Pineview Drive', '', 'Marks', 231, 'Mississippi', '38646', '507-976-1545', '1', 231, '', '2017', 'High School Diplom', 4, 'Marks', 2, 'High School Diplom', 'Active', '', '2018-08-12 23:45:46', '2018-08-12 23:45:46'),
(8, 'jnagh@yahoo.com', 'ee760692c484b61f65c144e6a2135c8a', 'Jennifer', 'D', '15941 Harlem Ave, Ste 255', '', 'Tinley park', 231, 'Illinois', '60477', '423-946-8427', '2', 231, 'Illinois', '', '', 2, 'saturn', 2, 'mkogh', 'Active', '', '2018-08-18 18:57:26', '2018-08-18 18:57:26'),
(9, 'support@rxcalculations.com', 'fc276e24858cc5283ec44e9e8ca992ca', 'M', 'D', '15941 South Harlem', '15941 South Harlem', 'chicago', 231, 'Illinois', '60477', '708-497-9728', '4', 0, '', '', '', 2, 'toyota', 2, 'ibm', 'Active', '', '2018-08-29 13:58:46', '2018-08-29 13:58:46'),
(10, 'info@rxcalculations.com', 'd9b42066b185eda0d55d711d1c28730d', 'Michael', 'Danquah', '15941 Harlem Ave, Ste 255', '', 'Tinley Park', 231, 'IL', '60477', '708-497-9728', '1', 0, '', '', '', 0, '', 0, '', 'Active', '', '2018-12-12 18:39:02', '2018-12-12 19:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `id` int(11) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`id`, `usertype`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Medical', 'Active', '2018-07-02 11:15:55', '2018-07-02 11:15:55'),
(2, 'Pharmacy', 'Active', '2018-07-02 11:15:55', '2018-08-10 00:02:09'),
(3, 'Nursing', 'Active', '2018-07-02 11:15:55', '2018-07-02 11:15:55'),
(4, 'School/College', 'Active', '2018-07-02 11:15:55', '2018-07-02 11:15:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_billing_info`
--
ALTER TABLE `tbl_billing_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_demouser`
--
ALTER TABLE `tbl_demouser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discounts`
--
ALTER TABLE `tbl_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_options`
--
ALTER TABLE `tbl_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quick_test`
--
ALTER TABLE `tbl_quick_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quick_user_test`
--
ALTER TABLE `tbl_quick_user_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe_package`
--
ALTER TABLE `tbl_subscribe_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_topics`
--
ALTER TABLE `tbl_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_types`
--
ALTER TABLE `tbl_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_billing_info`
--
ALTER TABLE `tbl_billing_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `tbl_demouser`
--
ALTER TABLE `tbl_demouser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_discounts`
--
ALTER TABLE `tbl_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_options`
--
ALTER TABLE `tbl_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_quick_test`
--
ALTER TABLE `tbl_quick_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_quick_user_test`
--
ALTER TABLE `tbl_quick_user_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_subscribe_package`
--
ALTER TABLE `tbl_subscribe_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_topics`
--
ALTER TABLE `tbl_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
