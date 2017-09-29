-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2017 at 09:50 AM
-- Server version: 5.6.35-1+deb.sury.org~xenial+0.1
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `hari_libur`
--

CREATE TABLE `hari_libur` (
  `id_hari_libur` int(11) NOT NULL,
  `hari_libur` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari_libur`
--

INSERT INTO `hari_libur` (`id_hari_libur`, `hari_libur`, `keterangan`) VALUES
(3, '2017-09-22', 'Tahun Baru Islam 1439H/Awal Muharam (Malaysia)'),
(4, '2017-10-18', 'Hari Deepavali (Malaysia)'),
(5, '2017-12-01', 'Maulid Nabi Muhammad SAW (Indonesia & Malaysia)'),
(6, '2017-12-25', 'Hari Raya Natal (Indonesia & Malaysia)'),
(7, '2017-12-26', 'Cuti Bersama Hari Raya Natal (Indonesia)');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `quota_perjam` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `jam_mulai`, `jam_selesai`, `quota_perjam`) VALUES
(1, '08:00:00', '17:00:00', '20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'intersys', '5e2d8a75926596efe9ef85570f1941ce');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` int(11) NOT NULL,
  `nama` text NOT NULL,
  `no_hp` text NOT NULL,
  `email` text NOT NULL,
  `no_paspor_permit` text NOT NULL,
  `path_foto` text NOT NULL,
  `jadwal_hari` date NOT NULL,
  `jadwal_jam` varchar(255) NOT NULL,
  `kode_booking` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `nama`, `no_hp`, `email`, `no_paspor_permit`, `path_foto`, `jadwal_hari`, `jadwal_jam`, `kode_booking`) VALUES
