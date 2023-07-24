-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 10:43 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acclook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile_no`, `email`, `password`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'Nayan Chabhadiya ', '7048158322', 'nayanchabhadiya123@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'uploads/user_profiles/nayan.jpg', '2021-05-27 10:08:09', '2021-06-19 10:18:12'),
(6, 'Umang Bhalodiya', '7967091366', 'umangbhalodiya@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'uploads/admin_profiles/profile.png', '2021-06-09 17:50:40', '2021-06-09 17:50:40'),
(7, 'meet', '1234567890', 'meet@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'uploads/admin_profiles/3.JPG', '2021-06-10 08:47:57', '2021-06-10 08:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `post_id`, `user_id`, `user_name`, `amount`, `created_at`) VALUES
(13, 2, 1, 'Umang Bhalodiya', 100, '2021-06-10 07:57:59'),
(14, 1, 1, 'Umang Bhalodiya', 100, '2021-06-10 08:44:50'),
(15, 1, 2, 'Meet Ghelani', 1200, '2021-06-16 03:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `contects`
--

CREATE TABLE `contects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `contected_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contects`
--

INSERT INTO `contects` (`id`, `name`, `email`, `phone`, `company_name`, `message`, `contected_at`) VALUES
(1, 'Meet Ghelani', 'meet@gmail.com', '1234567890', 'ghelani foundation', 'hi admins', '2021-06-20 13:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`) VALUES
(7, 'Apex Legends'),
(9, 'Brewl Stars'),
(5, 'Call Of Duty'),
(14, 'Clash Of Clans'),
(8, 'Clash Royale'),
(3, 'Free Fire'),
(15, 'IGI'),
(13, 'PUBG');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `duration` date NOT NULL,
  `post_image` varchar(1000) NOT NULL DEFAULT 'default.png',
  `post_date` date NOT NULL,
  `post_votes` int(11) NOT NULL DEFAULT 0,
  `post_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `game_name`, `account_type`, `duration`, `post_image`, `post_date`, `post_votes`, `post_content`) VALUES
(1, 11, 'Clash Of Clans', 'Clash Of Clans', '2020-04-10', 'uploads/posts/da0781y-5a9b1342-3e26-4550-8a93-139f066d4e7c.png', '2021-06-24', 0, 'EXPERIENCE LEVEL = 178,\r\nTOWNHALL - 4 MAX,\r\nGEMS - 222\r\n'),
(2, 2, 'Apex Legends', 'Apex Legends', '2020-07-24', 'uploads/posts/apex-legends-how-to-view-change-stat-tracker.jpg', '2021-06-24', 0, 'EXPERIENCE LEVEL : 18,\r\ndaimon : 100,\r\nCOIN : 9000');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `email`, `subscribed_at`) VALUES
(1, 2, 'meet@gmail.com', '2021-06-20 13:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `amount` int(255) DEFAULT NULL,
  `pay_to` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `user_name`, `user_email`, `user_phone`, `amount`, `pay_to`, `created_at`) VALUES
(2, 2, 'Meet Ghelani', 'meet@gmail.com', '7206720699', 100, 'Acclook Foundation', '2021-06-09 17:03:57'),
(3, 1, 'Umang Bhalodiya', 'umang@gmail.com', '9876543219', 100, 'Acclook Foundation', '2021-06-10 08:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile_no`, `email`, `password`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'Umang Bhalodiya', '9876543219', 'umang@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'admin/uploads/user_profiles/2.JPG', '2021-05-26 10:16:19', '2021-06-10 08:45:26'),
(2, 'Meet Ghelani', '7206720699', 'meet@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'admin/uploads/user_profiles/meet.jpg', '2021-05-26 10:31:04', '2021-06-09 17:01:33'),
(11, 'user', '7048158322', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'admin/uploads/user_profiles/11.jpg', '2021-06-24 06:44:06', '2021-06-24 06:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_game`
--

CREATE TABLE `user_game` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `username_in_game` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_game`
--

INSERT INTO `user_game` (`id`, `user_id`, `game_name`, `username_in_game`) VALUES
(7, 2, 'PUBG', 'meetghelani'),
(8, 2, 'Clash Of Clan', 'meet1234'),
(9, 1, 'PUBG', 'umnagbhalodiya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post` (`post_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `contects`
--
ALTER TABLE `contects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts` (`user_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_sub` (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_t` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_game`
--
ALTER TABLE `user_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contects`
--
ALTER TABLE `contects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_game`
--
ALTER TABLE `user_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `fk_user_sub` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_user_id_t` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_game`
--
ALTER TABLE `user_game`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
