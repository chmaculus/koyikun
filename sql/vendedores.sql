#---------------------------------------------------------
DROP TABLE IF EXISTS vendedores;
create table vendedores (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_legajo MEDIUMINT,
	numero double,
	apellido varchar(50),
	nombres varchar(50),
	fecha date,
	hora time, 
	PRIMARY KEY (id)
);
alter table vendedores add index id_legajo(id_legajo);
alter table vendedores add index numero(numero);
#---------------------------------------------------------
