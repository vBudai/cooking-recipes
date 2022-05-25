-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2022 г., 17:11
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `recipes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'ID категории',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название категории'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reciepe`
--

CREATE TABLE `reciepe` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID рецепта',
  `id_user` int(10) UNSIGNED NOT NULL COMMENT 'ID пользователя',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название рецепта',
  `mainImage` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Главное изображение',
  `cookingTime` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Время готовки',
  `serviceCount` int(16) NOT NULL COMMENT 'Кол-во порций',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание рецепта',
  `id_category` int(11) NOT NULL COMMENT 'ID категории'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Рецепт';

-- --------------------------------------------------------

--
-- Структура таблицы `steps`
--

CREATE TABLE `steps` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID шага',
  `id_reciepe` int(10) UNSIGNED NOT NULL COMMENT 'ID рецепта',
  `image` text COLLATE utf8mb4_unicode_ci COMMENT 'Картинка к этапу',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание этапа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Этапы готовки';

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'ID пользователя',
  `userName` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Никнейм пользователя',
  `md5Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пароль',
  `reciepsCount` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Кол-во рецептов'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reciepe`
--
ALTER TABLE `reciepe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reciepe` (`id_reciepe`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID категории';

--
-- AUTO_INCREMENT для таблицы `reciepe`
--
ALTER TABLE `reciepe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID рецепта';

--
-- AUTO_INCREMENT для таблицы `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID шага';

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя';

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `reciepe`
--
ALTER TABLE `reciepe`
  ADD CONSTRAINT `reciepe_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `reciepe_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `steps_ibfk_1` FOREIGN KEY (`id_reciepe`) REFERENCES `reciepe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
