drop table if exists ventas_estadistica;

create table ventas_estadistica(
	marca varchar(50),
	id_articulo mediumint,
	mes mediumint,
	tres mediumint,
	seis mediumint,
	nueve mediumint,
	doce mediumint,
	costo mediumint,
	stock mediumint
);

alter table ventas_estadistica add index marca(marca);
alter table ventas_estadistica add index id_articulo(id_articulo);
alter table ventas_estadistica add index mes(mes);
alter table ventas_estadistica add index tres(tres);
alter table ventas_estadistica add index seis(seis);
alter table ventas_estadistica add index nueve(nueve);
alter table ventas_estadistica add index doce(doce);
