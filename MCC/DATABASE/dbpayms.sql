-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 07:03 AM
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
-- Database: `dbpayms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entry`
--

CREATE TABLE `tbl_entry` (
  `EntryID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `customerID` int(100) NOT NULL,
  `paintID` int(100) NOT NULL,
  `date` date NOT NULL,
  `batchNumber` int(100) NOT NULL,
  `newbatchNo` int(100) NOT NULL,
  `newSupplier` varchar(100) NOT NULL,
  `pi` int(100) NOT NULL,
  `diameter` int(100) NOT NULL,
  `height` int(100) NOT NULL,
  `conversionFactor` int(100) NOT NULL,
  `volume` int(100) NOT NULL,
  `paintRatio` int(100) NOT NULL,
  `acetateRatio` int(100) NOT NULL,
  `paintLiter` int(100) NOT NULL,
  `acetateLiter` int(100) NOT NULL,
  `newpaintL` int(100) NOT NULL,
  `newacetateL` int(100) NOT NULL,
  `endingPaintL` int(100) NOT NULL,
  `endingAcetateL` int(100) NOT NULL,
  `sprayViscosity` int(100) NOT NULL,
  `totalPaintL` int(100) NOT NULL,
  `totalAcetateL` int(100) NOT NULL,
  `quantityDrum` int(100) NOT NULL,
  `paintYield` int(100) NOT NULL,
  `acetateYield` int(100) NOT NULL,
  `fluidPressure` int(100) NOT NULL,
  `nozzle1` int(100) NOT NULL,
  `nozzle2` int(100) NOT NULL,
  `nozzle3` int(100) NOT NULL,
  `nozzle4` int(100) NOT NULL,
  `nozzle6` int(100) NOT NULL,
  `nozzle9` int(100) NOT NULL,
  `nozzle10` int(100) NOT NULL,
  `remarks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paint`
--

CREATE TABLE `tbl_paint` (
  `paintID` int(100) NOT NULL,
  `supplierID` int(100) NOT NULL,
  `DetailsID` int(100) NOT NULL,
  `paint_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_received`
--

CREATE TABLE `tbl_received` (
  `receiveID` int(100) NOT NULL,
  `receiver_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receivedetails`
--

CREATE TABLE `tbl_receivedetails` (
  `DetailsID` int(100) NOT NULL,
  `receiveID` int(100) NOT NULL,
  `details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplierID` int(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userID` int(100) NOT NULL,
  `Level` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Profile_image` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `Level`, `Name`, `Username`, `Contact`, `Address`, `Profile_image`, `Email`, `Password`) VALUES
(1, 'Admin', 'Rey June', 'Rey', '09066672527', 'Dayawan, Villanueva, Misamis oriental', 'download.jpg', 'ucabreyjune2001@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `CustomeruserID_fk` (`userID`);

--
-- Indexes for table `tbl_entry`
--
ALTER TABLE `tbl_entry`
  ADD PRIMARY KEY (`EntryID`),
  ADD KEY `customerID_fk` (`customerID`),
  ADD KEY `paintID_fk` (`paintID`),
  ADD KEY `userID_fk` (`userID`);

--
-- Indexes for table `tbl_paint`
--
ALTER TABLE `tbl_paint`
  ADD PRIMARY KEY (`paintID`),
  ADD KEY `supplierID_fk` (`supplierID`),
  ADD KEY `DetailsID_fk` (`DetailsID`);

--
-- Indexes for table `tbl_received`
--
ALTER TABLE `tbl_received`
  ADD PRIMARY KEY (`receiveID`);

--
-- Indexes for table `tbl_receivedetails`
--
ALTER TABLE `tbl_receivedetails`
  ADD PRIMARY KEY (`DetailsID`),
  ADD KEY `receiveID_fk` (`receiveID`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_entry`
--
ALTER TABLE `tbl_entry`
  MODIFY `EntryID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_paint`
--
ALTER TABLE `tbl_paint`
  MODIFY `paintID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_received`
--
ALTER TABLE `tbl_received`
  MODIFY `receiveID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_receivedetails`
--
ALTER TABLE `tbl_receivedetails`
  MODIFY `DetailsID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplierID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `CustomeruserID_fk` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_entry`
--
ALTER TABLE `tbl_entry`
  ADD CONSTRAINT `customerID_fk` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`customerID`),
  ADD CONSTRAINT `paintID_fk` FOREIGN KEY (`paintID`) REFERENCES `tbl_paint` (`paintID`),
  ADD CONSTRAINT `userID_fk` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_paint`
--
ALTER TABLE `tbl_paint`
  ADD CONSTRAINT `DetailsID_fk` FOREIGN KEY (`DetailsID`) REFERENCES `tbl_receivedetails` (`DetailsID`),
  ADD CONSTRAINT `supplierID_fk` FOREIGN KEY (`supplierID`) REFERENCES `tbl_supplier` (`supplierID`);

--
-- Constraints for table `tbl_receivedetails`
--
ALTER TABLE `tbl_receivedetails`
  ADD CONSTRAINT `receiveID_fk` FOREIGN KEY (`receiveID`) REFERENCES `tbl_received` (`receiveID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
