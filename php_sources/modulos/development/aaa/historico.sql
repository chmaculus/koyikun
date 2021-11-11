#----------------------------------------------------------------
create table ventas_historico(
	sucursal varchar(20),
	anio INT,
	mes INT,
	total double
);
alter table ventas_historico add index sucursal(sucursal);
alter table ventas_historico add index anio(anio);
alter table ventas_historico add index mes(mes);
#----------------------------------------------------------------