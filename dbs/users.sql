-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 25, 2023 alle 17:46
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `presenze`
--

CREATE TABLE `presenze` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `età` int(11) NOT NULL,
  `presenza` enum('Si','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `presenze`
--

INSERT INTO `presenze` (`id`, `nome`, `cognome`, `età`, `presenza`) VALUES
(4, 'Antonio', 'Liguoro', 18, 'Si'),
(5, 'a', 'a', 15, 'Si');

-- --------------------------------------------------------

--
-- Struttura della tabella `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `comune` varchar(50) NOT NULL,
  `ddn_giorno` int(11) NOT NULL,
  `ddn_mese` varchar(20) NOT NULL,
  `ddn_anno` int(11) NOT NULL,
  `classe` varchar(30) NOT NULL,
  `età` int(11) NOT NULL,
  `fiscale` varchar(30) NOT NULL,
  `cellulare` varchar(30) NOT NULL,
  `maglia` varchar(30) NOT NULL,
  `sett_1` enum('Si','No') NOT NULL,
  `sett_2` enum('Si','No') NOT NULL,
  `sett_3` enum('Si','No') NOT NULL,
  `sett_4` enum('Si','No') NOT NULL,
  `acconto` varchar(30) DEFAULT NULL,
  `presenza` enum('Si','No') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tasks`
--

INSERT INTO `tasks` (`id`, `nome`, `cognome`, `comune`, `ddn_giorno`, `ddn_mese`, `ddn_anno`, `classe`, `età`, `fiscale`, `cellulare`, `maglia`, `sett_1`, `sett_2`, `sett_3`, `sett_4`, `acconto`, `presenza`) VALUES
(4, 'Antonio', 'Liguoro', 'Abbadia Cerreto', 1, 'Gennaio', 1980, 'Superiore', 18, 'LGRNTN04S18L259H', '3281795888', 'XL', 'Si', 'Si', 'Si', 'Si', 'Pagato', 'No'),
(5, 'a', 'a', 'Abbadia San Salvatore', 2, 'Febbraio', 1981, 'Superiore', 15, 'LGRNTN04S18L259H', '3281795888', 'XL', 'Si', 'Si', 'Si', 'Si', 'Pagato', 'No');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `presenze`
--
ALTER TABLE `presenze`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `presenze`
--
ALTER TABLE `presenze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
