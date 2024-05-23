-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 10:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_therapy_dog_session_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `name`, `description`) VALUES
(1, 'Training Demonstrations', 'Show basic commands like sit, stay, and roll over.\r\nDemonstrate advanced tricks such as playing dead, fetching specific items, or agility exercises.'),
(2, 'Exercise and Agility Activities', 'Guide the dog through an obstacle course.\r\nPerform stretching exercises with the dog.'),
(3, 'Emotional Support Activities', 'Discuss how therapy dogs can help manage stress and anxiety. Share success stories of therapy dogs helping individuals'),
(4, 'Mindfulness and Relaxation', 'Guide participants through mindfulness exercises while the therapy dog remains calm and relaxed. Conduct deep breathing exercises with the dog present to create a calming atmosphere.'),
(5, 'Behavioral Therapy Integration', 'Incorporate therapy dog interactions into cognitive-behavioral therapy (CBT) techniques. Use the dog’s behavior as a model for discussing emotional regulation and coping strategies');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `email`, `age`, `occupation`) VALUES
(1, 'Naomi Rwaka', 'rwakaN@gmail.com', 25, 'Entrepreneur'),
(2, 'kebby', 'kebbyb@gmail.com', 20, 'student'),
(3, 'carmene  gaella Agasaro', 'gaellaAc@gmail.com', 27, 'News Director'),
(4, 'gael ntwali Lucas', 'glucas@gmail.com', 28, 'Manager'),
(5, 'bebe', 'bebes@gmail.com', 21, 'vlogger'),
(6, 'petite', 'petite@gmail.com', 20, 'student'),
(7, 'cyuzuzo ines', 'cyuzuzo@gmail.com', 23, 'youtuber');

-- --------------------------------------------------------

--
-- Table structure for table `dog`
--

