-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2023 at 09:17 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c28furnitouch`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `GalleryId` int(12) NOT NULL,
  `Gallery` text COLLATE utf8_unicode_ci,
  `GallerySlug` text COLLATE utf8_unicode_ci,
  `parent_information` int(12) DEFAULT NULL,
  `Description` mediumtext COLLATE utf8_unicode_ci,
  `Visible` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `added` date DEFAULT NULL,
  `updated` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`GalleryId`, `Gallery`, `GallerySlug`, `parent_information`, `Description`, `Visible`, `added`, `updated`) VALUES
(3, 'Activities', 'activities', 81, 'The Women in Grace Foundation get involved in  many therapeutic activities that helps them in the recovery process .', 'Y', '2017-03-18', '2017-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `galleryimage`
--

CREATE TABLE IF NOT EXISTS `galleryimage` (
  `image_id` int(12) NOT NULL,
  `caption` mediumtext COLLATE utf8_unicode_ci,
  `image` mediumtext COLLATE utf8_unicode_ci,
  `GalleryId` int(11) DEFAULT NULL,
  `Main` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galleryimage`
--

INSERT INTO `galleryimage` (`image_id`, `caption`, `image`, `GalleryId`, `Main`) VALUES
(10, 'Games', '1d3dab_2e4a3c645da64c838836972deda6120f-mv2.jpg', 3, 'N'),
(11, 'Yoga And Meditation', '1d3dab_2f46957af51c44b1ae8c8df08a89a109-mv2.jpg', 3, 'Y'),
(12, 'Gardening', '1d3dab_bd426543ff5e4926b46886f403401c18-mv2.jpg', 3, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NewsID` int(12) NOT NULL,
  `UserID` int(12) DEFAULT NULL,
  `netype` enum('News','Event') COLLATE utf8_unicode_ci DEFAULT 'News',
  `NewsName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `NewsSlug` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `NewsShortDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `NewsLongDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `NewsThumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NewsImage` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_information` int(11) DEFAULT NULL,
  `NewsDate` date DEFAULT NULL,
  `NewsUpdateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AvailableFor` enum('Rent','Sale') COLLATE utf8_unicode_ci DEFAULT 'Sale',
  `NewsBreaking` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `NewsLive` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `NewsFeatured` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `NewsLocation` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PageTitle` text COLLATE utf8_unicode_ci,
  `PageDescription` text COLLATE utf8_unicode_ci,
  `PageKeywords` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `UserID`, `netype`, `NewsName`, `NewsSlug`, `NewsShortDesc`, `NewsLongDesc`, `NewsThumb`, `NewsImage`, `parent_information`, `NewsDate`, `NewsUpdateDate`, `AvailableFor`, `NewsBreaking`, `NewsLive`, `NewsFeatured`, `NewsLocation`, `PageTitle`, `PageDescription`, `PageKeywords`) VALUES
(3, 1, 'News', 'What Is Addiction?', 'what-is-addiction', '<p>Drug addiction is a chronic disease characterized by compulsive, or uncontrollable, drug seeking and use despite harmful consequences and changes in the brain, which can be long lasting. These changes in the brain can lead to the harmful behaviors seen in people who use drugs. Drug addiction is also a relapsing disease. Relapse is the return to drug use after an attempt to stop.</p>\n\n<p>The path to drug addiction begins with the voluntary act of taking drugs. But over time, a person&#39;s ability to choose not to do so becomes compromised. Seeking and taking the drug becomes compulsive. This is mostly due to the effects of long-term drug exposure on brain function. Addiction affects parts of the brain involved in reward and motivation, learning and memory, and control over behavior.</p>\n\n<p>Addiction is a disease that affects both the brain and behavior.</p>\n', '<p>Drug addiction is a chronic disease characterized by compulsive, or uncontrollable, drug seeking and use despite harmful consequences and changes in the brain, which can be long lasting. These changes in the brain can lead to the harmful behaviors seen in people who use drugs. Drug addiction is also a relapsing disease. Relapse is the return to drug use after an attempt to stop.</p>\n\n<p>The path to drug addiction begins with the voluntary act of taking drugs. But over time, a person&#39;s ability to choose not to do so becomes compromised. Seeking and taking the drug becomes compulsive. This is mostly due to the effects of long-term drug exposure on brain function. Addiction affects parts of the brain involved in reward and motivation, learning and memory, and control over behavior.</p>\n\n<p>Addiction is a disease that affects both the brain and behavior.</p>\n', '', '1d3dab_d51414072251404d9591ac7202ebef57-mv21.jpg', 76, '2017-03-18', '2016-07-07 11:34:23', 'Sale', 'N', 'Y', 'N', 'March 18 , 2017', 'What is Drug Addiction ?', 'What is Drug Addiction ?', 'Drug Addiction and Treatment'),
(5, 1, 'News', 'Can Addiction Be Treated', 'can-addiction-be-treated', '<h2>Can drug addiction be treated?</h2>\n\n<p>Yes, but it&rsquo;s not simple. Because addiction is a chronic disease, people can&rsquo;t simply stop using drugs for a few days and be cured. Most patients need long-term or repeated care to stop using completely and recover their lives.</p>\n\n<p>Addiction treatment must help the person do the following:</p>\n\n<ul>\n	<li>stop using drugs</li>\n	<li>stay drug-free</li>\n	<li>be productive in the family, at work, and in society&nbsp;</li>\n</ul>\n\n<h3>Principles of Effective Treatment</h3>\n\n<p>Based on scientific research since the mid-1970s, the following key principles should form the basis of any effective treatment program:</p>\n\n<ul>\n	<li>Addiction is a complex but treatable disease that affects brain function and behavior.</li>\n	<li>No single treatment is right for everyone.</li>\n	<li>People need to have quick access to treatment.</li>\n	<li>Effective treatment addresses all of the patient&rsquo;s needs, not just his or her drug use.</li>\n	<li>Staying in treatment long enough is critical.</li>\n	<li>Counseling and other behavioral therapies are the most commonly used forms of treatment.</li>\n	<li>Medications are often an important part of treatment, especially when combined with behavioral therapies.</li>\n	<li>Treatment plans must be reviewed often and modified to fit the patient&rsquo;s changing needs.</li>\n	<li>Treatment should address other possible mental disorders.</li>\n	<li>Medically assisted detoxification is only the first stage of treatment.</li>\n	<li>Treatment doesn&#39;t need to be voluntary to be effective.</li>\n	<li>Drug use during treatment must be monitored continuously.</li>\n	<li>Treatment programs should test patients for HIV/AIDS, hepatitis B and C, tuberculosis, and other infectious diseases as well as teach them about steps they can take to reduce their risk of these illnesses</li>\n</ul>\n', '<h2>Can drug addiction be treated?</h2>\n\n<p>Yes, but it&rsquo;s not simple. Because addiction is a chronic disease, people can&rsquo;t simply stop using drugs for a few days and be cured. Most patients need long-term or repeated care to stop using completely and recover their lives.</p>\n\n<p>Addiction treatment must help the person do the following:</p>\n\n<ul>\n	<li>stop using drugs</li>\n	<li>stay drug-free</li>\n	<li>be productive in the family, at work, and in society&nbsp;</li>\n</ul>\n\n<h3>Principles of Effective Treatment</h3>\n\n<p>Based on scientific research since the mid-1970s, the following key principles should form the basis of any effective treatment program:</p>\n\n<ul>\n	<li>Addiction is a complex but treatable disease that affects brain function and behavior.</li>\n	<li>No single treatment is right for everyone.</li>\n	<li>People need to have quick access to treatment.</li>\n	<li>Effective treatment addresses all of the patient&rsquo;s needs, not just his or her drug use.</li>\n	<li>Staying in treatment long enough is critical.</li>\n	<li>Counseling and other behavioral therapies are the most commonly used forms of treatment.</li>\n	<li>Medications are often an important part of treatment, especially when combined with behavioral therapies.</li>\n	<li>Treatment plans must be reviewed often and modified to fit the patient&rsquo;s changing needs.</li>\n	<li>Treatment should address other possible mental disorders.</li>\n	<li>Medically assisted detoxification is only the first stage of treatment.</li>\n	<li>Treatment doesn&#39;t need to be voluntary to be effective.</li>\n	<li>Drug use during treatment must be monitored continuously.</li>\n	<li>Treatment programs should test patients for HIV/AIDS, hepatitis B and C, tuberculosis, and other infectious diseases as well as teach them about steps they can take to reduce their risk of these illnesses</li>\n</ul>\n', '', '1d3dab_62fffbbd94144f39875d601ec2887e82-mv2.jpg', 76, '2017-03-18', '2017-03-18 11:58:22', 'Sale', 'N', 'Y', 'N', 'Kathmandu ', 'Can Addiction Be Treated', 'Treatment And Care for Drug Addicts ', '#Treatment And Care for Drug Addicts  #Rehabilitation Drug Addiction');

