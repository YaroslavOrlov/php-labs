-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 25 2015 г., 21:43
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `todolist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `Date` date NOT NULL,
  `Text` text NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  KEY `CalendarId` (`UserEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`Date`, `Text`, `UserEmail`) VALUES
('2015-11-30', '30', 'kidjimoshi96@gmail.com'),
('2015-11-29', '29', 'kidjimoshi96@gmail.com'),
('2015-11-30', '30 email', 'email@mail.ru'),
('2015-11-01', '1 email', 'email@mail.ru'),
('2015-11-30', 'qwe', 'email@mail.ru'),
('2015-08-26', 'qwery 12 august 2015', 'eagles_96@mail.ru'),
('2015-08-26', '12 august kidjimoshi', 'kidjimoshi96@gmail.com'),
('0000-00-00', 'ugagagaga', 'kidjimoshi96@gmail.com'),
('2015-11-01', '123', 'kidjimoshi96@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Pass` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`Pass`, `Email`) VALUES
('QWer12', 'kidjimoshi96@gmail.com'),
('QWer12', 'email@mail.ru'),
('QWErty123', 'eagles_96@mail.ru');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`UserEmail`) REFERENCES `Users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
