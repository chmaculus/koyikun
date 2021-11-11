


#-----------------------------------------------------------
create table articulos (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	codigo_interno varchar(10),
	marca varchar(30),
	descripcion varchar(80),
	contenido varchar(80),
	presentacion varchar(80),
	codigo_barra varchar(14),
	fecha date,
	hora time,
	clasificacion varchar(60),
	subclasificacion varchar(60),
	PRIMARY KEY (id)
);
alter table articulos add index marca(marca);
alter table articulos add index descripcion(descripcion);
alter table articulos add index codigo_barra(codigo_barra);
alter table articulos add index clasificacion(clasificacion);
alter table articulos add index subclasificacion(subclasificacion);
#-----------------------------------------------------------


#-----------------------------------------------------------
create table precios (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulo MEDIUMINT UNSIGNED NOT NULL,
	precio_base double(6,2),
	porcentaje_contado double(6,2),
	porcentaje_tarjeta double(6,2),
	id_sucursal MEDIUMINT,
	fecha date,
	hora time,
	promocion varchar(1),
	PRIMARY KEY (id)
);
alter table precios add index id_sucursal(id_sucursal);
alter table precios add index id_articulo(id_articulo);
#-----------------------------------------------------------

#-----------------------------------------------------------
create table precios_temp1 (
	id_session varchar(40),
	id_articulo MEDIUMINT UNSIGNED NOT NULL,
	precio double(6,2)
);
alter table precios_temp1 add index id_session(id_session);
alter table precios_temp1 add index precio(precio);
#-----------------------------------------------------------



#-----------------------------------------------------------
create table stock (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulo MEDIUMINT,
	stock MEDIUMINT,
	maximo MEDIUMINT,
	minimo MEDIUMINT,
	id_sucursal MEDIUMINT,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table stock add index id_sucursal(id_sucursal);
alter table stock add index id_articulo(id_articulo);
alter table stock add index stock(stock);
alter table stock add index minimo(minimo);
alter table stock add index maximo(maximo);
#-----------------------------------------------------------

#tipos compra, venta, modificacion, ingreso, moviemiento
#compra = ingreso
#movimiento= origen a destino 2 registros uno para la salida y el otro para la entrada
#


#-----------------------------------------------------------
create table seguimiento_stock(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulo MEDIUMINT UNSIGNED NOT NULL,
	stock_anterior MEDIUMINT,
	stock_nuevo MEDIUMINT,
	cantidad MEDIUMINT,
	tipo varchar(2),
	origen varchar(25),
	destino varchar(25),
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table seguimiento_stock add index id_articulo(id_articulo);
alter table seguimiento_stock add index origen(origen);
alter table seguimiento_stock add index destino(destino);
alter table seguimiento_stock add index tipo(tipo);
#-----------------------------------------------------------

#-----------------------------------------------------------
drop table if exists stock_seguimiento;
create table stock_seguimiento(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulo MEDIUMINT UNSIGNED NOT NULL,
	stock_anterior MEDIUMINT,
	stock_nuevo MEDIUMINT,
	tipo varchar(2),
	origen varchar(25),
	destino varchar(25),
	usuario varchar(25),
	jerarquia MEDIUMINT,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table stock_seguimiento add index id_articulo(id_articulo);
alter table stock_seguimiento add index origen(origen);
alter table stock_seguimiento add index destino(destino);
alter table stock_seguimiento add index tipo(tipo);
#-----------------------------------------------------------

