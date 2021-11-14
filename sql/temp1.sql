#----------------------------------------------------------------
create table pedidos_cajones(
        id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
        id_sucursal mediumint,
        numero_pedido mediumint,
        cajon mediumint,
        PRIMARY KEY (id)
);
alter table pedidos_cajones add index id_sucursal(id_sucursal);
alter table pedidos_cajones add index numero_pedido(numero_pedido);
#----------------------------------------------------------------



