SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `directorioartistas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `directorioartistas` ;

-- -----------------------------------------------------
-- Table `directorioartistas`.`roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `estado` TINYINT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `directorioartistas`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(100) NOT NULL ,
  `key` VARCHAR(255) NULL ,
  `estado` TINYINT NOT NULL DEFAULT 0 ,
  `roles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuarios_roles1_idx` (`roles_id` ASC) ,
  CONSTRAINT `fk_usuarios_roles1`
    FOREIGN KEY (`roles_id` )
    REFERENCES `directorioartistas`.`roles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Usuarios registrados en la aplicación';


-- -----------------------------------------------------
-- Table `directorioartistas`.`areas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`areas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `estado` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Áreas disponibles para la inscripción de perfiles artísitico /* comment truncated */ /*s (música, video, etc...)*/';


-- -----------------------------------------------------
-- Table `directorioartistas`.`perfiles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`perfiles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(255) NOT NULL ,
  `resena` TEXT NOT NULL ,
  `trayectoria` DATE NULL ,
  `web` VARCHAR(255) NULL ,
  `usuarios_id` INT NOT NULL ,
  `areas_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_perfiles_usuarios1_idx` (`usuarios_id` ASC) ,
  INDEX `fk_perfiles_areas1_idx` (`areas_id` ASC) ,
  CONSTRAINT `fk_perfiles_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `directorioartistas`.`usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_perfiles_areas1`
    FOREIGN KEY (`areas_id` )
    REFERENCES `directorioartistas`.`areas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Almacena los perfiles de los artistas';


-- -----------------------------------------------------
-- Table `directorioartistas`.`fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`fotos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(100) NOT NULL ,
  `src` VARCHAR(255) NOT NULL ,
  `ancho` INT NOT NULL ,
  `alto` INT NOT NULL ,
  `es_perfil` SMALLINT NOT NULL ,
  `estado` TINYINT NOT NULL DEFAULT 1 ,
  `perfiles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_fotos_perfiles1_idx` (`perfiles_id` ASC) ,
  CONSTRAINT `fk_fotos_perfiles1`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Fotos asociadas al perfil';


-- -----------------------------------------------------
-- Table `directorioartistas`.`redes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`redes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `logo` VARCHAR(255) NOT NULL ,
  `estado` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Redes sociales a vincular en un perfil';


-- -----------------------------------------------------
-- Table `directorioartistas`.`redes_has_perfiles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`redes_has_perfiles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `redes_id` INT NOT NULL ,
  `perfiles_id` INT NOT NULL ,
  `url` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`, `redes_id`, `perfiles_id`) ,
  INDEX `fk_redes_has_perfiles_perfiles1_idx` (`perfiles_id` ASC) ,
  INDEX `fk_redes_has_perfiles_redes1_idx` (`redes_id` ASC) ,
  CONSTRAINT `fk_redes_has_perfiles_redes1`
    FOREIGN KEY (`redes_id` )
    REFERENCES `directorioartistas`.`redes` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_redes_has_perfiles_perfiles1`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `directorioartistas`.`convocatorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`convocatorias` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(100) NOT NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `inicio_convocatoria` DATETIME NOT NULL ,
  `fin_convocatoria` DATETIME NOT NULL ,
  `inicio_evaluacion` DATETIME NOT NULL ,
  `fin_evaluacion` DATETIME NOT NULL ,
  `resultados` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Almacena las convocatorias para los artístas';


-- -----------------------------------------------------
-- Table `directorioartistas`.`propuestas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`propuestas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `representante` VARCHAR(150) NOT NULL ,
  `cedula` VARCHAR(100) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `celular` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(50) NOT NULL ,
  `direccion` VARCHAR(255) NOT NULL ,
  `trayectoria` TINYINT NOT NULL ,
  `numero_integrantes` INT NOT NULL ,
  `resena` TEXT NOT NULL ,
  `video` VARCHAR(255) NOT NULL ,
  `estado` TINYINT NOT NULL DEFAULT 1 ,
  `valor_presentacion` DOUBLE NOT NULL ,
  `rider` VARCHAR(255) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NULL ,
  `convocatorias_id` INT NOT NULL ,
  `perfiles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_propuestas_convocatorias1_idx` (`convocatorias_id` ASC) ,
  INDEX `fk_propuestas_perfiles1_idx` (`perfiles_id` ASC) ,
  CONSTRAINT `fk_propuestas_convocatorias1`
    FOREIGN KEY (`convocatorias_id` )
    REFERENCES `directorioartistas`.`convocatorias` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_propuestas_perfiles1`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Almacena las propuestas presentadas por los artístas a las c /* comment truncated */ /*onvocatorias*/';


-- -----------------------------------------------------
-- Table `directorioartistas`.`audios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`audios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `url` VARCHAR(255) NOT NULL ,
  `estado` TINYINT NOT NULL ,
  `perfiles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_audios_perfiles1_idx` (`perfiles_id` ASC) ,
  CONSTRAINT `fk_audios_perfiles1`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Audios asociados al perfil';


-- -----------------------------------------------------
-- Table `directorioartistas`.`videos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directorioartistas`.`videos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(100) NOT NULL ,
  `src` VARCHAR(255) NOT NULL ,
  `estado` TINYINT NOT NULL DEFAULT 1 ,
  `perfiles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_fotos_perfiles1_idx` (`perfiles_id` ASC) ,
  CONSTRAINT `fk_fotos_perfiles10`
    FOREIGN KEY (`perfiles_id` )
    REFERENCES `directorioartistas`.`perfiles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Fotos asociadas al perfil';

USE `directorioartistas` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
