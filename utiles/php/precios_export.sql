
#------------------------------------------------------------------
DROP TABLE IF EXISTS articulos_export; 
create table articulos_export (
	id MEDIUMINT UNSIGNED NOT NULL,
	codigo_interno varchar(10),
	marca varchar(30),
	descripcion varchar(80),
	contenido varchar(80),
	presentacion varchar(80),
	codigo_barra varchar(14),
	clasificacion varchar(60),
	subclasificacion varchar(60),
	precio_base double,
	porcentaje_contado double(6,2),
	porcentaje_tarjeta double(6,2),
	promocion varchar(1),
	fecha date,
	hora time
);
alter table articulos_export add index id(id);
alter table articulos_export add index marca(marca);
alter table articulos_export add index descripcion(descripcion);
alter table articulos_export add index codigo_barra(codigo_barra);
alter table articulos_export add index clasificacion(clasificacion);
alter table articulos_export add index subclasificacion(subclasificacion);
#------------------------------------------------------------------

