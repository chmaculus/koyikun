#---------------------------------------------------------
DROP TABLE IF EXISTS costos;
create table costos (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulos MEDIUMINT,
	precio_costo double,
	moneda varchar(6),
	descuento1 double,
	descuento2 double,
	descuento3 double,
	descuento4 double,
	descuento5 double,
	descuento6 double,
	descuento7 double,
	descuento8 double,
	descuento9 double,
	descuento10 double,
	iva double,
	margen double,
	fecha date,
	hora time, 
	fecha_gerencia date,
	hora_gerencia time, 
	PRIMARY KEY (id)
);
alter table costos add index id_articulos(id_articulos);
#---------------------------------------------------------


#---------------------------------------------------------
DROP TABLE IF EXISTS costos_detalle;
create table costos_detalle (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	detalle text,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table costos_detalle add index fecha(fecha);
#---------------------------------------------------------


#---------------------------------------------------------
DROP TABLE IF EXISTS costos_seguimiento;
create table costos_seguimiento (
	id_articulo MEDIUMINT UNSIGNED,
	id_costos_detalle MEDIUMINT UNSIGNED,
	costo_anterior double,
	costo_nuevo double,
	tipo_cambio varchar(1),
	fecha date,
	hora time
);
alter table costos_seguimiento add index id_articulo(id_articulo);
alter table costos_seguimiento add index id_costos_detalle(id_costos_detalle);
alter table costos_seguimiento add index fecha(fecha);
#---------------------------------------------------------

