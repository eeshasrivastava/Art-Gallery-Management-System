-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 04:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `id` int(30) NOT NULL,
  `artist_id` int(30) NOT NULL,
  `art_title` text NOT NULL,
  `art_description` text NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=unpublished,1=published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `artist_id`, `art_title`, `art_description`, `status`) VALUES
(2, 2, 'Sample Art 2', '&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Ut faucibus pulvinar elementum integer enim neque volutpat ac. Nunc scelerisque viverra mauris in aliquam sem fringilla ut morbi. Sed odio morbi quis commodo odio aenean. Leo urna molestie at elementum eu. Sed elementum tempus egestas sed sed. Eget dolor morbi non arcu risus quis varius quam quisque. Blandit volutpat maecenas volutpat blandit. Diam phasellus vestibulum lorem sed risus ultricies. At tempor commodo ullamcorper a lacus vestibulum sed. Quis hendrerit dolor magna eget est lorem ipsum. Pellentesque habitant morbi tristique senectus et. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur. Ante metus dictum at tempor commodo ullamcorper. Commodo quis imperdiet massa tincidunt nunc pulvinar. Sit amet porttitor eget dolor morbi non arcu risus quis.&lt;/p&gt;&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Vitae aliquet nec ullamcorper sit amet risus. Nisi porta lorem mollis aliquam ut. Eget est lorem ipsum dolor sit amet consectetur adipiscing elit. Faucibus purus in massa tempor. Ullamcorper sit amet risus nullam eget felis eget. Lorem ipsum dolor sit amet consectetur. Non consectetur a erat nam at lectus. Amet nisl suscipit adipiscing bibendum est ultricies integer. Pretium nibh ipsum consequat nisl vel pretium lectus quam. Sit amet cursus sit amet dictum sit. Enim ut sem viverra aliquet. Suscipit tellus mauris a diam maecenas sed. At tempor commodo ullamcorper a lacus. Vitae tempus quam pellentesque nec.&lt;/p&gt;&lt;h4 style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;&lt;b style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Materials:&lt;/b&gt;&lt;/h4&gt;&lt;p&gt;&lt;ul&gt;&lt;li&gt;&lt;b style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Sample 1&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Sample 2&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Sample 3&lt;/b&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/p&gt;', 1),
(4, 2, 'Sample Art', 'Amet mauris commodo quis imperdiet massa tincidunt nunc pulvinar. In aliquam sem fringilla ut morbi tincidunt augue interdum. Laoreet suspendisse interdum consectetur libero id. Pulvinar sapien et ligula ullamcorper malesuada proin libero nunc. Cursus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Sociis natoque penatibus et magnis dis parturient montes. Tellus id interdum velit laoreet id donec ultrices tincidunt arcu. Libero volutpat sed cras ornare. Congue quisque egestas diam in. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Non sodales neque sodales ut etiam. Hendrerit gravida rutrum quisque non tellus orci ac auctor. Faucibus in ornare quam viverra orci sagittis eu volutpat.&lt;h4&gt;&lt;b&gt;Materials&lt;/b&gt;&lt;/h4&gt;&lt;p&gt;&lt;ul&gt;&lt;li&gt;&lt;b&gt;Sample&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;sample&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;sample&lt;/b&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/p&gt;', 0);



-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `artist_id` int(30) NOT NULL,
  `content` text NOT NULL,
  `event_datetime` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `artist_id`, `content`, `event_datetime`, `date_created`) VALUES
(1, 'My Createion', 2, '&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque ornare aenean euismod elementum nisi. Vestibulum lectus mauris ultrices eros in. Felis donec et odio pellentesque. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Ut ornare lectus sit amet. Accumsan in nisl nisi scelerisque eu. Ac odio tempor orci dapibus. Risus ultricies tristique nulla aliquet enim tortor at auctor urna. Feugiat in ante metus dictum at tempor commodo. Et malesuada fames ac turpis egestas maecenas. Rhoncus dolor purus non enim. Faucibus nisl tincidunt eget nullam non nisi est sit amet.&lt;/p&gt;&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Cras adipiscing enim eu turpis egestas pretium aenean. Neque aliquam vestibulum morbi blandit cursus. Eu turpis egestas pretium aenean pharetra magna ac placerat. Laoreet suspendisse interdum consectetur libero id. Et ultrices neque ornare aenean euismod elementum nisi. Placerat in egestas erat imperdiet sed euismod nisi porta. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nulla facilisi morbi tempus iaculis. Etiam tempor orci eu lobortis. Sit amet dictum sit amet justo.&lt;/p&gt;', '2020-10-12 15:00:00', '2020-10-09 14:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `art_fs_id` int(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=for verification,1= confirmed,2 = cancel, 3= delivered',
  `deliver_schedule` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `art_fs_id`, `customer_id`, `status`, `deliver_schedule`) VALUES
(1, 2, 4, 0, '2020-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Art Gallery Management System', 'info@sample.comm', '+6948 8542 623', '1602247020_photo-1533158326339-7f3cf2404354.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1 = admin, 2= artist,3= customers',
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `contact`, `user_type`, `username`, `password`) VALUES
(1, 'Administrator', '', '', 1, 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'John Smith', 'Sample', '+18456-5455-55', 2, '', ''),
(3, 'George Wilson', 'Sample Address', '+14526-5455-44', 2, '', ''),
(4, 'Customer 1', 'Sample', '+123545', 3, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arts_fs`
--
ALTER TABLE `arts_fs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `arts_fs`
--
ALTER TABLE `arts_fs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
