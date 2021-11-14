/*
permisos en usuarios
0-1-0-1-0-1-0-1-0-1
1- modifica precios
2- modifica stock
3- ingreso comisiones
4- listado de comisiones


jerarquias
0 administrador
1 encargado sucursal
2 usuario sucursal
*/

drop table usuarios;
create table usuarios (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombre varchar(60),
	usuario varchar(60),
	contrasena varchar(30),
	id_sucursal MEDIUMINT UNSIGNED,
	jerarquia MEDIUMINT UNSIGNED,
	activado varchar(1),
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table usuarios add index usuario(usuario);
alter table usuarios add index nombre(nombre);
