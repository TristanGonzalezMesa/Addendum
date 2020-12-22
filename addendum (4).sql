-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 dec 2020 om 09:49
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addendum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afspraak`
--

CREATE TABLE `afspraak` (
  `id` int(5) NOT NULL,
  `geplaatstdoor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afval`
--

CREATE TABLE `afval` (
  `afvalnummer` int(10) NOT NULL,
  `afvalomschrijving` text NOT NULL,
  `prijs` int(10) NOT NULL,
  `afvalnaam` text NOT NULL,
  `datumhalenvan` date DEFAULT NULL,
  `datumhalentot` date DEFAULT NULL,
  `opgehaald` int(11) NOT NULL,
  `geplaatstdoor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `afval`
--

INSERT INTO `afval` (`afvalnummer`, `afvalomschrijving`, `prijs`, `afvalnaam`, `datumhalenvan`, `datumhalentot`, `opgehaald`, `geplaatstdoor`) VALUES
(5, 'Dit is een mooi stukje steen', 20, 'Steen', '2020-12-23', '2020-12-25', 1, 'Tristan'),
(6, 'DIt is moi', 20, 'Gras', '2020-12-16', '2020-12-31', 1, '1'),
(7, 'Dit is een mooi stukje steen', 20, 'Steen', '2020-12-16', '2020-12-31', 0, '1'),
(8, 'Dit is groen', 20, 'Groen', '2020-12-21', '2020-12-30', 0, '1'),
(9, 'DIt is mooi afval', 20, 'Afval', '2020-12-16', '2020-12-31', 0, '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactformulier`
--

CREATE TABLE `contactformulier` (
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(15) NOT NULL,
  `comments` text NOT NULL,
  `id` int(5) NOT NULL,
  `Datum` date DEFAULT '2020-01-01',
  `klantid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `contactformulier`
--

INSERT INTO `contactformulier` (`name`, `email`, `phone`, `comments`, `id`, `Datum`, `klantid`) VALUES
('Tristan mesa gonzale', 'Weplayagarnow@gmail.com', 636546168, '123', 13, '2020-12-10', 2),
('Tristan mesa gonzale', 'Weplayagarnow@gmail.com', 636546168, '123', 14, '2020-12-10', 2),
('Tristan mesa gonzale', 'Weplayagarnow@gmail.com', 636546168, '1234', 15, '2020-12-02', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klantafspraakregel`
--

CREATE TABLE `klantafspraakregel` (
  `afspraakid` int(50) NOT NULL,
  `klantid` int(50) NOT NULL,
  `afvalnummer` varchar(40) NOT NULL,
  `datum` date NOT NULL,
  `tijd` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klantafspraakregel`
--

INSERT INTO `klantafspraakregel` (`afspraakid`, `klantid`, `afvalnummer`, `datum`, `tijd`) VALUES
(6, 1, '5', '2020-12-24', '14:30:00'),
(7, 1, '6', '2020-12-23', '11:15:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klantid` int(6) NOT NULL,
  `voornaam` varchar(25) NOT NULL,
  `tussenvoegsel` varchar(15) NOT NULL,
  `achternaam` varchar(25) NOT NULL,
  `straat` varchar(35) NOT NULL,
  `huisnummer` varchar(20) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `woonplaats` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `Geslacht` text NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klantid`, `voornaam`, `tussenvoegsel`, `achternaam`, `straat`, `huisnummer`, `postcode`, `woonplaats`, `email`, `wachtwoord`, `rol`, `Geslacht`, `telefoonnummer`) VALUES
(1, 'Tristan', 'tussen', 'mesa gonzalez', 'klipper', '49', '1721GV', 'Test', 'VOORBEELDTEST@GMAIL.COM', '123', 9, 'man', '0636546168'),
(2, 'Test', 'tussen', 'Test', 'klipper', '49', '1721GV', 'Test', 'Juan@Juan.nl', '123', 0, 'man', '0636546168');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afspraak`
--
ALTER TABLE `afspraak`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `afval`
--
ALTER TABLE `afval`
  ADD PRIMARY KEY (`afvalnummer`);

--
-- Indexen voor tabel `contactformulier`
--
ALTER TABLE `contactformulier`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klantafspraakregel`
--
ALTER TABLE `klantafspraakregel`
  ADD PRIMARY KEY (`afspraakid`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afspraak`
--
ALTER TABLE `afspraak`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `afval`
--
ALTER TABLE `afval`
  MODIFY `afvalnummer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `contactformulier`
--
ALTER TABLE `contactformulier`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `klantafspraakregel`
--
ALTER TABLE `klantafspraakregel`
  MODIFY `afspraakid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
