-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2023 lúc 02:14 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `green_place`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `browses`
--

CREATE TABLE `browses` (
  `id_browse` int(11) NOT NULL,
  `placeName` varchar(255) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `id_place_type` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `browse_crt`
--

CREATE TABLE `browse_crt` (
  `id_crt` int(11) NOT NULL,
  `criteria` varchar(1000) NOT NULL,
  `id_browse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `browse_img`
--

CREATE TABLE `browse_img` (
  `id_img` int(11) NOT NULL,
  `id_browse` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_place`, `content`, `date`) VALUES
(35, 1, 1, 'Ok', '2023-05-18'),
(36, 5, 1, 'Ok', '2023-05-18'),
(39, 5, 3, 'Ok', '2023-05-18'),
(40, 5, 46, 'Ok', '2023-05-18'),
(41, 4, 46, 'Ok', '2023-05-18'),
(42, 4, 2, 'Ok', '2023-05-18'),
(43, 3, 2, 'Ok', '2023-05-18'),
(44, 3, 3, 'Ok', '2023-05-18'),
(48, 3, 1, '', '2023-05-18'),
(49, 3, 46, 'Ok', '2023-05-18'),
(50, 6, 56, 'Ok', '2023-05-21'),
(52, 58, 51, '', '2023-05-24'),
(53, 1, 53, 'Ok', '2023-05-26'),
(54, 1, 51, 'Ok', '2023-05-26'),
(55, 1, 54, 'Ok', '2023-05-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `criterias`
--

CREATE TABLE `criterias` (
  `id_criteria` int(11) NOT NULL,
  `criteria` varchar(1000) NOT NULL,
  `id_place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `criterias`
--

INSERT INTO `criterias` (`id_criteria`, `criteria`, `id_place`) VALUES
(35, 'Đảm bảo vệ sinh an toàn thực phẩm', 1),
(36, 'Không gian sạch sẽ thoáng mát', 1),
(37, 'Khu vực vệ sinh riêng tư, sạch sẽ', 1),
(38, 'Không ô nhiễm với môi trường', 1),
(39, 'Nơi đỗ xe rộng rãi', 1),
(40, 'Không ô nhiễm tiếng ồn', 1),
(41, 'Đảm bảo vệ sinh an toàn thực phẩm', 2),
(42, 'Chăm sóc phục vụ khách hàng nhiệt tình', 2),
(43, 'An toàn vệ sinh', 2),
(44, 'Không ô nhiễm với môi trường', 2),
(45, 'Phân loại rác thải', 3),
(46, 'Không gian sạch sẽ thoáng mát', 3),
(47, 'Nơi đỗ xe rộng rãi', 3),
(48, 'An toàn vệ sinh', 3),
(76, 'Phân loại rác thải', 46),
(77, 'Không gian sạch sẽ thoáng mát', 46),
(78, 'Chăm sóc phục vụ khách hàng nhiệt tình', 46),
(79, 'Khu vực vệ sinh riêng tư, sạch sẽ', 46),
(80, 'Nơi đỗ xe rộng rãi', 46),
(81, 'Không ô nhiễm với môi trường', 46),
(90, 'Phân loại rác thải', 49),
(91, 'Không gian sạch sẽ thoáng mát', 49),
(92, 'Chăm sóc phục vụ khách hàng nhiệt tình', 49),
(93, 'Khu vực vệ sinh riêng tư, sạch sẽ', 49),
(94, 'Nơi đỗ xe rộng rãi', 49),
(95, 'Không ô nhiễm với môi trường', 49),
(96, 'Không gian sạch sẽ thoáng mát', 50),
(97, 'Nơi đỗ xe rộng rãi', 50),
(98, 'Không ô nhiễm với môi trường', 50),
(99, 'Không ô nhiễm tiếng ồn', 50),
(100, 'Không gian sạch sẽ thoáng mát', 51),
(101, 'Chăm sóc phục vụ khách hàng nhiệt tình', 51),
(102, 'Khu vực vệ sinh riêng tư, sạch sẽ', 51),
(103, 'An toàn vệ sinh', 51),
(104, 'Không ô nhiễm với môi trường', 51),
(105, 'Không ô nhiễm tiếng ồn', 51),
(112, 'Đảm bảo vệ sinh an toàn thực phẩm', 53),
(113, 'Không gian sạch sẽ thoáng mát', 53),
(114, 'Chăm sóc phục vụ khách hàng nhiệt tình', 53),
(115, 'Khu vực vệ sinh riêng tư, sạch sẽ', 53),
(116, 'An toàn vệ sinh', 53),
(117, 'Không ô nhiễm với môi trường', 53),
(118, 'Đảm bảo vệ sinh an toàn thực phẩm', 54),
(119, 'Không gian sạch sẽ thoáng mát', 54),
(120, 'Chăm sóc phục vụ khách hàng nhiệt tình', 54),
(121, 'Khu vực vệ sinh riêng tư, sạch sẽ', 54),
(122, 'Sử dụng vật liệu thân thiện với môi trường', 54),
(123, 'An toàn vệ sinh', 54),
(124, 'Không ô nhiễm với môi trường', 54),
(125, 'Đảm bảo vệ sinh an toàn thực phẩm', 55),
(126, 'Chăm sóc phục vụ khách hàng nhiệt tình', 55),
(127, 'Khu vực vệ sinh riêng tư, sạch sẽ', 55),
(128, 'Nơi đỗ xe rộng rãi', 55),
(129, 'Sử dụng vật liệu thân thiện với môi trường', 55),
(130, 'Không ô nhiễm với môi trường', 55),
(131, 'Không ô nhiễm tiếng ồn', 55),
(132, 'Không gian sạch sẽ thoáng mát', 56),
(133, 'Chăm sóc phục vụ khách hàng nhiệt tình', 56),
(134, 'Khu vực vệ sinh riêng tư, sạch sẽ', 56),
(135, 'Sử dụng vật liệu thân thiện với môi trường', 56),
(136, 'Không ô nhiễm với môi trường', 56),
(137, 'Không ô nhiễm tiếng ồn', 56),
(138, 'Không gian sạch sẽ thoáng mát', 57),
(139, 'Khu vực vệ sinh riêng tư, sạch sẽ', 57),
(140, 'Nơi đỗ xe rộng rãi', 57),
(141, 'Không ô nhiễm với môi trường', 57),
(142, 'Đảm bảo vệ sinh an toàn thực phẩm', 58),
(143, 'Phân loại rác thải', 58),
(144, 'Không gian sạch sẽ thoáng mát', 58),
(145, 'Chăm sóc phục vụ khách hàng nhiệt tình', 58),
(146, 'Khu vực vệ sinh riêng tư, sạch sẽ', 58),
(147, 'Nơi đỗ xe rộng rãi', 58),
(148, 'Không ô nhiễm với môi trường', 58),
(149, 'Không gian sạch sẽ thoáng mát', 59),
(150, 'Khu vực vệ sinh riêng tư, sạch sẽ', 59),
(151, 'Nơi đỗ xe rộng rãi', 59),
(152, 'Sử dụng vật liệu thân thiện với môi trường', 59),
(153, 'Không ô nhiễm với môi trường', 59),
(154, 'Không ô nhiễm tiếng ồn', 59),
(156, 'Đảm bảo vệ sinh an toàn thực phẩm', 63),
(157, 'Không gian sạch sẽ thoáng mát', 63),
(158, 'Chăm sóc phục vụ khách hàng nhiệt tình', 63),
(159, 'Khu vực vệ sinh riêng tư, sạch sẽ', 63),
(160, 'Nơi đỗ xe rộng rãi', 63),
(161, 'An toàn vệ sinh', 63),
(162, 'Không ô nhiễm với môi trường', 63),
(163, 'Đảm bảo vệ sinh an toàn thực phẩm', 64),
(164, 'Không gian sạch sẽ thoáng mát', 64),
(165, 'Chăm sóc phục vụ khách hàng nhiệt tình', 64),
(166, 'Khu vực vệ sinh riêng tư, sạch sẽ', 64),
(167, 'Nơi đỗ xe rộng rãi', 64),
(168, 'Sử dụng vật liệu thân thiện với môi trường', 64),
(169, 'Không ô nhiễm với môi trường', 64),
(170, 'Phân loại rác thải', 65),
(171, 'Không gian sạch sẽ thoáng mát', 65),
(172, 'Chăm sóc phục vụ khách hàng nhiệt tình', 65),
(173, 'Nơi đỗ xe rộng rãi', 65),
(174, 'Sử dụng vật liệu thân thiện với môi trường', 65),
(175, 'An toàn vệ sinh', 65),
(176, 'Không ô nhiễm với môi trường', 65),
(177, 'Không gian sạch sẽ thoáng mát', 66),
(178, 'Chăm sóc phục vụ khách hàng nhiệt tình', 66),
(179, 'Khu vực vệ sinh riêng tư, sạch sẽ', 66),
(180, 'Nơi đỗ xe rộng rãi', 66),
(181, 'An toàn vệ sinh', 66),
(182, 'Không ô nhiễm với môi trường', 66),
(183, 'Đảm bảo vệ sinh an toàn thực phẩm', 67),
(184, 'Không gian sạch sẽ thoáng mát', 67),
(185, 'Chăm sóc phục vụ khách hàng nhiệt tình', 67),
(186, 'Khu vực vệ sinh riêng tư, sạch sẽ', 67),
(187, 'Nơi đỗ xe rộng rãi', 67),
(188, 'Sử dụng vật liệu thân thiện với môi trường', 67),
(189, 'An toàn vệ sinh', 67),
(190, 'Không ô nhiễm với môi trường', 67),
(191, 'Không gian sạch sẽ thoáng mát', 68),
(192, 'Khu vực vệ sinh riêng tư, sạch sẽ', 68),
(193, 'Nơi đỗ xe rộng rãi', 68),
(194, 'Không ô nhiễm với môi trường', 68),
(195, 'Không ô nhiễm tiếng ồn', 68),
(210, 'Phân loại rác thải', 83),
(211, 'Không gian sạch sẽ thoáng mát', 83),
(212, 'Chăm sóc phục vụ khách hàng nhiệt tình', 83),
(213, 'Sử dụng vật liệu thân thiện với môi trường', 83),
(214, 'Không ô nhiễm với môi trường', 83),
(215, 'Không ô nhiễm tiếng ồn', 83);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id_image`, `id_place`, `image`) VALUES
(1, 1, 'cf2.jpg'),
(2, 1, 'cf3.jpg'),
(3, 2, 'nh2.jpg'),
(4, 2, 'nh3.jpg'),
(5, 3, 'dl2.jpg'),
(6, 3, 'dl3.jpg'),
(19, 46, 'dl7.png'),
(20, 46, 'dl6.jpg'),
(21, 46, 'dl5.jpg'),
(78, 49, 'Quý Hà_thap onsen.jpg'),
(79, 49, 'nui-than-tai.jpg'),
(80, 49, 'image1-5092.jpg'),
(81, 49, 'khu-to-chim-tour-nui-than-tai.jpg'),
(82, 50, 'ho-xanh-da-nang-1.jpg'),
(84, 50, 'ho-xanh-da-nang-2.jpg'),
(85, 50, 'ho-xanh-da-nang-00_1631525649.jpg'),
(86, 50, 'ho-xanh-da-nang-2_1631522729.webp'),
(107, 51, 'ca-phe-loi-nho-914828.jpg'),
(108, 51, 'Ca-phe-Loi-Nho-03.jpg'),
(109, 51, 'Ca-phe-Loi-Nho-01.jpg'),
(127, 53, 'retreta444.jpg'),
(128, 53, 'retreat33333.jpg'),
(129, 53, 'nha-hang-son-tra-retreat222.jpg'),
(130, 53, 'retreat111.jpg'),
(131, 53, 'Thumb (1).webp'),
(132, 54, 'madame555.jpg'),
(133, 54, 'madame444.jpg'),
(134, 54, 'madame333.jpg'),
(135, 54, 'madame222.jpg'),
(136, 55, 'win444.jpg'),
(137, 55, 'wind333.jpg'),
(138, 55, 'wind2222.jpeg'),
(139, 56, 'nia555.webp'),
(140, 56, 'nia444.jpg'),
(141, 56, 'nia333.jpg'),
(142, 56, 'nia2222.jpg'),
(143, 57, 'suoi444.jpg'),
(144, 57, 'suoi333.jpg'),
(145, 57, 'hoa222.jpg'),
(146, 58, 'bana7.jpg'),
(147, 58, 'bana6.jpg'),
(148, 58, 'bana5.jpg'),
(149, 58, 'bana4.jpg'),
(150, 58, 'bana3.jpg'),
(151, 58, 'bana2.jpg'),
(152, 59, 'an-nhien-farm-5-1.jpg'),
(153, 59, 'an-nhien-farm-1-1.jpg'),
(154, 59, 'An-Nhien-Farm-4.jpg'),
(155, 59, 'an-nhien-farm-da-nang4-1024x684.webp'),
(157, 63, 'mana55.jpg'),
(158, 63, 'mana44.jpg'),
(159, 63, 'mana333.jpg'),
(160, 63, 'mana222.jpg'),
(161, 64, 'truc55.jpg'),
(162, 64, 'truc33.jpeg'),
(163, 64, 'truc33.webp'),
(164, 64, 'truc22.jpg'),
(165, 65, 'golem4.jpg'),
(166, 65, 'golem3.jpg'),
(167, 65, 'golem2.jpg'),
(168, 66, 'ruby4.jpeg'),
(169, 66, 'ruby3.jpg'),
(170, 66, 'ruby2.jpg'),
(171, 67, 'hoa4.jpg'),
(172, 67, 'hoa3.jpg'),
(173, 67, 'hoa2.jpg'),
(174, 68, 'tiensa6.jpg'),
(175, 68, 'tiensa5.jpg'),
(176, 68, 'tien4.webp'),
(177, 68, 'tiensa3.jpg'),
(178, 68, 'tiensa2.jpg'),
(193, 83, 'trinh4.jpg'),
(194, 83, 'trinh3.jpg'),
(195, 83, 'trinh2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `places`
--

CREATE TABLE `places` (
  `id_place` int(11) NOT NULL,
  `placeName` varchar(255) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  `star` float NOT NULL,
  `id_place_type` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `places`
--

INSERT INTO `places` (`id_place`, `placeName`, `lat`, `lng`, `address`, `image`, `description`, `status`, `star`, `id_place_type`, `id_user`) VALUES
(1, 'Green Brown Coffee', '16.068080', '108.182698', '872 Trần Cao Vân, Thanh Khê Đông, Thanh Khê, Đà Nẵng', 'cf1.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptas quasi eveniet, at nostrum debitis vitae perferendis a libero, veritatis quidem, unde consequatur beatae itaque ipsa? Id consequatur nobis impedit. Iusto ullam iure earum, nam sed eum accusamus labore suscipit exercitationem ab natus laborum, tempore itaque molestias magnam illum consequatur nostrum cupiditate. Tempore excepturi dolorem sed exercitationem velit? Accusamus, omnis! Id, deleniti esse? Sapiente non enim eius natus possimus recusandae ab iste magni adipisci ratione assumenda eligendi voluptatibus dignissimos, harum rem accusantium maxime perspiciatis culpa aut vel aliquid omnis beatae! Delectus, harum saepe perspiciatis voluptates nulla aperiam at nihil sint adipisci maiores recusandae nostrum minus molestias est velit natus asperiores doloribus illo eos nisi eius eligendi accusamus vitae odio. Autem!', 0, 4.7, 1, 6),
(2, 'Khu Văn hóa Du lịch Không Gian Xưa', '16.066239', '108.189441', '402 Điện Biên Phủ, Hòa Khê, Thanh Khê, Đà Nẵng', 'nh1.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptas quasi eveniet, at nostrum debitis vitae perferendis a libero, veritatis quidem, unde consequatur beatae itaque ipsa? Id consequatur nobis impedit. Iusto ullam iure earum, nam sed eum accusamus labore suscipit exercitationem ab natus laborum, tempore itaque molestias magnam illum consequatur nostrum cupiditate. Tempore excepturi dolorem sed exercitationem velit? Accusamus, omnis! Id, deleniti esse? Sapiente non enim eius natus possimus recusandae ab iste magni adipisci ratione assumenda eligendi voluptatibus dignissimos, harum rem accusantium maxime perspiciatis culpa aut vel aliquid omnis beatae! Delectus, harum saepe perspiciatis voluptates nulla aperiam at nihil sint adipisci maiores recusandae nostrum minus molestias est velit natus asperiores doloribus illo eos nisi eius eligendi accusamus vitae odio. Autem!\"\"\"\"', 1, 4, 2, 5),
(3, 'Công viên 29/3', '16.062891', '108.204319', '23 Nguyễn Tri Phương, Thạc Gián, Hải Châu, Đà Nẵng', 'dl1.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptas quasi eveniet, at nostrum debitis vitae perferendis a libero, veritatis quidem, unde consequatur beatae itaque ipsa? Id consequatur nobis impedit. Iusto ullam iure earum, nam sed eum accusamus labore suscipit exercitationem ab natus laborum, tempore itaque molestias magnam illum consequatur nostrum cupiditate. Tempore excepturi dolorem sed exercitationem velit? Accusamus, omnis! Id, deleniti esse? Sapiente non enim eius natus possimus recusandae ab iste magni adipisci ratione assumenda eligendi voluptatibus dignissimos, harum rem accusantium maxime perspiciatis culpa aut vel aliquid omnis beatae! Delectus, harum saepe perspiciatis voluptates nulla aperiam at nihil sint adipisci maiores recusandae nostrum minus molestias est velit natus asperiores doloribus illo eos nisi eius eligendi accusamus vitae odio. Autem!', 0, 3.8, 3, 4),
(46, 'Asia Park - Công viên Châu Á', '16.0383924', '108.2266751', '1 Phan Đăng Lưu, Hoà Cường Bắc, Hải Châu, Đà Nẵng, Việt Nam', 'dl4.jpg', 'Công viên giải trí có vòng đu quay khổng lồ & trò tàu lượn khác và khu vực vui chơi theo chủ đề các nước Châu Á.\"', 0, 4.7, 3, 1),
(49, 'Hot Springs Park - Công viên Suối khoáng nóng Núi Thần Tài Đà Nẵng', '15.967817', '108.019824', 'QL14G, Hoà Phú, Hòa Vang, Đà Nẵng, Việt Nam', '1684570562_Vé Công Viên Núi Thần Tài Đà Nẵng.jpg', 'Công viên nổi tiếng này nằm giữa không gian xanh, có hồ tạo sóng, sông lười, đường trượt nước và suối nước nóng.\"\"\"\"', 0, 0, 3, 42),
(50, 'Hồ Xanh Đà Nẵng', '16.098506', '108.267899', 'Hồ Xanh, Thọ Quang, Sơn Trà, Đà Nẵng, Việt Nam', '1684572358_ho-xanh-da-nang-c.jpg', 'Bên cạnh chùa Linh Ứng, cầu Rồng, biển Mỹ Khê… Hồ Xanh Đà Nẵng cũng là một điểm đến đáng trải nghiệm tại thành phố đáng sống. Vẻ đẹp dịu dàng từ cây cỏ, sự yên bình của mặt hồ trong veo mang lại cảm giác thư thái. Đây hứa hẹn sẽ là địa điểm du lịch Đà Nẵng thú vị cho hành trình tiếp theo của bạn.', 0, 0, 3, 43),
(51, 'Cà Phê Lối Nhỏ', '16.084828', '108.242304', '122 Đ. Trần Duy Chiến, Phước Mỹ, Sơn Trà, Đà Nẵng 550000, Việt Nam', '1684575605_ca-phe-loi-nho-914827.jpg', 'Quán Lối Nhỏ cà phê tạo không gian mộc mạc, dễ thương giúp con người như hòa vào thiên nhiên. Màu sắc xuyên suốt toàn bộ không gian là màu gỗ tự nhiên, kết hợp với màu xanh của cây cối. Không gian xanh của sân vườn luôn làm con người cảm thấy thoải mái, tránh xa sự ngột ngạt, xô bồ ngoài kia tìm về được nơi yên tĩnh và thư giãn.', 0, 2.7, 1, 44),
(53, 'Son Tra Retreat - Garden Lounge & Eatery', '16.103736142655517', '108.264110781609', '11 Lê Văn Lương, Thọ Quang, Sơn Trà, Đà Nẵng, Việt Nam', '1684577908_Thumb.webp', 'Ẩn mình lại ở sát chân núi Sơn Trà, Sơn Trà Retreat yên bình là không gian lý tưởng để ôn lại những câu chuyện, nỗi niềm, hay đôi khi những chuyện ba láp không đầu không đuôi được tỏ bày,... trong góc riêng tư. Không gian thiết kế bao gồm khoảng sân vườn bên ngoài, và 2 tầng lầu mang phong cách nhà hàng – cocktail bar sang trọng.', 0, 4, 2, 45),
(54, 'Nhà hàng Madame Lân', '16.081426217078832', '108.2232756356884', '04 Bạch Đằng, Thạch Thang, Hải Châu, Đà Nẵng 550000, Việt Nam', '1684587462_madame111.jpg', 'Ra đời vào năm 2012, Nhà hàng Madame Lân là chốn dừng chân của trải nghiệm ẩm thực trọn vẹn bên bờ sông Hàn - trái tim giữa lòng thành phố xinh đẹp Đà Nẵng.', 0, 4, 2, 46),
(55, 'Wind Garden Coffee', '16.0745786099665', '108.24348987202107', '72 Lê Mạnh Trinh, Phước Mỹ, Sơn Trà, Đà Nẵng 550000, Việt Nam', '1684588561_wind1111.jpg', 'Quán có không gian xanh rất rộng rãi, thoáng mát và rất chill.', 0, 0, 1, 47),
(56, 'Cafe Nia', '16.052991553065294', '108.22147212292838', '3/14, Phan Thành Tài, Hòa Thuận Đông, Hải Châu, Đà Nẵng 550000, Việt Nam', '1684588948_nia1111.jpg', 'Nia Cafe Đà Nẵng là một trong những quán cà phê độc đáo có không gian xanh mát ở thành phố đáng sống. Nằm nép mình trong con hẻm nhỏ, quán là nơi trú ẩn lý tưởng cho những ai muốn gác lại những xô bồ, đổi gió với không gian nhẹ nhàng và yên tĩnh.', 0, 5, 1, 48),
(57, 'Khu du lịch sinh thái Suối Hoa', '15.958984547463372', '107.99505221186212', 'XX5W+926, QL14G, Hoà Phú, Hòa Vang, Đà Nẵng, Việt Nam', '1684589365_hoa1111.jpg', 'Sở dĩ khu du lịch có cái tên mỹ miều này là nơi đây quanh năm có muôn hoa khoe sắc, tựa như một bức tranh tuyệt đẹp. Suối Hoa nằm sâu giữa đại ngàn, quanh năm được cây cối xanh tươi bạt ngàn bao bọc. Tất cả mang lại cho Suối Hoa một sắc thái du lịch khác biệt và rất đáng để khám phá. Không khí trong lành, mát mẻ nơi đây sẽ đưa du khách “chạy trốn” khỏi nơi thành thị xô bồ, bon chen và đông đúc.', 0, 0, 3, 49),
(58, 'Ba Na Hills', '16.027145646952725', '108.03270771234114', 'Hoà Ninh, Hòa Vang, Đà Nẵng, Việt Nam', '1684590146_bana1.jpg', 'Công viên giải trí có các trò chơi cảm giác mạnh, cáp treo và Cầu Vàng nhìn ra toàn cảnh núi non.\"\"', 0, 0, 3, 1),
(59, 'An Nhiên Farm Đà Nẵng', '16.05762269223893', '108.03865299331596', 'thôn 1, Hòa Vang, Đà Nẵng 590000, Việt Nam', '1684590594_An-Nhien-Farm-1.jpg', 'An Nhiên Farm sở hữu một vị trí vô cùng đẹp, đó là tọa lạc ở địa chỉ 320/5 Hoàng Diệu, thung lũng Bà Nà, thôn 1, xã Hòa Ninh, huyện Hòa Vang.', 0, 0, 3, 50),
(63, 'MANA Garden Restaurant', '16.061769450130573', '108.2452282709685', '42 Đ. Lâm Hoành, Phước Mỹ, Sơn Trà, Đà Nẵng 550000, Việt Nam', '1684666060_mana111.jpg', 'Đây là địa điểm lý tưởng cho bất kỳ ai muốn được thưởng thức ẩm thực Việt hương vị Hồng Kông ngay trong sân vườn rộng rãi với đội ngũ nhân viên phục vụ hết sức tuyệt vời.', 0, 0, 2, 51),
(64, 'Nhà Hàng Cafe Vườn Trúc Lâm Viên', '16.081789083488676', '108.22189028008782', '08 Trần Quý Cáp, Thạch Thang, Hải Châu, Đà Nẵng 550000, Việt Nam', '1684666646_truc111.jpg', 'Nhà hàng cafe vườn Trúc Lâm Viên được xây dựng vào năm 2012. Đây là điểm hẹn lý tưởng cho người dân Đà Nẵng và du khách gần xa. Trúc Lâm Viên nằm trong danh sách những quán cà phê lâu đời tại Đà Nẵng. \r\nTrúc Lâm Viên cũng như các quán các phê sân vườn khác ở Đà Nẵng. Là sự kết hợp giữa cà phê và sân vườn rộng thoáng. Nhưng chỉ cần đến đây, bạn sẽ nhận ra Trúc Lâm Viên là một quán cà phê vô cùng thanh lịch và sang trọng.', 0, 0, 1, 52),
(65, 'Golem Coffee', '16.066141393135847', '108.22293360641832', '27 Trần Quốc Toản, Hải Châu 1, Hải Châu, Đà Nẵng 550000, Việt Nam', '1684667715_golem1.jpg', ' Golem có khoảng vườn nhỏ, mộc mạc với chất liệu gỗ và vẫn giữ phong cách cổ điển, nhẹ nhàng. Chắc chắn rằng những tay máy sẽ “kết” địa điểm này lắm bởi góc nào cũng cho những tấm hình lung linh. Ngay cả thức uống cũng được đầu tư với nhiều món nước độc đáo và đa dạng.', 0, 0, 1, 53),
(66, 'Cafe Nhà Koi 2', '16.02835589045397', '108.21381781096562', '33 Xuân Thủy, Khuê Trung, Cẩm Lệ, Đà Nẵng 550000, Việt Nam', '1684668546_ruby1.jpg', 'Ruby Cafe Koi cũng giống như những quán cà phê sinh thái khác, sở hữu một khung cảnh mát mẻ, được bao trùm bởi cây xanh và những chiếc ghế chiếc bàn được bố trí ở ngoài trời. Đặc biệt là Ruby tạo một hồ cá Koi tạo nên một không gian đầy màu sắc và vừa thu hút khách đến đây thưởng thức cà phê.', 0, 0, 1, 53),
(67, 'Nhà hàng Ngon Thị Hoa', '16.049081961895773', '108.24556251935584', '100 Lê Quang Đạo, Str, Ngũ Hành Sơn, Đà Nẵng 550000, Việt Nam', '1684671240_hoa1.jpg', 'Bằng tất cả sự tinh tế trong nghệ thuật ẩm thực, bếp nhà Ngon Thị Hoa đã tạo nên một thực đơn món Việt đầy sáng tạo mà ở đó, thực khách như bị mê hoặc bởi hương vị từ quen đến lạ, từ gần gũi đến phá cách.', 0, 0, 2, 54),
(68, 'Khu nghỉ mát Du lịch sinh thái Tiên Sa', '16.123484296578262', '108.22022476192186', 'Cảng Tiên Sa, Thọ Quang, Sơn Trà, Đà Nẵng, Việt Nam', '1684671952_tiensa1.jpg', 'Khu du lịch sinh thái biển Tiên Sa Đà Nẵng tọa lạc cuối con đường Yết Kiên, thuộc quận Sơn Trà, thành phố Đà Nẵng, cách trung tâm thành phố khoảng 9 km. Địa điểm này nằm giữa vùng non nước rộng lớn, thuộc khu bảo tồn thiên nhiên bán đảo Sơn Trà, có hòn Mồ Côi truyền thuyết và bãi tắm Duyên Thùy lãng mạn. Đây từng là nơi ngự lãm của vua Minh Mạng và vua Khải Định. Còn bây giờ nó đã trở thành địa điểm dừng chân lý tưởng cho những chuyến du lịch, dã ngoại vui chơi,… của du khách.', 0, 0, 3, 55),
(83, 'Trình Cà Phê Đà Nẵng', '16.061173550396845', '108.22192843513183', '22 Đ. Lê Đình Dương, Phước Ninh, Hải Châu, Đà Nẵng 550000', '1685092831_trinh1.jpg', 'Trình cà phê không chỉ làm sống dậy những ký ức xưa cũ mà còn là chốn dừng chân gần gũi, bình dị mà tươi vui. Ghé đến Trình, uống cà phê bơ và chuyện trò cùng nhau rôm rả, thả hồn theo những bản nhạc Trịnh du dương sẽ là một trải nghiệm đáng nhớ.', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `place_types`
--

CREATE TABLE `place_types` (
  `id_place_type` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `place_types`
--

INSERT INTO `place_types` (`id_place_type`, `type`) VALUES
(1, 'Quán Cafe'),
(2, 'Nhà hàng'),
(3, 'Khu du lịch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id_rating`, `id_user`, `id_place`, `rating`) VALUES
(28, 1, 1, 5),
(29, 5, 1, 4),
(30, 5, 46, 5),
(32, 5, 3, 3),
(34, 4, 46, 4),
(35, 4, 2, 3),
(36, 3, 2, 4),
(37, 3, 3, 4),
(41, 3, 1, 5),
(42, 3, 46, 5),
(43, 6, 56, 5),
(44, 57, 51, 1),
(45, 58, 51, 3),
(46, 1, 53, 4),
(47, 1, 51, 4),
(48, 1, 54, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `roleName`) VALUES
(1, 1, 'Nhà cung cấp'),
(2, 2, 'Thành viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `phone`, `address`, `username`, `password`, `id_role`) VALUES
(1, 'Thiện Nguyễn', 'thiennguyen1701@gmail.com', '0123456789', '03 Quang Trung', 'thiennguyen', '25f9e794323b453885f5181f1b624d0b', 1),
(3, 'Trần Đức Danh', 'ducdanh123@gmail.com', '0123456789', '254 Nguyễn Văn Linh', 'tranducdanh', '25f9e794323b453885f5181f1b624d0b', 2),
(4, 'Lê Xuân Tạo', 'xuantao456@gmail.com', '0123456789', '15 Trần Cao Vân', 'lexuantao', '25f9e794323b453885f5181f1b624d0b', 1),
(5, 'Trương Đình Hà Nam', 'nam123456@gmail.com', '0123456789', '45 Điện Biên Phủ', 'hanam', '25f9e794323b453885f5181f1b624d0b', 1),
(6, 'Trần Văn Đang', 'vandang456@gmail.com', '0123456789', '85 Phan Thanh', 'vandang', '25f9e794323b453885f5181f1b624d0b', 1),
(42, 'Đặng Thị Quỳnh Giang', 'quynhgiang@gmail.com', '0123456789', '03 Quang Trung', 'quynhgiang', '25f9e794323b453885f5181f1b624d0b', 1),
(43, 'Trần Thị Duy Hiếu', 'duyhieu@gmail.com', '0123456789', '03 Quang Trung', 'duyhieu', '25f9e794323b453885f5181f1b624d0b', 1),
(44, 'Trần Văn Hoàng', 'vanhoang@gmail.com', '0123456789', '03 Quang Trung', 'vanhoang', '25f9e794323b453885f5181f1b624d0b', 1),
(45, 'Trần Viết Khánh', 'vietkhanh@gmail.com', '0123456789', '03 Quang Trung', 'vietkhanh', '25f9e794323b453885f5181f1b624d0b', 1),
(46, 'Vũ Ngọc Khuyên', 'ngockhuyen@gmail.com', '0123456789', '03 Quang Trung', 'ngockhuyen', '25f9e794323b453885f5181f1b624d0b', 1),
(47, 'Trần Mai Lan', 'mailan@gmail.com', '0123456789', '03 Quang Trung', 'mailan', '25f9e794323b453885f5181f1b624d0b', 1),
(48, 'Lê Thành Linh', 'thanhlinh@gmail.com', '0123456789', '03 Quang Trung', 'thanhlinh', '25f9e794323b453885f5181f1b624d0b', 1),
(49, 'Hoàng Như Mai', 'nhumai@gmail.com', '0123456789', '03 Quang Trung', 'nhumai', '25f9e794323b453885f5181f1b624d0b', 1),
(50, 'Trần Mạnh', 'tranmanh@gmail.com', '0123456789', '03 Quang Trung', 'tranmanh', '25f9e794323b453885f5181f1b624d0b', 1),
(51, 'Phan Tú Oanh', 'tuoanh@gmail.com', '0123456789', '03 Quang Trung', 'tuoanh', '25f9e794323b453885f5181f1b624d0b', 1),
(52, 'Nguyễn Hà Phương', 'haphuong@gmail.com', '0123456789', '03 Quang Trung', 'haphuong', '25f9e794323b453885f5181f1b624d0b', 1),
(53, 'Nguyễn Nam Sơn', 'namson@gmail.com', '0123456789', '03 Quang Trung', 'namson', '25f9e794323b453885f5181f1b624d0b', 1),
(54, 'Phan Thanh Toàn', 'thanhtoan@gmail.com', '0123456789', '03 Quang Trung', 'thanhtoan', '25f9e794323b453885f5181f1b624d0b', 1),
(55, 'Nguyễn Thanh Trà', 'thanhtra@gmail.com', '0123456789', '03 Quang Trung', 'thanhtra', '25f9e794323b453885f5181f1b624d0b', 1),
(57, 'Nguyễn Hoàng Khang', 'hoangkhang@gmail.com', '0123456789', '03 Quang Trung', 'hoangkhang', '25f9e794323b453885f5181f1b624d0b', 2),
(58, 'Trần Lê Na', 'lena@gmail.com', '0123456789', '03 Quang Trung', 'lena', '25f9e794323b453885f5181f1b624d0b', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `browses`
--
ALTER TABLE `browses`
  ADD PRIMARY KEY (`id_browse`),
  ADD KEY `id_place_type` (`id_place_type`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `browse_crt`
--
ALTER TABLE `browse_crt`
  ADD PRIMARY KEY (`id_crt`),
  ADD KEY `id_browse` (`id_browse`);

--
-- Chỉ mục cho bảng `browse_img`
--
ALTER TABLE `browse_img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_browse` (`id_browse`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place` (`id_place`);

--
-- Chỉ mục cho bảng `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id_criteria`),
  ADD KEY `id_place_2` (`id_place`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_place` (`id_place`);

--
-- Chỉ mục cho bảng `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id_place`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place_type` (`id_place_type`);

--
-- Chỉ mục cho bảng `place_types`
--
ALTER TABLE `place_types`
  ADD PRIMARY KEY (`id_place_type`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place` (`id_place`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `browses`
--
ALTER TABLE `browses`
  MODIFY `id_browse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `browse_crt`
--
ALTER TABLE `browse_crt`
  MODIFY `id_crt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT cho bảng `browse_img`
--
ALTER TABLE `browse_img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id_criteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT cho bảng `places`
--
ALTER TABLE `places`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `place_types`
--
ALTER TABLE `place_types`
  MODIFY `id_place_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `browses`
--
ALTER TABLE `browses`
  ADD CONSTRAINT `fk_browse_type` FOREIGN KEY (`id_place_type`) REFERENCES `place_types` (`id_place_type`),
  ADD CONSTRAINT `fk_browse_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `browse_crt`
--
ALTER TABLE `browse_crt`
  ADD CONSTRAINT `fk_browse_crt` FOREIGN KEY (`id_browse`) REFERENCES `browses` (`id_browse`);

--
-- Các ràng buộc cho bảng `browse_img`
--
ALTER TABLE `browse_img`
  ADD CONSTRAINT `fk_browse_img` FOREIGN KEY (`id_browse`) REFERENCES `browses` (`id_browse`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_place_cmt` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`),
  ADD CONSTRAINT `fk_user_cmt` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `criterias`
--
ALTER TABLE `criterias`
  ADD CONSTRAINT `fk_criteria` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_image` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`);

--
-- Các ràng buộc cho bảng `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `fk_place_type` FOREIGN KEY (`id_place_type`) REFERENCES `place_types` (`id_place_type`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_place_star` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`),
  ADD CONSTRAINT `fk_user_star` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
