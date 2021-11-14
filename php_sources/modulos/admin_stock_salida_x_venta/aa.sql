#----------------------------------------------------------------
drop table if exists ventas_temp3;
create table ventas_temp3(
	id_session varchar(32),
	id_articulo  MEDIUMINT,
	marca varchar(30),
	descripcion varchar(60),
	clasificacion varchar(40),
	subclasificacion varchar(40),
	contenido varchar(30),
	presentacion varchar(30)
);
alter table ventas_temp3 add index marca(marca);
alter table ventas_temp3 add index clasificacion(clasificacion);
alter table ventas_temp3 add index subclasificacion(subclasificacion);
alter table ventas_temp3 add index contenido(contenido);
alter table ventas_temp3 add index presentacion(presentacion);
alter table ventas_temp3 add index descripcion(descripcion);
#----------------------------------------------------------------


alter table ventas modify id MEDIUMINT NOT NULL AUTO_INCREMENT;