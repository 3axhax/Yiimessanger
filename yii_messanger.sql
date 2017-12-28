-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 28 2017 г., 10:53
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
(13, 1, 2, 1),
(14, 1, 5, 1),
(16, 7, 1, 0),
(17, 2, 5, 1);

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
(13, 1, 2, 'Please add me to your contact list', '2017-12-28 07:42:22', 1),
(14, 1, 5, 'Please add me to your contact list', '2017-12-28 09:58:54', 1),
(16, 2, 1, 'Hi admin', '2017-12-28 10:20:45', 1),
(17, 7, 1, 'Please add me to your contact list', '2017-12-28 11:01:52', 1),
(18, 1, 2, 'Hi User', '2017-12-28 11:07:18', 1),
(26, 2, 5, 'Please add me to your contact list', '2017-12-28 12:52:11', 1);

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
(1, 'admin', 'admin', 'admin@admin.ru', 'Hello World!', 0, '2017-12-28 12:41:52'),
(2, 'user', 'user', 'user@user.ru', 'User here', 0, '2017-12-28 12:52:11'),
(5, '1', '1', '1@mail.ru', 'asdf', 0, '2017-12-28 12:52:48'),
(6, '123', '123', '123@mail.ru', '1', 0, '2017-12-28 01:02:19'),
(7, '1234', '1234', '1234@gmail.com', '1234', 0, '2017-12-28 11:01:54');

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
('8i5h8n5nhmlqhfri5gf2rl69gcscngt3', 1514449009, '', NULL, '2017-12-28 12:52:49', '127.0.0.1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
