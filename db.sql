-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 26 2019 г., 12:53
-- Версия сервера: 5.5.56-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `csgoshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL,
  `stuff` text NOT NULL,
  `price` int(11) NOT NULL,
  `name` text NOT NULL,
  `link` text NOT NULL COMMENT 'ссылка'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `catalog`
--

TRUNCATE TABLE `catalog`;
--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `stuff`, `price`, `name`, `link`) VALUES
(1, 'sueha:sgak715:agrekols@mail.ru:respaj', 249, '20lvl+csgo1400ч+Медали', 'https://clck.ru/GdytM'),
(2, 'sueha:sgak715:agrekols@mail.ru:respaj', 449, '10lvl+csgo1700ч+dota1200ч+pubg+arma2', 'https://clck.ru/Gdzot'),
(3, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 269, '23lvl+CSGO27ч+PAYDAY2+100игр', 'https://clck.ru/Gdzqo'),
(4, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 1469, '52lvl+CSGO3000ч+9лет+2000игр+ТОП', 'https://clck.ru/Gdzyo'),
(5, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 469, '21lvl+CSGO2000ч+7лет+PUBG+GTAV', 'https://clck.ru/Ge2At'),
(6, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 489, '41lvl+CSGO45ч+Dota1k+Ark+GTAV', 'https://clck.ru/Ge2DZ'),
(7, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 239, '25lvl+CSGO2400ч+6лет+50игр', 'https://clck.ru/Ge2Pz'),
(8, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 229, '14lvl+CSGO1600ч+Медали', 'https://clck.ru/Ge2Ts'),
(9, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 2789, '81lvl+CSGO/PUBG/RUST+1K игр+ТОП', 'https://clck.ru/Ge2X4'),
(10, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 229, '8lvl+CSGO700ч+GarrysMod+инвентарь', 'https://clck.ru/Ge2ZX'),
(11, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 229, '4lvl+CSGO1,9ч+Source3200ч', 'https://clck.ru/Ge2au'),
(12, 'Sueha:Sgak715:agrekols@mail.ru:Respaj', 249, '4lvl+CSGO325ч+Dota316ч', 'https://clck.ru/Ge2gK'),
(13, 'temnblu4:RMJKNRMJKN:gagarussire@mail.ru:kill53245', 199, '3lvl+CSGO164ч+Медаль+баланс-11р', 'https://clck.ru/GiSaz');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `qiwi` varchar(18) NOT NULL,
  `token` varchar(39) NOT NULL,
  `orders` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Очистить таблицу перед добавлением данных `settings`
--

TRUNCATE TABLE `settings`;
--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`qiwi`, `token`, `orders`) VALUES
('+79269936284', '1680f29789310452402582dc3070be82', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tg`
--

