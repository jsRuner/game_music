-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 28 日 11:16
-- 服务器版本: 5.5.47
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `gaozi.cc`
--

-- --------------------------------------------------------

--
-- 表的结构 `game_music`
--

CREATE TABLE IF NOT EXISTS `game_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL COMMENT '参赛姓名',
  `phone` varchar(125) NOT NULL COMMENT '参赛手机',
  `video_path` varchar(125) NOT NULL COMMENT '音频路径',
  `dateline` int(11) NOT NULL COMMENT '参赛时间',
  `video_len` int(11) NOT NULL COMMENT '音频长度。单位秒',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态。默认0',
  `score` int(11) NOT NULL COMMENT '得分',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='高姿的吼一吼游戏' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `game_music`
--

INSERT INTO `game_music` (`id`, `name`, `phone`, `video_path`, `dateline`, `video_len`, `status`, `score`) VALUES
(3, '吴文付', '18256963312', '.\\data\\1461812581.wav', 1461810114, 4, 0, 0),
(4, '吴文', '1825', '.\\data\\1461811617.wav', 1461810114, 12, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
