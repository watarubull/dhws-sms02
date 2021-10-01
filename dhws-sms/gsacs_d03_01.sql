-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 10 月 01 日 03:32
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacs_d03_01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `class_table`
--

CREATE TABLE `class_table` (
  `classID` int(11) NOT NULL,
  `className` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseTerm` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `class_table`
--

INSERT INTO `class_table` (`classID`, `className`, `courseTerm`) VALUES
(1, 'Webデザイナー専攻', 6),
(2, '主婦ママクラス', 7),
(3, 'Webデザイナー専攻（グラフィック経験者）', 6),
(4, 'Webデザイナー専攻（フリーランススタートアップパック）', 6),
(5, 'Webデザイナー専攻（超実践型就転職プラン）', 7),
(6, 'ネット動画クリエイター専攻', 4),
(7, 'Webデザイナー専攻（超実践型就転職プラン）', 3),
(8, 'Webデザイナー専攻（超実践型就転職プラン）', 5),
(9, 'Webデザイナー専攻', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `ex_attend_table`
--

CREATE TABLE `ex_attend_table` (
  `exattendID` int(11) NOT NULL,
  `exID` int(11) NOT NULL,
  `stuID` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `ex_attend_table`
--

INSERT INTO `ex_attend_table` (`exattendID`, `exID`, `stuID`, `addDate`) VALUES
(1, 1, 'wsap211104', '2021-09-30 22:36:05'),
(2, 3, 'wsap211104', '2021-09-30 22:36:05'),
(3, 5, 'wsap211104', '2021-09-30 22:36:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `ex_table`
--

CREATE TABLE `ex_table` (
  `exID` int(11) NOT NULL,
  `exName` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseTerm` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `ex_table`
--

INSERT INTO `ex_table` (`exID`, `exName`, `courseTerm`) VALUES
(1, 'wordpress講座', 2),
(3, 'PHP講座', 2),
(4, 'バナー制作実践講座', 0),
(5, '動画編集マスター講座', 1),
(6, 'モーショングラフィック講座', 1),
(7, 'お仕事TRYプログラム', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `stu_table`
--

CREATE TABLE `stu_table` (
  `stuID` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stuName` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stuRuby` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classID` int(11) NOT NULL,
  `startMonth` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradMonth` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendStart` date DEFAULT NULL,
  `orientation` date DEFAULT NULL,
  `trainerID` int(12) DEFAULT NULL,
  `1stPresen` date DEFAULT NULL,
  `2ndPresen` date DEFAULT NULL,
  `3rdPresen` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `stu_table`
--

INSERT INTO `stu_table` (`stuID`, `stuName`, `stuRuby`, `classID`, `startMonth`, `gradMonth`, `attendStart`, `orientation`, `trainerID`, `1stPresen`, `2ndPresen`, `3rdPresen`) VALUES
('wsap211101', '五十嵐渉', 'いがらしわたる', 1, '', '', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
('wsap211102', '五十嵐渉子', 'いがらしわたるこ', 2, '', '', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
('wsap211103', '五十嵐わたお', 'いがらしわたお', 1, '', '', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
('wsap211104', '五十嵐わた子', 'いがらしわたこ', 3, '2021-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `class_table`
--
ALTER TABLE `class_table`
  ADD PRIMARY KEY (`classID`);

--
-- テーブルのインデックス `ex_attend_table`
--
ALTER TABLE `ex_attend_table`
  ADD PRIMARY KEY (`exattendID`);

--
-- テーブルのインデックス `ex_table`
--
ALTER TABLE `ex_table`
  ADD PRIMARY KEY (`exID`);

--
-- テーブルのインデックス `stu_table`
--
ALTER TABLE `stu_table`
  ADD PRIMARY KEY (`stuID`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `class_table`
--
ALTER TABLE `class_table`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルのAUTO_INCREMENT `ex_attend_table`
--
ALTER TABLE `ex_attend_table`
  MODIFY `exattendID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルのAUTO_INCREMENT `ex_table`
--
ALTER TABLE `ex_table`
  MODIFY `exID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
