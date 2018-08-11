-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2017 at 02:43 PM
-- Server version: 5.0.92-log
-- PHP Version: 5.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jc13342_tutoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `code` varchar(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY  (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`code`, `name`) VALUES
('mat', 'Maths'),
('eng', 'English'),
('dte', 'Digital Technologies'),
('sci', 'Science'),
('phe', 'Physical Education'),
('his', 'History');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE IF NOT EXISTS `teaches` (
  `username` varchar(20) NOT NULL,
  `subject_code` varchar(3) NOT NULL,
  `max_level` varchar(40) NOT NULL,
  PRIMARY KEY  (`username`,`subject_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`username`, `subject_code`, `max_level`) VALUES
('reubenyoung', 'phe', 'Year 10'),
('jc13342', 'eng', 'Year 11'),
('reubenyoung', 'his', 'Year 13'),
('reubenyoung', 'mat', 'Year 10'),
('reubenyoung', 'eng', 'Year 13'),
('reubenyoung', 'sci', 'Year 10'),
('jc13342', 'dte', 'Year 13'),
('jc13342', 'sci', 'Year 13'),
('jc13342', 'mat', 'Year 13'),
('jc13342', 'phe', 'Year 13'),
('georgie', 'mat', 'year 1'),
('jLlober', 'mat', 'Year 13'),
('jLlober', 'phe', 'Year 11'),
('jamessmith', 'mat', 'Year 8'),
('jamessmith', 'dte', 'Year 10'),
('samuelham', 'mat', 'Year 10'),
('samuelham', 'eng', 'Year 10'),
('jackmac', 'sci', 'Year 8'),
('jackmac', 'his', 'Year 13'),
('abbymann', 'phe', 'Year 13'),
('abbymann', 'mat', 'Year 10');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE IF NOT EXISTS `tutors` (
  `username` varchar(20) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(300) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`username`, `hash`, `salt`, `firstname`, `surname`, `age`, `description`, `image`, `email`) VALUES
('jc13342', 'c20442132056d3a8781605887619a0a18071d998b844f3659a8ebfc85095a2af', 'f6ac74df6c9fb73b2b8e3d1d96fbfdb8', 'Jackson', 'Currie', 18, 'Lorem ipsum dolor sit amet, vis posse eruditi utroque id, suas magna everti ea duo, quod lorem dolores sea eu. Esse vivendo mediocrem sed id. Cum ad nisl minim volumus. An similique sententiae referrentur quo, torquatos persequeris mea ea, duo discere veritus accusam ea. Tempor ridens sed ea. Sea ne quidam discere.', 'https://scontent.fakl3-1.fna.fbcdn.net/v/t1.0-9/18056779_877122599093524_4934261024321477568_n.jpg?oh=fc0cdc2d27d62e01279eea7533bd70ed&oe=59E6BFFC', 'jc13342@tbc.school.nz'),
('georgie', '2482f4c0500b896b9f9d7c955ca7eec552e51b9fdcbbbe884b059b956efe8245', '6419903a0688ddfb0d7987ecd19f0766', 'George', 'Creighton-Syme', 17, 'Lorem ipsum dolor sit amet, nec purto cibo fabulas ne, et liber laudem voluptaria mea, his ex purto graeci. Mei inermis antiopam ea. Ad meis ornatus laboramus duo, primis volumus placerat no mea, ea sed dico iudico. Zril sanctus expetendis eu has, an vix quod liber consequuntur. Blandit gloriatur eam et, volutpat eloquentiam comprehensam eu mea.', 'https://scontent.fakl3-1.fna.fbcdn.net/v/t1.0-9/17553729_1142371285871517_2148136867629313567_n.jpg?oh=5f20d836f0b597677aa6d7f74ddf0786&oe=59D0ABC3', 'georg@g.co'),
('reubenyoung', 'dde3eba07d70f8939458b6dae61b75ae1e2e7aa5fc81891d0ceb45cd7c85d9c6', 'e602a3d27b09866a938a727ed5e9ca57', 'Reuben', 'Young', 18, 'Lorem ipsum dolor sit amet, nec purto cibo fabulas ne, et liber laudem voluptaria mea, his ex purto graeci. Mei inermis antiopam ea. Ad meis ornatus laboramus duo, primis volumus placerat no mea, ea sed dico iudico. Zril sanctus expetendis eu has, an vix quod liber consequuntur. Blandit gloriatur eam et, volutpat eloquentiam comprehensam eu mea.', 'http://i.imgur.com/Ukh9hKl.jpg', 'reuben.young2@aol.com'),
('jLlober', '7ee120774b7fb06adda89be6c1f623c4f4f3a3d3be435369e9504b712a32d50f', 'aecf320bef2e14765946ec63faea6423', 'Sam', 'Currie', 23, 'Lorem ipsum dolor sit amet, nec purto cibo fabulas ne, et liber laudem voluptaria mea, his ex purto graeci. Mei inermis antiopam ea. Ad meis ornatus laboramus duo, primis volumus placerat no mea, ea sed dico iudico. Zril sanctus expetendis eu has, an vix quod liber consequuntur. Blandit gloriatur eam et, volutpat eloquentiam comprehensam eu mea.', 'https://scontent.fakl3-1.fna.fbcdn.net/v/t1.0-9/18835641_10209074974578258_3441515886330061928_n.jpg?oh=1d9c1b42955a4e3dead951fc552c1f47&oe=59E85AB1', 'jLlober@outlook.com'),
('jamessmith', '9727f5280d65015a1f098cdf26a91b8009edc9b11f931a073fccd4ba9174de41', 'a5c111f2e1ca39d41ffb9fc2bc198400', 'James', 'Smith', 16, 'Lorem ipsum dolor sit amet, nec purto cibo fabulas ne, et liber laudem voluptaria mea, his ex purto graeci. Mei inermis antiopam ea. Ad meis ornatus laboramus duo, primis volumus placerat no mea, ea sed dico iudico. Zril sanctus expetendis eu has, an vix quod liber consequuntur. Blandit gloriatur eam et, volutpat eloquentiam comprehensam eu mea.', 'https://scontent.fakl3-1.fna.fbcdn.net/v/t1.0-9/14691062_1318215068211044_215647724709216125_n.jpg?oh=3e0bdc98124f55261cd407acb56f0b81&oe=59E8554C', 'hi@hi.com'),
('samuelham', '618fc4b9c2d9974a4e91d51d82804022a585cb971dbe33e725d2a40c727f2ac0', 'f3e86dec0eb4b97a669178d5ffb7b2a5', 'Samuel', 'Ham', 18, 'Lorem ipsum dolor sit amet, nec purto cibo fabulas ne, et liber laudem voluptaria mea, his ex purto graeci. Mei inermis antiopam ea. Ad meis ornatus laboramus duo, primis volumus placerat no mea, ea sed dico iudico. Zril sanctus expetendis eu has, an vix quod liber consequuntur. Blandit gloriatur eam et, volutpat eloquentiam comprehensam eu mea.', 'https://scontent.fakl3-1.fna.fbcdn.net/v/t1.0-9/13254090_585246871637319_2115270416824706615_n.jpg?oh=167d6838306ff29ccf4848c2010ea013&oe=59E96276', 'test@website.test'),
('jackmac', 'c0a561928cbc4e954940305cbf5d5a3db9426df2be22ae282ecfbf0102b3db19', 'be8e2abf100270b648e2981bb97a7a7d', 'Jack', 'Mac', 17, 'Lorem ipsum dolor sit amet, nec purto cibo fabulas ne, et liber laudem voluptaria mea, his ex purto graeci. Mei inermis antiopam ea. Ad meis ornatus laboramus duo, primis volumus placerat no mea, ea sed dico iudico. Zril sanctus expetendis eu has, an vix quod liber consequuntur. Blandit gloriatur eam et, volutpat eloquentiam comprehensam eu mea.', 'https://scontent.fakl3-1.fna.fbcdn.net/v/t1.0-9/13707750_1785178115095728_2637644960428659646_n.jpg?oh=ba139f203d04fe35b92542a52b666b37&oe=59DF7959', 'ok@no.yes'),
('abbymann', '162e6b7f0a7a3c8405c0cf6e16e9895bbdb443095aa673f61784555ae8b6e28c', '77534fa9c4310daa2cef2a23281a55b1', 'Abby', 'Man', 17, 'Lorem ipsum dolor sit amet, nec purto cibo fabulas ne, et liber laudem voluptaria mea, his ex purto graeci. Mei inermis antiopam ea. Ad meis ornatus laboramus duo, primis volumus placerat no mea, ea sed dico iudico. Zril sanctus expetendis eu has, an vix quod liber consequuntur. Blandit gloriatur eam et, volutpat eloquentiam comprehensam eu mea.', 'http://i.imgur.com/vvtSzjy.jpg', 'abby@girl.co');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
