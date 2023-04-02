-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2023 at 07:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `allborrows`
--

CREATE TABLE `allborrows` (
  `id` int(11) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `borrow` varchar(100) NOT NULL,
  `return_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allborrows`
--

INSERT INTO `allborrows` (`id`, `reg`, `isbn`, `borrow`, `return_date`) VALUES
(1, '234', '22222222222', '2023/03/31', '2023/04/14'),
(2, '234', '333333333333', '2023/03/31', '2023/04/14');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(150) NOT NULL,
  `Title` varchar(150) NOT NULL,
  `Author` varchar(150) NOT NULL,
  `Category` varchar(150) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `Author`, `Category`, `Description`, `Price`, `Quantity`, `image`) VALUES
('111111111111', 'Harry Potter and the Chamber of Secrets', 'J.K Rowling', 'Fiction', 'Harry Potter and the Chamber of Secrets is a fantasy novel written by British author J. K. Rowling and the second novel in the Harry Potter series.', 1500, 18, 'cos.jpg'),
('22222222222', 'Harry Potter and the Goblet of Fire', 'J.K Rowling', 'Fiction', 'Harry Potter and the Goblet of Fire is a fantasy novel written by British author J. K. Rowling and the fourth novel in the Harry Potter series.', 1500, 21, 'gob.jpg'),
('333333333333', 'Harry Potter and the Deathly Hallows', 'J.K Rowling', 'Fiction', 'Harry Potter and the Deathly Hallows is a fantasy novel written by British author J. K. Rowling and the seventh novel in the Harry Potter series.', 1500, 19, 'image2.jpg'),
('44444444444', 'Harry Potter and the Order of the Phoenix', 'J.K Rowling', 'Fiction', 'Harry Potter and the Order of the Phoenix is a fantasy novel written by British author J. K. Rowling and the fifth novel in the Harry Potter series.', 1500, 19, 'image3.jpg'),
('55555555555', 'Harry Potter and the Sorcerer\'s Stone', 'J.K Rowling', 'Fiction', 'Harry Potter and the Sorcerer\'s Stone is a fantasy novel written by British author J. K. Rowling and the First novel in the Harry Potter series.', 1500, 20, 'images.jpg'),
('666666666666', 'Harry Potter and the Prisoner of Azkben', 'J.K Rowling', 'Fiction', 'Harry Potter and the Prisoner of Azkben is a fantasy novel written by British author J. K. Rowling and the first novel in the Harry Potter series.', 1500, 20, 'poa.jpg'),
('77777777777', 'Harry Potter and the Half-blood Prince', 'J.K Rowling', 'Fiction', 'Harry Potter and the  Half-blood Prince is a fantasy novel written by British author J. K. Rowling and the sixth novel in the Harry Potter series.', 1500, 20, 'image4.jpg'),
('88888888888', 'Crime And Punishment', 'Fyodor Dostoyevsky', '	Literary fiction', 'In a timeless story of justice, morality, and redemption, an impoverished Russian student murders a miserly landlady, a crime that has severe repercussions on his life and his family as he battles his conscience.', 700, 24, 'cap.jpg'),
('9999999999', 'God and His Demons', 'Michael Parenti', 'Religion', 'A noted author and activist brings his critical acumen and rhetorical skills to bear in this polemic against the dark side of religion.', 1000, 15, 'god.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `borrow` date NOT NULL,
  `return_date` date NOT NULL,
  `returned` text NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `reg`, `isbn`, `borrow`, `return_date`, `returned`) VALUES
(9, '2324', '22222222222', '2023-03-21', '2023-04-04', 'F'),
(10, '2324', '22222222222', '2023-03-31', '2023-04-14', 'F'),
(11, '2324', '333333333333', '2023-03-31', '2023-04-14', 'F'),
(12, '123', '111111111111', '2023-03-15', '2023-03-29', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE `lost` (
  `id` int(11) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`id`, `reg`, `isbn`, `price`) VALUES
(1, '1234', '111111111111', 1500),
(2, '1234', '44444444444', 1500),
(3, '1234', '111111111111', 1500),
(4, '', '111111111111', 1500),
(5, '2345', '22222222222', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `reg` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `request_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `reg` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`reg`, `name`, `password`) VALUES
('1234', 'test user', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allborrows`
--
ALTER TABLE `allborrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allborrows`
--
ALTER TABLE `allborrows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
