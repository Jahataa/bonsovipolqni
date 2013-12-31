SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Website`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Website` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `websiteName` VARCHAR(50) NOT NULL,
  `websiteUrl` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categoryName` VARCHAR(45) NOT NULL,
  `Website_id` INT NOT NULL,
  `dateCreated` DATETIME NULL,
  `dateUpdated` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_Category_Website_idx` (`Website_id` ASC),
  CONSTRAINT `fk_Category_Website`
    FOREIGN KEY (`Website_id`)
    REFERENCES `mydb`.`Website` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `productName` VARCHAR(45) NOT NULL,
  `productDescription` LONGTEXT NOT NULL,
  `Category_id` INT NOT NULL,
  `dateCreated` DATETIME NOT NULL,
  `dateUpdated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_Product_Category1_idx` (`Category_id` ASC),
  CONSTRAINT `fk_Product_Category1`
    FOREIGN KEY (`Category_id`)
    REFERENCES `mydb`.`Category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Member` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `memberAccount` VARCHAR(45) NOT NULL,
  `memberPassword` VARCHAR(22) NOT NULL,
  `memberSalt` VARCHAR(10) NOT NULL,
  `isAdmin` BINARY NULL,
  `dateCreated` DATETIME NOT NULL,
  `dateUpdated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
