-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 23 2023 г., 16:38
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

--
-- Дамп данных таблицы `userattachments`
--

INSERT INTO `userattachments` (`documentPath`, `documentOwnerID`, `documentID`, `postId`) VALUES
('documentBase/1.mp3', 1, 15, 52),
('documentBase/WoAAAgC4oeA-1920.jpg', 1, 16, 62),
('documentBase/post_image.php', 2, 17, 69),
('documentBase/post_image.jpg', 2, 18, 70),
('documentBase/WoAAAgC4oeA-1920.jpg', 1, 19, 95),
('documentBase/WoAAAgC4oeA-1920.jpg', 1, 20, 96),
('documentBase/1.mp3', 1, 21, 97);

-- --------------------------------------------------------

--
-- Структура таблицы `usercontacts`
--

CREATE TABLE `usercontacts` (
  `contactID` int(10) NOT NULL COMMENT 'Айди одного контакта ',
  `contacterID` int(10) NOT NULL COMMENT 'Айди второго контакта',
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `usercontacts`
--

INSERT INTO `usercontacts` (`contactID`, `contacterID`, `id`) VALUES
(2, 3, 17),
(1, 2, 25),
(3, 2, 26),
(3, 1, 29),
(2, 1, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `usermessages`
--

CREATE TABLE `usermessages` (
  `msgID` int(10) NOT NULL COMMENT 'Айди сообщения',
  `msgSender` int(10) NOT NULL COMMENT 'Айди отправителя сообщения',
  `msgReceiver` int(10) NOT NULL COMMENT 'Айди получателя сообщения',
  `msgTime` varchar(32) NOT NULL COMMENT 'Время отправки сообщения',
  `msgReaded` tinyint(1) NOT NULL COMMENT 'Статус сообщения',
  `msgText` text NOT NULL COMMENT 'Текст сообщения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `usermessages`
--

INSERT INTO `usermessages` (`msgID`, `msgSender`, `msgReceiver`, `msgTime`, `msgReaded`, `msgText`) VALUES
(14, 2, 1, '23.11.2023 19:40:01', 0, 'Здарова'),
(15, 2, 1, '23.11.2023 19:40:13', 0, 'Здарова'),
(16, 2, 1, '23.11.2023 19:40:25', 0, 'Как дела?'),
(17, 1, 2, '23.11.2023 19:40:36', 0, 'Говновоз говновоз '),
(18, 1, 2, '23.11.2023 19:40:40', 0, 'Говновоз говновоз '),
(19, 1, 2, '23.11.2023 19:43:53', 0, 'Привет!'),
(20, 2, 1, '23.11.2023 20:00:21', 0, 'Чо как ты?'),
(21, 1, 2, '23.11.2023 20:00:27', 0, 'по кайфу'),
(22, 2, 1, '23.11.2023 20:00:36', 0, 'Чо когда на улицу?'),
(23, 1, 2, '23.11.2023 20:00:39', 0, 'ща пойдем'),
(24, 1, 2, '23.11.2023 20:00:45', 0, 'проверим и пойдем'),
(25, 2, 1, '23.11.2023 20:00:49', 0, 'Кайф'),
(26, 2, 1, '23.11.2023 20:00:55', 0, ''),
(27, 2, 1, '23.11.2023 20:00:58', 0, '');

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
(51, 1, 2, '16.11.2023 15:47:15', ''),
(52, 1, 1, '16.11.2023 17:19:18', 'крутая песня слушать всем '),
(53, 1, 2, '16.11.2023 17:19:53', 'слыш зайди на стену мою я музончик выложил'),
(54, 1, 3, '16.11.2023 17:20:02', 'тебя тоже касается'),
(55, 2, 2, '16.11.2023 17:21:41', 'ща послушаю'),
(56, 2, 1, '16.11.2023 17:21:48', 'вау нихуя себе!!!!!!!!'),
(57, 1, 1, '16.11.2023 17:59:37', 'пост'),
(58, 1, 0, '17.11.2023 21:24:04', 'тест пост'),
(59, 1, 0, '17.11.2023 21:24:34', 'тест пост'),
(60, 1, 1, '17.11.2023 22:22:14', 'текст'),
(61, 2, 2, '18.11.2023 22:00:42', '&lt;script&gt;alert(&#039;XSS&#039;);&lt;/script&gt;'),
(62, 1, 2, '18.11.2023 22:24:37', 'перестань мне ломать сайт блеать!'),
(63, 6, 6, '18.11.2023 22:36:45', 'ТЫ ВЗЛОМАН, СУКА'),
(64, 6, 6, '18.11.2023 22:36:52', 'ВСМЫСЛЕ БЛЯТЬ'),
(65, 6, 6, '18.11.2023 22:37:01', 'КЛЯНУСЬ ЭТОГО НЕ ПИСАЛ!!!!!!!!'),
(66, 6, 6, '18.11.2023 22:37:12', 'СЪЕБИСЬ ЗЛОЙ ДУХ'),
(67, 1, 2, '18.11.2023 22:38:10', 'нахуя ты наших клиентов отпугиваешь'),
(68, 1, 6, '18.11.2023 22:39:04', 'БЛЯЯЯЯЯЯЯЯЯЯЯЯ'),
(69, 2, 2, '18.11.2023 22:54:33', 'Я всё сломаю бляб '),
(70, 2, 2, '18.11.2023 22:55:24', 'Я всё сломаю бляб!!!'),
(71, 1, 2, '19.11.2023 22:31:46', 'публикую'),
(72, 1, 2, '19.11.2023 22:33:52', 'публикацирую'),
(73, 1, 2, '19.11.2023 22:51:57', 'публикацирую опять но уже круче!'),
(74, 1, 2, '19.11.2023 22:52:13', 'публикацирую опять но уже круче! №2'),
(75, 1, 2, '19.11.2023 22:52:19', 'публикацирую опять но уже круче! №2'),
(76, 1, 2, '19.11.2023 22:52:19', 'публикацирую опять но уже круче! №2'),
(77, 1, 2, '19.11.2023 22:52:20', 'публикацирую опять но уже круче! №2'),
(78, 1, 2, '19.11.2023 22:52:20', 'публикацирую опять но уже круче! №2'),
(79, 1, 2, '19.11.2023 22:52:20', 'публикацирую опять но уже круче! №2'),
(80, 1, 2, '19.11.2023 22:52:20', 'публикацирую опять но уже круче! №2'),
(81, 1, 2, '19.11.2023 22:54:35', 'ОПЯТЬ СУПЕР МЕГА ПУБЛИЦИРУЮ!'),
(82, 1, 2, '19.11.2023 22:55:32', 'ОПЯТЬ СУПЕР МЕГА ПУБЛИЦИРУЮ!\nБЛЯТЬ'),
(83, 1, 1, '19.11.2023 22:55:39', 'ОПЯТЬ СУПЕР МЕГА ПУБЛИЦИРУЮ!\n'),
(84, 1, 1, '19.11.2023 22:55:50', 'ОПЯТЬ СУПЕР МЕГА ПУБЛИЦИРУЮ!\n'),
(85, 1, 1, '19.11.2023 22:55:52', 'ОПЯТЬ СУПЕР МЕГА ПУБЛИЦИРУЮ!\n'),
(86, 1, 1, '19.11.2023 22:55:54', 'ОПЯТЬ СУПЕР МЕГА ПУБЛИЦИРУЮ!\n'),
(87, 1, 1, '19.11.2023 22:59:50', '123'),
(88, 1, 1, '19.11.2023 23:00:23', 'responseresponseresponseresponse'),
(89, 1, 1, '19.11.2023 23:01:22', 'Хуяк хуяк и в продакшн!'),
(90, 1, 2, '19.11.2023 23:01:46', 'ХУЯК ХУЯК И Я НА ТВОЕЙ СТРАНИЦЕ!'),
(91, 1, 2, '19.11.2023 23:09:29', 'ghj'),
(92, 1, 1, '19.11.2023 23:19:34', 'GHBD'),
(93, 1, 1, '19.11.2023 23:20:12', 'GHBD'),
(94, 1, 1, '19.11.2023 23:20:47', 'ТЕСТ СНОВА БЛЯЯ :((('),
(95, 1, 1, '19.11.2023 23:21:08', 'НУ ПОПРОБУЙ СУКА ТОКА НЕ СРАБОТАТЬ!!'),
(96, 1, 1, '19.11.2023 23:25:04', 'НУ ПОПРОБУЙ СУКА ТОКА НЕ СРАБОТАТЬ!!\r\nОПЯТЬ БЛЯТЬ'),
(97, 1, 1, '19.11.2023 23:25:19', 'ТЕСТИМ АУДИО БЛЯТЬ ТЕПЕРЬ'),
(98, 1, 1, '19.11.2023 23:26:19', 'Тест без файла'),
(99, 1, 1, '22.11.2023 17:19:17', 'тест'),
(100, 1, 1, '22.11.2023 17:19:26', 'кайфы бяляяяяя');

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
  `age` int(3) NOT NULL COMMENT 'Возраст пользователя',
  `pDescription` text NOT NULL COMMENT 'Описание к профилю'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Таблица с пользователями';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `lastname`, `age`, `pDescription`) VALUES
(1, 'alextmsv', 'admin', 'Алексей', 'Тумасов', 16, 'Короче, читы - бан.\r\nКемперство - бан.\r\nОскорбление администрации - расстрел, потом бан.'),
(2, 'tmsvruslan', 'tmsvruslan', 'Руслан', 'Тумасов', 29, 'DSBM, XASTHUR FOR3V3R'),
(3, 'alextmsv1', 'admin2', 'Алексей', 'Тумасик', 16, 'Я Тумасик, изгой этот соц-сети('),
(6, 'randomMan', 'defaultpasswordNigga', 'Рандом', 'Рандомович', 44, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `userattachments`
--
ALTER TABLE `userattachments`
  ADD PRIMARY KEY (`documentID`);

--
-- Индексы таблицы `usercontacts`
--
ALTER TABLE `usercontacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usermessages`
--
ALTER TABLE `usermessages`
  ADD PRIMARY KEY (`msgID`);

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
  MODIFY `documentID` int(32) NOT NULL AUTO_INCREMENT COMMENT 'Айди документа', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `usercontacts`
--
ALTER TABLE `usercontacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `usermessages`
--
ALTER TABLE `usermessages`
  MODIFY `msgID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Айди сообщения', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `userposts`
--
ALTER TABLE `userposts`
  MODIFY `postID` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Айди поста', AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id записи', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
