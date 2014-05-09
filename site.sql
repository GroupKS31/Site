-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 09 2014 г., 19:55
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `area`
--

INSERT INTO `area` (`id`, `name`, `address`, `town`, `pole_count`) VALUES
(1, 'Клуб Жара', ' ул.Плехановская 134а,метро Московский проспект', 'Харьков', 3),
(2, 'Клуб Черчиль', '', 'Харьков', 0),
(3, 'ККЗ Украина', '', 'Харьков', 0),
(4, 'ККЗ Украина', '', 'Киев', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `page_title` varchar(30) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `concert_id` int(11) DEFAULT NULL,
  `band_id` int(11) NOT NULL,
  `flag` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `content_id` (`content_id`,`concert_id`),
  UNIQUE KEY `content_id_2` (`content_id`,`concert_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `page_title`, `content_id`, `concert_id`, `band_id`, `flag`) VALUES
(1, 'Linkin Park', 'article1', 2, 2, 1, 1),
(2, '30 Seconds To Mars', 'article2', 1, 1, 2, 1),
(3, 'Korn', 'article3', 4, 4, 3, 1),
(4, 'RHCP', 'article3', 3, 3, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `band`
--

CREATE TABLE IF NOT EXISTS `band` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_name` varchar(20) DEFAULT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `information` int(11) DEFAULT NULL,
  `id_pic_icon` int(11) DEFAULT NULL,
  `id_pic_banner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `band`
--

INSERT INTO `band` (`id`, `band_name`, `genre`, `information`, `id_pic_icon`, `id_pic_banner`) VALUES
(1, 'Linkin Park', 'alternative rock', 1, 1, 5),
(2, '30 Seconds to Mars', 'alternative rock', 2, 2, 6),
(3, 'RHCP', 'rock', 3, 3, 7),
(4, 'KORN', 'nu metal', 4, 4, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `concert`
--

CREATE TABLE IF NOT EXISTS `concert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concert_name` varchar(50) DEFAULT NULL,
  `band_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  UNIQUE KEY `band_id_2` (`band_id`,`area_id`,`manager_id`),
  UNIQUE KEY `band_id_3` (`band_id`,`area_id`,`manager_id`),
  KEY `band_id` (`band_id`,`area_id`),
  KEY `manager_id` (`manager_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `concert`
--

INSERT INTO `concert` (`id`, `concert_name`, `band_id`, `area_id`, `date`, `time`, `manager_id`) VALUES
(1, '30 Seconds To Mars', 1, 1, '2014-05-28', '20:00:00', 1),
(2, 'Linkin Park', 2, 1, '2014-07-18', '20:00:00', 1),
(3, 'RHCP', 3, 1, '2014-05-30', '00:00:00', 1),
(4, 'Korn', 4, 1, '2014-07-11', '00:00:00', 1),
(5, 'example5', 5, 1, '2014-10-03', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `content`) VALUES
(1, '30 Seconds to Mars можно смело отнести к самым популярным альтернативным группам в мире.Поклонники уверяют, что нет более талантливого и харизманичного вокалиста, чем Джаред Лето. Украинских поклонников этой группы ждет большой сюрприз &ndash; кумиры миллионов слушателей снова собираются посетить Киев, чтобы дать концерт. Трудно найти человека, который не слышал о творчестве этой группы. Лицом группы является Джаред Лето, который известен не только благодаря своим песням, но и по кинематографу. Джаред снимался во многих известных голливудских фильмах. Если заходит речь о <strong>30 Seconds to Mars</strong>, то фанаты всегда сразу начинают с Джареда Лето. Пожалуй, это заслужено. Ведь Джаред является в группе вокалистом, пишет музыку и слова к песням, снимает клипы, играет на гитаре и ещё успевает сниматься в кино. Все впечатления, полученные на концерте этой группы, невозможно передать словами, это нужно видеть! Не теряйте такой шанс. Стоит ли концерт '),
(2, '<p>Вот и для украинских фанов <strong>Linkin Park</strong> показался на горизонте реальный шанс увидеть еще один концерт любимой группы в Украине. Компания <strong>NCA</strong> (National Concert Academy), до этого занимающаяся организацией концертов лишь на территории России, недавно открыла свой филиал в Киеве! А это означает, что теперь столица Украины доступна для предложения организации концертов через <em>Клуб Друзей NCA</em>. Напомним, что именно благодаря сбору голосов в Клубе Друзей NCA 14 июня этого года компанией <strong>NCA</strong> был организован сольный концерт <strong>Linkin Park</strong> в Санкт-Петербурге. А теперь, похоже, будет организован и <a href="http://lpcrimea.com/news/Golosovanie-Koncert-Linkin-Park-Novosibirske-Rossiya-Pochti-TOPe-NCA" title="Голосование за Концерт Linkin Park в Новосибирске (Россия): Почти в ТОПе NCA">концерт в Новосибирске</a>, о котором мы писали ранее (заветная планка в 10 тыс. голосов достигнута). Настало время голосовать за приезд <strong>Linkin Park</strong> в Украину!</p>'),
(3, '<BR>Самое масштабное и долгожданное музыкальное событие за всю историю Украины!<BR><BR><FONT color=#ff0000><STRONG>RED HOT CHILI PEPPERS, Kasabian, The Vaccines!<BR></STRONG></FONT><BR>После такого долгого и томительного ожидания легендарные Red Hot Chili Peppers едут в Киев с новым альбомом «I’m with You»! В дискографии группы это уже десятый альбом, релиз которого состоялся 30 августа 2011 года в Кѐльне. Тот концерт стал революционным для поклонников не только группы, а и музыки в целом – за Энтони Кидисом и Ко могли одновременно наблюдать сотни тысяч людей, находясь в кинотеатрах по всему миру, где транслировался концерт в режиме онлайн.<BR><BR>Red Hot Chili Peppers – это семь Грэмми (пять из которых группа получила в один год), 85 миллионов проданных пластинок во всем мире, бесчисленное количество ежегодных премий и вершин чартов. На 2012 год уже официально подтверждено 40 концертов группы, из которых 18 пройдет в Европе с 23 июня по 1 сентября.'),
(4, 'Korn (иногда пишут как «KoRn» или «KoЯn», аутентично логотипу группы) — американская мультиплатиновая ню-метал-группа из Бейкерсфилда, штат Калифорния.<br>Считаются основателями жанра ню-метал. Они заложили основы музыки, являющейся смесью гранжа, фанка и грув-метала, к которым зачастую добавлялся индастриал и хип-хоп. После того, как по всему миру было продано более 3 миллионов копий их дебютного одноимённого альбома, изданного в 1994 году, Korn стали одной из самых продаваемых тяжёлых групп за последнее десятилетие,на январь 2013г.продано свыше 10 миллионов копий их дебютного альбома во всём мире. В дискографии группы 11 студийных альбомов, акустический альбом MTV Unplugged и множество сборников с неизданными, живыми записями или каверами.<br>В активе группы 11 альбомов, поочередно попадавших в первую десятку Billboard 200[1], включая сборник Greatest Hits vol. 1 и акустический/концертный альбом, MTV Unplugged: Korn. На январь 2013г.согласно RIAA группа продала свыше 50 миллионов копий альбомов по всему миру, включая свыше 20 миллионов копий на территории США[2], группа была семь раз номинирована и дважды становилась обладателем Грэмми.<br>Начиная с альбома See You on the Other Side, группа использует синтезаторы и клавишные в своей музыке для формирования более атмосферного индустриального звука[3], чем их предыдущая хип-хоп и фанк-стилистика.На 1января 2007г.продано около 3,400,000 копий во всём мире.<br>Группа выпустила безымянный восьмой (Untitled) альбом 31 июля 2007 с помощью EMI/Virgin. Альбом стартовал на втором месте в Billboard, продавшись тиражом 123 тыс. копий в первую неделю продаж,на 2013 продано около 2,000,000 копий альбома по США.');

-- --------------------------------------------------------

--
-- Структура таблицы `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `variable` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `picture`
--

INSERT INTO `picture` (`id`, `name`, `path`, `variable`) VALUES
(1, 'lp', '../img/logo/pic1.png', 'logo'),
(2, '30s', '../img/logo/pic2.png', 'logo'),
(3, 'rhcp', '../img/logo/pic3.png', 'logo'),
(4, 'korn', '../img/logo/pic4.png', 'logo'),
(5, 'lp', '../img/banners/lp.png', 'banner'),
(6, '30s', '../img/banners/30Seconds.png', 'banner'),
(7, 'rhcp', '../img/banners/rhcp.png', 'banner'),
(8, 'korn', '../img/banners/korn.png', 'banner');

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
(1, 1, 1, 213123, 0),
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
