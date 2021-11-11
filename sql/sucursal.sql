#tablas para casa central
#crear los indices

drop table articulos;
create table articulos (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	codigo_interno varchar(10),
	marca varchar(30),
	descripcion varchar(60),
	codigo_barra varchar(14),
	fecha date,
	hora time,
	clasificacion varchar(30),
	subclasificacion varchar(30),
	PRIMARY KEY (id)
);
alter table articulos add index descripcion(descripcion);
alter table articulos add index codigo_barra(codigo_barra);
alter table articulos add index clasificacion(clasificacion);
alter table articulos add index subclasificacion(subclasificacion);

drop table precios;
create table precios (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	precio1 double(6,2),
	precio2 double(6,2),
	fecha date,
	hora time,
	PRIMARY KEY (id)
);

drop table stock;
create table stock (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	stock varchar(10),
	maximo varchar(10),
	minimo varchar(10),
	ubicacion varchar(2),
	fecha date,
	hora time,
	PRIMARY KEY (id)
);

#tipos compra, venta, modificacion, ingreso, moviemiento
#compra = ingreso
#movimiento= origen a destino
drop table seguimiento_stock;
create table seguimiento_stock(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	tipo varchar(6),
	cantidad varchar(10),
	origen MEDIUMINT,
	destino MEDIUMINT,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);


drop table sucursal;
create table sucursal(
	id MEDIUMINT UNSIGNED NOT NULL,
	sucursal varchar(20),
	PRIMARY KEY (id)
);
insert into sucursal values("1","deposito");

drop table ventas;
create table ventas(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	descripcion varchar(60),
	cantidad double(6,0),
	precio_unitario double(6,0),
	sucursal varchar(20),
	fecha date,
	hora time,
	sincro varchar(1),
	PRIMARY KEY (id)
);
alter table ventas add index fecha(fecha);

drop table ventas_pendientes;
create table ventas_pendientes(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	descripcion varchar(60),
	cantidad double(6,0),
	precio_unitario double(6,0),
	id_sucursal MEDIUMINT,
	fecha date,
	hora time,
	sesion varchar(10),
	PRIMARY KEY (id)
);
alter table ventas_pendientes add index fecha(fecha);
alter table ventas_pendientes add index sesion(sesion);


#en sincronizaciones el tipo es ventas y stock
drop table sincronizaciones;
create table sincronizaciones(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	tipo varchar(6),
	fecha date,
	hora time,
	PRIMARY KEY (id)
);


drop table cajas;
create table cajas (
id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_sucursal MEDIUMINT,
	total_ventas double(6,2),
	cantidad_ventas double(5,0),
	articulos_vendidos double(5,0),
	fecha_apertura date,
	hora_apertura time,
	fecha_cierre date,
	hora_cierre time,
	sincro varchar(1),
	PRIMARY KEY (id)
);
alter table cajas add index id_sucursal(id_sucursal);

drop table numero_caja;
create table numero_caja (
	id double(1,0),
	numero double(6,0)
);
insert into numero_caja values ("1","1");
