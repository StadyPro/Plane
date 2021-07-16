-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июл 16 2021 г., 13:02
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `flights`
--
CREATE DATABASE IF NOT EXISTS `flights` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `flights`;

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `id_access` int(3) NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`id_access`, `login`, `password`, `access`) VALUES
(1, 'admin', 'admin1', 'admin'),
(2, 'user', 'user1', 'user'),
(3, 'guest', 'guest1', 'guest');

-- --------------------------------------------------------

--
-- Структура таблицы `aircraft`
--

DROP TABLE IF EXISTS `aircraft`;
CREATE TABLE `aircraft` (
  `ID_Aircraft` int(11) NOT NULL,
  `Type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Number_Seats` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `aircraft`
--

INSERT INTO `aircraft` (`ID_Aircraft`, `Type`, `Number_Seats`) VALUES
(1, 'Туполев Ту-135', 80),
(2, 'Туполев Ту-154', 180),
(3, 'Туполев Ту-154', 180),
(4, 'Туполев Ту-204', 214),
(5, 'Ильюшин ИЛ-62 ', 138),
(6, 'Аэробус Airbus A310', 183),
(7, 'Боинг-767', 252),
(8, 'Боинг-777', 235);

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE `flights` (
  `ID_Flights` int(50) NOT NULL,
  `Destination` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Departure_Time` time NOT NULL,
  `ID_Plane` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`ID_Flights`, `Destination`, `Departure_Time`, `ID_Plane`) VALUES
(1, 'Москва', '13:05:00', 1),
(2, 'Брянск', '20:47:00', 2),
(3, 'Казань', '04:23:00', 3),
(4, 'Санкт-петербург', '09:52:00', 4),
(5, 'Сочи', '16:00:00', 5),
(6, 'Владивосток', '17:49:00', 6),
(7, 'Самара', '02:07:00', 7),
(8, 'Москва', '05:18:00', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `passengers`
--

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE `passengers` (
  `ID_Passengers` int(50) NOT NULL,
  `Surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Patronymic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Passport_data` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `passengers`
--

INSERT INTO `passengers` (`ID_Passengers`, `Surname`, `Name`, `Patronymic`, `Passport_data`) VALUES
(1, 'Макаров', 'Леонид', 'Николаевич', 3472859),
(2, 'Герасимова', 'Юлия', 'Викторовна', 285716),
(3, 'Дьяконов', 'Александр', 'Львович', 4618402),
(4, 'Евдокимова', 'Арина', 'Никитична', 1637284),
(5, 'Иванова', 'Алиса', 'Руслановна', 2849306),
(6, 'Одинцов', 'Лев', 'Михайлович', 224759),
(7, 'Медведева', 'Маргарита', 'Владимировна', 26481),
(8, 'Жаров', 'Алексей', 'Андреевич', 2931849);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `ID_Ticket` int(50) NOT NULL,
  `ID_Flight` int(11) NOT NULL,
  `ID_Passenger` int(11) NOT NULL,
  `Place_Number` int(100) NOT NULL,
  `Price` int(50) NOT NULL,
  `Departure_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`ID_Ticket`, `ID_Flight`, `ID_Passenger`, `Place_Number`, `Price`, `Departure_Date`) VALUES
(1, 1, 8, 75, 3850, '2021-07-14'),
(2, 2, 7, 5, 3850, '2021-07-14'),
(3, 3, 6, 115, 7520, '2021-06-25'),
(4, 4, 5, 63, 1350, '2021-04-29'),
(5, 5, 4, 24, 7520, '2021-01-20'),
(6, 6, 3, 180, 7950, '2021-05-27'),
(7, 7, 2, 2, 9540, '2021-03-05'),
(8, 8, 1, 54, 4650, '2021-07-16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`);

--
-- Индексы таблицы `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`ID_Aircraft`);

--
-- Индексы таблицы `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`ID_Flights`),
  ADD KEY `ID_Plane` (`ID_Plane`) USING BTREE;

--
-- Индексы таблицы `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`ID_Passengers`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID_Ticket`),
  ADD KEY `ID_Flight` (`ID_Flight`),
  ADD KEY `ID_Passenger` (`ID_Passenger`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id_access` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `ID_Aircraft` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `flights`
--
ALTER TABLE `flights`
  MODIFY `ID_Flights` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `passengers`
--
ALTER TABLE `passengers`
  MODIFY `ID_Passengers` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID_Ticket` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`ID_Plane`) REFERENCES `aircraft` (`ID_Aircraft`);

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`ID_Flight`) REFERENCES `flights` (`ID_Flights`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`ID_Passenger`) REFERENCES `passengers` (`ID_Passengers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
