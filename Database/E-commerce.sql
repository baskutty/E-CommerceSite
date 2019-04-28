-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET latin1 ;
USE `ecommerce` ;

-- -----------------------------------------------------
-- Table `ecommerce`.`admins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`admins` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`admins` (
  `admin_name` TEXT NOT NULL,
  `admin_pass` VARCHAR(100) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ecommerce`.`brands`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`brands` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`brands` (
  `brand_id` INT(100) NOT NULL AUTO_INCREMENT,
  `brand_title` TEXT NOT NULL,
  PRIMARY KEY (`brand_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ecommerce`.`cart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`cart` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`cart` (
  `p_id` INT(100) NOT NULL,
  `ip_add` VARCHAR(255) NOT NULL,
  `qty` INT(100) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ecommerce`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`categories` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`categories` (
  `cat_id` INT(100) NOT NULL AUTO_INCREMENT,
  `cat_title` TEXT NOT NULL,
  PRIMARY KEY (`cat_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ecommerce`.`customers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`customers` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`customers` (
  `customer_id` INT(100) NOT NULL AUTO_INCREMENT,
  `customer_ip` VARCHAR(255) NOT NULL,
  `customer_name` TEXT NOT NULL,
  `customer_email` VARCHAR(100) NOT NULL,
  `customer_pass` VARCHAR(100) NOT NULL,
  `customer_country` TEXT NOT NULL,
  `customer_city` TEXT NOT NULL,
  `customer_no` VARCHAR(255) NOT NULL,
  `customer_image` TEXT NOT NULL,
  `customer_add` TEXT NOT NULL,
  PRIMARY KEY (`customer_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ecommerce`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`products` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`products` (
  `product_id` INT(100) NOT NULL AUTO_INCREMENT,
  `product_cat` INT(100) NOT NULL,
  `product_brand` INT(100) NOT NULL,
  `product_title` VARCHAR(255) NOT NULL,
  `product_price` INT(100) NOT NULL,
  `product_desc` TEXT NOT NULL,
  `product_image` TEXT NOT NULL,
  `product_keywords` TEXT NOT NULL,
  PRIMARY KEY (`product_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 31
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
