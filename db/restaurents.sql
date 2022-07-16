-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 11:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk_halal_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
                                `id` int(11) NOT NULL,
                                `log_text` varchar(500) NOT NULL,
                                `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
                               `id` int(11) NOT NULL,
                               `name` varchar(20) NOT NULL,
                               `ip` varchar(150) NOT NULL,
                               `image` varchar(100) NOT NULL,
                               `email` varchar(30) NOT NULL,
                               `password` varchar(20) NOT NULL,
                               `role` varchar(15) NOT NULL DEFAULT 'sales',
                               `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `ip`, `image`, `email`, `password`, `role`, `updated_at`) VALUES
                                                                                                       (1, 'Food Island', '27.147.190.199', 'public/images/profile/monoget.png', 'admin@test.com', '@BCD1234', 'admin', '2022-02-06 17:16:17'),
                                                                                                       (2, 'Munna Khan', '103.107.160.134', 'public/images/avatar-01.jpg', 'munna@gmail.com', '@BCD1234', 'admin', '2022-02-10 17:09:43'),
                                                                                                       (3, 'Syed Shifat', '103.107.161.88', 'public/images/avatar-01.jpg', 'shifat@gmail.com', '@BCD1234', 'seo', '2022-02-10 17:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
                                   `id` int(11) NOT NULL,
                                   `f_name` varchar(15) NOT NULL,
                                   `l_name` varchar(15) NOT NULL,
                                   `email` varchar(30) NOT NULL,
                                   `phone_number` varchar(15) NOT NULL,
                                   `address` varchar(30) NOT NULL,
                                   `city` varchar(15) NOT NULL,
                                   `zip_code` varchar(10) NOT NULL,
                                   `state` varchar(5) NOT NULL,
                                   `id_name` varchar(15) NOT NULL,
                                   `id_value` varchar(20) NOT NULL,
                                   `preferred_schedule` varchar(1000) NOT NULL,
                                   `payment_type` varchar(20) NOT NULL DEFAULT 'Card',
                                   `transaction_number` varchar(100) NOT NULL,
                                   `transaction_image` varchar(200) NOT NULL,
                                   `attach_files` varchar(500) NOT NULL,
                                   `credit_card_num` varchar(20) NOT NULL,
                                   `exp_month` varchar(15) NOT NULL,
                                   `exp_year` varchar(10) NOT NULL,
                                   `cvv` varchar(5) NOT NULL,
                                   `approve` int(11) NOT NULL DEFAULT 3,
                                   `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
                            `id` int(11) NOT NULL,
                            `name` varchar(100) NOT NULL,
                            `status` int(11) NOT NULL DEFAULT 1,
                            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `updated_at`) VALUES
                                                                  (1, 'Breakfast', 1, '2022-06-20 17:52:58'),
                                                                  (2, 'Lunch/Dinner', 1, '2022-06-20 17:53:15'),
                                                                  (3, 'Dessert', 1, '2022-06-22 15:34:55'),
                                                                  (4, 'Drinks', 1, '2022-06-21 18:05:58'),
                                                                  (5, 'Bakery', 1, '2022-06-20 17:53:45'),
                                                                  (6, 'Snacks', 1, '2022-06-20 17:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
                           `id` int(11) NOT NULL,
                           `name` varchar(100) NOT NULL,
                           `image` varchar(250) NOT NULL,
                           `phone_no` varchar(15) NOT NULL,
                           `email` varchar(50) NOT NULL,
                           `message` varchar(500) NOT NULL,
                           `product_code` varchar(11) NOT NULL,
                           `rating` int(11) NOT NULL,
                           `status` int(11) NOT NULL DEFAULT 0,
                           `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
                           `id` int(11) NOT NULL,
                           `name` varchar(20) NOT NULL,
                           `email` varchar(30) NOT NULL,
                           `subject` varchar(50) NOT NULL,
                           `message` varchar(1000) NOT NULL,
                           `approve` int(11) NOT NULL DEFAULT 3,
                           `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
                                   `id` int(11) NOT NULL,
                                   `billing_id` int(11) NOT NULL,
                                   `product_name` varchar(20) NOT NULL,
                                   `product_quantity` int(11) NOT NULL,
                                   `product_unit_price` double(10,2) NOT NULL,
  `product_total_price` double(10,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
                              `id` int(11) NOT NULL,
                              `email` varchar(30) NOT NULL,
                              `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seo_data`
--

CREATE TABLE `seo_data` (
                            `id` int(11) NOT NULL,
                            `pagename` varchar(100) NOT NULL,
                            `seo_title` varchar(100) NOT NULL,
                            `seo_description` varchar(250) NOT NULL,
                            `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seo_data`
--

INSERT INTO `seo_data` (`id`, `pagename`, `seo_title`, `seo_description`, `update_at`) VALUES
                                                                                           (1, 'home', 'Driving School in New York | Broadway Driving School', 'One of the best driving schools in New York. Offering services like Driving lessons, Road test Appointments, 5 hr online courses, Female instructors, etc.', '2022-04-23 20:02:48'),
                                                                                           (2, 'home_banner_1_caption', '', 'The 5-Hour course is also known as the Pre-Licensing Course demonstrates to you the information and abilities you really want to turn into a more secure, more dependable driver.', '2022-02-11 15:47:30'),
                                                                                           (3, 'home_banner_1_title', 'Road Test, 5 hr course, Highway lesson, Driving school, New York.', '5-Hour-Course', '2022-02-22 20:19:24'),
                                                                                           (4, 'home_banner_1_image_alt', '', 'Broadway Driving School, New York.', '2022-04-23 20:04:28'),
                                                                                           (5, 'home_banner_2_title', '', 'Basic Packages', '2021-12-30 16:57:23'),
                                                                                           (6, 'home_banner_2_caption', '', 'Modify your course according to your necessity. Get the best out of us. We teach driving lessons for beginners, intermediate and advanced drivers.', '2021-12-30 17:00:49'),
                                                                                           (7, 'home_banner_2_image_alt', '', 'Broadway Driving School, New York.', '2022-04-23 20:04:32'),
                                                                                           (8, 'home_banner_3_title', '', 'Standard Packages', '2021-12-30 16:57:23'),
                                                                                           (9, 'home_banner_3_caption', '', 'Modify your course according to your necessity. Get the best out of us. We teach driving lessons for beginners, intermediate and advanced drivers.', '2021-12-30 17:00:49'),
                                                                                           (10, 'home_banner_3_image_alt', '', 'Broadway Driving School, New York.', '2022-04-23 20:04:36'),
                                                                                           (11, 'home_image_section_1', '', 'Our instructors truly know tips and tricks of moving an amateur driver toward safe and self-assured driver.', '2021-12-30 16:58:18'),
                                                                                           (12, 'home_image_section_1_image_alt', '', 'Broadway Driving School, New York.', '2022-04-23 20:05:26'),
                                                                                           (13, 'home_image_section_2', '', 'Our instructor will direct you through the functional and theoretical side of driving and can even run a mock test for you, so you are ready for road test.', '2022-04-23 20:07:20'),
                                                                                           (14, 'home_image_section_1_image_alt', '', 'Brodway Driving School, New York.', '2022-04-23 20:07:41'),
                                                                                           (15, 'home_image_section_3', '', 'Our carefully design lessons mean that we are geared up to help you pass.', '2021-12-30 16:58:18'),
                                                                                           (16, 'home_image_section_1_image_alt', '', 'Broadway Driving School, New York.', '2022-04-23 20:08:23'),
                                                                                           (17, 'footer_caption', '', 'Broadway Driving School, the place where you will get one of the most advanced and intensive driving training available in the New York city area.', '2022-04-23 20:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
                              `id` int(8) NOT NULL,
                              `category_id` int(11) NOT NULL,
                              `p_name` varchar(255) NOT NULL,
                              `p_description` varchar(1000) NOT NULL DEFAULT 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.',
                              `code` varchar(20) NOT NULL,
                              `price` double(10,2) NOT NULL,
  `menu_image` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `extended_image` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `category_id`, `p_name`, `p_description`, `code`, `price`, `menu_image`, `product_image`, `extended_image`, `status`, `updated_at`) VALUES
                                                                                                                                                                        (1, 1, 'Tea', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '9FQ8PTOT', 2.09, 'assets/img/sk-menu/39.png', 'assets/img/sk-shop/37.png', '', 1, '2022-06-20 18:01:38'),
                                                                                                                                                                        (2, 1, 'Coffee', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'H3MI52VU', 2.79, 'assets/img/sk-menu/37.png', 'assets/img/sk-shop/38.png', '', 1, '2022-06-20 18:01:38'),
                                                                                                                                                                        (3, 1, 'Fresh Juice', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '7G8ZNF5B', 8.37, 'assets/img/sk-menu/38.png', 'assets/img/sk-shop/36.png', '', 1, '2022-06-20 18:01:38'),
                                                                                                                                                                        (4, 1, 'Bagel', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '154L38MR', 2.07, 'assets/img/sk-menu/33.png', 'assets/img/sk-shop/33.png', '', 1, '2022-06-20 18:01:38'),
                                                                                                                                                                        (5, 1, 'Croissant', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'LTQFWPDB', 2.45, 'assets/img/sk-menu/83159_22.png', 'assets/img/sk-shop/1744_21.png', '', 1, '2022-06-20 18:12:40'),
                                                                                                                                                                        (6, 1, 'Boiled Egg (2 Pcs)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'KGITMSTI', 2.79, 'assets/img/sk-menu/15077_35.png', 'assets/img/sk-shop/37153_35.png', '', 1, '2022-06-20 18:13:34'),
                                                                                                                                                                        (7, 1, 'Egg Omelet', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '4QT5MLJM', 2.79, 'assets/img/sk-menu/33124_4.png', 'assets/img/sk-shop/72386_4.png', '', 1, '2022-06-20 18:14:25'),
                                                                                                                                                                        (8, 1, 'Toasted Bread With Butter', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'WNXZSK0U', 2.79, 'assets/img/sk-menu/62310_40.png', 'assets/img/sk-shop/72614_39.png', '', 1, '2022-06-20 18:15:19'),
                                                                                                                                                                        (9, 1, 'Bagel and Egg', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'C3LU592R', 4.19, 'assets/img/sk-menu/81102_31.png', 'assets/img/sk-shop/43532_31.png', '', 1, '2022-06-20 18:16:12'),
                                                                                                                                                                        (10, 1, 'Toasted Bread With Egg', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '7BJE4WX6', 4.19, 'assets/img/sk-menu/51855_41.png', 'assets/img/sk-shop/85849_40.png', '', 1, '2022-06-20 18:16:55'),
                                                                                                                                                                        (11, 1, 'Toasted Bread with Egg and Avacodo', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'V318NDFR', 6.99, 'assets/img/sk-menu/33035_18.png', 'assets/img/sk-shop/19860_17.png', '', 1, '2022-06-20 18:17:38'),
                                                                                                                                                                        (12, 1, 'Chicken Wraps', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'QV87VH10', 6.99, 'assets/img/sk-menu/91536_34.png', 'assets/img/sk-shop/25995_32.png', '', 1, '2022-06-20 18:18:17'),
                                                                                                                                                                        (13, 1, 'Bagel With jelly and Butter', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'Y6DEJNTD', 3.49, 'assets/img/sk-menu/93167_32.png', 'assets/img/sk-shop/10057_30.png', '', 1, '2022-06-20 18:19:02'),
                                                                                                                                                                        (14, 1, 'Wrap With sausages', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'ZOV2D7Q4', 2.79, 'assets/img/sk-menu/28464_14.png', 'assets/img/sk-shop/87040_14.png', '', 1, '2022-06-20 18:19:43'),
                                                                                                                                                                        (15, 1, 'Bagel and Cheese', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'VWGTO1WZ', 4.19, 'assets/img/sk-menu/3037_30.png', 'assets/img/sk-shop/59704_29.png', '', 1, '2022-06-20 18:20:31'),
                                                                                                                                                                        (16, 1, 'Conflux, Milk and Egg', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'QSVSMX2M', 7.69, 'assets/img/sk-menu/55220_36.png', 'assets/img/sk-shop/4969_34.png', '', 1, '2022-06-20 18:21:32'),
                                                                                                                                                                        (17, 2, 'Vegetable Fried Rice', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'FQ7TDJ85', 8.39, 'assets/img/sk-menu/25289_80.png', 'assets/img/sk-shop/21496_77.png', '', 1, '2022-06-20 18:24:11'),
                                                                                                                                                                        (18, 2, 'Vegetable Curry', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'KX7T25WP', 8.39, 'assets/img/sk-menu/66636_19.png', 'assets/img/sk-shop/18503_18.png', '', 1, '2022-06-20 18:25:16'),
                                                                                                                                                                        (19, 2, 'Steam Rice', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '2GM7WO7W', 2.79, 'assets/img/sk-menu/93681_79.png', 'assets/img/sk-shop/62984_78.png', '', 1, '2022-06-20 18:26:08'),
                                                                                                                                                                        (20, 2, 'Plain Rice', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '6JIMMS9S', 4.19, 'assets/img/sk-menu/18698_75.png', 'assets/img/sk-shop/34962_74.png', '', 1, '2022-06-20 18:26:44'),
                                                                                                                                                                        (21, 2, 'Beef Curry', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'QG44WUMA', 11.19, 'assets/img/sk-menu/37899_69.png', 'assets/img/sk-shop/73296_68.png', '', 1, '2022-06-20 18:27:39'),
                                                                                                                                                                        (22, 2, 'Chicken Curry', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'H4N93GIE', 11.19, 'assets/img/sk-menu/74402_3.png', 'assets/img/sk-shop/6353_3.png', '', 1, '2022-06-20 18:28:22'),
                                                                                                                                                                        (23, 2, 'Goat Curry', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'CB5UOWCG', 18.19, 'assets/img/sk-menu/25614_73.png', 'assets/img/sk-shop/33553_72.png', '', 1, '2022-06-20 18:29:16'),
                                                                                                                                                                        (24, 2, 'Beef Biryani', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'IG9EP394', 13.99, 'assets/img/sk-menu/12438_1.png', 'assets/img/sk-shop/97070_2.png', '', 1, '2022-06-20 18:29:47'),
                                                                                                                                                                        (25, 2, 'Chicken Biryani', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'WLA0U342', 13.99, 'assets/img/sk-menu/5907_72.png', 'assets/img/sk-shop/56798_71.png', '', 1, '2022-06-20 18:30:44'),
                                                                                                                                                                        (26, 2, 'Goat Biryani', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '403ORWQ0', 18.19, 'assets/img/sk-menu/94974_74.png', 'assets/img/sk-shop/10741_73.png', '', 1, '2022-06-20 18:31:35'),
                                                                                                                                                                        (27, 2, 'Shrimp Curry', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'UCUY2LEU', 13.99, 'assets/img/sk-menu/75850_77.png', 'assets/img/sk-shop/61939_75.png', '', 1, '2022-06-20 18:32:14'),
                                                                                                                                                                        (28, 2, 'Salmon special', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'KIXBSKP2', 25.19, 'assets/img/sk-menu/87411_78.png', 'assets/img/sk-shop/14051_79.png', '', 1, '2022-06-20 18:33:06'),
                                                                                                                                                                        (29, 2, 'Pasta', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'S77C7QT7', 11.19, 'assets/img/sk-menu/97994_76.png', 'assets/img/sk-shop/78721_76.png', '', 1, '2022-06-20 18:33:47'),
                                                                                                                                                                        (30, 2, 'Chicken Salad Special', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'HCKWX70U', 13.99, 'assets/img/sk-menu/21501_71.png', 'assets/img/sk-shop/20457_70.png', '', 1, '2022-06-20 18:34:43'),
                                                                                                                                                                        (31, 2, 'Beef Steak with Egg', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'LQF4POON', 26.59, 'assets/img/sk-menu/66820_70.png', 'assets/img/sk-shop/54230_69.png', '', 1, '2022-06-20 18:35:35'),
                                                                                                                                                                        (32, 2, 'SK special Lunch (Beef and Bread)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '2GN236VX', 16.79, 'assets/img/sk-menu/11870_unknown.png', 'assets/img/sk-shop/22260_unknown.png', '', 1, '2022-06-20 18:37:57'),
                                                                                                                                                                        (33, 2, 'Khichury', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'UWEQ8WWZ', 6.99, 'assets/img/sk-menu/94313_2.png', 'assets/img/sk-shop/55458_1.png', '', 1, '2022-06-20 18:38:33'),
                                                                                                                                                                        (34, 3, 'Shahi Kulfi', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'Z31X2Z60', 3.49, 'assets/img/sk-menu/87946_44.png', 'assets/img/sk-shop/44640_43.png', '', 1, '2022-06-20 18:40:50'),
                                                                                                                                                                        (35, 3, 'Gulab Jamun', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'JT3LQ9DE', 2.79, 'assets/img/sk-menu/94154_5.png', 'assets/img/sk-shop/74330_6.png', '', 1, '2022-06-20 18:41:25'),
                                                                                                                                                                        (36, 3, 'Raj Vog', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'J4Z8M4EG', 3.49, 'assets/img/sk-menu/44449_43.png', 'assets/img/sk-shop/85402_41.png', '', 1, '2022-06-20 18:42:09'),
                                                                                                                                                                        (37, 3, 'Sweet Yogurt', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'Z6B9QFGD', 6.99, 'assets/img/sk-menu/95779_45.png', 'assets/img/sk-shop/57829_44.png', '', 1, '2022-06-20 18:42:50'),
                                                                                                                                                                        (38, 3, 'Rice Pudding', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '6UYZ837B', 6.99, 'assets/img/sk-menu/50607_42.png', 'assets/img/sk-shop/26274_42.png', '', 1, '2022-06-20 18:43:29'),
                                                                                                                                                                        (39, 4, 'All soda cans (12 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '97YYBQKA', 1.39, 'assets/img/sk-menu/48713_unknown.png', 'assets/img/sk-shop/46242_unknown.png', '', 1, '2022-06-20 18:44:52'),
                                                                                                                                                                        (40, 4, 'Pepsi (20 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '5O4LFLJJ', 2.79, 'assets/img/sk-menu/3059_62.png', 'assets/img/sk-shop/31640_61.png', '', 1, '2022-06-20 18:45:34'),
                                                                                                                                                                        (41, 4, 'All Soda (2 L)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '2NCCMAO3', 3.85, 'assets/img/sk-menu/63224_56.png', 'assets/img/sk-shop/67713_54.png', '', 1, '2022-06-20 18:46:59'),
                                                                                                                                                                        (42, 4, 'Organic Lemonade (96 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'IN502HKB', 6.99, 'assets/img/sk-menu/52343_61.png', 'assets/img/sk-shop/13901_60.png', '', 1, '2022-06-20 18:47:52'),
                                                                                                                                                                        (43, 4, 'Ocean Spray (96 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '9CHHO5KM', 8.39, 'assets/img/sk-menu/27626_60.png', 'assets/img/sk-shop/36429_59.png', '', 1, '2022-06-20 18:48:34'),
                                                                                                                                                                        (44, 4, 'Tropicana Orange Juice (52 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'GZ2O4NOJ', 6.99, 'assets/img/sk-menu/44328_68.png', 'assets/img/sk-shop/97068_67.png', '', 1, '2022-06-20 18:49:33'),
                                                                                                                                                                        (45, 4, 'Tropicana Orange Juice (10 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '4O5P07ZN', 1.39, 'assets/img/sk-menu/75466_66.png', 'assets/img/sk-shop/74886_64.png', '', 1, '2022-06-20 18:50:19'),
                                                                                                                                                                        (46, 4, 'Tropicana Orange Juice (15 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'ZDHVB6GT', 3.49, 'assets/img/sk-menu/70381_67.png', 'assets/img/sk-shop/5404_66.png', '', 1, '2022-06-20 18:50:54'),
                                                                                                                                                                        (47, 4, 'Tropicana Cranberry Juice (15 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'B0B8DWLG', 3.49, 'assets/img/sk-menu/14619_65.png', 'assets/img/sk-shop/59249_65.png', '', 1, '2022-06-20 18:51:33'),
                                                                                                                                                                        (48, 4, 'Gatorade (12 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'VWLS09NE', 1.75, 'assets/img/sk-menu/36281_57.png', 'assets/img/sk-shop/50337_56.png', '', 1, '2022-06-20 18:53:02'),
                                                                                                                                                                        (49, 4, 'Gatorade (20 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '1R7R7C9K', 2.79, 'assets/img/sk-menu/3795_57.png', 'assets/img/sk-shop/77495_56.png', '', 1, '2022-06-20 18:54:26'),
                                                                                                                                                                        (50, 4, 'Gatorade (40 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '1NJS0HV9', 4.19, 'assets/img/sk-menu/3526_57.png', 'assets/img/sk-shop/52539_56.png', '', 1, '2022-06-20 18:55:19'),
                                                                                                                                                                        (51, 4, 'Monster', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '3WPZC0O5', 4.19, 'assets/img/sk-menu/86312_58.png', 'assets/img/sk-shop/48464_57.png', '', 1, '2022-06-20 18:56:02'),
                                                                                                                                                                        (52, 4, 'Naked', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'J6WJR6EF', 3.49, 'assets/img/sk-menu/32281_59.png', 'assets/img/sk-shop/87204_58.png', '', 1, '2022-06-20 18:57:01'),
                                                                                                                                                                        (53, 4, 'Sunny D', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'VIS7USI5', 1.39, 'assets/img/sk-menu/27362_64.png', 'assets/img/sk-shop/16333_62.png', '', 1, '2022-06-20 18:57:54'),
                                                                                                                                                                        (54, 4, 'Bai (Antioxidant)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '2UYG4RSK', 3.15, 'assets/img/sk-menu/44869_55.png', 'assets/img/sk-shop/77891_55.png', '', 1, '2022-06-20 18:58:52'),
                                                                                                                                                                        (55, 4, 'Sparkling water', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'KLJG1HVP', 1.39, 'assets/img/sk-menu/28400_63.png', 'assets/img/sk-shop/8900_63.png', '', 1, '2022-06-20 19:30:17'),
                                                                                                                                                                        (56, 4, 'Starbucks Coffee Drinks', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '7ROGY0NI', 4.19, 'assets/img/sk-menu/89798_52.png', 'assets/img/sk-shop/15649_92.png', '', 1, '2022-06-20 20:26:04'),
                                                                                                                                                                        (57, 4, 'Kombucha ( 16 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'IX0R8B18', 4.19, 'assets/img/sk-menu/67659_46.png', 'assets/img/sk-shop/74362_45.png', '', 1, '2022-06-20 20:26:48'),
                                                                                                                                                                        (58, 4, 'Vitamin Water', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'TA8I7OT9', 3.49, 'assets/img/sk-menu/54770_53.png', 'assets/img/sk-shop/49384_52.png', '', 1, '2022-06-20 20:27:19'),
                                                                                                                                                                        (59, 4, 'Arizona', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '0IE8V1ND', 1.39, 'assets/img/sk-menu/67363_97.png', 'assets/img/sk-shop/25189_unknown.png', '', 1, '2022-06-20 20:30:34'),
                                                                                                                                                                        (60, 4, 'Water ( 1Gallon)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'GDVT8IZN', 2.79, 'assets/img/sk-menu/53318_54.png', 'assets/img/sk-shop/83277_93.png', '', 1, '2022-06-20 20:31:45'),
                                                                                                                                                                        (61, 4, 'Soda ( Glass Bottle)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'JOXJV4ZG', 2.45, 'assets/img/sk-menu/47586_50.png', 'assets/img/sk-shop/53462_50.png', '', 1, '2022-06-20 20:32:22'),
                                                                                                                                                                        (62, 4, 'Nesquick Chocolate', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '7XBHLIYR', 3.49, 'assets/img/sk-menu/44095_99.png', 'assets/img/sk-shop/85793_unknown.png', '', 1, '2022-06-20 20:33:16'),
                                                                                                                                                                        (63, 4, 'Coconut Water ( Vita Coco )', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'E53AQAPD', 3.15, 'assets/img/sk-menu/77821_47.png', 'assets/img/sk-shop/70597_47.png', '', 1, '2022-06-20 20:33:50'),
                                                                                                                                                                        (64, 4, 'Red Bull (8.4 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'KI6JAGBD', 4.19, 'assets/img/sk-menu/48802_48.png', 'assets/img/sk-shop/63493_46.png', '', 1, '2022-06-20 20:34:21'),
                                                                                                                                                                        (65, 4, 'Milk ( 1 Gallon)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '1DTT8LJS', 6.99, 'assets/img/sk-menu/12900_49.png', 'assets/img/sk-shop/25325_48.png', '', 1, '2022-06-20 20:35:01'),
                                                                                                                                                                        (66, 4, 'Red Bull (12 oz)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'KTOJM03J', 5.59, 'assets/img/sk-menu/87155_48.png', 'assets/img/sk-shop/49858_46.png', '', 1, '2022-06-20 20:35:42'),
                                                                                                                                                                        (67, 4, 'Chobani', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'Y8EFZPPE', 4.19, 'assets/img/sk-menu/58085_unknown.png', 'assets/img/sk-shop/64246_unknown.png', '', 1, '2022-06-20 20:36:11'),
                                                                                                                                                                        (68, 5, 'Small Cookie Pack', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '1WKQT6CM', 1.39, 'assets/img/sk-menu/90672_102.png', 'assets/img/sk-shop/52774_unknown.png', '', 1, '2022-06-21 16:21:34'),
                                                                                                                                                                        (69, 5, 'Muffin', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'SNDMT2WM', 2.79, 'assets/img/sk-menu/85599_27.png', 'assets/img/sk-shop/85000_26.png', '', 1, '2022-06-21 16:22:14'),
                                                                                                                                                                        (70, 5, 'Small Muffin', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'V0NTHNXB', 0.69, 'assets/img/sk-menu/89763_23.png', 'assets/img/sk-shop/44215_22.png', '', 1, '2022-06-21 16:22:56'),
                                                                                                                                                                        (71, 5, 'Pastry', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '3SBH35LC', 5.57, 'assets/img/sk-menu/32277_100.png', 'assets/img/sk-shop/36233_unknown.png', '', 1, '2022-06-21 16:23:42'),
                                                                                                                                                                        (72, 5, 'Small Lemon Cake', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'AXIRNHT2', 0.69, 'assets/img/sk-menu/51888_104.png', 'assets/img/sk-shop/68264_unknown.png', '', 1, '2022-06-21 16:24:43'),
                                                                                                                                                                        (73, 5, 'Tiramisu', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'I4FFZL3S', 5.59, 'assets/img/sk-menu/80424_103.png', 'assets/img/sk-shop/6183_unknown.png', '', 1, '2022-06-21 16:25:24'),
                                                                                                                                                                        (74, 0, 'Slice Cake', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '9V4EAYUQ', 1.05, 'assets/img/sk-menu/58248_104.png', 'assets/img/sk-shop/3226_unknown.png', '', 1, '2022-06-21 16:26:01'),
                                                                                                                                                                        (75, 5, 'Slice Cake', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'RLFKU1RV', 1.05, 'assets/img/sk-menu/21822_101.png', 'assets/img/sk-shop/61634_unknown.png', '', 1, '2022-06-21 16:27:07'),
                                                                                                                                                                        (76, 5, 'Chocolate Slice Cake', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'I05FC0Q9', 1.75, 'assets/img/sk-menu/7687_96.png', 'assets/img/sk-shop/36512_unknown.png', '', 1, '2022-06-21 16:28:00'),
                                                                                                                                                                        (77, 5, 'Pudding', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'BNNBR547', 4.19, 'assets/img/sk-menu/16222_13.png', 'assets/img/sk-shop/27356_13.png', '', 1, '2022-06-21 16:28:32'),
                                                                                                                                                                        (78, 5, 'Italian Donut', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'T6W2MJ7H', 2.79, 'assets/img/sk-menu/6144_98.png', 'assets/img/sk-shop/96545_unknown.png', '', 1, '2022-06-21 16:29:21'),
                                                                                                                                                                        (79, 5, 'Dennis', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'CDWAQVCM', 2.79, 'assets/img/sk-menu/25186_24.png', 'assets/img/sk-shop/52506_23.png', '', 1, '2022-06-21 16:30:03'),
                                                                                                                                                                        (80, 5, 'Chocolate Muffins', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'OA8SDXLB', 2.79, 'assets/img/sk-menu/7294_20.png', 'assets/img/sk-shop/46730_19.png', '', 1, '2022-06-21 16:30:31'),
                                                                                                                                                                        (81, 5, 'Macarons', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '6AUR08PJ', 1.75, 'assets/img/sk-menu/87023_26.png', 'assets/img/sk-shop/26008_25.png', '', 1, '2022-06-21 16:31:02'),
                                                                                                                                                                        (82, 6, 'Fresh Fruits Box', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'BCMEV2CW', 5.59, 'assets/img/sk-menu/93635_91.png', 'assets/img/sk-shop/3619_89.png', '', 1, '2022-06-21 16:32:04'),
                                                                                                                                                                        (83, 6, 'French Fries', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'NFSGAPAP', 4.19, 'assets/img/sk-menu/517_90.png', 'assets/img/sk-shop/33260_88.png', '', 1, '2022-06-21 16:32:40'),
                                                                                                                                                                        (84, 6, 'Pizza Slice', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'J99VH1MM', 2.79, 'assets/img/sk-menu/62235_11.png', 'assets/img/sk-shop/42462_11.png', '', 1, '2022-06-21 16:33:07'),
                                                                                                                                                                        (85, 6, 'Pitha /Traditional Cake', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'JWKCE29R', 6.99, 'assets/img/sk-menu/48048_10.png', 'assets/img/sk-shop/40911_10.png', '', 1, '2022-06-21 16:33:40'),
                                                                                                                                                                        (86, 6, 'Chicken Tender', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'AFGNIK97', 1.39, 'assets/img/sk-menu/91889_88.png', 'assets/img/sk-shop/31408_87.png', '', 1, '2022-06-21 16:34:16'),
                                                                                                                                                                        (87, 6, 'Dal Puri', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'GL8XHB9E', 2.79, 'assets/img/sk-menu/93271_87.png', 'assets/img/sk-shop/60334_86.png', '', 1, '2022-06-21 16:35:11'),
                                                                                                                                                                        (88, 6, 'Singara (Vegetable Samusa)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'S62JJCYN', 2.79, 'assets/img/sk-menu/95746_29.png', 'assets/img/sk-shop/85205_28.png', '', 1, '2022-06-21 16:35:45'),
                                                                                                                                                                        (89, 6, 'Chicken Lollipop', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'K5LYH949', 2.79, 'assets/img/sk-menu/43755_84.png', 'assets/img/sk-shop/22605_83.png', '', 1, '2022-06-21 16:37:01'),
                                                                                                                                                                        (90, 6, 'Banana - (2 pcs)', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'Z7TQ530E', 2.79, 'assets/img/sk-menu/75570_81.png', 'assets/img/sk-shop/81069_80.png', '', 1, '2022-06-21 16:37:43'),
                                                                                                                                                                        (91, 6, 'Chicken Samusa', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'JD4T6XYX', 2.79, 'assets/img/sk-menu/77787_28.png', 'assets/img/sk-shop/27337_27.png', '', 1, '2022-06-22 15:38:23'),
                                                                                                                                                                        (92, 6, 'Beef Kabab', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'DSZFTAAP', 2.79, 'assets/img/sk-menu/68246_82.png', 'assets/img/sk-shop/80486_81.png', '', 1, '2022-06-21 16:39:29'),
                                                                                                                                                                        (93, 6, 'Chicken Sami Kabab', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'LM09QIBE', 2.06, 'assets/img/sk-menu/13493_86.png', 'assets/img/sk-shop/74436_84.png', '', 1, '2022-06-21 16:40:19'),
                                                                                                                                                                        (94, 6, 'Fried Chicken', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', 'FODR06Z3', 2.79, 'assets/img/sk-menu/45703_25.png', 'assets/img/sk-shop/15832_24.png', '', 1, '2022-06-21 16:40:55'),
                                                                                                                                                                        (95, 6, 'Chicken Roll', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '0PQS7KSF', 2.09, 'assets/img/sk-menu/64732_85.png', 'assets/img/sk-shop/37719_85.png', '', 1, '2022-06-21 16:41:30'),
                                                                                                                                                                        (96, 6, 'Vegetables Roll', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '884S1IAX', 1.39, 'assets/img/sk-menu/1208_93.png', 'assets/img/sk-shop/94891_91.png', '', 1, '2022-06-21 16:42:12'),
                                                                                                                                                                        (97, 6, 'Spinach egg white frittatas', 'While food options abound, the best choices are high in fiber, protein, healthy fats, vitamins, and minerals. Many nutritious, healthy foods and drinks are also easy to prepare in the morning. These include fruit, whole-grain toast, eggs, green tea, coffee, and protein shakes.', '4QHKUG4F', 2.79, 'assets/img/sk-menu/2355_92.png', 'assets/img/sk-shop/38227_90.png', '', 1, '2022-06-21 16:42:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_data`
--
ALTER TABLE `seo_data`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_data`
--
ALTER TABLE `seo_data`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
    MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
