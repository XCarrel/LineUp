-- MySQL Workbench Synchronization
-- Generated: 2018-09-24 14:39
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: xavier.schwab

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `lineup` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `lineup`.`Artists` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(200) NOT NULL,
  `Description` VARCHAR(5000) NOT NULL,
  `Gender_id` INT(11) NOT NULL,
  `Country_id` INT(11) NOT NULL,
  `Mainpicture` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Artist_Gender_idx` (`Gender_id` ASC),
  INDEX `fk_Artist_Country1_idx` (`Country_id` ASC),
  CONSTRAINT `fk_Artist_Gender`
    FOREIGN KEY (`Gender_id`)
    REFERENCES `lineup`.`Genders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artist_Country1`
    FOREIGN KEY (`Country_id`)
    REFERENCES `lineup`.`Countries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `lineup`.`Genders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `lineup`.`Countries` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `lineup`.`Scenes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Localisation` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `lineup`.`PerformanceDates` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Date_time` DATETIME NOT NULL,
  `Duration` INT(11) NULL DEFAULT NULL COMMENT 'Number of minutes',
  `Scene_id` INT(11) NOT NULL,
  `Artist_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_PerformanceDate_Scene1_idx` (`Scene_id` ASC),
  INDEX `fk_PerformanceDate_Artist1_idx` (`Artist_id` ASC),
  CONSTRAINT `fk_PerformanceDate_Scene1`
    FOREIGN KEY (`Scene_id`)
    REFERENCES `lineup`.`Scenes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PerformanceDate_Artist1`
    FOREIGN KEY (`Artist_id`)
    REFERENCES `lineup`.`Artists` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
