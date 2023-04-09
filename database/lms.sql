-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2023 at 09:23 PM
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
(2, '234', '333333333333', '2023/03/31', '2023/04/14'),
(3, '1010', '22222222222', '2023/04/03', '2023/04/17');

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
('9999999999', 'God and His Demons', 'Michael Parenti', 'Religion', 'A noted author and activist brings his critical acumen and rhetorical skills to bear in this polemic against the dark side of religion.', 1000, 15, 'god.jpg'),
('9788413145464', 'The Ballad of Songbirds and Snakes', 'Suzanne Collins', 'Science fiction, Thriller, Adventure fiction, Dystopian Fiction, War story', 'The Ballad of Songbirds and Snakes is a dystopian action-adventure novel by American author Suzanne Collins. It is a spin-off and a prequel to The Hunger Games trilogy. It was released on May 19, 2020, by Scholastic', 1800, 25, 'hgames_songs_of.jpg'),
('9780545586177', 'Catching Fire', 'Suzanne Collins', 'Young adult fiction, Science fiction', ' Catching Fire is a 2009 science fiction young adult novel by the American novelist Suzanne Collins, the second book in The Hunger Games series. As the sequel to the 2008 bestseller The Hunger Games, it continues the story of Katniss Everdeen and the post-apocalyptic nation of Panem.', 1800, 10, 'catching_fire.jpg'),
('9780439023511', 'Mockingjay', 'Suzanne Collins', '\r\nYoung adult fiction, Science fiction, Thriller', 'Mockingjay is a 2010 science fiction novel by American author Suzanne Collins. It is chronologically the last installment of The Hunger Games series, following 2008\'s The Hunger Games and 2009\'s Catching Fire.', 1800, 10, 'mockingjay.jpg'),
('1524739723', 'The Legend of Greg', 'Chris Rylander', 'Fantasy Fiction, Adventure fiction, Science Fiction', 'A boy discovers his destiny could totally stink in this riotously funny fantasy-adventure', 1600, 5, 'A1ZomUaiqfL._AC_UF1000,1000_QL80_.jpg'),
('9781524739805', 'The Rise of Greg', 'Chris Rylander ', 'Young adult fiction, Fantasy Fiction, Science Fiction', 'Magic and mayhem collide in the final book in the monstrously funny middle-grade trilogy An Epic Series of Failures.\r\n', 1800, 10, '5137ltcOCgL.jpg'),
('9781524739775', 'The Curse of Greg', 'Chris Rylander', 'Fantasy Fiction, Adventure fiction, Science Fiction', 'Greg Belmont longs for the days when he thought he was an ordinary thirteen-year-old, before he learned he\'s really a fantastical Dwarf in a world where the return of magic has reignited an ancient feud between the Dwarves and the Elves. But now that magic is spreading rapidly, calling forth mythical monsters that are wreaking total havoc on earth, he knows things will never go back to normal.', 1700, 11, '42629243.jpg'),
('0385736002', 'The Alchemyst', ' Michael Scott', 'Fantasy, Novel, Young adult fiction, Fantasy Fiction, Thriller', 'Nicholas Flamel appeared in J.K. Rowling’s Harry Potter—but did you know he really lived? And he might still be alive today!Discover the truth in Michael Scott’s New York Times bestselling series the Secrets of the Immortal Nicholas Flamel with The Alchemyst, book one. ', 2000, 15, 'A1RO+poQutL.jpg'),
('9780385733588', 'The Magician: The Secrets of the Immortal Nicholas Flamel', 'Michael Scott', 'Fantasy, Fantasy Fiction, Thriller', 'The Magician: The Secrets of the Immortal Nicholas Flamel (often shortened to The Magician) is a fantasy novel by Michael Scott. It is the sequel to The Alchemyst, and the second installment in the six part book series, The Secrets of the Immortal Nicholas Flamel. ', 2100, 15, '2402971.jpg'),
('9780385613125', 'The Sorceress: The Secrets of the Immortal Nicholas Flamel', 'Michael Scott', 'Fantasy, Fantasy Fiction, Thriller, Supernatural fiction, Paranormal fiction', 'The Sorceress: The Secrets of the Immortal Nicholas Flamel (often shortened to The Sorceress) is a fantasy novel and the third installment in the six-book series The Secrets of the Immortal Nicholas Flamel written by Michael Scott. It serves as the sequel to The Magician', 2000, 15, '4588949.jpg'),
('9780385735315', 'The Necromancer: The Secrets of the Immortal Nicholas Flamel', 'Michael Scott', 'Fantasy, Fantasy Fiction, Thriller, Paranormal fiction', 'The Necromancer: The Secrets of the Immortal Nicholas Flamel (often shortened to The Necromancer) is the fourth book of the series The Secrets of the Immortal Nicholas Flamel, written by Irish author Michael Scott. It was published in the United States and United Kingdom on 25 May 2010', 2100, 20, 'Necromancer.jpg'),
('9780385735339', 'The Warlock: The Secrets of the Immortal Nicholas Flamel', 'Michael Scott', 'Fantasy, Fantasy Fiction, Thriller, Paranormal fiction', 'The Warlock: The Secrets of the Immortal Nicholas Flamel (often shortened to The Warlock) is the fifth book of the series The Secrets of the Immortal Nicholas Flamel written by Irish author Michael Scott.It is preceded by four other titles.', 2000, 10, '8458018.jpg'),
('9780385619004', 'The Enchantress: The Secrets of the Immortal Nicolas Flamel', 'Michael Scott', 'Fantasy, Fantasy Fiction, Thriller, Adventure fiction, Supernatural fiction, Paranormal fiction', 'The Enchantress: The Secrets of the Immortal Nicolas Flamel (often shortened to The Enchantress) is the final novel in the six book series, The Secrets of the Immortal Nicholas Flamel.[1] It was written by Irish author Michael Scott and was published by Random House Inc. ', 2100, 15, '8519822.jpg');

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
(2, '1234', '44444444444', 1500),
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

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`reg`, `isbn`, `request_date`) VALUES
('1010', '22222222222', '2023/04/03');

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
('1234', 'test user', '1234'),
('1010', 'the test user', '1010');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
