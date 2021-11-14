use lucas2;

truncate table preciosnuevos;
load data local infile "nuevos.csv" into table preciosnuevos fields terminated by "|";

delete from preciosnuevos where descripcion="";
delete from preciosnuevos where descripcion <=> NULL;
delete from preciosnuevos where descripcion="marca";
delete from preciosnuevos where marca="marca";
delete from preciosnuevos where marca="";
delete from preciosnuevos where marca <=> NULL;

