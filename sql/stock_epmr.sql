#----------------------------------------------------------------
drop table if exists stock_epmr;
create table stock_epmr(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulo MEDIUMINT,
	estanteria DOUBLE,
	piso DOUBLE,
	modulo DOUBLE,
	reserva DOUBLE,
	PRIMARY KEY (id)
);

alter table stock_epmr add index id_articulo(id_articulo);
#----------------------------------------------------------------

