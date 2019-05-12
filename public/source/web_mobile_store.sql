-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2019 lúc 04:24 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_mobile_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'Nguyễn Đức Thịnh', 'Nam', 'thinhnd@gmail.com', '26 Quán Sứ', '0336956600', 'Khách VIP', '2019-05-12 14:17:15', '2017-03-24 07:14:32'),
(14, 'Trần Trung Kiên', 'Nam', 'kientt@gmail.com', '1 Nguyễn Khuyến', '0365978542', 'Khách hay phàn nàn', '2019-05-12 14:17:55', '2017-03-23 04:46:05'),
(13, 'Nguyễn Thị Lan Hương', 'Nữ', 'huongnguyenak96@gmail.com', '7 Tràng Thi', '0998745121', 'Vui lòng giao hàng trước 5h', '2019-05-12 14:18:39', '2017-03-21 07:29:31'),
(12, 'Phạm Anh Khoa', 'Nam', 'khoapham@gmail.com', '222 Hoàng Quốc Việt', '0123456789', 'Vui lòng chuyển đúng hạn', '2019-05-12 14:19:17', '2017-03-21 07:20:07'),
(11, 'Phạm Hương', 'Nữ', 'huongpham@gmail.com', '3 Lê Thị Riêng, Quận 1', '0365874444', 'không có ghi chú', '2019-05-12 14:19:48', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Điện thoại iPhone – Sản phẩm chiếm phần lớn lợi nhuận ngành di động', 'Kể từ khi ra mắt thế hệ đầu tiên vào năm 2007, những chiếc điện thoại Apple luôn là sản phẩm được nhiều người dùng ưa chuộng, mang lại cho Apple nguồn lợi nhuận khổng lồ. Theo những con số thống kê, đã từng có thời điểm Táo khuyết chiếm đến hơn 90% lợi nhuận của toàn ngành di động, mà điện thoại Apple chính là một trong những nhân tố chủ lực tạo nên thành công ấy. Trong năm 2018, Apple cho ra mắt 3 dòng điện thoại iPhone, mang tên: iPhone XS, iPhone XS Max, iPhone XR nhằm phục vụ cho số lượng lớn người dùng yêu thích hãng táo khuyết.', 'sample1.jpg', '2019-05-12 14:14:54', '0000-00-00 00:00:00'),
(2, 'Samsung – Gã khổng lồ đến từ Hàn Quốc', 'Kể từ vài năm trở lại đây, sự cạnh tranh, ngăn cản sự độc tôn của Apple về dòng smartphone cao cấp đó chính là Samsung - một công ty sản xuất điện thoại đến từ Hàn Quốc. Với chất lượng cao cũng như là kiểu dáng hiện đại, các dòng máy của Samsung luôn luôn được người tiêu dùng đánh giá rất cao. Cùng với đó không chỉ sản xuất ra những flagship cao cấp, Samsung còn sản xuất ra nhiều sản phẩm với phân khúc phù hợp nhu cầu của từng nhóm khách hàng. Vì vậy, với số tiền bỏ ra ít hơn nhưng bạn vẫn sở hữu những chiếc điện thoại vô cùng thời thượng của một hãng điện thoại lớn nhất nhì thế giới.', 'sample2.jpg', '2019-05-12 14:15:21', '0000-00-00 00:00:00'),
(3, 'Điện thoại XiaoMi – Smartphone tầm trung hấp dẫn', 'Khi ngày nay có nhiều mẫu điện thoại di động xuất hiện trên khắp các thị trường làm cho làng công nghệ thêm phong phú và đa dạng, thì nay việc ra mẫu điện thoại Xiaomi này có thể thấy được một sự đột biến về cấu hình, thiết kế . Từ khi những mẫu điện thoại Trung Quốc mang đến cho chúng ta sự đơn giản, thì nay nó đã cho ra đời những sản phẩm điện thoại thông minh mang thương hiệu đặc trưng của riêng mình, và được người tiêu dùng đón nhận bởi giá thành và chất lượng giải trí tuyệt vời. Hãng có đầy đủ các sản phẩm trải dài trên các phân khúc, chủ yếu là tầm trung và giá rẻ. Tuy vậy nhưng cấu hình của sản phẩm rất đáng nể như Xiaomi Mi 8 Lite, Xiaomi Redmi Note 3, Xiaomi Mi MIX Exclusive Edition…', 'sample3.jpg', '2019-05-12 14:15:41', '0000-00-00 00:00:00'),
(4, 'Điện thoại Nokia: Vẫn là một tượng đài', 'Sau một thời gian tạm ngưng hoạt động, “gã khổng lồ” Nokia đã chính thức quay trở lại với loạt sản phẩm chạy Android được giới công nghệ cũng như cộng đồng người dùng đánh giá cao, hứa hẹn về một ngày không xa, Nokia sẽ lấy lại vị thế hàng đầu của mình.', 'sample4.jpg', '2019-05-12 14:16:04', '0000-00-00 00:00:00'),
(5, 'Điện thoại Huawei – Thương hiệu hàng đầu trên thị trường di động', 'Huawei là một trong những công ty nổi tiếng trong lĩnh vực công nghệ. Nhiều năm liền, hãng này chỉ đứng sau Apple và Samsung trên bảng xếp hạng những nhà sản xuất smartphone lớn nhất thế giới nhờ những sản phẩm có thiết kế đẹp và chất lượng rất tốt. Trong năm 2018, Huawei cho ra mắt 2 dòng cao cấp là Mate 20 và Mate 20 Pro nhằm mang đến những trải nghiệm tuyệt vời cho người dùng.', 'sample5.jpg', '2019-05-12 14:16:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Apple iPhone X 64GB', 1, 'iPhone X 64GB – Siêu phẩm kỷ niệm 10 năm của Apple', 22700000, 21500000, 'iphone-x-64.jpg', 'chiếc', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'Apple iPhone XS Max 64GB', 1, 'Điện thoại Apple iPhone Xs Max 64GB chính hãng VN/A - Chiếc điện thoại đẳng cấp tương lai', 29700000, 28900000, 'iphone-xs-max.jpg', 'chiếc', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'Redmi Note 7 128GB', 3, 'Điện thoại Redmi Note 7 128GB - phiên bản Redmi Note 7 với dung lượng bộ nhớ trong lớn', 6490000, 5790000, 'redmi-note-7.jpg', 'chiếc', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, 'Apple iPhone 8 Plus 64GB', 1, 'Điện thoại Apple iPhone 8 Plus 64GB chính hãng VN/A - Smartphone đến từ thương hiệu Apple uy tín', 20990000, 0, 'iphone-8-plus.jpg', 'chiếc', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'Xiaomi Mi 9', 3, 'Điện thoại Xiaomi Mi 9 chính hãng – smartphone cao cấp cấu hình “khủng long”', 11990000, 0, 'mi-9.jpg', 'chiếc', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'Xiaomi Mi Mix 3', 3, 'Điện thoại Xiaomi Mi Mix 3 - Siêu phẩm đến từ hãng điện thoại danh tiếng Xiaomi', 12990000, 0, 'mi-mix-3.jpg', 'chiếc', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'Nokia 6.1 Plus', 4, 'Điện thoại Nokia 6.1 Plus – Thiết kế đẹp mắt, hiệu suất ổn định, tiết kiệm năng lượng', 4790000, 4440000, 'nokia-61-plus.jpg', 'chiếc', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Nokia 8.1', 4, 'Điện thoại Nokia 8.1: Smartphone thiết kế sang trọng, nổi bật, bắt kịp xu thế', 7990000, 7590000, 'nokia-81.jpg', 'chiếc', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Nokia 5.1 Plus 32GB', 4, 'Điện thoại Nokia 5.1 Plus 32GB – Smartphone kiểu dáng bắt mắt, hiệu năng tuyệt vời', 3890000, 3690000, 'nokia-51-plus.jpg', 'chiếc', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(11, 'Samsung Galaxy S10+', 2, 'Samsung Galaxy S10 Plus là thiết bị đắt giá cũng như được trang bị những tính năng đình đám nhất từ Samsung', 22990000, 19990000, 'samsung-galaxy-s10-plus.png', 'chiếc', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'Samsung Galaxy A50', 2, 'Điện thoại Samsung Galaxy A50 – Smartphone với màn hình tràn viền, cụm 3 camera ấn tượng', 6990000, 0, 'samsung-galaxy-a50.jpg', 'chiếc', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Samsung Galaxy Note 9 512GB', 2, 'Điện thoại Samsung Galaxy Note 9 512GB - Smartphone thiết kế màn hình cong độc đáo cùng tính năng vượt trội', 28490000, 23190000, 'samsung-galaxy-note-9.jpg', 'chiếc', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'Samsung Galaxy S10e', 2, 'SamSung Galaxy S10e có thể nói là một bản rút gọn nhẹ về phần cứng của SamSung Galaxy S10/S10+. Với nhiều màu sắc nổi bật, thiết kế nhỏ gọn thì đây chính là chiếc smartphone màn hình nhỏ cấu hình cao đáng để trải nghiệm', 15990000, 15290000, 'samsung-galaxy-s10e.jpg', 'chiếc', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'Samsung Galaxy S9+ (Plus) 64GB', 2, 'Điện thoại Samsung Galaxy S9 Plus 64GB - Smartphone thiết kế sang trọng và nhiều nâng cấp vượt trội', 19990000, 13090000, 'samsung-galaxy-s9-plus.jpg', 'chiếc', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'Samsung Galaxy M20', 2, 'Điện thoại Samsung Galaxy M20 - Cấu hình mạnh mẽ, thiết kế màn hình giọt nước', 4990000, 4190000, 'samsung-galaxy-m20.jpg', 'chiếc', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Huawei Y9 2019', 5, 'Điện thoại Huawei Y9 2019: Lựa chọn tuyệt vời với màn hình lớn 6.5 inches, 4 camera AI', 4990000, 0, 'huawei-y9-2019.jpg', 'chiếc', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'Huawei P30 Lite', 5, 'Điện thoại Huawei P30 Lite - Smartphone giá rẻ được trang bị 3 camera sau, chip Kirin 710', 7490000, 6990000, 'huawei-p30-lite.jpg', 'chiếc', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Huawei P30 Pro', 5, 'Huawei P30 Pro là phiên bản cao cấp nhất với nhiều công nghệ đột phá đặt biệt là camera. Với dòng P của mình Huawei cho thấy khả năng dẫn đầu mảng cameraphone', 22990000, 20990000, 'huawei-p30-pro.jpg', 'chiếc', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'Huawei Y7 Pro 2019', 5, 'Huawei Y7 Pro 2019 chính hãng: Kẻ thách thức mới trong phân khúc tầm trung', 3990000, 0, 'huawei-y7-pro.jpg', 'chiếc', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Huawei Mate 20 Pro', 5, 'Huawei Mate 20 Pro chính hãng - Thông tin giá bán, cấu hình chi tiết, quà tặng khủng', 21990000, 17990000, 'huawei-mate-20-pro.jpg', 'chiếc', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Oppo F11', 6, 'Oppo F11 - Ấn tượng với camera kép 48MP', 7290000, 0, 'oppo-f11.jpg', 'chiếc', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Oppo R17 Pro', 6, 'Điện thoại OPPO R17 Pro Chính hãng được xem là chiếc điện thoại chủ lực của OPPO với những nâng cấp về viền màn hình mỏng, công nghệ cảm biến vân tay được tích hợp ngay trong màn hình cùng với thiết kế thời thượng. Đây được xem là sản phẩm mang đến cho người dùng nhiều trải nghiệm mới mẻ sẽ được ra mắt trong thời gian tới. ', 16990000, 0, 'oppo-r17-pro.jpg', 'chiếc', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Vsmart Active 1 Plus', 7, 'Vsmart Active 1 Plus: Sang trọng, camera kép, cấu hình khủng', 5790000, 4990000, 'vsmart-active-1-plus.jpg', 'chiếc', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Vsmart Joy 1 Plus', 7, 'Vsmart Joy 1+ (Plus) - Màn hình tai thỏ, camera kép xóa phông', 2690000, 0, 'vsmart-joy-1-plus.jpg', 'chiếc', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Vsmart Active 1', 7, 'Vsmart Active 1 là 1 trong 4 chiếc điện thoại được tập đoàn VinGroup ra mắt vào giữa tháng 12 vừa qua tại tòa nhà Landmark 81. Đây là phiên bản smartphone mang thương hiệu Vsmart có mức giá tầm trung có thiết kế cao cấp, cấu hình mạnh cùng với camera chất lượng cực kỳ tốt.', 3990000, 0, 'vsmart-active-1.png', 'chiếc', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Bánh Muffins trứng', 1, '', 100000, 80000, 'maxresdefault.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Bánh Scone Peach Cake', 1, '', 120000, 0, 'Peach-Cake_3300.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Bánh mì Loaf I', 1, '', 100000, 0, 'sli12.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Bánh kem Chocolate Dâu I', 4, '', 380000, 350000, 'sli12.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Bánh kem Trái cây I', 4, '', 380000, 350000, 'Fruit-Cake.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Bánh kem Trái cây II', 4, '', 380000, 350000, 'Fruit-Cake_7971.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'Bánh kem Doraemon', 4, '', 280000, 250000, 'p1392962167_banh74.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Bánh kem Caramen Pudding', 4, '', 280000, 0, 'Caramen-pudding636099031482099583.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Bánh kem Chocolate Fruit', 4, '', 320000, 300000, 'chocolate-fruit636098975917921990.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Bánh kem Coffee Chocolate GH6', 4, '', 320000, 300000, 'COFFE-CHOCOLATE636098977566220885.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Bánh kem Mango Mouse', 4, '', 320000, 300000, 'mango-mousse-cake.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bánh kem Matcha Mouse', 4, '', 350000, 330000, 'MATCHA-MOUSSE.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bánh kem Flower Fruit', 4, '', 350000, 330000, 'flower-fruits636102461981788938.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bánh kem Strawberry Delight', 4, '', 350000, 330000, 'strawberry-delight636102445035635173.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bánh kem Raspberry Delight', 4, '', 350000, 330000, 'raspberry.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Beefy Pizza', 6, 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 150000, 130000, '40819_food_pizza.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hawaii Pizza', 6, 'Sốt cà chua, ham , dứa, pho mai mozzarella', 120000, 0, 'hawaiian paradise_large-900x900.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Smoke Chicken Pizza', 6, 'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.', 120000, 0, 'chicken black pepper_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Sausage Pizza', 6, 'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.', 120000, 0, 'pizza-miami.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Ocean Pizza', 6, 'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.', 120000, 0, 'seafood curry_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'All Meaty Pizza', 6, 'Ham, bacon, chorizo, pho mai mozzarella.', 140000, 0, 'all1).jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Tuna Pizza', 6, 'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella', 140000, 0, '54eaf93713081_-_07-germany-tuna.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Bánh su kem nhân dừa', 7, '', 120000, 100000, 'maxresdefault.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Bánh su kem sữa tươi', 7, '', 120000, 100000, 'sukem.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Bánh su kem sữa tươi chiên giòn', 7, '', 150000, 0, '1434429117-banh-su-kem-chien-20.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Bánh su kem dâu sữa tươi', 7, '', 150000, 0, 'sukemdau.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Bánh su kem bơ sữa tươi', 7, '', 150000, 0, 'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Bánh su kem nhân trái cây sữa tươi', 7, '', 150000, 0, 'foody-banh-su-que-635930347896369908.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Bánh su kem cà phê', 7, '', 150000, 0, 'banh-su-kem-ca-phe-1.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Bánh su kem phô mai', 7, '', 150000, 0, '50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Bánh su kem sữa tươi chocolate', 7, '', 150000, 0, 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Bánh Macaron Pháp', 2, 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 200000, 180000, 'Macaron9.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Bánh Tiramisu - Italia', 2, 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 200000, 0, '234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Bánh Táo - Mỹ', 2, 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 200000, 0, '1234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Bánh Cupcake - Anh Quốc', 6, 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.', 150000, 120000, 'cupcake.jpg', 'cái', 1, NULL, NULL),
(62, 'Bánh Sachertorte', 6, 'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. Sachertorte có vị ngọt nhẹ, gồm nhiều lớp bánh được làm từ ruột bánh mì và bánh sữa chocholate, xen lẫn giữa các lớp bánh là mứt mơ. Món bánh chocholate này nổi tiếng tới mức thành phố Vienna của Áo đã ấn định&nbsp;tổ chức một ngày Sachertorte quốc gia, vào 5/12 hằng năm', 250000, 220000, '111.jpg', 'cái', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'Kể từ khi ra mắt thế hệ đầu tiên vào năm 2007, những chiếc điện thoại Apple luôn là sản phẩm được nhiều người dùng ưa chuộng, mang lại cho Apple nguồn lợi nhuận khổng lồ. Theo những con số thống kê, đã từng có thời điểm Táo khuyết chiếm đến hơn 90% lợi nhuận của toàn ngành di động, mà điện thoại Apple chính là một trong những nhân tố chủ lực tạo nên thành công ấy. Trong năm 2018, Apple cho ra mắt 3 dòng điện thoại iPhone, mang tên: iPhone XS, iPhone XS Max, iPhone XR nhằm phục vụ cho số lượng lớn người dùng yêu thích hãng táo khuyết.', 'apple.jpg', NULL, NULL),
(2, 'Samsung', 'Kể từ vài năm trở lại đây, sự cạnh tranh, ngăn cản sự độc tôn của Apple về dòng smartphone cao cấp đó chính là Samsung - một công ty sản xuất điện thoại đến từ Hàn Quốc. Với chất lượng cao cũng như là kiểu dáng hiện đại, các dòng máy của Samsung luôn luôn được người tiêu dùng đánh giá rất cao. Cùng với đó không chỉ sản xuất ra những flagship cao cấp, Samsung còn sản xuất ra nhiều sản phẩm với phân khúc phù hợp nhu cầu của từng nhóm khách hàng. Vì vậy, với số tiền bỏ ra ít hơn nhưng bạn vẫn sở hữu những chiếc điện thoại vô cùng thời thượng của một hãng điện thoại lớn nhất nhì thế giới.', 'samsung.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Xiaomi', 'Điện thoại XiaoMi – Smartphone tầm trung hấp dẫn. Hãng có đầy đủ các sản phẩm trải dài trên các phân khúc, chủ yếu là tầm trung và giá rẻ. Tuy vậy nhưng cấu hình của sản phẩm rất đáng nể như Xiaomi Mi 8 Lite, Xiaomi Redmi Note 3, Xiaomi Mi MIX Exclusive Edition…', 'xiaomi.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Nokia', 'Sau một thời gian tạm ngưng hoạt động, “gã khổng lồ” Nokia đã chính thức quay trở lại với loạt sản phẩm chạy Android được giới công nghệ cũng như cộng đồng người dùng đánh giá cao, hứa hẹn về một ngày không xa, Nokia sẽ lấy lại vị thế hàng đầu của mình.', 'nokia.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Huawei', 'Điện thoại Huawei – Thương hiệu hàng đầu trên thị trường di động. Huawei là một trong những công ty nổi tiếng trong lĩnh vực công nghệ. Nhiều năm liền, hãng này chỉ đứng sau Apple và Samsung trên bảng xếp hạng những nhà sản xuất smartphone lớn nhất thế giới nhờ những sản phẩm có thiết kế đẹp và chất lượng rất tốt. Trong năm 2018, Huawei cho ra mắt 2 dòng cao cấp là Mate 20 và Mate 20 Pro nhằm mang đến những trải nghiệm tuyệt vời cho người dùng.', 'huawei.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'OPPO', 'Với sự đầu tư nghiêm túc về quy trình sản xuất, quảng cáo cũng như chính sách hậu mãi tốt, điện thoại OPPO ngày càng có chỗ đứng vững chắc trên thị trường quốc tế lẫn Việt Nam. Sở hữu kiểu dáng thanh lịch, mang vẻ đẹp quyến rũ và có chất lượng tốt, đặc biệt ở bộ phận camera, điện thoại OPPO đã khẳng định được thương hiệu và chiếm được lòng tin của không ít người dùng Việt.', 'oppo.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Vsmart', 'Vsmart - Thương hiệu smartphone của tập đoàn Vingroup vừa tung ra bộ tứ sản phẩm đầu tiên của mình hứa hẹn sẽ đem đến cuộc cạnh tranh khốc liệt trên thị trường điện thoại vốn đã \"đất chật người đông\" tại nước ta. Được chuyển giao công nghệ từ hãng điện thoại nổi tiếng đến từ Tây Ban Nha BQ (Vingroup sở hữu phần lớn cổ phần), chỉ trong 6 tháng Vsmart đã ra mắt 4 mẫu điện thoại đầu tiên của mình với mức giá cạnh tranh', 'vsmart.jpg', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `status`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 1, 'Trần Trung Kiên', 'kinkin_288@yahoo.com.vn', '$2y$10$eOl1dJsN/kgpHTVVpBDajOH1WyYLifVSqinUMECUdpseknC4wGFG2', '0969909576', 'Số 14 Nguyễn Khuyến Đống Đa Hà Nội', NULL, '2019-05-12 03:45:45', '2019-05-12 03:45:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
