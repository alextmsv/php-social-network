-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 14 2023 г., 11:57
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
(19, 1, 2, '14.11.2023 17:55:11', 'ДАРОВА БЛЯ\r\n'),
(20, 1, 1, '14.11.2023 17:55:22', 'ура'),
(21, 1, 1, '14.11.2023 17:56:04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis auctor. Sit amet volutpat consequat mauris nunc. Sed odio morbi quis commodo. Morbi tristique senectus et netus et malesuada fames. Consequat id porta nibh venenatis cras sed felis. Purus in mollis nunc sed id semper risus. Mattis molestie a iaculis at erat pellentesque. Gravida neque convallis a cras semper auctor neque. Orci a scelerisque purus semper eget. Velit ut tortor pretium viverra suspendisse. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim.'),
(22, 1, 1, '14.11.2023 17:56:14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis auctor. Sit amet volutpat consequat mauris nunc. Sed odio morbi quis commodo. Morbi tristique senectus et netus et malesuada fames. Consequat id porta nibh venenatis cras sed felis. Purus in mollis nunc sed id semper risus. Mattis molestie a iaculis at erat pellentesque. Gravida neque convallis a cras semper auctor neque. Orci a scelerisque purus semper eget. Velit ut tortor pretium viverra suspendisse. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis auctor. Sit amet volutpat consequat mauris nunc. Sed odio morbi quis commodo. Morbi tristique senectus et netus et malesuada fames. Consequat id porta nibh venenatis cras sed felis. Purus in mollis nunc sed id semper risus. Mattis molestie a iaculis at erat pellentesque. Gravida neque convallis a cras semper auctor neque. Orci a scelerisque purus semper eget. Velit ut tortor pretium viverra suspendisse. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis auctor. Sit amet volutpat consequat mauris nunc. Sed odio morbi quis commodo. Morbi tristique senectus et netus et malesuada fames. Consequat id porta nibh venenatis cras sed felis. Purus in mollis nunc sed id semper risus. Mattis molestie a iaculis at erat pellentesque. Gravida neque convallis a cras semper auctor neque. Orci a scelerisque purus semper eget. Velit ut tortor pretium viverra suspendisse. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis auctor. Sit amet volutpat consequat mauris nunc. Sed odio morbi quis commodo. Morbi tristique senectus et netus et malesuada fames. Consequat id porta nibh venenatis cras sed felis. Purus in mollis nunc sed id semper risus. Mattis molestie a iaculis at erat pellentesque. Gravida neque convallis a cras semper auctor neque. Orci a scelerisque purus semper eget. Velit ut tortor pretium viverra suspendisse. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis auctor. Sit amet volutpat consequat mauris nunc. Sed odio morbi quis commodo. Morbi tristique senectus et netus et malesuada fames. Consequat id porta nibh venenatis cras sed felis. Purus in mollis nunc sed id semper risus. Mattis molestie a iaculis at erat pellentesque. Gravida neque convallis a cras semper auctor neque. Orci a scelerisque purus semper eget. Velit ut tortor pretium viverra suspendisse. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim.');

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
-- AUTO_INCREMENT для таблицы `userposts`
--
ALTER TABLE `userposts`
  MODIFY `postID` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Айди поста', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id записи', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
