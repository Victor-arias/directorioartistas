SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `directorioartistas` DEFAULT CHARACTER SET latin1 ;
USE `directorioartistas` ;

-- -----------------------------------------------------
-- Table `directorioartistas`.`areas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`areas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `descripcion` VARCHAR(255) NULL DEFAULT NULL ,
  `estado` TINYINT(4) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(100) NOT NULL ,
  `key` VARCHAR(255) NULL DEFAULT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '0' ,
  `roles_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuarios_roles1_idx` (`roles_id` ASC) ,
  CONSTRAINT `fk_usuarios_roles1`
    FOREIGN KEY (`roles_id` )
    REFERENCES `directorioartistas`.`roles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 89
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`perfiles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`perfiles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `slug` VARCHAR(100) NULL ,
  `resena` TEXT NOT NULL ,
  `trayectoria` DATE NULL DEFAULT NULL ,
  `web` VARCHAR(255) NULL DEFAULT NULL ,
  `usuarios_id` INT(11) NOT NULL ,
  `areas_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_perfiles_usuarios1_idx` (`usuarios_id` ASC) ,
  INDEX `fk_perfiles_areas1_idx` (`areas_id` ASC) ,
  CONSTRAINT `fk_perfiles_areas1`
    FOREIGN KEY (`areas_id` )
    REFERENCES `directorioartistas`.`areas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfiles_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `directorioartistas`.`usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 88
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`audios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`audios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `url` VARCHAR(255) NOT NULL ,
  `estado` TINYINT(4) NOT NULL ,
  `perfiles_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_audios_perfiles1_idx` (`perfiles_id` ASC) ,
  CONSTRAINT `fk_audios_perfiles1`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 115
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`convocatorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`convocatorias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(100) NOT NULL ,
  `descripcion` VARCHAR(255) NULL DEFAULT NULL ,
  `inicio_convocatoria` DATETIME NOT NULL ,
  `fin_convocatoria` DATETIME NOT NULL ,
  `inicio_evaluacion` DATETIME NOT NULL ,
  `fin_evaluacion` DATETIME NOT NULL ,
  `resultados` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`fotos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(100) NOT NULL ,
  `src` VARCHAR(255) NOT NULL ,
  `ancho` INT(11) NOT NULL ,
  `alto` INT(11) NOT NULL ,
  `es_perfil` SMALLINT(6) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `perfiles_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_fotos_perfiles1_idx` (`perfiles_id` ASC) ,
  CONSTRAINT `fk_fotos_perfiles1`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`jurado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`jurado` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre_completo` VARCHAR(200) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `usuarios_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_jurados_usuarios1_idx` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_jurados_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `directorioartistas`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `directorioartistas`.`propuestas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`propuestas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `representante` VARCHAR(150) NOT NULL ,
  `cedula` VARCHAR(100) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `celular` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(50) NOT NULL ,
  `direccion` VARCHAR(255) NOT NULL ,
  `trayectoria` TINYINT(4) NOT NULL ,
  `numero_integrantes` INT(11) NOT NULL ,
  `resena` TEXT NOT NULL ,
  `video` VARCHAR(255) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `valor_presentacion` DOUBLE NOT NULL ,
  `rider` VARCHAR(255) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NULL DEFAULT NULL ,
  `convocatorias_id` INT(11) NOT NULL ,
  `perfiles_id` INT(11) NOT NULL ,
  `subgenero` VARCHAR(30) NULL DEFAULT NULL ,
  `jurado_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_propuestas_convocatorias1_idx` (`convocatorias_id` ASC) ,
  INDEX `fk_propuestas_perfiles1_idx` (`perfiles_id` ASC) ,
  INDEX `fk_propuestas_jurados1_idx` (`jurado_id` ASC) ,
  CONSTRAINT `fk_propuestas_convocatorias1`
    FOREIGN KEY (`convocatorias_id` )
    REFERENCES `directorioartistas`.`convocatorias` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_propuestas_perfiles1`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_propuestas_jurados1`
    FOREIGN KEY (`jurado_id` )
    REFERENCES `directorioartistas`.`jurado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 71
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`redes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`redes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `logo` VARCHAR(255) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`redes_has_perfiles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`redes_has_perfiles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `redes_id` INT(11) NOT NULL ,
  `perfiles_id` INT(11) NOT NULL ,
  `url` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`, `redes_id`, `perfiles_id`) ,
  INDEX `fk_redes_has_perfiles_perfiles1_idx` (`perfiles_id` ASC) ,
  INDEX `fk_redes_has_perfiles_redes1_idx` (`redes_id` ASC) ,
  CONSTRAINT `fk_redes_has_perfiles_perfiles1`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_redes_has_perfiles_redes1`
    FOREIGN KEY (`redes_id` )
    REFERENCES `directorioartistas`.`redes` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 166
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`videos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`videos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(100) NOT NULL ,
  `src` VARCHAR(255) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `perfiles_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_fotos_perfiles1_idx` (`perfiles_id` ASC) ,
  CONSTRAINT `fk_fotos_perfiles10`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `directorioartistas`.`tipo_criterio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`tipo_criterio` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NOT NULL ,
  `descripcion` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `directorioartistas`.`criterio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`criterio` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(50) NOT NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `puntaje` INT NOT NULL ,
  `convocatorias_id` INT(11) NOT NULL ,
  `areas_id` INT(11) NOT NULL ,
  `tipo_criterio_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_criterio_convocatorias1_idx` (`convocatorias_id` ASC) ,
  INDEX `fk_criterio_areas1_idx` (`areas_id` ASC) ,
  INDEX `fk_criterio_tipo_criterio1_idx` (`tipo_criterio_id` ASC) ,
  CONSTRAINT `fk_criterio_convocatorias1`
    FOREIGN KEY (`convocatorias_id` )
    REFERENCES `directorioartistas`.`convocatorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_criterio_areas1`
    FOREIGN KEY (`areas_id` )
    REFERENCES `directorioartistas`.`areas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_criterio_tipo_criterio1`
    FOREIGN KEY (`tipo_criterio_id` )
    REFERENCES `directorioartistas`.`tipo_criterio` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `directorioartistas`.`criterio_has_propuestas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`criterio_has_propuestas` (
  `criterio_id` INT NOT NULL ,
  `propuestas_id` INT(11) NOT NULL ,
  `puntaje` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`criterio_id`, `propuestas_id`) ,
  INDEX `fk_criterio_has_propuestas_propuestas1_idx` (`propuestas_id` ASC) ,
  INDEX `fk_criterio_has_propuestas_criterio1_idx` (`criterio_id` ASC) ,
  CONSTRAINT `fk_criterio_has_propuestas_criterio1`
    FOREIGN KEY (`criterio_id` )
    REFERENCES `directorioartistas`.`criterio` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_criterio_has_propuestas_propuestas1`
    FOREIGN KEY (`propuestas_id` )
    REFERENCES `directorioartistas`.`propuestas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `directorioartistas` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
