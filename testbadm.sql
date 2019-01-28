-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 28 2019 г., 09:34
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testbadm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `keybord`
--

CREATE TABLE `keybord` (
  `id` int(11) NOT NULL,
  `shop` text NOT NULL,
  `manufacturer` text NOT NULL,
  `number_of_keys` int(11) NOT NULL,
  `connector_type` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `keybord`
--

INSERT INTO `keybord` (`id`, `shop`, `manufacturer`, `number_of_keys`, `connector_type`, `price`) VALUES
(1, 'Keybord', 'Logitech', 102, 'USB', 325),
(2, 'Keybord', 'SAMSUNG', 101, 'USB', 325),
(3, 'Keybord', 'Trust', 84, 'bluetooth', 410);

-- --------------------------------------------------------

--
-- Структура таблицы `monitors`
--

CREATE TABLE `monitors` (
  `id` int(11) NOT NULL,
  `shop` text NOT NULL,
  `manufacturer` text NOT NULL,
  `diagonal` int(11) NOT NULL,
  `exit_type` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `monitors`
--

INSERT INTO `monitors` (`id`, `shop`, `manufacturer`, `diagonal`, `exit_type`, `price`) VALUES
(1, 'Monitor', 'LG', 19, 'VGA', 3200),
(2, 'Monitor', 'SAMSUNG', 22, 'HDMI', 4500),
(3, 'Monitor', 'DELL', 27, 'HDMI', 5500);

-- --------------------------------------------------------

--
-- Структура таблицы `tv`
--

CREATE TABLE `tv` (
  `id` int(11) NOT NULL,
  `shop` text NOT NULL,
  `manufacturer` text NOT NULL,
  `diagonal` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tv`
--

INSERT INTO `tv` (`id`, `shop`, `manufacturer`, `diagonal`, `price`) VALUES
(1, 'TV', 'LG', 32, 15250),
(2, 'TV', 'SAMSUNG', 42, 22500),
(3, 'TV', 'Bravis', 27, 9000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `keybord`
--
ALTER TABLE `keybord`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `monitors`
--
ALTER TABLE `monitors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tv`
--
ALTER TABLE `tv`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
