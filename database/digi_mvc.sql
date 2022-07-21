-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 12:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digi_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attr`
--

CREATE TABLE `tbl_attr` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `idcategory` int(255) NOT NULL,
  `parent` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_attr`
--

INSERT INTO `tbl_attr` (`id`, `title`, `idcategory`, `parent`) VALUES
(1, 'مشخصات فیزیکی', 35, 0),
(2, 'ابعاد', 35, 1),
(3, 'پردازنده', 35, 0),
(4, 'قدرت پردازنده', 35, 3),
(5, 'وزن', 35, 1),
(6, 'مشخصات کلی', 35, 0),
(7, 'تعداد سیم کارت', 35, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_basket`
--

CREATE TABLE `tbl_basket` (
  `id` int(255) NOT NULL,
  `cookie` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `idproduct` int(255) NOT NULL,
  `tedad` int(255) NOT NULL,
  `color` int(255) NOT NULL,
  `guarantee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_basket`
--

INSERT INTO `tbl_basket` (`id`, `cookie`, `idproduct`, `tedad`, `color`, `guarantee`) VALUES
(1, '1658220777', 25, 2, 3, 3),
(2, '1658220777', 25, 1, 4, 4),
(3, '1658228143', 25, 2, 3, 3),
(4, '1658388683', 25, 2, 1, 4),
(5, '1658388683', 25, 2, 3, 4),
(6, '1658388683', 25, 1, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `parent` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `parent`) VALUES
(1, 'کالای دیجیتال', 0),
(2, 'موبایل', 1),
(35, 'گوشی موبایل', 2),
(36, 'تبلت', 1),
(37, 'لپ تاپ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_code`
--

CREATE TABLE `tbl_code` (
  `id` int(255) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `used` int(1) NOT NULL,
  `darsad` int(10) NOT NULL,
  `userId` int(255) NOT NULL,
  `tarike_sabt` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `tarikh_end` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `max` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_code`
--

INSERT INTO `tbl_code` (`id`, `code`, `used`, `darsad`, `userId`, `tarike_sabt`, `tarikh_end`, `max`) VALUES
(1, 'digikala', 0, 20, 1, '2022/07/21', '2022/7/23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `hex` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `title`, `hex`) VALUES
(1, 'سفید', '#fff'),
(2, 'مشکی', '#000'),
(3, 'قرمز', '#f00'),
(4, 'آبی', '#00f');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `content` text COLLATE utf8mb4_persian_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `positive` text COLLATE utf8mb4_persian_ci NOT NULL,
  `negative` text COLLATE utf8mb4_persian_ci NOT NULL,
  `liked` int(255) NOT NULL,
  `disliked` int(255) NOT NULL,
  `idproduct` int(255) NOT NULL,
  `param` text COLLATE utf8mb4_persian_ci NOT NULL,
  `user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `title`, `content`, `date`, `positive`, `negative`, `liked`, `disliked`, `idproduct`, `param`, `user`) VALUES
(1, 'حیف که دو سیم کارته نبود', 'من اینو خریدم خیلی راضی بودم', '22 تیر 1300', 'بدنه محکم-شارژ زیاد نگه میداره', 'تک سیم کارته', 10, 2, 25, 'a:3:{i:1;i:3;i:2;i:1;i:3;i:4;}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment_param`
--

CREATE TABLE `tbl_comment_param` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `idcategory` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_comment_param`
--

INSERT INTO `tbl_comment_param` (`id`, `title`, `idcategory`) VALUES
(1, 'نوآوری', 35),
(2, 'ارزش خرید نسبت به قیمت', 35),
(3, 'کیفیت ساخت', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_description`
--

CREATE TABLE `tbl_description` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL,
  `idproduct` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_description`
--

INSERT INTO `tbl_description` (`id`, `title`, `description`, `idproduct`) VALUES
(1, 'طراحی و ساخت', 'توضیحات طراحی و ساخت', 25),
(2, 'صفحه نمایش', 'توضیحات صفحه نمایش', 25),
(3, 'باتری', 'توضیحات باتری', 25),
(4, 'شارژر', 'توضیحات شارژر', 25),
(5, 'خیلی خوبه', '<p>خیلی خوبه، من دارم و باهاش حال میکنم</p>\r\n', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorit`
--

CREATE TABLE `tbl_favorit` (
  `id` int(255) NOT NULL,
  `idproduct` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `parent` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_favorit`
--

INSERT INTO `tbl_favorit` (`id`, `idproduct`, `userId`, `parent`, `title`) VALUES
(1, 25, 1, 2, ''),
(2, 0, 1, 0, 'پوشه گوشی موبایل'),
(3, 0, 1, 0, 'پوشه لپ تاپ'),
(4, 26, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(255) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `idproduct` int(255) NOT NULL,
  `threed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `img`, `idproduct`, `threed`) VALUES
(9, '1658055557.jpg', 25, 0),
(10, '1658055561.jpg', 25, 0),
(11, '1658055565.jpg', 25, 0),
(12, '1658055570.jpg', 25, 0),
(14, '1658055612.jpg', 25, 0),
(19, '1658062362.jpg', 26, 0),
(20, '1658062408.jpg', 26, 0),
(21, '1658062420.jpeg', 26, 0),
(22, '1658062431.jpg', 26, 0),
(23, '1658062442.jpg', 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guarantee`
--

CREATE TABLE `tbl_guarantee` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_guarantee`
--

INSERT INTO `tbl_guarantee` (`id`, `title`) VALUES
(1, 'گارانتی شماره 1'),
(2, 'گارانتی شماره 2'),
(3, 'گارانتی شماره 3'),
(4, 'گارانتی شماره 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(255) NOT NULL,
  `title` text COLLATE utf8mb4_persian_ci NOT NULL,
  `matn` text COLLATE utf8mb4_persian_ci NOT NULL,
  `userId` int(255) NOT NULL,
  `status` int(1) NOT NULL,
  `date` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `title`, `matn`, `userId`, `status`, `date`) VALUES
(1, 'آماده سازی سفارش', 'سفارش شماره 5 به قسمت ارسال تحویل شد', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE `tbl_option` (
  `id` int(255) NOT NULL,
  `setting` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`id`, `setting`, `value`) VALUES
(1, 'special_time', '54000'),
(2, 'limit_slider', '5'),
(3, 'tel', '021-99999'),
(4, 'email', 'clicksite.ir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(255) NOT NULL,
  `beforePay_reservation` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `afterPay_reference` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `amount` int(255) NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `reverse` int(255) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `postalcode` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_persian_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `postType` int(1) NOT NULL,
  `basket` text COLLATE utf8mb4_persian_ci NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `postPrice` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `status` int(1) NOT NULL,
  `pay` int(1) NOT NULL,
  `payType` int(1) NOT NULL,
  `pay_day` int(10) NOT NULL,
  `pay_month` int(10) NOT NULL,
  `pay_year` int(10) NOT NULL,
  `pay_card` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `pay_bank_name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `pay_hour` int(10) NOT NULL,
  `pay_minute` int(10) NOT NULL,
  `time_sabt` int(255) NOT NULL,
  `date` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `beforePay_reservation`, `afterPay_reference`, `amount`, `family`, `reverse`, `state`, `city`, `postalcode`, `mobile`, `tel`, `postType`, `basket`, `address`, `postPrice`, `userId`, `status`, `pay`, `payType`, `pay_day`, `pay_month`, `pay_year`, `pay_card`, `pay_bank_name`, `pay_hour`, `pay_minute`, `time_sabt`, `date`, `barcode`, `code`) VALUES
(1, '1234', '5678', 15400, 'محمدی', 0, 'تهران', 'تهران', '2374239807', '092394372', '2233455', 2, 'a:1:{i:0;a:20:{s:5:\"tedad\";s:1:\"2\";s:9:\"basketRow\";s:1:\"3\";s:2:\"id\";s:2:\"25\";s:5:\"title\";s:41:\"گوشی موبایل سامسونگ T12F\";s:5:\"price\";s:5:\"10000\";s:3:\"cat\";s:2:\"35\";s:12:\"introduction\";s:90:\"<p>معرفی اجمالی محصول&nbsp;گوشی موبایل سامسونگ T12F</p>\r\n\";s:12:\"tedad_mojood\";s:1:\"3\";s:8:\"discount\";s:1:\"5\";s:7:\"special\";s:1:\"1\";s:12:\"time_special\";s:1:\"0\";s:14:\"onlyInDigikala\";s:1:\"1\";s:6:\"viewed\";s:2:\"15\";s:6:\"colors\";s:5:\"1,3,4\";s:9:\"guarantee\";s:5:\"1,3,4\";s:10:\"idcategory\";s:2:\"35\";s:6:\"weight\";s:1:\"0\";s:10:\"colorTitle\";s:8:\"قرمز\";s:14:\"guaranteeTitle\";s:27:\"گارانتی شماره 3\";s:13:\"discountTotal\";i:1000;}}', 'یسنتبسخباسمیتبمسینب', 400, 1, 1, 1, 1, 0, 0, 0, '', '', 0, 0, 1658233358, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_status`
--

CREATE TABLE `tbl_order_status` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_order_status`
--

INSERT INTO `tbl_order_status` (`id`, `title`) VALUES
(1, 'در انتظار تایید'),
(2, 'تایید شده'),
(3, 'در انتظار پرداخت'),
(4, 'پرداخت شده'),
(5, 'در حال پردازش انبار'),
(6, 'آماده ارسال'),
(7, 'ارسال شده');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_type`
--

CREATE TABLE `tbl_post_type` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_post_type`
--

INSERT INTO `tbl_post_type` (`id`, `title`, `description`) VALUES
(1, 'پست پیشتاز', 'زمان ارسال 24 الی 72 ساعت'),
(2, 'پست سفارشی', 'زمان ارسال 72 ساعت الی یک هفته');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `price` int(10) NOT NULL,
  `cat` int(255) NOT NULL,
  `introduction` text COLLATE utf8mb4_persian_ci NOT NULL,
  `tedad_mojood` int(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `special` int(11) NOT NULL,
  `time_special` int(255) NOT NULL,
  `onlyInDigikala` int(1) NOT NULL,
  `viewed` int(255) NOT NULL,
  `colors` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `guarantee` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `idcategory` int(255) NOT NULL,
  `weight` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `price`, `cat`, `introduction`, `tedad_mojood`, `discount`, `special`, `time_special`, `onlyInDigikala`, `viewed`, `colors`, `guarantee`, `idcategory`, `weight`) VALUES
(25, 'گوشی موبایل سامسونگ T12F', 10000, 35, '<p>معرفی اجمالی محصول&nbsp;گوشی موبایل سامسونگ T12F</p>\r\n', 3, 5, 1, 0, 1, 15, '1,3,4', '1,3,4', 35, 0),
(26, 'گوشی موبایل Xiaomi 11T', 11000000, 35, '<p>گوشی شیائومی مدل 2021</p>\r\n', 5, 4, 0, 0, 0, 0, '2,4', '2,4', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_attr`
--

CREATE TABLE `tbl_product_attr` (
  `id` int(255) NOT NULL,
  `idproduct` int(255) NOT NULL,
  `idattr` int(255) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_product_attr`
--

INSERT INTO `tbl_product_attr` (`id`, `idproduct`, `idattr`, `value`) VALUES
(1, 25, 2, '23mm'),
(2, 25, 4, '2MHz'),
(3, 25, 5, '200g'),
(4, 25, 7, '2'),
(5, 26, 2, '60mm'),
(6, 26, 4, '8'),
(7, 26, 5, '100g'),
(8, 26, 7, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(255) NOT NULL,
  `content` text COLLATE utf8mb4_persian_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `userid` int(255) NOT NULL,
  `parent` int(255) NOT NULL,
  `idproduct` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `content`, `date`, `userid`, `parent`, `idproduct`) VALUES
(1, 'سوال اول؟', '20/1300', 2, 0, 25),
(2, 'پاسخ سوال اول', '21/1300', 4, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider1`
--

CREATE TABLE `tbl_slider1` (
  `id` int(255) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_slider1`
--

INSERT INTO `tbl_slider1` (`id`, `img`, `link`) VALUES
(1, 'public/images/slider1-1.png', ''),
(2, 'public/images/slider1-2.png', ''),
(3, 'public/images/slider1-3.png', ''),
(4, 'public/images/slider1-4.png', ''),
(5, 'public/images/slider1-5.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `code_meli` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_persian_ci NOT NULL,
  `tavalod` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `jensiat` int(1) NOT NULL,
  `khabarname` int(1) NOT NULL,
  `cart` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `family`, `code_meli`, `tel`, `mobile`, `tavalod`, `address`, `jensiat`, `khabarname`, `cart`) VALUES
(1, 'info@digikala.ir', '1234', 'دیجی کالا', '394624912', '436478364', '0912843488', '1363/12/15', 'fkjgirsaludfhguifvauifhgiuadrhgiudfhg', 1, 1, '348723927');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_address`
--

CREATE TABLE `tbl_user_address` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `neighbour` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `postalcode` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tbl_user_address`
--

INSERT INTO `tbl_user_address` (`id`, `userid`, `family`, `mobile`, `tel`, `state`, `city`, `neighbour`, `address`, `postalcode`, `state_name`, `city_name`) VALUES
(1, 1, 'محمدی', '092394372', '2233455', 'تهران', 'ری', 'ری', 'یسنتبسخباسمیتبمسینب', '237423980734', 'تهران', 'تهران');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attr`
--
ALTER TABLE `tbl_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_basket`
--
ALTER TABLE `tbl_basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_code`
--
ALTER TABLE `tbl_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment_param`
--
ALTER TABLE `tbl_comment_param`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_description`
--
ALTER TABLE `tbl_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favorit`
--
ALTER TABLE `tbl_favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guarantee`
--
ALTER TABLE `tbl_guarantee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_option`
--
ALTER TABLE `tbl_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_status`
--
ALTER TABLE `tbl_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post_type`
--
ALTER TABLE `tbl_post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_attr`
--
ALTER TABLE `tbl_product_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider1`
--
ALTER TABLE `tbl_slider1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_address`
--
ALTER TABLE `tbl_user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attr`
--
ALTER TABLE `tbl_attr`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_basket`
--
ALTER TABLE `tbl_basket`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_code`
--
ALTER TABLE `tbl_code`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_comment_param`
--
ALTER TABLE `tbl_comment_param`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_description`
--
ALTER TABLE `tbl_description`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_favorit`
--
ALTER TABLE `tbl_favorit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_guarantee`
--
ALTER TABLE `tbl_guarantee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_option`
--
ALTER TABLE `tbl_option`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order_status`
--
ALTER TABLE `tbl_order_status`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_post_type`
--
ALTER TABLE `tbl_post_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_product_attr`
--
ALTER TABLE `tbl_product_attr`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_slider1`
--
ALTER TABLE `tbl_slider1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_address`
--
ALTER TABLE `tbl_user_address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
