-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Set-2020 às 02:20
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) DEFAULT NULL,
  `dt_inc` date DEFAULT NULL,
  `dt_update` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `dt_inc`, `dt_update`, `active`) VALUES
(0, 'Governança', '2020-08-17', '2020-08-31', 1),
(1, 'Restaurante', '2020-08-17', '2020-08-31', 1),
(2, 'Bar', '2020-08-17', NULL, 1),
(3, 'Entreterimento', '2020-08-17', '2020-08-31', 1),
(4, 'Marinheiros', '2020-08-17', '2020-08-31', 1),
(5, 'Cozinha', '2020-08-17', '2020-08-31', 1),
(6, 'Lojas', '2020-08-17', '2020-08-31', 1),
(8, 'Tratamento', '2020-08-17', '2020-08-31', 1),
(9, 'Recepção', '2020-08-17', '2020-08-31', 0),
(11, 'Hotel', '2020-08-17', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(100) DEFAULT NULL,
  `cellphone` varchar(100) DEFAULT NULL,
  `dt_inc` date DEFAULT NULL,
  `dt_update` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `phones`
--

INSERT INTO `phones` (`id`, `phone`, `cellphone`, `dt_inc`, `dt_update`, `active`) VALUES
(1, '+55 (11) 3857-2187', '+55 (11) 97388-4899', '2020-08-17', NULL, 1),
(2, '+55 (11) 3857-2187', '+55 (13) 99782-3822', '2020-08-17', NULL, 1),
(3, '+55 (11) 3857-2187', '+55 (11) 99619-5544', '2020-08-17', NULL, 1),
(4, '+55 (11) 3857-2187', '+55 (11) 97204-2222', '2020-08-17', NULL, 1),
(5, '+55 (11) 3857-2187', '+55 (11) 99184-6104', '2020-08-17', NULL, 1),
(6, '+55 (13) 3481-2585', '+55 (13) 99753-3857', '2020-08-17', NULL, 1),
(7, '+55 (13) 3481-2585', '+55 (13) 99792-6429', '2020-08-17', NULL, 1),
(8, '+55 (13) 3481-2585', '+55 (13) 99172-4371', '2020-08-17', NULL, 1),
(9, '+55 (11) 3881-2385', '+55 (11) 95879-7207', '2020-08-17', NULL, 0),
(10, '+55 (11) 3981-8315', '+55 (11) 94744-9454', '2020-08-17', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_department` int(11) DEFAULT NULL,
  `position_name` varchar(100) DEFAULT NULL,
  `dt_inc` date DEFAULT NULL,
  `dt_update` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_position_department2` (`id_department`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `positions`
--

INSERT INTO `positions` (`id`, `id_department`, `position_name`, `dt_inc`, `dt_update`, `active`) VALUES
(1, 1, 'Assistente de Garçon', '2020-08-17', '2020-08-31', 1),
(2, 1, 'Garçon', '2020-08-17', '2020-08-31', 1),
(3, 1, 'Chefe dos Garçons', '2020-08-17', '2020-08-31', 1),
(4, 2, 'Garçon do Bar', '2020-08-17', '2020-08-31', 1),
(5, 1, 'Maitre', '2020-08-17', NULL, 1),
(6, 4, '1º Oficial', '2020-08-17', '2020-08-31', 1),
(7, 11, 'Diretor do Hotel', '2020-08-17', '2020-08-31', 1),
(8, 1, 'Diretor de Bebidas e Comidas', '2020-08-17', '2020-08-31', 1),
(10, 5, '1º Cozinheiro', '2020-08-17', '2020-08-31', 1),
(11, 5, '1º Sous Chef', '2020-08-17', NULL, 1),
(13, 2, '1º Bartender', '2020-08-31', '2020-08-31', 1),
(14, 8, 'Massagista', '2020-08-31', '2020-08-31', 1),
(15, 5, '2º Cozinheiro', '2020-08-31', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL,
  `phone_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_phones_users` (`phone_id`),
  KEY `fk_position_users` (`id_position`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `id_position`, `phone_id`) VALUES
(1, '127.0.0.1', 'administrador', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'yuri@admin.com', '', NULL, NULL, NULL, 1268889823, 1598912117, 1, 'Yuri', 'Menechelli', 'ADMIN', 7, 1),
(2, '127.0.0.1', 'jeka', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'jeka@admin.com', NULL, NULL, NULL, NULL, 1264887823, 1598654739, 1, 'Jéssyka Alves', 'da Silva', 'ADMIN', 2, 2),
(3, '127.0.0.1', 'juraciara', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'juju@admin.com', NULL, NULL, NULL, NULL, 0, 1598654749, 1, 'Juraciara Arenas', 'Conde Menechelli', NULL, 6, 4),
(4, '::1', 'igormenechelli', '$2y$08$uExMA0vUSQiypoQUfolayOtqxIvqcd7LFlIJ1JWzcx/zbko.krqcS', NULL, 'igor@email.com', NULL, NULL, NULL, NULL, 1598671261, 1598822278, 1, 'Igor André', 'Arenas Conde Menechelli', NULL, 2, 3),
(5, '::1', 'roberto', '$2y$08$zILl.fvxgvrX4n5oUkCGzeLzYBU7QSWaWocpTyn.zugnGB7CDcss.', NULL, 'jose@email.com', NULL, NULL, NULL, NULL, 1598829288, 1598829395, 0, 'José Roberto', 'Menechelli', NULL, 10, 5),
(6, '::1', 'bartender', '$2y$08$5UwpMy9bBlJVgHihvGBPvuwpIPLOARv5/sDws8bPEyckJ5y2c00KW', NULL, 'ale@admin.com', NULL, NULL, NULL, NULL, 1598846115, NULL, 0, 'Alexandre', 'Sabino', NULL, 4, 6),
(7, '::1', 'andremaria', '$2y$08$IJSSJvI8a7AXn9cIAJHNO.qKPkWk6DrIA9che1h/vEhWEe0tkk5jS', NULL, 'deia@email.com', NULL, NULL, NULL, NULL, 1598922837, NULL, 1, 'Andréa Maria', 'dos Santos Silva', NULL, 14, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(7, 4, 2),
(8, 5, 2),
(9, 6, 2),
(10, 7, 2);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `fk_position_department2` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_phones_users` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`),
  ADD CONSTRAINT `fk_position_users` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
