-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2018 at 12:58 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lineup`
--

-- --------------------------------------------------------

--
-- Table structure for table `Artists`
--

CREATE TABLE `Artists` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Gender_id` int(11) NOT NULL,
  `Country_id` int(11) NOT NULL,
  `Contract_id` int(11) NOT NULL,
  `Mainpicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Artists`
--

INSERT INTO `Artists` (`id`, `Name`, `Description`, `Gender_id`, `Country_id`, `Contract_id`, `Mainpicture`) VALUES
(2, 'Kaleo', 'Test', 2, 4, 0, 'artists-main-kaleo.jpg'),
(3, 'Txarango', 'Avec quatre continents et quelques vingt-trois pays explorés au compteur, les Catalans de Txarango sont devenus un Village du Monde à eux tous seuls. Leur musique - aux fortes références latino-américaines et festive en diable - pioche ses rythmes et mélodies dans le son de Barcelona, un genre musical héritier de la rumba cubaine, qu\'ils fusionnent à volonté avec du reggae, du ska et du punk. Tout en faisant la part belle à la langue catalane, leurs chansons - profondément engagées - se fredonnent, se susurrent, se crient et se dansent à l\'unisson, redonnant à la musique son pouvoir le plus magique: celui de changer le monde.                ', 4, 4, 0, 'artists-main-txarango.jpg'),
(4, 'Nekfeu', 'Ce n\'est pas parce qu\'il fraie avec Catherine Deneuve que Nekfeu a abandonné son amour de la rime. On verra, Reuf, Egérie… Après avoir enchaîné les tubes, Le Fennek a vu son album Cyborg dépasser en à peine deux semaines les 100 000 exemplaires vendus. Un retour à un rap qui fleure bon les 90\'s et donne des coups de verbe saillants. Et une preuve réconfortante qu\'il est encore possible, à notre époque, de produire un album de rap sans auto-tune. Un succès époustouflant pour ce rappeur technique et virtuose, aussi à l\'initiative de l\'incontournable label Seine Zoo. Allez Feu, allume la mèche.', 3, 1, 0, 'artists-main-nekfeu.png');

-- --------------------------------------------------------

--
-- Table structure for table `Contracts`
--

CREATE TABLE `Contracts` (
  `id` int(11) NOT NULL,
  `signedOn` datetime NOT NULL,
  `description` varchar(45) NOT NULL,
  `fee` int(11) NOT NULL,
  `restaurant` varchar(45) NOT NULL,
  `car` varchar(45) NOT NULL,
  `nbMeals` int(11) NOT NULL,
  `contractType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ContractTypes`
--

CREATE TABLE `ContractTypes` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Countries`
--

CREATE TABLE `Countries` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Countries`
--

INSERT INTO `Countries` (`id`, `Name`) VALUES
(1, 'France'),
(2, 'Espagne'),
(3, 'Suisse'),
(4, 'Islande');

-- --------------------------------------------------------

--
-- Table structure for table `Genders`
--

CREATE TABLE `Genders` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Genders`
--

INSERT INTO `Genders` (`id`, `Name`) VALUES
(1, 'Blues-Rock'),
(2, 'Latino'),
(3, 'Rap'),
(4, 'Hip-Hop');

-- --------------------------------------------------------

--
-- Table structure for table `PerformanceDates`
--

CREATE TABLE `PerformanceDates` (
  `id` int(11) NOT NULL,
  `Date_time` date NOT NULL,
  `Duration` int(11) NOT NULL,
  `Scene_id` int(11) NOT NULL,
  `Artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PerformanceDates`
--

INSERT INTO `PerformanceDates` (`id`, `Date_time`, `Duration`, `Scene_id`, `Artist_id`) VALUES
(1, '2018-07-17', 90, 1, 1),
(2, '2018-07-18', 90, 5, 2),
(3, '2018-07-18', 90, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Scenes`
--

CREATE TABLE `Scenes` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Localisation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Scenes`
--

INSERT INTO `Scenes` (`id`, `Name`, `Localisation`) VALUES
(1, 'Grande scène', '47.6193757;6.152937400000042'),
(2, 'Club Tent', '47.6193757;6.152937400000042'),
(3, 'Les Arches', '47.6193757;6.152937400000042'),
(4, 'Le Détour', '47.6193757;6.152937400000042'),
(5, 'Le Dome', '47.6193757;6.152937400000042');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Artists`
--
ALTER TABLE `Artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Contracts`
--
ALTER TABLE `Contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ContractTypes`
--
ALTER TABLE `ContractTypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Countries`
--
ALTER TABLE `Countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Genders`
--
ALTER TABLE `Genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PerformanceDates`
--
ALTER TABLE `PerformanceDates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Scenes`
--
ALTER TABLE `Scenes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Artists`
--
ALTER TABLE `Artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Contracts`
--
ALTER TABLE `Contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ContractTypes`
--
ALTER TABLE `ContractTypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Countries`
--
ALTER TABLE `Countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Genders`
--
ALTER TABLE `Genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `PerformanceDates`
--
ALTER TABLE `PerformanceDates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Scenes`
--
ALTER TABLE `Scenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
