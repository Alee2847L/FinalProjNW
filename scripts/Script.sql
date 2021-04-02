-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema NegociosWebdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema NegociosWebdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `nwdb` DEFAULT CHARACTER SET utf8 ;
USE `nwdb` ;

-- -----------------------------------------------------
-- Table `NegociosWebdb`.`Categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nwdb`.`Categorias` (
  `idCategoria` INT NOT NULL,
  `NombreCategoria` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NegociosWebdb`.`Dispositivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nwdb`.`Dispositivos` (
  `idDispositivo` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Marca` VARCHAR(45) NULL,
  `Serie` VARCHAR(45) NULL,
  `Categorias_idCategoria` INT NOT NULL,
  `PrecioUnitario` DOUBLE NULL,
  `Stock` INT NULL,
  PRIMARY KEY (`idDispositivo`),
  INDEX `fk_Dispositivos_Categorias1_idx` (`Categorias_idCategoria` ASC) VISIBLE,
  CONSTRAINT `fk_Dispositivos_Categorias1`
    FOREIGN KEY (`Categorias_idCategoria`)
    REFERENCES `nwdb`.`Categorias` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NegociosWebdb`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nwdb`.`Usuarios` (
  `idUsuario` INT NOT NULL,
  `Nombre Usuario` VARCHAR(150) NULL,
  `Tipo Usuario` VARCHAR(45) NULL,
  `Correo` VARCHAR(150) NULL,
  `Contraseña` VARCHAR(45) NULL,
  `Fecha Creacion` DATE NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NegociosWebdb`.`Ciudades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nwdb`.`Ciudades` (
  `idCiudad` INT NOT NULL,
  `NombreCiudad` VARCHAR(45) NULL,
  PRIMARY KEY (`idCiudad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NegociosWebdb`.`Servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nwdb`.`Servicios` (
  `idServicio` INT NOT NULL,
  `Usuarios_idUsuario` INT NOT NULL,
  `Dispositivos_idDispositivo` INT NOT NULL,
  `Nombre Servicio` VARCHAR(45) NULL,
  `Tipo Servicio` VARCHAR(45) NULL,
  `Descripcion Servicio` VARCHAR(250) NULL,
  `Precio Servicio` DOUBLE NULL,
  `Ciudades_idCiudad` INT NOT NULL,
  PRIMARY KEY (`idServicio`),
  INDEX `fk_Servicios_Usuarios1_idx` (`Usuarios_idUsuario` ASC) VISIBLE,
  INDEX `fk_Servicios_Dispositivos1_idx` (`Dispositivos_idDispositivo` ASC) VISIBLE,
  INDEX `fk_Servicios_Ciudades1_idx` (`Ciudades_idCiudad` ASC) VISIBLE,
  CONSTRAINT `fk_Servicios_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuario`)
    REFERENCES `nwdb`.`Usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servicios_Dispositivos1`
    FOREIGN KEY (`Dispositivos_idDispositivo`)
    REFERENCES `nwdb`.`Dispositivos` (`idDispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servicios_Ciudades1`
    FOREIGN KEY (`Ciudades_idCiudad`)
    REFERENCES `nwdb`.`Ciudades` (`idCiudad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NegociosWebdb`.`Compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nwdb`.`Compras` (
  `idCompra` INT NOT NULL,
  `Usuarios_idUsuario` INT NOT NULL,
  `Dispositivos_idDispositivo` INT NOT NULL,
  `PrecioUnitario` DOUBLE NULL,
  `Envio` TINYINT NULL,
  `ISV` DOUBLE NULL,
  `Total a Pagar` DOUBLE NULL,
  PRIMARY KEY (`idCompra`),
  INDEX `fk_Compras_Usuarios_idx` (`Usuarios_idUsuario` ASC) VISIBLE,
  INDEX `fk_Compras_Dispositivos1_idx` (`Dispositivos_idDispositivo` ASC) VISIBLE,
  CONSTRAINT `fk_Compras_Usuarios`
    FOREIGN KEY (`Usuarios_idUsuario`)
    REFERENCES `nwdb`.`Usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compras_Dispositivos1`
    FOREIGN KEY (`Dispositivos_idDispositivo`)
    REFERENCES `nwdb`.`Dispositivos` (`idDispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NegociosWebdb`.`Proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nwdb`.`Proveedores` (
  `idProveedor` INT NOT NULL,
  `NombreProveedor` VARCHAR(150) NULL,
  `CorreoProveedor` VARCHAR(100) NULL,
  `NumeroProveedor` INT NULL,
  `DireccionProveedor` VARCHAR(250) NULL,
  PRIMARY KEY (`idProveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NegociosWebdb`.`Proveedores/Dispositivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nwdb`.`Proveedores/Dispositivos` (
  `Dispositivos_idDispositivo` INT NOT NULL,
  `Proveedores_idProveedor` INT NOT NULL,
  INDEX `fk_Proveedores/Dispositivos_Dispositivos1_idx` (`Dispositivos_idDispositivo` ASC) VISIBLE,
  INDEX `fk_Proveedores/Dispositivos_Proveedores1_idx` (`Proveedores_idProveedor` ASC) VISIBLE,
  CONSTRAINT `fk_Proveedores/Dispositivos_Dispositivos1`
    FOREIGN KEY (`Dispositivos_idDispositivo`)
    REFERENCES `nwdb`.`Dispositivos` (`idDispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proveedores/Dispositivos_Proveedores1`
    FOREIGN KEY (`Proveedores_idProveedor`)
    REFERENCES `nwdb`.`Proveedores` (`idProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
