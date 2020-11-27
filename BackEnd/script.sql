CREATE DATABASE `perritos` ;

USE `perritos` ;

CREATE TABLE `perritos`.`callejeros` (
  `idcallejeros` INT NOT NULL AUTO_INCREMENT,
  `calle` VARCHAR(45) NOT NULL,
  `colonia` VARCHAR(45) NOT NULL,
  `ciudad` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `rasgos_fisicos` VARCHAR(120) NOT NULL,
  `condicion` VARCHAR(120) NOT NULL,
  `estatus` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcallejeros`));

CREATE TABLE `perritos`.`instituciones` (
  `idinstituciones` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `codigo_postal` VARCHAR(5) NOT NULL,
  `nombre_representante` VARCHAR(45) NOT NULL,
  `cargo_representante` VARCHAR(45) NOT NULL,
  `tipo_institucion` VARCHAR(45) NOT NULL,
  `identificacion_tributaria` VARCHAR(45) NOT NULL,
  `tipo_usuario` INT NOT NULL,
  PRIMARY KEY (`idinstituciones`));

CREATE TABLE `perritos`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `codigo_postal` VARCHAR(5) NOT NULL,
  `e-mail` VARCHAR(45) NOT NULL,
  `tipo_usuario` INT NOT NULL,
  PRIMARY KEY (`idusuarios`));

CREATE TABLE `perritos`.`adopciones` (
  `idadopciones` INT NOT NULL AUTO_INCREMENT,
  `idcallejeros` INT NOT NULL,
  `idusuarios` INT NOT NULL,
  `idinstituciones` INT NOT NULL,
  `nombre_mascota` VARCHAR(45) NOT NULL,
  `ocupacion_adoptante` VARCHAR(45) NOT NULL,
  `ingresos_adoptante` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idadopciones`),
  INDEX `idusuarios_idx` (`idusuarios` ASC),
  INDEX `idcallejeros_idx` (`idcallejeros` ASC),
  INDEX `idinstituciones_idx` (`idinstituciones` ASC),
  CONSTRAINT `idusuarios`
    FOREIGN KEY (`idusuarios`)
    REFERENCES `perritos`.`usuarios` (`idusuarios`),
  CONSTRAINT `idcallejeros`
    FOREIGN KEY (`idcallejeros`)
    REFERENCES `perritos`.`callejeros` (`idcallejeros`),
  CONSTRAINT `idinstituciones`
    FOREIGN KEY (`idinstituciones`)
    REFERENCES `perritos`.`instituciones` (`idinstituciones`));

CREATE TABLE `perritos`.`cuentas` (
  `idcuentas` INT NOT NULL AUTO_INCREMENT,
  `id` INT NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`idcuentas`),
  INDEX `id_idx` (`id` ASC),
  CONSTRAINT `id_i`
    FOREIGN KEY (`id`)
    REFERENCES `perritos`.`instituciones` (`idinstituciones`),
  CONSTRAINT `id_u`
    FOREIGN KEY (`id`)
    REFERENCES `perritos`.`usuarios` (`idusuarios`));

