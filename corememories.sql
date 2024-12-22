-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 05:21 AM
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
-- Database: `corememories`
--

-- --------------------------------------------------------

--
-- Table structure for table `islandcontents`
--

CREATE TABLE `islandcontents` (
  `islandContentID` int(4) NOT NULL,
  `islandOfPersonalityID` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` varchar(1000) NOT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandcontents`
--

INSERT INTO `islandcontents` (`islandContentID`, `islandOfPersonalityID`, `image`, `content`, `color`) VALUES
(1, 1, 'inspiring.jpg', 'As an inspiring provider, I balance the demands of work and study with determination, showing others that dedication can lead to success. My ability to manage both roles with resilience not only supports my dreams but also motivates those around me to pursue their goals despite challenges.', '8BC664'),
(2, 1, 'determination.jpg', 'Determination is the foundation of my journey, fueling my efforts to stay focused on my goals, no matter how difficult the path may seem. With each challenge, I choose to persist, knowing that every setback is simply an opportunity to grow stronger. My determination gives me the strength to keep pushing through hard times and motivates me to keep striving for success, no matter the obstacles in my way. It is the unwavering belief in my dreams that keeps me moving forward, no matter how long the journey takes.', '8BC664'),
(3, 1, 'dreamer.jpg', 'Being an Unstoppable Dreamer means embracing every challenge as a stepping stone toward my dreams, knowing that no obstacle is too great to overcome. I am driven by a vision of the future that keeps me moving forward, no matter the setbacks I may encounter. My dreams are my guiding light, and I trust in my ability to turn them into reality through determination and resilience. I believe that the road may be tough, but as long as I stay focused, I can achieve anything I set my mind to. ', '8BC664'),
(4, 2, 'happy.jpg', 'Happy Island is a sanctuary where happiness is abundant, and every corner echoes with warmth and good vibes. The island is a place of tranquility, where people live in harmony with one another and embrace a life full of gratitude and love. Here, the focus is on creating joyful experiences and spreading positivity, making it a haven for those seeking peace and fulfillment. The essence of Happy Island lies in its ability to uplift the spirit, reminding everyone who visits that happiness is a choice, and it’s found in the little moments of life.', '8BC664'),
-- --------------------------------------------------------

--
-- Table structure for table `islandsofpersonality`
--

CREATE TABLE `islandsofpersonality` (
  `islandOfPersonalityID` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `shortDescription` varchar(300) DEFAULT NULL,
  `longDescription` varchar(900) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandsofpersonality`
--

INSERT INTO `islandsofpersonality` (`islandOfPersonalityID`, `name`, `shortDescription`, `longDescription`, `color`, `image`, `status`) VALUES
(1, 'Inspiring Provider', 'A caring and determined individual who finds fulfillment in supporting others and creating a positive environment', 'I am someone who genuinely values meaningful connections and takes pride in uplifting others. Whether its offering a helping hand or simply being there to listen, I thrive on creating a warm and encouraging space for those around me. My determination drives me to balance my responsibilities while spreading positivity and care in everything I do.', 'FDFD96', '1.jpg', 'inactive'),
(2, 'Determination Island', 'Determination Island is a place where perseverance and strength lead to growth and success.', 'Determination Island represents a realm where individuals are constantly challenged to push beyond their limits, fostering resilience and personal development. Here, the journey is marked by obstacles that test ones endurance, but each challenge is an opportunity to build inner strength. The island symbolizes the power of persistence, where every setback is met with renewed effort, ultimately leading to achievement and fulfillment. It is a place where determination becomes the key to unlocking ones potential, transforming difficulties into stepping stones toward greater success.', 'FDFD96', '2.png', 'inactive'),
(3, 'Unstoppable Dreamer', 'As an Unstoppable Dreamer, you chase your aspirations with relentless determination, always pushing forward regardless of any obstacles in your way.', 'You, as an Unstoppable Dreamer, embody the spirit of perseverance and ambition, always aiming higher and never allowing challenges to stand in the way of your dreams. Your path is shaped by a strong belief that with determination, anything is possible. Whether its overcoming setbacks or navigating through uncertainties, you remain focused on your goals, using each experience as a stepping stone to greater achievements. Your journey is not just about reaching your dreams but inspiring others to believe in their own potential, proving that dreams can be realized with the right mindset and relentless drive.', 'FDFD96', '3.jpg', 'inactive'),
(4, 'Happy', 'Happy Island is a place where joy and positivity flow freely, creating a sanctuary of happiness and contentment.', 'Happy Island is a serene and vibrant destination where the essence of joy fills the air, and the atmosphere radiates positivity. On this island, every corner is filled with laughter, kindness, and a deep sense of fulfillment. The people who inhabit it live with a spirit of gratitude, embracing each day with open hearts and a commitment to making the world a better place. Its a place where worries are left behind, and happiness is not just a momentary feeling but a way of life. Here, the pursuit of happiness is a shared journey, one that uplifts everyone who sets foot on its shores. ', 'FDFD96', '4.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `islandcontents`
--
ALTER TABLE `islandcontents`
  ADD PRIMARY KEY (`islandContentID`);

--
-- Indexes for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  ADD PRIMARY KEY (`islandOfPersonalityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `islandcontents`
--
ALTER TABLE `islandcontents`
  MODIFY `islandContentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  MODIFY `islandOfPersonalityID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
