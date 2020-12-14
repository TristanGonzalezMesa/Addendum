-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 dec 2020 om 22:29
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
  `afvalsoort` varchar(5) NOT NULL,
  `datumhalenvan` date NOT NULL,
  `datumhalentot` date NOT NULL,
  `geplaatstdoor` varchar(50) NOT NULL,
  `opgehaalddoor` int(5) NOT NULL COMMENT 'opgehaald door: klantid',
  `opgehaald` int(2) NOT NULL COMMENT '0 =  niet opgehaald\r\n1 = wel opgehaald',
  `datumhalen` date DEFAULT NULL,
  `tijd` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `afspraak`
--

INSERT INTO `afspraak` (`id`, `afvalsoort`, `datumhalenvan`, `datumhalentot`, `geplaatstdoor`, `opgehaalddoor`, `opgehaald`, `datumhalen`, `tijd`) VALUES
(1, 'hout', '2020-01-01', '2020-01-06', 'Tristan', 1, 1, '2020-01-01', '14:01:00'),
(3, 'Hout', '2020-11-26', '0000-00-00', '2020-12-05', 1, 1, '2020-12-16', '13:10:00'),
(4, 'Hout', '2020-11-12', '2020-11-27', 'Test', 1, 1, '2020-11-25', '14:05:00'),
(5, 'Hout', '2020-11-18', '2020-11-30', 'Test', 1, 0, '2020-11-25', '00:00:00'),
(6, 'Hout', '2020-11-26', '2020-12-05', 'Test', 1, 1, '2020-11-27', '17:58:00'),
(7, 'hout', '2020-11-19', '2020-12-04', 'Test', 0, 0, NULL, NULL),
(8, 'Plast', '2020-12-09', '2020-12-18', 'Test', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afval`
--

CREATE TABLE `afval` (
  `id` int(5) NOT NULL,
  `artikelnummer` int(10) NOT NULL,
  `artikelomschrijving` text NOT NULL,
  `prijs` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Datum` date DEFAULT '2020-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `contactformulier`
--

INSERT INTO `contactformulier` (`name`, `email`, `phone`, `comments`, `id`, `Datum`) VALUES
('Tristan mesa gonzale', '151799@student.horizoncollege.nl', 636546168, 'sss', 2, '2020-01-01'),
('Tristan mesa gonzale', '151799@student.horizoncollege.nl', 636546168, 'ddd', 3, '2020-01-01'),
('Tristan mesa gonzale', '151799@student.horizoncollege.nl', 636546168, 'ddd', 4, '2020-01-01'),
('Tristan mesa gonzale', '151799@student.horizoncollege.nl', 636546168, 'ddd', 5, '2020-10-27'),
('Tristan mesa gonzale', '151799@student.horizoncollege.nl', 636546168, 'rewf', 6, '2020-11-18'),
('Tristan mesa gonzale', '151799@student.horizoncollege.nl', 636546168, 'ewdwf', 7, '2020-11-12'),
('Tristan mesa gonzale', '151799@student.horizoncollege.nl', 636546168, 'test', 8, '2020-12-17');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `klantid` int(6) NOT NULL,
  `voornaam` varchar(25) NOT NULL,
  `achternaam` varchar(25) NOT NULL,
  `straat` varchar(35) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `woonplaats` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `tussenvoegsel` varchar(15) NOT NULL,
  `Geslacht` text NOT NULL,
  `huisnummer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`klantid`, `voornaam`, `achternaam`, `straat`, `postcode`, `woonplaats`, `email`, `wachtwoord`, `rol`, `tussenvoegsel`, `Geslacht`, `huisnummer`) VALUES
(1, 'Test', 'Test', 'Test', '1721GV', '123', 'VOORBEELDTEST@GMAIL.COM', '123', 9, '', '', ''),
(2, 'Tristan', 'Mesa Gonzalez', 'klipper 49', '1721GV', 'Alkmaar', 'weplayagarnow@gmail.com', '123', 0, '', '', ''),
(3, 'Test', 'Mesa Gonzalez', 'klipper', '1721GV', 'Alkmaar', 'weplayagarnow@gmail.comd', 'open123', 0, 'tussen', 'man', '49');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klantafspraak`
--

CREATE TABLE `klantafspraak` (
  `afspraakid` int(50) NOT NULL,
  `klantid` int(50) NOT NULL,
  `afvalsoort` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `contactformulier`
--
ALTER TABLE `contactformulier`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`klantid`);

--
-- Indexen voor tabel `klantafspraak`
--
ALTER TABLE `klantafspraak`
  ADD PRIMARY KEY (`afspraakid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afspraak`
--
ALTER TABLE `afspraak`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `afval`
--
ALTER TABLE `afval`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `contactformulier`
--
ALTER TABLE `contactformulier`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `klantid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `klantafspraak`
--
ALTER TABLE `klantafspraak`
  MODIFY `afspraakid` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
