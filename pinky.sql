-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 21, 2023 lúc 04:06 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mendover`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `status`) VALUES
(1, 'admin', '123', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_title`) VALUES
(17, 'Bánh Ngọt'),
(18, 'Cơm'),
(19, 'Đồ Uống'),
(20, 'Đồ Ăn Nhanh'),
(21, 'Đồ Nướng'),
(22, 'Súp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders_pending`
--

CREATE TABLE `tbl_orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders_pending`
--

INSERT INTO `tbl_orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(3, 3, 124712576, 6, 1, 'pending'),
(4, 3, 1316398178, 2, 1, 'pending'),
(5, 3, 804117365, 3, 1, 'pending'),
(6, 3, 773669601, 4, 1, 'pending'),
(7, 3, 1514143241, 1, 1, 'pending'),
(8, 3, 1798405684, 5, 1, 'pending'),
(9, 3, 975981827, 2, 1, 'pending'),
(10, 3, 1751772986, 3, 1, 'pending'),
(11, 3, 994387546, 8, 2, 'pending'),
(12, 3, 1917237265, 5, 2, 'pending'),
(13, 3, 59573666, 6, 1, 'pending'),
(14, 3, 1325235640, 5, 2, 'pending'),
(15, 3, 1087829681, 6, 3, 'pending'),
(16, 3, 1999759624, 4, 3, 'pending'),
(17, 3, 1305126828, 6, 3, 'pending'),
(18, 3, 2033663978, 3, 1, 'pending'),
(19, 3, 267614272, 5, 1, 'pending'),
(20, 3, 285371051, 6, 2, 'pending'),
(21, 3, 436024928, 2, 2, 'pending'),
(22, 3, 1823595260, 2, 3, 'pending'),
(23, 3, 467052635, 2, 2, 'pending'),
(24, 3, 1441589321, 2, 3, 'pending'),
(25, 3, 79946730, 2, 3, 'pending'),
(26, 3, 1488923160, 6, 2, 'pending'),
(27, 3, 1251015167, 4, 3, 'pending'),
(28, 3, 2133065984, 2, 1, 'pending'),
(29, 3, 1252449254, 5, 1, 'pending'),
(30, 3, 1399619138, 5, 3, 'pending'),
(31, 3, 1579024274, 4, 2, 'pending'),
(32, 3, 196709615, 2, 2, 'pending'),
(33, 3, 2121641392, 2, 2, 'pending'),
(34, 3, 696151095, 1, 1, 'pending'),
(35, 3, 71, 2, 1, 'pending'),
(36, 3, 977, 3, 1, 'pending'),
(37, 3, 1255543506, 3, 5, 'pending'),
(38, 3, 1917384473, 2, 1, 'pending'),
(39, 3, 1227471791, 1, 1, 'pending'),
(40, 3, 440973248, 2, 1, 'pending'),
(41, 3, 136457137, 2, 1, 'pending'),
(42, 3, 295610121, 2, 1, 'pending'),
(43, 3, 16549415, 1, 1, 'pending'),
(44, 3, 1262131117, 21, 1, 'pending'),
(45, 3, 1273930818, 21, 1, 'pending'),
(46, 3, 1907770558, 22, 1, 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_price_new` bigint(255) NOT NULL,
  `product_price_old` bigint(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_title`, `product_description`, `product_price_new`, `product_price_old`, `category_id`, `product_image1`, `product_image2`, `date`, `status`) VALUES
(21, 'SINH TỐ HOA QUẢ', '	Sinh tố là chỉ thức uống được chế biến từ các loại hoa quả tươi bằng cách xay nhuyễn với một vài muỗng cà phê sữa đặc có đường, đá vụn và trái cây tươi. Sinh tố là một nước uống bổ dưỡng giàu vitamin rất tốt cho sức khỏe.', 25000, 34000, 19, 'drinks1.webp', 'drinks1.webp', '2023-12-20 15:24:44', 0),
(22, 'COFFEE G7', 'G7 là sản phẩm cà phê hòa tan duy nhất được chọn phục vụ các nguyên thủ quốc gia tại APEC, ASEM 5. Thành phần: Cà phê – sữa – đường. Đặc điểm: Cà phê G7 3in1 mang đến sự tiện lợi cho người sử dụng: bạn không mất nhiều thời gian nhưng vẫn có được ly cà phê với hương vị đậm đà, quyến rũ. Hạn sử dụng: 2 năm.', 34000, 25000, 19, 'drinks2.webp', 'drinks2.webp', '2023-12-20 15:25:29', 0),
(23, 'CƠM TẤM', 'Cơm tấm là món ăn truyền thống của người Việt Nam. Taste Atlas mô tả đây là món ăn bình dân bởi nguyên liệu chính là tấm, một loại gạo vỡ trong quá trình sản xuất gạo. Đây là món ăn thực khách có thể tìm thấy ở bất kỳ đâu tại các tỉnh thành miền Tây Nam Bộ.', 25000, 34000, 18, 'rice1.jpg', 'rice1.jpg', '2023-12-20 15:26:48', 0),
(24, 'PIZZA HẢI SẢN', '	Nhân bánh được làm từ nhiều loại hải sản tươi ngon như tôm, mực... được xếp xen kẽ với rau củ như ớt chuông, cà rốt... mang đến sự cân bằng hương vị tuyệt hảo. Ngoài ra phần giữa đế bánh và các topping chủ đạo là lớp phô mai tan chảy béo ngậy và thơm lừng khiến bánh trở nên hoàn hảo hơn bao giờ hết.', 90000, 83000, 20, 'đồ ăn nhanh 2.webp', 'đồ ăn nhanh 2.webp', '2023-12-20 15:35:21', 0),
(25, 'PIZZA BÒ', 'Nhân bánh được làm từ thịt bò và phô mai Mozzarella tan chảy được xếp xen kẽ với rau củ như ớt chuông, hành tây... mang đến sự cân bằng hương vị tuyệt hảo. Ngoài ra phần giữa đế bánh và các topping chủ đạo là lớp phô mai tan chảy béo ngậy và thơm lừng khiến bánh trở nên hoàn hảo hơn bao giờ hết.', 85000, 90000, 20, 'đồ ăn nhanh 1.webp', 'đồ ăn nhanh 1.webp', '2023-12-20 15:35:54', 0),
(26, 'MỲ XÀO', '	Mì xào là tên gọi chỉ chung cho các món ăn được chế biến từ nguyên liệu chính là sợi mì với phương pháp xào. Đây là một trong những món ăn thông dụng trong ẩm thực đường phố ở châu Á.', 48000, 40000, 20, 'đồ ăn nhanh3.jpg', 'đồ ăn nhanh3.jpg', '2023-12-20 15:29:23', 0),
(27, 'BÁNH NGỌT', '	Bánh ngọt hay bánh ga-tô (phương ngữ miền Bắc, bắt nguồn từ gâteux trong tiếng Pháp) là một thuật ngữ chung cho bánh có nguồn gốc từ phương Tây. Bánh một dạng thức ăn ngọt làm từ bột mì, đường và các thành phần khác, thường được nướng.', 50000, 0, 17, 'bánh1.webp', 'bánh1.webp', '2023-12-20 15:30:14', 0),
(28, 'CAKE WEET', 'Trứng được ăn hàng ngày. Nó có mặt khắp nơi, từ các nhà hàng sang trọng cho đến những hàng ăn bình dân hay tại nhà. Trứng đúc khoai tây,...', 50000, 0, 17, 'bánh2.jpg', 'bánh2.jpg', '2023-12-20 15:30:49', 0),
(29, 'HAMBURGER', 'Humbergur&nbsp;là món hủ tiếu có nguồn gốc từ Campuchia nhưng do người Hoa chế biến, nguyên liệu chính là hủ tiếu khô, nước dùng chính là thịt bằm nhỏ, lòng...', 25000, 0, 20, 'đồ ăn nhanh 3.jpg', 'đồ ăn nhanh 3.jpg', '2023-12-20 15:31:30', 0),
(30, 'SÚP THẬP CẨM', '	Món ăn này ăn nóng rất hấp dẫn và dễ ăn, vị ngọt dịu nhẹ nhàng. Nấu súp có đủ nấm, rau, thịt, trứng là món ăn đã có đầy đủ và cân bằng dinh dưỡng cho cơ thể.', 87000, 80000, 22, 'súp1.webp', 'súp1.webp', '2023-12-20 15:32:20', 0),
(31, 'CƠM VĂN PHÒNG', 'Món ăn đơn giản với chiếc bánh tráng mỏng, dăm loại rau, lát thịt luộc, chén nước chấm... nhưng đã níu chân biết bao du khách khi đến với miền...', 30000, 0, 18, 'rice2.webp', 'rice2.webp', '2023-12-20 15:33:39', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_phone_number` varchar(100) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone_number`, `user_ip`, `user_address`) VALUES
(3, 'hoangphuc', 'phuc@gmail.com', '$2y$10$/BlYdGNyRxrU0M1JPRCtfu0y9DnbznjbRdyHz3JM.WwrsCmKEmTUK', '0123456789', '::1', 'cổ nhuế 2 ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user_orders`
--

CREATE TABLE `tbl_user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` bigint(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user_orders`
--

INSERT INTO `tbl_user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(40, 3, 25000, 1273930818, 1, '2023-12-20 22:38:29', 0),
(41, 3, 34000, 1907770558, 1, '2023-12-20 23:16:39', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_orders_pending`
--
ALTER TABLE `tbl_orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `tbl_user_orders`
--
ALTER TABLE `tbl_user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_orders_pending`
--
ALTER TABLE `tbl_orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_user_orders`
--
ALTER TABLE `tbl_user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
