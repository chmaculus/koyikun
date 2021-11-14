DROP TABLE IF EXISTS sessiones_activas;
create table sessiones_activas (
	id_session varchar(40),
	usuario varchar(20),
	id_sucursal MEDIUMINT,
	jerarquia varchar(5),
	finaliza varchar(20)
);
alter table sessiones_activas add index id_session(id_session);


DROP TABLE IF EXISTS datos_caja;
create table datos_caja (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	numero_suc varchar(5),
	fecha date,
	total_efectivo double(10,2),
	total_tarjeta double(10,2),
	sin_comision double(10,2),
	turno varchar(1),
	fecha_sistema date,
	hora_sistema time,
	id_sucursal MEDIUMINT,
	id_session varchar(30),
	PRIMARY KEY (id)
);
alter table datos_caja add index fecha_sistema(fecha_sistema);
alter table datos_caja add index fecha(fecha);

DROP TABLE IF EXISTS comisiones_vendedores;
create table comisiones_vendedores(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_datos_caja MEDIUMINT UNSIGNED,
	fecha date,
	turno varchar(1),
	vendedor varchar(10),
	linea varchar(20),
	total double(10,2),
	fecha_sistema date,
	hora_sistema time,
	id_sucursal MEDIUMINT,
	id_session varchar(30),
	PRIMARY KEY (id)
);
alter table comisiones_vendedores add index id_session(id_session); 
alter table comisiones_vendedores add index vendedor(vendedor); 
alter table comisiones_vendedores add index fecha(fecha); 
alter table comisiones_vendedores add index fecha_sistema(fecha_sistema); 
alter table comisiones_vendedores add index linea(linea); 
alter table comisiones_vendedores add index turno(turno); 

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
	PRIMARY KEY (id)
);
alter table costos add index id_articulos(id_articulos);


DROP TABLE IF EXISTS valores;
create table valores(
    id MEDIUMINT UNSIGNED NOT NULL ,
    descripcion varchar(60),
    valor varchar(60)
);
alter table valores add index id(id);
alter table valores add index descripcion(descripcion);

insert into valores set id="1", descripcion="precio dolar", valor="3.65";
insert into valores set id="2", descripcion="I.V.A.", valor="10.5";
insert into valores set id="3", descripcion="I.V.A.", valor="21";

alter table precios modify precio_base double;

drop table sincronizaciones;
drop table inter1;
drop table comisiones;


insert into usuarios set usuario="megatron", contrasena="salchichon", jerarquia="5";
