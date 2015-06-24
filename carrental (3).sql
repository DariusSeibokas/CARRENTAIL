-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2014 at 11:28 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `RegNo` char(15) NOT NULL,
  `Make` varchar(15) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `FuelType` varchar(15) DEFAULT NULL,
  `NumberSeats` varchar(2) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Price` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`RegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`RegNo`, `Make`, `Model`, `FuelType`, `NumberSeats`, `Status`, `Price`) VALUES
('05KE10850', 'Nissan', 'Quashqai', 'Diesel', '7', 'Available', '35.00'),
('09HX3573', 'Toyota', 'Yaris', 'Petrol', '5', 'Available', '45.00'),
('09KI7043', 'Ford', 'Galaxy', 'Diesel', '7', 'Available', '85.00'),
('10DE73401', 'Mitsubishi', 'Colt', 'Petrol', '5', 'Available', '55.00'),
('10DT324', 'BMW', 'X5', 'Diesel', '7', 'Available', '75.00'),
('10HJ567', 'Nissan', 'Micra', 'Petrol', '5', 'Available', '40.00'),
('10HK9057', 'Opel', 'Insignia', 'Diesel', '5', 'Available', '50.00'),
('10HX907', 'Ford', 'Focus', 'Petrol', '5', 'Available', '45.00'),
('10WD1040', 'Volkswagen', 'Sharan', 'Diesel', '7', 'Available', '95.00'),
('11DE850', 'Opel', 'Vectra', 'Diesel', '2', 'Available', '50.00'),
('11GF20435', 'Opel', 'Zafira', 'Diesel', '7', 'Available', '80.00'),
('11GT1050', 'Mitsubishi', 'Grandis', 'Diesel', '7', 'Available', '80.00'),
('123456799', 'Toyota', 'Avensis', 'Diesel', '5', 'Available', '80.00'),
('12GY1070', 'Volkswagen', 'Passat', 'Diesel', '5', 'Available', '65.00'),
('12KI50981', 'BMW', '5-Series', 'Diesel', '5', 'Available', '70.00'),
('12KW303', 'Volkswagen', 'Golf', 'Diesel', '5', 'Available', '50.00'),
('12KY1234', 'Audi', 'Q7', 'Diesel', '7', 'Available', '90.00'),
('12W432', 'Audi', 'A4', 'Diesel', '5', 'Available', '50.00'),
('12W7089', 'Mazda', '5', 'Diesel', '7', 'Available', '90.00'),
('12WE102', 'BMW', '7-Series', 'Diesel', '5', 'Available', '80.00'),
('12XT10233', 'BMW', '3-Series', 'Diesel', '5', 'Available', '50.00'),
('131HW8097', 'Audi', 'A4', 'Diesel', '5', 'Available', '50.00'),
('131JH909', 'Nissan', 'Juke', 'Diesel', '5', 'Available', '55.00');

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE IF NOT EXISTS `county` (
  `county` varchar(15) NOT NULL,
  PRIMARY KEY (`county`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`county`) VALUES
('Antrim'),
('Armagh'),
('Carlow'),
('Cavan'),
('Clare'),
('Cork'),
('Derry'),
('Donegal'),
('Down'),
('Dublin'),
('Fermanagh'),
('Galway'),
('Kerry'),
('Kildare'),
('Kilkenny'),
('Laois'),
('Leitrim'),
('Limerick'),
('Longford'),
('Louth'),
('Mayo'),
('Meath'),
('Monaghan'),
('Offaly'),
('Roscommon'),
('Sligo'),
('Tipperary'),
('Tyrone'),
('Waterford'),
('Westmeath'),
('Wexford'),
('Wicklow');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` char(6) NOT NULL,
  `FirstName` char(15) NOT NULL,
  `LastName` char(10) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Street` varchar(30) DEFAULT NULL,
  `Town` char(15) NOT NULL,
  `County` char(15) NOT NULL,
  `Phone` char(15) DEFAULT NULL,
  `Email` char(40) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `DOB`, `Street`, `Town`, `County`, `Phone`, `Email`) VALUES
