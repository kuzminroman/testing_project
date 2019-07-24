-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2018 г., 01:35
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Email`
--

CREATE TABLE `Email` (
  `id` int(11) NOT NULL,
  `first_email` varchar(255) NOT NULL,
  `second_email` varchar(255) DEFAULT NULL,
  `basic` varchar(255) NOT NULL DEFAULT 'first_email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Email`
--
-- Структура таблицы `Phones`
--

CREATE TABLE `Phones` (
  `id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `home` varchar(255) DEFAULT NULL,
  `work` varchar(255) DEFAULT NULL,
  `basic` varchar(255) NOT NULL DEFAULT 'mobile'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Phones`
--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы таблицы `Email`
--
ALTER TABLE `Email`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Phones`
--
ALTER TABLE `Phones`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `User`
--
-- auto-generated definition
create table User
(
  id         int auto_increment
    primary key,
  name       varchar(255)  not null,
  surname    varchar(255)  not null,
  patronymic varchar(255)  not null,
  phone      int           null,
  email      int           null,
  password   varchar(255)  not null,
  status     int default 0 null,
  img        varchar(100)  null,
  constraint user_ibfk_1
    foreign key (phone) references Phones (id),
  constraint user_ibfk_2
    foreign key (email) references Email (id)
);

create index email
on User (email);

create index phone
on User (phone);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Email`
--
ALTER TABLE `Email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `Phones`
--
ALTER TABLE `Phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`phone`) REFERENCES `Phones` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`email`) REFERENCES `Email` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
