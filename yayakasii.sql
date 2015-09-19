-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2015 年 9 月 19 日 16:56
-- サーバのバージョン： 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yayakasii`
--
CREATE DATABASE IF NOT EXISTS `yayakasii` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yayakasii`;

-- --------------------------------------------------------

--
-- テーブルの構造 `main`
--

DROP TABLE IF EXISTS `main`;
CREATE TABLE `main` (
  `staff_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `pw` text NOT NULL,
  `post` text NOT NULL COMMENT '役職',
  `work_experience` text NOT NULL COMMENT '職歴',
  `tools` text NOT NULL COMMENT '使えるツール',
  `learning_level` text NOT NULL COMMENT '習熟度',
  `wish` text NOT NULL COMMENT '本人の希望',
  `project` text NOT NULL COMMENT '参加したプロジェクト',
  `memo` text NOT NULL COMMENT '面談メモ'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `main`
--

INSERT INTO `main` (`staff_id`, `name`, `pw`, `post`, `work_experience`, `tools`, `learning_level`, `wish`, `project`, `memo`) VALUES
(1, 'admin', 'admin', '1', '2 3', '', '', '', '', ''),
(2, 'aaaa', 'aaaa', '2', '', '3 5 12 20', '1 1 1 1', '2', '1 2', '特になしー'),
(3, 'bbbb', 'bbbb', '2', '', '4 20', '4 4', '3', '2', ''),
(4, 'cccc', 'cccc', '3', '1 2', '30 1 3 2', '2 3 4 1', '2', '1', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `occupation`
--

DROP TABLE IF EXISTS `occupation`;
CREATE TABLE `occupation` (
  `occupation_id` int(11) NOT NULL,
  `occupation_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `occupation`
--

INSERT INTO `occupation` (`occupation_id`, `occupation_name`) VALUES
(1, 'マーケティング'),
(2, 'セールス'),
(3, 'コンサルタント'),
(4, 'ITアーキティクト'),
(5, 'プロジェクトマネジメント'),
(6, 'ITスペシャリスト'),
(7, 'アプリケーションスペシャリスト'),
(8, 'ソフトウェアディベロップメント'),
(9, 'カスタマーサービス'),
(10, 'ITサービスマネジメント'),
(11, 'エデュケーション');

-- --------------------------------------------------------

--
-- テーブルの構造 `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `post`
--

INSERT INTO `post` (`post_id`, `post_name`) VALUES
(1, '部長'),
(2, 'リーダ'),
(3, 'マネージャ'),
(4, 'エンジニア');

-- --------------------------------------------------------

--
-- テーブルの構造 `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `member` text NOT NULL,
  `content` text NOT NULL,
  `tools` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `start`, `end`, `member`, `content`, `tools`) VALUES
(1, 'プロジェクトA', '2015-09-01', '2015-09-11', '1 2', '1', '20'),
(2, 'プロジェクトX', '2015-09-15', '2015-09-18', '2 3', '2', '20 4');

-- --------------------------------------------------------

--
-- テーブルの構造 `tools`
--

DROP TABLE IF EXISTS `tools`;
CREATE TABLE `tools` (
  `tool_id` int(3) NOT NULL,
  `tool_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tools`
--

INSERT INTO `tools` (`tool_id`, `tool_name`) VALUES
(1, 'Windows'),
(2, 'Mac OS'),
(3, 'MS DOS'),
(4, 'Solaris'),
(5, 'Linux'),
(6, 'eclipse'),
(7, 'Jdeveloper'),
(8, 'Rational'),
(9, 'Super Visual Formade'),
(10, 'Interstage List Creator'),
(11, 'ActiveReports'),
(12, 'C'),
(13, 'C++'),
(14, 'Java'),
(15, 'JavaFX'),
(16, 'ASP'),
(17, 'VB/VBA'),
(18, 'Delphi'),
(19, 'Perl'),
(20, 'PHP'),
(21, 'Vbscript'),
(22, 'Javascript'),
(23, 'HTML'),
(24, 'Pw Builder'),
(25, 'Centura'),
(26, '.NET'),
(27, 'JSP'),
(28, 'PL/SQL'),
(29, 'AdobeFlex/AIR'),
(30, 'Silverlight'),
(31, 'Flash'),
(32, 'RPGⅢ'),
(33, 'ILE RPG'),
(34, 'Ajax'),
(35, 'COBOL'),
(36, 'ASM'),
(37, 'PLI'),
(38, 'FORTRAN'),
(39, 'Oracle'),
(40, 'SQL Server'),
(41, 'PostgreSQL'),
(42, 'DB2'),
(43, 'DB400'),
(44, 'SymfoWEAR'),
(45, 'sybase'),
(46, 'SQL base'),
(47, 'TeraData'),
(48, 'MySQL'),
(49, 'Websphere'),
(50, 'INTERSTAGE'),
(51, 'Tomcat'),
(52, 'Apache'),
(53, 'IIS'),
(54, 'OAS'),
(55, 'GEMPLANET'),
(56, 'Cosminexus'),
(57, 'Struts'),
(58, 'JSF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`occupation_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tool_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `occupation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
