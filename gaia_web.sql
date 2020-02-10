-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 12, 2019 lúc 05:50 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gaia_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'admin', '5c5ca2ca10bd5d843628909e166609fe', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `agency`
--

INSERT INTO `agency` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Hà Nội', 'Tầng 11, Tòa nhà Detech, số 8C, Tôn Thất Thuyết, Mỹ Đình 2, Hà Nội.', '02422658686'),
(2, 'Hải Phòng', 'Tầng 11, Tòa nhà Detech, số 8C, Tôn Thất Thuyết, Mỹ Đình 2, Hà Nội. Tầng 11, Tòa nhà Detech, số 8C, Tôn Thất Thuyết, Mỹ Đình 2, Hà Nội.', '02422658686'),
(3, 'Đà Nẵng', 'Tầng 11, Tòa nhà Detech, số 8C, Tôn Thất Thuyết, Mỹ Đình 2, Hà Nội.', '02422658686'),
(4, 'TP Hồ Chí Minh', 'Tầng 11, Tòa nhà Detech, số 8C, Tôn Thất Thuyết, Mỹ Đình 2, Hà Nội.', '02422658686'),
(5, 'Cà Mau', 'Tầng 11, Tòa nhà Detech, số 8C, Tôn Thất Thuyết, Mỹ Đình 2, Hà Nội.', '02422658686');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(510) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `product_id`, `name`, `phone`, `created`) VALUES
(1, 'Toi muon hoi quy trinh vay von theo luong', 2, 'Nguyen Thanh Tung', '01666202390', '2018-11-06 14:58:01.576294'),
(2, 'Toi muon hoi quy trinh vay von theo luong', 2, 'Nguyen Thanh Tung', '01666202390', '2018-11-06 15:00:35.762544'),
(3, 'Toi muon hoi quy trinh vay theo hop dong lao dong', 1, 'Nguyen Thanh Tung', '01666202390', '2018-11-06 15:01:14.453408');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zalo` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `policy` text NOT NULL,
  `privacy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `phone`, `address`, `zalo`, `email`, `policy`, `privacy`) VALUES
