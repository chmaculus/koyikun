


#-----------------------------------------------------------
create table facturas_compra (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha_factura date,
	proveedor varchar(30),
	numero_factura varchar(25),
	importe double(14,2),
	fecha_ingreso date,
	hora_ingreso time,
	PRIMARY KEY (id)
);
alter table facturas_compra add index fecha_factura(fecha_factura);
alter table facturas_compra add index proveedor(proveedor);
alter table facturas_compra add index numero_factura(numero_factura);
#-----------------------------------------------------------


