-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2020 г., 18:03
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `courses_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id_courses` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_courses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id_courses`, `description`, `full_description`, `date_courses`, `price`, `title`) VALUES
(10, 'Полный курс по JavaScript для web-разработчиков, которые хотят вывести свои навыки программирования на новый профессиональный уровень', 'Вы научитесь решать на JavaScript различные задачи фронтенда и бэкенда. Стек позволяет внести разнообразие в свою работу, открывает возможность участвовать в интересных проектах и стартапах, предлагать комплексные решения. Однозначно, Fullstack-специальность для тех, кто ищет драйва и хардкора в разработке!  Во время обучения вы пополните портфолио, а также сможете выполнить индустриальный проект от компании REVOLUT, который компания предлагает студентам в качестве технического собеседования.', '6 месяцев, 4 академ. часа в неделю', '100 000 ₽', 'Fullstack разработчик JavaScript'),
(11, 'Best Practice по решению прикладных задач и освоению инструментов, применяемых программистом при разработке инфраструктурных решений, веб-приложений, систем контроля качества и аналитических систем', 'Профессиональный онлайн-курс для тех, кто уже имеет опыт программирования на Python и хочет повысить свой уровень за счет новых знаний и навыков из различных областей разработки. Если вы уверенно чувствуете себя с Python, помните C, имеете представление о сетевом взаимодействии и реляционных СУБД, умеете обращаться с Linux, Git и прочими стандартными инструментами девелопера — курс для вас.', '5 месяцев, 4 академ. часа в неделю', '100 000 ₽', 'Разработчик Python'),
(12, 'Best Practice по разработке архитектуры программного обеспечения', 'В процессе обучения мы рассмотрим множество нетривиальных проблем проектирования backend-приложений и их дальнейшего сопровождения. Изучим не только паттерны проектирования новых сервисов, но и освоим подходы к работе с legacy-сервисами. Научимся решать проблемы с согласованностью изменений (например, порядок применения транзакций) или с оркестрацией сервисов, что будет полезно тем, кто работает в сфере распределенных / децентрализованных систем. Как разработчик, научитесь базовым навыкам работы с Kubernetes.', '4 месяца, 4 академ. часа в неделю', '80 000 ₽', 'Архитектор программного обеспечения'),
(13, 'Best Practice по разработке на C# и .NET Framework с практикой Scrum-методики', 'а 5 месяцев мы последовательно рассмотрим особенности языка C# до уровня начинающего Senior / крепкого Midlle. Подробно изучим внутренние механизмы и устройство языка, CLR (LINQ, многопоточность, асинхронность, рефлексия, сериализация). Научимся разворачивать различные конструкции и представлять их в промежуточном языке (IL). Поработаем с SQL и NoSQL базами данных, кэшированием, Unit-тестами, CI/CD и другими сложными и полезными инструментами профессиональных разработчиков C#.', '6 месяцев, 4 академ. часа в неделю', '100 000 ₽', 'Разработчик C#'),
(14, 'Курс предназначен для разработчиков и администраторов, готовых освоить работу с базами данных', 'Курс включает в себя все основные и популярные БД, которые могут пригодиться разработчику: PostgreSQL, MySQL, Redis, MongoDB, Cassandra и т.д.  Курс обеспечивает глубокое погружение в СУБД, чтобы проектировать базы данных так, чтобы впоследствии не приходилось тушить пожары в результате не оптимально заложенных основ.', '6 месяцев, 4 академ. часа в неделю', '60 000 ₽', 'Базы данных'),
(15, 'Современные инструменты и лучшие практики для глубокого понимания процесса разработки на PHP', 'Для реализации больших и долгосрочных проектов современному PHP-разработчику необходимо заботиться об архитектуре кода, применять паттерны проектирования, писать код в соответствии с принципами SOLID и поддерживать высокий code coverage своих unit-тестов. Но профессия PHP Backend Developer требует знаний не только языка PHP, а ещё знаний инструментов, таких как базы данных, очереди, кеш-сервера, без которых немыслимо современное веб-приложение.', '5 месяцев, 4 академ. часа в неделю', '60 000 ₽', 'Backend-разработчик на PHP');

-- --------------------------------------------------------

--
-- Структура таблицы `sale`
--

CREATE TABLE `sale` (
  `id_sale` int NOT NULL,
  `id_user` int NOT NULL,
  `id_courses` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sale`
--

INSERT INTO `sale` (`id_sale`, `id_user`, `id_courses`) VALUES
(8, 40, 10),
(9, 40, 12),
(45, 41, 10),
(46, 41, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `root` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `mail`, `name`, `password`, `root`) VALUES
(39, 'admin@admin', '', '$2y$10$5rngq7mcOM6zR3UTmZ5zaurfIlBdI3nGzkpDTUz4D7vKJkGNnCgp.', 'admin'),
(40, 'asswhole1337@gmail.com', 'Азамат', '$2y$10$E1OdWc77dBJKACLhOI24Iu8iErvFl8zrdXRCEbvzUDvea68nf/dPK', 'user'),
(41, 'Ivan@mail.ru', 'Иван', '$2y$10$1woykqimcaycA4TdUOLO3ulOgpWwErxwOD0dofKxwlASmhsFL6EVG', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_courses`);

--
-- Индексы таблицы `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id_sale`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_courses` (`id_courses`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id_courses` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `sale`
--
ALTER TABLE `sale`
  MODIFY `id_sale` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`id_courses`) REFERENCES `courses` (`id_courses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
