-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 27 2017 г., 23:34
-- Версия сервера: 5.5.53
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

CREATE TABLE `contact_list` (
  `id` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_response` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contact_list`
--

INSERT INTO `contact_list` (`id`, `id_request`, `id_response`, `status`) VALUES
(2, 1, 4, 0),
(3, 2, 4, 0),
(5, 1, 6, 0),
(9, 6, 2, 0),
(10, 6, 4, 0),
(11, 1, 5, 0),
(12, 1, 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_response` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `id_sender`, `id_response`, `message`, `time`, `seen`) VALUES
(1, 1, 2, 'HI fghkjhadfkjh sfdhjgkjh kajhfg kjh dfashkjkha dfhkjh adsfkjhkewhjad kjhasdfkj kjhkjahdkjhekj ', '2017-12-26 05:25:14', 1),
(2, 2, 1, 'HI too', '2017-12-26 05:26:14', 1),
(3, 4, 1, 'hi 5', '2017-12-18 11:13:32', 1),
(4, 1, 6, 'fdgagfa', '2017-12-14 10:15:36', 1),
(5, 1, 2, 'dfgh', '2017-12-26 23:31:08', 1),
(6, 2, 1, 'HI admin', '2017-12-27 00:09:09', 1),
(7, 2, 4, 'Helo Brother', '2017-12-27 00:16:37', 0),
(8, 1, 6, 'fdg', '2017-12-27 22:55:57', 1),
(9, 1, 4, 'fdg', '2017-12-28 00:33:45', 0),
(10, 6, 4, 'Please add me to your contact list', '2017-12-28 01:02:00', 0),
(11, 1, 5, 'Please add me to your contact list', '2017-12-28 01:25:58', 0),
(12, 1, 2, 'Please add me to your contact list', '2017-12-28 01:34:13', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `online` int(1) NOT NULL DEFAULT '0',
  `last_activity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `status`, `online`, `last_activity`) VALUES
(1, 'admin', 'admin', 'admin@admin.ru', 'Hello World!', 1, '2017-12-28 01:34:15'),
(2, 'user', 'user', 'user@user.ru', 'User here', 1, '2017-12-28 00:53:47'),
(4, 'user1', '123', '123', '1123', 0, '2017-12-28 00:54:45'),
(5, '1', '1', 'admin1@admin.ru', 'asdf', 1, NULL),
(6, '123', '1', '3axhax@mail.ru', '1', 1, '2017-12-28 01:02:19'),
(7, '123', '1', '3axhax@gmail.com', '1234', 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `yiisession`
--

CREATE TABLE `yiisession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  `user_id` int(11) DEFAULT NULL,
  `last_activity` datetime NOT NULL,
  `last_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`, `user_id`, `last_activity`, `last_ip`) VALUES
('nuiirr63kg4rp967ua4oe1ar253oqbmt', 1514408314, 0x66373830656334346333303239616337333361303066646336663961326363395f5f69647c733a313a2232223b66373830656334346333303239616337333361303066646336663961326363395f5f6e616d657c733a343a2275736572223b66373830656334346333303239616337333361303066646336663961326363395f5f7374617465737c613a303a7b7d, 2, '2017-12-28 01:34:34', '127.0.0.1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contact_list`
--
ALTER TABLE `contact_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `yiisession`
--
ALTER TABLE `yiisession`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contact_list`
--
ALTER TABLE `contact_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
