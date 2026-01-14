-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2025 at 08:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygov`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `parol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `parol`) VALUES
(1, 'mygov', '12345my');

-- --------------------------------------------------------

--
-- Table structure for table `hujjat`
--

CREATE TABLE `hujjat` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `pinfl` varchar(14) NOT NULL,
  `summa` varchar(8) NOT NULL,
  `oy` int(2) NOT NULL,
  `q_kod` varchar(4) NOT NULL,
  `numbers` varchar(40) NOT NULL,
  `stir` varchar(14) NOT NULL,
  `ariza_n` varchar(255) NOT NULL,
  `dates` datetime NOT NULL,
  `ish_joyi` varchar(255) NOT NULL,
  `ish_b` varchar(10) NOT NULL,
  `ish_t` varchar(10) NOT NULL,
  `q_kod1` varchar(5) NOT NULL,
  `numbers1` varchar(40) NOT NULL,
  `ariza_n1` varchar(20) NOT NULL,
  `doljin` varchar(255) NOT NULL,
  `otdel` varchar(100) NOT NULL,
  `ish_joyi1` varchar(255) NOT NULL,
  `ish_b1` varchar(10) NOT NULL,
  `ish_t1` varchar(10) NOT NULL,
  `summa1` varchar(8) NOT NULL,
  `doljin1` varchar(255) NOT NULL,
  `otdel1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hujjat`
--

