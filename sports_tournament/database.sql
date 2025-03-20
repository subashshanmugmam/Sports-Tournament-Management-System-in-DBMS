-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2025 at 13:05 PM
-- Server version: 10.4.32
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_tournament`
--

CREATE DATABASE IF NOT EXISTS `sports_tournament`;
USE `sports_tournament`;

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('admin', 'player', 'organizer') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tournaments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `sport` VARCHAR(255) NOT NULL,
  `date` DATE NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `status` ENUM('upcoming', 'ongoing', 'completed') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `tournaments` (`name`, `sport`, `date`, `location`, `status`) VALUES
('Football World Cup', 'Football', '2025-11-20', 'Qatar', 'upcoming'),
('Chess Championship', 'Chess', '2025-07-15', 'Moscow', 'upcoming'),
('Cricket World Cup', 'Cricket', '2025-10-05', 'India', 'upcoming');

-- -----------------------------------------------------
-- Table `registrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `tournament_id` INT NOT NULL,
  `registration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
  `team_name` VARCHAR(255) NULL,
  `contact_person` VARCHAR(255) NOT NULL,
  `contact_number` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_registrations_users1` (`user_id`),
  INDEX `fk_registrations_tournaments1` (`tournament_id`),
  CONSTRAINT `fk_registrations_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_registrations_tournaments1` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `registrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `tournament_id` INT NOT NULL,
  `registration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
  `team_name` VARCHAR(255) NULL,
  `contact_person` VARCHAR(255) NOT NULL,
  `contact_number` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_registrations_users1` (`user_id`),
  INDEX `fk_registrations_tournaments1` (`tournament_id`),
  CONSTRAINT `fk_registrations_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_registrations_tournaments1` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `registrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `tournament_id` INT NOT NULL,
  `registration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
  `team_name` VARCHAR(255) NULL,
  `contact_person` VARCHAR(255) NOT NULL,
  `contact_number` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_registrations_users1` (`user_id`),
  INDEX `fk_registrations_tournaments1` (`tournament_id`),
  CONSTRAINT `fk_registrations_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_registrations_tournaments1` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `teams`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teams` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `tournament_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_teams_tournaments1` (`tournament_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `matches`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matches` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tournament_id` INT NOT NULL,
  `team1_id` INT NOT NULL,
  `team2_id` INT NOT NULL,
  `score1` INT NULL,
  `score2` INT NULL,
  `match_date` DATE NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_matches_tournaments1` (`tournament_id`),
  INDEX `fk_matches_teams1` (`team1_id`),
  INDEX `fk_matches_teams2` (`team2_id`)
) ENGINE = InnoDB;

--
-- Constraints for dumped tables
--

-- `teams` foreign keys
ALTER TABLE `teams` ADD CONSTRAINT `fk_teams_tournaments1` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`);

-- `matches` foreign keys
ALTER TABLE `matches` ADD CONSTRAINT `fk_matches_tournaments1` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`);
ALTER TABLE `matches` ADD CONSTRAINT `fk_matches_teams1` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`);
ALTER TABLE `matches` ADD CONSTRAINT `fk_matches_teams2` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`);

END TRANSACTION;