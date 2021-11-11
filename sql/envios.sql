DROP TABLE IF EXISTS stock_movimiento;
create table stock_movimiento (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulos MEDIUMINT,
	numero_envio MEDIUMINT,
	marca varchar(30),
	descripcion varchar(60),
	contenido varchar(30),
	presentacion varchar(30),
	clasificacion varchar(40),
	subclasificacion varchar(40),
	cantidad double(6,0),
	id_origen INT,
	id_destino INT,
	verificado varchar(1), 
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table stock_movimiento add index id_articulos(id_articulos);
alter table stock_movimiento add index numero_envio(numero_envio);
alter table stock_movimiento add index id_origen(id_origen);
alter table stock_movimiento add index id_destino(id_destino);
alter table stock_movimiento add index fecha(fecha);


