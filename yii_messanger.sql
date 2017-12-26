-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 26 2017 г., 22:25
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
(4, 1, 6, 'fdgagfa', '2017-12-14 10:15:36', 0),
(5, 1, 2, 'dfgh', '2017-12-26 23:31:08', 1),
(6, 2, 1, 'HI admin', '2017-12-27 00:09:09', 1),
(7, 2, 4, 'Helo Brother', '2017-12-27 00:16:37', 0);

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
  `online` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `status`, `online`) VALUES
(1, 'admin', 'admin', 'admin@admin.ru', 'Hello World!', 1),
(2, 'user', 'user', 'user@user.ru', 'User here', 1),
(4, 'user1', '123', '123', '1123', 0),
(5, '1', '1', 'admin1@admin.ru', 'asdf', 1),
(6, '123', '1', '3axhax@mail.ru', '1', 1),
(7, '123', '1', '3axhax@gmail.com', '1234', 0);

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
