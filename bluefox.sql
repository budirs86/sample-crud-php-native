-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2021 at 09:13 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bluefox`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `act_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `activity` text,
  `ip` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_departement`
--

CREATE TABLE `tbl_departement` (
  `dept_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_departement`
--

INSERT INTO `tbl_departement` (`dept_id`, `name`) VALUES
(1, 'Accounting'),
(2, 'Legal'),
(3, 'GA'),
(4, 'Marketing Communications'),
(5, 'PANTRY'),
(8, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `div_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`div_id`, `name`) VALUES
(10, 'Annex'),
(7, 'Sarana Prasarana'),
(6, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `user_level` varchar(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `user_level`, `menu_id`, `description`) VALUES
(1, 'Admin', 123456789, 'Administrator'),
(2, 'User', 5678, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user_level` enum('admin','user') DEFAULT 'user',
  `div_id` int(11) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `email`, `password`, `nama`, `user_level`, `div_id`, `dep_id`) VALUES
(1, 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Rudi Choirudin', 'admin', 10, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_departement`
--
ALTER TABLE `tbl_departement`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`div_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_departement`
--
ALTER TABLE `tbl_departement`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  MODIFY `div_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
