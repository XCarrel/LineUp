-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema lineup
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lineup
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lineup` DEFAULT CHARACTER SET utf8 ;
USE `lineup` ;

-- -----------------------------------------------------
-- Table `lineup`.`Genders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lineup`.`Genders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lineup`.`Countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lineup`.`Countries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lineup`.`ContractTypes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lineup`.`ContractTypes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lineup`.`Contracts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lineup`.`Contracts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `signedOn` DATETIME NULL,
  `description` VARCHAR(1000) NOT NULL,
  `fee` INT NOT NULL,
  `restaurant` VARCHAR(45) NULL,
  `car` VARCHAR(45) NULL,
  `nbMeals` INT NULL,
  `contractType_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_c_type_idx` (`contractType_id` ASC) ,
  CONSTRAINT `fk_c_type`
    FOREIGN KEY (`contractType_id`)
    REFERENCES `lineup`.`ContractTypes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lineup`.`Artists`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lineup`.`Artists` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(200) NOT NULL,
  `Description` VARCHAR(5000) NOT NULL,
  `Gender_id` INT NOT NULL,
  `Country_id` INT NOT NULL,
  `Contract_id` INT NULL,
  `Mainpicture` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Artist_Gender_idx` (`Gender_id` ASC) ,
  INDEX `fk_Artist_Country1_idx` (`Country_id` ASC) ,
  INDEX `fk_contract_idx` (`Contract_id` ASC) ,
  CONSTRAINT `fk_Artist_Gender`
    FOREIGN KEY (`Gender_id`)
    REFERENCES `lineup`.`Genders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artist_Country1`
    FOREIGN KEY (`Country_id`)
    REFERENCES `lineup`.`Countries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contract`
    FOREIGN KEY (`Contract_id`)
    REFERENCES `lineup`.`Contracts` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lineup`.`Scenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lineup`.`Scenes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Localisation` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lineup`.`PerformanceDates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lineup`.`PerformanceDates` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Date_time` DATETIME NOT NULL,
  `Duration` INT NULL COMMENT 'Number of minutes',
  `Scene_id` INT NOT NULL,
  `Artist_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_PerformanceDate_Scene1_idx` (`Scene_id` ASC) ,
  INDEX `fk_PerformanceDate_Artist1_idx` (`Artist_id` ASC) ,
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
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
