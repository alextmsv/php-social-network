-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 16 2023 г., 09:53
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `social`
--

-- --------------------------------------------------------

--
-- Структура таблицы `userattachments`
--

CREATE TABLE `userattachments` (
  `documentPath` text NOT NULL COMMENT 'Путь до документа на сервере',
  `documentOwnerID` int(10) NOT NULL COMMENT 'Айди владельца документа',
  `documentID` int(32) NOT NULL COMMENT 'Айди документа',
  `postId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `userposts`
--

CREATE TABLE `userposts` (
  `postID` int(3) NOT NULL COMMENT 'Айди поста',
  `postAuthor` int(10) NOT NULL COMMENT 'Айди автора поста',
  `postReceiver` int(10) NOT NULL COMMENT 'Айди владельца стены',
  `postData` varchar(32) NOT NULL COMMENT 'Время публикации',
  `postText` text NOT NULL COMMENT 'Текст поста'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `userposts`
--

INSERT INTO `userposts` (`postID`, `postAuthor`, `postReceiver`, `postData`, `postText`) VALUES
(51, 1, 2, '16.11.2023 15:47:15', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL COMMENT 'id записи',
  `login` varchar(128) NOT NULL COMMENT 'Логин',
  `password` varchar(128) NOT NULL COMMENT 'Пароль',
  `name` varchar(32) NOT NULL COMMENT 'Имя пользователя',
  `lastname` varchar(32) NOT NULL COMMENT 'Фамилия пользователя',
  `age` int(3) NOT NULL COMMENT 'Возраст пользователя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Таблица с пользователями';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `lastname`, `age`) VALUES
(1, 'alextmsv', 'admin1', 'Алексей', 'Тумасов', 16),
(2, 'tmsvruslan', 'tmsvruslan', 'Руслан', 'Тумасов', 29),
(3, 'alextmsv1', 'admin2', 'Алексей', 'Тумасик', 16);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `userattachments`
--
ALTER TABLE `userattachments`
  ADD PRIMARY KEY (`documentID`);

--
-- Индексы таблицы `userposts`
--
ALTER TABLE `userposts`
  ADD PRIMARY KEY (`postID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `userattachments`
--
ALTER TABLE `userattachments`
  MODIFY `documentID` int(32) NOT NULL AUTO_INCREMENT COMMENT 'Айди документа', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `userposts`
--
ALTER TABLE `userposts`
  MODIFY `postID` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Айди поста', AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id записи', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
