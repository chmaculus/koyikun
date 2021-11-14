


#-----------------------------------------------------------
create table categorias_web (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	categoria varchar(60),
	subcategoria varchar(60),
	PRIMARY KEY (id)
);
alter table categorias_web add index subcategoria(subcategoria);
alter table categorias_web add index categoria(categoria);
#-----------------------------------------------------------




#-----------------------------------------------------------
create table web (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	sku varchar(10),
	id_articulo MEDIUMINT,
	id_categoria MEDIUMINT,
	descripcion varchar(80),
	contenido varchar(80),
	presentacion varchar(80),
	descripcion_corta varchar(60),
	PRIMARY KEY (id)
);
alter table web add index marca(marca);
alter table web add index descripcion(descripcion);
alter table web add index codigo_barra(codigo_barra);
alter table web add index clasificacion(clasificacion);
alter table web add index subclasificacion(subclasificacion);
#-----------------------------------------------------------

