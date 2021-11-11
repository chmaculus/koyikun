


#-----------------------------------------------------------
drop table if exists pedidos_proveedor_envio;
create table pedidos_proveedor_envio (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	numero_pedido mediumint(10),
	operado varchar(30),
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table pedidos_proveedor_envio add index numero_pedido(numero_pedido);
#-----------------------------------------------------------