(1, 'd', 'd', 'd', 'd', 'hasil11.png', '2017-09-08', '11:00 - 12:00', 'Kbgnc7'),
(2, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min.jpg', '2017-09-07', '11:00 - 12:00', 'OEl0l9'),
(3, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min1.jpg', '2017-09-07', '11:00 - 12:00', 'P5EKiO'),
(4, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min2.jpg', '2017-09-07', '11:00 - 12:00', 'zpnTsA'),
(5, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min3.jpg', '2017-09-07', '11:00 - 12:00', '9y9hdv'),
(6, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min4.jpg', '2017-09-07', '11:00 - 12:00', 'ZVFYOv'),
(7, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min5.jpg', '2017-09-07', '11:00 - 12:00', '4FXvyO'),
(8, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min6.jpg', '2017-09-07', '11:00 - 12:00', 'iRH894'),
(9, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min7.jpg', '2017-09-07', '11:00 - 12:00', 'BQn5RE'),
(10, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min8.jpg', '2017-09-07', '11:00 - 12:00', 'jnyNNV'),
(11, 'Irooyan Alfi Aziz Tino Saputra', '083830860880', 'muhammadnear@gmail.com', '080988888', 'photo-min9.jpg', '2017-09-07', '11:00 - 12:00', 'iZab9r'),
(12, 'Irooyan Alfi Aziz Tino S', '083830838380', 'irooyan.a.aziz@gmail.com', '0881838177471', 'Foto.jpg', '2017-09-06', '11:00 - 12:00', 'i8KRve'),
(13, 'Irooyan Alfi Aziz Tino S', '08383808318820', 'muhammadnear@gmail.com', '91918237739', 'Foto.jpg', '2017-09-06', '11:00 - 12:00', '7L69o0'),
(14, 'Kholid', '0893737', 'mchoud@gmail.com', 'p105480', 'profileku-koboy.jpg', '2017-09-12', '11:00 - 12:00', 'wHBy4F'),
(15, 'Kusdiono Mks', '+628972515313', 'djiyarto@gmail.com', 'B4907583', '8_Iswa_Eva_Nur_Fauziah.jpg', '2017-09-15', '11:00 - 12:00', 'xexq4e'),
(16, 'Susana Mks', '+6285624243354', 'djiyarto@yahoo.com', 'B4907584', '7_Ismud_SusanaNurJannah.jpg', '2017-09-13', '11:00 - 12:00', 'NgaKYV'),
(17, 'IKRAM AMIN TAHA', '0124243407', 'ikelvis85@gmail.com', 'S33413', 'image.jpg', '2017-09-13', '11:00 - 12:00', 'QRRRPc'),
(18, 'IKRAM AMIN TAHA', '0124243407', 'ikelvis85@gmail.com', 'S33413', 'image1.jpg', '2017-09-13', '11:00 - 12:00', 'RDrGrV'),
(19, 'Ivan test', '01234567', 'Test@gmail.xon', 'A123456', 'FB_IMG_1502551274831.jpg', '2017-09-18', '11:00 - 12:00', 'eXj7EZ'),
(20, 'rukiah', 'kgjagsjgj', 'jhsafjfajdfj', 'gjagsjdgjsagdj', '349717061960329.jpg', '2017-09-14', '11:00 - 12:00', '6TV1K7'),
(21, 'asda', 'asd', 'asda', 'asd', '', '2017-09-14', '11:00 - 12:00', 'U06Q28'),
(22, 'Yushi Diana Afifah', '+6282127143354', 'muji_yarto@yahoo.com', 'Z123354A', 'bunga.jpg', '2017-09-15', '11:00 - 12:00', 'U5FN81'),
(23, 'ikram', 'Iwwi', 'ikelvis85@gmail.com', 'S303413', '1505361039255-1598529926.jpg', '2017-09-05', '11:00 - 12:00', 'UVSI1S'),
(24, 'masduki khadman muchamad', '085641288098', 'masduki.k@gmail.com', 'A8182286', 'AYC.jpg', '2017-09-15', '11:00 - 12:00', 'KV4QGG'),
(25, 'sdsdsd', 'sdsdsd', 'dssds', 'sdsdsd', 'AYC1.jpg', '2017-09-20', '11:00 - 12:00', 'YMGLIX'),
(26, 'fafa', 'affa', 'afaf', 'gaga', 'Indo_Typing_Test.png', '2017-09-21', '11:00 - 12:00', 'A0DYI3'),
(27, 'Darrent', '+61456414485', 'sportiflearn@gmail.com', 'x4323442', 'profileku-koboy1.jpg', '2017-09-19', '11:00 - 12:00', 'EXT625'),
(28, 'Darrent mchoud', '+61456414485', 'sportiflearn@gmail.com', 'v568756', 'lani.jpg', '2017-09-16', '11:00 - 12:00', 'QBB9ZL'),
(29, 'Darrent mchoud kholid', '+61456414485', 'sportiflearn@gmail.com', 't568756', 'profileku-koboy2.jpg', '2017-09-16', '11:00 - 12:00', 'QO7X94'),
(30, 'Kholid mohammad hasan', '+61456414485', 'mchoud@gmail.com', 'x1763539', 'profile_image.jpg', '2017-09-18', '11:00 - 12:00', 'Y9L667'),
(31, 'NOOR AMEIRUL REDZWAN BIN NOOR \'AL\' ADHZAM', '0183905609', 'miredzwan2@gmail.com', '980321605059', 'IMG-20160227-WA0001.jpeg', '2017-09-18', '11:00 - 12:00', 'MG80Q5'),
(32, 'mchoud system', '+61456414485', 'mchoud@gmail.com', 'x98762', 'profile_image1.jpg', '2017-09-17', '11:00 - 12:00', 'YSNQLQ'),
(33, 'Darrent', '+61456414485', 'mchoud@gmail.com', 't838383q', 'kholid.jpg', '2017-09-17', '11:00 - 12:00', 'LU9NPR'),
(34, 'Ali bin abu samad', '0183905609', 'miredzwan2@gmail.com', '980321605050', 'IMG-20151207-WA0006.jpg', '2017-09-17', '11:00 - 12:00', 'G5YNJL'),
(35, 'Mujiyarto Kusdiono Boniran', '+60195550340', 'djiyarto@gmail.com', 'B354MKS', 'susana4.jpg', '2017-09-17', '11:00 - 12:00', 'CXX067'),
(36, 'Mujiyarto Kusdiono Mks', '+601136293435', 'djiyarto@gmail.com', 'JM354MKS', 'inu_gede.jpg', '2017-09-18', '11:00 - 12:00', 'I64IGU'),
(37, 'ikram', '0124243407', 'Ikramataha8501@gmail.com', 'B808888', '1505693377128-1266515311.jpg', '2017-09-05', '11:00 - 12:00', '70UWRL'),
(38, 'hh', 'hh', 'hh', 'hh', 'lambang-pancasila.png', '2017-09-27', '11:00 - 12:00', '4O9H0Z'),
(39, 'Jsjw', 'Iwiejejw', 'Hshshsh', 'Sjejej', '1505716695971-750271955.jpg', '2017-09-18', '14.00 - 15.00', 'AI3EJP'),
(40, 'Mohammad kholid', '61456414485', 'mchoud@gmail.com', 'X72y88', 'IMG-20170914-WA0008.jpg', '2017-09-19', '10.00 - 14.00', 'E4F72P'),
(41, 'kartika juwita mandasari', '0182662869', 'kartika.jmr@gmail.com', 'at106666', 'bajigur.jpg', '2017-09-25', '10.00 - 11.00', 'LC3OA8'),
(42, 'RASYAs', '0124243408', 'ikelvis8501@gmail.com', 'B888888', '1505806682680-335622746.jpg', '2017-09-19', '15.00 - 16.00', 'ML42ZO'),
(43, 'Wjsiehe', '06454646464466464', 'ikbhelvis85@gmail.com', 'Hwhahwhwh', '1505816546257-120699982.jpg', '2017-09-19', '09.00 - 10.00', 'YASNWE'),
(44, 'Mohammad kholid mchoud', '6012138181', 'mchoud@gmail.com', 'X1234', 'Screenshot_2017-09-18-16-07-56.png', '2017-09-19', '20.00 - 21.00', 'YR07VS'),
(45, 'Hshshs', '6486644', 'ieggekelvis85@gmail.com', 'Gsgahahw', 'img_20170919_184050_840626502.jpg', '2017-09-19', '21.00 - 19.00', 'Z3BRIJ'),
(46, 'Pancit', '012345678', 'test@gmail.com', 'T123455', '20170916_190832.jpg', '2017-09-20', '08.00 - 09.00', 'QGI9IN'),
(47, 'royan', '6283830860880', 'muhammadnear@gmail.com', 'X3534414', 'Capture.PNG', '2017-09-19', '21.00 - 22.00', '2P1N45'),
(48, 'royan', '6283830860880', 'iroyan.a.aziz@gmail.com', 'x3543131', 'Picture_62.jpg', '2017-09-19', '21.00 - 22.00', 'U4M2MO'),
(49, 'mujiyartok', '60195550430', 'cv.intersys@gmail.com', 'JON12345', 'Picture_50.jpg', '2017-09-19', '21.00 - 22.00', '2I4XA1'),
(50, 'Kusdiyarto', '601136293435', 'djiyarto@gmail.com', 'MKS12345', 'Picture_621.jpg', '2017-09-26', '10.00 - 23.00', 'FINGEF'),
(51, 'Ivan Hermawan', '601354313', 'ivan@yahoo.com', 'PAK12345', 'Picture_67.jpg', '2017-09-19', '22.00 - 23.00', 'P0FNI2'),
(52, 'Ivan test', '0123604562', 'test@gmail.com', 'A6483838o', '20170920_154927.jpg', '2017-09-20', '17.00 - 18.00', 'LAB5LJ'),
(53, 'Ivan test', '012365258', 'twst@yahoo.com', 'A456789', '20170920_1549271.jpg', '2017-09-20', '17.00 - 18.00', 'KIPB4Q'),
(54, 'Kusdiyartono', '60195550340', 'cv.intersys@gmail.com', 'ACB12345', 'Picture_671.jpg', '2017-09-20', '17.00 - 18.00', 'G114V0'),
(55, 'Kusdiyartono', '60123456789', 'djiyarto@gmail.com', 'CDB123456', 'Picture_60.jpg', '2017-09-20', '18.00 - 19.00', '4YZK77'),
(56, 'Mujiyarto Kusdiono Boniran', '601132693435', 'djiyarto@gmail.com', 'BN123456', 'djiyarto-wisuda-s1.jpg', '2017-09-21', '18.00 - 19.00', '64VDIG'),
(57, 'Mohammad kholid', '6012324', 'mchoud@gmail.com', 'X35438', 'IMG-20170914-WA0009.jpg', '2017-09-25', '13.00 - 14.00', 'DPQTPS'),
(58, 'Suwanto Chandra', '60142207148', 'suwanto.c@gmail.com', 'A6227291', 'cropped_33x48.jpg', '2017-09-25', '09.00 - 10.00', '8E9RSU'),
(59, 'Hajijah', '60166218916', 'bettyliew7107@gmail.com', 'B2351281', 'Hajijah.jpg', '2017-09-28', '07.00 - 08.00', '9IVPFT'),
(60, 'muhammad ali yusuf', '01133348643', 'muhammadaliyusuf78@gmail.com', 'w354819', '20170923_1602081.jpg', '2017-09-25', '14.00 - 15.00', 'KXBAHZ'),
(61, 'Agus Mulyono', '601137466463', 'putraadja9@gmail.com', 'AR237065', '1506168720057-1637941139.jpg', '2017-09-27', '07.00 - 08.00', 'MGSY8J'),
(62, 'Kangbkholid', '628977483313', 'mchoud@gail.com', 'Xvshd', '15062705486461172952666.jpg', '2017-09-27', '13.00 - 14.00', 'AVWMOF'),
(63, 'Djiyarto Kusdi', '60195550340', 'mujiyartok@gmail.com', 'Nb123456', '1506271397715206713926.jpg', '2017-09-25', '00.00 - 01.00', 'FINTMZ'),
(64, 'Kusdi Mujiyarto', '60195550340', 'mujiyartok@gmail.com', 'BCA3543', 'Picture_178.jpg', '2017-09-25', '01.00 - 02.00', 'KX6BKX'),
(65, 'Kusdiyartono', '60185550340', 'djiyarto@gmail.com', 'BX123456', '1_ID_KL_IMI_MK_kholid_.jpg', '2017-09-25', '09.00 - 10.00', 'B6PY07'),
(66, 'Kusdi Mujiyarto', '601136293435', 'mujiyartok@gmail.com', 'BA123456', '1_ID_KL_IMI_MKintersys_copy.jpg', '2017-09-25', '10.00 - 11.00', 'UQGP66'),
(67, 'ivan l s', '01234567', 'ivan.saragix@gmail.com', 'pd543528', 'iker1.jpg', '2017-09-26', '10.00 - 11.00', 'KWA33B'),
(68, 'Halim Haidar', '601136293435', 'djiyarto@gmail.com', 'MKS123456', 'pa2didlam_mobil.jpg', '2017-09-25', '14.00 - 15.00', 'NEIG4H'),
(69, 'Kusdiono Mujiyarto', '60132464041', 'mujiyartok@gmail.com', 'BA354313', 'pa2panitialdii93.jpg', '2017-09-25', '15.00 - 16.00', 'TFE8PK'),
(70, 'Suciningsih riwayatin', '60189883550', 'suci.kani@gmail.com', 'A4509314', '15063259898321267129171.jpg', '2017-09-27', '10.00 - 11.00', 'KHLSCL'),
(71, 'Muslina muhammad', '0172361134', 'abuualiff@gmail.com', 'A4508125', 'IMG-20170708-WA0000.jpg', '2017-09-27', '09.00 - 10.00', 'OJX35I'),
(72, 'Watinih bt Draup Kiwul', '60178809911', 'thejanekhoo@gmail.com', 'As553217', 'image2.jpg', '2017-09-26', '09.00 - 10.00', 'VA7NF5'),
(73, 'Kusdiono Mujiyarto Boniran', '601136293435', 'cv.intersys@gmail.com', 'Z4907583', 'WhatsApp_Image_2017-09-25_at_21_08_14.jpeg', '2017-09-25', '21.00 - 22.00', 'EX2TH7'),
(74, 'Mohammad Kholid', '61456414485', 'sportiflearn@gmail.com', 'X313354', 'profileku-koboy3.jpg', '2017-09-27', '11.00 - 12.00', '7DMAAC'),
(75, 'Puha', '5486', 'hdjs@hsjjs.com', 'Hsjsjhs', 'IMG-20170927-WA0003.jpg', '2017-09-29', '08.00 - 09.00', '8D1YX2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hari_libur`
--
ALTER TABLE `hari_libur`
  ADD PRIMARY KEY (`id_hari_libur`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hari_libur`
--
ALTER TABLE `hari_libur`
  MODIFY `id_hari_libur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
