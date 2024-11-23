-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2024 at 09:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1014`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id_bill` int NOT NULL COMMENT 'Mã đơn hàng',
  `id_customer` int NOT NULL COMMENT 'Mã customer',
  `receiver_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên người nhận',
  `receiver_phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Số điện thoại người nhận',
  `receiver_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Địa chỉ người nhận',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT 'Trạng thái của đơn hàng. \r\n- 0 là đang xử lý, \r\n-1 là đã xử lý, \r\n- 2 là đang đóng gói và vận chuyển, \r\n- 3 là đang vận chuyển đến người nhận,\r\n- 4 là nhận hàng thành công, \r\n- 5 là user từ chối nhận hàng\r\n- 6 là user hủy đơn',
  `purchase_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày mua '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL COMMENT 'Mã loại hàng',
  `name_cat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên của loại hàng',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name_cat`, `created_at`, `updated_at`) VALUES
(3, 'Điện Thoại', '2024-11-22 20:01:34', '2024-11-22 20:01:34'),
(4, 'Tai Nghe', '2024-11-22 20:01:52', '2024-11-22 20:01:52'),
(5, 'LapTop', '2024-11-22 20:02:00', '2024-11-22 20:02:00'),
(6, 'Loa', '2024-11-22 21:35:40', '2024-11-22 21:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int NOT NULL COMMENT 'Mã bình luận',
  `id_product` int NOT NULL COMMENT 'Mã sản phẩm',
  `id_user` int NOT NULL COMMENT 'Mã user',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nội dung bình luận ',
  `censorship` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hiện, 1 là đã ẩn',
  `day_post` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int NOT NULL COMMENT 'Mã customer',
  `id_user` int DEFAULT NULL COMMENT 'Mã user',
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Số điện thoại',
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Địa chỉ',
  `note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Ghi chú(nếu có)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_bills`
--

CREATE TABLE `detail_bills` (
  `id_detailbill` int NOT NULL COMMENT 'Mã chi tiết đơn hàng',
  `id_bill` int NOT NULL COMMENT 'Mã đơn hàng',
  `id_product` int NOT NULL COMMENT 'Mã sản phẩm',
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên của sản phẩm',
  `price` int UNSIGNED NOT NULL COMMENT 'Giá của sản phẩm ',
  `quantity` int UNSIGNED NOT NULL COMMENT 'Số lượng sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL COMMENT 'Mã sản phẩm',
  `id_category` int NOT NULL COMMENT 'Mã loại hàng',
  `firms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Hãng của sản phẩm',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên của sản phẩm',
  `price` int UNSIGNED NOT NULL COMMENT 'Giá của sản phẩm ',
  `amount` int UNSIGNED NOT NULL COMMENT 'Số lượng',
  `discount` int UNSIGNED NOT NULL COMMENT 'Giảm giá của sản phẩm. Mặc định là 0% và giảm tối đa 20%',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Mô tả của sản phẩm',
  `img_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Hình ảnh của sản phẩm',
  `censorship` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hiện, 1 là đã ẩn',
  `view` int NOT NULL DEFAULT '0' COMMENT 'Số lượt xem của sản phẩm',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `firms`, `name`, `price`, `amount`, `discount`, `description`, `img_product`, `censorship`, `view`, `created_at`, `updated_at`) VALUES
(38, 3, 'Samsung', 'Samsung Galaxy S23', 13690000, 26, 0, 'Galaxy AI tiện ích - Khoanh vùng search đa năng, là trợ lý chỉnh ảnh, chat thông minh, phiên dịch trực tiếp', 'samsung-s23_1.webp', 0, 0, '2024-11-22 20:06:28', '2024-11-22 20:06:28'),
(39, 3, 'Apple', 'iPhone 16 Pro Max 256GB', 34090000, 27, 0, 'Màn hình Super Retina XDR 6,9 inch lớn hơn có viền mỏng hơn, đem đến cảm giác tuyệt vời khi cầm trên tay.', 'iphone-16-pro-max.webp', 0, 0, '2024-11-22 21:12:54', '2024-11-22 21:12:54'),
(40, 3, 'Apple', 'iPhone 13 128GB', 13390000, 43, 0, 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao', 'iphone-13_2_.webp', 0, 0, '2024-11-22 21:16:49', '2024-11-22 21:16:49'),
(41, 5, 'Laptop Lenovo', 'Laptop Lenovo IdeaPad Slim 5 14Q8X9 83HL000KVN', 22990000, 36, 0, 'Laptop có màu xám thanh lịch, kiểu dáng mỏng nhẹ, dễ dàng mang theo khi di chuyển.', 'group_633_1_.webp', 0, 0, '2024-11-22 21:21:24', '2024-11-22 21:21:24'),
(42, 5, 'ASUS', 'Laptop ASUS Vivobook 15 X1504ZA-NJ517W', 13990000, 30, 0, 'Màn hình FHD 15.6 inch với độ sáng 250 nits và độ phủ màu 45% NTSC, mang lại hình ảnh sắc nét và sống động', 'laptop-asus-vivobook-15x-oled-m3504ya-l1268w-thumbnails.webp', 0, 0, '2024-11-22 21:23:05', '2024-11-22 21:23:05'),
(43, 5, 'Acer', 'Laptop Acer Gaming Aspire ', 13990000, 39, 0, 'CPU Intel Core i5-12450H dễ dàng xử lý mọi tác vụ làm việc học tập, làm việc thường ngày.', 'group_509_11__1.webp', 0, 0, '2024-11-22 21:27:10', '2024-11-22 21:27:10'),
(44, 4, 'Apple', 'Tai nghe Bluetooth Apple AirPods 4', 3450000, 25, 0, 'Chip H2 nổi bật, mạnh mẽ được tích hợp trong Airpod 4 giúp trải nghiệm âm thanh của bạn mượt mà hơn.', 'apple-airpods-4-thumb.webp', 0, 0, '2024-11-22 21:29:27', '2024-11-22 21:29:27'),
(45, 4, 'Soundcore ', 'Tai nghe Bluetooth True Wireless Anker Soundcore R50i A3949', 360000, 39, 0, 'Tai nghe không dây Anker Soundcore R50I-A3949 - Chất âm tốt, thiết kế sang trọng', 'tai-nghe-khong-day-anker-soundcore-r50i-a3949_2_.webp', 0, 0, '2024-11-22 21:31:40', '2024-11-22 21:31:40'),
(46, 4, 'Sony', 'Tai nghe Bluetooth chụp tai Sony WH-1000XM5', 6490000, 46, 0, 'Công nghệ Auto NC Optimizer tự động khử tiếng ồn dựa theo môi trường', 'group_172_2.webp', 0, 0, '2024-11-22 21:34:32', '2024-11-22 21:34:32'),
(47, 6, 'Edifier ', 'Loa Bluetooth Edifier Hecate G200', 390000, 30, 0, 'Màng loa kích thước lớn 40mm, giúp tái tạo âm thanh chất lượng cao, mạnh mẽ và sống động', 'loa-bluetooth-edifier-hecate-g200_2_.webp', 0, 0, '2024-11-22 21:36:44', '2024-11-22 21:36:44'),
(48, 6, 'Tronsmart ', 'Loa Bluetooth Tronsmart Groove 2', 630000, 33, 0, 'Thiết kế nhỏ gọn, tích hợp đèn LED cho trải nghiệm thêm sống động', 'group_218_3.webp', 0, 0, '2024-11-22 21:37:48', '2024-11-22 21:37:48'),
(49, 6, 'Samsung', 'Loa tháp Samsung MX-T70', 4490000, 52, 0, 'Thưởng thức dải âm trầm mạnh mẽ, chất âm sống động với công suất lên đến 1500W', 'loa-thap-samsung-mx-t70-thumb.webp', 0, 0, '2024-11-22 21:39:38', '2024-11-22 21:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant`
--

CREATE TABLE `product_variant` (
  `id_product` int NOT NULL,
  `id_variant` int NOT NULL,
  `quantity` int UNSIGNED NOT NULL COMMENT 'Số lượng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variant`
--

INSERT INTO `product_variant` (`id_product`, `id_variant`, `quantity`) VALUES
(38, 24, 12),
(38, 21, 9),
(38, 23, 5),
(39, 23, 7),
(39, 21, 9),
(39, 19, 11),
(40, 25, 13),
(40, 23, 14),
(40, 21, 6),
(40, 24, 10),
(41, 21, 21),
(41, 23, 15),
(42, 24, 13),
(42, 23, 7),
(42, 21, 10),
(43, 21, 16),
(43, 23, 23),
(44, 24, 15),
(44, 23, 10),
(45, 23, 18),
(45, 24, 21),
(46, 24, 31),
(46, 23, 15),
(47, 23, 19),
(47, 19, 11),
(48, 23, 14),
(48, 21, 9),
(48, 24, 10),
(49, 23, 36),
(49, 21, 16);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id_rate` int NOT NULL COMMENT 'Mã đánh giá',
  `id_product` int NOT NULL COMMENT 'Mã sản phẩm',
  `id_user` int NOT NULL COMMENT 'Mã user',
  `point` float NOT NULL DEFAULT '1' COMMENT 'Điểm đánh giá ',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL COMMENT 'Mã user',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Địa chỉ email của user',
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Mật khẩu đăng nhặp của user',
  `role` tinyint NOT NULL DEFAULT '0' COMMENT '0 là khách hàng, 1 là nhân viên, 2 là quản trị',
  `day_registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày đăng kí tài khoản của user '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `id_variant` int NOT NULL COMMENT 'Mã biến thể',
  `name_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên biến thể màu',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`id_variant`, `name_color`, `created_at`, `updated_at`) VALUES
(19, 'Vàng', '2024-11-22 18:22:06', '2024-11-22 18:22:06'),
(21, 'Xám', '2024-11-22 18:22:43', '2024-11-22 18:22:43'),
(22, 'Đỏ', '2024-11-22 20:02:19', '2024-11-22 20:02:19'),
(23, 'Đen', '2024-11-22 20:02:34', '2024-11-22 20:02:34'),
(24, 'Trắng', '2024-11-22 20:02:38', '2024-11-22 20:02:38'),
(25, 'Hồng', '2024-11-22 21:15:37', '2024-11-22 21:15:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_bills`
--
ALTER TABLE `detail_bills`
  ADD PRIMARY KEY (`id_detailbill`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `detail_bills_ibfk_1` (`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_variant` (`id_variant`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id_rate`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id_variant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id_bill` int NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT COMMENT 'Mã loại hàng', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận';

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT COMMENT 'Mã customer', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_bills`
--
ALTER TABLE `detail_bills`
  MODIFY `id_detailbill` int NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết đơn hàng', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT COMMENT 'Mã user', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `id_variant` int NOT NULL AUTO_INCREMENT COMMENT 'Mã biến thể', AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_bills`
--
ALTER TABLE `detail_bills`
  ADD CONSTRAINT `detail_bills_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `detail_bills_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD CONSTRAINT `product_variant_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_variant_ibfk_2` FOREIGN KEY (`id_variant`) REFERENCES `variant` (`id_variant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
