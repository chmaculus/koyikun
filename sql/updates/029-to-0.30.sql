drop table if exists precios_temp1;
create table precios_temp1 (
	id_session varchar(40),
	id_articulo MEDIUMINT UNSIGNED NOT NULL,
	precio double(6,2)
);
alter table precios_temp1 add index id_session(id_session);
alter table precios_temp1 add index precio(precio);


drop table if exists variables_temporales;
create table variables_temporales (
	id_session varchar(40),
	descripcion varchar(30),
	valor varchar(512)
);
alter table variables_temporales add index id_session(id_session);
alter table variables_temporales add index descripcion(descripcion);

