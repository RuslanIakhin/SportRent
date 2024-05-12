-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 21 2023 г., 14:48
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `card_number` decimal(16,0) NOT NULL,
  `validity_period` date NOT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_cvv` int(11) NOT NULL,
  `purpose` enum('Оплата аренды','Получение за аренду') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`id`, `user`, `card_number`, `validity_period`, `holder_name`, `code_cvv`, `purpose`, `created_at`, `updated_at`) VALUES
(1, 1, '1234567897531423', '2023-06-01', 'Iakhim Ruslan', 123, 'Оплата аренды', '2023-06-21 05:03:45', '2023-06-21 05:03:45');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Велосипеды', '/img/category/velobike.png', NULL, NULL),
(2, 'Самокат', '/img/category/самокат.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `conflicts`
--

CREATE TABLE `conflicts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plaintiff` enum('Арендодатель','Арендующий') COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer` enum('Арендодателю','Арендующему') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `deposit` decimal(8,2) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Видимый','Невидимый') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Видимый',
  `lessor_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `description`, `price`, `deposit`, `city`, `status`, `lessor_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Велосипед горный Stern Energy 1.0 26\"', '/img/test/original_p5pb9891564.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1000.00', '5000.00', 'Уфа', 'Видимый', 1, 1, '2023-06-01 15:31:44', NULL),
(2, 'Велосипед горный 26 6700 DISC ST 18ск RUSH HOUR', '/img/test/f832ba120bf73c2fd18ac2bacf553bb5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1700.00', '5000.00', 'Москва', 'Видимый', 1, 1, '2023-06-10 09:57:09', '2023-06-10 09:57:09'),
(3, 'Велосипед горный Forward SPORTING 29 2.0 D 21', '/img/test/vel2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2400.00', '8000.00', 'Санкт-Петебург', 'Видимый', 3, 1, '2023-06-09 09:57:10', '2023-06-09 09:57:09'),
(4, 'Городской самокат Triumf Active PT230', '/img/test/d56a977b041dfaf57.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '1800.00', '6000.00', 'Воронеж', 'Невидимый', 1, 2, '2023-06-10 10:02:24', '2023-06-10 10:02:24'),
(5, 'Городской самокат Triumf Active PT230', '/img/test/d56a977b041dfaf57.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '1800.00', '6000.00', 'Воронеж', 'Видимый', 1, 2, '2023-06-10 10:02:24', '2023-06-10 10:02:24'),
(6, 'Велосипед горный 27,5 NX675 DISC ST 6ск RUSH', '/img/test/velkupit01.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1800.00', '6000.00', 'Воронеж', 'Видимый', 1, 1, '2023-06-13 06:43:53', '2023-06-13 06:43:53');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2023_06_04_180058_create_categories_table', 1),
(3, '2023_06_04_180546_create_items_table', 1),
(4, '2023_06_04_181000_create_cards_table', 1),
(5, '2023_06_04_181426_create_rentals_table', 1),
(6, '2023_06_04_200558_create_conflicts_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `renter_id` bigint(20) UNSIGNED NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` enum('Новая','Отклонена','Принята','Оплачена','Спорная ситуация','Завершена') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новая',
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `confirmation_lessor` tinyint(1) NOT NULL DEFAULT 0,
  `confirmation_renter` tinyint(1) NOT NULL DEFAULT 0,
  `payment_card_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rentals`
--

INSERT INTO `rentals` (`id`, `item_id`, `renter_id`, `start`, `end`, `status`, `price`, `confirmation_lessor`, `confirmation_renter`, `payment_card_id`, `created_at`, `updated_at`) VALUES
(3, 6, 1, '2023-06-07', '2023-06-15', 'Оплачена', '1800.00', 1, 1, 1, '2023-06-21 05:18:51', '2023-06-21 05:18:51'),
(4, 4, 1, '2023-06-22', '2023-06-29', 'Оплачена', '1800.00', 1, 1, 1, '2023-06-21 05:18:51', '2023-06-21 05:18:51'),
(5, 6, 1, '2023-06-01', '2023-06-06', 'Оплачена', '1800.00', 1, 1, 1, '2023-06-21 05:18:51', '2023-06-21 05:18:51'),
(6, 5, 4, '2023-06-15', '2023-06-30', 'Новая', '1800.00', 0, 0, NULL, '2023-06-21 12:36:35', '2023-06-21 12:36:35'),
(7, 5, 4, '2023-06-23', '2023-06-27', 'Новая', '1800.00', 0, 0, NULL, '2023-06-21 12:38:17', '2023-06-21 12:38:17');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Зарегистрированный пользователь','Администратор') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Зарегистрированный пользователь',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `email`, `phone_number`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Яхин Руслан Артурович', 'rus@mail.ru', '2147483647', '123456', 'Зарегистрированный пользователь', NULL, NULL, NULL),
(2, '123', 'qwe@qwe', '123', '$2y$10$DXaCCEBXX5aLDE71TIrs0.ZJZV72tuQUi1SDmB85Yw7G5zwMJSWly', 'Зарегистрированный пользователь', NULL, '2023-06-21 06:06:33', '2023-06-21 06:06:33'),
(3, 'dtfygukyutrewe', 'wer@ert', '+7 (234) 256-7898', '$2y$10$7ZlQDm.cPH1PvDRnbaJCEewTG4PKWJF5zvxKkAFsZyTCp3qZ/N9l.', 'Зарегистрированный пользователь', NULL, '2023-06-21 11:12:39', '2023-06-21 11:12:39'),
(4, 'Яхин Руслан', 'wer@ert1', '+7 (234) 256-7898', '$2y$10$vGRsAO7q.u6QZfmIA8AYcuD9F1D03iAT71hxzD/EPvqdg5yyQMg4.', 'Зарегистрированный пользователь', NULL, '2023-06-21 11:13:14', '2023-06-21 11:30:25'),
(5, 'gfdsgsdfgfdsg', 'fewa@mail.com', '4563456465436543', 'faewfasdadsdf', 'Зарегистрированный пользователь', NULL, '2023-06-22 11:33:05', '2023-06-22 11:33:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cards_user_foreign` (`user`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `conflicts`
--
ALTER TABLE `conflicts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conflicts_rental_id_foreign` (`rental_id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_lessor_id_foreign` (`lessor_id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_item_id_foreign` (`item_id`),
  ADD KEY `rentals_renter_id_foreign` (`renter_id`),
  ADD KEY `rentals_payment_card_id_foreign` (`payment_card_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `conflicts`
--
ALTER TABLE `conflicts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `conflicts`
--
ALTER TABLE `conflicts`
  ADD CONSTRAINT `conflicts_rental_id_foreign` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_lessor_id_foreign` FOREIGN KEY (`lessor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_payment_card_id_foreign` FOREIGN KEY (`payment_card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_renter_id_foreign` FOREIGN KEY (`renter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
