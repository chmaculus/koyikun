drop table clientes;
create table clientes(
    id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    razon_social varchar(60),
    nombres varchar(60),
    condicion_iva varchar(4),
    cuit varchar(20),
    tipo_cliente varchar(20),
    carnet varchar(15),
    direccion varchar(100),
    ciudad varchar(25),
    provincia varchar(25),
    pais varchar(20),
    codigo_postal varchar(10),
    email text,
    pagina_web varchar(50),
    telefonos text,
    fax varchar(80),
    vendedor varchar(6),
    informacion_contacto text,
    observaciones text,
    sucursal varchar(15),
    fecha date,
    hora time,
    PRIMARY KEY (id)
);
alter table clientes add index razon_social(razon_social);
alter table clientes add index nombres(nombres);
alter table clientes add index cuit(cuit);
alter table clientes add index ciudad(ciudad);

