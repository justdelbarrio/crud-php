-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 31, 2024 alle 19:13
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `negozio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `ID_CARRELLO` int(11) NOT NULL,
  `ID_UTENTE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`ID_CARRELLO`, `ID_UTENTE`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `credenziali`
--

CREATE TABLE `credenziali` (
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `credenziali`
--

INSERT INTO `credenziali` (`username`, `password`) VALUES
('admin', 'psw'),
('tomas', 'tomas1'),
('pietro', 'pate'),
('miao', '1212');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `ID_ORDINE` int(11) NOT NULL,
  `ID_UTENTE` int(11) DEFAULT NULL,
  `DATA_ORDINE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`ID_ORDINE`, `ID_UTENTE`, `DATA_ORDINE`) VALUES
(2, 2, '2024-02-27'),
(3, 3, '2024-02-27');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID_UTENTE` int(11) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `COGNOME` varchar(50) DEFAULT NULL,
  `INDIRIZZO` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID_UTENTE`, `NOME`, `COGNOME`, `INDIRIZZO`, `EMAIL`) VALUES
(1, 'Tomas', 'Cutinella', 'Via Roma 1', 'tomas@example.com'),
(2, 'Pietro', 'Patelli', 'Corso Italia 5', 'patez@example.com'),
(3, 'Giosuè', 'Baggi', 'Piazza Duomo 10', 'basbecco@example.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `videogiochi`
--

CREATE TABLE `videogiochi` (
  `ID_GIOCO` int(11) NOT NULL,
  `TITOLO` varchar(100) DEFAULT NULL,
  `GENERE` varchar(50) DEFAULT NULL,
  `PREZZO` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `videogiochi`
--

INSERT INTO `videogiochi` (`ID_GIOCO`, `TITOLO`, `GENERE`, `PREZZO`) VALUES
(0, '', '', 0.00),
(1, 'The Last of Us Part II', 'Azione', 59.99),
(2, 'Cyberpunk 2077', 'RPG', 49.99),
(3, 'Animal Crossing: New Horizons', 'Simulazione', 54.99);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`ID_CARRELLO`),
  ADD KEY `ID_UTENTE` (`ID_UTENTE`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`ID_ORDINE`),
  ADD KEY `ID_UTENTE` (`ID_UTENTE`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID_UTENTE`);

--
-- Indici per le tabelle `videogiochi`
--
ALTER TABLE `videogiochi`
  ADD PRIMARY KEY (`ID_GIOCO`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`ID_UTENTE`) REFERENCES `utente` (`ID_UTENTE`);

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`ID_UTENTE`) REFERENCES `utente` (`ID_UTENTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
