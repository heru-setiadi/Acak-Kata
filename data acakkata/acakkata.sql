-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `soal`;
CREATE TABLE `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kata_acak` varchar(255) NOT NULL,
  `klue` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `soal` (`id`, `kata_acak`, `klue`, `status`) VALUES
(1,	'BOLA',	'Sebuah Benda yang berbentuk bulat dan salah satu benda untuk olah raga',	0),
(2,	'KEDALUWARSA',	'Terlewat dari batas waktu berlakunya sebagaimana yang ditetapkan',	0),
(3,	'LAMPU',	'Alat untuk menerangi',	0),
(4,	'TELEVISI',	'Sistem penyiaran gambar yang disertai dengan bunyi (suara)',	0),
(5,	'AMPLOP',	'Sampul surat',	0),
(6,	'NOSTALGIA',	'Kerinduan (kadang-kadang berlebihan) pada sesuatu yang sangat jauh letaknya atau yang sudah tidak ada sekarang',	0),
(7,	'REKOMENDASI',	'Hal minta perhatian bahwa orang yang disebut dapat dipercaya',	0),
(8,	'SINONIM',	'Bentuk bahasa yang maknanya mirip',	0),
(9,	'REFERENSI',	'Sumber acuan',	0),
(10,	'KOMITMEN',	'Perjanjian (keterikatan) untuk melakukan sesuatu',	0);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-04-21 06:16:46
