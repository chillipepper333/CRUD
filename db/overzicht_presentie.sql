-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 sep 2022 om 16:52
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `overzicht_presentie`
--

CREATE TABLE `overzicht_presentie` (
  `id` int(11) NOT NULL,
  `student` varchar(60) NOT NULL,
  `klas` varchar(10) NOT NULL,
  `minuten_te_laat` int(11) NOT NULL,
  `reden` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `overzicht_presentie`
--

INSERT INTO `overzicht_presentie` (`id`, `student`, `klas`, `minuten_te_laat`, `reden`) VALUES
(4, 'Wouter', '0D', 2, 'code gode'),
(5, 'bob', '0D', 99, 'slecht'),
(6, 'Sander', '0D', 3, 'Wint games zonder te spelen'),
(7, 'Carl', '0D', 10, 'croisant'),
(8, 'Wheezer', '0D', 20, 'Oh no'),
(9, 'Dirk', '0A', 0, 'BORK'),
(10, 'Goro', '0A', 45, 'stab'),
(11, 'Karel', '0C', 22, 'Grote vent'),
(12, 'test', '1A', 5, 'testen'),
(13, 'bob', '0D', 5, 'hi'),
(15, 'test', '0D', 0, 'testen'),
(17, 'Dirk', '0A', 60, 'iets'),
(20, 'test', '1A', 5, 'iets'),
(21, 'test', '1A', 5, 'iets'),
(22, 'bob', '1A', 5, 'testen');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `overzicht_presentie`
--
ALTER TABLE `overzicht_presentie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `overzicht_presentie`
--
ALTER TABLE `overzicht_presentie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
