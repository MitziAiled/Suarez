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
  
CREATE TABLE `perritos`.`cuentas` (
  `idcuentas` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(8) NOT NULL,
  `tipo_usuario` INT NOT NULL,
  PRIMARY KEY (`idcuentas`));

CREATE TABLE `perritos`.`instituciones` (
  `idinstituciones` INT NOT NULL AUTO_INCREMENT,
  `nombre_inst` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `codigo_postal` VARCHAR(5) NOT NULL,
  `nombre_representante` VARCHAR(45) NOT NULL,
  `cargo_representante` VARCHAR(45) NOT NULL,
  `tipo_institucion` VARCHAR(45) NOT NULL,
  `identificacion_tributaria` VARCHAR(45) NOT NULL,
  `idcuentas` INT NOT NULL,
  PRIMARY KEY (`idinstituciones`),
  CONSTRAINT `idcuentai`
    FOREIGN KEY (`idcuentas`)
    REFERENCES `perritos`.`cuentas` (`idcuentas`));

CREATE TABLE `perritos`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  `telefono_usuario` VARCHAR(10) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `codigo_postal` VARCHAR(5) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `idcuentas` INT NOT NULL,
  PRIMARY KEY (`idusuarios`),
  CONSTRAINT `idcuentau`
    FOREIGN KEY (`idcuentas`)
    REFERENCES `perritos`.`cuentas` (`idcuentas`));

CREATE TABLE `perritos`.`adopciones` (
  `idadopciones` INT NOT NULL AUTO_INCREMENT,
  `idcallejeros` INT NOT NULL,
  `idusuarios` INT NOT NULL,
  `idinstituciones` INT NOT NULL,
  `nombre_mascota` VARCHAR(45) NOT NULL,
  `ocupacion_adoptante` VARCHAR(45) NOT NULL,
  `ingresos_adoptante` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idadopciones`),
  CONSTRAINT `idusuarios`
    FOREIGN KEY (`idusuarios`)
    REFERENCES `perritos`.`usuarios` (`idusuarios`),
  CONSTRAINT `idcallejeros`
    FOREIGN KEY (`idcallejeros`)
    REFERENCES `perritos`.`callejeros` (`idcallejeros`),
  CONSTRAINT `idinstituciones`
    FOREIGN KEY (`idinstituciones`)
    REFERENCES `perritos`.`instituciones` (`idinstituciones`));


 
USE perritos 

-- Join para consulta adoptados
SELECT 
adopciones.idadopciones,
usuarios.nombre,
usuarios.apellidos,
usuarios.direccion, 
usuarios.codigo_postal,
usuarios.telefono,
usuarios.genero,
usuarios.email,
adopciones.ocupacion_adoptante,
adopciones.ingresos_adoptante,
callejeros.idcallejeros,
adopciones.nombre_mascota,
instituciones.nombre_inst
FROM adopciones INNER JOIN usuarios
ON adopciones.idusuarios = usuarios.idusuarios
INNER JOIN instituciones
ON adopciones.idinstituciones = instituciones.idinstituciones
INNER JOIN callejeros
ON adopciones.idcallejeros = callejeros.idcallejeros
