-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema new_web_chef
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `new_web_chef` ;

-- -----------------------------------------------------
-- Schema new_web_chef
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `new_web_chef` DEFAULT CHARACTER SET utf8 ;
USE `new_web_chef` ;

-- -----------------------------------------------------
-- Table `new_web_chef`.`compras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `new_web_chef`.`compras` ;

CREATE TABLE IF NOT EXISTS `new_web_chef`.`compras` (
  `id_compras` INT(11) NOT NULL AUTO_INCREMENT,
  `cantidad_comprada` INT(11) NOT NULL,
  `und_medida` VARCHAR(45) NOT NULL,
  `precio` INT(11) NOT NULL,
  PRIMARY KEY (`id_compras`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `new_web_chef`.`gastos_relacionados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `new_web_chef`.`gastos_relacionados` ;

CREATE TABLE IF NOT EXISTS `new_web_chef`.`gastos_relacionados` (
  `id_gastos_adicionales` INT(11) NOT NULL AUTO_INCREMENT,
  `mano_de_obra(%)` INT(11) NOT NULL,
  `servicios_asociados(%)` INT(11) NOT NULL,
  `ganacia_deseada(%)` INT(11) NOT NULL,
  PRIMARY KEY (`id_gastos_adicionales`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `new_web_chef`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `new_web_chef`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `new_web_chef`.`usuarios` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `image` VARCHAR(100) NULL DEFAULT 'data-user/img/no-image.png',
  `date_registration` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `new_web_chef`.`recetas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `new_web_chef`.`recetas` ;

CREATE TABLE IF NOT EXISTS `new_web_chef`.`recetas` (
  `id_recipe` INT(11) NOT NULL AUTO_INCREMENT,
  `name_receta` VARCHAR(45) NOT NULL,
  `category` VARCHAR(45) NOT NULL,
  `img_path` VARCHAR(100) NOT NULL DEFAULT 'data-user/img/salmon.png',
  `creador` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  `date_creation` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USUARIOS_id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_recipe`),
  INDEX `fk_RECETAS_USUARIOS_idx` (`USUARIOS_id_user` ASC),
  CONSTRAINT `fk_RECETAS_USUARIOS`
    FOREIGN KEY (`USUARIOS_id_user`)
    REFERENCES `new_web_chef`.`usuarios` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `new_web_chef`.`productos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `new_web_chef`.`productos` ;

CREATE TABLE IF NOT EXISTS `new_web_chef`.`productos` (
  `id_productos` INT(11) NOT NULL AUTO_INCREMENT,
  `name_producto` VARCHAR(45) NULL,
  `cant_usada` INT(11) NULL,
  `und_medida` INT(11) NULL,
  `cantidad_comprada` INT(11) NULL,
  `und_med_comp` VARCHAR(10) NULL,
  `precio` INT(11) NULL,
  `RECETAS_id_recipe` INT(11) NOT NULL,
  PRIMARY KEY (`id_productos`),
  INDEX `fk_PRODUCTOS_RECETAS1_idx` (`RECETAS_id_recipe` ASC),
  CONSTRAINT `fk_PRODUCTOS_RECETAS1`
    FOREIGN KEY (`RECETAS_id_recipe`)
    REFERENCES `new_web_chef`.`recetas` (`id_recipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `new_web_chef`.`recalculos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `new_web_chef`.`recalculos` ;

CREATE TABLE IF NOT EXISTS `new_web_chef`.`recalculos` (
  `id_recalculos` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_recalculos`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- Consultas:
-- Registro usuario
-- insert into usuarios values (null, 'daya', 'daya@gmail.com', '123456', default);
-- insert into usuarios values (null, 'QTZ1MGVVSllPVHlZeEJXQkU2MjRCZz09', 'RlpuMFFnVFI3OVk2azVwanRuQ1BjZz09', 'YVYzTHg1M1hZNm9aY2NXbDA3ZDJ2Zz09', default);

-- Login Usaurio
-- select * from usuarios WHERE usuario = 'akVtaHlHYndWR0dDcmhFSWZoU0JKdz09' AND password = 'akVtaHlHYndWR0dDcmhFSWZoU0JKdz09';

-- formulario 1era parte
-- null id de la receta, 1er default es la imagen, 2do default es la fecha, 5 es el id del usuario registrado.
-- insert into recetas values (null, 'salmon', 'carne', default, 'daya', 'hola', default,5);

-- select * from usuarios U join recetas R on U.usuario = R.USUARIOS_id_user;
-- delete  from usuarios where id_user = 3;
-- select * from usuarios WHERE usuario='daya';
-- DELETE   FROM recetas WHERE id_recipe =1; -- Funciona el delete pero debo ubicar el id de la receta seleccionada.

-- Productos
-- SELECT * FROM new_web_chef.recetas WHERE USUARIOS_id_user = 1;
-- SELECT *  FROM productos WHERE productos.RECETAS_id_recipe = 31;
-- SELECT *  FROM new_web_chef.recetas, new_web_chef.productos WHERE USUARIOS_id_user = 1 AND recetas.id_recipe = productos.RECETAS_id_recipe;
-- SELECT * FROM recetas LEFT JOIN productos ON recetas.id_recipe = productos.RECETAS_id_recipe UNION SELECT * FROM recetas RIGHT JOIN productos ON recetas.id_recipe = productos.RECETAS_id_recipe;

-- consultas
select * from compras;
select * from usuarios;
select * from recetas;
select * from gastos_relacionados;
select * from recalculos;
select * from productos;