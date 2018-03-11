-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Mar-2018 às 00:06
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetobackend`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `idade` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `idade`, `email`, `foto`) VALUES
(32, 'qwe', 0, 'qwe', '-Dragon Ball Super - EP. 121 [720p] [LEG] COMANDOTORRENTS.COM.mp4_snapshot_00.02.jpg'),
(33, 'qwe123', 22, 'qwe123', 'c3991b714340fa291c3343b5ee0ba44907bcfcd7-Dragon Ball Super - EP. 121 [720p] [LEG] COMANDOTORRENTS.COM.mp4_snapshot_00.02.jpg'),
(34, 'qwe', 0, 'qwe', 'c3991b714340fa291c3343b5ee0ba44907bcfcd7-Dragon Ball Super - EP. 121 [720p] [LEG] COMANDOTORRENTS.COM.mp4_snapshot_00.02.jpg'),
(35, 'ads', 22, 'dasd', ''),
(36, 'ads', 0, 'dasd', ''),
(37, 'ads', 0, 'dasd', ''),
(38, 'qwe', 0, 'LUIZ.C.BRIT2O@HOTMAIL.COM', ''),
(39, 'asd', 22, 'teste@teste.com', ''),
(40, 'qwe', 0, 'qwe', ''),
(41, 'luizcarlos', 20, 'luiz@luiz.com', ''),
(42, 'czxcbv', 0, 'vxv', ''),
(43, 'dasdvx', 0, 'bvnvbn', ''),
(44, 'gdfhhfgh', 0, 'hfgh', ''),
(45, 'hfghfgh', 0, 'nvbnvb', ''),
(46, 'hgfhsdf', 0, 'sfsdf', ''),
(47, 'dfgdfgc', 0, 'ghfh', ''),
(48, 'TESTE', 22, 'LUIZ.C.BRIT2O@HOTMAIL.COM', 'c3991b714340fa291c3343b5ee0ba44907bcfcd7-dbz.jpg'),
(49, 'qwe', 0, 'zxc', ''),
(50, 'Luiz', 23, 'luiz.c.brito1@gmail.com', 'c3991b714340fa291c3343b5ee0ba44907bcfcd7-dbz.jpg'),
(51, 'Luiz', 23, 'luiz.c.brito1@gmail.com', 'c3991b714340fa291c3343b5ee0ba44907bcfcd7-dbz.jpg'),
(52, 'Luiz', 23, 'luiz.c.brito1@gmail.com', '-dbz.jpg'),
(53, 'Luiz', 23, 'luiz.c.brito1@gmail.com', 'c3991b714340fa291c3343b5ee0ba44907bcfcd7-dbz.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
