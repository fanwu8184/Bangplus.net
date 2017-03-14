SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`SUPPLIER`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`SUPPLIER` (
  `sup_id` INT NOT NULL AUTO_INCREMENT ,
  `sup_name` VARCHAR(45) NOT NULL ,
  `sup_address` VARCHAR(100) NOT NULL ,
  `sup_contactinfo` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`sup_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CATEGORY`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`CATEGORY` (
  `cat_id` INT NOT NULL AUTO_INCREMENT ,
  `cat_name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`cat_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PRODUCT`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`PRODUCT` (
  `pro_id` VARCHAR(10) NOT NULL ,
  `pro_name` VARCHAR(100) NOT NULL ,
  `pro_subname` VARCHAR(150) NULL ,
  `pro_upc` FLOAT NULL ,
  `pro_mpn` VARCHAR(30) NULL ,
  `pro_desc` VARCHAR(3500) NOT NULL ,
  `pro_weight` INT NOT NULL ,
  `pro_packl` INT NOT NULL ,
  `pro_packw` INT NOT NULL ,
  `pro_packh` VARCHAR(45) NOT NULL ,
  `pro_vweight` INT NOT NULL ,
  `pro_price` DECIMAL(10,2) NOT NULL ,
  `pro_unit` INT NULL ,
  `sup_id` INT NOT NULL ,
  `cat_id` INT NOT NULL ,
  PRIMARY KEY (`pro_id`) ,
  INDEX `fk_PRODUCT_SUPPLIER_idx` (`sup_id` ASC) ,
  INDEX `fk_PRODUCT_CATEGORY1_idx` (`cat_id` ASC) ,
  CONSTRAINT `fk_PRODUCT_SUPPLIER`
    FOREIGN KEY (`sup_id` )
    REFERENCES `mydb`.`SUPPLIER` (`sup_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRODUCT_CATEGORY1`
    FOREIGN KEY (`cat_id` )
    REFERENCES `mydb`.`CATEGORY` (`cat_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CHANNEL`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`CHANNEL` (
  `chan_id` INT NOT NULL AUTO_INCREMENT ,
  `chan_name` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`chan_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PRO_CHAN`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`PRO_CHAN` (
  `pro_id` VARCHAR(10) NOT NULL ,
  `chan_id` INT NOT NULL ,
  `pc_shippingcost` DECIMAL(10,2) NOT NULL ,
  `pc_percentfee` INT NOT NULL ,
  `pc_FBAfee` DECIMAL(10,2) NOT NULL ,
  `pc_saleprice` DECIMAL(10,2) NOT NULL ,
  PRIMARY KEY (`pro_id`, `chan_id`) ,
  INDEX `fk_PRODUCT_has_Channel_Channel1_idx` (`chan_id` ASC) ,
  INDEX `fk_PRODUCT_has_Channel_PRODUCT1_idx` (`pro_id` ASC) ,
  CONSTRAINT `fk_PRODUCT_has_Channel_PRODUCT1`
    FOREIGN KEY (`pro_id` )
    REFERENCES `mydb`.`PRODUCT` (`pro_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRODUCT_has_Channel_Channel1`
    FOREIGN KEY (`chan_id` )
    REFERENCES `mydb`.`CHANNEL` (`chan_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FBA_STORE`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`FBA_STORE` (
  `fs_id` INT NOT NULL AUTO_INCREMENT ,
  `fs_name` VARCHAR(45) NOT NULL ,
  `fs_userid` VARCHAR(45) NOT NULL ,
  `fs_password` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`fs_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FBA_PLIST`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`FBA_PLIST` (
  `fpl_id` INT NOT NULL AUTO_INCREMENT ,
  `fpl_quantity` INT NOT NULL ,
  `fpl_createdate` DATE NOT NULL ,
  `fpl_status` INT NOT NULL DEFAULT 0 ,
  `pro_id` VARCHAR(10) NOT NULL ,
  `fs_id` INT NOT NULL ,
  PRIMARY KEY (`fpl_id`) ,
  INDEX `fk_FBA_PLIST_PRODUCT1_idx` (`pro_id` ASC) ,
  INDEX `fk_FBA_PLIST_FBA_STORE1_idx` (`fs_id` ASC) ,
  CONSTRAINT `fk_FBA_PLIST_PRODUCT1`
    FOREIGN KEY (`pro_id` )
    REFERENCES `mydb`.`PRODUCT` (`pro_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FBA_PLIST_FBA_STORE1`
    FOREIGN KEY (`fs_id` )
    REFERENCES `mydb`.`FBA_STORE` (`fs_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`STORE_PAY`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`STORE_PAY` (
  `sp_id` INT NOT NULL AUTO_INCREMENT ,
  `sp_shipdate` DATE NOT NULL ,
  `sp_carrier` VARCHAR(45) NULL ,
  `sp_tracking` VARCHAR(30) NULL ,
  `sp_shipmentID` VARCHAR(45) NULL ,
  `sp_shippingcost` DECIMAL(10,2) NULL ,
  `sp_productvalue` INT NULL ,
  `fs_id` INT NOT NULL ,
  PRIMARY KEY (`sp_id`) ,
  INDEX `fk_STORE_PAY_FBA_STORE1_idx` (`fs_id` ASC) ,
  CONSTRAINT `fk_STORE_PAY_FBA_STORE1`
    FOREIGN KEY (`fs_id` )
    REFERENCES `mydb`.`FBA_STORE` (`fs_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`STORE_INCOME`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`STORE_INCOME` (
  `si_id` INT NOT NULL AUTO_INCREMENT ,
  `si_date` DATE NOT NULL ,
  `si_income` DECIMAL(10,2) NULL ,
  `fs_id` INT NOT NULL ,
  PRIMARY KEY (`si_id`) ,
  INDEX `fk_STORE_INCOME_FBA_STORE1_idx` (`fs_id` ASC) ,
  CONSTRAINT `fk_STORE_INCOME_FBA_STORE1`
    FOREIGN KEY (`fs_id` )
    REFERENCES `mydb`.`FBA_STORE` (`fs_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`STORE_ADS`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`STORE_ADS` (
  `sa_id` INT NOT NULL AUTO_INCREMENT ,
  `sa_date` DATE NOT NULL ,
  `sa_cost` DECIMAL(10,2) NOT NULL ,
  `FBA_STORE_fs_id` INT NOT NULL ,
  PRIMARY KEY (`sa_id`) ,
  INDEX `fk_STORE_ADS_FBA_STORE1_idx` (`FBA_STORE_fs_id` ASC) ,
  CONSTRAINT `fk_STORE_ADS_FBA_STORE1`
    FOREIGN KEY (`FBA_STORE_fs_id` )
    REFERENCES `mydb`.`FBA_STORE` (`fs_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FBA_SHIPLINE`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FBA_SHIPLINE` (
  `pro_id` VARCHAR(10) NOT NULL ,
  `sp_id` INT NOT NULL ,
  `fba_quantity` INT NOT NULL ,
  PRIMARY KEY (`pro_id`, `sp_id`) ,
  INDEX `fk_FBA_SHIPLINE_STORE_PAY1_idx` (`sp_id` ASC) ,
  CONSTRAINT `fk_FBA_SHIPLINE_PRODUCT1`
    FOREIGN KEY (`pro_id` )
    REFERENCES `mydb`.`PRODUCT` (`pro_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FBA_SHIPLINE_STORE_PAY1`
    FOREIGN KEY (`sp_id` )
    REFERENCES `mydb`.`STORE_PAY` (`sp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
