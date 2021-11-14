DROP TABLE IF EXISTS valores;
create table valores(
    id MEDIUMINT UNSIGNED NOT NULL ,
    descripcion varchar(60),
    valor varchar(60)
);
alter table valores add index id(id);
alter table valores add index descripcion(descripcion);

insert into valores set id="1", descripcion="precio dolar", valor="4.28";
insert into valores set id="2", descripcion="I.V.A.1", valor="10.5";
insert into valores set id="3", descripcion="I.V.A.2", valor="21";
insert into valores set id="4", descripcion="Ingreso ma;ana", valor="9:00:00";
insert into valores set id="5", descripcion="Ingreso ma;ana", valor="16:30:00";
insert into valores set id="6", descripcion="Porcentaje Debito", valor="0";
insert into valores set id="7", descripcion="porcentaje Tarjeta", valor="20";


 
