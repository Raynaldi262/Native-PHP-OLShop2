-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 07:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlp_printing`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `status`) VALUES
(1, 'Manager'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username_adm` varchar(50) NOT NULL,
  `password_adm` varchar(50) NOT NULL COMMENT 'default 123',
  `admin_phone` varchar(20) NOT NULL,
  `admin_status` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `admin_img` varchar(255) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `username_adm`, `password_adm`, `admin_phone`, `admin_status`, `role_id`, `admin_img`, `create_date`) VALUES
(9, 'Elon Mass', 'admin', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '0888990', 'active', 1, 'bintang.png', '2021-04-18'),
(10, 'agus gus', 'agus', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '14045', 'active', 2, 'default.jpg', '2021-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `date_id` varchar(255) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `finishing_id` int(11) DEFAULT NULL,
  `bahan_id` int(11) DEFAULT NULL,
  `kaki_id` int(11) DEFAULT NULL,
  `cust_id` varchar(200) NOT NULL,
  `produk_name` varchar(250) NOT NULL,
  `ukuran` varchar(250) NOT NULL,
  `bahan` varchar(250) NOT NULL,
  `finishing` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `sisi` varchar(255) DEFAULT NULL,
  `hasil_meter` varchar(255) NOT NULL,
  `upload_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `checkout_id` int(11) NOT NULL,
  `date_id` varchar(255) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `finishing_id` int(11) DEFAULT NULL,
  `bahan_id` int(11) DEFAULT NULL,
  `kaki_id` int(11) DEFAULT NULL,
  `cust_id` varchar(200) NOT NULL,
  `produk_name` varchar(250) NOT NULL,
  `ukuran` varchar(250) NOT NULL,
  `bahan` varchar(250) NOT NULL,
  `finishing` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `sisi` varchar(255) DEFAULT NULL,
  `hasil_meter` varchar(255) NOT NULL,
  `upload_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` varchar(11) NOT NULL COMMENT 'cust-0001',
  `cust_name` varchar(30) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_pass` varchar(50) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_img` varchar(255) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_name`, `cust_address`, `cust_email`, `cust_pass`, `cust_phone`, `cust_img`, `create_date`) VALUES
