-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2023 at 05:11 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phase2`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

DROP TABLE IF EXISTS `airlines`;
CREATE TABLE IF NOT EXISTS `airlines` (
  `AirlineCode` varchar(2) NOT NULL,
  `Airline_Name` varchar(50) DEFAULT NULL,
  `Seats` int(11) DEFAULT NULL,
  PRIMARY KEY (`AirlineCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`AirlineCode`, `Airline_Name`, `Seats`) VALUES
('AC', 'Air Canada', 300),
('AI', 'Air India', 270),
('B6', 'Jet Blue Airways', 200),
('EK', 'Emirates', 350),
('EY', 'Etihad Airways', 350),
('FZ', 'Fly Dubai', 200),
('QR', 'Qatar Airways', 250);

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

DROP TABLE IF EXISTS `airport`;
CREATE TABLE IF NOT EXISTS `airport` (
  `Airport_Code` varchar(3) NOT NULL,
  `Airport_Name` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Airport_Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`Airport_Code`, `Airport_Name`, `City`) VALUES
('JFK', 'JOHN F. KENNEDY INTERNATIONAL AIRPORT', 'New York'),
('LAX', 'LOS ANGELES INTERNATIONAL AIRPORT', 'Los Angeles'),
('DXB', 'DUBAI INTERNATIONAL AIRPORT', 'Dubai'),
('DOH', 'HAMAD INTERNATIONAL AIRPORT', 'Doha'),
('YYZ', 'TORONTO PEARSON INTERNATIONAL AIRPORT', 'Toronto'),
('FCO', 'VENICE INTERNATIONAL AIRPORT', 'Venice'),
('DRO', 'DENMARK INTERNATIONAL AIRPORT', 'Denmark');

-- --------------------------------------------------------

--
-- Table structure for table `baggage`
--

DROP TABLE IF EXISTS `baggage`;
CREATE TABLE IF NOT EXISTS `baggage` (
  `BaggageID` int(11) NOT NULL AUTO_INCREMENT,
  `PassengerID` int(11) DEFAULT NULL,
  `FlightID` int(11) DEFAULT NULL,
  `ExtraBaggage` int(1) DEFAULT NULL,
  `ExtraBaggageCost` double DEFAULT NULL,
  PRIMARY KEY (`BaggageID`)
) ENGINE=MyISAM AUTO_INCREMENT=809 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baggage`
--

INSERT INTO `baggage` (`BaggageID`, `PassengerID`, `FlightID`, `ExtraBaggage`, `ExtraBaggageCost`) VALUES
(222, 1, 100, 1, 25),
(333, 2, 101, 0, 0),
(444, 3, 102, 1, 50),
(555, 4, 103, 1, 25),
(666, 5, 104, 0, 0),
(777, 6, 105, 0, 0),
(808, NULL, 10, 1, 25),
(807, NULL, 18, 1, 25);

-- --------------------------------------------------------

--
-- Stand-in structure for view `baggageinfo`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `baggageinfo`;
CREATE TABLE IF NOT EXISTS `baggageinfo` (
);

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `CargoID` int(11) NOT NULL AUTO_INCREMENT,
  `PassengerID` int(11) DEFAULT NULL,
  `FlightID` int(11) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `Price` double DEFAULT NULL,
  PRIMARY KEY (`CargoID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`CargoID`, `PassengerID`, `FlightID`, `Weight`, `Price`) VALUES
(7, 1, 100, 16, 48),
(8, 2, 101, 13, 39),
(9, 3, 102, 12, 36),
(10, 4, 103, 11, 33),
(11, 5, 104, 20, 60),
(12, 6, 105, 14, 42);

-- --------------------------------------------------------

--
-- Table structure for table `customerfeedback`
--

