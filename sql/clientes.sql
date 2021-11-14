DROP TABLE IF EXISTS clientes_persona;

CREATE TABLE clientes_persona (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uuid varchar(40),
  apellido varchar(30) DEFAULT NULL,
  nombres varchar(40) DEFAULT NULL,
  dni varchar(20) DEFAULT NULL,
  estado_civil varchar(20) DEFAULT NULL,
  telefono varchar(30),
  celular varchar(30),
  email varchar(40),
  profesion varchar(15) DEFAULT NULL,
  observaciones text,
  usa_tarjeta varchar(2) DEFAULT NULL,
  vendedor varchar(6) DEFAULT NULL,
  sucursal varchar(15) DEFAULT NULL,
  nombre_comercio varchar(30),
  tel_comercial varchar(20),
  dom_comercial varchar(40),
  ciudad varchar(25) DEFAULT NULL,
  provincia varchar(25) DEFAULT NULL,
  pais varchar(25) DEFAULT NULL,
  carnet varchar(15) DEFAULT NULL,
  codigo_barras varchar(15) DEFAULT NULL,
  fecha_entrega date DEFAULT NULL,
  radio varchar(15) DEFAULT NULL,
  canal varchar(15) DEFAULT NULL,
  programas varchar(15) DEFAULT NULL,
  fecha date DEFAULT NULL,
  hora time DEFAULT NULL,
  PRIMARY KEY (id)
);

alter table clientes_persona add index apellido (apellido);
alter table clientes_persona add index nombres (nombres);
alter table clientes_persona add index dni (dni);
alter table clientes_persona add index carnet (carnet);
alter table clientes_persona add index codigo_barras (codigo_barras);


drop table if exists clientes_persona_valores; 
CREATE TABLE clientes_persona_valores (
  id_clientes_persona mediumint(8) unsigned NOT NULL,
  uuid_clientes_persona varchar(40),
  llave varchar(15),
  valor varchar(30)
);
alter table clientes_persona_valores add index id_clientes_persona(id_clientes_persona);
alter table clientes_persona_valores add index llave(llave);
 

  