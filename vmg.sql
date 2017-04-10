-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 04 2016 г., 15:58
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vmg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL,
  `construc_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL,
  `session_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `cl_id` int(6) NOT NULL,
  `cl_name` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_name`, `logo`, `site`) VALUES
(1, 'Xorazm elonlari', '1', 'http://x-elon.uz'),
(2, 'VMG', '2', 'http://vector-media.uz');

-- --------------------------------------------------------

--
-- Структура таблицы `construc`
--

CREATE TABLE IF NOT EXISTS `construc` (
  `construc_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `format_id` int(11) NOT NULL,
  `img` int(11) NOT NULL,
  `adress` text NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `construc`
--

INSERT INTO `construc` (`construc_id`, `type_id`, `format_id`, `img`, `adress`, `cost`) VALUES
(11, 1, 1, 11, 'Гдето гдето, не далеко от сюда', 180),
(12, 4, 5, 12, 'Аль Хорезми', 180),
(13, 1, 1, 13, 'СУМ', 180),
(14, 3, 4, 14, 'не знаю. Сам найди', 0),
(15, 1, 1, 15, 'kjslkserjlk', 0),
(16, 1, 1, 16, 'erdgwe fefwe', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `facility`
--

CREATE TABLE IF NOT EXISTS `facility` (
  `fc_id` int(4) NOT NULL,
  `fc_name` varchar(30) NOT NULL,
  `fc_img` varchar(30) NOT NULL,
  `fc_text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `facility`
--

INSERT INTO `facility` (`fc_id`, `fc_name`, `fc_img`, `fc_text`) VALUES
(2, 'Билборд', '2', '\\"Vector Media Group\\" предлагает размещение рекламы на билбордах'),
(3, 'Реклама на транспорте', '3', 'Ежедневно транспортными услугами пользуется огромное количество людей. \nСтремительная урбанизация и постоянный рост мобильности населения делают рекламу на транспорте одним из эффективных способов воздействия на потенциального потребителя.'),
(4, 'Светодиодные вывески', '4', 'Такая реклама полностью соответствует всем основным требованиям.\\r\\nСветодиоды были изобретены достаточно давно, но сегодня они являются главной составляющей современной рекламы. Вывески с их использованием отличаются рядом преимуществ, если сравнивать их с другими…');

-- --------------------------------------------------------

--
-- Структура таблицы `format`
--

CREATE TABLE IF NOT EXISTS `format` (
  `format_id` int(11) NOT NULL,
  `format_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `format`
--

INSERT INTO `format` (`format_id`, `format_name`) VALUES
(1, '3x6'),
(2, '0.9x2.75'),
(3, '1x2'),
(4, '1.2x1.8'),
(5, '2x3');

-- --------------------------------------------------------

--
-- Структура таблицы `month`
--

CREATE TABLE IF NOT EXISTS `month` (
  `month_id` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `construc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(30) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `title`, `image`, `text`) VALUES
(1, 'ывалоыдва жщлыавдж', '1', 'лпждпужфуп жаВлпжвалп жклажла жалжэлдуаоаджкка зщшазак уодааьтаожда щшукоощжук лада щлаэжлуфа щжукалжэаьэкаь жалжэажэа жлажылажалжэа'),
(2, 'Добавлен новый Билборд', '2', 'Не давно мы добавили новый Билборд в центре города Ургенч. дыоаджыва дывоаджыва дылваоджыа дыаоджыа доаджАьд.оэдоа дэщоадаом бьыоазоазэлазэауэао. цудааощацущоа ыалэзыазо '),
(3, 'Добавлен новый Мегаборд', '3', 'Добавлен новый Мегаборд в улице Гурленский. Ориентир ыдаыдаы щлазулаз эзуклазуфлаа залзэула щшкощ4ок жшщцгкощк щ4шощ4к шщ3гкщкт шгщ3тзшк');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(20) NOT NULL,
  `st_proff` varchar(30) NOT NULL,
  `st_img` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`st_id`, `st_name`, `st_proff`, `st_img`) VALUES
(1, 'Jorj', 'Dizayner', '1'),
(2, 'jek', 'd;sk;ds', '2'),
(3, 'Joni', 'рекламный агент', '3'),
(5, 'hgjgj', ',jk.', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Билборд'),
(2, 'Мегаборд'),
(3, 'Объёмные буквы'),
(4, 'Световой короб');

-- --------------------------------------------------------

--
-- Структура таблицы `userlist`
--

CREATE TABLE IF NOT EXISTS `userlist` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userlist`
--

INSERT INTO `userlist` (`user_id`, `user_name`, `pwd`) VALUES
(1, 'adminvmg', 'adminvmg123456789vmg');

-- --------------------------------------------------------

--
-- Структура таблицы `vmgorder`
--

CREATE TABLE IF NOT EXISTS `vmgorder` (
  `order_id` int(11) NOT NULL,
  `construc_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL,
  `session_id` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vmgorder`
--

INSERT INTO `vmgorder` (`order_id`, `construc_id`, `start_date`, `end_date`, `date`, `session_id`) VALUES
(1, 11, '2016-12-01', '2016-12-20', '0000-00-00', ''),
(2, 12, '2016-12-21', '2016-12-24', '0000-00-00', ''),
(3, 12, '2017-01-01', '2016-11-10', '2016-11-28', ''),
(4, 13, '2017-01-05', '2017-01-20', '2016-11-29', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cl_id`);

--
-- Индексы таблицы `construc`
--
ALTER TABLE `construc`
  ADD PRIMARY KEY (`construc_id`);

--
-- Индексы таблицы `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`fc_id`);

--
-- Индексы таблицы `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`format_id`);

--
-- Индексы таблицы `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`st_id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Индексы таблицы `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `vmgorder`
--
ALTER TABLE `vmgorder`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `cl_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `construc`
--
ALTER TABLE `construc`
  MODIFY `construc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `facility`
--
ALTER TABLE `facility`
  MODIFY `fc_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `format`
--
ALTER TABLE `format`
  MODIFY `format_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `month`
--
ALTER TABLE `month`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `userlist`
--
ALTER TABLE `userlist`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `vmgorder`
--
ALTER TABLE `vmgorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