('cust-1', 'asd', 'ads', 'jan@asd.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'asdadsssssssssssssss', 'default.jpeg', '2021-04-25'),
('cust-3', 'asd', 'asd', 'a@a.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '123', 'default.jpeg', '2021-04-26'),
('cust-4', 'Deaaaaaa', 'asd', 'asd@asd.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '21323123', 'asd1.png', '2021-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailproses`
--

CREATE TABLE `tbl_detailproses` (
  `detailproses_id` int(11) NOT NULL,
  `date_id` varchar(255) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `finishing_id` int(11) DEFAULT NULL,
  `bahan_id` int(11) DEFAULT NULL,
  `kaki_id` int(11) DEFAULT NULL,
  `cust_id` varchar(200) NOT NULL,
  `produk_name` varchar(250) NOT NULL,
  `ukuran` varchar(250) NOT NULL,
  `bahan` varchar(250) NOT NULL,
  `finishing` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `sisi` varchar(255) DEFAULT NULL,
  `hasil_meter` varchar(255) NOT NULL,
  `upload_name` varchar(255) DEFAULT NULL,
  `status_id` varchar(255) NOT NULL,
  `id_pesanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailproses`
--

INSERT INTO `tbl_detailproses` (`detailproses_id`, `date_id`, `produk_id`, `finishing_id`, `bahan_id`, `kaki_id`, `cust_id`, `produk_name`, `ukuran`, `bahan`, `finishing`, `qty`, `harga`, `create_date`, `deskripsi`, `sisi`, `hasil_meter`, `upload_name`, `status_id`, `id_pesanan`) VALUES
(107, '08213420210507', 1, 0, 37, 0, 'cust-4', 'Kartu Nama', '9 x 5,5 cm', 'Art Carton', ' - ', 1, 42000, '2021-05-07', '', '1 sisi', 'A3+', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08284620210507', 'SPK-1'),
(108, '08222420210507', 2, 0, 41, 0, 'cust-4', 'Print Dokumen(HVS)', 'A3+', 'HVS A3+', ' - ', 1, 400, '2021-05-07', '', '1 sisi Black & White', 'A3+', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08284620210507', 'SPK-1'),
(109, '08224220210507', 3, 0, 42, 0, 'cust-4', 'Poster A3+', 'A3+', 'Art Paper', ' - ', 2, 24000, '2021-05-07', '', ' - ', 'A3+', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08284620210507', 'SPK-1'),
(110, '08230120210507', 4, 30, 33, 0, 'cust-4', 'Banner Standard', '100 x 124cm', 'Flexy', 'Glossy', 2, 74400, '2021-05-07', '', '-', '12400', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08284620210507', 'SPK-1'),
(111, '08232220210507', 5, 30, 33, 39, 'cust-4', 'X Banner', '60x160 cm', 'Flexy', 'Glossy', 2, 81600, '2021-05-07', '', '-', '9600', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08284620210507', 'SPK-1'),
(112, '08233820210507', 6, 30, 33, 40, 'cust-4', 'Roll Up Banner', '85x200 cm', 'Flexy', 'Glossy', 2, 142000, '2021-05-07', '', '-', '17000', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08284620210507', 'SPK-1'),
(113, '08235620210507', 7, 0, 37, 0, 'cust-4', 'Brosur/Flyer', 'A4', 'Art Carton', ' - ', 4, 14000000, '2021-05-07', '', '2 sisi Full Color', 'A4', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08284620210507', 'SPK-1'),
(114, '08262220210507', 8, 30, 25, 0, 'cust-4', 'Sticker Promosi', '50 x 120cm', 'Sticker Vynil Biasa', 'Glossy', 2, 13200, '2021-05-07', '', '-', '6000', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08284620210507', 'SPK-1'),
(115, '12295620210508', 1, 0, 37, 0, 'cust-4', 'Kartu Nama', '9 x 5,5 cm', 'Art Carton', ' - ', 2, 84000, '2021-05-08', '', '2 sisi', 'A3+', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '12300920210508', 'SPK-2'),
(116, '01155320210508', 2, 0, 38, 0, 'cust-4', 'Print Dokumen(HVS)', 'A4', 'HVS A4', ' - ', 4, 4000, '2021-05-08', '', '1 sisi Black & White', 'A4', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '01164620210508', 'SPK-3'),
(117, '01160520210508', 3, 0, 42, 0, 'cust-4', 'Poster A3+', 'A3+', 'Art Paper', ' - ', 6, 72000, '2021-05-08', '', ' - ', 'A3+', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '01164620210508', 'SPK-3'),
(118, '01163120210508', 4, 30, 35, 0, 'cust-4', 'Banner Standard', '100 x 200cm', 'Duratrans', 'Glossy', 4, 112000, '2021-05-08', '', '-', '20000', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '01164620210508', 'SPK-3'),
(119, '01210320210508', 6, 30, 33, 40, 'cust-4', 'Roll Up Banner', '80x200 cm', 'Flexy', 'Glossy', 4, 272000, '2021-05-08', '', '-', '16000', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '01213420210508', 'SPK-4'),
(120, '01212420210508', 8, 30, 26, 0, 'cust-4', 'Sticker Promosi', '50 x 140cm', 'Sticker Ritrama', 'Glossy', 2, 28000, '2021-05-08', '', '-', '7000', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '01213420210508', 'SPK-4'),
(121, '01321620210508', 8, 29, 25, 0, 'cust-4', 'Sticker Promosi', '40 x 140cm', 'Sticker Vynil Biasa', 'Doff', 1, 17360, '2021-05-08', '', '-', '5600', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '01322320210508', 'SPK-5'),
(122, '06160320210508', 8, 29, 25, 0, 'cust-4', 'Sticker Promosi', '123 x 20cm', 'Sticker Vynil Biasa', 'Doff', 3, 22878, '2021-05-08', '', '-', '2460', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '06161020210508', 'SPK-6'),
(123, '08484220210508', 7, 0, 37, 0, 'cust-4', 'Brosur/Flyer', 'A3+', 'Art Carton', ' - ', 1, 7000000, '2021-05-08', '', '1 sisi Full Color', 'A3+', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08491420210508', 'SPK-7'),
(124, '08490520210508', 8, 29, 27, 0, 'cust-4', 'Sticker Promosi', '201 x 144cm', 'Sticker Blockout', 'Doff', 1, 92621, '2021-05-08', '', '-', '28944', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '08491420210508', 'SPK-7'),
(125, '10112820210508', 5, 29, 32, 39, 'cust-4', 'X Banner', '60x160 cm', 'Albatros', 'Doff', 1, 41760, '2021-05-08', '', '-', '9600', 'http://localhost/SkripsiDea/mlp_printing/product_detail.php?id=2', '10113520210508', 'SPK-8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `item_type` varchar(20) NOT NULL COMMENT 'ini antara pcs/meter pilihannya',
  `item_qty` decimal(12,2) NOT NULL COMMENT 'jumlah stok',
  `item_price` int(11) NOT NULL,
  `item_desc` varchar(25) NOT NULL COMMENT 'ini isinya bahan/finishing',
  `item_status` varchar(222) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `item_name`, `supplier`, `item_type`, `item_qty`, `item_price`, `item_desc`, `item_status`, `create_date`) VALUES
(25, 'Sticker Vynil Biasa', 'johan, adi', 'METER', '218.26', 1000, 'BAHAN', 'ACTIVE', '2021-04-27 19:54:08'),
(26, 'Sticker Ritrama', 'asd', 'METER', '122.00', 10000, 'BAHAN', 'ACTIVE', '2021-04-27 19:55:12'),
(27, 'Sticker Blockout', 'asddsa', 'METER', '9.11', 2000, 'BAHAN', 'ACTIVE', '2021-04-27 19:55:53'),
(28, 'Sticker Transparant', 'ads', 'METER', '132.00', 15000, 'BAHAN', 'ACTIVE', '2021-04-27 19:57:01'),
(29, 'Doff', 'asd', 'METER', '118.37', 30000, 'FINISHING', 'ACTIVE', '2021-04-27 19:58:10'),
(30, 'Glossy', 'asddsa', 'METER', '115.00', 10000, 'FINISHING', 'ACTIVE', '2021-04-27 19:59:12'),
(31, 'test', 'agusssSsss', 'METER', '12.00', 2000, 'BAHAN', 'IN-ACTIVE', '2021-04-27 21:43:19'),
(32, 'Albatros', 'asd', 'METER', '123.00', 1000, 'BAHAN', 'ACTIVE', '2021-04-28 01:26:16'),
(33, 'Flexy', 'asddsa', 'METER', '117.00', 20000, 'BAHAN', 'ACTIVE', '2021-04-28 01:28:13'),
(34, 'Canvas', 'asddsa', 'METER', '123.00', 3000, 'BAHAN', 'ACTIVE', '2021-04-28 01:29:22'),
(35, 'Duratrans', 'asd', 'METER', '115.00', 4000, 'BAHAN', 'ACTIVE', '2021-04-28 01:30:00'),
(36, 'Fabric', 'asddsa', 'METER', '123.00', 12000, 'BAHAN', 'ACTIVE', '2021-04-28 01:30:28'),
(37, 'Art Carton', 'ads', 'PCS', '17.00', 14000, 'BAHAN', 'ACTIVE', '2021-04-28 01:54:58'),
(38, 'HVS A4', 'asd1', 'PCS', '119.00', 1000, 'BAHAN', 'ACTIVE', '2021-04-29 02:13:28'),
(39, 'Kaki X Banner', 'agusssSsss', 'PCS', '12.00', 12000, 'KAKI', 'ACTIVE', '2021-05-01 19:46:56'),
(40, 'Kaki Roll Up Banner', 'budiiii', 'PCS', '8.00', 20000, 'KAKI', 'ACTIVE', '2021-05-01 19:47:43'),
(41, 'HVS A3+', 'agusssSsss', 'PCS', '120.00', 400, 'BAHAN', 'ACTIVE', '2021-05-01 19:58:48'),
(42, 'Art Paper', 'agusssSsss', 'PCS', '114.00', 12000, 'BAHAN', 'ACTIVE', '2021-05-01 23:37:52'),
(43, 'Kaki', 'asd', 'PCS', '123.00', 50000, 'KAKI', 'IN-ACTIVE', '2021-05-02 23:39:10'),
(44, '', '', '', '0.00', 0, '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_transfer` varchar(255) NOT NULL COMMENT 'buat gambar',
  `order_status` varchar(50) NOT NULL,
  `cust_id` varchar(255) NOT NULL,
  `id_pesanan` varchar(255) NOT NULL,
  `status_id` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `invoice`, `total_price`, `order_transfer`, `order_status`, `cust_id`, `id_pesanan`, `status_id`, `create_date`) VALUES
(24, 'INV-1', 84000, '12300920210508gmbr5.jpg', 'Selesai', 'cust-4', 'SPK-2', '12300920210508', '2021-05-08 12:52:16'),
(25, 'INV-2', 188000, '01164620210508gbr3.png', 'Selesai', 'cust-4', 'SPK-3', '01164620210508', '2021-05-08 13:18:39'),
(26, 'INV-3', 300000, '01213420210508gbr4.png', 'Selesai', 'cust-4', 'SPK-4', '01213420210508', '2021-05-08 13:21:53'),
(27, 'INV-4', 17360, '01322320210508ntr3.jpg', 'Selesai', 'cust-4', 'SPK-5', '01322320210508', '2021-05-08 13:32:31'),
(28, 'INV-5', 22878, '06161020210508gbr2.png', 'Selesai', 'cust-4', 'SPK-6', '06161020210508', '2021-05-08 18:16:32'),
(29, 'INV-6', 7092621, '08491420210508gbr4.png', 'Di Proses', 'cust-4', 'SPK-7', '08491420210508', '2021-05-08 20:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `produk_id` int(11) NOT NULL,
  `produk_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`produk_id`, `produk_name`) VALUES
(1, 'Kartu Nama'),
(2, 'Dokumen (HVS)'),
(3, 'Poster A3+'),
(4, 'Banner Standart'),
(5, 'X Banner'),
(6, 'Roll Up Banner'),
(7, 'Brosur/Flyer'),
(8, 'Sticker Promosi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proses`
--

CREATE TABLE `tbl_proses` (
  `proses_id` int(11) NOT NULL,
  `cust_id` varchar(250) NOT NULL,
  `status_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `create_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_proses`
--

INSERT INTO `tbl_proses` (`proses_id`, `cust_id`, `status_id`, `status`, `bukti_bayar`, `create_date`) VALUES
(23, 'cust-4', '08284620210507', 'Mengunggu Konfirmasi', '08284620210507gbr1.png', '2021-05-07 20:28:46'),
(24, 'cust-4', '12300920210508', 'Selesai', '12300920210508gmbr5.jpg', '2021-05-08 12:30:09'),
(25, 'cust-4', '01164620210508', 'Selesai', '01164620210508gbr3.png', '2021-05-08 13:16:46'),
(26, 'cust-4', '01213420210508', 'Selesai', '01213420210508gbr4.png', '2021-05-08 13:21:34'),
(27, 'cust-4', '01322320210508', 'Selesai', '01322320210508ntr3.jpg', '2021-05-08 13:32:23'),
(28, 'cust-4', '06161020210508', 'Selesai', '06161020210508gbr2.png', '2021-05-08 18:16:10'),
(29, 'cust-4', '08491420210508', 'Di Proses', '08491420210508gbr4.png', '2021-05-08 20:49:14'),
(30, 'cust-4', '10113520210508', 'DiBatalkan', '10113520210508ntr3.jpg', '2021-05-08 22:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi`
--

CREATE TABLE `tbl_relasi` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_relasi`
--

INSERT INTO `tbl_relasi` (`id`, `item_id`, `produk_id`) VALUES
(65, 25, 8),
(66, 26, 8),
(67, 27, 8),
(68, 28, 8),
(69, 29, 4),
(70, 29, 5),
(71, 29, 6),
(72, 29, 8),
(73, 30, 4),
(74, 30, 5),
(75, 30, 6),
(76, 30, 8),
(90, 31, 8),
(91, 32, 4),
(92, 32, 5),
(93, 32, 6),
(94, 33, 4),
(95, 33, 5),
(96, 33, 6),
(97, 34, 4),
(98, 35, 4),
(99, 36, 4),
(104, 37, 1),
(105, 37, 3),
(106, 37, 7),
(107, 39, 5),
(108, 40, 6),
(113, 41, 2),
(114, 38, 2),
(116, 42, 1),
(117, 42, 3),
(120, 43, 5),
(121, 43, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockinout`
--

CREATE TABLE `tbl_stockinout` (
  `stok_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `stok_qty` decimal(11,2) NOT NULL COMMENT 'yg kluar msk brp\r\n',
  `stok_desc` varchar(200) NOT NULL COMMENT 'stok in/out',
  `total_qty` decimal(11,2) NOT NULL COMMENT 'total saat ini setelah dikurang/tambah\r\n',
  `keterangan` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stockinout`
--

INSERT INTO `tbl_stockinout` (`stok_id`, `item_id`, `item_name`, `stok_qty`, `stok_desc`, `total_qty`, `keterangan`, `create_date`) VALUES
(57, 22, 'test', '0.00', 'STOCK IN', '12.00', 'Barang baru diinput', '2021-04-22 10:18:35'),
(58, 23, 'test2', '0.00', 'STOCK IN', '12.00', 'Barang baru diinput', '2021-04-22 10:21:46'),
(59, 24, 'tes lgi', '0.00', 'STOCK IN', '12.00', 'Barang baru diinput', '2021-04-22 11:08:47'),
(60, 23, 'test2', '8.00', 'STOCK IN', '20.00', 'Barang ditambahkan', '2021-04-22 11:52:51'),
(61, 23, 'test2', '8.00', 'STOCK OUT MANUAL', '12.00', 'Barang dikurangkan manual', '2021-04-22 12:26:54'),
(62, 23, 'test2', '8.00', 'STOCK IN', '20.00', 'Barang ditambahkan', '2021-04-22 21:47:57'),
(63, 24, 'tes lgi', '2.00', 'STOCK OUT MANUAL', '10.00', 'Barang dikurangkan manual', '2021-04-22 22:52:53'),
(64, 24, 'tes lgi', '8.00', 'STOCK IN', '18.00', 'Barang ditambahkan', '2021-04-22 22:53:08'),
(65, 24, 'tes lgi', '5.00', 'STOCK OUT MANUAL', '13.00', 'Barang dikurangkan manual', '2021-04-22 22:53:15'),
(66, 25, 'Sticker Vynil Biasa', '0.00', 'STOCK IN', '120.00', 'Barang baru diinput', '2021-04-27 19:54:08'),
(67, 26, 'Sticker Ritrama', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-27 19:55:12'),
(68, 27, 'Sticker Blockout', '0.00', 'STOCK IN', '12.00', 'Barang baru diinput', '2021-04-27 19:55:53'),
(69, 28, 'Sticker Transparant', '0.00', 'STOCK IN', '132.00', 'Barang baru diinput', '2021-04-27 19:57:01'),
(70, 29, 'Doff', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-27 19:58:10'),
(71, 30, 'Glossy', '0.00', 'STOCK IN', '131.00', 'Barang baru diinput', '2021-04-27 19:59:12'),
(72, 31, 'test', '0.00', 'STOCK IN', '12.00', 'Barang baru diinput', '2021-04-27 21:43:19'),
(73, 32, 'Albatros', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-28 01:26:16'),
(74, 33, 'Flexy', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-28 01:28:13'),
(75, 34, 'Canvas', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-28 01:29:22'),
(76, 35, 'Duratrans', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-28 01:30:00'),
(77, 36, 'Fabric', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-28 01:30:28'),
(78, 37, 'Art Carton', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-28 01:54:58'),
(79, 38, 'HVS', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-04-29 02:13:28'),
(80, 39, 'Kaki X Banner', '0.00', 'STOCK IN', '12.00', 'Barang baru diinput', '2021-05-01 19:46:56'),
(81, 40, 'Kaki Roll Up Banner', '0.00', 'STOCK IN', '12.00', 'Barang baru diinput', '2021-05-01 19:47:43'),
(82, 41, 'HVS A4', '0.00', 'STOCK IN', '120.00', 'Barang baru diinput', '2021-05-01 19:58:48'),
(83, 42, 'Art Paper', '0.00', 'STOCK IN', '120.00', 'Barang baru diinput', '2021-05-01 23:37:52'),
(84, 43, 'Kaki', '0.00', 'STOCK IN', '123.00', 'Barang baru diinput', '2021-05-02 23:39:10'),
(85, 25, 'Sticker Vynil Biasa', '100.00', 'STOCK OUT MANUAL', '20.00', 'Barang dikurangkan manual', '2021-05-06 19:36:36'),
(86, 25, 'Sticker Vynil Biasa', '200.00', 'STOCK IN', '220.00', 'Barang ditambahkan', '2021-05-06 19:36:43'),
(89, 37, 'Art Carton', '6.00', 'STOCK OUT', '117.00', 'Barang dikurangkan otomatis', '2021-05-08 12:52:16'),
(90, 38, 'HVS A4', '4.00', 'STOCK OUT', '119.00', 'Barang dikurangkan otomatis', '2021-05-08 13:18:39'),
(91, 42, 'Art Paper', '6.00', 'STOCK OUT', '114.00', 'Barang dikurangkan otomatis', '2021-05-08 13:18:39'),
(92, 35, 'Duratrans', '8.00', 'STOCK OUT', '115.00', 'Barang dikurangkan otomatis', '2021-05-08 13:18:39'),
(93, 30, 'Glossy', '8.00', 'STOCK OUT', '123.00', 'Barang dikurangkan otomatis', '2021-05-08 13:18:39'),
(94, 33, 'Flexy', '6.00', 'STOCK OUT', '117.00', 'Barang dikurangkan otomatis', '2021-05-08 13:21:52'),
(95, 30, 'Glossy', '8.00', 'STOCK OUT', '115.00', 'Barang dikurangkan otomatis', '2021-05-08 13:21:52'),
(96, 40, 'Kaki Roll Up Banner', '4.00', 'STOCK OUT', '8.00', 'Barang dikurangkan otomatis', '2021-05-08 13:21:52'),
(97, 26, 'Sticker Ritrama', '1.00', 'STOCK OUT', '122.00', 'Barang dikurangkan otomatis', '2021-05-08 13:21:53'),
(98, 25, 'Sticker Vynil Biasa', '1.00', 'STOCK OUT', '219.00', 'Barang dikurangkan otomatis', '2021-05-08 13:32:30'),
(99, 29, 'Doff', '1.00', 'STOCK OUT', '122.00', 'Barang dikurangkan otomatis', '2021-05-08 13:32:31'),
(100, 25, 'Sticker Vynil Biasa', '0.74', 'STOCK OUT', '218.26', 'Barang dikurangkan otomatis', '2021-05-08 18:16:32'),
(101, 29, 'Doff', '0.74', 'STOCK OUT', '121.26', 'Barang dikurangkan otomatis', '2021-05-08 18:16:32'),
(102, 37, 'Art Carton', '400.00', 'STOCK IN', '517.00', 'Barang ditambahkan', '2021-05-08 20:50:00'),
(103, 37, 'Art Carton', '500.00', 'STOCK OUT', '17.00', 'Barang dikurangkan otomatis', '2021-05-08 20:50:13'),
(104, 27, 'Sticker Blockout', '2.89', 'STOCK OUT', '9.11', 'Barang dikurangkan otomatis', '2021-05-08 20:50:13'),
(105, 29, 'Doff', '2.89', 'STOCK OUT', '118.37', 'Barang dikurangkan otomatis', '2021-05-08 20:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_detailproses`
--
ALTER TABLE `tbl_detailproses`
  ADD PRIMARY KEY (`detailproses_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`,`invoice`),
  ADD KEY `item_id` (`status_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `tbl_proses`
--
ALTER TABLE `tbl_proses`
  ADD PRIMARY KEY (`proses_id`);

--
-- Indexes for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stockinout`
--
ALTER TABLE `tbl_stockinout`
  ADD PRIMARY KEY (`stok_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `tbl_detailproses`
--
ALTER TABLE `tbl_detailproses`
  MODIFY `detailproses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_proses`
--
ALTER TABLE `tbl_proses`
  MODIFY `proses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tbl_stockinout`
--
ALTER TABLE `tbl_stockinout`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
