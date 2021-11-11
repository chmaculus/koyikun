
DROP TABLE IF EXISTS reportes;
create table reportes (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_sucursal INT,
	motivo varchar(30),
	texto text,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table reportes add index id_sucursal(id_sucursal);
alter table reportes add index fecha(fecha);

