-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-27 16:22:53
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `17blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `art`
--

CREATE TABLE IF NOT EXISTS `art` (
  `art_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `pubtime` int(10) unsigned NOT NULL,
  `comment_num` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `art`
--

INSERT INTO `art` (`art_id`, `cat_id`, `title`, `content`, `pubtime`, `comment_num`, `click`) VALUES
(31, 1, '测试5', '测试5', 1501155816, 0, 0),
(32, 2, '测试6', '测试6', 1501155830, 0, 0),
(33, 14, '测试7', '测试7', 1501155848, 0, 0),
(35, 1, '测试8', '测试8', 1501155892, 0, 0),
(36, 1, '测试9', '测试9', 1501155901, 0, 0),
(37, 1, '测试10', '测试10', 1501164225, 0, 0),
(38, 1, '测试11', '测试11', 1501164237, 0, 0),
(27, 1, '测试1', '测试1', 1501146264, 0, 0),
(30, 1, '测试4', '测试4', 1501146300, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(10) NOT NULL,
  `art_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `cat`
--

INSERT INTO `cat` (`cat_id`, `catname`, `art_num`) VALUES
(1, 'php', 7),
(2, 'mysql', 1),
(14, '历史', 1),
(12, 'html5学习', 0),
(11, '形象说编程概念', 0);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `qq` int(20) unsigned NOT NULL,
  `pubtime` int(10) unsigned NOT NULL,
  `ip` char(15) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`comment_id`, `content`, `username`, `qq`, `pubtime`, `ip`) VALUES
(5, '看,元气弹.....', '孙悟空', 0, 1501056543, ''),
(2, '世界没有一拳解决不了的事,如果有,那就两拳', '一拳超人', 1, 1501054793, ''),
(7, '测试一', '测试一', 1111111, 1501146997, '127.0.0.1'),
(4, '呐，你知道吗？听说樱花飘落的速度是秒速五厘米哦。&quot; 秒速5厘米，那是樱花飘落的速度，那么怎样的速度才能走完我与你之间的距离？', '秒速五厘米', 3, 1501054953, ''),
(6, '给我一句话完结', '一拳超人', 2, 1501057560, '127.0.0.1'),
(8, '测试2', '测试一', 2222222, 1501147013, '127.0.0.1'),
(9, '测试3', '测试三', 3333333, 1501147031, '127.0.0.1'),
(10, '测试4', '测试四', 4444444, 1501147061, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `salt`, `password`) VALUES
(1, '111111', 'tsdf23#$%', 'd96338f3e7cc24691aa46a0768155644');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
