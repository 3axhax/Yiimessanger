-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 27 2017 г., 14:31
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii_messanger`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contact_list`
--

CREATE TABLE IF NOT EXISTS `contact_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_request` int(11) NOT NULL,
  `id_response` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contact_list`
--

INSERT INTO `contact_list` (`id`, `id_request`, `id_response`, `status`) VALUES
(1, 1, 2, 1),
(2, 1, 4, 0),
(3, 2, 4, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `id_response` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `id_sender`, `id_response`, `message`, `time`, `seen`) VALUES
(1, 1, 2, 'HI fghkjhadfkjh sfdhjgkjh kajhfg kjh dfashkjkha dfhkjh adsfkjhkewhjad kjhasdfkj kjhkjahdkjhekj ', '2017-12-26 05:25:14', 1),
(2, 2, 1, 'HI too', '2017-12-26 05:26:14', 1),
(3, 4, 5, 'hi 5', '2017-12-18 11:13:32', 0),
(4, 1, 6, 'fdgagfa', '2017-12-14 10:15:36', 0),
(5, 1, 2, 'Hi User', '2017-12-27 10:04:45', 1),
(6, 1, 2, 'Hi User again', '2017-12-27 10:05:39', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `online` int(1) NOT NULL DEFAULT '0',
  `last_activity` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `status`, `online`, `last_activity`) VALUES
(1, 'admin', 'admin', 'admin@admin.ru', 'Hello World!', 0, '2017-12-27 15:32:39'),
(2, 'user', 'user', 'user@user.ru', 'User	here', 0, '2017-12-27 13:10:27'),
(4, 'user1', '123', '123', '1123', 0, '0000-00-00 00:00:00'),
(5, '1', '1', 'admin1@admin.ru', 'asdf', 0, '0000-00-00 00:00:00'),
(6, '123', '1', '3axhax@mail.ru', '1', 0, '0000-00-00 00:00:00'),
(7, '123', '1', '3axhax@gmail.com', '1234', 0, '0000-00-00 00:00:00'),
(8, '2', '2', '2axhax@mail.ru', 'Bla', 0, '2017-12-27 15:39:25');

-- --------------------------------------------------------

--
-- Структура таблицы `yiisession`
--

CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  `user_id` int(11) DEFAULT NULL,
  `last_activity` datetime NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`, `user_id`, `last_activity`, `last_ip`) VALUES
('ikoaailbeeifu3bni20jpq1rua0ms61k', 1514375353, 0x34353664313534333536353932346430663231363166303433666666333866395f5f69647c733a313a2232223b34353664313534333536353932346430663231363166303433666666333866395f5f6e616d657c733a343a2275736572223b34353664313534333536353932346430663231363166303433666666333866395f5f7374617465737c613a303a7b7d, 2, '2017-12-27 16:25:13', '127.0.0.1'),
('v5fh32lvb1gr195giae74s5l26h3gkhb', 1514375621, 0x34353664313534333536353932346430663231363166303433666666333866395f5f69647c733a313a2231223b34353664313534333536353932346430663231363166303433666666333866395f5f6e616d657c733a353a2261646d696e223b34353664313534333536353932346430663231363166303433666666333866395f5f7374617465737c613a303a7b7d, 1, '2017-12-27 16:29:41', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
