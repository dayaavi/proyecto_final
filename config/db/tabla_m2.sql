SET SQL_SAFE_UPDATES = 0; 
-- -----------------------------------------------------
-- Schema m2
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `m2` ;
-- -----------------------------------------------------
-- Schema m2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `m2` DEFAULT CHARACTER SET utf8 ;
USE `m2` ;

CREATE table USUARIOS(
	id int primary key auto_increment,
	usuario varchar(100),
    psw varchar(100)
);
-- comprobación 
select * from USUARIOS;
select * from usuarios WHERE usuario = "SThIWkRhVzlDelB0SEl3anlsVnRCdz09" AND psw = "OXU0ZEVnY3VQTndMc0pWd1RyWlBIdz09";

CREATE table REGISTRO(
	id int primary key auto_increment,
	usuario varchar(100),
    fecha_registro timestamp
);

drop trigger if exists registroTrigger;
delimiter $$
create trigger registroTrigger after insert on USUARIOS 
for each row
begin
	insert into REGISTRO VALUES (null, new.usuario, null);
end $$

delimiter ;

-- comprobación 
select * from REGISTRO;