('000002', 'Maria', 'Murphy', '1982-03-11', 'Main Street', 'Enniscorty', 'Wexford', '0869988765', 'maria@gmail.com'),
('319342', 'Silvester', 'Stalone', '1967-07-06', '12 Rowe Street', 'Gorey', 'Wexford', '09654337654', 'stalone@gmail.com'),
('583096', 'Jacob', 'Hanoe', '1978-12-23', '34carn glass way', 'Clonmel', 'Tipperary', '0836654447', 'jacob@gmail.com'),
('667910', 'John', 'Murphy', '1978-09-27', '76 Main Street', 'Castlebar', 'Mayo', '0865434508', 'john@gmail.com'),
('929687', 'Deimante', 'Garlauskai', '1980-02-07', '32 main street', 'Tuam', 'Galway', '08653444567', 'deima83@gmail.com'),
('944903', 'Darius', 'Seibokas', '1975-07-29', '48  carn glas way', 'Tuam', 'Galway', '0868573087', 'darius@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `makemodel`
--

CREATE TABLE IF NOT EXISTS `makemodel` (
  `model` varchar(20) NOT NULL,
  `make` varchar(15) NOT NULL,
  PRIMARY KEY (`model`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makemodel`
--

INSERT INTO `makemodel` (`model`, `make`) VALUES
('Fiesta', 'Ford'),
('Focus', 'Ford'),
('i30', 'Hyundai'),
('ix35', 'Hyundai'),
('Corsa', 'Opel'),
('Mondeo', 'Ford'),
('Galaxy', 'Ford'),
('145', 'Alfa Romeo'),
('147', 'Alfa Romeo'),
('155', 'Alfa Romeo'),
('156', 'Alfa Romeo'),
('159', 'Alfa Romeo'),
('166', 'Alfa Romeo'),
('Berera', 'Alfa Romeo'),
('Giulietta', 'Alfa Romeo'),
('GT', 'Alfa Romeo'),
('Mito', 'Alfa Romeo'),
('Spider', 'Alfa Romeo'),
('A1', 'Audi'),
('A2', 'Audi'),
('A3', 'Audi'),
('A5', 'Audi'),
('A6', 'Audi'),
('A7', 'Audi'),
('A8', 'Audi'),
('Coupe', 'Audi'),
('Q3', 'Audi'),
('Q5', 'Audi'),
('TT', 'Audi'),
('1-Series', 'BMW'),
('6-Series', 'BMW'),
('7-Series', 'BMW'),
('8-Series', 'BMW'),
('M3', 'BMW'),
('M5', 'BMW'),
('M6', 'BMW'),
('X1', 'BMW'),
('X3', 'BMW'),
('X6', 'BMW'),
('Z3', 'BMW'),
('Z4', 'BMW'),
('Berlingo', 'Citroen'),
('BX', 'Citroen'),
('C1', 'Citroen'),
('C2', 'Citroen'),
('C3', 'Citroen'),
('C4', 'Citroen'),
('C4 GRAND PICASSO', 'Citroen'),
('C5', 'Citroen'),
('Saxo', 'Citroen'),
('Xantia', 'Citroen'),
('Xsara', 'Citroen'),
('Xsara Picasso', 'Citroen'),
('124', 'Fiat'),
('126', 'Fiat'),
('Bravo', 'Fiat'),
('Panda', 'Fiat'),
('Punto', 'Fiat'),
('Seicento', 'Fiat'),
('Stilo', 'Fiat'),
('Tipo', 'Fiat'),
('Capri', 'Ford'),
('Cougar', 'Ford'),
('Courier', 'Ford'),
('Fusion', 'Ford'),
('KA', 'Ford'),
('Kuga', 'Ford'),
('Puma', 'Ford'),
('Ranger', 'Ford'),
('Transit', 'Ford'),
('Accord', 'Honda'),
('Civic', 'Honda'),
('CR-V', 'Honda'),
('CR-X', 'Honda'),
('CR-Z', 'Honda'),
('Fit', 'Honda'),
('FR-V', 'Honda'),
('HR-V', 'Honda'),
('Insight', 'Honda'),
('Jazz', 'Honda'),
('Legend', 'Honda'),
('Prelude', 'Honda'),
('Stepwagon', 'Honda'),
('Stream', 'Honda'),
('A4', 'Audi'),
('Accent', 'Hyundai'),
('Amica', 'Hyundai'),
('Atoz', 'Hyundai'),
('Getz', 'Hyundai'),
('i10', 'Hyundai'),
('i20', 'Hyundai'),
('i40', 'Hyundai'),
('i800', 'Hyundai'),
('ix20', 'Hyundai'),
('Lantra', 'Hyundai'),
('Matrix', 'Hyundai'),
('S', 'Hyundai'),
('Santa-FE', 'Hyundai'),
('Sonata', 'Hyundai'),
('Terracan', 'Hyundai'),
('Trajet', 'Hyundai'),
('Tucson', 'Hyundai'),
('Veloster', 'Hyundai'),
('Q7', 'Audi'),
('Cherokee', 'Jeep'),
('Grand Cherokee', 'Jeep'),
('5-Series', 'BMW'),
('Defender', 'Land Rover'),
('Discovery', 'Land Rover'),
('Freelander', 'Land Rover'),
('Rangerover', 'Land Rover'),
('CT', 'Lexus'),
('GS', 'Lexus'),
('IS', 'Lexus'),
('LS', 'Lexus'),
('RX', 'Lexus'),
('SC', 'Lexus'),
('121', 'Mazda'),
('2', 'Mazda'),
('3', 'Mazda'),
('323', 'Mazda'),
('5', 'Mazda'),
('6', 'Mazda'),
('626', 'Mazda'),
('CX-5', 'Mazda'),
('MX-5', 'Mazda'),
('RX-8', 'Mazda'),
('A-Class', 'Mercedes-Benz'),
('B-Class', 'Mercedes-Benz'),
('C-Class', 'Mercedes-Benz'),
('CL-Class', 'Mercedes-Benz'),
('CLK-Class', 'Mercedes-Benz'),
('CLS-Class', 'Mercedes-Benz'),
('E-Class', 'Mercedes-Benz'),
('ML-Class', 'Mercedes-Benz'),
('S-Class', 'Mercedes-Benz'),
('Vito', 'Mercedes-Benz'),
('MGA', 'MG'),
('MGF', 'MG'),
('ZR', 'MG'),
('ZS', 'MG'),
('ZT', 'MG'),
('Cooper', 'Mini'),
('Countryman', 'Mini'),
('Mini', 'Mini'),
('ONE', 'Mini'),
('ASX', 'Mitsubishi'),
('Carisma', 'Mitsubishi'),
('Colt', 'Mitsubishi'),
('Galant', 'Mitsubishi'),
('Grandis', 'Mitsubishi'),
('L200', 'Mitsubishi'),
('Lancer', 'Mitsubishi'),
('Mirage', 'Mitsubishi'),
('Outlander', 'Mitsubishi'),
('Pajero', 'Mitsubishi'),
('Shogun', 'Mitsubishi'),
('Spacewagon', 'Mitsubishi'),
('Almera', 'Nissan'),
('Juke', 'Nissan'),
('Maxima', 'Nissan'),
('Micra', 'Nissan'),
('Navara', 'Nissan'),
('Note', 'Nissan'),
('Patrol', 'Nissan'),
('Primera', 'Nissan'),
('Qashqai', 'Nissan'),
('Serena', 'Nissan'),
('Silvia', 'Nissan'),
('Vanette', 'Nissan'),
('X-Trail', 'Nissan'),
('ZX', 'Nissan'),
('Astra', 'Opel'),
('Combo', 'Opel'),
('Insignia', 'Opel'),
('Meriva', 'Opel'),
('Tigra', 'Opel'),
('Vectra', 'Opel'),
('Vivaro', 'Opel'),
('Zafira', 'Opel'),
('1007', 'Peugeot'),
('206', 'Peugeot'),
('207', 'Peugeot'),
('208', 'Peugeot'),
('3008', 'Peugeot'),
('307', 'Peugeot'),
('308', 'Peugeot'),
('309', 'Peugeot'),
('4007', 'Peugeot'),
('407', 'Peugeot'),
('5008', 'Peugeot'),
('Expert', 'Peugeot'),
('RCZ', 'Peugeot'),
('911', 'Porsche'),
('944', 'Porsche'),
('Boxster', 'Porsche'),
('Cayenne', 'Porsche'),
('Cayman', 'Porsche'),
('Clio', 'Renault'),
('Espace', 'Renault'),
('Fluence', 'Renault'),
('Grand Espace', 'Renault'),
('Grand Megane', 'Renault'),
('Modus', 'Renault'),
('Scenic', 'Renault'),
('Twingo', 'Renault'),
('Safrane', 'Renault'),
('90', 'Saab'),
('900', 'Saab'),
('9000', 'Saab'),
('9-3', 'Saab'),
('9-5', 'Saab'),
('Alhambra', 'Seat'),
('Altera', 'Seat'),
('Arosa', 'Seat'),
('Cordoba', 'Seat'),
('Exeo', 'Seat'),
('Ibiza', 'Seat'),
('Leon', 'Seat'),
('Toledo', 'Seat'),
('Citigo', 'Skoda'),
('Fabia', 'Skoda'),
('Felicia', 'Skoda'),
('Octavia', 'Skoda'),
('Rapid', 'Skoda'),
('Roomster', 'Skoda'),
('Soperb', 'Skoda'),
('Yeti', 'Skoda'),
('Forfour', 'Smart'),
('Fortwo', 'Skoda'),
('Pure', 'Skoda'),
('Roadster', 'Skoda'),
('Forester', 'Subaru'),
('Impreza', 'Subaru'),
('Justy', 'Subaru'),
('Legacy', 'Subaru'),
('Outback', 'Subaru'),
('Tribeca', 'Subaru'),
('XV', 'Subaru'),
('Alto', 'Suzuki'),
('Grand Vitara', 'Suzuki'),
('Ignis', 'Suzuki'),
('Jimny', 'Suzuki'),
('Liana', 'Suzuki'),
('Swift', 'Suzuki'),
('SX-4', 'Suzuki'),
('Vitara', 'Suzuki'),
('VAGON R PLUS', 'Suzuki'),
('Altezza', 'Toyota'),
('Auris', 'Toyota'),
('Avensis', 'Toyota'),
('Aygo', 'Toyota'),
('Camry', 'Toyota'),
('Carina', 'Toyota'),
('Celica', 'Toyota'),
('Corolla', 'Toyota'),
('Estima', 'Toyota'),
('Landcruiser', 'Toyota'),
('MR2', 'Toyota'),
('MRS', 'Toyota'),
('Picnic', 'Toyota'),
('Starlet', 'Toyota'),
('Verso', 'Toyota'),
('Yaris', 'Toyota'),
('Beetle', 'Volkswagen'),
('Bora', 'Volkswagen'),
('Caddy', 'Volkswagen'),
('Caravelle', 'Volkswagen'),
('CC', 'Volkswagen'),
('Corado', 'Volkswagen'),
('EOS', 'Volkswagen'),
('FOX', 'Volkswagen'),
('Golf', 'Volkswagen'),
('Jetta', 'Volkswagen'),
('Lupo', 'Volkswagen'),
('Passat', 'Volkswagen'),
('Polo', 'Volkswagen'),
('Scirocco', 'Volkswagen'),
('Sharan', 'Volkswagen'),
('Tiguan', 'Volkswagen'),
('Touareg', 'Volkswagen'),
('Touran', 'Volkswagen'),
('Transporter', 'Volkswagen');

-- --------------------------------------------------------

--
-- Table structure for table `ord`
--

CREATE TABLE IF NOT EXISTS `ord` (
  `OrderId` int(6) NOT NULL AUTO_INCREMENT,
  `CustomerID` char(6) NOT NULL,
  `RegNo` char(15) NOT NULL,
  `PickupDate` date DEFAULT NULL,
  `RetDate` date DEFAULT NULL,
  PRIMARY KEY (`OrderId`),
  KEY `fk_car` (`RegNo`),
  KEY `fk_cust` (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123488 ;

--
-- Dumping data for table `ord`
--

INSERT INTO `ord` (`OrderId`, `CustomerID`, `RegNo`, `PickupDate`, `RetDate`) VALUES
(123476, '667910', '12XT10233', '2014-03-26', '2014-03-29'),
(123481, '319342', '12KW303', '2014-04-02', '2014-04-03'),
(123482, '929687', '12GY1070', '2014-04-02', '2014-04-03'),
(123483, '944903', '11GT1050', '2014-04-04', '2014-04-07'),
(123485, '319342', '12WE102', '2014-04-04', '2014-04-09'),
(123486, '000002', '12KI50981', '2014-04-04', '2014-04-05'),
(123487, '583096', '12KI50981', '2014-04-04', '2014-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE IF NOT EXISTS `towns` (
  `town` varchar(20) NOT NULL DEFAULT '',
  `mycounty` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`town`,`mycounty`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`town`, `mycounty`) VALUES
('Adare', 'Limerick'),
('Antrim', 'Antrim'),
('Ardattin', 'Carlow'),
('Armagh', 'Armagh'),
('Athlone', 'Westmeath'),
('Athy', 'Kildare'),
('Avoca', 'Wicklow'),
('Ballacolla', 'Laois'),
('Ballina', 'Mayo'),
('Ballinamore', 'Leitrim'),
('Ballingarry', 'Limerick'),
('Ballon', 'Carlow'),
('Ballybunion', 'Kerry'),
('Ballycastle', 'Mayo'),
('Ballylickey', 'Cork'),
('Ballyliffin', 'Donegal'),
('Ballylongford', 'Kerry'),
('Ballymore eustace', 'Kildare'),
('Ballyshannon', 'Donegal'),
('Ballyvaughan', 'Clare'),
('Baltimore', 'Cork'),
('Banagher', 'Offaly'),
('Bangor', 'Down'),
('Belfast', 'Antrim'),
('Belleek', 'Fremanagh'),
('Bellingham Castle', 'Louth'),
('Bennettsbridge', 'Kilkenny'),
('Bettystown', 'Meath'),
('Birr', 'Offaly'),
('Blarney', 'Cork'),
('Bray', 'Wicklow'),
('Bruff', 'Limerick'),
('Bunclody', 'Wexford'),
('Buncrana', 'Donegal'),
('Bunmahon', 'Waterford'),
('Bunratty', 'Clare'),
('Buntratty', 'Clare'),
('Caherdaniel', 'Kerry'),
('Cahir', 'Tipperary'),
('Callan', 'Kilkenny'),
('Carlingford', 'Louth'),
('Carlow', 'Carlow'),
('Carna', 'Galway'),
('Carraroe', 'Galway'),
('Carrick-on-Shannon', 'Leitrim'),
('Carrickmacross', 'Monaghan'),
('Carrigallen', 'Leitrim'),
('Castlebar', 'Mayo'),
('Castleconnell', 'Limerick'),
('Castlecoote', 'Roscommon'),
('Castledermot', 'Kildare'),
('Castleknock', 'Dublin'),
('Castlelyons', 'Cork'),
('Castlemaine', 'Kerry'),
('Castlerea', 'Roscommon'),
('Castletroy', 'Limerick'),
('Clare', 'Clare'),
('Clarecastle', 'Clare'),
('Clifden', 'Galway'),
('Clonakilty', 'Cork'),
('Clonmel', 'Tipperary'),
('Clontarf', 'Dublin'),
('Cong', 'Mayo'),
('Cookstown', 'Tyrone'),
('Coolrain', 'Laois'),
('Coolshannagh', 'Monaghan'),
('Cork', 'Cork'),
('Derroe', 'Galway'),
('Derry', 'Derry'),
('Dingle', 'Kerry'),
('Donegal', 'Donegal'),
('Doolin', 'Clare'),
('Doon', 'Limerick'),
('Douglas', 'Cork'),
('Down', 'Down'),
('Droheda', 'Louth'),
('Drumshanbo', 'Leitrim'),
('Dublin', 'Dublin'),
('Dublin Airport Hotel', 'Dublin'),
('Dunadry', 'Antrim'),
('Dunboyne', 'Meath'),
('Dundalk', 'Louth'),
('Dungarvan', 'Waterford'),
('Dunkettle', 'Cork'),
('Dunmanway', 'Cork'),
('Durrow', 'Laois'),
('Ennis', 'Clare'),
('Enniscorty', 'Thomastown'),
('Enniscorty', 'Wexford'),
('Enniskillen', 'Fremanagh'),
('Fermoy', 'Cork'),
('Fremanagh', 'Fremanagh'),
('Freshford', 'Kilkenny'),
('Frosses', 'Donegal'),
('Galway', 'Galway'),
('Glaslough', 'Monaghan'),
('Glenties', 'Donegal'),
('Gorey', 'Wexford'),
('Graiguenamanagh', 'Kilkenny'),
('Holycross', 'Tipperary'),
('Inis Mor', 'Galway'),
('Inniskeen', 'Monaghan'),
('Irvinestown', 'Fremanagh'),
('Kells', 'Meath'),
('Kenmare', 'Kerry'),
('Kerry', 'Kerry'),
('Kildare', 'Kildare'),
('Kiliney', 'Dublin'),
('Kilkenny', 'Kilkenny'),
('Killaloe', 'Clare'),
('Killarney', 'Kerry'),
('Killybegs', 'Donegal'),
('Kilmessan', 'Meath'),
('Kiltale', 'Meath'),
('Kiniyara', 'Galway'),
('Kinnitty', 'Offaly'),
('Knock', 'Mayo'),
('Laois', 'Laois'),
('Larne', 'Antrim'),
('Leitrim', 'Leitrim'),
('Leitrim Village', 'Leitrim'),
('Leixlip', 'Kildare'),
('Limerick', 'Limerick'),
('Liscannor', 'Clare'),
('Lismore', 'Waterford'),
('Longford', 'Longford'),
('Lough Gur', 'Limerick'),
('Louisburg', 'Mayo'),
('Louth', 'Louth'),
('Lucan', 'Dublin'),
('Mallow', 'Cork'),
('Maynooth', 'Kildare'),
('Meath', 'Meath'),
('Milford', 'Donegal'),
('Mohill', 'Leitrim'),
('Monaghan', 'Monaghan'),
('Monasterevin', 'Kildare'),
('Mountshannon', 'Clare'),
('Mulingar', 'Westmeath'),
('Naas', 'Kildare'),
('Navan', 'Meath'),
('Nenagh', 'Tipperary'),
('New Ross', 'Wexford'),
('Newcastle West', 'Limerick'),
('Newry', 'Down'),
('Offaly', 'Offaly'),
('Omagh', 'Tyrone'),
('Oranmore', 'Galway'),
('Patrick''s Well', 'Limerick'),
('Portadown', 'Armagh'),
('Portlaoise', 'Laois'),
('Portstewrt', 'Antrim'),
('portumna', 'Galway'),
('Raheen', 'Limerick'),
('Rathdrum', 'Wicklow'),
('Remelton', 'Donegal'),
('Ring of Kerry', 'Kerry'),
('Roscommon', 'Roscommon'),
('Roscrea', 'Tipperary'),
('Rossiner', 'Longford'),
('Saggart', 'Dublin'),
('Salthill', 'Galway'),
('Shannon', 'Clare'),
('Sligo', 'Sligo'),
('Straffan', 'Kildare'),
('Tarbert', 'Kerry'),
('Taylors Hill', 'Galway'),
('The Burren', 'Clare'),
('Thomastown', 'Kilkenny'),
('Thurles', 'Tipperary'),
('Tipperary', 'Tipperary'),
('Tralee', 'Kerry'),
('Tramore', 'Waterford'),
('Trim', 'Meath'),
('Tuam', 'Galway'),
('Tulla', 'Clare'),
('Tullamore', 'Offaly'),
('Tullow', 'Carlow'),
('Tyrone', 'Tyrone'),
('Waterford', 'Waterford'),
('Waterville', 'Kerry'),
('Westport', 'Mayo'),
('Wexford', 'Wexford'),
('Wicklow', 'Wicklow'),
('Youghal', 'Cork');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` char(5) NOT NULL DEFAULT 'admin',
  `pass` char(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`) VALUES
('admin', '59618fc2c17f9b278b5344cd1f8faa7dbabd8a3f');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ord`
--
ALTER TABLE `ord`
  ADD CONSTRAINT `fk_car` FOREIGN KEY (`RegNo`) REFERENCES `car` (`RegNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cust` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
