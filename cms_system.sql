-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 19-Maio-2017 às 00:13
-- Versão do servidor: 5.7.17-0ubuntu0.16.04.2
-- PHP Version: 7.1.3-3+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`c_id`, `category_name`) VALUES
(1, 'nature'),
(2, 'xrated');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `category` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `category`, `date`, `author`) VALUES
(1, 'The first Post', 'Lorem ipsum dolor sit amet, ipsum diceret periculis qui ad, id sed vivendum pertinacia dissentiet, illud vituperata contentiones cum te. Mel cu oporteat suavitate interesset, no quo eligendi referrentur, vim eu wisi accumsan aliquando. Dicam consetetur liberavisse no nec, ocurreret vituperata omittantur ei nec, est ad magna sententiae. Ne dicat saepe mea.Lorem ipsum dolor sit amet, ipsum diceret periculis qui ad, id sed vivendum pertinacia dissentiet, illud vituperata contentiones cum te. Mel cu oporteat suavitate interesset, no quo eligendi referrentur, vim eu wisi accumsan aliquando. Dicam consetetur liberavisse no nec, ocurreret vituperata omittantur ei nec, est ad magna sententiae. Ne dicat saepe mea.', 'images/tiger.png', 'nature', '2017-05-18 22:07:43', 'Linda Deep'),
(2, 'Head ergo sum!', 'Persius sadipscing an pro, has te exerci possit, id congue sanctus mei. Eum id eros albucius vulputate, in latine periculis duo. Ex vel purto dolorum sensibus. Quo ei labores maluisset consequuntur, sed cetero adipisci cu. Vix ei convenire repudiare, no erat expetenda nec.\r\n\r\nEa ignota assueverit mel, debet dolor consul est at. Eam eu alia legere persequeris, nam et docendi reprimique, brute alterum offendit ut usu. Sea veniam dolorem adolescens in. Cu vitae persius eum. Ad nostro vidisse usu, eu vel munere lobortis scribentur. At laudem veritus abhorreant pro, modus eruditi pri et.\r\n\r\nAffert utamur splendide no per. Pri eleifend ocurreret in. Ne duo sint labores signiferumque, an idque latine pro, vim quot torquatos elaboraret at. Mei blandit reprehendunt an, no qui enim mucius dolorum.', 'images/linda.jpg', 'xrated', '2017-05-18 22:07:43', 'Linda Deep');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_f_name` text NOT NULL,
  `user_l_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_marital_status` text NOT NULL,
  `user_phone_no` text NOT NULL,
  `user_designation` text NOT NULL,
  `user_website` text NOT NULL,
  `user_address` text NOT NULL,
  `user_about_me` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
