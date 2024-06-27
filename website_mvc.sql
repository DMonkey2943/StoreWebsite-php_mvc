-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2024 lúc 04:17 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Duyen', 'duyen@gmail.com', 'duyenAdmin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Nguyen Van A', 'nva@gmail.com', 'aAdmin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'Tran Van B', 'tvb@gmail.com', 'bAdmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `brandName`) VALUES
(1, 'Acer'),
(2, 'Samsung'),
(3, 'Canon'),
(4, 'Dell'),
(6, 'Apple');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sessionID` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartID`, `productID`, `sessionID`, `productName`, `price`, `quantity`, `image`) VALUES
(1, 2, '80fgefb8cqgudc7dr0l6thudga', 'Máy ảnh', '12500000', 2, '14bbe9249a.jpg'),
(3, 5, '80fgefb8cqgudc7dr0l6thudga', 'iPhone 5', '8999000', 1, '39a17675e7.png'),
(4, 4, '80fgefb8cqgudc7dr0l6thudga', 'Tủ lạnh', '9500000', 1, '3cbb873abb.png'),
(6, 3, '80fgefb8cqgudc7dr0l6thudga', 'Màn hình máy tính', '1850000', 5, '607de458df.jpg'),
(24, 5, 'irhlkfgbeg9ttgni05q0hromh5', 'iPhone 5', '8999000', 1, '39a17675e7.png'),
(25, 2, 't59dsv8f9r1g8n673nbjis9op0', 'Máy ảnh', '12500000', 3, '14bbe9249a.jpg'),
(26, 8, 't59dsv8f9r1g8n673nbjis9op0', 'Màn hình máy tính 21inch', '3000000', 1, '71590ef2e4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(1, 'Laptop'),
(3, 'Desktop'),
(4, 'Mobile Phone'),
(5, 'Accessories'),
(6, 'Software'),
(7, 'Footware'),
(8, 'Sports and Fitness'),
(9, 'Jewellery'),
(10, 'Clothing'),
(11, 'Home Decor and Kitchen'),
(12, 'Beauty &amp; Healthcare'),
(13, 'Toys, Kids &amp; Babies');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(4, 'Ngoc Duyen', '17 Le Hong Nhi', 'Can Tho', 'ct', '0', '0123456789', 'ltnduyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Ngoc', 'Hẻm 51, Cần Thơ', 'Can Tho', 'ct', '0', '0246813579', 'ltngoc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Bao Chau', '17 Pho Duc Chinh', 'Long Xuyen', 'ag', '0', '0432198766', 'ltbchau@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customerID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `dateOrder` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `productID`, `productName`, `customerID`, `quantity`, `price`, `image`, `status`, `dateOrder`) VALUES
(1, 2, 'Máy ảnh', 4, 1, '12500000', '14bbe9249a.jpg', 0, '2024-02-20 13:59:02'),
(4, 8, 'Màn hình máy tính 21inch', 6, 1, '3000000', '71590ef2e4.jpg', 0, '2024-02-20 13:59:02'),
(5, 4, 'Tủ lạnh', 6, 1, '9500000', '3cbb873abb.png', 1, '2024-02-20 13:59:02'),
(6, 5, 'iPhone 5', 5, 5, '44995000', '39a17675e7.png', 0, '2024-02-20 13:59:02'),
(7, 7, 'Màn hình máy tính 27inch', 5, 2, '7500000', '2cd6e8ff6e.jpg', 0, '2024-02-20 13:59:02'),
(8, 5, 'iPhone 5', 6, 2, '17998000', '39a17675e7.png', 0, '2024-02-21 12:07:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `catID`, `brandID`, `product_desc`, `type`, `price`, `image`) VALUES
(2, 'Máy ảnh', 5, 3, '<p><span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '12500000', '14bbe9249a.jpg'),
(3, 'Màn hình máy tính', 3, 4, '<p>Day la mo ta ve man hinh may tinh cua Dell!!!!!!!!</p>', 1, '1850000', '607de458df.jpg'),
(4, 'Tủ lạnh', 11, 2, '<p>Day la tu lanh thuong hieu Samsung asdfghjk</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '9500000', '3cbb873abb.png'),
(5, 'iPhone 5', 4, 6, '<p>asdklnwfkq fqfn qwudj wqub fubj aibdi 1 1 323 d3b2b3dq dq</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '8999000', '39a17675e7.png'),
(7, 'Màn hình máy tính 27inch', 3, 1, '<p>dasdd awd1 fqe2ad adwqw qaa</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '3750000', '2cd6e8ff6e.jpg'),
(8, 'Màn hình máy tính 21inch', 3, 6, '<p>Day la mo ta cua man hinh may tinh 21inch voi thuong hieu la Apple do nha!!!!</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '3000000', '71590ef2e4.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
