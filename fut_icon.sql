-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2024 at 10:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fut_icon`
--

CREATE TABLE `fut_icon` (
  `id` int(11) NOT NULL,
  `avatarUrl` varchar(255) DEFAULT NULL,
  `commonName` varchar(255) DEFAULT NULL,
  `overallRating` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `PAC` int(11) DEFAULT NULL,
  `SHO` int(11) DEFAULT NULL,
  `PAS` int(11) DEFAULT NULL,
  `DRI` int(11) DEFAULT NULL,
  `DEF` int(11) DEFAULT NULL,
  `PHY` int(11) DEFAULT NULL,
  `nationalityImage` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fut_icon`
--

INSERT INTO `fut_icon` (`id`, `avatarUrl`, `commonName`, `overallRating`, `position`, `PAC`, `SHO`, `PAS`, `DRI`, `DEF`, `PHY`, `nationalityImage`, `fullName`) VALUES
(443, 'https://cdn.futwiz.com/assets/img/fc24/faces/237067.png', 'Pele', '95', 'CAM', 93, 94, 91, 94, 58, 74, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Pelé'),
(444, 'https://cdn.futwiz.com/assets/img/fc24/faces/37576.png', 'Ronaldo', '94', 'ST', 94, 94, 79, 94, 43, 75, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Ronaldo'),
(445, 'https://cdn.futwiz.com/assets/img/fc24/faces/1397.png', 'Zidane', '94', 'CAM', 83, 90, 94, 94, 73, 84, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Zinedine Zidane'),
(446, 'https://cdn.futwiz.com/assets/img/fc24/faces/190045.png', 'Cruyff', '93', 'CF', 90, 91, 90, 93, 42, 73, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Johan Cruyff'),
(447, 'https://cdn.futwiz.com/assets/img/fc24/faces/28130.png', 'Ronaldinho', '93', 'LW', 91, 89, 90, 95, 38, 80, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Ronaldinho'),
(448, 'https://cdn.futwiz.com/assets/img/fc24/faces/254642.png', 'Puskás', '92', 'CF', 90, 94, 89, 91, 45, 74, 'https://cdn.futwiz.com/assets/img/fc24/flags/23.png', 'Ferenc Puskás'),
(449, 'https://cdn.futwiz.com/assets/img/fc24/faces/247553.png', 'Garrincha', '92', 'RW', 89, 85, 92, 94, 40, 66, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Mané Garrincha'),
(450, 'https://cdn.futwiz.com/assets/img/fc24/faces/238439.png', 'Maldini', '92', 'CB', 85, 55, 74, 69, 95, 82, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Paolo Maldini'),
(451, 'https://cdn.futwiz.com/assets/img/fc24/faces/238380.png', 'Yashin', '92', 'GK', 93, 89, 75, 94, 60, 93, 'https://cdn.futwiz.com/assets/img/fc24/flags/40.png', 'Lev Yashin'),
(452, 'https://cdn.futwiz.com/assets/img/fc24/faces/230025.png', 'Charlton', '92', 'CAM', 90, 91, 87, 91, 50, 74, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Bobby Charlton'),
(453, 'https://cdn.futwiz.com/assets/img/fc24/faces/190048.png', 'Muller', '92', 'ST', 87, 92, 76, 85, 44, 74, 'https://cdn.futwiz.com/assets/img/fc24/flags/21.png', 'Gerd Müller'),
(454, 'https://cdn.futwiz.com/assets/img/fc24/faces/242519.png', 'Eusébio', '91', 'CF', 92, 92, 84, 91, 44, 77, 'https://cdn.futwiz.com/assets/img/fc24/flags/38.png', 'Eusébio'),
(455, 'https://cdn.futwiz.com/assets/img/fc24/faces/192181.png', 'van Basten', '91', 'ST', 84, 92, 74, 87, 37, 73, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Marco van Basten'),
(456, 'https://cdn.futwiz.com/assets/img/fc24/faces/167135.png', 'Carlos Alberto', '91', 'RB', 89, 64, 80, 84, 88, 85, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Carlos Alberto Torres'),
(457, 'https://cdn.futwiz.com/assets/img/fc24/faces/166906.png', 'Baresi', '91', 'CB', 73, 48, 75, 70, 94, 83, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Franco Baresi'),
(458, 'https://cdn.futwiz.com/assets/img/fc24/faces/166691.png', 'Zico', '91', 'CAM', 89, 92, 91, 91, 62, 71, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Zico'),
(459, 'https://cdn.futwiz.com/assets/img/fc24/faces/5003.png', 'Cafu', '91', 'RWB', 90, 56, 83, 85, 88, 83, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Cafu'),
(460, 'https://cdn.futwiz.com/assets/img/fc24/faces/1625.png', 'Henry', '91', 'ST', 93, 90, 82, 89, 51, 78, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Thierry Henry'),
(461, 'https://cdn.futwiz.com/assets/img/fc24/faces/1114.png', 'Baggio', '91', 'CAM', 84, 82, 90, 91, 38, 60, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Roberto Baggio'),
(462, 'https://cdn.futwiz.com/assets/img/fc24/faces/238435.png', 'Matthäus', '90', 'CM', 88, 87, 88, 81, 89, 82, 'https://cdn.futwiz.com/assets/img/fc24/flags/21.png', 'Lothar Matthäus'),
(463, 'https://cdn.futwiz.com/assets/img/fc24/faces/238430.png', 'Roberto Carlos', '90', 'LB', 91, 83, 83, 80, 85, 86, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Roberto Carlos'),
(464, 'https://cdn.futwiz.com/assets/img/fc24/faces/238388.png', 'Bergkamp', '90', 'CF', 83, 89, 84, 88, 35, 76, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Dennis Bergkamp'),
(465, 'https://cdn.futwiz.com/assets/img/fc24/faces/238382.png', 'Del Piero', '90', 'CF', 83, 90, 87, 91, 41, 66, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Alessandro Del Piero'),
(466, 'https://cdn.futwiz.com/assets/img/fc24/faces/226764.png', 'Best', '90', 'RW', 91, 89, 82, 92, 56, 68, 'https://cdn.futwiz.com/assets/img/fc24/flags/35.png', 'George Best'),
(467, 'https://cdn.futwiz.com/assets/img/fc24/faces/214100.png', 'Gullit', '90', 'CF', 85, 88, 88, 86, 80, 87, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Ruud Gullit'),
(468, 'https://cdn.futwiz.com/assets/img/fc24/faces/190044.png', 'Moore', '90', 'CB', 70, 62, 81, 76, 92, 83, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Bobby Moore'),
(469, 'https://cdn.futwiz.com/assets/img/fc24/faces/45661.png', 'Raúl', '90', 'CF', 86, 90, 80, 88, 45, 72, 'https://cdn.futwiz.com/assets/img/fc24/flags/45.png', 'Raúl González Blanco'),
(470, 'https://cdn.futwiz.com/assets/img/fc24/faces/10535.png', 'Xavi', '90', 'CM', 80, 76, 92, 90, 69, 69, 'https://cdn.futwiz.com/assets/img/fc24/flags/45.png', 'Xavi Hernández'),
(471, 'https://cdn.futwiz.com/assets/img/fc24/faces/7763.png', 'Pirlo', '90', 'CM', 73, 79, 93, 89, 69, 66, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Andrea Pirlo'),
(472, 'https://cdn.futwiz.com/assets/img/fc24/faces/5479.png', 'Casillas', '90', 'GK', 90, 88, 84, 93, 59, 88, 'https://cdn.futwiz.com/assets/img/fc24/flags/45.png', 'Iker Casillas'),
(473, 'https://cdn.futwiz.com/assets/img/fc24/faces/4231.png', 'Rivaldo', '90', 'LW', 87, 88, 87, 91, 42, 75, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Rivaldo'),
(474, 'https://cdn.futwiz.com/assets/img/fc24/faces/268513.png', 'Jairzinho', '89', 'RW', 91, 89, 84, 90, 49, 73, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Jairzinho'),
(475, 'https://cdn.futwiz.com/assets/img/fc24/faces/247699.png', 'Dalglish', '89', 'ST', 89, 90, 75, 88, 41, 72, 'https://cdn.futwiz.com/assets/img/fc24/flags/42.png', 'Kenny Dalglish'),
(476, 'https://cdn.futwiz.com/assets/img/fc24/faces/238428.png', 'Schmeichel', '89', 'GK', 89, 84, 86, 91, 47, 87, 'https://cdn.futwiz.com/assets/img/fc24/flags/13.png', 'Peter Schmeichel'),
(477, 'https://cdn.futwiz.com/assets/img/fc24/faces/238384.png', 'Carles Puyol', '89', 'CB', 72, 46, 66, 59, 91, 88, 'https://cdn.futwiz.com/assets/img/fc24/flags/45.png', 'Carles Puyol Saforcada'),
(478, 'https://cdn.futwiz.com/assets/img/fc24/faces/214267.png', 'Lineker', '89', 'ST', 86, 89, 71, 84, 40, 75, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Gary Lineker'),
(479, 'https://cdn.futwiz.com/assets/img/fc24/faces/191695.png', 'E. Butragueno', '89', 'ST', 92, 89, 78, 90, 40, 65, 'https://cdn.futwiz.com/assets/img/fc24/flags/45.png', 'Emilio Butragueño'),
(480, 'https://cdn.futwiz.com/assets/img/fc24/faces/190046.png', 'Sócrates', '89', 'CAM', 82, 88, 89, 88, 43, 82, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Sócrates'),
(481, 'https://cdn.futwiz.com/assets/img/fc24/faces/167198.png', 'Cantona', '89', 'CF', 86, 89, 86, 89, 50, 88, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Éric Cantona'),
(482, 'https://cdn.futwiz.com/assets/img/fc24/faces/166149.png', 'Sánchez', '89', 'ST', 89, 90, 78, 88, 41, 72, 'https://cdn.futwiz.com/assets/img/fc24/flags/83.png', 'Hugo Sánchez'),
(483, 'https://cdn.futwiz.com/assets/img/fc24/faces/138449.png', 'Kaká', '89', 'CAM', 89, 84, 86, 90, 43, 71, 'https://cdn.futwiz.com/assets/img/fc24/flags/54.png', 'Kaká'),
(484, 'https://cdn.futwiz.com/assets/img/fc24/faces/121939.png', 'Lahm', '89', 'RB', 84, 68, 83, 83, 86, 70, 'https://cdn.futwiz.com/assets/img/fc24/flags/21.png', 'Philipp Lahm'),
(485, 'https://cdn.futwiz.com/assets/img/fc24/faces/31432.png', 'Drogba', '89', 'ST', 87, 90, 74, 80, 44, 87, 'https://cdn.futwiz.com/assets/img/fc24/flags/108.png', 'Didier Drogba'),
(486, 'https://cdn.futwiz.com/assets/img/fc24/faces/10264.png', 'van Nistelrooy', '89', 'ST', 84, 89, 71, 83, 38, 80, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Ruud van Nistelrooy'),
(487, 'https://cdn.futwiz.com/assets/img/fc24/faces/9676.png', 'Eto\'o', '89', 'ST', 92, 90, 79, 87, 45, 80, 'https://cdn.futwiz.com/assets/img/fc24/flags/103.png', 'Samuel Eto\'o'),
(488, 'https://cdn.futwiz.com/assets/img/fc24/faces/5589.png', 'Luís Figo', '89', 'RW', 89, 84, 86, 90, 38, 77, 'https://cdn.futwiz.com/assets/img/fc24/flags/38.png', 'Luís Figo'),
(489, 'https://cdn.futwiz.com/assets/img/fc24/faces/4833.png', 'Stoichkov', '89', 'ST', 90, 91, 84, 90, 49, 84, 'https://cdn.futwiz.com/assets/img/fc24/flags/9.png', 'Hristo Stoichkov'),
(490, 'https://cdn.futwiz.com/assets/img/fc24/faces/1183.png', 'Cannavaro', '89', 'CB', 80, 44, 62, 67, 93, 83, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Fabio Cannavaro'),
(491, 'https://cdn.futwiz.com/assets/img/fc24/faces/1088.png', 'Nesta', '89', 'CB', 76, 44, 63, 68, 92, 84, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Alessandro Nesta'),
(492, 'https://cdn.futwiz.com/assets/img/fc24/faces/1041.png', 'Zanetti', '89', 'RB', 83, 60, 84, 81, 86, 78, 'https://cdn.futwiz.com/assets/img/fc24/flags/52.png', 'Javier Zanetti'),
(493, 'https://cdn.futwiz.com/assets/img/fc24/faces/51.png', 'Shearer', '89', 'ST', 82, 91, 76, 78, 49, 84, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Alan Shearer'),
(494, 'https://cdn.futwiz.com/assets/img/fc24/faces/262112.png', 'van Persie', '88', 'ST', 84, 91, 84, 87, 45, 73, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Robin van Persie'),
(495, 'https://cdn.futwiz.com/assets/img/fc24/faces/242510.png', 'Klose', '88', 'ST', 86, 87, 73, 80, 40, 79, 'https://cdn.futwiz.com/assets/img/fc24/flags/21.png', 'Miroslav Klose'),
(496, 'https://cdn.futwiz.com/assets/img/fc24/faces/238443.png', 'Blanc', '88', 'CB', 78, 67, 68, 76, 90, 85, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Laurent Blanc'),
(497, 'https://cdn.futwiz.com/assets/img/fc24/faces/238427.png', 'Vieira', '88', 'CM', 82, 78, 80, 82, 88, 90, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Patrick Vieira'),
(498, 'https://cdn.futwiz.com/assets/img/fc24/faces/222000.png', 'Laudrup', '88', 'CAM', 84, 80, 88, 90, 40, 63, 'https://cdn.futwiz.com/assets/img/fc24/flags/13.png', 'Michael Laudrup'),
(499, 'https://cdn.futwiz.com/assets/img/fc24/faces/167680.png', 'Koeman', '88', 'CB', 76, 86, 85, 78, 88, 84, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Ronald Koeman'),
(500, 'https://cdn.futwiz.com/assets/img/fc24/faces/166124.png', 'Hagi', '88', 'CAM', 82, 86, 88, 88, 41, 64, 'https://cdn.futwiz.com/assets/img/fc24/flags/39.png', 'Gheorghe Hagi'),
(501, 'https://cdn.futwiz.com/assets/img/fc24/faces/161840.png', 'Fernando Hierro', '88', 'CB', 74, 67, 74, 68, 92, 84, 'https://cdn.futwiz.com/assets/img/fc24/flags/45.png', 'Fernando Hierro Ruiz'),
(502, 'https://cdn.futwiz.com/assets/img/fc24/faces/156616.png', 'Ribéry', '88', 'LM', 89, 85, 85, 90, 37, 65, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Franck Ribéry'),
(503, 'https://cdn.futwiz.com/assets/img/fc24/faces/121944.png', 'Schweinsteiger', '88', 'CM', 76, 83, 86, 83, 83, 83, 'https://cdn.futwiz.com/assets/img/fc24/flags/21.png', 'Bastian Schweinsteiger'),
(504, 'https://cdn.futwiz.com/assets/img/fc24/faces/54050.png', 'Rooney', '88', 'ST', 88, 90, 81, 86, 53, 87, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Wayne Rooney'),
(505, 'https://cdn.futwiz.com/assets/img/fc24/faces/51539.png', 'van der Sar', '88', 'GK', 84, 87, 79, 86, 39, 92, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Edwin van der Sar'),
(506, 'https://cdn.futwiz.com/assets/img/fc24/faces/48940.png', 'Čech', '88', 'GK', 86, 85, 76, 88, 54, 90, 'https://cdn.futwiz.com/assets/img/fc24/flags/12.png', 'Petr Čech'),
(507, 'https://cdn.futwiz.com/assets/img/fc24/faces/23174.png', 'Riquelme', '88', 'CAM', 71, 84, 90, 90, 33, 66, 'https://cdn.futwiz.com/assets/img/fc24/flags/52.png', 'Juan Román Riquelme'),
(508, 'https://cdn.futwiz.com/assets/img/fc24/faces/13743.png', 'Gerrard', '88', 'CM', 78, 88, 88, 83, 75, 82, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Steven Gerrard'),
(509, 'https://cdn.futwiz.com/assets/img/fc24/faces/13128.png', 'Shevchenko', '88', 'ST', 86, 90, 71, 85, 35, 73, 'https://cdn.futwiz.com/assets/img/fc24/flags/49.png', 'Andriy Shevchenko'),
(510, 'https://cdn.futwiz.com/assets/img/fc24/faces/7289.png', 'Ferdinand', '88', 'CB', 82, 48, 65, 64, 90, 85, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Rio Ferdinand'),
(511, 'https://cdn.futwiz.com/assets/img/fc24/faces/6235.png', 'Nedvěd', '88', 'LM', 84, 84, 86, 87, 58, 77, 'https://cdn.futwiz.com/assets/img/fc24/flags/12.png', 'Pavel Nedvěd'),
(512, 'https://cdn.futwiz.com/assets/img/fc24/faces/5419.png', 'Owen', '88', 'ST', 89, 88, 69, 87, 35, 66, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Michael Owen'),
(513, 'https://cdn.futwiz.com/assets/img/fc24/faces/1116.png', 'Desailly', '88', 'CB', 82, 51, 65, 66, 88, 88, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Marcel Desailly'),
(514, 'https://cdn.futwiz.com/assets/img/fc24/faces/250.png', 'Beckham', '88', 'RM', 80, 85, 92, 85, 66, 79, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'David Beckham'),
(515, 'https://cdn.futwiz.com/assets/img/fc24/faces/246.png', 'Scholes', '88', 'CM', 74, 86, 89, 78, 62, 80, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Paul Scholes'),
(516, 'https://cdn.futwiz.com/assets/img/fc24/faces/248146.png', 'Wright', '87', 'ST', 88, 89, 69, 81, 40, 76, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Ian Wright'),
(517, 'https://cdn.futwiz.com/assets/img/fc24/faces/247703.png', 'Rush', '87', 'ST', 84, 89, 69, 83, 43, 78, 'https://cdn.futwiz.com/assets/img/fc24/flags/50.png', 'Ian Rush'),
(518, 'https://cdn.futwiz.com/assets/img/fc24/faces/247515.png', 'Barnes', '87', 'LW', 89, 85, 83, 89, 44, 83, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'John Barnes'),
(519, 'https://cdn.futwiz.com/assets/img/fc24/faces/238424.png', 'Kluivert', '87', 'ST', 84, 86, 76, 81, 40, 79, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Patrick Kluivert'),
(520, 'https://cdn.futwiz.com/assets/img/fc24/faces/214649.png', 'Šuker', '87', 'ST', 83, 89, 79, 88, 43, 75, 'https://cdn.futwiz.com/assets/img/fc24/flags/10.png', 'Davor Šuker'),
(521, 'https://cdn.futwiz.com/assets/img/fc24/faces/214098.png', 'Rijkaard', '87', 'CDM', 77, 73, 80, 77, 87, 86, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Frank Rijkaard'),
(522, 'https://cdn.futwiz.com/assets/img/fc24/faces/140601.png', 'Vidić', '87', 'CB', 78, 48, 62, 62, 90, 89, 'https://cdn.futwiz.com/assets/img/fc24/flags/51.png', 'Nemanja Vidić'),
(523, 'https://cdn.futwiz.com/assets/img/fc24/faces/49369.png', 'Fernando Torres', '87', 'ST', 89, 87, 75, 85, 43, 75, 'https://cdn.futwiz.com/assets/img/fc24/flags/45.png', 'Fernando Torres'),
(524, 'https://cdn.futwiz.com/assets/img/fc24/faces/45197.png', 'Xabi Alonso', '87', 'CDM', 71, 77, 86, 78, 83, 80, 'https://cdn.futwiz.com/assets/img/fc24/flags/45.png', 'Xabi Alonso'),
(525, 'https://cdn.futwiz.com/assets/img/fc24/faces/5984.png', 'Trezeguet', '87', 'ST', 82, 88, 67, 79, 42, 77, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'David Trezeguet'),
(526, 'https://cdn.futwiz.com/assets/img/fc24/faces/5471.png', 'Lampard', '87', 'CM', 77, 88, 86, 84, 71, 80, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Frank Lampard'),
(527, 'https://cdn.futwiz.com/assets/img/fc24/faces/3647.png', 'Ballack', '87', 'CM', 81, 87, 85, 81, 78, 83, 'https://cdn.futwiz.com/assets/img/fc24/flags/21.png', 'Michael Ballack'),
(528, 'https://cdn.futwiz.com/assets/img/fc24/faces/1668.png', 'Makélélé', '87', 'CDM', 81, 48, 76, 78, 86, 86, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Claude Makélélé'),
(529, 'https://cdn.futwiz.com/assets/img/fc24/faces/1620.png', 'Petit', '87', 'CDM', 77, 77, 79, 76, 85, 87, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Emmanuel Petit'),
(530, 'https://cdn.futwiz.com/assets/img/fc24/faces/1605.png', 'Pirès', '87', 'LM', 86, 79, 84, 86, 38, 64, 'https://cdn.futwiz.com/assets/img/fc24/flags/18.png', 'Robert Pirès'),
(531, 'https://cdn.futwiz.com/assets/img/fc24/faces/1256.png', 'Seedorf', '87', 'CAM', 79, 84, 87, 85, 66, 79, 'https://cdn.futwiz.com/assets/img/fc24/flags/34.png', 'Clarence Seedorf'),
(532, 'https://cdn.futwiz.com/assets/img/fc24/faces/1201.png', 'Zola', '87', 'CF', 85, 88, 85, 89, 41, 63, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Gianfranco Zola'),
(533, 'https://cdn.futwiz.com/assets/img/fc24/faces/250890.png', 'Zambrotta', '86', 'RB', 87, 69, 80, 81, 84, 82, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Gianluca Zambrotta'),
(534, 'https://cdn.futwiz.com/assets/img/fc24/faces/243030.png', 'Gattuso', '86', 'CDM', 73, 62, 69, 70, 88, 87, 'https://cdn.futwiz.com/assets/img/fc24/flags/27.png', 'Gennaro Gattuso'),
(535, 'https://cdn.futwiz.com/assets/img/fc24/faces/243029.png', 'Campbell', '86', 'CB', 81, 45, 60, 58, 87, 88, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Sol Campbell'),
(536, 'https://cdn.futwiz.com/assets/img/fc24/faces/243027.png', 'Verón', '86', 'CM', 75, 81, 86, 81, 73, 81, 'https://cdn.futwiz.com/assets/img/fc24/flags/52.png', 'Juan Sebastián Verón'),
(537, 'https://cdn.futwiz.com/assets/img/fc24/faces/239261.png', 'Larsson', '86', 'ST', 87, 86, 73, 82, 45, 71, 'https://cdn.futwiz.com/assets/img/fc24/flags/46.png', 'Henrik Larsson'),
(538, 'https://cdn.futwiz.com/assets/img/fc24/faces/156353.png', 'Hernández', '86', 'ST', 89, 85, 71, 86, 45, 67, 'https://cdn.futwiz.com/assets/img/fc24/flags/83.png', 'Luis Hernández'),
(539, 'https://cdn.futwiz.com/assets/img/fc24/faces/45674.png', 'Essien', '86', 'CDM', 82, 73, 77, 78, 85, 86, 'https://cdn.futwiz.com/assets/img/fc24/flags/117.png', 'Michael Essien'),
(540, 'https://cdn.futwiz.com/assets/img/fc24/faces/34079.png', 'Cole', '86', 'LB', 87, 65, 79, 80, 84, 77, 'https://cdn.futwiz.com/assets/img/fc24/flags/14.png', 'Ashley Cole'),
(541, 'https://cdn.futwiz.com/assets/img/fc24/faces/7512.png', 'Crespo', '86', 'ST', 86, 86, 70, 85, 36, 70, 'https://cdn.futwiz.com/assets/img/fc24/flags/52.png', 'Hernán Crespo'),
(542, 'https://cdn.futwiz.com/assets/img/fc24/faces/240.png', 'Keane', '86', 'CM', 72, 69, 82, 78, 84, 87, 'https://cdn.futwiz.com/assets/img/fc24/flags/25.png', 'Roy Keane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fut_icon`
--
ALTER TABLE `fut_icon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fut_icon`
--
ALTER TABLE `fut_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
