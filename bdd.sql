-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-09-2010 a las 20:44:58
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `guerraguerrero`
--
CREATE DATABASE `guerraguerrero` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `guerraguerrero`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` varchar(500) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2131baf866cff2ba73bc8c2e6fdeb8b9', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux x86_64; es-AR; rv:1.9.2', 1285439868, 'a:7:{s:8:"users_id";s:1:"1";s:8:"username";s:8:"mydesign";s:8:"password";s:40:"v+vbQnjvohf+yyHs6ILVj3u4RNBrmlM6A/LwFg==";s:5:"email";s:20:"ivan@mydesign.com.ar";s:10:"date_added";s:19:"2010-09-25 19:09:30";s:13:"last_modified";s:19:"2010-09-25 19:09:33";s:9:"logged_in";s:1:"1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `contents`
--

INSERT INTO `contents` (`content_id`, `reference`, `title`, `content`, `date_added`, `last_modified`) VALUES
(7, 'eventos-sistema-de-sonidos', 'Eventos - Sitema de sonidos', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04'),
(8, 'eventos-iluminacion', 'Eventos - Iluminacion', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04'),
(9, 'descargar-tu-musica', 'Descargar tu Musica', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04'),
(10, 'discoteque', 'Discoteque', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04'),
(11, 'radios', 'Radios', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04'),
(12, 'sonido', 'Sonido', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04'),
(13, 'iluminacion', 'Iluminacion', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04'),
(14, 'eventos-iluminacion-sonidos', 'Eventos - Iluminacion Sonidos', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04'),
(15, 'portfolio', 'Portfolio', '', '2010-09-25 15:16:04', '2010-09-25 15:16:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `email`, `date_added`, `last_modified`) VALUES
(1, 'mydesign', 'v+vbQnjvohf+yyHs6ILVj3u4RNBrmlM6A/LwFg==', 'ivan@mydesign.com.ar', '2010-09-25 19:09:30', '2010-09-25 19:09:33'),
(2, 'admin', 'cIwxlI2zQSxoWKtxkfBXeQ==', '', '2010-09-25 19:07:45', '2010-09-25 19:07:45');
