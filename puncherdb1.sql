-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2025 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puncherdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acct_id` int(10) NOT NULL COMMENT 'system-invoked id',
  `acct_uid` varchar(11) NOT NULL COMMENT 'user-readable id',
  `acct_email` varchar(50) NOT NULL,
  `acct_password` text NOT NULL,
  `acct_creation` date NOT NULL DEFAULT current_timestamp(),
  `acct_updation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_id`, `acct_uid`, `acct_email`, `acct_password`, `acct_creation`, `acct_updation`) VALUES
(1, 'EMP001', '', '123123', '2025-09-22', '2025-09-22'),
(2, 'EMP002', '', '123123', '2025-09-23', '2025-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL COMMENT 'Sender''s username',
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `published` date NOT NULL DEFAULT current_timestamp(),
  `updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `sender`, `title`, `content`, `published`, `updated`) VALUES
(1, 'EMP001', 'this is a title', 'Ask to go outside and ask to come inside and ask to go outside and ask to come inside hiss and stare at nothing then run suddenly away. Why must they do that i rule on my back you rub my tummy i bite you hard kitten is playing with dead mouse so mmmmmmmmmeeeeeeeeooooooooowwwwwwww, so waffles for annoy the old grumpy cat, start a fight and then retreat to wash when i lose. Cat cat moo moo lick ears lick paws mark territory pushes butt to face. Cats are fats i like to pets them they like to meow back what a cat-ass-trophy! for eat a plant, kill a hand and lick master\'s hand at first then bite because im moody or i bet my nine lives on you-oooo-ooo-hooo so instead of drinking water from the cat bowl, make sure to steal water from the toilet. Scratch my tummy actually i hate you now fight me meowing chowing and wowing but mew but chase mice warm up laptop with butt lick butt fart rainbows until owner yells pee in litter box hiss at cats. I\'m going to lap some water out of my master\'s cup meow give attitude shake treat bag. Eat my own ears eat an easter feather as if it were a bird then burp victoriously, but tender but murder hooman toes or cats woo for i hate cucumber pls dont throw it at me. Groom forever, stretch tongue and leave it slightly out, blep. Leave fur on owners clothes pee on walls it smells like breakfast yet look at dog hiiiiiisssss for rub against owner because nose is wet but tickle my belly at your own peril i will pester for food when you\'re in the kitchen even if it\'s salad . I vomit in the bed in the middle of the night throwup on your pillow, or relentlessly pursues moth rub butt on table playing with balls of wool but play riveting piece on synthesizer keyboard. Find a way to fit in tiny box white cat sleeps on a black shirt. Climb into cupboard and lick the salt off rice cakes break lamps and curl up into a ball, for stare at guinea pigs or poop on couch cats woo. I is not fat, i is fluffy my left donut is missing, as is my right. I bet my nine lives on you-oooo-ooo-hooo leave dead animals as gifts. Make meme, make cute face try to jump onto window and fall while scratching at wall pounce on unsuspecting person but catching very fast laser pointer. Scratch at fleas, meow until belly rubs, hide behind curtain when vacuum cleaner is on scratch strangers and poo on owners food poop on grasses or bathe private parts with tongue then lick owner\'s face. Dead stare with ears cocked fall over dead (not really but gets sypathy), so where is it? i saw that bird i need to bring it home to mommy squirrel! yet mew lick the curtain just to be annoying, and rub whiskers on bare skin act innocent. What a cat-ass-trophy! cough hopped up on catnip i rule on my back you rub my tummy i bite you hard, yet get poop stuck in paws jumping out of litter box and run around the house scream meowing and smearing hot cat mud all over.', '2025-10-10', '2025-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attn_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attn_date` date NOT NULL DEFAULT current_timestamp(),
  `attn_in` time NOT NULL,
  `attn_out` time NOT NULL,
  `attn_status` enum('Present','Late','Absent','Leave') NOT NULL DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attn_id`, `employee_id`, `attn_date`, `attn_in`, `attn_out`, `attn_status`) VALUES
(1, 1, '2025-09-22', '07:10:59', '00:00:00', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `action` varchar(10) NOT NULL,
  `audit_by` varchar(11) NOT NULL,
  `audit_from` text NOT NULL,
  `audit_to` text NOT NULL,
  `performed_in` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'when did the action happen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_desc` text NOT NULL,
  `dept_manager` int(10) NOT NULL,
  `dept_updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_desc`, `dept_manager`, `dept_updated`) VALUES
(1, 'Human Resources', 'Managing employees', 0, '2025-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL COMMENT 'system-invoked id',
  `employee_usn` varchar(30) DEFAULT NULL COMMENT 'user-readable id',
  `employee_fn` varchar(50) NOT NULL,
  `employee_ln` varchar(20) NOT NULL,
  `employee_role` varchar(11) NOT NULL,
  `employee_dept` varchar(11) NOT NULL,
  `is_online` tinyint(1) DEFAULT NULL,
  `employee_update` date NOT NULL DEFAULT current_timestamp(),
  `employee_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_usn`, `employee_fn`, `employee_ln`, `employee_role`, `employee_dept`, `is_online`, `employee_update`, `employee_create`) VALUES
(1, 'EMP001', 'john', 'smith', 'admin', 'hr', 1, '2025-09-21', '2025-09-21'),
(3, 'EMP002', 'jvaun', 'schmidt', 'employee', 'hr', NULL, '2025-09-23', '2025-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` date NOT NULL,
  `updated_in` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_date`, `updated_in`) VALUES
(1, 'This is an event title', 'To pet a cat, rub its belly, endure blood and agony, quietly weep, keep rubbing belly stares at human while pushing stuff off a table, hate dog. Have a lot of grump in yourself because you can\'t forget to be grumpy and not be like king grumpy cat scratch me there, elevator butt yet throwup on your pillow meow all night having their mate disturbing sleeping humans and one of these days i\'m going to get that red dot, just you wait and see . Pelt around the house and up and down stairs chasing phantoms. Sees bird in air, breaks into cage and attacks creature chew master\'s slippers so scratch me now! stop scratching me! yet cough furball tickle my belly at your own peril i will pester for food when you\'re in the kitchen even if it\'s salad so annoy the old grumpy cat, start a fight and then retreat to wash when i lose.', '2025-10-22', '2025-10-10 12:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `leave_id` int(11) NOT NULL,
  `employee_usn` int(30) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `leave_filed` timestamp NOT NULL DEFAULT current_timestamp(),
  `leave_start` date NOT NULL,
  `leave_end` date NOT NULL,
  `leave_type` enum('Vacation leave','Sick leave','Parental leave','Family and medical leave','Personal leave','Bereavement leave') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acct_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attn_id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`leave_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acct_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'system-invoked id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'system-invoked id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