CREATE TABLE `dog` (
  `dog_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dog`
--

INSERT INTO `dog` (`dog_id`, `name`, `breed`, `age`, `gender`) VALUES
(1, 'Max', 'Labrador Retriever', 4, 'Male'),
(2, 'Daisy', 'Beagle', 4, 'Female'),
(4, 'Bella', 'Golden Retriever', 5, 'Female'),
(5, 'papy', 'Golden Retriever', 3, 'female'),
(6, 'Bobby', ' Bulldogs', 2, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `dog_certification`
--

CREATE TABLE `dog_certification` (
  `certification_id` int(11) NOT NULL,
  `dog_id` int(11) DEFAULT NULL,
  `certification_name` varchar(100) DEFAULT NULL,
  `certification_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dog_certification`
--

INSERT INTO `dog_certification` (`certification_id`, `dog_id`, `certification_name`, `certification_date`) VALUES
(1, 1, 'Handling Distractions during Virtual Sessions', '2024-05-08'),
(2, 6, 'Behavioral Assessment', '2022-05-10'),
(3, 2, 'Behavioral Assessment', '2014-04-01'),
(4, 5, 'Current Vaccination Records', '2024-02-18'),
(6, 6, 'Regular Veterinary Check-ups', '2024-05-16'),
(12, 5, 'Handling Distractions during Virtual Sessions', '2024-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `handler`
--

CREATE TABLE `handler` (
  `handler_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `handler`
--

INSERT INTO `handler` (`handler_id`, `name`, `email`, `phone_number`) VALUES
(1, 'Gogo Nunu', 'nunug@gmail.com', '0786543278'),
(2, 'anzlyneze faoh', 'anzlynezef@gmail.com', '078965342198'),
(3, 'Bobo Samuel', 'samuelb@gmail.com', '+254789435210546');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `therapist_id` int(11) DEFAULT NULL,
  `handler_id` int(11) DEFAULT NULL,
  `dog_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `session_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `therapist_id`, `handler_id`, `dog_id`, `client_id`, `start_time`, `end_time`, `platform`, `session_link`) VALUES
(1, 1, 3, 4, 1, '0000-00-00 00:00:00', '2025-04-13 12:00:00', 'health v dog', 'https://www.google.com/inverhillsNews'),
(2, 4, 3, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Inver Hills News', 'https://www.inverhillsNews.com/inverhillsNews');

-- --------------------------------------------------------

--
-- Table structure for table `session_feedback`
--

CREATE TABLE `session_feedback` (
  `feedback_id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_feedback`
--

INSERT INTO `session_feedback` (`feedback_id`, `session_id`, `client_id`, `rating`, `feedback_text`) VALUES
(1, 2, 4, 86, 'Overall Experience:How would you rate your overall experience with the virtual therapy dog session?⭐⭐⭐⭐⭐Please provide any comments or suggestions on your overall experience.was goodSession Quality:3. How engaging did you find the session?⭐⭐⭐⭐⭐Did the therapy dog and handler meet your expectations in terms of interaction and engagement?⭐⭐⭐⭐⭐Were the activities and interactions appropriate for your needs?⭐⭐⭐⭐⭐'),
(2, 2, 3, 67, 'Technology and Accessibility: 8. How easy was it to access and navigate the virtual platform?  ⭐⭐⭐⭐⭐ Did you experience any technical difficulties during the session? If so, please describe them. [Your response] Was the video and audio quality satisfactory? ⭐⭐⭐⭐⭐');

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `therapist_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`therapist_id`, `name`, `email`, `specialization`) VALUES
(1, 'Cryso Alson', 'crysoA@gmail.com', 'Animal-Assisted Therapy (AAT) Certification'),
(2, 'Alicia Bryolunella', 'bryolunella@gmail.com', 'Telehealth Counseling Certification'),
(3, 'Mihigo Pierre', 'pierrem@gmail.com', 'Behavioral Therapy and Mindfulness'),
(4, 'kadju ines', 'inesk@gmail.com', 'Developmental and Social Skills');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_availability`
--

CREATE TABLE `therapist_availability` (
  `availability_id` int(11) NOT NULL,
  `therapist_id` int(11) DEFAULT NULL,
  `day_of_week` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist_availability`
--

INSERT INTO `therapist_availability` (`availability_id`, `therapist_id`, `day_of_week`, `start_time`, `end_time`) VALUES
(1, 4, 1, '07:30:00', '11:30:00'),
(2, 2, 4, '14:00:00', '17:00:00'),
(3, 3, 2, '10:05:14', '13:07:00'),
(5, 1, 3, '09:00:00', '00:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_ratings`
--

CREATE TABLE `therapist_ratings` (
  `rating_id` int(11) NOT NULL,
  `therapist_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist_ratings`
--

INSERT INTO `therapist_ratings` (`rating_id`, `therapist_id`, `rating`, `feedback_text`) VALUES
(1, 1, 60, 'he good and caring to us even our dog'),
(2, 2, 75, 'Alicia give all she had in order to maintain the health of our dog i really love her'),
(4, 3, NULL, 'There were many things I liked about working with Mihigo, such as their expertise and the calm environment they created. However, I did feel that there were times when our sessions lacked direction. A clearer structure and more regular check-ins on progress would be beneficial'),
(5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullnames` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(120) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullnames`, `username`, `email`, `phone_number`, `password`, `gender`) VALUES
(1, 'kebby berwa', 'kebby_berwa', 'kebbyb@gmail.com', '0789653421', '$2y$10$cIoy/Q2UOMoxkgq4Rr0cJO/CQZnIWCSC3jonzmrID0Vg9ory5Jx12', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `dog`
--
ALTER TABLE `dog`
  ADD PRIMARY KEY (`dog_id`);

--
-- Indexes for table `dog_certification`
--
ALTER TABLE `dog_certification`
  ADD PRIMARY KEY (`certification_id`),
  ADD KEY `dog_id` (`dog_id`);

--
-- Indexes for table `handler`
--
ALTER TABLE `handler`
  ADD PRIMARY KEY (`handler_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `therapist_id` (`therapist_id`),
  ADD KEY `handler_id` (`handler_id`),
  ADD KEY `dog_id` (`dog_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `session_feedback`
--
ALTER TABLE `session_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
  ADD PRIMARY KEY (`therapist_id`);

--
-- Indexes for table `therapist_availability`
--
ALTER TABLE `therapist_availability`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `therapist_id` (`therapist_id`);

--
-- Indexes for table `therapist_ratings`
--
ALTER TABLE `therapist_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `therapist_id` (`therapist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dog`
--
ALTER TABLE `dog`
  MODIFY `dog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dog_certification`
--
ALTER TABLE `dog_certification`
  MODIFY `certification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `handler`
--
ALTER TABLE `handler`
  MODIFY `handler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session_feedback`
--
ALTER TABLE `session_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `therapist`
--
ALTER TABLE `therapist`
  MODIFY `therapist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `therapist_availability`
--
ALTER TABLE `therapist_availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `therapist_ratings`
--
ALTER TABLE `therapist_ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dog_certification`
--
ALTER TABLE `dog_certification`
  ADD CONSTRAINT `dog_certification_ibfk_1` FOREIGN KEY (`dog_id`) REFERENCES `dog` (`dog_id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`handler_id`) REFERENCES `handler` (`handler_id`),
  ADD CONSTRAINT `session_ibfk_3` FOREIGN KEY (`dog_id`) REFERENCES `dog` (`dog_id`),
  ADD CONSTRAINT `session_ibfk_4` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `session_feedback`
--
ALTER TABLE `session_feedback`
  ADD CONSTRAINT `session_feedback_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`),
  ADD CONSTRAINT `session_feedback_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `therapist_availability`
--
ALTER TABLE `therapist_availability`
  ADD CONSTRAINT `therapist_availability_ibfk_1` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`);

--
-- Constraints for table `therapist_ratings`
--
ALTER TABLE `therapist_ratings`
  ADD CONSTRAINT `therapist_ratings_ibfk_1` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
