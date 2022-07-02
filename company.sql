-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2022 at 06:12 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1360e977e8599c8e2c7fc86103adad56');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kutipan` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id`, `judul`, `kutipan`, `isi`, `created_at`) VALUES
(3, 'This is First Title', 'This is First Quotes', '<p>This content is update for created exist&nbsp;</p><p>hfgf tty hjgh \r\nfghdf jhkjh mbnbnm tryrty</p>', '2022-01-27 00:20:50'),
(4, 'The First Updated', 'The Second Quotes yang updated', 'Firts updated bnmn hdfh jhjjk\r\nrtyrt yuiyu hjk bnnmbn', '2022-01-26 23:47:05'),
(5, 'The Second Updated', 'The First Updated', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin: 10px 0px 15px; color: rgb(0, 0, 0); padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin: 10px 0px 15px; color: rgb(0, 0, 0); padding: 0px; text-align: justify;\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p><p><img src=\"../img/5fd0b37cd7dbbb00f97ba6ce92bf5add.jpg\" style=\"width: 626px;\"><br></p>', '2022-02-18 02:32:51'),
(6, 'Sayangi Tubuhmu', 'Jangan Malas Olahraga', '<p>Lorem ipsum dolor sit,a met jfgjg jkk jklkjlk gjhhjgh.&nbsp;</p><p><span style=\"background-color: var(--bs-body-bg); color: var(--bs-body-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">nmbnm, hjkhkhj.&nbsp;</span><span style=\"background-color: var(--bs-body-bg); color: var(--bs-body-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">jghjdgjgjg ghdfghfhfdff</span></p>', '2022-01-27 02:31:50'),
(10, 'Sixth Title Updated', 'Sixth Quotes has been Updated', '<p>Updated Komon jkjkl jkhjkhj kjklj kljkljkjl</p><p>jkhjh ytt nmm kjll hjkhjkhhkjk ioopipoio.</p>', '2022-01-27 02:31:32'),
(11, 'The Seventh Title', 'The Seventh Quotes', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin: 10px 0px 15px; color: rgb(0, 0, 0); padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin: 10px 0px 15px; color: rgb(0, 0, 0); padding: 0px; text-align: justify;\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p><p><img src=\"../img/6cdd60ea0045eb7a6ec44c54d29ed402.jpg\" style=\"width: 626px;\"></p>', '2022-02-18 02:33:08'),
(12, 'The Old Title', 'The Old Quotes', '<p>l;kl yttry kljkljkl nbnm hgf iop yutyut</p><p>yuty kjl poipo kljlkj ytytr hjkkhkj dfssd</p>', '2022-01-27 02:31:04'),
(13, 'The First Try', 'The First Try Create Quotes', '<p>This is a first content a try create</p>', '2022-01-27 05:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `judul`, `isi`, `created_at`) VALUES
(1, 'About', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<span style=\"background-color: var(--bs-body-bg); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);\">&nbsp;Etiam efficitur erat at tellus tempor, in tincidunt dolor pulvinar. Mauris laoreet ipsum nisi, ac lacinia mauris vestibulum ac. Sed tempor rhoncus accumsan.</span></p>', '2022-02-17 08:05:50'),
(2, 'Lets Coding', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Lets Coding adalah sebuah tempat untuk belajar pemrogramman website atau mobile secara online maupun offline.</p>', '2022-02-17 08:05:50'),
(3, 'Address', '<p>Jl. Maulana Kusuma No. 97 Kec. Cikokol</p><p><span style=\"background-color: var(--bs-body-bg); color: var(--bs-body-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Kota Bandung, Kode Pos 19790</span></p>', '2022-02-17 08:05:50'),
(4, 'Social', '<p><b>Instagram &amp; Facebook</b>: @lestcoding</p>', '2022-02-17 08:05:50'),
(6, 'The Second Title', '<p>nm,mn,mn,mn,m</p>', '2022-02-17 08:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `nama_lengkap`, `password`, `status`, `tanggal`) VALUES
(5, 'putrimel873@gmail.com', 'Putri Melati', '05ab1c471b699a1aeb1d767ef909dc97', '1', '2022-02-23 03:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `nama`, `foto`, `isi`, `created_at`) VALUES
(1, 'Scots Media Indonesia', 'turors_1644986257_brandstory.jpg', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0);\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p>', '2022-02-16 04:37:37'),
(2, 'Brightown Indonesia', 'turors_1644986416_thns.png', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0);\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p>', '2022-02-16 04:40:16'),
(5, 'Heircomes Indonesia', 'turors_1644986602_Logo_top_brand.jpg', '<p style=\"margin: 10px 0px 15px; padding: 0px; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p style=\"margin: 10px 0px 15px; padding: 0px; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p>', '2022-02-15 21:43:22'),
(6, 'Sircumstances Nusantara', 'turors_1644986998_bforpople.jpg', '<div class=\"lokasi_deskripsi\" style=\"margin: 20px 0px 0px; padding: 0px; float: right; width: 825px; color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif; font-size: medium;\"><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin: 10px 0px 15px; padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin: 10px 0px 15px; padding: 0px; text-align: justify;\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p></div>', '2022-02-16 04:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `nama`, `foto`, `isi`, `created_at`) VALUES
(4, 'Frank Lampard', 'turors_1644983172_tutor3.jpg', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p>', '2022-02-16 03:57:45'),
(5, 'Marc Spelmann', 'turors_1644982745_tutor1.jpg', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p>', '2022-02-16 03:58:01'),
(6, 'Harry Kane', 'turors_1644982820_tutor2.jpg', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tristique vitae lectus efficitur mattis. Proin maximus tincidunt diam dignissim ornare. Donec vel malesuada nisl. Morbi ornare lacus quam, at suscipit libero egestas ac. Quisque sed est euismod, gravida turpis nec, tincidunt elit. Cras cursus est sed lorem cursus, non tincidunt sapien pulvinar. Vestibulum fermentum mollis enim, ac sodales metus convallis elementum. Sed ac ornare felis. Curabitur finibus sem ligula, non rhoncus dui semper vitae.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Ut cursus, arcu et volutpat tristique, diam tortor laoreet eros, a lacinia sem lectus non elit. Curabitur non sem sodales, lacinia nisi hendrerit, blandit justo. Morbi euismod nunc mi, sit amet euismod eros semper eget. Aliquam ultrices libero eget sem pharetra molestie. Aliquam mi turpis, auctor vel malesuada id, convallis in ligula. Integer vitae ipsum ut metus rutrum congue. Suspendisse suscipit consequat nisl at dictum. Donec nisi magna, vehicula vel quam at, fringilla dictum felis. Etiam neque ex, scelerisque a ullamcorper id, iaculis ut quam. Cras efficitur eros sed justo molestie bibendum et et massa. Cras ac lectus facilisis, feugiat dui non, accumsan odio.</p>', '2022-02-16 03:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