-- --------------------------------------------------------

--
-- Table structure for table `newsimage`
--

CREATE TABLE IF NOT EXISTS `newsimage` (
  `image_id` int(12) NOT NULL,
  `caption` mediumtext COLLATE utf8_unicode_ci,
  `image` mediumtext COLLATE utf8_unicode_ci,
  `NewsID` int(11) DEFAULT NULL,
  `Main` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(12) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clean_url` text COLLATE utf8_unicode_ci,
  `introduction` mediumtext COLLATE utf8_unicode_ci,
  `description` mediumtext COLLATE utf8_unicode_ci,
  `visible` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `added` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `featured` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `parent_page` int(12) DEFAULT NULL,
  `displayOrder` int(12) DEFAULT NULL,
  `image` mediumtext COLLATE utf8_unicode_ci,
  `show_on_menu` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `page_title` mediumtext COLLATE utf8_unicode_ci,
  `page_keywords` mediumtext COLLATE utf8_unicode_ci,
  `page_description` mediumtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `name`, `title`, `clean_url`, `introduction`, `description`, `visible`, `added`, `updated`, `featured`, `parent_page`, `displayOrder`, `image`, `show_on_menu`, `page_title`, `page_keywords`, `page_description`) VALUES
(1, 'Tatopani bazaar turns into ghost town-1', 'Tatopani bazaar turns into ghost town-1', 'tatopani-bazaar-turns-into-ghost-town-1', '<p><span style="font-size: 13px; line-height: 20.7999992370605px;">TATOPANI, May 11: Ram Krishna Shrestha, a local shopkeeper at Liping bazaar of Tatopani VDC situated on the Nepal-China border hasn&#39;t slept for two weeks, fearing recurring aftershocks and landslides in an area already devastated by the earthquake.-1</span></p>\r\n', '<p>TATOPANI, May 11: Ram Krishna Shrestha, a local shopkeeper at Liping bazaar of Tatopani VDC situated on the Nepal-China border hasn&#39;t slept for two weeks, fearing recurring aftershocks and landslides in an area already devastated by the earthquake.Residents of Liping bazaar and adjoining areas near Nepal-China border have been evacuated to a camp at Chaukidanda, a nearby village, following frequent landslides and aftershocks. Some of them have moved to either Kathmandu or other safer zones after the blocked Araniko Highway was cleared by a joint Nepali-Chinese disaster team four days ago.</p>\r\n\r\n<p>Dozens of vehicles were parked in the Liping bazaar and Tatopani areas at the time of the earthquake. The wreckage of vehicles destroyed by massive landslides and rocks can be seen everywhere in the Liping Bazar and Tatopani areas. Almost all the houses are destroyed. Houses only partially damaged have no occupants. There is no movement at all and Liping bazaar, for the past two weeks, has looked like a ghost town.<br />\r\nRepublica team reached the area on Saturday afternoon to report on the post quake situation in Liping bazaar. The bazaar used to be buzzing with economic activity from early in the morning to late into the night prior to the quake. Dozens of containers carrying chinese goods used to leave for Kathmandu every day from this area.<br />\r\nThe entire region is suffering from landslides. Government officials deputed at Tatopani custom office have been moved to Kathmandu. The custom office, which used to collect billions of rupees in revenue everyday, is no longer operational.&quot;Since the earthquake, we have not had any electricity and the telephone lines have been down,&quot; said Shrestha, adding, &quot;We feel really unsafe here as the rainy season is rapidly approaching.&quot; According to him, locals and security personnel have vacated the area in search for safer terrain.&quot;It is likely that my goods will be stolen as only a few families remain in the area after the quake,&quot; he said, adding, &quot;Falling rocks are a constant hazard.&quot;<br />\r\nOnly a few Armed Police Force (APF) personals patrol the area during the day. At night, these teams return to Chaukidanda due to the threat of landslide.<br />\r\n&quot;The Chinese security forces has warned us of massive landslides that could take place in the next 72 days as they have inspected the surrounding hills and claim to have found cracks measuring up to 10-feet,&quot; said a sub-inspector of APF, requesting anonymity.<br />\r\nAccording to the locals, the Chinese have said the Tatopani custom check point will remain closed for three months as a precaution.<br />\r\nAt a time when daily life is slowly returning to normalcy in other affected parts of the country, living around the roadside markets along the Araniko Highway has become more dangerous due to the constant threat of landslides.</p>\r\n\r\n<p>Shiva and Bhupendra Bohara were trying to reclaim some of their goods from the rubble of their collapsed house at Dash Kilo near Tatopani bazaar. &quot;This place has become unsafe to stay with our families, thus we are shifting our goods to safer areas. Our neighbors have already left this village,&quot; said Bhupendra. Nearby, Naya Basti settlement has been adversely affected by huge rocks falling from surrounding hills, displacing many locals, said Dawa Tamang, a resident.<br />\r\nGirbi Sherpa, 52, a resident of Khokundel in Phulping Katti VDC, left for Boudha, Kathmandu with his family on Saturday as he fears landslide will hit his small roadside house during the monsoon season. &quot;It&#39;s scary to stay in this area as there is a constant threat of landslides and the monsoon season is coming,&quot; said Sherpa. Bed Bahadur Khadka of the same town has decided to shift to his house in another village for fear of possible landslides.Gam Bahadur Shrestha of Chaku Bazaar in Marming VDC, has been sleeping on the banks of the nearby river for the past two weeks as his house is vulnerable to landslides. &quot;This bazaar has been surrounded by the landslide on all sides, it seems it will be difficult to stay here during the rainy season,&quot; he stated nervously.</p>\r\n\r\n<p>Shiva Bahadur Shrestha, of the same village, said they have not slept properly for the past two weeks due to the unremitting landslide followed by recurring aftershocks.Gati, Marming, Phulping Katti and Tatopani VDCs are all linked to the Araniko Highway while Hunthang and Listi across the Bhotekoshi River have also been badly affected by the landslide.</p>\r\n', 'Y', NULL, NULL, '', 0, NULL, 'uploaded/Nepali_Patrika_Publication_Pvt_Ltd.jpg', '', 'Ram Krishna Shrestha, a local shopkeeper at Liping bazaar of Tatopani VDC situated on the Nepal-China border -1', 'Ram Krishna Shrestha, a local shopkeeper at Liping bazaar of Tatopani VDC situated on the Nepal-China border -1', 'Ram Krishna Shrestha, a local shopkeeper at Liping bazaar of Tatopani VDC situated on the Nepal-China border -1');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `PartnerID` int(12) NOT NULL,
  `UserID` int(12) DEFAULT NULL,
  `PartnerName` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PartnerSlug` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PartnerThumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PartnerImage` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Category` int(11) DEFAULT NULL,
  `Partner_link` tinytext,
  `PartnerLive` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'N',
  `displayOrder` int(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`PartnerID`, `UserID`, `PartnerName`, `PartnerSlug`, `PartnerThumb`, `PartnerImage`, `Category`, `Partner_link`, `PartnerLive`, `displayOrder`) VALUES
(2, NULL, 'INTERI', 'interi', '', 'I_nteri.png', 0, '#', 'Y', 2),
(3, NULL, 'MSDA', 'msda', '', 'm_sda.png', 0, '#', 'Y', 3),
(4, NULL, 'OFUN', 'ofun', '', 'ofun_f.png', 0, 'http://furnitouch.com.np/index.php', 'Y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(12) NOT NULL,
  `PartnerID` int(12) DEFAULT NULL,
  `UserID` int(12) DEFAULT NULL,
  `PrductName` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ProductSlug` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ModelNo` tinytext,
  `Material` tinytext,
  `Colour` varchar(256) DEFAULT NULL,
  `Size` varchar(256) DEFAULT NULL,
  `Stock` enum('Y','N') DEFAULT 'Y',
  `Latest` enum('Y','N') DEFAULT 'Y',
  `onSale` enum('Y','N') DEFAULT 'N',
  `Featured` enum('Y','N') DEFAULT 'N',
  `ProductShortDesc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ProductLongDesc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ProductThumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ProductImage` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) DEFAULT NULL,
  `Warranty` tinytext,
  `ProductLive` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'N',
  `PageTitle` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `PageDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `PageKeywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `PartnerID`, `UserID`, `PrductName`, `ProductSlug`, `ModelNo`, `Material`, `Colour`, `Size`, `Stock`, `Latest`, `onSale`, `Featured`, `ProductShortDesc`, `ProductLongDesc`, `ProductThumb`, `ProductImage`, `category`, `Warranty`, `ProductLive`, `PageTitle`, `PageDescription`, `PageKeywords`) VALUES
