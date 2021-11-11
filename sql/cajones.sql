#----------------------------------------------------------------
drop table if exists cajones;
create table cajones(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	sucursal_origen varchar(15),
	sucursal_destino varchar(15),
	vendedor_envia varchar(10),
	vendedor_recibe varchar(10),
	fechao date,
	horao time, 
	fechad date,
	horad time,
	estado varchar(1), 
	PRIMARY KEY (id)
);

alter table cajones add index fechao(fechao);
alter table cajones add index estado(estado);
#----------------------------------------------------------------


drop table if exists cajones2;
create table cajones2(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	numero int,
	PRIMARY KEY (id)
);

alter table cajones2 add index numero(numero);
#----------------------------------------------------------------

#----------------------------------------------------------------
drop table if exists cajones_temp;
create table cajones_temp(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_session varchar(32),
	sucursal_origen varchar(15),
	sucursal_destino varchar(15),
	vendedor_envia varchar(10),
	vendedor_recibe varchar(10),
	fechao date,
	horao time, 
	fechad date,
	horad time,
	PRIMARY KEY (id)
);

alter table cajones_temp add index fechao(fechao);
alter table cajones_temp add index id_session(id_session);
#----------------------------------------------------------------

#----------------------------------------------------------------
drop table if exists cajones_contenido;
create table cajones_contenido(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_cajon MEDIUMINT UNSIGNED,
	id_articulo MEDIUMINT UNSIGNED,
	marca varchar(30),
	descripcion varchar(60),
	contenido varchar(30),
	presentacion varchar(30),
	clasificacion varchar(40),
	subclasificacion varchar(40),
	precio_unitario double,
	cantidad double(6,0),
	PRIMARY KEY (id)
);

alter table cajones_contenido add index id_cajon(id_cajon);
alter table cajones_contenido add index id_articulo(id_articulo);


#----------------------------------------------------------------

#----------------------------------------------------------------
drop table if exists cajones_contenido_temp;
create table cajones_contenido_temp(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_cajon MEDIUMINT UNSIGNED,
	id_session varchar(32),
	id_articulo MEDIUMINT UNSIGNED,
	marca varchar(30),
	descripcion varchar(60),
	contenido varchar(30),
	presentacion varchar(30),
	clasificacion varchar(40),
	subclasificacion varchar(40),
	precio_unitario double,
	cantidad double(6,0),
	PRIMARY KEY (id)
);

alter table cajones_contenido_temp add index id_cajon(id_cajon);
alter table cajones_contenido_temp add index id_articulo(id_articulo);
alter table cajones_contenido_temp add index id_session(id_session);


#----------------------------------------------------------------




