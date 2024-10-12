-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 09:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_nic` varchar(20) NOT NULL,
  `a_phone` varchar(20) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_image` varchar(255) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_nic`, `a_phone`, `a_email`, `a_image`, `a_username`, `a_password`) VALUES
(5, 'Ishara', '200220022002', '0781111111', 'ishu@gmail.com', '663902a34fdae_ishara.jpg', 'ishara', '2002'),
(7, 'Supun', '200239934884', '0119898989', 'supun@gmail.com', '663902ddc85a2_supun.jpg', 'supun', '2002'),
(8, 'Hirunya', '200330033003', '0755123245', 'hiru@gmail.com', '6639031116f7a_hirunya.jpg', 'hirunya', '2003'),
(9, 'admin', '1111111111', '0000000000', 'admin@gmail.com', '663903e4924bc_admin.png', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`id`, `userid`, `name`, `address`, `city`, `price`, `available`, `image`, `description`) VALUES
(16, 8, 'luxurary colombo', '16/01, Aturugiriya.', 'Colombo', 120000.00, 1, 'apartment_image/66390cae3bac3_ap5.jpg', '2 rooms with pool area'),
(17, 10, 'Beautiful apartment', 'No 01, Baddegama', 'Galle', 400000.00, 1, 'apartment_image/663919d828b76_ap4.jpg', '2 bathroom, study area'),
(18, 10, 'Retreat Apartments', 'ABC village, Kandy road', 'Kandy', 8000.00, 1, 'apartment_image/66391c99a96e9_ap7.jpg', 'Beautiful apartment with best view'),
(19, 8, 'Brand New Apartments for Sale in Colombo 05- Trillium Havelock Residencies', 'Colombo 05- Trillium Havelock Residencies', 'Colombo', 150000.00, 1, 'apartment_image/66391d66ddfe1_ap10.jpg', 'Property Type: Brand New Apartment Bedrooms: 2 & 3 Bedrooms Width of approach road (in feet): 20ft roads Bathrooms/WCs: 2 bathrooms Floor area: sq.ft. 750 -1,450 sq.ft No. of floors: 11'),
(20, 8, '3 Bedroom Apartment for Sale ', '447 Luna Tower, Matara 2.', 'Matara', 90000.00, 0, 'apartment_image/66391e00ddfa9_ap9.jpg', 'Experience city living at its finest in this chic condo retreat. Immerse yourself in the luxurious ambiance of the building’s amenities, from the rooftop infinity pool to the state-of-the-art fitness center. Inside your sanctuary, revel in the seamless blend of modern design and comfort. With bustling city life just outside your doorstep, this condo offers an unparalleled lifestyle that’s perfect for professionals and urban enthusiasts alike.  Nestled in a vibrant community, this condo is your gateway to a dynamic lifestyle, complete with trendy eateries, parks, cultural hotspots, top-notch schools and amenities just a stone’s throw away, Your dream home awaits!  Apartment at 447 Luna Tower for Sale:  Sale - 200M LKR (Negotiable) Beds - 3 Baths - 3 Location - 447, Luna Tower, Union Place. Square feet in sizesq. Floor - 37th floor Fully Furnished'),
(21, 8, 'Diamante Residence', 'Red Roase Streat, 16/28, Beauti Village', 'Nuwara Eliya', 70000000.00, 1, 'apartment_image/66391ef7e2ad3_ap3.jpg', 'Property Code: A328 Location: Colombo 05 Complex: Diamante Residencies View: City Type: Unfurnished Bedroom: 03 Bathroom: 02 Floor Area: 1533 Sqft Servants` Quarters: Available Built Year: 2024  Other Features: Gym and Rooftop  Note: 10 units available in this complex. Price starting LKR 70 Million upwards'),
(22, 8, 'pvt apartments', 'Araliya road,Jaffna 01', 'Jaffna', 124000.00, 1, 'apartment_image/66392cfe1ad8c_ap6.jpg', 'contact 0786542100');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `complaint` text NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `u_id`, `u_email`, `complaint`, `reply`) VALUES
(26, 9, 'mahiru@gmail.com', 'i have a issue', 'Can you describe it?'),
(27, 9, 'mahiru@gmail.com', 'can i contact admin', 'you have to wait'),
(28, 10, 'user@gmail.com', 'Are you available?', 'yes'),
(29, 10, 'user@gmail.com', 'hey', ''),
(30, 10, 'user@gmail.com', '???', 'why?'),
(31, 0, 'nonregistred@gmail.com', 'how to register', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `user_name`, `user_image`, `email`, `comment`, `created_at`) VALUES
(8, 9, 'Mahiru', '66390e4d4f914_mahiru.jpg', 'mahiru@gmail.com', 'Highly Recommended.', '2024-05-06 17:08:19'),
(9, 9, 'Mahiru', '66390e4d4f914_mahiru.jpg', 'mahiru@gmail.com', 'Good Website', '2024-05-06 17:08:47'),
(10, 8, 'sahan munasingha', '66390ba5f2899_sahan.jpg', 'sahan@gmail.com', 'Best web forever', '2024-05-06 17:15:22'),
(11, 8, 'sahan munasingha', '66390ba5f2899_sahan.jpg', 'sahan@gmail.com', '5 star service', '2024-05-06 17:16:11'),
(12, 10, 'User', '663918fc0301c_user.png', 'user@gmail.com', 'woow', '2024-05-06 17:53:33'),
(13, 10, 'User', '663918fc0301c_user.png', 'user@gmail.com', 'niceee', '2024-05-06 17:58:33'),
(14, 10, 'User', '663918fc0301c_user.png', 'user@gmail.com', 'wonderfull', '2024-05-06 17:58:43'),
(15, 10, 'User', '663918fc0301c_user.png', 'user@gmail.com', 'nice work', '2024-05-06 17:58:58'),
(18, 8, 'sahan munasingha', '66390ba5f2899_sahan.jpg', 'sahan@gmail.com', '✹✹✹✹✹', '2024-05-06 18:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('buyer','seller') NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nic`, `phone`, `address`, `dob`, `email`, `username`, `password`, `role`, `profile_image`, `created_at`) VALUES
(8, 'sahan munasingha', '123454321', '079766538', 'colombo', '2002-06-06', 'sahan@gmail.com', 'sahan', '2002', 'seller', '66390ba5f2899_sahan.jpg', '2024-05-06 16:56:05'),
(9, 'Mahiru', '09876789054', '07656564534', 'Gampaha', '2003-06-06', 'mahiru@gmail.com', 'mahiru', '2003', 'buyer', '66390e4d4f914_mahiru.jpg', '2024-05-06 17:07:25'),
(10, 'User', '848544538', '0785432211', 'Sliit, Malabe', '2024-05-06', 'user@gmail.com', 'user', 'user', 'seller', '663918fc0301c_user.png', '2024-05-06 17:53:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
