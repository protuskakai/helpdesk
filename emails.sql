-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 06:01 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `COL 1` varchar(4) DEFAULT NULL,
  `COL 2` varchar(11) DEFAULT NULL,
  `COL 3` varchar(15) DEFAULT NULL,
  `COL 4` varchar(27) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`COL 1`, `COL 2`, `COL 3`, `COL 4`) VALUES
('HQ', 'BABU', 'OCHANDE', 'bochande@nzoiawater.or.ke'),
('BGM', 'MILLICENT', 'NEKESA', 'mnekesa@nzoiawater.or.ke'),
('KTL', 'LUCY', 'NJERI', 'lnjeri@nzoiawater.or.ke'),
('KIM', 'SCHOLASTICA', 'MASIKA', 'smasika@nzoiawater.or.ke'),
('KIM', 'BONFACE', 'INGOI', 'bingoi@nzoiawater.or.ke'),
('BGM', 'THEODORA', 'MADARA', 'tmadara@nzoiawater.or.ke'),
('KTL', 'MIKE', 'KIMANI', 'mkimani@nzoiawater.or.ke'),
('HQ', 'SERYLA', 'MAKALI', 'smakali@nzoiawater.co.ke'),
('HQ', 'AMBROSE', 'WAFULA', 'awafula@nzoiawater.co.ke'),
('HQ', 'CHRISPINUS', 'NABANGI', 'cnabangi@nzoiawater.co.ke'),
('HQ', 'CATHERINE', 'NAKHUNGU', 'cnakhungu@nzoiawater.co.ke'),
('HQ', 'FERDINAND', 'KHAEMBA', 'fkhaemba@nzoiawater.co.ke'),
('HQ', 'FELISTUS', 'MUSONYE', 'fmusonye@nzoiawater.co.ke'),
('HQ', 'BESMATH', 'IMALI', 'bimali@nzoiawater.co.ke'),
('KIM', 'WANYAMA', 'GABRIEL', 'gwanyama@nzoiawater.co.ke'),
('HQ', 'EFFIE', 'WEKESA', 'enanjala@nzoiawater.co.ke'),
('HQ', 'KIZITO', 'NAKHANYA', 'knakhanya@nzoiawater.co.ke'),
('HQ', 'PROTUS', 'KAKAI', 'pkakai@nzoiawater.or.ke'),
('HQ', 'PETER', 'WASIKE', 'pwasike@nzoiawater.or.ke'),
('HQ', 'CHEPTAI', 'KABETE', 'ckabete@nzoiawater.or.ke'),
('HQ', 'GODFREY', 'NYONGESA', 'gnyongesa@nzoiawater.or.ke'),
('HQ', 'MACKLOUD', 'SIRENGO', 'smacloud@nzoiawater.or.ke'),
('HQ', 'BOSLEY', 'ASENAHABI', 'basenahabi@nzoiawater.or.ke'),
('KTL', 'PATRICK', 'KWOMA', 'pkwoma@nzoiawater.or.ke'),
('HQ', 'KANGU', 'NELSON', 'namalanda@nzoiawater.or.ke'),
('WEB', 'WENSLUS', 'MAKALI', 'wmakali@nzoiawater.or.ke'),
('HQ', 'ESBON', 'MWANGI', 'emwangi@nzoiawater.or.ke'),
('HQ', 'PENINA', 'CHACHI', 'pchachi@nzoiawater.or.ke'),
('HQ', 'HOLI', 'IAN', 'iwekesa@nzoiawater.or.ke'),
('WEB', 'ISAAC', 'SIMIYU', 'isimiyu@nzoiawater.or.ke'),
('KTL', 'LINET', 'TUMBO', 'ltumbo@nzoiawater.or.ke'),
('KTL', 'MARK', 'WERUNGA', 'mwerunga@nzoiawater.or.ke'),
('KTL', 'NELLY', 'NGE\'NO', 'nnelly@nzoiawater.or.ke'),
('KTL', 'METRINE', 'NAFULA', 'mwafula@nzoiawater.or.ke'),
('KTL', 'CHEROMITH', 'WANGU', 'cwangu@nzoiawater.or.ke'),
('KTL', 'CONRAD', 'MMBARACK', 'cmmbarack@nzoiawater.or.ke'),
('KTL', 'TALAKA', 'EDWIN ANGOTE', 'eangote@nzoiawater.or.ke'),
('KTL', 'GIDEON', 'MUKORO', 'gmukoro@nzoiawater.or.ke'),
('KTL', 'ZACHARIA', 'S. KISILILI', 'zkisilili@nzoiawater.or.ke'),
('MAL', 'JACOB', 'TINDI', 'jtindi@nzoiawater.or.ke'),
('MAL', 'PETER', 'KIMUNGUI', 'pkimungui@nzoiawater.or.ke'),
('MAL', 'DAMARIS', 'EMURIA', 'damaris@nzoiawater.or.ke'),
('MAL', 'GLADYS', 'KASILI', 'gkasili@nzoiawater.or.ke'),
('MAL', 'ABRAHAM', 'OKIRU', 'aokiru@nzoiawater.or.ke'),
('KTL', 'ALLAN', 'WANJALA', 'awanjala@nzoiawater.or.ke'),
('KTL', 'GEORGE', 'SIPENJI', 'gsipenji@nzoiawater.or.ke'),
('KTL', 'RICHARD', 'MASEO', 'rmaseo@nzoiawater.or.ke'),
('KTL', 'BILHA', 'WAMBULWA', 'bwambulwa@nzoiawater.or.ke'),
('KTL', 'JEREMY', 'GITONGA', 'jgitonga@nzoiawater.or.ke'),
('KTL', 'CASPER', 'LUKHABILE', 'clukhabile@nzoiawater.or.ke'),
('KTL', 'PAUL', 'WENANI', 'pwenani@nzoiawater.or.ke'),
('KTL', 'HELLEN', 'AMUKO', 'hamuko@nzoiawater.or.ke'),
('KTL', 'EDWIN', 'OKOTH', 'eokoth@nzoiawater.or.ke'),
('KTL', 'CHRISTINE', 'NASWA', 'cnaswa@nzoiawater.or.ke'),
('KTL', 'SALOME', 'MUKHAYE', 'smukhayo@nzoiawater.or.ke'),
('KTL', 'PAULINE', 'ACHIENG', 'pachieng@nzoiawater.or.ke'),
('KTL', 'ANN', 'NYONGESA', 'anyongesa@nzoiawater.or.ke'),
('KTL', 'DORCAS', 'MOSONGO', 'dmosongo@nzoiawater.or.ke'),
('KTL', 'LINDA', 'K', 'klinda@nzoiawater.or.ke'),
('WEB', 'MWANGALA', 'BARASA', 'mbarasa@nzoiawater.or.ke'),
('WEB', 'SIRENGO', 'SYLIVIA', 'ssirengo@nzoiawater.or.ke'),
('WEB', 'HELLEN', 'MUCHERU', 'hmucheru@nzoiawater.or.ke'),
('WEB', 'PHYLIS', 'WANYONYI', 'pwanyonyi@nzoiawater.or.ke'),
('WEB', 'ENGEFU', 'LINET', 'elinet@nzoiawater.or.ke'),
('WEB', 'NANCY', 'KAIBEI', 'nkaibei@nzoiawater.or.ke'),
('BGM', 'CATHERINE', 'GETANDA', 'cgetanda@nzoiawater.or.ke'),
('BGM', 'MARTIN', 'MUKHWANA MASIKA', 'mmasika@nzoiawater.or.ke'),
('BGM', 'ISAIAH', 'MAMATI', 'imamati@nzoiawater.or.ke'),
('BGM', 'PAULINE', 'MUSI', 'pmusi@nzoiawater.or.ke'),
('BGM', 'RONO', 'NELSON', 'rnelson@nzoiawater.or.ke'),
('BGM', 'SUSAN', 'WANJALA', 'swanjala@nzoiawater.or.ke'),
('KIMS', 'JOCKTAN', 'KABEI', 'jkabei@nzoiawater.or.ke'),
('KIMS', 'LINET', 'MUTAMBI', 'lmutambi@nzoiawater.or.ke'),
('KIMS', 'KWEYU', 'DENIS', 'kdenis@nzoiawater.or.ke'),
('KIMS', 'PATRICK', 'WANYAMA', 'pwanyama@nzoiawater.or.ke'),
('KIMS', 'FRED', 'SIRO', 'fsiro@nzoiawater.or.ke'),
('KIMS', 'ANDREW', 'NAMUSASI', 'anamusasi@nzoiawater.or.ke'),
('WEB', 'HENRY', 'FWAMBA', 'hfwamba@nzoiawater.or.ke'),
('WEB', 'RUDOLF', 'NAMDE', 'rnamde@nzoiawater.or.ke'),
('WEB', 'JACKYLINE', 'MASINDE', 'jmasinde@nzoiawater.or.ke'),
('WEB', 'THOMAS', 'ATWELE', 'tatwele@nzoiawater.or.ke'),
('WEB', 'JACKY', 'BARASA', 'jbaraza@nzoiawater.or.ke'),
('HQ', 'FLORENCE', 'WAMBUI', 'fwambui@nzoiawater.or.ke');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
