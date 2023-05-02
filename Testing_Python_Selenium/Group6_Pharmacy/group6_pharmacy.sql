-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 05:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group6_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `idDoctors` int(11) NOT NULL,
  `Doctors_Name` char(45) NOT NULL,
  `Doctors_Specialization` varchar(45) NOT NULL,
  `Doctors_Experience` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`idDoctors`, `Doctors_Name`, `Doctors_Specialization`, `Doctors_Experience`) VALUES
(2574954, 'Eric Cowen', 'Child Specialist', '5'),
(7896123, 'Azad Baig', 'MBBS', '5'),
(8745123, 'Shaekir Khyzm', 'Neuro Specialist', '15'),
(8769456, 'Dhwani Dhulla', 'MD', '8'),
(9514756, 'John Prince', 'MBBS', '4'),
(9874159, 'Nicolas Blier', 'MD', '20');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_has_patients`
--

CREATE TABLE `doctors_has_patients` (
  `Doctors_idDoctors` int(11) NOT NULL,
  `Patients_idPatients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `idLab` int(11) NOT NULL,
  `Lab_Name` char(45) NOT NULL,
  `Lab_TestName` varchar(45) NOT NULL,
  `Lab_TestPrice` decimal(10,0) NOT NULL,
  `Lab_TestResult` varchar(45) NOT NULL,
  `Lab_TestDate` date NOT NULL,
  `Lab_ReferredDoctor` char(45) NOT NULL,
  `Doctors_idDoctors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lab_has_patients`
--

CREATE TABLE `lab_has_patients` (
  `Lab_idLab` int(11) NOT NULL,
  `Patients_idPatients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `idPatients` int(11) NOT NULL,
  `Patient_Name` char(45) NOT NULL,
  `Patients_DOB` date NOT NULL,
  `Patients_ContactNumber` decimal(10,0) DEFAULT NULL,
  `Patients_Address` varchar(100) NOT NULL,
  `Patients_Prescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`idPatients`, `Patient_Name`, `Patients_DOB`, `Patients_ContactNumber`, `Patients_Address`, `Patients_Prescription`) VALUES
(7126535, 'Karankumar Brahmbhatt', '1993-07-17', '9789451236', 'Grisham Apartments', 'Take vaccines for covid'),
(8652167, 'Dhwani Dedhia', '1999-05-17', '6738983627', 'Brampton', 'Medications for split personality disorder'),
(8753670, 'Shrey Naik', '1999-05-30', '9855221145', 'Victoria Street, Kitchener', 'Medicine for anxiety'),
(8783676, 'Dwayne Gonsalves', '1997-12-01', '9833559374', 'Kitchener', 'Take vitamin pills');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `idPharmacy` int(11) NOT NULL,
  `Pharmacy_Name` char(45) NOT NULL,
  `Pharmacy_Medicine` varchar(45) NOT NULL,
  `Pharmacy_MedicineQuantity` decimal(10,0) NOT NULL,
  `Pharmacy_MedicinePrice` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`idPharmacy`, `Pharmacy_Name`, `Pharmacy_Medicine`, `Pharmacy_MedicineQuantity`, `Pharmacy_MedicinePrice`) VALUES
(1, 'Zehers Bridgeport', 'MultiHair Vitamins', '3', '30'),
(2, 'Zehers Fairway', 'Multi Vitamins', '2', '20'),
(3, 'Walmart Fairway', 'Biotin Tablets', '1', '25'),
(4, 'Walmart Boardwalk', 'Moderna', '1', '25'),
(5, 'Shoppers Drug Mart Fairview', 'Paracetamol', '20', '15'),
(6, 'Walmart Brideport', 'Fluoxetine', '2', '50'),
(7, 'Walmart Sunrise', 'Vitamin A', '3', '80');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_has_patients`
--

CREATE TABLE `pharmacy_has_patients` (
  `Pharmacy_idPharmacy` int(11) NOT NULL,
  `Patients_idPatients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`idDoctors`);

--
-- Indexes for table `doctors_has_patients`
--
ALTER TABLE `doctors_has_patients`
  ADD PRIMARY KEY (`Doctors_idDoctors`,`Patients_idPatients`),
  ADD KEY `Patients_idPatients` (`Patients_idPatients`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`idLab`),
  ADD KEY `Doctors_idDoctors` (`Doctors_idDoctors`);

--
-- Indexes for table `lab_has_patients`
--
ALTER TABLE `lab_has_patients`
  ADD PRIMARY KEY (`Lab_idLab`,`Patients_idPatients`),
  ADD KEY `Patients_idPatients` (`Patients_idPatients`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`idPatients`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`idPharmacy`);

--
-- Indexes for table `pharmacy_has_patients`
--
ALTER TABLE `pharmacy_has_patients`
  ADD PRIMARY KEY (`Pharmacy_idPharmacy`,`Patients_idPatients`),
  ADD KEY `Patients_idPatients` (`Patients_idPatients`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors_has_patients`
--
ALTER TABLE `doctors_has_patients`
  ADD CONSTRAINT `doctors_has_patients_ibfk_1` FOREIGN KEY (`Doctors_idDoctors`) REFERENCES `doctors` (`idDoctors`),
  ADD CONSTRAINT `doctors_has_patients_ibfk_2` FOREIGN KEY (`Patients_idPatients`) REFERENCES `patients` (`idPatients`);

--
-- Constraints for table `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`Doctors_idDoctors`) REFERENCES `doctors` (`idDoctors`);

--
-- Constraints for table `lab_has_patients`
--
ALTER TABLE `lab_has_patients`
  ADD CONSTRAINT `lab_hACas_patients_ibfk_2` FOREIGN KEY (`Patients_idPatients`) REFERENCES `patients` (`idPatients`),
  ADD CONSTRAINT `lab_has_patients_ibfk_1` FOREIGN KEY (`Lab_idLab`) REFERENCES `lab` (`idLab`);

--
-- Constraints for table `pharmacy_has_patients`
--
ALTER TABLE `pharmacy_has_patients`
  ADD CONSTRAINT `pharmacy_has_patients_ibfk_1` FOREIGN KEY (`Pharmacy_idPharmacy`) REFERENCES `pharmacy` (`idPharmacy`),
  ADD CONSTRAINT `pharmacy_has_patients_ibfk_2` FOREIGN KEY (`Patients_idPatients`) REFERENCES `patients` (`idPatients`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
