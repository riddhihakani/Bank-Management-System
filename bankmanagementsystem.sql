-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2020 at 08:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `acc_no` varchar(11) NOT NULL,
  `acc_type` text NOT NULL,
  `cust_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_no`, `acc_type`, `cust_id`, `employee_id`, `balance`) VALUES
('a65788', 'current', 2, 2, 3030),
('a874674', 'current', 1, 2, 56732);

--
-- Triggers `accounts`
--
DELIMITER $$
CREATE TRIGGER `accounts_backup` BEFORE UPDATE ON `accounts` FOR EACH ROW INSERT INTO accounts_backup(acc_no,balance) VALUES (NEW.acc_no,NEW.balance)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_backup`
--

CREATE TABLE `accounts_backup` (
  `acc_no` varchar(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts_backup`
--

INSERT INTO `accounts_backup` (`acc_no`, `balance`) VALUES
('a65788', 3030),
('a874674', 49970),
('a874674', 49900),
('a874674', 49820),
('a874674', 49740),
('a874674', 56740),
('a874674', 56732);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `br_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fullname`, `email`, `password`, `gender`, `image`, `br_no`) VALUES
(4, 'Michael Scott', 'worldsbestboss123@gmail.com', '071bb63cdbb9f492c4fccef9aa0fe34e', 'Male', 'michaelscott.jpg', 1),
(7, 'Jeff Bezos', 'jeffb@gmail.com', '526187f9e2aad9170dc0c0303053a038', 'Male', 'jeff.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_id` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_id`, `Address`, `Manager_id`) VALUES
(1, 'Mahavir Nagar,Kandivali(west)', 3),
(2, 'Charkop,Kandivali(west)', 8),
(3, 'Borivali(West)', 12),
(4, 'Andheri(West)', 9);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `branch_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fname`, `mname`, `lname`, `dob`, `address`, `gender`, `age`, `email`, `password`, `image`, `branch_no`) VALUES
(1, 'Rachela', 'Karen', 'Green', '2000-05-16', 'Galaxy Apartments, 4 bungalows, Bandra(west), Mumbai.', 'Female', 20, 'rachgreen@gmail.com', '34950fbcf474543e30a107b977837e7b', 'rachel.jpg', 1),
(2, 'Monica', 'Jack', 'Geller', '1995-07-07', 'Colaba, Mumbai', 'Female', 25, 'mong12@gmail.com', 'c2637f4da91f900bb5b313792cc94440', 'monica.png', 1),
(3, 'Chandler', 'Muriel', 'Bing', '2020-11-06', 'Panchsheel heights, Kandivali(west)', 'Male', 0, 'chandler12@gmail.com', 'dccbc203eb521343b7ddcbdf4cb4a418', 'chandler.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_id` int(11) NOT NULL,
  `acc_no` varchar(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`deposit_id`, `acc_no`, `cust_id`, `amount`, `date`) VALUES
(1, 'a874674', 1, 7000, '2020-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `cust_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(15) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mname` text NOT NULL,
  `post` text NOT NULL,
  `dept` text NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `image` text NOT NULL,
  `salary` text NOT NULL,
  `branch_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `phone`, `email`, `password`, `fname`, `lname`, `mname`, `post`, `dept`, `address`, `gender`, `image`, `salary`, `branch_no`) VALUES
(1, '9875577891', 'pamb12@gmail.com', '2b0b59f1c4eabae73d9c473db7bf8e9b', 'Pamela', 'Beesly', 'louise', 'junior', 'Accounts', 'charkop, kandivali(west), mumbai', 'Female', 'pamela.jpg', '40000', 1),
(2, '7787766666', 'jimh123@gmail.com', '153b6e9c72011d61e034919b124f0005', 'Jim', 'Halpert', 'Duncans', 'junior', 'Accounts', 'block 3,scranton city, pennsylvania', 'Male', 'jimhalpert.jpg', '80000', 1),
(3, '2936353616', 'dwightk12@gmail.com', 'b473c4cf98633c49bd79819d9082660f', 'Dwight', 'Schrute', 'Kurt', 'Branch Manager', '', 'Royal Building, Malad(East), Mumbai', 'Male', 'dwight kurt schrute.jpg', '100000', 1),
(4, '66542887652', 'oscarm@yahoo.com', '88c5cfddcde6704d39cb215e13237314', 'Oscar', 'Martinez', 'Paul', 'senior', 'Accounts', 'Vasai, Thane', 'Male', 'oscar.jpg', '80000', 1),
(5, '7348238927', 'angel56@gmail.com', 'cf621171a6c9fd69d68b401d07a0e270', 'Angela', 'Martin', 'Dwight', 'junior', 'Accounts', 'orlem, Malad(west)', 'Female', 'Angela_Kinsey.jpg', '40000', 1),
(6, '7729837298', 'stanleykadabba@gmail.com', 'c7656ce3fbb462c82bad4e11fc7f4165', 'Stanley', 'Hudson', 'Morgan', 'senior', 'Insurance', 'mira road, thane', 'Male', 'stanley.png', '60000', 1),
(7, '29312902999999', 'kevin34@gmail.com', '9f40204c2bf0e78567cfc7b92566601f', 'Kevin', 'Malone', 'jonas', 'junior', 'Insurance', 'jogeshwari,Mumbai', 'Male', 'kevin.jpg', '40000', 1),
(8, '8237312345', 'kkapoor@gmail.com', 'a3a8fc5e79bc6cab3fc1d92781dbb734', 'Kelly', 'Kapoor', 'Mahesh', 'Branch Manager', '', 'Sainath, Kandivali(west), Mumbai', 'Female', 'kelly kapoor.png', '100000', 2),
(9, '7238178923', 'kfili12@gmail.com', 'cc59b7981df1bd565e97ef02e71e1350', 'Karen', 'Filipelli', 'Andy', 'Branch Manager', '', 'Four bungalows, Andheri(west), Mumbai', 'Female', 'karen filipelli.jpg', '100000', 4),
(10, '6782367823', 'ryan23@gmail.com', 'cdf7ddb51ae2c988111928c895de547f', 'Ryan', 'Howard', 'Michael', 'junior', 'Loan', 'Virar, Thane', 'Male', 'ryan.jpg', '40000', 1),
(11, '123456788', 'phyllis67@gmail.com', '79b7ca83d23f73ce4b481ce4722f3756', 'Phyllis', 'Smith', 'Watson', 'junior', 'Loan', 'Grant Road, Mumbai', 'Female', 'phyllis.jpg', '40000', 1),
(12, '7179877723', 'andyb@gmail.com', '604b46c537c3c2f2d20fa3ead51515e6', 'Andey', 'Bernard', 'Baines', 'Branch Manager', '', '64, Sky Heights, Bandra, Mumbai', 'Male', 'andy bernard.jpg', '100000', 3),
(13, '7283287617', 'toby98@gmail.com', '0faa423afee991c57c99b6115e2c5700', 'Toby', 'Flenderson', 'Jesse', 'senior', 'Loan', 'Bhayandar, Mumbai', 'Male', 'toby.jpg', '80000', 1),
(15, '9374634526', 'creedy12@gmail.com', '3ccfcdacd0b3e2c9799622674d55a84e', 'Creed', 'Bratton', 'Walt', 'junior', 'Loan', 'Vile Parle(west), Mumbai', 'Male', 'creed.jpg', '40000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insurance_id` int(11) NOT NULL,
  `insurance_type` tinytext DEFAULT NULL,
  `branch_no` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insurance_id`, `insurance_type`, `branch_no`, `cust_id`) VALUES
(76, 'health', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Loan_type` tinytext DEFAULT NULL,
  `duration` int(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `interest` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `cust_id`, `Amount`, `Loan_type`, `duration`, `start_date`, `interest`) VALUES
(23293, 2, 5000, 'Small Business Loan', 3, '2020-11-03', 7),
(786345, 1, 60000, 'personal loan', 5, '2020-11-02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `cust_id` int(11) NOT NULL,
  `phone_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `sender_acc` varchar(11) NOT NULL,
  `receiver_acc` varchar(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date_trans` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `cust_id`, `sender_acc`, `receiver_acc`, `amount`, `date_trans`) VALUES
(11, 1, 'a874674', 'a65788', 30, '2020-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `withdrawal_id` int(11) NOT NULL,
  `acc_no` varchar(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`withdrawal_id`, `acc_no`, `cust_id`, `amount`, `date`) VALUES
(1, 'a874674', 1, 80, '2020-11-08'),
(2, 'a874674', 1, 8, '2020-11-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acc_no`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `br_no` (`br_no`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_id`),
  ADD UNIQUE KEY `Manager_id` (`Manager_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`cust_id`,`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insurance_id`),
  ADD KEY `branch_no` (`branch_no`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`,`cust_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`cust_id`,`phone_no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`withdrawal_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`br_no`) REFERENCES `branch` (`Branch_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`Branch_id`);

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`Branch_id`);

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `insurance_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `insurance_ibfk_2` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`Branch_id`),
  ADD CONSTRAINT `insurance_ibfk_3` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `insurance_ibfk_4` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_ibfk_3` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `phone_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `withdraw_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