(1, '02422658686', 'Tầng 11, Tòa nhà Detech, số 8C, Tôn Thất Thuyết, Mỹ Đình 2, Hà Nội.', '02422658686', 'GaiA.App68@gmail.com', '<p>Điều khoản sử dụng</p>\r\n', '<p>Ch&iacute;nh s&aacute;ch bảo mật</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `content`
--

INSERT INTO `content` (`id`, `banner`) VALUES
(1, 'banner1.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `highlight` tinyint(4) NOT NULL COMMENT '1: noi bat, 0: binh thuong',
  `document_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `canonical_url` varchar(255) NOT NULL,
  `robots_meta` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `intro`, `content`, `img`, `highlight`, `document_title`, `meta_description`, `meta_keywords`, `canonical_url`, `robots_meta`, `created_at`) VALUES
(1, 'GaiA ra mắt dịch vụ', '- Khách hàng có thể đặt các dịch vụ của GaiA trên ứng dụng<br />\r\n- Tận hưởng mức giá ưu đãi và nhiều sự kiện, khuyến mại', '<p><strong>Chọn c&ocirc;ng su&acirc;́t đi&ecirc;̀u hòa kh&ocirc;ng phù hợp </strong></p>\r\n\r\n<p>Lựa chọn c&ocirc;ng su&acirc;́t sao cho phù hợp với di&ecirc;̣n tích phòng là đi&ecirc;̀u quan trọng khi bạn chọn mua đi&ecirc;u ho&agrave; nhi&ecirc;̣t đ&ocirc;̣ cho phòng. Th&ecirc;́ nhưng, kh&ocirc;ng phải ai cũng có lựa chọn phù hợp khi mua đi&ecirc;̀u hòa. N&ecirc;́u ph&ograve;ng bạn nhỏ th&igrave; n&ecirc;n chọn mua đi&ecirc;̀u hòa nhỏ khoảng 9.000 BTU/h cho phòng ngủ c&oacute; diện t&iacute;ch khoảng 14m2 - 16m2 hoặc phòng khách r&ocirc;̣ng từ 12m2 - 14m2 . Nếu ph&ograve;ng ngủ bạn lớn m 2 c&oacute; thể chọn nua điều ho&agrave; c&oacute; c&ocirc;ng suất lạnh lớn hơn như 12.000 BTU/h, 18.000 BTU/h hay 24.000 BTU/h. Tránh tình trạng phòng r&ocirc;̣ng chọn đi&ecirc;̀u hòa c&ocirc;ng su&acirc;́t nhỏ, hoặc ngược lại. Vì như th&ecirc;́ d&ecirc;̃ ti&ecirc;u hao đi&ecirc;̣n năng, hại máy, lại kh&ocirc;ng sử dụng h&ecirc;́t được c&ocirc;ng năng của đi&ecirc;̀u hòa cũng như kh&ocirc;ng đảm bảo sức khỏe gia đình bạn.</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Dàn nóng và dàn lạnh đặt quá xa nhau </strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Th&ocirc;ng thường m&ocirc;̣t s&ocirc;́ khách hàng cho rằng vi&ecirc;̣c đ&ecirc;̉ dàn nóng càng xa dàn lạnh càng t&ocirc;́t v&igrave; lo dàn nóng tỏa nhi&ecirc;̣t sẽ g&acirc;y ảnh hưởng đ&ecirc;́n cơ ch&ecirc;́ làm lạnh. Nhưng thực ra kh&ocirc;ng phải như v&acirc;̣y, n&ecirc;́u khoảng cách lắp đặt giữa dàn nóng và dàn lạnh của đi&ecirc;̀u hòa được đi&ecirc;̀u chỉnh g&acirc;̀n nhau thì sẽ là bi&ecirc;̣n pháp lắp đặt t&ocirc;́i ưu đ&ocirc;́i với đi&ecirc;̀u hòa nhi&ecirc;̣t đ&ocirc;̣. Chi&ecirc;̀u dài đường &ocirc;́ng gas kh&ocirc;ng n&ecirc;n vượt quá 5m và ch&ecirc;nh l&ecirc;̣ch đ&ocirc;̣ cao kh&ocirc;ng n&ecirc;n vượt quá 3m. </span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Dàn nóng được đặt ở ngoài trời n&ecirc;n đặt ở nơi thoáng mát, kh&ocirc;ng ngược hướng gió, vị trí phải d&ecirc;̃ ra vào thao tác sửa chữa v&ecirc;̣ sinh máy, &ocirc;́ng gas. </span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Lý do dàn nóng kh&ocirc;ng được đặt ở vị trí ngược gió vì khi có gió th&ocirc;̉i trực ti&ecirc;́p vào b&ecirc;̀ mặt thoát nhi&ecirc;̣t sẽ xu&acirc;́t hi&ecirc;̣n hi&ecirc;̣n tượng &ldquo;đ&ocirc;̉i gió&rdquo;. Nhi&ecirc;̣t tỏa ra từ máy sẽ bị gió ngoài trời th&ocirc;̉i ngược lại b&ecirc;n trong máy, khi&ecirc;́n máy kh&ocirc;ng tỏa nhi&ecirc;̣t được và g&acirc;y ra hi&ecirc;̣n tượng quá nhi&ecirc;̣t, do đó, nhi&ecirc;̣t đ&ocirc;̣ trong phòng kh&ocirc;ng được hạ xu&ocirc;́ng và máy thường xuy&ecirc;n bị tắt th&acirc;́t thường. Đó mới chính là nguy&ecirc;n do ảnh hưởng đ&ecirc;́n cơ ch&ecirc;́ làm lạnh chứ kh&ocirc;ng phải khoảng cách hai dàn. </span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Ngoài ra, dàn lạnh lắp trong phòng phải có chi&ecirc;̀u cao khoảng 2.5m đ&ecirc;̉ nhi&ecirc;̣t đ&ocirc;̣ có th&ecirc;̉ tỏa đi đ&ecirc;̀u khắp phòng. B&ecirc;n cạnh đó, bạn cũng kh&ocirc;ng n&ecirc;n lắp đi&ecirc;̀u hòa g&acirc;̀n các thi&ecirc;́t bị đi&ecirc;̣n tử khác như: Tivi, Tủ lạnh, lò vi sóng,.. Bạn cũng n&ecirc;n tránh đ&ecirc;̉ đi&ecirc;̀u hòa ngay tr&ecirc;n đ&acirc;̀u giường hoặc ngay ch&ocirc;̃ ng&ocirc;̀i khi&ecirc;́n gió th&ocirc;̉i mạnh g&acirc;y khó chịu cũng như có th&ecirc;̉ bị cảm lạnh. </span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Kh&ocirc;ng thường xuy&ecirc;n v&ecirc;̣ sinh máy lạnh </strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Do thói quen cùng với sự b&acirc;̣n r&ocirc;̣n trong c&ocirc;ng vi&ecirc;̣c mà g&acirc;̀n như các khách hàng qu&ecirc;n đi vi&ecirc;̣c chăm sóc cho chi&ecirc;́c đi&ecirc;̀u hòa của mình. Vi&ecirc;̣c bảo dưỡng đi&ecirc;̀u hòa định kỳ giúp cho đi&ecirc;̀u hòa hoạt đ&ocirc;̣ng th&ocirc;ng su&ocirc;́t hơn, b&ecirc;̀n bỉ hơn và kh&ocirc;ng gặp trở ngại trong quá trình sử dụng. </span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Trước khi v&ecirc;̣ sinh đi&ecirc;̀u hòa nhi&ecirc;̣t đ&ocirc;̣ bạn c&acirc;̀n ngắt ngu&ocirc;̀n đi&ecirc;̣n đ&ecirc;̉ đảm bảo an toàn. Sau đó, bạn n&ecirc;n dùng giẻ sạch hoặc túi nilon che kín ph&acirc;̀n bo mạch. Tránh tuy&ecirc;̣t đ&ocirc;́i kh&ocirc;ng được đ&ecirc;̉ nước bắn vào h&ocirc;̣p đựng bo mạch đi&ecirc;̣n tử, d&ecirc;̃ d&acirc;̃n đ&ecirc;́n vi&ecirc;̣c bo mạch bị hỏng. Khi bo mạch hỏng thì bắt bu&ocirc;̣c bạn phải gọi thợ đ&ecirc;́n sửa chữa, do đó vi&ecirc;̣c đ&ecirc;̉ bo mạch kh&ocirc;ng bị bắn nước vào là cực kỳ quan trọng. </span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">B&ecirc;n cạnh đó, bạn n&ecirc;n v&ecirc;̣ sinh lưới lọc thường xuy&ecirc;n n&ecirc;́u th&acirc;́y nó bám bụi b&acirc;̉n, rửa dàn nóng và dàn lạnh định kỳ 6 tháng 1 l&acirc;̀n hoặc 1 năm 1 l&acirc;̀n. Vi&ecirc;̣c v&ecirc;̣ sinh đi&ecirc;̀u hòa nhi&ecirc;̣t đ&ocirc;̣ định kỳ giúp bạn loại bỏ những b&ecirc;̣nh v&ecirc;̀ đường h&ocirc; h&acirc;́p cũng như giảm vi&ecirc;̣c ti&ecirc;u hao đi&ecirc;̣n năng và n&acirc;ng cao tu&ocirc;̉i thọ của đi&ecirc;̀u hòa. </span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Sau những gì chúng t&ocirc;i đã n&ecirc;u ở tr&ecirc;n n&ecirc;́u bạn v&acirc;̃n còn thắc mắc và lúng túng trong̀ vi&ecirc;̣c lắp đặt, chăm sóc đi&ecirc;̀u hòa thì hãy li&ecirc;n h&ecirc;̣ chúng t&ocirc;i, ứng dụng GaiA của chúng t&ocirc;i sẽ nhanh chóng giúp bạn giải đáp thắc mắc và mang đ&ecirc;́n cho bạn những người thợ chăm sóc, lắp đặt đi&ecirc;̀u hòa m&ocirc;̣t cách nhanh chóng và kịp thời </span></p>\r\n', 'news_1.jpg', 1, 'GaiA ra mắt dịch vụ', 'GaiA ra mắt dịch vụ', 'GaiA, GaiA ra mắt', 'https://gaia.net.vn/', 'noindex, nofollow', '2019-05-13 01:46:19'),
(2, 'GaiA ra mắt dịch vụ', '- Khách hàng có thể đặt các dịch vụ của GaiA trên ứng dụng<br /><br />\r\n- Tận hưởng mức giá ưu đãi và nhiều sự kiện, khuyến mại', '<p>- Kh&aacute;ch h&agrave;ng c&oacute; thể đặt c&aacute;c dịch vụ của GaiA tr&ecirc;n ứng dụng - Tận hưởng mức gi&aacute; ưu đ&atilde;i v&agrave; nhiều sự kiện, khuyến mại</p>\r\n', 'news_2.jpg', 0, '', '', '', '', '', '2019-05-13 01:46:19'),
(3, 'GaiA ra mắt dịch vụ', '- Khách hàng có thể đặt các dịch vụ của GaiA trên ứng dụng<br />\r\n- Tận hưởng mức giá ưu đãi và nhiều sự kiện, khuyến mại', '<p>- Kh&aacute;ch h&agrave;ng c&oacute; thể đặt c&aacute;c dịch vụ của GaiA tr&ecirc;n ứng dụng - Tận hưởng mức gi&aacute; ưu đ&atilde;i v&agrave; nhiều sự kiện, khuyến mại</p>\r\n', 'news_3.jpg', 1, '', '', '', '', '', '2019-05-13 01:46:19'),
(4, 'GaiA ra mắt dịch vụ', '- Khách hàng có thể đặt các dịch vụ của GaiA trên ứng dụng<br />\r\n- Tận hưởng mức giá ưu đãi và nhiều sự kiện, khuyến mại', '<p>- Kh&aacute;ch h&agrave;ng c&oacute; thể đặt c&aacute;c dịch vụ của GaiA tr&ecirc;n ứng dụng - Tận hưởng mức gi&aacute; ưu đ&atilde;i v&agrave; nhiều sự kiện, khuyến mại</p>\r\n', 'news_4.jpg', 0, '', '', '', '', '', '2019-05-13 01:46:19'),
(5, 'GaiA ra mắt dịch vụ', '- Khách hàng có thể đặt các dịch vụ của GaiA trên ứng dụng<br />\r\n- Tận hưởng mức giá ưu đãi và nhiều sự kiện, khuyến mại', '<p>- Kh&aacute;ch h&agrave;ng c&oacute; thể đặt c&aacute;c dịch vụ của GaiA tr&ecirc;n ứng dụng - Tận hưởng mức gi&aacute; ưu đ&atilde;i v&agrave; nhiều sự kiện, khuyến mại</p>\r\n', 'news_5.jpg', 0, '', '', '', '', '', '2019-05-13 01:46:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `intro` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `content`, `img`, `intro`) VALUES
(1, 'Dịch vụ giúp việc theo giờ', '<p style=\"text-align:justify\"><span style=\"color:#000000\"><strong><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">I. Th&ocirc;ng tin dịch vụ&nbsp;</span></span></strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; Dịch vụ Gi&uacute;p việc theo giờ bao gồm c&aacute;c dịch vụ: Gi&uacute;p việc 1 giờ, Gi&uacute;p việc 2 giờ, Gi&uacute;p việc 3 giờ, Gi&uacute;p việc cả ng&agrave;y. Kh&aacute;ch h&agrave;ng c&oacute; thể lựa chọn c&aacute;c Dịch vụ ph&ugrave; hợp với thời gian của gia đ&igrave;nh, văn ph&ograve;ng nơi m&igrave;nh l&agrave;m việc.&nbsp;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp; GAIA cung cấp c&aacute;c dịch vụ như sau:</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Dọn vệ sinh nh&agrave; cửa: ph&ograve;ng&nbsp; ph&ograve;ng ngủ, nh&agrave; bếp, nh&agrave; vệ sinh, đổ r&aacute;c.</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Sơ chế thức ăn, rửa ch&eacute;n b&aacute;t&nbsp;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Giặt quần &aacute;o, phơi đồ, gấp đồ.</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">C&aacute;c c&ocirc;ng việc kh&aacute;c theo y&ecirc;u cầu của kh&aacute;ch.</span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;GAIA cung cấp đến Kh&aacute;ch h&agrave;ng nhiều lựa chọn dịch vụ với gi&aacute; cả hợp l&yacute; v&agrave; đội ngũ lao động được tuyển chon v&agrave; đ&agrave;o tạo b&agrave;i bản về chuy&ecirc;n m&ocirc;n v&agrave; nghiệp vụ.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><strong><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">II. Th&ocirc;ng tin gi&aacute; dịch vụ</span></span></strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;GAIA cung cấp gi&aacute; dịch vụ hợp l&yacute; v&agrave; minh bạch ph&ugrave; hợp với thị trường</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Gi&uacute;p việc 1 giờ: 60000 đồng + Ph&iacute; tăng gi&aacute; ng&agrave;y Lễ, tết</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Gi&uacute;p việc 2 giờ: 120000 đồng + Ph&iacute; tăng gi&aacute; ng&agrave;y Lễ, tết</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Gi&uacute;p việc 3 giờ: 150000 đồng +&nbsp;Ph&iacute; tăng gi&aacute; ng&agrave;y Lễ, tết</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Gi&iacute;p việc cả ng&agrave;y: 200000 đồng +&nbsp;Ph&iacute; tăng gi&aacute; ng&agrave;y Lễ, tết</span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; Ph&iacute; tăng gi&aacute; ng&agrave;y Lễ, tết dao động kh&ocirc;ng qu&aacute; 10% gi&aacute; dịch vụ, Kh&aacute;ch h&agrave;ng c&oacute; thể y&ecirc;n t&acirc;m sử dụng dịch vụ của GAIA.&nbsp;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;Kh&aacute;ch h&agrave;ng sẽ được hưởng c&aacute;c Chương tr&igrave;nh khuyến mại, giảm gi&aacute; của GAIA&nbsp;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><strong><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">III. Th&ocirc;ng tin hỗ trợ</span></span></strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;Trong qu&aacute; tr&igrave;nh sử dụng dịch vụ của GAIA, Kh&aacute;ch h&agrave;ng c&oacute; thắc mắc hay kh&ocirc;ng h&agrave;i l&ograve;ng về dịch vụ m&agrave; GAIA cung cấp c&oacute; thể li&ecirc;n hệ đến Tổng đ&agrave;i hỗ trợ:&nbsp;<strong>02422.65.8686</strong>&nbsp;để được GAIA hỗ trợ v&agrave; giải đ&aacute;p thắc mắc.&nbsp;</span></span></span></p>\r\n', 'GaiaApp_Banner600x400_1.png', 'Dịch vụ giúp việc theo giờ'),
(2, 'Dịch vụ điện nước', '<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\"><strong>I. Th&ocirc;ng tin dịch vụ</strong></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;Với dịch vu điện nước, GAIA cung cấp đến Kh&aacute;ch h&agrave;ng c&aacute;c dịch vụ như sau</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Sửa chữa điện nước</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Bảo tr&igrave;, bảo dưỡng c&aacute;c thiết bị điện</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Tư vấn, thiết kế lắp đặt đường ống nước</span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; Với mỗi dịch vụ GAIA cung cấp sẽ c&oacute; danh s&aacute;ch c&aacute;c đầu mục c&ocirc;ng việc v&agrave; k&egrave;m theo gi&aacute; vật tư để Kh&aacute;ch h&agrave;ng tham khảo. Khi Kh&aacute;ch h&agrave;ng đặt dịch vụ, Kỹ thuật vi&ecirc;n của GAIA sẽ di chuyển đến địa chỉ Kh&aacute;ch h&agrave;ng đặt dịch vụ. Kỹ thuật vi&ecirc;n sẽ thực hiện Khảo s&aacute;t v&agrave; đưa ra bẳng b&aacute;o gi&aacute; chi tiết v&agrave; gửi đến Kh&aacute;ch h&agrave;ng đẻ Kh&aacute;ch h&agrave;ng nắm được th&ocirc;ng tin. Kh&aacute;ch h&agrave;ng c&oacute; thể từ chối tiếp tục sử dụng dịch vụ do cảm thấy gi&aacute; cả Kỹ thuật vi&ecirc;n kh&ocirc;ng hợp l&yacute; hay thấy c&oacute; biểu hiện Kỹ thuật vi&ecirc;n cố t&igrave;nh n&acirc;ng gi&aacute; qu&aacute; cao. Kh&aacute;ch h&agrave;ng c&oacute; thể y&ecirc;n t&acirc;m về gi&aacute; cả GAIA cung cấp, trường hơp GAIA n&ecirc;u tr&ecirc;n chỉ c&oacute; thể l&agrave; trường hợp ngoại lệ.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\"><strong>II. Th&ocirc;ng tin hỗ trợ</strong></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;Trong qu&aacute; tr&igrave;nh sử dụng dịch vụ của GAIA, Kh&aacute;ch h&agrave;ng c&oacute; thắc mắc hay kh&ocirc;ng h&agrave;i l&ograve;ng về dịch vụ m&agrave; GAIA cung cấp c&oacute; thể li&ecirc;n hệ đến Tổng đ&agrave;i hỗ trợ:&nbsp;<strong>02422.65.8686</strong>&nbsp;để được GAIA hỗ trợ v&agrave; giải đ&aacute;p thắc mắc.&nbsp;</span></span></span></p>', 'GaiaApp_Banner600x400_2.png', 'Hạn mức vay lên tới 70 triệu đồng. Khách hàng đang có hợp đồng lao động (thời hạn trên 1 năm).....'),
(3, 'Dịch vụ điện lạnh', '<h2 style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">I. Th&ocirc;ng tin dịch vụ</span></span></span></h2>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;Với dịch vu điện lạnh, GAIA cung cấp đến Kh&aacute;ch h&agrave;ng c&aacute;c dịch vụ như sau</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Sửa chữa điều h&ograve;a, tủ lạnh</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Bảo tr&igrave;, bảo dưỡng c&aacute;c thiết bị điện lạnh</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Tư vấn, thiết kế lắp đặt ddieuf h&ograve;a kh&ocirc;ng kh&iacute;&nbsp;</span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; Với mỗi dịch vụ GAIA cung cấp sẽ c&oacute; danh s&aacute;ch c&aacute;c đầu mục c&ocirc;ng việc v&agrave; k&egrave;m theo gi&aacute; vật tư để Kh&aacute;ch h&agrave;ng tham khảo. Khi Kh&aacute;ch h&agrave;ng đặt dịch vụ, Kỹ thuật vi&ecirc;n của GAIA sẽ di chuyển đến địa chỉ Kh&aacute;ch h&agrave;ng đặt dịch vụ. Kỹ thuật vi&ecirc;n sẽ thực hiện Khảo s&aacute;t v&agrave; đưa ra bẳng b&aacute;o gi&aacute; chi tiết v&agrave; gửi đến Kh&aacute;ch h&agrave;ng đẻ Kh&aacute;ch h&agrave;ng nắm được th&ocirc;ng tin. Kh&aacute;ch h&agrave;ng c&oacute; thể từ chối tiếp tục sử dụng dịch vụ do cảm thấy gi&aacute; cả Kỹ thuật vi&ecirc;n kh&ocirc;ng hợp l&yacute; hay thấy c&oacute; biểu hiện Kỹ thuật vi&ecirc;n cố t&igrave;nh n&acirc;ng gi&aacute; qu&aacute; cao. Kh&aacute;ch h&agrave;ng c&oacute; thể y&ecirc;n t&acirc;m về gi&aacute; cả GAIA cung cấp, trường hơp GAIA n&ecirc;u tr&ecirc;n chỉ c&oacute; thể l&agrave; trường hợp ngoại lệ.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">II. Th&ocirc;ng tin hỗ trợ</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;Trong qu&aacute; tr&igrave;nh sử dụng dịch vụ của GAIA, Kh&aacute;ch h&agrave;ng c&oacute; thắc mắc hay kh&ocirc;ng h&agrave;i l&ograve;ng về dịch vụ m&agrave; GAIA cung cấp c&oacute; thể li&ecirc;n hệ đến Tổng đ&agrave;i hỗ trợ:&nbsp;02422.65.8686&nbsp;để được GAIA hỗ trợ v&agrave; giải đ&aacute;p thắc mắc.&nbsp;</span></span></span></p>', 'GaiaApp_Banner600x400_3.png', 'Hạn mức vay lên tới 70 triệu đồng. Khách hàng đang có hợp đồng lao động (thời hạn trên 1 năm).....'),
(4, 'Gói dịch vụ định kỳ', '<p style=\"text-align:justify\"><span style=\"font-family:times new roman,times,serif\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><strong>I. Th&ocirc;ng tin dịch vụ cung cấp</strong></span></span></span></p>', 'GaiaApp_Banner600x400_4.png', 'Hạn mức vay lên tới 70 triệu đồng. Khách hàng đang có hợp đồng lao động (thời hạn trên 1 năm).....'),
(5, 'Gói dịch vụ thuê bao', '<p><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">GAIA l&agrave; ứng dụng cung cấp c&aacute;c dịch vụ Gi&uacute;p việc theo giờ; Vệ sinh văn ph&ograve;ng; Sửa chữa, bảo dưỡng, tư vấn, lắp đặt c&aacute;c thiết bị điện lạnh, điện nước trong gia đ&igrave;nh;... Mọi thao t&aacute;c nằm gọn trong chiếc điện thoại th&ocirc;ng minh, người d&ugrave;ng chỉ cần v&agrave;i bước đơn giản tr&ecirc;n m&agrave;n h&igrave;nh điện thoại đ&atilde; c&oacute; thể t&igrave;m được người cung cấp dịch vụ một c&aacute;ch nhanh ch&oacute;ng, thuận tiện.</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Mục ti&ecirc;u của ch&uacute;ng t&ocirc;i l&agrave;: Mang lại cho người ti&ecirc;u d&ugrave;ng sự tiện lợi khi sử dung. Minh bạch trong gi&aacute; cả. Đa dạng về dịch vụ. Hạn chế được rủi ro trong khi thu&ecirc; dịch vụ. L&yacute; lịch của người lao động được kiểm tra r&otilde; r&agrave;ng,... C&oacute; GAIA mọi việc trở n&ecirc;n đơn giản v&agrave; dẽ d&agrave;ng hơn bao giờ hết!</span></span></p>', 'GaiaApp_Banner600x400_5.png', 'Hạn mức vay lên tới 70 triệu đồng. Khách hàng đang có hợp đồng lao động (thời hạn trên 1 năm).....'),
(6, 'Dịch vụ khác', '<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">GAIA l&agrave; ứng dụng cung cấp c&aacute;c dịch vụ Gi&uacute;p việc theo giờ; Vệ sinh văn ph&ograve;ng; Sửa chữa, bảo dưỡng, tư vấn, lắp đặt c&aacute;c thiết bị điện lạnh, điện nước trong gia đ&igrave;nh;... Mọi thao t&aacute;c nằm gọn trong chiếc điện thoại th&ocirc;ng minh, người d&ugrave;ng chỉ cần v&agrave;i bước đơn giản tr&ecirc;n m&agrave;n h&igrave;nh điện thoại đ&atilde; c&oacute; thể t&igrave;m được người cung cấp dịch vụ một c&aacute;ch nhanh ch&oacute;ng, thuận tiện.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><span style=\"font-family:times new roman,times,serif\">Mục ti&ecirc;u của ch&uacute;ng t&ocirc;i l&agrave;: Mang lại cho người ti&ecirc;u d&ugrave;ng sự tiện lợi khi sử dung. Minh bạch trong gi&aacute; cả. Đa dạng về dịch vụ. Hạn chế được rủi ro trong khi thu&ecirc; dịch vụ. L&yacute; lịch của người lao động được kiểm tra r&otilde; r&agrave;ng,... C&oacute; GAIA mọi việc trở n&ecirc;n đơn giản v&agrave; dẽ d&agrave;ng hơn bao giờ hết!</span></span></span></p>\r\n\r\n<p><span style=\"background-color:rgb(247, 247, 247); color:rgb(115, 135, 156); font-family:helvetica neue,roboto,arial,droid sans,sans-serif; font-size:14px\"><!--</span--></span></p>', 'GaiaApp_Banner600x400_6.png', 'Hạn mức vay lên tới 70 triệu đồng. Khách hàng đang có hợp đồng lao động (thời hạn trên 1 năm).....');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1: KH, 2: KTV, 3: CTV',
  `parent_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `name`, `type`, `parent_id`, `content`, `level`) VALUES
(1, 'Khuyến mại giảm giá', 1, 0, '', 1),
(2, 'Điểm thưởng', 1, 0, '', 1),
(3, 'Hủy dịch vụ', 1, 0, '', 1),
(4, 'Thanh toán', 1, 0, '', 1),
(5, 'Đặt dịch vụ định kỳ', 1, 0, '', 1),
(6, 'Độ tin cậy', 1, 0, '', 1),
(7, 'Đặt dịch vụ', 1, 0, '', 1),
(8, 'Các hoạt động', 1, 0, '', 1),
(9, 'Khách hàng đặt dịch vụ ', 1, 0, '', 1),
(10, 'Khuyến mại giảm giá', 1, 0, '', 1),
(11, 'Điểm thưởng ', 3, 0, '', 1),
(12, 'Thanh toán ', 3, 0, '', 1),
(13, 'Công việc của CTV', 3, 0, '', 1),
(14, 'Kích hoạt nhận việc ', 3, 0, '', 1),
(15, 'Địa điểm nộp hồ sơ', 3, 0, '', 1),
(16, 'Hồ sơ cần thiết ', 3, 0, '', 1),
(17, 'Điều kiện nhận việc ', 3, 0, '', 1),
(18, 'Lợi ích trở thành CTV', 3, 0, '', 1),
(19, 'Điểm thưởng ', 2, 0, '', 1),
(20, 'Thanh toán ', 2, 0, '', 1),
(21, 'Công việc của KTV', 2, 0, '', 1),
(22, 'Kích hoạt nhận việc ', 2, 0, '', 1),
(23, 'Địa điểm nộp hồ sơ', 2, 0, '', 1),
(24, 'Hồ sơ cần thiết ', 2, 0, '', 1),
(25, 'Điều kiện nhận việc ', 2, 0, '', 1),
(26, 'Lợi ích trở thành KTV', 2, 0, '', 1),
(27, 'GAIA là gì?', 1, 0, '', 1),
(28, 'Giới thiệu GaiA', 1, 27, '<p>Nội dung giới thiệu GaiA</p>\r\n', 2),
(29, 'Các loại dịch vụ', 1, 27, 'Nội dung các loại dịch vụ', 2),
(30, 'test', 1, 26, '<p>test</p>\r\n', 2),
(31, '1', 2, 26, '<p>1</p>\r\n', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruitment`
--

CREATE TABLE `recruitment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `google_form` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `recruitment`
--

INSERT INTO `recruitment` (`id`, `content`, `google_form`) VALUES
(1, '<p>th&ocirc;ng tin tuyển dụng</p>\r\n', '<iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLScfx4THHCWzWRvAi2SBC-UMZ3s7nnzpXYV7w7qtY7MCDt5uFA/viewform?embedded=true\" width=\"640\" height=\"825\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\">Đang tải...</iframe>');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `agency`
--
ALTER TABLE `agency`
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
-- Chỉ mục cho bảng `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