INSERT INTO `hujjat` (`id`, `fio`, `pinfl`, `summa`, `oy`, `q_kod`, `numbers`, `stir`, `ariza_n`, `dates`, `ish_joyi`, `ish_b`, `ish_t`, `q_kod1`, `numbers1`, `ariza_n1`, `doljin`, `otdel`, `ish_joyi1`, `ish_b1`, `ish_t1`, `summa1`, `doljin1`, `otdel1`) VALUES
(53, 'QURANBOYEVA  HAMIDA MUHAMMAD QIZI', '12345678912345', '15000000', 6, '0433', '270f-dbdb-e6c4-3cb0-0747-0c04-13f3', '5313134610', '3487432860', '2025-04-03 23:40:30', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'b18d-5618-5359-a40d-d9d0-48f3-f415', '6974866841', 'Бухгалтер', 'Бўлинма мавжуд эмас', '', '', '', '', '', ''),
(54, 'QURANBOYEVA  HAMIDA MUHAMMAD QIZI', '12345678912345', '15000000', 6, '0433', '3a58-1d42-77d4-87f9-4a34-3647-77e1', '5313134610', '3487433082', '2025-04-03 23:42:21', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', '7921-eaf6-6dda-e1e0-28b0-788a-9e2b', '6974867285', 'Бухгалтер', 'Бўлинма мавжуд эмас', '', '', '', '', '', ''),
(55, 'QURANBOY  HAMIDA MUHAMMAD  O\'G\'lLI', '12345678912345', '25000000', 6, '0433', 'c229-79b7-9ec6-47dd-7771-b1b4-7d2b', '5313134610', '3487652892', '2025-04-05 06:14:06', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', '1058-9cfc-97e3-d1d6-1542-dcc9-6c8d', '6975306905', 'Бухгалтер', 'Бўлинма мавжуд эмас', '', '', '', '', '', ''),
(56, 'QURANBOY  HAMIDA MUHAMMAD  O\'G\'lLI', '12345678912345', '25000000', 6, '0433', '917a-cb03-381c-5964-7314-9ee9-cbe9', '5313134610', '3488791082', '2025-04-11 20:19:01', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'f170-d730-a3e4-06cb-1b38-6d7c-a57f', '6977583285', 'Бухгалтер', 'Бўлинма мавжуд эмас', '', '', '', '', '', ''),
(57, 'QURANBOY  HAMIDA MUHAMMAD  O\'G\'lLI', '12345678912345', '5000000', 6, '0433', '97a9-4714-ff9e-8b47-f3de-ae5b-0f58', '5313134610', '3488791782', '2025-04-11 20:24:51', '\"gdrtrgfdt ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'a9e9-b76e-6727-d30c-cb76-2658-f4c5', '6977584685', 'саьрсарсба', 'Бўлинма мавжуд эмас', '', '', '', '', '', ''),
(58, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '15000000', 6, '0433', 'b1c0-a6e0-ece7-44bb-a634-5272-5003', '5313134610', '3493185180', '2025-05-07 06:36:30', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', '4013-9d92-7fec-a824-7071-50dc-a2d9', '6986371481', 'Бухгалтер', 'Бўлинма мавжуд эмас', '', '07.02.2023', 'До сих пор', '10000000', 'Бўлим бошлиғи', ''),
(59, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '15000000', 6, '0433', '7be0-5f15-1860-0e18-c4fc-bba9-f74b', '5313134610', '3493185426', '2025-05-07 06:38:33', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', '6eb7-1668-1223-b5e1-ad4c-c0af-b3f3', '6986371973', 'Бухгалтер', 'Бўлинма мавжуд эмас', 'Qishloq xo\'jaligi ', '07.02.2023', 'До сих пор', '9000000', 'Бўлим бошлиғи', ''),
(60, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '15000000', 6, '0433', '4fc4-3bcc-b90b-298a-e113-b968-ccc7', '5313134610', '3493186148', '2025-05-07 06:44:34', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'd303-38c9-f14d-15a1-1a16-2d24-f39b', '6986373417', 'Бухгалтер', 'Бўлинма мавжуд эмас', 'Qishloq xo\'jaligi ', '07.02.2023', 'До сих пор', '9000000', 'Бўлим бошлиғи', ''),
(61, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 6, '0433', 'b5f3-5f15-a709-1f29-33e7-d3fc-73be', '5313134610', '3493186296', '2025-05-07 06:45:48', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', '6c76-bbe9-8197-8837-c342-006d-1cce', '6986373713', 'Бухгалтер', 'Бўлинма мавжуд эмас', 'Qishloq xo\'jaligi ', '07.02.2023', 'До сих пор', '9000000', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас'),
(62, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 6, '0433', 'decc-2e1a-22f4-84ca-3e1a-43eb-4f79', '5313134610', '3493186828', '2025-05-07 06:50:14', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'c6a0-eead-7f32-70c7-ffd2-28d8-ab26', '6986374777', 'Бухгалтер', 'Бўлинма мавжуд эмас', 'Qishloq xo\'jaligi ', '07.02.2023', 'До сих пор', '9000000', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас'),
(63, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 6, '0433', '2290-cc59-1c5c-4aaa-e528-fbf4-ee89', '5313134610', '3493188196', '2025-05-07 07:01:38', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', '0181-e5a2-e96f-2d0b-a642-82b6-3e9b', '6986377513', 'Бухгалтер', 'Бўлинма мавжуд эмас', 'Qishloq xo\'jaligi ', '07.02.2023', 'До сих пор', '9000000', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас'),
(64, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 8, '0433', 'dd89-6637-06fe-1ba7-a173-fdd8-ad65', '5313134610', '3493189014', '2025-05-07 07:08:27', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', '2074-0ad5-015d-b461-4138-9b6d-0ca8', '6986379149', 'Бухгалтер', 'Бўлинма мавжуд эмас', 'Qishloq xo\'jaligi ', '07.02.2023', 'До сих пор', '9000000', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас'),
(65, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 6, '0433', '9ca1-51e3-0586-28ff-ab62-1a2b-4c79', '5313134610', '3493190292', '2025-05-07 07:19:06', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'f752-9644-0696-adc8-5307-c91d-7511', '6986381705', 'Бухгалтер', 'Бўлинма мавжуд эмас', 'Qishloq xo\'jaligi ', '07.02.2023', 'До сих пор', '9000000', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас'),
(66, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 6, '0433', '4dfe-1998-1fbb-1035-bcc5-f615-ef8b', '5313134610', '3493190360', '2025-05-07 07:19:40', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'afa5-6a7a-d4b8-bcd7-9e34-f1a1-cf59', '6986381841', 'Бухгалтер', 'Бўлинма мавжуд эмас', '', '', '', '', '', ''),
(67, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 6, '0433', '9460-a3c4-c4ed-dcb1-5196-5dd8-b8ee', '5313134610', '3493190636', '2025-05-07 07:21:58', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'e050-10b9-403b-2ba7-45ea-6c62-ce64', '6986382393', 'Бухгалтер', 'Бўлинма мавжуд эмас', '', '', '', '', '', ''),
(68, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 6, '0433', '5bb0-9d64-fa01-6784-9712-6d56-e69c', '5313134610', '3493191696', '2025-05-07 07:30:48', '\"ICT ACADEMY\" NODAVLAT TA\'LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', 'd31c-f0d1-ef6a-f694-2e2e-f1ae-4fca', '6986384513', 'Бухгалтер', 'Бўлинма мавжуд эмас', '', '', '', '', '', ''),
(69, 'QURANBOYEV SUXROBJON MUHAMMADJON O‘G‘LI', '12345678912345', '14000000', 12, '0433', '0a6d-cc15-4156-80ef-5105-f342-c17f', '5313134610', '3493191778', '2025-05-07 07:31:29', '\"ICT ACADEMY\" NODAVLAT TA`LIM MUASSASASI', '07.02.2022', 'До сих пор', '5027', '9f48-90a1-4e68-f9f1-904a-968c-b4c3', '6986384677', 'Бухгалтер', 'Бўлинма мавжуд эмас', 'Qishloq xo\'jaligi ', '17.02.2023', 'До сих пор', '5000000', 'Бухгалтер', 'Бўлинма мавжуд эмас'),
(70, 'AXMEDOV AVAZ AXMATOVICH', '31804830930010', '11500000', 12, '0334', '9714-6474-51d3-ffa7-9fda-0fb3-6474', '306040397 ', '3494415568', '2025-05-14 09:29:44', '\"OMADLI JENTLMENLAR GROUP\" mas\'uliyati cheklangan jamiyati', '25.01.2019', 'До сих пор', '6290', '27e7-7d29-e1ed-2df5-10b3-6855-2c0c', '6988832257', 'Direktor o‘rinbosari ', 'Boʼlinma mavjud yemas', '', '', '', '', '', ''),
(71, 'DANIYAROV OYBEK AXTAMOVICH', '31604871000057', '9500000', 12, '0334', '452c-7dac-3c00-a3cb-3bde-c6bd-fa7a', '602157799', '3494456384', '2025-05-14 15:09:52', '\"OMADLI JENTLMENLAR GROUP\" mas\'uliyati cheklangan jamiyati', '01.02.2019', 'До сих пор', '9665', 'bac9-acae-ec8f-ad75-b42b-260b-edfd', '6988913889', 'Bosh menejer', 'Boʼlinma mavjud yemas', '', '', '', '', '', ''),
(72, ' ISAMOV MUXAMMADJON ILXOMOVICH', '31804830930010', '2000000', 12, '8484', 'b28f-e196-37b1-ef86-9da7-49db-c204', '12345642124', '3511842918', '2025-08-23 05:57:39', 'Tatu', '08.10.2024', 'До сих пор', '3807', '3d16-4f01-1930-c081-f79a-117b-aea9', '7023686957', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас', 'retre rewrr', '08.04.2025', '08.04.2025', '2500000', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас'),
(73, ' ISAMOV MUXAMMADJON ILXOMOVICH', '12345678912345', '2000000', 12, '0433', 'f76d-df30-116a-743e-2f48-4543-5d84', '12345642124', '3511870036', '2025-08-23 09:43:38', 'Tatu', '08.04.2025', '08.08.2025', '3807', '5089-524a-6fb7-72ae-a34d-41ba-2bc5', '7023741193', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас', 'retre rewrr', '08.03.2022', '08.10.2024', '2500000', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас'),
(74, ' ISAMOV MUXAMMADJON ILXOMOVICH', '12345678912345', '2000000', 12, '0433', '7c52-ef9d-b8dc-4626-7a53-41ab-15ce', '12345642124', '3511871962', '2025-08-23 09:59:41', 'Tatu', '08.04.2024', '08.03.2025', '3807', '4a79-a014-f519-c596-5b8c-ed51-28a3', '7023745045', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас', 'retre rewrr', '18.01.2025', 'До сих пор', '2500000', 'Бўлим бошлиғи', 'Бўлинма мавжуд эмас');

-- --------------------------------------------------------

--
-- Table structure for table `hujjatt`
--

CREATE TABLE `hujjatt` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `pinfl` varchar(14) NOT NULL,
  `t_sana` varchar(14) NOT NULL,
  `talim_turi` varchar(30) NOT NULL,
  `talim_shakli` varchar(30) NOT NULL,
  `qabul_turi` varchar(30) NOT NULL,
  `kirgan_yili` varchar(10) NOT NULL,
  `muassasa` varchar(255) NOT NULL,
  `fakultet` varchar(255) NOT NULL,
  `yonalish` varchar(255) NOT NULL,
  `kurs` varchar(20) NOT NULL,
  `q_kod` varchar(4) NOT NULL,
  `numbers` varchar(40) NOT NULL,
  `ariza_n` varchar(255) NOT NULL,
  `dates` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hujjatt`
--

INSERT INTO `hujjatt` (`id`, `fio`, `pinfl`, `t_sana`, `talim_turi`, `talim_shakli`, `qabul_turi`, `kirgan_yili`, `muassasa`, `fakultet`, `yonalish`, `kurs`, `q_kod`, `numbers`, `ariza_n`, `dates`) VALUES
(1, ' ISAMOV MUXAMMADJON ILXOMOVICH', '50702055260026', '07.02.2005', 'Bakalavr', 'Kunduzgi', 'Davlat granti', '2023', 'Buxoro davlat universiteti', 'Jismoniy tarbiya va sport', 'Sport faoliyati (Erkin kurash)', '2-kurs', '0661', 'c970-47a6-264c-e3d2-34e3-204b-c1af', '3505474328', '2025-07-07 00:00:00'),
(2, 'MUXAMMADJON ILXOMOVICH', '50702055260026', '07.02.2005', 'Bakalavr', 'Kunduzgi', 'Davlat granti', '2023', 'Buxoro davlat universiteti', 'Jismoniy tarbiya va sport', 'Sport faoliyati (Erkin kurash)', '3-kurs', '0661', '6f17-2a85-d3c7-9567-51e1-df65-485a', '3505485436', '2025-07-17 10:58:38'),
(3, ' ISAMOV MUXAMMADJON ILXOMOVICH', '50702055260026', '07.02.2005', 'Bakalavr', 'Kunduzgi', 'Davlat granti', '2023', 'Buxoro davlat universiteti', 'Jismoniy tarbiya va sport', 'Sport faoliyati (Erkin kurash)', '2-kurs', '0661', 'f421-020c-8161-16cf-45a3-96a2-596c', '3505487828', '2025-07-17 11:18:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hujjat`
--
ALTER TABLE `hujjat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hujjatt`
--
ALTER TABLE `hujjatt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hujjat`
--
ALTER TABLE `hujjat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `hujjatt`
--
ALTER TABLE `hujjatt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
