use lucas2;
#alter table ventas add costo double;
#alter table ventas_temp add session_finaliza varchar(20);

#alter table costos add fecha_gerencia date;
#alter table costos add hora_gerencia  time; 


DROP TABLE IF EXISTS novedades;
create table novedades (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_sucursal varchar(3),
	motivo varchar(30),
	texto text,
	vigencia_inicio date,
	vigencia_finaliza date,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table novedades add index id_sucursal(id_sucursal);
alter table novedades add index vigencia_inicio(vigencia_inicio);
alter table novedades add index vigencia_finaliza(vigencia_finaliza);

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