(4, NULL, NULL, 'Executive Chair', 'executive-chair', 'MSDA - A058', 'Mesh Black', 'Black', 'Standard', 'Y', 'Y', 'N', 'N', '', '0', '', 'MSDA-A058.jpg', 14, NULL, 'Y', '', '', ''),
(5, 3, NULL, 'Executive Chair', 'executive-chair-msda-064-2', 'MSDA - 064-2', 'Black PU', 'Black', 'Standard', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'MSD-A064-2.jpg', 14, NULL, 'Y', '', '', ''),
(6, 2, NULL, 'Executive Chair ', 'executive-chair-ktm-011', 'KTM - 011', 'Mesh Black', 'Black', 'Standard', 'Y', 'Y', '', 'N', '', '', '', 'KTM-011.jpg', 14, NULL, 'Y', '', '', ''),
(7, 2, NULL, 'Executive Chair', 'executive-chair-ktm-283t', ' KTM - 283T', 'Mesh Black', 'Black', 'Standard', 'Y', 'Y', 'Y', 'N', '', '', '', 'KTM-283T.jpg', 14, NULL, 'Y', '', '', ''),
(13, 0, NULL, 'Waiting Chair', 'waiting-chair-m-03', 'M -03', 'Powder Coating', 'Silver', 'Three Seater', 'Y', 'Y', '', 'N', '', '0', '', 'M203.jpg', 22, NULL, 'Y', '', '', ''),
(18, 3, NULL, 'Manager Chair', 'manager-chair-msda-c068', 'MSDA - C068', 'Black PU', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA-C068.jpg', 25, '0', 'Y', NULL, NULL, NULL),
(19, 3, NULL, 'Executive Chair', 'executive-chair-msda-a106', 'MSDA - A106', 'PU Black', 'Black', 'Standard', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'MSDA-A106.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(20, 3, NULL, 'Executive Chair', 'executive-chair-msda-a835', 'MSDA - A835', 'Black PU', 'Silver', 'Standard', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'MSDA-A835.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(21, 3, NULL, 'Executive Chair', 'executive-chair-msda-a846', 'MSDA - A846', 'Mesh Black', 'Black', 'Standard', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'MSDA-A846.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(23, 2, NULL, 'Executive Chair', 'executive-chair-mkt-137t', 'MKT - 137T', 'Mesh Black', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'KTM_-_137T.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(24, 2, NULL, 'Executive Chair', 'executive-chair-ktm-133t', 'KTM - 133T', 'Mesh Black', 'Black', 'Statndard', 'Y', 'Y', '', 'N', '', '', '', 'KTM-133T.jpg', 14, 'One Year', 'Y', NULL, NULL, NULL),
(25, 3, NULL, 'Director Chair', 'director-chair-msda-b019-3', 'MSDA - B019-3', 'Black PU', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA-B019-3.jpg', 23, '0', 'Y', NULL, NULL, NULL),
(26, 3, NULL, 'Director Chair', 'director-chair-msda-a321', 'MSDA - A321', 'Black PU', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'MSDA_-_A321.jpg', 23, '0', 'Y', NULL, NULL, NULL),
(29, 0, NULL, 'Waiting Chair', 'waiting-chair-a-03', 'A - 03', 'Powder Coating', 'Black / Blue / Marron', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'G403.jpg', 22, '0', 'Y', NULL, NULL, NULL),
(30, 0, NULL, 'Waiting Chair', 'waiting-chair-a-02', 'A - 02', 'Powder Coating', 'Black / Blue / Marron', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'G402.jpg', 22, '0', 'Y', NULL, NULL, NULL),
(31, 0, NULL, 'Waiting Chair', 'waiting-chair-m-03-pu', 'M - 03 PU', 'Powder Coating', 'Silver Green', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'M203P.jpg', 22, '0', 'Y', NULL, NULL, NULL),
(32, 0, NULL, 'Waiting Chair', 'waiting-chair-a-03-pu', 'A - 03 PU', 'Powder Coating', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'G403P.jpg', 22, '0', 'Y', NULL, NULL, NULL),
(33, 0, NULL, 'Waiting Chair', 'waiting-chair-a-02-pu', 'A - 02 PU', 'Powder Coating', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'G402P.jpg', 22, '0', 'Y', NULL, NULL, NULL),
(35, 3, NULL, 'Medium Office Chair', 'medium-office-chair-msda-b327', 'MSDA - B327', 'Black PU', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'MSDA_-_B327.jpg', 66, '0', 'Y', NULL, NULL, NULL),
(36, 2, NULL, 'Executive Chair', 'executive-chair-ktm-203', 'KTM - 203', 'Mesh Black', 'Black / Grey', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'KTM_-_203.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(40, 0, NULL, 'Garden Umbrella', 'garden-umbrella-d-103', 'D-103', '', '', '2.70', 'Y', 'Y', '', 'N', '', '', '', 'DH-105.jpg', 56, '', 'Y', NULL, NULL, NULL),
(41, 0, NULL, 'Garden Umbrella', 'garden-umbrella-d-5210', 'D-5210', 'Almunium', '', '2.50 x 2.50', 'Y', 'Y', '', 'N', '', '', '', 'D-52081.jpg', 56, '', 'Y', NULL, NULL, NULL),
(46, 0, NULL, 'Garden Umbrella', 'garden-umbrella-dh-108', 'DH-108', '', '', '2.10 x 2.10', 'Y', 'Y', '', 'N', '', '', '', 'DH-108.jpg', 56, '', 'Y', NULL, NULL, NULL),
(47, 0, NULL, 'Garden Umbrella', 'garden-umbrella-d-5208', 'D-5208', '', '', '2.70', 'Y', 'Y', '', 'Y', '', '', '', 'D-5208.jpg', 56, '1 Year ', 'Y', NULL, NULL, NULL),
(49, 3, NULL, 'Executive Chair', 'executive-chair-msda-a868-4', 'MSDA-A868-4', 'Nano PU', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'A868-4封面.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(50, 2, NULL, 'Director Chair', 'director-chair-ktm-203-1', 'KTM - 203-1', 'Mesh Fabric', 'Red / Black', '<div style=', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'KTM_-_203-1.jpg', 23, '0', 'Y', NULL, NULL, NULL),
(51, 2, NULL, 'Director Chair', 'director-chair-ktm-210-1', 'KTM - 210-1', 'Mesh Black', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'Untitled-2_copy.jpg', 23, '0', 'Y', NULL, NULL, NULL),
(52, 3, NULL, 'Director Chair', 'director-chair-msda-b867', 'MSDA - B867', 'Mesh Black', 'Balck', '<div style=', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'MSDA_-_B867.jpg', 23, '0', 'Y', NULL, NULL, NULL),
(53, 2, NULL, 'Staff Chair', 'staff-chair-ktm-293', 'KTM - 293', 'Mesh Black', 'Black', 'Standard', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'KTM_-_293.jpg', 68, 'One Year', 'Y', NULL, NULL, NULL),
(55, 3, NULL, 'Staff Chair', 'staff-chair-msda-c856-1', 'MSDA - C856-1', 'Black PU', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSD_-_C856-11.jpg', 68, '0', 'Y', NULL, NULL, NULL),
(59, 2, NULL, 'Staff Chair', 'staff-chair-ktm-283', 'KTM - 283', 'Mesh Black', 'Black', 'Standard', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'KTM-2831.jpg', 68, 'One Year', 'Y', NULL, NULL, NULL),
(60, 2, NULL, 'Visitor Chair', 'visitor-chair-ktm-071a', 'KTM - 071A', 'Mesh Black', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'KTM-071-A.jpg', 15, '0', 'Y', NULL, NULL, NULL),
(61, 2, NULL, 'Visitor Chair', 'visitor-chair-ktm-293a-3', 'KTM - 293A-3', 'Mesh Black', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'KTM_-_293A-3.jpg', 15, '0', 'Y', NULL, NULL, NULL),
(62, 2, NULL, 'Visitor Chair', 'visitor-chair-ktm-16a-3', 'KTM - 16A-3', 'Mesh Black', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'Visitor_Chair1.jpg', 15, '0', 'Y', NULL, NULL, NULL),
(64, 0, NULL, 'Visitor Chair', 'visitor-chair-9108', '9108', 'Plastic', 'Black', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', '3691.jpg', 15, '0', 'Y', NULL, NULL, NULL),
(66, 3, NULL, 'Staff Chair', 'staff-chair-msda-c018-6-non-tilt-', 'MSDA - C018-6 ( Non Tilt )', 'Black Fabric', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA-C018-63.jpg', 68, '0', 'Y', NULL, NULL, NULL),
(68, 3, NULL, 'Visitor Chair', 'visitor-chair-msda-d038', 'MSDA - D038', 'Black PU', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA_-_D038.jpg', 15, '0', 'Y', NULL, NULL, NULL),
(69, 3, NULL, 'Executive Chair', 'executive-chair-mdsa-a867', 'MDSA - A867', 'Mesh Black', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA_-_A867.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(70, 3, NULL, 'Executive Chair', 'executive-chair-mdsa-a868', 'MDSA - A868', 'Nano Leather', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA_-_A868.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(71, 3, NULL, 'Executive Chair', 'executive-chair-msda-a874-4', 'MSDA - A874-4', 'Mesh Black', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA_-_A874-1.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(72, 3, NULL, 'Executive Chair', 'executive-chair-msda-a879', 'MSDA - A879', 'Black PU', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA_-_A879.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(73, 3, NULL, 'Executive Chair', 'executive-chair-msda-a878', 'MSDA - A878', 'Mesh Black', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA_-_A878.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(74, 3, NULL, 'Executive Chair', 'executive-chair-msda-a865', 'MSDA - A865', 'Mesh Black', 'Black / Grey / Navy Blue / Off White', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'MSDA_-_A865.jpg', 14, '0', 'Y', NULL, NULL, NULL),
(77, 2, NULL, 'Visitor Chair', 'visitor-chair-ktm-187a-2', 'KTM - 187A-2', 'Mesh Black', 'Black', 'Standard', 'Y', 'Y', '', 'N', '', '', '', 'KTM_-_187A-2.jpg', 15, '1 Year', 'Y', NULL, NULL, NULL),
(78, 2, NULL, 'Visitor Chair', 'visitor-chair-ktm-187a-4', 'KTM - 187A-4', 'Mesh Black', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'KTM_-_187A-4.jpg', 15, '0', 'Y', NULL, NULL, NULL),
(79, 0, NULL, 'Banquet Table', 'banquet-table', '', 'Plastic', 'Grey', '<div style=', 'Y', 'Y', '', 'N', '', '0', '', 'Round_Table.jpg', 51, '0', 'Y', NULL, NULL, NULL),
(80, 4, NULL, 'Meeting Table', 'meeting-table-of-mt-4', 'OF - MT 4''', 'Pre-Laminated Melamine Board', 'Fabric / Walnut', '1200x1200x760', 'Y', 'Y', '', 'N', '', '', '', 'OF-MT_4.jpg', 28, '', 'Y', NULL, NULL, NULL),
(81, 4, NULL, 'Meeting Table', 'meeting-table-of-mt-3', 'OF-MT 3''', 'Pre-Laminated Melamine Board', 'Fabric / Walnut', '900x900x760', 'Y', 'Y', '', 'N', '', '', '', 'OF-MT_41.jpg', 28, '', 'Y', NULL, NULL, NULL),
(82, 4, NULL, 'Meeting Table', 'meeting-table-of-mt-65', 'OF-MT 6.5''', 'Pre-Laminated Melamine Board', 'Fabric / Walnut', '', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'OF-OT_6.5_.jpg', 28, '0', 'Y', NULL, NULL, NULL),
(83, 4, NULL, 'Meeting Table', 'meeting-table-of-mt-80', 'OF-MT 8.0''', 'Pre-Laminated Melamine Board', 'Fabric / Walnut', '', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'OF-MT_8.jpg', 28, '0', 'Y', NULL, NULL, NULL),
(84, 4, NULL, 'staff Table', 'staff-table-of-ot-12', 'OF - OT 1.2', 'Pre-Laminated Melamine Board', 'Fabric / Walnut', '1200x600x730', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', 'OF-OT_1.2_.jpg', 26, '0', 'Y', NULL, NULL, NULL),
(85, 4, NULL, 'Staff Table', 'staff-table-of-ot-14', 'OF - OT 1.4', 'Pre-Laminated Melamine Board', 'Fabric / Walnut', 'Standard', 'Y', 'Y', '', 'Y', '', '', '', 'OF-OT_1.4_.jpg', 26, '1 Year Warranty', 'Y', NULL, NULL, NULL),
(86, 0, NULL, 'Manager Table', 'manager-table-of-ot-16', 'OF OT - 1.6', 'Pre-Laminated Melamine Board', 'Fabric / Wallnut', '<div style=1600x800x760', 'Y', 'Y', '', 'N', '', '<p>0</p>\n', '', '95593ee_20.jpg', 25, '0', 'Y', NULL, NULL, NULL),
(87, 2, NULL, 'Staff Chair', 'staff-chair-ktm-322', 'KTM - 322', 'Mesh Black', 'Black', 'One Year', 'Y', 'Y', '', 'N', '', '0', '', 'KTM-322.jpg', 68, '0', 'Y', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE IF NOT EXISTS `productcategories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clean_url` varchar(256) DEFAULT NULL,
  `ParentCategory` int(12) DEFAULT NULL,
  `Introduction` text,
  `Description` text,
  `CategoryImage` tinytext CHARACTER SET latin1 COLLATE latin1_german2_ci,
  `image_caption` tinytext,
  `DisplayOrder` int(12) DEFAULT '0',
  `Nevigation` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT 'N',
  `CMS` enum('Y','N') DEFAULT 'N',
  `Featured` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT 'N',
  `Visible` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT 'Y',
  `Services` enum('Y','N') DEFAULT 'N',
  `page_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `page_keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `page_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Added` datetime DEFAULT NULL,
  `Updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`CategoryID`, `CategoryName`, `clean_url`, `ParentCategory`, `Introduction`, `Description`, `CategoryImage`, `image_caption`, `DisplayOrder`, `Nevigation`, `CMS`, `Featured`, `Visible`, `Services`, `page_title`, `page_keywords`, `page_description`, `Added`, `Updated`) VALUES
(1, 'Office Furniture', 'office-furniture', 64, '', '', '6-1.jpg', '', 1, 'Y', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(2, 'About  Us', 'about-us', 0, '', '', NULL, 'About  Us', 1, 'Y', 'Y', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(4, 'INTRODUCTION OF FURNI TOUCH', 'introduction-of-furni-touch', 0, '<p>Furni Touch has never compromised with the quality to the customers.</p>\n\n<p>Established in the year 2003, Furni Touch is a private company which provides the quality imported furnitures from the world''s top furniture manufactures: Taiwan, Malaysia and China. Furni Touch has always provide customers the latest furnitures in the global market having no complaints in design and comfort. We have our 4,000 sq.ft showroom at Thapathali, Kathmandu, Nepal. Beneath the cosideration of customer service, we opened our second showroom at Baluwatar, Kathmandu, Nepal having a space of 10,000 sq.f t Nevertheless, Furni Touch Pvt. Ltd. is a one among major market player in the furniture. Morerover, we are among one of the leading wholsalers in the country.</p>\n', '<p>Furni Touch Lifestyle has never compromised with the quality to the customers.</p>\n\n<p>Established in the year 2003, Furni Touch Lifestyle is a private company which provides the quality imported furnitures from the world&#39;s top furniture manufactures: Taiwan, Malaysia and China. Furni Touch Lifestyle has always provide customers the latest furnitures in the global market having no complaints in design and comfort. We have our 4,000 sq.ft showroom at Thapathali, Kathmandu, Nepal. Beneath the cosideration of customer service,&nbsp;Furni Touch Lifestyle Pvt. Ltd. is a one among major market player in the furniture. Moerover, we are among one of the leading wholsalers in the country.</p>\n', NULL, '', 0, 'N', 'Y', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(5, 'Warranty', 'warranty', 0, '<p>Furni Touch assured one year&nbsp;warranty and next one year free after sales service in every single purchase. Furni Touch has never compromised on quality products. Furni Touch trust in quality and after sales service.</p>\n', '', NULL, '', 0, 'N', 'Y', 'N', 'Y', 'Y', NULL, NULL, NULL, NULL, NULL),
(6, 'Available Spare Parts', 'available-spare-parts', 0, '<p>We can provide easy available spare parts,&nbsp;</p>\n', '', NULL, '', 0, 'N', 'Y', 'N', 'Y', 'Y', NULL, NULL, NULL, NULL, NULL),
(7, 'Free Delivery', 'free-delivery', 0, '<p>Free Dlivery and instalation inner&nbsp;Ring Road Kathmandu. We can provide free men&nbsp;power (instalation) to all over Nepal.</p>\n', '<p>Free Delivery and instalation inner Kathmandu Ring Road.</p>\n', NULL, '', 0, 'N', 'Y', 'N', 'Y', 'Y', NULL, NULL, NULL, NULL, NULL),
(8, 'Discount Sessons', 'discount-sessons', 0, '<p>Discount Senssions in the festive season. Heavy Discount on volume purchase.</p>\n', '<p>Discount Sessions in festive season. Heavy Discount on volume purchase.</p>\n', NULL, '', 0, 'N', 'Y', 'N', 'Y', 'Y', NULL, NULL, NULL, NULL, NULL),
(9, 'Variety of Furnitures', 'variety-of-furnitures', 0, '<p>Find an Executive Office Table, Cubicle Desk, Varieties of Office Chairs, Documents Cabinet, Restaurant Furniutre and Out Door Furniture&nbsp;at Furni Touch.</p>\n', '<p>You can change your house, office, garden into a beautiful place with beautiful and affordable furnitures from furnitouch. Choose from sofas or chair, tables, table lamps, antique and bold accessories for the office or living room. Look for great deals on office room tables and chairs, racks, and storage items, bar stools and quality sofas for your manager and staff room. Decorating a home office or room? Find an office desks, office furniture, office tables, rack, and cubicle desk or manager table at furnitouch. Don&#39;t forget to create an inviting and fun environment for your customers and clients - look for customer-friendly furniture such as visitor sofas, staff chairs, high chairs, boxes, and more. And rest assured, you can also find restaurant furniture, entertainment items, dressers, night stands, mirrors, beds, comforters and more for your gardens also. On furnitouch you&#39;re bound to find the furniture you&#39;ve been looking for.</p>\n', NULL, '', 0, 'N', 'Y', 'N', 'Y', 'Y', NULL, NULL, NULL, NULL, NULL),
(10, 'Order on Demand', 'order-on-demand', 0, '<p>As per your requirements you can order in any quantity. &nbsp;You can order our products via email, phone .</p>\n', '<p>We have different variety of high quality furniture for wide range of usages. As per your requirements you can order in any quantity. &nbsp;You can order our products via <a href="mailto:info@furnitouch.com.np">email </a>(info@furnitouch.com.np), phone .For your order purpose you should provide your complete address so that it will be very easy in delivery.</p>\n', NULL, '', 0, 'N', 'Y', 'N', 'Y', 'Y', NULL, NULL, NULL, NULL, NULL),
(11, 'Office Chair', 'office-chair', 1, '', '', 'Chair_Template.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(12, 'Office Table', 'office-table', 1, '', '', 'Untitled-1_copy.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(13, 'Document Cabinet', 'document-cabinet', 1, '', '', 'Document_Cabinet.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(14, 'Executive Chair', 'executive-chair', 11, '', '', 'Temp.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(15, 'Visitor Chair', 'visitor-chair', 11, '', '', 'Visitor_Chair.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(17, 'Home Furniture', 'home-furniture', 64, '', '', 'NEw.jpg', '', 2, 'Y', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL),
(18, 'Restaurant Furniture', 'restaurant-furniture', 51, '', '', 'Untitled-1.jpg', '', 3, 'Y', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(20, 'Entertainment Items', 'entertainment-items', 64, '', '', 'Modern-arc-floor-lamps.jpg', '', 4, 'Y', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(21, 'Sofa Set', 'sofa-set', 1, '', '', 'Sofa_Template.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(22, 'Waiting Chair', 'waiting-chair', 1, '', '', 'waiting-chair.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(23, 'Director Chair', 'director-chair', 11, '', '', 'MSDA-B019-31.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(24, 'Executive Office Table', 'executive-office-table', 12, '', '', 'Executitve_office_table-2.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(25, 'Manager Table', 'manager-table', 12, '', '', 'tt.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(26, 'Staff Table', 'staff-table', 12, '', '', 'staff-table.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(27, 'Cubicle Desk', 'cubicle-desk', 12, '', '', 'Cubicle-desk.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(28, 'Meeting Table', 'meeting-table', 12, '', '', 'meeting-table.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(29, 'Glass Door Cabinet', 'glass-door-cabinet', 13, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(30, 'File Cabinet', 'file-cabinet', 13, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(31, 'Table Side Cabinet', 'table-side-cabinet', 13, '', '', 'Untitled-2.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(32, 'Movable Drawer', 'movable-drawer', 13, '', '', 'Movable1.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(33, 'Living Room', 'living-room', 17, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(34, 'Sofa Set', 'sofa-set', 17, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(35, 'Bed Room Furniture', 'bed-room-furniture', 17, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(36, 'Dining Furniture', 'dining-furniture', 17, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(37, 'Coffee Table', 'coffee-table', 17, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(38, 'Sofa Set', 'sofa-set', 33, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(40, 'Living Show Case', 'living-show-case', 33, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(41, 'Bar Show Case', 'bar-show-case', 33, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(42, 'Bed ', 'bed-', 35, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(43, 'Cupboard ', 'cupboard-', 35, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(44, 'Dressing Table', 'dressing-table', 35, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(45, ' Dining Table', '-dining-table', 36, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(46, 'Dining Chair ', 'dining-chair-', 36, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(47, 'Dining Show Case', 'dining-show-case', 36, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(48, 'Table', 'table', 18, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(49, 'Chair', 'chair', 18, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(50, 'Bar Stool', 'bar-stool', 18, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(51, 'Banquet Table', 'banquet-table', 18, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(52, 'Banquet Chair', 'banquet-chair', 18, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(53, 'Garden Table', 'garden-table', 69, '', '', 'China_Outdoor_Wicker_Furniture_Includes_Chair_and_Table_Made_of_PE_Rattan_Measure_63_x_60_x_80cm20128221417196.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(54, 'Garden Chair', 'garden-chair', 69, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(55, 'Swing Chair', 'swing-chair', 69, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(56, 'Garden Umbrella', 'garden-umbrella', 69, '', '', 'Round_Shade5.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(58, 'Garden Bench', 'garden-bench', 69, '', '', NULL, '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(63, 'Contact Us', 'contact-us', 0, '', '<p><strong>Thapathali, Kathmandu, Nepal</strong><br />\n<strong>Phone: </strong>+977-1-4212638<br />\n<strong>Phone:&nbsp;</strong>+977-1-4267243<br />\n<strong>Email:</strong> <a href="mailto:info@furnitouch.com.np">info@furnitouch.com.np</a></p>\n', NULL, '', 4, 'Y', 'Y', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(64, 'Products', 'products', 0, '', '', NULL, '', 2, 'Y', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(65, 'Services', 'services', 0, '', '', NULL, '', 3, 'Y', 'Y', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(66, 'Medium Office Chair', 'medium-office-chair', 11, '', '', 'Copy.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(68, 'Staff chair', 'staff-chair', 11, '', '', 'KTM-021X.jpg', '', 0, 'N', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL),
(69, 'Out Door Furniture', 'out-door-furniture', 64, '', '', 'FT-105.png', '', 3, 'Y', 'N', 'N', 'Y', 'N', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE IF NOT EXISTS `productimage` (
  `image_id` int(12) NOT NULL,
  `caption` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ProductID` int(11) DEFAULT NULL,
  `Main` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`image_id`, `caption`, `image`, `ProductID`, `Main`) VALUES
(1, '', '3691.jpg', 13, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `sitemanager`
--

CREATE TABLE IF NOT EXISTS `sitemanager` (
  `SiteID` int(12) NOT NULL,
  `SiteName` text COLLATE utf8_unicode_ci,
  `SiteUrl` text COLLATE utf8_unicode_ci,
  `SiteEmail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SiteWoner` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SiteIntroduction` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `Id` int(10) unsigned NOT NULL,
  `title` text NOT NULL,
  `caption` text,
  `parent_information` int(12) DEFAULT NULL,
  `slider_type` varchar(256) DEFAULT NULL,
  `slider_image` text NOT NULL,
  `slider_url` text,
  `state` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `displayOrder` int(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`Id`, `title`, `caption`, `parent_information`, `slider_type`, `slider_image`, `slider_url`, `state`, `post_date`, `displayOrder`) VALUES
(6, 'Furnitouch', 'Furnitouch   ', NULL, NULL, 'New-2.jpg', '#', 1, '2021-12-15 09:44:47', NULL),
(7, 'Furnitouch', 'Furnitouch  ', NULL, NULL, '11-0001438.jpg_.jpeg', '#', 1, '2017-09-19 09:37:56', NULL),
(8, '', '0         ', NULL, NULL, '123.jpg', '0', 1, '2021-12-15 09:44:19', NULL),
(12, '', '0', NULL, NULL, 'banner.jpg', '0', 1, '2017-09-07 06:47:05', NULL),
(13, '', '0', NULL, NULL, 'banner3.jpg', '0', 1, '2017-09-07 06:48:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userimage`
--

CREATE TABLE IF NOT EXISTS `userimage` (
  `image_id` int(12) NOT NULL,
  `caption` text,
  `image` text,
  `UserID` int(11) DEFAULT NULL,
  `Main` enum('Y','N') DEFAULT 'N',
  `profile` enum('Y','N') DEFAULT 'N',
  `added` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userimage`
--

INSERT INTO `userimage` (`image_id`, `caption`, `image`, `UserID`, `Main`, `profile`, `added`) VALUES
(1, '', 'Bhujangasana.jpg', 2, 'N', '', '2015-08-31'),
(2, '', 'singer-jyoti-magar-happy-dashain.jpg', 2, 'N', '', '2015-08-31'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus.', 'map.jpg', 2, 'N', '', '2015-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL,
  `UserEmail` varchar(500) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserPassword` varchar(500) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserFirstName` varchar(50) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserLastName` varchar(50) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserGender` enum('Male','Female') DEFAULT 'Male',
  `UserDescription` text,
  `UserCity` varchar(256) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `UserState` varchar(20) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserZip` varchar(12) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserEmailVerified` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT 'N',
  `UserRegistrationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UserVerificationCode` varchar(20) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserIP` varchar(50) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserPhone` varchar(20) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `Cellphone` varchar(256) DEFAULT NULL,
  `UserFax` varchar(20) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserCountry` varchar(20) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserAddress` varchar(100) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserAddress2` varchar(50) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `UserImage` tinytext,
  `UserType` enum('Admin','User') CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL DEFAULT 'User',
  `RegistrationType` enum('Individual','Business') CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT 'Individual',
  `UserLastActive` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserEmail`, `UserPassword`, `UserFirstName`, `UserLastName`, `UserGender`, `UserDescription`, `UserCity`, `DOB`, `UserState`, `UserZip`, `UserEmailVerified`, `UserRegistrationDate`, `UserVerificationCode`, `UserIP`, `UserPhone`, `Cellphone`, `UserFax`, `UserCountry`, `UserAddress`, `UserAddress2`, `UserImage`, `UserType`, `RegistrationType`, `UserLastActive`) VALUES
(1, 'info@furnitouch.com.np', '+QJVM6BBkWS2ayfQwYWAbYtLai2Ud7MFffcjB9srwPvr9MaELRtZipPrqWuwVNgMeDk4a8WW/zn23rYeNcYLbw==', 'Furnitouch Nepal', 'KTM', 'Male', 'Ready Made and Ready to use best quality furniture in Nepal', 'KTM', NULL, 'Kathmandu        ', '00977', 'Y', '2015-05-08 01:19:25', '1234', '103.163.182.99', '014221226', NULL, '014225226', '0', 'Kathmandu', 'Pokhara', NULL, 'Admin', 'Individual', '2021-12-16 09:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `vid_id` int(12) NOT NULL,
  `video_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clean_url` text COLLATE utf8_unicode_ci,
  `vid_caption` tinytext COLLATE utf8_unicode_ci,
  `parent_information` int(12) DEFAULT NULL,
  `vid_link` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `vid_status` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `added` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vid_id`, `video_title`, `clean_url`, `vid_caption`, `parent_information`, `vid_link`, `image`, `vid_status`, `added`, `updated`) VALUES
(9, 'A video By Raul ', 'a-video-by-raul-', 'Motion Still By Raul Gallego Abellan', 70, 'https://www.youtube.com/watch?v=yklV6XvCYdw', '', 'Y', '2015-09-16 00:00:00', '2017-03-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `_information`
--

CREATE TABLE IF NOT EXISTS `_information` (
  `information_id` int(12) NOT NULL,
  `information_name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `information_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_link` tinytext COLLATE utf8_unicode_ci,
  `clean_url` tinytext COLLATE utf8_unicode_ci,
  `information_introduction` text COLLATE utf8_unicode_ci,
  `information_description` text COLLATE utf8_unicode_ci,
  `visible` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `added` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `featured` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `parentInfo` int(12) DEFAULT NULL,
  `displayOrder` int(12) DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `show_on_menu` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `as_tab` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `as_activities` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `infoType` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rightPosition` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `show_on_top` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` text COLLATE utf8_unicode_ci,
  `page_keywords` text COLLATE utf8_unicode_ci,
  `page_description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_information`
--

INSERT INTO `_information` (`information_id`, `information_name`, `information_title`, `custom_link`, `clean_url`, `information_introduction`, `information_description`, `visible`, `added`, `updated`, `featured`, `parentInfo`, `displayOrder`, `image`, `show_on_menu`, `as_tab`, `as_activities`, `infoType`, `rightPosition`, `show_on_top`, `page_title`, `page_keywords`, `page_description`) VALUES
(46, 'Home', 'Support Empower Educate', NULL, 'home', '<p><strong>Women who use drugs in Nepal have always been discriminated by our society and treated as outcasts. They are rejected by their own families regardless of their conditions. They are abused by their spouse/partners and even the authorities. Their basic human rights are violated on a regular basis. &nbsp;They have become victims of circumstances and wrong choices&nbsp;and have no one to stand up for their rights.</strong></p>\n\n<p><strong>Successive governments have done little to act on human rights issues, and virtually nothing on women&#39;s rights.</strong></p>\n\n<p><strong>Without any kind of support most women who use drugs end up living on the streets and end up dying alone neglected by society.</strong></p>\n\n<p><strong>HIV/AIDS and Sexually Transmitted Infections are highly prevalent among the women who use drugs. Lack of general awareness is a huge contributing factor for this issue to go unnoticed. Women&rsquo;s issues take a back seat in Nepal&rsquo;s context, which is one of the primary cause for this problem spreading like wildfire unnoticed.</strong></p>\n', '<p>Drug addiction is rising in alarming numbers in Nepal among women. According to the current data recorded , paints a picture that is far from reality, primarily because drug addiction is often associated with prostitution and sexually transmitted diseases&nbsp;&ndash; all subjects that are taboo&nbsp;in this very conservative society. Heroin, the usual substance of choice, has become too expensive for many, pushing users in Nepal to inject what they call &lsquo;&rsquo;Panee&rsquo;&rsquo; (water), a combination of strong prescription drugs sold in the black market, or to take what is called &lsquo;&rsquo;formula&rsquo;&rsquo;, any kind of tranquillizer in pill form.</p>\n\n<p><strong>&lsquo;&#39;I have seen lots of my friends lose their lives, I might die soon as well.&rsquo;&rsquo;</strong> There are almost no resources to help rehabilitate women&nbsp;drug users, and few local NGOs are on the frontline to help and protect those that suffer addiction. Dealers, police, and sadly even male-oriented NGO services easily abuse women users. HIV , Hepatitis and Sexually Transmitted Infections are now spreading in new and dangerous ways with little or no education, no awareness and not enough outreach programs for those that inject drugs and work as sexual workers. Many are just unaware of the dangers.&nbsp;</p>\n', 'Y', NULL, NULL, '', 0, 5, '1d3dab_d51414072251404d9591ac7202ebef57-mv2.jpg', '', 'N', '', NULL, 'N', NULL, '', '', ''),
(51, 'About Us', 'About Us', NULL, 'about-us', '<p>Grace Foundation was established on May , 2014 , by women exusers to provide care and treatment for c</p>\n', '<p>About Us</p>\n', 'Y', NULL, NULL, '', 0, 1, 'bhutan.jpg', 'Y', 'N', 'Y', NULL, 'N', NULL, '', '', ''),
(59, 'Programs', 'Programs', NULL, 'programs', '<p>Services</p>\n', '<p>Services</p>\n', 'Y', NULL, NULL, '', 0, 6, '', 'Y', 'N', '', NULL, 'N', NULL, '', '', ''),
(69, 'Contact Us', 'Contact Us', NULL, 'contact-us', '', '', 'Y', NULL, NULL, 'N', 0, 7, '', 'Y', 'N', '', NULL, 'N', NULL, '', '', ''),
(70, 'Documentary', 'Documentary', NULL, 'documentary', '', '', 'Y', NULL, NULL, 'Y', 0, 4, '', 'Y', 'Y', 'N', NULL, 'N', NULL, NULL, NULL, NULL),
(73, 'Profile', 'Profile', NULL, 'profile', '<p><strong>Grace Foundation was established on May , 2014 with the &nbsp;aim of providing quality Residential Drug Treatment and to advocate for the rights of&nbsp;Women who use Drugs . Since , being established we have provided our services to over 200 women . Our aim is to provide female friendly and Female specific programs that deal with the issues faced by women who use drugs .&nbsp;</strong></p>\n\n<p><strong>These women are left to fend for themselves , as they are dicsarded by their families and society . Keeping this in mind Grace offers a place of healing and Sanctuary . Grace Foundation Is run by women ex-users , who have come out of this hell and have devoted their time to help others like them .</strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', '<p><strong>Grace Foundation was established on May , 2014 with the &nbsp;aim of providing quality Residential Drug Treatment and to advocate for the rights of&nbsp;Women who use Drugs . Since , being established we have provided our services to over 200 women . Our aim is to provide female friendly and Female specific programs that deal with the issues faced by women who use drugs .&nbsp;</strong></p>\n\n<p><strong>These women are left to fend for themselves , as they are dicsarded by their families and society . Keeping this in mind Grace offers a place of healing and Sanctuary . Grace Foundation Is run by women ex-users , who have come out of this hell and have devoted their time to help others like them .</strong></p>\n', 'Y', NULL, NULL, 'Y', 51, NULL, '1d3dab_886960d6e39f4188ac15711260a19b5e-mv2.jpg', 'Y', 'Y', 'N', NULL, 'N', NULL, NULL, NULL, NULL),
(74, 'Mission / Vision / Goals', 'Mission / Vision / Goals', NULL, 'mission-vision-goals', '<p>KATHMANDU, June 30: The meeting of the Legislature-Parliament today passed with majority the Nepal Open University Bill-2072 BS.With the approval of the bill, it will help ensuring higher education access to all as such modality</p>\n', '<p>KATHMANDU, June 30: The meeting of the Legislature-Parliament today passed with majority the Nepal Open University Bill-2072 BS.With the approval of the bill, it will help ensuring higher education access to all as such modality was in discussion for a decade.In the meeting, lawmakers Ganesh Man Pun, Kamal Prasad Pangeni, Ram Hari Subedi, Banshidhar Mishra, Janakraj Joshi, Nisha Kumari Sa and, Prem Suwal opined for developing the information and technology at the remote areas to run such university as such requirements were essential.</p>\n\n<p>The concept of the Open University was developed aimed at producing skilled manpower basically targeting to those who are unable to regularly attend the classes.Similarly, in the meeting Education Minister Giriraj Mani Pokharel had responded the various queries raised by the lawmakers regarding the bill. RSS</p>\n\n<h2>&nbsp;</h2>\n\n<h2><strong>Vision </strong></h2>\n\n<p>The concept of the Open University was developed aimed at producing skilled manpower basically targeting to those who are unable to regularly attend the classes.Similarly, in the meeting Education Minister Giriraj Mani Pokharel had responded the various queries raised by the lawmakers regarding the bill. RSS</p>\n\n<p>&nbsp;</p>\n\n<h2><strong>Goals</strong></h2>\n\n<p>The concept of the Open University was developed aimed at producing skilled manpower basically targeting to those who are unable to regularly attend the classes.Similarly, in the meeting Education Minister Giriraj Mani Pokharel had responded the various queries raised by the lawmakers regarding the bill. RSS</p>\n', 'Y', NULL, NULL, 'Y', 51, NULL, 'parliament.jpg', 'Y', 'Y', 'N', NULL, 'N', NULL, NULL, NULL, NULL),
(75, 'Team Members', 'Team Members', NULL, 'team-members', '<p>SINDHULI, June 30: Road linking Kukurthakur VDC of Sindhuli with Mirchaiya of Siraha has been damaged by tippers carrying overloaded limestone.People of Dudhauli Municipality</p>\n', '<p>SINDHULI, June 30: Road linking Kukurthakur VDC of Sindhuli with Mirchaiya of Siraha has been damaged by tippers carrying overloaded limestone.People of Dudhauli Municipality and nearby villages are tired of damaged roads through which they need to travel as inner earthen roads are obstructed in rainy season.According to locals, hundreds of over loaded tippers carrying limestone for Maruti Cement Industry have caused damage.&ldquo;This road was blacktopped just two years ago, due to overloaded tippers it is now ruined.&rdquo; said local Shyam Dhami.</p>\n\n<p>The 80 kms long road is full of potholes which have made travelling risky. One tipper carries 4 to 5 trips per day, according to a driver.He said, &ldquo;We are paid Rs 400 per trip, so to earn more money we try to make more trips driving over speed.&rdquo;Maruti Cement Industry, which has been mining limestone since many years, hasn&rsquo;t paid attention to conserve local rivulets and roads.</p>\n', 'Y', NULL, NULL, 'Y', 51, NULL, 'vaio.jpg', 'Y', 'Y', 'N', NULL, 'N', NULL, NULL, NULL, NULL),
(76, 'News & Events', 'News & Events', NULL, 'news-events', '', '', 'Y', NULL, NULL, '', 0, 2, NULL, 'Y', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL),
(77, 'Campaigns', 'Campaigns', NULL, 'campaigns', '', '', 'Y', NULL, NULL, '', 0, 5, NULL, 'Y', 'Y', 'N', NULL, 'N', NULL, NULL, NULL, NULL),
(81, 'Gallery', 'Gallery', NULL, 'gallery', '', '', 'Y', NULL, NULL, 'Y', 0, 3, NULL, 'Y', 'Y', 'N', NULL, 'N', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `_testimonial`
--

CREATE TABLE IF NOT EXISTS `_testimonial` (
  `testimonial_id` int(12) NOT NULL,
  `testimonial_by` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `parent_information` int(12) DEFAULT NULL,
  `testimonial_address` text CHARACTER SET utf8 COLLATE utf8_bin,
  `testimonial_email` varchar(256) DEFAULT NULL,
  `testimonial` text CHARACTER SET utf8 COLLATE utf8_bin,
  `testimonial_image` tinytext,
  `visible` enum('Y','N') DEFAULT 'Y',
  `added` date DEFAULT NULL,
  `updated` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_testimonial`
--

INSERT INTO `_testimonial` (`testimonial_id`, `testimonial_by`, `parent_information`, `testimonial_address`, `testimonial_email`, `testimonial`, `testimonial_image`, `visible`, `added`, `updated`) VALUES
(2, 'Nikole Syman', NULL, 'Texas,USA', '', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>\r\n', NULL, 'Y', NULL, NULL),
(3, 'Harry Potter', NULL, 'Tokyo,Japan', '', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.&nbsp;</p>\r\n', NULL, 'Y', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`GalleryId`);

--
-- Indexes for table `galleryimage`
--
ALTER TABLE `galleryimage`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsID`);

--
-- Indexes for table `newsimage`
--
ALTER TABLE `newsimage`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`PartnerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `sitemanager`
--
ALTER TABLE `sitemanager`
  ADD UNIQUE KEY `SiteID` (`SiteID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `userimage`
--
ALTER TABLE `userimage`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid_id`);

--
-- Indexes for table `_information`
--
ALTER TABLE `_information`
  ADD PRIMARY KEY (`information_id`);

--
-- Indexes for table `_testimonial`
--
ALTER TABLE `_testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `GalleryId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `galleryimage`
--
ALTER TABLE `galleryimage`
  MODIFY `image_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `newsimage`
--
ALTER TABLE `newsimage`
  MODIFY `image_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `PartnerID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `image_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sitemanager`
--
ALTER TABLE `sitemanager`
  MODIFY `SiteID` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `userimage`
--
ALTER TABLE `userimage`
  MODIFY `image_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `vid_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `_information`
--
ALTER TABLE `_information`
  MODIFY `information_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `_testimonial`
--
ALTER TABLE `_testimonial`
  MODIFY `testimonial_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
