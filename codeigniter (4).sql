-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2017 lúc 10:30 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `codeigniter`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `quantity` int(9) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 1, 12, 1, '2017-05-18 04:43:41', '2017-05-18 04:43:41'),
(8, 1, 9, 3, '2017-05-18 04:43:49', '2017-05-18 04:43:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(9) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `parent` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `parent`) VALUES
(1, 'Tivi', 'Các sản phẩm tivi', NULL),
(2, 'Điện thoại', 'Các sản phẩm điện thoại', NULL),
(3, 'Laptop', 'Máy tính xách tay', NULL),
(4, 'Toshiba', NULL, 1),
(5, 'Samsung', NULL, 1),
(6, 'Panasonic', NULL, 1),
(7, 'LG', NULL, 1),
(8, 'HTC', NULL, 2),
(9, 'BlackBerry', NULL, 2),
(10, 'Asus', NULL, 2),
(11, 'Apple', NULL, 2),
(12, 'HP', NULL, 3),
(13, 'Dell', NULL, 3),
(14, 'Asus', NULL, 3),
(15, 'Acer', NULL, 3),
(16, 'MSI', NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `content` text NOT NULL,
  `rate` int(1) DEFAULT '0',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `name`, `title`, `content`, `rate`, `time`) VALUES
(23, 27, 'Nguyễn Văn Quang', NULL, 'máy ngon, giá rê, dịch vụ chất lượng, đáng tin cậy', 5, '2017-05-22 15:07:10'),
(24, 26, 'nguyễn iang', NULL, 'Model MSI GS63VR 6RF-076VN Stealth Pro\r\n\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)\r\n\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB', 4, '2017-05-22 15:09:27'),
(25, 28, 'Nguyễn Văn Quang', NULL, 'Model MSI GS63VR 6RF-076VN Stealth Pro\r\n\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)\r\n\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB', 4, '2017-05-22 15:09:54'),
(26, 29, 'Nguyễn Văn Quang', NULL, 'Model MSI GS63VR 6RF-076VN Stealth Pro\r\n\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)\r\n\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB', 5, '2017-05-22 15:10:23'),
(27, 30, 'Nguyễn Văn Quang', NULL, 'Model MSI GS63VR 6RF-076VN Stealth Pro\r\nB', 5, '2017-05-22 15:10:42'),
(28, 33, 'Nguyễn Văn Quang', NULL, 'Model MSI GS63VR 6RF-076VN Stealth Pro', 5, '2017-05-22 15:11:00'),
(29, 32, 'Nguyễn Văn Quang', NULL, 'Model MSI GS63VR 6RF-076VN Stealth Pro', 5, '2017-05-22 15:11:49'),
(30, 31, 'Nguyễn Văn Quang', NULL, 'Model MSI GS63VR 6RF-076VN Stealth Pro\r\n', 5, '2017-05-22 15:12:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `content`) VALUES
(1, 'fdgdf', 'dfgfgdgfd', 'gfdgdfdfg', 'dfggdfdfgdgf'),
(2, 'fdgdf', 'dfgfgdgfd', 'gfdgdfdfg', 'dfggdfdfgdgf'),
(3, 'Vo van khoa', 'khoa@kk.com', '000000', 'hay lam'),
(4, 'Vo van khoa', 'khoa@kk.com', '000000', 'hay lam'),
(5, 'Vo van khoa', 'khoa@kk.com', '000000', 'hay lam'),
(6, 'Vo van khoa', 'khoa@kk.com', '000000', 'hay lam'),
(7, 'Vo van khoa', 'khoa@kk.com', '000000', 'hay lam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` int(9) NOT NULL,
  `code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `product_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(9) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(9) DEFAULT NULL,
  `url_thumb` text COLLATE utf8_unicode_ci NOT NULL,
  `url_large` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `title`, `url`, `product_id`, `url_thumb`, `url_large`) VALUES
(1, 'anh 1', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 7, 'https://www.google.com.vn/imgres?imgurl=https%3A%2F%2Fmuativisony.files.wordpress.com%2F2016%2F01%2Ftivi-toshiba-led.jpg%3Fw%3D300%26h%3D200&imgrefurl=https%3A%2F%2Fmuativisony.wordpress.com%2F&docid=9_7jVG5KM39InM&tbnid=WgmtDbFvzECLKM%3A&vet=10ahUKEwjimu7C4evTAhXGW7wKHfRYDb8QMwhHKB4wHg..i&w=300&h=200&bih=572&biw=1335&q=image%20tivi%20300x200&ved=0ahUKEwjimu7C4evTAhXGW7wKHfRYDb8QMwhHKB4wHg&iact=mrc&uact=8', 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&ved=0ahUKEwiQioKk4evTAhXHa7wKHV-UC4oQjhwIBQ&url=https%3A%2F%2Fwallpapersafari.com%2F1200-x-800-wallpaper%2F&psig=AFQjCNHfOiEpLag0Bj6j4-eeXRGrHjRoLA&ust=1494726768866809&cad=rja'),
(2, 'anh 2', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-3-500x500.jpg', 7, 'https://www.google.com.vn/imgres?imgurl=http%3A%2F%2Fthegioidienmayonline.com%2Fwp-content%2Fuploads%2F2017%2F02%2Ftivi-led-asanzo-25s350-gia-re-300x200.jpg&imgrefurl=http%3A%2F%2Fthegioidienmayonline.com%2Fsmart-tivi-asanzo-50-inch-model-50es910%2F&docid=Ctxd1C9MRig_bM&tbnid=MyxbImQ_FVQYZM%3A&vet=10ahUKEwjimu7C4evTAhXGW7wKHfRYDb8QMwhRKCgwKA..i&w=300&h=200&bih=572&biw=1335&q=image%20tivi%20300x200&ved=0ahUKEwjimu7C4evTAhXGW7wKHfRYDb8QMwhRKCgwKA&iact=mrc&uact=8', 'https://www.google.com/imgres?imgurl=http%3A%2F%2Faudihowto.com%2Fwp-content%2Fuploads%2F2015%2F04%2Faudi_how_to_tutorials_PopUp595_397popupR8150058_small.jpg.jpg&imgrefurl=http%3A%2F%2Fwww.audihowto.com%2Fcategory%2Faudi-press-releases%2F&docid=vWdqfi83o2paRM&tbnid=hBjKPCEszqqgoM%3A&vet=1&w=595&h=397&bih=572&biw=1335&ved=0ahUKEwiQioKk4evTAhXHa7wKHV-UC4oQxiAIFigC&iact=c&ictx=1'),
(3, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 1, 'https://www.google.com.vn/imgres?imgurl=http%3A%2F%2Ftapchihifi.com%2Fwp-content%2Fuploads%2F2016%2F02%2Ftivi-sony-kd-43x8300c-org-1-300x200.jpg&imgrefurl=http%3A%2F%2Ftapchihifi.com%2Ftg%2Fsmart-tivi%2F&docid=DpNioiFDF-hbmM&tbnid=8WTpzsEHFObMSM%3A&vet=10ahUKEwjimu7C4evTAhXGW7wKHfRYDb8QMwhQKCcwJw..i&w=300&h=200&bih=572&biw=1335&q=image%20tivi%20300x200&ved=0ahUKEwjimu7C4evTAhXGW7wKHfRYDb8QMwhQKCcwJw&iact=mrc&uact=8', 'https://www.google.com/imgres?imgurl=http%3A%2F%2Fs1.cdn.autoevolution.com%2Fimages%2Fnews%2Fgallery%2Fmedium%2F2009-audi-r8-auctioned-at-naples-winter-wine-festival-medium_3.jpg&imgrefurl=http%3A%2F%2Fgiaotoaltis.tumblr.com%2Fpage%2F3&docid=pSB1CA2yHiXCvM&tbnid=QkEyj-d4cBHmpM%3A&vet=1&w=680&h=453&bih=572&biw=1335&ved=0ahUKEwiQioKk4evTAhXHa7wKHV-UC4oQxiAIFygD&iact=c&ictx=1'),
(4, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 1, '', ''),
(5, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 2, 'https://www.google.com.vn/imgres?imgurl=http%3A%2F%2Fdienmayhikaru.com%2Fupload%2Fproduct%2Fthumbnail%2F144798871748Z1.png&imgrefurl=http%3A%2F%2Fdienmayhikaru.com%2Ftivi%2FTCL--index.html&docid=2m2bXOYnUUT3UM&tbnid=Dl15mT8b1yae-M%3A&vet=10ahUKEwjimu7C4evTAhXGW7wKHfRYDb8QMwhbKDIwMg..i&w=300&h=200&bih=572&biw=1335&q=image%20tivi%20300x200&ved=0ahUKEwjimu7C4evTAhXGW7wKHfRYDb8QMwhbKDIwMg&iact=mrc&uact=8', 'https://www.google.com/imgres?imgurl=http%3A%2F%2Fs1.cdn.autoevolution.com%2Fimages%2Fnews%2Fgallery%2Fmedium%2F2009-audi-r8-auctioned-at-naples-winter-wine-festival-medium_3.jpg&imgrefurl=http%3A%2F%2Fgiaotoaltis.tumblr.com%2Fpage%2F3&docid=pSB1CA2yHiXCvM&tbnid=QkEyj-d4cBHmpM%3A&vet=1&w=680&h=453&bih=572&biw=1335&ved=0ahUKEwiQioKk4evTAhXHa7wKHV-UC4oQxiAIFygD&iact=c&ictx=1'),
(6, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 2, '', ''),
(7, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 3, '', ''),
(8, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 3, '', ''),
(9, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 4, '', ''),
(10, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 4, '', ''),
(11, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 5, '', ''),
(12, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 5, '', ''),
(13, 'anh', 'http://laptopnew.vn/image/cache/data/MSI/MSI%20GE/MSI%20GE72VR-500x500.jpg', 6, '', ''),
(14, '403.html', './upload/403.html', 17, '', ''),
(15, '404.html', './upload/404.html', 17, '', ''),
(16, 'MediaOnline.jpg', './upload/MediaOnline.jpg', NULL, '', ''),
(17, 'MediaOnline.jpg', './upload/MediaOnline.jpg', 19, '', ''),
(18, 'notify.jpg', './upload/notify.jpg', 19, '', ''),
(19, 'image1.jpg', './upload/image1.jpg', 24, '', ''),
(20, 'image2.jpg', './upload/image2.jpg', 24, '', ''),
(21, 'image3.jpg', './upload/image3.jpg', 24, '', ''),
(22, 'image4.jpg', './upload/image4.jpg', 24, '', ''),
(23, 'DELL-XPS-14z-Laptop-2-900x600px (1).jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px (1).jpg', 25, '', ''),
(24, 'DELL-XPS-14z-Laptop-2-900x600px.jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', 25, '', ''),
(25, 'images (6).jpg', './upload/images (6).jpg', 25, '', ''),
(26, 'images (7).jpg', './upload/images (7).jpg', 25, '', ''),
(27, 'ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', './upload/ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', 26, '', ''),
(28, 'DELL-XPS-14z-Laptop-2-900x600px (1).jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px (1).jpg', 26, '', ''),
(29, 'DELL-XPS-14z-Laptop-2-900x600px.jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', 26, '', ''),
(30, 'dfdf.jpg', './upload/dfdf.jpg', 26, '', ''),
(31, 'images (5).jpg', './upload/images (5).jpg', 27, '', ''),
(32, 'DELL-XPS-14z-Laptop-2-900x600px.jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', 27, '', ''),
(33, 'images (7).jpg', './upload/images (7).jpg', 27, '', ''),
(34, 'images.jpg', './upload/images.jpg', 27, '', ''),
(35, 'dfdf.jpg', './upload/dfdf.jpg', 28, '', ''),
(36, 'images (4).jpg', './upload/images (4).jpg', 28, '', ''),
(37, 'images (5).jpg', './upload/images (5).jpg', 28, '', ''),
(38, 'images (7).jpg', './upload/images (7).jpg', 28, '', ''),
(39, 'images.jpg', './upload/images.jpg', 29, '', ''),
(40, 'images (8).jpg', './upload/images (8).jpg', 29, '', ''),
(41, 'images (7).jpg', './upload/images (7).jpg', 29, '', ''),
(42, 'images (6).jpg', './upload/images (6).jpg', 29, '', ''),
(43, 'images (3).jpg', './upload/images (3).jpg', 30, '', ''),
(44, 'dfdf.jpg', './upload/dfdf.jpg', 30, '', ''),
(45, 'images (8).jpg', './upload/images (8).jpg', 30, '', ''),
(46, 'DELL-XPS-14z-Laptop-2-900x600px.jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', 30, '', ''),
(47, 'images (8).jpg', './upload/images (8).jpg', 31, '', ''),
(48, 'dfdf.jpg', './upload/dfdf.jpg', 31, '', ''),
(49, 'DELL-XPS-14z-Laptop-2-900x600px.jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', 31, '', ''),
(50, 'ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', './upload/ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', 31, '', ''),
(51, 'dfdf.jpg', './upload/dfdf.jpg', 32, '', ''),
(52, 'images (1).jpg', './upload/images (1).jpg', 32, '', ''),
(53, 'ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', './upload/ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', 32, '', ''),
(54, 'images (8).jpg', './upload/images (8).jpg', 32, '', ''),
(55, 'images (8).jpg', './upload/images (8).jpg', 33, '', ''),
(56, 'images.jpg', './upload/images.jpg', 33, '', ''),
(57, 'DELL-XPS-14z-Laptop-2-900x600px (1).jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px (1).jpg', 33, '', ''),
(58, 'images (6).jpg', './upload/images (6).jpg', 33, '', ''),
(59, 'images (7).jpg', './upload/images (7).jpg', 34, '', ''),
(60, 'DELL-XPS-14z-Laptop-2-900x600px.jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', 34, '', ''),
(61, 'ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', './upload/ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', 34, '', ''),
(62, 'images.jpg', './upload/images.jpg', 34, '', ''),
(63, 'DELL-XPS-14z-Laptop-2-900x600px.jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', 35, '', ''),
(64, 'images (1).jpg', './upload/images (1).jpg', 35, '', ''),
(65, 'images (6).jpg', './upload/images (6).jpg', 35, '', ''),
(66, 'DELL-XPS-14z-Laptop-2-900x600px.jpg', './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', 36, '', ''),
(67, 'ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', './upload/ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', 36, '', ''),
(68, 'images.jpg', './upload/images.jpg', 36, '', ''),
(69, 'images (1).jpg', './upload/images (1).jpg', 36, '', ''),
(70, 'images (8).jpg', './upload/images (8).jpg', 37, '', ''),
(71, 'images (6).jpg', './upload/images (6).jpg', 37, '', ''),
(72, 'images (4).jpg', './upload/images (4).jpg', 37, '', ''),
(73, 'images (3).jpg', './upload/images (3).jpg', 37, '', ''),
(74, 'images (2).jpg', './upload/images (2).jpg', 38, '', ''),
(75, 'images (1).jpg', './upload/images (1).jpg', 38, '', ''),
(76, 'dfdf.jpg', './upload/dfdf.jpg', 38, '', ''),
(77, 'images.jpg', './upload/images.jpg', 38, '', ''),
(78, 'image1.jpg', './upload/image1.jpg', 39, '', ''),
(79, 'image2.jpg', './upload/image2.jpg', 39, '', ''),
(80, 'image3.jpg', './upload/image3.jpg', 39, '', ''),
(81, 'image4.jpg', './upload/image4.jpg', 39, '', ''),
(82, 'image4.jpg', './upload/image4.jpg', 40, '', ''),
(83, 'image3.jpg', './upload/image3.jpg', 40, '', ''),
(84, 'image2.jpg', './upload/image2.jpg', 40, '', ''),
(85, 'image1.jpg', './upload/image1.jpg', 40, '', ''),
(86, 'image2.jpg', './upload/image2.jpg', 41, '', ''),
(87, 'image3.jpg', './upload/image3.jpg', 41, '', ''),
(88, 'image4.jpg', './upload/image4.jpg', 41, '', ''),
(89, 'image1.jpg', './upload/image1.jpg', 41, '', ''),
(90, 'image3.jpg', './upload/image3.jpg', 42, '', ''),
(91, 'image4.jpg', './upload/image4.jpg', 42, '', ''),
(92, 'image1.jpg', './upload/image1.jpg', 42, '', ''),
(93, 'image2.jpg', './upload/image2.jpg', 42, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(9) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES
(1, 'Đánh giá nhanh MSI GP72 7REX: Thiết kế cứng cáp, hệ thống tản nhiệt quá ổn!', 'Là một dòng Notebook Gaming thuộc phân khúc tầm trung với mức giá dưới 30.000.000 vnđ của thương hiệu MSI Notebook Gaming nổi tiếng. Ngày hôm nay chúng ta sẽ cùng nghiên cứu thử phiên bản MSI GP72 7REX vừa được về kho Hàng Chính Hiệu vài ngày...\r\n\r\n[​IMG]\r\n\r\nĐánh giá ngoại hình\r\n\r\nNói sơ quá hướng sắp xếp các Series Notebook Gaming của MSI, chúng ta sẽ có 2 dòng Notebook cao cấp nhất về cả thiết kế lẫn cấu hình là GT Series và GS Series. Từ 2 nền tảng này, MSI sẽ có nhữnq tinh chỉnh, cắt giảm vừa đủ để hạ giá thành và cho ra đời các phiên bản dòng GE - GP và GL Series. Thế nên với mẫu ngày hôm nay trên tay, GP72 7REX mặc định sẽ có thiết kế được thừa hưởng, cắt giảm bớt của những đàn anh như GT72 hoặc GS72..\r\n\r\n[​IMG]\r\n\r\nĐó là lý thuyết, ban đầu trước khi được giao để đánh giá mẫu MSI GP72 7REX này, mình cũng sẽ nghĩ MSI sẽ có nhiều hướng cắt giảm đáng kể để giảm giá thành và khiến máy nằm ở phân khúc dưới 30.000.000 vnđ. Tùy thuộc vào đội ngũ thiết kế, sự cắt giảm có thể sẽ rất nặng nhằm khiến dòng máy mất đi cái chất của một mẫu Notebook Gaming. Tuy nhiên thực tế, sau khi trên tay được dòng máy và unbox, mình đã có những cảm nghĩ khác và gần như chắc chắn MSI đã dánh đổi rất nhiều về tài chính để vẫn giữ được một mẫu Notebook Gaming không quá ọp ẹp như những phiên bản trước đây.\r\n\r\n[​IMG]\r\n\r\nMáy dày và nặng là những gì mình cảm nhận được.. Thế nhưng, MSI đã hơi \"ăn gian\" cả về ngôn ngữ thiết kế khi với những đường vát cạnh lại khiến máy khi lên hình trông khá mỏng. Sử dụng lớp vỏ nhựa pha cao cấp, máy không có hiện tượng ọp ẹp khi bóp ở các gờ cạnh cũng như khi nhấc bằng 1 tay, lớp vỏ nhựa của máy cũng không bị bẻ cong hoặc xê dịch quá nhiều - điều mà các bạn thường cảm nhận được mỗi khi cầm những dòng Notebook rẻ tiền. Thế nhưng, máy nặng 2.7gk một cách \"hợp lý\", nó hợp lý cả về kích thước lẫn ngoại hình của mẫu MSI GP72 7REX này..\r\n\r\n[​IMG]\r\n\r\nNghĩ mà xem, một cỗ máy được thiết kế to nếu cố tình làm cho nó nhẹ đi quá nhiều sẽ khiến người dùng cảm thấy máy không được cứng cáp. Và MSI đã ăn điểm ở góc nhìn này của mình, chiều dày, cân nặng và kích thước hợp lý đến mức hoàn hảo. Bạn sẽ không thể phàn nàn vì sao máy nặng kể cả khi vác nó lên vai hoặc xách nó ra đường để dạo chơi một buổi chiều ngoài quán caffe cùng bạn bè..\r\n\r\n[​IMG]\r\n\r\nVới hướng thiết kế quen thuộc trên nắp capo nhôm của những dòng Notebook Gaming, MSI vẫn giữ nguyên tên thương hiệu cùng một tấm khiên có logo rồng cuộn ngay giữa, biểu tượng rồng cuộn vẫn sẽ được sáng lên dựa trên tấm nền Panel màn hình phía sau - tức bạn không thể tắt được logo này, mỗi khi màn hình sáng con rồng cũng sẽ sáng theo. Phía trong, mặt bàn phím không có bất kỳ góc cạnh cắt xéo nào gây hiệu ứng cảm quan ấn tượng. MSI vẫn giữ nguyên nhà sản xuất bàn phím SteelSeries, với thiết kế bàn phím được làm thấp xuống một cách \"khó thấy\" nếu như bạn không tinh ý ở những góc trên, mục đích làm lõm bàn phím vẫn là để tránh va chạm với màn hình mỗi khi bạn đóng xuống và mang vác đi với nhiều vấn đề phát sinh. \r\n\r\n[​IMG]\r\n\r\nCá nhân mình thích thiết kế bàn phím của MSI trên các dòng Notebook Gaming thời gian gần đây, nó không quá nông cũng không quá sâu.. mức gõ phím vừa đủ với một người thích \"chém gió\" trên mạng hoặc làm việc nhiều với các văn bản. Bạn có thể nhanh chóng đạt tốc độ gõ phím khoản 80-90 ký tự/phút nếu làm quen hệ thống bàn phím này trong 2 tiếng. Tuy nhiên cá nhân mình vẫn gặp một số rắc rối khi gõ bên cụm phím Numpad vốn được MSI làm khá dính và đồng bộ với cụm phím chữ, có lẽ cần thời gian dài hơn để làm quen.\r\n\r\n[​IMG]\r\n\r\nTương tự như các dòng Notebook Gaming cao cấp khác, MSI cũng trang bị 3 phím bấm riêng quen thuộc bên ngoài dãy bàn phím thông thường gồm phím Power - Phím thay đổi khu vực sáng đèn LED và nút Cooler Booster đời thứ 4. Riêng nút Cooler Booster sẽ có một đèn LED phụ màu xanh để báo hiệu kích hoạt vào ban đêm.. Cảm quan về Cooler Booster mình sẽ nói thêm bên dưới.\r\n\r\n[​IMG]\r\n\r\nMáy dày một phần vì MSI vẫn còn giữ hệ thống ổ đĩa DVD bên cạnh phải của máy, cá nhân mình một người đã hơn 6 năm nay không đụng vào bất kỳ một đĩa cứng nào thì đó là một phần cứng thừa thãi và tăng chi phí không cần thiết. Tuy nhiên với đối tượng là sinh viên, có thể bạn vẫn còn cần ổ đĩa DVD này vì một số lý do \"củ chuối\" nào đó từ nhà trường yêu cầu. Thế nhưng dày cũng chưa hẳn là xấu, bởi lẽ máy dày đồng nghĩa với việc thể tích bên trong được tăng lên kha khá, đủ để tạo vùng không khí thông thoáng giúp máy có khả năng tản nhiệt tốt hơn.\r\n\r\n[​IMG]\r\n\r\nCạnh đáy của MSI GP72 7REX không có quá nhiều thay đổi so với những phiên bản tiền nhiệm, có lẽ với lối thiết kế chi chít lỗ thông gió, MSI đã khá thành công trong lối thiết kế hệ thống tản nhiệt cho dòng GP Series trước đây. Cộng với việc MSI đã có những nâng cấp về hệ thống tản nhiệt khi tăng số lượng ống đồng lên đáng kể trong cụm tản nhiệt của MSI GP72, có lẽ sẽ không có quá nhiều bất ngờ nếu chiếc Notebook này có hiệu năng tản nhiệt ấn tượng nhỉ?\r\n\r\nNói nhanh qua số lượng cổng kết nối của MSI GP72 7REX, chúng ta sẽ có số lượng cổng kết nối như sau', '2017-05-06 08:43:28'),
(2, 'Đánh giá MSI GE62 7RE phiên bản Camo Squad - Vẻ ngoài ngầu hơn, build nhựa, giá hơn 30 triệu', 'Dòng GE-series là dòng laptop chơi game thuộc phân khúc tầm trung của MSI, cấu hình phần cứng mạnh hơn hai dòng GL-series và GP-series nhưng lại không có trọng lượng mỏng nhẹ hay sức mạnh cơ bắp như trên hai dòng cao cấp hơn là GS-series và GT-series. Và để tạo được làn gió mới cho game thủ, MSI quyết định tung ra phiên bản đặc biệt của dòng GE-series mang tên Camo Squad với tông màu được sử dụng trong quân đội để ngụy trang giúp mang đến sự hút mắt và hầm hố hơn rất nhiều. Trong bài viết này, mình sẽ chia sẻ những trải nghiệm và đánh giá cá nhân về phiên bản Camo Squad này để bạn có được góc nhìn chi tiết hơn, và phiên bản mình đánh giá là phiên bản GE62 7RE với cấu hình phần cứng gần như là mạnh nhất tính đến thời điểm hiện tại. Giá bán chính thức cho phiên bản GE62 7RE Camo Squad tính tại thời điểm bài viết hơn 30 triệu đồng, một lưu ý chính là chỉ có duy nhất chiếc GE62 7RE được trang trí họa tiết Camo Squad và không có bất kì phiên bản nào khác, cũng như mức chênh lệch giá giữa phiên bản thường GE62VR 7RF APACHE PRO và Camo Squad vào khoảng 2,5 triệu đồng cùng cấu hình.\r\n\r\n​\r\n\r\nNgoài ra, MSI còn có phiên bản GE62 7RE Camo Squad được trang bị card đồ họa GTX 1060 nhưng chỉ áp dụng đối với thị trường Mĩ, đối với thị trường Việt Nam chỉ được trang bị cao nhất là GTX 1050 Ti mà thôi.\r\n\r\nThiết kế\r\n\r\nXét về mặt tổng thể thì GE62 7RE Camo Squad không hề có sự khác biệt gì so với phiên bản GE62 thường, toàn bộ phần mặt trước được làm bằng chất liệu nhựa với cạnh trên được vát dạng hình tháp trông khỏe khoắn hơn. Logo MSI trên phiên bản Camo là phiên bản mới dạng 3D trông đẹp mắt hơn, tuy nhiên với chất liệu nhựa bóng thì sẽ rất dễ bị trầy xước cũng như logo không có đèn. Và điểm thay đổi ấn tượng nhất chính là họa tiết quân đội thuộc màu của lính đánh bộ dạng các ô vuông to nhỏ kĩ thuật số khác nhau thay vì một tông màu đen xám duy nhất. Ngoài ra, các họa tiết sẽ được làm mờ dần ở khu vực cạnh sau và bản lề của máy cùng với logo Camo. Thật sự mình cảm thấy thiết kế này rất đẹp mắt và trông cực kì hầm hố, tuy nhiên mình vẫn chưa biết được lí do tại sao MSI lại chỉ áp dụng phiên bản Camo cho dòng GE-series, còn về họa tiết thì MSI lấy cảm hứng từ tựa game Tom Clancy\'s Ghost Recon Wildlands.\r\n\r\n[​IMG]\r\nMặt trước trên phiên bản Camo Squad rất ngầu, nhưng tiếc không phải là chất liệu kim loại.\r\n\r\n[​IMG]\r\nPhiên bản GE-series thường.\r\n\r\n[​IMG]\r\nCạnh trái của máy với các cổng kết nối gồm: cổng khóa Kensington, cổng Ethernet LAN cùng công nghệ Killer LAN và Killer Shield, 2 cổng USB 3.0 được bố trí cách xa nhau, 1 cổng HDMI, 1 cổng mini-Display Port, 1 cổng USB 3.1 chuẩn kết nối Type-c giúp mang đến tốc độ sao chép dữ liệu tốc độ nhanh hơn. Ngoài ra, bạn có thể tân dụng cổng HDMI và mini-Display Port để xuất tín hiệu hình ảnh với chất lượng 4K lên hai màn hình khác nhau nhờ vào công nghệ Matrix Display.\r\n\r\n[​IMG]\r\nCạnh phải của máy bao gồm: cổng nguồn, khe cắm thẻ nhớ SD, 1 cổng USB 2.0, đầu đọc DVD. Máy có độ mỏng khoảng 27mm và có trong lượng khoảng 2,4kg, mức chấp nhận được với một chiếc laptop chơi game tầm trung hiện nay.\r\n', '2017-05-06 08:46:00'),
(3, 'Acer Switch 5: tablet Windows 2-in-1, 12\", làm mát bằng chất lỏng, không quạt, vân tay, Stylus', 'Hãng Acer hôm nay ra mắt hai chiếc tablet 2-trong-1 mang tên Switch 5 và Switch 3. Switch 5 thuộc hàng cao cấp, giá từ 799 USD, sử dụng thiết kế không cần quạt, làm mát bằng chất lỏng, màn hình 12\" độ phân giải cao còn Switch 3 thuộc hàng trung cấp với giá từ 399 Euro, dùng quạt tản nhiệt, cấu hình thấp hơn nhưng vẫn mang hình hài là một chiếc tablet lai laptop với chân chống dựng đứng máy và bàn phím rời gắn ngoài.\r\n\r\n​\r\n\r\nSwitch 5 có cảm biến vân tay tích hợp trong nút Home, có cả Windows Hello dùng để mở khóa và đăng nhập nhanh vào máy tính. Màn hình IPS cảm ứng có kích thước 12\", độ phân giải 2.160 x 1.440, được bán kèm với bút cảm ứng Acer Active Stylus có 1.024 cấp độ nhấn để tạo ra những nét vẽ có độ trung thực cao. Mặt sau của tablet có chân chống dùng để dựng đứng máy. Cho phép người dùng có thể thao tác điều chỉnh góc nghiêng chỉ bằng một tay. Acer chưa công bố bảng cấu hình đầy đủ nhưng cho biết máy dùng CPU Core i5 hoặc i7 thế hệ 7, card đồ họa tích hợp Intel HD Graphics 620 và thời lượng pin đạt 10,5 tiếng.\r\n\r\nacer-switch-5-2.jpg ​\r\nBên cạnh đó, bản Switch 3 có giá bán rẻ hơn phân nửa do cấu hình thấp hơn nhưng vẫn có chân chống, bàn phím rời (nhưng không có đèn nền như của Switch 5), bút cảm ứng. Switch 3 dùng quạt tản nhiệt chứ không có tản nhiệt bằng chất lỏng, màn hình IPS cảm ứng 12,2\" độ phân giải 1.920 x 1.200, pin 8 tiếng và dùng CPU Pentium hoặc Celeron.\r\n\r\nCả hai máy đều có camera trước 720p, một cổng USB-C và một cổng USB-A. Acer sẽ bắt đầu bán Switch 5 và Switch 3 tại Mỹ từ tháng 6 tới.', '2017-05-06 08:48:50'),
(4, 'Đánh giá ASUS K501 laptop màn FHD giá rẻ', 'Gần đây thấy các bạn có vẻ rất quan tâm đến một sản phẩm hoàn toàn mới của ASUS thuộc K series đó là K501L. Đây có thể được coi là sản phẩm cao cấp nhất trong K series với thiết kế nhôm nguyên khối, chip broadwell trang bị màn FHD (1920x1080), ram 4GB có thể nâng cấp lên 8GB hoặc 12GB, có khả năng nâng cấp thêm SSD.\r\nHiện bên mình chỉ về hàng K501LB model có giá rẻ nhất, dự kiến sẽ về K501LX với 2 cấu hình i5-5200U và i7-5500U, model i7U sẽ có kèm thêm ổ SSD sẵn. Đặc biệt K501LX trang bị card GTX950M. Có thể sẽ được trang bị thêm đèn bàn phím và 2 fan tản nhiệt. Cái này khi nào có hàng bên mình sẽ cập nhật sau :)\r\nQuay lại K501LB, model này có cấu hình i5-5200U ram 4GB, có thể update lên 8GB or 12GB, trang bị VGA NVIDIA GT940M 2GB, với thiết kế cực đẹp, mỏng nhẹ và rất sang trọng.\r\n\r\nSau đây mình sẽ đi cụ thể vào từng phần:\r\n\r\nThiết kế:\r\nVới vỏ nhôm nguyên khối khá đẹp, mặt lưng máy là một lớp vỏ nhôm đen phay xước nhìn khá sang trọng, tuy nhiên rất dễ bám vân tay.\r\n[​IMG] \r\n\r\nMặt dưới của máy là một lớp nhựa cứng, cầm khá là cứng cáp, việc nâng cấp và vệ sinh cũng khá dễ dàng, chỉ việc tháo nắp máy bên dưới là các bạn có thể làm được rồi. Tuy nhiên việc này mình ko khuyến khích tự làm ở nhà vì dễ dẫn đến mất bảo hành :)\r\n[​IMG] \r\n\r\nCổng kết nối: Cạnh phải của máy có 2 cổng USB 2.0, SD card, combo jack và ko có ổ DVD như chúng ta thường thấy ở các sản phẩm khác như K551, K555... Điều này sẽ làm cho máy trở nên mỏng nhẹ hơn.\r\n[​IMG] \r\nCạnh trái của máy có 2USB 3.0, cổng lan, HDMI. Ở đây chúng ta cũng không thấy cổng VGA, một thiết bị rất cần thiết trong việc trình chiếu.', '2017-05-06 08:49:27'),
(5, 'Galaxy S8 vs iPhone 7 Plus: đọ hiệu năng, so độ mượt game nặng', 'Với các điện thoại Android đầu bảng, iPhone luôn là sản phẩm được đem ra để so sánh, đặc biệt là máy cao cấp của Samsung.\r\n\r\nGalaxy S8 và S8+ sẽ được Samsung bán ra thị trường Việt Nam vào ngày 5/5 tới với giá lần lượt là 18,49 triệu đồng và 20,49 triệu đồng. Đây là bộ đôi sản phẩm được thay đổi toàn diện về thiết kế cùng với những nâng cấp về cấu hình. Trong khi đó, iPhone 7 Plus cũng là thế hệ iPhone mới nhất dù đã ra mắt hơn nửa năm.\r\nXét về thông số cấu hình lý thuyết, Galaxy S8 nhỉnh hơn ở độ phân giải màn hình, số lõi vi xử lý, dung lượng bộ nhớ RAM và pin. Tuy vậy, iPhone sử dụng nền tảng hệ điều hành khác và lâu nay luôn được đánh giá cao về hiệu năng cũng như độ mượt mà trong trải nghiệm. Ở các thế hệ trước, iPhone 6s/6 Plus hay 5s vẫn luôn mượt hơn trong các bài đọ hiệu năng với các thế hệ Galaxy S tương ứng. Liệu Galaxy S8 có đảo ngược được kết quả đó hay không?\r\n\r\n\r\n\r\nĐọ hiệu năng trên phần mềm\r\n\r\nTrên các phần mềm đo hiệu năng, Galaxy S8 nhỉnh hơn ở điểm đo sức mạnh hiệu năng tổng thể (Antutu) và khả năng xử lý đa lõi (Geekbench). Trong khi đó, iPhone 7 Plus ghi điểm cao hơn ở khả năng xử lý của từng lõi CPU (Geekbench) và khả năng xử lý đồ hoạ (GFXbench). Nhìn chung, hai máy tương đối tương đồng, chênh nhau không nhiều.\r\n\r\nLưu ý là ở phần so sánh điểm hiệu năng trên các phần mềm giữa hai máy, chúng tôi sử dụng độ phân giải mặc định (Full-HD+) trên chiếc Galaxy S8. Điện thoại này của Samsung có 3 chế độ hiển thị ở các độ phân giải khác nhau là HD+, Full-HD+ và 2K+ (phần + trong thông số độ phân giải là do màn hình có tỉ lệ 18.5:9 dài hơn chút so với 16:9 thông thường), trong đó Full-HD+ là độ phân giải được chọn mặc định.\r\n\r\n\r\n\r\nĐiểm Antutu đánh giá hiệu năng tổng thể của thiết bị\r\n\r\n\r\n\r\nĐiểm GeekBench 4.0 đo hiệu năng xử lý đơn nhân và đa nhân của CPU.\r\n\r\n\r\n\r\nBài đo Manhattan trên phần mềm GFXBench đo hiệu năng xử lý đồ hoạ của GPU ở độ phân giải thật của màn hình (onscreen) và độ phân giải chung là Full-HD+ (offscreen). Trên chiếc S8 như đã đề cập, độ phân giải ở phần onscreen theo mặc định là Full-HD+, chứ không phải 2K+.\r\n\r\nSo tốc độ mở ứng dụng và đa nhiệm\r\n\r\nCả hai đều là máy cao cấp nên trải nghiệm sử dụng đều rất mượt mà và đáp ứng tốt mọi tác vụ cũng như các ứng dụng trên cả hai nền tảng (Android và iOS). Để so sánh sự chênh lệch giữa hai máy, VnReview đã thử so tốc độ mở và chạy đa nhiệm với 12 game, trong đó có 6 game nặng đồ hoạ và 6 game đồ hoạ nhẹ hơn. Do Galaxy S8 có tới 3 lựa chọn độ phân giải là HD+, Full-HD+ và QHD+ nên chúng tôi đã so thử tốc độ mở ứng dụng và đa nhiệm với iPhone 7 Plus dựa trên cả 3 lựa chọn độ phân giải.\r\n\r\nỞ bài đọ dựa trên độ phân giải mặc định Full-HD+, chiếc Galaxy S8 có tốc độ mở ứng dụng và vào màn chơi chậm hơn iPhone 7 Plus ở phần lớn game với sự chênh lệch tương đối rõ rệt. Khả năng đa nhiệm của iPhone 7 Plus cũng tốt hơn, giữ được hầu hết game kể cả các game nặng (xem phim video phía dưới).', '2017-05-10 15:52:48'),
(6, 'Đánh giá Samsung Galaxy A3 2017: cắt giảm quá tay', 'Ở thế hệ A 2017, A5 và A7 cũng được bán sớm hơn và quảng cáo rầm rộ trong khi A3 được bán muộn hơn tới 2 tháng. Mẫu điện thoại nhỏ gọn nhất của dòng A được bán online kể từ cuối tháng 3, và chỉ xuất hiện tại các chuỗi cửa hàng vào đầu tháng 4.\r\n\r\nTrong khi điểm khác biệt giữa A5 và A7 chỉ là kích thước, thì A3 còn bị rút gọn về cấu hình so với hai chiếc điện thoại trên: độ phân giải màn hình, phần cứng và camera đều thấp hơn, ngoài ra  không có sạc nhanh. Bên cạnh đó, A3 vẫn sở hữu những tính năng mới của dòng sản phẩm như khả năng chống nước, máy quét vân tay, màn hình Always-on Display.\r\n\r\nGalaxy A3 2017 được bán với giá 6,5 triệu đồng, thuộc phân khúc tầm trung. Liệu các tính năng mới có thể bù đắp lại được những điểm bị cắt giảm, giúp cho chiếc điện thoại này nổi bật trong phân khúc smartphone cạnh tranh nhất hiện nay?\r\n\r\nSản phẩm trong bài được chúng tôi lấy từ hệ thống Hoàng Hà Mobile, với giá rẻ hơn 300.000 đồng so với giá chính hãng.\r\nNgoại hình của A3 gần như giống hệt hai đàn anh, chỉ có kích thước nhỏ hơn. Thiết kế chung của cả ba mẫu đều có nét giống Galaxy S7 với hai mặt kính cong 2.5D và các góc bo tròn. Máy tròn trịa và kích thước nhỏ gọn nên khi sử dụng bằng một tay vẫn rất chắc chắn.\r\n\r\n\r\n\r\nMặt sau bằng kính khá đẹp mắt, nhất là với phiên bản màu đen\r\n\r\nThiết kế hai mặt kính của A3 bắt mắt, nhất là với phiên bản màu đen. Tuy nhiên mặt kính sau rất dễ bắt vân tay nên chỉ sử dụng một thời gian là nhìn khá bẩn. Kích thước camera ở phần lưng cân đối chứ không quá nhỏ như trên chiếc A7. Một số chi tiết nhỏ vẫn chưa được Samsung cải tiến, như cổng kết nối mặt đáy sắp xếp rất lệch hay cụm loa thoại không đẹp mắt.\r\n\r\n\r\n\r\nA3 chỉ có một khay Dual SIM nên hạn chế hơn chút so với A5, A7\r\n\r\nMặc dù vẫn hỗ trợ sử dụng 2 SIM, A3 chỉ còn một khay cắm chứ không phải thiết kế 2 khay như A5, A7. Điều đó có nghĩa là bạn chỉ có thể sử dụng 2 Nano SIM hoặc 1 SIM/1 thẻ nhớ cùng lúc. Đây là chi tiết nhỏ nhưng cũng là một điểm bạn nên cân nhắc để phù hợp với yêu cầu sử dụng của mình.', '2017-05-10 15:52:48'),
(7, 'Đánh giá chi tiết Oppo F3 Plus', 'Đây là smartphone mới của hãng điện thoại Trung Quốc Oppo vừa bán ra thị trường Việt Nam từ ngày 1/4. Sản phẩm được định vị thuộc phân khúc cận cao cấp, cạnh tranh với các điện thoại vừa ra gần đây như Samsung Galaxy A7 2017 hay HTC U Play.\r\n\r\nOppo F3 Plus có giá công bố là 10,69 triệu đồng, hiện được các hệ thống bán lẻ tặng trực tiếp 700.000 đồng cho người mua thanh toán luôn bằng tiền mặt hoặc thẻ tín dụng trong thời gian từ ngày 1-16/4/2017. Điện thoại này có thiết kế và cấu hình tương đồng với một sản phẩm được Oppo ra mắt thị trường quốc tế cách đây không lâu là R9s Plus. F3 Plus chỉ có một điểm khác với bản R9s Plus là có thêm camera phụ 8MP phía trước sử hữu ống kính góc rộng cùng với camera 16MP có góc chụp thông thường.\r\nNgoài điểm nhấn là có tới hai camera trước để hỗ trợ chụp ảnh tự sướng, các cấu hình khác của F3 Plus gồm vi xử lý Snapdragon 653 tám lõi 1.9Ghz, RAM 4GB, bộ nhớ trong 64GB, camera sau 16MP, hỗ trợ 2 SIM, khe cắm thẻ nhớ, phiên bản Color OS dựa trên Android 6, pin 4.000 mAh hỗ trợ sạc nhanh VOOC. Chi tiết về cấu hình của máy có thể xem thêm tại đây.', '2017-05-10 15:53:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(9) NOT NULL,
  `user` int(9) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(9) NOT NULL,
  `order_id` int(9) NOT NULL,
  `quantity` int(9) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(9) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `price` int(9) NOT NULL DEFAULT '0',
  `category_id` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `views` int(9) NOT NULL DEFAULT '0',
  `buys` int(9) NOT NULL DEFAULT '0',
  `rate` float NOT NULL DEFAULT '0',
  `thumb` text CHARACTER SET utf8,
  `thumblarge` text COLLATE utf8_unicode_ci,
  `display` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `category_id`, `description`, `views`, `buys`, `rate`, `thumb`, `thumblarge`, `display`) VALUES
(26, 'Laptop Dell Inspiron 3567 i3 6006U/4GB/1TB/Win10', 2147483647, '2,9', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 3, 0, 4, './upload/ASUS-Eee-Pad-Transformer-Prime-5-900x600px.jpg', NULL, 1),
(27, 'DELL CHROMEBOOK 11', 12400000, '9,11,5,3,16', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 4, 0, 5, './upload/images (5).jpg', NULL, 1),
(28, ' i3 6006U/4GB/1TB/Win10', 36000000, '4,3,14,15', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 2, 0, 4, './upload/dfdf.jpg', NULL, 1),
(29, 'DELL CHROMEBOOK 12', 536353563, '4,6,7,3', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 2, 0, 5, './upload/images.jpg', NULL, 1),
(30, 'Laptop Dell Inspiron 3567 i3 6006U/4GB/1TB/Win10', 2147483647, '5,6,7', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 2, 0, 5, './upload/images (3).jpg', NULL, 1),
(31, 'DELL CHROMEBOOK 11', 2147483647, '8,9,10,11,16,12', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 2, 0, 5, './upload/images (8).jpg', NULL, 1),
(32, ' i3 6006U/4GB/1TB/Win10', 2147483647, '9,11,1,5', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 2, 0, 5, './upload/dfdf.jpg', NULL, 1),
(33, 'DELL CHROMEBOOK 12', 452424, '11', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 2, 0, 5, './upload/images (8).jpg', NULL, 1),
(34, 'DELL CHROMEBOOK 11', 5235233, '16,12', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 0, 0, 0, './upload/images (7).jpg', NULL, 0),
(35, 'DELL CHROMEBOOK 12', 412312332, '5', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 0, 0, 0, './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', NULL, 1),
(36, 'Laptop Dell Inspiron 3567 i3 6006U/4GB/1TB/Win10', 24223232, '11', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 0, 0, 0, './upload/DELL-XPS-14z-Laptop-2-900x600px.jpg', NULL, 0),
(37, 'DELL CHROMEBOOK 11', 4544345, '8', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 0, 0, 0, './upload/images (8).jpg', NULL, 0),
(38, 'DELL CHROMEBOOK 11', 5232, '10,11', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 0, 0, 0, './upload/images (2).jpg', NULL, 0),
(39, ' i3 6006U/4GB/1TB/Win10', 3343434, '5', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 1, 0, 0, './upload/image1.jpg', NULL, 0),
(40, 'Laptop Dell Inspiron 3567 i3 6006U/4GB/1TB/Win10', 554646456, '9', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 0, 0, 0, './upload/image4.jpg', NULL, 0),
(41, 'DELL CHROMEBOOK 11', 767676767, '4,5,6', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 0, 0, 0, './upload/image2.jpg', NULL, 0),
(42, 'DELL CHROMEBOOK 11', 556565656, '11', '<p>Model MSI GS63VR 6RF-076VN Stealth Pro<br />\r\n<br />\r\nCPU Intel(R) core i7-6700HQ (2.6GHz upto 3.5GHz, 4Cores, 8Threads, 6MB cache, FSB 8GT/s)<br />\r\n<br />\r\nRAM 8GB DDR4 2133MHz (1x8GB) + 1 slot RAM - Max 32GB</p>\r\n', 0, 0, 0, './upload/image3.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `namecompany` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `skype` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci,
  `hotline` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `gioithieu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `support`
--

INSERT INTO `support` (`id`, `namecompany`, `email`, `skype`, `phone`, `hotline`, `address`, `gioithieu`) VALUES
(1, 'FGC TECHLUTION', 'fgcsupport@gmail.com', 'khanhhuyna', '0989.675.411', '0166.9872.627', 'P618, Chung cư Tân Phúc, tp Vinh, Nghệ An', '<p style=\"text-align:center\"><span style=\"color:#c0392b\"><span style=\"font-size:24px\">FGC TECHLUTION KẾT NỐI GIẤC MƠ C&Ocirc;NG NGHỆ GIỚI THIỆU CHUNG </span></span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;C&ocirc;ng ty Cổ phần Giải ph&aacute;p c&ocirc;ng nghệ FGC (FGC Techlution) l&agrave; C&ocirc;ng ty hoạt động trong lĩnh vực tư vấn v&agrave; cung cấp c&aacute;c giải ph&aacute;p về hệ thống th&ocirc;ng tin, quản trị dữ liệu v&agrave; thương mại điện tử; Tư vấn, thiết kế website cho c&aacute;c tổ chức, doanh nghiệp v&agrave; c&aacute; nh&acirc;n trong v&agrave; ngo&agrave;i nước. Với đội ngũ nh&acirc;n vi&ecirc;n trẻ trung năng động v&agrave; nhiệt t&igrave;nh, chuy&ecirc;n nghiệp c&ugrave;ng với sự ủng hộ tinh thần khởi nghiệp (startup) của những người trẻ, FGC Techlution đang x&acirc;y dựng một m&ocirc;i trường để đ&oacute;n nhận c&aacute;c &yacute; tưởng c&ocirc;ng nghệ mới v&agrave; kết nối mọi người để thực hiện ch&uacute;ng.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Th&agrave;nh lập trong giai đoạn nền kinh tế thế giới c&oacute; nhiều biến động (th&aacute;ng 03 năm 2009) nhưng C&ocirc;ng ty FGC đ&atilde; nỗ lực v&agrave; phấn đấu kh&ocirc;ng ngừng để tiến tới mục ti&ecirc;u ph&aacute;t triển l&acirc;u d&agrave;i v&agrave; bền vững. Trong qu&aacute; tr&igrave;nh l&agrave;m việc v&agrave; phấn đấu của to&agrave;n thể th&agrave;nh vi&ecirc;n v&agrave; Ban l&atilde;nh đạo C&ocirc;ng ty, C&ocirc;ng ty đ&atilde; từng bước chứng tỏ được năng lực v&agrave; uy t&iacute;n của m&igrave;nh với c&aacute;c đối t&aacute;c, kh&aacute;ch h&agrave;ng trong nước cũng như nước ngo&agrave;i. C&aacute;c đối t&aacute;c nước ngo&agrave;i thường xuy&ecirc;n của C&ocirc;ng ty l&agrave; c&aacute;c nước c&oacute; nền C&ocirc;ng nghệ th&ocirc;ng tin ph&aacute;t triển như: Anh, Mỹ, H&agrave; Lan, Australia, New Zealand, Thụy Điển, Đan Mạch, H&agrave;n Quốc... c&aacute;i gi&uacute;p ch&uacute;ng t&ocirc;i tiếp cận với c&aacute;c c&ocirc;ng nghệ mới nhất v&agrave; phong c&aacute;ch l&agrave;m việc hiện đại. TẦM NH&Igrave;N Bằng niềm đam m&ecirc; s&aacute;ng tạo c&ocirc;ng nghệ v&agrave; mục ti&ecirc;u bền vững, FGC kh&aacute;t vọng sẽ xứng tầm l&agrave; c&ocirc;ng ty c&ocirc;ng nghệ top đầu khu vực v&agrave; khẳng định vị thế của m&igrave;nh tr&ecirc;n bản đồ c&ocirc;ng ngh&ecirc; thế giới.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;FGC Techlution kh&aacute;t khao x&acirc;y dựng một tổ chức mang c&ocirc;ng nghệ th&ocirc;ng tin đến gần hơn với cộng đồng, v&igrave; một cộng đồng kh&ocirc;ng c&ograve;n khoảng c&aacute;ch. SỨ MỆNH Với tinh thần hướng tới tương lai bền vững ch&uacute;ng t&ocirc;i &yacute; thức r&otilde; sứ mệnh của m&igrave;nh v&agrave; lu&ocirc;n mang trong m&igrave;nh tr&aacute;ch nhiệm: Với kh&aacute;ch h&agrave;ng: Đặt lợi &iacute;ch kh&aacute;ch h&agrave;ng l&ecirc;n tr&ecirc;n hết, FGC Techlution lu&ocirc;n ch&uacute; trọng h&agrave;ng đầu trong việc cung cấp những sản phẩm chất lượng cao, đ&aacute;p ứng sự kỳ vọng của kh&aacute;ch h&agrave;ng v&agrave; trở th&agrave;nh đối t&aacute;c c&ocirc;ng nghệ tin cậy nhất. Với th&agrave;nh vi&ecirc;n FGC: Ch&uacute;ng t&ocirc;i tạo điều kiện s&aacute;ng tạo tối đa, x&acirc;y dựng m&ocirc;i trường l&agrave;m việc mở, đẩy l&ugrave;i quan điểm &ldquo;vắt kiệt sức từng ph&uacute;t lao động c&ocirc;ng sở&rdquo;. c&ocirc;ng ty sẽ l&agrave; ng&ocirc;i nh&agrave; chung để nh&acirc;n vi&ecirc;n thỏa m&atilde;n t&iacute;nh s&aacute;ng tạo, hiện thực h&oacute;a giấc mơ c&ocirc;ng nghệ của m&igrave;nh v&agrave; của cả tổ chức. Với cộng đồng: ch&uacute;ng t&ocirc;i mong muốn sẻ chia c&ocirc;ng nghệ th&ocirc;ng tin đến gần hơn với cộng đồng, v&igrave; một cộng đồng c&ocirc;ng nghệ ph&aacute;t triển, v&igrave; một x&atilde; hội văn minh ph&aacute;t triển.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;GI&Aacute; TRỊ CỐT L&Otilde;I M&Ocirc;I TRƯỜNG MỞ Tất cả ch&uacute;ng ta đều mong muốn cống hiến sức lao động của m&igrave;nh tại nơi c&oacute; m&ocirc;i trường l&agrave;m việc tốt. Ch&iacute;nh v&igrave; thế FGC đang x&acirc;y dựng một m&ocirc;i trường l&agrave;m việc thực sự l&yacute; tưởng đặc biệt với m&ocirc;i trường c&ocirc;ng nghệ th&ocirc;ng tin, đấy l&agrave; một m&ocirc;i trường Mở - nơi mọi người dễ d&agrave;ng h&ograve;a nhập để l&agrave;m việc s&aacute;ng tạo, dễ d&agrave;ng b&agrave;y tỏ &yacute; tưởng, đặc biệt tạo điều kiện cho c&aacute;c bạn trẻ thể hiện m&igrave;nh v&agrave; th&agrave;nh c&ocirc;ng hơn.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; NIỀM ĐAM M&Ecirc; S&Aacute;NG TẠO V&Agrave; ĐỔI MỚI &ldquo;S&aacute;ng tạo l&agrave; suy nghĩ một c&aacute;ch hiệu quả hơn&rdquo; Suy nghĩ của một c&aacute; nh&acirc;n tạo n&ecirc;n sự kh&aacute;c biệt, đa dạng để c&ugrave;ng nhau ph&aacute;t triển. FGC t&ocirc;n trọng sự độc lập đ&oacute;, vậy n&ecirc;n kh&ocirc;ng g&ograve; b&oacute; nh&acirc;n vi&ecirc;n trong khu&ocirc;n mẫu m&agrave; khuyến kh&iacute;ch những &yacute; tưởng mới, độc đ&aacute;o, ph&aacute; c&aacute;ch, thắp lửa đam m&ecirc; trong c&ocirc;ng việc l&agrave; điều FGC hướng tới.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;SỰ KẾT NỐI V&Agrave; CHIA SẺ C&ugrave;ng chia sẻ &yacute; tưởng, c&ugrave;ng kết nối ước mơ. FGC x&acirc;y dựng m&ocirc;i trường m&agrave; ở đ&oacute; mọi kiến thức, &yacute; tưởng, kinh nghiệm đều được ch&iacute;nh mọi người thoải m&aacute;i trao đổi, b&agrave;y tỏ c&ugrave;ng nhau. Để ch&iacute;nh những sự sẻ chia đ&oacute; l&agrave; những hạt giống theo gi&oacute; bay xa.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;NIỀM TIN V&Agrave; TR&Aacute;CH NHIỆM L&ograve;ng tin v&agrave;o một tương lai bền vững tạo n&ecirc;n sức mạnh s&aacute;ng tạo của ch&uacute;ng t&ocirc;i, sự t&iacute;n nhiệm của Kh&aacute;ch h&agrave;ng l&agrave; động lực th&uacute;c đẩy ch&uacute;ng t&ocirc;i nỗ lực hơn để tạo ra những sản phẩm c&ocirc;ng nghệ hữu &iacute;ch. Ch&uacute;ng t&ocirc;i c&oacute; tr&aacute;ch nhiệm với ch&iacute;nh ước mơ của ch&iacute;nh m&igrave;nh v&agrave; c&oacute; tr&aacute;ch nhiệm với cả sự tr&ocirc;ng đợi của kh&aacute;ch h&agrave;ng. V&igrave; ch&uacute;ng t&ocirc;i hiểu r&otilde; rằng tr&aacute;ch nhiệm tạo n&ecirc;n niềm tin.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; VĂN H&Oacute;A L&Agrave; C&Aacute;I C&Ograve;N THIẾU KHI TA C&Oacute; TẤT CẢ, L&Agrave; C&Aacute;I C&Ograve;N LẠI KHI TẤT CẢ Đ&Atilde; MẤT Ch&uacute;ng t&ocirc;i nhận thức r&otilde; văn h&oacute;a doanh nghiệp ch&iacute;nh l&agrave; tr&aacute;i tim v&agrave; linh hồn của doanh nghiệp. đ&oacute; l&agrave; điều c&oacute; ảnh hưởng kh&ocirc;ng hề nhỏ đến việc tạo niềm hứng khởi, động lực v&agrave; sự gắn b&oacute; những con người với nhau.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; Ch&uacute;ng t&ocirc;i đang c&ugrave;ng nhau hướng đến một m&ocirc;i trường l&agrave;m việc l&yacute; tưởng, m&agrave; ở đ&oacute; nh&acirc;n vi&ecirc;n sẽ cảm thấy mỗi ng&agrave;y đến c&ocirc;ng ty l&agrave; một ng&agrave;y tận hưởng, được thực hiện niềm đam m&ecirc;, được h&ograve;a v&agrave;o bầu khồng kh&iacute; th&acirc;n thiện, trẻ trung. Cũng như c&ocirc;ng ty sẽ l&agrave; nơi mọi người đều thấy tự h&agrave;o mỗi khi được g&oacute;p gi&aacute; trị ri&ecirc;ng của c&aacute; nh&acirc;n h&ograve;a chung v&agrave;o c&aacute;i tổng thể mang bản sắc FGC r&otilde; n&eacute;t. Bản sắc đ&oacute; ch&iacute;nh l&agrave; sợi d&acirc;y để gắn kết từng con người FGC , l&agrave; niềm h&atilde;nh diện, l&agrave; t&igrave;nh y&ecirc;u của mỗi c&aacute; nh&acirc;n với c&ocirc;ng ty. B&ecirc;n cạnh việc g&igrave;n giữ những gi&aacute; trị tồn tại tự nhi&ecirc;n, tr&acirc;n trọng những gi&aacute; trị đang c&oacute; th&igrave; ch&uacute;ng t&ocirc;i lu&ocirc;n ch&agrave;o đ&oacute;n những nh&acirc;n tố mới, bứt ph&aacute; đầy s&aacute;ng tạo. Ch&iacute;nh những sự mới mẻ đ&oacute; kế hợp với những gi&aacute; trị đ&atilde; c&oacute; sẽ tạo ra sự ph&aacute;t triển bền vững của doanh nghiệp.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;C&Aacute;C HOẠT ĐỘNG VĂN H&Oacute;A FGC Hoạt đ&ocirc;ng tại văn ph&ograve;ng Với mong muốn tạo điều kiện cho nh&acirc;n vi&ecirc;n ph&aacute;t huy t&iacute;nh s&aacute;ng tạo tối đa. Qua việc tạo một kh&ocirc;ng gian ri&ecirc;ng để mọi người c&oacute; thể thư gi&atilde;n giữa giờ như m&aacute;y tập thể dục, ph&ograve;ng nghe nhạc, c&ugrave;ng như kh&ocirc;ng g&ograve; &eacute;p thời gian l&agrave;m việc, t&ocirc;n trọng sự tự gi&aacute;c của c&aacute; nh&acirc;n. Mức độ sẵn s&agrave;ng với c&ocirc;ng việc của mỗi c&aacute; nh&acirc;n phải được xuất ph&aacute;t từ sự y&ecirc;u th&iacute;ch của bản th&acirc;n để c&ocirc;ng hiến hết m&igrave;nh v&igrave; lợi &iacute;ch chung của tổ chức Tổ chức d&atilde; ngoại, du lịch N&acirc;ng cao chuy&ecirc;n m&ocirc;n H&agrave;nh động v&igrave; cộng đồng</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `admin`, `created`) VALUES
(1, 'admin', 'admin@gmail.com', '0888777999', 'TP Vinh, Nghe An', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1),
(22, 'quyen', 'brian.goldenway@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(23, 'trandangquyen', 'trandangquyen@gmail.com', '', '', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0),
(24, 'werwer', 'werewr@gmail.com', '', '', '8c3efed62ba3f94ec92f473bee2fa1ce', 0, 0),
(25, '35345', '435345@gmail.com', '', '', 'eb57a2d60b46edd147bad16fc1c2e1bd', 0, 0),
(26, 'baoloc', 'long.hoang@gmail.com', '', '', '4ec333d78e74610818be4b6291cf159d', 0, 0),
(27, 'chinguyen', 'chinguyen@gmail.com', '', '', '4896efdf5c8d4412e56e55e8672d38ba', 0, 0),
(28, 'halcong', 'sdafasf@gmail.com', '', '', 'fb69891f9a45638c8331a3e8f1dbbc1a', 0, 0),
(29, 'baominh', 'baominh@gmail.com', '', '', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0),
(30, 'quyenchi', 'trandangquyen343@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(31, 'quyenchi', 'werewwrer@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(32, 'chinguyen', 'ruagiahafsafanoi@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(33, 'chinguyen', 'trandangqu235yen@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(34, 'trandangsdfquyen', 'trandangqusdfdyen@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(35, 'quyen123', 'ruagisdfahanoi@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(36, 'quyenchi', 'qdmin@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(37, 'chinguyen', 'ruagiafefhanoi@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(38, 'quyenchi', 'qdmin78@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(41, 'chinguyen', 'chinguyen123@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(42, 'fgfd g dfgfd gdf  d', 'khoazero123@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT cho bảng `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