DROP TABLE IF EXISTS `customerfeedback`;
CREATE TABLE IF NOT EXISTS `customerfeedback` (
  `FeedbackID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `FlightID` int(11) DEFAULT NULL,
  `Rating` double DEFAULT NULL,
  `Comments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`FeedbackID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerfeedback`
--

INSERT INTO `customerfeedback` (`FeedbackID`, `UserID`, `FlightID`, `Rating`, `Comments`) VALUES
(1, 10, 100, 5, 'I am extremely satisfied with the service of this travel company and the airline I traveled with.'),
(2, 11, 101, 3, 'ok    '),
(3, 12, 102, 4, 'I am very satisfied with the services offered by this company. Will definitely fly with them again!'),
(4, 13, 103, 5, 'The flight was managed extremely well and the customer service was phenomenal.'),
(5, 14, 104, 4, NULL),
(6, 15, 105, 3, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `d_airport`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `d_airport`;
CREATE TABLE IF NOT EXISTS `d_airport` (
`City` varchar(50)
,`COUNT(*)` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `feedbackwithkeyword`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `feedbackwithkeyword`;
CREATE TABLE IF NOT EXISTS `feedbackwithkeyword` (
`FeedbackID` int(11)
,`UserID` int(11)
,`FlightID` int(11)
,`Rating` double
,`Comments` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fifth`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `fifth`;
CREATE TABLE IF NOT EXISTS `fifth` (
`LastName` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `FlightID` int(11) NOT NULL,
  `Departure_date` datetime DEFAULT NULL,
  `Arrival_date` datetime DEFAULT NULL,
  `Departure_Airport` varchar(50) DEFAULT NULL,
  `Arrival_Airport` varchar(50) DEFAULT NULL,
  `Seats` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `AirlineCode` varchar(2) NOT NULL,
  PRIMARY KEY (`FlightID`),
  KEY `AirlineCode` (`AirlineCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`FlightID`, `Departure_date`, `Arrival_date`, `Departure_Airport`, `Arrival_Airport`, `Seats`, `Price`, `AirlineCode`) VALUES
(18, '2023-12-12 09:00:00', '2023-12-19 01:55:00', NULL, NULL, NULL, '538.00', 'FZ'),
(100, '2023-11-22 07:00:00', '2023-11-23 11:00:00', 'JFK', 'LAX', 50, '500.00', 'B6'),
(101, '2023-11-23 07:00:00', '2023-11-24 04:00:00', 'JFK', 'DXB', 180, '1920.00', 'AC'),
(102, '2023-11-26 07:00:00', '2022-11-26 09:00:00', 'DOH', 'DXB', 40, '380.00', 'EK'),
(103, '2022-11-26 15:00:00', '2022-11-27 06:00:00', 'YYZ', 'DOH', 160, '1800.00', 'QR'),
(104, '2022-11-27 08:00:00', '2022-11-28 20:00:00', 'FCO', 'YYZ', 200, '1800.00', 'AC'),
(105, '2022-11-30 22:00:00', '2022-12-01 06:00:00', 'DRO', 'FCO', 80, '1000.00', 'EY');

-- --------------------------------------------------------

--
-- Stand-in structure for view `flightswithaboveaveragepassengers`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `flightswithaboveaveragepassengers`;
CREATE TABLE IF NOT EXISTS `flightswithaboveaveragepassengers` (
`FlightID` int(11)
,`Departure_Date` datetime
,`Arrival_Date` datetime
,`PassengerCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `flightswithhighfare`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `flightswithhighfare`;
CREATE TABLE IF NOT EXISTS `flightswithhighfare` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fourthview`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `fourthview`;
CREATE TABLE IF NOT EXISTS `fourthview` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `maxduration`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `maxduration`;
CREATE TABLE IF NOT EXISTS `maxduration` (
);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
CREATE TABLE IF NOT EXISTS `passenger` (
  `PassengerID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `FlightID` int(11) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone_Num` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PassengerID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`PassengerID`, `UserID`, `FlightID`, `FirstName`, `LastName`, `DOB`, `Email`, `Phone_Num`) VALUES
(1, 10, 102, 'John', 'Doe', '1990-11-05', 'johndoe@gmail.com', '905-923-2915'),
(2, 12, 101, 'Mike', 'Jones', '1999-04-16', 'MikeJ@gmail.com', '289-923-2960'),
(3, 11, 100, 'Sarah', 'Smith', '2003-02-23', 'S.Smith@gmail.com', '647-289-4590'),
(4, 15, 105, 'Lisa', 'Jackson', '2002-03-04', 'JacksonLisa@gmail.com', '647-900-0099'),
(5, 14, 103, 'Chris', 'Brown', '2005-01-16', 'Chris@gmail.com', '111-909-9999'),
(6, 13, 104, 'Emily', 'Wilson', '1992-07-25', 'EM.WILL@gmail.com', '905-998-8888');

-- --------------------------------------------------------

--
-- Stand-in structure for view `passengerswithextrabaggagecount`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `passengerswithextrabaggagecount`;
CREATE TABLE IF NOT EXISTS `passengerswithextrabaggagecount` (
`PassengerID` int(11)
,`FirstName` varchar(50)
,`LastName` varchar(50)
,`ExtraBaggageCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `passengerticketpayments`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `passengerticketpayments`;
CREATE TABLE IF NOT EXISTS `passengerticketpayments` (
`PassengerID` int(11)
,`FirstName` varchar(50)
,`LastName` varchar(50)
,`total_payment` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `CardNumber` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `CVV` int(3) NOT NULL,
  PRIMARY KEY (`CardNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`CardNumber`, `UserID`, `Amount`, `CVV`) VALUES
(19952003, 10, '500.00', 352),
(19942004, 11, '380.00', 366),
(19962002, 12, '1920.00', 438),
(19972006, 13, '1800.00', 132),
(19982007, 14, '1875.00', 321),
(19992008, 15, '1025.00', 568);

-- --------------------------------------------------------

--
-- Stand-in structure for view `thirdview`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `thirdview`;
CREATE TABLE IF NOT EXISTS `thirdview` (
`FirstName` varchar(50)
,`LastName` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `TicketID` int(11) NOT NULL AUTO_INCREMENT,
  `AirlineCode` varchar(2) DEFAULT NULL,
  `FlightID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PassengerID` int(11) DEFAULT NULL,
  `SeatNo` varchar(3) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `Class` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TicketID`),
  KEY `AirlineCode` (`AirlineCode`),
  KEY `FlightID` (`FlightID`),
  KEY `PassengerID` (`PassengerID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=930 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketID`, `AirlineCode`, `FlightID`, `UserID`, `PassengerID`, `SeatNo`, `Cost`, `Class`) VALUES
(123, 'B6', 100, 10, 1, '23', '500.00', 'Business'),
(124, 'EK', 103, 13, 4, '31', '1800.00', 'Business'),
(456, 'AC', 101, 11, 2, '15', '1920.00', 'First'),
(457, 'QR', 104, 14, 5, '40', '1800.00', 'First'),
(689, 'EY', 105, 15, 6, '22', '1450.00', 'Economy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`) VALUES
(10, 'johndoe123', 'passwOrd123', 'johndoe@gmail.com'),
(11, 'sarahsmith', 'securePW456', 'S.Smith@gmail.com'),
(12, 'mikejones', '7secrets7', 'MikeJ@gmail.com'),
(13, 'emilywilson', 'strongP55', 'EM.WILL@gmail.com'),
(14, 'chrisbrown', 'pa$$wod', 'Chris@gmail.com'),
(15, 'lisajackson', 'secret123', 'JacksonLisa@gmail.com');

-- --------------------------------------------------------

--
-- Structure for view `baggageinfo`
--
DROP TABLE IF EXISTS `baggageinfo`;

DROP VIEW IF EXISTS `baggageinfo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `baggageinfo`  AS SELECT `b`.`BaggageID` AS `ID`, `b`.`Weight` AS `Weight` FROM (`baggage` `b` join `passenger` `p` on((`b`.`PassengerID` = `p`.`PassengerID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `d_airport`
--
DROP TABLE IF EXISTS `d_airport`;

DROP VIEW IF EXISTS `d_airport`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `d_airport`  AS SELECT `a`.`City` AS `City`, count(0) AS `COUNT(*)` FROM (`flights` `f` join `airport` `a` on((`f`.`Arrival_Airport` = `a`.`Airport_Code`))) WHERE (`a`.`City` like 'D%') GROUP BY `a`.`City` ;

-- --------------------------------------------------------

--
-- Structure for view `feedbackwithkeyword`
--
DROP TABLE IF EXISTS `feedbackwithkeyword`;

DROP VIEW IF EXISTS `feedbackwithkeyword`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `feedbackwithkeyword`  AS SELECT `customerfeedback`.`FeedbackID` AS `FeedbackID`, `customerfeedback`.`UserID` AS `UserID`, `customerfeedback`.`FlightID` AS `FlightID`, `customerfeedback`.`Rating` AS `Rating`, `customerfeedback`.`Comments` AS `Comments` FROM `customerfeedback` WHERE (`customerfeedback`.`Comments` like '%satisfied%') ;

-- --------------------------------------------------------

--
-- Structure for view `fifth`
--
DROP TABLE IF EXISTS `fifth`;

DROP VIEW IF EXISTS `fifth`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fifth`  AS SELECT `passenger`.`LastName` AS `LastName` FROM `passenger` ;

-- --------------------------------------------------------

--
-- Structure for view `flightswithaboveaveragepassengers`
--
DROP TABLE IF EXISTS `flightswithaboveaveragepassengers`;

DROP VIEW IF EXISTS `flightswithaboveaveragepassengers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flightswithaboveaveragepassengers`  AS SELECT `f`.`FlightID` AS `FlightID`, `f`.`Departure_date` AS `Departure_Date`, `f`.`Arrival_date` AS `Arrival_Date`, count(`p`.`PassengerID`) AS `PassengerCount` FROM ((`flights` `f` join `ticket` `t` on((`f`.`FlightID` = `t`.`FlightID`))) join `passenger` `p` on((`t`.`PassengerID` = `p`.`PassengerID`))) GROUP BY `f`.`FlightID`, `f`.`Departure_date`, `f`.`Arrival_date` HAVING count(`p`.`PassengerID`) > all (select avg(`subquery`.`PassengerCount`) from (select `f2`.`FlightID` AS `FlightID`,count(`p2`.`PassengerID`) AS `PassengerCount` from ((`flights` `f2` join `ticket` `t2` on((`f2`.`FlightID` = `t2`.`FlightID`))) join `passenger` `p2` on((`t2`.`PassengerID` = `p2`.`PassengerID`))) group by `f2`.`FlightID`) `subquery`) ;

-- --------------------------------------------------------

--
-- Structure for view `flightswithhighfare`
--
DROP TABLE IF EXISTS `flightswithhighfare`;

DROP VIEW IF EXISTS `flightswithhighfare`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flightswithhighfare`  AS SELECT `f`.`FlightID` AS `FlightID`, `f`.`Departure_date` AS `Departure_Date`, `f`.`Arrival_date` AS `Arrival_Date`, `f`.`Price` AS `Price` FROM `flights` AS `f` WHERE `f`.`Price` > any (select avg(`f2`.`Price`) from `flights` `f2` where (`f2`.`AirlineID` = `f`.`AirlineID`) group by `f2`.`AirlineID`) ;

-- --------------------------------------------------------

--
-- Structure for view `fourthview`
--
DROP TABLE IF EXISTS `fourthview`;

DROP VIEW IF EXISTS `fourthview`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fourthview`  AS SELECT `a`.`Airline_Name` AS `Airline_Name`, `f`.`FlightID` AS `FlightID`, `f`.`Departure_date` AS `Departure_Date`, `f`.`Departure_Airport` AS `Departure_Airport`, `f`.`Arrival_Airport` AS `Arrival_Airport`, `f`.`Duration` AS `Duration` FROM (`airlines` `a` left join `flights` `f` on((`a`.`AirlineID` = `f`.`AirlineID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `maxduration`
--
DROP TABLE IF EXISTS `maxduration`;

DROP VIEW IF EXISTS `maxduration`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `maxduration`  AS SELECT `flights`.`FlightID` AS `flightID`, `flights`.`Duration` AS `Duration` FROM `flights` WHERE (`flights`.`FlightID` = (select `flights`.`FlightID` from `flights` where (`flights`.`Duration` = (select max(`flights`.`Duration`) from `flights`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `passengerswithextrabaggagecount`
--
DROP TABLE IF EXISTS `passengerswithextrabaggagecount`;

DROP VIEW IF EXISTS `passengerswithextrabaggagecount`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `passengerswithextrabaggagecount`  AS SELECT `p`.`PassengerID` AS `PassengerID`, `p`.`FirstName` AS `FirstName`, `p`.`LastName` AS `LastName`, count(`b`.`BaggageID`) AS `ExtraBaggageCount` FROM (`passenger` `p` left join `baggage` `b` on((`p`.`PassengerID` = `b`.`PassengerID`))) WHERE (`b`.`ExtraBaggage` = 1) GROUP BY `p`.`PassengerID`, `p`.`FirstName`, `p`.`LastName` ;

-- --------------------------------------------------------

--
-- Structure for view `passengerticketpayments`
--
DROP TABLE IF EXISTS `passengerticketpayments`;

DROP VIEW IF EXISTS `passengerticketpayments`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `passengerticketpayments`  AS SELECT `p`.`PassengerID` AS `PassengerID`, `p`.`FirstName` AS `FirstName`, `p`.`LastName` AS `LastName`, sum(`py`.`Amount`) AS `total_payment` FROM (`payment` `py` left join (`passenger` `p` left join `ticket` `t` on((`p`.`FlightID` = `t`.`FlightID`))) on((`p`.`UserID` = `py`.`UserID`))) GROUP BY `p`.`PassengerID`, `p`.`LastName` ;

-- --------------------------------------------------------

--
-- Structure for view `thirdview`
--
DROP TABLE IF EXISTS `thirdview`;

DROP VIEW IF EXISTS `thirdview`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `thirdview`  AS SELECT `p`.`FirstName` AS `FirstName`, `p`.`LastName` AS `LastName` FROM (`passenger` `p` join `ticket` `t` on((`p`.`PassengerID` = `t`.`PassengerID`))) WHERE (`t`.`Cost` > (select avg(`tt`.`Cost`) from `ticket` `tt`)) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`AirlineCode`) REFERENCES `airlines` (`AirlineCode`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`AirlineCode`) REFERENCES `airlines` (`AirlineCode`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`FlightID`) REFERENCES `flights` (`FlightID`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`PassengerID`),
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
