-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 02 2020 г., 15:19
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `baza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `date` int(11) UNSIGNED NOT NULL,
  `author` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `author`) VALUES
(8, 'Григорий XIII (Уго Бонкомпаньи)', 'Уго Бонкомпаньи родился в Болонье. Он происходил из дворянской семьи и изучал церковное и гражданское право в университете Болоньи, а, получив степень доктора, остался в нем преподавать. Среди его учеников были известные впоследствии кардиналы Алессандро Фарнезе, Кристофоро Мадруцци, Отто Трахсесс фон Вальдбург, Реджинальд Поул, Карло Борромео и Станислав Хозюш. Как квалифицированный юрист, доктор права, был советником многих епископов в Риме и Триденте.', 'В 1539 г. кардинал Париццио призвал Уго в Рим, где Павел III назначил его судьей Капитолия и папским аббревиатором. Бонкомпаньи присутствовал на Тридентсокм соборе как юрист. Впоследствии он занимал различные должности в курии, получив первое посвящение лишь спустя несколько лет. г. После этого он вновь работал на Тридентском соборе, но уже как представитель папы.\r\nПосле получения кардинальской шапки Уго Бонкомпаньи был послан с дипломатической миссией в Мадрид. В период понтификата Пия IV не одобрял слишком жёстких, по его мнению, папских приговоров.\r\n\r\nБудущий Папа не вел аскетичного образа жизни: он имел одного внебрачного сына, Джакомо, которого после получения папской тиары не мог слишком сильно опекать в новой атмосфере тридентской реформы. Также Григорий XIII — последний папа, про которого точно известно, что у него были незаконные дети.\r\n\r\nПосле смерти Пия V Уго был избран папой и взял имя Григорий XIII.', 1598388030, 'GleBruk'),
(7, 'Гай Юлий Цезарь', 'Гай Юлий Цезарь появился на свет 12 или 13 июля 100 г. до н. э. в Риме (Италия), а умер 15 марта 44 г. до н.э. Это был знаменитый римский генерал и государственный деятель, завоеватель Галлии, военачальник, выигравший гражданскую войну и пожизненный диктатор. Он начал серию политических и социальных реформ, но был убит группой дворян в доме Сената на мартовских идах.', 'Гай Юлий Цезарь решительно и необратимо изменил ход истории греко-римского мира, который распался так давно, что большинство имен его великих граждан мало что значат даже для образованного современного человека. Но его имя, как и имя Александра Македонского, до сих пор помнят как христиане, так и приверженцы ислама. Даже люди, ничего не знающие об этой исторической личности, знакомы с его фамилией, как с титулом, обозначающим верховного правителя (цезарь или кесарь), который является исключительно высшим или первостепенным — подобно кайзеру у немцев, царю у славян и султану в исламе.\r\n\r\nПоходы Юлия Цезаря\r\nИмя Цезаря, Юлий, осталось в христианской культуре, поскольку при жизни диктатора римский месяц Квинтилис, в котором он родился, был назван «июлем» в его честь. Название сохранилось и сегодня. Старый римский календарь был неточным, поэтому при жизни кесаря введён юлианский календарь. Он еще частично действует в восточно-православных христианских странах, а григорианское летоисчисление, которым в настоящее время пользуется западный мир, — это юлианский стиль, слегка исправленный папой Григорием XIII.', 1598379069, 'GleBruk');

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) UNSIGNED NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `message`) VALUES
(15, 'Привет!');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `mess` text NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(6, 'GleBruk', 'Хорошая статья! И авторы интересные', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(16, 'GleBruk', 'gleb-ruksha@rambler.ru', 'GleBruk', '16fcbcecb63b0c0adc42c6538e12441c');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
