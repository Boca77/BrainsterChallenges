-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 10:45 PM
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
-- Database: `movie_industry`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `agency_code` int(11) DEFAULT NULL,
  `movie_id` int(10) UNSIGNED DEFAULT NULL,
  `actor_critic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`id`, `name`, `last_name`, `nickname`, `date_birth`, `agency_code`, `movie_id`, `actor_critic_id`) VALUES
(1, 'Mads', 'Mikkelsen', 'Citronen', '1965-11-22', 452, 7, 1),
(2, 'Rami', 'Malek', '/', '1981-05-12', 562, 6, 2),
(3, 'Andrew', 'Garfield', '/', '1983-08-20', 851, 1, 4),
(4, 'Hugh', 'Dancy', 'Fancy Dancy', '1975-06-19', 802, 10, 3),
(5, 'Leonardo', 'DiCaprio', 'Lenny D', '1974-12-11', 510, 2, 5),
(6, 'Todd', 'Miller', '/', '1981-06-04', 572, 9, 10),
(7, 'Senka', 'Kolozova', '/', '1947-02-01', 272, 4, 6),
(8, 'Tom', 'Schilling', '/', '1982-02-10', 972, 3, 9),
(9, 'Lee', 'Sun-kyun', 'The Voice', '1975-03-02', 222, 5, 7),
(10, 'Donald', 'Glover', 'Cheezy', '1983-09-25', 232, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `actor_critic`
--

CREATE TABLE `actor_critic` (
  `id` int(10) UNSIGNED NOT NULL,
  `critic_id` int(10) UNSIGNED DEFAULT NULL,
  `actor_id` int(10) UNSIGNED DEFAULT NULL,
  `grade_devotio` varchar(30) DEFAULT NULL,
  `grade_naturalness` varchar(30) DEFAULT NULL,
  `grade_expression` varchar(30) DEFAULT NULL,
  `grade_acting` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor_critic`
--

INSERT INTO `actor_critic` (`id`, `critic_id`, `actor_id`, `grade_devotio`, `grade_naturalness`, `grade_expression`, `grade_acting`) VALUES
(1, 1, 1, '3/5', '2/5', '4/5', '3/5'),
(2, 3, 2, '5/5', '3/5', '2/5', '5/5'),
(3, 5, 4, '4/5', '5/5', '4/5', '3/5'),
(4, 4, 3, '3/5', '4/5', '2/5', '4/5'),
(5, 2, 5, '3/5', '4/5', '4/5', '3/5'),
(6, 6, 7, '5/5', '3/5', '4/5', '3/5'),
(7, 7, 9, '4/5', '5/5', '3/5', '3/5'),
(8, 8, 10, '3/5', '4/5', '4/5', '4/5'),
(9, 9, 8, '2/5', '3/5', '3/5', '4/5'),
(10, 10, 6, '5/5', '5/5', '2/5', '3/5');

-- --------------------------------------------------------

--
-- Table structure for table `actor_salary`
--

