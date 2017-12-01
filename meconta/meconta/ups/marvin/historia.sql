-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2017 às 06:17
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia`
--

CREATE TABLE `historia` (
  `id_historia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `upload` varchar(200) NOT NULL,
  `nClick` int(11) NOT NULL,
  `dataPublic` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historia`
--

INSERT INTO `historia` (`id_historia`, `id_usuario`, `titulo`, `categoria`, `upload`, `nClick`, `dataPublic`) VALUES
(1, 1, 'asdasd', 'asdasd', 'asdasfasf', 1, '0000-00-00 00:00:00'),
(2, 1, 'asdasd', 'asdasd', 'asdasfasf', 1, '0000-00-00 00:00:00'),
(3, 2, 'asdasd', 'asdasd', 'asdasfasf', 1, '0000-00-00 00:00:00'),
(4, 0, 'catiou', 'Poesia', 'catiou', 0, '0000-00-00 00:00:00'),
(5, 0, 'macaquinhos', 'Infantil', 'catiou', 0, '0000-00-00 00:00:00'),
(6, 5, 'macaquinhos', 'Infantil', 'catiou', 0, '0000-00-00 00:00:00'),
(7, 0, 'macaquinhos', 'Infantil', 'catiou', 0, '0000-00-00 00:00:00'),
(8, 5, 'macaquinhos', 'ContosEroticos', 'catiou', 0, '0000-00-00 00:00:00'),
(9, 5, 'macaquinhos', 'ContosEroticos', 'catiou', 0, '0000-00-00 00:00:00'),
(10, 5, 'macaquinhos', 'ContosEroticos', 'catiou', 0, '0000-00-00 00:00:00'),
(11, 5, 'macaquinhos', 'ContosEroticosDoVitao', 'catiou', 0, '0000-00-00 00:00:00'),
(12, 2, 'Galdinha Pintalinha', 'Infantil', 'neto', 0, '0000-00-00 00:00:00'),
(13, 10, 'pesamentosdoaeho', 'Pensamentos', 'aeho', 0, '0000-00-00 00:00:00'),
(14, 10, 'pesamentosdoaeho', 'Pensamentos', 'aeho', 0, '0000-00-00 00:00:00'),
(15, 10, 'diagrama do aeho', 'Outros', 'ups/aeho/diagrama.pptx', 0, '0000-00-00 00:00:00'),
(16, 10, 'diagrama do aeho', 'Outros', 'ups/aeho/diagrama.pptx', 0, '0000-00-00 00:00:00'),
(17, 10, 'oasifaodshsofgsd', 'HQsEMangas', 'ups/aeho/photo.jpg', 0, '0000-00-00 00:00:00'),
(18, 10, 'macaquinhos2', 'Fantasia', 'ups/aeho/CRUZEIRO-2017.pdf', 0, '2017-03-28 06:00:39'),
(19, 10, 'macaquinhos2', 'Fantasia', 'ups/aeho/CRUZEIRO-2017.pdf', 0, '2017-03-28 06:01:02'),
(20, 10, 'macaquinhos2', 'Educativo', 'ups/aeho/CRUZEIRO-2017.pdf', 0, '2017-03-28 06:01:07'),
(21, 10, 'macaquinhos2', 'Outros', 'ups/aeho/CRUZEIRO-2017.pdf', 0, '2017-03-28 06:01:12'),
(22, 10, 'A mordida do banguelo', 'Suspense', 'ups/aeho/oqfiz.txt', 0, '2017-03-28 06:02:56'),
(24, 11, 'Vitão and Kasino: The Tale Of The Lovemaker', 'ContosEroticosDoVitao', 'ups/vitop/php.ini', 0, '2017-03-28 06:10:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id_historia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historia`
--
ALTER TABLE `historia`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