CREATE TABLE IF NOT EXISTS `tg` (
  `id` int(11) NOT NULL COMMENT 'уник. ид',
  `chatid` int(11) NOT NULL COMMENT 'chatid юзера',
  `username` text NOT NULL COMMENT 'username',
  `balance` int(11) NOT NULL COMMENT 'баланс',
  `admin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `tg`
--

TRUNCATE TABLE `tg`;
--
-- Дамп данных таблицы `tg`
--

INSERT INTO `tg` (`id`, `chatid`, `username`, `balance`, `admin`) VALUES
(1, 651646771, 'ADAMANITOC', 0, 1),
(2, 390938291, 'walged', 8150, 1),
(3, 858169381, 'Tomaslolz', 4749566, 0),
(4, 686505543, 'oneeykk', 0, 0),
(5, 762276103, '', 0, 0),
(6, 761176803, 'VladLomalo', 0, 0),
(7, 886971085, 'FALLENDEMON', 0, 0),
(8, 438072237, 'root_zx', 0, 0),
(9, 608720628, 'THRTNTH', 0, 0),
(10, 768049458, '', 0, 0),
(11, 590756860, 'DarkProdavec', 0, 0),
(12, 400462200, 'y4sherka', 0, 0),
(13, 707024341, 'inv1s', 0, 0),
(14, 821466179, 'oneloveghetto', 0, 0),
(15, 731070600, 'ccooper', 0, 0),
(16, 295042387, 'SakariHack', 0, 0),
(17, 706150262, 'imp4ge', 0, 0),
(18, 699088959, 'MrFlooky_LZT', 0, 0),
(19, 591662591, 'Arind1', 0, 0),
(20, 633623299, 'MDeath7', 0, 0),
(21, 757700354, '', 0, 0),
(22, 730866605, 'ssilentov', 0, 0),
(23, 391992629, 'go_exam_a', 0, 0),
(24, 610291854, '', 0, 0),
(25, 411720233, 'Nghter', 0, 0),
(26, 546540632, 'goroshkomisha', 0, 0),
(27, 258507159, 'DevBak', 0, 0),
(28, 471119442, 'okostya', 0, 0),
(29, 619831548, 'marrrsik', 0, 0),
(30, 161740480, 'TBGCH', 0, 0),
(31, 149590284, 'pidrilka', 0, 0),
(32, 534308898, 'kodzima123', 0, 0),
(33, 540209529, '', 0, 0),
(34, 889557771, '', 0, 0),
(35, 655140099, 'sekuzo_pistoruze', 0, 0),
(36, 126787070, 'DiSmash64', 0, 0),
(37, 155802742, 'YaEstbPechataet', 0, 0),
(38, 293493494, 'migeo91', 0, 0),
(39, 173161499, 'tw1xlan', 0, 0),
(40, 608467592, 'AlexRu1111', 0, 0),
(41, 592662506, 'Xatiko1337', 0, 0),
(42, 452806939, 'CursedSo', 0, 0),
(43, 638465172, 'asfasr121qwr1231', 0, 0),
(44, 643126405, 'sukka_blyat', 0, 0),
(45, 564685098, 'ebylio', 0, 0),
(46, 578184509, 'alex_dud27', 0, 0),
(47, 532621848, 'Smotri_Fotky', 0, 0),
(48, 385927127, '', 0, 0),
(49, 466413245, 'esemelprod', 0, 0),
(50, 465140726, 'YSPESHNUY', 0, 0),
(51, 772709472, 'Just_Dord', 0, 0),
(52, 309321429, 'dzen03', 0, 0),
(53, 54131589, 'ekiti', 0, 0),
(54, 331235730, 'pe4enb', 0, 0),
(55, 503028038, 'SkybiGoof', 0, 0),
(56, 610710687, 'PaccBeTff', 0, 0),
(57, 649485898, 'Evrei00122', 0, 0),
(58, 269308898, 'Meyshn', 0, 0),
(59, 789244655, '', 0, 0),
(60, 856855369, 'vanushka1941', 0, 0),
(61, 414374519, 'hohlov337', 0, 0),
(62, 214966442, 'Delinquents', 0, 0),
(63, 630231264, '', 0, 0),
(64, 650324196, '', 0, 0),
(65, 493199614, 'BlackArch1703', 0, 0),
(66, 326702346, 'wiezemir', 0, 0),
(67, 511417120, 'ainthe', 0, 0),
(68, 525117020, '', 0, 0),
(69, 411063035, 'exorcist_ed', 0, 0),
(70, 508349856, '', 0, 0),
(71, 434624560, 'kw0rs', 0, 0),
(72, 878164372, 'AztekSiren', 0, 0),
(73, 843764404, 'dDark0n', 0, 0),
(74, 851231826, 'Operator991', 0, 0),
(75, 769525476, '', 0, 0),
(76, 571816992, 'silwerrain', 0, 0),
(77, 371673490, 'agentbondsknopkoy', 0, 0),
(78, 370131640, 'jsoneclick', 0, 0),
(79, 337973668, 'machopacho982', 0, 0),
(80, 465394629, 'btwily', 0, 0),
(81, 535538438, '', 0, 0),
(82, 677171049, 'courier228', 0, 0),
(83, 795777601, 'fashizm1', 0, 0),
(84, 812034534, '', 0, 0),
(85, 333979450, 'hymenolepis', 0, 0),
(86, 549118156, 'RELLOAD3DLOLZ', 0, 0),
(87, 637626860, '', 0, 0),
(88, 189870845, '', 0, 0),
(89, 281031090, 'Gekkont', 0, 0),
(90, 709309541, '', 0, 0),
(91, 863268844, '', 0, 0),
(92, 879747695, 'zuvsup', 0, 0),
(93, 502699874, '', 0, 0),
(94, 691963603, 'pomogeete', 0, 0),
(95, 863117500, '', 0, 0),
(96, 481445157, '', 0, 0),
(97, 264146385, 'out_of_soul_zuhn', 0, 0),
(98, 331564911, 'tannim', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tg`
--
ALTER TABLE `tg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `tg`
--
ALTER TABLE `tg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'уник. ид',AUTO_INCREMENT=99;