CREATE TABLE `actor_salary` (
  `actor_id` int(10) UNSIGNED DEFAULT NULL,
  `movie_id` int(10) UNSIGNED DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor_salary`
--

INSERT INTO `actor_salary` (`actor_id`, `movie_id`, `salary`) VALUES
(1, 7, 600000),
(2, 6, 550000),
(3, 1, 500000),
(4, 10, 450000),
(5, 2, 600500),
(6, 9, 650000),
(7, 4, 300000),
(8, 3, 400000),
(9, 5, 350000),
(10, 8, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `critic`
--

CREATE TABLE `critic` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `film_rating_id` int(10) UNSIGNED DEFAULT NULL,
  `actor_critic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critic`
--

INSERT INTO `critic` (`id`, `name`, `last_name`, `username`, `password`, `film_rating_id`, `actor_critic_id`) VALUES
(1, 'Ron', 'Seoul-Oh', 'Ron_S', 'ron12(34)', 1, 1),
(2, 'Reuben', 'Baron', 'Baron', 'baron555', 4, 5),
(3, 'Ishita', 'Sengupta', 'Ishita_Sn', 'ishita456', 2, 2),
(4, 'Linda', 'Marric', 'LindaMar', 'LindaMar225', 3, 4),
(5, 'Chris', 'Stuckmann', 'Stuckmann', 'Chris848', 5, 3),
(6, 'Mark', 'Ellis', 'Mark', 'mark223', NULL, 6),
(7, 'Janet', 'Maslin', 'Jane', 'jane551', NULL, 7),
(8, 'Kristian', 'Harloff', 'Kris', 'kris53', NULL, 8),
(9, 'Richard', 'Roeper', 'Rich', 'rich874', NULL, 9),
(10, 'Gene', 'Siskel', 'Gene', 'gene458', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gener` varchar(30) DEFAULT NULL,
  `expertise` varchar(30) DEFAULT NULL,
  `film_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `name`, `last_name`, `gener`, `expertise`, `film_id`) VALUES
(1, 'Marc', 'Webb', 'Action', 'visually stunning sequences', 1),
(2, 'Baran Bo', 'Odar', 'Thriller', 'film director', 3),
(3, 'Martin', 'Scorsese', 'Thriller', 'depth and artistic vision', 2),
(4, 'Goran', 'Stolevski', 'Horror', 'film director', 4),
(5, 'Bong', 'Joon-ho', 'Thriller', 'visionary directorial style', 5);

-- --------------------------------------------------------

--
-- Table structure for table `director_salary`
--

CREATE TABLE `director_salary` (
  `director_id` int(10) UNSIGNED DEFAULT NULL,
  `film_id` int(10) UNSIGNED DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director_salary`
--

INSERT INTO `director_salary` (`director_id`, `film_id`, `salary`) VALUES
(1, 1, 500000),
(2, 3, 550500),
(3, 2, 650000),
(4, 4, 600000),
(5, 5, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(10) UNSIGNED NOT NULL,
  `format` varchar(30) DEFAULT NULL CHECK (`format` = '2d' or `format` = '3d'),
  `first_week_revenue` int(11) DEFAULT NULL,
  `movie_id` int(10) UNSIGNED DEFAULT NULL,
  `film_rating_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `format`, `first_week_revenue`, `movie_id`, `film_rating_id`) VALUES
(1, '2D', 1726429, 3, 5),
(2, '2D', 258726674, 5, 3),
(3, '2D', 62004688, 1, 2),
(4, '2D', 124750, 4, 4),
(5, '2D', 294804195, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `film_rating`
--

CREATE TABLE `film_rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` varchar(30) DEFAULT NULL,
  `critic_id` int(10) UNSIGNED DEFAULT NULL,
  `film_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film_rating`
--

INSERT INTO `film_rating` (`id`, `rating`, `critic_id`, `film_id`) VALUES
(1, '9/10', 1, 5),
(2, '10/10', 4, 3),
(3, '8/10', 2, 2),
(4, '6/10', 3, 4),
(5, '9/10', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `gener` varchar(30) DEFAULT NULL,
  `origin_country` varchar(30) DEFAULT NULL,
  `premiere_city` varchar(30) DEFAULT NULL,
  `production_company` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `gener`, `origin_country`, `premiere_city`, `production_company`) VALUES
(1, 'The Amazing Spider-Man', 'Action', 'USA', 'Tokyo', 'Marvel Entertainment'),
(2, 'Shutter Island', 'Thriller', 'USA', 'New York', 'Paramount Pictures'),
(3, 'Who Am I', 'Thriller', 'Germany', 'Toronto', 'Wiedemann & Berg Film Producti'),
(4, 'You wont be alone', 'Horror', 'Macedonia', 'Utah', 'Causeway Films'),
(5, 'Parasite', 'Thriller', 'South Korean', 'Rotterdam', 'Barunson'),
(6, 'Mr Robot', 'Thriller', 'USA', 'USA', 'Esmail Corp'),
(7, 'Dark', 'Thriller', 'Germany', 'Germany', 'Netflix'),
(8, 'Community', 'Sitcom', 'USA', 'USA', 'Krasnoff/Foster Entertainment'),
(9, 'Silicon Valley', 'Sitcom', 'USA', 'USA', 'HBO'),
(10, 'Hannibal', 'Horror', 'USA', 'USA', 'NBC');

-- --------------------------------------------------------

--
-- Table structure for table `oscar_winner`
--

CREATE TABLE `oscar_winner` (
  `id` int(10) UNSIGNED NOT NULL,
  `actor_id` int(10) UNSIGNED DEFAULT NULL,
  `movie_name` varchar(30) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oscar_winner`
--

INSERT INTO `oscar_winner` (`id`, `actor_id`, `movie_name`, `role`, `year`) VALUES
(1, 3, 'Tick, Tick... Boom!', 'Jonathan Larson', 2022),
(2, 8, 'Who am I', 'Benjamin', 2015),
(3, 5, 'The Revenant', 'Hugh Glass', 2018),
(4, 9, 'Parasite', 'Park Dong-ik', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `tv_show`
--

CREATE TABLE `tv_show` (
  `id` int(10) UNSIGNED NOT NULL,
  `num_of_ep` int(11) DEFAULT NULL,
  `num_of_se` int(11) DEFAULT NULL,
  `tv_channel_premier` varchar(30) DEFAULT NULL,
  `movie_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tv_show`
--

INSERT INTO `tv_show` (`id`, `num_of_ep`, `num_of_se`, `tv_channel_premier`, `movie_id`) VALUES
(1, 53, 6, 'HBO', 9),
(2, 26, 3, 'Netflix', 7),
(3, 45, 4, 'USA Network', 6),
(4, 39, 3, 'NBC', 10),
(5, 110, 6, 'NBC', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acotr_fk` (`movie_id`);

--
-- Indexes for table `actor_critic`
--
ALTER TABLE `actor_critic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor_critic_critic_fk` (`critic_id`),
  ADD KEY `actor_critic_actor_fk` (`actor_id`);

--
-- Indexes for table `actor_salary`
--
ALTER TABLE `actor_salary`
  ADD KEY `movie_sal_fk` (`movie_id`),
  ADD KEY `actor_sal_fk` (`actor_id`);

--
-- Indexes for table `critic`
--
ALTER TABLE `critic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `critic_fk` (`film_rating_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_fk` (`film_id`);

--
-- Indexes for table `director_salary`
--
ALTER TABLE `director_salary`
  ADD KEY `director_sal_fk` (`director_id`),
  ADD KEY `film_sal_fk` (`film_id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_fk` (`movie_id`);

--
-- Indexes for table `film_rating`
--
ALTER TABLE `film_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_fk` (`film_id`),
  ADD KEY `film_critic_fk` (`critic_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oscar_winner`
--
ALTER TABLE `oscar_winner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oscar_fk` (`actor_id`);

--
-- Indexes for table `tv_show`
--
ALTER TABLE `tv_show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tv_show_fk` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `actor_critic`
--
ALTER TABLE `actor_critic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `critic`
--
ALTER TABLE `critic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `film_rating`
--
ALTER TABLE `film_rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oscar_winner`
--
ALTER TABLE `oscar_winner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tv_show`
--
ALTER TABLE `tv_show`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `acotr_fk` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Constraints for table `actor_critic`
--
ALTER TABLE `actor_critic`
  ADD CONSTRAINT `actor_critic_actor_fk` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `actor_critic_critic_fk` FOREIGN KEY (`critic_id`) REFERENCES `critic` (`id`);

--
-- Constraints for table `actor_salary`
--
ALTER TABLE `actor_salary`
  ADD CONSTRAINT `actor_sal_fk` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `movie_sal_fk` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Constraints for table `critic`
--
ALTER TABLE `critic`
  ADD CONSTRAINT `critic_fk` FOREIGN KEY (`film_rating_id`) REFERENCES `film_rating` (`id`);

--
-- Constraints for table `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `director_fk` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Constraints for table `director_salary`
--
ALTER TABLE `director_salary`
  ADD CONSTRAINT `director_sal_fk` FOREIGN KEY (`director_id`) REFERENCES `director` (`id`),
  ADD CONSTRAINT `film_sal_fk` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `movie_fk` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Constraints for table `film_rating`
--
ALTER TABLE `film_rating`
  ADD CONSTRAINT `film_critic_fk` FOREIGN KEY (`critic_id`) REFERENCES `critic` (`id`),
  ADD CONSTRAINT `rating_fk` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Constraints for table `oscar_winner`
--
ALTER TABLE `oscar_winner`
  ADD CONSTRAINT `oscar_fk` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`);

--
-- Constraints for table `tv_show`
--
ALTER TABLE `tv_show`
  ADD CONSTRAINT `tv_show_fk` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
