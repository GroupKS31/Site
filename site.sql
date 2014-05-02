-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 02 2014 г., 20:49
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `town` varchar(20) NOT NULL,
  `pole_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `area`
--

INSERT INTO `area` (`id`, `name`, `address`, `town`, `pole_count`) VALUES
(1, 'PAPA ROACH COVER PAR', ' ул.Плехановская 134а,метро Московский проспект', 'Харьков', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) DEFAULT NULL,
  `title` int(11) DEFAULT NULL,
  `page_title` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `consert_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `band`
--

CREATE TABLE IF NOT EXISTS `band` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `id_pic_icon` int(11) NOT NULL,
  `id_pic_banner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `concert`
--

CREATE TABLE IF NOT EXISTS `concert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `band_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `concert`
--

INSERT INTO `concert` (`id`, `name`, `band_id`, `area_id`, `date`, `time`, `manager_id`) VALUES
(1, 'example', 1, 1, '2014-05-28', '20:00:00', 1),
(2, 'example1', 2, 1, '0000-00-00', '00:00:00', 1),
(3, 'example3', 3, 1, '0000-00-00', '00:00:00', 1),
(4, 'example4', 4, 1, '0000-00-00', '00:00:00', 1),
(5, 'example5', 5, 1, '0000-00-00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conteent` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  ` path` varchar(50) NOT NULL,
  `variable` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `serial` int(10) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`id`, `sector_id`, `number`, `serial`, `flag`) VALUES
(1, 1, 0, 213123, 0),
(2, 1, 0, 213123, 0),
(3, 1, 0, 213123, 0),
(4, 1, 0, 213123, 0),
(5, 1, 0, 213123, 0),
(6, 1, 0, 213123, 0),
(7, 2, 0, 1231212, 0),
(8, 2, 0, 1231212, 0),
(9, 2, 0, 1231212, 0),
(10, 2, 0, 1231212, 0),
(11, 2, 0, 1231212, 0),
(12, 2, 0, 1231212, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(7) DEFAULT NULL,
  `Place_cost` double DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `pole_number` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `sector`
--

INSERT INTO `sector` (`id`, `name`, `Place_cost`, `area_id`, `pole_number`, `position`) VALUES
(1, 'A', 100, 1, 1, 1),
(2, 'B', 250, 1, 1, 2),
(3, 'C', 300, 1, 2, 1),
(4, 'D', 50, 1, 2, 2),
(5, 'Stage', 0, 1, 3, 123);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(20) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `pswd` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `cat`, `name`, `pswd`) VALUES
(1, 'manager', 'Cat', '123'),
(2, 'admin', 'root', 'root');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
