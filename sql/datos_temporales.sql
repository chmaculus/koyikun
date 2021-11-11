DROP TABLE IF EXISTS datos_temporales;
create table datos_temporales (
	id_session varchar(30),
	tipo varchar(10),
	dato varchar(60),
	fecha date,
	hora time
);
alter table datos_temporales add index id_session(id_session);
alter table datos_temporales add index tipo(tipo);
alter table datos_temporales add index fecha(fecha);


