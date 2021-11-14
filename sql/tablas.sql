#tablas para casa central
#crear los indices


#----------------------------------------------------------------
create table sucursales(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	sucursal varchar(20),
	PRIMARY KEY (id)
);
alter table sucursales add index sucursal(sucursal);
#----------------------------------------------------------------


#----------------------------------------------------------------
create table ventas(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulo MEDIUMINT UNSIGNED,
	numero_venta double(6,0),
	marca varchar(30),
	descripcion varchar(60),
	contenido varchar(30),
	presentacion varchar(30),
	clasificacion varchar(40),
	subclasificacion varchar(40),
	cantidad double(6,0),
	precio_unitario double,
	sucursal varchar(20),
	tipo_pago varchar(2),
	vendedor varchar(30),
	costo double,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table ventas add index fecha(fecha);
alter table ventas add index hora(hora);
alter table ventas add index marca(marca);
alter table ventas add index sucursal(sucursal);
alter table ventas add index vendedor(vendedor);
alter table ventas add index tipo_pago(tipo_pago);
alter table ventas add index clasificacion(clasificacion);
alter table ventas add index subclasificacion(subclasificacion);
alter table ventas add index contenido(contenido);
alter table ventas add index presentacion(presentacion);
alter table ventas add index descripcion(descripcion);
#----------------------------------------------------------------

#----------------------------------------------------------------
create table numero_venta(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	numero mediumint,
	id_sucursal mediumint,
	PRIMARY KEY (id)
);
#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS ventas_temp;
create table ventas_temp(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_session varchar(20),
	id_sucursal MEDIUMINT UNSIGNED,
	id_articulos MEDIUMINT UNSIGNED,
	session_finaliza varchar(20),
	PRIMARY KEY (id)
);
alter table ventas_temp add index id_session(id_session);
alter table ventas_temp add index id_articulos(id_articulos);
#----------------------------------------------------------------

#----------------------------------------------------------------
DROP TABLE IF EXISTS ventas_temp2;
create table ventas_temp2(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_session varchar(20),
	id_sucursal MEDIUMINT UNSIGNED,
	id_articulos MEDIUMINT UNSIGNED,
	codigo_interno varchar(10),
	marca varchar(30),
	descripcion varchar(80),
	contenido varchar(80),
	presentacion varchar(80),
	codigo_barra varchar(14),
	clasificacion varchar(60),
	subclasificacion varchar(60),
	cantidad double(6,0),
	session_finaliza varchar(20),
	PRIMARY KEY (id)
);
alter table ventas_temp2 add index id_session(id_session);
alter table ventas_temp2 add index id_articulos(id_articulos);
alter table ventas_temp2 add index marca(marca);
alter table ventas_temp2 add index descripcion(descripcion);
alter table ventas_temp2 add index clasificacion(clasificacion);
alter table ventas_temp2 add index subclasificacion(subclasificacion);
alter table ventas_temp2 add index contenido(contenido);
alter table ventas_temp2 add index presentacion(presentacion);
#----------------------------------------------------------------


#----------------------------------------------------------------
drop table if exists ventas_temp3;
create table ventas_temp3(
	id_session varchar(32),
	id_articulo  MEDIUMINT,
	marca varchar(30),
	descripcion varchar(60),
	clasificacion varchar(40),
	subclasificacion varchar(40),
	contenido varchar(30),
	presentacion varchar(30)
);
alter table ventas_temp3 add index marca(marca);
alter table ventas_temp3 add index clasificacion(clasificacion);
alter table ventas_temp3 add index subclasificacion(subclasificacion);
alter table ventas_temp3 add index contenido(contenido);
alter table ventas_temp3 add index presentacion(presentacion);
alter table ventas_temp3 add index descripcion(descripcion);
#----------------------------------------------------------------




#----------------------------------------------------------------
#en sincronizaciones el tipo es ventas y stock
#todavia no se usa
create table sincronizaciones(
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	tipo varchar(6),
	id_sucursal MEDIUMINT,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
#----------------------------------------------------------------


#----------------------------------------------------------------
create table cajas (
id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_sucursal MEDIUMINT,
	total_ventas double(6,2),
	cantidad_ventas double(5,0),
	articulos_vendidos double(5,0),
	fecha_apertura date,
	hora_apertura time,
	fecha_cierre date,
	hora_cierre time,
	PRIMARY KEY (id)
);
alter table cajas add index id_sucursal(id_sucursal);
#----------------------------------------------------------------


#----------------------------------------------------------------
create table numero_caja (
	id double(1,0),
	id_sucursal double(1,0),
	numero double(6,0)
);
insert into numero_caja values ("1","1");
#----------------------------------------------------------------


#----------------------------------------------------------------
create table comisiones (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	vendedor varchar(60),
	sucursal varchar(30),
	linea varchar(30),
	monto double(10,2),
	fecha date,
	fechaactual date,
	horaactual time,
	PRIMARY KEY (id)
);
alter table comisiones add index vendedor(vendedor);
alter table comisiones add index fecha(fecha);
alter table comisiones add index fechaactual(fechaactual);
#----------------------------------------------------------------



#----------------------------------------------------------------
create table promociones (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulos MEDIUMINT,
	id_sucursal MEDIUMINT,
	fecha_inicio date,
	fecha_finaliza date, 
	precio_promocion double(6,2),
	habilitado varchar(1),
	PRIMARY KEY (id)
);
alter table promociones add index id_articulos(id_articulos);
alter table promociones add index id_sucursal(id_sucursal);
alter table promociones add index fecha_inicio(fecha_inicio);
alter table promociones add index fecha_finaliza(fecha_finaliza);
alter table promociones add index habilitado(habilitado);
#----------------------------------------------------------------


#----------------------------------------------------------------
create table listas (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombre varchar(30),
	porcentaje double(6,2),
	PRIMARY KEY (id)
);
alter table listas add index nombre(nombre);
#----------------------------------------------------------------


#----------------------------------------------------------------
create table listas_porcentaje (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_lista MEDIUMINT UNSIGNED,
	id_articulos MEDIUMINT UNSIGNED,
	porcentaje double(6,2),
	PRIMARY KEY (id)
);
alter table listas_porcentaje add index id_lista(id_lista);
alter table listas_porcentaje add index id_articulos(id_articulos);
#----------------------------------------------------------------


#----------------------------------------------------------------
create table porcentaje_vendedores (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	vendedor varchar(20),
	linea varchar(20),
	porcentaje double(6,2),
	PRIMARY KEY (id)
);
alter table porcentaje_vendedores add index vendedor(vendedor);
alter table porcentaje_vendedores add index linea(linea);
#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS sessiones_activas;
create table sessiones_activas (
	id_session varchar(40),
	usuario varchar(20),
	id_sucursal MEDIUMINT,
	jerarquia varchar(5),
	inicio varchar(20),
	finaliza varchar(20),
	ip varchar(15),
	navegador TinyText
	);
alter table sessiones_activas add index id_session(id_session);
#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS datos_caja;
create table datos_caja (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	numero_suc varchar(5),
	fecha date,
	total_efectivo double(10,2),
	total_tarjeta double(10,2),
	sin_comision double(10,2),
	turno varchar(1),
	fecha_sistema date,
	hora_sistema time,
	id_sucursal MEDIUMINT,
	id_session varchar(30),
	PRIMARY KEY (id)
);
alter table datos_caja add index fecha_sistema(fecha_sistema);
alter table datos_caja add index fecha(fecha);
#----------------------------------------------------------------

#----------------------------------------------------------------
DROP TABLE IF EXISTS datos_caja2;
create table datos_caja2 (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha date,
	total_efectivo double(10,2),
	sin_comision double(10,2),
	turno varchar(1),
	fecha_sistema date,
	hora_sistema time,
	sucursal varchar(20),
	id_session varchar(30),
	PRIMARY KEY (id)
);
alter table datos_caja2 add index fecha_sistema(fecha_sistema);
alter table datos_caja2 add index fecha(fecha);
alter table datos_caja2 add index sucursal(sucursal);
#----------------------------------------------------------------

#----------------------------------------------------------------
DROP TABLE IF EXISTS reportes_caja;
create table reportes_caja (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	motivo varchar(1),
	importe double,
	vendedor varchar(10),
	codigo_buzon varchar(20),
	sucursal varchar(15),
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table reportes_caja add index fecha(fecha);
alter table reportes_caja add index hora(hora);
alter table reportes_caja add index sucural(sucursal);
#----------------------------------------------------------------



#----------------------------------------------------------------
DROP TABLE IF EXISTS descuentos_autorizaciones;
create table descuentos_autorizaciones (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	hash varchar(35),
	n_carnet varchar(20),
	nombre varchar(25),
	apellido varchar(25),
	id_sucursal	mediumint(8) unsigned,
	codigo varchar(40),
	PRIMARY KEY (id)
);
alter table descuentos_autorizaciones add index hash(hash);
alter table descuentos_autorizaciones add index n_carnet(n_carnet);
alter table descuentos_autorizaciones add index id_sucursal(id_sucursal);
#----------------------------------------------------------------




#----------------------------------------------------------------
DROP TABLE IF EXISTS ventas_pagos_tarjeta;
create table ventas_pago_tarjeta (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	numero_venta MEDIUMINT,
	sucursal varchar(20),
	nombre_tarjeta varchar(20),
	monto double,
	cuotas double,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table ventas_pago_tarjeta add index numero_venta(numero_venta);
alter table ventas_pago_tarjeta add index sucursal(sucursal);

#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS cuota_alquiler;
create table cuota_alquiler (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	sucursal varchar(20),
	a double,
	b double,
	PRIMARY KEY (id)
);

#----------------------------------------------------------------




#----------------------------------------------------------------
DROP TABLE IF EXISTS pedidos_control;
create table pedidos_control (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	empresa varchar(30),
	responsable varchar(30),
	importe_pedido double(14,2),
	fecha_genera date,
	fecha_envio date,
	fecha_recepcion date,
	fecha_pago date,
	rceptor varchar(30),
	import_recibido_a double(14,2),
	import_recibido_b double(14,2),
	n_correo varchar(50),
	PRIMARY KEY (id)
);
alter table pedidos_control add index empresa(empresa);

#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS pedidos_control_pagos;
create table pedidos_control_pagos (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_pedidos_control MEDIUMINT,
	tipo_pago varchar(20),
	tipo_cuenta varchar(20),
	empresa varchar(30),
	n_cheque_cuenta varchar(35),
	banco varchar(35),
	importe double(14,2),
	fecha_sistema date,
	hora_sistema time,
	fecha_emision date,
	fecha_vencimiento date,
	PRIMARY KEY (id)
);
alter table pedidos_control_pagos add index id_pedidos_control(i);

#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS cajas_deudores;
create table cajas_deudores (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	deudor varchar(30),
	PRIMARY KEY (id)
);
alter table cajas_deudores add index deudor(deudor);
#----------------------------------------------------------------



#----------------------------------------------------------------
DROP TABLE IF EXISTS estadisticas_ventas_hora;
create table estadisticas_ventas_hora (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	sucursal varchar(30),
	desde INT,
	hasta INT,
	PRIMARY KEY (id)
);
alter table estadisticas_ventas_hora add index sucursal(sucursal);
alter table estadisticas_ventas_hora add index desde(desde);
#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS pedidos_recepcion_d;
create table pedidos_recepcion_d (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	proveedor varchar(30),
	numero_factura varchar(30),
	fecha_factura date,
	razon_social varchar(30),
	importe double(14,2),
	tipo varchar (1),
	observaciones text,
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table pedidos_recepcion_d add index fecha(fecha);
alter table pedidos_recepcion_d add index fecha_factura(fecha_factura);
alter table pedidos_recepcion_d add index proveedor(proveedor);
alter table pedidos_recepcion_d add index razon_social(razon_social);
#----------------------------------------------------------------

#----------------------------------------------------------------
DROP TABLE IF EXISTS pedidos_envio_suc_temp;
create table pedidos_envio_suc_temp (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_session varchar(35),
	numero_pedido mediumint,
	id_sucursal mediumint,
	PRIMARY KEY (id)
);
alter table pedidos_envio_suc_temp add index numero_pedido(numero_pedido);
alter table pedidos_envio_suc_temp add index id_sucursal(id_sucursal);
#----------------------------------------------------------------

#----------------------------------------------------------------
DROP TABLE IF EXISTS ventas_datos_clientes;
create table ventas_datos_clientes (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	sucursal varchar(20),
	numero_venta MEDIUMINT,
	sexo varchar(1),
	rango varchar(2),
	nombre varchar(50),
	celular varchar(25),
	localidad varchar(25),
	provincia varchar(25),
	nacionalidad varchar(25),
	fecha date,
	hora time,
	PRIMARY KEY (id)
);
alter table ventas_datos_clientes add index sucursal(sucursal);
alter table ventas_datos_clientes add index sexo(sexo);
alter table ventas_datos_clientes add index rango(rango);
alter table ventas_datos_clientes add index fecha(fecha);
#----------------------------------------------------------------

#----------------------------------------------------------------
DROP TABLE IF EXISTS servicio_tecnico;
create table servicio_tecnico (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	apellido varchar(25),
	nombres varchar(30),
	direccion varchar(35),
	celular varchar(25),
	marca varchar(25),
	codigo_servicio varchar(10),
	modelo varchar(25),
	n_de_serie varchar(25),
	falla_declarada text,
	falla_encontrada text,
	servicio_realizado text,
	estado varchar(1),
	mano_de_obra double(14,2),
	repuestos double(14,2),
	acepta varchar(1), 
	total double(14,1),
	retirado varchar(1),
	fecha_ingreso date,
	hora_ingreso time,
	fecha_retiro date,
	hora_retiro time,
	PRIMARY KEY (id)
);
alter table servicio_tecnico add index apellido(apellido);
alter table servicio_tecnico add index nombres(nombres);
alter table servicio_tecnico add index codigo_servicio(codigo_servicio);
#----------------------------------------------------------------





#----------------------------------------------------------------
DROP TABLE IF EXISTS servicio_tecnico_seguimiento;
create table servicio_tecnico_seguimiento(
    id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_servicio MEDIUMINT UNSIGNED,
    estado_servicio varchar(10),
    estado_reparacion varchar(10),
    fecha date,
    hora time,
    PRIMARY KEY (id)
);
alter table servicio_tecnico_seguimiento add index id_servicio(id_servicio,fecha,hora);
#----------------------------------------------------------------



#----------------------------------------------------------------
DROP TABLE IF EXISTS codigos_autorizados;
create table codigos_autorizados(
    id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_servicio MEDIUMINT UNSIGNED,
    tipo varchar(20),
    codigo varchar(20),
    fecha date,
    hora time,
    fecha_vigencia date,
    fecha_caducidad date,
    PRIMARY KEY (id)
);
alter table codigos_autorizados add index codigo(codigo);
#----------------------------------------------------------------


#----------------------------------------------------------------
drop table if pedidos_seguimiento; create table pedidos_seguimiento(
        id MEDIUMINT,
        id_sucursal MEDIUMINT,
        numero_pedido MEDIUMINT,
        ubicacion varchar(20),
        fecha date,
        hora time,
        PRIMARY KEY (id)
);
alter table pedidos_seguimiento add index id_sucursal(id_sucursal);
alter table pedidos_seguimiento add index numero_pedido(numero_pedido);
alter table pedidos_seguimiento add index fecha(fecha);
alter table pedidos_seguimiento add index hora(hora);
#------------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS reparto_zonas;
create table reparto_zonas(
    id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
                 zona varchar(10),
                 id_sucursal int,
    PRIMARY KEY (id)
);
alter table reparto_zonas add index zona(zona);
#----------------------------------------------------------------



#----------------------------------------------------------------
DROP TABLE IF EXISTS ventas_historico_global;
create table ventas_historico_global(
    id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    			mes int,
    			anio int,
    			contado double(14,2),
    			debito double(14,2),
    			tarjeta double(14,2),
    PRIMARY KEY (id)
);
alter table ventas_historico_global add index mes(mes);
alter table ventas_historico_global add index anio(anio);
#----------------------------------------------------------------
 



#----------------------------------------------------------------
drop table if exists informe_clientes_sucursal;  
create table informe_clientes_sucursal(
        id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
        id_sucursal int,
        sexo varchar(1),
        edad varchar(15),
        compra varchar(1),
        motivo_no varchar(20),
        otro_motivo text,
        marca_buscaba varchar(30),
        fecha date,
        hora time,
        PRIMARY KEY (id)
);
alter table informe_clientes_sucursal add index fecha(fecha);
#----------------------------------------------------------------



