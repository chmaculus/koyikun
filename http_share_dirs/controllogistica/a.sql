use koyikun;
select * from pedidos where estado is NULL and finalizado is null and fecha_envio is NULL and fecha="2020-01-27" order by fecha limit 0,1;
select * from pedidos where numero_pedido="3485" and sucursal=4 limit 0,1;

