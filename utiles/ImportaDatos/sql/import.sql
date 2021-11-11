use lucas2;

truncate table preciosnuevos;
load data local infile "nuevos.csv" into table preciosnuevos fields terminated by "|";
delete from preciosnuevos where descripcion="";
delete from preciosnuevos where descripcion <=> NULL;
delete from preciosnuevos where descripcion="marca";
delete from  preciosnuevos where marca="marca";
update preciosnuevos set marca="sin especificar" where marca="";
update preciosnuevos set marca="sin especificar" where marca <=> NULL;
update preciosnuevos set clasificacion="OPTIONS" where clasificacion="O P T I O N S";
update preciosnuevos set clasificacion="EXCEL THERAPY" where clasificacion="EXCEL  THERAPY";
update preciosnuevos set clasificacion="PURET SKIN" where clasificacion="P U R E T   S K I N";
update preciosnuevos set clasificacion="TIMEXPERT LIFT" where clasificacion="T I M E X P E R T   L I F T";
update preciosnuevos set clasificacion="TIMEXPERT" where clasificacion="T I M E X P E R T";
update preciosnuevos set clasificacion="SEQUENCE" where clasificacion="S E Q U E N C E  ";
update preciosnuevos set clasificacion="SO DELICATE" where clasificacion="S O    D E L I C A T E";
update preciosnuevos set clasificacion="PERFECT FORMS" where clasificacion="PERFECT  FORMS ";
update preciosnuevos set clasificacion="LINEA JALEA REAL" where clasificacion="L I N E A   J A L E A    R E A L ";
update preciosnuevos set clasificacion="LINEA SOLAR SUNFLOWER" where clasificacion="LINEA  SOLAR  SUNFLOWER";
update preciosnuevos set clasificacion="LINEA FOR MEN" where clasificacion="L I N E A     F O R    M E N";
update preciosnuevos set clasificacion="VIVIANCE" where clasificacion="V  I  V  I A  N  C  E ";
update preciosnuevos set clasificacion="LINEA REVITASE" where clasificacion="L I N E A    R E V I T A S E";
update preciosnuevos set clasificacion="LINEA HYDRASOIN" where clasificacion="L I N E A   HY D R A S O I N ";
update preciosnuevos set clasificacion="SPA MARINE" where clasificacion=" S  P  A      M  A  R  I   N  E";
update preciosnuevos set clasificacion="ALMA DE GERMAINE MAQUILLAJES" where clasificacion="A L M A   D E    G E R M  A  I  N  E    M A Q U I L L A J E S";
update preciosnuevos set clasificacion="CLARIDGE" where clasificacion=" CLARIDGE ";

