-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 feb 2016 om 18:02
-- Serverversie: 10.1.10-MariaDB
-- PHP-versie: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bjorngv155_craved`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `etenstype`
--

CREATE TABLE `etenstype` (
  `type_id` int(11) NOT NULL,
  `type_omschrijving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `etenstype_media`
--

CREATE TABLE `etenstype_media` (
  `media_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fotos`
--

CREATE TABLE `fotos` (
  `media_id` int(11) NOT NULL,
  `media_naam` varchar(30) NOT NULL,
  `media_prijsklasse` int(11) DEFAULT NULL,
  `media_leeftijdsgroep` int(11) NOT NULL,
  `media_bereik` int(11) DEFAULT NULL,
  `media_vervaldatum` date DEFAULT NULL,
  `media_startdatum` date DEFAULT NULL,
  `media_status` enum('actief','Behandeling','non-actief') NOT NULL DEFAULT 'non-actief',
  `media_soort` enum('V','F') NOT NULL DEFAULT 'F',
  `media_longitude` double NOT NULL,
  `media_latitude` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mediaperuser`
--

CREATE TABLE `mediaperuser` (
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `plaats`
--

CREATE TABLE `plaats` (
  `postcode` varchar(4) NOT NULL,
  `land` varchar(30) NOT NULL,
  `gemeente` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_naam` varchar(30) NOT NULL,
  `restaurant_postcode` varchar(4) NOT NULL,
  `restaurant_straat` varchar(40) NOT NULL,
  `restaurant_eigenaar` varchar(20) NOT NULL,
  `restaurant_email` varchar(40) NOT NULL,
  `restaurant_btwNr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `socialmedia`
--

CREATE TABLE `socialmedia` (
  `socialmedia_id` int(11) NOT NULL,
  `socialmedia_naam` varchar(30) NOT NULL,
  `socialmedia_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `socialmediaperrestaurant`
--

CREATE TABLE `socialmediaperrestaurant` (
  `restaurant_id` int(11) NOT NULL,
  `socialmedia_id` int(11) NOT NULL,
  `restaurant_socialmedia_username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(65) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `achternaam` varchar(30) NOT NULL,
  `straat` varchar(40) DEFAULT NULL,
  `huisnummer` int(4) DEFAULT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `telefoonnummer` varchar(20) NOT NULL,
  `geslacht` enum('M','V') NOT NULL,
  `email` varchar(60) NOT NULL,
  `user_soort` enum('Default','Restaurant','Admin') NOT NULL DEFAULT 'Default',
  `restaurand_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `voornaam`, `achternaam`, `straat`, `huisnummer`, `postcode`, `telefoonnummer`, `geslacht`, `email`, `user_soort`, `restaurand_id`) VALUES
(1, 'jonasstams', '$2y$11$/yjbm1HaHPwKKiiJ.BNApeG8dV1B9fO8gTLLeKIcltOBkeiEAQc6i', 'Jonas', 'Stams', NULL, NULL, NULL, '0483633821', 'M', 'jonasstams@gmail.com', 'Admin', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `etenstype`
--
ALTER TABLE `etenstype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexen voor tabel `etenstype_media`
--
ALTER TABLE `etenstype_media`
  ADD PRIMARY KEY (`media_id`,`type_id`);

--
-- Indexen voor tabel `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexen voor tabel `mediaperuser`
--
ALTER TABLE `mediaperuser`
  ADD PRIMARY KEY (`user_id`,`media_id`);

--
-- Indexen voor tabel `plaats`
--
ALTER TABLE `plaats`
  ADD PRIMARY KEY (`postcode`);

--
-- Indexen voor tabel `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexen voor tabel `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`socialmedia_id`);

--
-- Indexen voor tabel `socialmediaperrestaurant`
--
ALTER TABLE `socialmediaperrestaurant`
  ADD PRIMARY KEY (`restaurant_id`,`socialmedia_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `restaurant_id` (`restaurand_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `etenstype`
--
ALTER TABLE `etenstype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `fotos`
--
ALTER TABLE `fotos`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `socialmedia_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
